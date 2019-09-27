elofy.controller('okrCtrl', function globalCtrl($scope, $timeout, $filter, $globals, $users, $teams, $years, $cycles, $tatics, $key) {

  $tatics['getAll']().then(function(tatics){
    $scope.tatics = tatics;

    $users['get']().then(function(users){
      $scope.users = users;
    });

    $teams['get']().then(function(teams){
      $scope.teams = teams;
    });

    $years['get']().then(function(years){
      $scope.years = years;
    });

   // $scope.my();
  });

  $scope.searchName = function(){
    $scope.q = $scope.query;
  }

  $scope.onlyMe = false;

  $scope.my = function(){
    if($scope.onlyMe){
      $scope.userId = '';
      $scope.onlyMe = false;
    }else{
      $scope.userId = $scope.$parent.user['id'];
      $scope.onlyMe = true;
    }
  }

  $scope.statusText = function(value){
    var items = ['Pendente', 'Finalizado', 'Cancelado', 'Em andamento'];

    return items[value];
  }

  $scope.search = function() {
    $('#modal-search').modal('show', {backdrop: 'static'});

    //$('.select2').select2('destroy');

    $('select.usuario').select2({allowClear: true}).addClass('visible');

    $('select.time').select2({allowClear: true}).addClass('visible');

    $('select.ano').select2({allowClear: true, minimumResultsForSearch: -1}).addClass('visible');

    $scope.loadCycles = function(){
      var formCycles = $('.form-group.cycles');
      var formGlobals = $('.form-group.globals');

      if($scope.selectedYearName){
        $cycles['getByYear']($scope.selectedYearName).then(function(response){
          $scope.cycles = response;

          $timeout(function(){
              formCycles.removeClass('hidden');
              $('select.trimestres').select2('destroy');
              $('select.trimestres').select2({allowClear: true, minimumResultsForSearch: -1}).addClass('visible');
          }, 10);
        });

        $globals['get']($scope.selectedYearName).then(function(response){
          $scope.objectives = response;

          $timeout(function(){
              formGlobals.removeClass('hidden');
              $('select.globals').select2('destroy');
              $('select.globals').select2({allowClear: true, minimumResultsForSearch: -1}).addClass('visible');
          }, 10);
        });
      }else{
        formCycles.addClass('hidden');
        formGlobals.addClass('hidden');
      }
    }

    if(!$scope.selectedYearName){
      $('.form-group.cycles').addClass('hidden');
      $('.form-group.globals').addClass('hidden');
    }
  }

  $scope.filter = function(){
    $('#modal-search').modal('hide');

    $scope.q = $scope.query;

    if($scope.selectedSituation){
      var selectedArray = [];

      for (var i=0; i<4; i++) {
        if($scope.selectedSituation[i]){
          selectedArray.push(i);
        }
      };

      $scope.filterByStatus = function(tatic) {
        if(selectedArray.length){
          return (selectedArray.indexOf(tatic.status) !== -1);
        }else{
          return true;
        }
      };
    }

    $scope.userId = $scope.selectedUser;
    $scope.teamId = $scope.selectedTeam;
    $scope.yearName = $scope.selectedYearName;
    $scope.cycleId = $scope.selectedCycle;
    $scope.objectiveId = $scope.selectedId;
    $scope.onlyMe = false;
  }

  $scope.reset = function() {
    $('#form-search')[0].reset();
    $scope.query = '';
    $scope.selectedSituation = [];
    $scope.selectedUser = '';
    $scope.selectedTeam = '';
    $scope.selectedYearName = '';
    $scope.selectedCycle = '';
    $scope.selectedId = '';

    $scope.filter();
  }

  $scope.updatePercentage = function($key) {
    $timeout(function(){
      var self = $('.item' + $key);

      self.find('span.pie').peity("pie");
    }, 10);
  }

  $scope.modalMeasure = function(taticId, $key_id) {
    $('#form-measure')[0].reset();
    $scope.inputs = [];
    $scope.key_id = $key_id;
    $scope.tatic_id = taticId;
    $scope.measures = false;
    var increment = 0;

    $key['measureList']($scope.key_id).then(function(response){
      $scope.measures = response;
    });

    var tatic;

    for (var i=0,leng = $scope.tatics.length; i < leng; i++) {
      if($scope.tatics[i].id === taticId){
        tatic = i;
      }
    };

    var key;

    for (var i=0,leng = $scope.tatics[tatic].keys.length; i < leng; i++) {
      if($scope.tatics[tatic].keys[i].id === $key_id){
        key = i;
        $scope.measureText = $scope.tatics[tatic].keys[i].title;
      }
    };

    $scope.incrementInput = function(){
      increment++;
      $scope.inputs.push(increment);
    }

    $('#modal-measure').modal('show', {backdrop: 'static'});
  }

  $('#form-measure').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      data: 'required',
      medicao: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var taticId = $('#taticId').val(),
          fileInput = $('#measure-files'),
          files = fileInput[0].files;

      var data = {
        id: $scope.key_id,
        date: $('#measure-date').val(),
        value: $('#measure-value').val(),
        comentary: $('#measure-description').val(),
      }

      $scope.form = new FormData();

      $.each(data, function(key, value) {
        $scope.form.append(key, value);
      });

      for (var i=0; i < files.length; i++) {
        $scope.form.append("files[]", files[i]);
      }

      $('#form-measure .salvar').button('loading');

      $key['measure']($scope.form).then(function(response){
        var tatic;

        for (var i=0,leng = $scope.tatics.length; i < leng; i++) {
          if($scope.tatics[i].id === taticId){
            tatic = i;
          }
        };

        $scope.tatics[tatic].percentage = response.rkey_parent_perc;

        var keyId;

        for (var i=0,leng=$scope.tatics[tatic].keys.length; i < leng; i++) {
          if($scope.tatics[tatic].keys[i].id === $scope.key_id){
            $scope.tatics[tatic].keys[i].percentage = response.rkey_perc;
            keyId = $scope.tatics[tatic].keys[i].id;
          }
        };

        $timeout(function(){
          $('.item' + keyId).find('span.pie').peity("pie");
        });

        $scope.measures = response.medicoes;

        $('#form-measure')[0].reset();
        $('#form-measure .salvar').button('reset');
        //$('#modal-measure').modal('hide');
      });
    }
  });

  if($.isFunction($.fn.datepicker)) {
    $(".date_picker").each(function(i, el){
      var $this = $(el),
        opts = {
          format: attrDefault($this, 'format', 'dd/mm/yyyy'),
          startDate: attrDefault($this, 'startDate', ''),
          endDate: attrDefault($this, 'endDate', ''),
          daysOfWeekDisabled: attrDefault($this, 'disabledDays', ''),
          startView: attrDefault($this, 'startView', 0),
          language: 'pt-BR',
          rtl: rtl()
        },
        $n = $this.next(),
        $p = $this.prev();

      $this.datepicker(opts);

      if($n.is('.input-group-addon') && $n.has('a')){
        $n.on('click', function(ev){
          ev.preventDefault();

          $this.datepicker('show');
        });
      }

      if($p.is('.input-group-addon') && $p.has('a')){
        $p.on('click', function(ev){
          ev.preventDefault();

          $this.datepicker('show');
        });
      }
    });
  }
});