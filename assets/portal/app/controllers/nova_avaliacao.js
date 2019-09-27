elofy.controller('novaAvaliacaoCtrl', function globalCtrl($scope, $timeout, $users, $years, $cycles, $tatics, $assessments) {
  $users['get']().then(function(users){
    users.unshift({
      id: '',
      name: 'Usuário'
    });

    $scope.selectedUser = '';

    $scope.users = users;

    $timeout(function() {
      var $teams = $('.select-user');

      $teams.addClass('visible');
      $teams.selectBoxIt();
    }, 10);
  });

  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $years = $('.select-year');

      $years.addClass('visible');
      $years.selectBoxIt();
    }, 10);

    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      cycles.unshift({
        id: '',
        name: 'Trimestre'
      });

      $scope.selectedCycle = '';

      $scope.cycles = cycles;

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible');
        $cycles.selectBoxIt();
      }, 10);
    });
  });

  $scope.changeYear = function(){
    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      cycles.unshift({
        id: '',
        name: 'Trimestre'
      });

      $scope.selectedCycle = '';

      $scope.cycles = cycles;

      if($('.select-cycle').hasClass('visible')){
        var selectBox = $(".select-cycle").data("selectBox-selectBoxIt");
        $('.select-cycle').removeClass('visible');
        selectBox.destroy();
      }

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible').selectBoxIt();
      }, 10);
    });
  }

  $scope.statusText = function(value){
    var items = ['Pendente', 'Finalizado', 'Cancelado', 'Em andamento'];

    return items[value];
  }

  $scope.filter = function(){
    $('.filtrar').button('loading');
    if(!$scope.selectedUser){
      $('select.select-user').parent().addClass('validate-has-error');
      $('.filtrar').button('reset');
      return;
    }else{
      $('select.select-user').parent().removeClass('validate-has-error');
    }
    if(!$scope.selectedCycle){
      $('select.select-cycle').parent().addClass('validate-has-error');
      $('.filtrar').button('reset');
      return;
    }else{
      $('select.select-cycle').parent().removeClass('validate-has-error');
    }

    var data = {
      user: $scope.selectedUser,
      year: $scope.selectedYear,
      cycle: $scope.selectedCycle
    }

    $assessments['okr'](data).then(function(tatics){
      $scope.tatics = tatics;
    });
  }

  $scope.change = function(taticId, value){
    var data = {
      id: taticId,
      avaliacao: value
    }

    $assessments['edit'](data).then(function(response){
      $('.filtrar').button('reset');
      for (var i=0,leng = $scope.tatics.length; i<leng; i++) {
        if(taticId == $scope.tatics[i].id){
          $scope.tatics[i].avaliacao = response.avaliacao;
        }
      }
    });
  }

});