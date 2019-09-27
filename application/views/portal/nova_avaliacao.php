<!-- Nova Avaliacao -->
<div ng-controller="novaAvaliacaoCtrl" class="hide" ng-class="{'hide': !cycles}">
    <h2>
		<div class="buttons pull-right" ng-show="activetab >1">
            <div> {{year}} - {{cyclename}}</div>
        </div>
		<a href="javascript:void(0)" id="showusserpanel" ng-click='showuserpanel()' title="Show Users" class="btn btn-primary showusserpanel"><i class="fa fa-bars" aria-hidden="true"></i></a>  {{ 'AVALIACAO_DE_DESEMPENHO.NEW_EVALUATION' | translate }} </h2>
    <hr>
	<div class="view_dv_top">
		<div class="row">
			<div class="col-sm-12 ">
			<div class="profile_section open_panel">


			<div class="side_panel" id="userpanel11">
				<div class="left_bar_dv">
					<h2>{{ 'AVALIACAO_DE_DESEMPENHO.CONTRIBUITORS_NAME' | translate }}</h2>
					<div class="serch_bar">
						<input type="text" class="text_search" ng-model="searchText">
						<input type="submit">
					</div>

					<div class="button-set">
						<span ng-repeat="user in adminusuarios  | filter:searchText" class="view" >
							<a class="emp-detail-user" href="javascript:void(0)" ng-click='lastevaluations(user.id, user.nome_cargo)'>
								<img ng-if="user.image" ng-src="{{ user.image }}" class="img-circle user-image-replace user-image-emp" width="40" height="40" alt="{{ user.name }}" />
								<span class="user-image-replace user-image-emp" ng-if="!user.image">{{ initials(user.name) }}</span>
								{{user.name}} <i class="fa fa-caret-right"></i>
								<div class="user_position">{{user.nome_cargo}}</div>
							</a>
						</span>
					</div>
				</div>
				<br>
			</div>
			<div class="profile_holder">
				<div class="employee_detail_bar" >
					<div class="emplaoye_info" ng-show='activetab > 0'>
                    <div class="row">
                    <div class="col-sm-7">
						<div class="employes_nmae_ig">
							<div class="employe_image employe_user-img" ng-style="{'background-image': (userdetail.image) ? 'url('+userdetail.image+')' : ''}">
								<span class="user-image-replace" ng-if="!userdetail.image">{{ initials(userdetail.name) }}</span>
							</div>
							<div class="personal_detail">
								<h2>
								{{ userdetail.name }}
								<span class="user-cashier-panel">{{ userdetail.email }}</span>
								<span class="user-cashier-panel">{{ nome_cargo }}</span>
								</h2>

								<div class="employe_review">
									<div class="review_left_dv">
										<div class="review_dv" ng-if="userdetail.birthday !=''">
                                            {{ 'AVALIACAO_DE_DESEMPENHO.ADMISSION_LABEL' | translate }} {{ userdetail.birthday | amUtc | amDateFormat:'MMMM DD, YYYY' }}
										</div>
                                        <div class="review_dv" ng-if="userdetail.birthday ==''">
											Admissão: N/A
										</div>
									</div>
								</div>
							</div>
						</div>
                        </div>
                        <div class="col-sm-5">
                        </div>
                        </div>
						<div class="tab_bar">
							<ul class="nav nav-tabs">
								<li><a href="javascript:void(0);" ng-class="activetab > 2  ? 'active' : ''" >{{ 'AVALIACAO_DE_DESEMPENHO.PERFORMANCE' | translate }}</a></li>
								<li><a href="javascript:void(0);" ng-class="activetab > 3 ? 'active' : ''" >{{ 'AVALIACAO_DE_DESEMPENHO.POTENTIAL' | translate }}</a></li>
								<li><a href="performjavascript:void(0);" ng-class="activetab > 4  ? 'active' : ''" >{{ 'AVALIACAO_DE_DESEMPENHO.SKILLS' | translate }}</a></li>
								<li><a href="javascript:void(0);" ng-class="activetab > 5  ? 'active' : ''" >{{ 'AVALIACAO_DE_DESEMPENHO.DEVELOPMENT' | translate }}</a></li>
							</ul>
						</div>
					</div>
					<!-- Last Evolutions start -->
					<div class="other_detail" ng-show="activetab =='1'">
						<div class="other_detail_dv">
							<div class="tab-content">
								<div class="tab tab-pane fade in active">
								<div class="dv_view_section apprasial">
									<table class="table">
										<thead>
											<tr>
												<th>{{ 'UI.YEAR' | translate }}</th>
												<th>{{ 'AVALIACAO_DE_DESEMPENHO.CICLE' | translate }}</th>
												<th>{{ 'AVALIACAO_DE_DESEMPENHO.DEVELOPMENT' | translate }}</th>
												<th>{{ 'AVALIACAO_DE_DESEMPENHO.PERFORMANCE' | translate }}</th>
												<th>{{ 'AVALIACAO_DE_DESEMPENHO.NEW_EVALUATION' | translate }}</th>
												<th>{{ 'AVALIACAO_DE_DESEMPENHO.UPDATE_DATE' | translate }}</th>
											</tr>
										</thead>
										<tbody >
											<tr ng-repeat="evaluation in evaluations" ng-hide='evaluations.length<1' >
												<td>{{evaluation.year}}</td>
												<td>{{evaluation.cycle}}</td>
												<td>{{evaluation.performance}}</td>
												<td>{{evaluation.potencial}}</td>
												<td>{{evaluation.desempenho}} <span ng-show="evaluation.desempenho!=null" class="desempenho"><i class="fa fa-star"></i></span>
												</td>
												<td>{{evaluation.datadeatualizacao | amUtc | amDateFormat:'DD/MM/YYYY' }} <br />

												<a class="consult" href="javascript:void(0);" ng-click='showperformance(evaluation.id_protocolo_avaliacao, evaluation.id_ciclo, evaluation.year, evaluation.cycle)' ng-show="evaluation.performance!=null && evaluation.potencial!=null && evaluation.desempenho!=null">{{ 'AVALIACAO_DE_DESEMPENHO.CONSULT' | translate }}</a>

												<a class="continue" href="javascript:void(0);" ng-click='showperformance(evaluation.id_protocolo_avaliacao, evaluation.id_ciclo, evaluation.year, evaluation.cycle)' ng-show="(((evaluation.performance?1:0) + (evaluation.potencial?1:0) + (evaluation.desempenho?1:0)) < 3 && ((evaluation.performance?1:0) + (evaluation.potencial?1:0) + (evaluation.desempenho?1:0)) >= 1)">{{ 'UI.CONTINUE' | translate }}</a>

												<a class="startappraisal" href="javascript:void(0);" ng-click='showperformance(evaluation.id_protocolo_avaliacao, evaluation.id_ciclo, evaluation.year, evaluation.cycle)' ng-show="evaluation.performance==null && evaluation.potencial==null && evaluation.desempenho==null">{{ 'UI.BEGIN' | translate }}</a>
												</td>
											</tr>
											<tr ng-hide='evaluations.length>0'>
												<td align="center" colspan="6">{{ 'AVALIACAO_DE_DESEMPENHO.NO_USER_RECORDS' | translate }}</td>
											</tr>
										</tbody>
									</table>
								</div></div>
							</div>
						</div>
					</div>
					<!-- Last Evolutions end -->
					<!-- performance start -->

					<div class="other_detail" ng-show="activetab =='2'">
						<div class="other_detail_dv">
							<div class="tab-content">
								<form id="performance_form" method="post">
									<input type="hidden" name="id_usuario" id="id_usuario" value="{{userid}}">
									<input type="hidden" name="id_selectedCycle" id="id_selectedCycle" value="{{selectedCycle}}">
									<div class="tab tab-pane fade in active">
										<div class="dv_view_section">
											<div class="section_view" ng-repeat="tatic in tatics" ng-show="tatic.keyresults.length > 0">
												<div class="row">
													<div class="col-sm-5">
														<h4 class="section-panel-desc"><a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a></h4>
													</div>
													<div class="col-sm-5">
														<div class="estar-percentage pull-right">Progresso<span>{{ tatic.percentage }}%</span></div>
													</div>
												</div>
												<div class="clearfix"></div>
												<h5 >{{ 'AVALIACAO_DE_DESEMPENHO.KEY_RESULTS' | translate }}</h5>
												<div class="blue_bar_table" >
													<div class="blue_bars blue_bars-sec"  ng-repeat="key in tatic.keyresults">
														<div class="section_name section-desc">
															{{ key.title }}
														</div>
														<div class="right_detail_section right_detail_section-desc">
															<div class="sective_dv sective_dv-item">
																<label>{{ 'UI.ENCHARGED' | translate }}</label>
																<i class="fa fa-user-circle-o"></i>{{ key.user.name }}
															</div>
															<div class="sective_dv sective_dv-item">
																<label>{{ 'AVALIACAO_DE_DESEMPENHO.END_DATE' | translate }}</label>
																<span>{{key.last_date | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
															</div>
															<div class="sective_dv sective_dv-item">
																<label>{{ 'AVALIACAO_DE_DESEMPENHO.MEASUREMENT' | translate }}</label>
																<span ng-show="key.Medicao!=null">{{ key.Medicao }}</span>
																<span ng-show="key.Medicao==null">0</span>
															</div>
															<div class="sective_dv sective_dv-item">
																<label>{{ 'AVALIACAO_DE_DESEMPENHO.MARK' | translate }}</label>
																<span>{{ key.Meta }}</span>
															</div>
														</div>
														<div class="box-btn-sec">
															<div class="box-col-1">{{ key.percentage }}%<span>{{ 'AVALIACAO_DE_DESEMPENHO.PROGRESS' | translate }}</span></div>
															<div class="box-col-1 box-col-2">
																<input class="new-per" name="new_per[{{key.id}}]" id="new_per_{{key.id}}" value="{{key.progress}}" required >
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="section_view" ng-show="tatics.length < 1">
												<div class="row">
													<div class="col-sm-12">
                                                        {{ 'AVALIACAO_DE_DESEMPENHO.GOALS_NOT_FOUND' | translate }}
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												<a class="tab-add-goal back" href="#" ng-click='backlastevaluations()'>{{ 'UI.BACK' | translate }}</a>
												<button class="tab-add-goal" type="submit" >{{ 'UI.NEXT' | translate }}</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- performance end -->
					<!-- potential start -->
					<div class="other_detail" ng-show="activetab =='3'">
						<div class="other_detail_dv">
							<form id="potencial_form" method="post">
								<div class="tab-content">
									<div class="tab tab-pane fade in active"><div class="dv_view_section">
										<div class="section_view">
											<div class="potential-panel"ng-show="userpotentialquestions.length>0" ng-repeat="question in userpotentialquestions">
												<div class="pontential-inner">
												  <div class="pontential-inner section-desc"><p>{{question.pergunta}}</p></div>
													<div class="potential-switch-panel">
														<span ng-repeat="answer in question.answers">
															<input class="potential-switch-radio" type="radio" name="answers[{{question.id_pergunta}}][radio]" id="answer_{{answer.id_pergunta_resposta}}" value="{{answer.id_pergunta_resposta}}" ng-checked="answer.id_pergunta_resposta==question.answered"  required />
															<label for='answer_{{answer.id_pergunta_resposta}}'>{{answer.resposta}}</label>
														</span>
													</div>
													<div class="pdi-textarea">
														<textarea class="areagoal" name="answers[{{question.id_pergunta}}][text]">{{question.pergunta_resposta_quali}}</textarea>
													</div>
												</div>
											</div>
											<div class="potential-panel" ng-show="userpotentialquestions.length<1">
												<div class="pontential-inner">
												  <div class="pontential-inner section-desc"><p>{{ 'AVALIACAO_DE_DESEMPENHO.NO_QUESTIONS_FOUND' | translate }}</p></div>

												</div>
											</div>
											<div class="col-sm-12">
												<a class="tab-add-goal back" href="#" ng-click='backshowperformance()'>{{ 'UI.BACK' | translate }}</a>
												<button class="tab-add-goal" type="submit" >{{ 'UI.NEXT' | translate }}</button>
											</div>
										</div>
									</div></div>
								</div>
							</form>
						</div>
					</div>
					<!-- potential end -->
					<!-- skills start -->
					<div class="other_detail" ng-show="activetab =='4'">
						<div class="other_detail_dv">
							<form id="saveskills_form" method="post">
							<div class="tab-content">
								<div class="tab tab-pane fade in active">
									<div class="dv_view_section">
										<div class="section_view section_view-2">
											<div class="skills-panel  skills-panel-td-panel">
												<div class="scrollmenu">
													<table class="competencias-tabel">
													  <thead>
														<tr>
															<td>{{ 'AVALIACAO_DE_DESEMPENHO.UNSATISFACTORY' | translate }}</td>
															<td>{{ 'AVALIACAO_DE_DESEMPENHO.NEEDS_TO_IMPROVE' | translate }}</td>
															<td>{{ 'AVALIACAO_DE_DESEMPENHO.MEETS' | translate }}</td>
															<td>{{ 'AVALIACAO_DE_DESEMPENHO.MEETS_VERY_WELL' | translate }}</td>
															<td>{{ 'AVALIACAO_DE_DESEMPENHO.SURPASSES_EXPECTATIONS' | translate }}</td>
														</tr>
													  </thead>
													  <tbody>
													  </tbody>
													</table>
												</div>
											</div>
											<div class="skills-panel">
												<div class="skills-panel-inner" >
													<div class="skills-panel-inner section-desc"></div>
												</div>
												<div class="skills-panel-inner" ng-repeat="skill in skills">
													<div class="skills-panel-inner section-desc">
													   <p>{{skill.name}}</p>
													</div>
													<div class="scrollmenu">
														<div class="btn-group check-flex" data-toggle="buttons">
														<div class="competencias-tabel-panel">
															<table class="competencias-tabel">
																<tbody>
																	<tr>
																		<td>
																			<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==1}">
																			<input type="radio" name="skills[{{skill.id_competencia}}]" autocomplete="off" value="1" ng-checked='skill.avaliacao==1' required>
																			<span class="glyphicon glyphicon-ok"></span>
																			</label>
																		</td>
																		<td>
																			<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==2}" >
																			<input type="radio" name="skills[{{skill.id_competencia}}]" autocomplete="off" value="2" ng-checked='skill.avaliacao==2' required>
																			<span class="glyphicon glyphicon-ok"></span>
																			</label>
																		</td>
																		<td>
																			<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==3}">
																			<input type="radio" name="skills[{{skill.id_competencia}}]" autocomplete="off" value="3" ng-checked='skill.avaliacao==3' required>
																			<span class="glyphicon glyphicon-ok"></span>
																			</label>
																		</td>

																		<td>
																			<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==4}">
																				<input type="radio" name="skills[{{skill.id_competencia}}]" autocomplete="off" value="4" ng-checked='skill.avaliacao==4' required>
																				<span class="glyphicon glyphicon-ok"></span>
																			</label>
																		</td>
																		<td>
																			<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==5}">
																			<input type="radio" name="skills[{{skill.id_competencia}}]" autocomplete="off" value="5" ng-checked='skill.avaliacao==5' required />
																			<span class="glyphicon glyphicon-ok"></span>
																			</label>
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
										<div class="col-sm-12">
											<a class="tab-add-goal back" href="#" ng-click='backshowpotential()'>{{ 'UI.BACK' | translate }}</a>
											<button class="tab-add-goal" type="submit" >{{ 'UI.NEXT' | translate }}</button>
										</div>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
					<!-- skills end -->
					<!-- pdi start -->
					<div class="other_detail" ng-show="activetab =='5'">
											<div class="other_detail_dv">
												<div class="tab-content">
													<div class="tab tab-pane fade in active">
														<div class="dv_view_section">
															<div class="section_view section_view-2" ng-repeat="objective in userobjectives">
																<div class="pdi-panel">
																	<div class="pdi-score-box">
																		<div class="pdi-pre-box">
																			<div class="pdi-pre-box-inner">
																			<span>{{ 'AVALIACAO_DE_DESEMPENHO.PERFORMANCE_SCORE' | translate }}</span>
																			{{objective.desempenho}}%
																			</div>
																		</div>
																		<div class="pdi-pre-box">
																			<div class="pdi-pre-box-inner">
																			<span>{{ 'AVALIACAO_DE_DESEMPENHO.POTENTIAL_SCORE' | translate }}</span>
																			{{objective.potencial}}%
																			</div>
																		</div>
																		<div class="pdi-pre-enigma">
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==1">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-0.png" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.INSUFFICIENT' | translate }}</br></h5>
																					<p>
                                                                                        {{ 'AVALIACAO_DE_DESEMPENHO.INSUFFICIENT_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==2">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-1.png"" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.QUESTIONABLE' | translate }}</h5>
																					<p>
                                                                                        {{ 'AVALIACAO_DE_DESEMPENHO.QUESTIONABLE_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==3">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-2.png" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.RIDDLE' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.RIDDLE_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==4">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-3.png" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.EFFECTIVE' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.EFFECTIVE_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==5">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-4.png" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.SUPPORTER' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.SUPPORTER_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==6">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-5.png"alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.STRONG_PERFORMANCE' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.STRONG_PERFORMANCE_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==7">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-6.png" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.COMMITED' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.COMMITED_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==8">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-7.png" alt="close" />
																				</div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.STRONG_EFFORT' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.STRONG_EFFORT_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																			<div class="pdi-pre-enigma-inner" ng-show="objective.nine_box==9">
																				<div class="enigma-img">
																					<img src="<?php echo base_url('assets/portal/img/')?>/9-box-8.png" alt="close" /></div>
																				<div class="enigma-text-panel">
																					<h5>{{ 'AVALIACAO_DE_DESEMPENHO.HIGH_POTENTIAL' | translate }}</h5>
																					<p>{{ 'AVALIACAO_DE_DESEMPENHO.HIGH_POTENTIAL_DESCRIPTION' | translate }}</p>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
						</div>

					<!-- 9 box end -->

						<a class="tab-add-goal" href="javascript:void(0);" ng-click="okr()">{{ 'OBJETIVOS.NEW_PERSONAL_GOAL' | translate }}</a>
						<br/>
						<div class="dv_view_boxes"  ng-repeat="tatic in tatics" ng-if="tatics.length>0"  >
							<div class="objectives_box">
								<div class="row_headings">
									<div class="row_heading_bar">
										<div class="row_heading_bar_column">{{ 'OBJETIVOS.GOAL' | translate }}</div>
										<div class="row_heading_bar_column">{{ 'UI.TEAM' | translate }}</div>
										<div class="row_heading_bar_column">{{ 'AVALIACAO_DE_DESEMPENHO.BEGIN' | translate }}</div>
										<div class="row_heading_bar_column">{{ 'AVALIACAO_DE_DESEMPENHO.FIM' | translate }}</div>
									</div>
									<div class="row_heading_bar sub">
										<div class="row_heading_bar_column objective-panel-title"><label><a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a></label>
										<span ng-repeat="tag in tatic.tags" style="" ng-hide="tag.name==''" ><i class="fa fa-tags"></i> {{ tag.name }}</span>
										</div>
										<div class="row_heading_bar_column"><i class="fa fa-user-circle-o"></i>{{ tatic.team.name }}</div>
										<div class="row_heading_bar_column">{{tatic.cycles[0].inicio_vigencia | amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
										<div class="row_heading_bar_column">{{tatic.cycles[tatic.cycles.length-1].fim_vigencia | amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
									</div>
								</div>
							</div>
						</div>
						<form id="pdi_form" method="post">
						<div class="section_view section_avail-panel">
							<div class="blue_bars blue_bars-sec avaliacao-geral-panel">
								<div class="description">
                                    {{ 'AVALIACAO_DE_DESEMPENHO.EVALUATE_CONTRIBUITER' | translate }}</div>
							</div>
							<div class="avaliacao-panel">
								<div class="ratting-panel">
									<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avaliacoes.desempenho==1}"><i class="fa fa-star"></i></span>

									<input name="geral" type="radio" autocomplete="off" value="1" ng-checked='avaliacoes.desempenho==1' required>

									</label>
									<span>{{ 'AVALIACAO_DE_DESEMPENHO.UNSATISFACTORY' | translate }}</span>
								</div>
								<div class="ratting-panel">
									<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avaliacoes.desempenho==2}"><i class="fa fa-star"></i></span>

									<input name="geral" type="radio" autocomplete="off" value="2" ng-checked='avaliacoes.desempenho==2' required>

									</label>
									<span>{{ 'AVALIACAO_DE_DESEMPENHO.NEEDS_TO_IMPROVE' | translate }}</span>
								</div>
								<div class="ratting-panel">
									<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avaliacoes.desempenho==3}"><i class="fa fa-star"></i></span>
									<input name="geral" type="radio" autocomplete="off" value="3" ng-checked='avaliacoes.desempenho==3' required>

									</label>
									<span>{{ 'AVALIACAO_DE_DESEMPENHO.MEETS' | translate }}</span>
								</div>
								<div class="ratting-panel">
									<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avaliacoes.desempenho==4}"><i class="fa fa-star"></i></span>

									<input name="geral" type="radio" autocomplete="off" value="4" ng-checked='avaliacoes.desempenho==4' required>

									</label>
									<span>{{ 'AVALIACAO_DE_DESEMPENHO.MEETS_VERY_WELL' | translate }}</span>
								</div>
								<div class="ratting-panel">
									<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avaliacoes.desempenho==5}"><i class="fa fa-star"></i></span>

									<input name="geral" type="radio" autocomplete="off" value="5" ng-checked='avaliacoes.desempenho==5' required>

									</label>
									<span>{{ 'AVALIACAO_DE_DESEMPENHO.EXCEPTIONAL' | translate }}</span>
								</div>
								<div class="pdi-textarea">
									<h3>{{ 'AVALIACAO_DE_DESEMPENHO.USE_SPACE_ABOUT_CONTRIBUITOR' | translate }}</h3>
									<textarea id="avaliacao_quali" class="areagoal areagoal-dese" >{{avaliacoes.avaliacao_quali}}</textarea>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<a class="tab-add-goal back" href="javascript:void(0);" ng-click='backshowskills()'>{{ 'UI.BACK' | translate }}</a>
							<button class="tab-add-goal" type='submit'>{{ 'UI.FINISH' | translate }}</button>
						</div>
						</form>
					</div>
					<!-- pdi end -->
					<!-- thank you start -->
					<div class="other_detail" ng-show="activetab =='6'">
						<div class="other_detail_dv">
							<div class="tab-content">
								<div class="tab tab-pane fade in active"><div class="dv_view_section">
									<div class="section_view">
                                    <div class="thanku-img"><img src="<?php echo base_url('assets/portal/img')?>/thank-u-img.png" /></div>
										<h2 class="thanku-panel">
                                            {{ 'AVALIACAO_DE_DESEMPENHO.THANKS' | translate }} <span>{{ 'AVALIACAO_DE_DESEMPENHO.FINISHED_EVALUATION' | translate }}</span></h2>
									</div>
								</div></div>
							</div>
						</div>
					</div>
					<!-- thank you end -->
				</div>
			</div>

			</div>
			</div>



		</div>
	</div>
	<!-- Modal Novo OKR -->
	<div class="modal fade in" id="new-okr-avaliacao">
		<div class="modal-dialog">
			<form id="form-okr" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">{{ 'OBJETIVOS.NEW_PERSONAL_GOAL' | translate }}</h4>
				</div>
				<div class="modal-body">
					<div class="progress" ng-class="{'hide': users.length && teams.length && years.length}" style="margin-top:17px;">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>

					<div class="form hide" ng-class="{'hide': !users.length && !teams.length && !years.length}">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="okr-name" class="control-label">{{ 'UI.NAME' | translate }}</label>
									<input name="nome" type="text" class="form-control" id="okr-name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="okr-description" class="control-label">{{ 'UI.DESCRIPTION' | translate }}</label>
									<textarea name="descricao" id="okr-description" class="form-control" rows="5"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="okr-user" class="control-label">{{ 'UI.ENCHARGED' | translate }}</label>
									<select id="okr-user" name="usuario" class="select2 usuario-okr" data-allow-clear="true" data-placeholder="{{ 'UI.SELECT_USER' | translate }}">
										<option value=""></option>
										<optgroup label="Usuários">
											<option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="okr-team" class="control-label">{{ 'UI.TEAM' | translate }}</label>
									<select id="okr-team" name="time" class="select2 times-okr" data-allow-clear="true" data-placeholder="{{ 'TIMES.SELECT_TEAM' | translate }}">
										<option value=""></option>
										<optgroup label="Times">
											<option ng-repeat="team in teams" ng-value="{{ team.id }}">{{ team.name }}</option>
										</optgroup>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="okr-year" class="control-label">{{ 'AVALIACAO_DE_DESEMPENHO.YEAR_LABEL' | translate }} </label>
									<span class="selectedyear">{{year}}<

                                        /span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="okr-cycles" class="control-label">{{ 'AVALIACAO_DE_DESEMPENHO.QUARTERS_LABEL' | translate }}</label>
									<span class="selectedyear">{{cyclename}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">{{ 'UI.CLOSE' | translate }}</button>
					<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ 'UI.SAVE' | translate }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
