<style>
	.text-center table td, .text-center table th {
    text-align: center;
}
.table_wrap table td:last-child, .table_wrap table th:last-child {
    padding-right: 0;
    text-align: center;
}
.custom_radio {
    float: left;
    width: 25%;
}
</style>
<div ng-controller="integrationCtrl" class="" ng-cloak>
    <div>
        <h2 ng-show="activetab == 1 || !activetab">
            {{ 'INTEGRATION.INTEGRATIONS' | translate }}
        </h2>

        <hr>

        <div class="form_add_row" ng-show="activetab == 1 || !activetab">
            <div class="col-sm-12">

                <div class="dblock">
                    <div class="dblock_head">
                        <h2 class="title_heading">{{ 'INTEGRATION.ALL_INTEGRATIONS' | translate }}</h2>
                         <a href="javascript:void(0)" ng-click="NewIntegration()" class="addmore ppp"><i class="icon-plus-circled"></i> {{ 'INTEGRATION.CREATE_NEW_INTEGRATION' | translate }}</a>
                    </div>
                    <div class="dblock_body">
                        <div class="table-responsive table_wrap text-center">
                            <table>
                                <tbody><tr>
                                    <th>{{ 'UI.NAME' | translate }}</th>
                                    <th>Situação</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr ng-if="integrations.length>0" ng-repeat="integration in integrations" ng-cloak>
                                    <td>{{ integration.name }}</td>
                                    <td >
										<div class="center">
											<span ng-class="{'text-success': integration.active}">
												<span class="active" ng-class="{'hide': integration.active==0}"><i class="icon-ok-1"></i>{{ 'UI.ACTIVE' | translate }}</span>
											</span>
											<span ng-class="{'text-danger': integration.active}">
												<span class="inactive" ng-class="{'hide': integration.active==1}"><i class="icon-cancel"></i>{{ 'UI.UNACTIVE' | translate }}</span>
											</span>
										</div>
                                    </td>
                                    <td>
                                        <div class="edit_cargo">
											<span ng-click="NewIntegration(integration.id)" class="btn btn-link btn-lg noshadow"><i class="icon-edit"></i> {{ 'UI.EDIT' | translate }}
											</span>
                                        </div>
                                    </td>
                                </tr>
                                 <tr ng-if="integrations.length==0">
                                 	<td colspan="3">Nehuma integração cadastrada</td>
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
	<div class="form_add_row"  ng-show="activetab == 2" id="new_integration_add">
	<form method="post" id="form-new-integration" >
		<div class="col-sm-12">
		<div class="add_new_function">
			<div class="add_new_function_title">
				Informações
			</div>
			<div class="form_add">
				<div class="form_add_row">
					<label>Nome da Integração</label>
					<input type="text" placeholder="Type name for your integration" id="nomeIntegration" name="nomeIntegration" ng-model="nomeIntegration">
				</div>
				<div class="form_add_row">
					<div class="custom_radio">
						<label>{{ 'INTEGRATION.WHATS_THE_TYPE' | translate }}</label>
						<div class="radio_dv">
						<input type="radio" id="radios" name="typeIntegration" value="0" ng-model="typeIntegration">
						<label for="radios">{{ 'INTEGRATION.SQL' | translate }}</label>
						</div>
						<div class="radio_dv">
						<input type="radio" id="radioss" name="typeIntegration" value="1" ng-model="typeIntegration">
						<label for="radioss">{{ 'INTEGRATION.WEBSERVICE' | translate }}</label>
						</div>
					</div>
					<div class="custom_radio">
						<label>{{ 'INTEGRATION.STATUS' | translate }}</label>
						<select name="statusIntegration" id="statusIntegration" ng-model="statusIntegration" class="select2 selected-status">
						<option value="1" ng-selected="statusIntegration == 1">{{ 'UI.ACTIVE' | translate }}</option>
						<option value="0" ng-selected="statusIntegration == 0">{{ 'UI.UNACTIVE' | translate }}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="add_new_function" ng-if="typeIntegration == 0">
			<div class="add_new_function_title">
				Dados para Conexão
			</div>
			<div class="form_add_row">
				<div class="col-md-6" style="margin-top: 20px;">
					<div class="form_add_row">
						<div class="col-md-9">
							<div class="form_add_row">
								<label>Host name address</label>
								<input type="text" placeholder="" id="hostIntegration" name="hostIntegration" ng-model="hostIntegration" ng-value="hostIntegration">
							</div>
							<div class="form_add_row">
								<label>Username</label>
								<input type="text" placeholder="" id="usernameIntegration" name="usernameIntegration" ng-value="usernameIntegration" autocomplete="off">
							</div>
							<div class="form_add_row">
								<label>Password <span class="pull-right"><a href="javascript:void(0)" ng-click="testconnection()" class="testconnection">Test connection</a></span></label>
								<input type="password" placeholder="" id="passwordIntegration" name="passwordIntegration" ng-value="passwordIntegration" autocomplete="off">
							</div>
							<div class="form_add_row">
								<label>Database name</label>
								<input type="text" placeholder="" id="databaseIntegration" name="databaseIntegration" ng-model="databaseIntegration" ng-value="databaseIntegration">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form_add_row">
								<label>PORT</label>
								<input type="number" placeholder="" id="portIntegration" name="portIntegration" ng-model="portIntegration" ng-value="portIntegration">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form_add_row" style="margin-right:3%;margin-top:3%">
						<label>SQL</label>
						<textarea placeholder="Digite seu SQL" name="sqlIntegration" id="sqlIntegration" ng-value="sqlIntegration" style="height:315px" ng-value="sqlIntegration"></textarea>
						<small>NOTA: O SQL deve retornar um número e, este número, deve possuir como alis 'Percentage'.</small>
					</div>
				</div>
			</div>
			<div class="form_add_row row">
				<div class="col-md-12" style="margin-left:1%;margin-right:1%">
				<div class="form_add_row" >
						<label style="width: 98%">Resultados SQL <span class="pull-right"><a href="javascript:void(0)" ng-click="testsqlquery()" class="testsql">Test your SQL</a></span></label>
						<textarea disabled placeholder="Resultado SQL" name="sqlResult" id="sqlResult" ng-model="sqlResult" style="height:100px;width: 98%">{{sqlResult}}</textarea>
				</div>
				</div>
			</div>

		</div>
		<div class="add_new_function" ng-if="typeIntegration == 1">
			<div class="add_new_function_title">
				WebService
			</div>
			<div class="form_add_row">
				<div class="col-md-6" style="margin-top: 20px;">
					<div class="form_add_row">
						<div class="col-md-9">
							<div class="form_add_row">
								<label>{{ 'INTEGRATION.SOAP_ADDRESS' | translate }}</label>
								<input type="text" placeholder="localhost:8080" id="soapIntegration" name="soapIntegration" ng-model="soapIntegration">
							</div>
							<div class="form_add_row">
								<label>Namespace</label>
								<input type="text" placeholder="namespace" id="namespaceIntegration" name="namespaceIntegration" ng-model="namespaceIntegration">
							</div>
							<div class="form_add_row">
								<label>{{ 'INTEGRATION.OPERATION' | translate }}</label>
								<input type="text" placeholder="{{ 'INTEGRATION.OPERATION_PLACEHOLDER' | translate }}" id="medirKeyresultIntegration" name="medirKeyresultIntegration" ng-model="medirKeyresultIntegration">
							</div>
							<div class="form_add_row">
								<label>{{ 'INTEGRATION.RETURN_PARAM' | translate }}</label>
								<input type="text" placeholder="{{ 'INTEGRATION.RETURN_PARAM' | translate }}" id="parameterIntegration" name="parameterIntegration" ng-model="parameterIntegration">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<input type="button" class="cancelar_btn" value="{{ 'UI.CLOSE' | translate }}" ng-click="Integration()">
		<button type="submit" class="confirmar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ 'UI.SAVE' | translate }}</button>
		</div>
	</form>
</div>