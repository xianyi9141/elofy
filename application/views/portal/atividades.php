
<!-- Perfil -->

<?php
$obj = &get_instance();
$social_logins = $obj->session->userdata('check_social_logins');

if (!empty($social_logins) && isset($social_logins['image']) && !empty($social_logins['image'])) {
    $obj->session->unset_userdata('check_social_logins', '');
    ?>
    <script>
        setTimeout(function(){
        $('#profilepic-modal').modal('show');
        }, 2000);
    </script>
<?php }
?>
<!-- Perfil -->
<div ng-controller="profileCtrl" class="hide" ng-class="{'hide': !user.id}">

    <div class="activi-section">
        <div ng-show="profiletab == 5" id="carreertab" >
            <div class="carrier_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dblock">
                            <div class="dblock_body">
                                <div class="user-dtls">
                                    <figure>
                                        <img class="img-circle" alt="{{career_details.name}}" src="{{career_details.xs_image}}" style="height: 50px;width: 50px" >
                                    </figure>
                                    <div class="user-label ng-binding">{{career_details.name}}</div>
                                    <div class="job-fnc ng-binding">Cargo: <span class="ng-binding">{{career_details.cargo?career_details.cargo:'&nbsp;'}}</span></div>
                                    <div class="job-date ng-binding">E-mail: <span class="ng-binding">{{career_details.email}}</span></div>
                                    <div class="team-name ng-binding">Nome Time: <span class="ng-binding">{{career_details.team?career_details.team:'&nbsp;'}}</span></div>
                                    <div class="select_usr">
                                        <select class="career_users"  id="career_users" ng-model="carrer_user_id" >
                                            <option value="">Escolha um usuário</option>
                                            <option ng-repeat="user in users_combo" value="{{user.id}}">{{user.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--dblock_body END-->
                    </div>
                    <!--dblock END-->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="refreshCareerBlock()">
                                    <a href="#tab_Performance_time" data-toggle="tab">Performance do Time</a>
                                </li>
                                <?php if ($this->session->userdata('performance_pessoal') == 1) { ?>
                                    <li class="active" ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="openSubCareerBlock('performance')">
                                        <a href="#tab_Performance" data-toggle="tab">Performance Pessoal</a>
                                    </li>
                                <?php } ?>
                                <li ng-click="refreshCareerBlock()" class="<?php
                                if ($this->session->userdata('performance_pessoal') != 1) {
                                    echo 'active';
                                }
                                ?>">
                                    <a href="#tab_Objetivos" data-toggle="tab">Objetivos</a>
                                </li>
                                <?php if ($this->session->userdata('crossfeed') == 1) { ?>
                                    <li ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="refreshCareerBlock()">
                                        <a href="#tab_Crossfeeds" data-toggle="tab">Crossfeeds</a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li ng-click="refreshCareerBlock()">
                                    <a href="#tab_Atividades" data-toggle="tab">Contribuições com o negócio</a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane fade in" id="tab_Performance_time">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div style="max-width:300px; margin-top: 5px; margin-bottom: 15px;" >
                                                <label for="performance-cycle">Trocar de cíclo</label>
                                                <select style="margin:5px;" id="performance-cycle-select-time" name="performance-cycle" class="" data-placeholder="Trocar Ciclo">
                                                    <option ng-repeat="cycle in allCycles" value="{{cycle.id_revisao_ciclo}}" ng-selected="$index = 0">{{cycle.nome_ciclo}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <pre>{{usersFromGestor | json}}</pre> -->

                                    <div class="users_tab_list" ng-if="usersFromGestor.length > 0">
                                        <table style="width:100%" class="table table-bordered">
                                            <tr>
                                                <th>Usuário</th>
                                                <th>Média Final</th>
                                                <th>Liberado</th>
                                                <th>Ação</th>
                                            </tr>
                                            <tr ng-repeat="user in usersFromGestor">
                                                <td>
                                                    <img src=""  ng-if="user.image" ng-src="{{ user.image}}" class="img-circle" width="36" height="36" style="min-width: 36px; min-height: 36px; float:left; margin-right:15px;" data-toggle="tooltip" data-placement="top" title="{{ user.name}}" />
                                                    <span class="image-replace" ng-if="!user.image" style="min-width: 36px; min-height: 36px; border-radius: 36px; padding: 4px; margin-right: 15px; float: left;">{{ initials(user.name)}}</span>

                                                    <div class="user-specs" style="margin-top: 10px;">
                                                        <div class="user-name">{{user.name}}</div>
                                                    </div>
                                                </td>
                                                <td style="width:120px;">
                                                    {{user.media_final}}
                                                </td>
                                                <td style="width:80px; text-align:center;">
                                                    <i ng-if="user.liberado == 1" class="fa fa-check-circle" style="font-size:16px"></i>
                                                    <i ng-if="user.liberado == 0" class="fa fa-times-circle" style="font-size:16px"></i>
                                                </td>
                                                <td style="width:200px;">
                                                    <button ng-if="user.liberado == 1" style="margin-top:4px; width:100%;" class="clean_filter" ng-click="revokeEvaluationAccess(user)">Desfazer Liberação</button>
                                                    <button ng-if="user.liberado == 0" style="margin-top:4px; width:100%;" class="clean_filter" ng-click="grantEvaluationAccess(user)">Liberar</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div ng-if="!usersFromGestor || usersFromGestor.length == 0" class="no-register">Sem usuários avaliados para este ciclo</div>
                                    <div class="clearfix"></div>
                                </div>




                                <div class="tab-pane fade in <?php
                                if ($this->session->userdata('performance_pessoal') == 1) {
                                    echo 'active';
                                }
                                ?>" id="tab_Performance">
                                    <div class="row" ng-show="allCycles && allCycles.length > 0">
                                        <div class="col-md-8">
                                            <div>Entenda sua nota</div>
                                            <div class="clearfix"></div>
                                            <div class="grade-explanation grade-explanation-4" ng-if="getCycleById(selectedPerformanceCycle).nota_maxima == 4">
                                                <div class="block">
                                                    <span class="grade">1 - 1,74</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.FIRST_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.FIRST_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">1,75 - 2,49</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.SECOND_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.SECOND_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">2,5 - 3,24</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.THIRD_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.THIRD_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">3,25 - 4</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.FOURTH_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FOUR_RULER.FOURTH_EXPLANATION" | translate }}</div>
                                                </div>
                                            </div>
                                            <div class="grade-explanation grade-explanation-5" ng-if="getCycleById(selectedPerformanceCycle).nota_maxima == 5">
                                                <div class="block">
                                                    <span class="grade">1 - 1,9</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.FIRST_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.FIRST_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">2 - 2,9</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.SECOND_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.SECOND_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">3 - 3,9</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.THIRD_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.THIRD_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">4 - 4.9</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.FOURTH_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.FOURTH_EXPLANATION" | translate }}</div>
                                                </div>
                                                <div class="block">
                                                    <span class="grade">5</span>
                                                    <span class="title"><span>{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.FIFTH_TITLE" | translate }}</span></span>
                                                    <div class="explanation">{{ "PERFORMANCE_PESSOAL.EXPLANATION_GRADE.FIVE_RULER.FIFTH_EXPLANATION" | translate }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div style="max-width:300px; margin-top: 5px; margin-bottom: 15px;" >
                                                <label for="performance-cycle">Trocar de cíclo</label>
                                                <select style="margin:5px;" id="performance-cycle-select" name="performance-cycle" class="" data-placeholder="Trocar Ciclo">
                                                    <option value="" selected>Escolha um ciclo</option>
                                                    <option ng-repeat="cycle in allCycles" value="{{cycle.id_revisao_ciclo}}">{{cycle.nome_ciclo}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" ng-if="     (!(scoresFromCycle ||
                                                    (valoresFromUsuarioByCycle && valoresFromUsuarioByCycle.length > 0) ||
                                                    (potencialFromUsuarioByCycle && potencialFromUsuarioByCycle.length > 0) ||
                                                    (resultadoFromUsuarioByCycle && resultadoFromUsuarioByCycle.length > 0) ||
                                                    (competenciaFromUsuarioByCycle && competenciaFromUsuarioByCycle.length > 0) ||
                                                    (outraetapaFromUsuarioByCycle && outraetapaFromUsuarioByCycle.length > 0))) && (allCycles && allCycles.length > 0)"
                                             style="text-align: center; margin:10px;">Resultados indisponíveis para o cíclo selecionado</div>
                                        <div class="col-md-12" style="text-align: center; margin:10px;" ng-if="allCycles && allCycles.length == 0">Usuário escolhido não possui ciclos de avaliação</div>

                                        <div class="col-md-6" ng-show="performanceAverageScores.length > 0 && allCycles && allCycles.length > 0" >

                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="icon-chart-line"></i></span> Médias por cíclos</div>
                                                </div>
                                                <br>
                                                <canvas id="cicles_average_chart1"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-6" ng-show="scoresFromCycle && allCycles && allCycles.length > 0">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span> Visão Geral</div>
                                                </div>
                                                <br>
                                                <div class="panel-options">
                                                    <div id="chart-bar-vertical"></div>
                                                    <canvas id="overal_view_chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" ng-show="competenciaFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0" >
                                            <div class="container border:none !important;" ng-show="competenciaFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0" >
                                                <div class="panel panel-primary box">
                                                    <div class="panel-heading">
                                                        <div class=""><span class="round yellow"><i class="icon-chart-bar"></i></span> Competências</div>
                                                    </div>
                                                    <br>
                                                    <div  id="chartjs-radar" style=" margin:0 auto">
                                                        <canvas id="competencia_chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-if="valoresFromUsuarioByCycle && valoresFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> Valores</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="valores-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Nome do Valor</th>
                                                                <th ng-if="score_2_visibility" style="width: 100px;">Gestor</th>
                                                                <th ng-if="score_1_visibility" style="width: 100px;">Auto</th>
                                                                <th ng-if="score_3_visibility" style="width: 100px;">Média Pares</th>
                                                                <th ng-if="score_4_visibility" style="width: 100px;">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in valoresFromUsuarioByCycle">
                                                                <td>{{val.nome_valor}}</td>
                                                                <td ng-click="openValuesComents(val.id_valores, 2, $index)" ng-if="score_2_visibility">{{val.score_2| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
                                                                <td ng-click="openValuesComents(val.id_valores, 1, $index)" ng-if="score_1_visibility">{{val.score_1| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
                                                                <td ng-click="openValuesComents(val.id_valores, 3, $index)" ng-if="score_3_visibility">{{val.score_3| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
                                                                <td ng-click="openValuesComents(val.id_valores, 4, $index)" ng-if="score_4_visibility">{{val.score_4| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div id="valuesComments">
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
                                    <div class="row" ng-if="potencialFromUsuarioByCycle && potencialFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> Potencial</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="potencial-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Pergunta</th>
                                                                <th ng-if="potencial_2_visibility" style="width: 100px;">Gestor</th>
                                                                <th ng-if="potencial_1_visibility" style="width: 100px;">Auto</th>
                                                                <th ng-if="potencial_3_visibility" style="width: 100px;">Média Pares</th>
                                                                <th ng-if="potencial_4_visibility" style="width: 100px;">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in potencialFromUsuarioByCycle">
                                                                <td>{{val.pergunta}}</td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 2)" ng-if="potencial_2_visibility">{{val.score_2| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 1)" ng-if="potencial_1_visibility">{{val.score_1| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 3)" ng-if="potencial_3_visibility">{{val.score_3| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
                                                                <td ng-click="openPotencialComents(val.id_pergunta, 4)" ng-if="potencial_4_visibility">{{val.score_4| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="potencialComments">
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
                                    <div class="row" ng-if="resultadoFromUsuarioByCycle && resultadoFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> Resultado</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="resultado-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Pergunta</th>
                                                                <th ng-if="resultado_2_visibility" style="width: 100px;">Gestor</th>
                                                                <th ng-if="resultado_1_visibility" style="width: 100px;">Auto</th>
                                                                <th ng-if="resultado_3_visibility" style="width: 100px;">Média Pares</th>
                                                                <th ng-if="resultado_4_visibility" style="width: 100px;">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in resultadoFromUsuarioByCycle">
                                                                <td>{{val.pergunta}}</td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 2, $index, $event)" ng-if="resultado_2_visibility">{{val.score_2| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 1, $index, $event)" ng-if="resultado_1_visibility">{{val.score_1| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 3, $index, $event)" ng-if="resultado_3_visibility">{{val.score_3| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
                                                                <td ng-click="openResultadoComents(val.id_pergunta, 4, $index, $event)" ng-if="resultado_4_visibility">{{val.score_4| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div id="resultadoComments">
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
                                    <div class="row" ng-if="competenciaFromUsuarioByCycle && competenciaFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> Competência</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="competencia-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Competência</th>
                                                                <th ng-if="competencia_2_visibility" style="width: 100px;">Gestor</th>
                                                                <th ng-if="competencia_1_visibility" style="width: 100px;">Auto</th>
                                                                <th ng-if="competencia_3_visibility" style="width: 100px;">Média Pares</th>
                                                                <th ng-if="competencia_4_visibility" style="width: 100px;">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in competenciaFromUsuarioByCycle"  data-toggle="tooltip" data-placement="top" title={{val.description}}>
                                                                <td>{{val.nome_competencia}}</td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 2, $index)" ng-if="competencia_2_visibility">{{val.score_2| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 1, $index)" ng-if="competencia_1_visibility">{{val.score_1| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 3, $index)" ng-if="competencia_3_visibility">{{val.score_3| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
                                                                <td ng-click="openCompetenciaComents(val.id_competencia, 4, $index)" ng-if="competencia_4_visibility">{{val.score_4| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div id="competenciaComments">
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
                                    <div class="row" ng-if="outraetapaFromUsuarioByCycle && outraetapaFromUsuarioByCycle.length > 0 && allCycles && allCycles.length > 0">
                                        <div class="col-md-12">

                                            <div class="panel panel-primary box">
                                                <div class="panel-heading">
                                                    <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> {{ outraetapaFromUsuarioByCycle[0].nome_fase}}</div>
                                                    <br>
                                                </div>
                                                <div class="panel-options">
                                                    <table class="table table-bordered" id="outraetapa-table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Competência</th>
                                                                <th ng-if="outraetapa_2_visibility" style="width: 100px;">Gestor</th>
                                                                <th ng-if="outraetapa_1_visibility" style="width: 100px;">Auto</th>
                                                                <th ng-if="outraetapa_3_visibility" style="width: 100px;">Média Pares</th>
                                                                <th ng-if="outraetapa_4_visibility" style="width: 100px;">Média Equipe</th>
                                                            </tr>
                                                            <tr ng-repeat="val in outraetapaFromUsuarioByCycle">
                                                                <td>{{val.pergunta}}</td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 2)" ng-if="outraetapa_2_visibility">{{val.score_2| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 1)" ng-if="outraetapa_1_visibility">{{val.score_1| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 3)" ng-if="outraetapa_3_visibility">{{val.score_3| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
                                                                <td ng-click="openOutraEtapaComents(val.id_pergunta, 4)" ng-if="outraetapa_4_visibility">{{val.score_4| number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div id="outraetapaComments">
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
                                }
                                ?>" id="tab_Objetivos">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dblock no-shadow">
                                                <div class="dblock_body pb0" style="margin: 0 0 15px;">
                                                    <div class="tooltip_wrapper">
                                                        <div class="tooltip">
                                                            <div class="egg-arrow"></div>
                                                            <span class="tooltiptext">Planeje o seu desenvolvimento pessoal através de objetivos, Meta e atividades.</span>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)" class="add_career" ng-click="add_novo_dp_goal()">Novo Objetivo</a>
                                                    <!--<h2 class="h2-inline">Objetivos</h2>-->

                                                </div>
                                                <div class="peopleDevelopmentView">
                                                    <div class="form_add perfil_career_ativaded" id="div-4">
                                                        <form id="form-search-my-activities" class="ng-pristine ng-valid">
                                                            <div class="row">
                                                                <div class="">
                                                                    <div class="filter_form_view view_dsds mr-0">
                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <label class="control-label">Situação:</label>
                                                                                <div class="filters_view">
                                                                                    <select  class="active_status_career "  id="active_status_career" ng-model="filter_by_status" multiple="multiple">
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
                                                                            <div class="col-sm-3">
                                                                                <div class="clr_filters pull-right">
                                                                                    <div class="filter_btn">
                                                                                        <a href="javascript:void(0)" class="clean_filter" ng-click="clearfilterCareerBlock()" style="padding: 6px 10px;">Limpar Filtros</a>
                                                                                        <button type="button" class="apply_filter" ng-click="filterCareerBlock()" style="padding: 6px 10px;">Aplicar Filtro</button>
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
                                            <div class="dblock no-border">
                                                <div class="dblock_body carrier_block" id="carrier_block_hgt" style="min-height: 540px;height: auto;">
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="career_details.dp_goals.length > 0" ng-repeat="goal in career_details.dp_goals" ng-click="get_goal_details_by_id(goal.id_dp_objetivo)">
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="carrier_row">
                                                                <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                                <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                                </svg>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main width-55 pdl-30">
                                                                <label class="ng-binding">{{goal.nome_dp_objetivo}}</label>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main6 width-15">
                                                                <label class="ng-binding"> Prazo: {{goal.date_limit}} </label>
                                                            </div>
                                                            <div class="bntsh right-side width-10">
                                                                <a href="javascript:void(0)" class="showhide-panel" ng-click="showHideMeta(goal.id_dp_objetivo)"><i class="fa fa-angle-up" id="icon_dp_{{goal.id_dp_objetivo}}"></i>
                                                                </a>
                                                            </div>
                                                        </div> 
                                                        <div class="clearfix"></div>
                                                        <div class="carrier_block_body section_meta_{{goal.id_dp_objetivo}}" ng-if="goal.meta.length > 0" ng-repeat="meta_data in goal.meta" style="cursor: pointer;">
                                                            <div class="Dvtab_colums_dv clm_main" style="width: 75%">
                                                                <label class="left-space">Meta de Controle:<span class="ng-binding"> {{meta_data.name}}</span> </label>
                                                            </div>
                                                            <div class="Dvtab_colums_dv pull-right text-right pd0 edit-action">
                                                                <!--  <a href="javascript:void(0)" ng-if="meta_data.activity_comp_status == 'true'" class="finish-icon clr-green"><i class="fa fa-check"></i></a>-->
                                                                <a href="javascript:void(0)" ng-if="meta_data.situacao == 1" class="finalizado-btn clr-green">Finalizado</a>
                                                                <a href="javascript:void(0)" ng-if="meta_data.situacao == 0" class="finalizado-btn clr-yellow">Em progresso</a>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!career_details.dp_goals.length" >
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
                                                                <div class="ng-binding">No data found</div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <!--dblock_body carrier_block END-->
                                            </div>
                                            <!--dblock_body END-->
                                        </div>
                                        <!--dblock END-->
                                        <div class="col-sm-5" ng-if="!viewInFullSize" >
                                            <div class="dblock career_sidebar_details" style="min-height: 540px;height: auto;" ng-if="editMode" >
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)"  ng-click="returnToMainCareer()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block" >
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
                                                                                    <span class="icon-svg  pdr-0">
                                                                                        <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                        <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <input id="nome_obj_glob" name="nome_obj_glob" type="text" class="form-control border-effect  no-bg-clr " ng-model="nome_obj_glob" placeholder="informe o nome de seu objetivo">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Prazo</label>
                                                                                <div class="form-control-wrapper">
                                                                                    <span class="icon-svg pdr-0">
                                                                                        <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                                        <rect x="16" y="16" width="2" height="2"></rect>
                                                                                        <rect x="20" y="16" width="2" height="2"></rect>
                                                                                        <rect x="20" y="20" width="2" height="2"></rect>
                                                                                        <rect x="16" y="20" width="2" height="2"></rect>
                                                                                        <rect x="8" y="20" width="2" height="2"></rect>
                                                                                        <rect x="8" y="24" width="2" height="2"></rect>
                                                                                        <rect x="16" y="24" width="2" height="2"></rect>
                                                                                        <rect x="12" y="16" width="2" height="2"></rect>
                                                                                        <rect x="12" y="20" width="2" height="2"></rect>
                                                                                        <rect x="12" y="24" width="2" height="2"></rect>
                                                                                        <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <input id="date_limit_glob" name="date_limit_glob" type="text" class="form-control  border-effect no-bg-clr data" ng-model="date_limit_glob" placeholder="Prazo">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Cargo Relacionado</label>
                                                                                <select id="cargo_objevio_rht" name="cargo_objevio_rht" class="form-control" ng-model="CargosNotAddedSelected" ng-options="cargo.name for cargo in CargosNotAdded track by cargo.id" ng-disabled="CargoNotAddedSelected.length >= 1"></select>
                                                                                <span class="corresponsaveis-selected" ng-repeat="selected in CargoNotAddedSelected" ng-click="removeCargoAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="cargos[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                                                                <p ng-if="CargoNotAddedSelected.length > 0">Descrição :- {{ CargoNotAddedSelected[0].description}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Situacao</label>
                                                                                <select class="" id="active_status_rht" name="active_status_rht"  ng-model="selectedStatusRht">
                                                                                    <option value="1">Ativo</option>
                                                                                    <option value="0">Inativo</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <span class="frm_lbl" ng-if="goal_details.meta.length > 0">&nbsp;</span>
                                                            <div class="row" ng-if="goal_details.meta.length > 0" ng-repeat="meta in goal_details.meta">
                                                                <div class="col-md-12">
                                                                    <div class="career-profile-meta">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Meta</label>
                                                                            <div class="form-control-wrapper">
                                                                                <div class="checkbox abs-checkbox">
                                                                                    <input type="checkbox" id="id01_{{meta.id}}" value="1" name="goal_meta_name[{{meta.id}}][situacao]" class="styled-checkbox" ng-checked="meta.situacao == 1">
                                                                                    <label for="id01_{{meta.id}}"> </label>
                                                                                </div>
                                                                                <div class="bntsh right-side">
                                                                                    <a href="javascript:void(0)" class="showhide-panel" ng-click="showHideActivities(meta.id)"><i class="fa fa-angle-down" id="icon_dp_activity_{{meta.id}}"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <span class="icon-svg">
                                                                                    <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                    <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <input  class="form-control  border-effect" type="text" placeholder="Informe o nome do Meta de controle." name="goal_meta_name[{{meta.id}}][name]" value="{{meta.name}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hide" id="section_meta_activities_{{meta.id}}">
                                                                        <div class="section_meta_activities">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="career-profile-meta">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Nome da Atividade</label>
                                                                                            <div class="form-control-wrapper">
                                                                                                <span class="icon-svg">
                                                                                                    <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                                    <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                                    </svg>
                                                                                                </span>
                                                                                                <input  class="form-control border-effect " type="text" placeholder="Nome da Atividade" id="activity_name_meta_gb_{{meta.id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group form-inline">
                                                                                        <label class="control-label">Data Fim</label>
                                                                                        <div class="form-control-wrapper">
                                                                                            <span class="icon-svg no-leftspace">
                                                                                                <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                                                <rect x="16" y="16" width="2" height="2"></rect>
                                                                                                <rect x="20" y="16" width="2" height="2"></rect>
                                                                                                <rect x="20" y="20" width="2" height="2"></rect>
                                                                                                <rect x="16" y="20" width="2" height="2"></rect>
                                                                                                <rect x="8" y="20" width="2" height="2"></rect>
                                                                                                <rect x="8" y="24" width="2" height="2"></rect>
                                                                                                <rect x="16" y="24" width="2" height="2"></rect>
                                                                                                <rect x="12" y="16" width="2" height="2"></rect>
                                                                                                <rect x="12" y="20" width="2" height="2"></rect>
                                                                                                <rect x="12" y="24" width="2" height="2"></rect>
                                                                                                <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                                                </svg>
                                                                                            </span>
                                                                                            <input  class="form-control  border-effect fix-wd data" type="text" placeholder="Prazo" id="activity_end_meta_gb_{{meta.id}}">
                                                                                        </div>
                                                                                        <button type="button" class="add_meta_btn" ng-click="addNewMinorActivity(meta.id)">Ok</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" ng-repeat="activity in meta.activities">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-control-wrapper">
                                                                                        <span class="icon-svg">
                                                                                            <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                            <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                            </svg>
                                                                                        </span>
                                                                                        <input  class="form-control border-effect " type="text" placeholder="Nome da Atividade" name="activity_name_added[{{activity.id}}][name]"  id="activity_name_added_{{activity.id}}" value="{{activity.name}}" ng-blur="updateactivityDp(activity.id, 'name')">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group form-inline">
                                                                                        <div class="form-control-wrapper">
                                                                                            <span class="icon-svg no-leftspace">
                                                                                                <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                                                <rect x="16" y="16" width="2" height="2"></rect>
                                                                                                <rect x="20" y="16" width="2" height="2"></rect>
                                                                                                <rect x="20" y="20" width="2" height="2"></rect>
                                                                                                <rect x="16" y="20" width="2" height="2"></rect>
                                                                                                <rect x="8" y="20" width="2" height="2"></rect>
                                                                                                <rect x="8" y="24" width="2" height="2"></rect>
                                                                                                <rect x="16" y="24" width="2" height="2"></rect>
                                                                                                <rect x="12" y="16" width="2" height="2"></rect>
                                                                                                <rect x="12" y="20" width="2" height="2"></rect>
                                                                                                <rect x="12" y="24" width="2" height="2"></rect>
                                                                                                <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                                                </svg>
                                                                                            </span>
                                                                                            <input  class="form-control  border-effect fix-wd data" type="text" placeholder="Prazo" value="{{activity.activity_end}}" name="activity_name_added[{{activity.id}}][end_date]" id="activity_date_added_{{activity.id}}" ng-blur="updateactivityDp(activity.id, 'date')">
                                                                                        </div>
                                                                                        <div class="act_btn">
                                                                                            <div class="custom_chkbox">
                                                                                                <input name="activity_name_added[{{activity.id}}][situacao]" id="activity_situacao_{{activity.id}}" type="checkbox" ng-click="updateactivityDp(activity.id, 'situacao')" ng-checked="activity.situacao == 1">
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
                                                        <div class="meta_save_btn">
                                                            <button type="button" class="btn btn-primary save" ng-click="add_new_dp_meta()">Adicionar Meta</button>
                                                            <button type="submit" class="btn btn-primary save" ng-click="saveGlobalDpValues()">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                            <div class="dblock" ng-if="addMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)"  ng-click="returnToMainCareer()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block career_sidebar_details" id="carrier_block_hgt_add" style="min-height: 513px; height: auto">
                                                    <form id="objecive_dp_form" style="border:none">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="career-profile-meta">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nome do Objetivo</label>
                                                                        <div class="form-control-wrapper">
                                                                            <span class="icon-svg">
                                                                                <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <input id="nome_obj" name="nome_obj" type="text" class="form-control  border-effect" ng-model="nome_obj" placeholder="Digite seu Objetivo">
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
                                                                        <span class="icon-svg">
                                                                            <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                            <rect x="16" y="16" width="2" height="2"></rect>
                                                                            <rect x="20" y="16" width="2" height="2"></rect>
                                                                            <rect x="20" y="20" width="2" height="2"></rect>
                                                                            <rect x="16" y="20" width="2" height="2"></rect>
                                                                            <rect x="8" y="20" width="2" height="2"></rect>
                                                                            <rect x="8" y="24" width="2" height="2"></rect>
                                                                            <rect x="16" y="24" width="2" height="2"></rect>
                                                                            <rect x="12" y="16" width="2" height="2"></rect>
                                                                            <rect x="12" y="20" width="2" height="2"></rect>
                                                                            <rect x="12" y="24" width="2" height="2"></rect>
                                                                            <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <input id="date_limit" name="date_limit" type="text" class="form-control  border-effect data" ng-model="date_limit" placeholder="Prazo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Cargos: <span class="grey-font-objective">Mostrar descricoes de cargo </span></label>
                                                                    <select id="cargo_objevio" name="cargo_objevio" class="form-control" ng-model="CargosNotAddedSelected" ng-options="cargo.name for cargo in CargosNotAdded track by cargo.id" ng-disabled="CargoNotAddedSelected.length >= 1"></select>
                                                                    <span class="corresponsaveis-selected" ng-repeat="selected in CargoNotAddedSelected" ng-click="removeCargoAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="cargos[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                                                    <p ng-if="CargoNotAddedSelected.length > 0">Description :- {{ CargoNotAddedSelected[0].description}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Situacao:</label>
                                                                    <select class="" id="active_status" name="active_status"  ng-model="selectedStatus">
                                                                        <option value="1">Ativo</option>
                                                                        <option value="0">Inativo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <button type="button" class="btn btn-primary save"  ng-click="cancelToObjectivos()">Cancelar</button>
                                                            <input type="submit" class="btn btn-primary save" ng-click="addDpObjectivo()" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                            <div class="dblock" ng-if="addMetaMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)"  ng-click="returnToMainCareer()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block" id="carrier_block_hgt_ss">
                                                    <form id="addmeta_dp_form" style="border:none">
                                                        <input id="id_meta_obj_glob" name="id_meta_obj_glob" type="hidden" class="form-control">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="career-profile-meta">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nome do Objetivo</label>
                                                                        <div class="form-control-wrapper">
                                                                            <span class="icon-svg">
                                                                                <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <input id="nome_obj_goal" name="nome_obj_goal" type="text" class="form-control  border-effect" ng-model="nome_obj_goal" placeholder="Objective name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Prazo</label>
                                                                    <div class="form-control-wrapper">
                                                                        <span class="icon-svg">
                                                                            <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                            <rect x="16" y="16" width="2" height="2"></rect>
                                                                            <rect x="20" y="16" width="2" height="2"></rect>
                                                                            <rect x="20" y="20" width="2" height="2"></rect>
                                                                            <rect x="16" y="20" width="2" height="2"></rect>
                                                                            <rect x="8" y="20" width="2" height="2"></rect>
                                                                            <rect x="8" y="24" width="2" height="2"></rect>
                                                                            <rect x="16" y="24" width="2" height="2"></rect>
                                                                            <rect x="12" y="16" width="2" height="2"></rect>
                                                                            <rect x="12" y="20" width="2" height="2"></rect>
                                                                            <rect x="12" y="24" width="2" height="2"></rect>
                                                                            <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <input id="date_limit_obj_meta" name="date_limit_obj_meta" type="text" class="form-control  border-effect data" ng-model="date_limit_obj_meta" placeholder="Prazo">
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
                                                                            <span class="icon-svg">
                                                                                <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <input id="nome_meta_obj" name="nome_meta_obj" type="text" class="form-control  border-effect" ng-model="nome_meta_obj" placeholder="Nome da Meta">
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
                                                                                <span class="icon-svg">
                                                                                    <svg class="Icon DescriptionIcon SingleTaskPane-descriptionIcon" viewBox="0 0 32 32">
                                                                                    <path d="M26,8H2V6h24V8z M22,12H2v2h20V12z M28,18H2v2h26V18z M24,24H2v2h22V24z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <input  class="form-control border-effect " type="text" placeholder="Nome da Atividade" id="activity_name_meta">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 activitydate">
                                                                    <div class="form-group form-inline">
                                                                        <label class="control-label">Data Fim</label>
                                                                        <div class="form-control-wrapper">
                                                                            <span class="icon-svg">
                                                                                <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                                <rect x="16" y="16" width="2" height="2"></rect>
                                                                                <rect x="20" y="16" width="2" height="2"></rect>
                                                                                <rect x="20" y="20" width="2" height="2"></rect>
                                                                                <rect x="16" y="20" width="2" height="2"></rect>
                                                                                <rect x="8" y="20" width="2" height="2"></rect>
                                                                                <rect x="8" y="24" width="2" height="2"></rect>
                                                                                <rect x="16" y="24" width="2" height="2"></rect>
                                                                                <rect x="12" y="16" width="2" height="2"></rect>
                                                                                <rect x="12" y="20" width="2" height="2"></rect>
                                                                                <rect x="12" y="24" width="2" height="2"></rect>
                                                                                <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <input  class="form-control  border-effect fix-wd data" type="text" placeholder="Prazo" id="activity_end_meta">
                                                                        </div>
                                                                        <button type="button" class="add_meta_btn" ng-click="addNewDpMinorActivity()">Ok</button>
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
                                                                            <span class="icon-svg">
                                                                                <svg class="Icon CalendarIcon" viewBox="0 0 32 32">
                                                                                <rect x="16" y="16" width="2" height="2"></rect>
                                                                                <rect x="20" y="16" width="2" height="2"></rect>
                                                                                <rect x="20" y="20" width="2" height="2"></rect>
                                                                                <rect x="16" y="20" width="2" height="2"></rect>
                                                                                <rect x="8" y="20" width="2" height="2"></rect>
                                                                                <rect x="8" y="24" width="2" height="2"></rect>
                                                                                <rect x="16" y="24" width="2" height="2"></rect>
                                                                                <rect x="12" y="16" width="2" height="2"></rect>
                                                                                <rect x="12" y="20" width="2" height="2"></rect>
                                                                                <rect x="12" y="24" width="2" height="2"></rect>
                                                                                <path d="M22,2V0h-2v2h-8V0h-2v2H2v30h28V2H22z M28,30H4V12h24V30z M28,10H4V4h6v2h2V4h8v2h2V4h6V10z"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <input  class="form-control  border-effect fix-wd data" type="text" placeholder="Prazo" value="{{activity.activity_end}}">
                                                                        </div>
                                                                        <div class="act_btn">
                                                                            <a href="javascript:void(0)" ng-click="DeleteMinorDpActivity(activity.index)"><i class="fa fa-times"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <button type="button" class="btn btn-primary save"  ng-click="cancelToObjectivos()">Cancelar</button>
                                                            <input type="submit" class="btn btn-primary save" ng-click="addDpMeta()" value="Salvar">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  fade in " id="tab_Crossfeeds" ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" >
                                    <div class="row" ng-if="user.crossfeed == 1">
                                        <div class="peopleDevelopmentView">

                                            <div class="form_add" id = "div-4" style="padding: 0px 20px;">
                                                <form id="form-search-my-activities">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="dblock no-shadow">
                                                                <div class="dblock_body pb0">
                                                                    <div class="tooltip_wrapper">
                                                                        <div class="tooltip">
                                                                            <div class="egg-arrow"></div>
                                                                            <span class="tooltiptext">Peça Crossfeed's para qualquer pessoa da sua empresa e tenha as respostas dos seus colegas sobre como melhorar o seu desenvolvimento individual.</span>
                                                                        </div>
                                                                    </div>
                                                                    <a href="javascript:void(0)" class="add_career" ng-click="NewDevelopment()">Novo Crossfeed</a>

                                                                </div>
                                                                <!--dblock_body END-->
                                                            </div>
                                                            <!--dblock END-->
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="filter_form_view view_dsds">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label>Situação</label>
                                                                        <div class="filters_view">
                                                                            <select id="crossfeed_status" name="crossfeed_status" class="" multiple="multiple">
                                                                                <option value="expirado">Expirado</option>
                                                                                <option value="finalizado">Finalizado</option>
                                                                                <option value="aguardando">Aguardando</option>
                                                                                <option value="declined">Rejeitado</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label>Período de Tempo: </label>
                                                                        <div class="filters_view">
                                                                            <select id="crossfeed_time" name="crossfeed_time" class=""  multiple="multiple">
                                                                                <option value="last_month">Último Mês</option>
                                                                                <option value="last_week">Última Semana</option>
                                                                                <option value="current_quarter">Trimestre Atual</option>
                                                                                <option value="all">Todo Período</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <label>Tipo</label>
                                                                        <div class="filters_view">
                                                                            <select id="crossfeed_type" name="crossfeed_type" class=""  multiple="multiple">
                                                                                <option value="received">Recebidos</option>
                                                                                <option value="asked">Solicitados</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="clr_filters">
                                                                            <div class="filter_btn">
                                                                                <a href="javascript:void(0)" class="clean_filter" ng-click="clearfilterCareerBlockCrossfeed()" style="padding: 6px 10px;">Limpar Filtros</a>
                                                                                <button type="button" class="apply_filter" ng-click="filterCareerBlockCrossfeed()" style="padding: 6px 10px;">Aplicar Filtro</button>
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
                                        <div ng-class="{'col-sm-12':viewFullCrossfeed,'col-sm-7':!viewFullCrossfeed}">
                                            <div class="dblock no-border">
                                                <div class="dblock_body carrier_block" id="carrier_block_hgt_cross" style="min-height: 480px;height: auto">
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="carreers.length > 0" ng-repeat="carreer in carreers">
                                                        <div class="elofy_table_row db_obj" >
                                                            <div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback, carreer.feedback_type)">
                                                                <div class="feed_name">Solicitados  para:</div>
                                                                <div class="feed_profile">
                                                                    <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.xs_image">{{ initials(carreer.nome_usuario)}}</span>
                                                                        <img ng-if="carreer.xs_image" ng-src="{{ carreer.xs_image}}" class="img-circle ng-scope" alt="{{ initials(carreer.nome_usuario)}}" width="30" height="30">
                                                                    </div>
                                                                    <span class="usr_names">{{ carreer.nome_usuario}} </span>
                                                                </div>
                                                            </div>
                                                            <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback, carreer.feedback_type)">
                                                                <span class="usr_dates">Prazo: {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                            </div>
                                                            <div class="col-md-2" ng-click="showDevelopmentUpdate(carreer.id_feedback, carreer.feedback_type)">
                                                                <span class="usr_teams"  ng-if="viewFullCrossfeed">Time: {{ carreer.team}}</span>
                                                            </div>
                                                            <div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                <div class="right-feed-col">
                                                                    <div class="feed-time"  ng-if="viewFullCrossfeed">{{carreer.posted_date| amUtc | amTimeAgo:true}} </div>
                                                                    <span >
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 1" class="finalizado-btn clr-green ng-scope">Finalizado</a>
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-yellow ng-scope">Aguardando</a>
                                                                        <a href="javascript:void(0)" ng-if="carreer.expired == 1 && carreer.situation == 0" class="finalizado-btn clr-red ng-scope">Expirado</a>
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-blue ng-scope">Rejeitado</a>

                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="received_carreers.length > 0" ng-repeat="carreer in received_carreers">
                                                        <div class="elofy_table_row db_obj" >
                                                            <div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback, carreer.feedback_type)">
                                                                <div class="feed_name">Recebido de : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                                <div class="feed_profile">
                                                                    <div class="feed-user_thumb"> <span class="image-replace float-none" ng-if="!carreer.from_user_xs_image">{{ initials(carreer.from_user)}}</span>
                                                                        <img ng-if="carreer.from_user_xs_image" ng-src="{{ carreer.from_user_xs_image}}" class="img-circle ng-scope" alt="{{ initials(carreer.from_user)}}" width="30" height="30">
                                                                    </div>
                                                                    <span class="usr_names">{{ carreer.from_user}} </span>
                                                                </div>
                                                            </div>
                                                            <div ng-class="{'col-md-2':viewFullCrossfeed,'col-md-3':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback, carreer.feedback_type)">
                                                                <span class="usr_dates">Prazo: {{ carreer.prazo | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <span class="usr_teams" ng-if="viewFullCrossfeed">Time: {{ carreer.team}}</span>
                                                            </div>
                                                            <div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
                                                                <div class="right-feed-col">
                                                                    <div class="feed-time" ng-if="viewFullCrossfeed">{{carreer.posted_date| amUtc | amTimeAgo:true}} </div>
                                                                    <span ng-click="showDevelopmentUpdate(carreer.id_feedback, carreer.feedback_type)">
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 1"  class="finalizado-btn clr-green ng-scope">Finalizado</a>
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && !carreer.expired" class="finalizado-btn clr-yellow ng-scope">Aguardando</a>
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 0 && carreer.expired == 1" class="finalizado-btn clr-red ng-scope">Expirado</a>
                                                                        <a href="javascript:void(0)" ng-if="carreer.situation == 5" class="finalizado-btn clr-blue ng-scope">Rejeitado</a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!received_carreers.length && !carreers.length" >
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
                                                                <div class="ng-binding">Não foram encontrados dados</div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <!--dblock_body carrier_block END-->
                                            </div>
                                            <!--dblock_body END-->
                                        </div>
                                        <!--dblock END-->
                                        <div class="col-sm-5" ng-if="!viewFullCrossfeed">
                                            <div class="dblock career_sidebar_details" ng-if="addCrossfeedMode" style="min-height: 480px;height: auto;">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)"  ng-click="returnToMainCareerCrossfeed()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block" id="crossfeed_block_hgt">
                                                    <form id="form-new-development">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Para quem você deseja solicitar esse Crossfeed?</label>
                                                                        <select name="feedbacktouser" id="feedbacktouser_cross" ng-model="feedbacktouser" class="form-control" >
                                                                            <option value="{{searchuser.id}}" ng-repeat="searchuser in users" >{{ searchuser.name}} </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group ">
                                                                        <label>Estou pedindo esse CrossFeed pra você porque...</label>
                                                                        <textarea name="feedback_description" id="feedback_description_cross" class="form-control" rows="3" style="height: 50px;min-height: 50px" ng-model="feedback_description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group question_dev">
                                                                        <label style="text-transform:none;">Questionário a ser enviado:</label>
                                                                        <p ng-repeat="question in devQuestions">{{$index + 1}}. {{question.question}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Insira um prazo para que seu Crossfeed seja respondido...</label>
                                                                        <input name="feedback_deadline" id="feedback_deadline_cross" ng-model="feedback_deadline" type="text" class="form-control data" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <input name="id_questionario_dev" id="id_questionario_dev" value="{{id_questionario_dev}}" ng-model="id_questionario_dev" type="hidden" class="form-control" >
                                                        <div class="meta_save_btn">
                                                            <button type="button" class="btn btn-primary save" ng-click="returnToMainCareerCrossfeed()">Cancelar</button>
                                                            <input type="submit" class="btn btn-primary save" ng-if="!showViewModel" ng-click="submitNewDevelopmentUpdate()" value="Salvar">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--dblock_body END-->
                                            </div>
                                            <!--dblock END-->
                                            <div class="dblock" ng-if="editCrossfeedMode">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)"  ng-click="returnToMainCareerCrossfeed()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block career_sidebar_details" id="reply-crossfeed" style="min-height: 370px;height: auto">
                                                    <form id="form-reply-development">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">Esse Crossfeed foi solicitado a você por...</label>
                                                                        <select name="feedbacktouser" id="feedbacktouser_reply" ng-model="feedbacktouser" class="form-control" ng-if="!showViewModel" >
                                                                            <option value="{{searchuser.id}}" ng-repeat="searchuser in users" >{{ searchuser.name}} </option>
                                                                        </select>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{destination_user}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label class="control-label">O motivo desse Crossfeed é...</label>
                                                                        <textarea name="feedback_description" id="feedback_description_reply" class="form-control" rows="3" style="height: 70px;" ng-if="!showViewModel" ng-model="feedback_description"></textarea>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_description}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div ng-if="feedback_type == 'sent'">
                                                                <div class="row" ng-if="(user.id != dev_data[0].id_usuario_solicitante) && dev_data[0].situacao == 0 && dev_data[0].expired == false">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group activity_custom">
                                                                            <label>O prazo inserido para a sua resposta é...</label>
                                                                            <input name="feedback_deadline" ng-if="!showViewModel" id="feedback_deadline_reply" ng-model="feedback_deadline" type="text" class="form-control data" >
                                                                            <div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_deadline| amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" ng-if="(user.id == dev_data[0].id_usuario_solicitante) && dev_data[0].situacao == 0">
                                                                    <div class="col-md-11">
                                                                        <div class="form-group activity_custom">
                                                                            <label>O prazo inserido para a sua resposta é...</label>
                                                                            <input name="feedback_deadline_date" id="feedback_deadline_date" ng-value="feedback_deadline_date" ng-model="feedback_deadline_date" type="text" class="form-control data" ng-class="data" style="padding-left: 10px">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div class="form-group" >
                                                                            <label>&nbsp;</label>
                                                                            <a href="javascript:void(0)" style="color: green" ng-click="updateFeedbackDeadline(dev_data[0].id)">
                                                                                <i class="fa fa-check"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div ng-if="feedback_type == 'received'">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group activity_custom">
                                                                            <label>O prazo inserido para a sua resposta é...</label>
                                                                            <input name="feedback_deadline" ng-if="!showViewModel" id="feedback_deadline_reply" ng-model="feedback_deadline" type="text" class="form-control data" >
                                                                            <div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_deadline| amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row" ng-if="!showViewModel">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label>Esse Crossfeed foi solicitado a...</label>
                                                                        <div class="viewupdateanswer_dp" >{{posted_date| amUtc | amTimeAgo:true}} ago</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <input name="id_questionario_dev" id="id_questionario_dev" value="{{id_questionario_dev}}" ng-model="id_questionario_dev" type="hidden" class="form-control" >
                                                            <input name="id_feedback_dev" id="id_feedback_dev" value="{{id_feedback_dev}}" ng-model="id_feedback_dev" type="hidden" class="form-control" >
                                                            <input name="id_feedback_destino" id="id_feedback_destino" value="{{id_feedback_destino}}" ng-model="id_feedback_destino" type="hidden" class="form-control" >
                                                            <div class="row" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Resposta</label>
                                                                        <textarea name="feedback_resposta" id="feedback_resposta" class="form-control" rows="3" style="min-height: 60px;" ng-model="feedback_resposta"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row"  ng-if="dev_data[0].situacao == 1">
                                                                <div class="col-md-12">
                                                                    <div class="form-group activity_custom">
                                                                        <label>A resposta de {{destination_user}} para o seu motivo é:</label>
                                                                        <div class="viewupdateanswer_dp" ng-if="showViewModel">{{user_response}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" ng-repeat="questionerio in devquestions" ng-if="devquestions.length > 0 && dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised">
                                                                <div class="col-md-12" ng-if="questionerio.type == 'q'" ng-include="'devtextQuestion'"></div>
                                                                <div class="col-md-12" ng-if="questionerio.type == 'e'" ng-include="'devstarRating'"></div>
                                                                <div class="col-md-12" ng-if="questionerio.type == 'c'" ng-include="'devheartRating'"></div>
                                                                <div class="col-md-12" ng-if="questionerio.type == 'o'" ng-include="'devmultipleAnswer'"></div>
                                                            </div>
                                                            <div class="row" ng-repeat="question in view_questions" ng-if="view_questions.length > 0 && dev_data[0].situacao == 1">
                                                                <div class="col-md-12" ng-if="question.type == 'q'" ng-include="'viewdevtextQuestion'"></div>
                                                                <div class="col-md-12" ng-if="question.type == 'e'" ng-include="'viewdevstarRating'"></div>
                                                                <div class="col-md-12" ng-if="question.type == 'c'" ng-include="'viewdevheartRating'"></div>
                                                                <div class="col-md-12" ng-if="question.type == 'o'" ng-include="'viewdevmultipleAnswer'"></div>
                                                            </div>
                                                            <div class="row" ng-if="(user.id == dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="custom_radio custom_radio_sidebyside">
                                                                            <label>Feedback status</label>
                                                                            <div class="radio_dv" style="    margin: 0 10px 0 7px;">
                                                                                <input type="radio" id="send_message0" ng-model="crossfeeds_status" class="public_mode " name="crossfeeds_status" value="0">
                                                                                <label for="send_message0" style="font-size: 13px">Private</label>
                                                                            </div>
                                                                            <div class="radio_dv">
                                                                                <input type="radio" id="send_message1" ng-model="crossfeeds_status" class="public_mode " name="crossfeeds_status" value="1">
                                                                                <label for="send_message1" style="font-size: 13px">Public</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" ng-if="dev_data[0].situacao == 1">
                                                                <div class="col-md-12" ng-if="dev_data[0].public == 1 || dev_data[0].private == 1">
                                                                    <div class="form-group activity_custom">
                                                                        <label>Status:</label>
                                                                        <ul>
                                                                            <li ng-if="dev_data[0].public == 1"> Public</li>
                                                                            <li ng-if="dev_data[0].private == 1"> Private</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="meta_save_btn">
                                                            <button  ng-if="(user.id == dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)" type="button" class="btn btn-primary save" ng-click="updateFeedbackPrivacyStatus(dev_data[0].id)">Salvar</button>
                                                            <button type="button" class="btn btn-primary save" ng-click="returnToMainCareerCrossfeed()">Cancelar</button>
                                                            <input type="submit" class="btn btn-primary save" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised" ng-click="replyNewDevelopmentUpdate()" value="Salvar">
                                                            <input type="submit" class="btn btn-danger" ng-if="dev_data[0].situacao == 0 && dev_data[0].expired == false && devAuthorised" ng-click="declineFeedback(dev_data[0].id)" value="Rejeitar">
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
                                            <div class="form_add" style="padding-top:0px;padding-bottom:0px" >
                                                <div class="form_add add_new_function_title pdlr-0 style2" style="padding: 0px 0 4px;" >
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
                                            <div class="form_add perfil_career_ativaded" id = "div-4">
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
                                                                            <select id="ativade_situacao" name="ativade_situacao[]" class=""  multiple="multiple">
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
                                                <div class="dblock_body carrier_block alfa-block" id="carrier_block_hgt_activities">
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="activities_career.length > 0" ng-repeat="activity in activities_career" ng-click="activity_details_career(activity.id)">
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
                                                                <span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle"></span>
                                                                <div class="ng-binding"><a href="javascript:void(0)" style="color: #33a9f4">{{activity.title}}</a></div>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main width-15 pdl-30" >
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
                                                            <div class="Dvtab_colums_dv clm_main width-15 pdl-30" >
                                                                <div class="progress_wrap">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{activity.percentage}}%;" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                    <span class="ng-binding push-right">{{activity.percentage}}%</span>
                                                                </div>
                                                            </div>
                                                            <div class="Dvtab_colums_dv clm_main width-10 pdl-30" >
                                                                <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ activity.tatic_id}}/{{ activity.key_id}}/{{ activity.id}}"><i class="fa fa-link"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                    <div class="carrier_panel clearfix hover-cls" ng-if="!activities_career.length" >
                                                        <div class="elofy_table_row db_obj">
                                                            <div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
                                                                <div class="ng-binding">Não foram encontradas atividades</div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <!--carrier Panel END-->
                                                </div>
                                                <!--dblock_body carrier_block END-->
                                            </div>
                                            <!--dblock_body END-->
                                        </div>
                                        <!--dblock END-->
                                        <div class="col-sm-5" ng-if="!viewFullActivity">
                                            <div class="dblock" ng-if="activityViewDetail">
                                                <div class="close_1">
                                                    <a class="close_main" href="javascript:void(0)"  ng-click="returnToMainCareerActivity()"><i class="fa fa-close"></i></a>
                                                </div>
                                                <div class="dblock_body carrier_block career_sidebar_details" id="crossfeed_activity_block_hgt" style="min-height: 400px;height: auto">
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
        <div ng-show="profiletab == 6" id="activitiestab" class="div_activity activity-area">
            <div class="row">
                <div class="welcome_user_box user-c-area user-alex-area">
                    <div class="user_profile position-abs col-md-3 col-sm-4 col-xs-12 activitist-left-block ">
                        <div class="ng-timeline-block">
                            <div class="col-sm-12 sidemenuAtividades" style="padding-left: 5px;">
                            <p>Quero ver por:</p>
                            </div>
                            <div class="col-sm-12" style="padding-left: 5px;">
                            <p class="visualiza hover-cls" ng-class="{'activity_keyresults_border':listType == 0}" ng-click="listActivities()" >
                                <span>Atividades</span>
                            </p>
                            </div>
                            <div class="col-sm-12" style="padding-left: 5px;">
                            <p class="visualiza hover-cls" ng-class="{'activity_keyresults_border':listType == 1}" ng-click="listHierarchy()" >
                                <span>Objetivos</span>
                            </p>
                             </div>
                             <div class="col-sm-12" style="padding-left: 5px;">
                            <p class="visualiza hover-cls" ng-class="{'activity_keyresults_border':listType == 2}" ng-click="listKeyResults()" >
                                <span>Resultados chave</span>
                            </p>
                        </div>
                        <div class="col-sm-12 sidemenuAtividades" style="padding-left: 5px;padding-top: 14px;">
                            <p>Quero filtrar por:</p>
                            </div>
                            <div style="display: flex; float: right;margin-bottom: 14px;margin-right: 10px; width: 240px;margin-top: 5px;" class="m-left">
                                <img height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_calendar.png">
                                <div class="select-wrapper pdl-50 calanderdropdown">
                                    <select class="select2" id="selectedCiclo" data-placeholder="Selecione um Ciclo">
                                        <option value="" disabled>Ciclo</option>
                                        <option value="{{ciclo.id_ciclo}}" ng-repeat="ciclo in fcycles">{{ ciclo.filtro }}</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display: flex; float: right;margin-bottom: 14px;margin-right: 10px;width: 240px;" class="m-left">
                                <img height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_calendar.png">
                                <div class="select-wrapper perioddropdown">
                                    <select id = "select_time" ng-model="slectedTime">
                                        <option value="last_month">Ultimo mês</option>
                                        <option value="last_week">Ultima semana</option>
                                        <option value="current_quarter">Trimestre atual</option>
                                        <option value="all">Todo</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display: flex; float: right;margin-bottom: 14px;margin-right: 10px;width: 240px;" class="m-left">
                                <img height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_time.png">
                                <div class="select-wrapper teamdropdown">
                                    <select class="select2" id="selectedTime" >
                                        <option selected="selected" value="">Todos Times</option>
                                        <option value="{{team.id}}" ng-repeat="team in filter_teams">{{ team.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display: flex; float: right;margin-bottom: 14px;margin-right: 10px;width: 240px;" class="m-left">
                                <img height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_responsavel.png">
                                <div class="responsaveldropdown" style="width: 100%">
                                    <select id="fresponsavel" data-placeholder="Selecione um Responsável" class="select2" ng-model="selectedResponsavelNotAdded" ng-options="responsavel.name for responsavel in responsavelsNotAdded track by responsavel.id">
                                        <option selected="selected" value="">Responsável</option>
                                    </select>
                                    <span class="corresponsaveis-selected" ng-repeat="selected in responsavelsNotAddedSelected" ng-click="removeResponsavelAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="corresponsaveis[]" class="form-control" readonly><i class="fa fa-remove" style="font-family: FontAwesome !important;"></i></span>
                                </div>
                            </div>
                            
                            <div style="display: flex; float: right;margin-bottom: 24px;margin-right: 10px;width: 240px; background-color: #fff;border-radius: 30px; padding: 5px; cursor: pointer;" class="m-left" ng-click = "changeShowFinalized()">
                                <div class="carrier_row" ng-class="{'not-finalized':!showFinalized, 'finalized':showFinalized}" >
                                    <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32" style="">
                                    <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                    </svg>
                                </div>
                                <div>
                                    <span style="padding-left: 15px;font-size: 14px;font-weight: normal;color: #666;">Exibir concluidas</span>
                                </div>
                            </div>
                            <div style="display: flex; float: right;margin-bottom: 20px;margin-right: 10px;width: 240px;border-radius: 30px;font-size: 14px;" class="m-left">
                                <div class="clr_filters col-sm-12" style="padding: 0px;">
                                    <a href="javascript:void(0)" class="clean_filter" ng-click="clearFilterActivity()">Limpar Filtros</a>
                                    <button class="apply_filter" ng-click="applyFilterActivity()">Aplicar Filtro</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" welcome_user_box_data col-md-9 col-sm-8 col-xs-12 header-search-area">

                        <div class="row mt-25">
                            <div class="col-md-3 col-sm-3" style="margin: 0 0 23px 0">
                                <a  ng-click="showNewPanel()" class="hdp"><img src="<?php echo base_url(); ?>assets/portal/img/ico_plus.png" height="20" width="auto"> Atividade</a>
                            </div>
                            <div class="col-md-2 col-sm-2" style="float: right; padding: 0px;" ng-show="listType == 0">
                                <div class="select-wrapper ordem">
                                    <select class="select2" id="selectedOrdem" >
                                        <option selected="selected" value="">selecione um ordem</option>
                                        <option value="0">Inicio Ascendente</option>
                                        <option value="1">Inicio Descendente</option>
                                        <option value="2">Fim Ascendente</option>
                                        <option value="3">Fim Descendente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div ng-show="showNewFlag" class="row dblock atividades_block atividades_top_form new_activity" style="position: relative;">
                            <form style="margin: 24px;margin-top: 30px;">   
                                <a ng-click="hideNewPanel()" style="float: right;margin-right: -55px;margin-top: -14px;cursor: pointer;position: absolute;right:70px; top: 30px;" class="remove-form">
                                <!-- <img src="<?php echo base_url()?>/assets/img/added/cross-btn.png" width="13px" height="13px"><i class="fa fa-close"></i> -->
                                <i class="fa fa-close"></i>
                            </a>
                                <div class="row m-0 mb-15">
                                    <div class="aplicar-label">Nome</div>
                                    <div class="all-selector filter_team filter-team-1 aplicar-filtro">
                                        <input type="text" required placeholder="Digite aqui o nome da atividade" class="form-control" id="nome">
                                    </div>
                                </div> 
                                <div class="row m-0 mb-15">
                                    <div class="aplicar-label">Descrição</div>
                                    <!-- <div class="all-selector filter_team filter-team-1 aplicar-filtro"> -->
                                    <div class="form-group all-selector filter_team filter-team-1 aplicar-filtro">
                                        <textarea style="border-radius: 5px !important;font-size:14px;color:#000000;" name="descricao" id="descricao" class="form-control" rows="3" ng-model="descricao" placeholder="Digite aqui a descrição da atividade" ></textarea>
                                        <!-- <input type="text" placeholder="Digite aqui a descrição da atividade" class="form-control" id="descricao"> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 m-0 mb-15">
                                        <div class="label_title">Objetivo</div>
                                        <div class="filters_view aplicar-filtro">
                                            <select style="border-radius: 30px !important;" id="new_objective" name="objective" class="select2" data-placeholder="" ng-options="obj.id as obj.nome for obj in objectives" ng-model="newObjective" ng-change="changeObj()"></select>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6 m-0 mb-15">
                                        <div class="label_title">Resultado-chave</div>
                                        <div class="filters_view aplicar-filtro">
                                            <select style="border-radius: 30px !important;" id="new_chave" name="chave" class="select2" data-placeholder="" ng-options="res.id as res.nome for res in resultados" ng-model="newChave"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 m-0 mb-15">
                                        <div class="label_title">Responsável</div>
                                        <div class="filters_view aplicar-filtro">
                                            <select style="border-radius: 30px !important;" id="new_responsavel" name="responsavel" class="select2" data-placeholder="" ng-options="user.id as user.name for user in responibles" ng-model="newResponsavel"></select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 m-0 mb-15" style="padding-right: 0px;">
                                            <div class="label_title" style="width: 55px">Início</div>
                                            <div class="all-selector filter_team filter-team-1 aplicar-filtro" style="width: 31%;padding-right: 10px;">
                                                <input id="new-date-init" type="text" required placeholder="Início" class="form-control data" value="">
                                                <div class=""> <a href="#"><i></i></a> </div>
                                            </div>
                                            <div class="label_title" style="width: 50px">Fim</div>
                                            <div class="all-selector filter_team filter-team-1 aplicar-filtro" style="width: 31%">
                                                <input id="new-date-fim" name="date-fim" type="text" required placeholder="Fim" class="form-control data" value="">
                                                <div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-2" style="float: right;">
                                        <div class="form-group">
                                            <button class="adicionar-btnx" style = "margin-top: 0px !important;border-radius: 10px;width: 60%;margin-left: 0px;margin-bottom:15px !important;" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="saveActivity()">Salvar</button>
                                        </div>
                                    </div>
                            </form> 

                        </div>

                        <div class="row dblock atividades_block rightbar-timeline" style="overflow-x: auto;float: left;width: 103%; box-shadow: none;padding: 0px 20px 40px 20px !important;min-height: 400px">
                            <div class="col-sm-12" ng-if="listType > 0">
                                <div class="" style="border:none !important;">
                                    <div class="dblock_body carrier_block alfa-block" style="border: 0px !important;overflow-y: auto;min-width: 797px;display: block;float: left;width: 100%;">
                                        <div ng-if="activities_hierarchy.length">
                                            <div ng-repeat="hierarchy in activities_hierarchy">
                                                <h4 class="col-blue atrasadas-label" ng-if="listType == 1" style="margin-bottom: 0px; margin-top:24px; padding-bottom: 24px; padding-left: 0px;">Objetivos</h4>
                                                <div class="carrier_panel clearfix ng-scope" ng-if="listType == 1">
                                                    <div class="col-sm-12 v-center ng-timeline" style="box-shadow: none;padding: 0px;width: 100%;margin-bottom: 0px;">
                                                        <div class="col-md-7" style="padding-left: 0px;">
                                                                <img height="23" width="23" src="<?php echo base_url()?>assets/portal/img/ico_o2.png">
                                                             <span style="padding-left: 20px; font-size: 14px;">{{hierarchy.objName}}</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div style="float: right;">
                                                        <div class="col-md-3 nKeyResult" style="margin-top: 0px;padding-right: 5px;width: auto;">
                                                                <span class="nKeyResult">{{hierarchy.objKeyNum}} Resultado Chave{{hierarchy.objKeyNum>1 ? 's' : ''}}</span>
                                                            </div>
                                                            <div class="col-md-1" style="padding-right: 0px;padding-left: 0px;">
                                                        <div  style="padding-right: 0px;margin-right: 0px;">
                                                    <!--<img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" width="31px" height="31px" style="border-radius: 50% ;" class="ng-scope">-->
                                                     
                                                   </div>
                                                   </div>
                                                        <div class="col-md-4 progres-atividades" style="padding-right: 0px;padding-left: 0px;margin-top: 0px;margin-left: 10px;">
                                                        <div  style="">
                                                        <div class="progres-perfil" style="box-shadow:none;">
                                                            <div class="progress_wrap">
                                                                <div class="progress" style="height: 22px !important;width: 100px !important;background-color: #f0f1f2;">
                                                                    <div class="progress-bar" role="progressbar" style="height: 22px !important;border-radius:10px;width:{{hierarchy.objPercent}}%"></div>
                                                                </div>
                                                                <span style="font-size: 14px;top:auto !important;" class="ng-binding">{{hierarchy.objPercent}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <div class="col-md-1" style="padding-top: 5px;float: right;">
                                                            <span class="icon" ng-click="openObjetivo(hierarchy)">
                                                                <i ng-class="{'icon-angle-down': hierarchy.showObj, 'icon-angle-right': !hierarchy.showObj}"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div ng-show="hierarchy.showObj" ng-repeat="(objind, keyresult) in hierarchy.keys">
                                                    <h4 class="col-blue atrasadas-label" style="margin-bottom: 0px; margin-top:24px; padding-bottom: 24px; padding-left: 0px;">Resultados chave</h4>
                                                    <div class="carrier_panel clearfix ng-scope">
                                                        <div class="col-sm-12 v-center ng-timeline" style="box-shadow: none;padding: 0px;width: 100%;margin-bottom: 0px;">
                                                            <div class="col-md-7" style="padding-left: 0px;">
                                                                <img height="23" width="23" src="<?php echo base_url()?>assets/portal/img/ico_kr2.png">
                                                                <span style="padding-left: 20px; font-size: 14px;">{{keyresult.key_name}}</span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div style="float: right;">
                                                            <div class="col-md-2 nKeyResult" style="margin-top: 0px;padding-right: 5px;width: auto;">
                                                                <span ng-if="keyresult.keyActNum>1" class="nKeyResult">{{keyresult.keyActNum}} atividad{{keyresult.keyActNum>1 ? 'es' : 'e'}}</span>
                                                                <span ng-if="keyresult.keyActNum<1" class="nKeyResult">Sem Atividades</span>
                                                            </div>
                                                            <div class="col-md-1" style="padding-right: 0px;padding-left: 0px;">
                                                        <div  style="padding-right: 0px;margin-right: 0px;">
                                                    <!--<img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" width="31px" height="31px" style="border-radius: 50% ;" class="ng-scope">-->
                                                     
                                                   </div>
                                                   </div>
                                                    <div class="col-md-4 progres-atividades" style="padding-right: 0px;padding-left: 0px;margin-top: 0px;margin-left: 10px;">
                                                        <div  style="">
                                                        <div class="progres-perfil" style="box-shadow:none;">
                                                            <div class="progress_wrap">
                                                                <div class="progress" style="height: 22px !important;width: 100px !important;background-color: #f0f1f2;">
                                                                    <div class="progress-bar" role="progressbar" style="height: 22px !important;border-radius:10px;width:{{keyresult.keyPercent}}%"></div>
                                                                </div>
                                                                <span style="font-size: 14px;top:auto !important;" class="ng-binding">{{keyresult.keyPercent}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-1" style="float: right;padding-top: 5px;">
                                                        <span class="icon" ng-click="openKeyResults(keyresult)">
                                                                    <i ng-class="{'icon-angle-down': keyresult.showKey, 'icon-angle-right': !keyresult.showKey}"></i>
                                                                </span>
                                                    </div>
                                                
                                               </div>
                                                   </div>
                                                        </div>
                                                    </div>
                                                    <div ng-repeat="(sitind, list) in keyresult.activities" ng-show="keyresult.showKey">
                                                        <h4 class="col-blue atrasadas-label" ng-if="list.length>0 && sitind==0" style="margin-bottom: 0px; margin-top:24px; padding-bottom: 24px; padding-left: 0px;">Em progresso</h4>
                                                        <h4 class="col-pink atrasadas-label" ng-if="list.length>0 && sitind==1" style="margin-bottom: 0px;  margin-top:24px;padding-bottom: 24px; padding-left: 0px;">Não Iniciada</h4>
                                                        <h4 class="col-orange atrasadas-label" ng-if="list.length>0 && sitind==2" style="margin-bottom: 0px;  margin-top:24px;padding-bottom: 24px; padding-left: 0px;">Atrasadas</h4>
                                                        <h4 class="col-green atrasadas-label" ng-if="list.length>0 && sitind==3 && showFinalized" style="margin-bottom: 0px;  margin-top:24px;padding-bottom: 24px; padding-left: 0px;">Ver concluidas ({{listFinished.length}})</h4>
                                        <div class="carrier_panel clearfix hover-cls ng-scope" ng-if="list.length>0 && sitind==3 && showFinalized" ng-repeat="(ind, activity) in list">
                                            <div class="col-sm-12" style="padding-left: 0px;">
                                                    <div class=" col-sm-6">
                                                        <div class="carrier_row" style="border: 2px solid #0cd591; fill: #2fc114;">
                                                            <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                            <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                            </svg>
                                                        </div>
                                                        <div class="ng-binding">
                                                             <span style="padding-left: 20px; font-size: 14px;">{{activity.title}}</span>
                                                             <span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle" style="background-color: #03a9f4;float:right;"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" style="padding-right: 0px;margin: 0px!important;float: right;"> 
                                                         <!--<div class="ng-binding pull-right " style="width: 40px;text-align: right;"><span style="padding-left: 10px; font-weight: normal; font-size: 10px;" class="ng-binding">{{activity.percentage}}%</span>
                                                        </div>-->
                                                        <span style="float: right;" ng-click="showHideComments(siitind, activity)" class="coment-section-toggle">{{activity.comments}}</span>
                                                        
                                                        <img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="31px" height="31px" style="border-radius: 50% ;margin-right: 14px;float: right;" class="ng-scope">
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassed, 'label-danger': !activity.isPassed}">{{activity.newfim}}</label>
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassedInit, 'label-danger': !activity.isPassedInit}">{{activity.newinit}}</label>
                                                    </div>
                                                    
                                                </div>


                                            <!--<div class="elofy_table_row db_obj">
                                                <div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 60% !important;">

                                                    <div class="carrier_row" style="border: 2px solid #0cd591; fill: #2fc114;">
                                                        <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                        <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                        </svg>
                                                    </div>
                                                    <div class="ng-binding">
                                                        <span style="padding-left:7px; font-size: 14px" class="ng-binding">{{activity.title}}</span>
                                                    </div>
                                                </div>

                                                <div class="Dvtab_colums_dv clm_main pdl-30" style="width: 12% !important; padding-right: 0px; text-align: right;"> 
                                                    <label class="label label-progress">{{activity.newfim}}</label>
                                                </div>

                                                <div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 15% !important;  padding-left: 5px;">
                                                    <div class="ng-binding pull-right " style="width: 40px;text-align: right;"><span style="padding-left: 10px; font-weight: normal; font-size: 10px;" class="ng-binding">{{activity.percentage}}%</span>
                                                    </div>


                                                    <div class="ng-binding pull-right">
                                                         <img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="31px" height="31px" style="border-radius: 50%;" class="ng-scope">
                                                    </div>
                                                </div>  

                                                <div class="Dvtab_colums_dv clm_main pdl-30" style="width: 13% !important">
                                                    <div style="height: 23px;width: 22px;margin:2px 17px 0 -25px;float: left;"><span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle" style="background-color: #03a9f4;height: 23px;width: 23px;margin: 0px;"></span></div>
                                                    <div class="coment-section-toggle">{{activity.comments}}</div>
                                                </div>
                                            </div>-->
                                        </div>
                                                        <div class="carrier_panel clearfix ng-scope" ng-if="(sitind !=3) && list.length>0" ng-repeat="(ind, activity) in list">
                                                            <div class="col-sm-12 " style="padding-left: 0px !important;">
                                                    <div class=" col-sm-6 linkatividade"  ng-click="showHideDetails(siitind, activity)">

                                                        <div class="carrier_row" ng-if ="!(activity.situacao == 1 || activity.situacao == 3)" ng-click="showUpdateSitautionConfirmModal(activity);">
                                                            <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                            <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                            </svg>
                                                        </div>
                                                        <div class="ng-binding">
                                                             <span  class="linkatividade" style="padding-left: 20px; font-size: 14px;cursor: pointer;">{{activity.title}}</span>
                                                             <span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle" style="background-color: #03a9f4;float:right;"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" style="padding-right: 0px;margin: 0px!important;float: right;"> 
                                                         <!--<div class="ng-binding pull-right " style="width: 40px;text-align: right;"><span style="padding-left: 10px; font-weight: normal; font-size: 10px;" class="ng-binding">{{activity.percentage}}%</span>
                                                        </div>-->
                                                        <span style="float: right;" ng-click="showHideComments(siitind, activity)" class="coment-section-toggle">{{activity.comments}}</span>
                                                        <img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="31px" height="31px" style="border-radius: 50% ;margin-right: 14px;float: right;" class="ng-scope">
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassed, 'label-danger': !activity.isPassed}">{{activity.newfim}}</label>
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassedInit, 'label-danger': !activity.isPassedInit}">{{activity.newinit}}</label>
                                                    </div>
                                                    
                                                </div>
                                                <div ng-show="activity.showDetFlag" class="range-slider-form-main details_{{activity.order}}">
                                                    <div class="col-md-12 col-sm-12" style="padding:0px;">
                                                        <div class="range-slider-form">
                                                            <a ng-click="hideDetails(activity)" href="">
                                                                <!-- <img class="cross-icon" src="<?php echo base_url()?>/assets/img/added/cross-btn.png" alt="dfgr"><i class="fa fa-close"></i> -->
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                            <form id="details-form" class="prospectar-form">
                                                                <div class="row detail-description">
                                                                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px; padding-right: 0px;">
                                                                        <img title="Objetivo" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_o2.png" alt="Objetivo">
                                                                    </div>
                                                                    <div class="col-md-11 col-sm-11 col-xs-11 dObjective" style="padding-left: 0px;">
                                                                        <input disabled="disabled" type="text" class="form-control" name="{{activity.nome}}" placeholder="" value="{{activity.nome}}">
                                                                    </div>
                                                                </div> 
                                                                <div class="row detail-description">
                                                                     <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                        <img title="Resultado Chave" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_kr2.png" alt="Resultado Chave">
                                                                    </div>
                                                                    <div class="col-md-11 col-sm-11 col-xs-11 dResult" style="padding-left: 0px;">
                                                                        <input disabled="disabled" type="text" class="form-control" name="{{activity.nomeRChave}}" placeholder="" value="{{activity.nomeRChave}}">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="row detail-description">
                                                                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                        <img title="Descrição" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_descrição.png" alt="Descrição">
                                                                    </div>
                                                                    <div class="col-sm-11 col-xs-11" style="padding-left: 0px;">
                                                                            <input type="text" class="form-control input_description" name="description" placeholder="" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row detail-description">
                                                                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                        <img title="Responsável" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_responsavel.png" alt="Responsável">
                                                                    </div>
                                                                    <div class="col-md-3 radius" style="padding-left: 0px;">
                                                                            <select id="detail-responsavel" name="usuario" class="" data-placeholder="Selecione um Responsável" ng-options="user.id as user.name for user in responibles" ng-model="detailResponsavel[activity.order]"></select>
                                                        
                                                                    </div>
                                                                    
                                                                        <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                           <img title="Data de Ínicio" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_calendar.png" alt="Data de Ínicio">
                                                                       </div>
                                                                       <div class="col-md-3" style="padding-left: 0px;">
                                                                            <div class="" style="width:100%;border-radius: 30px !important;">
                                                                                <input id="detail-date-init" type="text" class="form-control" value="">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                            <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                            <img height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_calendar.png" title="Data de Fim">
                                                                        </div>
                                                                        <div class="col-md-3" style="padding-left: 0px;">
                                                                            <div class="" style="width:100%;border-radius: 30px !important;">
                                                                                <input id="detail-date-fim" name="date-fim" type="text" class="form-control" value="">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                     <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 0px; padding-right: 0px;">
                                                                        <div title="Progresso" style="margin-left: 15px;" class="carrier_row">
                                                <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32" style="margin-top: 0px;">
                                                <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                </svg>
                                            </div>
                                            </div>
                                                                    <div class="col-md-4" style="padding-left: 0px;">
                                                                        <!--<div class="input-group">
                                                                            <input type="hidden" id="detail-percentage"/>
                                                                            <div class="slider"></div>
                                                                        </div>-->
                                                                        <input type="range" min="0" max="100" step="25" class="nComp" id="detail-percentage" oninput="display.value=value" onchange="display.value=value">
                                                                        <input type="text" id="display" value="{{activity.percentage}}" readonly style="background-color: transparent;border:none !important;    text-align: center;">
                                                                    </div>
                                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                                            <!--<div class="col-md-6 col-sm-6 col-xs-6" style="padding: 0px;">
                                                                                <input type="checkbox" id="check-finished" ng-model = "detailFinished" ng-click="changeDetailSituation(activity, 1)" style="margin-top: 3px;" value="">
                                                                                <label for="lbl-finished" class="control-label progress-checkbox">Finalizar: </label>
                                                                            </div>-->
                                                                                <input type="checkbox" id="check-cancelled" ng-model = "detailCanceled" ng-click="changeDetailSituation(activity, 3)" style="margin-top: 3px;" value="">
                                                                                <label for="lbl-progress" class="control-label progress-checkbox">Cancelar: </label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <button class="btn-primary salvar" style = "margin-top: 10px;border-radius: 30px;width: 50%;margin-left: 30px;" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="updateDetails(activity)">Salvar</button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                        </div>
                                                    </div>
                                                <div ng-show="activity.showComFlag" class="col-md-12 col-sm-12 comments_{{activity.order}}">
                                                    <div class="usr-review" ng-if="activityComments.length>0" style="overflow-y: auto;max-height: 140px;">

                                                        <div class="row" ng-repeat="comment in activityComments">
                                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                                <img src="{{comment.url_image}}" alt="">  
                                                            </div>
                                                            <div class="col-md-2 col-sm-3 col-xs-3 review-pl-0">
                                                                <h3>{{comment.nome_usuario}}</h3> 
                                                            </div>
                                                            <div class="col-md-8 col-sm-6 col-xs-6 review-pl-0">
                                                                <p>{{comment.comentario}}</p> 
                                                            </div>
                                                            <div class="col-md-1 col-sm-2 col-xs-2 text-right">
                                                                <p style="color:#000; font-size: 15px;">{{comment.commentdate}}</p>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div  class="usr-review" ng-if="!activityComments.length>0">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <p>Não existem comentários ainda.</p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row review-reply">
                                                        <div class="col-sm-1 col-xs-1" style="padding-right: 0px;">
                                                            <img src="{{user.md_image}}" alt="" style="width:40px;height: 40px;">  
                                                        </div>
                                                        <div class="col-sm-10 col-xs-10 review-pl-0">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control input_comment" name="" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                        <button class="col-sm-1 col-xs-1 btn-primary salvar" style = "margin-top:3px;border-radius: 15px;" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="addActivityComment(activity)">Enviar</button>
                                                    </div>
                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carrier_panel clearfix hover-cls ng-scope" ng-if="!activities_hierarchy.length" >
                                            <div class="carrier_panel clearfix removehover">
                                                <div class="elofy_table_row db_obj">
                                                    <div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 100% !important;  padding-left: 5px;">
                                                        <div class="ng-binding">Não foram encontradas hierarquias</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" ng-if="listType == 0">
                                <div class="dblock" style="overflow-x: auto;float: left;width: 103%; box-shadow: none;border:none;">
                                    <div class="dblock_body carrier_block alfa-block" style="overflow-y: auto;min-width: 797px;display: block;float: left;width: 100%;">
                                        <div ng-repeat="(sitind, list) in activities_list">
                                            <h4 class="col-blue atrasadas-label" ng-if="list.length>0 && sitind==0" style="margin-bottom: 0px;  padding-bottom: 26px;margin-top: 26px; padding-left: 0px;">Em progresso</h4>
                                            <h4 class="col-pink atrasadas-label" ng-if="list.length>0 && sitind==1" style="margin-bottom: 0px;  margin-top:26px;padding-bottom: 26px;padding-left: 0px;">Não Iniciada</h4>
                                            <h4 class="col-orange atrasadas-label" ng-if="list.length>0 && sitind==2" style="margin-bottom: 0px;  margin-top:26px;padding-bottom: 26px;padding-left: 0px;">Atrasadas</h4>
                                            <div class="carrier_panel clearfix ng-scope" ng-if="list.length>0" ng-repeat="(siitind, activity) in list">
                                                <div class="col-sm-12 "  style="padding-left: 0px;">
                                                    <div class=" col-sm-6 linkatividade" ng-click="showHideDetails(siitind, activity)" >

                                                        <div class="carrier_row" ng-if ="!(activity.situacao == 1 || activity.situacao == 3)" ng-click="showUpdateSitautionConfirmModal(activity);">
                                                            <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                            <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                            </svg>
                                                        </div>
                                                        <div class="ng-binding">
                                                             <span class="linkatividade" style="padding-left: 20px; font-size: 14px;cursor: pointer;">{{activity.title}}</span>
                                                             <span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle" style="background-color: #03a9f4;float:right;"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" style="padding-right: 0px;margin: 0px!important;float: right;"> 
                                                         <!--<div class="ng-binding pull-right " style="width: 40px;text-align: right;"><span style="padding-left: 10px; font-weight: normal; font-size: 10px;" class="ng-binding">{{activity.percentage}}%</span>
                                                        </div>-->
                                                        <span style="float: right;" ng-click="showHideComments(siitind, activity)" class="coment-section-toggle">{{activity.comments}}</span>
                                                        
                                                        <img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="31px" height="31px" style="border-radius: 50% ;margin-right: 14px;float: right;" class="ng-scope">
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassed, 'label-danger': !activity.isPassed}">{{activity.newfim}}</label>
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassedInit, 'label-danger': !activity.isPassedInit}">{{activity.newinit}}</label>
                                                       
                                                    </div>
                                                    
                                                </div>
                                                <div ng-show="activity.showDetFlag" class="range-slider-form-main details_{{activity.order}}">
                                                    <div class="col-md-12 col-sm-12" style="padding:0px;">
                                                        <div class="range-slider-form">
                                                            <a ng-click="hideDetails(activity)" href="" style="margin-right:-10px;">
                                                                <!-- <img class="cross-icon" src="<?php echo base_url()?>/assets/img/added/cross-btn.png" alt="dfgr"> -->
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                            <form id="details-form" class="prospectar-form">
                                                                <div class="row detail-description">
                                                                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px; padding-right: 0px;">
                                                                        <img title="Objetivo" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_o2.png" alt="Objetivo">
                                                                    </div>
                                                                    <div class="col-md-11 col-sm-11 col-xs-11 dObjective" style="padding-left: 0px;">
                                                                        <input disabled="disabled" type="text" class="form-control" name="{{activity.nome}}" placeholder="" value="{{activity.nome}}">
                                                                    </div>
                                                                </div> 
                                                                <div class="row detail-description">
                                                                     <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                        <img title="Resultado Chave" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_kr2.png" alt="Resultado Chave">
                                                                    </div>
                                                                    <div class="col-md-11 col-sm-11 col-xs-11 dResult" style="padding-left: 0px;">
                                                                        <input disabled="disabled" type="text" class="form-control" name="{{activity.nomeRChave}}" placeholder="" value="{{activity.nomeRChave}}">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="row detail-description">
                                                                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                        <img title="Descrição" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_descrição.png" alt="Descrição">
                                                                    </div>
                                                                    <div class="col-sm-11 col-xs-11" style="padding-left: 0px;">
                                                                            <!-- <input type="text" class="form-control input_description" name="description" placeholder="" value=""> -->
                                                                            <div class="form-group">
                                                                                <textarea style="border-radius: 5px !important;font-size:14px;color:#000000;" name="description" class="form-control input_description" rows="3" placeholder="" ></textarea>
                                                                                <!-- <input type="text" placeholder="Digite aqui a descrição da atividade" class="form-control" id="descricao"> -->
                                                                            </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row detail-description">
                                                                    <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                        <img title="Responsável" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_responsavel.png" alt="Responsável">
                                                                    </div>
                                                                    <div class="col-md-3 radius" style="padding-left: 0px;">
                                                                            <select id="detail-responsavel" name="usuario" class="" data-placeholder="Selecione um Responsável" ng-options="user.id as user.name for user in responibles" ng-model="detailResponsavel[activity.order]"></select>
                                                        
                                                                    </div>
                                                                    
                                                                        <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                           <img title="Data de Ínicio" height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_calendar.png" alt="Data de Ínicio">
                                                                       </div>
                                                                       <div class="col-md-3" style="padding-left: 0px;">
                                                                            <div class="" style="width:100%;border-radius: 30px !important;">
                                                                                <input id="detail-date-init" type="text" class="form-control" value="">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                            <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 10px;padding-right: 0px;">
                                                                            <img height="20" width="20" src="<?php echo base_url()?>assets/portal/img/ico_calendar.png" title="Data de Fim">
                                                                        </div>
                                                                        <div class="col-md-3" style="padding-left: 0px;">
                                                                            <div class="" style="width:100%;border-radius: 30px !important;">
                                                                                <input id="detail-date-fim" name="date-fim" type="text" class="form-control" value="">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                     <div class="col-md-1 col-sm-1 col-xs-1" style="margin-top: 0px; padding-right: 0px;">
                                                                        <div title="Progresso" style="margin-left: 15px;" class="carrier_row">
                                                <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32" style="margin-top: 0px;">
                                                <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                </svg>
                                            </div>
                                            </div>
                                                                    <div class="col-md-4" style="padding-left: 0px;">
                                                                        <!--<div class="input-group">
                                                                            <input type="hidden" id="detail-percentage"/>
                                                                            <div class="slider"></div>
                                                                        </div>-->
                                                                        <input type="range" min="0" max="100" step="25" class="nComp" id="detail-percentage" oninput="display.value=value" onchange="display.value=value">
                                                                        <input type="text" id="display" value="{{activity.percentage}}" readonly style="background-color: transparent;border:none !important;    text-align: center;">
                                                                    </div>
                                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                                            <!--<div class="col-md-6 col-sm-6 col-xs-6" style="padding: 0px;">
                                                                                <input type="checkbox" id="check-finished" ng-model = "detailFinished" ng-click="changeDetailSituation(activity, 1)" style="margin-top: 3px;" value="">
                                                                                <label for="lbl-finished" class="control-label progress-checkbox">Finalizar: </label>
                                                                            </div>-->
                                                                                <input type="checkbox" id="check-cancelled" ng-model = "detailCanceled" ng-click="changeDetailSituation(activity, 3)" style="margin-top: 3px;" value="">
                                                                                <label for="lbl-progress" class="control-label progress-checkbox">Cancelar: </label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <button class="btn-primary salvar" style = "margin-top: 10px;border-radius: 30px;width: 50%;margin-left: 30px;" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="updateDetails(activity)">Salvar</button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                        </div>
                                                    </div>
                                                <div ng-show="activity.showComFlag" class="col-md-12 col-sm-12 comments_{{activity.order}}">
                                                    <div class="usr-review" ng-if="activityComments.length>0" style="overflow-y: auto;max-height: 140px;">

                                                        <div class="row" ng-repeat="comment in activityComments">
                                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                                <img src="{{comment.url_image}}" alt="">  
                                                            </div>
                                                            <div class="col-md-2 col-sm-3 col-xs-3 review-pl-0">
                                                                <h3>{{comment.nome_usuario}}</h3> 
                                                            </div>
                                                            <div class="col-md-8 col-sm-6 col-xs-6 review-pl-0">
                                                                <p>{{comment.comentario}}</p> 
                                                            </div>
                                                            <div class="col-md-1 col-sm-2 col-xs-2 text-right">
                                                                <p style="color:#000; font-size: 15px;">{{comment.commentdate}}</p>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div  class="usr-review" ng-if="!activityComments.length>0">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <p>Não existem comentários ainda.</p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row review-reply">
                                                        <div class="col-sm-1 col-xs-1" style="padding-right: 0px;">
                                                            <img src="{{user.md_image}}" alt="" style="width:40px;height: 40px;">  
                                                        </div>
                                                        <div class="col-sm-10 col-xs-10 review-pl-0">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control input_comment" name="" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                        <button class="col-sm-1 col-xs-1 btn-primary salvar" style = "margin-top:3px;border-radius: 15px;" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="addActivityComment(activity)">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                                <h4 class="col-green atrasadas-label" ng-if="listFinished.length>0 && showFinalized" style="margin-bottom: 0px;  margin-top:24px;padding-bottom: 24px; padding-left: 0px;">Ver concluidas ({{listFinished.length}})</h4>
                                        <div class="carrier_panel clearfix hover-cls ng-scope" ng-if="listFinished.length>0 && showFinalized" ng-repeat="activity in listFinished">
                                            <div class="col-sm-12" style="padding-left: 0px;">
                                                    <div class=" col-sm-6">
                                                        <div class="carrier_row" style="border: 2px solid #0cd591; fill: #2fc114;">
                                                            <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                            <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                            </svg>
                                                        </div>
                                                        <div class="ng-binding">
                                                             <span style="padding-left: 20px; font-size: 14px;">{{activity.title}}</span>
                                                             <span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle" style="background-color: #03a9f4;float:right;"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" style="padding-right: 0px;margin: 0px!important;float: right;"> 
                                                         <!--<div class="ng-binding pull-right " style="width: 40px;text-align: right;"><span style="padding-left: 10px; font-weight: normal; font-size: 10px;" class="ng-binding">{{activity.percentage}}%</span>
                                                        </div>-->
                                                        <span style="float: right;" ng-click="showHideComments(siitind, activity)" class="coment-section-toggle">{{activity.comments}}</span>
                                                        <img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="31px" height="31px" style="border-radius: 50% ;margin-right: 14px;float: right;" class="ng-scope">
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassed, 'label-danger': !activity.isPassed}">{{activity.newfim}}</label>
                                                          <label style="margin-right: 14px;float: right;" class="label" ng-class="{'label-success': activity.isPassedInit, 'label-danger': !activity.isPassedInit}">{{activity.newinit}}</label>
                                                    </div>
                                                    
                                                </div>


                                            <!--<div class="elofy_table_row db_obj">
                                                <div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 60% !important;">

                                                    <div class="carrier_row" style="border: 2px solid #0cd591; fill: #2fc114;">
                                                        <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
                                                        <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                        </svg>
                                                    </div>
                                                    <div class="ng-binding">
                                                        <span style="padding-left:7px; font-size: 14px" class="ng-binding">{{activity.title}}</span>
                                                    </div>
                                                </div>

                                                <div class="Dvtab_colums_dv clm_main pdl-30" style="width: 12% !important; padding-right: 0px; text-align: right;"> 
                                                    <label class="label label-progress">{{activity.newfim}}</label>
                                                </div>

                                                <div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 15% !important;  padding-left: 5px;">
                                                    <div class="ng-binding pull-right " style="width: 40px;text-align: right;"><span style="padding-left: 10px; font-weight: normal; font-size: 10px;" class="ng-binding">{{activity.percentage}}%</span>
                                                    </div>


                                                    <div class="ng-binding pull-right">
                                                         <img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="31px" height="31px" style="border-radius: 50%;" class="ng-scope">
                                                    </div>
                                                </div>  

                                                <div class="Dvtab_colums_dv clm_main pdl-30" style="width: 13% !important">
                                                    <div style="height: 23px;width: 22px;margin:2px 17px 0 -25px;float: left;"><span ng-if="activity.coresponsavel == 1" class="corresponsavelcircle" style="background-color: #03a9f4;height: 23px;width: 23px;margin: 0px;"></span></div>
                                                    <div class="coment-section-toggle">{{activity.comments}}</div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="carrier_panel clearfix hover-cls ng-scope" ng-if="!activities_list[0].length && !activities_list[1].length && !activities_list[2].length && !listFinished.length" >
                                            <div class="carrier_panel clearfix removehover">
                                                <div class="elofy_table_row db_obj">
                                                    <div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 100% !important;  padding-left: 5px;">
                                                        <div class="ng-binding">Não foram encontradas atividades</div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="update-progress-modal">
        <div class="modal-dialog " style="width: 800px !important; max-width: 100%;     padding-right: 20px;">
            <form id="form-progress" class="modal-content" style="padding: 10px">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="row update-content">
                        <div class="col-sm-4">
                            <div class="progress_left_corner ng-binding">
                                <div class="progress_title_content ng-binding" title="{{update_hContent.title}}">
                                    <h4 class="modal-title">{{update_hContent.title| limitTo:34}}{{update_hContent.title.length>34 ? '...' : ''}}</h4>
                                    <div class="modal_header_title cs-margin-top-4">
                                        <span ng-if="update_hContent.situacao == 0">Não Iniciada</span>
                                        <span ng-if="update_hContent.situacao == 1">Finalizada</span>
                                        <span ng-if="update_hContent.situacao == 2">Em andamento</span>
                                        <span ng-if="update_hContent.situacao == 3">Cancelada</span>
                                        <span style="margin-left: 20px;">{{update_hContent.fim}}</span>
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 cs-padding-con">
                            <div class="" style="float: left; margin-right: 16px;     margin-left: 15px;">
                                <input type="checkbox" id="check-finished" ng-model = "finishedSituation" ng-change="changeSituation(1)" style="margin-top: 3px;" value="">
                                <label for="lbl-progress" class="control-label progress-checkbox">Finalizar: </label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="check-cancelled" ng-model = "cancelledSituation" ng-change="changeSituation(3)" style="margin-top: 3px;" value="">
                                <label for="lbl-progress" class="control-label progress-checkbox">Cancelar: </label>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 0px;">
                                                                        <!--<div class="input-group">
                                                                            <input type="hidden" id="detail-percentage"/>
                                                                            <div class="slider"></div>
                                                                        </div>-->
                                                                        <input type="range" min="0" max="100" step="25" class="nComp" id="detail-percentage" oninput="display.value=value" onchange="display.value=value">
                                                                        <input type="text" id="display" value="{{activity.percentage}}" readonly style="background-color: transparent;border:none !important;    text-align: center;">
                                                                    </div>
                    </div>
                </div>
                <div class="modal-body definir-popup">
                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-md-12" style="overflow-y: auto; max-height: 80px;">
                            <label class="" style="font-size: 14px; font-weight: bold;">Descrição:</label>
                            <div class="">{{update_hContent.description}}</div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 elo comment-box-header" style="margin-bottom: 20px;">
                            <div class="row">
                                <textarea rows="1" id="comment_content" placeholder="Digite seu comentário" class="elo-height col-md-9"></textarea>
                                <button class="col-md-3 btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="addActivityComment()">Enviar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="comment-box-container">
                            <div class="carrier_panel clearfix removehover cs-margin-top-10" ng-if="activityComments.length > 0" ng-repeat="comment in activityComments">
                                <div class="col-md-1 col-sm-1 ng-binding pdl-30 comment-box-img">
                                    <img src="{{comment.url_image}}">
                                </div>
                                <div class="col-md-9 col-sm-9 ng-binding comment-box-comments">
                                    <div class="comment-user">
                                        {{comment.nome_usuario}}
                                    </div>
                                    <div class="comment-content">
                                        {{comment.comentario}}
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 comment-box-date">
                                    <span class="ng-binding">{{comment.commentdate}}</span> 
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix removehover cs-margin-top-25 cs-margin-left-3" ng-if="!activityComments.length > 0">
                                <div class="col-md-12 comment-box-nocomment" >
                                    <div class="comment-no">Não existem comentários ainda.</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-primary salvar" ng-click="updateActivityProgress()" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade in" id="update-situaction-confirm-modal">
        <div class="modal-dialog " style="width: 400px !important;">
            <form id="form-progress" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="row">
                        <h3 style="padding-left: 20px;">Deseja finalizar a tarefa?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Não</button>
                    <button class="btn btn-primary salvar" ng-click="updateSituation()" data-loading-text="<i class='icon-spinner animate-spin'></i>">Sim</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Templates for apprisials -->
</div>
<?php
$obj = &get_instance();
$social_logins = $obj->session->userdata('check_social_logins');

if (!empty($social_logins) && isset($social_logins['image']) && !empty($social_logins['image'])) {
    $obj->session->unset_userdata('check_social_logins', '');
    ?>
    <script>
        setTimeout(function(){
        $('#profilepic-modal').modal('show');
        }, 2000);
    </script>
<?php }
?>
