<style type="text/css">
<style type="text/css">
  i.fa.fa-user-circle-o {
    margin: 0 5px 0 0px;
	color:#000;
}
  section {
    padding:inherit;
}
/*li.tav-active-feed {
    background: #ccc;
	    border-radius: 5px 0 0 5px;
		    margin: 0 0 0 2px;
}
li.tav-active-feed:last-child {
    border-radius: 0 5px 5px 0;
}
li.tav-active-feed:nth-child(2) {
    border-radius: 0;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #fff !important;
    background-color: #36b8ec !important;
    margin: 0;
    border-radius: 5px 0 0 5px;
}*/

@media
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		.porfile-competencias-panel table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		.porfile-competencias-panel thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

		.porfile-competencias-panel tr { border: 1px solid #ccc; }

		.porfile-competencias-panel td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50% !important;
		}

		.porfile-competencias-panel td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
		*/
		.porfile-competencias-panel td:nth-of-type(1):before { content: "-"; }
		.porfile-competencias-panel td:nth-of-type(2):before { content: "Auto-Avaliacao"; }
		.porfile-competencias-panel td:nth-of-type(3):before { content: "Gestor"; }
		.porfile-competencias-panel td:nth-of-type(4):before { content: "Media Final"; }
	}
  </style>
<!-- Perfil -->


<div ng-controller="peopledevelopmentCtrl" class="hide peopleDevelopmentView" ng-class="{'hide': !user.id}">
	<h2 class="new_heading_dv">
		<span>Desenvolvimento de Pessoas  <a href="javascript:void(0)" ng-if="detail" class="btn btn-info" ng-click="returnBacktoPeopleDev()"><i class="fa fa-reply"></i> Voltar</a></span>
    </h2>
    <div class="main_section">
        <div id="carreertab" >
			
		<div class="carrier_wrapper">
			<div class="peoplelist" ng-if="!detail" style="position:relative;">
		        <div id="elofy-overlay-loader" ng-show="contentLoading > 0" >
		            <img src="<?php echo base_url()?>assets/portal/img/preloader_2.gif" alt="close"/>
		        </div>
				<div class="row">
				   <div class="col-sm-12">  

												    <div class="section1 add_new_function survey_report okr_menus">
												            <div class="form_add">
												                <div class="form_add add_new_function_title pdlr-0 style2">
												                    <div class="row">
												                        <div class="col-sm-2">
												                            <h4>{{ 'OKRS.FILTER_BY' | translate }}</h4>
												                        </div>
												                    </div>
												                    <div class="clearfix"></div>
												                </div>
												            </div>
												            <div class="form_add" id = "div-1">
												                    <div class="row">
												                        <div class="col-sm-12">
												                            <div class="filter_form_view view_dsds">
												                                <div class="row">
												                                    <div class="col-sm-3">
                                        												<label class="control-label">Nome Pesquisa:</label>
												                                        <div class="filters_view">
																							<select id="selectd_survey" name="selectd_survey[]" multiple="multiple" class="selectd_survey" data-placeholder="Nome Pesquisa" ng-model="selectd_survey">
																								<option ng-repeat="survey in surveys" value="{{survey.id}}">{{survey.name}}</option>
																							</select>
																						</div>
												                                    </div>
												                                    <div class="col-sm-3">
                                    													<label class="control-label">Tags:</label>
                                    													<div class="filters_view">
																							<select id="selectd_tags" name="selectd_tags[]" multiple="multiple" class="selectd_tags" data-placeholder="Tag" ng-model="selectd_tags">
																								<option ng-repeat="tag in tags" value="{{tag.id}}">{{tag.name}}</option>
																							</select>
																						</div>
												                                    </div>
												                                    <div class="col-sm-3">
												                                        <label class="control-label">Times:</label>
												                                        <div class="filters_view">
																							<select id="selectd_teams" name="selectd_teams[]" multiple="multiple" class="selectd_teams" data-placeholder="Times" ng-model="selectd_teams">
																								<option ng-repeat="team in teams" value="{{team.id}}">{{team.name}}</option>
																							</select>
																						</div>
												                                    </div>
												                                    <div class="col-sm-3">
	                                        											<label class="control-label">Date:</label>
												                                        <div class="filters_view">
																							<input class="form-control data" type="text" placeholder="Data" id="filter_start_date">
												                                    	</div>
												                                    </div>

												                                </div>
												                                <div style="margin-top:10px;" class="row">
												                                    <div class="col-sm-3">
																						<label class="control-label">Gestor:</label>
																						<select id="selectd_gestors" name="selectd_gestors[]" multiple="multiple" class="selectd_gestors" data-placeholder="Gestor" ng-model="selectd_gestors">
																							<option ng-repeat="gestor in gestors" value="{{gestor.id_gestor}}">{{gestor.nome_gestor}}</option>
																						</select>
												                                    </div>
												                                    <div class="col-sm-3">
																						<label class="control-label">Users:</label>
																						<select id="selectd_users" name="selectd_users[]" multiple="multiple" class="selectd_users" data-placeholder="Usuário" ng-model="selectd_users">
																							<option ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
																						</select>
												                                    </div>
												                                    <div class="col-sm-6">
												                                        <div class="clr_filters">
																							<a class="clean_filter" ng-click="clearfilterPeopleDevlopment();">Limpar Filtros</a>

																							<form id="form-export-my-activities" method="post" action="<?php echo base_url('exportPeopleDevelopement')?>" style="display: inline;">
																								<input type="hidden" name="id_surveys" ng-value="id_surveys"/>
																								<input type="hidden" name="id_tags" ng-value="id_tags"/>
																								<input type="hidden" name="id_teams" ng-value="id_teams"/>
																								<input type="hidden" name="id_gestors" ng-value="id_gestors"/>
																								<input type="hidden" name="id_users" ng-value="id_users"/>
																								<input type="hidden" name="start_time" ng-value="start_time"/>
																                                <a class="clean_filter" onclick="$('#form-export-my-activities').submit()" href="javascript:void(0)">Export CSV</a>
																                            </form>
																							<a class="savebtn" ng-click="filterPeopleDevlopment();">Filtrar</a>
												                                        </div>
												                                    </div>

												                                </div>
												                            </div>

												                        </div>
												                    </div>
												            </div>

												    </div>
												    <div class="clearfix"></div>






					</div>
				</div>
				<div class="row">
				   <div class="col-sm-12">        
						<div class="dblock">
							<div class="dblock_body">
								<div class="avg_number">A média geral para resultados apresentados é:  {{peoplesfordevelopements.avgnota_final | number:2}}</div>
							</div>
					   </div>
					</div>
				</div>
				<div class="row">
				   <div class="col-sm-12">        
						<div class="dblock mtop-20">
							
							  <div class="table-responsive content horizontal-images">
								<table class="table table-bordered">
									<tr>
										<th style="min-width:200px;">Pesquisa</th>
										<th style="min-width:120px;">Pessoa</th>
										<th>Time</th>
										<th style="min-width:120px;">Data de Admissão</th>
										<th style="min-width:120px;">Gestor</th>
										<th style="min-width:120px;">Data Envio</th>
										<th>Avaliação Gestor</th>
										<th>Avaliação Pares</th>
										<th>Auto Avaliação</th>
										<th>Nota Final</th>
									</tr>
									<tr ng-repeat="peoplesfordevelopement in peoplesfordevelopements.results">
										<td><a href="javascript:void(0);" ng-click="peopledevelopementdetails(peoplesfordevelopement.id_pesquisa, peoplesfordevelopement.id_usuario)">{{peoplesfordevelopement.nome_pesquisa}}</td>
										<td><a href="javascript:void(0);" ng-click="peopledevelopementdetails(peoplesfordevelopement.id_pesquisa, peoplesfordevelopement.id_usuario)">{{peoplesfordevelopement.nome_usuario_avaliado}}</td>
										<td>{{peoplesfordevelopement.time_avaliado}}</td>
										<td>{{peoplesfordevelopement.admissao_avaliado | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
										<td>{{peoplesfordevelopement.gestor_avaliado}}</td>
										<td>{{peoplesfordevelopement.data_envio_respostas | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
										<td>{{peoplesfordevelopement.media_gestor | number:2}}</td>
										<td>{{peoplesfordevelopement.media_pares | number:2}}</td>
										<td>{{peoplesfordevelopement.media_avaliador | number:2}}</td>
										<td>{{peoplesfordevelopement.nota_final | number:2}}</td>
									</tr>
								</table>
							  </div> <!--dblock_body carrier_block END-->    
							  </div><!--dblock_body END-->
					</div><!--dblock END-->
				</div>
			</div>
			<div class="peopledetail" ng-if="detail" style="position:relative;"> 
		        <div id="elofy-overlay-loader" ng-show="contentLoading > 0" >
		            <img src="<?php echo base_url()?>assets/portal/img/preloader_2.gif" alt="close"/>
		        </div>

				<div class="row" style="margin-bottom:20px;">
					<div class="col-sm-12">        
						<div class="dblock">
							<div class="dblock_body">
								<div class="user-dtls user_sect">
                                <div class="user-dtls1">
									<figure>
										<img class="img-circle" alt="{{userdetail.name}}" src="{{userdetail.xs_image}}" style="height: 50px;width: 50px">
									</figure>
									<div class="user-label">{{userdetail.name}}</div>
                                    </div>
									<div class="details_us">
									<div class="team-name name1">Time: <span class="ng-binding">{{userdetail.team}}</span></div>
									<div class="job-fnc">Cargo: <span class="ng-binding">{{userdetail.cargo}}</span></div>
									<div class="job-date">Admissao: <span class="ng-binding">{{pesquisasdetail.admissao_avaliado}}</span></div>
                                    <div class="job-date">E-mail: <span class="ng-binding">{{userdetail.email}}</span></div>
									 <div class="team-name">Gestor: <span class="ng-binding">{{pesquisasdetail.gestor_avaliado}}</span></div>
                                     </div>
								</div>
							</div><!--dblock_body END-->
						</div><!--dblock END-->
					</div>
				</div>
				<div class="clear"></div>
				
				<div class="row">
					<div class="col-sm-12">        
						<div class="dblock mtop-20">
							<div class="dblock_body carrier_block" style="min-height: 300px">
								<div class="row" ng-repeat="question in questions.results" ng-hide="questions.results.length < 1">
									<div class="col-md-12 hvr">
									 <span class="frm_lbl pdl-10"><strong>{{question.question_detail.pergunta}}</strong></span>
										<div class="career-profile-meta" ng-repeat="answer in question.answers">
											<div class="user-dtls" style="padding: 8px 70px;">
								            	<figure>
													 <img class="img-circle" alt="{{answer.user_detail.name}}" src="{{answer.user_detail.xs_image}}" ng-if="answer.user_detail.xs_image">
													 <span class="image-replace float-none ng-binding" ng-if="!answer.user_detail.xs_image">{{ initials(answer.user_detail.name) }}</span>
												</figure>
													<div class="user-label">{{answer.user_detail.name}}</div>
								            	<div class="job-fnc ng-binding">Answer: <span>{{answer.resposta_qualitativa}}</span></div>
								            </div>
										</div>	
									</div>	
								</div>
								<div class="row" ng-hide="questions.results.length > 0 || contentLoading > 0">
									<div class="col-md-12 hvr">
										Não existem perguntas qualitativas para esta pesquisa.
									</div>	
								</div>
								<div class="row" ng-hide="contentLoading == 0">
									<div class="col-md-12 hvr">
										Carregando...
									</div>	
								</div>
								<!--row END-->
							</div><!--dblock_body END-->
					   </div><!--dblock END-->
					</div>
				</div>
			</div>		   
        </div>
    </div>
    </div>
</div>
