elofy.controller('feedCtrl', function globalCtrl($scope, $timeout, $feed) {
  $feed['get']().then(function(response){
    $scope.feeds = response;
    console.log(response)
  });
});