<section class="dashboard-section" ng-controller="myDashboard" ng-cloak>
    <div class="overlay"></div>
    <div class="app-container">
        <aside class="app-side fixed is-open" id="app-side">
        <div class="side-content">            
                <ul class="nav metismenu">
                    <li class="sidebar-header">
                        <span>Direcionadores</span>
                    </li>
                    <li class="sidebar-header">
                        <select class="select-years form-control" data-native="true" ng-options="year as year for year in years" ng-change="loadByYear()" ng-model="selectedYear" id="selectyear">
                        </select>
                    </li>         
                    <li class="sidebar-widgets  red-side" id="global_global_sec" data-global = "" ng-click="showChartById('global_sec');" style="cursor: pointer;">
                        <p class="widget-title">Visão Geral</p>
                        <div class="progress sm mb-1">
                            <div class="progress-bar" style="width: {{globals.percentage}}%;"><span class="total-percentage">{{globals.percentage}}%</span></div>
                            
                        </div>
                        <div>
                            <p class="user-sub d-inline-block">{{globals.length}} Direcionadores</p>
                            <!-- <p class="user-sub d-inline-block">20 KR's</p>
                            <p class="user-sub d-inline-block">83 activities</p> -->
                        </div>
                    </li>
                    <li class="sidebar-widgets  " id="global_{{global.id}}" data-global = "{{global.id}}" ng-if="globals.length > 0" ng-repeat="global in globals"  ng-click="showChartById(global.id)" style="cursor: pointer;" title="{{global.title}}" >
                       <p class="widget-title"  >{{global.title.substr(0,23)}}<span ng-if="global.title.length > 35">...</span></p>

                       <div class="progress sm mb-1">
                            <div class="progress-bar" style="width: {{global.percentage}}%;"><span class="total-percentage">{{global.percentage}}%</span></div>
                            
                        </div>
                        <p class="user-sub d-inline-block">{{global.tatics.length}} objetivos</p>
                        <p class="user-sub d-inline-block">{{global.keys.length}} KR's</p>
                        <p class="user-sub d-inline-block">{{global.activities.length}} atividades</p>
                    </li>
                    <li class="sidebar-widgets " ng-if="!globals.length">
                       <p class="widget-title">Objetivos não encontrados</p>
                    </li>
                </ul>
                <!--<div class="sidebar-button">
                    <a href="javascript:void(0)" class="new-goal-btn" ng-click="new()">Novo direcionador</a>
                </div>-->
            </div>
          
        </aside>

        <div class="app-main  side-open">
            <div class="main-content-dash">
                <div class="main-content-inner">
                    <div class="main-content-inner-header">
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <div class="menu-toggle-wrapper">
                                    <img src="<?php echo base_url()?>assets/portal/img/menu-dashboard.png">
                                    <!-- <button class="menu-toggle"></button> -->
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="select-wrapper pdl-50 calanderdropdown">
                                    <img src="<?php echo base_url()?>assets/portal/img/calendar.png">
                                    <select class="select2" id="selectedCiclo" data-placeholder="Selecione um Ciclo">
                                        <option value="" disabled>Selecione um Ciclo</option>
                                        <option value="{{ciclo.id_ciclo}}" ng-repeat="ciclo in cicles">{{ ciclo.filtro }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="select-wrapper teamdropdown">
                                    <img src="<?php echo base_url()?>assets/portal/img/collaboration.png">
                                    <select class="select2" id="selectedTime" >
                                        <option selected="selected" value="">Todos Times</option>
                                        <option value="{{team.id}}" ng-repeat="team in teams">{{ team.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content-inner-body scroller-height-charts">
						<div id="graph_found"  ng-if="globals.length > 0">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12 border-right-style1">
									<div class="chart-section sec1 myChart1Sec" style="width: 100%">
										<h5>Objetivos por Status</h5>
										<canvas id="myChart1"></canvas>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="chart-section sec2 myChart2Sec">
										<h5>Objetivos por Progresso</h5>
										<canvas id="myChart2"></canvas>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="row border-top-style1">
								<div class="col-md-9 col-md-offset-0 col-sm-9 col-sm-offset-0 col-xs-9 col-xs-offset-0 border-right-style1">
									<div class="chart-section sec3 myChart3Sec">
										<h5 style="margin-top:15px;">Quantidade de Objetivos por Time</h5>
										<canvas id="myChart3"></canvas>
									</div>
								</div>
							</div>
							<div class="row border-top-style1">		
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="chart-section sec4 myChart4Sec">
										<h5 style="margin-top:15px;">Quantidade de Objetivos por Ciclo</h5>
										<canvas id="myChart5"></canvas>
									</div>
								</div>
							</div>
						</div>	
						<div class="clearfix"></div>
						<div class="row" id="graph_not_found" style="display:none;">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-7 col-sm-7 col-xs-7">
									<h3><strong>Não foram encontrados dados para o critério de pesquisa informado.</strong></h3>
								</div>
									</div>
								</div>
							
                        <div class="row" ng-if="subGoals.length > 0 && globals.length > 0" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-section">
                                    <h5 style="margin-top:15px;">lista de Objetivos</h5>

                                    <div class="table-responsive">
                                        <table class="table" id="goalstable">
                                            <thead>
                                                <tr>
                                                    <th class="name">Nome</th>
                                                    <th class="time">Time</th>
                                                    <th class="result">N <sup>o</sup> Resultados Chave</th>
                                                    <th class="estado">Estado</th>
                                                    <th class="tabprogress">Progresso</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="goal in subGoals">
                                                    <th class="name" scope="row">
                                                        <img src="{{goal.user.xs_image}}" class="img-circle" width="30" height="30" ng-if="goal.user.image" title="{{initials(goal.user.name)}}">
                                                        <span class="image-replace" ng-if="!goal.user.image" title="{{goal.user.name}}">{{ initials(goal.user.name) }}</span>
                                                        <span>{{goal.title}}</span>
                                                    </th>
                                                    <td class="time"  title="{{goal.team.name}}" >{{goal.team.name.substr(0,23)}}<span ng-if="goal.team.name.length > 23">...</span>
													</td>
                                                    <td class="result">{{goal.total_key}}</td>
                                                    <td class="estado" >
                                                        <p ng-if="goal.status==0">Pendente(s)</p>
                                                        <p ng-if="goal.status==2">Em andamento</p>
                                                        <p ng-if="goal.status==3">Encerrados</p>
                                                        <p ng-if="goal.status==1">Finalizado(s)</p>
                                                    </td>
                                                    <td class="tabprogress">
                                                        <div class="progress sm blue mb-1" ng-class="{'blue':goal.color==1,'yellow':goal.color==2,'red':goal.color==3}">
                                                            <div class="progress-bar" style="width: {{goal.percentage}}%;"></div>
                                                        </div>
                                                        <span class="total-percentage ng-binding">{{goal.percentage}}%</span>
                                                    </td>
                                                    <td>
                                                        <a href="planejamento#!/tatic/{{goal.id}}" >
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="new-goal">
        <div class="modal-dialog">
            <form id="form-goal" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ "VISAO_EMPRESA.NEW_DRIVER" | translate }}</h4>
                </div>
                <div class="modal-body">
                    <div class="progress" ng-class="{'hide': users.length}" style="margin-top:17px;">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>

                    <div class="form hide" ng-class="{'hide': !users.length}">
                        <div class="alert alert-danger text-center hide" ng-class="{'hide': teams.length}">
                            <p>{{ "VISAO_EMPRESA.TO_BEGGIN_GOAL_REGISTER" | translate }} <a href="/times"><strong>{{ "VISAO_EMPRESA.GO_TO_TEAM_EDITION" | translate }}</strong></a></p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">{{ "UI.NAME" | translate }}</label>
                                    <input name="nome" type="text" class="form-control" id="field-1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">{{ "UI.DESCRIPTION" | translate }}</label>
                                    <textarea name="descricao" id="field-2" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">{{ "UI.ENCHARGED" | translate }}</label>
                                    <select id="field-3" name="usuario" class="select2 usuario" data-allow-clear="true" data-placeholder="{{ 'UI.SELECT_USER' | translate }}">
                                        <option value=""></option>
                                        <optgroup label="Usuários">
                                            <option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">{{ "VISAO_EMPRESA.CORESPONSIBLES" | translate }}</label>
                                    <select id="field-5" multiple="multiple" name="corresponsaveis" class="form-control multi-select users" ng-model="responsibles" ng-options="user.id as user.name for user in users">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Tags</label>
                                    <input id="field-6" class="input-tags" type="text" value="" data-role="tagsinput" />
                                </div>
                            </div>
                        </div>
                        <div class="row hidden">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-7 control-label" style="margin-top:8px;">{{ "VISAO_EMPRESA.TEAMS_SLASH_WEIGHT" | translate }}</label>
                                        <div class="col-md-5">
                                            <a id="open-time" class="btn btn-info pull-right"><i class="icon-plus-circled"></i> {{ "TIMES.ADD_TEAM" | translate}}</a>
                                            <select id="seleciona-time" name="times" class="select2 times" data-allow-clear="true" data-placeholder="{{ 'TIMES.SELECT_TEAM' | translate}}">
                                                <option value=""></option>
                                                <optgroup label="Times">
                                                    <option ng-repeat="team in teams" ng-value="{{ team.id }}">{{ team.name }}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <p class="error-sum text-danger hidden">{{ "VISAO_EMPRESA.THE_SUM_MUST_BE_TEN" | translate }}</p>
                                <div class="row">
                                    <div class="col-md-12" ng-if="selectedTeams.length">
                                        <div class="row">
                                            <label class="col-md-8">{{ "UI.TEAM" | translate }}</label>
                                            <div class="col-md-4">
                                                <label class="pull-left text-center" style="width:122px;">{{ "UI.WEIGHTS" | translate }}</label>
                                                <label class="pull-right" style="width:44px;">{{ "UI.DELETE" | translate }}</label>
                                            </div>
                                        </div>
                                        <hr style="border-width:2px; margin:10px 0;">
                                    </div>

                                    <div class="form-group col-md-12" ng-repeat="team in selectedTeams" style="margin:0;">
                                        <div class="row">
                                            <label class="col-md-8 control-label" style="font-size:14px; font-weight:400; margin-top:8px;">{{ team.name }}</label>
                                            <div class="col-md-4">
                                                <div class="input-spinner pull-left">
                                                    <button type="button" class="btn btn-default" ng-click="numberLess($index)">-</button>
                                                    <input type="number" name="" class="form-control no-round size-1 number" ng-model="team.value" ng-value="{{ team.value }}" min="1" max="10">
                                                    <button type="button" class="btn btn-default" ng-click="numberMore($index)">+</button>
                                                </div>
                                                <button type="button" class="btn btn-red pull-right" ng-click="numberRemove($index)"><i class="entypo-trash"></i></button>
                                            </div>
                                        </div>
                                        <hr style="margin:10px 0;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">{{ "UI.CLOSE" | translate }}</button>
                    <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ "UI.SAVE" | translate }}</button>
                </div>
            </form>
        </div>
    </div>
</section>