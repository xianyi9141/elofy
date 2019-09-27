elofy.controller('indicatorsCtrl', function globalCtrl($scope, $rootScope, $timeout, $teams, $users, $cycles, $globals, $indicators) {
/*
      $teams['getAllTeamsAccordingPermission']().then(function(response) {
            $scope.times = response;
      });
      $globals['getGlobalsCycles']().then(function(response) {
            $scope.cycles = response;
      });
      $scope.$parent.$watch('users', function(newVal, oldVal) {
            if (newVal) {
                  $scope.responsavels = JSON.parse(JSON.stringify(newVal));
                  console.log("responsavels:", $scope.responsavels);
            }
      });
      $indicators['getObjectives']().then(function(response) {
            $scope.objectives = response;
            console.log("objectives:", $scope.objectives);
      });
      $scope.ativos = [{id: "1", name: "Ativo"}, {id: "0", name: "Inativo"}];

      $scope.onChangeTeamSelect = function() {
            angular.forEach($scope.times, function(result, key) {
                  if (result['id'] == $('#search_time').val()) result.added = true;
            });
      }
      $scope.onChangeCycleSelect = function() {
            angular.forEach($scope.cycles, function(result, key) {
                  if (result['id_ciclo'] == $('#search_cycle').val()) result.added = true;
            });
      }
      $scope.onChangeResponsavelSelect = function() {
            angular.forEach($scope.responsavels, function(result, key) {
                  if (result['id'] == $('#search_responsavel').val()) result.added = true;
            });
      }
      $scope.onChangeObjectiveSelect = function() {
            angular.forEach($scope.objectives, function(result, key) {
                  if (result['id'] == $('#search_objective').val()) result.added = true;
            });
      }
      $scope.onChangeAtivoSelect = function() {
            angular.forEach($scope.ativos, function(result, key) {
                  if (result['id'] == $('#search_ativo').val()) result.added = true;
            });
      }

      $scope.getIdListString = function(obj) {
            if (obj) return obj.join(',');
            else return null;
      }

      $scope.submitCsv = function() {
            $scope.resetIdLists();
            setTimeout(function() {
                  $('#form-export-csv').submit();
            }, 1000);
      }

      $scope.resetIdLists = function() {
            $scope.timesList = $scope.makeIdList($scope.times);
            $scope.cyclesList = $scope.makeCycleIdList($scope.cycles);
            $scope.responsavelsList = $scope.makeIdList($scope.responsavels);
            $scope.objectivesList = $scope.makeIdList($scope.objectives);
            $scope.ativosList = $scope.makeIdList($scope.ativos);
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
*/
      $scope.isSelectedFilter = function() {
            // if ($('#search_name').val() != '' || $scope.timesList.length || $scope.responsavelsList.length || $scope.objectivesList.length || $scope.ativosList.length || $scope.cyclesList.length) {
            //       return true;
            // } else {
            //       return false;
            // }

            if ($('#search_codigo').val() != '' || $('#search_name').val() != '')
                return true;
            else return false;
      }

      $scope.reset = function() {
          $('#search_name').val('');
          $('#search_codigo').val('');
          angular.forEach($scope.historyCodigoes, function(result, k) {
              result['match'] = true;
          });
          angular.forEach($scope.historyNames, function(result, k) {
              result['match'] = true;
          });
          // $('#search_time').select2('val', '');
          // $('#search_cycle').select2('val', '');
          // $('#search_responsavel').select2('val', '');
          // $('#search_objective').select2('val', '');
          // $('#search_ativo').select2('val', '');
          // angular.forEach($scope.times, function(result, k) {
          //     result['added'] = null;
          // });
          // angular.forEach($scope.cycles, function(result, k) {
          //     result['added'] = null;
          // });
          // angular.forEach($scope.responsavels, function(result, k) {
          //     result['added'] = null;
          // });
          // angular.forEach($scope.objectives, function(result, k) {
          //     result['added'] = null;
          // });
          // angular.forEach($scope.ativos, function(result, k) {
          //     result['added'] = null;
          // });
          $scope.results = [];
      }
      $scope.applyFilter = function() {
            // $scope.resetIdLists();
            if (!$scope.isSelectedFilter()) {
                  alert("Por favor, selecione ao menos um parâmetro de pesquisa!");
                  return;
            }
            // console.log("filter:", $('#search_name').val(), $scope.timesList, $scope.responsavelsList, $scope.objectivesList, $scope.cyclesList, $scope.ativosList);
            // $indicators['list']($('#search_name').val(), $scope.timesList, $scope.responsavelsList, $scope.objectivesList, $scope.cyclesList, $scope.ativosList).then(function(response) {
            //       $scope.results = response;
            //       console.log("results:", $scope.results);
            // });

            console.log("filter:", $('#search_codigo').val(), $('#search_name').val());
            $indicators['getRchaveHistory']($('#search_codigo').val(), $('#search_name').val()).then(function(response) {
                  $scope.results = response;
                  angular.forEach($scope.results, function(result, k) {
                      result.isEditing = false;
                      angular.forEach(result, function(item, key) {
                          if (key.indexOf('meta') != -1 || key.indexOf('valor') != -1 || key.indexOf('minimo') != -1 || key.indexOf('target') != -1 || key.indexOf('maximo') != -1)
                          {
                              result[key] = formatPattern(item, result.pattern);
                          }
                      });
                  });
                  $timeout(function() {
                        $('#tbl_indicators').niceScroll({
                              cursorcolor: "#03a9f4",
                              cursorborder: "none"
                        });
                        window.dispatchEvent(new Event('resize'));
                  }, 100);
            });
      }

      $scope.addHistory = function(history) {
          location.href = baseurl + 'rchavehistory';
      }      

      $scope.editHistory = function(history) {
          location.href = baseurl + 'rchavehistory/' + history.id_rchave_historico;
          /*
          if (history.isEditing) {
              return;
          }
          angular.forEach($scope.results, function(result, k) {
              if (result.isEditing) {
                  result.isEditing = false;
              }
              
          });
          history.isEditing = true;
          */
      }

      /*
      $scope.saveHistory = function(history) {
          if (!history.isEditing) {
              return;
          }
          var data = {};
          var historyId = history.id_rchave_historico;
          data.id = historyId;
          data.codigo = $('#codigo_' + historyId).val();
          data.nome = $('#nome_' + historyId).val();
          data.minimo = $('#minimo_' + historyId).val();
          data.target = $('#target_' + historyId).val();
          data.maximo = $('#maximo_' + historyId).val();
          for (var i = 1; i < 16; i++) {
              var categoryInput = 'category' + i + '_' + historyId;
              var metaInput = 'meta' + i + '_' + historyId;
              var valorInput = 'valor' + i + '_' + historyId;
              var categoryStr = 'categoria_' + i;
              var metaStr = 'meta_' + i;
              var valorStr = 'valor_' + i;
              data[categoryStr] = $('#' + categoryInput).val();
              data[metaStr] = $('#' + metaInput).val();
              data[valorStr] = $('#' + valorInput).val();
          }
          console.log("save data:", data);
          $indicators['saveRchaveHistory'](data).then(function(response) {
                toastr.success('Successfully saved');
                history.isEditing = false;
                $scope.applyFilter();
          });
      }  */

      $scope.viewsColumsFilter = function() {
            $timeout(function() {
                  $('#section_filter_box').niceScroll({
                        cursorcolor: "#03a9f4",
                        cursorborder: "none"
                  });
                  window.dispatchEvent(new Event('resize'));
            }, 100);
      }
      $scope.viewColumn = function(event, column_name, type_value) {
            $("#viewmorecolumn").addClass('open');
            if (column_name == 'primero_visible') {
                  if ($scope.primero_visible) {
                        delete $scope.primero_visible;
                  } else {
                        $scope.primero_visible = 1;
                  }
            }
            if (column_name == 'segundo_visible') {
                  if ($scope.segundo_visible) {
                        delete $scope.segundo_visible;
                  } else {
                        $scope.segundo_visible = 1;
                  }
            }
            if (column_name == 'anual_visible') {
                  if ($scope.anual_visible) {
                        delete $scope.anual_visible;
                  } else {
                        $scope.anual_visible = 1;
                  }
            }
            $timeout(function() {
                  $('#tbl_indicators').niceScroll({
                        cursorcolor: "#03a9f4",
                        cursorborder: "none"
                  });
                  window.dispatchEvent(new Event('resize'));
            }, 100);
            return true;
      }

      $scope.showSearchCodigo = false;
      $scope.showSearchName = false;
      $indicators['getCodigoes']().then(function(response) {
            $scope.historyCodigoes = response;
            angular.forEach($scope.historyCodigoes, function(result, k) {
                result['match'] = true;
            });
      });
      $indicators['getRchaveHistoricNames']().then(function(response) {
            $scope.historyNames = response;
            angular.forEach($scope.historyNames, function(result, k) {
                result['match'] = true;
            });
      });

      $('#search_name').bind('input', function() { 
          if ($(this).val() != "") {
              var searchValue = $(this).val();
              angular.forEach($scope.historyNames, function(result, k) {
                result['match'] = null;
                if (result.name.toLowerCase().includes(searchValue.toLowerCase()) == 1) {
                      result['match'] = true;
                  }
              });
          } else {
              angular.forEach($scope.historyNames, function(result, k) {
                  result['match'] = true;
              });
          }
      });

      $("#search_name").focus(function(){
          setTimeout(function(){
              $scope.showSearchName = true;
              $scope.$apply();
          },100);
      });

      $("#search_name").focusout(function(){
          setTimeout(function(){
            if (!$scope.nameDown) {
              $scope.showSearchName = false;
              $scope.$apply();
            }
          },100);
      });

      $scope.searchNameUp = function(keyName) {
          angular.forEach($scope.historyNames, function(result, k) {
              result['match'] = null;
          });
          keyName['match'] = true;
          $("#search_name").val(keyName.name);
          $scope.showSearchName = false;
          $scope.nameDown = false;
      }

      $scope.searchNameDown = function() {
          $scope.nameDown = true;
      }

      $('#search_codigo').bind('input', function() { 
          if ($(this).val() != "") {
              var searchValue = $(this).val();
              angular.forEach($scope.historyCodigoes, function(result, k) {
                result['match'] = null;
                if (result.name.toLowerCase().includes(searchValue.toLowerCase()) == 1) {
                      result['match'] = true;
                  }
              });
          } else {
              angular.forEach($scope.historyCodigoes, function(result, k) {
                  result['match'] = true;
              });
          }
      });

      $("#search_codigo").focus(function(){
          setTimeout(function(){
              $scope.showSearchCodigo = true;
              $scope.$apply();
          },100);
      });

      $("#search_codigo").focusout(function(){
          setTimeout(function(){
              if (!$scope.codigoDown) {
                  $scope.showSearchCodigo = false;
                  $scope.$apply();
              }
          },100);
      });

      $scope.searchCodigoUp = function(keyCodigo) {
          angular.forEach($scope.historyCodigoes, function(result, k) {
              result['match'] = null;
          });
          keyCodigo['match'] = true;
          $("#search_codigo").val(keyCodigo.name);
          $scope.showSearchCodigo = false;
          $scope.codigoDown = false;
      }
      
      $scope.searchCodigoDown = function() {
          $scope.codigoDown = true;
      }

      // $scope.showSearchName = false;
      // $scope.keyresultNames = [
      //     {id: "0", name: "Diagnosticar 100% da empresa em relação ao fit com competências 4.0"}, {id: "1", name: "3 Secretarias médias contratam o produto de formação Nova Escola (ou 1 milhão vendidos)"}, {id: "2", name: "Aumentar em 30% número de feedbacks enviados e recebidos"}, {id: "3", name: "Aumentar em 30% número de feedbacks enviados e recebidos"}, {id: "4", name: "Aumentar em 30% número de feedbacks enviados e recebidos"}, {id: "5", name: "Aumentar em 30% número de feedbacks enviados e recebidos"}
      // ];
      // angular.forEach($scope.keyresultNames, function(result, k) {
      //     result['match'] = true;
      // });
      // $('#search_name').bind('input', function() { 
      //     if ($(this).val() != "") {
      //         var searchValue = $(this).val();
      //         angular.forEach($scope.keyresultNames, function(result, k) {
      //           result['match'] = null;
      //           if (result.name.toLowerCase().includes(searchValue.toLowerCase()) == 1) {
      //                 result['match'] = true;
      //             }
      //         });
      //     } else {
      //         angular.forEach($scope.keyresultNames, function(result, k) {
      //             result['match'] = true;
      //         });
      //     }
      // });

      // $("#search_name").focus(function(){
      //     setTimeout(function(){
      //         $scope.showSearchName = true;
      //         $scope.$apply();
      //     },100);
      // });

      // $("#search_name").focusout(function(){
      //     setTimeout(function(){
      //         $scope.showSearchName = false;
      //         $scope.$apply();
      //     },100);
      // });

      // $scope.searchNameClick = function(keyName) {
      //     angular.forEach($scope.keyresultNames, function(result, k) {
      //         result['match'] = null;
      //     });
      //     keyName['match'] = true;
      //     $("#search_name").val(keyName.name);
      // }

      $scope.results = [];

      // setTimeout(function() {
      //       $('#search_time').select2();
      //       $('#search_cycle').select2();
      //       $('#search_responsavel').select2();
      //       $('#search_objective').select2();
      //       $('#search_ativo').select2();
      // }, 300);

});