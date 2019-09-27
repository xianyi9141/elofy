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
		<span> Perfil: {{ search_user.name }}</span>
        <div class="button_sets backlink">
            <a href="<?php echo base_url('perfil');?>" class="startappraisal " ><i class="fa fa-reply"></i> Voltar ao Perfil</a>
        </div>
    </h2>
    <div class="main_section">
        

            <div class="row gridperfil">
                <div class="welcome_user_box user-c-area col-lg-3">
                    
                <div class="user_profile position-abs ">
                        <div class="employes_nmae_ig">
                            <div class="employe_image employe_user-img" ng-style="{'background-image': (search_user.md_image) ? 'search_user.md_image' : 'url({{search_user.md_image}})'}">
                                <img src="" ng-if="search_user.md_image" ng-src="{{ userDetailImage?userDetailImage:search_user.md_image }}" width="170" height="170" alt="{{ search_user.name }}" />
                                <span class="user-image-replace" ng-if="!search_user.md_image">{{ initials(search_user.name) }}</span>
                            </div>
                            <div class="personal_detail">
                                
                                <h2 style="margin-bottom: 24px;"><span>{{ search_user.name }} </span>
                                            <!-- <a href="javascript:void(0)" ng-click="newUpdate()"><div class="maker-container"></div></a> -->
                                </h2>
                                
                            
                                     <div class="personal_detail ng-recon ng-right-block" style="border-radius: 0px;margin-top:24px;padding: 0px;border-radius:8px;">
                                        <div style="border-bottom: 1px solid #dadce0;">
                                            
                                        <label class="text-style" style="margin: 0px;padding: 10px 10px 10px 20px;font-weight: normal;">Sobre mim</label>
                                         <a href="" ng-show="!showmeinfo" ng-click="showmeinfo=true" style="text-align:right;font-size: 12px;padding-right: 20px;">Mostrar</a>
                                         <a href="" ng-show="showmeinfo" ng-click="showmeinfo=false" style="text-align:right;font-size: 12px;">Esconder</a>                              </div>    
                                        <p ng-if="!search_user.descricao_bio || search_user.descricao_bio == ''" style="margin-bottom: 10px;padding-left: 20px;margin-top:10px; color: lightgray;">Fale um pouco sobre você 😍</p>
                                        <p ng-if="!(search_user.descricao_bio == null)" style="margin-bottom: 10px;padding-left: 20px;margin-top:10px;">{{search_user.descricao_bio}}</p>
                                        <div ng-show="showmeinfo" style="padding-left: 20px;">
                                        <h3>Time</h3>
                                        <p>{{search_user.nome_time}}</p>

                                        <h3>Cargo</h3>
                                        <p>{{search_user.nome_cargo}}</p>

                                        <h3>E-mail</h3>
                                        <p>{{ search_user.email }}</p>

                                        <h3>Aniversário</h3>
                                        <p>{{search_user.nascimento}}</p>

                                        </div>
                                        </div>
                                         <div class="user_team ng-block" style="border-radius: 0px;margin-top:24px; margin-bottom: 24px;">
                                            <div class="dblock_body">
                                                <div class="new_team_block team_block" style="max-height: 500px;  border-radius: 8px;">
                                                    <h3 class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">Meu time</h3>
                                                    <div class="media media-tab-line" ng-repeat="teamteam in myteammembers" ng-if="teamteam.id!=user.id" style="">
                                                       <a style="float: left;" href="<?php echo base_url('perfil/{{teamteam.id}}')?>">

                                                            <div class="user-image-wrap">
                                                                <img src="" ng-if="teamteam.xs_image" ng-src="{{ teamteam.xs_image}}" class="img-circle" width="46" height="46" alt="{{ teamteam.name}}" />
                                                                <!-- <span class="user-image-replace" ng-if="!teamteam.xs_image">{{ initials(teamteam.name)}}</span> -->
                                                            </div> 
                                                            <div class="media-body">
                                                                
                                                                <h2 style="font-weight: bold;">{{teamteam.name}} <span class="user-cashier-panel">
                                                                {{teamteam.email}}</span>
                                                                </h2> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

















                            </div>
                        </div>
                </div>
            
                </div>





 <div class="welcome_user_box_data col-lg-6 header-search-area">
                      <div ng-controller="okrCtrl" ng-show="profiletatics.length > 0" class="ng-timeline-block perfil-timeline-block dblock perfil-user-feedback" style="margin-bottom: 24px;margin-top: 24px;">
                        <h3 ng-if="profiletatics.length > 0" class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">OKR's</h3>
                        <div class="babs-2-pabel">
                        <div class="tab tab-feedback-panel" role="tabpanel">
                            <!-- Nav tabs -->
                        <div class="tabs-cntr" style="padding: 2px 20px 0px;">
                                <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                    <li id="sectionGoals_link" role="presentation" class="tav-active-feed active"><a href="#SectionGoals" aria-controls="home" role="tab" data-toggle="tab">Objetivos</a></li>
                                    <!--<li id="sectionKR_link" class="tav-active-feed" role="presentation"><a href="#SectionKR" aria-controls="profile" role="tab" data-toggle="tab">Resultados Chave</a></li>-->
                                </ul>
                        </div>
                        
                        <div class="timeline-percentages" style="float:left; padding: 20px !important;width:100%;">
                            <div class="tab-content tabs feedbacktabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="SectionGoals"> 
                            <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id}}" ng-repeat="tatic in myprofiletatics">
                                <div class="ng-timeline perfile-timeline-outer row v-center" style="margin-left:0px;border: 1px solid #dadce0;border-radius: 10px;margin-bottom: 10px !important;"> 
                                    <div class="col-sm-1 col-xs-12">
                                      <img ng-src="{{ tatic.image }}" class="profile-dp ng-scope timeline-img" width="31" height="31" alt="Jessica Pearson">
                                  </div>
                                  <div class="col-sm-6 col-xs-12 OKRS & Atividates text-ellips" style="padding-right: 0px;">
                                    <p style="margin-bottom:0px;">
                                     {{ tatic.title}}
                                 </p>
                             </div>
                             <div class="col-sm-3 col-xs-12 timeline-tag text-center" style="padding-right: 0px !important;padding-left: 0px !important;">
                                <p style="">
                                    <span title="Individual" ng-if="tatic.type == 'i'" >Individual</span>
                                    <span title="Compartilhado" ng-if="tatic.type == 'c'" >Compartilhado</span>
                                    <span title="Time" ng-if="tatic.type == 't'" >Time</span>

                                </p>
                            </div>

                            <div class="col-sm-2 col-xs-12 progres-perfil" style="padding-right: 0px;padding-left: 0px;">
                                <div class="progress_wrap">

                                    <div class="progress" ng-class="{'ontrack-container':tatic.color == 1,'attention-container':tatic.color == 2,'delayed-container':tatic.color == 3}">
                                        <div class="progress-bar" role="progressbar" style="width: {{ tatic.percentage}}%;" aria-valuenow="{{ tatic.percentage}}" aria-valuemin="0" aria-valuemax="100" ng-class="{'ontrack':tatic.color == 1,'attention':tatic.color == 2,'delayed':tatic.color == 3}"></div>
                                    </div>
                                    <span class="ng-binding" style="padding-left: 0px;">{{ tatic.percentage}}%</span>
                                </div>
                            </div>
                            </div>
                            </a>
                        
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="SectionKR"> 
                            Sem registros
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


