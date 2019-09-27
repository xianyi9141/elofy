elofy.controller('globalCtrl', function globalCtrl($scope, $timeout, $channels, $filter, $location, $globals, $years, $users, $teams, $tags) {

  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $this   = $('.select-year'),
          opts    = {
            showFirstOption: attrDefault($this, 'first-option', true),
            'native': attrDefault($this, 'native', false),
            defaultText: attrDefault($this, 'text', '')
          };

      $this.addClass('visible');
      $this.selectBoxIt(opts);
    }, 10);

    $globals['get']($scope.selectedYear).then(function(response){
      $scope.$parent.globals = response;

      $scope.updatePercentage();
    });
  });

  $scope.changeYear = function(){
    $globals['get']($scope.selectedYear).then(function(response){
      $scope.$parent.globals = response;

      $scope.updatePercentage();
    });
  }

  $scope.bright = function(color){
    if(!color) {

      return 'aqua';
    }

    var tiny    = tinycolor(color),
        bright  = tiny.getBrightness();

    return bright > 175 ? 'gray' : false;
  }

  $scope.updatePercentage = function() {  
    $timeout(function(){
      $('.tile-progressbar').each(function(){
        var bar = $(this).find('span'),
            width = bar.data('fill');

        bar.css('width', width);
      });
    }, 500);
  }

  $scope.check = function(id){
    var test = $filter('filter')($scope.$parent.user.favorites, id, true);

    return test.length;
  }

  $scope.favorite = function(id) {
    var test = $filter('filter')($scope.$parent.user.favorites, id, true);

    $globals['favorite'](id, test.length).then(function(favorites){
      $scope.$parent.user.favorites = favorites;
    });
  }

  $scope.onlyFav = false;

  $scope.favorites = function() {
    if($scope.onlyFav) {
      $scope.onlyFav = false;
      $globals['get']($scope.selectedYear).then(function(response){
        $scope.$parent.globals = response;

        $scope.updatePercentage();
      });
    }else{
      $scope.onlyFav = true;

      var test = $scope.$parent.globals.filter(function (o) {
        return $scope.$parent.user.favorites.some(function (i) {
          return o.id === i;
        });
      });

      $scope.$parent.globals = test;
    }
  }

  $scope.q = '';

  $scope.search = function(){
    $scope.q = $scope.query;
  }

  // Modal

  $scope.users = [];
  $scope.teams = [];
  $scope.selectedTeams = [];

  $('.colorpicker').colorpicker({format: 'hex'});

  $scope.new = function() {

    $('#new-goal').modal('show', {backdrop: 'static'});

    $('.select2').select2('destroy');
    $('.typeahead').typeahead('destroy');

    $users['get']().then(function(response){
      $scope.users = response;

      $timeout(function(){
        var $this = $('.select2.usuario'),
            opts = { allowClear: attrDefault($this, 'allowClear', false) };

        $this.select2(opts);
        $this.addClass('visible');

        $('.multi-select.users').multiSelect('refresh');
      }, 10);
    });

    $tags['get']().then(function(response){

      $scope.$parent.tags = response;

      $timeout(function(){
        var tagsNames = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: response
        });

        tagsNames.initialize();

        $('.input-tags').tagsinput({
          typeaheadjs: {
            name: 'tagnames',
            displayKey: 'name',
            valueKey: 'name',
            source: tagsNames.ttAdapter()
          }
        });

        $('#form-goal').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) { 
            e.preventDefault();
            return false;
          }
        });

        $('.input-tags').on('itemAdded', function(event) {
          var tag = event.item;
        });
      }, 10);
    });

    $teams['get']().then(function(response){
      $scope.teams = response;

      $timeout(function(){
        var $this   = $('.select2.times'),
            button  = $('#open-time'),
            opts    = { allowClear: attrDefault($this, 'allowClear', false) },
            select  = $this.select2(opts);
        
        //$this.addClass('visible');

        button.off();
        button.on('click', function() {
          if(button.hasClass('active')){
            select.select2("close");
            button.removeClass('active');
          }else{
            select.select2("open");
            button.addClass('active');
          }
        });

        $this.on('change', function () {
          button.removeClass('active');
          
          var id      = this.value,
              search  = $filter('filter')($scope.teams, {id: id}),
              test    = $filter('filter')($scope.selectedTeams, {id: id});

          if(test.length) {
            return;
          }

          $scope.$apply(function () {
            $scope.selectedTeams.unshift({
              id: id,
              name: search[0].name,
              value: 1
            });
          });
        });
      }, 10);
    });

    $scope.numberLess = function($index) {
      var val = $scope.selectedTeams[$index].value;
      var newVal = val > 1 ? val-1 : 1;

      $scope.selectedTeams[$index].value = newVal;
    }

    $scope.numberMore = function($index) {
      var val = $scope.selectedTeams[$index].value;
      var newVal = val < 10 ? val+1 : 10;

      $scope.selectedTeams[$index].value = newVal;
    }

    $scope.numberRemove = function($index) {
      $scope.selectedTeams.splice($index, 1);
    }
  }

  // Validacao Novo

  $('#form-goal').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .colorpicker, .select2-input, .times',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        year: $scope.selectedYear,
        name: $('#field-1').val(),
        description: $('#field-2').val(),
        user: $('#field-3').val(),
        color: $('#field-4').val(),
        responsibles: $scope.responsibles,
        tags: $('#field-6').val(),
        teams: $scope.selectedTeams
      }

      if($scope.selectedTeams.length){
        var numbers   = $('.number'),
            error     = $('.error-sum'),
            total     = 0;
            
        numbers.each(function(){
          var self  = $(this),
              val   = Number(self.val());

          total = total + val;
        });

        if(total != 10) {
          error.removeClass('hidden');
          return;
        }else{
          error.addClass('hidden');
        }
      }

      $('#form-goal .salvar').button('loading');

      $globals['insert'](data).then(function(response){
        $scope.$parent.globals = response;

        $scope.updatePercentage();

        $channels['get']().then(function(channels){
          $scope.$parent.channels = channels;
        });

        $('#form-goal')[0].reset();
        //$('.multi-select').multiSelect('deselect_all');
        $('.input-tags').tagsinput('removeAll');
        $('#form-goal .salvar').button('reset');

        $scope.selectedTeams = [];

        $('#new-goal').modal('hide');
      });
    }
  });
});