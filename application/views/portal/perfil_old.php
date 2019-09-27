<style type="text/css">

.tooltip {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
}

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
  width: 80%;
}

.chartjs-tooltip-key {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin-right: 10px;
}



</style>
<!-- Perfil -->
<div ng-controller="profileCtrl" class="hide" ng-class="{'hide': !user.id}">
	<h2 class="new_heading_dv">
		<span>Perfil </span>
		
			<?php 
                if($this->session->userdata('okr')=="1"){// barra de menu com OKR
            ?>
		
		
		<div class="button_sets <?php if (!($this->session->userdata('user_reviewer') == '1' || $this->session->userdata('admin') == '1')) {
		}?>">
			<a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': profiletab == '1' || !profiletab}" ng-click="myTab()">Você</a>
			<a href="javascript:void(0)" class="activity_href" ng-class="{'active_bitton_links_dv': profiletab == '6' || !profiletab}" ng-click="activitiesTab(0)">Atividades</a>
			<a href="javascript:void(0)" class="additional actives" ng-class="{'active_bitton_links_dv': profiletab == '2'}" ng-click="myTeamTab()">Seu time</a>
			<a href="javascript:void(0)" ng-if="user.elos == 1" class="additional elostab" ng-class="{'active_bitton_links_dv': profiletab == '4'}" ng-click="eloTab()">elo <i class="fa fa-heart"></i></a>
			<?php
				if ($this->session->userdata('user_reviewer') == '1' || $this->session->userdata('admin') == '1') {
			?>
			<a href="javascript:void(0)" ng-if="user.my_carreer == 1" class="additional carreertab" ng-class="{'active_bitton_links_dv': profiletab == '5','carreertab2':user.elos != 1}" ng-click="carreerTab()">{{user.label_carreer!=''?user.label_carreer:'Minha Carreira'}} </a>
			<?php } else {?>
			<a href="javascript:void(0)" ng-if="user.my_carreer == 1" class="additional carreertab2" ng-class="{'active_bitton_links_dv': profiletab == '5'}" ng-click="carreerTab()">{{user.label_carreer!=''?user.label_carreer:'Minha Carreira'}}</a>
			<?php }?>
			<div class="okr_animation"></div>
			
		</div>
		
			<?php 
                } else {
            ?>
			
			<div class="button_sets <?php if (!($this->session->userdata('user_reviewer') == '1' || $this->session->userdata('admin') == '1')) {
		}?>">
			<a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': profiletab == '1' || !profiletab}" ng-click="myTab()">Você</a>
			<a href="javascript:void(0)" ng-if="user.elos == 1" class="additional elostab" ng-class="{'active_bitton_links_dv': profiletab == '4'}" ng-click="eloTab()">elo <i class="fa fa-heart"></i></a>
			<?php
				if ($this->session->userdata('user_reviewer') == '1' || $this->session->userdata('admin') == '1') {
			?>
			<a href="javascript:void(0)" ng-if="user.my_carreer == 1" class="additional carreertab" ng-class="{'active_bitton_links_dv': profiletab == '5','carreertab2':user.elos != 1}" ng-click="carreerTab()">{{user.label_carreer!=''?user.label_carreer:'Minha Carreira'}} </a>
			<?php } else {?>
			<a href="javascript:void(0)" ng-if="user.my_carreer == 1" class="additional carreertab2" ng-class="{'active_bitton_links_dv': profiletab == '5'}" ng-click="carreerTab()">{{user.label_carreer!=''?user.label_carreer:'Minha Carreira'}}</a>
			<?php }?>
			<div class="okr_animation"></div>
			
		</div>
			
			
			
			<?php 
                } 
            ?>
		
		
		
		
	</h2>
	<div class="main_section">
		<div ng-show="profiletab==1 || !profiletab">
			<div class="row">
				<div class="welcome_user_box">
					<div class="user_profile position-abs col-sm-3 fright">
						<div class="employes_nmae_ig">
							<div class="employe_image employe_user-img" ng-style="{'background-image': (user.md_image) ? 'user.md_image' : 'url({{user.md_image}})'}">
								<a href="javascript:void(0)" class="profile_link_overlay" ng-click="userQuickView()">&nbsp;</a>
								<img src="" ng-if="user.md_image" ng-src="{{ userDetailImage?userDetailImage:user.md_image }}" class="img-circle" width="144" height="144" alt="{{ user.name }}" />
								<span class="user-image-replace" ng-if="!user.md_image">{{ initials(user.name) }}</span>
							</div>
							<div class="personal_detail">
								<h2>{{ user.name }}
								</h2>
								<a href="" ng-click="modalUser()" class="editprof">Edite seu Perfil</a>
							</div>
						</div>
					</div>
					<div class="welcome_user_box_data col-sm-9">
						<div class="wlcm">
							<span class="close_wlcm"></span>
							<?php if ($this->session->userdata('profile_logo')) {
    $imageUrl = base_url('assets/upload/' . $this->session->userdata('id_empresa') . '/' . $this->session->userdata('profile_logo'));
} else {
    $imageUrl = base_url('assets/portal/img') . '/icon_people.png';
}?>
							<img ng-if="!notifications || notifications.length == 0" src="<?php echo $imageUrl ?>" class="wlcm_img">
							<h2 class="wlcm_heading">Olá, {{ user.name }}!</h2>
							<!-- <div class="wlcm_fdbk"><span> 4 feedbacks</span> esperando você.</div> -->
							<div class="wlcm_fdbk"><span>Bem Vindo de Volta</span></div>
							<div class="unread-elos" ng-if="unreadElosCount > 1"><a href="javascript:void(0)" ng-click="eloTab()"><span>Você tem {{ unreadElosCount }} novos <span class="my_elo_label">el<i class="fa fa-heart"></i>s</span> aguardando</span></a></div>
							<div class="unread-elos" ng-if="unreadElosCount == 1"><a href="javascript:void(0)" ng-click="eloTab()"><span>Você tem {{ unreadElosCount }} novo <span class="my_elo_label">el<i class="fa fa-heart"></i></span> aguardando</span></a></div>
							<?php
if ($this->session->userdata('feedback') == "1") {
    ?>
							<div class="btn_group" ng-if="user.feedback == 1">
								<!--								<a href="#"  ng-click="SolicitarFeedback()" class="blink btn_fdbk"><i class="bicon"></i>Feedback</a>-->
								<a href="<?php echo base_url('feedback') ?>" class="blink btn_fdbk"><i class="bicon"></i>Feedback</a>
								<!--   <a href="#" class="blink btn_exam"><i class="bicon"></i> Realize seu Check-in</a> -->
							</div>
							<?php }?>
							<div class="notification-box" ng-if="notifications.length > 0">
								<script type="text/ng-template" id="new_likes-notification-baloon">
									<div ng-click="eloTab(true)"><i class="fa fa-heart"></i>Você tem novas curtidas em Elos</div>
								</script>
								<script type="text/ng-template" id="new_comments-notification-baloon">
									<div ng-click="eloTab(true)"><i class="fa fa-comment"></i>Você tem novos comentários em Elos</div>
								</script>
								<script type="text/ng-template" id="new_comment_mention-notification-baloon">
									<div ng-click="eloTab(true)"><i class="fa fa-comment"></i>Você foi mencionado em um comentário de Elo</div>
								</script>
								<script type="text/ng-template" id="elo-notification-baloon">
									<div ng-click="eloTab(true)">
										<div class="user-image">
											<img src="" ng-if="notification.usuario_responsavel.image" ng-src="{{ notification.usuario_responsavel.image }}" class="img-circle" width="32" height="32" data-toggle="tooltip" data-placement="top" title="{{ notification.usuario_responsavel.name }}" />
											<span class="image-replace" ng-if="!notification.usuario_responsavel.image">{{ initials(notification.usuario_responsavel.name) }}</span>
										</div>
										<div class="elo-content">
											<div class="elo-header">
												<span class="usuario-responsavel">{{notification.usuario_responsavel.name}}</span> para
												<span class="usuarios-mencionados" ng-repeat="mentioned in notification.usuarios_mencionados"><span ng-if="!$first && !$last">, </span><span ng-if="$last && notification.usuarios_mencionados.length > 1"> e </span>{{ mentioned.name }}</span>
												<time class="timeago" datetime="{{ notification.data_atualizacao }}">{{ notification.data_atualizacao | timeAgo}}</time>
											</div>

											<div class="elo-body">
												<p>{{ notification.descricao_elogio }}</p>
											</div>
											<div class="elo-footer">
													<span class="likes">
														<i class="fa fa-heart" ng-class="{ liked: notification.i_liked>0 }" ></i>{{ notification.total_likes }}
														<span class="like-container">
															<span class="label" ng-if="notification.total_likes!=1">curtidas</span>
															<span class="label" ng-if="notification.total_likes==1">curtida</span>
														</span>
													</span>
												<span class="comments">
														<span>
															<i class="fa fa-comment"></i>{{ notification.total_comment }}
															<span class="label" ng-if="notification.total_comment!=1">comentários</span>
															<span class="label" ng-if="notification.total_comment==1">comentário</span>
														</span>
													</span>
											</div>
										</div>
									</div>
								</script>
								<script type="text/ng-template" id="review_perform_notifications-notification-baloon">
									<div class="row">
										<div class="col-sm-6"><span>{{notification.data.nome_ciclo}}</span></div>
										<div class="col-sm-6 rightalign" ng-switch="user">
											<a class="profilereviewlink finalizado-btn clr-green" href="<?php echo base_url('cycleconfiguration') ?>#!/{{notification.data.id_revisao_ciclo}}/CycleReviews" >Responda</a>

										</div>
									</div>
									<div class="row">
										<div class="col-sm-12"><h4>Acesse e responda as avaliações de desempenho.</h4></div>
									</div>
								</script>
								<script type="text/ng-template" id="review_peer_notifications-notification-baloon">
									<div class="row">
										<div class="col-sm-6"><span>{{notification.data.nome_ciclo}}</span></div>
										<div class="col-sm-6 rightalign">
											<a class="profilereviewlink finalizado-btn clr-green" ng-if="user.admin || user.user_reviewer==1 || user.id_gestor != '' " href="<?php echo base_url('cycleconfiguration') ?>#!/{{notification.data.id_revisao_ciclo}}/CycleConfig">Gerencie</a>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12"><h4>Acompanhe o progresso e configure as avaliações de seu time.</h4></div>
									</div>
								</script>
								<ul>
									<li class="notification-item"
										ng-class="{'new-like' : notification.type=='new_likes', 'new-comment' : notification.type=='new_comments', 'new-elo' : notification.type=='elo'}"
										ng-repeat="notification in notifications" ng-include="notification.type+'-notification-baloon'">
									</li>
								</ul>
							</div>
							<div class="notification-shadow"></div>
						</div>
					</div>
				</div>
				<!--welcome_user_box END-->
			</div>
			<div class="row">
				<div class="col-sm-3 fright">
					<div class="sidebar_widget quick_survey" ng-if="quick_survey != ''">
						<div class="sidebar_widget_heading">
							{{quick_survey.nome_pesquisa}} <span class="figures">{{initial_survey}}/{{total_questions?total_questions:quick_survey.total_from}}</span>
						</div>
						<div class="dblock_body">
							<form id="new_quick_servey" method="post">
								<input type="hidden" name="questioerio_id" value="{{quick_survey.id_questionario}}">
								<input type="hidden" name="id_pesquisa" value="{{quick_survey.id_pesquisa}}">
								<div class="row" ng-if="quick_survey.questions != ''">
									<div class="col-md-12" ng-if="quick_survey.questions.type=='e'" ng-include="'starRatingSurvey'"></div>
									<div class="col-md-12" ng-if="quick_survey.questions.type=='c'" ng-include="'heartRatingSurvey'"></div>
									<div class="col-md-12" ng-if="quick_survey.questions.type=='i'" ng-include="'emojiRatingSurvey'"></div>
									<div class="col-md-12" ng-if="quick_survey.questions.type=='f'" ng-include="'favorRatingSurvey'"></div>
									<div class="col-md-12" ng-if="quick_survey.questions.type=='o'" ng-include="'multipleAnswerSurvey'"></div>
								</div>
								<div class="clearfix"></div>
							</form>
							<div class="clear"></div>
							<a href="javascript:void(0)" class="next_survey_btn" ng-click="giveQuickSurvey()">{{ quick_survey.total_from > 1?"Enviar e ir para próxima pesquisa":"Enviar" }}</a>
						</div>
						<script type="text/ng-template" id="multipleAnswerSurvey">
							<div class="question_sample">{{quick_survey.questions.question}}</div>
							  <div class="custom_radio style1" ng-repeat="answer in quick_survey.questions.options">
								<div class="quiz_percentage_bg"></div>
									 <div class="radio_dv">
										<input type="radio" id="ch{{ answer.id }}" name="answers[multiresponse_answer][{{quick_survey.questions.id_pergunta}}]"  ng-value="answer.id" id="ch{{ answer.id }}">
										<label for='ch{{ answer.id }}'>{{answer.answer}}</label>
									</div>
							 </div>
						</script>
						<script type="text/ng-template" id="starRatingSurvey">
							<div class="custom_label_dv font-11">
							<div class="question_sample">{{quick_survey.questions.question}}</div>
							<input type="hidden" name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][id_questionario]" ng-value="{{quick_survey.questions.id_questionario}}">
							<div class="custom_radio_lable">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_1">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_1" ng-click="getStarValue(quick_survey.questions.id_pergunta,1)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_1">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_2">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_2" ng-click="getStarValue(quick_survey.questions.id_pergunta,2)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_2">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_3">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_3" ng-click="getStarValue(quick_survey.questions.id_pergunta,3)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_3">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_4">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_4" ng-click="getStarValue(quick_survey.questions.id_pergunta,4)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_4">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_5">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_5" ng-click="getStarValue(quick_survey.questions.id_pergunta,5)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_5">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_6">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="6" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_6" ng-click="getStarValue(quick_survey.questions.id_pergunta,6)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_6">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_7">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="7" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_7" ng-click="getStarValue(quick_survey.questions.id_pergunta,7)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_7">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_8">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="8" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_8" ng-click="getStarValue(quick_survey.questions.id_pergunta,8)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_8">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_9">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="9" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_9" ng-click="getStarValue(quick_survey.questions.id_pergunta,9)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_9">&nbsp;</span>
								</label>
							</div>
							<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
								<label for="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_10">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="10" id="srsurvey_rad_{{quick_survey.questions.id_pergunta}}_10" ng-click="getStarValue(quick_survey.questions.id_pergunta,10)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_10">&nbsp;</span>
								</label>
							</div>
							</div>
						</script>
						<script type="text/ng-template" id="favorRatingSurvey">
							<div class="custom_label_dv font-11 fav-stars">
							<div class="question_sample">{{quick_survey.questions.question}}</div>
							<input type="hidden" name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][id_questionario]" ng-value="{{quick_survey.questions.id_questionario}}">
							<div class="custom_radio_lable">
								<label for="fs_rad_{{quick_survey.questions.id_pergunta}}_1">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="fs_rad_{{quick_survey.questions.id_pergunta}}_1" ng-click="getStarValue(quick_survey.questions.id_pergunta,1)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_1" >Discordo totalmente</span>
								</label>
							</div>

							<div class="custom_radio_lable">
								<label for="fs_rad_{{quick_survey.questions.id_pergunta}}_2">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="fs_rad_{{quick_survey.questions.id_pergunta}}_2" ng-click="getStarValue(quick_survey.questions.id_pergunta,2)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_2" >Discordo</span>
								</label>
							</div>

							<div class="custom_radio_lable">
								<label for="fs_rad_{{quick_survey.questions.id_pergunta}}_3">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="fs_rad_{{quick_survey.questions.id_pergunta}}_3" ng-click="getStarValue(quick_survey.questions.id_pergunta,3)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_3" >Neutro</span>
								</label>
							</div>

							<div class="custom_radio_lable">
								<label for="fs_rad_{{quick_survey.questions.id_pergunta}}_4">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="fs_rad_{{quick_survey.questions.id_pergunta}}_4" ng-click="getStarValue(quick_survey.questions.id_pergunta,4)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_4" >Concordo</span>
								</label>
							</div>

							<div class="custom_radio_lable">
								<label for="fs_rad_{{quick_survey.questions.id_pergunta}}_5">
									<input name="answers[rating_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="fs_rad_{{quick_survey.questions.id_pergunta}}_5" ng-click="getStarValue(quick_survey.questions.id_pergunta,5)">
									<span class="span_{{quick_survey.questions.id_pergunta}}_5" >Totalmente de acordo</span>
								</label>
							</div>
							<div class="clear h-10"></div>

							</div>
						</script>
						<script type="text/ng-template" id="heartRatingSurvey">
							<div class="custom_label_dv star">
								<div class="question_sample">{{quick_survey.questions.question}}</div>
								<input type="hidden" name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][id_questionario]" ng-value="{{quick_survey.questions.id_questionario}}">
								<div class="custom_radio_lable">
									<label for="hrsurvey_rad21_{{quick_survey.questions.id_pergunta}}_1">
										<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="hrsurvey_rad21_{{quick_survey.questions.id_pergunta}}_1" ng-click="getHeartValue(quick_survey.questions.id_pergunta,1)">
										<span class="span_{{quick_survey.questions.id_pergunta}}_1">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="hrsurvey_rad22_{{quick_survey.questions.id_pergunta}}_2">
										<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="hrsurvey_rad22_{{quick_survey.questions.id_pergunta}}_2" ng-click="getHeartValue(quick_survey.questions.id_pergunta,2)">
										<span class="span_{{quick_survey.questions.id_pergunta}}_2">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="hrsurvey_rad23_{{quick_survey.questions.id_pergunta}}_3">
										<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="hrsurvey_rad23_{{quick_survey.questions.id_pergunta}}_3" ng-click="getHeartValue(quick_survey.questions.id_pergunta,3)">
										<span class="span_{{quick_survey.questions.id_pergunta}}_3">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="hrsurvey_rad24_{{quick_survey.questions.id_pergunta}}_4">
										<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="hrsurvey_rad24_{{quick_survey.questions.id_pergunta}}_4" ng-click="getHeartValue(quick_survey.questions.id_pergunta,4)">
										<span class="span_{{quick_survey.questions.id_pergunta}}_4">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_5">
										<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_5" ng-click="getHeartValue(quick_survey.questions.id_pergunta,5)">
										<span class="span_{{quick_survey.questions.id_pergunta}}_5">&nbsp;</span>
									</label>
								</div>
									<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
										<label for="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_6">
											<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="6"  id="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_6" ng-click="getHeartValue(quick_survey.questions.id_pergunta,6)">
											<span class="span_{{quick_survey.questions.id_pergunta}}_6">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
										<label for="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_7">
											<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="7"  id="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_7" ng-click="getHeartValue(quick_survey.questions.id_pergunta,7)">
											<span class="span_{{quick_survey.questions.id_pergunta}}_7">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
										<label for="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_8">
											<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="8"  id="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_8" ng-click="getHeartValue(quick_survey.questions.id_pergunta,8)">
											<span class="span_{{quick_survey.questions.id_pergunta}}_8">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
										<label for="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_9">
											<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="9"  id="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_9" ng-click="getHeartValue(quick_survey.questions.id_pergunta,9)">
											<span class="span_{{quick_survey.questions.id_pergunta}}_9">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="quick_survey.questions.escala == 10">
										<label for="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_10">
											<input name="answers[heart_answer][{{quick_survey.questions.id_pergunta}}][value]" type="radio" autocomplete="off" value="10"  id="hrsurvey_rad25_{{quick_survey.questions.id_pergunta}}_10" ng-click="getHeartValue(quick_survey.questions.id_pergunta,10)">
											<span class="span_{{quick_survey.questions.id_pergunta}}_10">&nbsp;</span>
										</label>
									</div>
								<div class="clear h-10"></div>
							</div>
						</script>
						<script type="text/ng-template" id="emojiRatingSurvey">
							<div ng-init="srating.value = 0"></div>
							<div class="custom_label_dv star">
								<div class="question_sample">{{quick_survey.questions.question}}</div>
								<input type="hidden" name="answers[emoji_answer][{{quick_survey.questions.id_pergunta}}][id_questionario]" ng-value="{{quick_survey.questions.id_questionario}}">
								<input type="hidden" name="answers[emoji_answer][{{quick_survey.questions.id_pergunta}}][value]" ng-value="srating.value">
								<div class="like-count-box-wrapper q_data">
									  <div ng-if="questionerio.escala == '3'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="emoji" data-max="3"></div>
									  <div ng-if="questionerio.escala != '3'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="emoji" data-max="5"></div>
								</div>
								<div class="clear h-10"></div>
							</div>
						</script>
					</div>
					<div class="user_team">
						<div class="dblock_head">
							<h2 class="dheading">{{ "UI.TEAM" | translate }}</h2>
						</div>
						<div class="dblock_body">
							<div class="new_team_block team_block" style="max-height: 500px">
								<div class="media media-tab-line" ng-repeat="teamteam in myteammembers" ng-if="teamteam.id!=user.id">
									<a href="<?php echo base_url('perfil/{{teamteam.id}}') ?>" class="user-image-wrap">
									<img src="" ng-if="teamteam.xs_image" ng-src="{{ teamteam.xs_image }}" class="img-circle" width="40" height="40" alt="{{ teamteam.name }}" />
									<span class="user-image-replace" ng-if="!teamteam.xs_image">{{ initials(teamteam.name) }}</span>
									</a>
									<div class="media-body">
										<h2><a href="<?php echo base_url('perfil/{{teamteam.id}}') ?>">{{teamteam.name}}</a> <span class="user-cashier-panel">
											<a href="<?php echo base_url('perfil/{{teamteam.id}}'); ?>">{{teamteam.email}}</a></span>
											<span class="user-cashier-panel">
											<a href="<?php echo base_url('perfil/{{teamteam.id}}'); ?>">
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
					<!--<div class="alert alert-dismissible fade in custom-messages custom-cls-btn" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.</div>
						<div class="alert alert-warning alert-dismissible fade in custom-warning custom-cls-btn" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.</div>-->
					<div class="general-messages update-section-user updates-height">
						<div ng-repeat="user_update in user_updates" ng-if="user_updates.length>0 && $first" class="update " >
							Sua última atualização foi há cerca de <time class="timeago" datetime="{{ user_update.date_update }}">{{ user_update.date_update | timeAgo}}</time>. <a class="alerts_orange {{ user_update.status_update }}" href="javascript:void(0)" ng-click="newUpdate()"> Clique e envie novo Check-in</a>
						</div>
						<div ng-if="!user_updates.length">
							<p class="user_updates updte">
								Você ainda não enviou atualizações. <a href="javascript:void(0)" ng-click="newUpdate()">Clique para Enviar novo Check-in</a>
							</p>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="elo" ng-if="user.elos == 1">
						<div class="dblock_body">
							<div class="babs-2-pabel">
								<form id="form-elo" ng-submit="addElo('form-elo')">
									<div class="sent-notification" style="display: none">
										<span>Que legal! Enviamos o seu El <i class="fa fa-heart"></i>.</span>
										<span ng-if="user.elos_limit > 0 && user.elos_sent_today < user.elos_limit">Você ainda tem <strong>{{ user.elos_limit - user.elos_sent_today}}</strong> restantes hoje.</span>
										<span ng-if="user.elos_limit > 0 && user.elos_sent_today >= user.elos_limit">Você atingiu seu limite de elos por hoje.</span>
									</div>
									<textarea rows="1" ng-enter="testElo()" placeholder="{{ (user.elos_limit == 0 || user.elos_sent_today < user.elos_limit) && 'Marque @alguém e utilize esse espaço para elogiar ou agradecer um ou mais colegas!' || 'Você atingiu seu limite de elos por hoje...'}}" class="elo-height"></textarea>
									<button type="submit" ng-disabled="user.elos_limit != 0 && user.elos_sent_today >= user.elos_limit">el<i class="fa fa-heart"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="dblock elo_survey" ng-if="surveys.length" ng-class="{'mt-20':user.elos != 1}">
						<div class="dblock_body">
							<div class="survey_label">Pesquisas <i class="fa fa-circle"></i></div>
							<div class="survey_section" ng-if="surveys.length > 0" ng-repeat="survey in surveys">
								<div class="survey-section-data">
									<aside>
										<span class="image-replace float-none">{{ initials(survey.name_user) }}</span>
										<img ng-if="survey.xs_image" ng-src="{{ survey.xs_image }}" class="img-circle ng-scope" alt="{{ initials(survey.nome_usuario) }}" width="30" height="30">
									</aside>
									<div class="career-profile">
										<span class="usr_name float-none">{{survey.nome_pesquisa}}</span>
										<span class="survey_date">{{survey.data_atualizacao | amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
									</div>
								</div>
								<div class="right-section-col">{{survey.pendentes }} <span ng-if='survey.pendentes != 1'>pesquisas pendentes</span><span ng-if='survey.pendentes == 1'>pesquisa pendente</span>
									<a ng-if="survey.id_tipo_pesquisa != 2" href="<?php echo base_url(); ?>survey/#!/{{ survey.id_pesquisa }}" class="btn btn-xs btn-primary" >Responder</a>
									<a ng-if="survey.id_tipo_pesquisa == 2" href="<?php echo base_url(); ?>survey-list/{{ survey.id_pesquisa }}" class="btn btn-xs btn-primary" >Responder</a>
								</div>
							</div>
							<!-- <div class="survey_section" ng-if="!surveys.length">
								<div class="survey-section-data">
									   <div class="career-profile">
										   <span class="usr_name float-none">No survey found</span>
									   </div>
								</div>
								</div> -->
						</div>
					</div>
					<div class="dblock" ng-if="user.okr==1">
						<div class="dblock_body">
							<div class="babs-2-pabel">
								<div class="tab tab-feedback-panel" role="tabpanel">
									<!-- Nav tabs -->
									<div class="tabs-cntr">
										<ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
											<li class="tav-active-feed active" role="presentation"><a href="#Section6" aria-controls="profile" role="tab" data-toggle="tab">Meus Objetivos</a></li>
											<!--<li role="presentation" class="tav-active-feed "><a href="#Section5" aria-controls="home" role="tab" data-toggle="tab">Meu Time</a></li>-->
										</ul>
									</div>
									<!-- Tab panes -->
									<div class="tab-content tabs feedbacktabs">
										<div ng-controller="okrCtrl" role="tabpanel" class="tab-pane fade in active" id="Section6">
										
											<div class="table-responsive table_wrap" style="padding-right:12px;">
												<table  >
													<tr  ng-repeat="tatic in profiletatics" >
														<td class="tatic_type">
															<span ng-if="tatic.situacao==0" class="btn-width valores_dv_btn type_pending">Pendente</span>
															<span ng-if="tatic.situacao==2" class="btn-width valores_dv_btn type_progress">Em andamento</span>
															<span ng-if="tatic.situacao==3" class="btn-width valores_dv_btn type_closed"> Encerrado</span>
															<span ng-if="tatic.situacao==1" class="btn-width valores_dv_btn type_finished">Atingido</span>
															<span ng-if="tatic.situacao==''" class="btn-width valores_dv_btn">&nbsp;</span>
														</td>
														<td>
															<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a>
															<span ng-if="tatic.type=='i'" class="ind_obj">(Individual)</span>
															<span ng-if="tatic.type=='c'" class="shared_obj">(Compartilhado)</span>
															<span ng-if="tatic.type=='t'" class="team_obj">(Time)</span>
															<span ng-repeat="tag in tatic.tags" style="" ng-hide="tag.name==''" ></span>

														</td>
														<td width="155">
															<div class="progress_wrap">
																<span>{{ tatic.percentage }}%</span>
																<div class="progress">
																	<div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage }}%;" aria-valuenow="{{ tatic.percentage }}" aria-valuemin="0" aria-valuemax="100" ng-class="{'ontrack':tatic.color==1,'attention':tatic.color==2,'delayed':tatic.color==3}"></div>
																</div>
															</div>
														</td>
														<td width="150">
															<div class="div_action" >
																<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}">Editar</a>
																<span class="top-right-chat" ng-if="tatic.comentario_status == 0">
																<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}">
																	<i class="fa fa-comment" style="    color: #36c7e8;"></i>
																</a>
																</span>
																<!--
																	<a ng-show="user.admin=='true' || tatic.authorised==user.id" href="javascript:void(0)" ng-click="DeleteTatic(tatic.id,0)" >Delete</a>
																	-->
															</div>
														</td>
													</tr>
												</table>
											</div>
											<!-- Modal Novo OKR starts here-->
											<div class="modal fade in bs-example-modal-lg col-2" id="new-okr-perfil">
												<div class="modal-dialog modal-lg">
													<form id="form-okrperfil" class="modal-content">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<div class="modal-body clearfix custom-height">
															<div class="col-md-8">
																<div class="modal-header bg-primary">
																	<h4 class="modal-title">Novo Objetivo</h4>
																</div>
																<div class="progress" ng-class="{'hide': users.length && teams.length && years.length}" style="margin-top:17px;">
																	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
																</div>
																<div class="form" ng-class="{'hide': !users.length && !teams.length && !years.length}">
																	<div class="row">
																		<div class="col-md-12 model_bod">
																			<div class="model_ch" style="margin: 0 0 7px 0;">
																				<div class="model_che" style="margin: 0 0 7px 0;">
																					<input type="checkbox" name="estrategicoperfil" id="estrategicoperfil" value="1" ng-model="estrategicoperfil">
																					<label for="estrategicoperfil"  style="line-height: 17px;"> Destacar para Empresa </label>
																				</div>
																			</div>
																		</div>
																	</div>
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
																	<div class="row" ng-show="user.empresa.individual == 1 || user.empresa.team == 1 || user.empresa.shared == 1">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="okr-tipo" class="control-label">Tipo</label>
																				<br>
																				<div class="checkbox tipo_radio" ng-show="user.empresa.individual == 1">
																					<input ng-model="selectedTipoPrefil" ng-click="showResponsavelPrefil()" type="radio" id="individualPrefile" value="i" name="tipo" class="styled-checkbox">
																					<label for="individualPrefile">{{user.empresa.label_individual}}</label>
																				</div>
																				<div class="checkbox tipo_radio" ng-show="user.empresa.team == 1">
																					<input ng-model="selectedTipoPrefil" ng-click="showResponsavelPrefil()" type="radio" id="para_o_timePrefile" value="t" name="tipo" class="styled-checkbox">
																					<label for="para_o_timePrefile">{{user.empresa.label_team}}</label>
																				</div>
																				<div class="checkbox tipo_radio" ng-show="user.empresa.shared == 1">
																					<input ng-model="selectedTipoPrefil" ng-click="showResponsavelPrefil()" type="radio" id="compartilhadoPrefile" value="c" name="tipo" class="styled-checkbox">
																					<label for="compartilhadoPrefile">{{user.empresa.label_shared}}</label>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row" >
																		<div class="col-md-6" id="responsavel_section_prefil">
																			<div class="form-group">
																				<label for="okr-user-perfil" class="control-label">{{ "UI.ENCHARGED" | translate }}</label>
																				<select ng-model="selectedPrefilUser" id="okr-user-perfil" name="usuario" class="usuario-okrperfil" data-allow-clear="true" data-placeholder='{{ "UI.SELECT_USER" | translate }}' ng-click="getPrefilUserTeam()">
																					<option value=""></option>
																					<optgroup label="Usuários">
																						<option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
																					</optgroup>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6" id="team_section_prefil">
																			<div class="form-group">
																				<label for="okr-team-perfil" class="control-label">{{ "UI.TYPE" | translate }}</label>
																				<select id="okr-team-perfil" name="time" class="times-okrperfil" data-allow-clear="true" data-placeholder='{{ "TIMES.SELECT_TEAM" | translate }}'>
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
																				<select id="okr-year-perfil" name="ano" class="select-year-okr form-control" ng-model="currentYearOkrPerfil" ng-options="year as year for year in years" ng-change="changeCycleOkrPerfil()" >
																					<option value="">Ano</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6" ng-class="{'hidden': !cyclesOkrPerfil.length}">
																			<div class="form-group">
																				<label for="okr-cycles-perfil" class="control-label">{{ "UI.QUARTERS" | translate }}</label>
																				<select id="okr-cycles-perfil" multiple="multiple" name="clicos" class="form-control multiple cycles-okr-perfil" ng-model="cyclesModelOkrPerfil" ng-options="cycle.id as cycle.name for cycle in cyclesOkrPerfil">
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="row" ng-if="!estrategicoperfil">
																		<div class="link_btns" style="margin-left: 2%">
																			<div class="valores_dv_pop">
																				<label for="link" class="control-label">Link</label>
																				<label class="btn_valoresa_pop valores_dv_btn_pop " >
																				<input type="checkbox" id="direcionador-perfil" onclick="$('#objetivo-perfil').attr('checked',false);$('#objetivo-perfil').prop('checked',false);$('#estrategico-perfil').attr('checked',false);$('#estrategico-perfil').prop('checked',false)" ng-model="direcionadorperfil" name="link[]" value="1" class="styled-checkbox" ng-click="linkTypePerfil(1)">
																				<span >Direcionador</span>
																				</label>
																			</div>
																		</div>
																		<div class="link_btns">
																			<div class="valores_dv_pop">
																				<label for="link" class="control-label">&nbsp;</label>
																				<label class="btn_valoresa_pop valores_dv_btn_pop " >
																				<input type="checkbox" id="objetivo-perfil" onclick="$('#direcionador-perfil').attr('checked',false);$('#direcionador-perfil').prop('checked',false);$('#estrategico-perfil').attr('checked',false);$('#estrategico-perfil').prop('checked',false)" ng-model="objetivoperfil" value="2" name="link[]" class="styled-checkbox" ng-click="linkTypePerfil(2)">
																				<span >Objetivo</span>
																				</label>
																			</div>
																		</div>
																		<div class="link_btns">
																			<div class="valores_dv_pop">
																				<label for="link" class="control-label">&nbsp;</label>
																				<label class="btn_valoresa_pop valores_dv_btn_pop " >
																				<input type="checkbox" id="estrategico-perfil" onclick="$('#objetivo-perfil').attr('checked',false);$('#objetivo-perfil').prop('checked',false);$('#direcionador-perfil').attr('checked',false);$('#direcionador-perfil').prop('checked',false)" ng-model="estrategicoperfil" value="3" name="link[]" class="styled-checkbox" ng-click="linkTypePerfil(3)">
																				<span >Estrategico</span>
																				</label>
																			</div>
																		</div>
																		<div class="col-md-12" >
																			<div class="form-group">
																				<label for="okr-tatic-objectives" class="control-label">{{link_text_perfil}}</label>
																				<select id="okr-objectives-perfil" name="objetivo" class=" objetivo-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Objetivo" ng-model="ObjectiveIdPerfil">
																					<option value=""></option>
																					<optgroup label="{{link_text_perfil}}">
																						<option ng-repeat="item in objectives" value="{{ item.id }}">{{ item.title }}</option>
																					</optgroup>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="row" ng-class="{'hidden': selectedTipoPrefil!='c'}">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label for="new_users_prefil_teams" class="control-label">Times</label>
																				<select id="new_users_prefil_teams" multiple="multiple" name="newteams[]" class="form-control multi-select allusers-newteams" ng-model="userNewTeamsPerfil" ng-options="newteam.name for newteam in teams track by newteam.id">
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
																	<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
																</div>
															</div>
															<!--Modal Left End-->
															<div class="col-md-4 pdr-0">
																<aside class="grey-bg">
																	<h4 class="modal-title">Detalhe seus Resultados Chave</h4>
																	<div class="form-group">
																		<label for="okr_keyresult_name_perfil" class="control-label">Nome</label>
																		<input name="okr_keyresult_name_perfil" ng-value="okr_keyresult_name_perfil" type="text" class="form-control" id="okr_keyresult_name_perfil">
																	</div>
																	<div class="form-group">
																		<label for="okr_keyresult_type_perfil" class="control-label">Type</label>
																		<select id="okr_keyresult_type_perfil" name="okr_keyresult_type_perfil" class="types-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um type" ng-model="okr_keyresult_type_perfil">
																			<option value=""></option>
																			<option value="0">Menor Melhor</option>
																			<option value="1">Maior Melhor</option>
																			<option value="2">Plano de Ação</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="okr_keyresult_medida_perfil" class="control-label">Unidade de Medida</label>
																		<input name="okr_keyresult_medida_perfil" ng-value="okr_keyresult_medida_perfil" type="text" class="form-control" id="okr_keyresult_medida_perfil">
																	</div>
																	<div class="form-group">
																		<label for="okr_keyresult_target_perfil" class="control-label">Meta</label>
																		<div class="trg-bg">
																			<div class="trg-fld">
																				<span>Atual</span>
																				<input type="number" class="form-control" name="okr_ponto_partida_perfil" id="okr_ponto_partida_perfil" ng-value="okr_ponto_partida_perfil?okr_ponto_partida_perfil:0" placeholder="0">
																			</div>
																			<div class="trg-fld">
																				<span>Meta</span>
																				<input type="text" class="form-control" id="okr_meta_perfil" name="okr_meta_perfil" placeholder="100%" ng-value="okr_meta_perfil?okr_meta_perfil:100">
																			</div>
																		</div>
																	</div>
																	<button type="button" class="btn btn-white center" ng-if="!editKeyBtnPerfil" ng-click="addNewKeyPerfil()">Adicionar Resultado Chave</button>
																	<button type="button" class="btn btn-white center" ng-if="editKeyBtnPerfil == 1" ng-click="editSubmitNewKeyPerfil(index_id)">Editar</button>
																	<div class="clear h-30"></div>
																	<div class="form-group mb0">
																		<label class="control-label">Adicionados</label>
																	</div>
																	<div class="right text-right clearfix" ng-if="key_list_perfil.length>0" ng-repeat="key in key_list_perfil">
																		<span>{{key.name}}</span>
																		<a href="" class="btn btn-link btn-sm noshadow dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
																		<i class="icon-ellipsis-vert"></i>
																		</a>
																		<ul class="dropdown-menu pull-right">
																			<li>
																				<a href="" ng-click="editKeyResultPerfil(key.index)">Editar</a>
																			</li>
																			<li>
																				<a href="" ng-click="deleteKeyPerfil(key.index)">Deletar</a>
																			</li>
																		</ul>
																	</div>
																	<div class="clear h-60"></div>
																</aside>
															</div>
															<!--Modal Right End-->
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
															<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}">{{ tatic.title }}</a>
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
														<td width="150" ng-if="user.normal_user != 1">
															<div class="div_action">
																<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id }}">{{ "UI.EDIT" | translate}}</a>
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
								<h2 class="dheading">{{ "MEU_PERFIL.LAST_UPDATES" | translate}}</h2>
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
						-->
					<?php
if ($this->session->userdata('feedback') == "1") {
    ?>
					<div class="dblock" ng-if="user.feedback == 1">
						<div class="dblock_head">
							<h2 class="dheading">Feedbacks e Notas Privadas</h2>
							<!--                            <span class="addmore" ng-click="SolicitarFeedback()" >Feedbacks e Notas Privadas</span>-->
							<a class="addmore" href="<?php echo base_url('feedback') ?>" >Feedbacks e Notas Privadas</a>
						</div>
						<div class="dblock_body">
							<div class="babs-2-pabel">
								<div class="tab tab-feedback-panel" role="tabpanel">
									<!-- Nav tabs -->
									<div class="tabs-cntr">
										<ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
											<li role="presentation" class="tav-active-feed active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.RECEIVED' | translate }}</a></li>
											<li class="tav-active-feed" role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.GIVEN' | translate }}</a></li>
											<li class="tav-active-feed" role="presentation"><a href="#Section3" aria-controls="profile" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.REQUESTED_FOR_ME' | translate }}</a></li>
											<li class="tav-active-feed" role="presentation"><a href="#Section4" aria-controls="profile" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.REQUESTED_BY_ME' | translate }}</a></li>
											<li class="tav-active-feed" role="presentation"><a href="#SectionPrivate" aria-controls="profile" role="tab" data-toggle="tab">Notas privadas</a></li>
										</ul>
									</div>
									<!-- Tab panes -->
									<div class="tab-content tabs feedbacktabs">
										<div role="tabpanel" class="tab-pane fade in active" id="Section1">
											<div class="feedbcsections" ng-show="feedback_recived.length >0" ng-repeat="recieved in feedback_recived" >
												<div class="heading_dv_name">
													<div class="heading_left">
														<span>{{ "UI.FROM" | translate }} <i class="fa fa-caret-right"></i></span>
														<div class="user_img_dv" ng-if="recieved.image">
															<img src=""  ng-src="{{ recieved.image }}" class="img-circle" alt="{{ initials(recieved.name) }}" height="40" width="40"/>
														</div>
														<div class="user_img_nam" ng-if="!recieved.image">{{ initials(recieved.name) }}</div>
														<label>{{ recieved.name }}</label>
													</div>
													<div class="heading_right"><i class="fa fa-{{recieved.privacy=='1'?'lock':'unlock'}}"></i>
														<span ng-if="recieved.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
														<span ng-if="recieved.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span>
														{{ recieved.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
													</div>
												</div>
												<div class="description_tag">{{ recieved.response }}</div>
												<div class="desct-p" ng-show="recieved.valore.length > 0" ng-repeat="valor in recieved.valore">
													<label>{{valor.name}}</label>
												</div>
											</div>
											<div class="" ng-show="feedback_recived.length < 1 ">
												<div class="media media-tab-line" >
													<div class="media-body">
														<p class="media-heading" style="text-align:center;">{{ "UI.NO_RECORDS_FOUND" | translate }}</p>
													</div>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="Section2">
											<div class="feedbcsections" ng-repeat="given in feedback_given" ng-if="feedback_given.length > 0" >
												<div class="heading_dv_name">
													<div class="heading_left">
														<span>{{ "UI.FROM" | translate }} <i class="fa fa-caret-right"></i></span>
														<div class="user_img_dv" ng-if="given.image">
															<img src=""  ng-src="{{ given.image }}" class="img-circle" alt="{{ initials(given.name) }}" height="40" width="40"/>
														</div>
														<div class="user_img_nam" ng-if="!given.image">{{ initials(given.name) }}</div>
														<label>{{ given.name }}</label>
													</div>
													<div class="heading_right"><i class="fa fa-{{given.privacy=='1'?'lock':'unlock'}}"></i>
														<span ng-if="given.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
														<span ng-if="given.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span>
														{{ given.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
													</div>
												</div>
												<div class="description_tag">{{ given.response }}</div>
												<div class="desct-p" ng-show="given.valore.length > 0" ng-repeat="valor in given.valore">
													<label>{{valor.name}}</label>
												</div>
											</div>
											<div class="media media-tab-line" ng-show="feedback_given.length< 1">
												<div class="media-body">
													<p class="media-heading" style="text-align:center;">{{ "UI.NO_RECORDS_FOUND" | translate }}</p>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="Section3">
											<div class="feedbcsections" ng-repeat="requested in feedback_requested" ng-if="feedback_requested.length >0">
												<div class="heading_dv_name">
													<div class="heading_left">
														<span>{{ "UI.FROM" | translate }} <i class="fa fa-caret-right"></i></span>
														<div class="user_img_dv" ng-if="requested.image">
															<img src=""  ng-src="{{ requested.image }}" class="img-circle" alt="{{ initials(requested.name) }}" height="40" width="40"/>
														</div>
														<div class="user_img_nam" ng-if="!requested.image">{{ initials(requested.name) }}</div>
														<label>{{ requested.name }}</label>
													</div>
													<div class="heading_right"><i class="fa fa-{{requested.privacy=='1'?'lock':'unlock'}}"></i>
														<span ng-if="requested.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
														<span ng-if="requested.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span>
														{{ requested.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
													</div>
												</div>
												<div class="description_tag">{{ requested.solicitar }}</div>
												<!--                                                 <a href="javascript:void(0)" ng-click="SolicitarFeedback(requested.destino)" title="Reply to this feedback" ><i class="fa fa-reply" style="float:right"></i></a>-->
												<a href="<?php echo base_url('feedback#!/give') ?>/{{requested.destino}}" title="Reply to this feedback" ><i class="fa fa-reply" style="float:right"></i></a>
												<div class="desct-p" ng-show="requested.valore.length > 0" ng-repeat="valor in requested.valore">
													<label>{{valor.name}}</label>
												</div>
											</div>
											<div class="media media-tab-line" ng-show="feedback_requested.length<1">
												<div class="media-body">
													<p class="media-heading" style="text-align:center;">{{ "UI.NO_RECORDS_FOUND" | translate }}</p>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="Section4">
											<div class="feedbcsections" ng-repeat="requested_by_me in feedback_requested_by_me" ng-if="feedback_requested_by_me.length >0">
												<div class="heading_dv_name">
													<div class="heading_left">
														<span>{{ "UI.FROM" | translate }} <i class="fa fa-caret-right"></i></span>
														<div class="user_img_dv" ng-if="requested_by_me.image">
															<img src=""  ng-src="{{ requested_by_me.image }}" class="img-circle" alt="{{ initials(requested_by_me.name) }}" height="40" width="40"/>
														</div>
														<div class="user_img_nam" ng-if="!requested_by_me.image">{{ initials(requested_by_me.name) }}</div>
														<label>{{ requested_by_me.name }}</label>
													</div>
													<div class="heading_right"><i class="fa fa-{{requested_by_me.privacy=='1'?'lock':'unlock'}}"></i>
														<span ng-if="requested_by_me.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
														<span ng-if="requested_by_me.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span>
														{{ requested_by_me.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
													</div>
												</div>
												<div class="description_tag">{{ requested_by_me.solicitar }}</div>
												<div class="desct-p" ng-show="requested_by_me.valore.length > 0" ng-repeat="valor in requested_by_me.valore">
													<label>{{valor.name}}</label>
												</div>
											</div>
											<div class="media media-tab-line" ng-show="feedback_requested_by_me.length<1">
												<div class="media-body">
													<p class="media-heading" style="text-align:center;">{{ "UI.NO_RECORDS_FOUND" | translate }}</p>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="SectionPrivate">
											<div class="feedbcsections" ng-repeat="private in private_notes" ng-if="private_notes.length > 0" >
												<div class="heading_dv_name">
													<div class="heading_left">
														<span>Anotações {{ "UI.FROM" | translate }} <i class="fa fa-caret-right"></i></span>
														<div class="user_img_dv" ng-if="private.md_image">
															<img src=""  ng-src="{{ private.md_image }}" class="img-circle" alt="{{ initials(private.name) }}" height="40" width="40"/>
														</div>
														<div class="user_img_nam" ng-if="!private.md_image">{{ initials(private.name) }}</div>
														<label>{{ private.name }}</label>
													</div>
													<div class="heading_right">
														{{ private.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
													</div>
												</div>
												<div class="description_tag">{{ private.response }}</div>
												<div class="desct-p" ng-show="private.valore.length > 0" ng-repeat="valor in private.valore">
													<label>{{valor.name}}</label>
												</div>
											</div>
											<div class="media media-tab-line" ng-show="private_notes.length< 1">
												<div class="media-body">
													<p class="media-heading" style="text-align:center;">Sem anotações recentes.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>

					<!--<div class="activities_sets">
						<div class=""></div>
						</div>-->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div ng-show="profiletab==2">
			<div class="row">
				<div class="col-sm-9">
					<div class="dblock">
						<div class="show-view_headings">Pessoas da Equipe</div>
						<div class="col-sm-12 pd0">
							<div class="col-sm-7">
								<div class="tem-left-carouel">
									<div class="team-carousel">
										<data-owl-carousel class="owl-carousel owl-theme" data-options="owlOptionsteamMembers">
											<div owl-carousel-item="" class="item " ng-class="{'current': $first}" ng-repeat="team in myteams" >
												<a ng-if="team.updates.length>0" href="javascript:void(0);" data-user-id="{{team.id_usuario}}" ng-click="showupdateforuser(team.id_usuario)" id="teammember_{{team.id_usuario}}" >
													<figure>
														<img src="" ng-if="team.xs_image" ng-src="{{ team.xs_image }}" class="img-circle" alt="{{ team.name }}" height="40" width="40" />
														<span class="user-image-replace-name" ng-if="!team.xs_image">{{ initials(team.name) }}</span>
													</figure>
													<span>{{ team.name | limitTo: 7 }}</span>
												</a>
												<a ng-if="team.updates.length<1" href="javascript:void(0);" id="teammember_{{team.id_usuario}}" class="no_update" >
													<figure>
														<img src="" ng-if="team.xs_image" ng-src="{{ team.xs_image }}" class="img-circle" alt="{{ team.name }}" height="40" width="40" />
														<span class="user-image-replace-name" ng-if="!team.xs_image">{{ initials(team.name) }}</span>
													</figure>
													<span>{{ team.name | limitTo: 7 }}</span>
												</a>
											</div>
										</data-owl-carousel>
									</div>
								</div>
							</div>
							<div class="col-sm-5">
								<div class="tem-right-time-section">
									<label>Período :</label>
									<span class="space-left">
										<div class="container-block">
											<input type="checkbox" id="showallupdates" ng-click="showallupdates()" class="ng-pristine ng-untouched ng-valid ng-empty">
											<label for="showallupdates">Desde o início</label>
										</div>
										<b>ou</b>
									</span>
									<div class="clearfix"></div>
									<div class="filters_view">
										<select id="search-week" name="week" ng-model="searchWeek" ng-change="filterbyWeek(); $('#showallupdates').prop('checked',false);" class="select2 usuario" data-placeholder="Selecione período">
											<option value="all">Todos</option>
											<option value="current" selected>Semana Atual</option>
											<option value="last" >Última Semana</option>
											<option value="2">2 Semanas Atrás</option>
											<option value="3">3 Semanas Atrás</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div ng-repeat="team in myteams | filter: {member_id: member_id}" >
							<div class="div_view_shorts mp-0">
								<div class="userupdatesectoin my-team" ng-repeat="update in team.updates" ng-if="team.updates.length>0">
									<div class="heading_top">
										<div class="left_image">
											<img src="" ng-if="team.xs_image" ng-src="{{ team.xs_image }}" class="img-circle" width="32" height="32" alt="{{ team.name }}" />
											<span class="user-image-replace-nam" ng-if="!team.xs_image">{{ initials(team.name) }}</span>
										</div>
										<div class="user_dteisl_dc">
											<label>{{ team.name }}</label>
											<span>{{ team.teamname }}</span>
										</div>
										<div class="week_view_s">{{ update.date_update | amUtc | amTimeAgo:true }} </div>
										<?php
if ($this->session->userdata('maintenance_user') == "1" || $this->session->userdata('admin') == "1") {
    ?>
										<div class="labe_c" ng-show="user.admin=='true' || team.authorised==user.id">
											<label for="ch_{{team.id_usuario}}" ng-click="updatestatus($event, update.id)">
											<input type="checkbox" value="{{update.id}}" ng-checked="update.situation==1"  id="ch_{{update.id}}">
											<span><i class="fa fa-check-circle"></i></span>
											</label>
										</div>
										<?php }?>
										<div class="veiew">
											<i class="fa fa-angle-down"></i>
										</div>
										<?php
if ($this->session->userdata('feedback') == "1") {
    ?>
										<div class="feed_back_give position-right">
											<!--												<a href="javascript:void(0)" class="feddback_btn" ng-click="SolicitarFeedback()">-->
											<a href="<?php echo base_url('feedback') ?>" class="feddback_btn">
											<i class="fa fa-comment"></i>
											<span>Dar Feedback</span>
											</a>
										</div>
										<?php }?>
									</div>
									<div class="shorts_bottoms">
										<div class="col-sm-6">
											<div class="heading1">Perguntas e Respostas</div>
											<div ng-repeat="question in update.questions">
												<div ng-if="question.type=='q'" ng-include="'teamtextQuestion'"></div>
												<div ng-if="question.type=='e'" ng-include="'teamtstarRating'"></div>
												<div ng-if="question.type=='c'" ng-include="'teamtheartRating'"></div>
												<div ng-if="question.type=='o'" ng-include="'teamtmultipleAnswer'"></div>
												<div class="clearfix"></div>
												<div class="see_more_comments chat-icon" ng-if="question.answers[0].comments.length>2"><a href="javascript:void(0)">{{question.answers[0].comments.length}} comments</a></div>
												<div class="text-sub">
													<input type="text" name="comment[{{question.answers[0].id}}]" id="team_comment_{{question.answers[0].id}}" placeholder="Escreva um comentário." />
													<button type="button"  id="team_comment_button_{{question.answers[0].id}}]" ng-click="submitComment(question.answers[0].id)"></button>
												</div>
												<div class="comment_block white-bg" ng-if="question.answers[0].comments.length>0">
													<div class="comment_data" ng-repeat="comment in question.answers[0].comments" ng-class="{'hide':$index>1}">
														<span class="user-nm">{{comment.name}}</span>
														<div class="comment">{{comment.comment}}</div>
													</div>
												</div>
												<div class="see_remain_comments chat-icon" ng-if="question.answers[0].comments.length>2"><a href="javascript:void(0)" data-hide-text="show less" data-show-text="show {{question.answers[0].comments.length-2}} more">show {{question.answers[0].comments.length-2}} more</a></div>
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
													<label ng-if="question.escala == 10"><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>5}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>6}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>7}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>8}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-star" ng-class="{'active':question.answers[0].rating_score>9}"></i></label>
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
													<label ng-if="question.escala == 10"><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>5}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>6}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>7}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>8}"></i></label>
													<label ng-if="question.escala == 10"><i class="fa fa-heart" ng-class="{'active':question.answers[0].rating_score>9}"></i></label>
												</div>
											</script>
										</div>
										<div class="col-sm-6 pdr0">
											<div class="heading1">
												Objetivos Vinculados
												<div class="veiew_child" ng-if="update.goals.length>2">
													<i  class="fa fa-angle-down"></i>
												</div>
											</div>
											<div ng-if="update.goals.length>0" >
												<div class="goals-range-slider goal_data" ng-repeat="goal in update.goals" ng-class="{'hide':$index>1}">
													<div class="col-sm-8 pdl0">
														<div class="pbar_wrap_label">
															{{goal.title}}
														</div>
													</div>
													<div class="col-sm-4 pdr0">
														<div class="pbar_wrap">
															<div class="progress_wrap full-width">
																<span class="ng-binding">{{goal.percentage}}%</span>
																<div class="progress">
																	<div class="progress-bar" role="progressbar" style="width: {{goal.percentage}}%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" ng-class="{'ontrack':goal.color==1,'attention':goal.color==2,'delayed':goal.color==3}"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div ng-if="!update.goals.length">
												<div class="pbar_wrap_label">
													Não há objetivos vinculados a esta atualização.
												</div>
												<div class="clear" style="height:10px;"></div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="userupdatesectoin my-team" ng-if="team.updates.length<1">
									<p class="empty_record">Nenhum registro encontrado.</p>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<!--col-6 End-->
						<div ng-if="!myteams.length">
							<p class="empty_record">Nenhum registro encontrado.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-sm-3">
					<div class="dblock stats">
						<div class="show-view_headings">Estatísticas</div>
						<ul class="general_list goals-list" tabindex="8" style="overflow: hidden; outline: none;">
							<li class="ng-scope"><span>{{updatestatistics.goals}}</span>
								Objetivos mencionados :
							</li>
							<li class="ng-scope least-updates">
								<div class="least-heading">Mais atualizações : </div>
								<div ng-repeat="most_update in updatestatistics.most_updates" class="users-name">
									<a href="<?php echo base_url('/perfil'); ?>/{{most_update.id}}">
									{{most_update.name}}{{$last ? '' : ','}}&nbsp;
									</a>
								</div>
							</li>
							<li class="ng-scope least-updates">
								<div class="least-heading">Menos Atualizações : </div>
								<div ng-repeat="least_update in updatestatistics.least_updates" class="users-name">
									<a href="<?php echo base_url('/perfil'); ?>/{{least_update.id}}" ng-title="{{least_update.name}}">
									{{least_update.name}}{{$last ? '' : ','}}&nbsp;
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="dblock stats">
						<div class="show-view_headings">Objetivos Atualizados no Período</div>
						<ul class="general_list goals-list" id="team_link_goals"  tabindex="8" style="max-height: 200px">
							<li class="ng-scope" ng-if="updatestatistics.link_goals.length>0" ng-repeat="goal in updatestatistics.link_goals">
								<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ goal.id }}">{{$index+1}}.-  {{goal.nome}} <span>{{goal.percentage}}%</span></a>
							</li>
							<li class="ng-scope" ng-if="!updatestatistics.link_goals.length">
								<a href="javascript:void(0)">Nenhum registro encontrado</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div ng-show="profiletab==3" id="carreertab">
			<!--- Sidebar Menu Section Starts ----->
			<div ng-class="openSideBarMenu?'sidemenu-section-open-menu':'sidemenu-section-closed-menu'">
				<form id="cycle_config_modal_form">
					<div class="close-sec" ng-click="closeSidebar()">
						<figure class="close-icon">
							<img src="<?php echo base_url() ?>assets/portal/img/close.png" alt="close"/>
						</figure>
					</div>
					<div class="inner-section">
						<div class="sales-representative">
							<figure>
								<img ng-if="userData.xs_image" ng-src="{{ userData.xs_image }}" class="img-circle ng-scope">
							</figure>
							<div class="sales-name">
								{{ userData.name }}
							</div>
						</div>
						<div class="bottom-border">
							<div class="line"></div>
							<div class="reivew">
								<span class="views">Avaliações Recebidas</span>
								<span class="views-number">{{ totalReviews }}/{{ inCompleteReviews }}</span>
							</div>
						</div>
						<div class="self-review-wrapper">
							<div class="first-box">
								<div class="view-edit">
									<span>Auto-Avaliacao</span>
								</div>
								<div class="clearfix"></div>
								<div class="viewers-image">
									<figure>
										<img ng-if="userData.xs_image" ng-src="{{ userData.xs_image }}" class="img-circle ng-scope">
									</figure>
									<span>{{ userData.name }}</span>
									<div class="right-view" ng-show="selfReviewSectionEdit">
									</div>
								</div>
							</div>
							<div class="first-box">
								<div class="view-edit">
									<span>Seleção de Gestores</span>
									<span>
									<a href="javascript:void(0)" ng-click="editManagers()" ng-if="!managerSectionEdit">
									<span ng-if="!managerSectionEdit">Editar</span>
									</a>
									<a href="javascript:void(0)" ng-click="closeEditManagers()" ng-if="managerSectionEdit">
									<span ng-if="managerSectionEdit">Finalizar</span>
									</a>
									</span>
								</div>
								<div class="clearfix"></div>
								<div class="viewers-image" ng-repeat="manager in SelectedGestors">
									<figure>
										<img ng-if="manager.xs_image" ng-src="{{ manager.xs_image }}" class="img-circle ng-scope">
									</figure>
									<span>{{ manager.name }}</span>
									<div class="right-view" ng-show="managerSectionEdit">
										<i class="fa fa-close" aria-hidden="true" ng-click="removeGestor($index,manager.id_usuario)"></i>
									</div>
								</div>
								<div class="form-group" ng-show="managerSectionEdit">
									<label for="cycle_config_gestor" class="control-label"></label>
									<input type="hidden" ng-model="selectedUserId">
									<select ng-model="select_gestor" id="cycle_config_gestor" name="gestor[]" ng-change="selectGestors()" multiple>
										<option value=""></option>
										<option ng-repeat="gestor in gestors" value="{{ gestor.id }}">{{ gestor.name }}</option>
									</select>
								</div>
							</div>
							<div class="first-box">
								<div ng-if="cycle_details.revisao_pares==1">
									<div class="view-edit">
										<span>Seleção de Pares</span>
										<span>
										<a href="javascript:void(0)" ng-click="editReviewers()" ng-if="!reviwersSectionEdit">
										<span ng-if="!reviwersSectionEdit">Editar</span>
										</a>
										<a href="javascript:void(0)" ng-click="closeEditReviewers()" ng-if="reviwersSectionEdit">
										<span ng-if="reviwersSectionEdit">Finalizar</span>
										</a>
										</span>
									</div>
									<div class="clearfix"></div>
									<div class="viewers-image" ng-repeat="pares in SelectedPares">
										<figure>
											<img ng-if="pares.xs_image" ng-src="{{ pares.xs_image }}" class="img-circle ng-scope">
										</figure>
										<span>{{ pares.name }}</span>
										<div class="right-view" ng-show="reviwersSectionEdit">
											<i class="fa fa-close" aria-hidden="true" ng-click="removePares($index,pares.id_usuario)"></i>
										</div>
									</div>
									<div class="form-group" ng-show="reviwersSectionEdit">
										<label for="all_users" class="control-label"></label>
										<select ng-model="all_select_pares" id="all_users" name="user" ng-change="selectPares1()" multiple>
											<option value=""></option>
											<option ng-repeat="user in all_users" value="{{ user.id }}">{{ user.name }}</option>
										</select>
									</div>
								</div>
								<button type="button" ng-click="addGestorsAndParesForCycle()" class="btn btn-success sidebar-save">Finalizar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--- Sidebar Menu Section Ends ----->
			<div class="col-sm-12">
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#CycleConfig" data-toggle="tab">Ajustes e acompanhamento ciclo</a>
							</li>
							<li class="">
								<a href="#CycleReview" ng-click="getcyclereviewuserforprofile()" data-toggle="tab">Execução de avaliações</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="CycleConfig">
								<div class="row">
									<div class="col-sm-12">
										<div class="form_add" id = "div-1">
											<form id="form-search" ng-submit="filterAvailicaoUsers()">
												<div class="row">
													<div class="col-sm-12">
														<div class="filter_form_view view_dsds">
															<div class="row">
																<div class="col-sm-3">
																	<label>Ciclo</label>
																	<div class="clearfix"></div>
																	<div class="filters_view" >
																		<select name="avalicao_cycles" class="form-control avalicao_cycles" ng-model="avalicao_cycles" >
																			<option value="{{ cycle.id_revisao_ciclo }}" ng-repeat="cycle in cycles">{{ cycle.nome_ciclo }}</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-3">
																	<label>Nome Usuário</label>
																	<div class="clearfix"></div>
																	<div class="filters_view" >
																		<input type="text" class="form-control" name="search_reviewees" ng-model="search_by_name" placeholder="digite para pesquisar">
																	</div>
																</div>
																<div class="col-sm-3">
																	<label>Situação</label>
																	<div class="clearfix"></div>
																	<div class="filters_view" >
																		<select name="search_by_status" ng-model="search_by_status" class="form-control" id="search_by_status">
																			<option value="">Todos</option>
																			<option value="1">Completos</option>
																			<option value="0">Pendentes</option>
																		</select>
																	</div>
																</div>
																<div class="col-sm-3">
																	<label>Team Filter</label>
																	<div class="clearfix"></div>
																	<div class="filters_view" >
																		<select id="select_team_filter" class="form-control" ng-model="select_team_filter">
																			<option value="">All</option>
																			<option ng-repeat="team in teams" value="{{team.id}}">{{team.name}}</option>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class="clr_filters">
															<button type="submit" class="apply_filter">Aplicar Filtro</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="progress">
										  <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="{{ complete_reviews_per }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ complete_reviews_per }}%">
										  {{ complete_reviews_per }}%
										  </div>
										</div>
										<ul class="review-option-list">
											<li>
												<a href="javascript:void(0)">Completos: {{ completed_reviews }}({{ complete_reviews_per }}%)</a>
											</li>
											<li>
												<a href="javascript:void(0)">Incompletos: {{ no_answer_reviews }}({{ no_answer_reviews_per }}%)</a>
											</li>
											<li>
												<a href="javascript:void(0)">Sem respostas: {{ not_started_reviews }}({{ not_started_reviews_per }}%)</a>
											</li>
										</ul>
									</div>
								</div>
								<hr>
								<div class="row" ng-if="cycles.length>0">
									<div class="col-md-12">
										<button ng-if="cycle_detail.revisao_pares==1" type="button" class="btn btn-success" ng-click="updateRevisaoUsersAutorizado()">Liberar para Avaliação</button>
										<br ng-if="cycle_detail.revisao_pares==1">
										<br ng-if="cycle_detail.revisao_pares==1">
										<span class="informationtouser col-md-12">* Clicando sobre do usuário você pode editar informações do ciclo.</span>
									</div>
								</div>
								<div class="row" ng-if="cycles.length>0">
									<div class="col-md-12">
										<form id="ravisao_availicao_table_form" name="ravisao_availicao_table_form">
											<div class="dblock no-shadow">
												<div class="dblock_body carrier_block">
													<div class="carrier_panel clearfix hover-cls">
														<div class="elofy_table_row db_obj">
															<div class="col-md-1" ng-if="cycle_detail.revisao_pares==1">
																<div class="model_bod">
																	<div class="model_ch">
																		<div class="model_che">
																			<input type="checkbox" ng-click="selectAll()" ng-model="select_all" name="select_all" id="select_all">
																			<label for="select_all"></label>
																		</div>
																	</div>
																</div>
															</div>
															<div ng-class="{'col-md-3': cycle_detail.revisao_pares==1 , 'col-md-4': cycle_detail.revisao_pares==0 }">
																<div class="feed_profile"><strong>Nome</strong></div>
															</div>
															<div class="col-md-2"  ng-if="cycle_detail.revisao_pares==1"><strong>Seleção de Par</strong></div>
															<div ng-class="{'col-md-2': cycle_detail.revisao_pares==1 , 'col-md-4': cycle_detail.revisao_pares==0 }"><strong>Situação</strong></div>
															<div ng-class="{'col-md-4': cycle_detail.revisao_pares==1 , 'col-md-4': cycle_detail.revisao_pares==0 }">
																<div class="right-feed-col">
																	<div class="feed-time"><strong>Progresso</strong></div>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="carrier_panel clearfix hover-cls" ng-if="cycleUsers.length>0" ng-repeat="cycleUser in cycleUsers">
														<div class="elofy_table_row db_obj">
															<div class="col-md-1" ng-if="cycle_detail.revisao_pares==1">
																<div class="model_bod">
																	<div class="model_ch">
																		<div class="model_che">
																			<input type="checkbox" name="row_checkbox[]" value="{{ cycleUser.id_usuario }}" ng-checked="checkall" ng-model="row_checkbox" class="row_checkbox" id="row_checkbox_{{ $index }}">
																			<label for="row_checkbox_{{ $index }}"></label>
																		</div>
																	</div>
																</div>
															</div>
															<div ng-class="{'col-md-3': cycle_detail.revisao_pares==1 , 'col-md-4': cycle_detail.revisao_pares==0 }" ng-click="openSidebar(cycle_detail.id_revisao_ciclo,cycleUser.id_usuario,cycleUser.complete_reviews,cycleUser.total_reviews)">
																<div class="feed_profile">
																	<div class="feed-user_thumb">
																		<figure>
																			<img ng-if="cycleUser.xs_image" ng-src="{{ cycleUser.xs_image }}" class="img-circle ng-scope">
																		</figure>
																		<span class="usr_names ng-binding">{{ cycleUser.nome_usuario }} </span>
																	</div>
																</div>
															</div>
															<div ng-if="cycle_detail.revisao_pares==1" class="col-md-2" ng-click="openSidebar(cycle_detail.id_revisao_ciclo,cycleUser.id_usuario,cycleUser.complete_reviews,cycleUser.total_reviews)">
																<span class="finalizado-btn clr-green" ng-if="cycleUser.autorizado==1">Completa</span>
																<span class="finalizado-btn clr-yellow" ng-if="cycleUser.autorizado==0">Pendente</span>

															</div>
															<div ng-class="{'col-md-2': cycle_detail.revisao_pares==1 , 'col-md-4': cycle_detail.revisao_pares==0 }" ng-click="openSidebar(cycle_detail.id_revisao_ciclo,cycleUser.id_usuario,cycleUser.complete_reviews,cycleUser.total_reviews)">
																<span class="finalizado-btn clr-green" ng-if="cycleUser.complete_reviews==cycleUser.total_reviews">Finalizado</span>
																<span class="finalizado-btn clr-yellow" ng-if="cycleUser.complete_reviews!=cycleUser.total_reviews">Pendente</span>
																<span class="finalizado-btn clr-yellow" ng-if="((cycleUser.complete_reviews)/(cycleUser.total_reviews)==0.5)">em Andamento</span>
															</div>
															<div ng-class="{'col-md-4': cycle_detail.revisao_pares==1 , 'col-md-4': cycle_detail.revisao_pares==0 }">
																<div class="right-feed-col" ng-click="openSidebar(cycle_detail.id_revisao_ciclo,cycleUser.id_usuario,cycleUser.complete_reviews,cycleUser.total_reviews)">
																	<div class="feed-time">{{ cycleUser.complete_reviews }}/{{ cycleUser.total_reviews }} Avaliações Recebidas </div>
																</div>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
													<h3 ng-show="cycleUsers.length<=0">Não foram encontrados usuários para este ciclo. Em caso de dúvida contate o administrador do sistema.</h3>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="row" ng-if="cycles.length<1">
									<div class="col-md-12">
										<p>Não foram encontrados usuários para este ciclo. Em caso de dúvida contate o administrador do sistema.</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade in" id="CycleReview">
								<div class="row">
									<div class="col-sm-12">
										<div ng-show="reviewtab==1">
											<div class="dblock" ng-repeat="(key, teams) in users_teams"  ng-if="teams.length>0">
												<div class="dblock_head" ng-if="teams.length>0" >
													<h2 class="dheading">
														<span ng-if="key == 'type1'"><strong>Auto avaliação</strong></span>
														<span ng-if="key == 'type2'"><strong>Avaliação como Gestor</strong></span>
														<span ng-if="key == 'type3' && teams.length>0"><strong>Avaliação como Par</strong></span>
													</h2>
												</div>
												<!--user-dtls End-->
												<div id="table_wrapper" ng-if="teams.length>0"  class="dataTables_wrapper no-footer th-style bottom-space">
													<table id="table" class="table table-hover dataTable no-footer no-border" role="grid">
														<thead>
															<tr role="row" ng-if="teams.length>0">
																<th>
																</th>
																<th ng-repeat="fase in teams[0].fases" ng-if="key == 'type1' && fase.autoavalia==1">{{fase.nome_fase}}</th>
																<th ng-repeat="fase in teams[0].fases" ng-if="key == 'type3' && fase.pares==1">{{fase.nome_fase}}</th>
																<th ng-repeat="fase in teams[0].fases" ng-if="key == 'type2' && fase.gestor==1">{{fase.nome_fase}}</th>
																<th>{{ 'MEU_PERFIL.UPDATE_DATE' | translate }}</th>
																<th class="action-btn"> </th>
															</tr>
														</thead>
														<tbody>
															<tr ng-repeat="user in teams" class="{{teams.length}} cycle_inner_table" ng-if="teams.length>0">
																<td>
																	<img ng-src="{{ user.xs_image }}" class="img-circle" width="40" height="40">
																	{{ user.nome_usuario }}
																</td>
																<td ng-repeat="fase in user.fases" ng-if="key == 'type1' && fase.autoavalia==1">

																	<i class="fa fa-check" ng-if="fase.componente=='V' && user.valores==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='C' && user.competencias==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='T' && user.potencial==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='S' && user.survey==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='O' && user.resultados==1" ></i>

																	<i class="fa fa-close" ng-if="fase.componente=='V' && user.valores==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='C' && user.competencias==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='T' && user.potencial==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='S' && user.survey==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='O' && user.resultados==0" ></i>

																</td>
																<td ng-repeat="fase in user.fases" ng-if="key == 'type3' && fase.pares==1">

																	<i class="fa fa-check" ng-if="fase.componente=='V' && user.valores==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='C' && user.competencias==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='T' && user.potencial==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='S' && user.survey==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='O' && user.resultados==1" ></i>

																	<i class="fa fa-close" ng-if="fase.componente=='V' && user.valores==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='C' && user.competencias==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='T' && user.potencial==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='S' && user.survey==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='O' && user.resultados==0" ></i>

																</td>
																<td ng-repeat="fase in user.fases" ng-if="key == 'type2' && fase.gestor==1">

																	<i class="fa fa-check" ng-if="fase.componente=='V' && user.valores==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='C' && user.competencias==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='T' && user.potencial==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='S' && user.survey==1" ></i>
																	<i class="fa fa-check" ng-if="fase.componente=='O' && user.resultados==1" ></i>

																	<i class="fa fa-close" ng-if="fase.componente=='V' && user.valores==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='C' && user.competencias==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='T' && user.potencial==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='S' && user.survey==0" ></i>
																	<i class="fa fa-close" ng-if="fase.componente=='O' && user.resultados==0" ></i>

																</td>
																<td>{{last.datadeatualizacao | amUtc | amDateFormat:'DD/MM/YYYY'}}</td>
																<td class="action-btn">
																	<a href="javascript:void(0)" ng-if="user.autorizado==1 && user.respondido==0" class="startappraisal" ng-click="reviewTab2(user.id_usuario,user.avaliacoa_id)">{{ 'UI.BEGIN' | translate }}</a>
																	<a href="javascript:void(0);" style="cursor:default;" ng-if="user.autorizado==1 && user.respondido==1" class="finishappraisal" ><i class="fa fa-check"></i> {{ 'UI.FINISH' | translate }}</a>
																</td>
															</tr>
															<tr ng-repeat="user in teams" ng-if="teams.length<1">
																<td colspan="7">
																	Não foram encontrados registros.
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div ng-if="reviewtab==2">
											<div class="dblock">

												<div class="dblock_head">
													<h2 class="dheading"><strong>{{ "MEU_PERFIL.NEW_CICLE_REVIEW_LABEL" | translate }}</strong></h2>
												</div>
												<hr	>
												<div class="user-dtls no-border">
													<figure>
														<a ng-if="!searchuser.xs_image" href="javascript:void(0);" class="user-image-wrap"><span class="user-image-replace ng-binding ng-scope">{{ initials(searchuser.name) }}</span></a>
														<img ng-if="searchuser.xs_image" ng-src="{{ searchuser.xs_image }}" class="img-circle ng-scope" width="40" height="40" alt="{{ searchuser.name }}">
													</figure>
													<div class="user-label">{{searchuser.name}}</div>
													<div class="job-fnc">{{ 'MEU_PERFIL.ROLE_LABEL' | translate }} <span>{{searchuser.cargo}}</span></div>
													<div class="job-date">{{ 'UI.EMAIL_LABEL' | translate }} <span>{{searchuser.email}}</span></div>
													<div class="team-name">{{ 'MEU_PERFIL.TEAM_NAME_LABEL' | translate }} <span>{{searchuser.team}}</span></div>
												</div>
											</div>
											<!--dblock End-->
											<div class="dblock avancar-btn" ng-show="resultotab==2">
												<div class="show-view_headings2 mrg-0">
													&nbsp;
													<span class="bread_crumps main_inner_heading" ng-repeat="fase in fasesData" ng-if="avaliacoescycledetails.id_tipo_avaliacao==1 &&  fase.autoavalia==1">
														{{ fase.nome_fase }}
														<span ng-hide="$index>=4">></span>
													</span>
													<span class="bread_crumps main_inner_heading" ng-repeat="fase in fasesData" ng-if="avaliacoescycledetails.id_tipo_avaliacao==3 &&  fase.pares==1">
														{{ fase.nome_fase }}
														<span ng-hide="$index>=4">></span>
													</span>
													<span class="bread_crumps main_inner_heading" ng-repeat="fase in fasesData" ng-if="avaliacoescycledetails.id_tipo_avaliacao==2 &&  fase.gestor==1">
														{{ fase.nome_fase }}
														<span ng-hide="$index>=4">></span>
													</span>
												</div>
												<a href="javascript:void(0);" class="avancar previous_btn" ng-click="prevTab($step)">
												<i class="fa fa-backward"></i> {{ 'UI.BACK' | translate }}
												</a>
												<a href="javascript:void(0);" class="backr " ng-click="getcyclereviewuserforprofile();myCycleReview();">
												<i class="fa fa-reply"></i> Sair
												</a>
												<a href="javascript:void(0);" class="apprisialnext next_btn" ng-click="nextTab($step)">Avançar <i class="fa fa-forward"></i> </a>
											</div>
											<div class="row">
												<div class="col-sm-12" ng-show="activecomponent=='V'">
													<form id="values_skills" >
														<div class="dblock eql-height" >
															<div class="dblock_head">
																<h2 class="dheading">{{currentfase.nome_fase}}</h2>
															</div>
															<div class="rst-section-result" >
																<div id="valoresTb3">
																	<div id="newvalores">
																		<div class="vlr-wrapper valores form_section" >
																			<div class="question-section" ng-repeat="valore in apprisialvalores">
																			<div class="valore_quest_main_sec">
																				<div class="row">
																					<div class="col-sm-2">
																						<div class="innerpage-sec">
																							<div class="question-section">
																								<span class="small-head">{{ valore.name }}</span>
																							</div>
																						</div>
																					</div>
																					<div class="elo_cate" ng-class="{'col-md-3 col-sm-3': cycledetails.escala==2, 'col-md-4 col-sm-4': cycledetails.escala!=2}">
																						<div class="innerpage-sec">
																							<div class="question-section">
																								<div class="quest_descript">
																								{{ valore.description }}
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="col-sm-7" ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
																						{{questionerio={id:valore.id, id_pergunta:valore.id, score:valore.score, descricao:valore.descricao};""}}
																						<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
																						<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
																						<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
																						<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>

																					</div>
																				</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="col-sm-12" ng-show="activecomponent=='C'">
													<form id="competencias_skills" >
														<div class="dblock eql-height" >
															<div class="dblock_head">
																<h2 class="dheading">{{currentfase.nome_fase}}</h2>
															</div>
															<div class="rst-section-result" >
																<div id="competencias">
																	<div id="newskil">
																		<div class="elo_section">
																			<div class="categorie1_sec" ng-repeat="competencias_row in apprisialcompetencias">
																				<div class="valore_quest_main_sec">
																					<h3><strong>{{ competencias_row.data.name }}</strong></h3>
																					<div ng-repeat="categorywisedata_row in competencias_row.categorywisedata">
																						<h4 ng-if="categorywisedata_row.data.id!=''">{{categorywisedata_row.data.name}}</h4>
																						<div ng-repeat="competencia in categorywisedata_row.competencias">
																							<div class="inner_cate_box">
																							<div class="col-sm-2 elo_cate">
																								<div class="inner_categ_sec">
																								{{ competencia.nome_competencia }}
																								</div>
																							</div>
																							<div class="elo_cate" ng-class="{'col-md-3 col-sm-3': cycledetails.escala==2, 'col-md-4 col-sm-4': cycledetails.escala!=2}">
																								<div class="inner_categ_sec">
																								{{ competencia.descricao_competencia }}
																								</div>
																							</div>
																							</div>
																							<div class="col-sm-7" ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
																								{{questionerio={id:competencia.id_competencia, id_pergunta:competencia.id_competencia, score:competencia.score, descricao:competencia.descricao};""}}
																								<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
																								<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
																								<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
																								<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>
																							</div>
																							<div class="clearfix"></div>
																						</div>
																						<div class="clearfix"></div>
																					</div>
																				</div>
																				<div class="clearfix"></div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="col-sm-12" ng-show="activecomponent=='O'">
													<form id="resaltados_form" >
														<div class="dblock eql-height" >
															<div class="dblock_head">
																<h2 class="dheading">{{currentfase.nome_fase}}</h2>
															</div>
															<div class="rst-section-result" >
																<div class="q_panel open_question" ng-repeat="category in apprisialquestion"  ng-if="apprisialquestion.length>0">
																	<div class="per_head">
																		<div class="survey_q elof_heading categorie1_sec" ng-click="showHideQuestionCategories($event,category.data.id)">
																			<h3>{{ category.data.name }}</h3>
																		</div>
																	</div>
																	<div class="q_panel_data"  ng-repeat="questionerio in category.questions" ng-if="category.questions.length>0">
																		<div class="col-sm-12">
																			<div class="row" ng-if="questionerio.type=='q'" ng-include="'questnariotextQuestion'" ></div>
																			<div class="row" ng-if="questionerio.type=='e'" ng-include="'questnariostarRating'"></div>
																			<div class="row" ng-if="questionerio.type=='c'" ng-include="'questnarioheartRating'"></div>
																			<div class="row" ng-if="questionerio.type=='f'" ng-include="'questnarioFavorStarRating'"></div>
																			<div class="row" ng-if="questionerio.type=='o'" ng-include="'questnariomultipleAnswer'"></div>
																			<div class="row" ng-if="questionerio.type=='g'" ng-include="'questnarioevolucaoAnswer'"></div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																	<!--q_panel_data END-->
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="col-sm-12" ng-show="activecomponent=='T'">
													<form id="potencial_form" >
														<div class="dblock eql-height" >
															<div class="dblock_head">
																<h2 class="dheading">{{currentfase.nome_fase}}</h2>
															</div>
															<div class="rst-section-result" >
																<div class="q_panel open_question" ng-repeat="category in apprisialpotencialsquestion"  ng-if="apprisialpotencialsquestion.length>0">
																	<div class="survey_q non-cate-sec categorie1_sec" ng-click="showHideQuestionCategories($event,category.data.id)">
																		<h3>{{ category.data.name }}</h3>
																		</div>
																	<div class="q_panel_data"  ng-repeat="questionerio in category.questions" ng-if="category.questions.length>0">
																		<div class="col-sm-12">
																			<div class="row" ng-if="questionerio.type=='q'" ng-include="'questnariotextQuestion'" ></div>
																			<div class="row" ng-if="questionerio.type=='e'" ng-include="'questnariostarRating'"></div>
																			<div class="row" ng-if="questionerio.type=='c'" ng-include="'questnarioheartRating'"></div>
																			<div class="row" ng-if="questionerio.type=='f'" ng-include="'questnarioFavorStarRating'"></div>
																			<div class="row" ng-if="questionerio.type=='o'" ng-include="'questnariomultipleAnswer'"></div>
																			<div class="row" ng-if="questionerio.type=='g'" ng-include="'questnarioevolucaoAnswer'"></div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																	<!--q_panel_data END-->
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="col-sm-12" ng-show="activecomponent=='S'">
													<form id="apprisialsurvey_form" >
														<div class="dblock eql-height" >
															<div class="dblock_head">
																<h2 class="dheading">{{currentfase.nome_fase}}</h2>
															</div>
															<div class="rst-section-result" >
																<div class="q_panel open_question" ng-repeat="category in apprisialsurveysquestion"  ng-if="apprisialsurveysquestion.length>0">
																	<div class="survey_q non-cate-sec categorie1_sec" ng-click="showHideQuestionCategories($event,category.data.id)">
																		<h3>{{ category.data.name }}</h3>
																		</div>
																	<div class="q_panel_data"  ng-repeat="questionerio in category.questions" ng-if="category.questions.length>0">
																		<div class="col-sm-12">
																			<div class="row" ng-if="questionerio.type=='q'" ng-include="'questnariotextQuestion'" ></div>
																			<div class="row" ng-if="questionerio.type=='e'" ng-include="'questnariostarRating'"></div>
																			<div class="row" ng-if="questionerio.type=='c'" ng-include="'questnarioheartRating'"></div>
																			<div class="row" ng-if="questionerio.type=='f'" ng-include="'questnarioFavorStarRating'"></div>
																			<div class="row" ng-if="questionerio.type=='o'" ng-include="'questnariomultipleAnswer'"></div>
																			<div class="row" ng-if="questionerio.type=='g'" ng-include="'questnarioevolucaoAnswer'"></div>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																	<!--q_panel_data END-->
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="col-sm-12" ng-show="resultotab==5">
													<div class="dblock ">
														<div class="rst-section no-border pdg15">
															<div class="sml-text">{{ "MEU_PERFIL.FINAL_SCORE" | translate }}</div>
														</div>
														<div class="rst-section-result scroll-height" id="competenciasTb" >
															<div class="espaco">{{ "MEU_PERFIL.EVALUATE_EXPECTATIONS" | translate }}</div>
															<form id="pdi_form" method="post">
																<div class="section_view section_avail-panel">
																	<div class="avaliacao-panel">
																		<div class="ratting-panel">
																			<label class="btn btn-success ratting btn-success-act" ><i class="fa fa-star"></i></span>
																			<input name="geral" type="radio" autocomplete="off" value="1" ng-checked='avalicao.geral==1' required>
																			</label>
																			<span>{{ "MEU_PERFIL.UNSATISFACTORY" | translate }}</span>
																		</div>
																		<div class="ratting-panel">
																			<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avalicao.geral==2}"><i class="fa fa-star"></i></span>
																			<input name="geral" type="radio" autocomplete="off" value="2" ng-checked='avalicao.geral==2' required>
																			</label>
																			<span>{{ "MEU_PERFIL.NEEDS_TO_IMPROVE" | translate }}</span>
																		</div>
																		<div class="ratting-panel">
																			<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avalicao.geral==3}"><i class="fa fa-star"></i></span>
																			<input name="geral" type="radio" autocomplete="off" value="3" ng-checked='avalicao.geral==3' required>
																			</label>
																			<span>{{ "MEU_PERFIL.MEETS" | translate }}</span>
																		</div>
																		<div class="ratting-panel">
																			<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avalicao.geral==4}"><i class="fa fa-star"></i></span>
																			<input name="geral" type="radio" autocomplete="off" value="4" ng-checked='avalicao.geral==4' required>
																			</label>
																			<span>{{ "MEU_PERFIL.MEETS_VERY_WELL" | translate }}</span>
																		</div>
																		<div class="ratting-panel">
																			<label class="btn btn-success ratting btn-success-act" ng-class="{'active':avalicao.geral==5}"><i class="fa fa-star"></i></span>
																			<input name="geral" type="radio" autocomplete="off" value="5" ng-checked='avalicao.geral==5' required>
																			</label>
																			<span>{{ "MEU_PERFIL.EXCEPTIONAL" | translate }}</span>
																		</div>
																		<div class="pdi-textarea">
																			<h3>Use este espaço para descrever uma pouco mais sobre o colaborador.</h3>
																			<div class="form_add_row answer-box">
																				<textarea placeholder="{{ 'MEU_PERFIL.WRITE_YOUR_OBS' | translate }}" name="avaliacao_quali" id="avaliacao_quali"  >{{avalicao.avaliacao_quali}}</textarea>
																			</div>
																		</div>
																		<div class="rg-wrapper bottom-mrg" id="slideControlvalores">
																			<div class="rg-label">{{ 'MEU_PERFIL.VALUES' | translate }}</div>
																			<div class="range-sliders">
																				<input type="text" class="slideControl" ng-model="valore_value" value="{{valore_value}}" name="valorefinal" id="valorefinal"  maxlength="3" />
																			</div>
																		</div>
																		<div class="rg-wrapper" id="slideControlDesempenho">
																			<div class="rg-label">{{ 'MEU_PERFIL.PERFORMANCE' | translate }}</div>
																			<div class="range-sliders">
																				<input type="text" ng-model="desempenho_value" value="{{desempenho_value}}" class="slideControl" name="desempenhofinal" id="desempenhofinal" maxlength="3" />
																			</div>
																		</div>
																		<div class="final-rst" id="final_performance">
																			<div class="final-prf">{{ 'MEU_PERFIL.FINAL_PERFORMANCE_GRADE_LABEL' | translate }}</div>
																			<div class="final-figure" >{{performance}}</div>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
													<!--dblock End-->
												</div>
											</div>
											<div class="dblock avancar-btn">
												<a href="javascript:void(0);" class="apprisialnext" ng-click="nextTab($step)">Avancar <i class="fa fa-forward"></i> </a>
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
		<div ng-show="profiletab==4" id="elotab">
			<div class="row">
				<div class="col-sm-9">
					<div class="dblock" style="background:unset;">
						<div class="show-view_headings" style="background:white; border-bottom:unset; margin:unset;">
							<span>Elos</span>
							<div class="only-my-elos-filter" ng-if="showingOnlyMyElos"><span>Vendo somente elos para mim</span><span class="seeall" ng-click="eloTab()">Ver Todos</span></div>
							<div class="hastag-elos-filter" ng-if="hashtagFilter"><span>Vendo elos com a hashtag <strong class="hashtagHeader">{{hashtagFilter}}</strong></span><span class="seeall" ng-click="eloTab()">Ver Todos</span></div>
						</div>
						<div class="div_class_filter" style="background:white;padding-top:5px; padding-bottom:1px;">
							<div class="elo">
								<div class="dblock_body">
									<div class="babs-2-pabel">
										<form id="form-elo-profile-tab" ng-submit="addElo('form-elo-profile-tab')">
											<div class="sent-notification" style="display: none">
												<span>Que legal! Enviamos o seu El <i class="fa fa-heart"></i>.</span>
												<span ng-if="user.elos_limit > 0 && user.elos_sent_today < user.elos_limit">Você ainda tem <strong>{{ user.elos_limit - user.elos_sent_today}}</strong> restantes hoje.</span>
												<span ng-if="user.elos_limit > 0 && user.elos_sent_today >= user.elos_limit">Você atingiu seu limite de elos por hoje.</span>
											</div>
											<textarea rows="1" ng-enter="testElo()" placeholder="{{ (user.elos_limit == 0 || user.elos_sent_today < user.elos_limit) && 'Marque @alguém e escreva seu elo em seguida...' || 'Você atingiu seu limite de elos por hoje...'}}" class="elo-height"></textarea>
											<button type="submit" ng-disabled="user.elos_limit != 0 && user.elos_sent_today >= user.elos_limit">el<i class="fa fa-heart"></i></button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div style="display: flex; float: right;">
							<div style="margin-top: 32px; margin-right: 15px;">Filtro : </div>
							<div class="filters_view pull-right" style="width:180px;margin-top:20px;">
								<select id="search-tipo" name="tipo" ng-model="searchTipo" ng-change="filterbyTipo();" class="select2 usuario" data-placeholder="Selecione tipo">
									<option value="-1" selected>Todos</option>
									<option value="0">Elogio</option>
									<option value="1" >Objetivo</option>
									<option value="2">Resultado Chave</option>
									<option value="3">Feedback</option>
									<option value="4">Atividades</option>
								</select>
							</div>
						</div>
						<div class="elos-list" style="margin-top:85px;">
							<div ng-repeat="specElo in specEloslist" class="elo-item-group" ng-class="{ new : specElo.lido==0 }">
								<div ng-if="searchTipo == -1 || specElo.tipo.indexOf(searchTipo) > -1" style="font-weight: bold;font-size: 16px;">{{ specElo.date | amUtc | amDateFormat:'DD/MM/YYYY' }}</div>
								<div ng-repeat="elo in specElo.specElos" class="elo-item elo-tipo-{{elo.tipo}}" ng-class="{ new : elo.lido==0 }" style="margin-bottom:30px;margin-top:15px;background:white;border-radius: 8px; box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.09);" ng-if="searchTipo == -1 || elo.tipo == searchTipo">
									<div class="elo-content">
										<div class="user-image">
											<img src="" ng-if="elo.usuario_responsavel.image" ng-src="{{ elo.usuario_responsavel.image }}" class="img-circle" width="40" height="40" data-toggle="tooltip" data-placement="top" title="{{ elo.usuario_responsavel.name }}" />
											<span class="image-replace" ng-if="!elo.usuario_responsavel.image">{{ initials(elo.usuario_responsavel.name) }}</span>
										</div>
										<div class="elo-header">
											<span class="usuario-responsavel">{{elo.usuario_responsavel.name}}</span>
											<span> para </span>
											<span class="usuarios-mencionados" ng-repeat="mentioned in elo.usuarios_mencionados"><span ng-if="!$first && !$last">, </span><span ng-if="$last && elo.usuarios_mencionados.length > 1"> e </span>{{ mentioned.name }}</span>
											<time class="timeago pull-right" datetime="{{ elo.data_atualizacao }}">{{ elo.data_atualizacao | timeAgo}}</time>
										</div>
										<div class="elo-body">
											<div hashtagify term-click="tagTermClick($event)"	user-click="tagUserClick($event)" style="margin-bottom:15px; font-weight: bold;">
												{{ elo.descricao_elogio }}
											</div>
											<div class="blueBox">
												<div ng-if="elo.nome_entidade != null && elo.tipo != 3 && elo.progresso >= 80 " style="width:100%;padding:12px;background:#e2445c;color:white;border-radius:5px; border-radius: 16px;">{{ elo.nome_entidade }}</div>
												<div ng-if="elo.nome_entidade != null && elo.tipo != 3 && elo.progresso >= 50 && elo.progresso < 80" style="width:100%;padding:12px;background:#fdab3d;color:white;border-radius:5px; border-radius: 16px;">{{ elo.nome_entidade }}</div>
												<div ng-if="elo.nome_entidade != null && elo.tipo != 3 && elo.progresso >= 0 && elo.progresso < 50 " style="width:100%;padding:12px;background:#00c975;color:white;border-radius:5px; border-radius: 16px;">{{ elo.nome_entidade }}</div>
												<div ng-repeat="nome_entidade in elo.nome_entidade_array" ng-if="elo.nome_entidade != null && elo.tipo == 3" style="margin-right:10px;">
													<div style="padding:10px;background:#00c975;color:white;border-radius:5px;">{{ elo.nome_entidade.split(';')[$index] }}</div>
												</div>
												<div ng-if="elo.progresso != null" style="text-align:center;width:10%;margin-left:20px;margin-top:12px;font-weight:bold;color:black;">{{ elo.progresso }} %
												</div>
												<!-- <div ng-if="elo.progresso != null" style="margin-left:20px;margin-top:12px;font-weight:bold;">
													Editar
												</div> -->
											</div>
										</div>
										<div class="elo-footer">
											<span class="likes">
												<i class="fa fa-heart" ng-class="{ liked: elo.i_liked>0 }" ng-click="likeElo($event, elo)"></i>{{ elo.total_likes }}
												<span class="like-container">
													<span class="label" ng-if="elo.total_likes!=1" ng-mouseover="showLikes(elo)">curtidas</span>
													<span class="label" ng-if="elo.total_likes==1" ng-mouseover="showLikes(elo)">curtida</span>
													<div class="like-box" ng-if="elo.total_likes > 0">
														<span ng-if="!elo.likes || elo.likes.length == 0">carregando...</span>
														<ul>
															<li ng-repeat="name in elo.likes">{{ name.nome_usuario }}</li>
														</ul>
													</div>
												</span>
											</span>
											<span class="pull-right tipo-desc" ng-if="elo.tipo == 0">Elogios</span>
											<span class="pull-right tipo-desc" ng-if="elo.tipo == 1">Objetivo</span>
											<span class="pull-right tipo-desc" ng-if="elo.tipo == 2">Resultado Chave</span>
											<span class="pull-right tipo-desc" ng-if="elo.tipo == 3 && elo.nome_entidade_array.length == 0">Feedback</span>
											<span class="pull-right tipo-desc" ng-if="elo.tipo == 3 && elo.nome_entidade_array.length > 0">Reconhecimento</span>											<span class="pull-right tipo-desc" ng-if="elo.tipo == 4">Atividades</span>
											<span class="comments">
												<span ng-click="toggleShowComments($event, elo)">
													<i class="fa fa-comment" ng-if="elo.total_comment == 0"></i>
													<i class="fa fa-comment" ng-if="elo.total_comment > 0" style="color:#0553df;"></i>
													{{ elo.total_comment }}
													<span class="label" ng-if="elo.total_comment!=1">comentários</span>
													<span class="label" ng-if="elo.total_comment==1">comentário</span>
												</span>
												<form class="form-elo-comment" ng-submit="commentElo($event, elo)" ng-if="elo.showComments">
													<textarea rows="1" name="comment" placeholder="Digite seu comentário"></textarea>
													<button type="submit"><i class="fa fa-paper-plane"></i></button>
													<div class="clearfix"></div>
												</form>
												<ul class="elo-comment-list" ng-if="elo.showComments">
													<li ng-repeat="comment in elo.comments" class="comment-item"><span class="username">{{comment.username}}</span><span class="comment-text">{{comment.comment_text}}</span></li>
												</ul>
												<div class="load-more" ng-if="elo.hasMoreComments" ng-click="loadMoreComments(elo)">Carregar mais <i class="fa fa-angle-down"></i> </div>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!-- <div ng-repeat="elo in eloslist" class="elo-item" ng-class="{ new : elo.lido==0 }" style="margin-top:30px; background:white;">

								<div class="user-image">
									<img src="" ng-if="elo.usuario_responsavel.image" ng-src="{{ elo.usuario_responsavel.image }}" class="img-circle" width="32" height="32" data-toggle="tooltip" data-placement="top" title="{{ elo.usuario_responsavel.name }}" />
									<span class="image-replace" ng-if="!elo.usuario_responsavel.image">{{ initials(elo.usuario_responsavel.name) }}</span>
								</div>
								<div class="elo-content">
									<div class="elo-header">
										<span class="usuario-responsavel">{{elo.usuario_responsavel.name}}</span> para
										<span class="usuarios-mencionados" ng-repeat="mentioned in elo.usuarios_mencionados"><span ng-if="!$first && !$last">, </span><span ng-if="$last && elo.usuarios_mencionados.length > 1"> e </span>{{ mentioned.name }}</span>
										<time class="timeago pull-right" datetime="{{ elo.data_atualizacao }}">{{ elo.data_atualizacao | timeAgo}}</time>
									</div>
									<div class="elo-body">
										<p hashtagify
											term-click="tagTermClick($event)"
											user-click="tagUserClick($event)">{{ elo.descricao_elogio }}</p>
									</div>
									<div class="elo-footer">
										<span class="likes">
											<i class="fa fa-heart" ng-class="{ liked: elo.i_liked>0 }" ng-click="likeElo($event, elo)"></i>{{ elo.total_likes }}
											<span class="like-container">
												<span class="label" ng-if="elo.total_likes!=1" ng-mouseover="showLikes(elo)">curtidas</span>
												<span class="label" ng-if="elo.total_likes==1" ng-mouseover="showLikes(elo)">curtida</span>
												<div class="like-box" ng-if="elo.total_likes > 0">
													<span ng-if="!elo.likes || elo.likes.length == 0">carregando...</span>
													<ul>
														<li ng-repeat="name in elo.likes">{{ name.nome_usuario }}</li>
													</ul>
												</div>
											</span>
										</span>
										<span class="comments">
											<span ng-click="toggleShowComments($event, elo)">
											<i class="fa fa-comment"></i>{{ elo.total_comment }}
											<span class="label" ng-if="elo.total_comment!=1">comentários</span>
											<span class="label" ng-if="elo.total_comment==1">comentário</span>
											</span>
											<form class="form-elo-comment" ng-submit="commentElo($event, elo)" ng-if="elo.showComments">
												<textarea rows="1" name="comment" placeholder="Digite seu comentário"></textarea>
												<button type="submit"><i class="fa fa-paper-plane"></i></button>
												<div class="clearfix"></div>
											</form>
											<ul class="elo-comment-list" ng-if="elo.showComments">
												<li ng-repeat="comment in elo.comments" class="comment-item"><span class="username">{{comment.username}}</span><span class="comment-text">{{comment.comment_text}}</span></li>
											</ul>
											<div class="load-more" ng-if="elo.hasMoreComments" ng-click="loadMoreComments(elo)">Carregar mais <i class="fa fa-angle-down"></i> </div>
										</span>
									</div>
								</div>
							</div> -->
							<div class="br-section1" on-scroll-to-bottom="loadMoreElos()" ng-show="loadingElos" style=" text-align: center; margin-bottom: 10px;"><i class='icon-spinner animate-spin'></i> Carregando</div>
						</div>
					</div>
				</div>
				<?php 
						if($this->session->userdata('okr')=="1"){
					?>
				<div class="col-sm-3">
					<div class="dblock stats">
						<div class="show-view_headings">Estatísticas</div>
						<div class="table-container">
							<table>
								<tr>
									<td>Enviados</td>
									<td class="result">{{elostats.sentCount}}</td>
								</tr>
								<tr>
									<td>Mais recebidos de</td>
									<td class="result">{{elostats.mostFrom}}</td>
								</tr>
								<tr>
									<td>Mais enviados para</td>
									<td class="result">{{elostats.mostTo}}</td>
								</tr>
								<tr>
									<td>Recebidos</td>
									<td class="result">{{elostats.receivedCount}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
					 <?php 
				}
            ?>
				<div class="col-sm-3">
					<div class="dblock stats hashtags">
						<div class="show-view_headings">Top 10 #hashtags</div>
						<div class="table-container">
							<table>
								<tr ng-repeat="hash in elostats.topHashtags">
									<td class="hashclick" ng-click="tagTermClick($event)">{{ hash.hashtag }}</td>
									<td class="result">{{ hash.ocorrencia }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div ng-show="profiletab==5" id="carreertab" >
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
								<?php
if ($this->session->userdata('performance_pessoal') == 1) {?>
								<li class="active" ng-if="user.admin == 'true' || !carrer_user_id || user.id == carrer_user_id" ng-click="openSubCareerBlock('performance')">
									<a href="#tab_Performance" data-toggle="tab">Performance Pessoal</a>
								</li>
								<?php }?>
								<li ng-click="refreshCareerBlock()" class="<?php if ($this->session->userdata('performance_pessoal') != 1) {echo 'active';}?>">
									<a href="#tab_Objetivos" data-toggle="tab">Objetivos</a>
								</li>
								<?php
if ($this->session->userdata('crossfeed') == 1) {?>
								<li ng-if="user.my_carreer == 1" ng-click="refreshCareerBlock()">
									<a href="#tab_Crossfeeds" data-toggle="tab">Crossfeeds</a>
								</li>
								<?php
}
?>
								<li  ng-if="user.activities == 1" ng-click="refreshCareerBlock()" >
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
													<img src=""  ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="36" height="36" style="min-width: 36px; min-height: 36px; float:left; margin-right:15px;" data-toggle="tooltip" data-placement="top" title="{{ user.name }}" />
													<span class="image-replace" ng-if="!user.image" style="min-width: 36px; min-height: 36px; border-radius: 36px; padding: 4px; margin-right: 15px; float: left;">{{ initials(user.name) }}</span>

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
if ($this->session->userdata('performance_pessoal') == 1) {echo 'active';}?>" id="tab_Performance">
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
										<div class="col-md-12" ng-if=" 	(!(scoresFromCycle ||
																		(valoresFromUsuarioByCycle && valoresFromUsuarioByCycle.length > 0) ||
																		(potencialFromUsuarioByCycle && potencialFromUsuarioByCycle.length > 0) ||
																		(resultadoFromUsuarioByCycle && resultadoFromUsuarioByCycle.length > 0) ||
																		(competenciaFromUsuarioByCycle && competenciaFromUsuarioByCycle.length > 0) ||
																		(outraetapaFromUsuarioByCycle && outraetapaFromUsuarioByCycle.length > 0) ) ) && (allCycles && allCycles.length > 0)"
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
															<td ng-click="openValuesComents(val.id_valores, 2, $index)" ng-if="score_2_visibility">{{val.score_2 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
															<td ng-click="openValuesComents(val.id_valores, 1, $index)" ng-if="score_1_visibility">{{val.score_1 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
															<td ng-click="openValuesComents(val.id_valores, 3, $index)" ng-if="score_3_visibility">{{val.score_3 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
															<td ng-click="openValuesComents(val.id_valores, 4, $index)" ng-if="score_4_visibility">{{val.score_4 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
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
																<td ng-click="openPotencialComents(val.id_pergunta, 2)" ng-if="potencial_2_visibility">{{val.score_2 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
																<td ng-click="openPotencialComents(val.id_pergunta, 1)" ng-if="potencial_1_visibility">{{val.score_1 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
																<td ng-click="openPotencialComents(val.id_pergunta, 3)" ng-if="potencial_3_visibility">{{val.score_3 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
																<td ng-click="openPotencialComents(val.id_pergunta, 4)" ng-if="potencial_4_visibility">{{val.score_4 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
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
															<td ng-click="openResultadoComents(val.id_pergunta, 2, $index, $event)" ng-if="resultado_2_visibility">{{val.score_2 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
															<td ng-click="openResultadoComents(val.id_pergunta, 1, $index, $event)" ng-if="resultado_1_visibility">{{val.score_1 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
															<td ng-click="openResultadoComents(val.id_pergunta, 3, $index, $event)" ng-if="resultado_3_visibility">{{val.score_3 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
															<td ng-click="openResultadoComents(val.id_pergunta, 4, $index, $event)" ng-if="resultado_4_visibility">{{val.score_4 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
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
															<td ng-click="openCompetenciaComents(val.id_competencia, 2, $index)" ng-if="competencia_2_visibility">{{val.score_2 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
															<td ng-click="openCompetenciaComents(val.id_competencia, 1, $index)" ng-if="competencia_1_visibility">{{val.score_1 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
															<td ng-click="openCompetenciaComents(val.id_competencia, 3, $index)" ng-if="competencia_3_visibility">{{val.score_3 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
															<td ng-click="openCompetenciaComents(val.id_competencia, 4, $index)" ng-if="competencia_4_visibility">{{val.score_4 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
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
													<div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> {{ outraetapaFromUsuarioByCycle[0].nome_fase }}</div>
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
																<td ng-click="openOutraEtapaComents(val.id_pergunta, 2)" ng-if="outraetapa_2_visibility">{{val.score_2 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_2 == 0}"></i></td>
																<td ng-click="openOutraEtapaComents(val.id_pergunta, 1)" ng-if="outraetapa_1_visibility">{{val.score_1 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_1 == 0}"></i></td>
																<td ng-click="openOutraEtapaComents(val.id_pergunta, 3)" ng-if="outraetapa_3_visibility">{{val.score_3 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_3 == 0}"></i></td>
																<td ng-click="openOutraEtapaComents(val.id_pergunta, 4)" ng-if="outraetapa_4_visibility">{{val.score_4 | number:2}} <i class="fa fa-comment" ng-class="{'no-comment':val.numComentarios_4 == 0}"></i></td>
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
if ($this->session->userdata('performance_pessoal') != 1) {echo 'active';}?>" id="tab_Objetivos">
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
													<div class="carrier_panel clearfix hover-cls" ng-if="career_details.dp_goals.length>0" ng-repeat="goal in career_details.dp_goals" ng-click="get_goal_details_by_id(goal.id_dp_objetivo)">
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
														<div class="carrier_block_body section_meta_{{goal.id_dp_objetivo}}" ng-if="goal.meta.length>0" ng-repeat="meta_data in goal.meta" style="cursor: pointer;">
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
																				<select id="cargo_objevio_rht" name="cargo_objevio_rht" class="form-control" ng-model="CargosNotAddedSelected" ng-options="cargo.name for cargo in CargosNotAdded track by cargo.id" ng-disabled="CargoNotAddedSelected.length>=1"></select>
																				<span class="corresponsaveis-selected" ng-repeat="selected in CargoNotAddedSelected" ng-click="removeCargoAndRefresh(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="cargos[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
																				<p ng-if="CargoNotAddedSelected.length>0">Descrição :- {{ CargoNotAddedSelected[0].description }}</p>
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
															<span class="frm_lbl" ng-if="goal_details.meta.length>0">&nbsp;</span>
															<div class="row" ng-if="goal_details.meta.length>0" ng-repeat="meta in goal_details.meta">
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
																						<input  class="form-control border-effect " type="text" placeholder="Nome da Atividade" name="activity_name_added[{{activity.id}}][name]"  id="activity_name_added_{{activity.id}}" value="{{activity.name}}" ng-blur="updateactivityDp(activity.id,'name')">
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
																							<input  class="form-control  border-effect fix-wd data" type="text" placeholder="Prazo" value="{{activity.activity_end}}" name="activity_name_added[{{activity.id}}][end_date]" id="activity_date_added_{{activity.id}}" ng-blur="updateactivityDp(activity.id,'date')">
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
								<div class="tab-pane  fade in " id="tab_Crossfeeds" ng-if="user.admin == 'true' || !carrer_user_id  || user.id == carrer_user_id" >
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
													<div class="carrier_panel clearfix hover-cls" ng-if="carreers.length>0" ng-repeat="carreer in carreers">
														<div class="elofy_table_row db_obj" >
															<div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
																<div class="feed_name">Solicitados  para:</div>
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
																<span class="usr_teams"  ng-if="viewFullCrossfeed">Time: {{ carreer.team }}</span>
															</div>
															<div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
																<div class="right-feed-col">
																	<div class="feed-time"  ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}} </div>
																	<span >
																	<a href="javascript:void(0)" ng-if="carreer.situation == 1 " class="finalizado-btn clr-green ng-scope">Finalizado</a>
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
													<div class="carrier_panel clearfix hover-cls" ng-if="received_carreers.length>0" ng-repeat="carreer in received_carreers">
														<div class="elofy_table_row db_obj" >
															<div ng-class="{'col-md-5':viewFullCrossfeed,'col-md-7':!viewFullCrossfeed}" ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
																<div class="feed_name">Recebido de : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
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
																<span class="usr_teams" ng-if="viewFullCrossfeed">Time: {{ carreer.team }}</span>
															</div>
															<div ng-class="{'col-md-3':viewFullCrossfeed,'col-md-2':!viewFullCrossfeed}">
																<div class="right-feed-col">
																	<div class="feed-time" ng-if="viewFullCrossfeed">{{carreer.posted_date | amUtc | amTimeAgo:true}} </div>
																	<span ng-click="showDevelopmentUpdate(carreer.id_feedback,carreer.feedback_type)">
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
																			<option value="{{searchuser.id}}" ng-repeat="searchuser in users" >{{ searchuser.name }} </option>
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
																		<p ng-repeat="question in devQuestions">{{$index+1}}. {{question.question}}</p>
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
																			<option value="{{searchuser.id}}" ng-repeat="searchuser in users" >{{ searchuser.name }} </option>
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
																<div class="row" ng-if="(user.id !=dev_data[0].id_usuario_solicitante) && dev_data[0].situacao == 0 && dev_data[0].expired == false">
																	<div class="col-md-12">
																		<div class="form-group activity_custom">
																			<label>O prazo inserido para a sua resposta é...</label>
																			<input name="feedback_deadline" ng-if="!showViewModel" id="feedback_deadline_reply" ng-model="feedback_deadline" type="text" class="form-control data" >
																			<div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_deadline | amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
																		</div>
																	</div>
																</div>
																<div class="row" ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && dev_data[0].situacao == 0">
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
																			<div class="viewupdateanswer_dp" ng-if="showViewModel">{{feedback_deadline | amUtc | amDateFormat:'DD/MM/YYYY'}}</div>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row" ng-if="!showViewModel">
																<div class="col-md-12">
																	<div class="form-group activity_custom">
																		<label>Esse Crossfeed foi solicitado a...</label>
																		<div class="viewupdateanswer_dp" >{{posted_date | amUtc | amTimeAgo:true}} ago</div>
																	</div>
																</div>
															</div>

															<input name="id_questionario_dev" id="id_questionario_dev" value="{{id_questionario_dev}}" ng-model="id_questionario_dev" type="hidden" class="form-control" >
															<input name="id_feedback_dev" id="id_feedback_dev" value="{{id_feedback_dev}}" ng-model="id_feedback_dev" type="hidden" class="form-control" >
															<input name="id_feedback_destino" id="id_feedback_destino" value="{{id_feedback_destino}}" ng-model="id_feedback_destino" type="hidden" class="form-control" >
															<div class="row" ng-if="dev_data[0].situacao == 0  && dev_data[0].expired == false && devAuthorised">
																<div class="col-md-12">
																	<div class="form-group">
																		<label>Resposta</label>
																		<textarea name="feedback_resposta" id="feedback_resposta" class="form-control" rows="3" style="min-height: 60px;" ng-model="feedback_resposta"></textarea>
																	</div>
																</div>
															</div>
															<div class="row"  ng-if="dev_data[0].situacao == 1 ">
																<div class="col-md-12">
																	<div class="form-group activity_custom">
																		<label>A resposta de {{destination_user}} para o seu motivo é:</label>
																		<div class="viewupdateanswer_dp" ng-if="showViewModel">{{user_response}}</div>
																	</div>
																</div>
															</div>
															<div class="row" ng-repeat="questionerio in devquestions" ng-if="devquestions.length>0 && dev_data[0].situacao == 0  && dev_data[0].expired == false && devAuthorised">
																<div class="col-md-12" ng-if="questionerio.type=='q'" ng-include="'devtextQuestion'"></div>
																<div class="col-md-12" ng-if="questionerio.type=='e'" ng-include="'devstarRating'"></div>
																<div class="col-md-12" ng-if="questionerio.type=='c'" ng-include="'devheartRating'"></div>
																<div class="col-md-12" ng-if="questionerio.type=='o'" ng-include="'devmultipleAnswer'"></div>
															</div>
															<div class="row" ng-repeat="question in view_questions" ng-if="view_questions.length>0  && dev_data[0].situacao == 1 ">
																<div class="col-md-12" ng-if="question.type=='q'" ng-include="'viewdevtextQuestion'"></div>
																<div class="col-md-12" ng-if="question.type=='e'" ng-include="'viewdevstarRating'"></div>
																<div class="col-md-12" ng-if="question.type=='c'" ng-include="'viewdevheartRating'"></div>
																<div class="col-md-12" ng-if="question.type=='o'" ng-include="'viewdevmultipleAnswer'"></div>
															</div>
															<div class="row" ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)">
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
															<div class="row" ng-if="dev_data[0].situacao == 1 ">
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
															<button  ng-if="(user.id ==dev_data[0].id_usuario_solicitante) && (dev_data[0].situacao == 1) && (dev_data[0].public == 0 && dev_data[0].private == 0)" type="button" class="btn btn-primary save" ng-click="updateFeedbackPrivacyStatus(dev_data[0].id)">Salvar</button>
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
												<div class="dblock_body carrier_block" id="carrier_block_hgt_activities">
													<div class="carrier_panel clearfix hover-cls" ng-if="activities_career.length>0" ng-repeat="activity in activities_career" ng-click="activity_details_career(activity.id)">
														<div class="elofy_table_row db_obj">
															<div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
																<span ng-if="activity.coresponsavel ==1" class="corresponsavelcircle"></span>
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
																<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ activity.tatic_id }}/{{ activity.key_id }}/{{ activity.id }}"><i class="fa fa-link"></i></a>
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
		<div ng-show="profiletab==6" id="activitiestab" class="div_activity">
			<div class="row">
				<div class="col-sm-12">
					<div class="dblock container">
						<div class="row info_label">
							<p >Resumo</p>
						</div>
						<div class="row">
							<div class="col-md-3" style="padding-left: 20px;padding-right: 0px !important;">
								<div class="activity_box" style="padding-left: 30px;padding-right: 30px;" ng-click="filterBox(1)">
									<img src="<?php echo base_url(); ?>assets/img/activities/finalized.png">
									<div class="box-content">
										<h1>{{activityCountsForFinished}}</h1>
										<p>Finalizada</p>
									</div>
								</div>
							</div>
							<div class="col-md-3" style="padding-left: 20px;padding-right: 0px;">
								<div class="activity_box" ng-click="filterBox(2)">
									<img src="<?php echo base_url(); ?>assets/img/activities/progress.png">
									<div class="box-content">
										<h1>{{activityCountsForProgress}}</h1>
										<p>Em progresso</p>
									</div>
								</div>
							</div>
							<div class="col-md-3" style="padding-left: 20px;padding-right: 0px;">
								<div class="activity_box" ng-click="filterBox(3)">
									<img src="<?php echo base_url(); ?>assets/img/activities/pending.png">
									<div class="box-content">
										<h1>{{activityCountsForNotstart}}</h1>
										<p>Não Iniciada</p>
									</div>
								</div>
							</div>
							<div class="col-md-3" style="padding-left: 20px;padding-right: 20px;">
								<div class="activity_box" ng-click="filterBox(4)">
									<img src="<?php echo base_url(); ?>assets/img/activities/delayed.png">
									<div class="box-content">
										<h1>{{activityCountsForDelayed}}</h1>
										<p>Atrasada</p>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="row info_label">
							<p >Estatisticas</p>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div style="height: 300px; border-radius: 4px; border:1px solid #eee;">
									<canvas id="activityChart2"></canvas>
								</div>
							</div>
						</div>
						<div class="row info_label">
							<span>Atividades</span>
							<span class="all-selector" style="float: right; padding-top: 5px; margin-right: 15px;">
								<div class="container-block">
								  <input type="checkbox" id="chekd_hierarchy" ng-click="hierarchyChecked()">
								  <label for="chekd_hierarchy">Hierarquia</label>
								</div>
							</span>
							<span class="all-selector" style="float: right; padding-top: 5px; margin-right: 15px;">
								<div class="container-block">
								  <input type="checkbox" id="chekd_finished" ng-click="finishedChecked()">
								  <label for="chekd_finished">Exibir concluídas</label>
								</div>
							</span>
						</div>
						<div class="row">
							<div class="buttons pull-right" style="margin-right: 15px;">
								<form class="form-inline" ng-submit="filterActivity()">
									<div class="form-group">
					                    <label >Período de Tempo:</label>
					                </div>
					                <div class="form-group" style="width:150px;">
					                    <select class="filter_time" data-native="true" data-text="" ng-options="ftime for ftime in ftimes" ng-model="selectedftime"></select>
					                </div>
									<div class="clr_filters activities_filter form-group">
										<a href="javascript:void(0)" class="clean_filter" ng-click="activitiesTab(0)">Limpar Filtros</a>
										<button type="submit" class="apply_filter button_filter">Aplicar Filtro</button>
									</div>
								</form>
							</div>
							<div class="all-selector filter_team" style="width:15%; display:inline-block;float: right;  margin-right: 15px;">
								<select id="search-team" name="team" class=""  ng-model="selectedTeamNotAddedSearch">
										<option ng-repeat="team in teamsNotAddedSearch" value="{{team.id}}" ng-selected="selectedTeam == team.id">{{team.name}}</option>
								</select>
								<span class="corresponsaveis-selected" ng-repeat="selecteds in teamsNotAddedSelectedSearch" ng-click="removeUserAndRefreshTeamSearch(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="teamssearch[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
							</div>
							<div style="float: right;  margin-right: 10px;">
								<label style="margin-top: 5px;">Time:</label>
							</div>
							<div class="all-selector filter_user" style="display:inline-block;float: right; margin-right: 15px; width: 15%">
								<select id="search-user" name="user" class=""  ng-model="selectedUserNotAddedSearch">
										<option ng-repeat="user in usersNotAddedSearch" value="{{user.id}}" ng-selected="selectedUser == user.id">{{user.name}}</option>
								</select>
								<span class="corresponsaveis-selected" ng-repeat="selecteds in usersNotAddedSelectedSearch" ng-click="removeUserAndRefreshUserSearch(selecteds)"><label>{{selecteds.name}}</label><input type="hidden" value="{{selecteds.id}}" name="userssearch[]" class="form-control" readonly><i class="fa fa-remove"></i></span>
							</div>
							<div style="float: right;  margin-right: 10px;">
								<label style="margin-top: 5px;">Responsável:</label>
							</div>
						</div>
						<div class="row" ng-show="isHierarchy == 1">
							<div ng-class="col-sm-12">
								<div class="block">
									<div class="dblock_body carrier_block" style="overflow-y: auto;max-height: 360px;">
										<div class="hierarchy_content" ng-if="isFinished && activities_hierarchy.length>0" ng-repeat="hierarchy in activities_hierarchy">
											<div class="carrier_panel clearfix removehover" style="border-bottom: 2px solid grey !important;padding-top: 15px;padding-bottom: 7px;">
												<div class="elofy_table_row db_obj">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 93% !important;">
														<div class="ng-binding"><a href="<?php echo base_url() ?>planejamento#!/tatic/{{ hierarchy.content[0].tatic_id }}/{{ hierarchy.content[0].key_id }}/{{ hierarchy.content[0].id }}" style="font-size: 14px;color: black;font-weight: bold;">{{hierarchy.obj}}</a></div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-10 pdl-30" style="width: 5% !important;">
														<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ hierarchy.content[0].tatic_id }}/{{ hierarchy.content[0].key_id }}/{{ hierarchy.content[0].id }}"><i class="fa fa-link"></i></a>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="carrier_panel clearfix removehover" style="padding-top: 15px;padding-bottom: 15px;">
												<div class="elofy_table_row db_obj">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 75% !important;">
														<div class="ng-binding" style="font-size: 12px;color: black;">{{hierarchy.key}}</div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 25% !important;">
														<div class="progress_wrap">
															<span class="ng-binding push-right">{{hierarchy.percent}}%</span>
															<div class="progress" style="margin-right: 10px;">
																<div class="progress-bar" role="progressbar" style="width: {{hierarchy.percent}}%;" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="carrier_panel clearfix removehover" ng-repeat="hContent in hierarchy.content">
												<div class="elofy_table_row db_obj filter_hierarchy_div">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30 filter_hierarchy_title" style="width: 58% !important;">
														<div class="carrier_row" ng-click="showProgressModal(hContent, $event);">
															<svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
																<polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
															</svg>
														</div>
														<div class="ng-binding">
															<img ng-if="hContent.url_image" src="<?php echo base_url() ?>{{hContent.url_image}}" width="30px" height="30px" style="border-radius: 50%;">
															<span style="padding-left: 15px;">{{hContent.title}}</span>
														</div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-15 filter_hierarchy_date" style="width: 15% !important;">
														<div class="ng-binding"><span style="padding-left: 10px;">{{hContent.fim}}</span></div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 15% !important;">
														<div class="ng-binding">
														<strong ng-if="hContent.situacao == 0">Não Iniciada</strong>
														<strong ng-if="hContent.situacao == 1">Finalizada</strong>
														<strong ng-if="hContent.situacao == 2">Em andamento</strong>
														<strong ng-if="hContent.situacao == 3">Cancelada</strong>
														</div>
													</div>
													<div class="Dvtab_colums_dv width-15 clm_main filter_hierarchy_progress" style="width: 5% !important;">
														<div class="ng-binding"><span style="padding-left: 10px;">{{hContent.percentage}}%</span></div>
													</div>
													<div class="Dvtab_colums_dv clm_main filter_hierarch_dot" style="padding-left:40px;width: 1% !important">
														<span ng-if="hContent.coresponsavel ==1" class="corresponsavelcircle"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="hierarchy_notcontent" ng-if="isFinished && !activities_hierarchy.length" >
											<div class="carrier_panel clearfix removehover">
												<div class="elofy_table_row db_obj">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
														<div class="ng-binding">Não foram encontradas atividades</div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="hierarchy_content" ng-if="!isFinished && notFinished_hierarchy.length>0" ng-repeat="hierarchy in notFinished_hierarchy">
											<div class="carrier_panel clearfix removehover" style="border-bottom: 2px solid grey !important;padding-top: 15px;padding-bottom: 7px;">
												<div class="elofy_table_row db_obj">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 93% !important;">
														<div class="ng-binding"><a href="<?php echo base_url() ?>planejamento#!/tatic/{{ hierarchy.content[0].tatic_id }}/{{ hierarchy.content[0].key_id }}/{{ hierarchy.content[0].id }}" style="font-size: 14px;color: black;font-weight: bold;">{{hierarchy.obj}}</a></div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-10 pdl-30" style="width: 5% !important;">
														<a href="<?php echo base_url() ?>planejamento#!/tatic/{{ hierarchy.content[0].tatic_id }}/{{ hierarchy.content[0].key_id }}/{{ hierarchy.content[0].id }}"><i class="fa fa-link"></i></a>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="carrier_panel clearfix removehover" style="padding-top: 15px;padding-bottom: 15px;">
												<div class="elofy_table_row db_obj">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 75% !important;">
														<div class="ng-binding" style="font-size: 12px;color: black;">{{hierarchy.key}}</div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 25% !important;">
														<div class="progress_wrap">
															<span class="ng-binding push-right">{{hierarchy.percent}}%</span>
															<div class="progress" style="margin-right: 10px;">
																<div class="progress-bar" role="progressbar" style="width: {{hierarchy.percent}}%;" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="carrier_panel clearfix removehover" ng-repeat="hContent in hierarchy.content">
												<div class="elofy_table_row db_obj filter_hierarchy_div">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30 filter_hierarchy_title" style="width: 58% !important;">
														<div class="carrier_row" ng-click="showProgressModal(hContent, $event)">
															<svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
																<polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
															</svg>
														</div>
														<div class="ng-binding">
															<img ng-if="hContent.url_image" src="<?php echo base_url() ?>{{hContent.url_image}}" width="30px" height="30px" style="border-radius: 50%;"><span style="padding-left: 15px;">{{hContent.title}}</span>
														</div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-15 filter_hierarchy_date" style="width: 15% !important;">
														<div class="ng-binding"><span style="padding-left: 10px;">{{hContent.fim}}</span></div>
													</div>
													<div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 15% !important;">
														<div class="ng-binding">
														<strong ng-if="hContent.situacao == 0">Não Iniciada</strong>
														<strong ng-if="hContent.situacao == 1">Finalizada</strong>
														<strong ng-if="hContent.situacao == 2">Em andamento</strong>
														<strong ng-if="hContent.situacao == 3">Cancelada</strong>
														</div>
													</div>
													<div class="Dvtab_colums_dv width-15 clm_main filter_hierarchy_progress" style="width: 5% !important;">
														<div class="ng-binding"><span style="padding-left: 10px;">{{hContent.percentage}}%</span></div>
													</div>
													<div class="Dvtab_colums_dv clm_main filter_hierarch_dot" style="padding-left:40px;width: 1% !important">
														<span ng-if="hContent.coresponsavel ==1" class="corresponsavelcircle"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="hierarchy_notcontent" ng-if="!isFinished && !notFinished_hierarchy.length" >
											<div class="carrier_panel clearfix removehover">
												<div class="elofy_table_row db_obj">
													<div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
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
						<div class="row" ng-show="isHierarchy == 0" ng-if="user.activities == 1">
							<div ng-class="col-sm-12">
								<div class="dblock">
									<div class="dblock_body carrier_block" id="carrier_block_hgt_activities" style="overflow-y: auto;max-height: 360px;">
										<div class="carrier_panel clearfix removehover" ng-if="activities_list.length>0" ng-repeat="activity in activities_list" ng-show="isFinished || !(activity.situacao == 1 || activity.situacao == 3)">
											<div class="elofy_table_row db_obj">
												<div class="Dvtab_colums_dv clm_main width-30 pdl-30" style="width: 50% !important;">
													<div class="carrier_row" ng-click="showProgressModal(activity, $event)">
														<svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32">
															<polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
														</svg>
													</div>
													<div class="ng-binding">
														<img ng-if="activity.url_image" src="<?php echo base_url() ?>{{activity.url_image}}" width="28px" height="28px" style="border-radius: 50%;"><span style="padding-left: 15px;">{{activity.title}}</span>
													</div>
												</div>
												<div class="Dvtab_colums_dv clm_main width-15 pdl-30" >
													<div class="ng-binding">{{activity.fim}}</div>
												</div>
												<div class="Dvtab_colums_dv clm_main width-15 pdl-30" >
													<div class="ng-binding">
													<strong ng-if="activity.situacao == 0">Não Iniciada</strong>
													<strong ng-if="activity.situacao == 1">Finalizada</strong>
													<strong ng-if="activity.situacao == 2">Em andamento</strong>
													<strong ng-if="activity.situacao == 3">Cancelada</strong>
													</div>
												</div>
												<div class="Dvtab_colums_dv clm_main width-15 pdl-30" style="width: 7% !important;">
													<div class="ng-binding"><span style="padding-left: 10px;">{{activity.percentage}}%</span></div>
												</div>
												<div class="Dvtab_colums_dv clm_main pdl-30" style="width: 1% !important;padding-left:30px;">
													<span ng-if="activity.coresponsavel ==1" class="corresponsavelcircle"></span>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="carrier_panel clearfix hover-cls" ng-if="!activities_list.length" >
											<div class="elofy_table_row db_obj">
												<div class="Dvtab_colums_dv clm_main width-30 pdl-30" >
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

	<div class="modal fade in" id="newUpdateModal">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Atualização</h4>
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
								<div class="col-md-12" >
									<div class="customs_labels"><strong>Não foram encontradas perguntas.</strong></div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="footer_box">
								<div class="left_footers" >
									<div class="button_sets" ng-if="questions[0].length>0">
										<div class="button_bar">
											<label for="1s">
											<input type="radio" id="1s" name="public" value="1" checked />
											<span>Público</span>
											</label>
										</div>
										<div class="button_bar">
											<label for="2s">
											<input type="radio" id="2s" name="public" value="0">
											<span>Privado &nbsp; <i class="fa fa-lock"></i></span>
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
							<div class="customs_labels bottom-space">
												<div class="col-md-8">
													<div class="update-label">
														 <label>{{questionerio.question}}</label>
													 </div>
												 </div>
												 
												<div class="col-md-4">
													<div class="obj-select">
													 <?php 
									if($this->session->userdata('okr')=="1"){
									?>
													 <select class="objectives_updates" data-question-id="{{questionerio.id_pergunta}}" >
														<option value="">Vincule Objetivos</option>
														<option ng-repeat="tatic in updateprofiletatics" value="{{tatic.id}}">{{tatic.title}}</option>
													</select>
																	 <?php 
									}
									?>
													</div>
												</div>
							</div>
							<input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
							<textarea name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Descreva sua resposta aqui" class="mb0"></textarea>
							<div class="clear h-10"></div>
								 <?php 
									if($this->session->userdata('okr')=="1"){
									?>
							<div class="obj-goals" ng-if="questions_goals_array[questionerio.id_pergunta].length>0">
								<div class="form-group mb0">
								  <label class="control-label">Objetivos Vinculados</label>
								</div>
								<div ng-repeat="addgoal in questions_goals_array[questionerio.id_pergunta]">
									<div>
										<input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][goals][]" value="{{addgoal.tatic_id}}">
										<div class="right_description">
											<span>{{addgoal.title}}</span>
										</div>
										<a href="" class="btn btn-link btn-sm noshadow dropdown-toggle right-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<i class="icon-ellipsis-vert"></i>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:void(0);" ng-click="deletequestiongoal(addgoal.tatic_id,addgoal.question_id)">Deletar</a>
											</li>
										</ul>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
								 <?php 
									}
								?>
						</script>
						<script type="text/ng-template" id="multipleAnswer">
							<label>{{questionerio.question}}</label>
								 <?php 
										if($this->session->userdata('okr')=="1"){
									?>
							<div class="obj-select">
							 <select class="objectives_updates" data-question-id="{{questionerio.id_pergunta}}" >
								<option value="">Vincule Objetivos</option>
								<option ng-repeat="tatic in updateprofiletatics" value="{{tatic.id}}">{{tatic.title}}</option>
							</select>
								
							</div>
							<?php 
										}
										?>
							<div class="model_ch">
								<div class="model_che" ng-repeat="answer in questionerio.options">
									<input type="radio" name="answers[multiresponse_answer][{{questionerio.id_pergunta}}][answers]"  autocomplete="off" ng-value="answer.id" id="ch{{ answer.id }}">
									<label for="ch{{ answer.id }}"> {{answer.answer}}</label>
								</div>
								<div class="clear h-10"></div>
								<div class="obj-goals" ng-if="questions_goals_array[questionerio.id_pergunta].length>0">
									<div class="form-group mb0">
									  <label class="control-label">Objetivos Vinculados</label>
									</div>
									<div ng-repeat="addgoal in questions_goals_array[questionerio.id_pergunta]">
										<div>
											<input type="hidden" name="answers[multiresponse_answer][{{questionerio.id_pergunta}}][goals][]" value="{{addgoal.tatic_id}}">
											<div class="right_description">
												<span>{{addgoal.title}}</span>
											</div>
											<a href="" class="btn btn-link btn-sm noshadow dropdown-toggle right-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												<i class="icon-ellipsis-vert"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:void(0);" ng-click="deletequestiongoal(addgoal.tatic_id,addgoal.question_id)">Deletar</a>
												</li>
											</ul>
										</div>
										<div class="clear"></div>
									</div>
								<div class="clear"></div>
								</div>
							</div>
						</script>
						<script type="text/ng-template" id="starRating">
							<div class="custom_label_dv">
								<label>{{questionerio.question}}</label>
								<input type="hidden" name="answers[rating_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
								<div class="custom_radio_lable">
									<label for="sm_rad_{{questionerio.id_pergunta}}_1">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="sm_rad_{{questionerio.id_pergunta}}_1" ng-click="getStarValue(questionerio.id_pergunta,1)">
										<span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="sm_rad_{{questionerio.id_pergunta}}_2">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="sm_rad_{{questionerio.id_pergunta}}_2" ng-click="getStarValue(questionerio.id_pergunta,2)">
										<span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="sm_rad_{{questionerio.id_pergunta}}_3">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="sm_rad_{{questionerio.id_pergunta}}_3" ng-click="getStarValue(questionerio.id_pergunta,3)">
										<span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="sm_rad_{{questionerio.id_pergunta}}_4">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="sm_rad_{{questionerio.id_pergunta}}_4" ng-click="getStarValue(questionerio.id_pergunta,4)">
										<span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="sm_rad_{{questionerio.id_pergunta}}_5">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="sm_rad_{{questionerio.id_pergunta}}_5" ng-click="getStarValue(questionerio.id_pergunta,5)">
										<span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									<label for="sm_rad_{{questionerio.id_pergunta}}_6">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6" id="sm_rad_{{questionerio.id_pergunta}}_6" ng-click="getStarValue(questionerio.id_pergunta,6)">
										<span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									<label for="sm_rad_{{questionerio.id_pergunta}}_7">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7" id="sm_rad_{{questionerio.id_pergunta}}_7" ng-click="getStarValue(questionerio.id_pergunta,7)">
										<span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									<label for="sm_rad_{{questionerio.id_pergunta}}_8">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8" id="sm_rad_{{questionerio.id_pergunta}}_8" ng-click="getStarValue(questionerio.id_pergunta,8)">
										<span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									<label for="sm_rad_{{questionerio.id_pergunta}}_9">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9" id="sm_rad_{{questionerio.id_pergunta}}_9" ng-click="getStarValue(questionerio.id_pergunta,9)">
										<span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									<label for="sm_rad_{{questionerio.id_pergunta}}_10">
										<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10" id="sm_rad_{{questionerio.id_pergunta}}_10" ng-click="getStarValue(questionerio.id_pergunta,10)">
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
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="smhr_rad21_{{questionerio.id_pergunta}}_1" ng-click="getHeartValue(questionerio.id_pergunta,1)">
										<span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="smhr_rad22_{{questionerio.id_pergunta}}_2">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="smhr_rad22_{{questionerio.id_pergunta}}_2" ng-click="getHeartValue(questionerio.id_pergunta,2)">
										<span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="smhr_rad23_{{questionerio.id_pergunta}}_3">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="smhr_rad23_{{questionerio.id_pergunta}}_3" ng-click="getHeartValue(questionerio.id_pergunta,3)">
										<span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="smhr_rad24_{{questionerio.id_pergunta}}_4">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="smhr_rad24_{{questionerio.id_pergunta}}_4" ng-click="getHeartValue(questionerio.id_pergunta,4)">
										<span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="smhr_rad25_{{questionerio.id_pergunta}}_5">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="smhr_rad25_{{questionerio.id_pergunta}}_5" ng-click="getHeartValue(questionerio.id_pergunta,5)">
										<span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
									</label>
								</div>
									<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
										<label for="smhr_rad25_{{questionerio.id_pergunta}}_6">
											<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6"  id="smhr_rad25_{{questionerio.id_pergunta}}_6" ng-click="getHeartValue(questionerio.id_pergunta,6)">
											<span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
										<label for="smhr_rad25_{{questionerio.id_pergunta}}_7">
											<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7"  id="smhr_rad25_{{questionerio.id_pergunta}}_7" ng-click="getHeartValue(questionerio.id_pergunta,7)">
											<span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
										<label for="smhr_rad25_{{questionerio.id_pergunta}}_8">
											<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8"  id="smhr_rad25_{{questionerio.id_pergunta}}_8" ng-click="getHeartValue(questionerio.id_pergunta,8)">
											<span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
										<label for="smhr_rad25_{{questionerio.id_pergunta}}_9">
											<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9"  id="smhr_rad25_{{questionerio.id_pergunta}}_9" ng-click="getHeartValue(questionerio.id_pergunta,9)">
											<span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
										</label>
									</div>
									<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
										<label for="smhr_rad25_{{questionerio.id_pergunta}}_10">
											<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10"  id="smhr_rad25_{{questionerio.id_pergunta}}_10" ng-click="getHeartValue(questionerio.id_pergunta,10)">
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
	<div class="modal fade in" id="delete-dpactivity-modal">
		<div class="modal-dialog">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Excluir Atividade</h4>
			</div>
			<div class="modal-body">
				<div class="form">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<p style="font-size:15px">Você tem certeza que deseja excluir essa atividade?</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary" id="performTaskActivity">Ok</button>
			</div>
		</div>
	</div>
	<div class="modal fade in" id="delete-objective-modal">
		<div class="modal-dialog">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Excluir Objetivo</h4>
			</div>
			<div class="modal-body">
				<div class="form">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<p style="font-size:15px">Você tem certeza que deseja excluir esse objetivo?</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary" id="performTaskObjective">Ok</button>
			</div>
		</div>
	</div>
	<div class="popup-tab-panel">
		<div class="modal fade" id="modal-user" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<h4 class="modal-title">Edite seu perfil</h4>
					</div>
					<div class="modal-body modal-body-popup">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="tab" role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist" style="margin-top:0px">
											<li role="presentation" class="tab-popups active"><a href="#sectionfirst1" aria-controls="home" role="tab" data-toggle="tab">Editer Perfil</a></li>
											<li class="tab-popups" role="presentation"><a href="#Sectionsecond2" aria-controls="profile" role="tab" data-toggle="tab">Mudar senha</a></li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content tabs">
											<div role="tabpanel" class="tab-pane fade in active" id="sectionfirst1">
												<form id="form-user">

													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="user-name" class="control-label">Nome</label>
																<input id="user-name" name="nome" type="text" class="form-control" value="{{ userDetail.name }}">
															</div>
														</div>
													</div>
													<div class="row">

														<div class="col-md-4">
															<div class="form-group">
															<?php
if ($this->session->userdata('email_google') == null) {?>
																<a href="<?php echo GOOGLE_LOGIN_URL ?>" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/googleplus.png" alt="google" class="loginlogo"><span class="verticleshift"> Connect google account</span> </a>
																<?php } else {?>
																<a href="javascript:void(0)" ng-click="removeSocialAccount('email_google')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/googleplus.png" alt="google" class="loginlogo"><span class="verticleshift"> Disconnect google account</span> </a>
																<?php }?>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<?php
if ($this->session->userdata('email_linkedin') == null) {?>
																<a href="<?php echo base_url('linkedin_login') ?>" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/linkedin.png" alt="google" class="loginlogo"><span class="verticleshift"> Connect linkedin account</span> </a>
																<?php } else {?>
																<a href="javascript:void(0)" ng-click="removeSocialAccount('email_linkedin')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/linkedin.png" alt="linkedin" class="loginlogo"><span class="verticleshift"> Disconnect linkedin account</span> </a>
																<?php }?>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<?php
if ($this->session->userdata('email_slack') == null) {?>
																<a href="https://slack.com/oauth/authorize?client_id=<?php echo SLACK_API_TOKEN ?>&scope=<?php echo SLACK_SCOPE; ?>&redirect_uri=<?php echo SLACK_REDIRECT_URL; ?>" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/slack.png" alt="google" class="loginlogo"><span class="verticleshift"> Connect slack account</span> </a>
																<?php } else {?>
																<a href="javascript:void(0)" ng-click="removeSocialAccount('email_slack')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/slack.png" alt="slack" class="loginlogo"><span class="verticleshift"> Disconnect slack account</span> </a>
																<?php }?>
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
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="descricao_bio" class="control-label" style="padding-top:10px;">Descrição_bio</label>
																<div>
																	<textarea id="descricao_bio" name="descricao_bio" rows="3" class="form-control" placeholder="Digite sua biografia" style="margin: 0px;">{{ userDetail.descricao_bio }}</textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 ">
															<p class="error-message text-danger pull-left hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
															<div class="pull-right">
																<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
																<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="Sectionsecond2">
												<form id="form-user-password" class="modal-content" >
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="current_password" class="control-label">Senha Atual</label>
																<input id="current_password" name="current_password" type="password" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="new_password" class="control-label">Nova Senha</label>
																<input id="new_password" name="new_password" type="password" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="confirm_password" class="control-label">Confirmar nova senha</label>
																<input id="confirm_password" name="confirm_password" type="password" class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<p class="error-message text-danger pull-left hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
															<div class="pull-right">
																<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
																<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="changeUserPassword()">Mudar senha</button>
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
	<div class="modal fade in" id="newSurveyModal">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Pesquisa</h4>
				</div>
				<div class="modal-body modal-body-popup">
					<div class="progress" ng-class="{'hide': survey_questions}" style="margin-top:17px;">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
					<div class="model_bod">
						<form id="new_survey_update" ng-submit="submitNewSurvey()" method="post">
							<input type="hidden" name="questioerio_id" value="{{survey_questions[1]}}">
							<input type="hidden" name="id_pesquisa" value="{{survey_questions[2]}}">
							<div class="row" ng-repeat="questionerio in survey_questions[0]" ng-if="survey_questions[0].length>0">
								<div class="col-md-12" ng-if="questionerio.type=='q'" ng-include="'SurveytextQuestion'"></div>
								<div class="col-md-12" ng-if="questionerio.type=='e'" ng-include="'SurveystarRating'"></div>
								<div class="col-md-12" ng-if="questionerio.type=='c'" ng-include="'SurveyheartRating'"></div>
								<div class="col-md-12" ng-if="questionerio.type=='f'" ng-include="'SurveyFavorStarRating'"></div>
								<div class="col-md-12" ng-if="questionerio.type=='o'" ng-include="'SurveymultipleAnswer'"></div>
							</div>
							<div class="row" ng-if="survey_questions.length<1">
								<div class="col-md-12" >
									<div class="customs_labels"><strong>Não foram encontradas perguntas.</strong></div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="footer_box" style="margin-bottom: 35px;">
								<div class="right_footers">
									<div class="form-group pull-right" >
										<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
										<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar </button>
									</div>
								</div>
							</div>
						</form>
						<script type="text/ng-template" id="SurveytextQuestion">
							<div class="customs_labels bottom-space">
							<div class="col-md-12">
							<div class="update-label">
							<label>{{questionerio.question}}</label>
							</div>
							</div>
							</div>
							<input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
							<textarea name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Descreva sua resposta aqui" class="mb0"></textarea>
							<div class="clear h-10"></div>
						</script>
						<script type="text/ng-template" id="SurveymultipleAnswer">
							<label>{{questionerio.question}}</label>
							<div class="model_ch">
								<div class="model_che" ng-repeat="answer in questionerio.options">
									<input type="radio" name="answers[multiresponse_answer][{{questionerio.id_pergunta}}]"  autocomplete="off" ng-value="answer.id" id="ch_survey_{{ answer.id }}">
									<label for="ch_survey_{{ answer.id }}"> {{answer.answer}}</label>
								</div>
							<div class="clear h-10"></div>
							</div>
						</script>
						<script type="text/ng-template" id="SurveystarRating">
							<div class="custom_label_dv">
							<label>{{questionerio.question}}</label>
							<input type="hidden" name="answers[rating_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
							<div class="custom_radio_lable">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_1">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="ssr_rad_{{questionerio.id_pergunta}}_1"  ng-click="getStarValue(questionerio.id_pergunta,1)">
							<span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_2">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="ssr_rad_{{questionerio.id_pergunta}}_2"  ng-click="getStarValue(questionerio.id_pergunta,2)">
							<span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_3">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="ssr_rad_{{questionerio.id_pergunta}}_3"  ng-click="getStarValue(questionerio.id_pergunta,3)">
							<span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_4">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="ssr_rad_{{questionerio.id_pergunta}}_4"  ng-click="getStarValue(questionerio.id_pergunta,4)">
							<span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_5">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="ssr_rad_{{questionerio.id_pergunta}}_5"  ng-click="getStarValue(questionerio.id_pergunta,5)">
							<span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_6">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6" id="ssr_rad_{{questionerio.id_pergunta}}_6"  ng-click="getStarValue(questionerio.id_pergunta,6)">
							<span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_7">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7" id="ssr_rad_{{questionerio.id_pergunta}}_7"  ng-click="getStarValue(questionerio.id_pergunta,7)">
							<span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_8">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8" id="ssr_rad_{{questionerio.id_pergunta}}_8"  ng-click="getStarValue(questionerio.id_pergunta,8)">
							<span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_9">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9" id="ssr_rad_{{questionerio.id_pergunta}}_9"  ng-click="getStarValue(questionerio.id_pergunta,9)">
							<span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
							</label>
							</div>
							<div class="custom_radio_lable" ng-if="questionerio.escala == 10">
							<label for="ssr_rad_{{questionerio.id_pergunta}}_10">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10" id="ssr_rad_{{questionerio.id_pergunta}}_10"  ng-click="getStarValue(questionerio.id_pergunta,10)">
							<span class="span_{{questionerio.id_pergunta}}_10">&nbsp;</span>
							</label>
							</div>
							</div>
						</script>
						<script type="text/ng-template" id="SurveyFavorStarRating">
							<div class="custom_label_dv">
							<label>{{questionerio.question}}</label>
							<input type="hidden" name="answers[rating_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
							<div class="custom_radio_lable">
							<label for="sfs_rad_{{questionerio.id_pergunta}}_1">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="sfs_rad_{{questionerio.id_pergunta}}_1"  ng-click="getStarValue(questionerio.id_pergunta,1)">
							<span class="span_{{questionerio.id_pergunta}}_1">Discordo totalmente</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="sfs_rad_{{questionerio.id_pergunta}}_2">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="sfs_rad_{{questionerio.id_pergunta}}_2"  ng-click="getStarValue(questionerio.id_pergunta,2)">
							<span class="span_{{questionerio.id_pergunta}}_2">Discordo</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="sfs_rad_{{questionerio.id_pergunta}}_3">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="sfs_rad_{{questionerio.id_pergunta}}_3"  ng-click="getStarValue(questionerio.id_pergunta,3)">
							<span class="span_{{questionerio.id_pergunta}}_3">Neutro</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="sfs_rad_{{questionerio.id_pergunta}}_4">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="sfs_rad_{{questionerio.id_pergunta}}_4"  ng-click="getStarValue(questionerio.id_pergunta,4)">
							<span class="span_{{questionerio.id_pergunta}}_4">Concordo</span>
							</label>
							</div>
							<div class="custom_radio_lable">
							<label for="sfs_rad_{{questionerio.id_pergunta}}_5">
							<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="sfs_rad_{{questionerio.id_pergunta}}_5"  ng-click="getStarValue(questionerio.id_pergunta,5)">
							<span class="span_{{questionerio.id_pergunta}}_5">Totalmente de acordo</span>
							</label>
							</div>
							<div class="clear h-10"></div>

							</div>
						</script>
						<script type="text/ng-template" id="SurveyheartRating">
							<div class="custom_label_dv star">
								<label>{{questionerio.question}}</label>
								<input type="hidden" name="answers[heart_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
								<div class="custom_radio_lable">
									<label for="survey_rad21_{{questionerio.id_pergunta}}_1">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="survey_rad21_{{questionerio.id_pergunta}}_1"  ng-click="getHeartValue(questionerio.id_pergunta,1)">
										<span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="survey_rad22_{{questionerio.id_pergunta}}_2">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="survey_rad22_{{questionerio.id_pergunta}}_2"  ng-click="getHeartValue(questionerio.id_pergunta,2)">
										<span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="survey_rad23_{{questionerio.id_pergunta}}_3">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="survey_rad23_{{questionerio.id_pergunta}}_3"  ng-click="getHeartValue(questionerio.id_pergunta,3)">
										<span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="survey_rad24_{{questionerio.id_pergunta}}_4">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="survey_rad24_{{questionerio.id_pergunta}}_4"  ng-click="getHeartValue(questionerio.id_pergunta,4)">
										<span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
									</label>
								</div>
								<div class="custom_radio_lable">
									<label for="survey_rad25_{{questionerio.id_pergunta}}_5">
										<input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="survey_rad25_{{questionerio.id_pergunta}}_5"  ng-click="getHeartValue(questionerio.id_pergunta,5)">
										<span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
									</label>
								</div>
								 <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									 <label for="survey_rad25_{{questionerio.id_pergunta}}_6">
										 <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="6"  id="survey_rad25_{{questionerio.id_pergunta}}_6"  ng-click="getHeartValue(questionerio.id_pergunta,6)">
										 <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
									 </label>
								 </div>
								 <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									 <label for="survey_rad25_{{questionerio.id_pergunta}}_7">
										 <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="7"  id="survey_rad25_{{questionerio.id_pergunta}}_7"  ng-click="getHeartValue(questionerio.id_pergunta,7)">
										 <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
									 </label>
								 </div>
								 <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									 <label for="survey_rad25_{{questionerio.id_pergunta}}_8">
										 <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="8"  id="survey_rad25_{{questionerio.id_pergunta}}_8"  ng-click="getHeartValue(questionerio.id_pergunta,8)">
										 <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
									 </label>
								 </div>
								 <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									 <label for="survey_rad25_{{questionerio.id_pergunta}}_9">
										 <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="9"  id="survey_rad25_{{questionerio.id_pergunta}}_9"  ng-click="getHeartValue(questionerio.id_pergunta,9)">
										 <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
									 </label>
								 </div>
								 <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
									 <label for="survey_rad25_{{questionerio.id_pergunta}}_10">
										 <input name="answers[heart_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" value="10"  id="survey_rad25_{{questionerio.id_pergunta}}_10"  ng-click="getHeartValue(questionerio.id_pergunta,10)">
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
	<div class="modal fade in" id="modal-valores">
		<div class="modal-dialog">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="showSolicitor()">X</button>
				<h4 class="modal-title">Valores da empresa</h4>
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
	<div class="modal fade in" id="viewupdate">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">{{ "MEU_PERFIL.VIEW_CHECKIN" | translate }}</h4>
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
											<div class=" see_more_comments" ng-if="question.answers[0].comments.length>2"><a href="javascript:void(0)">{{ "MEU_PERFIL.SEE_MORE_COMMENTS" | translate }}</a></div>
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
										<div class="col-md-12">
											<label style="font-size:15px;color:#000;width:100%;font-weight: 700;">{{ "MEU_PERFIL.SITUATION" | translate }}</label>
											<div class="form-group">
												<div class="labe_c">
													<label for="reviewed_status">
													<input type="checkbox"  id="reviewed_status" disabled>
													<span><i class="fa fa-check-circle"></i></span>
													</label>
												</div>
												<br>
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
												<button type="button" class="btn btn-white" data-dismiss="modal">{{ "UI.CLOSE" | translate }}</button>
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
												<label for="star_view_rad_{{question.id_pergunta}}_1">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==1" value="1" id="star_view_rad_{{question.id_pergunta}}_1">
													<span>&nbsp;</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="star_view_rad_{{question.id_pergunta}}_2">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2" id="star_view_rad_{{question.id_pergunta}}_2">
													<span>&nbsp;</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="star_view_rad_{{questionerio.id_pergunta}}_3">
													<input name="answers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3" id="star_view_rad_{{questionerio.id_pergunta}}_3">
													<span>&nbsp;</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="star_view_rad_{{question.id_pergunta}}_4">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4" id="star_view_rad_{{question.id_pergunta}}_4">
													<span>&nbsp;</span>
												</label>
											</div>
											<div class="custom_radio_lable">
												<label for="star_view_rad_{{question.id_pergunta}}_5">
													<input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5" id="star_view_rad_{{question.id_pergunta}}_5">
													<span>&nbsp;</span>
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
													<label for="heart_rad21_{{question.id_pergunta}}_1">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==1" value="1"  id="heart_rad21_{{question.id_pergunta}}_1">
														<span>&nbsp;</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="heart_rad22_{{question.id_pergunta}}_2">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==2" value="2"  id="heart_rad22_{{question.id_pergunta}}_2">
														<span>&nbsp;</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="heart_rad23_{{question.id_pergunta}}_3">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==3" value="3"  id="heart_rad23_{{question.id_pergunta}}_3">
														<span>&nbsp;</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="heart_rad24_{{question.id_pergunta}}_4">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==4" value="4"  id="heart_rad24_{{question.id_pergunta}}_4">
														<span>&nbsp;</span>
													</label>
												</div>
												<div class="custom_radio_lable">
													<label for="heart_rad25_{{question.id_pergunta}}_5">
														<input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" ng-checked="question.answers[0].rating_score==5" value="5"  id="heart_rad25_{{question.id_pergunta}}_5">
														<span>&nbsp;</span>
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
	<div class="modal fade in" id="user-quick-view">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Informações do Usuário</h4>
				</div>
				<div class="modal-body modal-body-popup">
					<div class="model_body">
						<div class="row" >
							<div class="col-md-5">
								<div class="user-profile_pic" ng-style="{'background-image': (user.md_image) ? 'user.md_image' : 'url({{user.md_image}})'}">
									<img src="" ng-if="user.md_image" ng-src="{{ userDetailImage?userDetailImage:user.md_image }}" width="250" height="250" alt="{{ user.name }}" />
									<span class="user-image-replace" ng-if="!user.md_image">{{ initials(user.name) }}</span>
								</div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<label for="user-name" class="control-label-style1 ng-binding ng-scope">{{user.name}}</label><br />
									<label for=" " class="control-label-style2 ">{{ user.usuarioviewTime.nome_cargo }}</label>
								</div>
								<div class="form-group">
									<label for="user-name" class="control-label-style3">Email</label><br />
									<label for=" " class="control-label-style4">{{ user.email }}</label>
								</div>
								<div class="form-group">
									<label for="user-name" class="control-label-style3">Birthday</label><br />
									<label for=" " class="control-label-style4" ng-show="user.birthday !=null">{{ user.birthday | amUtc | amDateFormat:'MMMM DD, YYYY' }}</label>
									<label for=" " class="control-label-style4" ng-show="user.birthday ==null">N/A</label>
								</div>
								<a href="javascript:void(0)" ng-click="editUserProfile()" class="editprof">Edite seu Perfil</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal add skills -->
	<div class="modal fade in" id="modal-add-skills">
		<div class="modal-dialog">
			<form id="form-add-skills" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">{{ "MEU_PERFIL.ADD_SKILL" | translate }}</h4>
				</div>
				<div class="modal-body">
					<div class="form">
						<fieldset class="field-panel" ng-repeat='skilloption in skilloptions'>
							<button class="btn btn-info remove file-set" ng-show="$last" ng-click="removeSkill()"><i class="icon-minus-circled"></i></button>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="new_skill_{{skilloption.id}}" class="control-label">{{ "MEU_PERFIL.SKILLS" | translate }}</label>
										<input id="new_skill_{{skilloption.id}}" name="new_skill[{{skilloption.id}}]" type="text" class="form-control input-skills" required>
										<small>{{ "MEU_PERFIL.PRESS_ENTER_AFTER_SKILL" | translate }}</small>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">{{ "MEU_PERFIL.MY_EVATUATION" | translate }}</label>
										<div class="avaliacao-panel competencias-tabel">
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" ng-class="{'active': skill.avaliacao==1}">
												<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="1" required>
												<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>{{ "MEU_PERFIL.UNSATISFACTORY" | translate }}</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" >
												<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="2" required>
												<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>{{ "MEU_PERFIL.NEEDS_TO_IMPROVE" | translate }}</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" >
												<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="3" required>
												<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>{{ "MEU_PERFIL.MEETS" | translate }}</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success rattting btn-success-act skills" >
												<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="4" required>
												<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>{{ "MEU_PERFIL.MEETS_VERY_WELL" | translate }}</span>
											</div>
											<div class="ratting-panel">
												<label class="btn btn-success btn-success-act skills" >
												<input type="radio" name="geral[{{skilloption.id}}]" autocomplete="off" value="5" required>
												<span class="glyphicon glyphicon-ok"></span>
												</label>
												<span>{{ "MEU_PERFIL.SURPASSES_EXPECTATIONS" | translate }}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<button class="btn btn-primary addfields" ng-click="add_new_skill_option()">{{ "MEU_PERFIL.ADD_SKILL" | translate }}</button>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">{{ "MEU_PERFIL.CLOSE" | translate }}</button>
					<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'MEU_PERFIL.SAVING' | translate }}">{{ "MEU_PERFIL.SAVE" | translate }}</button>
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
					<h4 class="modal-title">{{ "OBJETIVOS.NEW_GOAL" | translate }}</h4>
				</div>
				<div class="modal-body">
					<div class="progress" ng-class="{'hide': users.length}" style="margin-top:17px;">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
					<div class="form hide" ng-class="{'hide': !users.length && !teams.length && !objectives.length}">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="profile-okr-tatic-name" class="control-label">{{ "UI.NAME" | translate }}</label>
									<input name="nome" type="text" class="form-control" id="profile-okr-tatic-name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="profile-okr-tatic-description" class="control-label">{{ "UI.DESCRIPTION" | translate }}</label>
									<textarea name="descricao" id="profile-okr-tatic-description" class="form-control" rows="5"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="profile-okr-tatic-user" class="control-label">{{ "UI.ENCHARGED" | translate }}</label>
									<select id="profile-okr-tatic-user" name="usuario" class="select2 usuario-okr-tatic" data-allow-clear="true" data-placeholder="{{ 'UI.SELECT_USER' | translate }}">
										<option value=""></option>
										<optgroup label="Usuários">
											<option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="profile-okr-tatic-team" class="control-label">{{ "UI.TEAM" | translate }}</label>
									<select id="profile-okr-tatic-team" name="time" class="select2 times-okr-tatic" data-allow-clear="true" data-placeholder="{{ 'TIMES.SELECT_TEAM' | translate }}">
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
									<label for="profile-okr-tatic-objectives" class="control-label">{{ "OBJETIVOS.GOALS" | translate }}</label>
									<select id="profile-okr-tatic-objectives" name="objetivo" class="select2 objetivo-okr-tatic" data-allow-clear="true" data-placeholder="{{ 'OBJETIVOS.SELECT_GOAL' | translate }}" ng-model="objectiveId" ng-change="changeCycle()">
										<option value=""></option>
										<optgroup label="Objetivos">
											<option ng-repeat="item in objectives" ng-value="{{ item.id }}">{{ item.title }}</option>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="col-md-6" ng-class="{'hide': !cycles.length}">
								<div class="form-group">
									<label for="profile-okr-tatic-cycles" class="control-label">{{ "UI.QUARTERS" | translate }}</label>
									<select id="profile-okr-tatic-cycles" multiple="multiple" name="clicos" class="form-control multiple cycles-okr-tatic" ng-model="cyclesModel" ng-options="cycle.id as cycle.name for cycle in cycles">
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">{{ "UI.CLOSE" | translate }}</button>
					<button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ "UI.SAVE" | translate }}</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Model Confirm -->
	<div class="modal fade activity_dismiss_modal" id="dismiss-activity-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">{{ "MEU_PERFIL.REMOVE_ACTIVITY_FROM_PROFILE" | translate }}</h4>
				</div>
				<div class="modal-body">
					<div class="dv_messange">{{ "MEU_PERFIL.ACTION_WILL_REMOVE_ACTIVITY" | translate }}</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white f_left" data-dismiss="modal">{{ "UI.CANCEL" | translate }}</button>
					<button type="submit" class="btn btn-primary salvar f_right" id="dismissActivity" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ "UI.REMOVE" | translate }}</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade in" id="complete-activity-modal">
		<div class="modal-dialog">
			<form id="activity_dismiss_form" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Concluir Atividade</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<span>A ação de concluir a atividade irá removê-la de seu perfil. Deseja prosseguir?</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary salvar" id="completeActivity" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Continuar</button>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade in" id="dismiss-feedback-modal">
		<div class="modal-dialog">
			<form id="activity_dismiss_form" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Decline crossfeed</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<span>Are you sure you want to decline this crossfeed?</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary salvar" id="completeDeclineFeedback" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Continuar</button>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade in" id="profilepic-modal">
		<div class="modal-dialog">
			<form id="activity_dismiss_form" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Set profile picture</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?php
$account_type_login = $this->session->userdata('social_logins');
$ac_type            = $account_type_login['login_type'];
?>
								<span>You do not have any profile picture. Do you want to set from <?php echo $ac_type; ?>?</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal" id="cancelToSaveImage">No</button>
					<button type="submit" class="btn btn-primary salvar" id="completeSetProfilePic" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Yes Sure</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Modal Atividades -->
	<div class="modal fade in" id="modal-activities">
		<div class="modal-dialog">
			<form id="form-activities" class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><span ng-class="{'hide': activityDetail.id}">Nova</span> <span ng-class="{'hide': !activityDetail.id}">Editar</span> Atividade</h4>
				</div>
				<div class="modal-body">
					<div class="form">
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label for="activity-name" class="control-label">Nome</label>
									<input name="nome" type="text" class="form-control" id="activity-name" value="{{ activityDetail.title }}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="team-status" style="margin-top: 31px;">
									<dl class="users dl-horizontal">
											<dd style="margin-left: 0px">
												<div class="images">
													<div class="dropdown">
														<a href="javascript:void(0)" class="dropdown-toggle selected-option" id="link-user-ativade" ng-class="{'inactive':activity_status==0}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fa fa-circle " aria-hidden="true"></i>
															<p ng-if="activity_status==0" style="display: inline;">Inativa</p>
															<p ng-if="activity_status==1 || activity_status != 0" style="display: inline;">Ativa</p></a>
														<div class="dropdown-menu">
																<a href="javascript:void(0)" class="link" ng-click="changeAtivoTypeAtivade('1')"><i class="fa fa-circle" aria-hidden="true"></i> Ativa</a>
																<a href="javascript:void(0)" class="link inactive" ng-click="changeAtivoTypeAtivade('0')"><i class="fa fa-circle" aria-hidden="true"></i> Inativa</a>
														</div>
													</div>
												</div>
											</dd>
										</dl>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="activity-description" class="control-label">Descrição</label>
									<textarea name="descricao" id="activity-description" class="form-control" rows="5">{{ activityDetail.description }}</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="activity-init" class="control-label">Início</label>
									<div class="input-group" style="width:100%;">
										<input id="activity-init" name="inicio" type="text" class="form-control datepicker" value="{{ activityDetail.init }}">
										<div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="activity-end" class="control-label">Fim</label>
									<div class="input-group" style="width:100%;">
										<input id="activity-end" name="fim" type="text" class="form-control datepicker" value="{{ activityDetail.end }}">
										<div class="input-group-addon"> <a href="#"><i class="entypo-calendar"></i></a> </div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="activity-end" class="control-label">Porcentagem</label>
									<div class="input-group" style="width:100%; margin-top:13px;">
										<input type="hidden" id="activity-percentage" ng-value="activityDetail.percentage" />
										<div class="slider"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="activity-user" class="control-label">Responsável</label>
									<select id="activity-user" name="usuario" class="select2 usuario-activity" data-placeholder="Selecione um Usuário" ng-options="user.id as user.name for user in users" ng-model="activityDetailUser"></select>
								</div>
							</div>
					   <!--     <div class="col-md-6">
								<div class="form-group">
									<label for="activity-hours" class="control-label">Horas</label>
									<input name="horas" type="number" class="form-control" id="activity-hours" value="{{ activityDetail.hour }}">
								</div>
							</div>
						 <div class="col-md-6">
								<div class="form-group big-select">
									<label for="activity-type" class="control-label">Tipo</label>
									<select id="activity-type" name="tipo" class="select-type form-control select-lg" ng-options="type.id as type.name for type in types" ng-model="typeActivity"></select>
								</div>
							</div>-->
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="activity-users" class="control-label">Contribuidores </label>
									<select id="activity-users" class="form-control" ng-model="selectedUserNotAddedAtivade" ng-options="userr.name for userr in usersNotAddedAtivade track by userr.id"></select>

									 <span class="corresponsaveis-selected" ng-repeat="selected in usersNotAddedSelectedAtivade" ng-click="removeUserAndRefreshAtivade(selected)"><label>{{selected.name}}</label><input type="hidden" value="{{selected.id}}" name="corresponsaveis[]" class="form-control" readonly><i class="fa fa-remove"></i></span>

									<!-- <select id="activity-users" multiple="multiple" name="corresponsaveis[]" class="form-control multi-select users-activity" ng-model="activityDetailUsers" ng-options="user.name for user in users track by user.id">
									</select> -->
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="activity-tags" class="control-label">Tags</label>
									<input id="activity-tags" class="input-tags-activity" type="text" />
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

	<!-- Update progress modal -->

	<div class="modal fade in" id="update-progress-modal">
        <div class="modal-dialog " style="width: 800px !important;">
            <form id="form-progress" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="row update-content">
                    	<div class="col-md-5">
                    		<div class="progress_left_corner ng-binding">
								<div class="progress_title_content ng-binding" title="{{update_hContent.title}}">
									<h4 class="modal-title">{{update_hContent.title | limitTo:34}}{{update_hContent.title.length>34 ? '...' : ''}}</h4>
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
                    	<div class="col-md-3 cs-padding-con">
                    		<div class="" style="float: left;">
                    			<input type="checkbox" id="check-finished" ng-model = "finishedSituation" ng-change="changeSituation(1)" style="margin-top: 3px;" value="">
                    			<label for="lbl-progress" class="control-label progress-checkbox">Finalizar: </label>
                    		</div>
                    		<div class="" style="float: right;">
                    			<input type="checkbox" id="check-cancelled" ng-model = "cancelledSituation" ng-change="changeSituation(3)" style="margin-top: 3px;" value="">
                    			<label for="lbl-progress" class="control-label progress-checkbox">Cancelar: </label>
                    		</div>
                    	</div>
                    	<div class="col-md-3 cs-padding-top-13 progress-slider">
                    		<div class="input-group" style="width:100%;">
								<input type="hidden" id="update-percentage"/>
								<div class="slider"></div>
							</div>
                    	</div>
                    </div>
                </div>
                <div class="modal-body">
                	<div class="row" style="padding-bottom: 10px;">
                		<div class="col-md-12" style="overflow-y: auto; max-height: 80px;">
	                		<label class="" style="font-size: 14px; font-weight: bold;">Descrição:</label>
							<div class="">{{update_hContent.description}}</div>	
						</div>
                	</div>
                    <div class="row">
                    	<div class="col-md-12 elo comment-box-header">
                    		<div class="row">
                    			<textarea rows="1" id="comment_content" placeholder="Digite seu comentário" class="elo-height col-md-9"></textarea>
								<button class="col-md-3 btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Adicionando" ng-click="addActivityComment()">Enviar comentário</button>
                    		</div>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="comment-box-container">
                    		<div class="carrier_panel clearfix removehover cs-margin-top-10" ng-if="activityComments.length>0" ng-repeat="comment in activityComments">
								<div class="col-md-1 ng-binding pdl-30 comment-box-img">
									<img src="{{comment.url_image}}">
								</div>
								<div class="col-md-9 ng-binding comment-box-comments">
									<div class="comment-user">
										{{comment.nome_usuario}}
									</div>
									<div class="comment-content">
										{{comment.comentario}}
									</div>
								</div>
								<div class="col-md-2 comment-box-date">
									<span class="ng-binding">{{comment.commentdate}}</span>	
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix removehover cs-margin-top-25 cs-margin-left-3" ng-if="!activityComments.length>0">
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

	<!-- Templates for apprisials -->
	<script type="text/ng-template" id="questnariotextQuestion">
		<div ng-class="{'col-md-5 col-sm-5': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<h2 class="srv_question">{{questionerio.question}}</h2>
		</div>
		<div ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<div class="answer-box main_message_box categorie_inner_sec_ans">
				<textarea class="form-control" name="description[{{questionerio.id_pergunta}}]" placeholder="Descreva sua resposta aqui" class="mb0">{{questionerio.descricao}}</textarea>
			</div>
			<!--like-count-box-wrapper END-->
		</div>
	</script>
	<script type="text/ng-template" id="questnariomultipleAnswer">
		<div ng-class="{'col-md-5 col-sm-5': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<h2 class="srv_question quest_heading phase_questions">{{questionerio.question}}</h2>
		</div>
		<div ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
			<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
			<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
			<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>
		</div>
	</script>
	<script type="text/ng-template" id="questnariostarRating">
		<div ng-class="{'col-md-5 col-sm-5': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<h2 class="srv_question quest_heading phase_questions">{{questionerio.question}}</h2>
		</div>
		<div ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
			<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
			<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
			<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>
		</div>
		<div class="clearfix"></div>
	</script>
	<script type="text/ng-template" id="questnarioFavorStarRating">
		<div ng-class="{'col-md-5 col-sm-5': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<h2 class="srv_question quest_heading phase_questions">{{questionerio.question}}</h2>
		</div>
		<div ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
			<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
			<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
			<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>
		</div>
	</script>
	<script type="text/ng-template" id="questnarioevolucaoAnswer">
		<div ng-class="{'col-md-5 col-sm-5': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<h2 class="srv_question quest_heading phase_questions">{{questionerio.question}}</h2>
		</div>
		<div ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
			<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
			<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
			<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>
		</div>
	</script>
	<script type="text/ng-template" id="questnarioheartRating">
		<div ng-class="{'col-md-5 col-sm-5': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<h2 class="srv_question quest_heading phase_questions">{{questionerio.question}}</h2>
		</div>
		<div ng-class="{'col-md-7 col-sm-7': cycledetails.escala==2, 'col-md-6 col-sm-6': cycledetails.escala!=2}">
			<div ng-if="cycledetails.escala==1" class="cyclecompetencias_questions" ng-include="'valoreapprisialfivestar'"></div>
			<div ng-if="cycledetails.escala==2" class="cyclecompetencias_questions" ng-include="'valoreapprisialtenstar'"></div>
			<div ng-if="cycledetails.escala==3" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaoAnswer'"></div>
			<div ng-if="cycledetails.escala==4" class="cyclecompetencias_questions" ng-include="'valoreapprisialevolucaofiveAnswer'"></div>
		</div>
	</script>

	<script type="text/ng-template" id="valoreapprisialfivestar">
		<div class="">
			<div class="fiver_star_rating_comment_box">
		<div class="like-count-box-wrapper q_data"> <span>Não satisfeito</span>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
				<label for="rad_apprisial_{{questionerio.id_pergunta}}_1">
					<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==1"  autocomplete="off" value="1" id="rad_apprisial_{{questionerio.id_pergunta}}_1"  ng-click="getStarValue(questionerio.id_pergunta,1)">
					<span class="span_{{questionerio.id_pergunta}}_1" ng-class="{'also-checked': questionerio.score >= 1}">&nbsp;</span>
				</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_2">
				<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==2" autocomplete="off" value="2" id="rad_apprisial_{{questionerio.id_pergunta}}_2"  ng-click="getStarValue(questionerio.id_pergunta,2)">
				<span class="span_{{questionerio.id_pergunta}}_2" ng-class="{'also-checked': questionerio.score >= 2}">&nbsp;</span>
			</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_3">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==3" autocomplete="off" value="3" id="rad_apprisial_{{questionerio.id_pergunta}}_3"  ng-click="getStarValue(questionerio.id_pergunta,3)">
						<span class="span_{{questionerio.id_pergunta}}_3" ng-class="{'also-checked': questionerio.score >= 3}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			 <label for="rad_apprisial_{{questionerio.id_pergunta}}_4">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==4" autocomplete="off" value="4" id="rad_apprisial_{{questionerio.id_pergunta}}_4"  ng-click="getStarValue(questionerio.id_pergunta,4)">
						<span class="span_{{questionerio.id_pergunta}}_4" ng-class="{'also-checked': questionerio.score >= 4}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv  q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_5">
				<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==5" autocomplete="off" value="5" id="rad_apprisial_{{questionerio.id_pergunta}}_5"  ng-click="getStarValue(questionerio.id_pergunta,5)">
				<span class="span_{{questionerio.id_pergunta}}_5" ng-class="{'also-checked': questionerio.score >= 5}">&nbsp;</span>
			</label>
			</div>
		  </div>
		  <span>Extremamente satisfeito</span> </div>
		<!--like-count-box-wrapper END-->
		<div class="annswer_box cycleescala{{cycledetails.escala}}" >
		<label>Comente/Justifique sua avaliação</label>
		 <input type="text" class="form-control" placeholder="" name="description[{{questionerio.id_pergunta}}]"  value="{{questionerio.descricao}}">
		 </div>
		 </div>

		</div>
	</script>
	<script type="text/ng-template" id="valoreapprisialtenstar">
		<div class="">
			<div class="review_comment_box">
		<div class="like-count-box-wrapper q_data valorestar_include review_star_box reviewquestionerio in category.questions_star_box"> <span>Não satisfeito</span>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
				<label for="rad_apprisial_{{questionerio.id_pergunta}}_1">
					<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==1" autocomplete="off" value="1" id="rad_apprisial_{{questionerio.id_pergunta}}_1"  ng-click="getStarValue(questionerio.id_pergunta,1)">
					<span class="span_{{questionerio.id_pergunta}}_1" ng-class="{'also-checked': questionerio.score >= 1}">&nbsp;</span>
				</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_2">
				<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==2" autocomplete="off" value="2" id="rad_apprisial_{{questionerio.id_pergunta}}_2"  ng-click="getStarValue(questionerio.id_pergunta,2)">
				<span class="span_{{questionerio.id_pergunta}}_2" ng-class="{'also-checked': questionerio.score >= 2}">&nbsp;</span>
			</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_3">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==3" autocomplete="off" value="3" id="rad_apprisial_{{questionerio.id_pergunta}}_3"  ng-click="getStarValue(questionerio.id_pergunta,3)">
						<span class="span_{{questionerio.id_pergunta}}_3" ng-class="{'also-checked': questionerio.score >= 3}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			 <label for="rad_apprisial_{{questionerio.id_pergunta}}_4">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==4" autocomplete="off" value="4" id="rad_apprisial_{{questionerio.id_pergunta}}_4"  ng-click="getStarValue(questionerio.id_pergunta,4)">
						<span class="span_{{questionerio.id_pergunta}}_4" ng-class="{'also-checked': questionerio.score >= 4}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv  q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_5">
				<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==5" autocomplete="off" value="5" id="rad_apprisial_{{questionerio.id_pergunta}}_5"  ng-click="getStarValue(questionerio.id_pergunta,5)">
				<span class="span_{{questionerio.id_pergunta}}_5" ng-class="{'also-checked': questionerio.score >= 5}">&nbsp;</span>
			</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_6">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==6" autocomplete="off" value="6" id="rad_apprisial_{{questionerio.id_pergunta}}_6"  ng-click="getStarValue(questionerio.id_pergunta,6)">
						<span class="span_{{questionerio.id_pergunta}}_6" ng-class="{'also-checked': questionerio.score >= 6}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating">
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_7">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==7" autocomplete="off" value="7" id="rad_apprisial_{{questionerio.id_pergunta}}_7"  ng-click="getStarValue(questionerio.id_pergunta,7)">
						<span class="span_{{questionerio.id_pergunta}}_7" ng-class="{'also-checked': questionerio.score >= 7}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating" >
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_8">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==8" autocomplete="off" value="8" id="rad_apprisial_{{questionerio.id_pergunta}}_8"  ng-click="getStarValue(questionerio.id_pergunta,8)">
						<span class="span_{{questionerio.id_pergunta}}_8" ng-class="{'also-checked': questionerio.score >= 8}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <div class="custom_label_dv q_rating" >
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_9">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==9" autocomplete="off" value="9" id="rad_apprisial_{{questionerio.id_pergunta}}_9"  ng-click="getStarValue(questionerio.id_pergunta,9)">
						<span class="span_{{questionerio.id_pergunta}}_9" ng-class="{'also-checked': questionerio.score >= 9}">&nbsp;</span>
					</label>
			</div>
		  </div>
		   <div class="custom_label_dv q_rating" >
			<div class="custom_radio_lable">
			  <label for="rad_apprisial_{{questionerio.id_pergunta}}_10">
						<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==10" autocomplete="off" value="10" id="rad_apprisial_{{questionerio.id_pergunta}}_10"  ng-click="getStarValue(questionerio.id_pergunta,10)">
						<span class="span_{{questionerio.id_pergunta}}_10" ng-class="{'also-checked': questionerio.score >= 10}">&nbsp;</span>
					</label>
			</div>
		  </div>
		  <span>Extremamente satisfeito</span>
		<!--like-count-box-wrapper END-->

		<div class="annswer_box cycleescala{{cycledetails.escala}}" >
		<label>Comente/Justifique sua avaliação</label>
		 <input type="text" class="form-control" placeholder="" name="description[{{questionerio.id_pergunta}}]"  value="{{questionerio.descricao}}">
		 </div>
		 </div>
		 </div>
		</div>
	</script>
	<script type="text/ng-template" id="valoreapprisialevolucaoAnswer">
		<div class="">

		<div class="phase_admin_sec clearfix">
		<div class="custom-btn-group btn-group phase_custom_right_section" data-toggle="buttons">
		<label class="btn btn-clr1" ng-class="{'active': questionerio.score== 1}" data-placement="top" data-toggle="tooltip" data-original-title="Abaixo do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==1" autocomplete="off" value="1" id="rad_apprisial_{{questionerio.id_pergunta}}_1"  ng-click="getStarValue(questionerio.id_pergunta,1)">
		<span class="glyphicon glyphicon-ok"></span>
		 <div class="hvr_item">Abaixo do esperado</div>
		 </label>

		<label class="btn btn-clr2" ng-class="{'active': questionerio.score== 2}" data-placement="top" data-toggle="tooltip" data-original-title="precisa melhorar">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==2" autocomplete="off" value="2" id="rad_apprisial_{{questionerio.id_pergunta}}_2"  ng-click="getStarValue(questionerio.id_pergunta,2)">
					  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Precisa melhorar</div>
		 </label>

		 <label class="btn btn-clr3"  ng-class="{'active': questionerio.score== 3}" data-placement="top" data-toggle="tooltip" data-original-title="dentro do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==3" autocomplete="off" value="3" id="rad_apprisial_{{questionerio.id_pergunta}}_3"  ng-click="getStarValue(questionerio.id_pergunta,3)">
					  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Dentro do esperado</div>
		 </label>

		<label class="btn btn-clr4"  ng-class="{'active': questionerio.score== 4}" data-placement="top" data-toggle="tooltip" data-original-title="acima do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==4" autocomplete="off" value="4" id="rad_apprisial_{{questionerio.id_pergunta}}_4"  ng-click="getStarValue(questionerio.id_pergunta,4)">
		  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Acima do esperado</div>
		 </label>

		</div>
		<div class="annswer_box cycleescala{{cycledetails.escala}}" >
		<label>Comente/Justifique sua avaliação</label>
		 <input type="text" class="form-control" placeholder="" name="description[{{questionerio.id_pergunta}}]"  value="{{questionerio.descricao}}">
		 </div>
		<!--like-count-box-wrapper END-->

		</div>

		</div>

	</script>

	<script type="text/ng-template" id="valoreapprisialevolucaofiveAnswer">
		<div class="">

		<div class="phase_admin_sec clearfix">
		<div class="custom-btn-group btn-group phase_custom_right_section" data-toggle="buttons">
		<label class="btn favorabiltype-btn-clr1" ng-class="{'active': questionerio.score== 1}" data-placement="top" data-toggle="tooltip" data-original-title="Abaixo do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==1" autocomplete="off" value="1" id="rad_apprisial_{{questionerio.id_pergunta}}_1"  ng-click="getStarValue(questionerio.id_pergunta,1)">
		<span class="glyphicon glyphicon-ok"></span>
		 <div class="hvr_item">Inaceitavel</div>
		 </label>

		<label class="btn favorabiltype-btn-clr2" ng-class="{'active': questionerio.score== 2}" data-placement="top" data-toggle="tooltip" data-original-title="precisa melhorar">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==2" autocomplete="off" value="2" id="rad_apprisial_{{questionerio.id_pergunta}}_2"  ng-click="getStarValue(questionerio.id_pergunta,2)">
					  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Insatisfatorio</div>
		 </label>

		 <label class="btn favorabiltype-btn-clr3"  ng-class="{'active': questionerio.score== 3}" data-placement="top" data-toggle="tooltip" data-original-title="dentro do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==3" autocomplete="off" value="3" id="rad_apprisial_{{questionerio.id_pergunta}}_3"  ng-click="getStarValue(questionerio.id_pergunta,3)">
					  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Medio</div>
		 </label>

		<label class="btn favorabiltype-btn-clr4"  ng-class="{'active': questionerio.score== 4}" data-placement="top" data-toggle="tooltip" data-original-title="acima do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==4" autocomplete="off" value="4" id="rad_apprisial_{{questionerio.id_pergunta}}_4"  ng-click="getStarValue(questionerio.id_pergunta,4)">
		  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Bom</div>
		 </label>

		<label class="btn favorabiltype-btn-clr5"  ng-class="{'active': questionerio.score== 5}" data-placement="top" data-toggle="tooltip" data-original-title="acima do esperado">
		<input name="apprisialanswers[rating_answer][{{questionerio.id_pergunta}}][value]" type="radio" ng-checked="questionerio.score==5" autocomplete="off" value="5" id="rad_apprisial_{{questionerio.id_pergunta}}_5"  ng-click="getStarValue(questionerio.id_pergunta,5)">
		  <span class="glyphicon glyphicon-ok"></span>
		  <div class="hvr_item">Excelente</div>
		 </label>

		</div>
		<div class="annswer_box cycleescala{{cycledetails.escala}}" >
		<label>Comente/Justifique sua avaliação</label>
		 <input type="text" class="form-control" placeholder="" name="description[{{questionerio.id_pergunta}}]"  value="{{questionerio.descricao}}">
		 </div>
		<!--like-count-box-wrapper END-->

		</div>

		</div>

	</script>
</div>
<?php
$obj           = &get_instance();
$social_logins = $obj->session->userdata('check_social_logins');

if (!empty($social_logins) && isset($social_logins['image']) && !empty($social_logins['image'])) {
    $obj->session->unset_userdata('check_social_logins', '');
    ?>
	<script>
		setTimeout(function(){
			$('#profilepic-modal').modal('show');
		}, 2000);
	</script>
	<?php
}?>
