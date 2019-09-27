<style type="text/css">
  i.fa.fa-user-circle-o {
    margin: 0 5px 0 0px;
	color:#000;
}
  section {
    padding:inherit;
}
/*li.tav-active-feed {
    background: #ccc;
	    border-radius: 5px 0 0 5px;
		    margin: 0 0 0 2px;
}
li.tav-active-feed:last-child {
    border-radius: 0 5px 5px 0;
}
li.tav-active-feed:nth-child(2) {
    border-radius: 0;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #fff !important;
    background-color: #36b8ec !important;
    margin: 0;
    border-radius: 5px 0 0 5px;
}*/

@media
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		.porfile-competencias-panel table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		.porfile-competencias-panel thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

		.porfile-competencias-panel tr { border: 1px solid #ccc; }

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
		.porfile-competencias-panel td:nth-of-type(1):before { content: "-"; }
		.porfile-competencias-panel td:nth-of-type(2):before { content: "Auto-Avaliacao"; }
		.porfile-competencias-panel td:nth-of-type(3):before { content: "Gestor"; }
		.porfile-competencias-panel td:nth-of-type(4):before { content: "Media Final"; }
	}
  </style>
<!-- Perfil -->





<div ng-controller="profileCtrl" class="hide" ng-class="{'hide': !user.id}">
	<h2 class="new_heading_dv">
		<span>Perfil</span>
		<div class="button_sets">
			<a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': profiletab == '1' || !profiletab}" ng-click="myTab()">Você</a>
			<a href="javascript:void(0)" class="additional actives" ng-class="{'active_bitton_links_dv': profiletab == '2'}" ng-click="myTeamTab()">Seu time</a>
			<div class="okr_animation"></div>
		</div>
    </h2>
    <div class="main_section">
        <div ng-show="profiletab==1 || !profiletab">
            <div class="wlcm">
                <span class="close_wlcm"></span>
                <img src="<?php echo base_url('assets/portal/img')?>/icon_people.png" alt="" class="wlcm_img">
                <h2 class="wlcm_heading">Olá, {{ user.name }}!</h2>
               <!-- <div class="wlcm_fdbk"><span> 4 feedbacks</span> esperando você.</div> -->
                <div class="wlcm_fdbk"><span>Bem Vindo de Volta</span></div>

                <div class="btn_group">
                    <a href="#"  ng-click="SolicitarFeedback()" class="blink btn_fdbk"><i class="bicon"></i>Feedback</a>
                 <!--   <a href="#" class="blink btn_exam"><i class="bicon"></i> Realize seu Check-in</a> -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 fright">
                    <div class="user_profile">
                        <div class="employes_nmae_ig">
                            <div class="employe_image employe_user-img" ng-style="{'background-image': (user.md_image) ? 'user.md_image' : 'url({{user.md_image}})'}">
                                <img src="" ng-if="user.md_image" ng-src="{{ userDetailImage?userDetailImage:user.md_image }}" class="img-circle" width="144" height="144" alt="{{ user.name }}" />
                                <span class="user-image-replace" ng-if="!user.md_image">{{ initials(user.name) }}</span>
                            </div>
                            <div class="personal_detail">
                                <h2>{{ user.name }}
                                <span class="user-cashier-panel">{{ user.usuarioviewTime.nome_cargo }}</span>
                                </h2>
                                <div class="user_info">
                                    <span>Email</span>
                                    <div class="user_desp">{{ user.email }}</div>
                                </div>
                                <div class="user_info">
                                    <span>Data de admissão</span>
                                    <div class="user_desp">
                                        <div class="review_dv" ng-show="user.birthday !=null">{{ user.birthday | amUtc | amDateFormat:'MMMM DD, YYYY' }}</div>
                                        <div class="review_dv" ng-show="user.birthday ==null">N/A</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       <a href="" ng-click="modalUser()" class="editprof">Edite seu Perfil</a>

                    <div class="user_team">
                        <div class="dblock_head">
                            <h2 class="dheading">Time</h2>
                        </div>
                        <div class="dblock_body">
                            <div class="new_team_block team_block">
                                <div class="media media-tab-line" ng-repeat="teamteam in adminusuarios" ng-if="teamteam.id!=user.id">
                                    <a href="javascript:void(0);" class="user-image-wrap">
                                        <img src="" ng-if="teamteam.xs_image" ng-src="{{ teamteam.xs_image }}" class="img-circle" width="40" height="40" alt="{{ teamteam.name }}" />
                                    <span class="user-image-replace" ng-if="!teamteam.xs_image">{{ initials(teamteam.name) }}</span>
                                    </a>
                                    <div class="media-body">
                                        <h2>{{teamteam.name}} <span class="user-cashier-panel">{{teamteam.email}}</span>
                                        <span class="user-cashier-panel">{{teamteam.nome_cargo}}</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                   <div class="dblock">
                        <div class="dblock_body">
                            <div class="babs-2-pabel">
                                <div class="tab tab-feedback-panel" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <div class="tabs-cntr">
                                        <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                            <li class="tav-active-feed active" role="presentation"><a href="#Sectionupdate" aria-controls="profile" role="tab" data-toggle="tab">Updates</a></li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs feedbacktabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="Sectionupdate">
                                            <a href="javascript:void(0)" ng-click="newUpdate()" class="addmore ppp">Nova Atualização</a>

                                            <div class="table-responsive table_wrap" style="padding-right:12px;">
                                                <table>
                                                    <tr ng-repeat="user_update in user_updates" ng-if="user_updates.length>0">
                                                        <td>

                                                            {{ user_update.date_update | amUtc | amDateFormat:'DD/MM/YYYY' }}
                                                            <span class="newcomments" ng-if="user_update.unread_comments[0].unread_comment>0">
																<i class="fa fa fa-commenting-o" style="font-size:20px"></i> <span class="comment_count">{{ user_update.unread_comments[0].unread_comment }}</span>
                                                            </span>

                                                       </td>
                                                       <td>
														   <b ng-if="user_update.situation==1" style="color:#0dfb7b">Revisada</b>
														   <b ng-if="user_update.situation==0" style="color: #999;">Não Revisada</b>
													   </td>
                                                        <td width="150">
                                                            <div class="div_action">
                                                                <a href="javascript:void(0)" ng-click="showupdate(user_update.id)" >Ver Atualização</a>
                                                            </div>
                                                        </td>
                                                    </tr>
													<tr ng-if="user_updates.length<1">
                                                        <td colspan="3" align="center" style="text-align:center;">
                                                            <strong>Sem atualizações ainda.</strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    <div class="dblock">

                        <div class="dblock_body">
                            <div class="babs-2-pabel">
                                <div class="tab tab-feedback-panel" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <div class="tabs-cntr">
                                        <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                            <li class="tav-active-feed active" role="presentation"><a href="#Section6" aria-controls="profile" role="tab" data-toggle="tab">Meus Objetivos</a></li>
                                            <li role="presentation" class="tav-active-feed "><a href="#Section5" aria-controls="home" role="tab" data-toggle="tab">Meu Time</a></li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs feedbacktabs">
                                        <div ng-controller="okrCtrl" role="tabpanel" class="tab-pane fade in active" id="Section6">
                                            <a href="javascript:void(0)" ng-click="okrperfil()" class="addmore ppp">Novo Objetivo</a>

                                            <div class="table-responsive table_wrap" style="padding-right:12px;">
                                                <table  >
                                                    <tr  ng-repeat="tatic in profiletatics" >
                                                        <td>
                                                            <a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a>
                                                            <span ng-repeat="tag in tatic.tags" style="" ng-hide="tag.name==''" ></span>
                                                       </td>
                                                        <td width="155">
                                                            <div class="progress_wrap">
                                                                <span>{{ tatic.percentage }}%</span>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage }}%;" aria-valuenow="{{ tatic.percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td width="150">
                                                            <div class="div_action">
                                                                <a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">Editar</a>
    <!--
                                                               <a ng-show="user.admin=='true' || tatic.authorised==user.id" href="javascript:void(0)" ng-click="DeleteTatic(tatic.id,0)" >Delete</a>
    -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- Modal Novo OKR starts here-->
                                            <div class="modal fade in" id="new-okr-perfil">
                                                <div class="modal-dialog">
                                                    <form id="form-okrperfil" class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Novo Objetivo Pessoal</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="progress" ng-class="{'hide': users.length && teams.length && years.length}" style="margin-top:17px;">
                                                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                            </div>

                                                            <div class="form hide" ng-class="{'hide': !users.length && !teams.length && !years.length}">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="okr-name-perfil" class="control-label">Nome</label>
                                                                            <input name="nome" type="text" class="form-control" id="okr-name-perfil">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="okr-description-perfil" class="control-label">Descrição</label>
                                                                            <textarea name="descricao" id="okr-description-perfil" class="form-control" rows="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="okr-user-perfil" class="control-label">Responsável</label>
                                                                            <select id="okr-user-perfil" name="usuario" class="select2 usuario-okr" data-allow-clear="true" data-placeholder="Selecione um Usuário">
                                                                                <option value=""></option>
                                                                                <optgroup label="Usuários">
                                                                                    <option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="okr-team-perfil" class="control-label">Time</label>
                                                                            <select id="okr-team-perfil" name="time" class="select2 times-okr" data-allow-clear="true" data-placeholder="Selecione um Time">
                                                                                <option value=""></option>
                                                                                <optgroup label="Times">
                                                                                    <option ng-repeat="team in teams" ng-value="{{ team.id }}">{{ team.name }}</option>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="okr-year-perfil" class="control-label">Ano</label>
                                                                            <select id="okr-year-perfil" name="ano" class="select-year-okr form-control" ng-model="currentYearOkrPerfil" ng-options="year as year for year in years" ng-change="changeCycleOkrPerfil()" ></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" ng-class="{'hidden': !cyclesOkrPerfil.length}">
                                                                        <div class="form-group">
                                                                            <label for="okr-cycles-perfil" class="control-label">Trimestres</label>
                                                                            <select id="okr-cycles-perfil" multiple="multiple" name="clicos" class="form-control multiple cycles-okr-perfil" ng-model="cyclesModelOkrPerfil" ng-options="cycle.id as cycle.name for cycle in cyclesOkrPerfil">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="link-perfil">
                                                                            <label class="control-label">Link</label>
                                                                            <div class="checkbox" style="margin-top:2px;">
                                                                                <input type="checkbox" id="direcionador-perfil" onclick="$('#objetivo-perfil').attr('checked',false);$('#objetivo-perfil').prop('checked',false);" ng-model="direcionadorperfil" name="link[]" value="1" class="styled-checkbox" ng-click="linkTypePerfil(1)">
                                                                                <label for="direcionador-perfil">Direcionador</label>
                                                                            </div>
                                                                            <div class="checkbox">
                                                                                <input type="checkbox" id="objetivo-perfil" onclick="$('#direcionador-perfil').attr('checked',false);$('#direcionador-perfil').prop('checked',false);" ng-model="objetivoperfil" value="2" name="link[]" class="styled-checkbox" ng-click="linkTypePerfil(2)">
                                                                                <label for="objetivo-perfil">Objetivo</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" ng-class="{'hidden': !objectives.length}">
                                                                        <div class="form-group">
                                                                            <label for="okr-tatic-objectives" class="control-label">Objetivos</label>
                                                                            <select id="okr-objectives-perfil" name="objetivo" class="select2 objetivo-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Objetivo" ng-model="ObjectiveIdPerfil">
                                                                                <option value=""></option>
                                                                                <optgroup label="Objetivos">
                                                                                    <option ng-repeat="item in objectives" ng-value="{{ item.id }}">{{ item.title }}</option>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                                                            <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Modal Novo OKR end here-->
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in " id="Section5">
                                       <!--      <a href="javascript:void(0)" ng-click="okr()" class="addmore ppp">Objetivo Pessoal</a> -->
                                            <div class="table-responsive table_wrap" style="padding-right:12px;">
                                                <table>
                                                    <tr ng-repeat="tatic in results.tatics"  >
                                                        <td>
                                                            <a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a>
                                                            <span ng-repeat="tag in tatic.tags" style="" ng-hide="tag.name==''" ><i class="fa fa-tags"></i></span>
                                                       </td>
                                                        <td width="155">
                                                            <div class="progress_wrap">
                                                                <span>{{ tatic.percentage }}%</span>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage }}%;" aria-valuenow="{{ tatic.percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td width="150">
                                                            <div class="div_action">
                                                                <a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">Editar</a>
                                                          <!--      <a href="javascript:void(0)" ng-click="DeactivePdi(tatic.id,0)">Deletar</a> -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                       <!--     <div class="text-right">
                                                <a href="#" class="loadmore">Veja mais Objetivos</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="dblock">
                        <div class="dblock_head">
                            <h2 class="dheading">Competências</h2>
                    <!--        <a href="javascript:void(0)" ng-click='add_skill()' class="addmore">Nova Competência</a> -->
                        </div>
                        <div class="dblock_body">
                            <div class="table-responsive table_wrap ">
                                <table >
                                    <tr>
                                        <th>Competência</th>
                             <!-- 	    <th>Sua Avaliação</th>  -->
                                        <th>Avaliação pelo gestor</th>
                                        <th>Média</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr  style="text-align:left;" ng-repeat="comencia in comencias | limitTo:10">
                                        <td>{{ comencia.nome_competencia }}</td>
                            <!--        <td>{{ comencia.autoavaliacao }}</td>  -->
                                        <td>{{ comencia.gestor }}</td>
                                        <td>{{ comencia.media }}</td>
                                        <td>
                                    <!--        <div class="div_action">
                                                <a href="#">Apagar</a>
                                            </div>-->
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
-->
                    <div class="dblock">
                        <div class="dblock_head">
                            <h2 class="dheading">Últimas Atualizações</h2>
                        </div>
                        <div class="dblock_body" id="Section4">

                        <div ng-controller="feedCtrl" class="hide" ng-class="{'hide': !feeds}">
                            <ul class="cbp_tmtimeline">
                                <li ng-repeat="feed in feeds">
                                    <div class="cbp_tmicon" ng-class="{'bg-success': feed.type == '1', 'bg-secondary': feed.type == '0', 'bg-warning': feed.type == '2'}"> <i ng-class="{'entypo-check': feed.type == '1', 'entypo-cancel': feed.type == '0', 'entypo-info': feed.type == '2'}"></i> </div>
                                    <time class="cbp_tmtime"><span>{{ feed.day }}</span></time>
                                    <div class="cbp_tmlabel">
                                        <h2>{{ feed.event }}</h2>
                                        <p>{{ feed.description }}</p>
                                        <span>{{ feed.timeAgo }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>

                    <div class="dblock">
                        <div class="dblock_head">
                            <h2 class="dheading">Feedbacks</h2>
                            <span class="addmore" ng-click="SolicitarFeedback()">Solicitar feedback</span>
                        </div>
                        <div class="dblock_body">
                            <div class="babs-2-pabel">
                                <div class="tab tab-feedback-panel" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <div class="tabs-cntr">
                                        <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                            <li role="presentation" class="tav-active-feed active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Recebidos</a></li>
                                            <li class="tav-active-feed" role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Concedidos</a></li>
                                            <li class="tav-active-feed" role="presentation"><a href="#Section3" aria-controls="profile" role="tab" data-toggle="tab">Solicitados</a></li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs feedbacktabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                            <div class="feedbcsections" ng-show="feedback_recived.length >0" ng-repeat="recieved in feedback_recived" >
                                                <div class="heading_dv_name">
                                                    <div class="heading_left">
                                                        <span>De <i class="fa fa-caret-right"></i></span>
                                                        <div class="user_img_dv" ng-if="recieved.image">
                                                             <img src=""  ng-src="{{ recieved.image }}" class="img-circle" alt="{{ initials(recieved.name) }}" height="40" width="40"/>
                                                        </div>
                                                        <div class="user_img_nam" ng-if="!recieved.image">{{ initials(recieved.name) }}</div>
                                                        <label>{{ recieved.name }}</label>
                                                    </div>
                                                    <div class="heading_right"><i class="fa fa-{{recieved.privacy=='1'?'lock':'unlock'}}"></i>
                                                    <span>
                                                        {{recieved.privacy=='1'?'Privado':'Público'}}
                                                    </span>
                                                    {{ recieved.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}</div>
                                                </div>
                                                <div class="description_tag">{{ recieved.response }}</div>
                                                <div class="desct-p" ng-show="recieved.valore.length > 0" ng-repeat="valor in recieved.valore">
                                                    <label>{{valor.name}}</label>
                                                </div>
                                            </div>
                                            <div class="" ng-show="feedback_recived.length < 1 ">
                                                <div class="media media-tab-line" >
                                                    <div class="media-body">
                                                        <p class="media-heading" style="text-align:center;">Não foram encontrados registros</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                                            <div class="feedbcsections" ng-repeat="given in feedback_given" ng-if="feedback_given.length > 0" >
                                                <div class="heading_dv_name">
                                                    <div class="heading_left">
                                                        <span>De <i class="fa fa-caret-right"></i></span>
                                                        <div class="user_img_dv" ng-if="given.image">
                                                             <img src=""  ng-src="{{ given.image }}" class="img-circle" alt="{{ initials(given.name) }}" height="40" width="40"/>
                                                        </div>
                                                        <div class="user_img_nam" ng-if="!given.image">{{ initials(given.name) }}</div>
                                                        <label>{{ given.name }}</label>
                                                    </div>
                                                    <div class="heading_right"><i class="fa fa-{{given.privacy=='1'?'lock':'unlock'}}"></i>
                                                    <span>
                                                        {{given.privacy=='1'?'Privado':'Público'}}
                                                    </span>
                                                    {{ given.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}</div>
                                                </div>
                                                <div class="description_tag">{{ given.response }}</div>
                                                <div class="desct-p" ng-show="given.valore.length > 0" ng-repeat="valor in given.valore">
                                                    <label>{{valor.name}}</label>
                                                </div>
                                            </div>

                                            <div class="media media-tab-line" ng-show="feedback_given.length< 1">
                                                    <div class="media-body">
                                                        <p class="media-heading" style="text-align:center;">Não foram encontrados registros</p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                                            <div class="feedbcsections" ng-repeat="requested in feedback_requested" ng-if="feedback_requested.length >0">
                                                <div class="heading_dv_name">
                                                    <div class="heading_left">
                                                        <span>De <i class="fa fa-caret-right"></i></span>
                                                        <div class="user_img_dv" ng-if="requested.image">
                                                             <img src=""  ng-src="{{ requested.image }}" class="img-circle" alt="{{ initials(requested.name) }}" height="40" width="40"/>
                                                        </div>
                                                        <div class="user_img_nam" ng-if="!requested.image">{{ initials(requested.name) }}</div>
                                                        <label>{{ requested.name }}</label>
                                                    </div>
                                                    <div class="heading_right"><i class="fa fa-{{requested.privacy=='1'?'lock':'unlock'}}"></i>
                                                    <span>
                                                        {{requested.privacy=='1'?'Privado':'Público'}}
                                                    </span>
                                                    {{ requested.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}</div>
                                                </div>
                                                <div class="description_tag">{{ requested.response }}</div>
                                                 <a href="javascript:void(0)" ng-click="SolicitarFeedback(requested.destino)" title="Reply to this feedback"><i class="fa fa-reply" style="float:right"></i></a>
                                                <div class="desct-p" ng-show="requested.valore.length > 0" ng-repeat="valor in requested.valore">
                                                    <label>{{valor.name}}</label>
                                                </div>
                                            </div>
                                            <div class="media media-tab-line" ng-show="feedback_requested.length<1">
                                                    <div class="media-body">
                                                        <p class="media-heading" style="text-align:center;">Não foram encontrados registros</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               <div class="activity_dv">
                <h2 class="dheading">Atividades</h2>
                <div class="activities_table_set" ng-repeat="activity in results.activities" style="margin: 10px 0 0 0;">
                <div class="activities_heading">
                    <h3>{{ activity.title }}</h3>
                    <a href="<?php echo base_url()?>planejamento#!/tatic/{{ activity.tatic_id }}/{{ activity.key_id }}/{{ activity.id }}" class="edit_anchor">Editar</a>
                </div>
                    <div class="tbale_dv">
                        <div class="table_row_cil hder">
                            <div class="table_cell_cil">
                                <span>Responsável</span>
                            </div>
                            <div class="table_cell_cil">
                                <span>Prazo</span>
                            </div>
                            <div class="table_cell_cil">
                                <span>&nbsp;</span>
                            </div>
                        </div>
                        <div class="table_row_cil">
                            <div class="table_cell_cil">
                                <span class="bg_user_img" style="">
                                     <img src="" ng-if="user.xs_image" ng-src="{{ user.xs_image }}"  alt="{{ user.name }}" />
                                    <label ng-if="!user.xs_image">{{ initials(user.name) }}</label>
                                </span>
                                <label >{{ user.name }}</label>
                            </div>
                            <div class="table_cell_cil">
                                <span>{{ activity.init | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                            </div>
                            <div class="table_cell_cil">
                                <span class="todo_list">
                                    <a href="javascript:void(0)" ng-class="{'yellow': activity.percentage>=0 && activity.percentage<50 && activity.atraso==0}" class="grey yes" ng-click="toDoYellow(activity.id)">Pendente</a>
                                    <a href="javascript:void(0)" ng-class="{'blue': activity.percentage>=50 && activity.percentage<100 && activity.atraso==0}" class="grey yes" ng-click="toDoBlue(activity.id)">Andamento</a>
                                    <a href="javascript:void(0)" ng-class="{'green': activity.percentage==100 && activity.atraso==0}" class="grey yes" ng-click="toDoGreen(activity.id)">Completa</a>
                                    <a href="javascript:void(0)" ng-class="{'red': activity.percentage<=50 && activity.atraso==1}" class="grey yes" ng-click="toDoRed(activity.id)">Atrasada</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="activities_sets">

                <div class=""></div>
            </div>-->

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div ng-show="profiletab==2">
			<div class="div_class_filter">
				<form id="form-search" ng-submit="filter_profile()">
				<div class="filter_form_view filter_form_view_lbl">
					<div class="row">
						<div class="col-sm-4">
							<label>Pessoa</label>
							<div class="clearfix"></div>
							<div class="filters_view">
							<select id="search-user" name="usuario" class="select2 usuario" data-placeholder="Selecione um Usuário" ng-options="user.id as user.name for user in users" ng-model="id_usuario">
									<option value="">Todos</option>
                            </select>
							</div>
						</div>
						<div class="col-sm-4">
							<label>TIME</label>

							<div class="clearfix"></div>
							<div class="filters_view">
							<select id="search-team" name="time" class="select2 time" ng-options="team.id as team.name for team in teams" ng-model="teamid">
                            	<option value="">Todos</option>
                            </select>
							</div>
						</div>
						<div class="col-sm-4">
							<label>PERÍODO:</label>

							<div class="clearfix"></div>
							<div class="filters_view">
							<select id="search-week" name="week" ng-model="searchWeek" ng-change="filterbyWeek()" class="select2 usuario" data-placeholder="Selecione período">
								<option value="current">Semana Atual</option>
								<option value="last">Última Semana</option>
								<option value="2">2 Semanas Atrás</option>
								<option value="3">3 Semanas Atrás</option>
                            </select>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
			<div class="clearfix"></div>
		<div class="row_side_content-sectioms">
			<div class="col-sm-6" ng-repeat="team in myteams | filter: teamid | filter: id_usuario" ng-if="team.updates.length>0">
				<div class="div_view_shorts">
					<div class="userupdatesectoin" ng-repeat="update in team.updates" ng-if="team.updates.length>0">
						<div class="heading_top">
							<div class="left_image">
								<img src="" ng-if="team.xs_image" ng-src="{{ team.xs_image }}" class="img-circle" width="50" height="50" alt="{{ team.name }}" />
								<span class="user-image-replace-nam" ng-if="!team.xs_image">{{ initials(team.name) }}</span>
							</div>
							<div class="user_dteisl_dc">
								<label>{{ team.name }}</label>
								<span>{{ team.teamname }}</span>
							</div>
							<div class="week_view_s">{{ update.date_update | amUtc | amTimeAgo:true }} </div>
							<div class="labe_c">
								<label for="ch_{{team.id_usuario}}" ng-click="updatestatus($event, update.id)">
									<input type="checkbox" value="{{update.id}}" ng-checked="update.situation==1"  id="ch_{{update.id}}">
									<span><i class="fa fa-check-circle"></i></span>
								</label>
							</div>
							<div class="feed_back_give">
								<a href="javascript:void(0)" class="feddback_btn" ng-click="SolicitarFeedback()">
									<i class="fa fa-comment"></i>
									<span>Dar Feedback</span>
								</a>
							</div>
							<div class="veiew">
								<i class="fa fa-chevron-down"></i>
							</div>
						</div>
						<div class="shorts_bottoms">
							<div ng-repeat="question in update.questions">
								<div ng-if="question.type=='q'" ng-include="'teamtextQuestion'"></div>
								<div ng-if="question.type=='e'" ng-include="'teamtstarRating'"></div>
								<div ng-if="question.type=='c'" ng-include="'teamtheartRating'"></div>
								<div ng-if="question.type=='o'" ng-include="'teamtmultipleAnswer'"></div>
								<div class="see_more_comments" ng-if="question.answers[0].comments.length>2"><a href="javascript:void(0)">Veja mais comentários</a></div>
								<div class="comment_block" ng-if="question.answers[0].comments.length>0">
									<div class="comment_data" ng-repeat="comment in question.answers[0].comments" ng-class="{'hide':$index>1}">
										<div class="here_goes" >
											<div class="left_img">
												<img ng-if="comment.xs_image" ng-src="{{ comment.xs_image }}" class="img-circle" width="30" height="30" alt="{{ comment.name }}" />
												<span class="user-image-replace-nam" ng-if="!comment.xs_image">{{ initials(comment.name) }}</span>
											</div>

											<div class="name_view">
												<div><span><strong>{{comment.name}}</strong></span> <span class="commentdate"> {{ comment.date_update | amUtc | amTimeAgo:true }}</span></div>
												<div class="comment">{{comment.comment}}</div>
												<!--<div class="right_close">
													<a href="javascript:void(0);" ng-click="deletecomment(comment.id)"><i class="fa fa-times"></i></a>
												</div>-->
											</div>
										</div>
									</div>
								</div>
								<div class="text-sub">
									<input type="text" name="comment[{{question.answers[0].id}}]" id="team_comment_{{question.answers[0].id}}" placeholder="Escreva um comentário." />
									<button type="button"  id="team_comment_button_{{question.answers[0].id}}]" ng-click="submitComment(question.answers[0].id)"></button>
								</div>
							</div>
							<script type="text/ng-template" id="teamtextQuestion">
								<div class="questio" >
									<span>{{$index+1}}: {{ question.question}}</span>
									<div>
										<label>{{ question.answers[0].resposta_qualitativa}}</label>
									</div>
								</div>
							</script>
							<script type="text/ng-template" id="teamtmultipleAnswer">
								<div class="questio" >
									<span>{{$index+1}}: {{ question.question}}</span>
									<div ng-repeat="answer in question.answers">
										<div class="viewupdateanswer"><i class='fa fa-check'></i> {{answer.response}}</div>
									</div>
								</div>
							</script>
							<script type="text/ng-template" id="teamtstarRating">
								<div class="questio">
									<span>{{$index+1}}: {{ question.question}}</span>
									<label><i class="fa fa-star" ng-class="{'active': question.answers[0].rating_score>0}"></i></label>
									<label><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>1}"></i></label>
									<label><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>2}"></i></label>
									<label><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>3}"></i></label>
									<label><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>4}"></i></label>
								</div>

							</script>
							<script type="text/ng-template" id="teamtheartRating">
								<div class="questio">
									<span>{{$index+1}}: {{ question.question}}</span>
									<label><i class="fa fa-heart" ng-class="{'active': question.answers[0].rating_score>0}"></i></label>
									<label><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>1}"></i></label>
									<label><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>2}"></i></label>
									<label><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>3}"></i></label>
									<label><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>4}"></i></label>
								</div>
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<section>
	<div class="view_dv_top">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-sm-12">
				<div class="employee_detail_bar">
				</div>
			</div>
		</div>
	</div>
	</section>
    <div class="popup-tab-panel">
		<div class="modal fade" id="SolicitarModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Feedbacks</h4>
				</div>
				<div class="modal-body modal-body-popup">
				  <div class="container">
						<div class="row">
							<div class="col-md-7">
								<div class="tab" role="tabpanel">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="tab-popups active"><a href="#sectionfirst" aria-controls="home" role="tab" data-toggle="tab">Conceder feedback</a></li>
										<li ng-if="profiletab==1 || !profiletab" class="tab-popups" role="presentation"><a href="#Sectionsecond" aria-controls="profile" role="tab" data-toggle="tab">Solicitar feedback</a></li>
									</ul>
									<!-- Tab panes -->
								   <div class="tab-content tabs">
										<div role="tabpanel" class="tab-pane fade in active" id="sectionfirst">
											<form id="give_feedback">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="user-name" class="control-label">Para quem é o feedback ? </label>
															<select name="feedbacktouser" id="feedbacktouser" ng-model="destino_id" multiple="multiple" class="form-control multiple">
															  <option value="{{searchuser.id}}" ng-repeat="searchuser in adminusuarios" >{{ searchuser.name }} </option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="user-name" class="control-label">Qual seu feedback</label>
															<textarea  name="feedback_given_answer" id="feedback_given_answer" class="form-control"></textarea>
														</div>
													</div>
												</div>
												<div class="row" ng-show="valores.length > 0">
													<div class="col-md-12">
														<label>Quais valores foram identificados ? <a href="javascript:void(0)" ng-click="viewValuesempresa()">Veja descrição dos Valores</a></label>
														<div class="form-group">
															<div class="valores_dv" >
															  <label class="btn_valoresa valores_dv_btn" ng-repeat="valore in valores">
																<input type="checkbox" name="valore[]" autocomplete="off" ng-value="{{valore.id}}" ng-model="valores_id" >
																<span>{{valore.name}}</span>
															  </label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<div class="btn-group" data-toggle="buttons">
															  <label class="btn btn-default active">
																<input type="radio" name="visiblity" id="visiblitypublic" autocomplete="off" value="0" checked="checked">Publico
															  </label>
															  <label class="btn btn-default">
																<input type="radio" name="visiblity" id="visiblityprivate" autocomplete="off"  value="1"> Privado <i class='fa fa-lock'></i>
															  </label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group pull-right" >
															<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
															<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Compartilhar Feedback</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="Sectionsecond">
											<form id="request_feedback">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="user-name" class="control-label">Solicitar Feedback para? </label>
															<select id="requestuser" name="requestuser" id="requestuser" multiple="multiple" class="form-control multiple" required>
															  <option value="{{searchuser.id}}" ng-repeat="searchuser in adminusuarios">{{ searchuser.name }}</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="user-name" class="control-label">Qual seu Feedback</label>
															<textarea  name="request_description" id="request_description" class="form-control" required></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group pull-right" >
															<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
															<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Solicitar Feedback</button>
														</div>
													</div>
												</div>
											</form>
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
	<div class="modal fade in" id="modal-valores">
        <div class="modal-dialog">
                <div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="showSolicitor()">X</button>
                    <h4 class="modal-title">Company values</h4>
                </div>
                <div class="modal-body">
                    <div class="form" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" ng-repeat="valor in valores" style="border-bottom: 1px solid #ddd;">
                                    <label for="user-name" class="control-label" style="font-size:15px">{{valor.name}}</label>
                                    <p style="font-size:14px;text-align:justify">{{valor.description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal" ng-click="showSolicitor()">Fechar</button>

                </div>
        </div>
    </div>
    <div class="modal fade in" id="newUpdateModal">
        <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h4 class="modal-title">Check in</h4>
		</div>
		<div class="modal-body modal-body-popup">
			<div class="progress" ng-class="{'hide': questions}" style="margin-top:17px;">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
			</div>
			<div class="model_bod">
				<form id="new_update" ng-submit="submitNewUpdate()" method="post">
					<input type="hidden" name="questioerio_id" value="{{questions[1]}}">
					<div class="row" ng-repeat="questionerio in questions[0]" ng-if="questions[0].length>0">
						<div class="col-md-12" ng-if="questionerio.type=='q'" ng-include="'textQuestion'"></div>
						<div class="col-md-12" ng-if="questionerio.type=='e'" ng-include="'starRating'"></div>
						<div class="col-md-12" ng-if="questionerio.type=='c'" ng-include="'heartRating'"></div>
						<div class="col-md-12" ng-if="questionerio.type=='o'" ng-include="'multipleAnswer'"></div>
					</div>
					<div class="row" ng-if="questions[0].length<1">
						<div class="col-md-12" ><div class="customs_labels"><strong>No questions found.</strong></div></div>
					</div>
					<div class="clearfix"></div>
					<div class="footer_box">
						<div class="left_footers" >
							<div class="button_sets" ng-if="questions[0].length>0">
								<div class="button_bar">
									<label for="1s">
										<input type="radio" id="1s" name="radios" checked>
										<span>Public</span>
									</label>
								</div>
								<div class="button_bar">
									<label for="2s">
										<input type="radio" id="2s" name="radios">
										<span>Private &nbsp; <i class="fa fa-lock"></i></span>
									</label>
								</div>
							</div>
						</div>
						<div class="right_footers">
							<div class="form-group pull-right" >
								<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
								<button ng-if="questions[0].length>0" type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar </button>
							</div>
						</div>
					</div>
				</form>
				<script type="text/ng-template" id="textQuestion">
					<div class="customs_labels">
					<label>{{questionerio.question}}</label>
					<input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
					<textarea name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Type your answer"></textarea>
				</div>
				</script>
				<script type="text/ng-template" id="multipleAnswer">
					<label>{{questionerio.question}}</label>
					<div class="model_ch">
						<div class="model_che" ng-repeat="answer in questionerio.options">
							<input type="checkbox" name="answers[multiresponse_answer][{{questionerio.id_pergunta}}][]"  autocomplete="off" ng-value="answer.id" id="ch{{ answer.id }}">
							<label for="ch{{ answer.id }}"> {{answer.answer}}</label>
						</div>
					</div>
				</script>
				<script type="text/ng-template" id="starRating">
					<div class="custom_label_dv">
					<label>{{questionerio.question}}</label>
					<input type="hidden" name="answers[rating_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
					<div class="custom_radio_lable">
						<label for="rad_{{questionerio.id_pergunta}}_1">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="rad_{{questionerio.id_pergunta}}_1">
							<span>Awful</span>
						</label>
					</div>
					<div class="custom_radio_lable">
						<label for="rad_{{questionerio.id_pergunta}}_2">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="rad_{{questionerio.id_pergunta}}_2">
							<span>Poor</span>
						</label>
					</div>
					<div class="custom_radio_lable">
						<label for="rad_{{questionerio.id_pergunta}}_3">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="rad_{{questionerio.id_pergunta}}_3">
							<span>Neutral</span>
						</label>
					</div>
					<div class="custom_radio_lable">
						<label for="rad_{{questionerio.id_pergunta}}_4">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="rad_{{questionerio.id_pergunta}}_4">
							<span>Good</span>
						</label>
					</div>
					<div class="custom_radio_lable">
						<label for="rad_{{questionerio.id_pergunta}}_5">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="rad_{{questionerio.id_pergunta}}_5">
							<span>Greater</span>
						</label>
					</div>
				</div>
				</script>
				<script type="text/ng-template" id="heartRating">
					<div class="custom_label_dv star">
						<label>{{questionerio.question}}</label>
						<input type="hidden" name="answers[heart_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
						<div class="custom_radio_lable">
							<label for="rad21_{{questionerio.id_pergunta}}_1">
								<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="rad21_{{questionerio.id_pergunta}}_1">
								<span>Awful</span>
							</label>
						</div>
						<div class="custom_radio_lable">
							<label for="rad22_{{questionerio.id_pergunta}}_2">
								<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="rad22_{{questionerio.id_pergunta}}_2">
								<span>Poor</span>
							</label>
						</div>
						<div class="custom_radio_lable">
							<label for="rad23_{{questionerio.id_pergunta}}_3">
								<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="rad23_{{questionerio.id_pergunta}}_3">
								<span>Neutral</span>
							</label>
						</div>
						<div class="custom_radio_lable">
							<label for="rad24_{{questionerio.id_pergunta}}_4">
								<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="rad24_{{questionerio.id_pergunta}}_4">
								<span>Good</span>
							</label>
						</div>
						<div class="custom_radio_lable">
							<label for="rad25_{{questionerio.id_pergunta}}_5">
								<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="rad25_{{questionerio.id_pergunta}}_5">
								<span>Greater</span>
							</label>
						</div>
					</div>
				</script>
			</div>
		</div>
	  </div>
	</div>
    </div>
	<div class="modal fade in" id="viewupdate">
        <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">View Check in</h4>
				</div>
				<div class="modal-body modal-body-popup">
					<div class="progress" ng-class="{'hide': questions}" style="margin-top:17px;">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
					<div class="container">
						<div class="row ">
							<div class="model_bod">
								<div class="col-md-7">
									<div class="row" ng-repeat="question in questions" >

										<div class="col-md-12" ng-if="question.type=='q'" ng-include="'viewtextQuestion'"></div>
										<div class="col-md-12" ng-if="question.type=='e'" ng-include="'viewstarRating'"></div>
										<div class="col-md-12" ng-if="question.type=='c'" ng-include="'viewheartRating'"></div>
										<div class="col-md-12" ng-if="question.type=='o'" ng-include="'viewmultipleAnswer'"></div>
										<div class="col-md-12">
											<div class=" see_more_comments" ng-if="question.answers[0].comments.length>2"><a href="javascript:void(0)">See more comments</a></div>
											<div class=" comment_block" ng-if="question.answers[0].comments.length>0">
												<div class="comment_data" ng-repeat="comment in question.answers[0].comments" ng-class="{'hide':$index>1}">
													<div class="here_goes" >
														<div class="left_img">
															<img ng-if="comment.xs_image" ng-src="{{ comment.xs_image }}" class="img-circle" width="30" height="30" alt="{{ comment.name }}" />
															<span class="user-image-replace-nam" ng-if="!comment.xs_image">{{ initials(comment.name) }}</span>
														</div>

														<div class="name_view">
															<div><span><strong>{{comment.name}}</strong></span> <span class="commentdate"> {{ comment.date_update | amUtc | amTimeAgo:true }}</span></div>
															<div class="comment">{{comment.comment}}</div>
															<!--<div class="right_close">
																<a href="javascript:void(0);" ng-click="deletecomment(comment.id)"><i class="fa fa-times"></i></a>
															</div>-->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12"><label style="font-size:15px;color:#000;width:100%;font-weight: 700;">Reviewed status</label>
											<div class="form-group">

											<div class="labe_c">
												<label for="reviewed_status">
													<input type="checkbox"  id="reviewed_status" disabled>
													<span><i class="fa fa-check-circle"></i></span>
												</label>
											</div><br>
										</div>
										</div>
									</div>
									<div class="row">
										<div class="footer_box">
											<div class="left_footers" >
												<div class="button_sets">
													<div class="button_bar">
														<label for="visiblitypublic_prfil">
															<input type="radio" name="privacy" id="visiblitypublic_prfil" disabled>
															<span>Public</span>
														</label>
													</div>
													<div class="button_bar">
														<label for="visiblityprivate_prfil">
															<input type="radio" name="privacy" id="visiblityprivate_prfil" disabled>
															<span>Private &nbsp; <i class="fa fa-lock"></i></span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group pull-right" >
												<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
											</div>
										</div>
									</div>
									<script type="text/ng-template" id="viewtextQuestion">
										<div class="form-group">
											<label for="user-name" class="control-label ng-binding ng-scope">{{$index+1}}. {{question.question}}</label>
											<div class="viewupdateanswer">{{question.answers[0].resposta_qualitativa}}</div>
										</div>
									</script>
									<script type="text/ng-template" id="viewmultipleAnswer">
										<div class="form-group">
											<label for="user-name" class="control-label ng-binding ng-scope">{{$index+1}}. {{question.question}}</label>
											<div class="viewupdateanswer">
											<ul>
												<li ng-repeat="answer in question.answers">
													{{answer.response}}
												</li>
											</ul>
											</div>
										</div>
									</script>
									<script type="text/ng-template" id="viewstarRating">
										<div class="custom_label_dv">
										<label>{{$index+1}}. {{question.question}}</label>
										<div class="viewupdateanswer">
											<div class="custom_radio_lable">
												<label for="rad_{{question.id_pergunta}}_1">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==1" value="1" id="rad_{{question.id_pergunta}}_1">
													<span>Awful</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="rad_{{question.id_pergunta}}_2">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2" id="rad_{{question.id_pergunta}}_2">
													<span>Poor</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="rad_{{questionerio.id_pergunta}}_3">
													<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3" id="rad_{{questionerio.id_pergunta}}_3">
													<span>Neutral</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="rad_{{question.id_pergunta}}_4">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4" id="rad_{{question.id_pergunta}}_4">
													<span>Good</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="rad_{{question.id_pergunta}}_5">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5" id="rad_{{question.id_pergunta}}_5">
													<span>Greater</span>
												</label>
											</div>
										</div>
									</div>
									</script>
									<script type="text/ng-template" id="viewheartRating">
										<div class="custom_label_dv star">
											<label>{{$index+1}}. {{question.question}}</label>
											<div class="viewupdateanswer">
												<div class="custom_radio_lable">
													<label for="rad21_{{question.id_pergunta}}_1">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==1" value="1"  id="rad21_{{question.id_pergunta}}_1">
														<span>Awful</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="rad22_{{question.id_pergunta}}_2">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2"  id="rad22_{{question.id_pergunta}}_2">
														<span>Poor</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="rad23_{{question.id_pergunta}}_3">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3"  id="rad23_{{question.id_pergunta}}_3">
														<span>Neutral</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="rad24_{{question.id_pergunta}}_4">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4"  id="rad24_{{question.id_pergunta}}_4">
														<span>Good</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="rad25_{{question.id_pergunta}}_5">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5"  id="rad25_{{question.id_pergunta}}_5">
														<span>Greater</span>
													</label>
												</div>
											</div>
										</div>
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- Modal Editar UsuÃ¡rio -->
    <div class="modal fade in" id="modal-user">
        <div class="modal-dialog">
            <form id="form-user" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Editar Perfil</h4>
                </div>
                <div class="modal-body">
                    <div class="progress" ng-class="{'hide': userDetail}" style="margin-top:17px;">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>

                    <div class="form hide" ng-class="{'hide': !userDetail}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user-name" class="control-label">Nome</label>
                                    <input id="user-name" name="nome" type="text" class="form-control" value="{{ userDetail.name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user-birthday" class="control-label">Data </label>
                                    <div class="input-group" style="width:100%;">
                                        <input id="user-birthday" name="birthday" type="text" class="form-control data" value="{{ userDetail.birthday || '' }}">
                                        <div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="img img-rounded" style="width:90px; height:90px; background:#ccc;">
                                    <img ng-if="userDetailImage" ng-src="{{ userDetailImage }}" class="img-rounded" width="90" height="90">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="user-image" class="control-label">Imagem</label>
                                    <input id="user-image" name="imagem" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="error-message text-danger pull-left hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary salvar hide" ng-class="{'hide': !userDetail}" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                </div>
            </form>
        </div>
    </div>

	<!-- Modal add skills -->
    <div class="modal fade in" id="modal-add-skills">
        <div class="modal-dialog">
            <form id="form-add-skills" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title">Adicionar Competência</h4>
                </div>
                <div class="modal-body">
                    <div class="form">
						<fieldset class="field-panel" ng-repeat='skilloption in skilloptions'>
							<button class="btn btn-info remove file-set" ng-show="$last" ng-click="removeSkill()"><i class="icon-minus-circled"></i></button>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="new_skill_{{skilloption.id}}" class="control-label">Competências</label>
										<input id="new_skill_{{skilloption.id}}" name="new_skill[{{skilloption.id}}]" type="text" class="form-control input-skills" required>
										<small>Pressione ENTER após informar o nome da Competência.</small>
									</div>

								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Minha Avaliação</label>
										<div class="avaliacao-panel competencias-tabel">
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==1}">
													<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="1" required>
													<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>Insatisfatório</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" >
													<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="2" required>
													<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>Precisa Melhorar</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" >
													<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="3" required>
													<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>Atende</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success rattting btn-success-act skills" >
													<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="4" required>
													<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>Atende Muito Bem</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" >
													<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="5" required>
													<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>Ultrapassa as Expectativas</span>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </fieldset>
						<button class="btn btn-primary addfields" ng-click="add_new_skill_option()">Adicionar Competência</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                </div>
            </form>
        </div>
    </div>
	<!-- Modal Novo Tático -->
	<div class="modal fade in" id="profile-new-okr-tatic">
		<div class="modal-dialog">
			<form id="profile-form-okr-tatic" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Novo Objetivo</h4>
				</div>
				<div class="modal-body">
					<div class="progress" ng-class="{'hide': users.length}" style="margin-top:17px;">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>

					<div class="form hide" ng-class="{'hide': !users.length && !teams.length && !objectives.length}">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="profile-okr-tatic-name" class="control-label">Nome</label>
									<input name="nome" type="text" class="form-control" id="profile-okr-tatic-name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="profile-okr-tatic-description" class="control-label">Descrição</label>
									<textarea name="descricao" id="profile-okr-tatic-description" class="form-control" rows="5"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="profile-okr-tatic-user" class="control-label">Responsável</label>
									<select id="profile-okr-tatic-user" name="usuario" class="select2 usuario-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Usuário">
										<option value=""></option>
										<optgroup label="Usuários">
											<option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="profile-okr-tatic-team" class="control-label">Time</label>
									<select id="profile-okr-tatic-team" name="time" class="select2 times-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Time">
										<option value=""></option>
										<optgroup label="Times">
											<option ng-repeat="team in teams" ng-value="{{ team.id }}">{{ team.name }}</option>
										</optgroup>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="profile-okr-tatic-objectives" class="control-label">Objetivos</label>
									<select id="profile-okr-tatic-objectives" name="objetivo" class="select2 objetivo-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Objetivo" ng-model="objectiveId" ng-change="changeCycle()">
										<option value=""></option>
										<optgroup label="Objetivos">
											<option ng-repeat="item in objectives" ng-value="{{ item.id }}">{{ item.title }}</option>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-6" ng-class="{'hide': !cycles.length}">
								<div class="form-group">
									<label for="profile-okr-tatic-cycles" class="control-label">Trimestres</label>
									<select id="profile-okr-tatic-cycles" multiple="multiple" name="clicos" class="form-control multiple cycles-okr-tatic" ng-model="cyclesModel" ng-options="cycle.id as cycle.name for cycle in cycles">
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>