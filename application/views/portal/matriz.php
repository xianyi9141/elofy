<div ng-controller="matrizCtrl" id="matriz" class="matriz">
	<h2 class="page-title">
        Projetos <span class="text-muted">({{ projects.length }})</span>
    </h2>
    <div class="add-key-btn">
        <a class="add-key-rslts ng-scope" href="javascript:void(0)" ng-click="addPanel()"><span>+</span> Adicionar Novo Projeto</a>
    </div>
    <div class="box with-margins nested-list dd full_width_list">
    	<div id="side-form" class="sidebar_position_relative" ng-show="showEditPanel" style="margin-top: 0px; padding: 15px;">
    		<form id="form-project">
    			<div class="form">
    				<div class="row">
    					<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="pro-name" class="control-label">Nome</label>
								<input id="pro_name" name="nome" type="text" class="form-control" value="{{ proDetail.name }}">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
	                        <div class="form-group big-select">
	                            <label for="pro-responsavel" class="control-label">Gestor</label>
	                            <select id="pro_responsavel" name="pro_responsavel" ng-model="pro_responsavel" class="form-control select-lg">
	                            	<option value="" selected>Selecione</option>
	                                <option ng-repeat="responsavel in responsavels" value="{{responsavel.id}}">{{responsavel.name}}</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="form-group big-select">
	                            <label for="pro-corresponsavel" class="control-label">2º gestor</label>
	                            <select id="pro_corresponsavel" name="pro_corresponsavel" ng-model="pro_corresponsavel" class="form-control select-lg">
	                            	<option value="" selected>Selecione</option>
	                                <option ng-repeat="corresponsavel in corresponsavels" value="{{corresponsavel.id}}">{{corresponsavel.name}}</option>
	                            </select>
	                        </div>
	                    </div>
    				</div>
    				<div class="row">
    					<div class="col-md-4 col-sm-4" style="float: right;">
    						<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<a class="btn btn-primary cancelar" ng-click="modalProject(0)">Limpar formulário</a>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<a class="btn btn-primary cancelar" ng-click="dismissPanel()">Dispensar formulário</a>
								</div>
							</div>
    					</div>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>

    <div id="list" class="nested-list dd with-margins box full_width_list">
    	<div class="box-header">
    		<div class="buttons">
                <form style="display:inline-block; vertical-align:top;">
                    <div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Nome</label>
								<input id="search_name" name="search_nome" type="text" class="form-control" ng-model="search.nome" placeholder="Nome" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Gestor</label>
								<select class="form-control" id="search_responsavel"  name="responsavel" ng-model="search.responsavel">
									<option selected="selected" value="">Selecionar gestor</option>
									<option value="{{ responsavel.id }}" ng-repeat="responsavel in responsavels">{{ responsavel.name }}</option>
								</select>	
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">2º gestor</label>
								<select class="form-control" id="search_corresponsavel"  name="corresponsavel" ng-model="search.corresponsavel">
									<option selected="selected" value="">Selecionar gestor</option>
									<option value="{{ corresponsavel.id }}" ng-repeat="corresponsavel in corresponsavels">{{ corresponsavel.name }}</option>
								</select>	
							</div>
						</div>						
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Status</label>
                                <div class="checkbox" style="margin-top:5px;">
                                	<input type="radio" ng-value="1" id="matriz-status1" ng-model="search_status" class="styled-checkbox">
                                    <label for="matriz-status1">Ativo</label>
                                    <input type="radio" ng-value="0" id="matriz-status2" ng-model="search_status" class="styled-checkbox">
                                    <label for="matriz-status2" style="margin-left: 20px;">Inativo</label>
                                </div>
							</div>
						</div>
						<div class="col-md-2 okrView btn-center" style="float: right;">
							<label class="control-label"></label>
							<div class="clr_filters">
								<a href="javascript:void(0)" class="clean_filter" ng-click="resetFilter()">Limpar Filtros</a>
								<button type="button" ng-click="applyFilter()"  class="apply_filter">Aplicar Filtro</button>								
							</div>
								
						</div>
						<div class="clearfix"></div>
					</div>
                </form>
            </div>
    	</div>
    	<div class="thead">
	        <table>
	            <thead>
	                <td width="30%">Nome</td>
	                <td width="25%">Gestor</td>
	                <td width="25%">2º gestor</td>
	                <td width="15%">Ativo</td>
	                <td width="5%"></td>
	            </thead>
	        </table>
        </div>
        <table class="content">
            <tr ng-repeat="item in projects">
            	<td width="30%"> {{ item.nome_matriz }} </td>
                <td width="25%">{{ item.responsavel }}</td>
                <td width="25%"> {{ item.corresponsavel }} </td>
                <td width="15%" ng-if="item.ativo == '1'">Ativo </td>
                <td width="15%" ng-if="item.ativo == '0'">Inativo </td>
                <td width="5%"><a href="javascript:void(0)" ng-click="modalProject(item);scroollToTop()"><i class="icon-edit"></i></a></td>
            </tr>
        </table>
    </div>
</div