<!-- Edição de Times -->
<style>
.form_row label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    margin-top: 8px;
    font-weight: bold;
}
.form_row textarea {
    border: 1px solid #ddd;
    height: 95px;
    font-size: 14px;
    padding: 10px;
    border-radius: 5px;
    width: 100%;
}
</style>

<div ng-controller="empressaCtrl" id="empresa-controller">
	<h2 style="color:#000;font-size:19px">
        {{ 'EMPRESA.COMPANY_CONFIGURATION' | translate }}
        </h2>
	<div class="row">

		<div class="col-sm-12">
		<div class="add_new_function">
			<div class="header_dv">
                {{ 'EMPRESA.CONFIGURATIONS' | translate }}
			</div>
			<div class="form_set">
				<form method="post" id="form-save-empressa" enctype="multipart/form-data">
				<div class="form_row">
					<div class="col-sm-6">
						<label style="text-transform: uppercase;">{{ 'UI.NAME' | translate }}</label>
						<input type="text" placeholder="{{ 'EMPRESA.NAME_THE_COMPANY' | translate }}" id="nome_empresa" name="nome_empresa" ng-model="nome_empresa" >
					</div>
					<div class="col-sm-6">
						<label style="text-transform: uppercase;">{{ 'EMPRESA.MAIN_CONTACT' | translate }}</label>
						<input type="text" placeholder="{{ 'EMPRESA.NAME_THE_CONTACT' | translate }}" id="nome_usuario" name="nome_usuario" ng-model="nome_usuario">
					</div>
				</div>
				<div class="form_row">
					<div class="col-sm-6">
						<label style="text-transform: uppercase">{{ 'UI.EMAIL' | translate }}</label>
						<input type="text" placeholder="{{ 'EMPRESA.MAIN_CONTACT_NAME' | translate }}" id="email_usuario" name="email_usuario" ng-model="email_usuario">
					</div>
					<div class="col-sm-3">
						<label>{{ 'EMPRESA.OKRS_REVISION_PERIOD' | translate }} </label>
						<select name="planejamento" class="select2" style="" ng-model="planejamento" id="planejamento">
							<option value="T" >{{ 'UI.QUARTER' | translate }}</option>
							<option value="M" >{{ 'UI.MONTH' | translate }}</option>
							<option value="B" >{{ 'UI.TWO_MONTH' | translate }}</option>
							<option value="S" >{{ 'UI.SEMESTER' | translate }}</option>
						</select>
					</div>
					<!-- <div class="col-sm-3">
						<label>WorkFlow de Aprovação de Metas</label>
						<select name="workflow" class="select2" style="" ng-model="workflow" id="workflow">
							<option value=0 >Aguardando aprovação</option>
							<option value=1 >Aprovado</option>
							<option value=2 >Reprovado</option>
						</select>
					</div> -->
					<div class="col-sm-3" style="padding-top: 25px;">
						<div class="custom_chkbox">
							<input type="checkbox" id="workflow" name="workflow">
							<label style="padding-left: 30px;" for="workflow">WorkFlow de Aprovação de Metas</label>
						</div>
					</div>
				</div>
				<div class="clearfix">
				<div class="form_row">
					<div class="col-sm-6">
						<label>{{ 'EMPRESA.MISSION' | translate }}</label>
						<textarea placeholder="{{ 'EMPRESA.MISSION_PLACEHOLDER' | translate }}" name="missao" id="missao" ng-model="missao" rows="4"></textarea>
					</div>
					<div class="col-sm-6">
						<label>{{ 'EMPRESA.VISION' | translate }}</label>
						<textarea placeholder="{{ 'EMPRESA.VISION_PLACEHOLDER' | translate }}" name="visao" id="visao" ng-model="visao" rows="4"></textarea>
					</div>
				</div>
				<div class="form_row">
					<div class="col-sm-12">
						<label>{{ 'EMPRESA.PURPOSE' | translate }}</label>
						<textarea placeholder="{{ 'EMPRESA.PURPOSE_PLACEHOLDER' | translate }}" name="proposito" id="proposito" ng-model="proposito" rows="4"></textarea>
					</div>
				</div>
				<div class="form_row">
					<div class= "col-sm-12">
						<div style="padding-left: 0px;" class="col-sm-2">
							<label>{{ 'EMPRESA.EMPLOYEE_COUNT' | translate }}</label>
							<input type="text" placeholder="{{ 'EMPRESA.EMPLOYEE_COUNT_PLACEHOLDER' | translate }}" id="numero_colab" name="numero_colab" ng-model="numero_colab" readonly>
						</div>
						<div class="col-sm-2">
							<label>{{ 'EMPRESA.LICENSE_COUNT' | translate }}</label>
							<input  type="text" placeholder="{{ 'EMPRESA.LICENSE_COUNT_PLACEHOLDER' | translate }}" id="numero_licencas" name="numero_licencas" ng-model="numero_licencas" readonly>
						</div>
						<div class="col-sm-2">
							<label>{{ 'EMPRESA.PAY_DAY' | translate }}</label>
							<input  type="text" class="" placeholder="{{ 'EMPRESA.PAY_DAY_PLACEHOLDER' | translate }}" id="data_vencimento" name="data_vencimento" ng-value="data_vencimento | amUtc | amDateFormat:'DD/MM/YYYY'" readonly>
						</div>
						<div class="col-sm-2">
							<label>Máximo de Elos Diários</label>
							<input type="number" string-to-number placeholder="Elos Diários" id="elo" name="elo" ng-model="elo">
						</div>
						<div class="col-sm-2">
							<label>Imagem para o Banner</label><br>
							<input style="margin-top: 20px" type="file" name="image" id="file">
						</div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="form_row">
					<div class="form_row myrow">
					</div>
				</div>
				<div class="clearfix"></div>

				<!-- LDAP SERVER START-->
				<div class="form_row">
					<div class="col-sm-12">
						<h3>LDAP SERVER</h3>
					</div>
					<div class="col-sm-2">
						<div class="custom_chkbox">
							<input type="checkbox" id="ldap_enable" name="ldap_enable" checked>
							<label style="padding-left: 30px;" for="ldap_enable">Enable</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="custom_chkbox">
							<input type="checkbox" id="maf" name="maf" checked>
							<label style="padding-left: 30px;" for="maf">Habilitar 2AF</label>
						</div>
					</div>
					<!-- <div class="col-sm-12" style="margin-bottom: 20px;">
						<div class="col-sm-2">
							<label>Server</label>
							<input type="text" placeholder="server name" id="ldap_server" name="ldap_server" ng-model="ldap_server">
						</div>
						<div class="col-sm-2">
							<label>Port</label>
							<input type="text" placeholder="port number" id="ldap_port" name="ldap_port" ng-model="ldap_port">
						</div>
						<div class="col-sm-4">
							<label>Bind DN</label>
							<input type="text" placeholder="bind dn" id="ldap_bind_dn" name="ldap_bind_dn" ng-model="ldap_bind_dn">
						</div> --><!-- 
						<div class="col-sm-2">
							<label>Bind Password</label>
							<input type="text" placeholder="bind password" id="ldap_bind_pass" name="ldap_bind_pass" ng-model="ldap_bind_pass">
						</div> -->
						<!-- <div class="col-sm-2">
							<label>Base DN</label>
							<input type="text" placeholder="base dn" id="ldap_base_dn" name="ldap_base_dn" ng-model="ldap_base_dn">
						</div>
					</div> -->
				</div>
				<div class="clearfix"></div>
				<!-- LDAP SERVER END -->
				<div class="form_row">
					<div class="col-md-12">
						<label>Quais features você quer habilitar?</label>
						<div style="top:30px; right: 600px;" class="tooltip_wrapper">
							<div class="tooltip">
							<div class="egg-arrow"></div>
							<span class="tooltiptext">Ao ligar ou desligar alguns dos checkboxes é possivel habilitar ou desabilitar funcionalidades.</span>
						</div>
					</div>
					<div style="margin-top: 30px;" class="col-sm-6">
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-2">
								<div class="custom_chkbox">
								<input type="checkbox" id="elos" name="elos">
									<label style="padding-left: 30px;" for="elos">Elos</label>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-2">
								<div class="custom_chkbox">
								<input type="checkbox" id="feedback" name="feedback">
									<label style="padding-left: 30px;" for="feedback">Feedback</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-2">
								<div class="custom_chkbox">
								<input type="checkbox" id="okr" name="okr">
									<label style="padding-left: 30px;" for="okr">Objetivos</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-2">
								<div class="custom_chkbox">
								<input type="checkbox" id="crossfeed" name="crossfeed">
									<label style="padding-left: 30px;" for="crossfeed">Crossfeed</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-2">
								<div class="custom_chkbox">
								<input type="checkbox" id="activities" name="activities">
									<label style="padding-left: 30px;" for="activities">Atividades</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-2">
								<div class="custom_chkbox">
								<input type="checkbox" id="performance_pessoal" name="performance_pessoal">
									<label style="padding-left: 30px;" for="performance_pessoal">Performance Pessoal</label>
								</div>
							</div>
						</div>
					</div>
			</div>

			<div class="col-sm-6">
						<label>Configure os tipos de objetivos da sua empresa</label><br>
						<div class="row">
							<div class="col-sm-1" id="topper">
								<div class="custom_chkbox">
									<input type="checkbox" name="individual" id="individual" >
									<label for="individual" >&nbsp;</label>
								</div>
							</div>
							<div class="col-sm-4">
								<input type="text" placeholder="Individual" id="label_individual" name="label_individual" ng-model="label_individual" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-1">
								<div class="custom_chkbox">
									<input type="checkbox" name="team" id="team" >
									<label for="team">&nbsp;</label>
								</div>
							</div>
							<div class="col-sm-4">
								<input type="text" placeholder="Time" id="label_team" name="label_team" ng-model="label_team" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-1">
								<div class="custom_chkbox">
									<input type="checkbox" name="shared" id="shared" >
									<label for="shared">&nbsp;</label>
								</div>
							</div>
							<div class="col-sm-4">
								<input type="text" placeholder="Compatilhado" id="label_shared" name="label_shared" ng-model="label_shared" readonly>
							</div>
						</div>
						<label style="margin-top: 30px;">Deseja habilitar a feature de Carreira?</label>
						<div class="row">
							<div class="col-sm-1">
								<div class="custom_chkbox">
								<input type="checkbox" id="my_carreer" name="my_carreer">
									<label for="my_carreer">&nbsp;</label>
								</div>
							</div >
							<div class="col-sm-4">
								<input type="text" placeholder="Carreira" name="label_carreer" id="label_carreer" ng-model="label_carreer">
							</div>
						</div>
					</div>
					<div class="col-sm-12" style="margin-top: 20px;">
						<div class="row">
							<div class="col-sm-4">
								<label>Ninebox 3</label>
								<input type="text" placeholder="Ninebox3" name="nineBox3" id="nineBox3" ng-model="nineBox3">
								<textarea type="textarea" name="nineBox3desc" id="nineBox3desc" ng-model="nineBox3desc"></textarea>
								
								<hr>
								
								<label>Ninebox 2</label>
								<input type="text" placeholder="Ninebox2" name="nineBox2" id="nineBox2" ng-model="nineBox2">
								<textarea type="textarea" name="nineBox2desc" id="nineBox2desc" ng-model="nineBox2desc"></textarea>
								<hr>
								
								<label>NineBox 1</label>
								<input type="text" placeholder="Ninebox1" name="nineBox1" id="nineBox1" ng-model="nineBox1">
								<textarea type="textarea" name="nineBox1desc" id="nineBox1desc" ng-model="nineBox1desc"></textarea>

							</div>
							<div class="col-sm-4">
							<label>Ninebox 6</label>
								<input type="text" placeholder="Ninebox6" name="nineBox6" id="nineBox6" ng-model="nineBox6">
								<textarea type="textarea" name="nineBox6desc" id="nineBox6desc" ng-model="nineBox6desc"></textarea>
								<hr>
								<label>Ninebox 5</label>
								<input type="text" placeholder="Ninebox5" name="nineBox5" id="nineBox5" ng-model="nineBox5">
								<textarea type="textarea" name="nineBox5desc" id="nineBox5desc" ng-model="nineBox5desc"></textarea>
								<hr>
								<label>NineBox 4</label>
								<input type="text" placeholder="Ninebox4" name="nineBox4" id="nineBox4" ng-model="nineBox4">
								<textarea type="textarea" name="nineBox4desc" id="nineBox4desc" ng-model="nineBox4desc"></textarea>
								
							</div>
							
							<div class="col-sm-4">
								<label>Ninebox 9</label>
								<input type="text" placeholder="Ninebox9" name="nineBox9" id="nineBox9" ng-model="nineBox9">
								<textarea type="textarea" name="nineBox9desc" id="nineBox9desc" ng-model="nineBox9desc"></textarea>
								<hr>
								<label>Ninebox 8</label>
								<input type="text" placeholder="Ninebox8" name="nineBox8" id="nineBox8" ng-model="nineBox8">
								<textarea type="textarea" name="nineBox8desc" id="nineBox8desc" ng-model="nineBox8desc"></textarea>
								<hr>
								<label>NineBox 7</label>
								<input type="text" placeholder="Ninebox7" name="nineBox7" id="nineBox7" ng-model="nineBox7">
								<textarea type="textarea" name="nineBox7desc" id="nineBox7desc" ng-model="nineBox7desc"></textarea>
							</div>
						</div>

					</div>



				</div>
				</div>
				<div class="form_row">
					<div class="col-sm-6" style="margin-top:5%">
						<h3>IMAGEM DE CABEÇALHO DE E-MAILS</h3>
						<div class="upload emp_imagem">
							<div class="label-upload"><span>+</span>Adicionar Imagem (Largura ideal 564px)</div>
							<img ng-if="userDetailImage" ng-src="{{ userDetailImage }}">
						</div>
						<div class="form-group">
							<input id="user-image" name="imagem" type="file" class="form-control">
						</div>

					</div>
					<div class="col-sm-6" style="margin-top:5%">
						<h3>IMAGEM DE RODAPÉ DE E-MAILS</h3>
						<div class="upload emp_footer">
							<div class="label-upload"><span>+</span>Adicionar Imagem (Largura ideal 564px)</div>
							<img ng-if="empresaFooterImage" ng-src="{{ empresaFooterImage }}">
						</div>
						<div class="form-group">
							<input id="footer-image" name="imagem" type="file" class="form-control">
						</div>

					</div>
				</div>
				<div class="form_row">
					<div class="col-sm-12" style="margin-top:5%">
						<input type="submit" class="btn btn-success" value="{{ 'UI.SAVE' | translate }}" ng-click="saveEmpressa()">
					</div>
				</div>
			</form>
				<div class="form_row" style="margin-top:20px">
					<div class="col-sm-12">
						<div class="valores_box">
							<h2 style="font-weight:700">{{ 'EMPRESA.VALUES' | translate }} <span>
							<ul class="user-info pull-right" style="display:none">
							<li class="dropdown">
								<a href="" class="hdp dropdown-toggle" style="margin-top:5px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								  {{ 'EMPRESA.NEW_VALUES' | translate }}<i class="icon-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0)">{{ 'EMPRESA.VALUES' | translate }}</a>
									</li>
									<li>
										<a href="javascript:void(0)" ng-click="novoValores('1')">{{ 'EMPRESA.NEW_VALUE' | translate }}</a>
									</li>
								</ul>
								</li>
							</ul>
							</span></h2>

						</div>
					</div>
				</div>


					<div id="valores">
						<form id="form-valores">
							<div class="form_row">
								<div class="col-sm-12" style="margin-top:10px">
									<label>{{ 'EMPRESA.ENTER_VALUES_NAME' | translate }}</label>
									<input type="text" placeholder="{{ 'EMPRESA.TYPE_VALUE' | translate }}" id="type_value" name="type_value" ng-model="type_value" >
									<input type="hidden" ng-model="value_id" id="value_id" >
								</div>
							</div>
							<div class="form_row" >
								<div class="col-sm-12 type_description" style="margin-bottom:10px">
									<label>{{ 'UI.DESCRIPTION' | translate }}</label>
									<div class="clearfix"></div>
									<ng-quill-editor bounds="self" ng-model="type_description" placeholder="{{ 'UI.DESCRIPTION' | translate }}">
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
							<div class="form_row">
								<div class="col-sm-12" >
									<label>{{ 'EMPRESA.ADDED_VALUES' | translate }}</label>
									<div class="valores_dv" >
										<a href="javascript:void(0)" ng-repeat="valor in valores" class="valores_dv_btn" ><span ng-click="getValores(valor.id)">{{valor.name}}</span>
										<i class="fa fa-close" style="margin-left: 6px;" ng-click="deleteValore(valor.id)" ></i>
										</a>
									</div>
								</div>
							</div>

						<div class="form_row" >
							<div class="col-sm-12">
								<input type="button" class="btn cancelar_btn" ng-value="method=='Salvar' || !method?'Apagar':'Cancelar'" ng-click="resetValores()">
								<input type="submit" class="btn confirmar" ng-value="method=='Salvar' || !method?'Salvar':'Atualizar' "value="Add new" ng-click="addNewValores()">
							</div>
						</div>
						</form>
					</div>
					</div>

			</div>
		</div>
		</div>
</div>
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
