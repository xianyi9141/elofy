<!-- Edição de Times -->
<div ng-controller="cargosCtrl" class="hide" ng-class="{'hide': !teams}">
    <div>
        <h2 ng-show="activetab == 1">
            <div class="buttons pull-right">
                <form style="display:inline-block; vertical-align:top;" ng-submit="search()">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{ 'UI.SEARCH_FOR_NAME' | translate }}" ng-model="query">
                        <span class="input-group-btn">
                            <button type="submit"><i class="entypo-search"></i></button>
                        </span>
                    </div>
                </form>
                <a href="javascript:;" ng-click="NewCargos()" class="btn novo_btn" style="display:inline-block; vertical-align:top;"><i class="icon-plus-circled"></i> {{ 'CARGOS.NEW_POST' | translate }}</a>
            </div>
            {{ 'CARGOS.TITLE' | translate }} <span class="text-muted">({{ cargos.length }})</span>
        </h2>

        <hr>

        <div class="form_add_row" ng-show="activetab == 1">
            <div class="col-sm-12">

                <div class="dblock">
                    <div class="dblock_head">
                        <h2 class="title_heading">{{ 'CARGOS.POSTS_MAINTENANCE' | translate }}</h2>
                    </div>
                    <div class="dblock_body">
                        <div class="table-responsive table_wrap text-center">
                            <table>
                                <tbody><tr>
                                    <th>{{ 'CARGOS.POST_NAME' | translate }}</th>
                                    <th width="50%">{{ 'CARGOS.PEOPLE' | translate }}</th>
                                    <th>{{ 'UI.ACTIVE' | translate }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr ng-repeat="cargo in cargos | filter:q">
                                    <td>{{ cargo.name }}</td>
                                    <td >
										<span ng-repeat="team in cargo.teams">
											<img src="" ng-if="team.image" ng-src="<?php echo base_url('assets/img') . '/';?>{{ team.id_empresa }}/{{ team.image }}" class="img-circle" width="40" height="40" alt="{{ team.name }}" />
											<span class="td-user-image-replace" ng-if="!team.image">{{ initials(team.name) }}</span>
										</span>
									</td>
                                    <td >
										<div class="center">
											<span ng-class="{'text-success': cargo.active}">
												<span class="active" ng-class="{'hide': cargo.active==0}"><i class="icon-ok-1"></i>{{ 'UI.ACTIVE' | translate }}</span>
											</span>
											<span ng-class="{'text-danger': cargo.active}">
												<span class="inactive" ng-class="{'hide': cargo.active==1}"><i class="icon-cancel"></i>{{ 'UI.UNACTIVE' | translate }}</span>
											</span>
										</div>
                                    </td>
                                    <td>
                                        <div class="edit_cargo">
											<span ng-click="NewCargos(cargo.id)" class="btn btn-link btn-lg noshadow"><i class="icon-edit"></i>
											</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
				</div>
            <div class="clearfix"></div>
        </div>
    </div>
	<div class="clearfix"></div>
	<div class="form_add_row"  ng-show="activetab == 2" id="new_cargo_add">
	<form method="post" id="form-new-cargos">
		<div class="col-sm-9">
		<div class="add_new_function">
			<div class="add_new_function_title">
                {{ 'CARGOS.REGISTER_MAINTENANCE' | translate }}
			</div>
			<div class="form_add">
				<div class="form_add_row">
					<label>{{ 'CARGOS.POST_TITLE' | translate }}</label>
					<input type="text" placeholder="Informe o nome para este cargo" id="nome-cargo" name="nomeCargo" ng-model="nomeCargo">
				</div>
				<div class="form_add_row">
					<label>{{ 'UI.DESCRIPTION' | translate }}</label>
					<textarea placeholder="Informe a descrição das atividades relazionadas ao cargo" name="descricaocargo" id="descricaocargo" ng-model="descricaoCargo"></textarea>
				</div>
				<div class="form_add_row">
					<div class="custom_number">
					<label>{{ 'CARGOS.AVERAGE_HIRE_TIME' | translate }}</label>
					<input type="number" string-to-number id="tempovega" name="tempovega" ng-model="tempoVega">
					</div>
					<div class="custom_radio">
						<label>{{ 'CARGOS.CRITICAL' | translate }}</label>
						<div class="radio_dv">
						<input type="radio" id="radios" name="criticaocargo" value="1" ng-model="criticoCargo">
						<label for="radios">{{ 'UI.YES' | translate }}</label>
						</div>
						<div class="radio_dv">
						<input type="radio" id="radioss" name="criticaocargo" value="0" ng-model="criticoCargo">
						<label for="radioss">{{ 'UI.NO' | translate }}</label>
						</div>
					</div>
					<div class="custom_radio">
						<label>{{ 'CARGOS.STATUS' | translate }}</label>
						<select name="statusCargo" ng-model="statusCargo" class="select2 selected-status">
						<option value="1" ng-selected="statusCargo == 1">{{ 'UI.ACTIVE' | translate }}</option>
						<option value="0" ng-selected="statusCargo == 0">{{ 'UI.UNACTIVE' | translate }}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<input type="button" class="cancelar_btn" value="Fechar" ng-click="Cargos()">
		<button type="submit" class="confirmar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ 'UI.SAVE' | translate }}</button>
		</div>
		<div class="col-sm-3">
			<div class="skill_set">
				<div class="skill_header">
                    {{ 'CARGOS.SKILLS' | translate }}
				</div>
				<div class="search_skill">
					<label>{{ 'CARGOS.SELECT_SKILLS' | translate }}</label>
					<select name="searchskills"  id="searchskills" ng-model="searchskills" class="form-control">
					  <option value="{{skill.id}}" ng-repeat="skill in skills" >{{ skill.name }} </option>
					</select>
				</div>
				<div class="skill_sets">
					<label>{{ 'CARGOS.ATTACHED_SKILLS' | translate }}</label>
					<select class="form-control" ng-model="comensiaCargo" readonly='readonly' multiple="multiple" id="selected_skills"  name="comensiaCargo[]" required><option value="" ></option></select>
					<label>Competências Vinculadas</label>
					<select class="form-control" ng-model="comensiaCargo" readonly='readonly' multiple="multiple" id="selected_skills"  name="comensiaCargo[]"><option value="" ></option></select>
				</div>
				<div class="ads_mor">
					<input type="text" placeholder="{{ 'CARGOS.ADD_NEW_SKILLS' | translate }}" ng-model="new_skill" id="new_skill">
					<input type="button" id="addCargoSkill" ng-click="addCargoSkill()">
				</div>
			</div>
			<div class="questionary">
				<div class="question_header">
                    {{ 'CARGOS.POTENTIAL' | translate }}
				</div>
				<div class="question_search">
					<label>{{ 'CARGOS.SELECT_QUESTIONARY' | translate }}</label>
					<select name="QuestionerioCargo" ng-model='questionerioCargoid' id="selected_question" class="form-control multiple">
						<option value="" ></option>
						<option value="{{question.id}}" ng-repeat="question in questionario" >{{ question.name }} </option>
					</select>
				</div>
			</div>
		</div>
	</form>
</div>