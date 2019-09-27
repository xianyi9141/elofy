<!-- OKR's -->
<div class="resultsView nineBoxView" ng-controller="nineBoxCtrl" >
    <h2 class="new_heading_dv">
        Análise 9 box
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
                <form id="form-search" ng-submit="filter()">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="filter_form_view view_dsds">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Gestor</label>
                                        <span class="all-selector">
                                            <div class="container-block">
                                                  <input type="checkbox" id="chekd6" ng-model="allusers">
                                                  <label for="chekd6">Todos Gestores</label>
                                            </div>
                                        </span>
                                        <div class="clearfix"></div>
                                        <select id="search-responsavel" name="responsavel[]" class="select2"  ng-model="selectedResponsavel">
                                            <option ng-repeat="res in responsavelsNotAdded" value="{{res.id}}" ng-selected="selectedResponsavel == res.id">{{res.name}}</option>
                                        </select>
                                        <span class="corresponsaveis-selected" ng-repeat="selecteds in responsavelsNotAddedSelected" ng-click="removeUserAndRefreshResponsavel(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="responsavel[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>{{ 'UI.USER' | translate }}</label>
                                        <div class="clearfix"></div>
                                        <select id="search-usuario" name="usuario[]" class="select2"  ng-model="selectedUsuario">
                                            <option ng-repeat="usuario in usuariosNotAdded" value="{{usuario.id}}" ng-selected="selectedUsuario == usuario.id">{{usuario.name}}</option>
                                        </select>
                                        <span class="corresponsaveis-selected" ng-repeat="selecteds in usuariosNotAddedSelected" ng-click="removeUserAndRefreshUsuario(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="usuario[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
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
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div class="col-sm-4">
                                        <label>{{ 'UI.TEAM' | translate }}</label>
                                        <span class="all-selector">
                                            <div class="container-block">
                                                  <input type="checkbox" id="chekd7" ng-model="allteams">
                                                  <label for="chekd7">{{ 'OKRS.ALL_TEAMS' | translate }}</label>
                                                </div>
                                        </span>
                                        <div class="clearfix"></div>
                                        <select id="search-times" name="time[]" class="select2"  ng-model="selectedTime">
                                            <option ng-repeat="time in timesNotAdded" value="{{time.id}}" ng-selected="selectedTime == time.id">{{time.name}}</option>
                                        </select>
                                        <span class="corresponsaveis-selected" ng-repeat="selecteds in timesNotAddedSelected" ng-click="removeUserAndRefreshTime(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="time[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                        <!-- <div class="filters_view">
                                            <select id="search-team" name="time" class=""  ng-model="selectedTeam" multiple="multiple">
                                                <option ng-repeat="team in teams" value="{{team.id}}" ng-selected="selectedTeam == team.id">{{team.name}}</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Ciclos</label>
                                        <select id="search-ciclos" name="ciclo[]" class="select2"  ng-model="selectedCiclo">
                                            <option ng-repeat="ciclo in ciclosNotAdded" value="{{ciclo.id_revisao_ciclo}}" ng-selected="selectedCiclo == ciclo.id_revisao_ciclo">{{ciclo.nome_ciclo}}</option>
                                        </select>
                                        <span class="corresponsaveis-selected" ng-repeat="selecteds in ciclosNotAddedSelected" ng-click="removeUserAndRefreshCiclo(selecteds)"><label>{{selecteds.nome_ciclo}}</label><input type="hidden" value="{{selecteds.id_revisao_ciclo}}" name="ciclo[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>{{ 'USUARIOS.NIVEL' | translate }}</label>
                                        <div class="filters_view">
                                            <select id="selected_user_level" name="selected_user_level" class="" data-placeholder="Escolha o nível do usuário" ng-model="selectedUserLevel" ng-change="changeSelectedUserLevel()">
                                                <option value="" disabled="disabled" selected="selected">Selecione um nível</option>
                                                <option value="{{nivel.nivel}}" ng-repeat="nivel in niveis | filter : { added : '!'}">{{nivel.nivel}}</option>
                                            </select>
                                            <span class="corresponsaveis-selected" ng-repeat="selected in niveis | filter : { added : true}" ng-click="selected.added = null"><label>{{selected.nivel}}</label><i class="fa fa-remove"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div class="col-sm-2"  style="float: right;">
                                        <div class="clr_filters">
                                            <button class="clean_filter apply_filter" ng-click="listTable(true)">Aplicar Filtros</button>
                                            <a href="javascript:void(0)" class="clean_filter" ng-click="reset()">Limpar Filtros</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" style="padding-top: 29px; float: right;">
                                        <div class="container-block" style="float: right;" ng-init="countUsers = false">
                                          <input type="checkbox" id="chekdcount" ng-model="countUsers">
                                          <label for="chekdcount">Ver Totais</label>
                                        </div>

                                    </div>
                                 </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

    </div>
    <div class="clearfix"></div>
    <div class="main_box_show_dv dv-box" >
        <div class="DV_table_view_elofy cli">
            <div class="table-responsive content horizontal-images">
                <div class="box-caption">Box calculado partir de revisão</div>
                <!-- <pre> {{ ninebox | json }} </pre> -->
                <div class="col-sm-12 col-md-7" ng-init="
                                                            boxes[0].name_translated = 'AVALIACAO_DE_DESEMPENHO.RIDDLE'; boxes[0].number = 3; boxes[0].class = 'yellow_nine_box'; 
                                                            boxes[1].name_translated = 'AVALIACAO_DE_DESEMPENHO.STRONG_EFFORT'; boxes[1].number = 6; boxes[1].class = 'blue_nine_box';
                                                            boxes[2].name_translated = 'AVALIACAO_DE_DESEMPENHO.HIGH_POTENTIAL'; boxes[2].number = 9; boxes[2].class = 'blue_nine_box'; 
                                                            boxes[3].name_translated = 'AVALIACAO_DE_DESEMPENHO.QUESTIONABLE'; boxes[3].number = 2; boxes[3].class = 'yellow_nine_box2'; 
                                                            boxes[4].name_translated = 'AVALIACAO_DE_DESEMPENHO.SUPPORTER'; boxes[4].number = 5; boxes[4].class = 'green_nine_box';
                                                            boxes[5].name_translated = 'AVALIACAO_DE_DESEMPENHO.STRONG_PERFORMANCE'; boxes[5].number = 8; boxes[5].class = 'blue_nine_box'; 
                                                            boxes[6].name_translated = 'AVALIACAO_DE_DESEMPENHO.INSUFFICIENT'; boxes[6].number = 1; boxes[6].class = 'red_nine_box'; 
                                                            boxes[7].name_translated = 'AVALIACAO_DE_DESEMPENHO.EFFECTIVE'; boxes[7].number = 4; boxes[7].class = 'yellow_nine_box2'; 
                                                            boxes[8].name_translated = 'AVALIACAO_DE_DESEMPENHO.COMMITED'; boxes[8].number = 7; boxes[8].class = 'yellow_nine_box'; 
                                                            initBoxes();">

                                                            <!-- <div data-toggle="tooltip" data-placement="top" title="Tooltip on top">asd
                                                            </div><div data-toggle="tooltip" data-placement="top" title="Tooltip on top">DDD
                                                            </div> -->

                                                             
                                                            
                                                                
                                                                                                                      
                    <div class="nine_box_container col-md-4 col-sm-6" ng-repeat="b in boxes" ng-click="openBox(b);" title="{{ dadosBox1 }}" >

                        <div class="nine_box_content {{b.class}}" style="padding: 0px;" ng-mouseover="showDivNomesCargos(b, ninebox[b.number].users);">
                            <div class="col-md-6 top-left">
                                <i class="fa {{b.icon}}"></i><h5>{{ b.name_translated | translate }} </h5>
                            </div>
                            <div class="col-md-6 top-right">
                            </div>
                            <div class="col-md-6 bottom-left">
                                <div class="users" ng-if="ninebox[b.number].total > 0"  ng-show="countUsers == false">
                                    <div class="user" ng-repeat="user in ninebox[b.number].users | limitTo:3">
                                        <img src=""  ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" />
                                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                                    </div>
                                    <span class="users_extra_count" ng-if="ninebox[b.number].total > 3">+ {{ ninebox[b.number].total - 3 }} usuários</span>
                                </div>
                            </div>
                            <div class="col-md-6 bottom-right">
                                <div class="usersCount" ng-show="countUsers == true" style="text-align: center; font-size: 30px; font-weight: bold; line-height: 63px;">
                                    <span>{{ninebox[b.number].total}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-5" ng-if="selectedBox">
                    <div class="selected_box">
                        <i class="fa {{selectedBox.icon}}"></i><h5>{{ selectedBox.name_translated | translate }}</h5>
                        <p>{{ selectedBox.name_translateddesc }}</p>
                        <hr>
                        <div class="users_tab_list">
                            <ul>
                                <li ng-repeat="user in selectedBox.users">
                                    <div class="col-sm-7">
                                        <img src=""  ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="36" height="36" data-toggle="tooltip" data-placement="top" title="{{ user.name }}" />
                                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>

                                        <div class="user-specs">
                                            <div class="user-name">{{user.name}}</div>

                                            <div class="company-time">Tempo de empresa: 
                                                    <span ng-if="user.tempo_empresa < 1">menos de 1 mês</span>
                                                    <span ng-if="user.tempo_empresa == 1">{{user.tempo_empresa}} mês</span>
                                                    <span ng-if="user.tempo_empresa > 1 && user.tempo_empresa < 12">{{user.tempo_empresa}} meses</span>
                                                    <span ng-if="user.tempo_empresa == 12">1 ano</span>
                                                    <span ng-if="user.tempo_empresa > 12">{{user.tempo_empresa/12 | number:2}} anos</span>
                                            </div>
                                            <div class="company-time media-final">
                                                Média final: {{user.media_final}}
                                            </div>
                                            <div class="company-time cargo">
                                                Cargo: {{user.cargo}}
                                            </div>
											 <div class="company-time media-final">
                                                 Remuneração Atual: {{user.atual}}
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <form ng-submit="changeNineBox(user.id_revisao_ciclo_score, user.new_ninebox, selectedBox.number)">
                                            <select name="box-change" class="box-change hide" data-placeholder="novo valor" ng-model="user.new_ninebox" >
                                                <option selected="selected" value="">Escolha</option>
                                                <option ng-repeat="box in boxes" value="{{box.number}}">{{box.name_translated | translate}}</option>
                                            </select>
                                            <button style="margin-top:4px; width:100%;" class="clean_filter" ng-click="">Salvar</button>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-responsive content horizontal-images">
                <div class="box-caption">Box calibrado</div>
                <div class="col-sm-12 col-md-7">
                    <div class="nine_box_container col-md-4 col-sm-6" ng-repeat="b in boxes" ng-click="openBoxCal(b)" title="{{ dadosBox1 }}">
                        <div class="nine_box_content {{b.class}}" ng-mouseover="showDivNomesCargos(b, ninebox_cal[b.number].users);" style="padding: 0px;">
                            <div class="col-md-6 top-left">
                                <i class="fa {{b.icon}}"></i><h5>{{ b.name_translated | translate }}</h5>
                            </div>
                            <div class="col-md-6 top-right">
                            </div>
                            <div class="col-md-6 bottom-left">
                                <div class="users" ng-if="ninebox_cal[b.number].total > 0"  ng-show="countUsers == false">
                                    <div class="user" ng-repeat="user in ninebox_cal[b.number].users | limitTo:3">
                                        <img src=""  ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" data-toggle="tooltip" data-placement="top" title="{{ user.name }}" />
                                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                                    </div>
                                    <span class="users_extra_count" ng-if="ninebox_cal[b.number].total > 3">+ {{ ninebox_cal[b.number].total - 3 }} usuários</span>
                                </div>
                            </div>
                            <div class="col-md-6 bottom-right">
                                <div class="usersCount" ng-show="countUsers == true" style="text-align: center; font-size: 30px; font-weight: bold; line-height: 63px;">
                                    <span>{{ninebox_cal[b.number].total}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5" ng-if="selectedBoxCal">
                    <div class="selected_box">
                        <i class="fa {{selectedBoxCal.icon}}"></i><h5>{{ selectedBoxCal.name_translated | translate }}</h5>
                        <p>{{ selectedBoxCal.name_translateddesc }}</p>
                        <hr>
                        <div class="users_tab_list">
                            <ul>
                                <li ng-repeat="user in selectedBoxCal.users">
                                    <div class="col-sm-8">
                                        <img src=""  ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="36" height="36" data-toggle="tooltip" data-placement="top" title="{{ user.name }}" />
                                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>

                                        <div class="user-specs">
                                            <div class="user-name">{{user.name}}</div>
                                            <div class="company-time">
                                                <span ng-if="user.notcal == 1"><b>Não calibrado</b></span>
                                                <span ng-if="!user.notcal" ng-class="{'positivecal':selectedBoxCal.number - user.nine_box > 0, 'negativecal':selectedBoxCal.number - user.nine_box < 0}">{{selectedBoxCal.number - user.nine_box}}</span>
                                            </div>
                                            <div class="company-time">Tempo de empresa: 
                                                    <span ng-if="user.tempo_empresa < 1">menos de 1 mês</span>
                                                    <span ng-if="user.tempo_empresa == 1">{{user.tempo_empresa}} mês</span>
                                                    <span ng-if="user.tempo_empresa > 1 && user.tempo_empresa < 12">{{user.tempo_empresa}} meses</span>
                                                    <span ng-if="user.tempo_empresa == 12">1 ano</span>
                                                    <span ng-if="user.tempo_empresa > 12">{{user.tempo_empresa/12 | number:2}} anos</span>
                                            </div>
                                            <div class="company-time media-final">
                                                Média final: {{user.media_final}}
                                            </div>
                                            <div class="company-time cargo">
                                                Cargo: {{user.cargo}}
                                            </div>
                                             <div class="company-time media-final">
                                                 Remuneração Atual: {{user.atual}}
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <form ng-submit="resetNineBoxCalibrado(user.id_revisao_ciclo_score)" ng-if="!user.notcal">
                                            <button style="margin-top:4px; width:100%;" class="clean_filter" ng-click="">Restabelecer</button>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>



