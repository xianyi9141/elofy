<!--
    @raptor view for pesquisa menu add
-->
<style>
    .progress_wrap,  .progress-title{
        width:155px;
    }
    .progress_wrap span{
        width: auto;
    }
    .progress{
        margin-bottom: 0;
    }
</style>

<div ng-controller="pesquisasCtrl" id="pesquisas">
    <h2 class="new_heading_dv">
        Pesquisas
    </h2>
    <hr>
    <div class="dblock" style="position:relative;">
        <div id="elofy-overlay-loader" ng-show="contentLoading > 0" >
            <img src="<?php echo base_url()?>assets/portal/img/preloader_2.gif" alt="close"/>
        </div>

        <!-- filter -->
        <div class="box-header">
            <h4>Todas as pesquisas</h4>
            <a href="<?php echo base_url()?>pesquisas/-1" class="addmore" onclick="" >+ Adicionar nova pesquisa</a>
            <div class="buttons">
                <form style="display:inline-block; vertical-align:top;" ng-submit="search()">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Nome</label>
                                <input id="search_name" name="search_nome" type="text" class="form-control transparent" ng-model="search.nome" placeholder="Nome" style="padding: 20px;" />
        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Tipo</label>
                                <select class="form-control" id="search_tipo"  name="tipo" ng-model="search.tipo">
                                    <option selected="selected" value="">Selecionar tipo</option>
                                    <option value="{{ tipo.id }}" ng-repeat="tipo in tipos">{{ tipo.name }}</option>
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Situação</label>
                                <select class="form-control" id="search_situation"  name="tipo" ng-model="search.situation">
                                    <option selected="selected" value="">Selecionar tipo</option>
                                    <option value="{{ situation.id }}" ng-repeat="situation in situations">{{ situation.name }}</option>
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
                        <div class="col-md-3 okrView btn-center">
                            <label class="control-label"></label>
                            <div class="clr_filters">
                                <a href="javascript:void(0)" class="clean_filter" ng-click="resetFilter()">Limpar Filtros</a>
                                <button type="button" ng-click="filter()"  class="apply_filter">Aplicar Filtro</button>                             
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- filter end -->

        <div class="tbale_dv">
            <div class="table_row_cil hder">
                <div class="table_cell_cil text-left">
                    <span>Nome da Pesquisa
                    </span>
                </div>
                <div class="table_cell_cil">
                    <span>Tipo</span>
                </div>
                <div class="table_cell_cil">
                    <span>Situação</span>
                </div>
                <div class="table_cell_cil">
                    <span>Acao</span>
                </div>
            </div>
            <div class="table_row_cil" ng-repeat="pesquisa in pesquisaList">
                <div class="table_cell_cil" class="text-left">
                    <span>{{ pesquisa.nome_pesquisa }}</span>
                </div>
                <div class="table_cell_cil" ng-if="pesquisa.id_tipo_pesquisa == 0"><span>Enquete</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.id_tipo_pesquisa == 1"><span>Pesquisa Padrão</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.id_tipo_pesquisa == 2"><span>Pesquisa Temporal</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.id_tipo_pesquisa == 3"><span>&nbsp;</span></div>

                <div class="table_cell_cil" ng-if="pesquisa.fechado == 0 && pesquisa.situacao == 0"><span>Rascunho</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.fechado == 0 && pesquisa.situacao == 1"><span>Planejada</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.fechado == 0 && pesquisa.situacao == 2"><span>Em andamento</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.fechado == 0 && pesquisa.situacao == 3"><span>Finalizada</span></div>
                <div class="table_cell_cil" ng-if="pesquisa.fechado == 1"><span>Fechada</span></div>

                
                <div class="table_cell_cil">
                    <div class="div_action text-right">
                        <a href="<?php echo base_url()?>pesquisas/{{pesquisa.id_pesquisa}}">Editar</a>

                        <a href="<?php echo base_url()?>pesquisa/{{pesquisa.id_pesquisa}}/question">Relatório</a>

                     <!--   <a href="javascript:void(0)" ng-click="closeSurvey(pesquisa.id_pesquisa)">Encerrar Pesquisa</a>  -->

                        <a href="#" ng-click="copyToClipboardFunction(pesquisa.id_pesquisa)">Copiar link da Pesquisa</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>