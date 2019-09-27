elofy.controller('ciclosCtrl', function globalCtrl($scope, $rootScope, $timeout, $cycles, $tatics) {
	$scope.metodologis = [{id: "0", name: "OKRs"}, {id: "1", name: "BSC"}];
	$scope.ativos = [{id: "1", name: "Ativo"}, {id: "0", name: "Inativo"}];
	$cycles['getCyclePeriod']().then(function(response) {
        $scope.periods = response;
        console.log("periods:", $scope.periods);
  	});
  	$scope.modify_replica = 0;
	$scope.modify_aberto = 1;
	$scope.modifyCiclo = null;
  	$scope.replicas = [];

  	$scope.onChangeAtivoSelect = function() {
        angular.forEach($scope.ativos, function(result, key) {
              if (result['id'] == $('#search_ativo').val()) result.added = true;
        });
  	}

  	$scope.makeAtivoIdList = function() {
        $scope.ativosList = [];
        angular.forEach($scope.ativos, function(result, key) {
              if (result.added) $scope.ativosList.push(result.id);
        });
	}

	$scope.clearFilter = function() {
		$('#search_nome').val('');
		$('#search_ativo').select2('val', '');
		angular.forEach($scope.ativos, function(result, k) {
        	result['added'] = null;
      	});
		$scope.search_aberto = 1;
		$scope.applyFilter();
	}

	$scope.applyFilter = function() {
		$scope.makeAtivoIdList();
		console.log("filtered:", $('#search_nome').val(), ($scope.search_aberto == 0) ? 0 : 1 , $scope.ativosList);
		$cycles['getCylesForSettings']($('#search_nome').val(), ($scope.search_aberto == 0) ? 0 : 1, $scope.ativosList).then(function(response) {
              $scope.results = response;
              console.log("results:", $scope.results);
        });
	}

	$scope.resetModifyPanel = function() {
		$scope.modifyCiclo = null;
		$('#metologia').select2('destroy');
		$('#modify_period').select2('destroy');
		$('#ciclo_inicio').datepicker("destroy");
		$('#ciclo_fim').datepicker("destroy");
		$scope.modify_replica = 0;
		$scope.modify_aberto = 1;
		$scope.replicas = [];
	}

	$scope.configureModifyPanel = function() {
		$('#ciclo_inicio').datepicker();
		$('#ciclo_fim').datepicker();
		$timeout(function() {
	        $('#metologia').select2();
	        $('#modify_period').select2();
	    }, 300);
	}

	$scope.addCiclo = function() {
		$scope.configureModifyPanel();
		$scope.openSideBarMenu = true;
	}

	$scope.editCiclo = function(replica) {
		$cycles['getModifyCycleDetail'](replica.id_ciclo).then(function(response) {
            $scope.modifyCiclo = response;
            $scope.replicas = response.replicas;
            console.log("modify1:", $scope.modifyCiclo);
            $scope.modify_replica = parseInt($scope.modifyCiclo.replicar_indicadores);
            $scope.modify_aberto = parseInt($scope.modifyCiclo.aberto);
            $scope.configureModifyPanel();
        });

		$scope.openSideBarMenu = true;
	}

	$scope.closeSidebar = function() {
		$scope.resetModifyPanel();
        $scope.openSideBarMenu = false;
    }

    $scope.changeReplica = function() {
    	
    }

    $scope.saveCiclo = function() {
    	if (!$scope.modifyCiclo) {
    		alert("You should fill the item!");
    		return;
    	}
    	if (!$scope.modifyCiclo.nome_ciclo || $scope.modifyCiclo.nome_ciclo == '') {
    		alert("You should fill the item!");
    		return;
    	}
    	if (!$scope.modifyCiclo.id_janela) {
    		alert("You should fill the item!");
    		return;
    	}
    	if (!$scope.modifyCiclo.inicio_vigencia || $scope.modifyCiclo.inicio_vigencia == '') {
    		alert("You should fill the item!");
    		return;
    	}
    	if (!$scope.modifyCiclo.fim_vigencia || $scope.modifyCiclo.fim_vigencia == '') {
    		alert("You should fill the item!");
    		return;
    	}
    	var data = {
    		id_ciclo: $scope.modifyCiclo.id_ciclo,
    		id_janela: $scope.modifyCiclo.id_janela,
    		nome_ciclo: $scope.modifyCiclo.nome_ciclo,
    		inicio_vigencia: $scope.modifyCiclo.inicio_vigencia,
    		fim_vigencia: $scope.modifyCiclo.fim_vigencia,
    		metologia: $scope.modifyCiclo.metologia,
    		replicar_indicadores: $scope.modify_replica,
    		aberto: $scope.modify_aberto
    	};
    	var method = $scope.modifyCiclo.id_ciclo ? "editCiclo" : "insertCiclo";
    	console.log("save ciclo:", data, $scope.replicas, method);
    	$cycles[method](data, JSON.stringify($scope.replicas)).then(function(response) {
    		console.log("saved:", response);
    		toastr.success('Ciclo de salva!');
            $scope.closeSidebar();
            $scope.applyFilter();
        });
    }

    $scope.importCicloKeyresultOpen = function() {
        $('#query_keyresult').val("");
        $scope.query = '';
        $tatics['getImportKeyResults']().then(function(response) {
              $scope.importKeyResults = response;
        });
        $('#modal-key-import').modal('show', {
              backdrop: 'static'
        });
 	}

 	$scope.importCicloKeyresult = function() {
        var selectedKeyResult = [];
        angular.forEach($scope.importKeyResults, function(item, key) {
              if (item.status == 1) {
                    selectedKeyResult.push(item);
                    return;
              }
        });
        if (selectedKeyResult.length == 0) { alert("Selecione um resultado chave para importar");}
        else {
        	angular.forEach(selectedKeyResult, function(item, key) {
        		var keyResult = {
        			id: item.key_id,
        			name: item.nomeRChave
        		};
        		$scope.replicas.push(keyResult);
        	});
        	console.log("selected:", $scope.replicas);
        	$('#modal-key-import').modal('hide');
        }
 	}

 	$scope.removeReplica = function(replica) {
 		console.log("remove replica:", replica);
 		$scope.replicas = $scope.replicas.filter(item => item !== replica);
 	}

	$scope.results = [];
	$scope.importKeyResults = [];
	$scope.applyFilter();

	setTimeout(function() {
        $('#search_ativo').select2();
  	}, 300);
});