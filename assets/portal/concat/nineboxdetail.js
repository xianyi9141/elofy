elofy.controller('nineboxdetailCtrl', function globalCtrl($scope, $rootScope, $timeout, $results) {

$scope.setInitialData = function() {
	$scope.selectedBox = JSON.parse(JSON.stringify($scope.box));
    var results = $scope.getResultByNineBoxValue($scope.box.number);
    if (results) $scope.selectedBox.users = results.users;

    angular.forEach($scope.selectedBox.users, function(user, key) {
		user.isEditing = false;
	});

	console.log("selected box:", $scope.selectedBox);
}

$scope.getResultByNineBoxValue = function(nineboxvalue) {
    var returnVal = {
          "total": 0,
          "nine_box":nineboxvalue,
          "users":[]
    };
    angular.forEach($scope.results, function(item, value) {
          if (item['nine_box'] == nineboxvalue) {
                returnVal = item;
                return true; // getoff foreach loop
          }
    });
    return returnVal;
}

$scope.retrieveNineBoxDetails = function() {
	$scope.results = JSON.parse(localStorage.getItem('results'));
	$scope.boxes = JSON.parse(localStorage.getItem('boxes'));
	$scope.box = JSON.parse(localStorage.getItem('box'));
	// localStorage.clear();

	$scope.setInitialData();

    setTimeout(function() {
        $("#filter_box").select2();
        $("#filter_box").val($scope.selectedBox.number);
        setTimeout(function() {
              $("#filter_box").select2();
        }, 500);
  	}, 300);
}

$('#filter_box').change(function() {
	var newBoxNumber = $(this).val();
	angular.forEach($scope.boxes, function(box, key) {
		if (newBoxNumber == box.number) {
			$scope.box = box;
			$scope.setInitialData();
			$scope.$apply();
			return;
		}
	});
});

$scope.editNineBox = function(user, $index) {
	if (user.isEditing) {
		var new_ninebox = $("#ninebox_" + $index).val();
		var feedback = $("#feedback_" + $index).val();
		$("#ninebox_" + $index).select2("destroy");
		user.isEditing = false;

		$scope.changeNineBox(user.id_revisao_ciclo_score, new_ninebox, feedback);
		return;
	}
	user.isEditing = true;
	setTimeout(function() {
          $("#ninebox_" + $index).select2();
    }, 100);
}

$scope.changeNineBox = function(id_revisao_ciclo_score, new_ninebox, feedback) {
      $results['update9boxdetails'](id_revisao_ciclo_score, new_ninebox, feedback).then(function() {
            toastr.success('Calibração realizada com sucesso.');
      });
}

});