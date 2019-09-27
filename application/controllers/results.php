<!-- OKR's -->
<div class="resultsView" ng-controller="resultsCtrl" >
    <h2 class="new_heading_dv">
        Resultados e Calibração
        </span>
    </h2>

    <div class="section1 add_new_function survey_report okr_menus">
            <div class="form_add">
                <div class="form_add add_new_function_title pdlr-0 style2">
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>{{ 'OKRS.FILTER_BY' | translate }}</h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form_add" id = "div-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="filter_form_view view_dsds">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Responsável</label>
                                        <span class="all-selector">
                                    <div class="container-block">
                                          <input type="checkbox" id="chekd6" ng-model="allusers">
                                          <label for="chekd6">Todos Responsáveis</label>
                                        </div>
                                    </span>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-user" name="usuario[]" class="usuario" data-placeholder="Selecione um Usuário" ng-model="selectedUser" multiple="multiple">
                                                <option ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <label>Tags: </label>
                                        <span class="all-selector">
                                    <div class="container-block">
                                          <input type="checkbox" id="chekd_tags" ng-model="alltags">
                                          <label for="chekd_tags">Todas Tags</label>
                                        </div>
                                    </span>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="selectd_tags" name="selectd_tags[]" multiple="multiple" data-placeholder="Escolha Tag" ng-model="selectd_tags">
                                                <option ng-repeat="tag in teamTags" value="{{tag.id}}">{{tag.name}}</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Time</label>
                                        <span class="all-selector">
                                            <div class="container-block">
                                                  <input type="checkbox" id="chekd7" ng-model="allteams">
                                                  <label for="chekd7">{{ 'OKRS.ALL_TEAMS' | translate }}</label>
                                                </div>
                                        </span>
                                        <div class="clearfix"></div>
                                        <div class="filters_view">
                                            <select id="search-team" name="time" class=""  ng-model="selectedTeam" multiple="multiple">
                                                <option ng-repeat="team in teams" value="{{team.id}}" ng-selected="selectedTeam == team.id">{{team.name}}</option>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div class="col-sm-4">
                                        <label>Ciclos</label>
                                        <div class="filters_view">
                                            <select id="search-cycle" name="cycle" class=""  ng-model="selectedCycles" multiple="multiple">
                                                <option ng-repeat="cycle in cycles" value="{{cycle.id_revisao_ciclo}}" ng-selected="selectedCycle == cycle.id">{{cycle.nome_ciclo}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="clr_filters">
                                            <a href="javascript:void(0)" class="clean_filter" ng-click="reset()">Limpar Filtros</a>
                                            <form id="form-export-csv" method="post" action="<?php echo base_url('csvDownloadRevisaoCicloStore')?>" style="display: inline;">
                                                
                                                <input type="hidden" name="teams" ng-value="getTeamsIdListString()"/>

                                                <a class="clean_filter" onclick="$('#form-export-csv').submit()" href="javascript:void(0)">Exportar CSV</a>
                                            </form>
                                            <a href="javascript:void(0)" class="clean_filter" ng-click="listTable()">Recarregar <i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>

                                 </div>
                            </div>

                        </div>
                    </div>
            </div>

    </div>
    <div class="clearfix"></div>

    <div class="main_box_show_dv dv-box visibility_options">
        <div class="col-sm-3">
            <h4>Visibilidade da tabela</h4>
        </div>
        <div class="col-sm-9">
            <label class="value-label" for="autoVisibility">
                <div class="container-block">
                    <input type="checkbox" id="autoVisibility" name="autoVisibility" value="1" ng-model="auto_visible" ng-true-value="1" ng-false-value="0" ng-init="auto_visible = 0">
                    <label for="autoVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Auto Avaliações
            </label>
            <label class="value-label" for="gestorVisibility">
                <div class="container-block">
                    <input type="checkbox" id="gestorVisibility" name="gestorVisibility" value="1" ng-model="gestor_visible" ng-true-value="1" ng-false-value="0" ng-init="gestor_visible = 0">
                    <label for="gestorVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Gestor
            </label>
            <label class="value-label" for="paresVisibility">
                <div class="container-block">
                    <input type="checkbox" id="paresVisibility" name="paresVisibility" value="1" ng-model="pares_visible" ng-true-value="1" ng-false-value="0" ng-init="pares_visible = 0">
                    <label for="paresVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Pares
            </label>
            <label class="value-label" for="equipeVisibility">
                <div class="container-block">
                    <input type="checkbox" id="equipeVisibility" name="equipeVisibility" value="1" ng-model="equipe_visible" ng-true-value="1" ng-false-value="0" ng-init="equipe_visible = 0">
                    <label for="equipeVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Equipe
            </label>
            <label class="value-label" for="valoresVisibility">
                <div class="container-block">
                    <input type="checkbox" id="valoresVisibility" name="valoresVisibility" value="1" ng-model="valores_visible" ng-true-value="1" ng-false-value="0" ng-init="valores_visible = 0">
                    <label for="valoresVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Valores
            </label>
            <label class="value-label" for="resultsVisibility">
                <div class="container-block">
                    <input type="checkbox" id="resultsVisibility" name="resultsVisibility" value="1" ng-model="results_visible" ng-true-value="1" ng-false-value="0" ng-init="results_visible = 0">
                    <label for="resultsVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Resultados
            </label>
            <label class="value-label" for="competenciasVisibility">
                <div class="container-block">
                    <input type="checkbox" id="competenciasVisibility" name="competenciasVisibility" value="1" ng-model="competencias_visible" ng-true-value="1" ng-false-value="0" ng-init="competencias_visible = 0">
                    <label for="competenciasVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Competências
            </label>
            <label class="value-label" for="potencialVisibility">
                <div class="container-block">
                    <input type="checkbox" id="potencialVisibility" name="potencialVisibility" value="1" ng-model="potencial_visible" ng-true-value="1" ng-false-value="0" ng-init="potencial_visible = 0">
                    <label for="potencialVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Potencial
            </label>
            <label class="value-label" for="surveyVisibility">
                <div class="container-block">
                    <input type="checkbox" id="surveyVisibility" name="surveyVisibility" value="1" ng-model="survey_visible" ng-true-value="1" ng-false-value="0" ng-init="survey_visible = 0">
                    <label for="surveyVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Pesquisa
            </label>
       <!--     <label class="value-label" for="averageVisibility">
                <div class="container-block">
                    <input type="checkbox" id="averageVisibility" name="averageVisibility" value="1" ng-model="average_visible" ng-true-value="1" ng-false-value="0" ng-init="average_visible = 1">
                    <label for="averageVisibility" style="padding-left: 0">&nbsp;</label>
                </div> Médias
            </label> -->
            <label class="value-label" for="nineboxVisibility">
                <div class="container-block">
                    <input type="checkbox" id="nineboxVisibility" name="nineboxVisibility" value="1" ng-model="ninebox_visible" ng-true-value="1" ng-false-value="0" ng-init="ninebox_visible = 0">
                    <label for="nineboxVisibility" style="padding-left: 0">&nbsp;</label>
                </div> NineBox
            </label>

        </div>
    </div>
        <div class="clearfix"></div>

    <div class="main_box_show_dv dv-box">
        <div class="DV_table_view_elofy cli">
            <div class="table-responsive content horizontal-images">

            <!-- <pre>{{results | json}}</pre> -->
    
            <!-- <hr> -->
            <table class="table table-bordered">
                <tr>
                    <colgroup span="4"></colgroup>
                    <colgroup ng-if="gestor_visible" span="{{ 6 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) - ((average_visible)?0:1) }}"></colgroup>
                    <colgroup ng-if="pares_visible" span="{{ 6 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) - ((average_visible)?0:1) }}"></colgroup>
                    <colgroup ng-if="equipe_visible" span="{{ 6 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) - ((average_visible)?0:1) }}"></colgroup>
                    <colgroup ng-if="auto_visible" span="{{ 5 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) }}"></colgroup>
                    <colgroup span="1"></colgroup>
                    <colgroup span="{{2 - ((ninebox_visible)?0:1) }}"></colgroup>

                    <th colspan="4">
                    <th class="father gestor" ng-if="gestor_visible && (valores_visible || results_visible || competencias_visible || potencial_visible || survey_visible || average_visible)" colspan="{{ 6 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) - ((average_visible)?0:1) }}" scope="colgroup">GESTOR</th>
                    <th class="father pares" ng-if="pares_visible && (valores_visible || results_visible || competencias_visible || potencial_visible || survey_visible || average_visible)" colspan="{{ 6 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) - ((average_visible)?0:1) }}" scope="colgroup">PARES</th>
                    <th class="father equipe" ng-if="equipe_visible && (valores_visible || results_visible || competencias_visible || potencial_visible || survey_visible || average_visible)" colspan="{{ 6 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) - ((average_visible)?0:1) }}" scope="colgroup">EQUIPE</th>
                    <th class="father autoavaliacao" ng-if="auto_visible && (valores_visible || results_visible || competencias_visible || potencial_visible || survey_visible)" colspan="{{ 5 - ((valores_visible)?0:1) - ((results_visible)?0:1) - ((competencias_visible)?0:1)- ((potencial_visible)?0:1) - ((survey_visible)?0:1) }}" scope="colgroup">AUTOAVALIAÇÃO</th>
                    <th class="father gestorpares" colspan="1" scope="colgroup">RESULTADO</th>
                    <th colspan="{{2 - ((ninebox_visible)?0:1) }}">
                </tr>
                <tr>
                    <!-- sem pai -->
                    <th style="min-width:150px">Nome</th>
                    <th style="min-width:150px">Gestor</th>
                    <th>Time</th>
                    <th style="min-width:150px">Tempo de Empresa</th>

                    <!-- pai GESTOR -->
                    <th class="gestor father" style="min-width:100px"   ng-if="valores_visible && gestor_visible" scope="col">Valores</th>
                    <th class="gestor father"                           ng-if="results_visible && gestor_visible" scope="col">Resultados</th>
                    <th class="gestor father" style="min-width:100px"   ng-if="competencias_visible && gestor_visible" scope="col">Competências</th>
                    <th class="gestor father"                           ng-if="potencial_visible && gestor_visible" scope="col">Potencial</th>
                    <th class="gestor father"                           ng-if="survey_visible && gestor_visible" scope="col">Pesquisa</th>
                  <!--  <th class="gestor father"                           ng-if="average_visible && gestor_visible" scope="col">Média</th> -->

                    <!-- pai PARES -->
                    <th class="pares father" ng-if="valores_visible && pares_visible" scope="col">Valores</th>
                    <th class="pares father" ng-if="results_visible && pares_visible" scope="col">Resultados</th>
                    <th class="pares father" ng-if="competencias_visible && pares_visible" scope="col">Competências</th>
                    <th class="pares father" ng-if="potencial_visible && pares_visible" scope="col">Potencial</th>
                    <th class="pares father" ng-if="survey_visible && pares_visible" scope="col">Pesquisa</th>
                 <!--   <th class="pares father" ng-if="average_visible && pares_visible" scope="col">Média</th> -->

                    <!-- pai EQUIPES -->
                    <th class="equipe father" ng-if="valores_visible && equipe_visible" scope="col">Valores</th>
                    <th class="equipe father" ng-if="results_visible && equipe_visible" scope="col">Resultados</th>
                    <th class="equipe father" ng-if="competencias_visible && equipe_visible" scope="col">Competências</th>
                    <th class="equipe father" ng-if="potencial_visible && equipe_visible" scope="col">Potencial</th>
                    <th class="equipe father" ng-if="survey_visible && equipe_visible" scope="col">Pesquisa</th>
                <!--    <th class="equipe father" ng-if="average_visible && equipe_visible" scope="col">Média</th> -->

                    <!-- pai AUTOAVALIACAO -->
                    
                    <th class="autoavaliacao father" ng-if="valores_visible && auto_visible" scope="col">Valores</th>
                    <th class="autoavaliacao father" ng-if="results_visible && auto_visible" scope="col">Resultados</th>
                    <th class="autoavaliacao father" ng-if="competencias_visible && auto_visible" scope="col">Competências</th>
                    <th class="autoavaliacao father" ng-if="potencial_visible && auto_visible" scope="col">Potencial</th>
                    <th class="autoavaliacao father" ng-if="survey_visible && auto_visible" scope="col">Pesquisa</th>


                    <!-- pai GESTOR + PARES -->
                    <th class="gestorpares father" style="min-width:150px" scope="col">Nota Final</th>

                    <!-- sem pai -->
                    <th ng-if="ninebox_visible" style="min-width:125px" scope="col">Nine Box</th>
                    <th style="min-width:325px" scope="col">Sugestão Plano de Açao</th>

                </tr>
                <tr ng-repeat="result in results | filter : filterUser | filter : filterTeam | filter : filterCycle" on-complete="restartSelectFromSuggestion()" >

                    <!-- sem pai -->
                    <td>{{result.nome_usuario}}</td>
                    <td>{{result.nome_gestor}}</td>
                    <td>{{result.nome_time}}</td>
                    <td ng-if="result.tempo_empresa < 1">menos de 1 mês</td>
                    <td ng-if="result.tempo_empresa == 1">{{result.tempo_empresa}} mês</td>
                    <td ng-if="result.tempo_empresa > 1 && result.tempo_empresa < 12">{{result.tempo_empresa}} meses</td>
                    <td ng-if="result.tempo_empresa == 12">1 ano</td>
                    <td ng-if="result.tempo_empresa > 12">{{result.tempo_empresa/12 | number:2}} anos</td>


                    <!-- pai GESTOR -->
                    <td class="gestor calibrate" ng-class="{ 'calibrated' : result.valores_gestor_calibrado }" ng-click="openSidebar(result, 'valores')" ng-if="valores_visible && gestor_visible">{{ result.valores_gestor_calibrado?result.valores_gestor_calibrado:result.valores_gestor}}<i class="fa fa-wrench"></i></td>
                    <td class="gestor calibrate" ng-class="{ 'calibrated' : result.resultados_gestor_calibrado }" ng-if="results_visible && gestor_visible" ng-click="openSidebar(result, 'resultados')" >{{result.resultados_gestor_calibrado?result.resultados_gestor_calibrado:result.resultados_gestor  }}<i class="fa fa-wrench"></i></td>
                    <td class="gestor calibrate" ng-class="{ 'calibrated' : result.competencias_gestor_calibrado }" ng-click="openSidebar(result, 'competencias')" ng-if="competencias_visible && gestor_visible">{{result.competencias_gestor_calibrado?result.competencias_gestor_calibrado:result.competencias_gestor}}<i class="fa fa-wrench"></i></td>
                    <td class="gestor" ng-if="potencial_visible && gestor_visible">{{result.potencial_gestor}}</td>
                    <td class="gestor" ng-if="survey_visible && gestor_visible">{{result.survey_gestor}}</td>
                    <td class="gestor" ng-if="average_visible && gestor_visible">{{
                        (
                            ((result.valores_gestor_calibrado || result.valores_gestor )?
                                (Number(result.valores_gestor_calibrado?result.valores_gestor_calibrado:result.valores_gestor)):0) + 

                            Number(result.resultados_gestor?result.resultados_gestor:0) +

                            ((result.competencias_gestor_calibrado || result.competencias_gestor )?
                                (Number(result.competencias_gestor_calibrado?result.competencias_gestor_calibrado:result.competencias_gestor)):0) +

                            Number(result.potencial_gestor?result.potencial_gestor:0) +
                            Number(result.survey_gestor?result.survey_gestor:0)
                            )

                            / (5 

                            - ((testIfUndefinedOrNullOrZero(result.valores_gestor_calibrado) && testIfUndefinedOrNullOrZero(result.valores_gestor) )?1:0)
                            - (testIfUndefinedOrNullOrZero(result.resultados_gestor)?1:0)
                            - ((testIfUndefinedOrNullOrZero(result.competencias_gestor_calibrado) && testIfUndefinedOrNullOrZero(result.competencias_gestor) )?1:0)
                            - (testIfUndefinedOrNullOrZero(result.potencial_gestor)?1:0)
                            - (testIfUndefinedOrNullOrZero(result.survey_gestor)?1:0)

                            ) | number:2

                    }}</td>

                    <!-- pai PARES -->
                    <td class="pares" ng-if="valores_visible && pares_visible">{{result.valores_par}}</td>
                    <td class="pares" ng-if="results_visible && pares_visible">{{result.resultados_par}}</td>
                    <td class="pares" ng-if="competencias_visible && pares_visible">{{result.competencias_par}}</td>
                    <td class="pares" ng-if="potencial_visible && pares_visible">{{result.potencial_par}}</td>
                    <td class="pares" ng-if="survey_visible && pares_visible">{{result.survey_par}}</td>
                    <td class="pares" ng-if="average_visible && pares_visible">{{
                        (
                            ((result.valores_par_calibrado || result.valores_par )?
                                (Number(result.valores_par_calibrado?result.valores_par_calibrado:result.valores_par)):0) + 

                            Number(result.resultados_par?result.resultados_par:0) +

                            ((result.competencias_par_calibrado || result.competencias_par )?
                                (Number(result.competencias_par_calibrado?result.competencias_par_calibrado:result.competencias_par)):0) +

                            Number(result.potencial_par?result.potencial_par:0) +
                            Number(result.survey_par?result.survey_par:0)
                            )

                            / (5 

                            - ((testIfUndefinedOrNullOrZero(result.valores_par_calibrado) && testIfUndefinedOrNullOrZero(result.valores_par) )?1:0)
                            - (testIfUndefinedOrNullOrZero(result.resultados_par)?1:0)
                            - ((testIfUndefinedOrNullOrZero(result.competencias_par_calibrado) && testIfUndefinedOrNullOrZero(result.competencias_par) )?1:0)
                            - (testIfUndefinedOrNullOrZero(result.potencial_par)?1:0)
                            - (testIfUndefinedOrNullOrZero(result.survey_par)?1:0)

                            ) | number:2

                    }}</td>



                    <!-- pai EQUIPES -->
                    <td class="equipe" ng-if="valores_visible && equipe_visible">{{result.valores_equipe}}</td>
                    <td class="equipe" ng-if="results_visible && equipe_visible">{{result.resultados_equipe}}</td>
                    <td class="equipe" ng-if="competencias_visible && equipe_visible">{{result.competencias_equipe}}</td>
                    <td class="equipe" ng-if="potencial_visible && equipe_visible">{{result.potencial_equipe}}</td>
                    <td class="equipe" ng-if="survey_visible && equipe_visible">{{result.survey_equipe}}</td>
                    <td class="equipe" ng-if="average_visible && equipe_visible">{{
                        (
                            ((result.valores_equipe_calibrado || result.valores_equipe )?
                                (Number(result.valores_equipe_calibrado?result.valores_equipe_calibrado:result.valores_equipe)):0) + 

                            Number(result.resultados_equipe?result.resultados_equipe:0) +

                            ((result.competencias_equipe_calibrado || result.competencias_equipe )?
                                (Number(result.competencias_equipe_calibrado?result.competencias_equipe_calibrado:result.competencias_equipe)):0) +

                            Number(result.potencial_equipe?result.potencial_equipe:0) +
                            Number(result.survey_equipe?result.survey_equipe:0)
                            )

                            / (5 

                            - ((testIfUndefinedOrNullOrZero(result.valores_equipe_calibrado) && testIfUndefinedOrNullOrZero(result.valores_equipe) )?1:0)
                            - (testIfUndefinedOrNullOrZero(result.resultados_equipe)?1:0)
                            - ((testIfUndefinedOrNullOrZero(result.competencias_equipe_calibrado) && testIfUndefinedOrNullOrZero(result.competencias_equipe) )?1:0)
                            - (testIfUndefinedOrNullOrZero(result.potencial_equipe)?1:0)
                            - (testIfUndefinedOrNullOrZero(result.survey_equipe)?1:0)

                            ) | number:2

                    }}</td>



                    <!-- pai AUTO -->
                    <td class="autoavaliacao" ng-if="valores_visible && auto_visible">{{result.valores_auto}}</td>
                    <td class="autoavaliacao" ng-if="results_visible && auto_visible">{{result.resultados_auto}}</td>
                    <td class="autoavaliacao" ng-if="competencias_visible && auto_visible">{{result.competencias_auto}}</td>
                    <td class="autoavaliacao" ng-if="potencial_visible && auto_visible">{{result.potencial_auto}}</td>
                    <td class="autoavaliacao" ng-if="survey_visible && auto_visible">{{result.survey_auto}}</td>

                    <!-- pai GESTOR + PARES -->
                    <td class="gestorpares">{{ result.media_final }}</td>

                    <!-- sem pai -->
                    <td ng-if="ninebox_visible">
                        {{result.nine_box_label}}
                    </td>
                    <td>
                        <select style="width:65%; display:inline-block !important" class="suggestion" data-placeholder="Escolher Sugestão" multiple="multiple" ng-model="result.suggestionModel">
                            <option value="1">Promoção</option>
                            <option value="2">Mérito</option>
                            <option value="3">PDI para entrega</option>
                            <option value="4">Indicação de desligamento</option>
                            <option value="5">PDI para comportamento</option>
                        </select>
                        <button style="width:20%" type="button" ng-click="saveSuggestion(result)" class="btn btn-success sidebar-save" ng-disabled="!result.suggestionModel || result.suggestionModel.length == 0">Salvar</button>
                        <button style="width:10%"  type="button" data-genpdf = "{{result}}" onClick="generatePDF()" class="btn btn-success sidebar-save gen_pdf">PDF</button>
                    </td>


                </tr>
            </table>
<!-- <pre>{{ selectedSingleScores | json }}</pre> -->
            <div id="calibrateTip">Calibrar</div>

            <!--- Sidebar Menu Section Starts ---->
            <div class="sidebar {{selectedType}}" ng-class="openSideBarMenu?'sidemenu-section-open-menu':'sidemenu-section-closed-menu'">
                <form id="cycle_config_modal_form">
                    <div class="close-sec" ng-click="closeSidebar()">
                        <figure class="close-icon">
                            <img src="<?php echo base_url()?>assets/portal/img/close.png" alt="close"/>
                        </figure>
                    </div>
                    <div class="inner-section">
                        <div class="first-box"><h2>Calibração</h2></div>
                        <div class="bottom-border">
                            <div class="reivew">
                                <span class="views">Média Original</span>
                                <span class="views-number">{{currentSelectedOriginalAverage | number:'2'}}</span>
                            </div>
                            <div class="reivew">
                                <span class="views">Média Calibrada</span>
                                <span class="views-number">{{ (calibratedSelectedAverage != 0)? (calibratedSelectedAverage | number:'2'):'n/d'}}</span>
                            </div> 
                            <div class="reivew">
                                <button type="button" ng-click="calibrateGrades((calibratedSelectedAverage | number:'2'))" class="btn btn-success sidebar-save" ng-disabled="calibratedSelectedAverage == 0">Salvar Calibração</button>
                            </div>

                        </div>
                        <div ng-if="selectedSingleScores.length == 0"><div class="first-box">
                            Não foi possível buscar as notas a serem calibradas
                        </div></div>
                        <!-- <pre>{{selectedSingleScores}}</pre> -->
                        <div class="self-review-wrapper">
                            
                                <ul class="singleScoreList">
                                    <li class="singleScoreLine" ng-repeat="selectedSingleScore in selectedSingleScores">
                                        <span>{{ selectedSingleScore.name }} </span>
                                        <span>{{ selectedSingleScore.score }}</span>
                                        <span><input type="text" ng-change="recalculateAverages(selectedSingleScore.calibratedScoreModel)" ng-model="selectedSingleScore.calibratedScoreModelTemp" ng-value="selectedSingleScore.score_calibrado"></span>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </form>

            </div>
            <!--- Sidebar Menu Section Ends ---->



            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="well box" ng-show="filtered.length==0">
        <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
    </div>



<script type="text/javascript">
    function generatePDF() {
        var data = $(".gen_pdf").data("genpdf");
        $.post(baseurl + 'generatePdf' , {
            data : data
        },function (data, success) {
            console.log("ah", data);
            // data = JSON.stringify(data);
            console.log("oh", data);
            // location.href = '<?php echo base_url() ?>' + 'pdfGen/' + data;
        });
    }
</script>