<div ng-controller="nineboxdetailCtrl" class="nineboxDetails" ng-init="retrieveNineBoxDetails()">

<div class="col-sm-12 row">
	<a href="javascript:void(0);" onclick="window.history.back();">
		<button class="mdc-button mdc-button--outlined mdc-voltar">
			<i class="material-icons mdc-button__icon">navigate_before</i>
			<span class="mdc-button__label">Voltar</span>
		</button>
	</a>
</div>

<div class="section1 add_new_function survey_report">
	<div class="form_add">
		<div class="row">
			<div class="col-sm-3" style="display: -webkit-inline-box; margin-top: 3px;">
				<div class="block_headings">
					<span class="image-replace warning {{selectedBox.class}}"></span>
				</div>
				<div class="block_headings box_name">
					<span class="block_texts">{{selectedBox.name_translated}}</span>
				</div>
			</div>
			<div class="col-sm-1" style="margin-top: 3px;">
				<div class="block_headings" style="float: right;padding-top: 5px;">
					Filtrar:
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group" style="margin-top: 0px;">
					<select id="filter_box" name="filter_box" class="">
						<option ng-repeat="box in boxes" value="{{box.number}}">{{box.name_translated | translate}}</option>
                    </select>
                </div>
			</div>
		</div>
		<div class="row" style="padding-top: 40px;">
			<div class="col-sm-12">
				<div class="table_body">
					<div class="tbale_dv">
						<div class="table_row_cil table-header" style="background: #0654df">
							<div class="table_cell_cil text-left" style="width: 10%;">
								<span class="text-left" style="text-align:left; color: white;">Nome</span>
							</div>
							<div class="table_cell_cil text-left" style="width: 10%;">
								<span class="text-left" style="text-align:left; color: white;">Cargo</span>
							</div>
							<div class="table_cell_cil text-left" style="width: 10%;">
								<span class="text-left" style="text-align:left; color: white;">Tempo de empresa</span>
							</div>
							<div class="table_cell_cil text-left" style="width: 10%;">
								<span class="text-left" style="text-align:left; color: white;">Média final</span>
							</div>
							<div class="table_cell_cil text-left" style="width: 10%;">
								<span class="text-left" style="text-align:left; color: white;">Remuneração</span>
							</div>
							<div class="table_cell_cil text-left" style="width: 10%;">
								<span class="text-left" style="text-align:left; color: white;">9 Box</span>
							</div>
							<div class="table_cell_cil text-left" style="width: 25%;">
								<span class="text-left" style="text-align:left; color: white;">Feedback</span>
							</div>
							<div class="table_cell_cil text-left"style="width: 5%;">
								
							</div>
						</div>
						<div class="table_row_cil table-data users-group-item" ng-if="selectedBox.users.length>0" ng-repeat="user in selectedBox.users">
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 10%;">
								<span style="text-align:left">{{user.name}}</span>
							</div>
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 10%;">
								<span style="text-align:left">{{user.cargo}}</span>
							</div>
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 10%;">
								<span ng-if="user.tempo_empresa < 1">menos de 1 mês</span>
                                <span ng-if="user.tempo_empresa == 1">{{user.tempo_empresa}} mês</span>
                                <span ng-if="user.tempo_empresa > 1 && user.tempo_empresa < 12">{{user.tempo_empresa}} meses</span>
                                <span ng-if="user.tempo_empresa == 12">1 ano</span>
                                <span ng-if="user.tempo_empresa > 12">{{user.tempo_empresa/12 | number:2}} anos</span>
							</div>
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 10%;">
								<span style="text-align:left">{{user.media_final}}</span>
							</div>
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 10%;">
								<span style="text-align:left">{{user.atual}}</span>
							</div>
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 10%;">
								<span ng-show="!user.isEditing"  style="text-align:left">{{selectedBox.name_translated}}</span>
								<select ng-show="user.isEditing" id="ninebox_{{$index}}" name="ninebox_{{$index}}" class="">
									<option selected="selected" value="">Escolha</option>
		                            <option ng-repeat="box in boxes" value="{{box.number}}">{{box.name_translated | translate}}</option>
		                        </select>
							</div>
							<div class="table_cell_cil text-left font-lig padding-10" style="width: 30%;">
								<textarea id="feedback_{{$index}}" class="form-control" ng-disabled="!user.isEditing">{{user.feedback}}</textarea>
							</div>
							<div class="table_cell_cil font-lig" style="width: 10%;">
								<span class="icon" ng-click="editNineBox(user, $index)">
	                                <a class="adicionar-btnx" style="cursor: pointer;padding-top: 5px; margin: 0px !important; padding: 3px !important;" ng-show="user.isEditing">Salvar</a>
	                                <a ng-show="!user.isEditing" class="linkatividade" style="cursor: pointer;padding-top: 5px;"><i class="icon-edit"></i></a>
	                            </span>
							</div>
						</div>
					</div>
				</div>
				<div class="box" style="margin-top: 10px;" ng-if="selectedBox.users.length==0">
	                <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
	            </div>
			</div>
		</div>
	</div>
</div>

</div>