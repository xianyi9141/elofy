<style type="text/css">
    .bootstrap-tagsinput {
    min-height: 26px;
    line-height: 26px;
}
</style>
<!-- Edição de Times -->
<div ng-controller="teamsCtrl" id="teams" class="hide" ng-class="{'hide': !teams}">
        <h2 class="page-title">

            Times <span class="text-muted">({{ teams.length }})</span>
        </h2>

        <div class="box with-margins nested-list dd full_width_list">
        
        <div id="side-form" class="sidebar_position_relative">
            <form id="form-teams-side" class="modal-content">

                    <div class="form ">

                        <div class="row">
                            <div class="col-md-12">
                            
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="team-name-side" class="control-label">Nome</label>
                                            <input id="team-name-side" name="nome" type="text" class="form-control" value="{{ teamDetail.name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="team-user-side" class="control-label">Responsável</label>
                                            <select id="team-user-side" name="usuario" class="select2" data-placeholder="Selecione um Usuário" ng-options="user.id as user.name for user in responibles" ng-model="teamDetailUser"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    
                                        <div class="form-group">
                                            <label for="team-status-side" class="control-label">Time Pai</label>
                                            <select id="team-status-side" name="time" class="select2" ng-options="team.id as team.name for team in teamsList" ng-model="teamDetailTeam">
                                            </select>
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="atualizacao" class="control-label">Frequência Atualizações</label>
                                                    <input id="atualizacao" name="atualizacao" type="number" string-to-number ng-model="atualizacao" class="form-control" value="{{ teamDetail.atualizacao }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="key-tags-times" class="control-label">Tags</label>
                                                    <input id="key-tags-times" class="key-tags-times" type="text" />
                                                    
                                                </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="team-users-side" class="control-label">Integrantes</label>
                                                    <select id="team-users-side" class="form-control side-users-team select2" ng-model="selectedUserNotAdded" ng-options="userr.name for userr in usersNotAdded track by userr.id">
                                                    </select>
                                                    <span class="corresponsaveis-selected" ng-repeat="selected in usersNotAddedSelected" ng-click="removeUserAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="corresponsaveis[]" class="form-control" readonly><i class="fa fa-remove"></i></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 custom_col_right col-sm-6 col-xs-12">
                                    
                                        <div class="form-group ">
                                            <label class="control-label">Status</label>
                                            <div class="checkbox" style="margin-top:2px;">
                                            <input type="radio" ng-value="1" id="user-admin1" ng-model="teamDetailStatus" class="styled-checkbox"> 
                                                <label for="user-admin1">Ativo</label>
                                            </div>
                                            <div class="checkbox" style="margin-top:2px;">
                                            <input type="radio" ng-value="0" id="user-admin2" ng-model="teamDetailStatus" class="styled-checkbox"> 
                                                <label for="user-admin2">Inativo</label>
                                            </div>

                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <a class="btn btn-primary cancelar" ng-click="resetSideAddTeamForm()">Limpar formulário</a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                
                            </div>

                    </div>
                    
                   

            </form>
    </div>
    
    </div>
    <div id="list" class="nested-list dd with-margins box">

        <div class="box-header">
            <h4>Editar Times</h4><a href="javascript:;" ng-click="modalTimes(0)" class="btn btn-primary" style=" vertical-align:top;"><i class="icon-plus-circled"></i> Criar novo Time</a>

            <div class="buttons">
                <form style="display:inline-block; vertical-align:top;" ng-submit="search()">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar por nome" ng-model="query">
                        <span class="input-group-btn">
                            <button type="submit"><i class="entypo-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="key-list header-list">
            <div>Nome do Time</div>
            <div class="center">Responsável</div>
            <div class="right text-left" style="padding-left:20px">Status</div>
            <div class="right text-right"></div>
        </div>
        <ul class="dd-list">
            <li class="dd-item" ng-repeat="team in teams | filter:q" ng-include="'teamVal'"></li>
        </ul>
    </div>
    <script type="text/ng-template" id="teamVal">
            <div class="dd-content">
                <div class="key-list" ng-class="{'no-sub': !team.sub.length}">
                    <span class="icon" ng-if="team.sub.length">
                        <button class="collapse" ng-click="collapse($event)" data-action="collapse" type="button">
                            <i class="icon-minus"></i>
                        </button>
                        <button class="expand" ng-click="expand($event)" data-action="expand" type="button">
                            <i class="icon-plus"></i>
                        </button>
                    </span>
                    <span class="group">
                        <span>
                            <i class="icon-group"></i>
                        </span>
                    </span>
                    <p class="title">
                        {{ team.name }}
                    </p>
                    <div class="center" style="padding-left: 3.4%">
                        <div class="user">
                            <span class="">{{ team.user.name }}</span>
                        </div>
                    </div>
                    <div class="right text-left">
                        <span ng-class="{'text-success': team.active}">
                            <span class="active" ng-class="{'hide': !team.active}"><i class="icon-ok-1"></i>{{ 'UI.ACTIVE' | translate }}</span>
                            <span class="inactive" ng-class="{'hide': team.active}"><i class="icon-cancel"></i>{{ 'UI.UNACTIVE' | translate }}</span>
                        </span>
                    </div>
                    <div class="right text-right">
                        <span ng-click="changeFormToEditMode(team.id);scroollToTop()" class="btn btn-link btn-sm noshadow"><i class="icon-edit"></i></span>
                    </div>
                </div>
            </div>
            <ul class="dd-list" ng-if="team.sub.length">
                <li class="dd-item" ng-repeat="team in team.sub | filter:q" ng-include="'teamVal'"></li>
            </ul>
        </script>

</div>