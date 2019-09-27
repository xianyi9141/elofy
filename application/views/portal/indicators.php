<div class="feedbacksView" ng-controller="indicatorsCtrl" >
    <div class="flex-around mdc-head" style="">
        <h2 class="page-title" style="margin-top: 10px;">
            Indicadores
        </h2>
        <div class="add-key-btn">
            <button class="mdc-button mdc-button--raised" ng-click="addHistory()">
                <i class="material-icons mdc-button__icon">add</i>
                <span class="mdc-button__label">Novo Indicador Base</span>
            </button>
        </div>
    </div>
<?php
$columFilters = array('primero_visible'=>array('name' => 'primero_visible','text' => '1º Semestre'),
    'segundo_visible'=>array('name' => 'segundo_visible','text' => '2º Semestre'),
    'anual_visible'=>array('name' => 'anual_visible','text' => 'Resultado Anual')
    );
?>
    <div class="section1 add_new_function survey_report okr_menus">
            <div class="form_add add_new_function_title" style="border:1px solid #dadce0;border-radius: 5px;margin-bottom: 10px;">
                <div class="add_new_function_title pdlr-0 style2">
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>{{ 'OKRS.FILTER_BY' | translate }}</h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row indicator_filter"  style="padding-top: 20px;">
                    <div class="col-sm-12">
                        <div class="filter_form_view view_dsds">
                            <!-- <div class="row">
                                <div class="col-sm-4">
                                    <label>Ciclo</label>
                                    <div class="clearfix"></div>
                                    <div class="filters_view">
                                        <select id="search_cycle" name="search_cycle" class="" ng-change="onChangeCycleSelect()" ng-model="selectedCycle">
                                            <option ng-repeat="cycle in cycles | filter : {added : '!'}" value="{{cycle.id_ciclo}}">{{cycle.filtro}}</option>
                                        </select>
                                        <span class="select-single-multiple-tag" ng-repeat="selected in cycles | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.filtro}}</label><i class="fa fa-remove"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nome</label>
                                        <input id="search_name" name="search_name" type="text" class="form-control" ng-model="searchName" placeholder="Nome" />
                                        <ui id="search_list" ng-if="keyresultNames.length > 0" ng-show="showSearchName">
                                            <li ng-repeat="keyName in keyresultNames" ng-show="keyName.match" ng-click="searchNameClick(keyName)">{{keyName.name}}</li>
                                        </ui>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Times</label>
                                    <div class="clearfix"></div>
                                    <div class="filters_view">
                                        <select id="search_time" name="search_time" class="" ng-change="onChangeTeamSelect()" ng-model="selectedTeam">
                                            <option ng-repeat="team in times | filter : {added : '!'}" value="{{team.id}}">{{team.name}}</option>
                                        </select>
                                        <span class="select-single-multiple-tag" ng-repeat="selected in times | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:10px;" class="row">
                                <div class="col-sm-4">
                                    <label>Responsávels</label>
                                    <div class="clearfix"></div>
                                    <div class="filters_view">
                                        <select id="search_responsavel" name="search_responsavel" class="" ng-change="onChangeResponsavelSelect()" ng-model="selectedResponsavel">
                                            <option ng-repeat="responsavel in responsavels | filter : {added : '!'}" value="{{responsavel.id}}">{{responsavel.name}}</option>
                                        </select>
                                        <span class="select-single-multiple-tag" ng-repeat="selected in responsavels | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Objetivos</label>
                                    <div class="clearfix"></div>
                                    <div class="filters_view">
                                        <select id="search_objective" name="search_objective" class="" ng-change="onChangeObjectiveSelect()" ng-model="selectedObjective">
                                            <option ng-repeat="objective in objectives | filter : {added : '!'}" value="{{objective.id}}">{{objective.name}}</option>
                                        </select>
                                        <span class="select-single-multiple-tag" ng-repeat="selected in objectives | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label>Situação</label>
                                    <div class="clearfix"></div>
                                    <div class="filters_view">
                                        <select id="search_ativo" name="search_ativo" class="" ng-change="onChangeAtivoSelect()" ng-model="selectedAtivo">
                                            <option ng-repeat="ativo in ativos | filter : {added : '!'}" value="{{ativo.id}}">{{ativo.name}}</option>
                                        </select>
                                        <span class="select-single-multiple-tag" ng-repeat="selected in ativos | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                    </div>
                                </div> 
                                <div class="col-sm-2">
                                    <div class="container-block" style="margin-top: 28px;">
                                        <input type="checkbox" name="showVisao" id="showVisao" ng-model="showVisao" ng-init="showVisao = false">
                                        <label for="showVisao">Visão desempenho</label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Código</label>
                                        <input id="search_codigo" name="search_codigo" type="text" class="form-control" ng-model="searchCodigo" placeholder="Código" />
                                        <ui id="search_codigo_list" ng-if="historyCodigoes.length > 0" ng-show="showSearchCodigo">
                                            <li ng-repeat="keyCodigo in historyCodigoes" ng-show="keyCodigo.match" ng-mousedown="searchCodigoDown()" ng-mouseup="searchCodigoUp(keyCodigo)">{{keyCodigo.name}}</li>
                                        </ui>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nome</label>
                                        <input id="search_name" name="search_name" type="text" class="form-control" ng-model="searchName" placeholder="Nome" />
                                        <ui id="search_nome_list" ng-if="historyNames.length > 0" ng-show="showSearchName">
                                            <li ng-repeat="keyName in historyNames" ng-show="keyName.match" ng-mouseup="searchNameUp(keyName)" ng-mousedown="searchNameDown()">{{keyName.name}}</li>
                                        </ui>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="container-block" style="margin-top: 48px;">
                                        <input type="checkbox" name="showMinimo" id="showMinimo" ng-model="showMinimo" ng-init="showMinimo = false">
                                        <label for="showMinimo">Exibir Mínimo</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="container-block" style="margin-top: 48px;">
                                        <input type="checkbox" name="showTarget" id="showTarget" ng-model="showTarget" ng-init="showTarget = false">
                                        <label for="showTarget">Exibir Target</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="container-block" style="margin-top: 48px;">
                                        <input type="checkbox" name="showMaximo" id="showMaximo" ng-model="showMaximo" ng-init="showMaximo = false">
                                        <label for="showMaximo">Exibir Máxima</label>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:10px;" class="row">
                                <div class="col-sm-12" style="float:right;">
                                    <div class="clr_filters">
                                        <div class="filter_btn">
                                            <!-- <button class="mdc-button mdc-button--outlined mdc-fechar" ng-click="submitCsv()">
                                            <i class="material-icons mdc-button__icon">import_export</i>
                                            <span class="mdc-button__label"> Exportar CSV</span>
                                            </button> -->
                                            <button class="mdc-button mdc-fechar" ng-click="reset()">Limpar Filtros</button>
                                            <button type="submit" class="mdc-button mdc-button--raised" ng-click="applyFilter()">Aplicar Filtros</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter_form_view">
                <div class="col-sm-12">
                    <form id="form-export-csv" method="post" action="<?php echo base_url('csvDownloadIndicators')?>" style="display: inline;">
                        <input type="hidden" name="teams" ng-value="getIdListString(teamsIdList)"/>
                        <input type="hidden" name="responsavels" ng-value="getIdListString(responsavelsList)"/>
                        <input type="hidden" name="objectives" ng-value="getIdListString(objectivesList)"/>
                        <input type="hidden" name="cycles" ng-value="getIdListString(cyclesList)"/>
                        <input type="hidden" name="activos" ng-value="getIdListString(ativosList)"/>
                        <input type="hidden" name="search_name" ng-value="searchName"/>
                        <div class="right text-right pull-right" style="display:inline;margin-left:10px;">
                            <div class="dropdown" style="display:inline-block;" id="viewmorecolumn">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" ng-click="viewsColumsFilter()">Adicionar Colunas
                                <span class="caret"></span></button>  
                                <ul class="dropdown-menu pull-right padd-10" id="section_filter_box" >
                                    <?php
foreach ($columFilters as $key => $value) {
?>
                                    <li>
                                        <div class="container-block" >
                                          <input type="checkbox" id="checkbox_<?php echo $value['name']; ?>" ng-click="viewColumn($event,'<?php echo $value['name']; ?>')" name="<?php echo $value['name']; ?>" value="<?php echo $value['text']; ?>">
                                          <label for="checkbox_<?php echo $value['name']; ?>"><?php echo $value['text']; ?></label>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>             
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form_add" ng-show="results.length>0">
                <div class="main_box_show_dv dv-box" style="margin-left: -20px; margin-right: -20px;border:none;">
                    <div class="DV_table_view_elofy cli">
                        <div class="table-responsive content horizontal-images" id="tbl_indicators">
                        <table class="table table-bordered">
                            <!-- <tr class="">
                                <th>Nome de Indicador</th>
                                <th ng-if="description_visible">Descrição</th>
                                <th ng-if="objective_visible">Objetivo</th>
                                <th>Direção</th>
                                <th>Frequência de Apuração</th>
                                <th>Fonte</th>
                                <th>Unidade de Medida</th>
                                <th ng-if="showVisao">Ponto de Partida</th>
                                <th ng-if="showVisao">Meta</th>
                                <th ng-if="showVisao">Atual</th>
                                <th ng-if="showVisao">Percepcao</th>
                                <th ng-if="showVisao">Data atualizacao</th>
                            </tr>
                            <tr ng-repeat="keyresult in results">
                                <td>{{keyresult.title}}</td>
                                <td ng-if="description_visible">{{keyresult.descricao}}</td>
                                <td ng-if="objective_visible">{{keyresult.objname}}</td>
                                <td>
                                    <span ng-if="keyresult.manutencao == '1'">Manutenção</span>
                                    <span ng-if="keyresult.manutencao != '1' && keyresult.direcao == '1'">Maior Melhor</span>
                                    <span ng-if="keyresult.manutencao != '1' && keyresult.direcao == '0'">Menor Melhor</span>
                                </td>
                                <td>
                                    <span ng-if="keyresult.frequencia == '1'">Diário</span>
                                    <span ng-if="keyresult.frequencia == '2'">Semanal</span>
                                    <span ng-if="keyresult.frequencia == '3'">Mensal</span>
                                    <span ng-if="keyresult.frequencia == '4'">Trimestral</span>
                                    <span ng-if="keyresult.frequencia == '5'">Anual</span>
                                </td>
                                <td>{{keyresult.fonte}}</td>
                                <td>{{keyresult.measurement}}</td>
                                <td ng-if="showVisao">{{keyresult.de}}</td>
                                <td ng-if="showVisao">{{keyresult.para}}</td>
                                <td ng-if="showVisao">{{keyresult.atual}}</td>
                                <td ng-if="showVisao">
                                    <center>
                                        <label ng-class="{'percepcao_red':keyresult.percepcao == 0, 'percepcao_yellow':keyresult.percepcao == 1, 'percepcao_green':keyresult.percepcao == 2}"></label>
                                    </center>
                                </td>
                                <td ng-if="showVisao">{{keyresult.last_date | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
                            </tr> -->
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th ng-if="showMinimo"></th>
                                <th ng-if="showTarget"></th>
                                <th ng-if="showMaximo"></th>
                                <th colspan="3">Janeiro</th>
                                <th colspan="3">Fevereiro</th>
                                <th colspan="3">Março</th>
                                <th colspan="3">Abril</th>
                                <th colspan="3">Maio</th>
                                <th colspan="3">Junho</th>
                                <th colspan="3">Julho</th>
                                <th colspan="3">Agosto</th>
                                <th colspan="3">Setembro</th>
                                <th colspan="3">Outubro</th>
                                <th colspan="3">Novembro</th>
                                <th colspan="3">Dezembro</th>
                                <th colspan="3" ng-if="primero_visible">1º Semestre</th>
                                <th colspan="3" ng-if="segundo_visible">2º Semestre</th>
                                <th colspan="3" ng-if="anual_visible">Resultado Anual</th>
                                <!-- <th></th> -->
                            </tr>
                            <tr>
                                <th></th>
                                <th style="min-width:100px">Código</th>
                                <th style="min-width:250px">Nome</th>
                                <th style="min-width:120px" ng-if="showMinimo">Mínimo</th>
                                <th style="min-width:120px" ng-if="showTarget">Target</th>
                                <th style="min-width:120px" ng-if="showMaximo">Máxima</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px">Categoria</th>
                                <th style="min-width:100px">Meta</th>
                                <th style="min-width:100px">Valor</th>
                                <th style="min-width:100px" ng-if="primero_visible">Categoria</th>
                                <th style="min-width:100px" ng-if="primero_visible">Meta</th>
                                <th style="min-width:100px" ng-if="primero_visible">Valor</th>
                                <th style="min-width:100px" ng-if="segundo_visible">Categoria</th>
                                <th style="min-width:100px" ng-if="segundo_visible">Meta</th>
                                <th style="min-width:100px" ng-if="segundo_visible">Valor</th>
                                <th style="min-width:100px" ng-if="anual_visible">Categoria</th>
                                <th style="min-width:100px" ng-if="anual_visible">Meta</th>
                                <th style="min-width:100px" ng-if="anual_visible">Valor</th>
                                <!-- <th style="min-width:100px"></th> -->
                            </tr>
                            <tr ng-repeat="history in results">
                                <td>
                                    <a href="javascript:void(0)" ng-click="editHistory(history)"><i class="icon-edit"></i></a>
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.id_kr_sistema_origem}}</span>
                                    <input id="codigo_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.id_kr_sistema_origem}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.nome}}</span>
                                    <input id="nome_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.nome}}">
                                </td>
                                <td ng-if="showMinimo">
                                    <span ng-show="!history.isEditing">{{history.minimo}}</span>
                                    <input id="minimo_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.minimo}}">
                                </td>
                                <td ng-if="showTarget">
                                    <span ng-show="!history.isEditing">{{history.target}}</span>
                                    <input id="target_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.target}}">
                                </td>
                                <td ng-if="showMaximo">
                                    <span ng-show="!history.isEditing">{{history.maximo}}</span>
                                    <input id="maximo_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.maximo}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_1}}</span>
                                    <input id="category1_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_1}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_1}}</span>
                                    <input id="meta1_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_1}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_1}}</span>
                                    <input id="valor1_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_1}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_2}}</span>
                                    <input id="category2_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_2}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_2}}</span>
                                    <input id="meta2_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_2}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_2}}</span>
                                    <input id="valor2_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_2}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_3}}</span>
                                    <input id="category3_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_3}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_3}}</span>
                                    <input id="meta3_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_3}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_3}}</span>
                                    <input id="valor3_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_3}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_4}}</span>
                                    <input id="category4_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_4}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_4}}</span>
                                    <input id="meta4_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_4}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_4}}</span>
                                    <input id="valor4_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_4}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_5}}</span>
                                    <input id="category5_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_5}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_5}}</span>
                                    <input id="meta5_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_5}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_5}}</span>
                                    <input id="valor5_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_5}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_6}}</span>
                                    <input id="category6_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_6}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_6}}</span>
                                    <input id="meta6_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_6}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_6}}</span>
                                    <input id="valor6_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_6}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_7}}</span>
                                    <input id="category7_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_7}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_7}}</span>
                                    <input id="meta7_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_7}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_7}}</span>
                                    <input id="valor7_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_7}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_8}}</span>
                                    <input id="category8_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_8}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_9}}</span>
                                    <input id="meta8_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_8}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_8}}</span>
                                    <input id="valor8_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_8}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_9}}</span>
                                    <input id="category9_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_9}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_9}}</span>
                                    <input id="meta9_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_9}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_9}}</span>
                                    <input id="valor9_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_9}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_10}}</span>
                                    <input id="category10_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_10}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_10}}</span>
                                    <input id="meta10_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_10}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_10}}</span>
                                    <input id="valor10_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_10}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_11}}</span>
                                    <input id="category11_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_11}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_11}}</span>
                                    <input id="meta11_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_11}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_11}}</span>
                                    <input id="valor11_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_11}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.categoria_12}}</span>
                                    <input id="category12_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_12}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.meta_12}}</span>
                                    <input id="meta12_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_12}}">
                                </td>
                                <td>
                                    <span ng-show="!history.isEditing">{{history.valor_12}}</span>
                                    <input id="valor12_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_12}}">
                                </td>
                                <td ng-if="primero_visible">
                                    <span ng-show="!history.isEditing">{{history.categoria_13}}</span>
                                    <input id="category13_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_13}}">
                                </td>
                                <td ng-if="primero_visible">
                                    <span ng-show="!history.isEditing">{{history.meta_13}}</span>
                                    <input id="meta13_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_13}}">
                                </td>
                                <td ng-if="primero_visible">
                                    <span ng-show="!history.isEditing">{{history.valor_13}}</span>
                                    <input id="valor13_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_13}}">
                                </td>
                                <td ng-if="segundo_visible">
                                    <span ng-show="!history.isEditing">{{history.categoria_14}}</span>
                                    <input id="category14_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_14}}">
                                </td>
                                <td ng-if="segundo_visible">
                                    <span ng-show="!history.isEditing">{{history.meta_14}}</span>
                                    <input id="meta14_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_14}}">
                                </td>
                                <td ng-if="segundo_visible">
                                    <span ng-show="!history.isEditing">{{history.valor_14}}</span>
                                    <input id="valor14_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_14}}">
                                </td>
                                <td ng-if="anual_visible">
                                    <span ng-show="!history.isEditing">{{history.categoria_15}}</span>
                                    <input id="category15_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.categoria_15}}">
                                </td>
                                <td ng-if="anual_visible">
                                    <span ng-show="!history.isEditing">{{history.meta_15}}</span>
                                    <input id="meta15_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.meta_15}}">
                                </td>
                                <td ng-if="anual_visible">
                                    <span ng-show="!history.isEditing">{{history.valor_15}}</span>
                                    <input id="valor15_{{history.id_rchave_historico}}" ng-show="history.isEditing" type="text" class="form-control" value="{{history.valor_15}}">
                                </td>

                                <!-- <td>
                                    <a class="adicionar-btnx" style="cursor: pointer;margin: 0px !important;" ng-show="history.isEditing" ng-click="saveHistory(history)">Salvar</a>
                                </td> -->
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form_add" ng-show="results.length<=0">
                <div class="well box">
                    <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
                </div>
            </div>

    <div class="clearfix"></div>

    </div>
