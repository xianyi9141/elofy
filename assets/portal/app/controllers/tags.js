elofy.controller('tagsCtrl', function globalCtrl($scope, $timeout, $tags) {
  $scope.tag = tag;

  $('#results a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

  $tags['search']($scope.tag).then(function(response){
    $scope.results = response;

    $timeout(function(){
      $("span.pie").peity("pie");
    });
  });
  
});