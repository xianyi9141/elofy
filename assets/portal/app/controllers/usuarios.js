elofy.controller('usersCtrl', function globalCtrl($scope, $timeout, $users) {
  $users['all']().then(function(response){
    $scope.users = response;
  });

  $scope.q = '';

  $scope.search = function(){
    $scope.q = $scope.query;
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

  $scope.modalUser = function($user_id){
    $scope.user_id = $user_id;
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

    if($('.select-status').hasClass('visible')){
      var selectBox = $(".select-status").data("selectBox-selectBoxIt");
      $('.select-status').removeClass('visible');
      selectBox.destroy();
    }
    
    $timeout(function(){
      $('.select-status').addClass('visible').selectBoxIt();
    }, 10);

    $scope.userDetailImage = false;

    $('#user-image').change(function(event){
      var tmppath = URL.createObjectURL(event.target.files[0]);
      
      $timeout(function(){
        $scope.userDetailImage = tmppath;
      });
    }); 

    if($user_id) {
      $users['details']($user_id).then(function(response){
        $scope.userDetail = response;

        $scope.userDetailStatus = $scope.userDetail.active;
        $scope.userDetailImage = $scope.userDetail.image;
      });
    }else{
      $scope.userDetail = {};
    }

    $('#modal-user').modal('show', {backdrop: 'static'});
  }

  $scope.userValidation = $('#form-user').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      email: {
        required: true,
        email: true
      },
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
        nome: $('#user-name').val(),
        imagem: files ? files[0] : '',
        admin: $('#user-admin').is(":checked"),
        avaliador: $('#user-appraiser').is(":checked"),
        birthday: $('#user-birthday').val()
      }

      var method = 'insert';

      if($scope.user_id){
        method = 'edit';
        data.id = $scope.user_id;
        data.status = $('#user-status').val();
      }else{
        data.email = $('#user-email').val()
      }

      $scope.form = new FormData();

      $.each(data, function(key, value) {
        $scope.form.append(key, value);
      });
      
      $users[method]($scope.form).then(function(response){
        if(method == 'edit'){
          for (var i=0,leng=$scope.users.length; i<leng; i++) {
            if($scope.users[i].id == response.id){
              $scope.users[i].active = response.active;
              $scope.users[i].admin = response.admin;
              $scope.users[i].appraiser = response.appraiser;
              $scope.users[i].image = response.image;
              $scope.users[i].name = response.name;
            }
          };

          if(response.id == $scope.$parent.user.id){
            $scope.$parent.user.active = response.active;
            $scope.$parent.user.admin = response.admin;
            $scope.$parent.user.appraiser = response.appraiser;
            $scope.$parent.user.image = response.image;
            $scope.$parent.user.name = response.name;
          }
        }else{
          $scope.users = response;
        }

        $('#form-user .salvar').button('reset');

        $('#form-user')[0].reset();

        $('#modal-user').modal('hide');
      });
    }
  });
  
});