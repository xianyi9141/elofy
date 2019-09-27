elofy.controller('avaliacoesCtrl', function globalCtrl($scope, $timeout, $teams, $users, $cycles, $assessments, $translate, $globals) {
      $teams['getAllTeams']().then(function(teams) {
            $scope.times = teams;
      });
      $scope.$parent.$watch('users', function(newVal, oldVal) {
            if (newVal) {
                  $scope.responsavels = JSON.parse(JSON.stringify(newVal));
            }
      });
      $globals['getGlobalsCycles']().then(function(response) {
            $scope.cycles = response;
      });
      $scope.onChangeTeamSelect = function() {
            angular.forEach($scope.times, function(result, key) {
                  if (result['id'] == $('#search_time').val()) result.added = true;
            });
      }
      $scope.onChangeResponsavelSelect = function() {
            angular.forEach($scope.responsavels, function(result, key) {
                  if (result['id'] == $('#search_responsavel').val()) result.added = true;
            });
      }
      $scope.onChangeCycleSelect = function() {
            angular.forEach($scope.cycles, function(result, key) {
                  if (result['id_ciclo'] == $('#search_cycle').val()) result.added = true;
            });
      }  

      $scope.getIdListString = function(obj) {
            if (obj) return obj.join(',');
            else return null;
      }

      $scope.resetIdLists = function() {
            $scope.timesList = $scope.makeIdList($scope.times);
            $scope.responsavelsList = $scope.makeIdList($scope.responsavels);
            $scope.cyclesList = $scope.makeCycleIdList($scope.cycles);
      }

      $scope.makeIdList = function(obj) {
            var idList = [];
            angular.forEach(obj, function(result, key) {
                  if (result.added) idList.push(result.id);
            });
            return idList;
      }

      $scope.makeCycleIdList = function(obj) {
            var idList = [];
            angular.forEach(obj, function(result, key) {
                  if (result.added) idList.push(result.id_ciclo);
            });
            return idList;
      }

      $scope.isSelectedFilter = function() {
            if ($scope.timesList.length || $scope.responsavelsList.length || $scope.cyclesList.length) {
                  return true;
            } else {
                  return false;
            }
            
      }

      $scope.reset = function() {
          $('#search_time').select2('val', '');
          $('#search_responsavel').select2('val', '');
          $('#search_cycle').select2('val', '');
          angular.forEach($scope.times, function(result, k) {
              result['added'] = null;
          });
          angular.forEach($scope.responsavels, function(result, k) {
              result['added'] = null;
          });
          angular.forEach($scope.cycles, function(result, k) {
              result['added'] = null;
          });
          $scope.reports = [];
      }
      $scope.applyFilter = function() {
            $scope.resetIdLists();
            if (!$scope.isSelectedFilter()) {
                  alert("Por favor, selecione ao menos um parâmetro de pesquisa!");
                  return;
            }
            console.log("filter:", $scope.timesList, $scope.responsavelsList, $scope.cyclesList);
            $('button.apply_filter').button('loading');
            $assessments['report']($scope.timesList, $scope.responsavelsList, $scope.cyclesList).then(function(response) {
            	$scope.reports = response;
            	console.log("response:", response, $scope.reports);
            	$timeout(function() {
                    $('button.apply_filter').button('reset');
                    $('span.pie').each(function(index, el) {
                          $(this).peity("pie");
                    });
                }, 10);
            });
      }
      $scope.reports = [];
      setTimeout(function() {
            $('#search_time').select2();
            $('#search_responsavel').select2();
            $('#search_cycle').select2();
      }, 300);
});