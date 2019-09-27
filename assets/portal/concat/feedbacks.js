elofy.controller('feedbacksCtrl', function globalCtrl($scope, $rootScope, $timeout, $feedbacks, $teams, $users) {

      $scope.tipos_feedback = [{
                  id: "r",
                  name: "Reconhecimento"
            },
            {
                  id: "m",
                  name: "Oportunidade de Melhoria"
            }
      ];
      $scope.acaos = [{
                  id: "1",
                  name: "Enviado"
            },
            {
                  id: "2",
                  name: "Solicitado"
            },
            {
                  id: "3",
                  name: "Anotação Privada"
            }
      ];
      var opts = {
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
      }
      $('#data_ini').datepicker(opts);
      $('#data_fim').datepicker(opts);
      $teams['getAllTeamsAccordingPermission']().then(function(response) {
            $scope.accordingTeams = response;
            $scope.remetenteTeams = JSON.parse(JSON.stringify($scope.accordingTeams));
      });
      $users['get']().then(function(users) {
            $scope.usersRemetente = users;
      });

      $scope.showDatePt = function(d) {
            if (d) return d.split(' ')[0].replace(/(\d{4})-(\d{2})-(\d{2})/, "$3/$2/$1");
            else return '';
      }
      $scope.isDateBeforeToday = function(dbDate){
            if (!dbDate) return false;
            var today = new Date();
            var d = new Date(dbDate);
            return (d - today) < 0;
      }


      $scope.reset = function() {
            delete $scope.selectedUser;
            delete $scope.selectedUserRemetente;
            delete $scope.selectedTeam;
            $('#search-user').select2('val', '');
            $('#search-user-remetente').select2('val', '');
            $('#search-team').select2('val', '');
            $('#search-team-remetente').select2('val', '');
            $('#search-tipofeedback').select2('val', '');
            $('#search-acao').select2('val', '');
            $('#data_ini').val('');
            $('#data_fim').val('');
            angular.forEach($scope.users, function(result, k) {
                  result['added'] = null;
            });
            angular.forEach($scope.usersRemetente, function(result, k) {
                  result['added'] = null;
            });
            angular.forEach($scope.accordingTeams, function(result, k) {
                  result['added'] = null;
            });
            angular.forEach($scope.remetenteTeams, function(result, k) {
                  result['added'] = null;
            });
            angular.forEach($scope.tipos_feedback, function(result, k) {
                  result['added'] = null;
            });
            angular.forEach($scope.acaos, function(result, k) {
                  result['added'] = null;
            });
            $scope.data_ini = undefined;
            $scope.data_fim = undefined;
            $scope.results = [];
            $scope.chartData = null;
            console.log("chart data:", $scope.chartData);
      }

      $scope.getIdListString = function(obj) {
            if (obj) return obj.join(',');
            else return null;
      }
      $scope.onChangeUserSelect = function() {
            angular.forEach($scope.users, function(result, key) {
                  if (result['id'] == $('#search-user').val()) result.added = true;
            });
      }
      $scope.onChangeUserRemetenteSelect = function() {
            angular.forEach($scope.usersRemetente, function(result, key) {
                  if (result['id'] == $('#search-user-remetente').val()) result.added = true;
            });
      }
      $scope.onChangeTeamSelect = function() {
            angular.forEach($scope.accordingTeams, function(result, key) {
                  if (result['id'] == $('#search-team').val()) result.added = true;
            });
      }
      $scope.onChangeTeamRemetenteSelect = function() {
            angular.forEach($scope.remetenteTeams, function(result, key) {
                  if (result['id'] == $('#search-team-remetente').val()) result.added = true;
            });
      }
      $scope.onChangeTipoSelect = function() {
            angular.forEach($scope.tipos_feedback, function(result, key) {
                  if (result['id'] == $('#search-tipofeedback').val()) result.added = true;
            });
      }
      $scope.onChangeAcaoSelect = function() {
            angular.forEach($scope.acaos, function(result, key) {
                  if (result['id'] == $('#search-acao').val()) result.added = true;
            });
      }

      $scope.resetIdLists = function() {
            $scope.teamsIdList = $scope.makeIdList($scope.accordingTeams);
            $scope.teamsRemetenteIdList = $scope.makeIdList($scope.remetenteTeams);
            $scope.usersIdList = $scope.makeIdList($scope.users);
            $scope.usersRemetenteIdList = $scope.makeIdList($scope.usersRemetente);
            $scope.tiposIdList = $scope.makeIdList($scope.tipos_feedback);
            $scope.acaosIdList = $scope.makeIdList($scope.acaos);
            console.log($scope.teamsIdList, $scope.teamsRemetenteIdList, $scope.usersIdList, $scope.usersRemetenteIdList, $scope.tiposIdList, $scope.acaosIdList,$scope.data_ini, $scope.data_fim, $scope.filtroSemRetorno);
      }

      $scope.isSelectedFilter = function() {
            if ($scope.teamsIdList.length || $scope.teamsRemetenteIdList.length || $scope.usersIdList.length || $scope.usersRemetenteIdList.length || $scope.tiposIdList.length || $scope.acaosIdList.length || $scope.data_ini != undefined || $scope.data_fim != undefined) {
                  return true;
            } else {
                  return false;
            }
            
      }

      $scope.pipesToList = function(valores) {
            if (!valores) return "";
            var sp = valores.split('|');
            var ret = "<ul>";
            angular.forEach(sp, function(result, key) {
                  ret += "<li>" + result + "</li>";
            });
            ret += "</ul>";
            return ret;
      }

      $scope.submitCsv = function() {
            $scope.resetIdLists();
            setTimeout(function() {
                  $('#form-export-csv').submit();
            }, 1000);
      }

      $scope.makeIdList = function(obj, isForAngularFilter = false) {
            var idList = [];
            angular.forEach(obj, function(result, key) {
                  if (result.added) idList.push(result.id);
            });
            if (isForAngularFilter) {
                  if (idList.length == 0) {
                        angular.forEach(obj, function(result, key) {
                              idList.push(result.id);
                        });
                  }
            }
            return idList;
      }
      $scope.results = [];
      $scope.chartData = null;
      $scope.applyFilter = function() {
            $scope.resetIdLists();
            if (!$scope.isSelectedFilter()) {
                  alert("Por favor, selecione ao menos um parâmetro de pesquisa!");
                  return;
            }
            $feedbacks['list']($scope.teamsIdList, $scope.teamsRemetenteIdList, $scope.usersIdList, $scope.usersRemetenteIdList, $scope.tiposIdList, $scope.acaosIdList, $scope.data_ini, $scope.data_fim, $scope.filtroSemRetorno).then(function(response) {
                  $scope.results = response;
            });
            $feedbacks['getFeedbackChartData']($scope.teamsIdList, $scope.teamsRemetenteIdList, $scope.usersIdList, $scope.usersRemetenteIdList, $scope.tiposIdList, $scope.acaosIdList, $scope.data_ini, $scope.data_fim, $scope.filtroSemRetorno).then(function(response) {
                  console.log("chart data query:", response);
                  $scope.chartData = response;
                  $scope.showChart();
            });
      }
      // $scope.applyFilter();
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
            if (column_name == 'prazo_visible') {
                  if ($scope.prazo_visible) {
                        delete $scope.prazo_visible;
                  } else {
                        $scope.prazo_visible = 1;
                  }
            }
            if (column_name == 'time_r_visible') {
                  if ($scope.time_r_visible) {
                        delete $scope.time_r_visible;
                  } else {
                        $scope.time_r_visible = 1;
                  }
            }
            if (column_name == 'time_d_visible') {
                  if ($scope.time_d_visible) {
                        delete $scope.time_d_visible;
                  } else {
                        $scope.time_d_visible = 1;
                  }
            }
            if (column_name == 'sol_visible') {
                  if ($scope.sol_visible) {
                        delete $scope.sol_visible;
                  } else {
                        $scope.sol_visible = 1;
                  }
            }
            if (column_name == 'tipo_visible') {
                  if ($scope.tipo_visible) {
                        delete $scope.tipo_visible;
                  } else {
                        $scope.tipo_visible = 1;
                  }
            }
            if (column_name == 'valore_visible') {
                  if ($scope.valore_visible) {
                        delete $scope.valore_visible;
                  } else {
                        $scope.valore_visible = 1;
                  }
            }
            $timeout(function() {
                  $('#tbl_feedbacks').niceScroll({
                        cursorcolor: "#03a9f4",
                        cursorborder: "none"
                  });
                  window.dispatchEvent(new Event('resize'));
            }, 100);
            return true;
      }
      $scope.showChart = function() {
        var chartAcaos = $scope.chartData.acao;
        var acaoLabel = [], acaoData = [], acaoBackground = [];
        angular.forEach(chartAcaos, function(result, k) {
              acaoLabel.push("Feedbacks " + result.tipo);
              acaoData.push(result.counts);
              var backColor = "#FF00FF";
              if (result.tipo == "Solicitados") { backColor = "#01D799"; }
              else if (result.tipo == "Privado") { backColor = "#FCFF00"; }
              acaoBackground.push(backColor);
        });        
        var dataPieAcao = {
          labels: acaoLabel,
          datasets: [{
            data: acaoData,
            backgroundColor: acaoBackground
          }]
        };

        var optionsPie = {
          legend: {
              display: true,
              position: 'right',
              labels: {
                padding: 20
              }
            },
          maintainAspectRatio: false,
          plugins: {
            datalabels: {
              color: 'white',
              font: {
                size: '16'
              },
            }
          },
        };

        var ctxPieAcao = document.getElementById("feedback_soli_chart");
        var myPieChartAcao = new Chart(ctxPieAcao, {
          type: 'pie',
          plugins: [ChartDataLabels],
          data: dataPieAcao,
          options: optionsPie
        });
        myPieChartAcao.clear();
        myPieChartAcao.update();

        var chartTipo = $scope.chartData.tipo;
        var tipoLabel = [], tipoData = [], tipoBackground = [];
        angular.forEach(chartTipo, function(result, k) {
              tipoLabel.push(result.tipo);
              tipoData.push(result.counts);
              var backColor = "#FF00FF";
              if (result.tipo == "Reconhecimento") { backColor = "#006CE8"; }
              tipoBackground.push(backColor);
        });        
        var dataPieTipo = {
          labels: tipoLabel,
          datasets: [{
            data: tipoData,
            backgroundColor: tipoBackground
          }]
        };

        var ctxPieTipo = document.getElementById("feedback_tipo_chart");
        var myPieChartTipo = new Chart(ctxPieTipo, {
          type: 'pie',
          plugins: [ChartDataLabels],
          data: dataPieTipo,
          options: optionsPie
        });
        myPieChartTipo.clear();
        myPieChartTipo.update();

        var chartTime = $scope.chartData.time;
        // var testLabel = ['asdfqewrkl qweirqwr  qweirpjqw', 'aasdf', '14i81425', '231ip1234jp131235py125 1253ihp', '1-23235125hoi2h5kljewa;rk'];
        var timeLabel = [], timeData = [], timeBackground = [];
        angular.forEach(chartTime, function(result, k) {
              var realLabel = result.nome_unidade;
              var tmpLbl = [];
              while (realLabel.length > 50) {
                tmpLbl.push(realLabel.slice(0,50));
                realLabel = realLabel.slice(50, realLabel.length);
              }
              tmpLbl.push(realLabel);
              timeLabel.push(tmpLbl);
              timeData.push(result.counts);
              var backColor = "#006CE8";
              timeBackground.push(backColor);
        });
        var dataBarTime = {
          labels: timeLabel,
            datasets: [{
              data: timeData,
              backgroundColor: timeBackground,
                    borderWidth: 0
          }]
        };
        var optionsBar = {
          scales: {
            yAxes: [{
              stacked: true,
              ticks: {
                  beginAtZero:true
              },
              gridLines: {
                display: false,
                drawBorder: false,
              },
              maxBarThickness: 30
            }],
            xAxes: [{
              ticks: {
                  beginAtZero:true
              },
              gridLines: {
                display: false,
                drawBorder: false,
              }
            }]
          },
          legend: {
            display: false
          },
          maintainAspectRatio: false,
          plugins: {
            datalabels: {
              color: 'white',
              display: function(context) {
                return context.dataset.data[context.dataIndex];
              },
              font: {
                // weight: 'bold'
              },
            }
          },
        };

        var ctxBarTime = document.getElementById("feedback_time_chart");
        var myBarChartTime = new Chart(ctxBarTime, {
            type: 'horizontalBar',
            plugins: [ChartDataLabels],
            data: dataBarTime,
            options: optionsBar
        });
        myBarChartTime.clear();
        myBarChartTime.update();

        var chartGestor = $scope.chartData.gestor;
        var gestorLabel = [], gestorData = [], gestorBackground = [];
        angular.forEach(chartGestor, function(result, k) {
              gestorLabel.push(result.nome_usuario);
              gestorData.push(result.counts);
              var backColor = "#01D799";
              gestorBackground.push(backColor);
        });
        var dataBarGestor = {
          labels: gestorLabel,
            datasets: [{
              data: gestorData,
              backgroundColor: gestorBackground,
                    borderWidth: 0
          }]
        };
        var ctxBarGestor = document.getElementById("feedback_gestor_chart");
        var myBarChartGestor = new Chart(ctxBarGestor, {
            type: 'horizontalBar',
            plugins: [ChartDataLabels],
            data: dataBarGestor,
            options: optionsBar
        });
        myBarChartGestor.clear();
        myBarChartGestor.update();

        var chartValore = $scope.chartData.va;
        var valoreLabel = [], areaData = [], areaBackground = [], avgData = [], avgBackground = [];
        angular.forEach(chartValore, function(result, k) {
              var realLabel = result.nome_valor;
              var tmpLbl = [];
              while (realLabel.length > 50) {
                tmpLbl.push(realLabel.slice(0,50));
                realLabel = realLabel.slice(50, realLabel.length);
              }
              tmpLbl.push(realLabel);
              valoreLabel.push(tmpLbl);
              areaData.push(result.counts);
              avgData.push(Math.round(result.avg * 100) / 100);
              var backColor = "#006CE8";
              areaBackground.push(backColor);
              avgBackground.push("#FF00FF");
        });
        var dataBarArea = {
          labels: valoreLabel,
            datasets: [{
              data: areaData,
              backgroundColor: areaBackground,
                    borderWidth: 0
          }]
        };
        var dataBarAvg = {
          labels: valoreLabel,
            datasets: [{
              data: avgData,
              backgroundColor: avgBackground,
                    borderWidth: 0
          }]
        };
        var ctxBarArea = document.getElementById("feedback_area_chart");
        var myBarChartArea = new Chart(ctxBarArea, {
            type: 'horizontalBar',
            plugins: [ChartDataLabels],
            data: dataBarArea,
            options: optionsBar
        });
        myBarChartArea.clear();
        myBarChartArea.update();

        var ctxBarAvg = document.getElementById("feedback_valores_chart");
        var myBarChartAvg = new Chart(ctxBarAvg, {
            type: 'horizontalBar',
            plugins: [ChartDataLabels],
            data: dataBarAvg,
            options: optionsBar
        });
        myBarChartAvg.clear();
        myBarChartAvg.update();

        // var avgLabel = [], avgData = [], index = 0;
        // angular.forEach(chartValore, function(result, k) {
        //       // if (index >=6) { return; }
        //       avgLabel.push(result.nome_valor);
        //       avgData.push(result.avg);
        //       // index++;
        // });

        // var dataRadar = {
        //     labels :  avgLabel,
        //     datasets : [
        //       {
        //         data : avgData,
        //         label: 'Average Score',
        //         "borderColor": '#FF00FF',
        //         "pointBackgroundColor": "#FF00FF",
        //         "pointBorderColor": "#FF00FF",
        //         fill: false
        //       }
        //   ]
        // };
        // var optionsRadar = {
        //   percentageInnerCutout: 100,
        //   legend: {
        //     display: true,
        //     position: 'right',
        //     labels: {
        //       padding: 20
        //     }
        //   },
        //   maintainAspectRatio: false
        // };
        // var ctxRadar = document.getElementById("feedback_valores_chart");
        // var myRadarChart = new Chart(ctxRadar, {
        //   type: 'radar',
        //   data: dataRadar,
        //   options: optionsRadar
        // });
      }

      setTimeout(function() {
            $("#search-user").select2();
            $("#search-user-remetente").select2();
            $('#search-team').select2();
            $('#search-team-remetente').select2();
            $('#search-tipofeedback').select2();
            $('#search-acao').select2();
      }, 300);

});