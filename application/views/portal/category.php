<div ng-controller="CategoryCtrl" id="usuarios" class="compcategories">
    <h2 class="page-title">
        Categorias de Competência<span class="text-muted">({{ compcategories.length }})</span>
    </h2>
	<div class="box with-margins form-section nested-list dd full_width_list">
		<div id="side-form" class="sidebar_position_relative">
            <form id="form-category">
				<div class="form ">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="nome_categoria" class="control-label" style="margin-bottom:15px;">Nome</label>
										<input id="id_categoria_competencias" name="id_categoria_competencias" type="hidden" class="form-control" value="{{ categoryData.id_categoria_competencias }}">
										<input id="nome_categoria" name="nome_categoria" type="text" class="form-control" value="{{ categoryData.nome_categoria }}">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="ativo" class="control-label" style="margin-bottom:15px;">Situação</label>
										<select class="form-control" name="ativo" id="ativo">
											<option value="1">Ativo</option>
											<option value="0">Inativo</option>
										</select>	
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label for="ativo" class="control-label" style="margin-bottom:15px;">Peso</label>
										<input id="peso" name="peso" type="number" class="form-control" value="{{ categoryData.peso }}" min="0.1" max="10">	
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="descricao_categoria"  class="control-label" style="margin-bottom:15px;">Descricao</label>
										<textarea id="descricao_categoria" name="descricao_categoria" rows="3" class="form-control" style="min-height: 21px;height: 52px;">{{ categoryData.descricao_categoria }}</textarea>
									</div>
								</div>
								<div class="col-md-3">
									<div class="model_bod checkbox_layout groupbyControl" style="padding-top: 40px;">
										<div class="model_che">
											<input type="checkbox" id="checkbox_Control" name="control"  value="1" checked="true" ng-click="changeControl()">
											<label for="checkbox_Control" style="font-size:12px">Restrição Perfil</label>
										</div>
									</div>
									<div class="model_bod checkbox_layout groupbyTime" style="padding-top: 40px;">
										<div class="model_che">												
											<input type="checkbox" id="checkbox_Time" name="time"  value="1">
											<label for="checkbox_Time" style="font-size:12px">Time</label>
										</div>
									</div>
									<div class="model_bod checkbox_layout groupbyCargo" style="padding-top: 40px;" >
										<div class="model_che">
											<input type="checkbox" id="checkbox_gestor" name="gestor" value="1">
											<label for="checkbox_gestor" style="font-size:12px">Gestor</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1">
							<button type="submit" class="btn btn-success salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
    <div id="list" class="nested-list dd with-margins box full_width_list">
		<div class="box-header">
            <h4>Editar Categoria</h4>
            <div class="buttons">
                <form style="display:inline-block; vertical-align:top;" ng-submit="search()">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Categoria por nome" ng-model="query">
                        <span class="input-group-btn">
                            <button type="button"><i class="entypo-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
		<div class="thead">
			<table>
				<thead>
					<td width="30%">Nome</td>
					<td width="35%">Descricao</td>
					<td width="10%">Gestor</td>
					<td width="10%">Time</td>
					<td width="10%">Peso</td>
					<td width="5%"></td>
				</thead>
			</table>
		</div>
		<table class="content">
				<tr ng-repeat="category in compcategories | filter : query" ng-model="change">
					<td width="30%">{{ category.nome_categoria }}</td>
					<td width="35%">{{ category.descricao_categoria }}</td>
					<td width="10%">{{category.gestor==1?'Sim':'Não'}}</td>
					<td width="10%">{{category.time==1?'Sim':'Não'}}</td>
					<td width="10%">{{category.peso}}</td>
					<td width="5%">
						<a href="javascript:void(0)" ng-click="editCategory(category.id_categoria_competencias);scroollToTop()"><i class="icon-edit"></i></a>
					</td>
				</tr>
		</table>
	</div>
</div>