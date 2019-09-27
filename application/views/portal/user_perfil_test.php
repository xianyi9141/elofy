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

<div ng-controller="profileCtrl" ng-init="getTeamUserDataProfile()" class="hide" ng-class="{'hide': !search_user.id}">
	<h2 class="new_heading_dv">
		<span>{{ search_user.name }} Perfil</span>
        <div class="button_sets backlink">
            <a href="<?php echo base_url('perfil');?>" class="startappraisal " ><i class="fa fa-reply"></i> Voltar ao Perfil</a>
        </div>
    </h2>
    <div class="main_section">
        <div>

            <div class="row">
                <div class="col-sm-3 fright">
                    <div class="user_profile">
                        <div class="employes_nmae_ig">
                            <div class="employe_image employe_user-img" ng-style="{'background-image': (search_user.md_image) ? 'search_user.md_image' : 'url({{search_user.md_image}})'}">
                                <img src="" ng-if="search_user.md_image" ng-src="{{ userDetailImage?userDetailImage:search_user.md_image }}" class="img-circle" width="144" height="144" alt="{{ search_user.name }}" />
                                <span class="user-image-replace" ng-if="!search_user.md_image">{{ initials(search_user.name) }}</span>
                            </div>
                            <div class="personal_detail">
                                <h2>{{ search_user.name }}
                                <span class="user-cashier-panel">{{ search_user.usuarioviewTime.nome_cargo }}</span>
                                </h2>
                                <div class="user_info">
                                    <span>E-mail</span>
                                    <div class="user_desp">{{ search_user.email }}</div>
                                </div>
                                <div class="user_info">
                                    <span>Data de Admissão</span>
                                    <div class="user_desp">
                                        <div class="review_dv" ng-show="search_user.birthday !=null">{{ search_user.birthday | amUtc | amDateFormat:'MMMM DD, YYYY' }}</div>
                                        <div class="review_dv" ng-show="search_user.birthday ==null">N/A</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user_team">
                        <div class="dblock_head">
                            <h2 class="dheading">Time</h2>
                        </div>
                        <div class="dblock_body">
                            <div class="new_team_block team_block">
                                <div class="media media-tab-line" ng-repeat="teamteam in myteammembers" ng-if="teamteam.id!=user.id">
                                    <a href="<?php echo base_url('perfil/{{teamteam.id}}')?>" class="user-image-wrap">
                                        <img src="" ng-if="teamteam.xs_image" ng-src="{{ teamteam.xs_image }}" class="img-circle" width="40" height="40" alt="{{ teamteam.name }}" />
                                    <span class="user-image-replace" ng-if="!teamteam.xs_image">{{ initials(teamteam.name) }}</span>
                                    </a>
                                    <div class="media-body">
                                        <h2><a href="<?php echo base_url('perfil/{{teamteam.id}}')?>">{{teamteam.name}}</a> 
                                            <span class="user-cashier-panel">
                                                <a href="<?php echo base_url('perfil/{{teamteam.id}}')?>">{{teamteam.email}}</a>
                                            </span>
                                            <span class="user-cashier-panel">
                                            <a href="<?php echo base_url('perfil/{{teamteam.id}}')?>">
                                                {{teamteam.nome_cargo}}
                                            </a>
                                            </span>
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
                                            <li class="tav-active-feed active" role="presentation"><a href="#Sectionupdate" aria-controls="profile" role="tab" data-toggle="tab">Atualizações</a></li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs feedbacktabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="Sectionupdate">

                                            <div class="table-responsive table_wrap" style="padding-right:12px;">
                                                <table>
                                                    <tr ng-repeat="user_update in searchuser_updates" ng-if="searchuser_updates.length>0">
                                                        <td>

                                                            {{ user_update.date_update | amUtc | amDateFormat:'DD/MM/YYYY' }}
                                                            <span class="newcomments" ng-if="user_update.unread_comments[0].unread_comment>0">
																<i class="fa fa fa-commenting-o" style="font-size:20px"></i> <span class="comment_count">{{ user_update.unread_comments[0].unread_comment }}</span>
                                                            </span>

                                                       </td>
                                                       <td>
														   <b ng-if="user_update.situation==1" style="color:#999">Revisada</b>
														   <b ng-if="user_update.situation==0" style="color: #999;">Não Revisada</b>
													   </td>
                                                        <td width="150" class="">
                                                            <div class="div_action">
                                                                <a href="javascript:void(0)" ng-click="showsearchupdate(user_update.id)" >Ver Atualização</a>
                                                            </div>
                                                        </td>
                                                    </tr>
													<tr ng-if="searchuser_updates.length<1">
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
                                            <li class="tav-active-feed active" role="presentation"><a href="javascript:void(0);" aria-controls="profile" role="tab" data-toggle="tab">{{search_user.name}} Objetivos</a></li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs feedbacktabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="Section6">

                                            <div class="table-responsive table_wrap" style="padding-right:12px;">
                                                <table  >
                                                    <tr  ng-repeat="tatic in myprofiletatics" >
                                                        <td class="tatic_type">
                                                            <span ng-if="tatic.situacao==0" class="btn-width valores_dv_btn type_pending">Pendente</span>
                                                            <span ng-if="tatic.situacao==2" class="btn-width valores_dv_btn type_progress">Em andamento</span>
                                                            <span ng-if="tatic.situacao==3" class="btn-width valores_dv_btn type_closed"> Encerrado</span>
                                                            <span ng-if="tatic.situacao==1" class="btn-width valores_dv_btn type_finished">Atingido</span>
                                                            <span ng-if="tatic.situacao==''" class="btn-width valores_dv_btn">&nbsp;</span>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a>
                                                            <span ng-if="tatic.type=='i'" class="ind_obj">(Individual)</span>
                                                            <span ng-if="tatic.type=='c'" class="shared_obj">(Compartilhado)</span>
                                                            <span ng-if="tatic.type=='t'" class="team_obj">(Time)</span>
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
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in " id="Section5">
                                            <div class="table-responsive table_wrap" style="padding-right:12px;">
                                                <table>
                                                    <tr ng-repeat="tatic in mytatics.tatics"  >
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
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


               <div class="activity_dv">
                <h2 class="dheading">Atividades</h2>
                <div class="activities_table_set" ng-repeat="activity in activites.activities" style="margin: 10px 0 0 0;">
                <div class="activities_heading">
                    <h3>{{ activity.title }}</h3>
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
                                     <img src="" ng-if="activity.responsavel_image" ng-src="{{ activity.responsavel_image }}"  alt="{{ activity.responsavel_name }}" />
                                    <label ng-if="!activity.responsavel_image">{{ initials(activity.responsavel_name) }}</label>
                                </span>
                                <label >{{ activity.responsavel_name }}</label>
                            </div>
                            <div class="table_cell_cil">
                                <span>{{ activity.init | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                            </div>
                            <div class="table_cell_cil">
                                <span class="todo_list">
                                    <a href="javascript:void(0)" ng-class="{'yellow': activity.percentage>=0 && activity.percentage<50 && activity.atraso==0}" class="grey yes" >Pendente</a>
                                    <a href="javascript:void(0)" ng-class="{'blue': activity.percentage>=50 && activity.percentage<100 && activity.atraso==0}" class="grey yes" >Andamento</a>
                                    <a href="javascript:void(0)" ng-class="{'green': activity.percentage==100 && activity.atraso==0}" class="grey yes" >Completa</a>
                                    <a href="javascript:void(0)" ng-class="{'red': activity.percentage<=50 && activity.atraso==1}" class="grey yes">Atrasada</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="activities_table_set" ng-if="!activites.activities.length" style="margin: 10px 0 0 0;">
                    <div class="activities_heading">
                        <h3>Não foram encontradas atividades</h3>
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
    <div class="modal fade in" id="search_update">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title">View Check in{{teamquestions.length}}</h4>
                </div>
                <div class="modal-body modal-body-popup">
                    <div class="container">
                        <div class="row ">
                            <div class="model_bod">
                                <div class="col-md-7">
                                    <div class="row {{teamquestions.length}}" ng-repeat="question in teamquestions" >
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
                                        <div class="col-md-12"><label style="font-size:15px;color:#000;width:100%;font-weight: 700;">Situação</label>
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
                                                            <span>Público</span>
                                                        </label>
                                                    </div>
                                                    <div class="button_bar">
                                                        <label for="visiblityprivate_prfil">
                                                            <input type="radio" name="privacy" id="visiblityprivate_prfil" disabled>
                                                            <span>Privado&nbsp; <i class="fa fa-lock"></i></span>
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

                                                    <span>Muito baixo</span>
                                                </label>
                                            </div>
                                            <div class="custom_radio_lable">
                                                <label for="rad_{{question.id_pergunta}}_2">
                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2" id="rad_{{question.id_pergunta}}_2">

                                                    <span>Baixo</span>
                                                </label>
                                            </div>
                                            <div class="custom_radio_lable">
                                                <label for="rad_{{questionerio.id_pergunta}}_3">
                                                    <input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3" id="rad_{{questionerio.id_pergunta}}_3">
                                                    <span>Normal</span>
                                                </label>
                                            </div>
                                            <div class="custom_radio_lable">
                                                <label for="rad_{{question.id_pergunta}}_4">
                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4" id="rad_{{question.id_pergunta}}_4">
                                                    <span>Alta</span>
                                                </label>
                                            </div>
                                            <div class="custom_radio_lable">
                                                <label for="rad_{{question.id_pergunta}}_5">
                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5" id="rad_{{question.id_pergunta}}_5">
                                                    <span>Muito Alta</span>
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
                                                        <span>Muito Baixo</span>
                                                    </label>
                                                </div>
                                                <div class="custom_radio_lable">
                                                    <label for="rad22_{{question.id_pergunta}}_2">
                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2"  id="rad22_{{question.id_pergunta}}_2">
                                                        <span>Baixo</span>
                                                    </label>
                                                </div>
                                                <div class="custom_radio_lable">
                                                    <label for="rad23_{{question.id_pergunta}}_3">
                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3"  id="rad23_{{question.id_pergunta}}_3">
                                                        <span>Normal</span>
                                                    </label>
                                                </div>
                                                <div class="custom_radio_lable">
                                                    <label for="rad24_{{question.id_pergunta}}_4">
                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4"  id="rad24_{{question.id_pergunta}}_4">
                                                        <span>Alta</span>
                                                    </label>
                                                </div>
                                                <div class="custom_radio_lable">
                                                    <label for="rad25_{{question.id_pergunta}}_5">
                                                        <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5"  id="rad25_{{question.id_pergunta}}_5">
                                                        <span>Muito Alta</span>
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
										<li role="presentation" class="tab-popups active" id="ConcederBtn"><a href="#sectionfirst" aria-controls="home" role="tab" data-toggle="tab">Conceder feedback</a></li>
										<li ng-if="profiletab==1 || !profiletab" ng-show="!replyscope" class="tab-popups" id="solicitorBtn" role="presentation"><a href="#Sectionsecond" aria-controls="profile" role="tab" data-toggle="tab">Solicitar feedback</a></li>
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
													<div class="col-md-6">
														<div class="form-group">
															<div class="btn-group" data-toggle="buttons">
															  <label class="btn btn-default active">
																<input type="radio" name="visiblity" id="visiblitypublic" autocomplete="off" value="0" checked="checked">Publico
															  </label>
															  <label class="btn btn-default">
																<input type="radio" name="visiblity" id="visiblityprivate" autocomplete="off"  value="1"> Privado <i class='fa fa-lock'></i>
															  </label>
                                                              <label class="btn btn-default">
                                                                <input type="radio" name="visiblity" id="visiblitymanager" autocomplete="off"  value="2"> Manager
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



    <!-- Modal add skills -->
   
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
	<!-- Model Confirm -->

</div>
