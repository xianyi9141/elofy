<style type="text/css">
    .tooltip {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
    }

    i.fa.fa-user-circle-o {
        margin: 0 5px 0 0px;
        color: #000;
    }

    section {
        padding: inherit;
    }


    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        /* Force table to not be like tables anymore */
        .porfile-competencias-panel table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        .porfile-competencias-panel thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        .porfile-competencias-panel tr {
            border: 1px solid #ccc;
        }

        .porfile-competencias-panel td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50% !important;
        }

        .porfile-competencias-panel td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }

        /*
Label the data
*/
        .porfile-competencias-panel td:nth-of-type(1):before {
            content: "-";
        }

        .porfile-competencias-panel td:nth-of-type(2):before {
            content: "Auto-Avaliacao";
        }

        .porfile-competencias-panel td:nth-of-type(3):before {
            content: "Gestor";
        }

        .porfile-competencias-panel td:nth-of-type(4):before {
            content: "Media Final";
        }
    }

    .container {
        margin-left: auto;
        margin-right: auto;
        display: block;
        width: 100%;
        height: 50%;
    }

    competencia_chart {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }

    #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        background: rgba(0, 0, 0, .7);
        color: white;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        pointer-events: none;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }

    #chartjs-radar {
        height: 50%;
        width: 100%;
    }

    .chartjs-tooltip-key {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 10px;
    }

    .finalizado-btn {
        /*margin-top: -20px !important;*/
    }

</style>

<script type="text/javascript">
    angular.element($window).bind("scroll", function(e) {
        alert('scrolled')
    })
    /*
    window.onscroll = function () {
        "use strict";
        if (document.documentElement.scrollTop >= 150) {
            document.getElementById("div-block").classList.add("fixo");
        }else {
            document.getElementById("div-block").classList.remove("fixo");
        }
    }
    */
    /*
    $(window).scroll(function () {
        alert();  
     if (jQuery(this).scrollTop() > 443) {
         jQuery("#div-block").addClass("fixo");
     } else {
         jQuery("#div-block").removeClass("fixo");
     }
    });
    */
</script>

<!-- Perfil -->
<div ng-controller="careerCtrl" class="hide" ng-class="{'hide': !user.id}">
    <!-- <h2 class="new_heading_dv">
        
    </h2> -->
    <div class="main_section">

        <div ng-show="profiletab==5" id="carreertab" ng-init='<?php if (isset($id_user)) echo "getUserId = " . $id_user . ";";
                                                                if (isset($id_cicle)) echo "idCicle = " . $id_cicle ?>'>
            <!-- <div class="row overlay-section" ng-show="getUserId">
            </div> -->
            <div class="row carriar-header" ng-show="!getUserId">
                <div class="col-md-3">
                    <div class="select_usr carriar-header-select" ng-show="!getUserId">
                        <select class="career_users" id="career_users" ng-model="carrer_user_id">
                            <option value="">Escolha um {{ 'UI.USER' | translate }}</option>
                            <option ng-repeat="user in users_combo" value="{{user.id}}">{{user.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- <div class="carriar-header-content-label"><b>Ciclo:&nbsp;&nbsp;&nbsp;</b>{{selectedPerformanceCycleResult.nome_ciclo}}
                    </div> -->
                    <div ng-show="!getUserId" class="select_usr carriar-header-select">
                        <select id="performance-cycle-select" name="performance-cycle" class="" data-placeholder="Trocar Ciclo">
                            <option value="" selected>Escolha um ciclo</option>
                            <option ng-repeat="cycle in allCycles" value="{{cycle.id_revisao_ciclo}}">{{cycle.nome_ciclo}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2" ng-if="selectedPerformanceUser != user.id || (youTimeResult && youTimeResult.length > 0 && youTimeResult[0].situacao == 0) || (youTimeResult && youTimeResult.length > 0 && youTimeResult[0].situacao == 1)">
                    <div class="carriar-header-content-button" style="margin-top: 0px;">
                        <button class="clean_filter" ng-class="{'youtime':youTimeResult && youTimeResult.length > 0 && youTimeResult[0].situacao == 0, 'confirmed-youtime':youTimeResult && youTimeResult.length > 0 && youTimeResult[0].situacao == 1}" style="height: 35px;" ng-click="openYouTime()">You Time</button>
                    </div>
                </div>
                <div class="col-md-3" ng-show="carrerLogedIn == '0'" style="float:right;">
                    <div class="carriar-header-content-button" style="margin-top: 0px;">
                        <!-- <button ng-if="carrerLiberado == 1" style="height: 35px;" class="clean_filter" ng-click="revokeEvalAccess()">Desfazer Liberação</button>
                        <button ng-if="carrerLiberado == 0" style="height: 35px;" class="clean_filter" ng-click="grantEvalAccess()">Liberar</button> -->

                        <button ng-if="carrerLiberado == 1" ng-click="revokeEvalAccess()" class="mdc-button mdc-button--outlined mdc-fechar">
                            <i class="material-icons mdc-button__icon" aria-hidden="true">close</i>
                            <span class="mdc-button__label">Desfazer Liberação</span>
                        </button>
                        <button ng-if="carrerLiberado == 0" ng-click="grantEvalAccess()" type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Liberando">
                            <i class="material-icons mdc-button__icon" aria-hidden="true">check</i>
                            <span class="mdc-button__label">Liberar</span></button>
                    </div>
                </div>
            </div>

            <div class="row carriar-tab-row">
                <div class="col-sm-12">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs " id="myTabs">
                                <!--<li ng-show="!getUserId" ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="refreshCareerBlock()">-->
                                <li ng-show="!getUserId"  ng-init="refreshCareerBlock()" ng-show="resultsFromGestor.length > 0">
                                    <a href="#tab_Performance_time" data-toggle="tab">{{ "CARREIRA.PERFORMANCE_TIME" | translate }}</a>
                                </li>
                                <?php
                                if ($this->session->userdata('performance_pessoal') == 1) { ?>
                                <!--<li class="active" ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="openSubCareerBlock('performance')">-->
                                <li class="active" ng-click="openSubCareerBlock('performance')">
                                    <a href="#tab_Performance" data-toggle="tab">{{ "CARREIRA.PERFORMANCE_PESSOAL" | translate }}</a>
                                </li>
                                <?php } ?>
                                <li ng-show="!getUserId" ng-click="refreshCareerBlock()" class="<?php if ($this->session->userdata('performance_pessoal') != 1) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                    <a href="#tab_Objetivos" data-toggle="tab">{{ "CARREIRA.PDI" | translate }}</a>
                                </li>
                                <?php
                                if ($this->session->userdata('crossfeed') == 1) { ?>
                                <li ng-show="!getUserId" ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="refreshCareerBlock()">
                                    <a href="#tab_Crossfeeds" data-toggle="tab">{{ "CARREIRA.CROSSFEED" | translate }}</a>
                                </li>
                                <?php
                                }
                                ?>
                                <!--  <?php if ($this->session->userdata('activities') == 1) { ?>
                                                <li ng-show="!getUserId" ng-click="refreshCareerBlock()">
                                                    <a href="#tab_Atividades" data-toggle="tab">Contribuições com o negócio</a>
                                                </li>
                                <?php
                                }
                                ?> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row carriar-content-row">
                <div class="col-sm-12">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <div class="tab-content">

                                <div class="tab-pane fade in" id="tab_Performance_time">


                                    <div class="users_tab_list" ng-if="resultsFromGestor.length > 0">
                                        <table style="width:100%" class="table table-bordered">
                                            <tr>
                                                <th>{{ 'UI.USER' | translate }}</th>
                                                <th>Ciclo</th>
                                                <th>Média Final</th>
                                                <th>Acessar Relatório</th>
                                                <th>Liberar Relatório</th>
                                                <th>Youtime</th>
                                            </tr>
                                            <tr ng-repeat="user in resultsFromGestor">
                                                <td>
                                                    <div class="user-specs" style="margin-top: 10px;">
                                                        <div class="user-name">{{user.nome_usuario}}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{user.nome_revisao_ciclo}}
                                                </td>
                                                <td style="width:120px;">
                                                    {{user.media_final}}
                                                </td>
                                                <td style="width:150px;">
                                                    <!-- <button style="margin-top:4px; width:100%;" class="clean_filter" ng-click="viewPerformance(user)">Desempenho</button> -->
                                                    <button ng-click="viewPerformance(user)" class="mdc-button mdc-button--outlined mdc-button--dense mdc-theme--secondary mdc-ripple-surface--accent">
                                                        <i class="material-icons mdc-button__icon" aria-hidden="true">bar_chart</i>
                                                        <span class="mdc-button__label">Desempenho</span>
                                                    </button>
                                                </td>
                                                <td style="width:220px;">
                                                    <!-- <button ng-if="user.lib == 1" style="margin-top:4px; width:100%;" class="clean_filter" ng-click="revokeEvaluationAccess(user)">Desfazer Liberação</button>
                                                    <button ng-if="user.lib == 0" style="margin-top:4px; width:100%;" class="clean_filter" ng-click="grantEvaluationAccess(user)">Liberar</button> -->

                                                    <button ng-if="user.lib == 1" ng-click="revokeEvaluationAccess(user)" class="mdc-button mdc-button--dense mdc-button--outlined">
                                                        <i class="material-icons mdc-button__icon" aria-hidden="true">close</i>
                                                        <span class="mdc-button__label">Desfazer Liberação</span>
                                                    </button>
                                                    <button ng-if="user.lib == 0" ng-click="grantEvaluationAccess(user)" type="submit" class="mdc-button mdc-button--dense mdc-button--unelevated" data-loading-text="<i class='icon-spinner animate-spin'></i> Liberando">
                                                        <i class="material-icons mdc-button__icon" aria-hidden="true">check</i>
                                                        <span class="mdc-button__label">Liberar</span>
                                                    </button>
                                                </td>
                                                <td style="width:200px;">
                                                    <button ng-if="$parent.user.id != user.id_usuario_avaliado || (user.youtime && user.youtime.length > 0 && user.youtime[0].situacao == 0) || (user.youtime && user.youtime.length > 0 && user.youtime[0].situacao == 1)" ng-class="{'youtime':user.youtime && user.youtime.length > 0 && user.youtime[0].situacao == 0, 'confirmed-youtime':user.youtime && user.youtime.length > 0 && user.youtime[0].situacao == 1}" style="margin-top:4px; width:100%;" class="clean_filter" ng-click="openYouTime(user)">You Time</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div ng-if="!resultsFromGestor || resultsFromGestor.length == 0" class="no-register">Sem {{ 'UI.USER' | translate }}s avaliados para este ciclo</div>
                                    <div class="clearfix"></div>
                                </div>




                                <div class="tab-pane fade in <?php
                                                                if ($this->session->userdata('performance_pessoal') == 1) {
                                                                    echo 'active';
                                                                } ?>" id="tab_Performance">
                                    <div class="row" ng-show="selectedPerformanceCycle">
                                        <div class="col-sm-12 carriar-user-section">
                                            <div class="col-sm-1">
                                                <figure style="">
                                                    <img ng-if="career_valid_image && career_details.image" class="img-circle" alt="{{career_details.name}}" src="{{career_details.image}}" style="height: 60px;width: 60px">
                                                    <span class="image-replace carriar-avatar" ng-if="!career_valid_image || !career_details.image">{{ initials(career_details.name) }}</span>
                                                </figure>
                                            </div>
                                            <div class=" col-sm-11" style="display: flex;">
                                                <div class="carrier-user-bar">
                                                    <h2 class="carriar-user"><span style="font-weight:bold;">Nome: </span>{{career_details.name}}</h2>
                                                    <h2 class="carriar-cargo"><span style="font-weight:bold;">Cargo: </span> {{career_details.cargo?career_details.cargo:'&nbsp;'}}</h2>
                                                    <h2 class="carriar-team"><span style="font-weight:bold;">{{ 'UI.TEAM' | translate }} </span> {{career_details.team?career_details.team:'&nbsp;'}}</h2>
                                                    <h2 class="carriar-user" ng-if="tempoEmpresa < 1">
                                                        <span style="font-weight:bold;">Tempo de Empresa: </span> menos de um mês
                                                    </h2>
                                                    <h2 class="carriar-user" ng-if="tempoEmpresa == 1">
                                                        <span style="font-weight:bold;">Tempo de empresa: </span> {{tempoEmpresa?tempoEmpresa:'&nbsp;'}} mês 
                                                    </h2>
                                                    <h2 class="carriar-user" ng-if="tempoEmpresa > 1 && tempoEmpresa < 12">
                                                        <span style="font-weight:bold;">Tempo de empresa: </span> {{tempoEmpresa?tempoEmpresa:'&nbsp;'}} meses 
                                                    </h2>
                                                    <h2 class="carriar-user" ng-if="tempoEmpresa == 12">
                                                        <span style="font-weight:bold;">Tempo de empresa: </span> {{tempoEmpresa?tempoEmpresa:'&nbsp;'}} ano 
                                                    </h2>
                                                    <h2 class="carriar-user" ng-if="tempoEmpresa > 12">
                                                        <span style="font-weight:bold;">Tempo de empresa: </span> {{tempoEmpresa/12 | number:2}} anos 
                                                    </h2>
                                                    <!--<h2 ng-if="nineboxCycleLabel" class="carriar-user">-->

                                                    <!-- CONCEITO NINEBOX -->
                                                    <h2  ng-show="selected_cycle_ruler[0].conceito_nine_box == 1" class="carriar-user"> 
                                                        <span style="font-weight:bold;">Ninebox: </span> {{nineboxCycleLabel?nineboxCycleLabel:'&nbsp;'}}
                                                    </h2>
                                                    <!-- CONCEITO NINEBOX -->
                                                </div>
                                                <!-- HEART RATING -->
                                                <div ng-show="selected_cycle_ruler[0].rating_heart == 1" class="carrier-user-bar" style="padding-left: 40px; padding-top: 5px;">
                                                    <div class="carriar-heart">
                                                        <div style="display: inline-block;" ng-repeat="heart in heartArrays track by $index">
                                                            <span ng-if="heart == 1" class="heart-checked">&nbsp;</span>
                                                            <span ng-if="heart == 0" class="heart-unchecked layoverdown">&nbsp;</span>
                                                            <span ng-if="heart == 0" class="heart-checked layoverup">&nbsp;</span>
                                                            <span ng-if="heart == 2" class="heart-unchecked layoverdown">&nbsp;</span>
                                                        </div>
                                                    </div>
                                                    <h2 class="carriar-score">{{overviewCycleScore}}</h2>
                                                </div>
                                                <!-- HEART RATING -->
                                            </div>
                                        </div>

                                        <!-- RÉGUA -->
                                        <div ng-show="selected_cycle_ruler[0].exibir_regua == 1" class="col-md-12">
                                            <div>Entenda sua nota</div>
                                            <!-- <pre>{{selected_cycle_ruler}}</pre> -->
                                            <div class="clearfix"></div>
                                            <div class="grade-explanation grade-explanation-5">
                                                <div class="block pessoal" ng-repeat="step in selected_cycle_ruler">
                                                    <span class="grade pessoal" style="opacity: {{step.conceito == 1 ? '0': '1'}}">{{step.limite_inicial}} - {{step.limite_final}}</span>
                                                    <span class="title pessoal"><span>{{step.label}}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- RÉGUA -->

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" ng-if="  (!(scoresFromCycle ||
                                                                        (valoresFromUsuarioByCycle && valoresFromUsuarioByCycle.length > 0) ||
                                                                        (potencialFromUsuarioByCycle && potencialFromUsuarioByCycle.length > 0) ||
                                                                        (resultadoFromUsuarioByCycle && resultadoFromUsuarioByCycle.length > 0) ||
                                                                        (competenciaFromUsuarioByCycle && competenciaFromUsuarioByCycle.length > 0) ||
                                                                        (outraetapaFromUsuarioByCycle && outraetapaFromUsuarioByCycle.length > 0) ) ) && selectedPerformanceCycle" style="text-align: center; margin:10px;">Resultados indisponíveis para o cíclo selecionado</div>
                                        <div class="col-md-12" style="text-align: center; margin:10px;" ng-if="!selectedPerformanceCycle">{{ 'UI.USER' | translate }} escolhido não possui ciclos de avaliação</div>
                                        <span ng-show="v_valores_exibir_grafico">
                                            <div class="col-md-6" ng-show="scoresFromCycle && selectedPerformanceCycle && v_valores" id="div_1st">
                                                <div class="panel panel-primary box">
                                                    <div class="panel-heading">
                                                        <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span>Média final | {{ valoresFromUsuarioByCycle[0].nome_fase }}</div>
                                                    </div>
                                                    <br>
                                                    <div class="panel-options" style="height: 250px;">
                                                        <canvas id="polar_comportamento_chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                        <span ng-show="v_resultados_exibir_grafico">
                                            <div class="col-md-6" ng-show="scoresFromCycle && selectedPerformanceCycle && v_resultados" id="div_2nd">
                                                <div class="panel panel-primary box">
                                                    <div class="panel-heading">
                                                        <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span>Média final | {{ resultadoFromUsuarioByCycle[0].nome_fase }}</div>
                                                    </div>
                                                    <br>
                                                    <div class="panel-options" style="height: 250px;">
                                                        <canvas id="polar_resultados_chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                        <span ng-show="v_competencias_exibir_grafico">
                                        <div class="col-md-6" ng-show="scoresFromCycle && selectedPerformanceCycle && v_competencias" id="div_3rd">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span> Média final | {{ competenciaFromUsuarioByCycle[0].nome_fase }}</div>
                                                </div>
                                                <br>
                                                <div class="panel-options" style="height: 250px;">
                                                    <canvas id="polar_competencia_chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        </span>
                                        <span ng-show="v_potencial_exibir_grafico">
                                        <div class="col-md-6" ng-show="scoresFromCycle && selectedPerformanceCycle && v_potencial" id="div_4th">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span>Média final | {{ potencialFromUsuarioByCycle[0].nome_fase }}</div>
                                                </div>
                                                <br>
                                                <div class="panel-options" style="height: 250px;">
                                                    <canvas id="polar_pontencial_chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        </span>
                                        <div class="col-md-12" ng-show="competenciaFromUsuarioByCycle.length > 0 && selectedPerformanceCycle && v_competencias">
                                            <div class="" ng-show="competenciaFromUsuarioByCycle.length > 0 && selectedPerformanceCycle" style="padding-left: 0px;padding-right:0px;">
                                                <div class="panel panel-primary box" ng-show="v_competencias_exibir_grafico" >
                                                    <div class="panel-heading">
                                                        <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span>{{ competenciaFromUsuarioByCycle[0].nome_fase }}</div>
                                                    </div>
                                                    <br>
                                                    <div id="chartjs-radar" style=" margin:0 auto; height: 450px;">
                                                        <canvas id="competencia_chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" ng-show="valoresFromUsuarioByCycle.length > 0 && selectedPerformanceCycle && v_valores">
                                            <div class="" ng-show="valoresFromUsuarioByCycle.length > 0 && selectedPerformanceCycle">
                                                <div class="panel panel-primary box" ng-show="v_valores_exibir_grafico">
                                                    <div class="panel-heading">
                                                        <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span>{{ valoresFromUsuarioByCycle[0].nome_fase }}</div>
                                                    </div>
                                                    <br>
                                                    <div id="chartjs-radar-valores" style=" margin:0 auto;height: 450px;">
                                                        <canvas id="valores_chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-if="valoresFromUsuarioByCycle && valoresFromUsuarioByCycle.length > 0 && selectedPerformanceCycle && v_valores">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box" ng-show="v_valores_exibir_grafico">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> {{ valoresFromUsuarioByCycle[0].nome_fase }}</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="valores-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>{{ "CARREIRA.ITEMS" | translate}}</th>
                                                                <th ng-if="score_2_visibility" style="width:  {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Gestor</th>
                                                                <th ng-if="score_1_visibility" style="width:  {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Auto</th>
                                                                <th ng-if="score_3_visibility" style="width:  {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Pares</th>
                                                                <th ng-if="score_4_visibility" style="width:  {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in valoresFromUsuarioByCycle" data-toggle="tooltip" data-placement="top" data-html="true" title={{val.descricao}}>
                                                                <td>{{val.nome_valor}}</td>
                                                                <td ng-click="openValuesComents(val.id_valores, 2, $index)" ng-if="score_2_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_2)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_2 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openValuesComents(val.id_valores, 1, $index)" ng-if="score_1_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_1)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_1 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openValuesComents(val.id_valores, 3, $index)" ng-if="score_3_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_3)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_3 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openValuesComents(val.id_valores, 4, $index)" ng-if="score_4_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_4)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_4 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div id="valuesComments">
                                                        <button type="button" class="close" aria-hidden="true" ng-click="closeValuesComments()">×</button>
                                                        <h4>Comentários</h4>
                                                        <ul ng-if="valueComments.length > 0">
                                                            <li ng-repeat="comment in valueComments">{{comment.descricao}}</li>
                                                        </ul>
                                                        <div ng-if="valueComments.length == 0" class="no-results"><sup>*</sup> Sem comentários</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-if="potencialFromUsuarioByCycle && potencialFromUsuarioByCycle.length > 0 && selectedPerformanceCycle && v_potencial">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> {{ potencialFromUsuarioByCycle[0].nome_fase }}</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="potencial-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>{{ "CARREIRA.ITEMS" | translate}}</th>
                                                                <th ng-if="potencial_2_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Gestor</th>
                                                                <th ng-if="potencial_1_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Auto</th>
                                                                <th ng-if="potencial_3_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Pares</th>
                                                                <th ng-if="potencial_4_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in potencialFromUsuarioByCycle">
                                                                <td>
                                                                    <div class="" ng-bind-html="val.pergunta"></div>
                                                                </td>

                                                                <td ng-click="openPotencialComents(val.id_pergunta, 2)" ng-if="potencial_2_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_2)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_2 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 1)" ng-if="potencial_1_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_1)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_1 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 3)" ng-if="potencial_3_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_3)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_3 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 4)" ng-if="potencial_4_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_4)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_4 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="potencialComments">
                                                        <button type="button" class="close" aria-hidden="true" ng-click="closePotencialComments()">×</button>
                                                        <h4>Comentários</h4>
                                                        <ul ng-if="potencialComments.length > 0">
                                                            <li ng-repeat="comment in potencialComments">{{comment.descricao}}</li>
                                                        </ul>
                                                        <div ng-if="potencialComments.length == 0" class="no-results"><sup>*</sup> Sem comentários</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" ng-if="resultadoFromUsuarioByCycle && resultadoFromUsuarioByCycle.length > 0 && selectedPerformanceCycle && v_resultados">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> {{ resultadoFromUsuarioByCycle[0].nome_fase }}</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="resultado-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>{{ "CARREIRA.ITEMS" | translate}}</th>
                                                                <th ng-if="resultado_2_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Gestor</th>
                                                                <th ng-if="resultado_1_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Auto</th>
                                                                <th ng-if="resultado_3_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Pares</th>
                                                                <th ng-if="resultado_4_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in resultadoFromUsuarioByCycle">
                                                                <td>{{val.pergunta}}</td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 2, $index, $event)" ng-if="resultado_2_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_2)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_2 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 1, $index, $event)" ng-if="resultado_1_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_1)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_1 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 3, $index, $event)" ng-if="resultado_3_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_3)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_3 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 4, $index, $event)" ng-if="resultado_4_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_4)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_4 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div id="resultadoComments">
                                                        <button type="button" class="close" aria-hidden="true" ng-click="closeResultadoComments()">×</button>
                                                        <h4>Comentários</h4>
                                                        <ul ng-if="resultadoComments.length > 0">
                                                            <li ng-repeat="comment in resultadoComments">{{comment.descricao}}</li>
                                                        </ul>
                                                        <div ng-if="resultadoComments.length == 0" class="no-results"><sup>*</sup> Sem comentários</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" ng-if="competenciaFromUsuarioByCycle && competenciaFromUsuarioByCycle.length > 0 && selectedPerformanceCycle && v_competencias">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span>{{ competenciaFromUsuarioByCycle[0].nome_fase }}</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="competencia-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>{{ "CARREIRA.ITEMS" | translate}}</th>
                                                                <th ng-if="competencia_2_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Gestor</th>
                                                                <th ng-if="competencia_1_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Auto</th>
                                                                <th ng-if="competencia_3_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Pares</th>
                                                                <th ng-if="competencia_4_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in competenciaFromUsuarioByCycle" data-toggle="tooltip" data-placement="top" data-html="true" title={{val.description}}>
                                                                <td>{{val.nome_competencia}}</td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 2, $index)" ng-if="competencia_2_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_2)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_2 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 1, $index)" ng-if="competencia_1_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_1)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_1 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 3, $index)" ng-if="competencia_3_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_3)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_3 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 4, $index)" ng-if="competencia_4_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_4)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_4 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="competenciaComments">
                                                        <button type="button" class="close" aria-hidden="true" ng-click="closeCompetenciaComments()">×</button>
                                                        <h4>Comentários</h4>
                                                        <ul ng-if="competenciaComments.length > 0">
                                                            <li ng-repeat="comment in competenciaComments">{{comment.descricao}}</li>
                                                        </ul>
                                                        <div ng-if="competenciaComments.length == 0" class="no-results"><sup>*</sup> Sem comentários</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-if="outraetapaFromUsuarioByCycle && outraetapaFromUsuarioByCycle.length > 0 && selectedPerformanceCycle">
                                        <div class="col-md-12">

                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> {{ outraetapaFromUsuarioByCycle[0].nome_fase }}</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="outraetapa-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>{{ "CARREIRA.ITEMS" | translate}}</th>
                                                                <th ng-if="outraetapa_2_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Gestor</th>
                                                                <th ng-if="outraetapa_1_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Auto</th>
                                                                <th ng-if="outraetapa_3_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Pares</th>
                                                                <th ng-if="outraetapa_4_visibility" style="width: {{selected_cycle_ruler[0].conceito == 1?'200px':'100px'}};">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in outraetapaFromUsuarioByCycle">
                                                                <td>{{val.pergunta}}</td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 2)" ng-if="outraetapa_2_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_2)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_2 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 1)" ng-if="outraetapa_1_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_1)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_1 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 3)" ng-if="outraetapa_3_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_3)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_3 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i>
                                                                </td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 4)" ng-if="outraetapa_4_visibility">
                                                                    <span ng-if="selected_cycle_ruler[0].conceito == 1">{{getGradeFromScore(val.score_4)}}</span>
                                                                    <span ng-if="selected_cycle_ruler[0].conceito != 1">{{val.score_4 | number:2}}</span>
                                                                    <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div id="outraetapaComments">
                                                        <button type="button" class="close" aria-hidden="true" ng-click="closeOutraetapaComments()">×</button>
                                                        <h4>Comentários</h4>
                                                        <ul ng-if="outraetapaComments.length > 0">
                                                            <li ng-repeat="comment in outraetapaComments">{{comment.descricao}}</li>
                                                        </ul>
                                                        <div ng-if="outraetapaComments.length == 0" class="no-results"><sup>*</sup> Sem comentários</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade in <?php
                                                                if ($this->session->userdata('performance_pessoal') != 1) {
                                                                    echo 'active';
                                                                } ?>" id="tab_Objetivos">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dblock no-shadow">
                                                <div class="dblock_body pb0" style="margin: 0 0 15px;">
                                                    <!-- <div class="tooltip_wrapper">
                                                        <div class="tooltip">
                                                            <div class="egg-arrow"></div>
                                                            <span class="tooltiptext">Planeje o seu desenvolvimento pessoal através de objetivos, Meta e atividades.</span>
                                                        </div>
                                                    </div> -->
                                                    <!-- <a href="javascript:void(0)" class="adicionar-btnx" ng-click="add_novo_dp_goal()">Novo PDI</a> -->
                                                    <!--<h2 class="h2-inline">Objetivos</h2>-->
                                                    <button class="mdc-button mdc-button--raised" ng-click="add_novo_dp_goal()">
                                                        <i class="material-icons mdc-button__icon">add</i>
                                                        <span class="mdc-button__label">{{ "OBJETIVOS.GOAL" | translate }}</span>
                                                    </button>
                                                </div>
                                                <div class="peopleDevelopmentView">
                                                    <div class="form_add perfil_career_ativaded" id="div-4">
                                                        <form id="form-search-my-activities" class="ng-pristine ng-valid">
                                                            <div class="row">
                                                                <div class="">
                                                                    <div class="filter_form_view view_dsds mr-0">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label">Situação:</label>
                                                                                <div class="filters_view">
                                                                                    <select class="active_status_career " id="active_status_career" ng-model="filter_by_status" multiple="multiple">
                                                                                        <option value="1">Ativo</option>
                                                                                        <option value="0">Inativo</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <label>Período de Tempo: </label>
                                                                                <div class="filters_view">
                                                                                    <select id="objective_time" name="objective_time" multiple="multiple">
                                                                                        <option value="last_month">Último Mês</option>
                                                                                        <option value="last_week">Última Semana</option>
                                                                                        <option value="current_quarter">Trimestre Atual</option>
                                                                                        <option value="all">Todo Período</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="clr_filters pull-right">
                                                                                    <div class="filter_btn">
                                                                                        <!-- <a href="javascript:void(0)" class="clean_filter" ng-click="clearfilterCareerBlock()" style="padding: 6px 10px;">Limpar Filtros</a>
                                                                                        <button type="button" class="apply_filter" ng-click="filterCareerBlock()" style="padding: 6px 10px;">Aplicar Filtro</button> -->
                                                                                        <button class="mdc-button mdc-fechar" ng-click="clearfilterCareerBlock()">Limpar Filtros</button>
                                                                                        <button type="submit" ng-click="filterCareerBlock()" class="mdc-button mdc-button--raised">Aplicar Filtros</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div ng-class="{'col-sm-12':viewInFullSize,'col-sm-7':!viewInFullSize}">
                                            <div class="dblock no-border" style="border:none;">
                                                <div class="dblock_body carrier_block" id="" style="">
                                                    <div class="ng-timeline perfile-timeline-outer row v-center alinhamentoLinha" style="margin-left:0px;border: 1px solid #dadce0;border-radius: 10px;margin-bottom: 10px !important;" ng-if="career_details.dp_goals.length>0" ng-repeat="goal in career_details.dp_goals" ng-click="get_goal_details_by_id(goal.id_dp_objetivo)">
                                                        <!-- <div class="carrier_row_pdi linkh2">
                                                            <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32" style="cursor: pointer;">
                                                                <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 " style="cursor: pointer;"></polygon>
                                                            </svg>
                                                        </div> -->
                                                        <div class="col-sm-4 col-xs-12 OKRS & Atividates text-ellips" style="padding-left: 30px;">
                                                            <p style="margin-bottom:0px;">
                                                                {{goal.nome_dp_objetivo}}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-12 timeline-tag text-center" style="padding-right: 0px !important;padding-left: 0px !important;">
                                                            <p style="margin-bottom:0px;">
                                                                <span title="{{goal.meta.length}}">{{goal.meta.length}} metas</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-3  timeline-tag text-center">
                                                            <span>{{goal.date_limit}}</span>
                                                        </div>
                                                    </div>



                                                    <!--carrier Panel END-->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!career_details.dp_goals.length">
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                <div class="ng-binding">Sem dados registrados</div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <!--dblock_body carrier_block2 END-->
                                            </div>
                                            <!--dblock_body END-->
                                        </div>
                                        <!--dblock END-->
                                        <div class="col-sm-5" ng-if="!viewInFullSize">
                                            <div class="dblock career_sidebar_details" style="min-height: 540px;height: auto;" ng-if="editMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)" ng-click="returnToMainCareer()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block2">
                                                    <form id="objecive_dp_update_form" style="border:none;">
                                                        <input id="id_dp_objetivo_glob" name="id_dp_objetivo_glob" type="hidden" class="form-control" ng-model="id_dp_objetivo_glob">
                                                        <div class="fixed_hgt">
                                                            <div class="career-profile2">
                                                                <div id="goal_update_section">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Nome do Objetivo</label>
                                                                                <div class="form-control-wrapper">
                                                                                    <input id="nome_obj_glob" name="nome_obj_glob" type="text" class="form-control no-bg-clr " ng-model="nome_obj_glob" required placeholder="Digite o nome do Objetivo">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Prazo</label>
                                                                                <div class="form-control-wrapper">
                                                                                    <input id="date_limit_glob" name="date_limit_glob" type="text" class="form-control   no-bg-clr data" ng-model="date_limit_glob" required placeholder="Prazo">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Cargo Relacionado</label>
                                                                                <select id="cargo_objevio_rht" name="cargo_objevio_rht" class="form-control" ng-model="CargosNotAddedSelected" ng-options="cargo.name for cargo in CargosNotAdded track by cargo.id" ng-disabled="CargoNotAddedSelected.length>=1"></select>
                                                                                <span class="corresponsaveis-selected" ng-repeat="selected in CargoNotAddedSelected" ng-click="removeCargoAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="cargos[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                                                                <p ng-if="CargoNotAddedSelected.length>0">Descrição :- {{ CargoNotAddedSelected[0].description }}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Situacao</label>
                                                                                <select class="" id="active_status_rht" name="active_status_rht" ng-model="selectedStatusRht">
                                                                                    <option value="1">Ativo</option>
                                                                                    <option value="0">Inativo</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <span class="frm_lbl" ng-if="goal_details.meta.length>0">&nbsp;</span>
                                                            <div class="form-group">
                                                                <label class="control-label">Metas</label>
                                                            </div>
                                                            <div class="row" ng-if="goal_details.meta.length>0" ng-repeat="meta in goal_details.meta">
                                                                <div class="col-md-12">
                                                                    <div class="career-profile-meta">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrapper">
                                                                                <!-- <div class="checkbox abs-checkbox col-md-1">
                                                                                    <div class="custom_chkbox">
                                                                                        <input type="checkbox" id="id01_{{meta.id}}" value="1" name="goal_meta_name[{{meta.id}}][situacao]" class="">
                                                                                        <label for="id01_{{meta.id}}"> </label>
                                                                                    </div>
                                                                                </div> -->
                                                                                
                                                                                <div class="mdc-form-field">
                                                                                    <div class="mdc-checkbox">
                                                                                        <input type="checkbox" id="id01_{{meta.id}}" name="goal_meta_name[{{meta.id}}][situacao]" ng-checked="meta.situacao == 1" class="mdc-checkbox__native-control" ng-click="updateMetaDp(meta.id,'situacao')" />
                                                                                        <div class="mdc-checkbox__background">
                                                                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59" />
                                                                                            </svg>
                                                                                            <div class="mdc-checkbox__mixedmark"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <label for="id01_{{meta.id}}"></label>
                                                                                </div>
                                                                                
                                                                                <!-- <div class="mdc-form-field">
                                                                                <div class="mdc-text-field">
                                                                                    <input type="text" id="my-text-field" class="mdc-text-field__input" name="goal_meta_name[{{meta.id}}][name]" value="{{meta.name}}">
                                                                                    <label class="mdc-floating-label" for="my-text-field">Nome</label>
                                                                                    <div class="mdc-line-ripple"></div>
                                                                                </div>
                                                                                </div> -->
                                                                                <div class="mdc-form-field" style="width:80%" >
                                                                                    <input class="form-control" type="text" placeholder="Nome" id="goal_meta_name_{{meta.id}}" name="goal_meta_name[{{meta.id}}][name]" value="{{meta.name}}" ng-blur="updateMetaDp(meta.id,'name',meta.name)">
                                                                                </div>
                                                                                
                                                                                <!-- <div class="mdc-text-field mdc-text-field--outlined">
                                                                                    <input type="text" id="tf-outlined" class="mdc-text-field__input" name="goal_meta_name[{{meta.id}}][name]" value="{{meta.name}}">
                                                                                    <div class="mdc-notched-outline">
                                                                                        <div class="mdc-notched-outline__leading"></div>
                                                                                        <div class="mdc-notched-outline__notch">
                                                                                            <label for="tf-outlined" class="mdc-floating-label">Nome</label>
                                                                                        </div>
                                                                                        <div class="mdc-notched-outline__trailing"></div>
                                                                                    </div>
                                                                                </div> -->
                                                                                <div class="bntsh right-side mdc-form-field">
                                                                                    <!-- <a href="javascript:void(0)" class="showhide-panel" ng-click="showHideActivities(meta.id)"><i class="fa fa-angle-down" id="icon_dp_activity_{{meta.id}}"></i>
                                                                                    </a> -->
                                                                                <button class="mdc-icon-button material-icons" ng-click="showHideActivities(meta.id)" id="icon_dp_activity_{{meta.id}}">arrow_drop_down</button>
                                                                                </div>
                                                                                &nbsp;<a href="javascript:void(0)" ng-click="DeleteDpMeta(meta.id)"><i class="fa fa-times" style="color:#FF0000;"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hide" id="section_meta_activities_{{meta.id}}">
                                                                        <div class="section_meta_activities">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="career-profile-meta">
                                                                                        <div class="form-group">
                                                                                            <!--<label class="control-label">Nome da Atividade</label>-->
                                                                                            <div class="form-control-wrapper">
                                                                                                <input class="form-control  " type="text" placeholder="Nome da Atividade" id="activity_name_meta_gb_{{meta.id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group form-inline">
                                                                                        <!-- <label class="control-label">Data Fim</label>-->
                                                                                        <div class="form-control-wrapper">

                                                                                            <input class="form-control   fix-wd data" type="text" placeholder="Prazo" id="activity_end_meta_gb_{{meta.id}}">
                                                                                        </div>
                                                                                        <!-- <button type="button" class="add_meta_btn" ng-click="addNewMinorActivity(meta.id)">Ok</button> -->


                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <button class="mdc-button mdc-button--outlined" ng-click="addNewMinorActivity(meta.id)">Ok</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" ng-repeat="activity in meta.activities">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-control-wrapper form-group">

                                                                                        <input class="form-control" type="text" placeholder="Nome da Atividade" name="activity_name_added[{{activity.id}}][name]" id="activity_name_added_{{activity.id}}" value="{{activity.name}}" ng-blur="updateactivityDp(activity.id,'name')">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group form-inline">
                                                                                        <div class="form-control-wrapper">

                                                                                            <input class="form-control   fix-wd data" type="text" placeholder="Prazo" value="{{activity.activity_end}}" name="activity_name_added[{{activity.id}}][end_date]" id="activity_date_added_{{activity.id}}" ng-blur="updateactivityDp(activity.id,'date')">
                                                                                        </div>
                                                                                        <div class="act_btn">
                                                                                            <div class="custom_chkbox">
                                                                                                <input name="activity_name_added[{{activity.id}}][situacao]" id="activity_situacao_{{activity.id}}" type="checkbox" ng-click="updateactivityDp(activity.id,'situacao')" ng-checked="activity.situacao == 1">
                                                                                                <label for="activity_situacao_{{activity.id}}">&nbsp;</label>
                                                                                            </div>
                                                                                            <a href="javascript:void(0)" ng-click="DeleteDpActivity(activity.id)"><i class="fa fa-times"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--section_meta_activities END-->
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="form-control-wrapper form-group">
                                                            <label for="nome_dp_rchave" class="form-control"></label>
                                                            <input id="nome_dp_rchave" name="nome_dp_rchave" type="text" class="form-control  " ng-model="nome_meta_obj" placeholder="Digite o nome da Meta">
                                                        </div>
                                                        <!-- <div class="mdc-text-field mdc-text-field--outlined">
                                                            <input type="text" id="tf-outlined" class="mdc-text-field__input" id="nome_dp_rchave" name="nome_dp_rchave" ng-model="nome_meta_obj">
                                                            <div class="mdc-notched-outline">
                                                                <div class="mdc-notched-outline__leading"></div>
                                                                <div class="mdc-notched-outline__notch">
                                                                    <label for="tf-outlined" class="mdc-floating-label">Nome</label>
                                                                </div>
                                                                <div class="mdc-notched-outline__trailing"></div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <button type="button" class="adicionar-btnx" ng-click="add_new_dp_meta()">Adicionar Meta</button> -->
                                                        <!-- <button class="mdc-button" data-dismiss="modal" ng-click="add_new_dp_meta()">
                                                            <i class="material-icons mdc-button__icon">add</i>
                                                            <span class="mdc-button__label">Meta</span>
                                                        </button> -->
                                                        <div class="meta_save_btn">

                                                            <!-- <button type="submit" class="adicionar-btnx" ng-click="saveGlobalDpValues()">Salvar</button> -->
                                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="saveGlobalDpValues()">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                            <div class="dblock" ng-if="addMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)" ng-click="returnToMainCareer()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block2 career_sidebar_details" id="carrier_block2_hgt_add" style="min-height: 513px; height: auto">
                                                    <form id="objecive_dp_form" style="border:none">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="career-profile-meta">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nome do Objetivo</label>
                                                                        <div class="form-control-wrapper">
                                                                            <input id="nome_obj" name="nome_obj" type="text" class="form-control  " ng-model="nome_obj" required placeholder="Digite o nome do Objetivo">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Prazo</label>
                                                                    <div class="form-control-wrapper">
                                                                        <input id="date_limit" name="date_limit" type="text" class="form-control   data" ng-model="date_limit" required placeholder="Prazo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Cargos: <span class="grey-font-objective">Mostrar descricoes de cargo </span></label>
                                                                    <select id="cargo_objevio" name="cargo_objevio" class="form-control" ng-model="CargosNotAddedSelected" ng-options="cargo.name for cargo in CargosNotAdded track by cargo.id" ng-disabled="CargoNotAddedSelected.length>=1"></select>
                                                                    <span class="corresponsaveis-selected" ng-repeat="selected in CargoNotAddedSelected" ng-click="removeCargoAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="cargos[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                                                    <p ng-if="CargoNotAddedSelected.length>0">Description :- {{ CargoNotAddedSelected[0].description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Situacao:</label>
                                                                    <select class="" id="active_status" name="active_status" ng-model="selectedStatus">
                                                                        <option value="1">Ativo</option>
                                                                        <option value="0">Inativo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <!--<button type="button" class="btn" style="margin-right: 20px;background-color: #fff;border: 1px solid #dadce0;border-radius: 4px;"  ng-click="cancelToObjectivos()">Cancelar</button>-->
                                                            <!-- <input type="submit" class="btn btn-primary save" ng-click="addDpObjectivo()" value="Salvar"> -->
                                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="addDpObjectivo()">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                            <!-- <div class="dblock" ng-if="addMetaMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)" ng-click="returnToMainCareer()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block2" id="carrier_block2_hgt_ss">
                                                    <form id="addmeta_dp_form" style="border:none">
                                                        <input id="id_meta_obj_glob" name="id_meta_obj_glob" type="hidden" class="form-control">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="career-profile-meta">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nome do Objetivo</label>
                                                                        <div class="form-control-wrapper">
                                                                            <input id="nome_obj_goal" name="nome_obj_goal" type="text" class="form-control  " ng-model="nome_obj_goal" required placeholder="Digite o nome do Objetivo">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Prazo</label>
                                                                    <div class="form-control-wrapper">

                                                                        <input id="date_limit_obj_meta" name="date_limit_obj_meta" type="text" class="form-control   data" ng-model="date_limit_obj_meta" required placeholder="Prazo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="career-profile-meta">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nome da Meta</label>
                                                                        <div class="form-control-wrapper">

                                                                            <input id="nome_meta_obj" name="nome_meta_obj" type="text" class="form-control  " ng-model="nome_meta_obj" required placeholder="Digite o nome da Meta">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div>
                                                            <span class="frm_lbl">Deseja adicionar atividades a Meta?</span>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="career-profile-meta">
                                                                        <div class="form-group">
                                                                            <label class="control-label"></label>
                                                                            <div class="form-control-wrapper">
                                                                                <input class="form-control  " type="text" placeholder="Digite o nome da Atividade" id="activity_name_meta">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 activitydate">
                                                                    <div class="form-group form-inline">
                                                                        <label class="control-label">Data Fim</label>-->
                                            <!--<div class="form-control-wrapper" style="padding-top: 5px;">
                                                                            </span>
                                                                            <input class="form-control   fix-wd data" type="text" placeholder="Prazo" id="activity_end_meta">
                                                                        </div>
                                                                        <button type="button" class="add_meta_btn" ng-click="addNewDpMinorActivity()">Ok</button>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <button class="mdc-button mdc-button--outlined" ng-click="addNewDpMinorActivity()">Ok</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" ng-repeat="activity in dp_minor_added_activities">
                                                                <div class="col-md-6">
                                                                    <div class="activity_lbl">{{activity.name}}</div>
                                                                </div>
                                                                <div class="col-md-6 activitydate">
                                                                    <div class="form-group form-inline">
                                                                        <div class="form-control-wrapper">
                                                                            <input class="form-control   fix-wd data" type="text" placeholder="Prazo" value="{{activity.activity_end}}">
                                                                        </div>
                                                                        <div class="act_btn">
                                                                            <a href="javascript:void(0)" ng-click="DeleteMinorDpActivity(activity.index)"><i class="fa fa-times"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <button type="button" class="btn btn-primary.save"  ng-click="cancelToObjectivos()" style="margin-right: 20px;background-color: #fff;border: 1px solid #dadce0;border-radius: 4px;">Cancelar</button>
                                                            <input type="submit" class="adicionar-btnx" ng-click="addDpMeta()" value="Salvar">
                                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="addDpMeta()">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                dblock_body END
                                            </div> -->
                                            <!--dblock END-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  fade in " id="tab_Crossfeeds" ng-if="user.admin == 'true' || !carrer_user_id  || user.id == carrer_user_id">
                                    <div class="row" ng-if="user.crossfeed == 1">
                                        <div class="peopleDevelopmentView">

                                            <div class="form_add" id="div-4" style="padding: 0px 20px;">
                                                <form id="form-search-my-activities">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="dblock no-shadow">
                                                                <div class="dblock_body pb0">
                                                                    <!-- <div class="tooltip_wrapper">
                                                                        <div class="tooltip">
                                                                            <div class="egg-arrow"></div>
                                                                            <span class="tooltiptext">Peça Crossfeed's para qualquer pessoa da sua empresa e tenha as respostas dos seus colegas sobre como melhorar o seu desenvolvimento individual.</span>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <a href="javascript:void(0)" class="adicionar-btnx" ng-click="NewDevelopment()"> Novo Crossfeed</a> -->

                                                                    <button class="mdc-button mdc-button--raised" ng-click="NewDevelopment()">
                                                                        <i class="material-icons mdc-button__icon">add</i>
                                                                        <span class="mdc-button__label">{{ "CARREIRA.CROSSFEED" | translate }}</span>
                                                                    </button>

                                                                </div>
                                                                <!--dblock_body END-->
                                                            </div>
                                                            <!--dblock END-->
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="filter_form_view view_dsds">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <label>Situação</label>
                                                                        <div class="filters_view">
                                                                            <select id="crossfeed_status" name="crossfeed_status" class="" multiple="multiple">
                                                                                <option value="expirado">Atrasado</option>
                                                                                <option value="finalizado">Concluído</option>
                                                                                <option value="aguardando">Pendente</option>
                                                                                <option value="declined">Rejeitado</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label>Período de Tempo:</label>
                                                                        <div class="filters_view">
                                                                            <select id="crossfeed_time" name="crossfeed_time" class="" multiple="multiple">
                                                                                <option value="last_month">Último Mês</option>
                                                                                <option value="last_week">Última Semana</option>
                                                                                <option value="current_quarter">Trimestre Atual</option>
                                                                                <option value="all">Todo Período</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <label>
                                                                            <!-- Mostrar arquivados --></label>
                                                                        <!-- <div class="filters_view">
                                                                            <div class="checkbox abs-checkbox" style="margin-top: 35px;">
                                                                                <input type="checkbox" id="arquivadasCheck" value="1" name="arquivadasCheck" class="styled-checkbox" ng-model="arquivadasCheck" ng-click="ShowHideArquivadas();">
                                                                                <label for="arquivadasCheck">Ver arquivadas</label>
                                                                            </div>
                                                                        </div> -->

                                                                        <!-- <label>Tipo</label>
                                                                        <div class="filters_view">
                                                                            <select id="crossfeed_type" name="crossfeed_type" class="" multiple="multiple">
                                                                                <option value="received">Recebidos</option>
                                                                                <option value="asked">Solicitados</option>
                                                                            </select>

                                                                        </div> -->
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="clr_filters">
                                                                            <div class="filter_btn">
                                                                                <!-- <a href="javascript:void(0)" class="clean_filter" ng-click="clearfilterCareerBlockCrossfeed()" style="padding: 6px 10px;">Limpar Filtros</a>
                                                                                <button type="button" class="apply_filter" ng-click="filterCareerBlockCrossfeed()" style="padding: 6px 10px;">Aplicar Filtro</button> -->
                                                                                <button class="mdc-button mdc-fechar" ng-click="clearfilterCareerBlockCrossfeed()">Limpar Filtros</button>
                                                                                <button type="button" class="mdc-button mdc-button--raised" ng-click="filterCareerBlockCrossfeed()">Aplicar Filtros</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-if="user.crossfeed == 1">
                                    <div class="filters_view">
                                            <div class="checkbox abs-checkbox" style="margin-top: -15px;margin-right:20px;float:right;">
                                                <input type="checkbox" id="arquivadasCheck" value="1" name="arquivadasCheck" class="styled-checkbox" ng-model="arquivadasCheck" ng-click="ShowHideArquivadas();">
                                                <label for="arquivadasCheck">Ver arquivadas</label>
                                            </div>
                                        </div>
                                        <div ng-class="{'col-sm-12':viewFullCrossfeed,'col-sm-7':!viewFullCrossfeed}">

                                            <div class="dblock no-border">
                                                <!-- ABAS DE ORGANICAÇÂO DO CROSSFEED -->
                                                <div class="dblock_body carrier_block2" id="carrier_block2_hgt_cross" style="min-height: 480px;height: auto">
                                                    <!-- INICIO - ABAS DE NAVEGAÇÃO - MENU -->
                                                    <div class="tabs-cntr">
                                                        <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                                            <li id="section1_link" role="presentation" class="tav-active-feed active"><a href="#abaMinhasSolicitacoes" aria-controls="home" role="tab" data-toggle="tab">{{ 'CARREIRA.SENT_TO_ME' | translate }} ( {{ (carreers|filter:{arquivada:0,situation:0,situ}).length }} )</a></li>
                                                            <li id="section2_link" class="tav-active-feed" role="presentation"><a href="#abaSolicitadasParaMim" aria-controls="profile" role="tab" data-toggle="tab">{{ 'CARREIRA.MY_SENT' | translate }} ( {{ (received_carreers|filter:{arquivada:0}).length }} )</a></li>
                                                            <!-- <li id="section2_link" class="tav-active-feed" role="presentation"><a href="#abaArquivadas" aria-controls="profile" role="tab" data-toggle="tab">{{ 'CARREIRA.MY_SENT_ARCHIVE' | translate }}</a></li> -->
                                                        </ul>
                                                    </div>
                                                    <!-- FIM - ABAS DE NAVEGAÇÃO - MENU -->

                                                    <div class="tab-content tabs feedbacktabs">
                                                        <div role="tabpanel" class="tab-pane fade in active" id="abaMinhasSolicitacoes">
                                                            <!-- INICIO - LINHA DE SOLICITADOS PARA - ABA MINHAS SOLICITACOES-->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="carreers.length>0 && carreer.arquivada == 0" ng-repeat="carreer in carreers">
                                                                <div class="elofy_table_row db_obj alinhamentoLinha">
                                                                    <div ng-class="{'col-md-4':viewFullCrossfeed,'col-md-5':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <!--<div class="feed_name">Solicitados para: </div>-->
                                                                        <div class="feed_profile ">
                                                                            <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.xs_image">{{ initials(carreer.nome_usuario) }}</span>
                                                                                <img ng-if="carreer.xs_image" ng-src="{{ carreer.xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.nome_usuario) }}" width="30" height="30">
                                                                            </div>
                                                                            <span class="usr_names">{{ carreer.nome_usuario }} <!-- <a href="#" class="badge badge-danger">Novo</a>--></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="" style="margin-top:0px;" ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_dates">
                                                                            <!--Prazo:--> {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                    </div>
                                                                    <div ng-if="viewFullCrossfeed" class="col-md-2 " ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">
                                                                            <!--{{ 'UI.TEAM' | translate }}--> {{ carreer.team }}</span>
                                                                    </div>
                                                                    <div ng-if="viewFullCrossfeed" class="col-md-2 " ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}}</span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <span>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 1 " class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.expired == 1 && carreer.situation == 0" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                            </span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                           <button class="mdc-icon-button material-icons" ng-click="archiveFeedback(carreer.id_feedback)">archive</button>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <!-- INICIO - LINHA DE NÃO RESULTADOS -->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="(carreers|filter:{arquivada:0}).length == 0">
                                                                <div class="elofy_table_row db_obj">
                                                                    <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                        <div class="ng-binding">Não foram encontrados dados.</div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- FIM - LINHA DE NÃO RESULTADOS -->

                                                            <p>&nbsp;</p>
                                                            <!-- FIM - LINHA DE SOLICITADOS PARA - ABA MINHAS SOLICITACOES -->
                                                            <!-- INICIO - LINHA DE SOLICITADOS PARA - ARQUIVADAS -->
                                                            <div class="tabs-cntr" ng-hide="mostrar_crossfeed_arquivada">
                                                                <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                                                    <li id="section1_link" role="presentation" class="tav-active-feed active"><a href="#abaMinhasSolicitacoesArquivadas" aria-controls="home" role="tab" data-toggle="tab">{{ 'CARREIRA.MY_SENT_ARCHIVE' | translate }}</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="carreers.length > 0 && carreer.arquivada == 1 " ng-repeat="carreer in carreers" ng-hide="mostrar_crossfeed_arquivada">
                                                                <div class="elofy_table_row db_obj alinhamentoLinha">
                                                                    <div ng-class="{'col-md-4':viewFullCrossfeed,'col-md-5':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <!--<div class="feed_name">Solicitados para: </div>-->

                                                                        <div class="feed_profile ">
                                                                            <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.xs_image">{{ initials(carreer.nome_usuario) }}</span>
                                                                                <img ng-if="carreer.xs_image" ng-src="{{ carreer.xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.nome_usuario) }}" width="30" height="30">
                                                                            </div>
                                                                            <span class="usr_names">{{ carreer.nome_usuario }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="" ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_dates">
                                                                            <!-- Prazo:--> {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                    </div>
                                                                    <div class="col-md-2 " ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">
                                                                            <!--{{ 'UI.TEAM' | translate }}--> {{ carreer.team }}</span>
                                                                    </div>
                                                                    <div class="col-md-2 " ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}}</span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <span>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 1 " class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.expired == 1 && carreer.situation == 0" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                            </span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <button class="mdc-icon-button material-icons" ng-click="unarchiveFeedback(carreer.id_feedback)">unarchive</button>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- FIM - LINHA DE SOLICITADOS PARA - ARQUIVADAS -->

                                                            <!-- INICIO - LINHA DE NÃO RESULTADOS -->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="(carreers|filter:{arquivada:1}).length == 0" ng-hide="mostrar_crossfeed_arquivada">
                                                                <div class="elofy_table_row db_obj">
                                                                    <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                        <div class="ng-binding">Não foram encontrados dados.</div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- FIM - LINHA DE NÃO RESULTADOS -->

                                                        </div>







                                                        <div role="tabpanel" class="tab-pane fade" id="abaSolicitadasParaMim">
                                                            <!-- INICIO - LINHA DE RESPONDIDO DE -->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="received_carreers.length > 0 && carreer.arquivada == 0 " ng-repeat="carreer in received_carreers">
                                                                <div class="elofy_table_row db_obj alinhamentoLinha">
                                                                    <div ng-class="{'col-md-4':viewFullCrossfeed,'col-md-5':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <!--<div class="feed_name">Recebido de: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>-->
                                                                        <div class="feed_profile ">
                                                                            <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.from_user_xs_image">{{ initials(carreer.from_user) }}</span>
                                                                                <img ng-if="carreer.from_user_xs_image" ng-src="{{ carreer.from_user_xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.from_user) }}" width="30" height="30">
                                                                            </div>
                                                                            <span class="usr_names">{{ carreer.from_user }}
                                                                                <!--<a href="#" class="badge badge-danger">Nova</a>--></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="" ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_dates">
                                                                            <!-- Prazo:--> {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                    </div>
                                                                    <div class="col-md-2 ">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">
                                                                            <!-- {{ 'UI.TEAM' | translate }} --> {{ carreer.team }}</span>
                                                                    </div>
                                                                    <div class="col-md-2 ">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}}</span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <span ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 1" class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 0 && carreer.expired == 1" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                            </span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <button class="mdc-icon-button material-icons" ng-click="archiveFeedback(carreer.id_feedback)">archive</button>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- INICIO - LINHA DE NÃO RESULTADOS -->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="(received_carreers|filter:{arquivada:0}).length == 0">
                                                                <div class="elofy_table_row db_obj">
                                                                    <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                        <div class="ng-binding">Não foram encontrados dados.</div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- FIM - LINHA DE NÃO RESULTADOS -->

                                                            <!-- FIM - LINHA DE RESPONDIDO DE -->
                                                            <p>&nbsp;</p>
                                                            <!-- INICIO - LINHA DE RESPONDIDO DE - ARQUIVADAS -->
                                                            <div class="tabs-cntr">
                                                                <ul class="nav nav-tabs nav-tabs-feeds" role="tablist" ng-hide="mostrar_crossfeed_arquivada">
                                                                    <li id="section1_link" role="presentation" class="tav-active-feed active"><a href="#abaSolicitadasPorMimArquivadas" aria-controls="home" role="tab" data-toggle="tab">{{ 'CARREIRA.MY_SENT_ARCHIVE' | translate }}</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="received_carreers.length > 0 && carreer.arquivada == 1 " ng-repeat="carreer in received_carreers" ng-hide="mostrar_crossfeed_arquivada">
                                                                <div class="elofy_table_row db_obj alinhamentoLinha">
                                                                    <div ng-class="{'col-md-4':viewFullCrossfeed,'col-md-5':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <!--<div class="feed_name">Recebido de: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>-->
                                                                        <div class="feed_profile ">
                                                                            <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.from_user_xs_image">{{ initials(carreer.from_user) }}</span>
                                                                                <img ng-if="carreer.from_user_xs_image" ng-src="{{ carreer.from_user_xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.from_user) }}" width="30" height="30">
                                                                            </div>
                                                                            <span class="usr_names"> {{ carreer.from_user }} </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="" ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                        <span class="usr_dates">
                                                                            <!--Prazo:--> {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                    </div>
                                                                    <div class="col-md-2 ">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">
                                                                            <!--{{ 'UI.TEAM' | translate }}--> {{ carreer.team }}</span>
                                                                    </div>
                                                                    <div class="col-md-2 ">
                                                                        <span class="usr_teams" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}}</span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <span ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 1" class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 0 && carreer.expired == 1" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                            </span>
                                                                    </div>
                                                                    <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                            <button class="mdc-icon-button material-icons" ng-click="unarchiveFeedback(carreer.id_feedback)">unarchive</button>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- FIM - LINHA DE RESPONDIDO DE - ARQUIVADAS -->

                                                            <!-- INICIO - LINHA DE NÃO RESULTADOS -->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="(received_carreers|filter:{arquivada:1}).length == 0" ng-hide="mostrar_crossfeed_arquivada">
                                                                <div class="elofy_table_row db_obj">
                                                                    <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                        <div class="ng-binding">Não foram encontrados dados.</div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!-- FIM - LINHA DE NÃO RESULTADOS -->

                                                        </div>

                                                        <div role="tabpanel" class="tab-pane fade" id="abaArquivadas" ng-hide="true">
                                                            <!-- INICIO - LINHA ARQUIVADAS -->
                                                            <div class="carrier_panel clearfix hover-cls" ng-if="received_carreers.length>0 && carreer.arquivada == 1" ng-repeat="carreer in received_carreers">
                                                                ABA
                                                            </div>
                                                            <!-- FIM - LINHA ARQUIVADAS -->
                                                        </div>



                                                    </div>


                                                    <!-- INICIO - LINHA DE NÃO RESULTADOS -->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!received_carreers.length && !carreers.length" ng-hide="true">
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                <div class="ng-binding">Não foram encontrados dados</div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!-- FIM - LINHA DE NÃO RESULTADOS -->
                                                </div>
                                                <!--dblock_body carrier_block2 END-->
                                            </div>
                                            <!-- FIM - LINHA DE SOLICITADOS PARA -->
                                            <!--dblock_body END-->

















                                            <!-- INICIO - LISTAGEM CROSSFEED COM ABAS, MELHORIA ABAS -->
                                            <div class="dblock perfil-user-feedback" ng-if="user.feedback == 1" style="float:left; width:100%;margin-bottom: 4px;" ng-hide="true">
                                                <h3 class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">Arquivados </h3>
                                                <div class="dblock_body">
                                                    <div class="babs-2-pabel">
                                                        <div class="tab tab-feedback-panel" role="tabpanel">
                                                            <!-- INICIO - ABAS DE NAVEGAÇÃO - MENU -->
                                                            <div class="tabs-cntr">
                                                                <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                                                    <li id="section1_link" role="presentation" class="tav-active-feed active"><a href="#abaSolicitados" aria-controls="home" role="tab" data-toggle="tab">{{ 'CARREIRA.SENT' | translate }}</a></li>
                                                                    <li id="section2_link" class="tav-active-feed" role="presentation"><a href="#abaRecebidos" aria-controls="profile" role="tab" data-toggle="tab">{{ 'CARREIRA.RECEIVED' | translate }}</a></li>
                                                                </ul>
                                                            </div>
                                                            <!-- FIM - ABAS DE NAVEGAÇÃO - MENU -->
                                                            <!-- Tab panes -->
                                                            <!-- INICIO - LISTAGEM ABA SOLICITADOS POR MIM E PARA MIM-->
                                                            <div class="tab-content tabs feedbacktabs">
                                                                <div role="tabpanel" class="tab-pane fade in active" id="abaSolicitados">
                                                                    {{ 'UI.USER' | translate }} Logado: {{career_details.id}}
                                                                    <!-- INICIO - LINHA -->
                                                                    <div class="carrier_panel clearfix hover-cls" ng-if="carreers.length>0" ng-repeat="carreer in carreers">
                                                                        <div class="elofy_table_row db_obj">
                                                                            <div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <!-- <div class="feed_name">Solicitados para: </div> -->
                                                                                <div class="feed_profile">
                                                                                    <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.xs_image">{{ initials(carreer.nome_usuario) }}</span>
                                                                                        <img ng-if="carreer.xs_image" ng-src="{{ carreer.xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.nome_usuario) }}" width="30" height="30">
                                                                                    </div>
                                                                                    <span class="usr_names">{{ carreer.nome_usuario }} </span>
                                                                                </div>
                                                                            </div>

                                                                            <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <span class="usr_dates">Prazo: {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                            </div>
                                                                            <div class="col-md-2" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <span class="usr_teams" ng-if="viewFullCrossfeed">{{ 'UI.TEAM' | translate }} {{ carreer.team }}</span>
                                                                            </div>
                                                                            <div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                                <div class="">
                                                                                    <div class="feed-time" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}} </div>
                                                                                    <span>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 1 " class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.expired == 1 && carreer.situation == 0" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <!-- FIM - LINHA -->
                                                                    <!-- INICIO - LINHA SEM RESULTADOS -->
                                                                    <div class="carrier_panel clearfix hover-cls" ng-if="carreers.length==0" ng-hide="true">
                                                                        <div class="elofy_table_row db_obj">
                                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                                <div class="ng-binding">Não foram encontrados dados</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <!-- FIM - LINHA SEM RESULTADOS -->
                                                                </div>
                                                                <!-- FIM - LISTAGEM ABA CROSSFEED RESPONDIDOS PARA MIM -->

                                                                <div role="tabpanel" class="tab-pane fade" id="abaRecebidos">

                                                                    <!-- INICIO - LINHA RECEBIDOS-->
                                                                    <div class="carrier_panel clearfix hover-cls" ng-if="received_carreers.length>0 && carreers.situation == 1" ng-repeat="carreer in received_carreers">
                                                                        <div class="elofy_table_row db_obj">
                                                                            <div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <div class="feed_name">Recebido de: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                                                <div class="feed_profile">
                                                                                    <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.from_user_xs_image">{{ initials(carreer.from_user) }}</span>
                                                                                        <img ng-if="carreer.from_user_xs_image" ng-src="{{ carreer.from_user_xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.from_user) }}" width="30" height="30">
                                                                                    </div>
                                                                                    <span class="usr_names">{{ carreer.from_user }} </span>
                                                                                </div>
                                                                            </div>
                                                                            <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <span class="usr_dates">Prazo: {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <span class="usr_teams" ng-if="viewFullCrossfeed">{{ 'UI.TEAM' | translate }} {{ carreer.team }}</span>
                                                                            </div>
                                                                            <div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                                <div class="">
                                                                                    <div class="feed-time" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}} </div>
                                                                                    <span ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 1" class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && carreer.expired == 1" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <!-- FIM - LINHA -->
                                                                    <!-- INICIO - LINHA SEM RESULTADOS -->
                                                                    <div class="carrier_panel clearfix hover-cls" ng-if="carreers.length>0 && carrers.situation == 0" ng-repeat="carreer in carreers">
                                                                        <div class="elofy_table_row db_obj">
                                                                            <div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <div class="feed_name">Solicitados para: </div>
                                                                                <div class="feed_profile">
                                                                                    <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.xs_image">{{ initials(carreer.nome_usuario) }}</span>
                                                                                        <img ng-if="carreer.xs_image" ng-src="{{ carreer.xs_image }}" class="img-circle ng-scope" alt="{{ initials(carreer.nome_usuario) }}" width="30" height="30">
                                                                                    </div>
                                                                                    <span class="usr_names">{{ carreer.nome_usuario }} </span>
                                                                                </div>
                                                                            </div>

                                                                            <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <span class="usr_dates">Prazo: {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                                            </div>
                                                                            <div class="col-md-2" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
                                                                                <span class="usr_teams" ng-if="viewFullCrossfeed">{{ 'UI.TEAM' | translate }} {{ carreer.team }}</span>
                                                                            </div>
                                                                            <div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                                <div class="">
                                                                                    <div class="feed-time" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}} </div>
                                                                                    <span>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 1 " class="finalizado-btn clr-concluido ng-scope">Concluído</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-pendente ng-scope">Pendente</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.expired == 1 && carreer.situation == 0" class="finalizado-btn clr-atrasado ng-scope">Atrasado</a>
                                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-rej ng-scope">Rejeitado</a>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <!-- FIM - LINHA -->
                                                                    <!-- INICIO - LINHA SEM RESULTADOS -->
                                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!received_carreers.length && !carreers.length" ng-hide="true">
                                                                        <div class="elofy_table_row db_obj">
                                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                                <div class="ng-binding">Não foram encontrados dados</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <!-- FIM - LINHA SEM RESULTADOS -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIM - LISTAGEM CROSSFEED COM ABAS, MELHORIA ABAS -->

                                        </div>
                                        <!--dblock END-->
                                        <div class="col-sm-5" ng-if="!viewFullCrossfeed">
                                            <div class="dblock career_sidebar_details" ng-if="addCrossfeedMode" style="min-height: 480px;height: auto;">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)" ng-click="returnToMainCareerCrossfeed()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block2" id="crossfeed_block_hgt">
                                                    <form id="form-new-development">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Para quem você deseja solicitar esse Crossfeed?</label>
                                                                        <select name="feedbacktouser" id="feedbacktouser_cross" ng-model="feedbacktouser" class="form-control">
                                                                            <option value="{{searchuser.id}}" ng-repeat="searchuser in users">{{ searchuser.name }} </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group ">
                                                                        <label>Qual é o motivo do Crossfeed?</label>
                                                                        <textarea name="feedback_description" id="feedback_description_cross" class="form-control" rows="3" style="height: 50px;min-height: 50px" ng-model="feedback_description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group question_dev">
                                                                        <label style="text-transform:none;">Questionário a ser enviado:</label>
                                                                        <p ng-repeat="question in devQuestions">{{$index+1}}. {{question.question}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Insira um prazo para que seu Crossfeed seja respondido</label>
                                                                        <input name="feedback_deadline" id="feedback_deadline_cross" ng-model="feedback_deadline" type="text" class="form-control data">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <input name="id_questionario_dev" id="id_questionario_dev" value="{{id_questionario_dev}}" ng-model="id_questionario_dev" type="hidden" class="form-control">
                                                        <div class="meta_save_btn">
                                                            <!--<button type="button" class="" style="margin-right: 20px;background-color: #fff;border: 1px solid #dadce0;border-radius: 4px;" ng-click="returnToMainCareerCrossfeed()">Cancelar</button>-->
                                                            <!-- <input type="submit" class="btn btn-primary save" ng-if="!showViewModel" ng-click="submitNewDevelopmentUpdate()" value="Salvar"> -->
                                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-if="!showViewModel" ng-click="submitNewDevelopmentUpdate()">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                            <div id="div-block" class="dblock" ng-if="editCrossfeedMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)" ng-click="returnToMainCareerCrossfeed()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block2 career_sidebar_details" id="reply-crossfeed" style="min-height: 70px;height: auto;">
                                                    <form id="form-reply-development">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Esse Crossfeed foi solicitado a você por:</label>
                                                                        <select name="feedbacktouser" id="feedbacktouser_reply" ng-model="feedbacktouser" class="form-control" ng-if="!showViewModel">
                                                                            <option value="{{searchuser.id}}" ng-repeat="searchuser in users">{{ searchuser.name }} </option>
                                                                        </select>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{destination_user}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">O motivo desse Crossfeed é:</label>
                                                                        <textarea name="feedback_description" id="feedback_description_reply" class="form-control" rows="3" style="height: 70px;" ng-if="!showViewModel" ng-model="feedback_description"></textarea>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_description}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div ng-if="feedback_type == 'sent'">
                                                                <div class="row" ng-if="(user.id !=dev_data[0].id_usuario_solicitante) && dev_data[0].situacao == 0 && dev_data[0].expired == false">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group activity_custom">
                                                                            <label>O prazo inserido para a sua resposta é:</label>
                                                                            <input name="feedback_deadline" ng-if="!showViewModel" id="feedback_deadline_reply" ng-model="feedback_deadline" type="text" class="form-control data">
                                                                            <div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_deadline | amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && dev_data[0].situacao == 0">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group activity_custom">
                                                                            <label>O prazo inserido para a sua resposta é:</label>
                                                                            <input name="feedback_deadline_date" id="feedback_deadline_date" ng-value="feedback_deadline_date" ng-model="feedback_deadline_date" type="text" class="form-control data" ng-class="data" style="padding-left: 10px">
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-1">
                                                                    <div class="form-group" >
                                                                    <label>&nbsp;</label>
                                                                        <a href="javascript:void(0)" style="color: green" ng-click="updateFeedbackDeadline(dev_data[0].id)">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>-->
                                                                    <div class="col-sm-12">
                                                                        <div class="meta_save_btn">
                                                                            <!--<button type="button" class="" style="margin-right: 20px;background-color: #fff;border: 1px solid #dadce0;border-radius: 4px;" ng-click="returnToMainCareerCrossfeed()">Cancelar</button>-->
                                                                            <!-- <input type="submit" class="btn btn-primary save" ng-click="updateFeedbackDeadline(dev_data[0].id)" value="Salvar"> -->
                                                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="updateFeedbackDeadline(dev_data[0].id)">Salvar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div ng-if="feedback_type == 'received'">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group activity_custom">
                                                                            <label>O prazo inserido para a sua resposta é:</label>
                                                                            <input name="feedback_deadline" ng-if="!showViewModel" id="feedback_deadline_reply" ng-model="feedback_deadline" type="text" class="form-control data">
                                                                            <div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_deadline | amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row" ng-if="!showViewModel">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label>Esse Crossfeed foi solicitado a:</label>
                                                                        <div class="viewupdateanswer_dp">{{posted_date | amUtc | amTimeAgo:true}} ago</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <input name="id_questionario_dev" id="id_questionario_dev" value="{{id_questionario_dev}}" ng-model="id_questionario_dev" type="hidden" class="form-control">
                                                            <input name="id_feedback_dev" id="id_feedback_dev" value="{{id_feedback_dev}}" ng-model="id_feedback_dev" type="hidden" class="form-control">
                                                            <input name="id_feedback_destino" id="id_feedback_destino" value="{{id_feedback_destino}}" ng-model="id_feedback_destino" type="hidden" class="form-control">
                                                            <div class="row" ng-if="dev_data[0].situacao == 0  && dev_data[0].expired == false && devAuthorised" ng-hide="feedback_rejeitado">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Resposta</label>
                                                                        <textarea name="feedback_resposta" id="feedback_resposta" class="form-control" rows="3" style="min-height: 60px;" ng-model="feedback_resposta" placeholder="Descreva a sua resposta" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" ng-if="dev_data[0].situacao == 1 ">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label>A resposta de {{destination_user}} para o seu motivo é:</label>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{user_response}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- justificativa -->
                                                            <div class="row" ng-hide="feedback_justificativa_div">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Justificativa</label>
                                                                        <textarea name="feedback_justificativa" id="feedback_justificativa" class="form-control" rows="3" style="min-height: 60px;" ng-model="feedback_justificativa" placeholder="Descreva a sua justificativa" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" ng-if="dev_data[0].situacao == 5 ">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label>A justificativa de {{destination_user}} para a rejeição foi:</label>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{user_justificativa}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- justificativa -->

                                                            <div class="row" ng-repeat="questionerio in devquestions" ng-if="devquestions.length>0 && dev_data[0].situacao == 0  && dev_data[0].expired == false && devAuthorised" ng-hide="feedback_rejeitado">
                                                                <div class="col-md-12" ng-if="questionerio.type=='q'" ng-include="'devtextQuestion'" required></div>
                                                                <div class="col-md-12" ng-if="questionerio.type=='e'" ng-include="'devstarRating'" required></div>
                                                                <div class="col-md-12" ng-if="questionerio.type=='c'" ng-include="'devheartRating'" required></div>
                                                                <div class="col-md-12" ng-if="questionerio.type=='o'" ng-include="'devmultipleAnswer'" required></div>
                                                            </div>
                                                            <div class="row" ng-repeat="question in view_questions" ng-if="view_questions.length>0  && dev_data[0].situacao == 1 " ng-hide="feedback_rejeitado">
                                                                <div class="col-md-12" ng-if="question.type=='q'" ng-include="'viewdevtextQuestion'"></div>
                                                                <div class="col-md-12" ng-if="question.type=='e'" ng-include="'viewdevstarRating'"></div>
                                                                <div class="col-md-12" ng-if="question.type=='c'" ng-include="'viewdevheartRating'"></div>
                                                                <div class="col-md-12" ng-if="question.type=='o'" ng-include="'viewdevmultipleAnswer'"></div>
                                                            </div>
                                                            <div class="row" ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="custom_radio custom_radio_sidebyside">
                                                                            <label>Compartilhamento:</label>
                                                                            <br>
                                                                            <div class="radio_dv" style="    margin: 0 10px 0 7px;">
                                                                                <input type="radio" id="send_message0" ng-model="crossfeeds_status" class="public_mode " name="crossfeeds_status" value="0">
                                                                                <label for="send_message0" style="font-size: 13px">Privado</label>
                                                                            </div>
                                                                            <div class="radio_dv">
                                                                                <input type="radio" id="send_message1" ng-model="crossfeeds_status" class="public_mode " name="crossfeeds_status" value="1">
                                                                                <label for="send_message1" style="font-size: 13px">Público</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" ng-if="dev_data[0].situacao == 1 ">
                                                                <div class="col-md-12" ng-if="dev_data[0].public == 1 || dev_data[0].private == 1">
                                                                    <div class="form-group activity_custom">
                                                                        <label>Compartilhamento:</label>
                                                                        <ul>
                                                                            <li ng-if="dev_data[0].public == 1"> Público</li>
                                                                            <li ng-if="dev_data[0].private == 1"> Privado</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <!-- <input ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)" type="submit" class="btn btn-primary save" ng-click="updateFeedbackPrivacyStatus(dev_data[0].id)" value="Salvar"> -->

                                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)" ng-click="updateFeedbackPrivacyStatus(dev_data[0].id)">Salvar</button>

                                                            <!--<button type="button" class="btn btn-primary save" ng-click="returnToMainCareerCrossfeed()">Cancelar</button>-->
                                                            <input type="submit" class="btn btn-primary" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised" ng-click="ShowHideJustificativa('cancelarRejeicao');" value="Cancelar" ng-hide="feedback_justificativa_div" id="cancelarRejeicao">
                                                            <input type="submit" class="rejeitar" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised" ng-click="" id="completeDeclineFeedback" value="Confirmar Rejeição" ng-hide="feedback_justificativa_div">
                                                            <input type="submit" class="rejeitar" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised" ng-click="declineFeedback(dev_data[0].id);ShowHideJustificativa('');" value="Rejeitar" ng-model="justificativa" ng-hide="feedback_rejeitado">
                                                            <input style="margin-left: 20px;" type="submit" class="btn btn-primary save" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised" ng-click="replyNewDevelopmentUpdate()" value="Enviar" ng-hide="feedback_rejeitado">
                                                        </div>
                                                    </form>

                                                    <script type="text/ng-template" id="devtextQuestion">
                                                        <div class="customs_labels">
                                                        <label>{{questionerio.question}}</label>
                                                        <div class="clearfix"></div>
                                                        <input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                                                        <textarea name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Descreva sua resposta aqui" style=" min-height: 60px;"></textarea>
                                                        
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="devmultipleAnswer">
                                                        <label>{{questionerio.question}}</label>
                                                        <div class="clearfix"></div>
                                                        <div class="">
                                                            <div class="" ng-repeat="answer in questionerio.options">
                                                             <div class="container-block">
                                                                <input type="radio" name="answers[multiresponse_answer][{{questionerio.id_pergunta}}]"  autocomplete="off" ng-value="answer.id" id="dev_ch{{ answer.id }}">
                                                                <label for="dev_ch{{ answer.id }}" class="font-grey"> {{answer.answer}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="devstarRating">
                                                        <div class="custom_label_dv">
                                                        <label>{{questionerio.question}}</label>
                                                        <div class="clearfix"></div>
                                                        <input type="hidden" name="answers[rating_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                                                        <div class="custom_radio_lable">
                                                            <label for="ds_rad_{{questionerio.id_pergunta}}_1">
                                                                <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="ds_rad_{{questionerio.id_pergunta}}_1" ng-click="getDevStarValue(questionerio.id_pergunta,1)">
                                                                <span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <div class="custom_radio_lable">
                                                            <label for="ds_rad_{{questionerio.id_pergunta}}_2">
                                                                <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="ds_rad_{{questionerio.id_pergunta}}_2" ng-click="getDevStarValue(questionerio.id_pergunta,2)">
                                                                <span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <div class="custom_radio_lable">
                                                            <label for="ds_rad_{{questionerio.id_pergunta}}_3">
                                                                <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="ds_rad_{{questionerio.id_pergunta}}_3" ng-click="getDevStarValue(questionerio.id_pergunta,3)">
                                                                <span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <div class="custom_radio_lable">
                                                            <label for="ds_rad_{{questionerio.id_pergunta}}_4">
                                                                <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="ds_rad_{{questionerio.id_pergunta}}_4" ng-click="getDevStarValue(questionerio.id_pergunta,4)">
                                                                <span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <div class="custom_radio_lable">
                                                            <label for="ds_rad_{{questionerio.id_pergunta}}_5">
                                                                <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="ds_rad_{{questionerio.id_pergunta}}_5" ng-click="getDevStarValue(questionerio.id_pergunta,5)">
                                                                <span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
                                                            </label>
                                                        </div>
                                                        <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="ds_rad_{{questionerio.id_pergunta}}_6">
                                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6" id="ds_rad_{{questionerio.id_pergunta}}_6" ng-click="getDevStarValue(questionerio.id_pergunta,6)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="ds_rad_{{questionerio.id_pergunta}}_7">
                                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7" id="ds_rad_{{questionerio.id_pergunta}}_7" ng-click="getDevStarValue(questionerio.id_pergunta,7)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="ds_rad_{{questionerio.id_pergunta}}_8">
                                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8" id="ds_rad_{{questionerio.id_pergunta}}_8" ng-click="getDevStarValue(questionerio.id_pergunta,8)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="ds_rad_{{questionerio.id_pergunta}}_9">
                                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9" id="ds_rad_{{questionerio.id_pergunta}}_9" ng-click="getDevStarValue(questionerio.id_pergunta,9)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="ds_rad_{{questionerio.id_pergunta}}_10">
                                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10" id="ds_rad_{{questionerio.id_pergunta}}_10" ng-click="getDevStarValue(questionerio.id_pergunta,10)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_10">&nbsp;</span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="devheartRating">
                                                        <div class="custom_label_dv star">
                                                            <label>{{questionerio.question}}</label>
                                                            <div class="clearfix"></div>
                                                            <input type="hidden" name="answers[heart_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                                                            <div class="custom_radio_lable">
                                                                <label for="dh_rad21_{{questionerio.id_pergunta}}_1">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="dh_rad21_{{questionerio.id_pergunta}}_1" ng-click="getDevHeartValue(questionerio.id_pergunta,1)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="dh_rad22_{{questionerio.id_pergunta}}_2">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="dh_rad22_{{questionerio.id_pergunta}}_2" ng-click="getDevHeartValue(questionerio.id_pergunta,2)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="dh_rad23_{{questionerio.id_pergunta}}_3">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="dh_rad23_{{questionerio.id_pergunta}}_3" ng-click="getDevHeartValue(questionerio.id_pergunta,3)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="dh_rad24_{{questionerio.id_pergunta}}_4">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="dh_rad24_{{questionerio.id_pergunta}}_4" ng-click="getDevHeartValue(questionerio.id_pergunta,4)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="dh_rad25_{{questionerio.id_pergunta}}_5">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="dh_rad25_{{questionerio.id_pergunta}}_5" ng-click="getDevHeartValue(questionerio.id_pergunta,5)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="dh_rad25_{{questionerio.id_pergunta}}_6">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6"  id="dh_rad25_{{questionerio.id_pergunta}}_6" ng-click="getDevHeartValue(questionerio.id_pergunta,6)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="dh_rad25_{{questionerio.id_pergunta}}_7">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7"  id="dh_rad25_{{questionerio.id_pergunta}}_7" ng-click="getDevHeartValue(questionerio.id_pergunta,7)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="dh_rad25_{{questionerio.id_pergunta}}_8">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8"  id="dh_rad25_{{questionerio.id_pergunta}}_8" ng-click="getDevHeartValue(questionerio.id_pergunta,8)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="dh_rad25_{{questionerio.id_pergunta}}_9">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9"  id="dh_rad25_{{questionerio.id_pergunta}}_9" ng-click="getDevHeartValue(questionerio.id_pergunta,9)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                                                <label for="dh_rad25_{{questionerio.id_pergunta}}_10">
                                                                    <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10"  id="dh_rad25_{{questionerio.id_pergunta}}_10" ng-click="getDevHeartValue(questionerio.id_pergunta,10)">
                                                                    <span class="span_{{questionerio.id_pergunta}}_10">&nbsp;</span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="viewdevtextQuestion">
                                                        <div class="form-group">
                                                            <label for="user-name" class="control-label ng-binding ng-scope">{{$index+1}}. {{question.question}}</label>
                                                            <div class="viewupdateanswer">{{question.answers[0].resposta_qualitativa}}</div>
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="viewdevmultipleAnswer">
                                                        <div class="form-group">
                                                            <label for="user-name" class="control-label ng-binding ng-scope">{{$index+1}}. {{question.question}}</label>
                                                            <div class="clear"></div>
                                                            <div class="viewupdateanswer">
                                                            <ul>
                                                                <li ng-repeat="answer in question.answers">
                                                                    {{answer.response}}
                                                                </li>
                                                            </ul>
                                                            </div>
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="viewdevstarRating">
                                                        <div class="custom_label_dv">
                                                        <label>{{$index+1}}. {{question.question}}</label>
                                                        <div class="viewupdateanswer" style="padding-left: 15px">
                                                            <div class="custom_radio_lable">
                                                                <label for="star_rad_{{question.id_pergunta}}_1">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==1" value="1" id="star_rad_{{question.id_pergunta}}_1" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=1}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="star_rad_{{question.id_pergunta}}_2">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2" id="star_rad_{{question.id_pergunta}}_2" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=2}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="star_rad_{{questionerio.id_pergunta}}_3">
                                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3" id="star_rad_{{questionerio.id_pergunta}}_3" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=3}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="star_rad_{{question.id_pergunta}}_4">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4" id="star_rad_{{question.id_pergunta}}_4" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=4}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="star_rad_{{question.id_pergunta}}_5">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5" id="star_rad_{{question.id_pergunta}}_5" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=5}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="star_rad_{{question.id_pergunta}}_6">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==6" value="6" id="star_rad_{{question.id_pergunta}}_6" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=6}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="star_rad_{{question.id_pergunta}}_7">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==7" value="7" id="star_rad_{{question.id_pergunta}}_7" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=7}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="star_rad_{{question.id_pergunta}}_8">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==8" value="8" id="star_rad_{{question.id_pergunta}}_8" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=8}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="star_rad_{{question.id_pergunta}}_9">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==9" value="9" id="star_rad_{{question.id_pergunta}}_9" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=9}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="star_rad_{{question.id_pergunta}}_10">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==10" value="10" id="star_rad_{{question.id_pergunta}}_10" disabled>
                                                                    <span ng-class="{'also-checked':question.answers[0].rating_score>=10}">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="viewdevheartRating">
                                                        <div class="custom_label_dv star">
                                                            <label>{{$index+1}}. {{question.question}}</label>
                                                            <div class="viewupdateanswer" style="padding-left: 15px">
                                                                <div class="custom_radio_lable">
                                                                    <label for="view_rad21_{{question.id_pergunta}}_1">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==1" value="1"  id="view_rad21_{{question.id_pergunta}}_1" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=1}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable">
                                                                    <label for="view_rad22_{{question.id_pergunta}}_2">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2"  id="view_rad22_{{question.id_pergunta}}_2" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=2}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable">
                                                                    <label for="view_rad23_{{question.id_pergunta}}_3">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3"  id="view_rad23_{{question.id_pergunta}}_3" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=3}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable">
                                                                    <label for="view_rad24_{{question.id_pergunta}}_4">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4"  id="view_rad24_{{question.id_pergunta}}_4" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=4}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable">
                                                                    <label for="view_rad25_{{question.id_pergunta}}_5">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5"  id="view_rad25_{{question.id_pergunta}}_5" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=5}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                    <label for="view_rad25_{{question.id_pergunta}}_6">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==6" value="6"  id="view_rad25_{{question.id_pergunta}}_6" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=6}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                    <label for="view_rad25_{{question.id_pergunta}}_7">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==7" value="7"  id="view_rad25_{{question.id_pergunta}}_7" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=7}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                    <label for="view_rad25_{{question.id_pergunta}}_8">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==8" value="8"  id="view_rad25_{{question.id_pergunta}}_8" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=8}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                    <label for="view_rad25_{{question.id_pergunta}}_9">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==9" value="9"  id="view_rad25_{{question.id_pergunta}}_9" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=9}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                    <label for="view_rad25_{{question.id_pergunta}}_10">
                                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==10" value="10"  id="view_rad25_{{question.id_pergunta}}_10" disabled>
                                                                        <span ng-class="{'also-checked':question.answers[0].rating_score>=10}">&nbsp;</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </script>
                                                </div>
                                                <!--dblock_body END-->

                                            </div>
                                            <!--dblock END-->
                                        </div>



                                    </div>
                                </div>

                                <div class="tab-pane  fade in " id="tab_Atividades">
                                    <div class="row" ng-if="user.activities == 1">

                                        <div class="peopleDevelopmentView">
                                            <div class="form_add" style="padding-top:0px;padding-bottom:0px">
                                                <div class="form_add add_new_function_title pdlr-0 style2" style="padding: 0px 0 4px;">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <h4>Iniciativas OKR</h4>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="tooltip_wrapper">
                                                                <div class="tooltip" style="padding-bottom: 15px;">
                                                                    <div class="egg-arrow"></div>
                                                                    <span class="tooltiptext">Tenha um acompanhamento simples e rápido de todas as atividades que você é responsável ou contribuidor.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="form_add perfil_career_ativaded" id="div-4">
                                                <form id="form-search-my-activities">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="filter_form_view view_dsds">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">Período de Tempo:</label>
                                                                        <div class="filters_view">
                                                                            <select id="ativade_time" name="ativade_time" class="" multiple="multiple">
                                                                                <option value="last_month">Último Mês</option>
                                                                                <option value="last_week">Última Semana</option>
                                                                                <option value="current_quarter">Trimestre Atual</option>
                                                                                <option value="all">Todo Período</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <label>Situação</label>
                                                                        <span class="all-selector" style="float: none">
                                                                            <div class="container-block">
                                                                                <input type="checkbox" id="chekd_situcao">
                                                                                <label for="chekd_situcao">Todas Situação</label>
                                                                            </div>
                                                                        </span>
                                                                        <div class="filters_view">
                                                                            <select id="ativade_situacao" name="ativade_situacao[]" class="" multiple="multiple">
                                                                                <option value="0">Não Iniciada</option>
                                                                                <option value="1">Finalizada</option>
                                                                                <option value="2">Em andamento</option>
                                                                                <option value="3">Cancelada</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="clr_filters pull-right">
                                                                            <div class="filter_btn">
                                                                                <a href="javascript:void(0)" class="clean_filter" ng-click="clearfilterCareerBlockAtivade()" style="padding: 6px 10px;">Limpar Filtros</a>
                                                                                <button type="button" class="apply_filter" ng-click="filterCareerBlockAtivade()" style="padding: 6px 10px;">Aplicar Filtro</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-if="user.activities == 1">
                                        <div ng-class="{'col-sm-12':viewFullActivity,'col-sm-7':!viewFullActivity}">
                                            <div class="dblock">
                                                <div class="dblock_body carrier_block2" id="carrier_block2_hgt_activities">
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="activities_career.length>0" ng-repeat="activity in activities_career" ng-click="activity_details_career(activity.id)">
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                <span ng-if="activity.coresponsavel ==1" class="corresponsavelcircle"></span>
                                                                <div class="ng-binding"><a href="javascript:void(0)" style="color: #33a9f4">{{activity.title}}</a></div>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main width-15 pdl-30">
                                                                <div class="ng-binding">Prazo: {{activity.fim}}</div>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main pdl-30" style="width: 22% !important">
                                                                <div class="ng-binding">Situação:
                                                                    <strong ng-if="activity.situacao == 0">Não Iniciada</strong>
                                                                    <strong ng-if="activity.situacao == 1">Finalizada</strong>
                                                                    <strong ng-if="activity.situacao == 2">Em andamento</strong>
                                                                    <strong ng-if="activity.situacao == 3">Cancelada</strong>
                                                                </div>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main width-15 pdl-30">
                                                                <div class="progress_wrap">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{activity.percentage}}%;" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                    <span class="ng-binding push-right">{{activity.percentage}}%</span>
                                                                </div>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main width-10 pdl-30">
                                                                <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ activity.tatic_id }}/{{ activity.key_id }}/{{ activity.id }}"><i class="fa fa-link"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!activities_career.length">
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30">
                                                                <div class="ng-binding">Não foram encontradas atividades</div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                </div>
                                                <!--dblock_body carrier_block2 END-->
                                            </div>
                                            <!--dblock_body END-->
                                        </div>
                                        <!--dblock END-->
                                        <div class="col-sm-5" ng-if="!viewFullActivity">
                                            <div class="dblock" ng-if="activityViewDetail">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)" ng-click="returnToMainCareerActivity()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block2 career_sidebar_details" id="crossfeed_activity_block_hgt" style="min-height: 400px;height: auto">
                                                    <form id="form-new-development">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Nome do Resultado Chave:</label>
                                                                        <div class="viewupdateanswer_dp">{{activity_detail.key_name}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Nome da Atividade:</label>
                                                                        <div class="viewupdateanswer_dp">{{activity_detail.title}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Descrição:</label>
                                                                        <div class="viewupdateanswer_dp">{{activity_detail.description}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Prazo:</label>
                                                                        <div class="viewupdateanswer_dp">{{activity_detail.fim}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Responsavel:</label>
                                                                        <div class="viewupdateanswer_dp">{{activity_detail.responsible_user[0].name}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <button type="button" class="btn btn-primary save" ng-click="returnToMainCareerActivity()">Voltar</button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade in" id="newUpdateModal">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title">You Time</h4>
                    </div>
                    <div class="modal-body modal-body-popup" style="padding: 10px;">
                        <div class="model_bod">
                            <form id="new_update" ng-submit="submitUpdateForm()" method="post">
                                <input type="hidden" name="questioerio_id" value="{{questions[1]}}">
                                <input type="hidden" name="id_protocolo" value="{{id_protocolo}}">
                                <input type="hidden" name="id_user" value="{{youTimeUser}}">
                                <input type="hidden" name="id_cycle" value="{{youTimeCycle}}">
                                <div class="autalizacao-body overflow_dv" style="max-height: 500px;height:auto;">
                                    <div class="row" style="margin: 0px;" ng-repeat="questionerio in questions[0]" ng-if="questions[0].length > 0">
                                        <div class="col-md-12" ng-if="questionerio.type == 'q'" ng-include="'textQuestion'"></div>
                                        <div class="col-md-12" ng-if="questionerio.type == 'e'" ng-include="'starRating'"></div>
                                        <div class="col-md-12" ng-if="questionerio.type == 'c'" ng-include="'heartRating'"></div>
                                        <div class="col-md-12" ng-if="questionerio.type == 't'" ng-include="'competencia'"></div>
                                    </div>
                                    <div class="row" ng-if="questions[0].length < 1">
                                        <div class="col-md-12">
                                            <div class="customs_labels"><strong>Não foram encontradas perguntas.</strong></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div style="margin-bottom: 25px;">&nbsp;
                                    <div class="right_footers">
                                        <div class="form-group pull-right">
                                            <button ng-click="" type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                                           
                                            <button ng-if="questions[0].length > 0 && !isDisabled" type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <script type="text/ng-template" id="competencia">
                                <div ng-if="!isDisabled" class="obj-select" style="position: relative; margin-bottom: 10px;">
                                <select class="competencia_update" data-question-id="{{questionerio.id_pergunta}}" >
                                    <option ng-repeat="competencia in competenciaFromUsuarioByCycle" value="{{competencia.id_competencia}}">{{competencia.nome_competencia}}</option>
                                </select>
                            </div>
                            <input type="hidden" name="answers[competencia][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                            <div ng-repeat="competencia in questions_competencias_array[questionerio.id_pergunta]" style="margin-top: 10px;">
                                <label class="control-label">{{competencia.comp_name}}</label>
                                <input type="hidden" name="answers[competencia][{{questionerio.id_pergunta}}][ids][]" value="{{competencia.comp_id}}">
                                <textarea name="answers[competencia][{{questionerio.id_pergunta}}][descriptions][]" placeholder="Descreva sua resposta aqui" class="mb0" ng-disabled="isDisabled">{{competencia.answer}}</textarea>
                                <div class="clear h-10"></div>
                            </div>
                        </script>
                            <script type="text/ng-template" id="textQuestion">
                                <div class="customs_labels bottom-space">
                                <div class="col-md-8">
                                    <div class="update-label">
                                        <label>{{questionerio.question}}</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                            <textarea ng-click="caracteresRestantes({{questionerio.id_pergunta}})" name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Descreva sua resposta aqui" class="mb0" ng-disabled="isDisabled" maxlength="9000" ng-trim="false">{{textAnswers[questionerio.id_pergunta]}}</textarea>
                            <div class="clear h-10"></div>
                        </script>
                            <script type="text/ng-template" id="starRating">
                                <div class="custom_label_dv">
                                <label>{{questionerio.question}}</label>
                                <input type="hidden" name="answers[rating_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                                <div class="custom_radio_lable">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_1">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="sm_rad_{{questionerio.id_pergunta}}_1" ng-click="getStarValue(questionerio.id_pergunta,1)">
                                        <span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_2">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="sm_rad_{{questionerio.id_pergunta}}_2" ng-click="getStarValue(questionerio.id_pergunta,2)">
                                        <span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_3">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="sm_rad_{{questionerio.id_pergunta}}_3" ng-click="getStarValue(questionerio.id_pergunta,3)">
                                        <span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_4">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="sm_rad_{{questionerio.id_pergunta}}_4" ng-click="getStarValue(questionerio.id_pergunta,4)">
                                        <span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_5">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="sm_rad_{{questionerio.id_pergunta}}_5" ng-click="getStarValue(questionerio.id_pergunta,5)">
                                        <span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_6">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6" id="sm_rad_{{questionerio.id_pergunta}}_6" ng-click="getStarValue(questionerio.id_pergunta,6)">
                                        <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_7">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7" id="sm_rad_{{questionerio.id_pergunta}}_7" ng-click="getStarValue(questionerio.id_pergunta,7)">
                                        <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_8">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8" id="sm_rad_{{questionerio.id_pergunta}}_8" ng-click="getStarValue(questionerio.id_pergunta,8)">
                                        <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_9">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9" id="sm_rad_{{questionerio.id_pergunta}}_9" ng-click="getStarValue(questionerio.id_pergunta,9)">
                                        <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="sm_rad_{{questionerio.id_pergunta}}_10">
                                        <input ng-if="!isDisabled" name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10" id="sm_rad_{{questionerio.id_pergunta}}_10" ng-click="getStarValue(questionerio.id_pergunta,10)">
                                        <span class="span_{{questionerio.id_pergunta}}_10">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="clear h-10"></div>
                            </div>
                        </script>
                            <script type="text/ng-template" id="heartRating">
                                <div class="custom_label_dv star">
                                <label>{{questionerio.question}}</label>
                                <input type="hidden" name="answers[heart_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">

                                <div class="custom_radio_lable">
                                    <label for="smhr_rad21_{{questionerio.id_pergunta}}_1">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="smhr_rad21_{{questionerio.id_pergunta}}_1" ng-click="getHeartValue(questionerio.id_pergunta,1)">
                                        <span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad22_{{questionerio.id_pergunta}}_2">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="smhr_rad22_{{questionerio.id_pergunta}}_2" ng-click="getHeartValue(questionerio.id_pergunta,2)">
                                        <span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad23_{{questionerio.id_pergunta}}_3">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="smhr_rad23_{{questionerio.id_pergunta}}_3" ng-click="getHeartValue(questionerio.id_pergunta,3)">
                                        <span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad24_{{questionerio.id_pergunta}}_4">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="smhr_rad24_{{questionerio.id_pergunta}}_4" ng-click="getHeartValue(questionerio.id_pergunta,4)">
                                        <span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_5">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="smhr_rad25_{{questionerio.id_pergunta}}_5" ng-click="getHeartValue(questionerio.id_pergunta,5)">
                                        <span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_6">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6"  id="smhr_rad26_{{questionerio.id_pergunta}}_6" ng-click="getHeartValue(questionerio.id_pergunta,6)">
                                        <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_7">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7"  id="smhr_rad27_{{questionerio.id_pergunta}}_7" ng-click="getHeartValue(questionerio.id_pergunta,7)">
                                        <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_8">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8"  id="smhr_rad28_{{questionerio.id_pergunta}}_8" ng-click="getHeartValue(questionerio.id_pergunta,8)">
                                        <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_9">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9"  id="smhr_rad29_{{questionerio.id_pergunta}}_9" ng-click="getHeartValue(questionerio.id_pergunta,9)">
                                        <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_10">
                                        <input ng-if="!isDisabled" name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10"  id="smhr_rad210_{{questionerio.id_pergunta}}_10" ng-click="getHeartValue(questionerio.id_pergunta,10)">
                                        <span class="span_{{questionerio.id_pergunta}}_10">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="clear h-10"></div>
                            </div>
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="" id="carreira-modal" style="
    display: none;
    height: 100%;
    width: 100%;
    top: 0px;
    z-index: 1000;
    left: 0px;
    position: absolute;">
            <div class="" ng-click="closeCarreira()" style="width: 100%; height: 100%; background: #0000004d; display: block; position: absolute; top: 0px; left: 0px;"></div>
            <div class="" style="width: 90%;
    display: block;
    margin: 84px auto;
    z-index: 5000;
    position: relative;
    ">
                <iframe src="{{carreiraUrl}}" style="width: 100%;
    border: none !important;
    height: 800px;
    background: white;
    border-radius: 6px;"></iframe>
                <div class="close-btn" ng-click="closeCarreira()" style="    position: absolute;
    top: 4px;
    right: 20px;
    font-size: 26px;
    text-transform: uppercase;
    cursor: pointer;
    color: #b6b6b6;
    width: 25px;
    height: 25px;">X</div>
            </div>
        </div>



    </div>