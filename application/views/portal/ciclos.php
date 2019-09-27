<div ng-controller="ciclosCtrl" id="ciclos" class="ciclos">
	<h2 class="page-title">
        Ciclos <span class="text-muted">({{ results.length }})</span>
    </h2>
    <div class="add-key-btn">
        <a class="add-key-rslts ng-scope" href="javascript:void(0)" ng-click="addCiclo()"><span>+</span> Criar nova Ciclo</a>
    </div>
    <div class="row over-hide">
    	<div class="col-sm-12">
    		<div id="list" class="nested-list dd with-margins  full_width_list" >
				<div class="box filter-ciclo">
					<div class="box-header">
						<div class="buttons">
							<form id="search_ciclo_form" style="display:inline-block; vertical-align:top;">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Nome</label>
											<input id="search_nome" name="search_nome" type="text" class="form-control" ng-model="search.nome" placeholder="Nome" />
										</div>
									</div>
									<div class="col-sm-2">
	                                    <label>Situação</label>
	                                    <div class="clearfix"></div>
	                                    <div class="filters_view">
	                                        <select id="search_ativo" name="search_ativo" class="" ng-change="onChangeAtivoSelect()" ng-model="selectedAtivo">
	                                            <option ng-repeat="ativo in ativos | filter : {added : '!'}" value="{{ativo.id}}">{{ativo.name}}</option>
	                                        </select>
	                                        <span class="select-single-multiple-tag" ng-repeat="selected in ativos | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
	                                    </div>
	                                </div> 
									<div class="col-md-2">
	                                    <div class="form-group">
	                                        <label class="control-label">Aberto</label>
	                                        <div class="checkbox" style="margin-top:5px;" ng-init="search_aberto = 1">
	                                            <input type="radio" ng-value="1" id="search_aberto" ng-model="search_aberto" class="styled-checkbox">
	                                            <label for="search_aberto">Aberto</label>
	                                            <input type="radio" ng-value="0" id="search_fechado" ng-model="search_aberto" class="styled-checkbox">
	                                            <label for="search_fechado" style="margin-left: 20px;">Fechado</label>
	                                        </div>
	                                    </div>
	                                </div>
									<div class="col-md-3 okrView btn-center" style="float: right;">
										<label class="control-label"></label>
										<div class="clr_filters">
											<a href="javascript:void(0)" class="clean_filter" ng-click="clearFilter()">Limpar Filtros</a>
											<button type="button" ng-click="applyFilter()"  class="apply_filter">Aplicar Filtro</button>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
		        </div>

				<div class="form_add" ng-show="results.length>0">
					<div class="main_box_show_dv dv-box" style="margin-left: -20px; margin-right: -20px;border:none;">
						<div class="DV_table_view_elofy cli">
	                        <div class="table-responsive content horizontal-images" id="table_ciclos">
		                        <table class="table table-bordered">
		                            <tr class="">
		                                <th>Filtro</th>
		                                <th>Data de início</th>
		                                <th>Date de fim</th>
		                                <th>Objetivos Vinculados</th>
		                                <th>Objetivos Concluídos</th>
		                                <th></th>
		                            </tr>
		                            <tr ng-repeat="ciclo in results">
		                                <td>{{ciclo.filtro}}</td>
		                                <td>{{ciclo.inicio_vigencia}}</td>
		                                <td>{{ciclo.fim_vigencia}}</td>
		                                <td>{{ciclo.objective_num}}</td>
		                                <td>{{ciclo.objective_finished}}</td>
		                                <td >
											<a href="javascript:void(0)"  ng-click="editCiclo(ciclo);"><i class="icon-edit"></i></a>
										</td>
		                            </tr>
		                        </table>
	                        </div>
	                    </div>
	                </div>
		        </div>

		        <div class="form_add" ng-show="results.length<=0">
	                <div class="well box">
	                    <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
	                </div>
	            </div>
			</div>
		</div>

	</div>
	<div ng-class="openSideBarMenu?'sidemenu-section-open-menu':'sidemenu-section-closed-menu'" >
		<div class="close-sec" ng-click="closeSidebar()">
			<figure class="close-icon">
				<img src="<?php echo base_url()?>assets/portal/img/close.png" alt="close"/>
			</figure>
		</div>
		<div class="inner-section">
			<div class="modify-section">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<label for="nome_ciclo" class="control-label">Nome do ciclo</label>
							<input id="nome_ciclo" name="nome_ciclo" type="text" class="form-control" ng-model="modifyCiclo.nome_ciclo">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group big-select">
							<label for="modify_period" class="control-label">Periodo Base</label>
							<select id="modify_period" name="modify_period" ng-model="modifyCiclo.id_janela" class="form-control select-lg">
								<option ng-repeat="period in periods" value="{{period.id}}">{{period.name}}</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="form-group big-select">
                            <label for="metologia" class="control-label">Metodologia</label>
                            <select id="metologia" name="metologia" ng-model="modifyCiclo.metologia" class="form-control select-lg">
                            	<option ng-repeat="metologia in metodologis" value="{{metologia.id}}">{{metologia.name}}</option>
                            </select>
                        </div>
					</div>
					<div class="col-md-4 col-sm-4">
						<label for="ciclo_inicio" class="control-label">Inicio Ciclo</label>
						<input id="ciclo_inicio" name="ciclo_inicio" type="text" class="form-control" ng-model="modifyCiclo.inicio_vigencia">
					</div>
					<div class="col-md-4 col-sm-4">
						<label for="ciclo_fim" class="control-label">Fim do Ciclo</label>
						<input id="ciclo_fim" name="ciclo_fim" type="text" class="form-control" ng-model="modifyCiclo.fim_vigencia">
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="custom_radio custom_radio_sidebyside form-group">
	                        <label>Replica objetivos globais?</label>
	                        <div class="radio_dv">
                                <input type="radio" id="radioReplica2" name="replica" ng-value="0" ng-model="modify_replica" ng-change="changeReplica();">
                                <label for="radioReplica2">{{ 'UI.NO' | translate }}</label>
                            </div>
							<div class="radio_dv">
                                <input type="radio" id="radioReplica1" name="replica" ng-value="1" ng-model="modify_replica" ng-change="changeReplica();">
                                <label for="radioReplica1">{{ 'UI.YES' | translate }}</label>
                            </div>
						</div>
                        <button type="button" style="float: right; margin-top: 25px;" ng-click="importCicloKeyresultOpen()" ng-show="modify_replica == 1" class="btn btn-success">Importar</button>
					</div>
					<div class="col-md-12 col-sm-12 form-group" ng-show="modify_replica == 1">
						<div class="replica_list" style="">
							<table>
								<tr class="valores_dv" ng-repeat = "replica in replicas">
									<td>
                                        <a class="btn" href="#" ng-click="removeReplica(replica)"><i class="icon-trash"></i></a>{{replica.name}}
	                                </td>
								</tr>
							</table>
						</div>
					</div>
                    <div class="col-md-12 col-sm-12" style="margin-top: 10px;">
						<div class="custom_radio custom_radio_sidebyside form-group">
	                        <label>Situação&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	                        <div class="radio_dv">
                                <input type="radio" id="modify_aberto1" name="alberto" ng-value="1" ng-model="modify_aberto">
                                <label for="modify_aberto1">Aberto</label>
                            </div>
							<div class="radio_dv">
                                <input type="radio" id="modify_aberto2" name="alberto" ng-value="0" ng-model="modify_aberto">
                                <label for="modify_aberto2">Fechado</label>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn_sidebar_fix" style="position: absolute;">
				<button type="button" style="float: right;" ng-click="saveCiclo()" class="btn btn-success sidebar-save saveopnedsidebar">Salvar</button>
			</div>
		</div>
	</div>

	<div class="modal fade in" id="modal-key-import">
        <div class="modal-dialog">
            <form id="form-key-import" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Importar Resultado Chave</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" id="query_keyresult" class="form-control" placeholder="Resultado chave" ng-model="query">
                            <span class="input-group-btn">
                                <button type="button"><i class="entypo-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12" style="overflow-y: auto; max-height: 200px;">
                        <table class="form-group values-table">
                            <tr class="valores_dv">
                                <th style="width:60%">nome
                                </th>
                                <th style="width:15%">ponto_partida
                                </th>
                                <th style="width:15%">meta_final_prevista
                                </th>
                                <th style="width:15%">medicao
                                </th>
                                <th style="width:15%">progress
                                </th>
                            </tr>
                            <tr class="valores_dv" ng-repeat="keyresult in importKeyResults | filter : query">
                                <td style="width: 60%">
                                    <label class="btn_valoresa valores_dv_checker">
                                        <input type="checkbox" name="keyresult[]" autocomplete="off" ng-value="0" ng-model="keyresult.status">
                                        <span><i class="fa fa-check-circle"></i>{{keyresult.nomeRChave}}</span>
                                    </label>
                                </td>
                                <td style="width: 15%">{{keyresult.ponto_partida}}
                                </td>
                                <td style="width: 15%">{{keyresult.meta_final_prevista}}
                                </td>
                                <td style="width: 15%">{{keyresult.medicao}}
                                </td>
                                <td style="width: 15%">{{keyresult.progresso}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary salvar" ng-click="importCicloKeyresult()" data-loading-text="<i class='icon-spinner animate-spin' ></i> Importando">Importar</button>
                </div>
            </form>
        </div>
    </div>


</div>

