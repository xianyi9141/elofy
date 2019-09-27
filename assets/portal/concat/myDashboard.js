elofy.controller('myDashboard', function globalCtrl($scope, $timeout, $years, $cycles, $users, $teams, $tags, $skills, $tatics, $globals, $empressa, $elos, timeAgo, nowTime, $dashboard, $carreers, $cargo, $translate, $routeParams, $filter, $mydashboard) {
    $scope.changeTeam = false;
	$scope.showAlternate = false;
    $scope.changeCiclo = false;
	$scope.initialview = true;
    $users['me']().then(function(res) {
        Chart.defaults.global.defaultFontFamily = "'Roboto', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
        Chart.defaults.global.legend.position = 'right';
        Chart.defaults.global.legend.labels.usePointStyle = true;
        Chart.defaults.global.legend.labels.boxWidth = 15;
        Chart.defaults.global.tooltips.backgroundColor = '#000';
        Chart.defaults.global.responsive = true;
        Chart.defaults.global.maintainAspectRatio = false;
        var currentDate = moment(new Date()).format("YYYY-MM-DD");
        $scope.baseUrl = baseurl;
        $scope.loggeduser_details = $scope.$parent.user;
        if ($scope.selectedYear) {
            $scope.selectedYear = $scope.selectedYear;
        } else {
            $scope.selectedYear = new Date().getFullYear();
        }

        var selectd_year = $scope.selectedYear;
        $scope.getAllCurrentCycles = function(selectd_year){
            $mydashboard['getAllCurrentCycles'](selectd_year).then(function(res) {
                $scope.cicles = res;  
            })
        }
        $scope.initScroll = function() {
            // $(".scroller-height-charts").css('height', '100%');
            $(".dashboard-section .nav.metismenu").getNiceScroll().remove();
            $(".scroller-height-charts").getNiceScroll().remove();
            $timeout(function() {
                $(".dashboard-section .nav.metismenu").niceScroll({
                    horizrailenabled: false,
                    cursorcolor: "#3FB9EA"
                }).onResize();
                $(".scroller-height-charts").niceScroll({
                    horizrailenabled: false,
                    cursorcolor: "#3FB9EA"
                }).onResize();
            }, 100);
        }
        $scope.initScroll();
        $scope.FilterChartByClickOnChart = function(id_ciclo, id_time = '', type = '', value = '') {
            // $scope.initScroll();
            var parent_id = $('.dashboard-section').find('.red-side').data('global');
            if (parent_id == '') {
                parent_id = null;
            }
            $mydashboard['filterChartAndObjectivos'](id_ciclo, id_time, type, value, parent_id).then(function(response) {
                $scope.subGoals = response;
            });
        }
        $scope.loadDefaultCharts = function(parent_id, id_times = '', id_ciclos = '') {
            $(".scroller-height-charts").animate({
                scrollTop: 0
            }, 500);
			if(!$scope.initialview){				
				$('#myChart1').remove(); // this is my <canvas> element
				$('#myChart2').remove(); // this is my <canvas> element
				$('#myChart3').remove(); // this is my <canvas> element
				$('#myChart4').remove(); // this is my <canvas> element
				$('#myChart5').remove(); // this is my <canvas> element
				$('.sec1,.sec2,.sec3,.sec4').css('width', '100%');
				$('.sec1').append('<canvas id="myChart1"><canvas>');
				$('.sec2').append('<canvas id="myChart2"><canvas>');
				$('.sec3').append('<canvas id="myChart3"><canvas>');
				$('.sec4').append('<canvas id="myChart5"><canvas>');
			}
			$scope.initialview	=	false;
            $teams['getAllTeams']().then(function(response_team) {
                $scope.teams = response_team;
                
                //$scope.initScroll();
                //var canvas = document.createElement("canvas");
                $timeout(function() {
                    //$('#selectedTime').select2('val','');
                    $cycles['getCyclesIdByDate'](currentDate).then(function(cycle_data) {
                        var parent_id = $('.dashboard-section').find('.red-side').data('global');
                        var id_ciclo = $('#selectedCiclo').val();
                        var id_time = $('#selectedTime').val();
                        if (parent_id == '') {
                            parent_id = null;
                        }
                        if (id_ciclos == '') {
                            /* if((id_ciclo == undefined || id_ciclo == '') && !$scope.changeCiclo){
                                var id_cycle    = cycle_data.id;
                                  $('#selectedCiclo').select2('val',id_cycle);
                            }
                            else{
                                  var id_cycle    = id_ciclo;
                            } */
                            $('#selectedCiclo').select2('val', '');
                        } else {
                            var id_cycle = id_ciclos;
                            $('#selectedCiclo').select2('val', id_ciclos);
                        }
                        if (id_times == '') {
                            /*  if((id_time == undefined || id_time == '') && !$scope.changeTeam){
                                 var id_time     = res.usuarioviewTime.id_time;
                                 $('#selectedTime').select2('val',id_time);
                             }else{
                                   var id_time     = id_time;
                             } */
                            $('#selectedTime').select2('val', '');
                        } else {
                            var id_time = id_times;
                            $('#selectedTime').select2('val', id_times);
                        }
                        
                        $scope.getAllCurrentCycles($scope.selectedYear);
                        //alert(id_cycle);return false;
                        $mydashboard['getGraphData'](id_time, id_cycle, parent_id,$scope.selectedYear).then(function(graph_data_res) {
							if(graph_data_res[0].length <= 0){
								$scope.showAlternate = true;
							}
                            $scope.subGoals = graph_data_res[4];
                            $("#graph_not_found").hide();
                            $("#graph_found").show();
                            /* if(graph_data_res[0].length < 1){
                            	$("#graph_not_found").show();
                            	$("#graph_found").hide();
                            }
                            if(graph_data_res[1].length < 1){
                            	$("#graph_not_found").show();
                            	$("#graph_found").hide();
                            }
                            if(graph_data_res[2].length < 1){
                            	$("#graph_not_found").show();
                            	$("#graph_found").hide();
                            } */
                            if (graph_data_res[4].length < 1) {
                                $("#graph_not_found").show();
                                $("#graph_found").hide();
                            }
                            /*****************************************
                            Pie Chart Styles
                            ******************************************/
                            var graph_array1_label = [];
                            var graph_array1_data = [];
                            var graph_array1_color_data = [];
                            var graph_array1_ids = [];
                            var Chart1Colors = ['#FFF572', '#54D490', '#66CCFB', '#FFA7A8'];
                            angular.forEach(graph_data_res[0], function(item, key) {
                                graph_array1_label.push(item.total + ' Objetivos ' + item.situacaos);
                                graph_array1_data.push(item.total);
                                graph_array1_color_data.push(Chart1Colors[item.situacao]);
                            });
							// $timeout(function() {
								var ctx = document.getElementById("myChart1");
								//debugger;
								var data = {
									labels: graph_array1_label,
									datasets: [{
										data: graph_array1_data,
										backgroundColor: graph_array1_color_data,
									}]
								}
								var myNewChart = new Chart(ctx, {
									type: 'pie',
									data: data,
									options: {
										'onClick': function(evt) {
											var activePoints = myNewChart.getElementsAtEvent(evt);
											if (activePoints[0]) {
												var chartData = activePoints[0]['_chart'].config.data;
												var idx = activePoints[0]['_index'];
												var label = chartData.labels[idx];
												var value = chartData.datasets[0].data[idx];
												var color = chartData.datasets[0].backgroundColor[idx]; //Or any other data you wish to take from the clicked slice
												var situacaoValue = Chart1Colors.indexOf(color);
												var id_ciclo = $('#selectedCiclo').val();
												var id_time = $('#selectedTime').val();
												$scope.FilterChartByClickOnChart(id_ciclo, id_time, 'situacao', situacaoValue);
											}
											$(".scroller-height-charts").animate({
												scrollTop: $("#goalstable").offset().top
											}, 500);
										},
										"animation": {
											"onComplete": function() {
												var chartInstance = this.chart,
													ctx = chartInstance.ctx;
												ctx.fillStyle = 'black';
												ctx.font = '12px Calibri';
											}
										},
										legend: {
											display: true,
											position: 'right',
											labels: {
												padding: 20
											}
										},
										tooltips: {
											"enabled": false
										},
										scales: {
											yAxes: [{
												gridLines: {
													display: false,
													drawBorder: false,
												},
												ticks: {
													display: false
												},
											}],
											xAxes: [{
												gridLines: {
													display: false,
													drawBorder: false,
												},
												ticks: {
													display: false
												},
											}]
										}
									}
								});
								myNewChart.clear();
								myNewChart.update();	
							// },1500);
                            
							
                            /*****************************************
                            Pie Chart Styles
                            ******************************************/
							// $timeout(function() {
								var graph_array2_label = [];
								var graph_array2_data = [];
								var Chart2Colors = ['#ac88b3', '#66CCFB', '#FFF572', '#FFA7A8'];
								var graph_array2_color_data = [];
								// console.log(graph_data_res[1]);
								angular.forEach(graph_data_res[1], function(item, key) {
									graph_array2_label.push(item.total + ' ' + item.cors);
									graph_array2_data.push(item.total);
									graph_array2_color_data.push(Chart2Colors[item.cor]);
								});
								var ctx2 = document.getElementById("myChart2");
								//debugger;
								var data2 = {
									labels: graph_array2_label,
									datasets: [{
										data: graph_array2_data,
										backgroundColor: graph_array2_color_data,
									}]
								}
								var myNewChart2 = new Chart(ctx2, {
									type: 'pie',
									data: data2,
									options: {
										'onClick': function(evt) {
											var activePoints = myNewChart2.getElementsAtEvent(evt);
											if (activePoints[0]) {
												var chartData = activePoints[0]['_chart'].config.data;
												var idx = activePoints[0]['_index'];
												var label = chartData.labels[idx];
												var value = chartData.datasets[0].data[idx];
												var color = chartData.datasets[0].backgroundColor[idx]; //Or any other data you wish to take from the clicked slice
												var id_time = $('#selectedTime').val();
												var corValue = Chart2Colors.indexOf(color);
												var id_ciclo = $('#selectedCiclo').val();
												$scope.FilterChartByClickOnChart(id_ciclo, id_time, 'cor', corValue);
											}
											$(".scroller-height-charts").animate({
												scrollTop: $("#goalstable").offset().top
											}, 500);
										},
										legend: {
											display: true,
											position: 'right',
											labels: {
												padding: 20
											}
										},
										tooltips: {
											"enabled": false
										},
										scales: {
											yAxes: [{
												gridLines: {
													display: false,
													drawBorder: false,
												},
												ticks: {
													display: false
												},
											}],
											xAxes: [{
												gridLines: {
													display: false,
													drawBorder: false,
												},
												ticks: {
													display: false,
												},
											}]
										}
									}
								});
								myNewChart2.clear();
								myNewChart2.update();
							// },1500);
                            /*****************************************
                              HorizontalBar Chart Styles
                            ******************************************/
							// $timeout(function() {
                            var graph_array3_label = [];
                            var graph_array3_full_label = [];
                            var graph_array3_data = [];
                            var graph_array3_ids = [];
                            if (graph_data_res[2].length < 3) {
                                document.getElementsByClassName("sec3")[0].style.maxHeight = 50 * graph_data_res[2].length + "px";
                            }else{
                                document.getElementsByClassName("sec3")[0].style.maxHeight = 30 * graph_data_res[2].length + "px";
                            }
                            
                            angular.forEach(graph_data_res[2], function(item, key) {
                                graph_array3_full_label.push(item.nome_unidade);
                                // console.log(item.id_time);
                                graph_array3_ids.push(item.id_time);
                                if (item.nome_unidade.length > 8) {
                                    //graph_array3_label.push(item.nome_unidade.substring(0, 18) + " ....");
                                    graph_array3_label.push(item.nome_unidade);
                                } else {
                                    graph_array3_label.push(item.nome_unidade);
                                }
                                graph_array3_data.push(item.total);
                            });
                            var ctx = document.getElementById("myChart3");
                            //debugger;
                            var data = {
                                labels: graph_array3_label,
                                datasets: [{
                                    data: graph_array3_data,
                                    backgroundColor: "#5eb5ef",
                                }]
                            }
                            var myNewChart3 = new Chart(ctx, {
                                type: 'horizontalBar',
                                // data: [{x:'2016-12-25', y:20}, {x:'2016-12-26', y:10}],
                                data: data,
                                options: {
                                    'onClick': function(evt) {
                                        var activePoints = myNewChart3.getElementsAtEvent(evt);
                                        if (activePoints[0]) {
                                            var chartData = activePoints[0]['_chart'].config.data;
                                            var idx = activePoints[0]['_index'];
                                            var label = chartData.labels[idx];
                                            var value = chartData.datasets[0].data[idx];
                                            var color = chartData.datasets[0].backgroundColor[idx];
                                            var id_time = graph_array3_ids[idx];
                                            var id_ciclo = $('#selectedCiclo').val();
                                            $scope.FilterChartByClickOnChart(id_ciclo, id_time);
                                        }
                                        $(".scroller-height-charts").animate({
                                            scrollTop: $("#goalstable").offset().top
                                        }, 500);
                                    },
                                    "animation": {
                                        "duration": 1,
                                        "onComplete": function() {
                                            var chartInstance = this.chart,
                                                ctx = chartInstance.ctx;
                                            ctx.fillStyle = 'black';
                                            ctx.font = '12px Calibri';
                                            /* this.data.datasets.forEach(function(dataset, i) {
                                              var meta = chartInstance.controller.getDatasetMeta(i);
                                              meta.data.forEach(function(bar, index) {
                                                var data = dataset.data[index];
										
                                                ctx.fillText(data, bar._model.x + 10, bar._model.y + 4);
                                                ctx.fillStyle = 'black';
                                                ctx.font = '12px Calibri';
                                              });
                                            }); */
                                        }
                                    },
                                    barPercentage: 0.5,
                                    legend: {
                                        "display": false
                                    },
                                    /* tooltips: {
                                      "enabled": false
                                    }, */
                                    tooltips: {
                                        // Disable the on-canvas tooltip
                                        enabled: false,
                                        custom: function(tooltipModel, d) {
                                            // Tooltip Element
                                            var tooltipEl = document.getElementById('chartjs-tooltip');
                                            // Create element on first render
                                            if (!tooltipEl) {
                                                tooltipEl = document.createElement('div');
                                                tooltipEl.id = 'chartjs-tooltip';
                                                tooltipEl.innerHTML = "<table></table>";
                                                document.body.appendChild(tooltipEl);
                                            }
                                            // Hide if no tooltip
                                            if (tooltipModel.opacity === 0) {
                                                tooltipEl.style.opacity = 0;
                                                return;
                                            }
                                            // Set caret Position
                                            tooltipEl.classList.remove('above', 'below', 'no-transform');
                                            if (tooltipModel.yAlign) {
                                                tooltipEl.classList.add(tooltipModel.yAlign);
                                            } else {
                                                tooltipEl.classList.add('no-transform');
                                            }

                                            function getBody(bodyItem) {
                                                return bodyItem.lines;
                                            }
                                            // Set Text
                                            if (tooltipModel.body) {
                                                var titleLines = tooltipModel.title || [];
                                                var bodyLines = tooltipModel.body.map(getBody);
                                                var innerHtml = '<thead>';
                                                titleLines.forEach(function(title) {
                                                    // console.log(title);
                                                    dataindex = graph_array3_label.indexOf(title);
                                                    // graph_array3_label.indexOf(title);
                                                    innerHtml += '<tr ><th style="color: #fff; background: black; padding:5px 8px; border-radius: 5px;">' + graph_array3_full_label[dataindex] + '';
                                                });
                                                bodyLines.forEach(function(body, i) {
                                                    var colors = tooltipModel.labelColors[i];
                                                    var style = 'background:' + colors.backgroundColor;
                                                    style += '; border-color:' + colors.borderColor;
                                                    style += '; border-width: 2px';
                                                    var span = '<span style="' + style + '"></span>';
                                                    innerHtml += ' ' + span + body + '</th></tr>';
                                                    // console.log(body);
                                                });
                                                innerHtml += '</thead><tbody>';
                                                innerHtml += '</tbody>';
                                                var tableRoot = tooltipEl.querySelector('table');
                                                tableRoot.innerHTML = innerHtml;
                                            }
                                            // `this` will be the overall tooltip
                                            var position = this._chart.canvas.getBoundingClientRect();
                                            // Display, position, and set styles for font
                                            tooltipEl.style.opacity = 1;
                                            tooltipEl.style.position = 'absolute';
                                            tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
                                            tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY - 20 + 'px';
                                            tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily;
                                            tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px';
                                            tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle;
                                            tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px';
                                            tooltipEl.style.pointerEvents = 'none';
                                        }
                                    }
                                    /* tooltips: {
                                    	enabled: true,
                                    	// mode: 'single',
                                    	callbacks: {
                                    		label: function(tooltipItems, data) { 
                                    			// console.log(tooltipItems);
                                    			// return tooltipItems.xLabel;
                                    			return graph_array3_full_label[tooltipItems.index];
                                    		}
                                    	}
                                    } */
                                    ,
                                    scales: {
                                        yAxes: [{
                                            gridLines: {
                                                display: false
                                            },
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                // userCallback: function(label, index, labels) {
                                                //     // when the floored value is the same as the value we have a whole number
                                                //     if (Math.floor(label) === label) {
                                                //         return label;
                                                //     }
                                                // },
                                                beginAtZero:true
                                            },
                                            gridLines: {
                                                display: false
                                            }
                                        }]
                                    },
                                    layout: {
                                        padding: {
                                            left: 100,
                                            right: 0,
                                            top: 0,
                                            bottom: 0
                                        }
                                    }
                                }
                            });
                            myNewChart3.clear();
                            myNewChart3.update();
							// },1500);
							
                            /*****************************************
                              Line Chart Styles
                            ******************************************/
							// $timeout(function() {
                            var graph_array4_label = [];
                            var graph_array4_ids = [];
                            var graph_array4_data = [];
                            angular.forEach(graph_data_res[3], function(item, key) {
                                graph_array4_ids.push(item.id_ciclo);
                                graph_array4_label.push(item.nome_ciclo);
                                graph_array4_data.push(item.total);
                            });
                            var ctx = document.getElementById("myChart5");
                            //debugger;
                            var data = {
                                labels: graph_array4_label,
                                datasets: [{
                                    data: graph_array4_data,
                                    pointBackgroundColor: '#000000',
                                    backgroundColor: 'transparent',
                                    pointBorderWidth: 10,
                                    fill: false,
                                }]
                            }
                            var myNewChart4 = new Chart(ctx, {
                                type: 'line',
                                data: data,
                                options: {
                                    response: true,
                                    hover: {
                                        animationDuration: 500,
                                        mode: "nearest",
                                        intersect: true
                                    },
                                    'onClick': function(evt) {
                                        var activePoints = myNewChart4.getElementsAtEvent(evt);
                                        if (activePoints[0]) {
                                            var chartData = activePoints[0]['_chart'].config.data;
                                            var idx = activePoints[0]['_index'];
                                            var label = chartData.labels[idx];
                                            var value = chartData.datasets[0].data[idx];
                                            var color = chartData.datasets[0].backgroundColor[idx]; //Or any other data you wish to take from the clicked slice
                                            var id_ciclo = graph_array4_ids[idx];
                                            var id_time = $('#selectedTime').val();
                                            $scope.FilterChartByClickOnChart(id_ciclo, id_time);
                                        }
                                        $(".scroller-height-charts").animate({
                                            scrollTop: $("#goalstable").offset().top
                                        }, 500);
                                    },
                                    "animation": {
                                        // "duration": 1,
                                        "onComplete": function() {
                                            var chartInstance = this.chart,
                                                ctx = chartInstance.ctx;
                                            ctx.fillStyle = 'black';
                                            ctx.font = '12px Calibri';
                                        }
                                    },
                                    legend: {
                                        display: false,
                                    },
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false,
                                        // mode: 'single',
                                        callbacks: {
                                            label: function(tooltipItems, data) {
                                                return tooltipItems.yLabel;
                                            }
                                        }
                                    },
                                    scales: {
                                        yAxes: [{
                                            gridLines: {
                                                display: true
                                            },
                                            ticks: {
                                                display: true
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                                display: true
                                            }
                                        }]
                                    },
                                    bezierCurve: false,
                                    elements: {
                                        line: {
                                            tension: 0
                                        }
                                    },
                                }
                            });
                            myNewChart4.clear();
                            myNewChart4.update();
							// },1500);
                        });
                    });
                }, 1500);
            });
        }
        $scope.loadDefaultCharts();
        $('#selectedTime').change(function() {
            $scope.changeTeam = true;
            var id_time = $(this).val();
            $('#selectedTime').select2('val', id_time);
            $('#selectedTime').val(id_time);
            var id_ciclo = $('#selectedCiclo').val();
            $timeout(function() {
                $scope.loadDefaultCharts('', id_time, id_ciclo);
            }, 800);
        });
        $('#selectedCiclo').change(function() {
            $scope.changeCiclo = true;
            var id_ciclo = $(this).val();
            $('#selectedCiclo').select2('val', id_ciclo);
            $('#selectedCiclo').val(id_ciclo);
            var id_time = $('#selectedTime').val();
            $timeout(function() {
                $scope.loadDefaultCharts('', id_time, id_ciclo);
            }, 800);
        });
        $scope.showChartById = function(parent_id) {
            $('.dashboard-section').find('.red-side').removeClass('red-side');
            $('#global_' + parent_id).addClass('red-side');
            $('#selectedCiclo').select2();
            $('#selectedTime').select2();
            var myCompetenciaRadar;
            $scope.loadDefaultCharts(parent_id);
        }
        $scope.showChartByCycleId = function() {
            var id_ciclo = $('#selectedCiclo').val();
            var parent_id = $('.dashboard-section').find('.red-side').data('global');
            if (parent_id == '') {
                parent_id = null;
            }
            var id_ciclo = id_ciclo;
            var id_time = null;
            $scope.loadDefaultCharts(parent_id, id_ciclo, id_time);
        }
        $scope.showChartByTeamId = function() {
            var id_time = $('#selectedTime').val();
            var parent_id = $('.dashboard-section').find('.red-side').data('global');
            if (parent_id == '') {
                parent_id = null;
            }
            var id_ciclo = null;
            var id_time = id_time;
            $scope.loadDefaultCharts(parent_id, id_ciclo, id_time);
        }
        $scope.checkScreenSize = function() {
            var newWindowWidth = $(window).width();
            if (newWindowWidth <= 768) {
                $(this).removeClass("active");
                $(".app-side").removeClass("is-open");
                $(".app-main").removeClass("side-open");
                $(".overlay").removeClass("active");
            } else {}
        }
        $(".menu-toggle-wrapper").click(function() {
            $scope.initScroll();
            $(this).toggleClass("active");
            $(".app-side").toggleClass("is-open");
            $(".app-main").toggleClass("side-open");
            $(".overlay").addClass("active");
        });
        $(".overlay").click(function() {
            $scope.initScroll();
            $(".menu-toggle-wrapper").removeClass("active");
            $(".app-side").toggleClass("is-open");
            $(".app-main").toggleClass("side-open");
            $(this).removeClass("active");
        });
        $(window).on("resize", function(e) {
            $scope.initScroll();
            $scope.checkScreenSize();
        });
        $scope.checkScreenSize();
        $timeout(function() {
            var $years = $('.select-years');
            $years.addClass('visible');
            $years.selectBoxIt();
        }, 10);
        // $globals['get']($scope.selectedYear).then(function(response) {
        //   $scope.globals = response;
        // });
        // $scope.globals = [];
        if ($scope.globals.length < 1) {
            $("#global_not_found_content").show();
        }
        $scope.loadByYear = function() {
            $globals['get']($scope.selectedYear).then(function(response) {
                $scope.globals = response;
                if (response.length == 0) {
                    $('#selectedCiclo').select2('val', '');
                    $('#selectedTime').select2('val', '');
                    $("#selectedCiclo").prop('disabled', true);
                    $("#selectedTime").prop('disabled', true);
                    $('.dashboard-section').find('.red-side').removeClass('red-side');
                    $('#myChart1').remove(); // this is my <canvas> element
                    $('#myChart2').remove(); // this is my <canvas> element
                    $('#myChart3').remove(); // this is my <canvas> element
                    $('#myChart4').remove(); // this is my <canvas> element
                    $('#myChart5').remove(); // this is my <canvas> element
                    $('.sec1').append('<canvas id="myChart1"><canvas>');
                    $('.sec2').append('<canvas id="myChart2"><canvas>');
                    $('.sec3').append('<canvas id="myChart3"><canvas>');
                    $('.sec4').append('<canvas id="myChart5"><canvas>');
                    if (myChart) {
                        myChart.removeData();
                    }
                    var ctx = document.getElementById("myChart1");
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: [],
                        options: {
                            "hover": {
                                "animationDuration": 0
                            },
                            "animation": {
                                "onComplete": function() {
                                    var chartInstance = this.chart,
                                        ctx = chartInstance.ctx;
                                    ctx.fillStyle = 'black';
                                    ctx.font = '12px Calibri';
                                    $timeout(function() {
                                        $("#myChart1").click(function() {
                                            alert(1);
                                        });
                                    }, 1000);
                                }
                            },
                            legend: {
                                display: true,
                                position: 'right',
                                labels: {
                                    padding: 20
                                }
                            },
                            tooltips: {
                                "enabled": false
                            },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: false
                                    },
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false
                                    }
                                }]
                            }
                        }
                    });
                    myChart.clear();
                    myChart.update();
                    var ctx2 = document.getElementById("myChart2");
                    //debugger;
                    var data2 = {
                        labels: [],
                        datasets: [{
                            data: [],
                            backgroundColor: ["#54D490", "#FFA7A8", "#FFF572", "#66CCFB"],
                        }]
                    }
                    var myChart2 = new Chart(ctx2, {
                        type: 'pie',
                        data: [],
                        options: {
                            onClick: function() {
                                alert(2);
                            },
                            "hover": {
                                "animationDuration": 0
                            },
                            "animation": {
                                "onComplete": function() {
                                    var chartInstance = this.chart,
                                        ctx2 = chartInstance.ctx2;
                                    //ctx2.fillStyle = 'black';
                                    //ctx2.font = '12px Calibri';
                                }
                            },
                            legend: {
                                display: true,
                                position: 'right',
                                labels: {
                                    padding: 20
                                }
                            },
                            tooltips: {
                                "enabled": false
                            },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: false
                                    },
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false
                                    }
                                }]
                            }
                        }
                    });
                    myChart2.clear();
                    myChart2.update();
                    /*****************************************
                              HorizontalBar Chart Styles
                            ******************************************/
                    var ctx = document.getElementById("myChart3");
                    //debugger;
                    var data = {
                        labels: [],
                        datasets: [{
                            data: [],
                            backgroundColor: "#66ccfb",
                        }]
                    }
                    var myChart = new Chart(ctx, {
                        type: 'horizontalBar',
                        data: data,
                        options: {
                            "hover": {
                                "animationDuration": 0
                            },
                            "animation": {
                                "duration": 1,
                                "onComplete": function() {
                                    var chartInstance = this.chart,
                                        ctx = chartInstance.ctx;
                                    ctx.fillStyle = 'black';
                                    ctx.font = '12px Calibri';
                                    this.data.datasets.forEach(function(dataset, i) {
                                        var meta = chartInstance.controller.getDatasetMeta(i);
                                        meta.data.forEach(function(bar, index) {
                                            var data = dataset.data[index];
                                            console.log(data);
                                            ctx.fillText(data, bar._model.x + 10, bar._model.y + 4);
                                            ctx.fillStyle = 'black';
                                            ctx.font = '12px Calibri';
                                        });
                                    });
                                }
                            },
                            legend: {
                                "display": false
                            },
                            tooltips: {
                                "enabled": false
                            },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: false
                                    },
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false
                                    }
                                }]
                            }
                        }
                    });
                    myChart.clear();
                    myChart.update();
                    /*****************************************
                              Line Chart Styles
                            ******************************************/
                    var ctx = document.getElementById("myChart5");
                    //debugger;
                    var data = {
                        labels: [],
                        datasets: [{
                            data: [],
                            backgroundColor: ["#fdf572"],
                        }]
                    }
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: data,
                        options: {
                            "hover": {
                                "animationDuration": 0
                            },
                            "animation": {
                                // "duration": 1,
                                "onComplete": function() {
                                    var chartInstance = this.chart,
                                        ctx = chartInstance.ctx;
                                    ctx.fillStyle = 'black';
                                    ctx.font = '12px Calibri';
                                }
                            },
                            legend: {
                                display: false,
                            },
                            tooltips: {
                                "enabled": false
                            },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        display: false
                                    },
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false
                                    }
                                }]
                            }
                        }
                    });
                    myChart.clear();
                    myChart.update();
                } else {
                    $('#global_global_sec').addClass('red-side');
                    $("#selectedCiclo").prop('disabled', false);
                    $("#selectedTime").prop('disabled', false);
                    $scope.loadDefaultCharts();
                }
            });
        }
        $cycles['getByYear']($scope.selectedYear).then(function(cycles) {
            $scope.cycles = cycles;
            if ($scope.cycles.length) {
                if ($scope.cycles[0].id) {
                    $scope.cycles.unshift({
                        id: '',
                        name: 'Todos'
                    });
                }
            }
            $scope.selectedCycle = '';
            $timeout(function() {
                var $cycles = $('.select-cycle');
                $cycles.addClass('visible');
                $cycles.selectBoxIt();
            }, 10);
        });
        $scope.users = [];
        $scope.teams = [];
        $scope.selectedTeams = [];
        $scope.new = function() {
            $('#new-goal').modal('show', {
                backdrop: 'static'
            });
            $('.select2').select2('destroy');
            $('.typeahead').typeahead('destroy');
            $users['get']().then(function(response) {
                $scope.users = response;
                $timeout(function() {
                    var $this = $('.select2.usuario'),
                        opts = {
                            allowClear: attrDefault($this, 'allowClear', false)
                        };
                    $this.select2(opts);
                    $this.addClass('visible');
                    $('.multi-select.users').multiSelect('refresh');
                }, 10);
            });
            $tags['get']().then(function(response) {
                $scope.$parent.tags = response;
                $timeout(function() {
                    var tagsNames = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        local: response
                    });
                    tagsNames.initialize();
                    $('.input-tags').tagsinput({
                        typeaheadjs: {
                            name: 'tagnames',
                            displayKey: 'name',
                            valueKey: 'name',
                            source: tagsNames.ttAdapter()
                        }
                    });
                    $('#form-goal').on('keyup keypress', function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode === 13) {
                            e.preventDefault();
                            return false;
                        }
                    });
                    $('.input-tags').on('itemAdded', function(event) {
                        var tag = event.item;
                    });
                }, 10);
            });
            $teams['getAllTeams']().then(function(response) {
                $scope.teams = response;
                $timeout(function() {
                    var $this = $('.select2.times'),
                        button = $('#open-time'),
                        opts = {
                            allowClear: attrDefault($this, 'allowClear', false)
                        },
                        select = $this.select2(opts);
                    //$this.addClass('visible');
                    button.off();
                    button.on('click', function() {
                        if (button.hasClass('active')) {
                            select.select2("close");
                            button.removeClass('active');
                        } else {
                            select.select2("open");
                            button.addClass('active');
                            $('#select2-drop').css('display', 'none');
                        }
                    });
                    $this.on('change', function() {
                        button.removeClass('active');
                        var id = this.value,
                            search = $filter('filter')($scope.teams, {
                                id: id
                            }),
                            test = $filter('filter')($scope.selectedTeams, {
                                id: id
                            });
                        if (test.length) {
                            return;
                        }
                        $scope.$apply(function() {
                            $scope.selectedTeams.unshift({
                                id: id,
                                name: search[0].name,
                                value: 1
                            });
                        });
                    });
                }, 10);
            });
            $scope.numberLess = function($index) {
                var val = $scope.selectedTeams[$index].value;
                var newVal = val > 1 ? val - 1 : 1;
                $scope.selectedTeams[$index].value = newVal;
            }
            $scope.numberMore = function($index) {
                var val = $scope.selectedTeams[$index].value;
                var newVal = val < 10 ? val + 1 : 10;
                $scope.selectedTeams[$index].value = newVal;
            }
            $scope.numberRemove = function($index) {
                $scope.selectedTeams.splice($index, 1);
            }
        }
        $('#form-goal').validate({
            ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .colorpicker, .select2-input, .times',
            rules: {
                nome: 'required',
                //descricao: 'required',
                usuario: 'required'
            },
            success: function(label, element) {
                $(element).parent('div').removeClass('validate-has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('validate-has-error');
            },
            submitHandler: function(form) {
                var data = {
                    year: $scope.selectedYear,
                    name: $('#field-1').val(),
                    description: $('#field-2').val(),
                    user: $('#field-3').val(),
                    responsibles: $scope.responsibles,
                    tags: $('#field-6').val(),
                    teams: $scope.selectedTeams
                }
                if ($scope.selectedTeams.length) {
                    var numbers = $('.number'),
                        error = $('.error-sum'),
                        total = 0;
                    numbers.each(function() {
                        var self = $(this),
                            val = Number(self.val());
                        total = total + val;
                    });
                    if (total != 10) {
                        error.removeClass('hidden');
                        return;
                    } else {
                        error.addClass('hidden');
                    }
                }
                $('#form-goal .salvar').button('loading');
                $globals['insert'](data).then(function(response) {
                    toastr.success('Meta adicionada com sucesso');
                    $timeout(function() {
                        $scope.globals = response;
                        $(".dashboard-section .nav.metismenu").getNiceScroll().remove();
                        $(".scroller-height-charts").getNiceScroll().remove();
                        $timeout(function() {
                            $('#selectedCiclo').select2();
                            $(".dashboard-section .nav.metismenu").niceScroll({
                                horizrailenabled: false,
                                cursorcolor: "#3FB9EA"
                            }).onResize();
                            $(".scroller-height-charts").niceScroll({
                                horizrailenabled: false,
                                cursorcolor: "#3FB9EA"
                            }).onResize();
                        }, 500);
                        //$scope.loadByYear();
                        $('#form-goal')[0].reset();
                        $('#form-goal .salvar').button('reset');
                        $scope.addType = false;
                        $('#new-goal').modal('hide');
                        //});
                    }, 700);
                });
            }
        });
        $("#new-goal").on('hidden.bs.modal', function() {
            $('#selectedCiclo').select2();
            $('#selectedTime').select2();
        });
    });
});