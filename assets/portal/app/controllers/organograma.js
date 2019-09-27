elofy.controller('organogramaCtrl', function globalCtrl($scope, $timeout, $globals, $teams) {
  $scope.globalId = id_global;

  $globals['tree']($scope.globalId).then(function(response){
    $scope.tree = response;
  });
});