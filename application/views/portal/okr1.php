<!-- OKR's -->
<div class="okrView" ng-controller="okrCtrl" class="hide" ng-class="{'hide': !tatics}">
	<!--<div class="button_sets">
            <a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': okrtab == '1' || !okrtab}" ng-click="OkrTab()">{{ 'OKRS.OKRS_VISION' | translate }}</a>
            <a href="javascript:void(0)" class="additional actives" id="hierarchicaltab" ng-class="{'active_bitton_links_dv': okrtab == '2'}" ng-click="HierarchicalTab()">Visão Hierárquica</a>
            <a href="javascript:void(0)" class="additional avivadetab" id="avivadetab" ng-class="{'active_bitton_links_dv': okrtab == '4'}" ng-click="myActivitiesTab()">Atividades</a>
            <div class="okr_animation"></div>
		</div>-->
		<?php
			$abaAtiva = isset($_GET["aba_pendencias"]);
			if($abaAtiva == 1){
			?>
			<script>
				
				myObjectivesTab();
			</script>	
			<?php
			}
			//$ativarAba = ($abaAtiva=='1')? 'mdc-tab--active' : '';
			//$desativarAba = ($abaAtiva=='1')? '' : 'mdc-tab--active';

		?>
	<div class="mdc-tab-bar tabokr" role="tablist">
	<h2 class="new_heading_dv">{{ 'OKRS.TITLE' | translate }}</h2>
		<div class="mdc-tab-scroller">
			<div class="mdc-tab-scroller__scroll-area">
				<div class="mdc-tab-scroller__scroll-content">
					<button class="mdc-tab mdc-tab--active>" role="tab" ng-click="OkrTab()">
						<span class="mdc-tab__content">
							<span class="mdc-tab__text-label">{{ 'OKRS.TITLE' | translate }}</span>
						</span>
						<span class="mdc-tab-indicator">
							<span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
						</span>
						<span class="mdc-tab__ripple"></span>
					</button>
					<button class="mdc-tab" role="tab" ng-click="HierarchicalTab()">
						<span class="mdc-tab__content">
							<span class="mdc-tab__text-label">Hierárquica</span>
						</span>
						<span class="mdc-tab-indicator">
							<span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
						</span>
						<span class="mdc-tab__ripple"></span>
					</button>
					<button class="mdc-tab" role="tab" ng-click="myActivitiesTab()">
						<span class="mdc-tab__content">
							<span class="mdc-tab__text-label">Atividades</span>
						</span>
						<span class="mdc-tab-indicator">
							<span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
						</span>
						<span class="mdc-tab__ripple"></span>
					</button>
					
					<button class="mdc-tab" role="tab" ng-click="myObjectivesTab();" ng-show="user.empresa.workflow == 1">
						<span class="mdc-tab__content">
							<span class="mdc-tab__text-label">Pendentes de Aprovação <span ng-show="objetivos.length > 0">({{ objetivos.length }})</span></span>
						</span>
						<span class="mdc-tab-indicator">
							<span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
						</span>
						<span class="mdc-tab__ripple"></span>
					</button>

				</div>
			</div>
		</div>
	</div>
	<div class="content" style="position:relative;">
		<div id="elofy-overlay-loader" ng-show="contentLoading > 0">
			<img src="<?php echo base_url() ?>assets/portal/img/preloader_2.gif" alt="close" />
		</div>

		<div class="section1 add_new_function survey_report okr_menus">
			<div ng-show="okrtab==1 || !okrtab">
				<div class="form_add">
					<div class="form_add add_new_function_title pdlr-0 style2" ng-class="{'bor-btm':!okrtab1_filter}">
						<div class="row">
							<div class="col-sm-2">
								<h4>{{ 'OKRS.FILTER_BY' | translate }}</h4>
							</div>
						</div>
						<!--                    <div class="col-sm-3">-->
						<!--                        <div class="btn-default">-->
						<!--                            <a href="javascript:void(0);" class="startappraisal" ng-click="view_filter1()" ng-if="!okrtab1_filter">Exibir Filtros</a>-->
						<!--                            <a href="javascript:void(0);" class="startappraisal" ng-click="hide_filter1()" ng-if="okrtab1_filter">Esconder Filtros</a>-->
						<!--                        </div>-->
						<!--                    </div>-->
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="form_add" id="div-1">
					<form id="form-search" ng-submit="filter()">
						<div class="filter_form_view">
							<div class="row">
								<div class="col-sm-12">
									<input id="search-name" name="nome" type="text" class="gstyle" value="{{ teamDetail.name }}" ng-model="query" placeholder="{{ 'OKRS.TYPE_YOUR_SEARCH' | translate }}">
									<!--button type="submit" class="submit-button"><i class="fa fa-search"></i></button>-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="filter_form_view">
									<div class="row">
										<div class="col-sm-12">
											<label class="value-label" for="estrategicofilter">
												<div class="container-block">
													<input type="checkbox" id="estrategicofilter" name="estrategicofilter" value="1" ng-model="estrategicofilter" ng-true-value="1" ng-false-value="0">
													<label for="estrategicofilter" style="padding-left: 0">&nbsp;</label>
												</div> Estratégico
											</label>
										</div>
									</div>
								</div>
								<div class="filter_form_view">
									<div class="row">
										<div class="col-sm-6">
											<label>Situação</label>
											<div class="form-group checkbox-okr ">
												<div class="container-block">
													<input type="checkbox" id="chekd1" name="search-situation[]" value="0" ng-model="selectedSituation[0]">
													<label class="value-label" for="chekd1">{{ 'UI.PENDING' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd2" name="search-situation[]" value="1" ng-model="selectedSituation[1]">
													<label class="value-label" for="chekd2">{{ 'UI.REACHED' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd3" name="search-situation[]" value="2" ng-model="selectedSituation[2]">
													<label class="value-label" for="chekd3">{{ 'UI.IN_PROGRESS' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd4" name="search-situation[]" value="3" ng-model="selectedSituation[3]">
													<label class="value-label" for="chekd4">Encerrado</label>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<label>Tipo</label>
											<div class="form-group checkbox-okr ">
												<div class="container-block">
													<input type="checkbox" id="chekt1" name="search-type[]" ng-true-value="'c'" ng-false-value="undefined" ng-model="selectedType[0]">
													<label class="value-label" for="chekt1">Compartilhado</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekt2" name="search-type[]" ng-true-value="'i'" ng-false-value="undefined" ng-model="selectedType[1]">
													<label class="value-label" for="chekt2">Individual</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekt3" name="search-type[]" ng-true-value="'t'" ng-false-value="undefined" ng-model="selectedType[2]">
													<label class="value-label" for="chekt3">Time</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="filter_form_view view_dsds">
									<div class="row">
										<div class="col-sm-4">
											<label>Responsável</label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd6" ng-model="okrMainUser">
													<label for="chekd6">Todos Responsáveis</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="search-user" name="usuario[]" class="usuario" data-placeholder="Selecione um Usuário" ng-model="selectedUser" multiple="multiple">
													<option ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4">

											<label>Tags: </label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_tags">
													<label for="chekd_tags">Todas Tags</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="selectd_tags" name="selectd_tags[]" multiple="multiple" data-placeholder="Escolha Tag" ng-model="selectd_tags">
													<option ng-repeat="tag in teamTags" value="{{tag.id}}">{{tag.name}}</option>
												</select>

											</div>
										</div>
										<div class="col-sm-4">
											<label>{{ 'UI.YEAR' | translate }}</label>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select ng-model="selectedYearName" ng-options="year as year for year in years" id="search-year" class="" data-native="true" data-text="Selecione o Ano" ng-change="loadCycles()">
												</select>
											</div>
										</div>

									</div>
								</div>
								<div class="filter_form_view view_dsds">
									<div class="row">
										<div ng-class="{'col-sm-2':user.empresa.workflow == 1, 'col-sm-4':user.empresa.workflow != 1}">
											<label>Status</label>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select class="select2 color" ng-model="selectedColorVisao">
													<option value="">Todos</option>
													<option value="1">Em dia</option>
													<option value="2">Atenção</option>
													<option value="3">Atraso</option>
												</select>
											</div>
										</div>
										<div class="col-sm-2" ng-show="user.empresa.workflow == 1">
											<label>Workflow</label>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select class="select2 workflow" ng-model="selectedWorkflow">
													<option value="">Todos</option>
													<option value="0">Pendente</option>
													<option value="1">Aprovado</option>
													<option value="2">Reprovado</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<label>Time</label>
											<select id="search-team" name="time" class="" ng-model="selectedTeamNotAddedOkr1">
												<option ng-repeat="team in teamsNotAddedOkr1" value="{{team.id}}" ng-selected="selectedTeam == team.id">{{team.name}}</option>
											</select>
											<span class="corresponsaveis-selected" ng-repeat="selecteds in teamsNotAddedSelectedOkr1" ng-click="removeUserAndRefreshTeamOkr1(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="teamsokr1[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
										</div>

										<div class="col-sm-4 cycles ">
											<label>{{ 'UI.QUARTER' | translate }}</label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_trimstre">
													<label for="chekd_trimstre">Todos Trimestres</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="search-cycle" name="clicos" class="" multiple="multiple">
													<option ng-repeat="cycle in cycles" value="{{cycle.id}}">{{cycle.name}}</option>
												</select>

											</div>
										</div>


									</div>
								</div>
								<div class="clr_filters">
									<!-- <a class="clean_filter" onclick="$('#form-export-okr-csv').submit()" href="javascript:void(0)">Exportar CSV</a> -->
									<!--<a class="clean_filter" ng-click="exportOkrCsv()" href="javascript:void(0)">Exportar CSV</a>
                            <a href="javascript:void(0)" class="clean_filter" ng-click="reset()">Limpar Filtros</a>
                            <button type="submit" class="apply_filter">Aplicar Filtro</button>-->
									<button class="mdc-button mdc-button--outlined mdc-fechar" ng-click="exportOkrCsv()">
										<i class="material-icons mdc-button__icon">import_export</i>
										<span class="mdc-button__label"> Exportar CSV</span>
									</button>
									<button class="mdc-button mdc-fechar" ng-click="reset()">Limpar Filtros</button>
									<button type="submit" class="mdc-button mdc-button--raised">Aplicar Filtros</button>
								</div>



							</div>
						</div>
					</form>
				</div>
			</div>
			<form id="form-export-okr-csv" method="post" action="<?php echo base_url('exportOkr') ?>" style="display: inline;">
				<input id="exportTeam" type="hidden" name="teams" value="" />
				<input id="exportCycle" type="hidden" name="cycles" value="">
				<input id="exportYear" type="hidden" name="year" ng-value="selectedYearName">
				<input id="exportResponsavel" type="hidden" name="responsavels" value="">
				<!-- <a class="clean_filter" ng-click="exportOkr()" href="javascript:void(0)">Exportar CSV</a> -->
			</form>
			<div ng-show="okrtab==2">
				<div class="form_add">
					<div class="form_add add_new_function_title pdlr-0 style2" ng-class="{'bor-btm':!okrtab2_filter}">
						<div class="row">
							<div class="col-sm-2">
								<h4>{{ 'OKRS.FILTER_BY' | translate }}</h4>
							</div>
						</div>
						<!--                    <div class="col-sm-3">-->
						<!--                        <div class="btn-default">-->
						<!--                            <a href="javascript:void(0);" class="startappraisal" ng-click="view_filter2()" ng-if="!okrtab2_filter">Exibir filtros</a>-->
						<!--                            <a href="javascript:void(0);" class="startappraisal" ng-click="hide_filter2()" ng-if="okrtab2_filter">Contrair filtros</a>-->
						<!--                        </div>-->
						<!--                    </div>-->
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="form_add" id="div-2">
					<form id="form-search-her" ng-submit="filter_her()">
						<div class="filter_form_view">
							<div class="row">
								<div class="col-sm-12">
									<input id="search-name" name="nome" type="text" class="form-control" value="{{ teamDetail.name }}" ng-model="queryher" placeholder="{{ 'OKRS.TYPE_YOUR_SEARCH' | translate }}">
									<!--button type="submit" class="submit-button"><i class="fa fa-search"></i></button>-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="filter_form_view">
									<div class="row">
										<div class="col-sm-12">
											<label class="value-label" for="hestrategicofilter">
												<div class="container-block">
													<input type="checkbox" id="hestrategicofilter" name="hestrategicofilter" value="1" ng-model="hestrategicofilter" ng-true-value="1" ng-false-value="0">
													<label for="hestrategicofilter" style="padding-left: 0">&nbsp;</label>
												</div> Estratégico

											</label>
										</div>
									</div>
								</div>
								<div class="filter_form_view">
									<div class="row">
										<div class="col-sm-6">
											<label>Situação</label>
											<div class="form-group checkbox-okr ">
												<div class="container-block">
													<input type="checkbox" id="chekd_her1" name="search-situation_her[]" value="0" ng-model="selectedSituationher[0]">
													<label class="value-label" for="chekd_her1">{{ 'UI.PENDING' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd_her2" name="search-situation_her[]" value="1" ng-model="selectedSituationher[1]">
													<label class="value-label" for="chekd_her2">{{ 'UI.REACHED' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd_her3" name="search-situation_her[]" value="2" ng-model="selectedSituationher[2]">
													<label class="value-label" for="chekd_her3">{{ 'UI.IN_PROGRESS' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd_her4" name="search-situation_her[]" value="3" ng-model="selectedSituationher[3]">
													<label class="value-label" for="chekd_her4">Encerrado</label>
												</div>

											</div>
										</div>
										<div class="col-sm-6">
											<label>Tipo</label>
											<div class="form-group checkbox-okr ">
												<div class="container-block">
													<input type="checkbox" id="chekt_her1" name="search-type_her[]" ng-true-value="'c'" ng-false-value="undefined" ng-model="selectedTypeher[0]">
													<label class="value-label" for="chekt_her1">Compartilhado</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekt_her2" name="search-type_her[]" ng-true-value="'i'" ng-false-value="undefined" ng-model="selectedTypeher[1]">
													<label class="value-label" for="chekt_her2">Individual</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekt_her3" name="search-type_her[]" ng-true-value="'t'" ng-false-value="undefined" ng-model="selectedTypeher[2]">
													<label class="value-label" for="chekt_her3">Time</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="filter_form_view view_dsds">
									<div class="row">
										<div class="col-sm-4">
											<label>Responsável</label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_her6" ng-model="okrHerUser">
													<label for="chekd_her6">Todos Responsáveis</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="search-user-her" name="usuarioher[]" class="usuario" data-placeholder="Selecione um Usuário" ng-model="selectedUserher" multiple="multiple">
													<option ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<label>Tags: </label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_tags_her">
													<label for="chekd_tags_her">Todas Tags</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="selectd_tags_her" name="selectd_tags_her[]" multiple="multiple" data-placeholder="Escolha Tag" ng-model="selectd_tags_her">
													<option ng-repeat="tag in teamTags" value="{{tag.id}}">{{tag.name}}</option>
												</select>

											</div>

										</div>
										<div class="col-sm-4">
											<label>{{ 'UI.YEAR' | translate }}</label>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="search-year-her" class="" data-native="true" data-text="Selecione o Ano" ng-options="year as year for year in years" ng-model="selectedYearNameHer" ng-change="loadCyclesHer()">
													<option value="">Todos Anos</option>
												</select>
											</div>
										</div>

									</div>
								</div>
								<div class="filter_form_view view_dsds">
									<div class="row">
										<div class="col-sm-4">
											<label>Status</label>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select class="select2 colorher" ng-model="selectedColorHer">
													<option value="">Todos</option>
													<option value="1">Em dia</option>
													<option value="2">Atenção</option>
													<option value="3">Atrasados</option>
												</select>
											</div>
										</div>

										<div class="col-sm-4">
											<label>Time</label>
											<div class="clearfix"></div>
											<select id="search-team-her" name="time" class="" ng-model="selectedTeamNotAddedOkr2">
												<option ng-repeat="team in teamsNotAddedOkr2" value="{{team.id}}" ng-selected="selectedTeamher == team.id">{{team.name}}</option>
											</select>
											<span class="corresponsaveis-selected" ng-repeat="selecteds in teamsNotAddedSelectedOkr2" ng-click="removeUserAndRefreshTeamOkr2(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="teamsokr2[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
										</div>
										<div class="col-sm-4 cyclesHer ">
											<label>{{ 'UI.QUARTER' | translate }}</label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_trimstre_her">
													<label for="chekd_trimstre_her">Todos Trimestres</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="search-cycle-her" name="clicos[]" class="trimestres" data-placeholder="Selecione o período" ng-model="selectedCycleHer" multiple="multiple">
													<option ng-repeat="cycle in cycles" value="{{cycle.id}}">{{cycle.name}}</option>
												</select>

											</div>
										</div>
									</div>
								</div>
								<div class="clr_filters">
									<!--<a href="javascript:void(0)" class="clean_filter" ng-click="reset_her()">Limpar Filtros</a>
                            <button type="submit" class="apply_filter">Aplicar Filtro</button>-->
									<button class="mdc-button mdc-fechar" ng-click="reset_her()">Limpar Filtros</button>
									<button type="submit" class="mdc-button mdc-button--raised">Aplicar Filtros</button>
								</div>

							</div>
						</div>
					</form>
				</div>
			</div>

			<div ng-show="okrtab==4">
				<div class="form_add">
					<div class="form_add add_new_function_title pdlr-0 style2" ng-class="{'bor-btm':!okrtab4_filter}">
						<div class="row">
							<div class="col-sm-2">
								<h4>{{ 'OKRS.FILTER_BY' | translate }}</h4>
							</div>
						</div>
						<!--                    <div class="col-sm-3">-->
						<!--                        <div class="btn-default">-->
						<!--                            <a href="javascript:void(0);" class="startappraisal" ng-click="view_filter4()" ng-if="!okrtab4_filter">Expandir Filtros</a>-->
						<!--                            <a href="javascript:void(0);" class="startappraisal" ng-click="hide_filter4()" ng-if="okrtab4_filter">Contrair Filtros</a>-->
						<!--                        </div>-->
						<!--                    </div>-->
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="form_add" id="div-4">
					<form id="form-search-my-activities" ng-submit="filter_my_activities()">
						<div class="filter_form_view">
							<div class="row">
								<div class="col-sm-12">
									<input id="search-name" name="nome" type="text" class="form-control" value="{{ teamDetail.name }}" ng-model="query_my_activities" placeholder="{{ 'OKRS.TYPE_YOUR_SEARCH' | translate }}">
									<!--button type="submit" class="submit-button"><i class="fa fa-search"></i></button>-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2">
								<div class="filter_form_view">
									<div class="row">
										<div class="col-sm-6">
											<label>{{ 'OKRS.SITUATION' | translate }}</label>
											<div class="form-group checkbox-okr ">
												<div class="container-block">
													<input type="checkbox" id="chekd_my1_activities" name="search-situation_my_activities[]" value="0" ng-model="selectedSituation_my_activities[0]">
													<label class="value-label" for="chekd_my1_activities">{{ 'UI.PENDING' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd_my2_activities" name="search-situation_my_activities[]" value="1" ng-model="selectedSituation_my_activities[1]">
													<label class="value-label" for="chekd_my2_activities">{{ 'UI.REACHED' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd_my3_activities" name="search-situation_my_activities[]" value="2" ng-model="selectedSituation_my_activities[2]">
													<label class="value-label" for="chekd_my3_activities">{{ 'UI.IN_PROGRESS' | translate }}</label>
												</div>
												<div class="container-block">
													<input type="checkbox" id="chekd_my4_activities" name="search-situation_my_activities[]" value="3" ng-model="selectedSituation_my_activities[3]">
													<label class="value-label" for="chekd_my4_activities">Encerrado</label>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="col-sm-10">
								<div class="filter_form_view view_dsds">
									<div class="row">
										<div class="col-sm-4">
											<label>{{ 'UI.ENCHARGED' | translate }}</label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_my6_activities" ng-model="okrMyUser_activities">
													<label for="chekd_my6_activities">Todos Responsáveis</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="search-user-my_activities" name="usuario[]" class="usuario" data-placeholder="Selecione um Usuário" ng-model="selectedUser_my_activities" multiple="multiple">
													<option ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<label>Tags: </label>
											<span class="all-selector">
												<div class="container-block">
													<input type="checkbox" id="chekd_tags_activities">
													<label for="chekd_tags_activities">Todas Tags</label>
												</div>
											</span>
											<div class="clearfix"></div>
											<div class="filters_view">
												<select id="selectd_tags_activities" name="selectd_tags_activities[]" multiple="multiple" data-placeholder="Escolha Tag" ng-model="selectd_tags_activities">
													<option ng-repeat="tag in teamTags" value="{{tag.id}}">{{tag.name}}</option>
												</select>

											</div>

										</div>
										<div class="col-sm-4">
											<label>Time</label>
											<div class="clearfix"></div>
											<select id="search-team-my_activities" name="time" class="" ng-model="selectedTeamNotAddedOkr3">
												<option ng-repeat="team in teamsNotAddedOkr3" value="{{team.id}}">{{team.name}}</option>
											</select>
											<span class="corresponsaveis-selected" ng-repeat="selecteds in teamsNotAddedSelectedOkr3" ng-click="removeUserAndRefreshTeamOkr3(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="teamsokr3[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
										</div>
									</div>
								</div>
								<div class="filter_form_view">
									<div class="row">
										<div class="col-sm-12">
											<div class="clr_filters">
												<div class="filter_btn">
													<!--<a href="javascript:void(0)" class="clean_filter" ng-click="reset_my_activities()">Limpar Filtros</a>
                                            <button type="submit" class="apply_filter">Aplicar Filtro</button>-->
													<button class="mdc-button mdc-button--outlined mdc-fechar" onclick="$('#form-export-my-activities').submit()">
														<i class="material-icons mdc-button__icon">import_export</i>
														<span class="mdc-button__label"> Exportar CSV</span>
													</button>
													<button class="mdc-button mdc-fechar" ng-click="reset_my_activities()">Limpar Filtros</button>
													<button type="submit" class="mdc-button mdc-button--raised">Aplicar Filtros</button>

												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</form>


					<div class="filter_form_view">
						<div class="row">
							<div class="col-sm-12">
								<form id="form-export-my-activities" method="post" action="<?php echo base_url('downloadAllActivitiesOkr') ?>">
									<div class="right text-right pull-right" style="display:inline;margin-left:10px;">
										<div class="dropdown" style="display:inline-block;" id="viewmorecolumn">
											<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" ng-click="viewsColumsFilter()">Adicionar Colunas
												<span class="caret"></span></button>
											<ul class="dropdown-menu pull-right padd-10" id="section_filter_box">
												<?php
												$main_columns = unserialize(ActivitiesColums);
												foreach ($main_columns as $key => $value) {
													?>
													<li>
														<div class="container-block">
															<input type="checkbox" id="checkbox_<?php echo $value['name']; ?>" ng-click="viewColumn($event,'<?php echo $value['name']; ?>')" name="<?php echo $value['name']; ?>" value="<?php echo $value['text']; ?>">
															<label for="checkbox_<?php echo $value['name']; ?>"><?php echo $value['text']; ?></label>
														</div>
													</li>
												<?php } ?>
											</ul>
										</div>
									</div>
									<!--<a class="btn btn-default btn_cls pull-right" onclick="$('#form-export-my-activities').submit()" href="javascript:void(0)" >Export CSV</a>-->


								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
					
			<!-- ABA OBJETIVOS PENDENTES PARA APROVAÇÃO -->
			<div ng-show="okrtab==5">
				<div class="form_add" id="div-5">
				&nbsp;
				<!-- CABEÇALHO -->
				<div class="tablecl">
					<div style="padding-left: 15px; width: 10%;border-right: 1px solid #fff" class="Dvtab_colums_dv">
						<label>ID</label>
					</div>
					<div style="padding-left: 15px; width: 40%;border-right: 1px solid #fff" class="Dvtab_colums_dv">
						<label>Nome do Objetivo</label>
					</div>
					<div class="Dvtab_colums_dv" style="width: 15%;border-right: 1px solid #fff; padding: 8px;">
						<label>Time</label>
					</div>
					<div class="Dvtab_colums_dv" style="width: 15%;border-right: 1px solid #fff; padding: 8px;">
						<label>Responsável</label>
					</div>
					<div class="Dvtab_colums_dv" style="width: 15%;width:14%;border-right: 1px solid #fff">
						<label>Situação</label>
					</div>
				</div>
				<!-- CABEÇALHO -->
				 
				<!-- LISTAGEM --> 
				<div class="row_group" ng-repeat="objetivo in objetivos" ng-if="objetivos.length > 0">
					<div class="elofy_table_row">
						<div class="Dvtab_colums_dv clm_main" style="padding-left: 15px; width: 10%;border-right: 1px solid #fff;text-align: center;">
							<label><a href="<?php echo base_url() ?>planejamento#!/tatic/{{ objetivo.id_objetivo }}" target="_blank">{{ objetivo.id_objetivo }}</a></label>
						</div>
						<div class="Dvtab_colums_dv clm_main" style="padding-left: 15px; width: 40%;border-right: 1px solid #fff">
							<label><a href="<?php echo base_url() ?>planejamento#!/tatic/{{ objetivo.id_objetivo }}" target="_blank" style="font-weight: bold;"> {{ objetivo.nome }} </a></label>
						</div>
						<div class="Dvtab_colums_dv clm_1" style="padding-left: 15px; width: 15%;border-right: 1px solid #fff">
							<label>{{ objetivo.nome_unidade }}</label>
						</div>
						<div class="Dvtab_colums_dv clm_2" style="padding-left: 15px; width: 15%;border-right: 1px solid #fff">
							<label>{{ objetivo.nome_usuario }}</label>
						</div>
						 <div ng-show="user.empresa.workflow == 1"  class="Dvtab_colums_dv" style="width: 15%;text-align: center;">
							<label ng-if="objetivo.status_workflow == 0">Aguardando aprovação</label>
							<label ng-if="objetivo.status_workflow == 1">Aprovado</label>
							<label ng-if="objetivo.status_workflow == 2">Reprovado</label>
						</div> 
						<!-- <div class="Dvtab_colums_dv clm_4">
							<label>&nbsp;</label>
						</div>
						<div class="Dvtab_colums_dv clm_5">
							<div class="row_heading_bar_column" style="">
								<div class="progress_wrap">
									<span>{{ tatic.percentage }}%</span>
									<div class="progress">
										<div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage }}%;" aria-valuenow="{{ tatic.percentage }}" aria-valuemin="20" aria-valuemax="100" ng-class="{'ontrack':tatic.color==1,'attention':tatic.color==2,'delayed':tatic.color==3}"></div>
									</div>
								</div>
							</div>
						</div> -->
						<div class="Dvtab_colums_dv clm_6" style="width: 5%;text-align: center;">
							<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ objetivo.id_objetivo }}" target="_blank"><i style="vertical-align: middle;" class="fa fa-external-link"></i></a>
						</div> 
					</div>
				</div>
				</div>
				<!-- LISTAGEM -->
				<!-- SEM RESULTADOS -->
				<div class="row_group" ng-if="objetivos.length <= 0">
					<div class="elofy_table_row">
						<div class="Dvtab_colums_dv clm_main" style="width: 100%;text-align: center;">
							<label>Nenhum objetivo pendente para aprovação.</label>
						</div>
					</div>
				</div>
				<!-- SEM RESULTADOS -->


			</div>
			<!-- ABA OBJETIVOS PENDENTES PARA APROVAÇÃO -->


		</div>
		<div class="clearfix"></div>


		<div class="main_box_show_dv dv-box">
			<!-- for okr tab start -->
			<div class="main_box_show_view" ng-show="okrtab==1 || !okrtab">
				<div class="DV_table_view_elofy">
					<div class="">
						<div class="tablecl">
							<div style="padding-left: 15px; width: 30%;border-right: 1px solid #fff" class="Dvtab_colums_dv">
								<label>Objetivo</label>
							</div>
							<div class="Dvtab_colums_dv" ng-class="{'width-15':user.empresa.workflow == 1}" style="border-right: 1px solid #fff; padding: 8px;">
								<label>{{ 'UI.TEAM' | translate }}</label>
							</div>
							<div class="Dvtab_colums_dv" ng-class="{'width-15':user.empresa.workflow != 1, 'width-10':user.empresa.workflow == 1}" style="width: 10%;border-right: 1px solid #fff; padding: 8px;">
								<label>{{ 'OKRS.START' | translate }}</label>
							</div>
							<div class="Dvtab_colums_dv" ng-class="{'width-15':user.empresa.workflow != 1, 'width-10':user.empresa.workflow == 1}" style="width: 10%;border-right: 1px solid #fff; padding: 8px;">
								<label>{{ 'OKRS.END' | translate }}</label>
							</div>
							<div ng-show="user.empresa.workflow == 1" class="Dvtab_colums_dv" style="width:14%;border-right: 1px solid #fff">
								<label>Workflow</label>
							</div>
							<div class="Dvtab_colums_dv" style="width:21%;border-right: 1px solid #fff">
								<label>Progresso</label>
							</div>
						</div>
						<div class="row_group" ng-repeat="tatic in tatics | filter:q as filtered" ng-if="filtered.length>0">
							<div class="elofy_table_row">
								<div class="Dvtab_colums_dv clm_main">
									<label><a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}" target="_blank" style="font-weight: bold;">{{ tatic.title }} {{tatic.estrategico==1?'(Estratégico)':''}} </a></label>
								</div>
								<div class="Dvtab_colums_dv clm_1" ng-class="{'width-15':user.empresa.workflow == 1}">
									<label>{{ tatic.team.name }} </label>
								</div>
								<div class="Dvtab_colums_dv clm_2" ng-class="{'width-10':user.empresa.workflow == 1}">
									<label>{{tatic.cycles[0].inicio_vigencia | amUtc | amDateFormat:'DD/MM/YYYY'}}</label>
								</div>
								<div class="Dvtab_colums_dv clm_3" ng-class="{'width-10':user.empresa.workflow == 1}">
									<label>{{tatic.cycles[tatic.cycles.length-1].fim_vigencia | amUtc | amDateFormat:'DD/MM/YYYY'}}</label>
								</div>

								<div ng-show="user.empresa.workflow == 1"  class="Dvtab_colums_dv" style="width: 14%;text-align: center;">
									<label class="finalizado-btn clr-pendente ng-scope" ng-if="tatic.workflow == 0">Pendente</label>
									<label class="finalizado-btn clr-finalizado ng-scope" ng-if="tatic.workflow == 1">Aprovado</label>
									<label class="finalizado-btn clr-reprovado ng-scope" ng-if="tatic.workflow == 2">Reprovado</label>
								</div>

								<!-- <div class="Dvtab_colums_dv clm_main7" style="width:2% !important;">
									<center>
										<div ng-class="{'workflow_yellow':tatic.workflow == 0}"></div>
										<div ng-class="{'workflow_green':tatic.workflow == 1}"></div>
										<div ng-class="{'workflow_red':tatic.workflow == 2}"></div>
									</center>
								</div> -->

								<div class="Dvtab_colums_dv clm_4">
									<label>&nbsp;</label>
								</div>
								<div class="Dvtab_colums_dv clm_5">
									<div class="row_heading_bar_column" style="">
										<div class="progress_wrap">
											<span>{{ tatic.percentage }}%</span>
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage }}%;" aria-valuenow="{{ tatic.percentage }}" aria-valuemin="20" aria-valuemax="100" ng-class="{'ontrack':tatic.color==1,'attention':tatic.color==2,'delayed':tatic.color==3}"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="Dvtab_colums_dv clm_6">
									<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}" class="dlts" target="_blank"><i style="vertical-align: middle;" class="fa fa-external-link"></i></a>

									<span class="top-right-chat-okr1">
										<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}" target="_blank">
											<i class="fa fa-comment" style="color: #36c7e8;" ng-if="tatic.comentario_status == 0"></i>
										</a>
									</span>

								</div>
							</div>
							<!-- <input type="" name="" class="hidden" value="{{tatic}}"> -->
							<div class="elofy_table_row2" ng-repeat="key in tatic.keys">
								<div class="Dvtab_colums_dv clm_main">
									<label title="Nome Resultado Chave">{{ key.title }}</label>
								</div>
								<div class="Dvtab_colums_dv clm_main2 width-10">
									<label title="Direção"><img ng-if="key.direcao ==1" src="<?php echo base_url('assets/portal/img/up-arrow.png') ?>">
										<img ng-if="key.direcao ==0" src="<?php echo base_url('assets/portal/img/down-arrow.png') ?>"></label>
								</div>
								<div class="Dvtab_colums_dv clm_main3 width-7">
									<label title="Ponto de Partida">{{ key.de }}</label>
								</div>
								<div class="Dvtab_colums_dv clm_main3 width-7">
									<label>>></label>
								</div>
								<div class="Dvtab_colums_dv clm_main4 width-7">
									<label title="Meta">{{ key.para }}</label>
								</div>
								<div class="Dvtab_colums_dv clm_main5 width-10">
									<label title="Valor Atual">{{ key.atual }}</label>
								</div>
								<div class="Dvtab_colums_dv clm_main7 width-8">
									<label title="Percentual">{{ key.percentage }}%</label>
								</div>
								<div class="Dvtab_colums_dv clm_main6 width-17" style="width:6% !important;">
									<label title="Data de Atualização">{{key.last_date | amUtc | amDateFormat:'DD/MM/YYYY' }}</label>
								</div>
								<div class="Dvtab_colums_dv clm_main7" style="width:6% !important;">
									<label ng-if="key.variation > 0" style="color: green;"><i style="font-size: 20px;" class="fa fa-angle-double-up"></i> {{ key.variation }} </label>
									<label ng-if="key.variation < 0" style="color: red;"><i style="font-size: 20px;" class="fa fa-angle-double-down"></i> {{0 - key.variation }} </label>
									<label ng-if="key.variation == 0">{{ key.variation }} </label>
									<label ng-if="key.variation == undefined">0 </label>
								</div>
								<div class="Dvtab_colums_dv clm_main7" style="width:2% !important;">
									<center>
										<div ng-class="{'percepcao_red':key.percepcao == 0}"></div>
										<div ng-class="{'percepcao_yellow':key.percepcao == 1}"></div>
										<div ng-class="{'percepcao_green':key.percepcao == 2}"></div>
									</center>
								</div>

								<div class="Dvtab_colums_dv clm_main8" style="display: inline-flex;width: 6% !important;" ng-class="{'disable-content':key.forma == 1}">
									<a class="btn chart_link" href="javascript:void(0)" style="display: flex; padding: unset;" data-toggle="modal" data-target="#myModal" ng-click="setKeyId(key.id, tatic, key.link, key.percepcao)"><img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url() ?>assets/portal/img/bar-chart-icon.png"></a>
									<?php
									if ($this->session->userdata('admin') == "1" || $this->session->userdata('goal_register') == "1") {
										?>
										<div class="dropdown pull-right ng-scope" style="display:inline-flex;" ng-if="user.goal_register==1 || user.user_reviewer==1 || user.admin=='true'">
											<a href="javascript:void(0)" class="btn btn-link btn-sm noshadow dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="icon-ellipsis-vert" style="font-size: 13px;"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<?php
												if ($this->session->userdata('admin') == "1" || $this->session->userdata('goal_register') == "1") {
													?>
													<li>
														<a href="javascript:void(0)" ng-click="modalKeyResult(key.id)">Editar</a>
													</li>
												<?php } ?>


												<li>
													<a ng-if="key.tipo_calculo==0  && key.link == 0" href="<?php echo base_url('okr/{{key.id}}'); ?>">Medicões</a>
												</li>

												<li>
													<a href="javascript:void(0)" ng-click="deleteKeyResults(key.id)">Delete</a>
												</li>
											</ul>
										</div>

									<?php } ?>
								</div>
							</div>
						</div>
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog" style="width: 80%;">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" style="padding-top: 20px;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<span>
											<img class="icon-user" style="width: 21px; height: 21px; margin-top: -10px;" src="<?php echo base_url() ?>assets/portal/img/bar-chart-icon.png">
											<h4 class="modal-title" ng-model="s_objective" style="font-weight: bold;">{{s_objective}}</h4><span ng-model="s_final_target"> - Meta Prevista: {{se_final_target}} %</span>
										</span>
										<span class="pull-right" style="display: inline-flex;">
											<img style="width: 21px; height: 21px; margin-top: 3px; margin-right: 5px;" src="<?php echo base_url() ?>assets/portal/img/collaboration.png">
											<h5 ng-model="s_time" style="margin-right: 10px;">{{s_time}}</h5>
											<img style="width: 21px; height: 21px; margin-top: 3px; margin-right: 5px;" src="<?php echo base_url() ?>assets/portal/img/calendar.png">
											<h5 ng-model="se_time" style="margin-right: 10px;">{{se_time | amUtc | amDateFormat:'DD/MM/YYYY'}}</h5>
											<h5 ng-model="se_percent" style="font-size: 20px; color: green; margin-top: 3px;">{{se_percent}}%</h5>
										</span>
									</div>
									<div class="modal-body" ng-init="loadDefaultCharts()">
										<h4 ng-model="se_keyresult" style="font-weight: bold;">{{se_keyresult}}</h4>
										<!--  adding measure on modal   -->
										<div class="form_add" style="padding-bottom: 0px;">
											<form id="form-measurement_new" class="">
												<div style="" class="col-md-2">
													<input name="taticId" id="taticId" type="hidden" value="<?php echo $this->session->userdata('id_tatic') ?>" />
													<input name="data" type="text" class="form-control date_picker data" id="measure-date" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required placeholder="Data" style="height: 43px;">
												</div>
												<div class="col-md-2">
													<input name="medicao" style="height:43px;" type="text" onchange="alteraPonto($(this))" class="form-control" id="measure-value" required placeholder="{{ 'OKRS.MEASUREMENT' | translate }}" pattern="\d+((\.|,)\d+)?">
													<div class="requirements row">
														Deve conter apenas números(0-9) e/ou pontos(.) ou virgulas(,).
													</div>
												</div>
												<div class="col-md-2" style="text-align: center;">
													<div class="percepcao">
														<div class="percepcao_red" ng-class="{'selected':s_percepcao == 0}" ng-click="selectModalPercepcao(0)"></div>
														<div class="percepcao_yellow" ng-class="{'selected':s_percepcao == 1}" style="margin-left: 10px;" ng-click="selectModalPercepcao(1)"></div>
														<div class="percepcao_green" ng-class="{'selected':s_percepcao == 2}" style="margin-left: 10px;" ng-click="selectModalPercepcao(2)"></div>
													</div>
												</div>
												<div class="col-md-3">
													<input name="descricao" type="text" id="measure-description" class="form-control" rows="2" placeholder="{{ 'UI.DESCRIPTION' | translate }}" style="margin: 0;min-height: 38px;height: 38px;">
												</div>
												<div class="col-md-2">
													<input id="measure-files" name="anexos" type="file" class="form-control" multiple style="height:38px;padding-top: 7px">
												</div>
												<div class="col-md-1" style="padding: 0px;">
													<!--<input type="submit" ng-if="s_link == 0" class="default-submit right-side" value="Salvar" style="margin: 0;" ng-click="submitMeasurementNew()">-->
													<button type="submit" ng-if="s_link == 0" ng-click="submitMeasurementNew()" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
												</div>
											</form>
										</div>
										<!--  adding measure on modal end   -->
										<div class="chart-wrapper">
											<div class="chart-section sec myChartSec" style="width: 100%; height: 350px;">
												<canvas id="myChart"></canvas>
											</div>
											<!-- <div id="kr_chart"></div> -->
										</div>

										<h2 class="new_heading_dv" align="center" style="margin-top: 5%">
											<div class="button_sets">
												<a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': modalTypeTab == '1' || !modalTypeTab}" ng-click="viewModalTypeTab1()">Semanal</a>
												<a href="javascript:void(0)" class="additional actives" ng-class="{'active_bitton_links_dv': modalTypeTab == '2'}" ng-click="viewModalTypeTab2()">Todas</a>

												<div class="okr_animation"></div>
											</div>
										</h2>
										<div ng-if="!modalTypeTab || modalTypeTab == 1">
											<div class="add_new_function" style="margin: 1% 0 15px 1%;;width: 98%;">

												<div class="form_add">
													<div class="form_add_row table-body overflow_dv" style="margin: 0px;width: calc(100% - 17px);">
														<div class="col-sm-12">
															<div class="tbale_dv">
																<div class="table_row_cil table-header">

																	<div class="table_cell_cil text-left" style="width: 20%;">
																		<span class="text-left" style="text-align:left">Data</span>
																	</div>
																	<div class="table_cell_cil text-left" style="width: 20%;">
																		<span class="text-left" style="text-align:left">Meta Parcial</span>
																	</div>
																	<div class="table_cell_cil text-left" style="width: 20%;">
																		<span class="text-left" style="text-align:left">Medido</span>
																	</div>
																	<div class="table_cell_cil text-left" style="width: 20%;">
																		<span class="text-left" style="text-align:left">Variação</span>
																	</div>
																	<div class="table_cell_cil text-left" style="width: 20%;">
																		<span class="text-left" style="text-align:left">Progresso</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="form_add_row table-body overflow_dv">
														<div class="col-sm-12">
															<div class="tbale_dv">
																<div class="table_row_cil table-data users-group-item " ng-if="table_data" ng-repeat="data in table_data">
																	<div class="table_cell_cil text-left font-lig" style="width: 20%;">
																		<span style="text-align:left;">{{data.data_semana | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig" style="width: 20%;">
																		<span style="text-align:left;">{{data.meta_prevista_acumulada}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig" style="width: 20%;">
																		<span style="text-align:left;">{{data.medicao_realizada}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig" style="width: 20%;">
																		<span style="text-align:left; color:green;" ng-if="data.variation_flag > 0"><i style="font-size: 20px;" class="fa fa-angle-double-up"></i> {{data.variation}} %</span>
																		<span style="text-align:left; color:red;" ng-if="data.variation_flag < 0"><i style="font-size: 20px;" class="fa fa-angle-double-down"></i> {{data.variation}} %</span>
																		<span style="text-align:left;" ng-if="data.variation_flag == 0">{{data.variation}} %</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig" style="width: 20%;">
																		<span style="text-align:left">{{data.medicao_realizada}} %</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div ng-if="modalTypeTab == 2">
											<div class="add_new_function" style="margin: 1% 0 15px 1%;;width: 98%;">
												<div class="form_add">
													<div class="form_add_row table-body overflow_dv">
														<div class="col-sm-12">
															<div class="tbale_dv">
																<div class="table_row_cil table-header">
																	<div class="table_cell_cil text-left">
																		<span class="text-left" style="text-align:left">Atualizador</span>
																	</div>
																	<div class="table_cell_cil text-left">
																		<span class="text-left" style="text-align:left">Data</span>
																	</div>
																	<div class="table_cell_cil text-left">
																		<span class="text-left" style="text-align:left">Descrição</span>
																	</div>
																	<div class="table_cell_cil text-left">
																		<span class="text-left" style="text-align:left">Valor Medido</span>
																	</div>
																	<div class="table_cell_cil text-left">
																		<span class="text-left" style="text-align:left">Percepção</span>
																	</div>
																	<div class="table_cell_cil text-left">
																		<span class="text-left" style="text-align:left">Excluir</span>
																	</div>
																</div>
																<div class="table_row_cil table-data users-group-item " ng-if="table_data" ng-repeat="data in medicaoes">
																	<div class="hidden">{{medicaoes.length}}</div>
																	<div class="table_cell_cil text-left font-lig">
																		<span style="text-align:left">{{data.user.name}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig">
																		<span style="text-align:left">{{data.date}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig">
																		<span style="text-align:left">{{data.description}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig">
																		<span style="text-align:left">{{data.value}}</span>
																	</div>
																	<div class="table_cell_cil text-left font-lig">
																		<div class="perception" ng-class="{'percepcao_red':data.percepcao == 0, 'percepcao_yellow':data.percepcao == 1, 'percepcao_green':data.percepcao == 2}"></div>
																	</div>
																	<div class="table_cell_cil text-left font-lig">
																		<button class="btn btn-danger btn-xs" style="margin: 0;" ng-click="update_confirm(data.id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus"></i></button>
																	</div>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<!--<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>-->
										<button class="mdc-button mdc-fechar" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- for okr tab end -->
			<!-- for heirarical start -->
			<div class="main_box_show_view" ng-show="okrtab==2">
				<div class="DV_table_view_elofy slfy">
					<div class="elofy_table_dv">
						<div class="tablecl">
							<div style="padding-left: 15px; width: 34%;border-right: 1px solid #fff" class="Dvtab_colums_dv">
								<label>Objetivo</label>
							</div>
							<div class="Dvtab_colums_dv" style="border-right: 1px solid #fff;width: 33%;">
								<label>Responsável</label>
							</div>
							<div class="Dvtab_colums_dv" style="width:33%;border-right: 1px solid #fff">
								<label>Progresso</label>
							</div>
						</div>
						<div id="list" class="nested-list dd with-margins">
							<div class="elofy_table_row_holder_main" ng-repeat="tatic in hierarchicaltatics | filter:qher as filtered" ng-if="filtered.length>0" ng-include="'HeriChild'"></div>
						</div>

						<script type="text/ng-template" id="HeriChild">
							<div class="elofy_table_row" ng-class="{'no-sub': !tatic.sub.length}">
                                <div class="Dvtab_colums_dv clm_main">
                                    <label class="show_hiddeb" ng-click="showokrdetail($event)">{{ tatic.title }} {{tatic.estrategico==1?'(Estratégico)':''}}
                                        <span ng-if="tatic.comentario_status == 0">
                                            <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}" target="_blank">
                                            </a>
                                            </span>
                                    </label>
                                </div>
                                <div class="Dvtab_colums_dv bntsh">
                                    <label>{{ !tatic.is_child?tatic.team.name:tatic.user.name }}</label>
                                </div>
                                <div class="Dvtab_colums_dv vieas" ng-show='!tatic.is_child'>
                                    <div class="progress_wrap">
                                        <span>{{ tatic.percentage }}%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage }}%;" aria-valuenow="{{ tatic.percentage }}" aria-valuemin="20" aria-valuemax="100" ng-class="{'ontrack':tatic.color==1,'attention':tatic.color==2,'delayed':tatic.color==3}"></div>
                                        </div>
                                    </div>
                                    <?php
									if ($this->session->userdata('admin') == "1" || $this->session->userdata('goal_register') == "1") {
										?>
                                    			<a style="float:right;" href="javascript:void(0)" ng-click="DeleteTatic(tatic.id,0)" class="dlts"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </div>
                                <div class="Dvtab_colums_dv vieas" ng-show='tatic.is_child'>
                                    <div class="progress_wrap">
                                        <span>{{ tatic.percentage }}%</span>
                                    </div>
                                    <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}" class="dlts" target="_blank"><i class="fa fa-external-link"></i></a>
                                    <span class="top-right-chat-okr1">
                                        <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}" target="_blank">
                                    <i class="fa fa-comment" style="color: #36c7e8;" ng-if="tatic.comentario_status == 0"></i>
                                    </a>
                                    </span>
                                </div>
                            </div>
                        <div class="elofy_table_row_holder" ng-if="tatic.sub.length">
                            <div class="elofy_table_row show_dvs" ng-repeat="tatic in tatic.sub | filter:q" ng-include="'HeriChild'"></div>
                        </div>
                    </script>

					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- for heirarical end -->
			<!-- for my activities tab start -->

			<div class="main_box_show_view" ng-show="okrtab==4">
				<div class="DV_table_view_elofy cli">
					<div id="tbl_activities" class="table-responsive content horizontal-images">
						<table class="table table-bordered tablecl">
							<thead>
								<tr>
									<th>Nome Atividade</th>
									<th>Responsável</th>
									<th>Início</th>
									<th>Fim</th>
									<th>Ativo</th>
									<th>Atraso</th>
									<th>Progresso</th>
									<th ng-if="type_column == '1'">Tipo</th>
									<th ng-if="description_column == '1'">Descrição</th>
									<th ng-if="situacao_ativ == '1'">Situacão tipo</th>
									<th ng-if="corresponsaveis_ativ == '1'">Corresponsaveis ativ</th>
									<th ng-if="data_atualiz_ativ == '1'">Data atualiz ativ</th>
									<th ng-if="situation_column == '1'">Situation desc</th>
									<th ng-if="empresa_name_column == '1'">Empresa Name</th>
									<th ng-if="team_name_column == '1'">Time </th>
									<th ng-if="objective_name_column == '1'">Objetivo</th>
									<th ng-if="objective_progress_column == '1'">Objectivo progresso</th>
									<th ng-if="objective_description_column == '1'">Objetivo descrição</th>
									<th ng-if="objetivo_start_column == '1'">Objetivo início</th>
									<th ng-if="objetivo_end_column == '1'">Objetivo fim</th>
									<th ng-if="objetivo_pai_column == '1'">Objetivo pai</th>
									<th ng-if="situacao == '1'">Situacao Objetivo cod</th>
									<th ng-if="descr_situacao_column == '1'">Situacao Descrição</th>
									<th ng-if="nome_RChave_column == '1'">Nome Resultado Chave</th>
									<th ng-if="descr_RChave_column == '1'">Descrição Resultado Chave</th>
									<th ng-if="meta_final_column == '1'">Meta final prev RChave</th>
									<th ng-if="Medicao_rchave_column == '1'">Medicao rchave </th>
									<th ng-if="Peso_rchave_column == '1'">Peso rchave </th>
									<th ng-if="Progress_rchave_column == '1'">Progresso rchave </th>
									<th ng-if="Responsival_rchave_column == '1'">Responsival rchave </th>
									<th ng-if="situacao_RChave == '1'">Situacao RChave </th>
									<th ng-if="Rchave_description_column == '1'">Rchave description </th>
									<th ng-if="Data_execucao == '1'">Data execucao </th>
									<th ng-if="Nome_usuario == '1'"> Nome usuario</th>
									<th ng-if="percentual_avaliacao == '1'">Percentual avaliacao </th>
									<th ng-if="peso == '1'">Peso </th>
									<th ng-if="qtd_objetivos == '1'"> Qtd objetivos</th>
									<th ng-if="qtd_atividades == '1'"> Qtd atividades</th>
									<th ng-if="qtd_rchaves == '1'"> Qtd rchaves</th>
									<th ng-if="publico == '1'"> Publico</th>
									<th ng-if="situacao == '1'"> Situacao</th>
									<th ng-if="avaliacao == '1'">Avaliacao </th>
									<th ng-if="descr_avaliacao == '1'">Descr avaliacao </th>
									<th ng-if="destaque == '1'"> Destaque</th>
									<th ng-if="data_atualiz_obj == '1'">Data atualiz obj </th>
									<th ng-if="ativo == '1'">Ativo </th>
									<th ng-if="hierarquia_times == '1'">Hierarquia times </th>
									<th ng-if="corresponsaveis == '1'">Corresponsaveis </th>
									<th ng-if="frequencia_RChave == '1'">Frequencia RChave </th>
									<th ng-if="unidade_meta_RChave == '1'"> Unidade meta RChave</th>
									<th ng-if="progresso_ajust_RChave == '1'">Progresso ajust RChave </th>
									<th ng-if="corresponsaveis_RChave == '1'">Corresponsaveis RChave </th>
									<th ng-if="publico_RChave == '1'">Publico RChave </th>
									<th ng-if="descr_situacao_RChave == '1'">Descr situacao RChave </th>
									<th ng-if="tipo_calculo_RChave == '1'">Tipo calculo RChave </th>
									<th ng-if="data_atualiz_RChave == '1'">Data atualiz RChave </th>
									<th ng-if="ativo_RChave == '1'">Ativo RChave </th>
									<th ng-if="hora_ativ == '1'">Hora ativ </th>
									<th ng-if="data_fim_real_ativ == '1'">Data fim real ativ </th>
									<th ng-if="nome_time_atv == '1'">Time Resp Atividade </th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="activity in activities | filter:q_my_activities as filtered" ng-if="filtered.length>0">
									<td class="activity">{{ activity.title }} </td>
									<td class="activity">{{ activity.resp_name}} </td>
									<td class="s_date">{{activity.init | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
									<td class="e_date">{{activity.end | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
									<td class="e_date">{{activity.active_status=='false'?'Ativa':'Inativa'}}</td>
									<td class="e_date">{{activity.atraso=='true'?'Delayed':'Normal'}}</td>
									<td class="p_bar">
										<div class="progress_wrap">
											<span>{{ activity.percentage }}%</span>
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="border-radius: 10px;width: {{ activity.percentage }}%;" aria-valuenow="{{ activity.percentage }}" aria-valuemin="20" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td ng-if="type_column == '1'">{{ activity.type }}</td>
									<td ng-if="description_column == '1'">{{ activity.description }}</td>
									<td ng-if="situacao_ativ == '1'">{{ activity.situacao_ativ }}</td>
									<td ng-if="corresponsaveis_ativ == '1'">{{ activity.corresponsaveis_ativ }}</td>
									<td ng-if="data_atualiz_ativ == '1'">{{ activity.data_atualiz_ativ }}</td>
									<td ng-if="situation_column == '1'">{{ activity.situation }}</td>
									<td ng-if="empresa_name_column == '1'">{{ activity.nome_empresa }}</td>
									<td ng-if="team_name_column == '1'">{{ activity.nome_time }}</td>
									<td ng-if="objective_name_column == '1'">{{ activity.nome_objetivo }}</td>
									<td class="p_bar" ng-if="objective_progress_column == '1'">
										<div class="progress_wrap">
											<span>{{ activity.progresso_objetivo }}%</span>
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="border-radius: 10px;width: {{ activity.progresso_objetivo }}%;" aria-valuenow="{{ activity.progresso_objetivo }}" aria-valuemin="20" aria-valuemax="100" ng-class="{'ontrack':activity.color==1,'attention':activity.color==2,'delayed':activity.color==3}"></div>
											</div>
										</div>
									</td>
									<td ng-if="objective_description_column == '1'">{{ activity.descricao_objetivo }}</td>
									<td ng-if="objetivo_start_column == '1'">{{ activity.data_ini_objetivo }}</td>
									<td ng-if="objetivo_end_column == '1'">{{ activity.data_fim_objetivo }}</td>
									<td ng-if="objetivo_pai_column == '1'">{{ activity.objetivo_pai }}</td>
									<td ng-if="situacao == '1'">{{ activity.situacao }}</td>
									<td ng-if="descr_situacao_column == '1'">{{ activity.descr_situacao }}</td>
									<td ng-if="nome_RChave_column == '1'">{{ activity.nome_RChave }}</td>
									<td ng-if="descr_RChave_column == '1'">{{ activity.descr_RChave }}</td>
									<td ng-if="meta_final_column == '1'">{{ activity.meta_final_prev_RChave }}</td>
									<td ng-if="Medicao_rchave_column == '1'">{{ activity.medicao_RChave }}</td>
									<td ng-if="Peso_rchave_column == '1'">{{ activity.peso_RChave }}</td>
									<td class="p_bar" ng-if="Progress_rchave_column == '1'">
										<div class="progress_wrap">
											<span>{{ activity.progresso_RChave }}%</span>
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="border-radius: 10px;width: {{ activity.progresso_RChave }}%;" aria-valuenow="{{ activity.progresso_RChave }}" aria-valuemin="20" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td ng-if="Responsival_rchave_column == '1'">{{ activity.nome_resp_RChave }}</td>
									<td ng-if="situacao_RChave == '1'">{{ activity.situacao_RChave }}</td>
									<td ng-if="Rchave_description_column == '1'">{{ activity.descr_situacao_RChave }}</td>
									<td ng-if="Data_execucao == '1'">{{ activity.data_execucao }}</td>
									<td ng-if="Nome_usuario == '1'">{{ activity.nome_usuario }}</td>
									<td ng-if="percentual_avaliacao == '1'">{{ activity.percentual_avaliacao }}</td>
									<td ng-if="peso == '1'">{{ activity.peso }}</td>
									<td ng-if="qtd_objetivos == '1'">{{ activity.qtd_objetivos }}</td>
									<td ng-if="qtd_atividades == '1'">{{ activity.qtd_atividades }}</td>
									<td ng-if="qtd_rchaves == '1'">{{ activity.qtd_rchaves }}</td>
									<td ng-if="publico == '1'">{{ activity.publico }}</td>
									<td ng-if="situacao == '1'">{{ activity.situacao }}</td>
									<td ng-if="avaliacao == '1'">{{ activity.avaliacao }}</td>
									<td ng-if="descr_avaliacao == '1'">{{ activity.descr_avaliacao }}</td>
									<td ng-if="destaque == '1'">{{ activity.destaque }}</td>
									<td ng-if="data_atualiz_obj == '1'">{{ activity.data_atualiz_obj }}</td>
									<td ng-if="ativo == '1'">{{ activity.ativo==1?'Ativa':'Inativa' }}</td>
									<td ng-if="hierarquia_times == '1'">{{ activity.hierarquia_times==1?'Yes':'No' }}</td>
									<td ng-if="corresponsaveis == '1'">{{ activity.corresponsaveis.split(':')[1]  }}</td>
									<td ng-if="frequencia_RChave == '1'">{{ activity.frequencia_RChave }}</td>
									<td ng-if="unidade_meta_RChave == '1'">{{ activity.unidade_meta_RChave }}</td>
									<td ng-if="progresso_ajust_RChave == '1'">{{ activity.progresso_ajust_RChave }}</td>
									<td ng-if="corresponsaveis_RChave == '1'">{{ activity.corresponsaveis_RChave.split(':')[1] }}</td>
									<td ng-if="publico_RChave == '1'">{{ activity.publico_RChave }}</td>
									<td ng-if="descr_situacao_RChave == '1'">{{ activity.descr_situacao_RChave }}</td>
									<td ng-if="tipo_calculo_RChave == '1'">{{ activity.tipo_calculo_RChave }}</td>
									<td ng-if="data_atualiz_RChave == '1'">{{ activity.data_atualiz_RChave | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
									<td ng-if="ativo_RChave == '1'">{{ activity.ativo_RChave==1?'Ativo':'Inativo' }}</td>
									<td ng-if="hora_ativ == '1'">{{ activity.nome_time_atv }}</td>
									<td ng-if="data_fim_real_ativ == '1'">{{ activity.data_fim_real_ativ }}</td>
									<td ng-if="nome_time_atv == '1'">{{ activity.nome_time_atv }}</td>
									<td class="a_btn"><a href="<?php echo base_url() ?>planejamento#!/tatic/{{ activity.id_objetivo }}" class="dlts" target="_blank"><i style="vertical-align: middle;" class="fa fa-external-link"></i></a></td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
				<div class="clearfix"></div>
			</div>
			<!-- for my activities tab end -->
		</div>
		<div class="clearfix"></div>
		<div class="well box" ng-show="filtered.length==0" ng-show="okrtab==1">
			<i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
		</div>
		<div class="modal fade in" id="modal-key-result">
			<div class="modal-dialog">
				<form id="form-key-result" class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title"><span ng-class="{'hide': keyDetail.id}">Novo</span> <span ng-class="{'hide': !keyDetail.id}">Editar</span> Resultado Chave</h4>
					</div>
					<div class="modal-body">
						<div class="progress" ng-class="{'hide': users.length}" style="margin-top:17px;">
							<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
						</div>
						<div class="form" ng-class="{'hide': !users.length}">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="key-name" class="control-label">Nome</label>
										<input name="nome" type="text" class="form-control" id="key-name" value="{{ keyDetail.title }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="key-description" class="control-label">Descrição</label>
										<textarea name="descricao" id="key-description" value="empty" class="form-control" rows="5">{{ keyDetail.description != 0?keyDetail.description:'' }}</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" style="padding-right:15px;">
									<div class="form-group">
										<label for="key-user" class="control-label">Responsável</label>
										<select id="key-user" name="usuario" class="usuario-key" data-placeholder="Selecione um Usuário" ng-model="keyDetailUser">
											<option value=""></option>
											<option ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>

										</select>
									</div>
								</div>
								<div class="col-md-6 hide" style="padding-right:15px">
									<div class="form-group">
										<label for="key-frequency" class="control-label">Frequência Alertas</label>
										<select id="key-frequency" name="frequencia" class="select-frequency form-control" data-placeholder="Selecione a Frequência" ng-model="frequencyKey">
											<option ng-repeat="frequency in frequencies" value="{{frequency.id}}">{{frequency.name}}</option>

										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label for="key-frequency" class="control-label">Manutencao</label>
									<div class="form-group checkbox-okr">
										<div class="container-block">
											<input type="checkbox" id="chkd_manutencao" name="chkd_manutencao" value="1" ng-model="chkd_manutencao">
											<label for="chkd_manutencao" class="control-label" id="label_check">Manutencao</label>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="padding-right:15px">
									<div class="form-group">
										<label for="key-frequency" class="control-label">Periodicidade</label>
										<select id="periodicidade" name="periodicidade" class="select-frequency form-control" data-placeholder="Selecione a periodicidade" ng-model="periodicidade">
											<option value="t">Trimestral</option>
											<option value="m">Mensal</option>
											<option value="s">Semanal</option>
											<option value="a">Anual</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="key-weight" class="control-label">Peso</label>
										<div class="input-spinner">
											<button type="button" class="btn btn-info" ng-click="numberLessKey()">-</button>
											<input id="key-weight" type="number" name="peso" class="form-control size-1 input-lg" ng-model="keyWeight" value="{{ keyWeight }}" min="1" max="100" style="width:135px;">
											<button type="button" class="btn btn-info" ng-click="numberMoreKey()">+</button>
										</div>
									</div>
								</div>
								<div class="col-md-4" ng-hide="chkd_manutencao == 1">
									<div class="form-group">
										<label for="ponto_partida" class="control-label">Atual</label>
										<input type="text" class="form-control" onchange="alteraPonto($(this))" name="ponto_partida" id="ponto_partida" ng-value="keyDetail.ponto_partida?keyDetail.ponto_partida:0" placeholder="0" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="key-goal" class="control-label">Meta</label>
										<input id="key-goal" type="text" name="meta" type="number" onchange="alteraPonto($(this))" class="form-control" ng-value="keyDetail.goal?keyDetail.goal:100" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="tipo_calculo" class="control-label">Tipo</label>
										<select id="tipo_calculo" name="tipo_calculo" class="tipo_calculo" data-allow-clear="true" data-placeholder="Selecione o tipo" ng-model="tipo_calculo">
											<option value=""></option>
											<option value="0">Menor Melhor</option>
											<option value="1">Maior Melhor</option>
											<option value="2">Plano de Ação</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="key-measure" class="control-label">Unidade de Medida</label>
										<input id="key-measure" name="unidade" type="text" class="form-control" value="{{ keyDetail.measurement }}">
									</div>
								</div>
							</div>
							<div class="row" ng-if="tipo_calculo == 2">
								<div class="col-md-8">
									<div class="form-group checkbox-okr">
										<div class="container-block">
											<input type="checkbox" id="chkd_tipo" name="chkd_tipo" value="1" ng-model="chkd_tipo">
											<label for="chkd_tipo" class="control-label" id="label_check">Atualizar progresso pela conclusão de atividades</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="key-users" class="control-label">Contribuidores</label>
										<select id="key-users" multiple="multiple" name="corresponsaveis[]" class="form-control multi-select users-key" ng-model="keyDetailUsers" ng-options="user.name for user in users track by user.id">
										</select>
									</div>
								</div>
								<div class="col-md-6 ">
									<div class="form-group">
										<label for="key-tags-rchave" class="control-label">Tags</label>
										<input id="key-tags-rchave" class="input-tags-key" type="text" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<!--<a href="javascript:void(0)" ng-click="opcoesAvancadasOkr()" id="opcaoes_btn">Opcoes avancadas</a>-->
						<a ng-click="opcoesAvancadasOkr()">
							<button class="mdc-button mdc-fechar mdc-button--outlined">
								<i class="material-icons mdc-button__icon">
									extension_outlined
								</i>
								<span class="mdc-button__label">Opções Avançadas</span>
							</button>
						</a>
						<!--<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin' ></i> Salvando">Salvar</button>-->
						<button class="mdc-button mdc-fechar" data-dismiss="modal">Fechar</button>
						<button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
					</div>

					<div class="advanced-options" style="display:none" id='advanced-options'>
						<div class="modal-header">
							<button type="button" class="close" ng-click="hideModalkeyAdvanced()">×</button>
							<h4 class="modal-title"> Opcoes avancadas </h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="h1-radio">Forma de atualizacao</div>
									<div class="custom_radio">
										<div class="radio_dv">
											<input type="radio" id="WebService" name="selectedOption" value="1" ng-model="selectedOption" ng-click="optionType('1')">
											<label for="WebService">WebService</label>
										</div>

										<div class="radio_dv">
											<input type="radio" id="Database" name="selectedOption" value="0" ng-model="selectedOption" ng-click="optionType('0')">
											<label for="Database">Database</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="fonte-dados" class="control-label">Fonte de dados</label>
										<select id="fonte-dados" name="fontedados" class="select-fonte form-control" ng-options="integration.id as integration.name for integration in integracoes" ng-model="selectedIntegration"></select>
									</div>
								</div>

							</div>

							<div class="row">

								<div class="col-md-12">
									<div class="form-group">
										<label for="frequenci" class="control-label">Frequência</label>
										<select id="frequenci" name="frequenci" class="select-frequencia form-control" ng-options="frequenci.id as frequenci.name for frequenci in frequencia" ng-model="selectedFrequenci"></select>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<!--<button type="button" class="btn btn-white" ng-click="hideModalkeyAdvanced()">Fechar</button>
                            <button type="button" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="saveKeyAdvanced()">Salvar</button>-->
								<a href="" ng-click="hideModalkeyAdvanced()">
									<button class="mdc-button mdc-fechar">Fechar</button>
								</a>
								<button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="saveKeyAdvanced()">Salvar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="modal fade in" id="modal-measure">
			<div class="modal-dialog">
				<form id="form-measure" class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">{{ 'OKRS.MEASUREMENTS' | translate }}</h4>
					</div>
					<div class="modal-body">
						<div class="progress" ng-class="{'hide': measures}" style="margin-top:17px;">
							<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
						</div>

						<div class="hide" ng-class="{'hide': !measures}">
							<h2 style="margin-top:0;" ng-if="measures.length">{{ measureText }}</h2>
							<hr ng-if="measures.length">
							<ul id="medicoes" class="scroll" ng-if="measures.length">
								<li ng-repeat="measure in measures">
									<h3>
										<div class="img">
											<img src="" ng-if="measure.user.image" ng-src="{{ measure.user.image }}" class="img-circle" width="32" height="32" alt="{{ measure.user.name }}" style="border:#fff 1px solid;" />
											<span class="image-replace" ng-if="!measure.user.image" style="width:32px; height:32px; line-height:32px;">{{ initials(measure.user.name) }}</span>
										</div>
										<i>{{ measure.date }}</i>
										<span class="pull-right" {{ 'OKRS.VALUE_LABEL' | translate }} <b>{{ measure.value }}</b></span>
									</h3>
									<p ng-if="measure.description">{{ measure.description }}</p>
									<p class="anexos" ng-if="measure.anexo.length > 0"><b>{{ 'UI.ATTACHMENTS_LABEL' | translate }}</b> <a ng-repeat="item in measure.anexo" href="{{ item.anexo }}" target="_blank" class="btn btn-link btn-xs noshadow"><i class="icon-doc-text"></i></a></p>
								</li>
							</ul>
							<div class="form">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-group" style="width:100%;">
												<input name="taticId" id="taticId" type="hidden" value="{{ tatic_id }}" />
												<input name="data" type="text" class="form-control date_picker" id="measure-date" placeholder="Data">
												<div class="input-group-addon"> <a href="#"><i class="icon-calendar-5"></i></a> </div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input name="medicao" type="tel" class="form-control" id="measure-value" placeholder="{{ 'OKRS.MEASUREMENT' | translate }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea name="descricao" id="measure-description" class="form-control" rows="2" placeholder="{{ 'UI.DESCRIPTION' | translate }}"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row" style="margin-bottom:0;">
											<label class="control-label col-md-1" style="line-height:35px;">{{ 'UI.ATTACHMENTS_LABEL' | translate }}</label>
											<div class="col-md-11">
												<input id="measure-files" name="anexos" type="file" class="form-control" multiple="multiple">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary salvar tipo_calculo" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
					</div>
				</form>
			</div>
		</div>
		<div class="modal fade in" id="delete-key-results">
			<div class="modal-dialog">
				<form id="activity_dismiss_form" class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Excluir Resultado Chave</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<span>Você realmente deseja excluir esse Resultado Chave?</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<!--<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary salvar" id="deleteKeyAction" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Continuar</button>-->
						<button class="mdc-button mdc-fechar" data-dismiss="modal">Fechar</button>
						<button type="submit" class="mdc-button mdc-button--raised mdc-excluir" data-loading-text="<i class='icon-spinner animate-spin' style='color: #fff;'></i> <span style='color:#fff;'>Salvando</span>" id="deleteKeyAction">Excluir</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Modal Atividades -->
		<div class="modal fade in" id="modal-activities">
			<div class="modal-dialog">
				<form id="form-activities" class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title"><span ng-class="{'hide': activityDetail.id}">{{ 'UI.NEW' | translate }}</span> <span ng-class="{'hide': !activityDetail.id}">{{ 'UI.EDIT' | translate }}</span> {{ 'UI.ACTIVITY' | translate }}</h4>
					</div>
					<div class="modal-body">
						<div class="form">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="activity-name" class="control-label">{{ 'UI.NAME' | translate }}</label>
										<input name="nome" type="text" class="form-control" id="activity-name" value="{{ activityDetail.title }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="activity-description" class="control-label">{{ 'UI.DESCRIPTION' | translate }}</label>
										<textarea name="descricao" id="activity-description" class="form-control" rows="5">{{ activityDetail.description }}</textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="activity-init" class="control-label">{{ 'OKRS.START' | translate }}</label>
										<div class="input-group" style="width:100%;">
											<input id="activity-init" name="inicio" type="text" class="form-control datepicker" value="{{ activityDetail.init }}">
											<div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="activity-end" class="control-label">{{ 'OKRS.END' | translate }}</label>
										<div class="input-group" style="width:100%;">
											<input id="activity-end" name="fim" type="text" class="form-control datepicker" value="{{ activityDetail.end }}">
											<div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="activity-end" class="control-label">{{ 'OKRS.PERCENTAGE' | translate }}</label>
										<div class="input-group" style="width:100%; margin-top:13px;">
											<input type="hidden" id="activity-percentage" ng-value="activityDetail.percentage" />
											<div class="slider"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="activity-user" class="control-label">{{ 'UI.ENCHARGED' | translate }}</label>
										<select id="activity-user" name="usuario" class="select2 usuario-activity" data-placeholder="Selecione um Usuário" ng-options="user.id as user.name for user in users" ng-model="activityDetailUser"></select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="activity-hours" class="control-label">{{ 'UI.HOURS' | translate }}</label>
										<input name="horas" type="number" class="form-control" id="activity-hours" value="{{activityDetail.hour}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="activity-users" class="control-label">{{ 'OKRS.CONTRIBUITORS' | translate }}</label>
										<select id="activity-users" multiple="multiple" name="corresponsaveis[]" class="form-control multi-select users-activity" ng-model="activityDetailUsers" ng-options="user.name for user in users track by user.id">
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="activity-tags" class="control-label">{{ 'UI.TAGS' | translate }}</label>
										<input id="activity-tags" class="input-tags-activity" type="text" />
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