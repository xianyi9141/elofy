<div ng-controller="CompetenciasCtrl" id="usuarios" class="competencias" ng-cloak>
    <h2 class="page-title">
        Competências <span class="text-muted">({{ competencias.length }})</span>
    </h2>
	<div class="" style="float: right;margin-top: 10px;">
          <a class="adicionar-btnx" href="javascript:void(0)" ng-click="addcompetencia()">Nova Competência</a>
    </div>

		<div ng-class="openSideBarMenucompetencia==1?'sidemenu-section-open-menu':'sidemenu-section-closed-menu'">
				<form id="form-category-competencia">
					<div class="close-sec" ng-click="closeSidebarcompetencia()">
						<figure class="close-icon">
							<img src="<?php echo base_url();?>assets/portal/img/close.png" alt="close"/>
						</figure>
					</div>
					<div class="inner-section" style="" >
					<div  id="second_box" class="">
											
											<div class="row">
												<div class="col-md-4 col-sm-4">
													<div class="form-group">
														<label for="nome_categoria" class="control-label">Nome</label>
														<input id="id_competencia" name="id_competencia" type="hidden" class="form-control" value="{{competenciaData.id_competencia}}">
														<input id="nome_competencia" name="nome_competencia" type="text" class="form-control" ng-model="competenciaData.nome_competencia">
													</div>
												</div>
												<div class="col-md-4 col-sm-4">
													<div class="form-group select2_id_categoria_competencia">
														<label for="id_categoria_competencia" class="control-label">Categoria</label>
														<select class="form-control" name="id_categoria_competencia" ng-model="competenciaData.id_categoria_competencia" id="id_categoria_competencia">
															<option value=""></option>
															<option value="{{ category.id_categoria_competencias }}" ng-repeat="category in categories" >{{ category.nome_categoria }}</option>
														</select>	
													</div>
												</div>
												<div class="col-md-4 col-sm-4">
													<div class="form-group">
														<label for="teams" class="control-label">Tipo</label>
														<div class="clearfix"></div>
														<div style="float:left;width:80%">
															<select class="form-control" name="tipo_competencia" id="tipo_competencia" ng-model="competenciaData.tipo_competencia"style="">
																<option value=""></option>
																<option value="{{tipo.id_tipo_competencia}}" ng-repeat="tipo in competencias_tipos">{{tipo.nome_tipo}}</option>
															</select>
														</div>
														<div style="float:left">
														<label>&nbsp;</label>
															<a class="btn btn-sm btn-custom-blue cmp_btn" ng-click="addMoreCompetencia()" style="    font-size: 18px;">
																<i class="fa fa-plus"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<label for="descricao_curta" class="control-label">Descricao Curta</label>
														<textarea id="descricao_curta" name="descricao_curta" class="form-control" style="min-height: 70px;" placeholder="Descricao Curta" ng-model="competenciaData.descricao_curta"></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-group"  style="height: 70px;">
														<label for="descricao" class="control-label" style="margin-top: 15px;">Descricao</label>
														<!-- <textarea id="descricao" name="descricao" class="form-control" ng-model="competenciaData.descricao" rows="2"style="min-height: 40px;margin-top: 0;"></textarea> -->
														<div class="clearfix"></div>
														<ng-quill-editor bounds="self" ng-model="competenciaData.descricao" placeholder="{{ 'UI.DESCRIPTION' | translate }}">
															<ng-quill-toolbar>
														        <div>
														            <span class="ql-formats">
														                <button class="ql-list" value="ordered"></button>
														  				<button class="ql-list" value="bullet"></button>
														            </span>
														        </div>
														    </ng-quill-toolbar>
														</ng-quill-editor>
													</div>
												</div>
											</div>
											<br>
											<br>
											<br>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-group"  style="height: 70px;">
														<label for="comportamento_esperado" class="control-label" style="margin-top: 15px;">Comportamento Esperado</label>
														<!-- <textarea id="descricao" name="descricao" class="form-control" ng-model="competenciaData.descricao" rows="2"style="min-height: 40px;margin-top: 0;"></textarea> -->
														<div class="clearfix"></div>
														<ng-quill-editor bounds="self" ng-model="competenciaData.comportamento_esperado" placeholder="Comportamento Esperado">
															<ng-quill-toolbar>
														        <div>
														            <span class="ql-formats">
														                <button class="ql-list" value="ordered"></button>
														  				<button class="ql-list" value="bullet"></button>
														            </span>
														        </div>
														    </ng-quill-toolbar>
														</ng-quill-editor>
													</div>
												</div>
											</div>
											<br>
											<br>
											<br>
											<br>
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="form-group atitudes">
														<label for="atitudes_positivas" class="control-label">Atitudes Positivas</label>
														<div class="clearfix"></div>
														<ng-quill-editor bounds="self" ng-model="competenciaData.atitudes_positivas" placeholder="Atitudes Positivas">
															<ng-quill-toolbar>
														        <div>
														            <span class="ql-formats">
														                <button class="ql-list" value="ordered"></button>
														  				<button class="ql-list" value="bullet"></button>
														            </span>
														        </div>
														    </ng-quill-toolbar>
														</ng-quill-editor>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="form-group atitudes">
														<label for="atitudes_negativas" class="control-label">Atitudes Negativas</label>
														<div class="clearfix"></div>
														<ng-quill-editor bounds="self" ng-model="competenciaData.atitudes_negativas" placeholder="Atitudes Negativas">
															<ng-quill-toolbar>
														        <div>
														            <span class="ql-formats">
														                <button class="ql-list" value="ordered"></button>
														  				<button class="ql-list" value="bullet"></button>
														            </span>
														        </div>
														    </ng-quill-toolbar>
														</ng-quill-editor>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label for="teams" class="control-label">Cargos Vinculados</label>
														<select id="search_cargo" name="time[]" class=""  ng-model="selectedCargoNotAdded">
																<option selected="selected" value="">Selecionar cargo</option>
					                                            <option ng-repeat="cargoe in CargosNotAdded" value="{{cargoe.id}}" >{{cargoe.name}}</option>
					                                    </select>
					                                    <span class="corresponsaveis-selected" ng-repeat="selecteds in cargosNotAddedSelected" ng-click="removeUserAndRefreshCargo(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="cargosselected[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label for="teams" class="control-label">Times Vinculados</label>
														<select class="form-control" name="id_team[]" id="id_team" ng-model="teamsNotAddeds">
															<option selected="selected" value="">Selecionar time</option>
															<option value="{{ team.id }}" ng-repeat="team in teamsNotAdded">{{ team.name }}</option>
														</select>
														<span class="corresponsaveis-selected" ng-repeat="selecteds in teamsNotAddedSelected" ng-click="removeUserAndRefreshTeam(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="teamselected[]" class="form-control" readonly><i class="fa fa-remove"></i></span>	
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-group big-select">
	                                                    <label for="userTeam" class="control-label">Tipo cargo</label>
	                                                    <select id="userTipoCargo" name="userTipoCargo" ng-model="userTipoCargo" class="form-control select-lg">
	                                                    	<option value="" selected>Selecione</option>
	                                                    	<?php 
	                                                    		$tipos = unserialize(TIPOCARGO);
	                                                    		if(!empty($tipos)){
	                                                    		for($i = 0; $i < count($tipos); $i++){
	                                                    	?>
	                                                        <option value="<?php echo $tipos[$i]['value']?>" <?php if($tipos[$i]['value'] == '0'){ echo 'selected';}?>><?php echo $tipos[$i]['name']?></option>
															<?php } }  ?>
	                                                    </select>
	                                                </div>
												</div>
											</div>
											
										    <label class="value-label" for="reviewed_chk">
										    	<div class="container-block">
		                                          <input type="checkbox" id="reviewed_chk" name="reviewed" value="1" ng-model="competenciaData.reviewed" >
		                                         <label for="reviewed_chk" style="padding-left: 0">&nbsp;</label>
		                                        </div> Marcar como revisada
	                                         </label>
											 <div class="clearfix"></div>
										    <label class="value-label" for="ativo">
										    	<div class="container-block">
		                                          <input type="checkbox" id="ativo" name="ativo" value="1" ng-model="competenciaData.ativo">
		                                         <label for="ativo" style="padding-left: 0">&nbsp;</label>
		                                        </div> Ativo
	                                         </label>
	                                         <div class="clearfix"></div>
	                                         <label class="value-label" for="todos">
										    	<div class="container-block">
		                                          <input type="checkbox" id="todos" name="todos" value="1" ng-model="competenciaData.todos">
		                                         <label for="todos" style="padding-left: 0">&nbsp;</label>
		                                        </div> Exibir para todos os usuários
	                                         </label>
											<div class="row "style="padding:10px 20px 20px 20px">
						 <div class="col-md-12">
							<button type="submit" class="btn btn-success salvar cancelr_btn" style="background: white;color:black;" ng-click="resetCompetencia();compensiaFormReset()">Limpar</button>
							<button type="submit" class="btn btn-success salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="saveCompetencia()">Salvar</button>
						</div>
						</div>
											
										</div>
						</div> 
						
					</div>
										</form>
		<div class="row over-hide">
			
		
    	<div class="col-sm-12">
    		<div id="list" class="nested-list dd with-margins  full_width_list" >
				<div class="box">
					<div class="box-header" style="padding-bottom: 0px;">
						<div class="buttons">
							<form id="search_competencia_form" style="display:inline-block; vertical-align:top;margin-bottom: 0px;">
								<div class="row">
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Nome</label>
											<input id="search_nome" name="search_nome" type="text" class="form-control" ng-model="search.nome" placeholder="Nome" />
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Categoria</label>
											<select class="form-control search_select" id="search_nome_categoria"  name="nome_categoria" ng-model="search.nome_categoria">
												<option value="">Todos</option>
												<option ng-repeat="category in categories" value="{{category.id_categoria_competencias}}" >{{ category.nome_categoria }}</option>
											</select>	
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Times</label>
											<select class="form-control search_select" id="search_nome_team"  name="nome_team" ng-model="search.nome_team">
												<option selected="selected" value="">Selecionar times</option>
												<option value="{{ team.id }}" ng-repeat="team in teams">{{ team.name }}</option>
											</select>	
										</div>
									</div>
									<div class="col-md-6 okrView btn-center">
										<label class="control-label"></label>
										<div class="clr_filters">
											<a class="clean_filter" onclick="$('#form-export-my-competencia').submit()" href="javascript:void(0)">
												Baixar CSV
											</a>
											<a href="javascript:void(0)" class="clean_filter" ng-click="resetCompetencia()">Limpar Filtros</a>
											<button type="button" ng-click="searchCompetencia()"  class="apply_filter">Aplicar Filtro</button>
											<button type="button" ng-click="toggleAdvanceFilter()"  class="apply_filter advance_filter">Flitros Avançados <i class="fa fa-plus"></i></button>
											
										</div>
											
									</div>
									<div class="clearfix"></div>
									<div class="" id="comp_advance_filter" style="display: none;">
										<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Tipo</label>
											<select class="form-control search_select" id="search_tipo_competencia" name="tipo_competencia" ng-model="search.tipo_competencia">
												<option value="">Todos</option>
												<option value="{{tipo.id_tipo_competencia}}" ng-repeat="tipo in competencias_tipos">{{tipo.nome_tipo}}</option>
											</select>	
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Situação</label>
											<select class="form-control search_select" id="search_ativo" name="ativo" ng-model="search.ativo">
												<option value="">Todos</option>
												<option value="1" >Ativo</option>
												<option value="0">Inativo</option>
											</select>	
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Cargos</label>
											<select class="form-control search_select" id="search_nome_cargo" name="nome_cargo" ng-model="search.nome_cargo">
												<option selected="selected" value="">Selecionar cargos</option>
												<option ng-repeat="cargoe in cargos" value="{{cargoe.id}}" >{{cargoe.name}}</option>
											</select>	
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Revisado</label>
											<select class="form-control search_select" id="reviewed" name="reviewed" ng-model="search.reviewed">
												<option value="">Todos</option>
												<option value="1">Revisao</option>
												<option value="0">Não Revisado</option>
											</select>	
										</div>
									</div>
									<div class="col-md-1">
										<label class="control-label">Agrupamento</label>
										<input type="hidden" id="checkbox_groupby_hidden" name="groupby" >
										<div class="model_bod checkbox_layout" class="groupbyTime">
											<div class="model_ch">
												<div class="model_che">
													
													<input type="checkbox" ng-click="checkTipo()" id="checkbox_groupbyTime" >
													<label for="checkbox_groupbyTime" style="font-size:12px">Time</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-1">
										<label class="control-label"></label>
										<div class="model_bod checkbox_layout" style="margin-top:20px;" class="groupbyCargo">
											<div class="model_ch">
												<div class="model_che">
													<input type="checkbox" ng-click="checkCargo()" id="checkbox_groupbyCargo"  >
													<label for="checkbox_groupbyCargo" style="font-size:12px">Cargo</label>
												</div>
											</div>
										</div>
									</div>
									</div>
									
									
									
									
									
									<!--<div class="col-md-2">
										<div class="form-group" style="margin-top: 12%;">
										<label class="control-label">&nbsp;</label>
											<button type="button" ng-click="searchCompetencia()" class="btn btn-primary search_btn"><i class="entypo-search"></i></button>
											<a href="javascript:void(0)" class="btn btn-default reset_btn" ng-click="resetCompetencia();">
												<i class="fa fa-refresh"></i>
											</a>
											
										</div>
									</div>-->
								</div>
								<div class="row okrView ">
									
									
									
								</div>
							</form>
							<form id="form-export-my-competencia" method="post" action="<?php echo base_url('downloadAllCompetencia');?>">
							</form>
						</div>
					</div>
		        </div>
		        <div class="custom_datatables">
					<div class="box" style="margin-top:15px" id="custom_datatables">
						<table class="content competencia_datatable">
							<thead widht="100%">
								<!-- <th >Time</th>
								<th  >Cargo</th> -->
								<th width="15%" style="padding: 4px;">Nome</th>
								<th width="15%" style="padding: 4px;">Categoria</th>
								<th width="10%" style="padding: 4px;">Tipo</th>
								<th width="40%" style="padding: 4px;">Descricão</th>
								<th width="8%" style="padding: 4px;">Situação</th>
								<th width="12%" style="padding: 4px;">Marcar como revisada</th>
								<th></th>
							</thead>
							<tbody>
								<tr ng-if="competencias.length>0" ng-repeat="competencia in competencias | filter:query">
									<!-- <td class="teams" >{{ competencia.team_name }}</td>	
									<td class="crgoes">{{ competencia.cargo_name }}</td>	 -->
									<td >{{ competencia.nome_competencia }}</td>
									<td >{{ competencia.nome_categoria }}</td>
									<td >
										<span ng-repeat="tipo in competencias_tipos" ng-if=" competencia.tipo_competencia==tipo.id_tipo_competencia"> {{tipo.nome_tipo}}</span>
									</td>
									<td >
										<div class="quest_descript" ng-bind-html="competencia.descricao">
										</div>
									</td>
									<td >
										<span ng-if="competencia.ativo==1"><i class="fa fa-check green"></i></span>
										<span ng-if="competencia.ativo==0"><i class="fa fa-close red"></i></span>
									</td>
									<td >
										<span ng-if="competencia.reviewed==1"><i class="fa fa-check green"></i></span>
										<span ng-if="competencia.reviewed==0"><i class="fa fa-close red"></i></span>
									</td>
									<td >
										<a href="javascript:void(0)"  ng-click="editCompetencia(competencia.id_competencia,$index);"><i class="icon-edit"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		</div>
		
		<div class="modal fade in" id="action-competencia">
			<div class="modal-dialog">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title ">Tipos Competência</h4>
				</div>
				<div class="modal-body chngback" style="background-color:#fafafa">
					<div class="form">
						<div class="row">
							<div class="col-md-12">
								  <div class="box with-margins form-section nested-list dd full_width_list">
										<div id="side-form" class="sidebar_position_relative">
											<div class="row">
													<div id="new"class="col-md-8">
														<label for="new_tipo_to_add">Título</label>
														<input type="text" name="new_tipo" class="form-control new_tipoclass" id="new_tipo_to_add" >
													</div>
													<div class="col-md-4"  style="text-align:center;padding-top:23px"><a href="javascript:void(0);" ng-click="add_new_tipo()" class="btn btn-primary-custom grnshadow">Criar nova</a></div>
											</div>
										</div>
									</div>
									<div id="list" class="box with-margins  nested-list dd full_width_list">
										<div class="box-header headingtipo">
												<table style="width:100%">
													<thead>
														<td width="70%">Título</td>
														<td  style="text-align:center">ACTION</td>
													</thead>
												</table>
										</div>
										
										<div class="form-group" style="position: relative;max-height: 238px;overflow-y: scroll;overflow-x: hidden;width:100%;">
											<table class="content">
												<tr ng-repeat="tipo in competencias_tipos">
													<td id="nome_tipo{{tipo.id_tipo_competencia}}">{{tipo.nome_tipo}}</td>
													<td  style="display:none" id="nome{{tipo.id_tipo_competencia}}" class="inputbox">
														<input type="text" name="" value="{{tipo.nome_tipo}}" class="form-control" id="new_tipo{{tipo.id_tipo_competencia}}" >
													</td>
													<td style="text-align:center">
														<a href="javascript:void(0);" id=  "edit{{tipo.id_tipo_competencia}}" ng-click="edit_tipo(tipo.id_tipo_competencia)"><i class="icon-edit"></i></a>
														<a href="javascript:void(0);" style="display:none" id="save{{tipo.id_tipo_competencia}}" class="btn btn-success salvar" ng-click="save_tipo(tipo.id_tipo_competencia)">&nbsp;&nbsp;Salvar&nbsp;&nbsp;</a>
													</td>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
		</div>
		
		
		
	</div>
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">