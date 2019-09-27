<!--
    @raptor view for pesquisa menu add
-->
<style>
    a.cancelar_btn{
        padding: 10px 28px !important;
    }
    .custom_radio{
        width:100%;
    }
    .button_sets.backlink a{
        color: #fff;
    }
    .select2-choices{
        background: #FFFFFF !important;
    }
    .table-body{
    }
    .overflow_dv {
        width: 100%;
        overflow: visible;
        max-height: 300px;
        overflow-y:auto;
     /* min-height: 80px; */
    }
    textarea{
        resize:none;
    }
    .button_sets{
        cursor: pointer;
    }
    label.input-label{
        text-transform: uppercase;
    }
    label.low-input-label{
        text-transform: capitalize;
    }
    .input-group .form-control:first-child{
        padding-right:0;
    }
    .full-width{
       width:100%;
       margin:0;
    }
    .table_cell_cil{
        width: 30%;
        border-bottom: 1px solid #ddd;
    }
    .table-header .table_cell_cil{
        border-top:1px solid #ddd;
    }
    .table-data .table_cell_cil{
        line-height: 45px;
    }
    .btn-draft{
        display: inline-block;
        width: auto;
        padding: 5px 10px;
        font-weight: 500;
        color: #999;
        font-size: 14px;
        margin: 0 2px;
        border-radius: 4px;
        border:1px solid #ddd;
    }
    div.step1, div.step2, div.step3, div.step4{
        box-sizing: border-box;
    }
    a.cancelar_btn{
        padding: 7px 28px !important;
    }
    .table-header .table_cell_cil{
        background-color: #0654df;
        color: #fff;
        border: none;
        border-right: 1px solid #fff;
    }
    .table-data .table_cell_cil{
        line-height: 24px;
    }
</style>

<form id="saveform1">
<div ng-controller="pesquisaseditorCtrl" class="pesquisaeditorView">
    <h2 class="new_heading_dv">
        <span ng-if="!pesquisa.id_pesquisa">Nova Pesquisa</span> <span ng-if="pesquisa.id_pesquisa">Editar Pesquisa</span> 
    </h2><span ng-if="pesquisa.fechado == 1">Fechada</span> 
    <hr>        
    <div class="content" style="position:relative;">
        <div id="elofy-overlay-loader" ng-if="contentLoading > 0">
            <img src="<?php echo base_url()?>assets/portal/img/preloader_2.gif" alt="close"/>
        </div>

        <div class="add_new_function first" >
            <div class="add_new_function_title">
                Configuração
            </div>

                <div class="">
                    <div class="form_add">
                        <input type="hidden" id="id_pesquisa1" class="form-control" name="id_pesquisa" ng-model="pesquisa.id_pesquisa" value="<?php echo $this->session->userdata('id_pesquisa'); ?>"/>
                        <div class="">
                            <div class="col-sm-8">
                                <label class="input-label">Nome Da Pesquisa</label>
                                <input id="nome_pesquisa" name="nome_pesquisa" type="text" value="" ng-model="pesquisa.nome_pesquisa" placeholder="Digite aqui o nome da pesquisa" required="" class="form-control">
                            </div>
                            <div class="col-sm-4" style="margin-top:35px; margin-bottom:15px;">
                                <div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 5px; height:0" >
                                    <div class="model_ch">
                                        <div class="model_che">
                                            <input type="checkbox" id="anonima" name="anonima" value="1" ng-model="pesquisa.anonima">
                                            <label for="anonima" >Anônima</label>
                                        </div>
                                    </div>
                                </div>
                              <!--  <div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 5px; height:0" >
                                    <div class="model_ch">
                                        <div class="model_che">
                                            <input type="checkbox" id="periodica" name="periodica" value="1" ng-model="pesquisa.periodica">
                                            <label for="periodica" >Periódica</label>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form_add_row">
                            <div class="col-sm-6 hide" ng-class="{'show': tipo2, 'hide':tipo0 || tipo1 || tipo3 || tipo4}" style="margin-top:20px;">
                                <div class="filters_view">
                                    <div class="form-group">
                                      <b> Pesquisas temporais iniciam a partir da data de admissão.</b>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="">
                            <div class="col-sm-3">
                                <label class="input-label">Tipo</label>
                                <div class="filters_view">
                                    <select id="id_tipo_pesquisa" ng-change="tipoChange()" name="id_tipo_pesquisa" class="select2 time" ng-model="pesquisa.id_tipo_pesquisa" value="{{pesquisa.id_tipo_pesquisa}}" required data-placeholder="Tipo Pesquisa">
                                        <option value=""></option>
                                        <option value="0">Enquete</option>
                                        <option value="1">Pesquisa Padrão</option>
                                        <option value="2">Pesquisa Temporal</option>
                                       <!-- <option value="3">Pesquisa</option>-->
                                    </select>
                                </div>
                            </div>
                          <!--  <div class="col-sm-3 dv-frequencia hide"   ng-class="{'hide':!pesquisa.periodica || pesquisa.periodica==0}">
                                <label class="input-label">Frequência</label>
                                <div class="filters_view">
                                    <select id="frequencia" ng-change="tipoChange()" name="frequencia" class="select2 time" ng-model="pesquisa.frequencia" value="{{pesquisa.frequencia}}"  data-placeholder="Choose Frequency">
                                        <option value=""></option>
                                        <option value="0">Semanal</option>
                                        <option value="1">Mensal</option>
                                        <option value="2">Trimestral</option>
                                        <option value="3">Semestral</option>
                                        <option value="4">Anual</option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="dv-dates col-sm-4 hide" ng-class="{'hide': pesquisa.periodica || pesquisa.periodica==1 || tipo2}">
                                <div style="width:45%; float:left">
                                    <div class="filters_view">
                                        <div class="form-group">
                                            <label class="input-label" for="data_ini">Data de Início</label>
                                            <div class="input-group" style="width:90%;">
                                                <input id="data_ini" name="data_ini" type="text" class="form-control data" value="" ng-model="pesquisa.data_ini" required placeholder="De" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}">
                                                <div class="input-group-addon hide"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="filters_view">
                                        <div class="form-group">
                                            <label class="input-label" for="data_fim">Data de Fim</label>
                                            <div class="input-group" style="width:90%;">
                                                <input id="data_fim" name="data_fim" type="text" class="form-control data" value="{{pesquisa.data_fim}}" ng-model="pesquisa.data_fim" required placeholder="Ate" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}">
                                                <div class="input-group-addon hide"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 hide" ng-class="{'show': tipo4, 'hide':tipo0 || tipo1 || tipo2 || tipo3}">
                                <div class="filters_view">
                                    <div class="form-group">
                                        <label for="nome_tipo" class="input-label">Nome</label>
                                        <input type="text" id="nome_tipo" name="nome_tipo" value="{{pesquisa.nome_tipo}}" ng-model="pesquisa.nome_tipo"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 hide" ng-class="{'show': tipo2, 'hide':tipo0 || tipo1 || tipo3 || tipo4}">
                                <div class="filters_view">
                                    <div class="form-group">
                                        <label for="numero_dias" class="input-label">Tempo de Empresa</label>
                                        <input required placeholder="Dias adicionais" type="text" string-to-number id="numero_dias" name="numero_dias" pattern="^[0-9]*$" value="{{pesquisa.numero_dias}}" ng-model="pesquisa.numero_dias"/>
                                        <div class="requirements row">
                                            Digite o número de dias necessário de empresa para ser selecionado para a pesquisa.
                                            (Ex: 30)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 hide" ng-class="{'show': !tipo2}">
                                <div class="filters_view">
                                    <div class="form-group">
                                        <label for="id_questionario" class="input-label">Questionário</label>
                                        <select id="id_questionario" name="id_questionario" class="select2 usuario-activity" data-placeholder="Escolha o questionário" ng-model="keySelectQuest">
                                            <option value=""></option>
                                            <option ng-repeat="quest in questionarios" value="{{quest.id_questionarios}}">{{quest.nome_questionario}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="filters_view">
                                    <div class="form-group">
                                        <label class="input-label" for="ativo">Situação</label>
                                        <select data-placeholder="Situação" id="ativo" name="ativo" class="select2 pesquisa-activity" ng-model="keySelectActive">
                                            <option value=""></option>
                                            <option value="0">Inativo</option>
                                            <option value="1">Ativo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 hide" ng-class="{'show': tipo2, 'hide':tipo0 || tipo1 || tipo3 || tipo4}"></div>
                            <div class="clearfix hide" ng-class="{'show': tipo2, 'hide':tipo0 || tipo1 || tipo3 || tipo4}"></div>
                            <div class="col-sm-5 hide" ng-class="{'show': tipo2, 'hide':tipo0 || tipo1 || tipo3 || tipo4}">
                                <div class="filters_view">
                                    <div class="form-group avaliado_mode">                                    
                                        <div class="row" style="height:87px;">
                                            <div class="col-sm-5">
                                                <div class="model_bod" style="display:inline-block; vertical-align:top; margin:35px 5px; height:0" >
                                                    <div class="model_ch">
                                                        <div class="model_che">
                                                            <input type="checkbox" id="autoavalia" name="autoavalia" value="1" ng-model="pesquisa.autoavalia">
                                                            <label for="autoavalia" >Autoavalia</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <label class="input-label" for="id_questionario_avaliado">Questionário</label>
                                                <div class="filters_view hide" ng-class="{'show': tipo2 && pesquisa.autoavalia==1}">
                                                    <div class="form-group">
                                                        <select id="id_questionario_avaliado" name="id_questionario_avaliado" class="select2 usuario-activity" data-placeholder="Escolha o Questionário" ng-model="pesquisa.id_questionario_avaliado">
                                                            <option value=""></option>
                                                            <option ng-repeat="quest in questionarios" value="{{quest.id_questionarios}}">{{quest.nome_questionario}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="clearfix"></div>  
                                        </div>
                                        <div class="row" style="height:62px;">
                                            <div class="col-sm-5">
                                                <div class="model_bod" style="display:inline-block; vertical-align:top; margin:10px 5px; height:0" >
                                                    <div class="model_ch">
                                                        <div class="model_che">
                                                            <input type="checkbox" id="gestor" name="gestor" value="1" ng-model="pesquisa.gestor">
                                                            <label for="gestor" >Gestor</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="filters_view">
                                                    <div class="form-group hide" ng-class="{'show': tipo2 && pesquisa.gestor==1}">
                                                        <select id="id_questionario_gestor" name="id_questionario_gestor" class="select2 usuario-activity" data-placeholder="Escolha o Questionário" ng-model="pesquisa.id_questionario_gestor">
                                                            <option value=""></option>
                                                            <option ng-repeat="quest in questionarios" value="{{quest.id_questionarios}}">{{quest.nome_questionario}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>   
                                        </div>
                                        <div class="row" style="height:62px;">
                                            <div class="col-sm-5">
                                                <div class="model_bod" style="display:inline-block; vertical-align:top; margin:10px 5px; height:0" >
                                                    <div class="model_ch">
                                                        <div class="model_che">
                                                            <input type="checkbox" id="permite_pares" name="permite_pares" value="1" ng-model="pesquisa.permite_pares">
                                                            <label for="permite_pares" >Avaliação de Pares</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="filters_view">
                                                    <div class="form-group hide" ng-class="{'show': tipo2 && pesquisa.permite_pares==1}">
                                                        <select id="id_questionario_pares" name="id_questionario_pares" class="select2 usuario-activity" data-placeholder="Escolha o questionário" ng-model="pesquisa.id_questionario_pares">
                                                            <option value=""></option>
                                                            <option ng-repeat="quest in questionarios" value="{{quest.id_questionarios}}">{{quest.nome_questionario}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                            <div class="col-sm-12 hide" ng-class="{show: pesquisa.permite_pares==1}">Gerente será convidado a escolher pares</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>
        </div>
<hr>
        <div class="add_new_function hide" ng-class="{show: pesquisa.id_tipo_pesquisa != 2}">
            <div class="add_new_function_title">
                Selecionar amostra 
            </div>
            <div class="form_add">
                <!-- <div class="form_add_row"  style="margin-bottom:35px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom_radio custom_radio_sidebyside">
                                    <label class="input-label col-md-12">Selecione o público da sua pesquisa:</label>
                                    <div class="radio_dv">
                                        <input type="radio" id="public_mode0" ng-model="pesquisa.public_pesquisa" name="public_pesquisa" value="0">
                                        <label for="public_mode0">Aberto a todos</label>
                                    </div>
                                    <div class="radio_dv">
                                        <input type="radio" id="public_mode1" ng-model="pesquisa.public_pesquisa" name="public_pesquisa" value="1" ng-change="previewUserList()">
                                        <label for="public_mode1">Selecão dinâmica</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div> -->
                <div class="form_add_row">
                    <div class="col-sm-5">
                        <label for="selected_user_type" class="input-label" style="float:left; width:auto">
                            Tipo de profissional:
                        </label>
                        <div class="clearfix"></div>

                        <select id="selected_user_type" name="selected_user_type" class="select2" data-placeholder="Escolha o tipo de usuário" ng-model="selectedUserType" ng-disabled="disable_form==1">
                            <option value="" disabled="disabled" selected="selected">Selecione um tipo</option>
                            <option value="4">Gestores</option>
                            <option value="0">Contribuidores</option>
                            <option value="">Todos</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <label for="selected_user_level" class="input-label" style="float:left; width:auto">
                            Nível do profissional:
                        </label>
                        <div class="clearfix"></div>

                        <select id="selected_user_level" name="selected_user_level" class="select2" data-placeholder="Escolha o nível do usuário" ng-model="selectedUserLevel" ng-disabled="disable_form==1">
                            <option value="" disabled="disabled" selected="selected">Selecione um nível</option>
                            <option value="{{nivel.nivel}}" ng-repeat="nivel in niveis">{{nivel.nivel}}</option>
                        </select>
                    </div>
                </div>

                <div class="form_add_row">
                    <div class="col-sm-5">
                        <div class="filters_view">
                            <div class="form-group">
                                <div class="form_add_row full-width">
                                    <label for="selectd_team" class="input-label" style="float:left; width:auto">
                                        Selecione os Times:
                                    </label>
                                    <div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
                                        <div class="model_ch">
                                            <div class="model_che">
                                                <input type="checkbox" id="chk_all_team" name="chk_all_team" value="1">
                                                <label for="chk_all_team" class="low-input-label"> Selecionar todos</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <select id="selectd_team" name="selectd_team[]" multiple="multiple" class="select2" data-placeholder="Escolha o time" ng-model="keySelectTeams">
                                    <option ng-repeat="team in teams" value="{{team.id}}">{{team.name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="filters_view">
                            <div class="form-group">
                                <div class="form_add_row full-width">
                                    <label for="selectd_users" class="input-label" style="float:left; width:auto">Selecionar pessoas:</label>
                                    <div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
                                        <div class="model_ch">
                                            <div class="model_che">
                                                <input type="checkbox" id="chk_all_user" name="chk_all_user" value="1">
                                                <label for="chk_all_user" class="low-input-label"> Selecionar todos</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <select id="selectd_users" name="selectd_users[]" multiple="multiple" class="select2" data-placeholder="Selecione Pessoas Específicas" ng-model="keySelectUsers">
                                    <option  ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- <div class="col-sm-4" style="margin-top:20px;">
                        <div class="filters_view">
                            <button class="confirmar" ng-click="previewUserList()">Show Previous Public</button>
                        </div>
                    </div>
                    <div class="clearfix"></div> -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
<hr>
        <div class="add_new_function" style="width: 49%; margin-right: 2%;min-height: 483px;"  ng-show="pesquisa.id_tipo_pesquisa != 2" >
            <div class="add_new_function_title">
                Não Selecionadas  ({{notPublicos.length}})
            </div>
            <div class="form_add" style="padding: 15px;">
                <div class="form_add_row">
                    <div class="col-sm-12">
                        <div class="input-group full-width">
                            <input type="text" class="form-control transparent" placeholder="Pesquise" id="search_text_not_publico" >
                            <span class="input-group-btn">
                                <button type="submit"><i class="entypo-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form_add_row table-body overflow_dv">                    
                    <div class="col-sm-12">
                        <div class="tbale_dv">
                            <div class="table_row_cil table-header">
                                <div class="table_cell_cil text-left">
                                    <span>Pessoa</span>
                                </div>
                                <div class="table_cell_cil text-left">
                                    <span class="text-left" style="text-align:left">Time</span>
                                </div>
                                <div class="table_cell_cil">
                                    <span>Adicionar</span>
                                </div>
                            </div>
                            <div class="table_row_cil table-data users-group-item-not-publico "  data-id="{{user.id_time}}_{{user.id_usuario}}" ng-repeat="user in notPublicos">

                                <div class="table_cell_cil text-left">
                                    <span style="text-align:left">{{user.nome_usuario}}</span>
                                </div>
                                <div class="table_cell_cil" class="text-left">
                                    <span style="text-align:left">{{ user.nome_unidade }}</span>
                                </div>
                                <div class="table_cell_cil" class="text-left">
                                    <button class="mdc-button" ng-click="selectUser(user.id_usuario)">
                                        <i class="mdc-button__icon material-icons">add</i>
                                        <span class="mdc-buttton__label">Adicionar</span>
                                    </button>
                                    <!-- <span class="add_span" ng-click="selectUser(user.id_usuario)">Adicionar</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="add_new_function" style="width: 49%;min-height: 483px;"  ng-show="pesquisa.id_tipo_pesquisa != 2" >
            <div class="add_new_function_title">
                Selecionadas  ({{usersTeams.length}})
            </div>
            <div class="form_add" style="padding: 15px;">
                <div class="form_add_row">
                    <div class="col-sm-12">
                        <div class="input-group full-width">
                            <input type="text" class="form-control transparent" placeholder="Pesquise" id="search_text" >
                            <span class="input-group-btn">
                                <button type="submit"><i class="entypo-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form_add_row table-body overflow_dv">
                    <div class="col-sm-12">
                        <div class="tbale_dv">
                            <div class="table_row_cil table-header">
                                <div class="table_cell_cil text-left">
                                    <span>Pessoa</span>
                                </div>
                                <div class="table_cell_cil text-left">
                                    <span class="text-left" style="text-align:left">Time</span>
                                </div>
                                <div class="table_cell_cil">
                                    <span>Remover</span>
                                </div>
                                <!-- <div class="table_cell_cil text-left">
                                    <span class="text-left" style="text-align:left">Tipo de Profissional</span>
                                </div>
                                <div class="table_cell_cil text-left">
                                    <span class="text-left" style="text-align:left">Nível</span>
                                </div> 
                                <div class="table_cell_cil">
                                    <span></span>
                                </div> -->
                            </div>
                            <div class="table_row_cil table-data users-group-item "  data-id="{{user.id_time}}_{{user.id_usuario}}" ng-repeat="user in usersTeams" >

                                <div class="table_cell_cil text-left">
                                    <input type="hidden" name="user_ids[]" value="{{user.id_time}}_{{user.id_usuario}}" />
                                    <span style="text-align:left">{{user.nome_usuario}}</span>
                                </div>
                                <div class="table_cell_cil" class="text-left">
                                    <span style="text-align:left">{{ user.nome_unidade }}</span>
                                </div>
                                <div class="table_cell_cil" class="text-left">
                                    <button class="mdc-button mdc-ripple-surface--accent" ng-click="unSelectUser(user.id_usuario)">
                                        <i class="mdc-button__icon material-icons mdc-text-excluir">remove</i>
                                        <span class="mdc-buttton__label mdc-text-excluir">Remover</span>
                                    </button>
                                    <!-- <span class="remove_span" ng-click="unSelectUser(user.id_usuario)">Remover</span> -->
                                </div>
                                <!-- <div class="table_cell_cil" class="text-left">
                                    <span style="text-align:left">{{ (user.tipo_cargo == 4) ? 'Gestor' : 'Contribuidor' }}</span>
                                </div>
                                <div class="table_cell_cil" class="text-left">
                                    <span style="text-align:left">{{ user.nivel }}</span>
                                </div> 
                                <div class="table_cell_cil text-right">
                                    <div class="div_action">
                                        <a href="javascript:void(0)" ng-click="deleteUser(user.id_time, user.id_usuario)" class="dlts"><i class="fa fa-times"></i></a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

<hr>
        <div class="add_new_function last" >
            <div class="add_new_function_title">
                Mensagem
            </div>
            <div class="form_add">
                <div class="form_add_row col-md-6 col-md-offset-3">
                    <div class="custom_radio custom_radio_sidebyside">
                        <label>Deseja enviar um e-mail para o público de sua pesquisa?</label>
                        <div class="radio_dv">
                            <input type="radio" id="send_message0" value="0" ng-model="pesquisa.email" class="ng-pristine ng-untouched ng-valid valid ng-empty public_mode" aria-required="true" name="send_message">
                            <label for="send_message0">Não</label>
                        </div>
                        <div class="radio_dv">
                            <input type="radio" id="send_message1" value="1" ng-model="pesquisa.email" class="ng-pristine ng-untouched ng-valid valid ng-empty" name="send_message">
                            <label for="send_message1">Sim</label>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="hide" ng-class="{show:pesquisa.email==1}">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="add_new_function_title" style="border-bottom: none; padding-left:0">
                           Convite para Participação
                        </div>
                        <div class="form_add_row">
                            <label>Título</label>
                            <input type="text" id="titulo_email" ng-model="pesquisa.titulo_email" name="titulo_email" class="form-control" />
                            <div class="clearfix"></div>
                        </div>
                        <div class="form_add_row">
                            <label>Corpo do e-mail</label>
                            <textarea name="corpo_email" id="corpo_email" ng-model="pesquisa.corpo_email" value="empty" class="form-control ng-binding" rows="5"></textarea>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="add_new_function_title" style="border-bottom: none; padding-left:0">
                           Mensagem de Agradecimento
                        </div>
                        <div class="form_add_row">
                            <label>Título</label>
                            <input type="text" id="titulo_email_tks" ng-model="pesquisa.titulo_email_tks" name="titulo_email_tks" class="form-control" />
                            <div class="clearfix"></div>
                        </div>
                        <div class="form_add_row">
                            <label>Corpo do e-mail</label>
                            <textarea name="corpo_email_tks" id="corpo_email_tks" ng-model="pesquisa.corpo_email_tks" value="empty" class="form-control ng-binding" rows="5"></textarea>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-4 col-sm-offset-6" style="margin-top:20px; margin-bottom:20px;">
                        <div class="container-block">
                            <input type="checkbox" name="sent_now" id="sent_now" value="1" ng-model="sent_now" ng-init="setSentNowFlag()">
                            <label for="sent_now">Enviar E-mail agora</label>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="form_add_row">
                    <div class="col-md-6 col-md-offset-3">
                        <button class="confirmar" ng-click="save_pesquisa3()" data-loading-text="<i class='icon-spinner animate-spin'></i> Saving">Finish</button>
                    </div>
                </div> -->
            </div>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
<input type="hidden" id="situacao" name="situacao" ng-model="situacao"/>
<div class="col-sm-12 modalBotoes">

    <p class="error-message text-danger  hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
    <button class="white yes btn-draft pull-right" ng-if="pesquisa.id_pesquisa" ng-click="closeSurvey(pesquisa.id_pesquisa)">Fechar Pesquisa</button>
    <a href="javascript:void(0)" class="white yes btn-draft" ng-click="save_draft()">Salvar como rascunho</a>
    <a mat-raised-button href="<?php echo base_url()?>pesquisas" class="mdc-button mdc-fechar">Fechar</button></a>
    <button class="mdc-button mdc-button--raised" ng-click="save_pesquisa1()" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
    <!-- <button class="btn fechar"><a href="<?php echo base_url()?>pesquisas" class="">Fechar</a></button>
    <button class="btn salvar" ng-click="save_pesquisa1()" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvar">Salvar</button> -->
   
</div>
<div class="clearfix"></div>

</div>

</div>
</form>