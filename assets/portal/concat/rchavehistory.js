elofy.controller('rchavehistoryCtrl', function globalCtrl($scope, $rootScope, $timeout, $indicators) {

	$scope.formatMinMaxTarget = function() {
		angular.forEach($scope.details, function(item, key) {
			if (key.indexOf('minimo') != -1 || key.indexOf('maximo') != -1 || key.indexOf('target') != -1)
			{
				$scope.details[key + 'Formatted'] = formatPattern(item, $scope.details.pattern);
			}
		});
		console.log("formatted:", $scope.details);
	}

	$scope.resetHistoryData = function() {
		var displayData = [];
		if ($scope.details == null) {
			  var categories = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro", "Primeiro Semestre", "Segundo Semestre", "Resultado Anual"];
	          angular.forEach(categories, function(item) {
	                var tmp = {};
	                tmp.category = item;
	                tmp.metaFormatted = '';
	                tmp.valoreFormatted = '';
	                tmp.meta = '';
	                tmp.valore = '';
	                tmp.meta_date = '';
	                tmp.valore_date = '';
	                tmp.isEditing = false;
	                displayData.push(tmp);
	          });
	          $scope.displayHistoryData = displayData;
	          $scope.details = {pattern:1};
	          return;
		}
		var tmp;
        tmp = {
              category: "Janeiro",
              meta: $scope.details.meta_1,
              valore: $scope.details.valor_1,
              meta_date: $scope.details.meta_1_date,
              valore_date: $scope.details.valor_1_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Fevereiro",
              meta: $scope.details.meta_2,
              valore: $scope.details.valor_2,
              meta_date: $scope.details.meta_2_date,
              valore_date: $scope.details.valor_2_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Março",
              meta: $scope.details.meta_3,
              valore: $scope.details.valor_3,
              meta_date: $scope.details.meta_3_date,
              valore_date: $scope.details.valor_3_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Abril",
              meta: $scope.details.meta_4,
              valore: $scope.details.valor_4,
              meta_date: $scope.details.meta_4_date,
              valore_date: $scope.details.valor_4_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Maio",
              meta: $scope.details.meta_5,
              valore: $scope.details.valor_5,
              meta_date: $scope.details.meta_5_date,
              valore_date: $scope.details.valor_5_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Junho",
              meta: $scope.details.meta_6,
              valore: $scope.details.valor_6,
              meta_date: $scope.details.meta_6_date,
              valore_date: $scope.details.valor_6_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Julho",
              meta: $scope.details.meta_7,
              valore: $scope.details.valor_7,
              meta_date: $scope.details.meta_7_date,
              valore_date: $scope.details.valor_7_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Agosto",
              meta: $scope.details.meta_8,
              valore: $scope.details.valor_8,
              meta_date: $scope.details.meta_8_date,
              valore_date: $scope.details.valor_8_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Setembro",
              meta: $scope.details.meta_9,
              valore: $scope.details.valor_9,
              meta_date: $scope.details.meta_9_date,
              valore_date: $scope.details.valor_9_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Outubro",
              meta: $scope.details.meta_10,
              valore: $scope.details.valor_10,
              meta_date: $scope.details.meta_10_date,
              valore_date: $scope.details.valor_10_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Novembro",
              meta: $scope.details.meta_11,
              valore: $scope.details.valor_11,
              meta_date: $scope.details.meta_11_date,
              valore_date: $scope.details.valor_11_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Dezembro",
              meta: $scope.details.meta_12,
              valore: $scope.details.valor_12,
              meta_date: $scope.details.meta_12_date,
              valore_date: $scope.details.valor_12_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Primeiro Semestre",
              meta: $scope.details.meta_13,
              valore: $scope.details.valor_13,
              meta_date: $scope.details.meta_13_date,
              valore_date: $scope.details.valor_13_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Segundo Semestre",
              meta: $scope.details.meta_14,
              valore: $scope.details.valor_14,
              meta_date: $scope.details.meta_14_date,
              valore_date: $scope.details.valor_14_date
        };
        displayData.push(tmp);
        tmp = {
              category: "Resultado Anual",
              meta: $scope.details.meta_15,
              valore: $scope.details.valor_15,
              meta_date: $scope.details.meta_15_date,
              valore_date: $scope.details.valor_15_date
        };
        displayData.push(tmp);
        angular.forEach(displayData, function(item, key) {
        	item.isEditing = false;
			if ($scope.details.pattern == 4) {
				item.metaFormatted = item.meta_date;
			  	item.valoreFormatted = item.valore_date;
			} else {
				item.metaFormatted = formatPattern(item.meta, $scope.details.pattern);
				item.valoreFormatted = formatPattern(item.valore, $scope.details.pattern);
			}
        });
        $scope.displayHistoryData = displayData;
	}

	$scope.rchavehistory_details = function() {
		$scope.id_history = $('#rchave_history #id_history').val();
		console.log("history id", $scope.id_history);
		if ($scope.id_history == 0) {
			$scope.details = null;
			$scope.isHeaderEditing = true;
			$scope.resetHistoryData();
			setTimeout(function() {
                  $("#bloque").select2();
                  $("#tipo").select2();
                  $("#formula").select2();
                  $("#polar").select2();
            }, 500);
			return;
		}
		$('#div_codigo').addClass('disable-content');
		$indicators['getRchaveHistoryDetailsById']($scope.id_history).then(function(response) {
			$scope.details = response;
			$scope.formatMinMaxTarget();
			$scope.isHeaderEditing = false;
			$scope.resetHistoryData();
			setTimeout(function() {
                $("#bloque").select2();
                $("#bloque").val($scope.details.forma_atualizacao);
                $("#tipo").select2();
                $("#tipo").val($scope.details.pattern);
                $("#formula").select2();
                $("#formula").val($scope.details.forma_calculo);
                $("#polar").select2();
                $("#polar").val($scope.details.polaridade);
                setTimeout(function() {
                      $("#bloque").select2();
                      $("#tipo").select2();
                      $("#formula").select2();
                      $("#polar").select2();
                }, 500);
          	}, 1000);
		});
	}

	$scope.editKeyresultHistory = function(history, index) {
		if (history.isEditing) {
		      var v_m = $('#meta_' + index).val();
		      var v_v = $('#valor_' + index).val();
		      if ($scope.details.pattern == 4) {
		            v_m = $('#meta_date_' + index).val();
		            v_v = $('#valor_date_' + index).val();
		      }
		      index++;
		      var k_m = "meta_" + index;
		      var k_v = "valor_" + index;
		      var data = {
		            id: $scope.id_history,
		            key_m: k_m,
		            val_m: v_m,
		            key_v: k_v,
		            val_v: v_v,
		            tipo: $scope.details.pattern
		      };
		      var method = 'saveRchaveHistoryValues';
		      if ($scope.id_history == 0) return;
		      $indicators[method](data).then(function(response) {
		      		if ($scope.id_history == 0) location.href = baseurl + 'rchavehistory/' + response;
		      		else {
						toastr.success("Historica Resultados chave Atualizado com Sucesso.");
			            $scope.rchavehistory_details();
			        }
			  }); 
		} else {
		      $('#meta_date_' + index).datepicker("destroy");
		      $('#meta_date_' + index).datepicker();
		      $('#valor_date_' + index).datepicker("destroy");
		      $('#valor_date_' + index).datepicker();
		      history.isEditing = !history.isEditing;
		} 
	}

	$scope.bloques = [{
	          id: "1",
	          name: "Automática"
	    },
	    {
	          id: "2",
	          name: "Manual"
	    }
	];
	$scope.patterns = [{
                  id: "0",
                  name: "Número"
            },
            {
                  id: "1",
                  name: "Monetário"
            },
            {
                  id: "2",
                  name: "Percentual"
            },
            {
                  id: "3",
                  name: "Inteiro"
            },
            {
                  id: "4",
                  name: "Data"
            },
            {
                  id: "5",
                  name: "Numérico 3 casas decimais"
            },
            {
                  id: "6",
                  name: "Monetário Reduzido"
            }

      ];
	$scope.formulas = [{
	          id: "0",
	          name: "média das linhas preenchidas"
	    },
	    {
	          id: "1",
	          name: "total proporcional"
	    },
	    {
	          id: "2",
	          name: "total absoluto"
	    },
	    {
	          id: "3",
	          name: "última linha preenchida"
	    },
	    {
	          id: "4",
	          name: "manual"
	    }
	];
	$scope.polars = [{
	          id: "0",
	          name: "Maior Melhor"
	    },
	    {
	          id: "1",
	          name: "Menor Melhor"
	    }
	];	

	$('#tipo').change(function() {
		$scope.details.pattern = $(this).val();
		$scope.$apply();
		$scope.editHistoryHeader(true);
	    console.log("came here!!!", $scope.details);
	});

	$scope.editHistoryHeader = function(fromTipoFlag = false) {
		if (!fromTipoFlag) {
			$scope.isHeaderEditing = true;
			$('#history_name').focus();
	      	var temp  = $('#history_name').val();
	      	$('#history_name').val('');
	      	$('#history_name').val(temp);
		}
		if ($scope.details.pattern == 4) {
			$('#minimo_date').datepicker("destroy");
			$('#minimo_date').datepicker();
			$('#maximo_date').datepicker("destroy");
			$('#maximo_date').datepicker();
			$('#target_date').datepicker("destroy");
			$('#target_date').datepicker();
	    }
	}

	$scope.dismissHeaderEditing = function() {
		$scope.isHeaderEditing = false;
	}

	$scope.saveHistoryHeader = function() {
		if ($scope.id_history == 0) {
			if ($('#codigo').val() == '') {
				alert("Código field is required!");
				return;
			}
			if ($('#history_name').val() == '') {
				alert("Nome field is required!");
				return;
			}
		}
        var data = {
              id_history: $scope.id_history,
              codigo: $('#codigo').val(),
              minimo: $('#minimo').val().replace(',','.'),
              maximo: $('#maximo').val().replace(',','.'),
              target: $('#target').val().replace(',','.'),
              peso: $('#peso').val(),
              nome: $('#history_name').val(),
              descricao: $('#descricao').val(),
              bloque: $('#bloque').val(),
              tipo: $('#tipo').val(),
              formula: $('#formula').val(),
              unidade: $('#unidade').val(),
              polar: $('#polar').val()
        };
        if ($scope.details.pattern == 4) {
              data.minimo = $('#minimo_date').val();
              data.target = $('#target_date').val();
              data.maximo = $('#maximo_date').val();
        }
        var method = 'saveRchaveHistoryHeader';
        if ($scope.id_history == 0) method = 'addRchaveHistoryHeader';
        $indicators[method](data).then(function(response) {
		    toastr.success('Successfully saved');
		    if ($scope.id_history == 0) location.href = baseurl + 'rchavehistory/' + response;
		    else  $scope.rchavehistory_details();
		});
	}
});