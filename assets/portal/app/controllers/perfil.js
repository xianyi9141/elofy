elofy.controller('profileCtrl', function globalCtrl($scope, $timeout, $years, $cycles, $users, $tags) {
  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $years   = $('.select-year');

      $years.addClass('visible');
      $years.selectBoxIt();
    }, 10);

    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles   = $('.select-cycle');

        $cycles.addClass('visible');
        $cycles.selectBoxIt();
      }, 10);
    });
  });

  $scope.changeYear = function(){
    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($('.select-cycle').hasClass('visible')){
        var selectBox = $(".select-cycle").data("selectBox-selectBoxIt");
        $('.select-cycle').removeClass('visible');
        selectBox.destroy();
      }

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible').selectBoxIt();
      }, 10);
    });
  }

  $('#results a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

  var data = {
    year: $scope.selectedYear,
    cycle: $scope.selectedCycle
  }

  $users['profile'](data).then(function(response){
    $scope.results = response;

    $timeout(function(){
      $("span.pie").peity("pie");
    });
  });

  $scope.filter = function() {
    data = {
      year: $scope.selectedYear,
      cycle: $scope.selectedCycle
    };

    $('.btnFilter').button('loading');

    $users['profile'](data).then(function(response){
      $scope.results = response;

      $('.btnFilter').button('reset');

      $timeout(function(){
        $("span.pie").peity("pie");
      }, 10);
    });
  }

  if($.isFunction($.fn.datepicker)) {
    $(".data").each(function(i, el){
      var $this = $(this),
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

  $scope.modalUser = function(){
    $scope.user_id = $scope.user.id;
    $scope.userDetail = false;
    $scope.userDetailStatus = true;
    $scope.userDetailImage = '';
    $('#user-image').val('');

    $('#modal-user .error-message').addClass('hide');
    if($scope.userValidation){
      $scope.userValidation.resetForm();
      $('.validate-has-error').each(function(){
        $(this).removeClass('validate-has-error');
      });
    }

    $scope.userDetailImage = false;

    $('#user-image').change(function(event){
      var tmppath = URL.createObjectURL(event.target.files[0]);
      
      $timeout(function(){
        $scope.userDetailImage = tmppath;
      });
    }); 

    $users['details']($scope.user_id).then(function(response){
      $scope.userDetail = response;

      $scope.userDetailImage = $scope.userDetail.image;
    });

    $('#modal-user').modal('show', {backdrop: 'static'});
  }

  $scope.userValidation = $('#form-user').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      imagem: {
        required: function(){
          return $('#user-image').val() ? true : false;
        },
        extension: "png|jpe?g|gif"
      }
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
      if($(element).is('#user-image')){
        $('#user-image').parent().find('p').remove();
      };
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
      if($(element).is('#user-image') && $(element).parent().hasClass('validate-has-error') && $(element).parent().find('p').length == 0){
        $('#user-image').parent().append('<p class="text-danger">Por favor insira uma imagem.</p>')
      };
    },
    invalidHandler: function() {
      $('#modal-user .error-message').removeClass('hide');
    },
    submitHandler: function(form) {
      $('#modal-user .error-message').addClass('hide');
      $('#form-user .salvar').button('loading');

      var imageInput = $('#user-image'),
          files = imageInput[0].files;

      var data = {
        id: $scope.user.id,
        nome: $('#user-name').val(),
        birthday: $('#user-birthday').val(),
        imagem: files ? files[0] : ''
      }

      $scope.form = new FormData();

      $.each(data, function(key, value) {
        $scope.form.append(key, value);
      });
      
      $users['edit']($scope.form).then(function(response){
        $scope.$parent.user.active = response.active;
        $scope.$parent.user.admin = response.admin;
        $scope.$parent.user.appraiser = response.appraiser;
        $scope.$parent.user.image = response.image;
        $scope.$parent.user.name = response.name;

        $('#form-user .salvar').button('reset');

        $('#form-user')[0].reset();

        $('#modal-user').modal('hide');
      });
    }
  });

});