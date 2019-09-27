
<!-- Edição de {{ 'USUARIOS.TITLE' | translate }} -->
<div ng-controller="usersCtrl" class="hide" ng-class="{'hide': !users}" id="usuarios">

	<div class="flex-around mdc-head" style="">
		<h2 class="mdc-typography--headline2">
		{{ 'USUARIOS.TITLE' | translate }} <span class="text-muted">({{ users.length }})</span>
		</h2>
		<div class="add-key-btn">
			<!-- <a class="add-key-rslts ng-scope" href="javascript:void(0)" ng-click="addPanel()"><span>+</span> Adicionar Novo {{ 'UI.USER' | translate }}</a> -->
			<button class="mdc-button mdc-button--raised" ng-click="modalUser(0)">
				<i class="material-icons mdc-button__icon">add</i>
				<span class="mdc-button__label">{{ 'UI.USER' | translate }}</span>
			</button>
		</div>
	</div>
	<div class="box with-margins nested-list dd full_width_list">
		
		<div id="side-form" class="sidebar_position_relative" ng-show="showEditPanel" style="margin-top: 0px;">
            <form id="form-user" class="modal-content">

                    <div class="form ">

						<div class="row">
							<div class="col-md-2">
								<div class="upload">
									<div class="label-upload"><span>+</span>Adicionar Foto</div>
									<img ng-if="userDetailImage" ng-src="{{ userDetailImage }}">
								</div>
							
								<div class="form-group">
									<input id="user-image" name="imagem" type="file" class="form-control">
								</div>
								<div class="form-group big-select">
									<label for="user-status" class="control-label">Status</label>
									<select id="user-status" name="status" class="select-status form-control select-lg" ng-model="userDetailStatus">
										<option value="true">Ativo</option>
										<option value="false">Inativo</option>
									</select>
								</div>
								
							</div>
							<div class="col-md-10">
							
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="user-name" class="control-label">Nome</label>
											<input id="user-name" name="nome" type="text" class="form-control" value="{{ userDetail.name }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="user-email" class="control-label">E-mail <span style="color: #9d9d9d;font-size: 9px;">( Alterações podem causar verificação de email.)</span></label>
											<input id="user-email" name="email" type="email" class="form-control" value="{{ userDetail.email }}">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="user-birthday" class="control-label">Data de Admissão</label>
											<div class="input-group" style="width:100%;">
												<input id="user-birthday" name="birthday" type="text" class="form-control data data_nascimento" value="{{ userDetail.birthday || '' }}">
												<div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
											</div>
										</div>
									</div>
								
									<div class="col-md-6" ng-show="userDetail.name">
										<div class="form-group">
											<label for="user-dismissal" class="control-label">Data de Desligamento</label>
											<div class="input-group" style="width:100%;">
												<input id="user-dismissal" name="dismissal" type="text" class="form-control data" value="{{ userDetail.dismissal  || '' }}">
												<div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
											</div>
										</div>
									</div>
									
								</div>

								<div class="row">
									
									<div class="col-md-3">
										<div class="form-group disable-content" id="login-adfs-div">
											<label for="login-adfs" class="control-label">Login ADFS</label>
											<input id="login-adfs" name="login-adfs" type="text" disabled="disabled" class="form-control" value="{{userDetail.login_adfs}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group disable-content" id="login-name-div">
											<label for="login-name" class="control-label">Login</label>
											<input id="login-name" name="login" type="email" disabled="disabled" class="form-control" value="{{userDetail.login}}">
										</div>
									</div>
									<div class="col-md-3">
										<label>Nível de Responsabilidade</label>
	                                    <div class="clearfix"></div>
	                                    <div class="filters_view" >
	                                        <select class="select-nivel" data-native="true" ng-options="nivel.id as nivel.label for nivel in nivels" ng-model="selectedNivel"></select>
	                                    </div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="faixa_atual" class="control-label">% Remuneração</label>
											<input id="faixa_atual" name="faixa_atual" type="number" step="0.01" class="form-control" pattern="^\d+(?:\.\d{1,2})?$" value="{{}}">
										</div>
									</div>
									
								</div>
								
								
								<div class="row">
								    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                        <div class="form-group">
                                            <label for="user-cargo" class="control-label">Cargo <span style="color: #9d9d9d;font-size: 9px;">( Pressione ENTER após selecionar o cargo.)</span></label>
                                            <div class="input-group user-goal" style="width:100%;">
                                                <input type="text" ng-value="userDetail.cargo || ''" class="form-control input-tags-activity" data-role="tagsinput" id="user-cargo" name="user-cargo">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group big-select">
                                                    <label for="userTeam" class="control-label">{{ 'UI.TEAM' | translate }}</label>
                                                    <select id="userTeam" name="userTeam" ng-model="userTeam" class="form-control select-lg">
                                                    	<option value="" selected>Selecione</option>
                                                        <option ng-repeat="team in teams" value="{{team.id}}">{{team.name}}</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group big-select">
                                                    <label for="userGestor" class="control-label">Gestor</label>
                                                    <select id="userGestor" name="userGestor" ng-model="userGestor" class="form-control select-lg">
                                                    	<option value="" selected>Selecione</option>
                                                        <option ng-repeat="gestor in gestors" value="{{gestor.id}}">{{gestor.name}}</option>
                                                    </select>
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
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="team-afford" class="control-label">{{ 'TIMES.TITLE' | translate }} Acessíveis</label>
                                                    <select id="team-afford" class="form-control affordable-team select2" ng-model="selectedTeamNotAdded" ng-options="userr.name for userr in teamsNotAdded track by userr.id">
                                                    </select>
                                                    <span class="corresponsaveis-selected" ng-repeat="selected in teamsNotAddedSelected" ng-click="removeUserAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="corresponsaveis[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="user-afford" class="control-label">{{ 'USUARIOS.TITLE' | translate }} Restritos</label>
                                                    <select id="user-afford" class="form-control affordable-user select2" ng-model="selectedUserNotAdded" ng-options="userr.name for userr in usersNotAdded track by userr.id">
                                                    </select>
                                                    <span class="affordable-users-selected" ng-repeat="selected in usersNotAddedSelected" ng-click="removeAffordableUserAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="affordable_users[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="matriz_projeto" class="control-label">POD</label>
                                                    <!-- <select id="matriz_projeto" name="matriz_projeto" class="" ng-change="onChangeMatrizProjeto()" ng-model="selectedProjeto">
			                                            <option ng-repeat="projeto in matrizProjects | filter : {added : '!'}" value="{{projeto.id}}">{{projeto.name}}</option>
			                                        </select>
			                                        <span class="corresponsaveis-selected" ng-repeat="selected in matrizProjects | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>   -->  
			                                        <select id="matriz_projeto" name="matriz_projeto" ng-model="selectedProjeto" class="form-control select-lg">
                                                    	<option value="" selected>Selecione</option>
                                                        <option ng-repeat="projeto in matrizProjects" value="{{projeto.id}}">{{projeto.name}}</option>
                                                    </select>                     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" ng-if="userDetail.gerado_integracao == '1'">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="new-integration-user" style="color:#cc2b2b">Este {{ 'UI.USER' | translate }} foi recentemente criado por intermédio de uma integração. Ao editá-lo (clicando em salvar), será salvo como um {{ 'UI.USER' | translate }} normal do sistema.</div>
                                            </div>
                                        </div>
                                        <p class="error-message text-danger pull-left hide" style="margin:0; line-height:20x; text-align: center">Por favor preencha os campos destacados em vermelho.</p>
                                    
                                    </div>
									
									<div class="col-md-6 custom_col_right col-sm-6 col-xs-12">
									
										<div class="form-group ">
											<label class="control-label">Permissões</label>
											<div class="checkbox" style="margin-top:2px;">
												<input type="checkbox" ng-model="admin" value="true" id="user-admin" ng-checked="admin=='true' || admin==true" class="styled-checkbox" >
												<label for="user-admin">Administrador</label>
											</div>

										</div>
										<div class="form-group">
											<label class="control-label">Tipo de {{ 'UI.USER' | translate }}</label>
											<div class="checkbox" style="margin-top:2px;">

												<input type="checkbox" ng-model="normal_user" id="normal_user" name="normal_user" value="true" ng-checked="admin || normal_user" ng-disabled="admin"  class="styled-checkbox">
												<label for="normal_user">{{ 'UI.USER' | translate }} Padrão</label>
											</div>
											<div class="checkbox" >
												<input type="checkbox" ng-model="goal_register" id="goal_register" name="goal_register" value="true" ng-checked="admin || goal_register" ng-disabled="admin"  class="styled-checkbox">
												<label for="goal_register">Cadastrador/Atualizador de Objetivos e Resultados Chave</label>
											</div>
											<div class="checkbox" >
												<input type="checkbox" ng-model="maintenance_user" id="maintenance_user" name="maintenance_user" value="true"  ng-checked="admin || maintenance_user" ng-disabled="admin"  class="styled-checkbox">
												<label for="maintenance_user">Parametrizador do sistema</label>
											</div>
											<div class="checkbox" >
												<input type="checkbox" ng-model="user_reviewer" id="user_reviewer" name="user_reviewer" value="true" ng-checked="admin || user_reviewer" ng-disabled="admin"  class="styled-checkbox">
												<label for="user_reviewer">Avaliador</label>
											</div>
											<div class="checkbox" >
												<input type="checkbox" ng-model="user_pesquisas" id="user_pesquisas" name="user_pesquisas" value="true" ng-checked="admin || user_pesquisas" ng-disabled="admin"  class="styled-checkbox">
												<label for="user_pesquisas">Pesquisas</label>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">Acessar Atualizações</label><br>
											<span style="color: #9d9d9d;font-size: 11px;">Por padrão {{ 'USUARIOS.TITLE' | translate }} acessam informações de seus {{ 'TIMES.TITLE' | translate }} e subordinados quando públicas.</span>
											<div class="checkbox" style="margin-top:2px;">
												<input type="checkbox" ng-model="chk_tipo_cargo" id="chk_tipo_cargo" name="chk_tipo_cargo" value="true" class="styled-checkbox" ng-checked="chk_tipo_cargo">
												<label for="chk_tipo_cargo">Acessar Informações do {{ 'UI.TEAM' | translate }}</label>
											</div>
											<div class="checkbox" >
												<input type="checkbox" ng-model="chk_global" id="chk_global" name="chk_global" value="true" class="styled-checkbox" ng-checked="chk_global">
												<label for="chk_global">Acessar Informações de Toda a Empresa</label>
											</div>
										</div>
										<div class="form-group">
											<span style="color: #9d9d9d;font-size: 11px;">Feedbacks</span>
											<div class="checkbox" style="margin-top:2px;">
												<input type="checkbox" ng-model="access_crossfeeds" id="access_crossfeeds" name="access_crossfeeds" value="true" class="styled-checkbox" ng-checked="access_crossfeeds">
												<label for="access_crossfeeds">Visualizar Feedbacks Públicos</label>
											</div>
										</div>
										<div class="form-group">
											<span style="color: #9d9d9d;font-size: 11px;">Direcionadores</span>
											<div class="checkbox" style="margin-top:2px;">
												<input type="checkbox" ng-model="access_delete_direcionar" id="access_delete_direcionar" name="access_delete_direcionar" value="true" class="styled-checkbox" ng-checked="access_delete_direcionar">
												<label for="access_delete_direcionar">Permite excluir direcionador</label>
											</div>
										</div>
										<div class="form-group">
											<span style="color: #9d9d9d;font-size: 11px;">Controle de {{ 'USUARIOS.TITLE' | translate }}</span>
											<div class="checkbox" style="margin-top:2px;">
												<input type="checkbox" ng-model="control_usuario" id="control_usuario" name="control_usuario" value="true" class="styled-checkbox" ng-checked="control_usuario">
												<label for="control_usuario">Controle de {{ 'USUARIOS.TITLE' | translate }}</label>
											</div>
										</div>
										
									
									</div>
									<div class="col-sm-12 flex-end">											
												<!-- <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button> -->
												<!-- <button class="mdc-button mdc-button--outlined mdc-fechar" >Limpar</button> -->
												<!-- <a class="btn btn-primary cancelar" ng-click="modalUser(0)">Limpar formulário</a> -->
												<button class="mdc-button mdc-fechar" ng-click="dismissPanel()">Fechar</button>
												<!-- <a class="btn btn-primary cancelar" ng-click="dismissPanel()">Dispensar formulário</a> -->
												<button type="submit" class="mdc-button mdc-button--raised salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
										</div>
									
								</div>
								<div class="row">
								
									<div class="col-md-6">
									
										
									
									</div>
									<div class="col-md-6">
									
										 
									
									</div>
								
								</div>
								
							</div>

                    </div>
                    
                   

            </form>
    	</div>
	
	</div>
    <div id="list" class="nested-list dd with-margins box full_width_list">
        <div class="box-header">
            <h4>Editar {{ 'USUARIOS.TITLE' | translate }}</h4>
            <div class="buttons">
                <form style="display:inline-block; vertical-align:top;" ng-submit="search()">
                    <div class="form-group ">
                        <input type="checkbox" value="true" ng-model="onlyIntegration" style="display: inline-block;">
                        <label for="user-admin" style="opacity: 1;font-weight: normal;position: inherit;">Pesquisar somente novos criados por integração</label>
                    </div>
					<!-- original search -->
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquise por nome" ng-model="query">
                        <span class="input-group-btn">
                            <button type="submit"><i class="entypo-search"></i></button>
                        </span>
                    </div> -->
                    <!-- new search -->
                    <div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Nome</label>
								<input id="search_name" name="search_nome" type="text" class="form-control" ng-model="search.nome" placeholder="Nome" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">{{ 'TIMES.TITLE' | translate }}</label>
								<select class="form-control search_select" id="search_team"  name="team" ng-model="search.team">
									<option selected="selected" value="">Selecionar {{ 'TIMES.TITLE' | translate }}</option>
									<option value="{{ team.name }}" ng-repeat="team in teams">{{ team.name }}</option>
								</select>	
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Gestor</label>
								<select class="form-control" id="search_gestor"  name="gestor" ng-model="search.gestor">
									<option selected="selected" value="">Selecionar gestor</option>
									<option value="{{ gestor.name }}" ng-repeat="gestor in gestors">{{ gestor.name }}</option>
								</select>	
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Tipo Cargo</label>
								<select class="form-control search_select" id="search_tipo_cargo" name="tipo_cargo" ng-model="search.tipo_cargo">
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
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Pod</label>
								<select class="form-control" id="search_projeto"  name="projeto" ng-model="search.projeto">
									<option selected="selected" value="">Selecionar gestor</option>
									<option value="{{ projeto.name }}" ng-repeat="projeto in matrizProjects">{{ projeto.name }}</option>
								</select>	
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Status</label>
                                <div class="checkbox" style="margin-top:5px;">
                                	<input type="radio" ng-value="1" id="user-status1" ng-model="search_status" class="styled-checkbox">
                                    <label for="user-status1">Ativo</label>
                                    <input type="radio" ng-value="0" id="user-status2" ng-model="search_status" class="styled-checkbox">
                                    <label for="user-status2" style="margin-left: 20px;">Inativo</label>
                                </div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 okrView btn-center" style="margin-top: 0px;float: right;">
							<label class="control-label"></label>
							<div class="clr_filters">
								<button class="mdc-button" ng-click="resetFilter()">Limpar Filtros</button>
								<button class="mdc-button mdc-button--raised" ng-click="filter()">Aplicar Filtros</button>
								<!-- <a href="javascript:void(0)" class="clean_filter" ng-click="resetFilter()">Limpar Filtros</a>
								<button type="button" ng-click="filter()"  class="apply_filter">Aplicar Filtros</button>								 -->
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
                </form>
                <a href="javascript:;" ng-click="modalUser(0)" class="btn btn-primary" style="display:none; vertical-align:top;"><i class="icon-plus-circled"></i> Criar novo {{ 'UI.USER' | translate }}</a>
            </div>
        </div>
        <div class="thead">
        <table style="width: 100%;">
            <thead>
                <td width="25%">{{ 'UI.USER' | translate }}</td>
                <td width="12%">{{ 'UI.TEAM' | translate }}</td>
                <td width="15%">Gestor</td>
                <td width="15%">E-mail</td>
                <td width="10%">Tipo cargo</td>
                <td width="10%">Pod</td>
                <td width="8%">Ativo</td>
                <td width="5%"></td>
            </thead>
        </table>
        </div>
        <table class="content">
            <!-- <tr ng-repeat="item in users | filter:q" ng-if="(onlyIntegration == true && item.gerado_integracao == 1) || onlyIntegration != true"> -->  <!-- original search -->
            <tr ng-repeat="item in users" ng-if="(onlyIntegration == true && item.gerado_integracao == 1) || onlyIntegration != true">
                <td width="25%"style="width:25%">
                    <div class="image">
                        <img ng-if="item.image" ng-src="{{ item.image }}" class="img-circle" width="28" height="28" data-toggle="tooltip" data-placement="top" title="{{ member.name }}">
                        <span class="image-replace" ng-if="!item.image">{{ initials(item.name) }}</span>
                        <div class="status text-center">
                            <span class="text-success" ng-class="{'hide': item.active == 'false', 'imported':item.gerado_integracao == '1'}">
                                <span class="icon"><i class="icon-ok"></i></span>
                            </span>
                            <span class="text-danger" ng-class="{'hide': item.active == 'true'}">
                                <span class="icon"><i class="icon-cancel"></i></span>
                            </span>
                        </div>
                    </div>
                    <h4>{{ item.name }}</h4>
                    <!--<p><i class="icon-briefcase"></i> {{ user.empresa.nome_empresa }}</p>-->
                    <span class="role" ng-if="item.admin == 'true'">Administrador</span>
                    <span class="role" ng-if="item.appraiser == 'true'">Avaliador</span>

                </td>
                <td width="12%">{{ item.team }}</td>
                <td width="15%">{{ item.gestor }}</td>
                <td width="15%"> {{ item.email }} </td>
                <td width="10%" ng-if="item.tipo_cargo == 0">Contribuidor</td>
              <!--      <td width="10%" ng-if="item.tipo_cargo == 1">Supervisor </td>-->
              <!--      <td width="10%" ng-if="item.tipo_cargo == 2">Gerente </td>-->
              <!--      <td width="10%" ng-if="item.tipo_cargo == 3">Superintendente</td>-->
                        <td width="10%" ng-if="item.tipo_cargo == 4">Gestor </td>
              <!--      <td width="10%" ng-if="item.tipo_cargo == 5">Estrategico </td>-->
                <td width="10%" ng-if="!item.tipo_cargo">&nbsp; </td>
                <td width="10%">{{item.nome_matriz}}</td>
                 <td width="8%" ng-if="item.active == 'true'">Ativo </td>
                 <td width="8%" ng-if="item.active == 'false'">Inativo </td>
                <td width="5%"><button class="mdc-icon-button material-icons" ng-click="modalUser(item.id);scroollToTop()">edit</button></td>
            </tr>
        </table>
    </div>
    <!-- Modal Novo/Editar {{ 'UI.USER' | translate }} -->
    
</div>