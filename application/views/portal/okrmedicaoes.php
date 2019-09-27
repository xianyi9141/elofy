<!-- OKR's -->
<script src="<?php echo base_url('assets/portal/js')?>/Chart.extentions.js"></script>
<div ng-controller="okrCtrl">
<div class="col-sm-12 row">
	<a href="javascript:void(0);" onclick="window.history.back();">
		<button class="mdc-button mdc-button--outlined mdc-voltar">
			<i class="material-icons mdc-button__icon">navigate_before</i>
			<span class="mdc-button__label">Voltar</span>
		</button>
	</a>
</div>
	<div class="section1 add_new_function survey_report" >
		<form method="post" action="#" id="okr_medicaoes">
			<input type="hidden" id="id_key_result" class="form-control" name="id_key_result" value="<?php echo $this->session->userdata('id_key_result'); ?>" ng-model="id_key_result"/>
			<div class="form_add"  ng-init="okrMedicaoes_details()">
				<div class="form_add add_new_function_title pdlr-0 style2">
					<div class="col-sm-12">
						<a href="javascript:void(0)" class="key_link" >
							<div class="block_headings">
								<span class="image-replace warning">{{ initials(keyDetails.title) }}</span>
								<span class="block_texts">{{keyDetails.title}}</span>
								<div ng-if="keyResultHistory" style="display: inline-block;">
									<span class="block_texts" style="padding-left: 50px;">Atualizado por</span>
									<span class="block_texts" style="padding-left: 10px; font-weight: bold;">< {{keyDetails.nome_usuario}} ></span>
									<span class="block_texts" style="padding-left: 10px;">em</span>
									<span class="block_texts" style="padding-left: 10px; font-weight: bold;">{{keyResultHistory.data_atualizacao | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
								</div>
							</div>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form_add" style="padding: 14px;" ng-if="user.empresa.contrato_metas==0">
					<div class="desc_key">
						<p>
							A última atualização para o resultado chave foi realizada em <span class="yellow">{{keyDetails.last_date | amUtc | amDateFormat:'DD/MM/YYYY'}}</span> reportou uma medição de <span class="green">{{keyDetails.Medicao}} {{keyDetails.measurement}}</span> e um progresso de <span class="green">{{keyDetails.percentage}}</span> da meta definida para o período que é de <span class="blue">{{keyDetails.meta_final_prevista}}.</span>
						</p>
						<p>
							<strong>Para informar uma nova atualização utilize o formulario abaixo</strong>
						</p>
					</div>
				</div>
			</div>
		</form>
		<div class="form_add" ng-show="user.empresa.contrato_metas==1" style="margin-top: -30px;">
			<div class="row" ng-class="{'disable-content': isKeyresultEditing == false}">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="keyresult_name" class="control-label">Nome</label>
						<input id="keyresult_name" type="text" class="form-control" value="{{keyDetails.title}}">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="tipo_acomp" class="control-label">Tipo Acompanhamento</label>
						<select id="tipo_acomp" name="tipo_acomp" class="">
                            <option ng-repeat="tipo in acompTipos" value="{{tipo.id}}">{{tipo.name}}</option>
                        </select>
                    </div>
				</div>
				<div class="col-sm-2" id="div_pattern">
					<div class="form-group">
						<label for="tipo_pattern" class="control-label">Tipo de Informação</label>
						<select id="tipo_pattern" name="tipo_pattern" class="">
                            <option ng-repeat="tipo in patterns" value="{{tipo.id}}">{{tipo.name}}</option>
                        </select>
                    </div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label for="forma_calculo" class="control-label">Fórmula Cálculo</label>
						<select id="forma_calculo" name="forma_calculo" class="">
                            <option ng-repeat="tipo in formaCalculos" value="{{tipo.id}}">{{tipo.name}}</option>
                        </select>
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6" ng-class="{'disable-content': isKeyresultEditing == false}">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="minimo" class="control-label">MÍNIMO</label>
								<input id="minimo" ng-show="keyDetails.acomp != 1" type="text" class="form-control" value="{{keyDetails.inferior}}">
								<input id="minimo_date" ng-show="keyDetails.acomp == 1" type="text" class="form-control" value="{{ keyDetails.minimo_date | amUtc | amDateFormat:'DD/MM/YYYY' }}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="maximo" class="control-label">MÁXIMO</label>
								<input id="maximo" ng-show="keyDetails.acomp != 1" type="text" class="form-control" value="{{keyDetails.superior}}">
								<input id="maximo_date" ng-show="keyDetails.acomp == 1" type="text" class="form-control" value="{{ keyDetails.maximo_date | amUtc | amDateFormat:'DD/MM/YYYY' }}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="target" class="control-label">TARGET</label>
								<input id="target" ng-show="keyDetails.acomp != 1" type="text" class="form-control" value="{{keyDetails.goal}}">
								<input id="target_date" ng-show="keyDetails.acomp == 1" type="text" class="form-control" value="{{ keyDetails.target_date | amUtc | amDateFormat:'DD/MM/YYYY' }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="forma_type" class="control-label">Forma Atualização</label>
								<select id="forma_type" name="forma_type" class="">
		                            <option ng-repeat="forma in tipo_formas" value="{{forma.id}}">{{forma.name}}</option>
		                        </select>
		                    </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="sistema_origem" class="control-label">Indicador Base</label>
								<input id="sistema_origem" type="text" class="form-control" value="{{keyDetails.sistema_origem}}">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="peso" class="control-label">PESO</label>
								<input id="peso" type="text" class="form-control" value="{{keyDetails.weight}}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="unidade" class="control-label">Unidade Medida</label>
								<input id="unidade" type="text" class="form-control" value="{{keyDetails.measurement}}">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="direcao" class="control-label">Direcao</label>
								<select id="direcao" name="direcao" class="">
		                            <option ng-repeat="direcao in direcao" value="{{direcao.id}}">{{direcao.name}}</option>
		                        </select>
		                    </div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 gray-content" ng-if="isKeyresultEditing == false">
					<div class="form-group">
						<label for="keyresult_descricao" class="control-label">Descrição </label>
						<textarea style="margin: 0;" readonly class="form-control">{{keyDetails.descricao}}</textarea>
					</div>
				</div>
				<div class="col-sm-6" ng-if="isKeyresultEditing == true">
					<div class="form-group">
						<label for="keyresult_descricao" class="control-label">Descrição </label>
						<textarea id="keyresult_descricao" class="form-control">{{keyDetails.descricao}}</textarea>
					</div>
				</div>
			</div>
			<div class="row" ng-if="user.admin == 'true'" style="padding-top: 20px;">
				<div class="col-sm-12 flex-end" ng-show="isKeyresultEditing == true">
					<button class="mdc-button mdc-fechar mdc-ripple-upgraded" ng-click="dismissEditingKeyresultDetail()" style="--mdc-ripple-fg-size:42px; --mdc-ripple-fg-scale:2.12749; --mdc-ripple-fg-translate-start:-0.484375px, -4px; --mdc-ripple-fg-translate-end:14.3594px, -3px;">Fechar</button>
					<button class="mdc-button mdc-button--raised mdc-ripple-upgraded" ng-click="saveKeyresultDetail()">Salvar</button>
				</div>
				<div class="col-sm-12 flex-end" ng-show="isKeyresultEditing == false">
					<button class="mdc-button mdc-button--raised mdc-ripple-upgraded" ng-click="editKeyresultDetail()">Editar</button>
				</div>
			</div>
		</div>
		<div class="form_add" ng-if="user.empresa.contrato_metas==0" style="margin-top: -50px;">
			<!--<form id="form-measurement" class="">
				<div class="col-md-2">
					<input name="taticId" id="taticId" type="hidden" value="<?php echo $this->session->userdata('id_tatic') ?>" />
					<input name="data" type="text" class="form-control date_picker data" id="measure-date" placeholder="Data" style="height: 43px;">
				</div>
				<div class="col-md-2">
						<input name="medicao" style="height:43px;" type="text"  onchange="alteraPonto($(this))" class="form-control" id="measure-value" placeholder="{{ 'OKRS.MEASUREMENT' | translate }}">
				</div>
				<div class="col-md-4">
						<textarea name="descricao" id="measure-description" class="form-control" rows="2" placeholder="{{ 'UI.DESCRIPTION' | translate }}" style="margin: 0;min-height: 43px;height: 43px;padding-top: 10px"></textarea>
				</div>
				<div class="col-md-3">
						<input id="measure-files" name="anexos" type="file" class="form-control" multiple style="height:43px;padding-top: 10px">
				</div>
				<div class="col-md-1">
							<button type="submit" class="default-submit right-side" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" style="margin: 0;" ng-click="submitMeasurement()">Salvar</button>
				</div>
			</form>-->
			<form id="form-measurement" class="">
				<div class="col-md-2">
					<input name="taticId" id="taticId" type="hidden" value="<?php echo $this->session->userdata('id_tatic') ?>" />
					<input name="data" type="text" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" class="form-control date_picker data" id="measure-date" style="height: 43px;" required placeholder="Data">
				</div>
				<div class="col-md-2">
						<input name="medicao" style="height:43px;" type="text"  onchange="alteraPonto($(this))" class="form-control" id="measure-value" pattern="\d+((\.|,)\d+)?" required placeholder="{{ 'OKRS.MEASUREMENT' | translate }}">
						<div class="requirements row">
      						Deve conter apenas números(0-9) e/ou pontos(.) ou virgulas(,).
    					</div>
				</div>
				<div class="col-md-2" style="text-align: center;width: 12%;">
						<div class="percepcao">
							<div class="percepcao_red" ng-class="{'selected':keyDetails.percepcao == 0}" ng-click="selectPercepcao(keyDetails, 0)"></div>	    
							<div class="percepcao_yellow" ng-class="{'selected':keyDetails.percepcao == 1}" style="margin-left: 10px;" ng-click="selectPercepcao(keyDetails, 1)"></div>
			                <div class="percepcao_green" ng-class="{'selected':keyDetails.percepcao == 2}" style="margin-left: 10px;" ng-click="selectPercepcao(keyDetails, 2)"></div>            
			            </div>
				</div>
				<div class="col-md-3">
						<input name="descricao" id="measure-description" class="form-control" type="text" rows="2" placeholder="{{ 'UI.DESCRIPTION' | translate }}" style="margin: 0;min-height: 38px;height: 38;"></input>
				</div>
				<div class="col-md-2" style="width: 21%;">
						<input id="measure-files" name="anexos" type="file" class="form-control" multiple style="height:38px;padding-top: 7px">
				</div>
				<div class="col-md-1">
							<!--<input type="submit" class="default-submit right-side" value="Salvar" style="margin: 0;" ng-click="submitMeasurement()"></input>-->
							<button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="submitMeasurement()">Salvar</button>
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="section1 add_new_function survey_report">
		<div class="col-md-12">
			<div class="hideForContrato" ng-if="user.empresa.contrato_metas==0">
				<div class="form_add" ng-init="loadDefaultCharts()">

					<div class="chart-wrapper">
						<div class="chart-section sec myChartSec" style="width: 100%; height: 350px;">
							<canvas id="myChart"></canvas>
						</div>
						<!-- <div id="kr_chart"></div> -->
					</div>
					<div class="clearfix"></div>


					<h2 class="new_heading_dv" align="center" style="margin-top: 2%">
					<div class="button_sets">
						<a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': typetab == '1' || !typetab}" ng-click="viewTypeTab1()">Semanal</a>
						<a href="javascript:void(0)" class="additional actives" ng-class="{'active_bitton_links_dv': typetab == '2'}" ng-click="viewTypeTab2()">Todas</a>

						<div class="okr_animation"></div>
					</div>
					</h2>
					<div ng-if="!typetab || typetab == 1">
						<div class="add_new_function" style="margin: 1% 0 15px 1%;;width: 98%;">
							<div class="form_add">
								<div class="form_add_row table-body overflow_dv">
									<div class="col-sm-12">
										<div class="tbale_dv">
											<div class="table_row_cil table-header">

												<div class="table_cell_cil text-left">
													<span class="text-left" style="text-align:left">Semana</span>
												</div>
												<div class="table_cell_cil text-left">
													<span class="text-left" style="text-align:left">Meta Parcial</span>
												</div>
												<div class="table_cell_cil text-left">
													<span class="text-left" style="text-align:left">Valor Atual</span>
												</div>
												<div class="table_cell_cil text-left">
													<span class="text-left" style="text-align:left">Final Target</span>
												</div>
											</div>
											<div class="table_row_cil table-data users-group-item " ng-if="table_data" ng-repeat="data in table_data">

												<div class="table_cell_cil text-left font-lig">
													<span style="text-align:left">{{data.data_semana | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
												</div>
												<div class="table_cell_cil text-left font-lig" >
													<span style="text-align:left">{{data.meta_prevista_acumulada}}</span>
												</div>
												<div class="table_cell_cil text-left font-lig">
													<span style="text-align:left">{{data.medicao_realizada}}</span>
												</div>
												<div class="table_cell_cil text-left font-lig">
													<span style="text-align:left">{{data.meta_final_prevista}}</span>
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
					<div ng-if="typetab == 2">
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
												<div class="table_cell_cil text-left font-lig" >
													<span style="text-align:left">{{data.description}}</span>
												</div>
												<div class="table_cell_cil text-left font-lig">
													<span style="text-align:left">{{data.value}}</span>
												</div>
												<div class="table_cell_cil text-left font-lig">
			                                        <div class="perception" ng-class="{'percepcao_red':data.percepcao == 0, 'percepcao_yellow':data.percepcao == 1, 'percepcao_green':data.percepcao == 2}"></div>
												</div>
												<div class="table_cell_cil text-left font-lig">
													<button  class="btn btn-danger btn-xs" style="margin: 0;" ng-click="update_confirm(data.id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus"></i></button>
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
					<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i style="color: #cc2424; font-size:20px;" class="fa fa-exclamation-circle"></i> Aviso</h4>
								</div>
								<div class="modal-body">
									<input class="hidden" id="userId" value="">
									<p>Você confirma a exclusão da medição?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" ng-click="update()">Sim</button>
									<button type="button" class="noButton btn btn-default" data-dismiss="modal">Não</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="showForContrato">
				<div class="form_add" ng-if="user.empresa.contrato_metas==1">
					<h4 style="padding-bottom: 20px;"><b>Evolução Histórica</b></h4>
					<div ng-class="{'col-sm-12':keyDetails.acomp == 1, 'col-sm-6':keyDetails.acomp != 1}">
						<div class="table_body">
							<div class="tbale_dv">
								<div class="table_row_cil table-header" style="background: #0654df">
									<div class="table_cell_cil text-left" ng-class="{'width-16':keyDetails.acomp == 1, 'width-30':keyDetails.acomp != 1}">
										<span class="text-left" style="text-align:left; color: white;">Categoria</span>
									</div>
									<!-- <div class="table_cell_cil text-left" style="width: 20%;">
										<span class="text-left" style="text-align:left; color: white;">Planejado</span>
									</div> -->
									<div class="table_cell_cil text-left" ng-class="{'width-16':keyDetails.acomp == 1, 'width-30':keyDetails.acomp != 1}">
										<span class="text-left" style="text-align:left; color: white;">Meta Parcial</span>
									</div>
									<div class="table_cell_cil text-left" ng-class="{'width-16':keyDetails.acomp == 1, 'width-30':keyDetails.acomp != 1}">
										<span class="text-left" style="text-align:left; color: white;">Valor Atual</span>
									</div>
									<div class="table_cell_cil text-left width-23" ng-if="keyDetails.acomp == 1">
										<span class="text-left" style="text-align:left; color: white;">Descricao</span>
									</div>
									<div class="table_cell_cil text-left width-16" ng-if="keyDetails.acomp == 1">
										<span class="text-left" style="text-align:left; color: white;">Anexar Arquivos</span>
									</div>
									<div class="table_cell_cil text-left" ng-if="keyDetails.acomp == 1" style="width: 6%;">
										
									</div>
									<div class="table_cell_cil text-left"style="width: 17%;">
										
									</div>
								</div>
								<div class="table_row_cil table-data users-group-item" ng-if="displayHistoryData.length>0" ng-repeat="history in displayHistoryData">
									<div class="table_cell_cil text-left font-lig" ng-class="{'width-16':keyDetails.acomp == 1, 'width-30':keyDetails.acomp != 1}">
										<span style="text-align:left">{{history.category}}</span>
									</div>
									<!-- <div class="table_cell_cil text-left font-lig" style="width: 20%;">
										<span style="text-align:left" ng-if="!history.isEditing">{{history.planejado}}</span>
										<input type="text" ng-if="history.isEditing" id="planejado_{{$index}}" value="{{history.planejado}}">
									</div> -->
									<div class="table_cell_cil text-left font-lig padding-10" ng-class="{'width-16':keyDetails.acomp == 1, 'width-30':keyDetails.acomp != 1}">
										<span style="text-align:left" ng-if="keyDetails.pattern != 4">{{history.metaFormatted}}</span>
										<span style="text-align:left" ng-if="keyDetails.pattern == 4">{{history.metaFormatted | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
										<!--
										<input type="number" step=".01" ng-if="history.isEditing && keyDetails.acomp != 1" id="meta_{{$index}}" value="{{history.meta}}">
										<input id="meta_date_{{$index}}" ng-show="history.isEditing && keyDetails.acomp == 1" type="text" class="form-control" value="{{history.meta}}"> -->
									</div>
									<div class="table_cell_cil text-left font-lig padding-10" ng-class="{'width-16':keyDetails.acomp == 1, 'width-30':keyDetails.acomp != 1}">
										<span style="text-align:left" ng-if="!history.isEditing && keyDetails.pattern != 4">{{history.valoreFormatted}}</span>
										<span style="text-align:left" ng-if="!history.isEditing && keyDetails.pattern == 4">{{history.valoreFormatted | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
										<input type="number" step=".01" ng-if="history.isEditing && (keyDetails.pattern != 4 && keyDetails.acomp != 1)" id="valor_{{$index}}" value="{{history.valore}}">
										<input id="valor_date_{{$index}}" ng-show="history.isEditing && (keyDetails.pattern == 4 || keyDetails.acomp == 1)" type="text" class="form-control" value="{{history.valore_date | amUtc | amDateFormat:'DD/MM/YYYY'}}">
									</div>
									<div class="table_cell_cil text-left font-lig width-23" ng-if="keyDetails.acomp == 1">
										<textarea id="descricao_{{$index}}" class="form-control" ng-class="{'disable-content':!history.isEditing}">{{history.descricao}}</textarea>
									</div>
									<div class="table_cell_cil text-left font-lig width-16" ng-if="keyDetails.acomp == 1">
										<input id="attach_{{$index}}" type="file" class="form-control" ng-class="{'disable-content':!history.isEditing}" multiple style="height:38px;padding-top: 7px;color:transparent;" onchange="this.style.color = 'black';">
									</div>
									<div class="table_cell_cil text-left font-lig" style="width: 6%;" ng-if="keyDetails.acomp == 1">
										<button ng-if="history.anexo != null" class="mdc-icon-button material-icons mdc-theme--secondary" ng-click="downloadContrato(history.anexo)">cloud_download</button>
									</div>
									<div class="table_cell_cil font-lig" style="width: 17%;" ng-class="{'disable-content':keyDetails.forma != 2}">
										<span class="icon" ng-click="editKeyresultHistory(history, $index)">
	                                        <a class="adicionar-btnx" style="cursor: pointer;padding-top: 5px; margin: 0px !important; padding: 3px !important;" ng-show="history.isEditing">Salvar</a>
	                                        <a ng-show="!history.isEditing" class="linkatividade" style="cursor: pointer;padding-top: 5px;"><i class="icon-edit"></i></a>
	                                    </span>
									</div>
								</div>
							</div>
						</div>
						<div class="box" style="margin-top: 10px;" ng-if="displayHistoryData.length==0">
	                        <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
	                    </div>
					</div>
					<div class="col-sm-6" ng-if="keyDetails.acomp != 1">
						<div class="panel panel-primary box">
                            <div style="height: 850px;">
                                <canvas id="keyresult_history_chart"></canvas>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>