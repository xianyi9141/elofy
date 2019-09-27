elofy.controller('avaliacoesCtrl', function globalCtrl($scope, $timeout, $teams, $users, $years, $cycles, $assessments) {
  $teams['get']().then(function(teams){
    $scope.teams = teams;

    if($scope.teams.length){
        if($scope.teams[0].id){
          $scope.teams.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedTeam = '';

      $timeout(function() {
        var $teams   = $('.select-teams');

        $teams.addClass('visible');
        $teams.selectBoxIt();
      }, 10);
  });

  $users['get']().then(function(users){
    $scope.users = users;

    if($scope.users.length){
        if($scope.users[0].id){
          $scope.users.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedUser = '';

      $timeout(function() {
        var $teams   = $('.select-user');

        $teams.addClass('visible');
        $teams.selectBoxIt();
      }, 10);
  });

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

  $scope.params = {
  	year: $scope.selectedYear,
  	team: '',
  	user: '',
  	cycle: ''
  }

  $scope.getList = function(){
	  $('button.filter').button('loading');

	  if($('#table').hasClass('dataTable')){
  		$('#table').DataTable().destroy();
  	}

	  $assessments['report']($scope.params).then(function(reports){
	  	$scope.reports = reports;

	  	$timeout(function(){
		  	$('button.filter').button('reset');

		  	$('span.pie').each(function(index, el) {
		    	$(this).peity("pie");
		  	});
		  	
		  	if(!$('#table').hasClass('dataTable')){
			  	$('table.table').DataTable({
				    "bDestroy": true,
				    'paging': false,
				    'info': false,
				    'searching': false,
				    columnDefs: [
				      { targets: 'no-sort', orderable: false }
				    ]
				  });
		  	}
		  }, 10);
	  });
	}

	$scope.getList();

	$scope.filter = function(){
		$scope.params.team = $scope.selectedTeam;
		$scope.params.year = $scope.selectedYear;
		$scope.params.user = $scope.selectedUser;
		$scope.params.cycle = $scope.selectedCycle;

		$scope.getList();
	}

});