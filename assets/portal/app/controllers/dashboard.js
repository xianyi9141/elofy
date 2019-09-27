elofy.controller('dashboardCtrl', function globalCtrl($scope, $timeout, $teams, $years, $cycles, $dashboard) {
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

  $dashboard['get']({
    team: $scope.selectedTeam,
    year: $scope.selectedYear,
    cycle: $scope.selectedCycle
  }).then(function(dash){
    $scope.dash = dash;

    $timeout(function(){
      $scope.initDash();
    }, 10);

    $timeout(function(){
      $scope.updateDash();
    }, 1000);
  });

  $scope.filter = function(){
    $('#ash-header .filter').button('loading');

    $dashboard['get']({
      team: $scope.selectedTeam,
      year: $scope.selectedYear,
      cycle: $scope.selectedCycle
    }).then(function(dash){
      $scope.dash = dash;

      $('#ash-header .filter').button('reset');

      $scope.updateDash();
    });
  }

  var chartBar,
      chartPie,
      chartBarVertical,
      chartArea;

	$scope.initDash = function(){
    var fakeBar = ['Quantidade'];

    for (var i=0, len=$scope.dash.barchart.quantidade.length; i < len-1; i++) {
      fakeBar.push(0);
    };

    chartBar = c3.generate({
      bindto: '#chart-bar',
      data: {
        x: $scope.dash.barchart.name[0],
        columns: [
        	$scope.dash.barchart.name,
        	fakeBar
        ],
        type: 'bar',
        colors: {
          Quantidade: '#3fb9ea'
        }
      },
      transition: {
        duration: 1000
      },
      axis: {
        x: {
          type: 'category'
        }
      },
      bar: {
        width: {
          ratio: 0.5
        }
      },
      legend: {
        show: false
      }
  	});

    var fakePie = [];

    for (var i=0, len=$scope.dash.donut.length; i < len; i++) {
      var array = [$scope.dash.donut[i][0], 0]
      fakePie.push(array);
    };

  	chartPie = c3.generate({
      bindto: '#chart-pie',
      size: {
        height: 270,
        width: 270
      },
      data: {
        columns: fakePie,
        type : 'donut'
      },
      color: {
        pattern: ['#ff6264', '#5bc19a', '#d13c3e', '#ffaaab']
      },
      donut: {
        title: "OKRs Finalizados",
        width: 35,
        label: {
          show: false
        }
      },
      transition: {
        duration: 1000
      },
    legend: {
        show: false
      }
  	});


    var fakeBarVertical = ['Porcentagem'];

    for (var i=0, len=$scope.dash.barchartvertical.porcentagem.length; i < len-1; i++) {
      fakeBarVertical.push(0);
    };

    chartBarVertical = c3.generate({
      bindto: '#chart-bar-vertical',
      data: {
          x : 'Times',
          columns: [
            $scope.dash.barchartvertical.times,
            fakeBarVertical
          ],
          type: 'bar',
          colors: {
            Porcentagem: '#3fb9ea'
          }
      },
      transition: {
        duration: 1000
      },
      axis : {
          rotated : true,
          x : {
              type : 'category'
          },
          y : {
            tick:{
              format: function (y) {
                var i = y*100;

                if(i%10 == 0){
                  return i + '%';
                }else{
                  return '';
                }
              }
            }
          }
      },
      bar: {
          width: {
              ratio: 0.5
          }
      },
      legend: {
        show: false
      }
    });

    var fakeArea = ['Quantidade'];
    var categories = $scope.dash.barchartline.ciclo.splice(1, 100);

    for (var i=0, len=$scope.dash.barchartline.qnt.length; i < len-1; i++) {
      fakeArea.push(0);
    };

    chartArea = c3.generate({
      bindto: '#chart-area',
      data: {
          columns: [
            fakeArea
          ],
          colors: {
            Quantidade: '#000'
          }
      },
      grid: {
          y: {
              show: true
          }
      },
      transition: {
        duration: 1000
      },
      axis: {
          x: {
              label: 'Trimestre',
              type: 'category',
              categories: categories
          },
          y: {
              label: 'Quantidade',
              tick: { format: d3.format("d") }
          }
      },
      legend: {
        show: false
      }
    });
  }

  $scope.updateDash = function(){
    chartBar.load({
      columns: [
        $scope.dash.barchart.name,
        $scope.dash.barchart.quantidade
      ]
    });

    chartPie.load({
      columns: $scope.dash.donut
    });

    d3.select('#chart-pie .c3-chart-arcs-title').node().innerHTML = "OKRs Finalizados <tspan tspan x='0' dy='1.2em'>" + $scope.dash.donut[1][1] + "%</tspan>";

    chartBarVertical.load({
      columns: [
        $scope.dash.barchartvertical.times,
        $scope.dash.barchartvertical.porcentagem
      ]
    });

    chartArea.load({
      columns: [
        $scope.dash.barchartline.qnt
      ]
    });
  }

  $('.sidebar-collapse a').click(function(){
      chartBar.resize();
      chartBarVertical.resize();
      chartArea.resize();
  });
});