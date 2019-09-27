<div ng-controller="rchavehistoryCtrl">
<div class="col-sm-12 row">
	<a href="javascript:void(0);" onclick="window.history.back();">
		<button class="mdc-button mdc-button--outlined mdc-voltar">
			<i class="material-icons mdc-button__icon">navigate_before</i>
			<span class="mdc-button__label">Voltar</span>
		</button>
	</a>
</div>
<form method="post" action="#" id="rchave_history">
	<input type="hidden" id="id_history" class="form-control" name="id_history" value="<?php echo $this->session->userdata('id_history'); ?>" ng-model="id_history"/>
</form>
<div class="section1 add_new_function survey_report" ng-init="rchavehistory_details()">
	<div class="form_add">
		<div class="form_add add_new_function_title pdlr-0 style2">
			<div class="col-sm-12">
				<a href="javascript:void(0)" class="key_link" >
					<div class="block_headings">
						<span class="image-replace warning">{{ initials(details.nome) }}</span>
						<span class="block_texts">{{details.nome}}</span>
						<div style="display: inline-block;">
							<span class="block_texts" style="padding-left: 50px;">Atualizado por</span>
							<span class="block_texts" style="padding-left: 10px; font-weight: bold;">< {{details.nome_usuario}} ></span>
							<span class="block_texts" style="padding-left: 10px;">em</span>
							<span class="block_texts" style="padding-left: 10px; font-weight: bold;">{{details.data_atualizacao | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
						</div>
					</div>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="form_add" style="margin-top: -30px;">
		<div class="row" ng-class="{'disable-content': isHeaderEditing == false}">
			<div class="col-sm-3" id="div_codigo">
				<div class="form-group">
					<label for="codigo" class="control-label">Código</label>
					<input id="codigo" type="text" class="form-control" value="{{details.id_kr_sistema_origem}}">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="minimo" class="control-label">MÍNIMO</label>
					<input ng-show="!isHeaderEditing" type="text" class="form-control" value="{{details.minimoFormatted}}">
					<input id="minimo" ng-show="details.pattern != 4 && isHeaderEditing" type="text" class="form-control" value="{{details.minimo}}">
					<input id="minimo_date" ng-show="details.pattern == 4 && isHeaderEditing" type="text" class="form-control" value="{{ details.minimo}}">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="maximo" class="control-label">MÁXIMO</label>
					<input ng-show="!isHeaderEditing" type="text" class="form-control" value="{{details.maximoFormatted}}">
					<input id="maximo" ng-show="details.pattern != 4 && isHeaderEditing" type="text" class="form-control" value="{{details.maximo}}">
					<input id="maximo_date" ng-show="details.pattern == 4 && isHeaderEditing" type="text" class="form-control" value="{{ details.maximo}}">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="target" class="control-label">TARGET</label>
					<input ng-show="!isHeaderEditing" type="text" class="form-control" value="{{details.targetFormatted}}">
					<input id="target" ng-show="details.pattern != 4 && isHeaderEditing" type="text" class="form-control" value="{{details.target}}">
					<input id="target_date" ng-show="details.pattern == 4 && isHeaderEditing" type="text" class="form-control" value="{{ details.target}}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" ng-class="{'disable-content': isHeaderEditing == false}">
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label for="history_name" class="control-label">Nome</label>
							<input id="history_name" type="text" class="form-control" value="{{details.nome}}">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="formula" class="control-label">Fórmula Cálculo</label>
							<select id="formula" name="formula" class="">
	                            <option ng-repeat="formula in formulas" value="{{formula.id}}">{{formula.name}}</option>
	                        </select>
	                    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="peso" class="control-label">PESO</label>
							<input id="peso" type="text" class="form-control" value="{{details.peso}}">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="bloque" class="control-label">Forma Atualização</label>
							<select id="bloque" name="bloque" class="">
	                            <option ng-repeat="forma in bloques" value="{{forma.id}}">{{forma.name}}</option>
	                        </select>
	                    </div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="tipo" class="control-label">Tipo</label>
							<select id="tipo" name="tipo" class="">
	                            <option ng-repeat="tipo in patterns" value="{{tipo.id}}">{{tipo.name}}</option>
	                        </select>
	                    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="unidade" class="control-label">Unidade Medida</label>
							<input id="unidade" type="text" class="form-control" value="{{details.unidade_meta}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="polar" class="control-label">Polaridade</label>
							<select id="polar" name="polar" class="">
	                            <option ng-repeat="polar in polars" value="{{polar.id}}">{{polar.name}}</option>
	                        </select>
	                    </div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 gray-content" ng-if="isHeaderEditing == false">
				<div class="form-group">
					<label for="descricao" class="control-label">Descrição </label>
					<textarea readonly class="form-control">{{details.descricao}}</textarea>
				</div>
			</div>
			<div class="col-sm-6" ng-if="isHeaderEditing == true">
				<div class="form-group">
					<label for="descricao" class="control-label">Descrição </label>
					<textarea id="descricao" class="form-control">{{details.descricao}}</textarea>
				</div>
			</div>
		</div>
		<div class="row" style="padding-top: 20px;">
			<div class="col-sm-12 flex-end" ng-show="isHeaderEditing == true">
				<button class="mdc-button mdc-fechar mdc-ripple-upgraded" ng-click="dismissHeaderEditing()" style="--mdc-ripple-fg-size:42px; --mdc-ripple-fg-scale:2.12749; --mdc-ripple-fg-translate-start:-0.484375px, -4px; --mdc-ripple-fg-translate-end:14.3594px, -3px;">Fechar</button>
				<button class="mdc-button mdc-button--raised mdc-ripple-upgraded" ng-click="saveHistoryHeader()">Salvar</button>
			</div>
			<div class="col-sm-12 flex-end" ng-show="isHeaderEditing == false">
				<button class="mdc-button mdc-button--raised mdc-ripple-upgraded" ng-click="editHistoryHeader()">Editar</button>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="section1 add_new_function survey_report">
	<div class="form_add">
		<h4 style="padding-bottom: 20px;"><b>Evolução Histórica</b></h4>
		<div class="col-sm-12">
			<div class="table_body">
				<div class="tbale_dv">
					<div class="table_row_cil table-header" style="background: #0654df">
						<div class="table_cell_cil text-left" style="width: 30%;">
							<span class="text-left" style="text-align:left; color: white;">Categoria</span>
						</div>
						<div class="table_cell_cil text-left" style="width: 30%;">
							<span class="text-left" style="text-align:left; color: white;">Meta Parcial</span>
						</div>
						<div class="table_cell_cil text-left" style="width: 30%;">
							<span class="text-left" style="text-align:left; color: white;">Valor Atual</span>
						</div>
						<div class="table_cell_cil text-left"style="width: 10%;">
							
						</div>
					</div>
					<div class="table_row_cil table-data users-group-item" ng-if="displayHistoryData.length>0" ng-repeat="history in displayHistoryData">
						<div class="table_cell_cil text-left font-lig" style="width: 30%;">
							<span style="text-align:left">{{history.category}}</span>
						</div>
						<div class="table_cell_cil text-left font-lig padding-10" style="width: 30%;">
							<span style="text-align:left" ng-if="!history.isEditing && details.pattern != 4">{{history.metaFormatted}}</span>
							<span style="text-align:left" ng-if="!history.isEditing && details.pattern == 4">{{history.metaFormatted | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
							<input type="number" step=".01" ng-if="history.isEditing && details.pattern != 4" id="meta_{{$index}}" value="{{history.meta}}">
							<input id="meta_date_{{$index}}" ng-show="history.isEditing && details.pattern == 4" type="text" class="form-control" value="{{history.meta_date | amUtc | amDateFormat:'DD/MM/YYYY'}}">
						</div>
						<div class="table_cell_cil text-left font-lig padding-10" style="width: 30%;">
							<span style="text-align:left" ng-if="!history.isEditing && details.pattern != 4">{{history.valoreFormatted}}</span>
							<span style="text-align:left" ng-if="!history.isEditing && details.pattern == 4">{{history.valoreFormatted | amUtc | amDateFormat:'DD/MM/YYYY'}}</span>
							<input type="number" step=".01" ng-if="history.isEditing && details.pattern != 4" id="valor_{{$index}}" value="{{history.valore}}">
							<input id="valor_date_{{$index}}" ng-show="history.isEditing && details.pattern == 4" type="text" class="form-control" value="{{history.valore_date | amUtc | amDateFormat:'DD/MM/YYYY'}}">
						</div>
						<div class="table_cell_cil font-lig" style="width: 10%;" ng-class="{'disable-content':id_history == 0}">
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
	</div>
</div>




</div>