elofy.controller('teamsCtrl', function globalCtrl($scope, $timeout, $users, $teams) {
  $teams['tree']().then(function(response){
    $scope.teams = response;
  });

  $scope.collapse = function($event) {
    var self = $($event.currentTarget),
        el = self.closest('.dd-item');

    el.removeClass('open');
  }

  $scope.expand = function($event) {
    var self = $($event.currentTarget),
        el = self.closest('.dd-item');

    el.addClass('open');
  }

  $scope.q = '';

  $scope.search = function(){
    $scope.q = $scope.query;
  }

  $scope.modalTimes = function($team_id){
    $scope.team_id = $team_id;
    $scope.teamDetail = false;
    $scope.teamDetailUser = '';
    $scope.teamDetailUsers = [];
    $scope.responsible = [];
    $scope.teamDetailStatus = true;
    $scope.teamDetailTeam = '0';

    $('#modal-teams .error-message').addClass('hide');
    if($scope.teamValidation){
      $scope.teamValidation.resetForm();
      $('.validate-has-error').each(function(){
        $(this).removeClass('validate-has-error');
      });
    }

    if($('.select-status').hasClass('visible')){
      var selectBox = $(".select-status").data("selectBox-selectBoxIt");
      $('.select-status').removeClass('visible');
      selectBox.destroy();
    }
    $('#modal-teams .select2.usuario-team').select2('destroy');
    $('#modal-teams .select2.times-team').select2('destroy');
    $('#modal-teams .multi-select').multiSelect('destroy');

    $users['get']().then(function(users){
      $scope.users = users;
      $scope.responsible = [];

      for (var i=0,leng=users.length; i<leng; i++) {
        $scope.responsible.push(users[i]);
      };

      var method = 'get';

      if($team_id){
        method = 'no_relation';        
      }

      $teams[method]($team_id).then(function(response){
        $scope.teamsList = response;

        $timeout(function(){
          $scope.teamsList.unshift({
            id: '0',
            name: 'Nenhum'
          });
        }, 10);
        

        if($team_id){
          $teams['details']($team_id).then(function(response){
            $scope.teamDetail = response;
            $scope.teamDetailUser = $scope.teamDetail.user.id;
            $scope.teamDetailUsers = $scope.teamDetail.members;
            $scope.teamDetailStatus = $scope.teamDetail.active;
            $scope.teamDetailTeam = $scope.teamDetail.team;

            $scope.responsible.unshift($scope.teamDetail.user);

            var array = [];

            for (var i=0; i < $scope.teamDetail.members.length; i++) {
              //$scope.users.unshift($scope.teamDetail.members[i]);
              array.push($scope.teamDetail.members[i].id);
            };

            $timeout(function(){
              var $this = $('.select2.usuario-team'),
                  opts = { allowClear: attrDefault($this, 'allowClear', false) };

              $this.select2(opts);
              $this.addClass('visible');

              $('.multi-select.users-team').multiSelect();

              $('.select-status').addClass('visible').selectBoxIt();

              var $this   = $('.select2.times-team'),
                  opts    = { allowClear: attrDefault($this, 'allowClear', false) };
                  
              $this.select2(opts);

              $('.multi-select.users-team').multiSelect('select', array);
            }, 10);
          });
        }else{
          $scope.teamDetail = {};

          $timeout(function(){
            var $this   = $('.select2.times-team'),
                opts    = { allowClear: attrDefault($this, 'allowClear', false) };
                
            $this.select2(opts);

            var $this = $('.select2.usuario-team'),
                opts = { allowClear: attrDefault($this, 'allowClear', false) };

            $this.select2(opts);
            $this.addClass('visible');

            $('.multi-select.users-team').multiSelect();

            $('.select-status').addClass('visible').selectBoxIt();
          }, 10);
        }
        
      });
    });

    $('#modal-teams').modal('show', {backdrop: 'static'});
  }

  $scope.teamValidation = $('#form-teams').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      usuario: {valueNotEquals: "?"}
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    invalidHandler: function() {
      $('#modal-teams .error-message').removeClass('hide');
    },
    submitHandler: function(form) {
      $('#modal-teams .error-message').addClass('hide');
      $('#form-teams .salvar').button('loading');

      var data = {
        id: $scope.team_id,
        name: $('#team-name').val(),
        user: $scope.teamDetailUser,
        team: $scope.teamDetailTeam,
        users: $('#team-users').val(),
        status: $scope.teamDetailStatus
      }

      var type = $scope.team_id ? 'edit' : 'insert'
      
      $teams[type](data).then(function(response){
        $scope.teams = response;

        $('#form-teams .salvar').button('reset');

        $('#form-teams')[0].reset();

        $('#modal-teams').modal('hide');
      });
    }
  });
  
});