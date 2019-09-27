elofy.controller('questionariosCtrl', function ($scope, $questionarios, $users) {

    $users['me']().then(function(response){
        $scope.me = response;
        $questionarios['get']($scope.me.empresa.id_empresa).then(function(response){
            $scope.questionarios = response;
        });
    });


  // $scope.teste = "nada";

  // $scope.changeTeste = function ()
  // {
  //   console.log(" funcionando");
  //   $scope.teste = "tudo";
  // }

});