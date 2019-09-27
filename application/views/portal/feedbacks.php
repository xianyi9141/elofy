<!-- OKR's -->
<div class="feedbacksView" ng-controller="feedbacksCtrl" >
    <h2 class="page-title" style="margin-top: 10px;">
        Feedbacks
    </h2>
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
                <div class="row"  style="padding-top: 20px;">
                        <div class="col-sm-12">
                            <div class="filter_form_view view_dsds">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Tipo de Ação</label>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-acao" name="acao" class="" ng-change="onChangeAcaoSelect()" ng-model="selectedAcao">
                                                <option ng-repeat="acao in acaos | filter : {added : '!'}" value="{{acao.id}}">{{acao.name}}</option>
                                            </select>
                                            <span class="select-single-multiple-tag" ng-repeat="selected in acaos | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <label>Usuário remetente</label>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-user-remetente" name="usuario_remetente[]" class="usuario" data-placeholder="Selecione um Usuário" ng-model="selectedUserRemetente" ng-change="onChangeUserRemetenteSelect()">
                                                <option ng-repeat="user in usersRemetente | filter : {added : '!'}" value="{{user.id}}">{{user.name}}</option>
                                            </select>
                                            <span class="select-single-multiple-tag" ng-repeat="selected in usersRemetente | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label>Time do remetente</label>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-team-remetente" name="time_remetente" class="" ng-change="onChangeTeamRemetenteSelect()" ng-model="selectedRemetenteTeam">
                                                <option ng-repeat="team in remetenteTeams | filter : {added : '!'}" value="{{team.id}}">{{team.name}}</option>
                                            </select>
                                            <span class="select-single-multiple-tag" ng-repeat="selected in remetenteTeams | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div>
                            
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div class="col-sm-4">
                                        <label>Tipo de Feedback</label>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-tipofeedback" name="tipo" class="" ng-change="onChangeTipoSelect()" ng-model="selectedTipo">
                                                <option ng-repeat="tipo in tipos_feedback | filter : {added : '!'}" value="{{tipo.id}}">{{tipo.name}}</option>
                                            </select>
                                            <span class="select-single-multiple-tag" ng-repeat="selected in tipos_feedback | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Usuário destinatário</label>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-user" name="usuario[]" class="usuario" data-placeholder="Selecione um Usuário" ng-model="selectedUser" ng-change="onChangeUserSelect()">
                                                <option ng-repeat="user in users | filter : {added : '!'}" value="{{user.id}}">{{user.name}}</option>
                                            </select>
                                            <span class="select-single-multiple-tag" ng-repeat="selected in users | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Time do destinatário</label>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-team" name="time" class="" ng-change="onChangeTeamSelect()" ng-model="selectedTeam">
                                                <option ng-repeat="team in accordingTeams | filter : {added : '!'}" value="{{team.id}}">{{team.name}}</option>
                                            </select>
                                            <span class="select-single-multiple-tag" ng-repeat="selected in accordingTeams | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div>
                                 </div>
                                 <div style="margin-top:10px;" class="row">
                                    <div class="col-sm-2 ">
                                        <label class="input-label" for="data_ini">Data inicial</label>
                                        <div class="filters_view">
                                            <input id="data_ini" name="data_ini" type="text" class="form-control" value="" ng-model="data_ini" required placeholder="De">
                                            <div class="input-group-addon hide"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 ">
                                        <label class="input-label" for="data_fim">Data final</label>
                                        <div class="filters_view">
                                            <input id="data_fim" name="data_fim" type="text" class="form-control" value="{{data_fim}}" ng-model="data_fim" required placeholder="Ate">
                                            <div class="input-group-addon hide"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <div class="checkbox abs-checkbox" style="margin-top: 35px;">
                                                <input type="checkbox" id="semretorno" value="1" name="semretorno" class="styled-checkbox" ng-model="filtroSemRetorno">
                                                <label for="semretorno">Exibir apenas sem retorno</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="clr_filters">
                                                <!--JEFERSON-->
                                                <button class="mdc-button mdc-button--outlined mdc-fechar mdc-alinha-baixo" ng-click="submitCsv()">
                                                    <i class="material-icons mdc-button__icon">import_export</i>
                                                    <span class="mdc-button__label"> Exportar CSV</span>
                                                </button>
 
                                                 <a mat-raised-button href="javascript:void(0)" class="mdc-button mdc-alinha-baixo" ng-click="reset()">Limpar Filtros</a>
                                                 <button type="submit" class="mdc-button mdc-button--raised" ng-click="applyFilter()">Aplicar Filtro</button>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
            
            </div>
            <div class="filter_form_view">
                <div class="col-sm-12">
                    <form id="form-export-csv" method="post" action="<?php echo base_url('csvDownloadFeedbacks')?>" style="display: inline;">
                        <input type="hidden" name="teams" ng-value="getIdListString(teamsIdList)"/>
                        <input type="hidden" name="teamsRemetente" ng-value="getIdListString(teamsRemetenteIdList)"/>
                        <input type="hidden" name="users" ng-value="getIdListString(usersIdList)"/>
                        <input type="hidden" name="usersRemetente" ng-value="getIdListString(usersRemetenteIdList)"/>
                        <input type="hidden" name="tipos_feedbacks" ng-value="getIdListString(tiposIdList)"/>
                        <input type="hidden" name="acaos" ng-value="getIdListString(acaosIdList)"/>
                        <input type="hidden" name="ini_date" ng-value="data_ini"/>
                        <input type="hidden" name="end_date" ng-value="data_fim"/>
                        <input type="hidden" name="filtroSemRetorno" ng-value="filtroSemRetorno"/>
                        <div class="right text-right pull-right" style="display:inline;margin-left:10px;">
                            <div class="dropdown" style="display:inline-block;" id="viewmorecolumn">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" ng-click="viewsColumsFilter()">Adicionar Colunas
                                <span class="caret"></span></button>  
                                <ul class="dropdown-menu pull-right padd-10" id="section_filter_box" >
                                    <?php
                                    $main_columns = unserialize(FeedbacksColums);
                                    foreach ($main_columns as $key => $value) {
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
                        
                        <div class="custom_radio custom_radio_sidebyside" style="float: right;margin-top: 7px;" ng-init="display_type = 0">
                            <div class="radio_dv">
                                <input type="radio" id="display_type0" ng-model="display_type" class="ng-pristine ng-untouched ng-valid valid ng-empty public_mode" aria-required="true" ng-checked="display_type==0" name="display_type" value="0">
                                <label for="display_type0">Lista</label>
                            </div>
                            <div class="radio_dv">
                                <input type="radio" id="display_type1" ng-checked="display_type==1" ng-model="display_type" class="ng-pristine ng-untouched ng-valid valid ng-empty" name="display_type" value="1">
                                <label for="display_type1">Gráficos</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="main_box_show_dv dv-box visibility_options">
                <div class="col-sm-3">
                    <h4>Visibilidade da tabela</h4>
                </div>
                <div class="col-sm-9">
                    <label class="value-label" for="prazoVisibility">
                        <div class="container-block">
                            <input type="checkbox" id="prazoVisibility" name="prazoVisibility" value="1" ng-model="prazo_visible" ng-true-value="1" ng-false-value="0" ng-init="prazo_visible = 0">
                            <label for="prazoVisibility" style="padding-left: 0">&nbsp;</label>
                        </div> Prazo
                    </label>
                    <label class="value-label" for="timeRVisibility">
                        <div class="container-block">
                            <input type="checkbox" id="timeRVisibility" name="timeRVisibility" value="1" ng-model="time_r_visible" ng-true-value="1" ng-false-value="0" ng-init="time_r_visible = 0">
                            <label for="timeRVisibility" style="padding-left: 0">&nbsp;</label>
                        </div>  Time De Remetente
                    </label>
                    <label class="value-label" for="timeDVisibility">
                        <div class="container-block">
                            <input type="checkbox" id="timeDVisibility" name="timeDVisibility" value="1" ng-model="time_d_visible" ng-true-value="1" ng-false-value="0" ng-init="time_d_visible = 0">
                            <label for="timeDVisibility" style="padding-left: 0">&nbsp;</label>
                        </div>  Time De Destinatário
                    </label>
                    <label class="value-label" for="solVisibility">
                        <div class="container-block">
                            <input type="checkbox" id="solVisibility" name="solVisibility" value="1" ng-model="sol_visible" ng-true-value="1" ng-false-value="0" ng-init="sol_visible = 0">
                            <label for="solVisibility" style="padding-left: 0">&nbsp;</label>
                        </div>  Solicitação
                    </label>
                    <label class="value-label" for="tipoVisibility">
                        <div class="container-block">
                            <input type="checkbox" id="tipoVisibility" name="tipoVisibility" value="1" ng-model="tipo_visible" ng-true-value="1" ng-false-value="0" ng-init="tipo_visible = 0">
                            <label for="tipoVisibility" style="padding-left: 0">&nbsp;</label>
                        </div> Tipo
                    </label>
                    <label class="value-label" for="valoreVisibility">
                        <div class="container-block">
                            <input type="checkbox" id="valoreVisibility" name="valoreVisibility" value="1" ng-model="valore_visible" ng-true-value="1" ng-false-value="0" ng-init="valore_visible = 0">
                            <label for="valoreVisibility" style="padding-left: 0">&nbsp;</label>
                        </div>  Valores
                    </label>
                </div>
            </div> -->
            <div class="form_add" ng-show="display_type == 0">

                    <div ng-show="results.length > 0" class="main_box_show_dv dv-box" style="margin-left: -20px; margin-right: -20px;border:none;">
                        <div class="DV_table_view_elofy cli">
                            <div class="table-responsive content horizontal-images" id="tbl_feedbacks">

                            <!-- <pre>{{results | json}}</pre> -->
                            <!-- <hr> -->
                            <table class="table table-bordered">
                                <tr class="">
                                    <!-- sem pai -->
                                    <th style="width:90px">Data</th>
                                    <th ng-if="prazo_visible" style="width:90px">Prazo</th>
                                    <th>Ação</th>
                                    <th ng-if="time_r_visible">Time De Remetente</th>
                                    <th ng-if="time_d_visible">Time De Destinatário</th>
                                    <th>Remetente</th>
                                    <th>Destinatário</th>
                                    <!-- <th ng-if="solicit_visible">Nome De Solicitante</th> -->
                                    <th style="min-width:250px; max-width:300px" ng-if="sol_visible">Solicitação</th>
                                    <th style="min-width:350px; max-width:500px">Feedback</th>
                                    <th ng-if="tipo_visible">Tipo</th>
                                    <th ng-if="valore_visible">Valores</th>

                                </tr>
                                <tr ng-repeat="result in results" ng-class="{ red : isDateBeforeToday(result.prazo) && (!result.resposta || result.resposta == '')}">
                                <!-- <tr ng-repeat="result in results | filter : filterUser | filter : filterTeam | filter : filterDate | filter : filterTipo" > -->

                                    <!-- sem pai -->
                                    <td style="width:90px">{{showDatePt(result.data_atualizacao)}}</td>
                                    <td ng-if="prazo_visible"  style="width:90px">{{showDatePt(result.prazo)}}</td>
                                    <td><span ng-if="result.acao == '1'">Enviado</span><span ng-if="result.acao == '2'">Solicitado</span><span ng-if="result.acao == '3'">Anotação Privada</span></td>
                                    <td ng-if="time_r_visible">{{result.nome_time_remetente}}</td>
                                    <td ng-if="time_d_visible">{{result.nome_time_destinatario}}</td>
                                    <td>{{result.nome_usuario_remetente}}</td>
                                    <td>{{result.nome_usuario_destinatario}}</td>
                                    <!-- <td ng-if="solicit_visible">{{result.nome_usuario_solicitante}}</td> -->
                                    <td style="min-width:250px; max-width:300px; word-break: break-word;" ng-if="sol_visible">{{result.solicitacao}}</td>
                                    <td style="min-width:350px; max-width:500px; word-break: break-word;">{{result.resposta}}</td>
                                    <td ng-if="tipo_visible"><span ng-if="result.tipo_feedback == 'r'">Reconhecimento</span><span ng-if="result.tipo_feedback == 'm'">Oportunidade de Melhoria</span></td>
                                    <td ng-if="valore_visible" ng-bind-html="pipesToList(result.valores)"></td>




                                </tr>
                            </table>

                            </div>
                        </div>
                    </div>
                

                    <div class="well box" ng-show="results.length==0">
                        <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
                    </div>
            </div>

            <div class="form_add chart" ng-show="display_type == 1 && chartData" style="border:1px solid #dadce0;border-radius: 5px;margin-top: 12px;">
                <h4 class="page-title" style="font-weight: bold;">
                    Feedback Analytics
                </h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary box">
                            <div class="panel-heading">
                                <div class="chart_title">Solicitados x enviados</div>
                                <div class="chart_label">Ranking por time</div>
                            </div>
                            <div style="height: 250px;">
                                <canvas id="feedback_soli_chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary box">
                            <div class="panel-heading">
                                <div class="chart_title">Tipos de feedback</div>
                                <div class="chart_label">Ranking por time</div>
                            </div>
                            <div style="height: 250px;">
                                <canvas id="feedback_tipo_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary box">
                            <div class="panel-heading">
                                <div class="chart_title">Feedbacks por Time</div>
                                <div class="chart_label">Ranking por time</div>
                            </div>
                            <div style="height: 250px;">
                                <canvas id="feedback_time_chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary box">
                            <div class="panel-heading">
                                <div class="chart_title">Direcionamento do Gestor</div>
                                <div class="chart_label">Ranking por time</div>
                            </div>
                            <div style="height: 250px;">
                                <canvas id="feedback_gestor_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary box">
                            <div class="panel-heading">
                                <div class="chart_title">Média dos valores</div>
                                <div class="chart_label">Comparativo de times</div>
                            </div>
                            <div style="height: 250px;">
                                <canvas id="feedback_valores_chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary box">
                            <div class="panel-heading">
                                <div class="chart_title">Fit cultural da área</div>
                                <div class="chart_label">Ranking de valores por área</div>
                            </div>
                            <div style="height: 250px;">
                                <canvas id="feedback_area_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_add" ng-show="display_type == 1">
                <div class="well box" ng-show="!chartData">
                    <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
                </div>
            </div>

    <div class="clearfix"></div>


    <div class="clearfix"></div>
    <div class="well box" ng-show="filtered.length==0">
        <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
    </div>
    </div>

<script type="text/javascript">
    function generatePDF() {
        var data = $(".gen_pdf").data("genpdf");
        data = JSON.stringify(data);
        var strJSON = encodeURIComponent(data);
        location.href = '<?php echo base_url() ?>' + 'pdfGen/' + strJSON;
    }
</script>