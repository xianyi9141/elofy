<!-- Avaliacoes -->
<div class="feedbacksView" ng-controller="avaliacoesCtrl">
    <h2 class="page-title" style="margin-top: 10px;">
        {{ 'RELATORIO_DE_AVALIACOES.TITLE' | translate }} <span class="text-muted">({{ reports.length }})</span>
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
                                <label>Times</label>
                                <div class="clearfix"></div>
                                <div class="filters_view">
                                    <select id="search_time" name="search_time" class="" ng-change="onChangeTeamSelect()" ng-model="selectedTeam">
                                        <option ng-repeat="team in times | filter : {added : '!'}" value="{{team.id}}">{{team.name}}</option>
                                    </select>
                                    <span class="select-single-multiple-tag" ng-repeat="selected in times | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Usuários</label>
                                <div class="clearfix"></div>
                                <div class="filters_view">
                                    <select id="search_responsavel" name="search_responsavel" class="" ng-change="onChangeResponsavelSelect()" ng-model="selectedResponsavel">
                                        <option ng-repeat="responsavel in responsavels | filter : {added : '!'}" value="{{responsavel.id}}">{{responsavel.name}}</option>
                                    </select>
                                    <span class="select-single-multiple-tag" ng-repeat="selected in responsavels | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.name}}</label><i class="fa fa-remove"></i></span>
                                </div>
                            </div>
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
                        </div>
                        <div style="margin-top:10px;" class="row">
                            <div class="col-sm-4" style="float: right;">
                                <div class="clr_filters">
                                    <div class="filter_btn">
                                        <a href="javascript:void(0)" class="clean_filter" ng-click="reset()">Limpar Filtros</a>
                                        <button type="submit" class="apply_filter" ng-click="applyFilter()">Aplicar Filtro</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form_add" ng-show="reports.length<=0">
            <div class="well box">
                <i class="icon-up-big pull-right"></i>{{ 'UI.NO_RECORDS_FOUND' | translate }}
            </div>
        </div>

        <div class="form_add" ng-show="reports.length>0">
            <div class="main_box_show_dv dv-box" style="margin-left: -20px; margin-right: -20px;border:none;">
                <div class="DV_table_view_elofy cli">
                    <div class="table-responsive content horizontal-images" id="tbl_avaliacoes">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-left" style="width:10%;">{{ 'UI.USER' | translate }}</th>
                            <th class="text-center" style="width:10%;">{{ 'UI.TEAM' | translate }}</th>
                            <th class="text-center" style="width:10%;">{{ 'UI.YEAR' | translate }}</th>
                            <th class="text-center" style="width:10%;">{{ 'UI.QUARTER' | translate }}</th>
                            <th class="text-center" style="width:15%;">{{ 'OBJETIVOS.GOALS' | translate }}</th>
                            <th class="text-center" style="width:10%;">{{ 'RELATORIO_DE_AVALIACOES.PERCENTAGE' | translate }}</th>
                            <th class="text-center" style="width:15%;">{{ 'RELATORIO_DE_AVALIACOES.KEY_RESULTS' | translate }}</th>
                            <th class="text-center" style="width:10%;">{{ 'RELATORIO_DE_AVALIACOES.PERCENTAGE' | translate }}</th>
                            <th class="text-center" style="width:10%;">{{ 'UI.DATE' | translate }}</th>
                        </tr>
                        <tr ng-repeat="report in reports">
                            <td class="text-left">
                                {{ report.user }}
                            </td>
                            <td class="text-center">
                                {{ report.team }}
                            </td>
                            <td class="text-center">
                                {{ report.year }}
                            </td>
                            <td class="text-center">
                                {{ report.cycle }}
                            </td>
                            <td class="text-center">
                                {{ report.objective }}
                            </td>
                            <td class="text-center">
                                <div class="graph">
                                    <span class="pie">{{ report.perc_objective }},{{ 100 - report.perc_objective }}</span>
                                </div>
                                {{ report.perc_objective }}%
                            </td>
                            <td class="text-center">
                                {{ report.rkeys }}
                            </td>
                            <td class="text-center">
                                <div class="graph">
                                    <span class="pie">{{ report.perc_rkeys }},{{ 100 - report.perc_rkeys }}</span>
                                </div>
                                {{ report.perc_rkeys }}%
                            </td>
                            <td class="text-center">
                                {{ report.date }}
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <!-- <h2>
        <div class="buttons pull-right">
            <form class="form-inline" ng-submit="filter()">
                <div class="form-group">
                    <label style="line-height:35px; font-size:14px; margin:0; vertical-align:top;">Filtrar:</label>
                </div>
                <div class="form-group" style="width:130px;">
                    <select class="select-teams" data-native="true" data-text="Times" ng-options="team.id as team.name for team in teams" ng-model="selectedTeam"></select>
                </div>
                <div class="form-group" style="width:140px;">
                    <select class="select-user" data-native="true" data-text="Usuários" ng-options="user.id as user.name for user in users" ng-model="selectedUser"></select>
                </div>
                <div class="form-group" style="width:120px;">
                    <select class="select-year" data-native="true" ng-change="changeYear()" ng-options="year as year for year in years" ng-model="selectedYear"></select>
                </div>
                <div class="form-group" style="width:140px;">
                    <select class="select-cycle" data-native="true" data-text="Trimestre" ng-options="cycle.id as cycle.name for cycle in cycles" ng-model="selectedCycle"></select>
                </div>
                <button class="btn btn-blue filter" type="submit" data-loading-text="<i class='icon-spinner animate-spin'></i>"><i class="entypo-search"></i></button>
            </form>
        </div>
        {{ 'RELATORIO_DE_AVALIACOES.TITLE' | translate }} <span class="text-muted">({{ reports.length }})</span>
    </h2> -->

    <hr>

    <!-- <div class="box">
        <table id="table" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-left" style="width:20%;">{{ 'UI.USER' | translate }}</th>
                    <th class="text-center" style="width:10%;">{{ 'UI.TEAM' | translate }}</th>
                    <th class="text-center" style="width:10%;">{{ 'UI.YEAR' | translate }}</th>
                    <th class="text-center" style="width:10%;">{{ 'UI.QUARTER' | translate }}</th>
                    <th class="text-center" style="width:15%;">{{ 'OBJETIVOS.GOALS' | translate }}</th>
                    <th class="text-center" style="width:10%;">{{ 'RELATORIO_DE_AVALIACOES.PERCENTAGE' | translate }}</th>
                    <th class="text-center" style="width:15%;">{{ 'RELATORIO_DE_AVALIACOES.KEY_RESULTS' | translate }}</th>
                    <th class="text-center" style="width:10%;">{{ 'RELATORIO_DE_AVALIACOES.PERCENTAGE' | translate }}</th>
                    <th class="text-center" style="width:10%;">{{ 'UI.DATE' | translate }}</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="report in reports">
                    <td class="text-left">
                        {{ report.user }}
                    </td>
                    <td class="text-center">
                        {{ report.team }}
                    </td>
                    <td class="text-center">
                        {{ report.year }}
                    </td>
                    <td class="text-center">
                        {{ report.cycle }}
                    </td>
                    <td class="text-center">
                        {{ report.objective }}
                    </td>
                    <td class="text-center">
                        <div class="graph">
                            <span class="pie">{{ report.perc_objective }},{{ 100 - report.perc_objective }}</span>
                        </div>
                        {{ report.perc_objective }}%
                    </td>
                    <td class="text-center">
                        {{ report.rkeys }}
                    </td>
                    <td class="text-center">
                        <div class="graph">
                            <span class="pie">{{ report.perc_rkeys }},{{ 100 - report.perc_rkeys }}</span>
                        </div>
                        {{ report.perc_rkeys }}%
                    </td>
                    <td class="text-center">
                        {{ report.date }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div> -->

</div>