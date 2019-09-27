
<div ng-controller="profileCtrl" class="hide profileView" ng-class="{'hide': !user.id}">

    <div class="main_section perfil-main">
        <div ng-show="profiletab == 1 || !profiletab">
            <div class="row gridperfil" style="margin-top:24px;">
                <div class="welcome_user_box user-c-area">
                    <div class="container">
                        <div class="user_profile position-abs col-lg-3">
                            <div class="employes_nmae_ig">
                                <div class="employe_image employe_user-img" ng-style="{'background-image': (user.md_image) ? 'user.md_image': 'url({{user.md_image}})'}" width="170" height="170">
                                    <a href="javascript:void(0)" class="profile_link_overlay" ng-click="editUserProfile()">&nbsp;</a>
                                    <img src="" ng-if="user.md_image" ng-src="{{ userDetailImage?userDetailImage:user.md_image }}" class="img-circle" width="170" height="170" alt="{{ user.name}}" />
                                    <span class="user-image-replace" ng-if="!user.md_image">{{ initials(user.name)}}</span>
                                </div>
                                <div class="personal_detail prefil-x" style="margin-bottom: 24px;">
                                    <div ng-repeat="user_update in user_updates" ng-if="user_updates.length > 0 && $first" class="update " >
                                        <h2><span>{{ user.name}}</span> 
                                            <!-- <a class="alerts_orange {{ user_update.status_update}}" href="javascript:void(0)" ng-click="newUpdate()"><div class="maker-container"></div></a> -->
                                        </h2>                    
                                    </div>
                                    <div ng-if="!user_updates.length">
                                        <h2><span>{{ user.name}} </span>
                                            <!-- <a href="javascript:void(0)" ng-click="newUpdate()"><div class="maker-container"></div></a> -->
                                        </h2>
                                    </div>
                                    <!--                                <p class="ng-small-italic"><span class="icon-blocks"><img src="https://www.elofysistema.com.br/assets/img/added/fa-maps.jpg" class="list-icons" ng-click="newUpdate()">Último check-in 24/11</i></p>-->

                                    </div>
                                    <div class="personal_detail ng-recon ng-right-block" style="border-radius: 0px;margin-top:24px;padding: 0px;border-radius:8px;">
                                        <div style="border-bottom: 1px solid #dadce0;">
                                            
                                        <label class="text-style" style="margin: 0px;padding: 10px 10px 10px 20px;font-weight: normal;">Sobre mim</label>
                                         <a href="" ng-show="!showmeinfo" ng-click="showmeinfo=true" style="text-align:right;font-size: 12px;padding-right: 20px;">Mostrar</a>
                                         <a href="" ng-show="showmeinfo" ng-click="showmeinfo=false" style="text-align:right;font-size: 12px;">Esconder</a>                              </div>    
                                        <p ng-if="!user.descricao_bio || user.descricao_bio == ''" style="margin-bottom: 10px;padding-left: 20px;margin-top:10px; color: lightgray;">Fale um pouco sobre você 😍</p>
                                        <p ng-if="!(user.descricao_bio == null)" style="margin-bottom: 10px;padding-left: 20px;margin-top:10px;">{{user.descricao_bio}}</p>
                                        <div ng-show="showmeinfo" style="padding-left: 20px;">
                                        <h3>Time</h3>
                                        <p>{{user.nome_time}}</p>

                                        <h3>Cargo</h3>
                                        <p>{{user.nome_cargo}}</p>

                                        <h3>E-mail</h3>
                                        <p>{{user.email}}</p>

                                        <h3>Aniversário</h3>
                                        <p>{{user.nascimento}}</p>

                                        </div>

                                        
                                        <!-- <ul class="ng-reconh"> -->
                                    <!-- <ul class="ng-recomend">
                                        <li>
                                            <img src="https://www.elofysistema.com.br/assets/img/added/icon1.png">
                                        </li>
                                        <li>
                                            <img src="https://www.elofysistema.com.br/assets/img/added/icon2.png">
                                        </li>
                                        <li>
                                            <img src="https://www.elofysistema.com.br/assets/img/added/icon3.png">
                                        </li>
                                        <li>
                                            <img src="https://www.elofysistema.com.br/assets/img/added/icon4.png">
                                        </li>
                                    </ul> -->
                                    
                                    <!--<h3>Meus interesses</h3>
                                    <ul class="ng-tags interest-tag">
                                        <li>
                                            <a href="javascript:void(0)">Andar a cavalo</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Meditação</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Futebol</a>
                                        </li>
                                        <li><a href="javascript:void(0)">People Anlytics lover</a></li>
                                    </ul>
                                    <h3 style="margin-top: 18px; float: left; width:100%;">Fit cultural</h3>
                                    <ul class="ng-tags pink cultural-tag" style="margin-bottom: 18px;">
                                        <li>
                                            <a href="javascript:void(0)"><label>2x</label> Hit the ground running</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><label>1x</label> Highly alligned</a>
                                        </li>
                                    </ul>

                                    <h3 style="margin-top: 5px; float: left; width:100%;">Reconhecimentos</h3>
                                    <ul class="ng-tags pink cultural-rating-tag cultural-tag" style="margin-bottom: 18px;">
                                        <li>
                                            <a href="javascript:void(0)"><img src="https://oldserver.elofysistema.com.br/assets/img/recomend.png" style="    border-radius: 50%; margin-left: 0;"> <span>3x</span>  <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson">
                                                <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson">
                                                <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson"></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="https://www.elofysistema.com.br/assets/img/added/message-icons.jpg" style="border-radius: 50%; margin-left: 0;"> <span>2x</span>  <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson">
                                                    <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson"></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><img src="https://oldserver.elofysistema.com.br/assets/img/recomend.png" style="border-radius: 50%; margin-left: 0;"> <span>1x</span>  <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><img src="https://www.elofysistema.com.br/assets/img/added/message-icons.jpg" style="border-radius: 50%; margin-left: 0;"> <span>1x</span>  <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg" class="profile-dp ng-scope" width="40" height="40" alt="Jessica Pearson">
                                                    </a>
                                                </li>
                                            </ul>-->

                                        </div>
                                            <div class="user_team ng-block" style="border-radius: 0px;margin-top:24px; margin-bottom: 24px;">
                                            <div class="dblock_body">
                                                <div class="new_team_block team_block" style="max-height: 500px;  border-radius: 8px;">
                                                    <h3 class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">Meu time</h3>
                                                    <div class="media media-tab-line" ng-repeat="teamteam in myteammembers" ng-if="teamteam.id != user.id" style="padding: 0px !important;">
                                                       <a href="#" style="float: left; padding: 10px 10px 10px 20px;">
                                                            <!-- AVATAR COMENTADO -->
                                                            <!-- <div class="user-image-wrap">
                                                                 <img src="" ng-if="teamteam.md_image" ng-src="{{ teamteam.md_image}}" class="img-circle" width="40" height="40" alt="{{ teamteam.name}}" />
                                                             </div>  -->
                                                            <div class="media-body">
                                                                <h2 style="font-weight: bold;">{{teamteam.name}} <span class="user-cashier-panel">
                                                                {{teamteam.email}}</span>

                                                            </h2>
                                </div>
                                                    </a>                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                                <div class="welcome_user_box_data col-lg-6 header-search-area">

                                    <!--<div class="text-center">
                                        <button ng-show="!timeline_active" ng-click="change_timeline_mode()" class="mdc-button mdc-button--outlined">Feed de Notícias</button> 
                                        <button ng-show="timeline_active"  ng-click="change_timeline_mode()" class="mdc-button mdc-button--outlined">Perfil</button>
                                    </div>-->
                                    <div class="mdc-tab-bar tabperfil" role="tablist">
                                    <div class="mdc-tab-scroller">
                                        <div class="mdc-tab-scroller__scroll-area">
                                        <div class="mdc-tab-scroller__scroll-content">
                                            <button class="mdc-tab mdc-tab--active" role="tab"  ng-click="change_timeline_mode('perfil')">
                                            <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Perfil</span>
                                            </span>
                                            <span class="mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span>
                                            </button>
                                            <button class="mdc-tab" role="tab" ng-click="change_timeline_mode('feed')">
                                            <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Feed</span>
                                            </span>
                                            <span class="mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span>
                                            </button>
                                            <!-- active tab -->
                                            <!-- <button class="mdc-tab mdc-tab--active" role="tab">
                                            <span class="mdc-tab__content">
                                                <span class="mdc-tab__icon material-icons" aria-hidden="true">favorite</span>
                                                <span class="mdc-tab__text-label">Tab 2</span>
                                            </span>
                                            <span class="mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                            </span>
                                            <span class="mdc-tab__ripple"></span> -->
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="elo" ng-if="user.elos == 1">
                                            <div class="dblock_body">
                                                <div class="babs-2-pabel">
                                                    <form id="form-elo" ng-submit="addElo('form-elo')" enctype="multipart/form-data">
                                                        <div ng-show="eloIsNormalPost" class="publish-area-icons"> 
                                                            <a href="javascript:void(0);" ng-click="plusEloPicture(post_images.length-1)"><i class="fa fa-image"></i></a>
                                                        </div>
                                                        <div class="sent-notification" style="display: none">
                                                            <span ng-if="!eloIsNormalPost">Que legal! Enviamos o seu El <i class="fa fa-heart"></i>.</span>
                                                            <span ng-if="eloIsNormalPost">Publicação enviada!</span>
                                                        <!--    <span ng-if="user.elos_limit > 0 && user.elos_sent_today < user.elos_limit">Você ainda tem <strong>{{ user.elos_limit - user.elos_sent_today}}</strong> restantes hoje.</span>
                                                            <span ng-if="user.elos_limit > 0 && user.elos_sent_today >= user.elos_limit">Você atingiu seu limite de elos por hoje.</span> -->
                                                        </div>
                                                        <textarea class="publication" ng-class="{'post': eloIsNormalPost}" style="padding-left: 20px; padding-top: 10px; padding-bottom: 10px;font-size: 14px;" placeholder="Envie um elo para @alguém assim"></textarea>
                                                        <!-- <button type="submit" ng-class="{'blue-post': eloIsNormalPost}" ng-disabled="user.elos_limit != 0 && user.elos_sent_today >= user.elos_limit" style="background: {{ (eloIsNormalPost)?'#0454df':'#ee0eb3'  }}"><i ng-if="!eloIsNormalPost" class="fa fa-heart">  </i><i ng-if="eloIsNormalPost" class="fa fa-comment bg-blue">  </i></button> -->
                                                        <!--<button ><i ng-if="!eloIsNormalPost" class="fa fa-heart"></i>-->

                                                        <button  type="submit" ng-class="{'blue-post': eloIsNormalPost}" style="background: {{ (eloIsNormalPost)?'#0454df':'#ff4fc4'  }}" id="add-to-favorites"
                                                            class="mdc-icon-button"
                                                            aria-label="Add to favorites"
                                                            aria-hidden="true"
                                                            aria-pressed="false">
                                                            <i class="material-icons mdc-icon-button__icon"  ng-if="!eloIsNormalPost">favorite</i>
                                                            <i class="material-icons mdc-icon-button__icon"  ng-if="eloIsNormalPost">feedback</i>
                                                        </button>
                                                        
                                        
                                                        <div ng-show="eloIsNormalPost && (!post_images || post_images.length == 0)" style="height: 50px; display: block;">
                                                        </div>
                                                        <div ng-show="eloIsNormalPost" class="image-uploaders">
                                                            <div class="image-box" ng-repeat="post_image in post_images">
                                                                <input class="hide input-file" id="postimage-{{$index}}" name="postimage-{{$index}}" type="file" class="form-control">
                                                                <img ng-if="post_image.input" ng-src="{{ post_image.input }}">

                                                                <div ng-if="!post_image.input && $index < 3" class="plus-btn" ng-click="plusEloPicture($index)"><i class="fa fa-plus"></i></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <ul ng-show="!timeline_active || timeline_active" class="feedback-list">
                                            <li>
                                                <button class="mdc-button mdc-button--outlined mdc-button--dense" ng-click = "toggleEloToPublish('publish');">
                                                <i class="material-icons mdc-button__icon">chat</i>
                                                 <span class="mdc-button__label">Publicação</span>
                                                 </button>
                                            </li>
                                            <li>
                                                <button class="mdc-button mdc-button--outlined mdc-button--dense mdc-theme--secondary mdc-ripple-surface--accent	"ng-click="toggleEloToPublish('elo')">
                                                <i class="material-icons mdc-button__icon">favorite</i>
                                                 <span class="mdc-button__label">Elogio</span>
                                                 </button>
                                            </li>

                                            <li>
                                            <button class="mdc-button mdc-button--outlined mdc-button--dense" ng-click="newUpdate()">
                                                <i class="material-icons mdc-button__icon">place</i>
                                                 <span class="mdc-button__label">Checkin</span>
                                                 </button>
                                        </li>

                                        <li>
                                            <a href="<?php echo base_url('feedback') ?>">
                                                <button class="mdc-button mdc-button--outlined mdc-button--dense">
                                                    <i class="material-icons mdc-button__icon">feedback</i>
                                                    <span class="mdc-button__label">Feedback</span>
                                                </button>
                                            </a>
                                        </li>
                                            <!--<li>
                                              <p class="ng-small-italic shadow-blue"  ng-click="showFeedbackForm3()">
                                                <i class="fa fa-file bg-blue"></i>Nota privada</p>
                                            </li>-->

                                            <!--<li ng-if="display_button_list">
                                              <p class="ng-small-italic shadow-blue">
                                                <i class="fa fa-star bg-blue"></i>Crossfeed</p>
                                            </li>-->

                                            <!--<li ng-show="!display_button_list" ng-click="showButtonList()">
                                              <p class="ng-small-italic" style="background: #F1F1F1; font-size: 36px; padding: 6px 20px 25px; color: #807b7b; text-align: center; line-height: 0px;">
                                                ...</p>
                                            </li>
                                            <li ng-show="display_button_list" ng-click="showButtonList()" class="" style="padding:0 !important">
                                              <p class="ng-small-italic" style="background: #F1F1F1;font-size: 36px;padding: 8px; color: #807b7b;text-align: center;line-height: 0px; margin-bottom: 0 !important;">
                                               <img ng-click="showOnlyBanner()" src="https://www.elofysistema.com.br/assets/img/added/cross-btn.png" alt="cross-icon"></p>
                                            </li>-->

                                        </ul>

                                    <div ng-show="!timeline_active">

                                       <!--<h3 class="c-headding" ng-show="showTopBlueBanner">Pulso</h3>-->
                                       <div class="ng-blue heart-rating text-center" ng-show="showTopBlueBanner" ng-if="quick_survey != ''">
                                            <div class="ng-blue-head">
                                                <div>
                                                    <button ng-hide="quick_survey.anonima == '0'" class="unlock-button" type="submit">
                                                        <span class="fa fa-unlock-alt"></span>&nbsp;
                                                        Anônima
                                                    </button>
                                                    <p>{{ current_step+1 }} / {{quick_survey.questions.length}}</p>
                                                    <form id="new_quick_servey_top" method="post" >
                                                        <div class="col-xs-12" style="float: none;">
                                                            <input type="hidden" name="questioerio_id" value="{{quick_survey.id_questionario}}">
                                                            <input type="hidden" name="id_pesquisa" value="{{quick_survey.id_pesquisa}}">
                                                            <div class="row survey-imoji-container survey-imoji-container2" ng-show="quick_survey.questions != '' && current_step == $index" ng-repeat="question in quick_survey.questions">
                                                                <div style="padding:0" class="col-md-12" ng-if="question.type == 'e'" ng-include="'starRatingSurveyTop'"></div>
                                                                <div style="padding:0" class="col-md-12" ng-if="question.type == 'n'" ng-include="'SurveyNpsRating'"></div>
                                                                <div style="padding:0" class="col-md-12" ng-if="question.type == 'c'" ng-include="'heartRatingSurveyTop'"></div>
                                                                <div style="padding:0" class="col-md-12" ng-if="question.type == 'i'" ng-include="'emojiRatingSurveyTop'"></div>
                                                                <div style="padding:0" class="col-md-12" ng-if="question.type == 'f'" ng-include="'favorRatingSurveyTop'"></div>
                                                                <div style="padding:0" class="col-md-12" ng-if="question.type == 'o'" ng-include="'multipleAnswerSurveyTop'"></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script type="text/ng-template" id="SurveyNpsRating">
                                                    <div ng-init="srating.value = -1"></div>
                                                    <input type="hidden" name="answers[nps_answer][{{question.id_pergunta}}][id_questionario]" ng-value="{{question.id_questionario}}">
                                                    <input type="hidden" name="answers[nps_answer][{{question.id_pergunta}}][value]" ng-value="srating.value">
                                                    <div class="question_sample n_top">{{question.question}}</div>                                                    
                                                    <div class="like-count-box-wrapper like-count-box-wrapper-my q_data">
                                                        <div ng-if="question.escala == '6'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="nps" data-max="5" data-min="0"></div>
                                                        <div ng-if="question.escala == '5'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="nps" data-max="5" data-min="1"></div>
                                                        <div ng-if="question.escala == '11'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="nps" data-max="10" data-min="0"></div>
                                                        <div ng-if="question.escala == '10'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="nps" data-max="10" data-min="1"></div>
                                                    </div>
                                                </script>

                                            <script type="text/ng-template" id="multipleAnswerSurveyTop">
                                                        <div class="question_sample n_top">{{question.question}}</div>
                                                        <div class="custom_radio style1" ng-repeat="answer in question.options">
                                                            <div class="quiz_percentage_bg"></div>
                                                            <div class="radio_dv ">
                                                                <input type="radio" id="ch{{ answer.id }}" name="answers[multiresponse_answer][{{question.id_pergunta}}]"  ng-value="answer.id" id="ch{{ answer.id }}">
                                                                <label style="color:#fff !important;" for='ch{{ answer.id }}'>{{answer.answer}}</label>
                                                            </div>
                                                        </div>
                                                    </script>
                                            <script type="text/ng-template" id="starRatingSurveyTop">
                                                        <div class="custom_label_dv n_top font-11">
                                                            <div class="question_sample n_top">{{question.question}}</div>
                                                            <input type="hidden" name="answers[rating_answer][{{question.id_pergunta}}][id_questionario]" ng-value="{{question.id_questionario}}">
                                                            <div class="custom_radio_lable">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_1">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="srsurvey_rad_{{question.id_pergunta}}_1" ng-click="getStarValue(question.id_pergunta,1)">
                                                                    <span class="span_{{question.id_pergunta}}_1">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_2">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="srsurvey_rad_{{question.id_pergunta}}_2" ng-click="getStarValue(question.id_pergunta,2)">
                                                                    <span class="span_{{question.id_pergunta}}_2">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_3">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="srsurvey_rad_{{question.id_pergunta}}_3" ng-click="getStarValue(question.id_pergunta,3)">
                                                                    <span class="span_{{question.id_pergunta}}_3">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_4">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="srsurvey_rad_{{question.id_pergunta}}_4" ng-click="getStarValue(question.id_pergunta,4)">
                                                                    <span class="span_{{question.id_pergunta}}_4">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_5">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="srsurvey_rad_{{question.id_pergunta}}_5" ng-click="getStarValue(question.id_pergunta,5)">
                                                                    <span class="span_{{question.id_pergunta}}_5">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_6">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="6" id="srsurvey_rad_{{question.id_pergunta}}_6" ng-click="getStarValue(question.id_pergunta,6)">
                                                                    <span class="span_{{question.id_pergunta}}_6">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_7">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="7" id="srsurvey_rad_{{question.id_pergunta}}_7" ng-click="getStarValue(question.id_pergunta,7)">
                                                                    <span class="span_{{question.id_pergunta}}_7">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_8">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="8" id="srsurvey_rad_{{question.id_pergunta}}_8" ng-click="getStarValue(question.id_pergunta,8)">
                                                                    <span class="span_{{question.id_pergunta}}_8">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_9">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="9" id="srsurvey_rad_{{question.id_pergunta}}_9" ng-click="getStarValue(question.id_pergunta,9)">
                                                                    <span class="span_{{question.id_pergunta}}_9">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="srsurvey_rad_{{question.id_pergunta}}_10">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="10" id="srsurvey_rad_{{question.id_pergunta}}_10" ng-click="getStarValue(question.id_pergunta,10)">
                                                                    <span class="span_{{question.id_pergunta}}_10">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="favorRatingSurveyTop">
                                                        <div class="custom_label_dv n_top font-11 fav-stars">
                                                            <div class="question_sample n_top">{{question.question}}</div>
                                                            <input type="hidden" name="answers[rating_answer][{{question.id_pergunta}}][id_questionario]" ng-value="{{question.id_questionario}}">
                                                            <div class="custom_radio_lable">
                                                                <label for="fs_rad_{{question.id_pergunta}}_1">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="1" id="fs_rad_{{question.id_pergunta}}_1" ng-click="getStarValue(question.id_pergunta,1)">
                                                                    <span class="span_{{question.id_pergunta}}_1" >Discordo totalmente</span>
                                                                </label>
                                                            </div>

                                                            <div class="custom_radio_lable">
                                                                <label for="fs_rad_{{question.id_pergunta}}_2">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="2" id="fs_rad_{{question.id_pergunta}}_2" ng-click="getStarValue(question.id_pergunta,2)">
                                                                    <span class="span_{{question.id_pergunta}}_2" >Discordo</span>
                                                                </label>
                                                            </div>

                                                            <div class="custom_radio_lable">
                                                                <label for="fs_rad_{{question.id_pergunta}}_3">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="3" id="fs_rad_{{question.id_pergunta}}_3" ng-click="getStarValue(question.id_pergunta,3)">
                                                                    <span class="span_{{question.id_pergunta}}_3" >Neutro</span>
                                                                </label>
                                                            </div>

                                                            <div class="custom_radio_lable">
                                                                <label for="fs_rad_{{question.id_pergunta}}_4">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="4" id="fs_rad_{{question.id_pergunta}}_4" ng-click="getStarValue(question.id_pergunta,4)">
                                                                    <span class="span_{{question.id_pergunta}}_4" >Concordo</span>
                                                                </label>
                                                            </div>

                                                            <div class="custom_radio_lable">
                                                                <label for="fs_rad_{{question.id_pergunta}}_5">
                                                                    <input name="answers[rating_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="5" id="fs_rad_{{question.id_pergunta}}_5" ng-click="getStarValue(question.id_pergunta,5)">
                                                                    <span class="span_{{question.id_pergunta}}_5" >Totalmente de acordo</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="heartRatingSurveyTop">
                                                        <div class="custom_label_dv n_top heart">
                                                            <div class="question_sample n_top">{{question.question}}</div>
                                                            <input type="hidden" name="answers[heart_answer][{{question.id_pergunta}}][id_questionario]" ng-value="{{question.id_questionario}}">
                                                            <div class="custom_radio_lable">
                                                                <label for="hrsurvey_rad21_{{question.id_pergunta}}_1">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="1"  id="hrsurvey_rad21_{{question.id_pergunta}}_1" ng-click="getHeartValue(question.id_pergunta,1)">
                                                                    <span class="span_{{question.id_pergunta}}_1">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="hrsurvey_rad22_{{question.id_pergunta}}_2">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="2"  id="hrsurvey_rad22_{{question.id_pergunta}}_2" ng-click="getHeartValue(question.id_pergunta,2)">
                                                                    <span class="span_{{question.id_pergunta}}_2">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="hrsurvey_rad23_{{question.id_pergunta}}_3">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="3"  id="hrsurvey_rad23_{{question.id_pergunta}}_3" ng-click="getHeartValue(question.id_pergunta,3)">
                                                                    <span class="span_{{question.id_pergunta}}_3">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="hrsurvey_rad24_{{question.id_pergunta}}_4">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="4"  id="hrsurvey_rad24_{{question.id_pergunta}}_4" ng-click="getHeartValue(question.id_pergunta,4)">
                                                                    <span class="span_{{question.id_pergunta}}_4">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable">
                                                                <label for="hrsurvey_rad25_{{question.id_pergunta}}_5">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="5"  id="hrsurvey_rad25_{{question.id_pergunta}}_5" ng-click="getHeartValue(question.id_pergunta,5)">
                                                                    <span class="span_{{question.id_pergunta}}_5">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="hrsurvey_rad26_{{question.id_pergunta}}_6">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="6"  id="hrsurvey_rad26_{{question.id_pergunta}}_6" ng-click="getHeartValue(question.id_pergunta,6)">
                                                                    <span class="span_{{question.id_pergunta}}_6">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="hrsurvey_rad27_{{question.id_pergunta}}_7">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="7"  id="hrsurvey_rad27_{{question.id_pergunta}}_7" ng-click="getHeartValue(question.id_pergunta,7)">
                                                                    <span class="span_{{question.id_pergunta}}_7">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="hrsurvey_rad28_{{question.id_pergunta}}_8">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="8"  id="hrsurvey_rad28_{{question.id_pergunta}}_8" ng-click="getHeartValue(question.id_pergunta,8)">
                                                                    <span class="span_{{question.id_pergunta}}_8">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="hrsurvey_rad29_{{question.id_pergunta}}_9">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="9"  id="hrsurvey_rad29_{{question.id_pergunta}}_9" ng-click="getHeartValue(question.id_pergunta,9)">
                                                                    <span class="span_{{question.id_pergunta}}_9">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom_radio_lable" ng-if="question.escala == 10">
                                                                <label for="hrsurvey_rad210_{{question.id_pergunta}}_10">
                                                                    <input name="answers[heart_answer][{{question.id_pergunta}}][value]" type="radio" autocomplete="off" value="10"  id="hrsurvey_rad210_{{question.id_pergunta}}_10" ng-click="getHeartValue(question.id_pergunta,10)">
                                                                    <span class="span_{{question.id_pergunta}}_10">&nbsp;</span>
                                                                </label>
                                                            </div>
                                                            
                                                        </div>
                                                    </script>
                                                    <script type="text/ng-template" id="emojiRatingSurveyTop">
                                                        <div ng-init="srating.value = -1"></div>
                                                        <div class="custom_label_dv n_top star">
                                                            <div class="question_sample n_top">{{question.question}}</div>
                                                            <input type="hidden" name="answers[emoji_answer][{{question.id_pergunta}}][id_questionario]" ng-value="{{question.id_questionario}}">
                                                            <input type="hidden" name="answers[emoji_answer][{{question.id_pergunta}}][value]" ng-value="srating.value">
                                                            <div class="like-count-box-wrapper like-count-box-wrapper-my q_data">
                                                                <div ng-if="question.escala == '3'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="emoji" data-max="2"></div>
                                                                <div ng-if="question.escala != '3'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="emoji" data-max="4"></div>
                                                            </div>
                                                            <div class="clear h-10"></div>
                                                        </div>
                                                    </script>
                            <div class="long-buttons">
                                <div class="col-sm-12 col-xs-12">
                                    <button class="mdc-button mdc-button--outlined mdc-button--dense" ng-click="step_decrement()" ng-if="(current_step > 0)">
                                    <i class="material-icons mdc-button__icon">navigate_before</i>
                                    <span class="mdc-button__label">Voltar</span>
                                    </button>
                                    <!--<button class="long-arrow anterior-left-btn" ng-click="step_increment()" ng-if="current_step < (quick_survey.questions.length-1)">
                                        <span class="fa fa-arrow-right"></span>&nbsp;
                                        Avançar 
                                    </button>-->
                                    <button class="mdc-button mdc-button--outlined mdc-button--dense" ng-click="step_increment()" ng-if="current_step < (quick_survey.questions.length-1)">
                                    <span class="mdc-button__label">Avançar</span>
                                    <i class="material-icons mdc-button__icon">navigate_next</i>
                                    </button>
                                    
                                    <button class="mdc-button mdc-button--outlined mdc-button--dense" ng-if="current_step == quick_survey.questions.length - 1" ng-click="giveQuickSurveyTop()">
                                        {{ quick_survey.total_from > 1?"Enviar":"Enviar" }}
                                    </button>
                                </div>  
                            </div>
                        </div>
                    </div>

                            <!-- <div ng-if="notificationsLength(true)"> -->
                            <div class="ng-timeline-block perfil-timeline-block dblock perfil-user-feedback" style="margin-bottom: 24px;margin-top: 24px;" ng-if="cycleNotifications.length || surveys.length || youTimeNotification.length">
                                <h3 class="text-style"  style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">Pendências</h3>
                                <div class="timeline-percentages" style="float:left; padding: 20px !important;width:100%;"> 
                                <!-- <div ng-repeat="notification in notifications | filter: { type:'!elo'} | filter: { type:'!new_comment_mention'} | filter: { type:'!new_likes'}| filter: { type:'!new_comments'}" class="row" style="float: none;     margin: 0px 0px 15px;"> -->
                                    <div ng-repeat="notification in cycleNotifications" class="row" style="float: none;     margin: 0px 0px 15px;">
                                        <div class="ng-timeline perfile-timeline-outer row v-center" style="border-radius: 10px;background-color: #f1f3f4;"> 
                                            <div class="col-sm-1">
                                                <img ng-src="<?php echo base_url() ?>assets/portal/img/ico_avali.png" width="30" height="30" ng-if="notification.data.pendentes > 0">     
                                                <svg class="TaskRowCompletionStatus-checkIcon" viewBox="0 0 32 32" style=" width:30; height:30; color:#0000ff;" ng-if="notification.data.pendentes == 0">
                                                    <polygon points="27.672,4.786 10.901,21.557 4.328,14.984 1.5,17.812 10.901,27.214 30.5,7.615 "></polygon>
                                                </svg>    
                                            </div> 
                                                                       
                                            <div class="col-sm-9">
                                                <h4 style="font-weight: bold;color: #222;">{{notification.data.nome}}</h4>
                                                <p style="color: #222;margin-bottom: 0px;">{{notification.data.data_fim | amUtc | amDateFormat:'DD/MM/YYYY'}}</p> 
                                            </div>
                                            <div class="text-right col-sm-3" style="padding-right: 0px;vertical-align: middle;"  ng-if="notification.data.pendentes > 0">
                                            <a href="<?php echo base_url('cycleconfiguration') ?>#!/{{notification.data.id_revisao}}/CycleReviews"><button class="mdc-button mdc-button--unelevated">Responder</button></a>
                                            </div>
                                            <div class="text-right col-sm-3" style="padding-right: 0px;vertical-align: middle;"  ng-if="notification.data.pendentes == 0">
                                            <a href="<?php echo base_url('cycleconfiguration') ?>#!/{{notification.data.id_revisao}}/CycleReviews"><button class="mdc-button mdc-button--outlined">Revisar</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-if="youTimeNotification.length > 0 && notification.situacao != 2" ng-repeat="notification in youTimeNotification" class="row" style="float: none;     margin: 0px 0px 15px;">
                                        <div class="ng-timeline perfile-timeline-outer row v-center" style="border-radius: 10px;background-color: #f1f3f4;"> 
                                            <div class="col-sm-1">
                                                <span><i class="fa fa-star bg-blue"></i></span>
                                            </div> 
                                                                       
                                            <div class="col-sm-9">
                                                <h4 style="font-weight: bold;color: #222;">Novo feedback de desenvolvimento</h4>
                                                <p style="color: #222;margin-bottom: 0px;">{{notification.notDate | amUtc | amDateFormat:'DD/MM/YYYY'}}</p> 
                                            </div>
                                            <div class="text-right col-sm-3" style="padding-right: 0px;vertical-align: middle;"  ng-if="notification.situacao == 0" ng-click="openYouTimeNotification(notification)">
                                            <button class="mdc-button mdc-button--unelevated">Visualizar</button>
                                            </div>
                                            <div class="text-right col-sm-3" style="padding-right: 0px;vertical-align: middle;"  ng-if="notification.situacao == 1" ng-click="openYouTimeNotification(notification)">
                                                <button class="mdc-button mdc-button--outlined">Revisar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-if="surveys.length > 0"  ng-repeat="survey in surveys">
                                        <div class="ng-timeline perfile-timeline-outer row v-center" style="border-radius: 10px;margin-bottom: 10px !important;background-color: #f1f3f4;">
                                        <div class="col-sm-1">
                                        <img ng-src="<?php echo base_url() ?>assets/portal/img/ico_pesq.png" width="30" height="30">     </div>          
                                        <div class="col-sm-9"> 
                                          <h4 style="font-weight: bold;color: #222;">{{survey.nome_pesquisa}}</h4>
                                            <span class="survey_date" style="color: #222;">{{survey.data_atualizacao| amUtc | amDateFormat:'DD/MM/YYYY' }}</span>
                                        </div>
                                            <div class="text-right col-sm-3" style="padding-right: 0px;">
                                               <a ng-if="survey.id_tipo_pesquisa != 2" href="<?php echo base_url(); ?>survey/#!/{{ survey.id_pesquisa}}"><button class="mdc-button mdc-button--unelevated">Responder</button> </a>
                                               <a ng-if="survey.id_tipo_pesquisa == 2" href="<?php echo base_url(); ?>survey-list/{{ survey.id_pesquisa}}"><button class="mdc-button mdc-button--unelevated">Responder</button> </a>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!--<h3 class="text-style" style="margin-bottom: 15px; margin-top:0px;">Challenges</h3>
                            <div class="challenges-block bg-light-green">
                              <div class="row v-center">
                                <div class="col-sm-1">
                                  <button type="submit"><i class="fa fa-trophy color-green"></i></button>
                              </div>
                              <div class="col-sm-5">
                                  <h4><a href="#">Campeonato FIFA</a></h4>
                                  <p>14/03/2019</p>

                              </div>
                              <div class="col-sm-4">
                                <label class="label label-default"><a href="#">14 particioantes</a></label>
                              </div>
                              <div class="col-sm-2">
                                  <p><a href="#">Ver mais</a></p>
                              </div>
                          </div>
                      </div>

                      <div class="challenges-block bg-light-pink">
                          <div class="row v-center">
                            <div class="col-sm-1">
                              <button type="submit"><i class="fa fa-trophy color-pink"></i></button>
                          </div>
                          <div class="col-sm-5">
                              <h4><a href="#">Campeonato FIFA</a></h4>
                              <p>14/03/2019</p>

                          </div>
                          <div class="col-sm-4">
                              <label class="label label-default"><a href="#">14 particioantes</a></label>
                          </div>
                          <div class="col-sm-2">
                              <p>Ver mais</p>
                          </div>
                      </div>
                  </div>-->
                  
                      

                      <div ng-controller="okrCtrl" ng-show="profiletatics.length > 0" class="ng-timeline-block perfil-timeline-block dblock perfil-user-feedback" style="margin-bottom: 24px;margin-top: 24px;">
                        <h3 ng-if="profiletatics.length > 0" class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">{{ 'OKRS.TITLE' | translate }}</h3>
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
                            <a href="<?php echo base_url() ?>planejamento#!/tatic/{{ tatic.id}}" ng-repeat="tatic in profiletatics">
                                <div class="ng-timeline perfile-timeline-outer row v-center" style="margin-left:0px;border: 1px solid #dadce0;border-radius: 10px;margin-bottom: 10px !important;"> 
                                    <div class="col-sm-1 col-xs-12">
                                      <img ng-src="{{ tatic.image }}" class="profile-dp ng-scope timeline-img img-circle" width="40" height="40" alt="Jessica Pearson">
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
    
        <?php if ($this->session->userdata('feedback') == "1") { ?>
            <div class="dblock perfil-user-feedback" ng-if="user.feedback == 1" style="float:left; width:100%;margin-bottom: 4px;">
                <h3 class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">Feedbacks</h3>
                <div class="dblock_body">
                    <div class="babs-2-pabel">
                        <div class="tab tab-feedback-panel" role="tabpanel">
                            <!-- Nav tabs -->
                            <div class="tabs-cntr">
                                <ul class="nav nav-tabs nav-tabs-feeds" role="tablist">
                                    <li id="section1_link" role="presentation" class="tav-active-feed active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.RECEIVED' | translate }}</a></li>
                                    <li id="section2_link" class="tav-active-feed" role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.GIVEN' | translate }}</a></li>
                                    <li id="section3_link" class="tav-active-feed" role="presentation"><a href="#Section3" aria-controls="profile" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.REQUESTED_FOR_ME' | translate }}</a></li>
                                     <li class="tav-active-feed" role="presentation"><a href="#Section4" aria-controls="profile" role="tab" data-toggle="tab">{{ 'MEU_PERFIL.REQUESTED_BY_ME' | translate }}</a></li>
                                    <!-- <li class="tav-active-feed" role="presentation"><a href="#SectionPrivate" aria-controls="profile" role="tab" data-toggle="tab">Notas privadas</a></li> -->
                                </ul>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content tabs feedbacktabs">
                               <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                   <div class="feedbcsections" ng-show="feedback_recived.length >0" ng-repeat="recieved in feedback_recived" >
                                       <div class="heading_dv_name">
                                          <div class="heading_left">
                                              <!-- <span>{{ "UI.FROM" | translate }} <i class="fa fa-caret-right"></i></span> -->
                                              <div class="user_img_dv" ng-if="recieved.image">
                                                  <img src=""  ng-src="{{ recieved.image }}" class="img-circle" alt="{{ initials(recieved.name) }}" height="40" width="40"/>
                                              </div>
                                              <div class="user_img_nam" ng-if="!recieved.image">{{ initials(recieved.name) }}</div>
                                              <label>{{ recieved.name }}</label>
                                              <span style="cursor: pointer; padding-left: 10px;" ng-click="showHideFeedbackComments(recieved)" title="Reply to this feedback" ><img src="<?php echo base_url()?>assets/portal/img/ico_reply.png" width="17"></span>
                                              <label ng-if="recieved.tipo_feedback == 'r'" class="lbl_tipo_r">Reconhecimento</label>
                                              <label ng-if="recieved.tipo_feedback == 'm'" class="lbl_tipo_m">Oportunidade de melhoria</label>
                                              <label ng-if="recieved.lido == 0" class="lbl_new">Novo</label>
                                          </div>
                                          <div class="heading_right"><!-- <i class="fa fa-{{recieved.privacy=='1'?'lock':'unlock'}}"></i> -->
                                           <!-- <span ng-if="recieved.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span> -->
                                           <!-- <span ng-if="recieved.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span> -->
                                           {{ recieved.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
                                       </div>
                                   </div>
                                   <div class="description_tag feedback_reply" style="word-break: break-all;">{{ recieved.response }}</div>
                                   <!-- <div ng-click="showHideFeedbackComments(recieved)" class="coment-section-toggle">{{recieved.counts}}</div> -->
                                   <div class="desct-p" ng-show="recieved.valore.length > 0" ng-repeat="valor in recieved.valore">
                                    <label ng-class="{ melhoria : recieved.tipo_feedback == 'm' }">{{valor.name}}</label>
                                </div>
                                <div class="row" ng-show="recieved.showFeedbackComments">
                                <ng-include src="'feedback_comment_view'"></ng-include>
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
                                        <span>Para <i class="fa fa-caret-right"></i></span>
                                        <div class="user_img_dv" ng-if="given.image">
                                            <img src=""  ng-src="{{ given.image }}" class="img-circle" alt="{{ initials(given.name) }}" height="40" width="40"/>
                                        </div>
                                        <div class="user_img_nam" ng-if="!given.image">{{ initials(given.name) }}</div>
                                        <label>{{ given.name }}</label>
                                        <div ng-if="given.idfc" style="display: inline-block; padding-left: 10px; cursor: pointer;" ng-click="showFeedbackCommentReply(given)">
                                            <img src="<?php echo base_url()?>assets/img/comment_ico.png" width="30">
                                        </div>
                                        <label ng-if="given.lido == 0" class="lbl_new">Novo</label>
                                    </div>
                                    <div class="heading_right"><!-- <i class="fa fa-{{given.privacy=='1'?'lock':'unlock'}}"></i>
                                        <span ng-if="given.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
                                        <span ng-if="given.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span> -->
                                        {{ given.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
                                    </div>
                                </div>
                                <div class="description_tag">{{ given.response }}</div>
                                <div class="col-md-12 col-sm-12" style="padding:0px; margin-bottom:10px; background-color: #f6f8f9;" ng-show="given.showFeedbackCommentReply">
                                    <div class="feedback-review" ng-if="given.idfc">
                                        <div>
                                            <div class="col-md-1 col-sm-1 col-xs-1">
                                                <img src="{{ given.image }}" alt="">  
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-3 review-pl-0">
                                                <h3>{{ given.name }}</h3> 
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-xs-6 review-pl-0">
                                                <p>{{ given.comentario }}</p> 
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                                                <p style="color:#999; font-size: 14px;">{{ given.replydate | amUtc | amDateFormat:'DD MMMM YYYY' }}</p>
                                            </div>
                                        </div>
                                    </div>                                                  
                                </div>
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
                                    <div class="heading_right"><!-- <i class="fa fa-{{requested.privacy=='1'?'lock':'unlock'}}"></i>
                                        <span ng-if="requested.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
                                        <span ng-if="requested.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span> -->
                                        <span style="color:#999">Solicitado em: {{ requested.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}</span><br>
                                        <span style="color:#999" ng-if="requested.prazo && requested.prazo != '' ">Prazo esperado: {{ requested.prazo | amUtc | amDateFormat:'DD MMMM YYYY' }}</span>
                                    </div>
                                </div>
                                <div class="description_tag">{{ requested.solicitar }}</div>
                                <!--                                                 <a href="javascript:void(0)" ng-click="SolicitarFeedback(requested.destino)" title="Reply to this feedback" ><i class="fa fa-reply" style="float:right"></i></a>-->
                                <a href="<?php echo base_url('feedback#!/give') ?>/{{requested.id}}" title="Reply to this feedback" ><i class="fa fa-reply" style="float:right"></i></a>
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
                                        <span>Para <i class="fa fa-caret-right"></i></span>
                                        <div class="user_img_dv" ng-if="requested_by_me.image">
                                            <img src=""  ng-src="{{ requested_by_me.image }}" class="img-circle" alt="{{ initials(requested_by_me.name) }}" height="40" width="40"/>
                                        </div>
                                        <div class="user_img_nam" ng-if="!requested_by_me.image">{{ initials(requested_by_me.name) }}</div>
                                        <label>{{ requested_by_me.name }}</label>
                                    </div>
                                    <div class="heading_right"><!-- <i class="fa fa-{{requested_by_me.privacy=='1'?'lock':'unlock'}}"></i>
                                        <span ng-if="requested_by_me.privacy=='1'">{{ "UI.PRIVATE" | translate }}</span>
                                        <span ng-if="requested_by_me.privacy!='1'">{{ "UI.PUBLIC" | translate }}</span> -->
                                        <span style="color:#999">Solicitado em: {{ requested_by_me.image.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}</span><br>
                                        <span style="color:#999" ng-if="requested_by_me.prazo && requested_by_me.prazo != '' ">Prazo esperado: {{ requested_by_me.prazo | amUtc | amDateFormat:'DD MMMM YYYY' }}</span>
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

                                                <!--                                            <div class="ng-timeline">
                                                                                                <p>
                                                                                                    <i>Time</i>
                                                                                                </p>
                                                                                                <p>
                                                                                                    Fomentar o engajamento das <br>
                                                                                                    equipes com metas ambiciosas</p>
                                                                                                <div class="progress_wrap">
                                                
                                                                                                    <div class="progress">
                                                                                                        <div class="progress-bar delayed" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" ng-class="{'ontrack':tatic.color == 1,'attention':tatic.color == 2,'delayed':tatic.color == 3}"></div>
                                                                                                    </div>
                                                                                                    <span class="ng-binding">15%</span>
                                                                                                </div>
                                                                                            </div>-->
                                                <!--                                            <div class="ng-timeline">
                                                                                                <p>
                                                                                                    <i>Time</i>
                                                                                                </p>
                                                                                                <p>
                                                                                                    Fomentar o engajamento das <br>
                                                                                                    equipes com metas ambiciosas</p>
                                                                                                <div class="progress_wrap">
                                                                                                    <div class="progress">
                                                                                                        <div class="progress-bar attention " role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" ng-class="{'ontrack':tatic.color == 1,'attention':tatic.color == 2,'delayed':tatic.color == 3}"></div>
                                                                                                    </div>
                                                                                                    <span class="ng-binding">60%</span>
                                                                                                </div>
                                                                                            </div>-->
                                                <!--                                            <div class="ng-timeline">
                                                                                                <p>
                                                                                                    <i>Compartilhado</i>
                                                                                                </p>
                                                                                                <p>
                                                                                                    Fomentar o engajamento das <br> equipes com metas ambiciosas</p>
                                                                                                <div class="progress_wrap">
                                                                                                    <div class="progress">
                                                                                                        <div class="progress-bar delayed" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" ng-class="{'ontrack':tatic.color == 1,'attention':tatic.color == 2,'delayed':tatic.color == 3}"></div>
                                                                                                    </div>
                                                                                                    <span class="ng-binding">25%</span>
                                                                                                </div>
                                                                                            </div>-->
                                                <!-- <div class="nov-btn">
                                                    <a ng-click="okr()" href="#" class="btn-large-cdn"> Novo objetivo </a>

                                                </div> -->

                                                


                                                

                                                <!-- <div class="notas_1">
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="notas-da_1">
                                                            <h5>
                                                                <b>Titluo da nota 1</b>
                                                            </h5>
                                                            <p>
                                                                Aqui vai o conteudo desta pequena nota do Elofy.
                                                                Eu achei bem legal esse recurso de colocar notas no Elofy. Bacana, ne? Eu achei motu legal. Legal de verdade,mais do que legal, e incrivel.
                                                            </p>
                                                            <img src="https://oldserver.elofysistema.com.br/assets/img/103/150/p8B8afwnHP6F4qkP4zmFpQxqY9ZpTSzJPNeIjKzd.jpg">
                                                        </div>  
                                                    </div>  
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="notas-da_2">
                                                            <h5>
                                                                <b>Titluo da nota 1</b>
                                                            </h5>
                                                            <p>
                                                                Aqui vai o conteudo desta pequena nota do Elofy.
                                                                Eu achei bem legal esse recurso de colocar notas no Elofy. Bacana, ne?
                                                            </p>
                                                        </div>  
                                                        <div class="nota-da_3">
                                                            <h5>
                                                                <b>Sobro Eduardo K.</b>
                                                            </h5>
                                                            <div class="nota-da_3-image">
                                                                <i class="fa fa-lock"></i>
                                                            </div>
                                                            <button type="submit">
                                                                OKRs
                                                            </button>    
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="nota-da_4">
                                                            <h5>
                                                                <b>Titluo da nota 3</b>
                                                            </h5>
                                                            <p>
                                                                Aqui vai o conteudo desta pequena nota do Elofy. Eu achei bem legal esse recurso de colocar notas no Elofy. Bacana, ne? Eu achei motu legal. Legal de verdade,mais do que legal, e incrivel.
                                                                Aqui vai o conteudo desta pequena nota do Elofy. Eu achei bem  Elofy. Bacana, ne? Eu achei motu legal. Legal de verdade,mais do que legal, e incrivel.
                                                            </p>
                                                            <button type="submit">
                                                                OKRs
                                                            </button>
                                                        </div>  
                                                    </div>  
                                                </div> -->

                                                <div class="notas_1" style="padding-top: 0px;">
                                                    <h3 class="text-style" style="padding: 10px 10px 10px 20px;border-bottom: 1px solid #dadce0;margin: 0px;">Notas Pessoais</h3>
                                                    <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-top: 10px;">
                                                        <div style="display:inline-block; vertical-align:top;width: 100%;" ng-submit="search()">
                                                            <div class="input-group" style="width: 100%;">
                                                                <input type="text" class="gstyle" placeholder="Notas privadas" ng-model="query">
                                                                <span class="input-group-btn">
                                                                    <button type="button"><i class="entypo-search"></i></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="nota-da" ng-show="private_notes.length >0" ng-repeat="notes in private_notes | filter : query | limitTo : 10">
                                                            <div class="heading_dv_name">
                                                                  <div class="heading_left">
                                                                      <div class="user_img_dv" ng-if="notes.image">
                                                                          <img src=""  ng-src="{{ notes.image }}" class="img-circle" alt="{{ initials(notes.name) }}" height="40" width="40"/>
                                                                      </div>
                                                                      <div class="user_img_nam" ng-if="!notes.image">{{ initials(notes.name) }}</div>
                                                                      <label>{{ notes.name }}</label>
                                                                  </div>
                                                                  <div class="heading_right">
                                                                   {{ recieved.data_atualizacao | amUtc | amDateFormat:'DD MMMM YYYY' }}
                                                               </div>
                                                           </div>
                                                            <p>
                                                                {{notes.response}}
                                                            </p>
                                                            <div class="desct-p" ng-show="notes.valore.length > 0" ng-repeat="valor in notes.valore">
                                                                <label>{{valor.name}}</label>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>

                            <!--                            <div ng-if="show_popup_form" class="pedir-feedback envio-check">
                            
                                                  
                                                            <form method="" post="">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-xs-12">
                                                                        <label class="control-label">1. Em quais atividade voce ira focar nessa semana?</label>
                                                                    </div>
                            
                                                                    <div class="col-md-3 col-xs-12">
                                                                        <div class="filters_view pull-right aplicar-filtro-x c-drop">
                                                                            <select id="search-tipo" name="tipo" ng-model="searchTipo" ng-change="filterbyTipo();" class="select2 usuario" data-placeholder="Selecione tipo">
                                                                                <option value="-1" selected>Vincule Atividades</option>
                                                                                <option value="0">Meu Time</option>
                                                                                <option value="1">Meu Time</option>
                                                                                <option value="2">Meu Time Chave</option>
                                                                                <option value="3">Meu Time</option>
                                                                                <option value="4">Meu Time</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                            
                                                                    <div class="form-group col-xs-12">
                                                                        <textarea class="form-control" rows="4"></textarea>
                                                                    </div>
                            
                                                                    <div class="col-md-12  col-xs-12">
                                                                        <div class="usr-review">
                                                                            <div class="row">
                                                                                <div class="col-sm-9  col-xs-12 review-pl-0">
                                                                                    <h3>Enter em contato com 10 representantes comerciais</h3> 
                                                                                </div>
                                                                                <div class="col-sm-3 text-right">
                                                                                    <label class="label-danger">12 nov</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="usr-review">
                                                                            <div class="row">
                                                                                <div class="col-md-9 col-sm-3  col-xs-12 review-pl-0">
                                                                                    <h3>Enter em contato com 10 representantes comerciais</h3> 
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-2 text-right">
                                                                                    <label class="label-danger">12 nov</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="{{getProgressbarClass(30)}}"  style="background:#e97f93;color:white;border-radius:16px; position: relative;padding: 21px;width:calc(100% - 73px); float: left; margin-bottom: 20px;">
                                                                            <div style="width:100%;padding:9px 13px;background:transparent;color:white;border-radius:16px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:11">Promover competenies futuro do trabalho</div>
                                                                            <div style="width:30%;padding:12px;background:#f54a6a;color:white;border-radius:16px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:10" ></div>
                                                                        </div>
                                                                        <div class="mt-0" style="text-align: center; width: 73px;font-weight: bold;color: black;padding-top: 10px;float: left;">30%
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9  col-xs-12">
                                                                        <label class="control-label">2. Precisa da ajuda de alguem da equipe?</label>
                                                                    </div>
                            
                                                                    <div class="col-md-3  col-xs-12">
                                                                        <div class="filters_view pull-right aplicar-filtro-x c-drop">
                                                                            <select id="search-tipo" name="tipo" ng-model="searchTipo" ng-change="filterbyTipo();" class="select2 usuario" data-placeholder="Selecione tipo">
                                                                                <option value="-1" selected>Vincule pessoas</option>
                                                                                <option value="0">Meu Time</option>
                                                                                <option value="1">Meu Time</option>
                                                                                <option value="2">Meu Time Chave</option>
                                                                                <option value="3">Meu Time</option>
                                                                                <option value="4">Meu Time</option>
                                                                            </select>
                                                                        </div>
                                                                    </div> 
                            
                            
                                                                    <div class="form-group col-xs-12">
                                                                        <textarea class="form-control" rows="4"></textarea>
                                                                    </div> 
                            
                            
                                                                    <div class="col-xs-12">
                                                                        <div class="usr-review" style="padding: 10px 15px;">
                                                                            <div class="row">
                                                                                <div class="col-md-12  col-xs-12">
                                                                                    <img src="https://www.elofysistema.com.br/assets/img/87/150/51Y7TFe3RPBoYhUuSKfUY5ymlocUVwkwPefFGz1w.jpg" alt="">
                                                                                    <img src="https://www.elofysistema.com.br/assets/img/87/150/51Y7TFe3RPBoYhUuSKfUY5ymlocUVwkwPefFGz1w.jpg" alt=""> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                            
                                                                    <div class="col-xs-12">
                                                                        <label>3. Como esta sua engergia hoje para essa semana?</label> 
                                                                        <div class="col-md-12 prefil_rating"  ng-include="'heartRating'"></div>
                                                                    </div>
                            
                                                                    <div class="footer_box tabs-c-btn col-xs-12">
                                                                        <div class="left_footers" >
                                                                            <div class="button_sets">
                                                                                <div class="button_bar">
                                                                                    <label for="1s">
                                                                                        <input type="radio" id="1s" name="public" value="1" checked />
                                                                                        <span>Público</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="button_bar">
                                                                                    <label for="2s">
                                                                                        <input type="radio" id="2s" name="public" value="0">
                                                                                        <span>Privado &nbsp;</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="right_footers">
                                                                            <div class="form-group pull-right" >
                                                                                <button type="button" class="btn btn-white" data-dismiss="modal">Enviar</button>
                                                                                <button ng-if="questions[0].length > 0" type="submit" style="color: #0553df"> class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                            
                                                        </div>-->
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div  ng-show="timeline_active">
                                                        <!--<div style="display: flex; float: right;" class="m-left">
                                                            <div style="margin-top: 38px; margin-right: 15px; color: #787878 ;font-size: 14px;">Filtro : </div>
                                                            <div class="filters_view pull-right" style="width:220px;margin-top:23px;">
                                                                <select id="search-tipo" name="tipo" ng-model="searchTipo" ng-change="filterbyTipo();" class="select2 usuario" data-placeholder="Selecione tipo">
                                                                    <option value="-1" selected>Todos</option>
                                                                    <option value="0">Elogio</option>
                                                                    <option value="1" >Objetivo</option>
                                                                    <option value="2">Resultado Chave</option>
                                                                    <option value="3">Feedback</option>
                                                                    <option value="4">Atividades</option>
                                                                </select>
                                                            </div>
                                                        </div>-->
                                                        <div style="display: flex; float: right;" class="m-left">
                                                            <!--<div style="margin-top: 15px; margin-right: 15px;color: #787878;font-size: 14px;">Filtro : </div>-->
                                                            <div class="filters_view pull-right" style="width:170px;">
                                                                <select id="search-tipo" name="tipo" ng-model="searchTipo" class="select2 usuario" data-placeholder="Selecione tipo">
                                                                    <option value="-1" ng-selected="searchTipo == -1">Feed Completo</option>
                                                                    <option value="0" ng-selected="searchTipo == 0">Elogio</option>
                                                                    <!-- <option value="1" ng-selected="searchTipo == 1">Objetivo</option> -->
                                                                    <!-- <option value="2" ng-selected="searchTipo == 2">Resultado Chave</option> -->
                                                                    <!-- <option value="3" ng-selected="searchTipo == 3">Feedback</option> -->
                                                                    <!-- <option value="4" ng-selected="searchTipo == 4">Atividades</option> -->
                                                                    <option value="5" ng-selected="searchTipo == 5">Aniversário</option>
                                                                    <option value="6" ng-selected="searchTipo == 6">Publicação</option>
                                                                    <option value="7" ng-selected="searchTipo == 7">Novo funcionário</option>
                                                                    <option value="8" ng-selected="searchTipo == 8">Alteração de Cargo</option>
                                                                </select>
                                                            </div>
                                                        </div> 

                                                        <div class="clearfix"></div>
                                                        <!-- <div style="font-weight: bold; font-weight: 700;color: #00000061;">{{ specElo.date | amUtc | amDateFormat:'DD/MM/YYYY' }}</div> -->
                                                        <div id="elotab" class="" style="background:unset;box-shadow: none !important;outline: none;">
                                                            <div class="elos-list" style="margin-top:15px;">
                                                                <div ng-repeat="specElo in specEloslist" class="elo-item-group" ng-class="{ new : specElo.lido == 0 }">
                                                                    <div ng-if="searchTipo == - 1 || specElo.tipo.indexOf(searchTipo) > - 1" style="font-weight: bold;">{{ specElo.date | amUtc | amDateFormat:'DD/MM/YYYY' }}</div>
                                                                    <div ng-repeat="elo in specElo.specElos" class="elo-item elo-tipo-{{elo.tipo}}" ng-class="{ new : elo.lido == 0 }" style="margin-bottom:10px;margin-top:10px;background:white;" ng-if="searchTipo == - 1 || elo.tipo == searchTipo">
                                                                        <div class="elo-content">
                                                                            <div ng-if="elo.tipo == 5" class="birthday-icon"><i class="fa fa-birthday-cake"></i></div>
                                                                            <div ng-if="elo.tipo == 7" class="user-icon"><i class="fa fa-user"></i></div>
                                                                            <div ng-if="elo.tipo == 8" class="user-icon background-pink"><i class="fa fa-magic"></i></div>
                                                                            <div class="user-image">
                                                                                <img src="" ng-if="elo.usuario_responsavel.image" ng-src="{{ (elo.tipo != 5 && elo.tipo != 7 && elo.tipo != 8) ? elo.usuario_responsavel.image : elo.usuario_responsavel.md_image}}" class="img-circle" width="40" height="40" data-toggle="tooltip" data-placement="top" title="{{ elo.usuario_responsavel.name}}" />
                                                                                <span class="image-replace" ng-if="!elo.usuario_responsavel.image">{{ initials(elo.usuario_responsavel.name)}}</span>
                                                                            </div>
                                                                            <div class="elo-header">
                                                                                <span ng-if="elo.tipo == 5" class="deseje-parabens">Deseje um feliz aniversário para </span>
                                                                                <span class="usuario-responsavel">{{elo.usuario_responsavel.name}}</span> 
                                                                                <span ng-if="elo.tipo == 7" class="deseje-parabens"> ingressou na empresa hoje. Parabéns! </span>
                                                                                <span ng-if="elo.tipo == 8" class="deseje-parabens"> {{ elo.descricao_elogio}} </span>
                                                                                <span ng-if="elo.tipo == 5" class="deseje-parabens">!</span>
                                                                                <div class="dropdown pull-right ng-scope" style="display:inline-flex;" ng-if="(user.feed_admin=='1' || elo.usuario_responsavel.id == user.id) && elo.tipo !=5 && elo.tipo !=7 && elo.tipo !=8">
                                                                                    <a href="javascript:void(0)" class="btn btn-link btn-sm noshadow dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <i class="icon-ellipsis-vert" style="font-size: 13px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu pull-right">
                                                                                        <li>
                                                                                            <a href="javascript:void(0)" ng-click="editFeed(elo)">Editar</a>
                                                                                        </li>
                                                                                        
                                                                                        <li>
                                                                                            <a href="javascript:void(0)" ng-click="deleteFeed(elo)">Excluir</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elo-body">
                                                                                <div hashtagify term-click="tagTermClick($event)"    user-click="tagUserClick($event)" style="margin-bottom:15px; font-weight: 400;">
                                                                                    <!-- <p ng-if="elo.tipo != 7 && elo.tipo != 8" style="word-break: break-all; margin-bottom: 25px;">{{ elo.descricao_elogio}}</p> -->
                                                                                    <pre class="publication" ng-if="elo.tipo != 7 && elo.tipo != 8">{{ elo.descricao_elogio}}</pre>
                                                                                </div>
                                                                                <div ng-if="elo.imagens && elo.imagens.length > 0" class="gallery">
                                                                                    <img ng-repeat="img in elo.imagens" ng-class="{'hidden':$index != elo.galleryIndex}" ng-click="openCourselModal(elo.imagens, $index)" style="cursor: pointer;" src="{{img.url_image}}">
                                                                                    <i ng-if="elo.imagens.length > 1" class="fa fa-chevron-left" ng-click="moveEloGallery(elo, 'left')" style="cursor:pointer; position: absolute; top: 50%;"></i>
                                                                                    <i ng-if="elo.imagens.length > 1" class="fa fa-chevron-right" ng-click="moveEloGallery(elo, 'right')" style="cursor:pointer; position: absolute; top: 50%; right: 23px;"></i>
                                                                                </div>
                                                                                <div class="blueBox full-x">
                                                                                    <div  class="{{getProgressbarClass(elo.progresso)}}"  ng-if="elo.nome_entidade != null && elo.tipo != 3 && elo.progresso >= 80" style="width:calc(100% - 73px);color:white;border-radius:18px; position: relative;padding: 21px;    margin-bottom: 34px; ">
                                                                                        <div style="width:100%;padding:13px;background:transparent;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:11">{{ elo.nome_entidade}}</div>
                                                                                        <div style="width:{{ elo.progresso}}%;padding:12px;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:10" ></div>
                                                                                    </div>

                                                                                    <div class="{{getProgressbarClass(elo.progresso)}}" ng-if="elo.nome_entidade != null && elo.tipo != 3 && elo.progresso >= 50 && elo.progresso < 80" class="value-block" style="color:white;border-radius:18px; position: relative;padding: 21px;width:calc(100% - 73px);">
                                                                                        <div style="width:100%;padding:13px;background:transparent;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:11">{{ elo.nome_entidade}}</div>
                                                                                        <div style="width:{{ elo.progresso}}%;padding:12px;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:10" ></div>
                                                                                        <!-- <div style="width:{{ elo.progresso}}%;padding:12px;background:#f7d342;color:white;border-radius:18px;">{{ elo.nome_entidade}}</div> -->
                                                                                    </div>
                                                                                    <div class="{{getProgressbarClass(elo.progresso)}}" ng-if="elo.nome_entidade != null && elo.tipo != 3 && elo.progresso >= 0 && elo.progresso < 50" style="color:white;border-radius:18px; position: relative;padding: 21px;width:calc(100% - 73px);">
                                                                                        <div style="width:100%;padding:13px;background:transparent;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:11">{{ elo.nome_entidade}}</div>
                                                                                        <div style="width:{{ elo.progresso}}%;padding:12px;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:10" ></div>
                                                                                    </div>
                                                                                <!-- </div>   
                                                                                    <div class="blueBox full-x">  -->
                                                                                        <div  class="{{getProgressbarClass(elo.progresso)}}"  ng-repeat="nome_entidade in elo.nome_entidade_array" ng-if="elo.nome_entidade != null && elo.tipo == 3" class="m-full-block" style="margin-right:10px; border-radius: 16px; width: 100%;position: relative;    height: 40px;">

                                                                                            <div style="width:100%;padding:13px;background:transparent;color:white;border-radius:18px; position: absolute;top: -3px;left: 0px;z-index: 0;height: 100%;z-index:11">{{ elo.nome_entidade.split(';')[$index]}}</div>
                                                                                            <div ng-if="elo.progresso" style="width:{{elo.progresso}}%;padding:12px;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:10" ></div>
                                                                                            <div ng-if="!elo.progresso" style="width:100%;padding:19px;color:white;border-radius:18px; position: absolute;top: 0px;left: 0px;z-index: 0;height: 100%;z-index:10" ></div>
                                                                                            <!-- <div style="padding:10px;background:#832ade;color:white;border-radius:18px;     margin-top: 6px !important;">{{ elo.nome_entidade.split(';')[$index]}}</div> -->
                                                                                        </div>
                                                                                        <div ng-if="elo.progresso != null && elo.nome_entidade_array.length <= 1" class="mt-0 timeline-percent" style="text-align:center; width: 70px;margin-left:20px;margin-top:12px;font-weight:bold;color:black;padding-top: 10px;">{{ elo.progresso}} %
                                                                                        </div>
                                                                                        <div ng-if="elo.progresso != null && elo.nome_entidade_array.length > 1" class="mt-0" style="text-align:center; width: 130px;margin-left:20px;margin-top:12px;font-weight:bold;color:black;padding-top: 10px;">{{ elo.progresso}} %
                                                                                        </div>
                                                                                <!-- <div ng-if="elo.progresso != null" style="margin-left:20px;margin-top:12px;font-weight:bold;">
                                                                                        Editar
                                                                                    </div> -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="elo-footer">
                                                                                 <time class="timeago pull-right" datetime="{{ elo.data_atualizacao}}">{{ elo.data_atualizacao | timeAgo}}</time>
                                                                                <!--<span class="pull-right tipo-desc m-b" ng-if="elo.tipo == 0">Elogios</span>
                                                                                <span class="pull-right tipo-desc m-b" ng-if="elo.tipo == 1">Objetivo</span>
                                                                                <span class="pull-right tipo-desc m-b" ng-if="elo.tipo == 2">Resultado Chave</span>
                                                                                <span class="pull-right tipo-desc m-b" ng-if="elo.tipo == 3 && elo.nome_entidade_array.length == 0">Feedback</span>
                                                                                <span class="pull-right tipo-desc m-b" ng-if="elo.tipo == 3 && elo.nome_entidade_array.length > 0">Reconhecimento</span>                                            <span class="pull-right tipo-desc m-b" ng-if="elo.tipo == 4">Atividades</span>-->
                                                                                <span class="likes">
                                                                                    <i class="fa fa-heart" ng-class="{ liked: elo.i_liked > 0 }" ng-click="likeElo($event, elo)"></i>{{ elo.total_likes}}
                                                                                    <span class="like-container">
                                                                                        <span class="label" ng-if="elo.total_likes != 1" ng-mouseover="showLikes(elo)">curtidas</span>
                                                                                        <span class="label" ng-if="elo.total_likes == 1" ng-mouseover="showLikes(elo)">curtida</span>
                                                                                        <div class="like-box" ng-if="elo.total_likes > 0">
                                                                                            <span ng-if="!elo.likes || elo.likes.length == 0">carregando...</span>
                                                                                            <ul>
                                                                                                <li ng-repeat="name in elo.likes">{{ name.nome_usuario}}</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="comments">
                                                                                    <span ng-click="toggleShowComments($event, elo)">
                                                                                        <i class="fa fa-comment" ng-if="elo.total_comment == 0"></i>
                                                                                        <i class="fa fa-comment" ng-if="elo.total_comment > 0" style="color:blue;"></i>
                                                                                        {{ elo.total_comment}}
                                                                                        <span class="label" ng-if="elo.total_comment != 1">comentários</span>
                                                                                        <span class="label" ng-if="elo.total_comment == 1">comentário</span>
                                                                                    </span>
                                                                                    <form class="form-elo-comment" ng-submit="commentElo($event, elo)" ng-if="elo.showComments">
                                                                                        <mat-form-field>
                                                                                            <input matInput class="form-control" name="comment" placeholder="Digite seu comentário">
                                                                                        </mat-form-field>
                                                                                        <!--<textarea rows="1" name="comment" placeholder="Digite seu comentário"></textarea>-->
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

                                        <div class="br-section1" on-scroll-to-bottom="loadMoreElos()" ng-show="loadingElos" style=" text-align: center; margin-bottom: 10px;"><i class='icon-spinner animate-spin'></i> Carregando</div>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-3" style="float: right;">

                            <div class="elo_survey" ng-class="{'mt-20':user.elos != 1}">

                                <div class="row">

                                    <div class="col-sm-12">


                                       <div class="">
                                        <a href="#" ng-if="(!user.descricao_bio || user.descricao_bio == '') || (!user.image || user.image == '')" ng-click="editUserProfile()">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-user bg-blue"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Você<span style="font-weight: normal;"> já completou </span></h4> 
                                                    <p class="text-ellips">seu perfil pessoal?</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <div id="notificacao_padrao" ng-if="feedback_notification.length == 0 && feedback_reply_notification.length == 0 && birthdaysFromElos().length == 0 && !hasEloNotifications()" >
                                            <a href="#"  ng-click="change_timeline_mode('feed', -1)">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-rss bg-blue"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>Clique aqui<span style="font-weight: normal;"> para ir </span></h4> 
                                                        <p class="text-ellips">direto ao seu feed</p>    
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="birthday_notification_elo_card" ng-if=" birthdaysFromElos().length > 0" >
                                            <a href="#" ng-click="clickOnBirthdayNotification()">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-birthday-cake bg-dark-pink"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>{{ birthdaysFromElos()[0].usuario_responsavel.name | limitTo: 20}}{{birthdaysFromElos()[0].usuario_responsavel.name.length > 20 ? '...' : ''}}
                                                            <span ng-if="birthdaysFromElos().length > 1" style="font-weight: normal;"> e</span>
                                                        </h4>
                                                        <p ng-if="birthdaysFromElos().length == 1" class="text-ellips">está de aniversário</p>
                                                        <p ng-if="birthdaysFromElos().length > 1" class="text-ellips">outros estão de aniversário</p>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div ng-repeat = "nf in feedback_notification" id="_notification_elo_card" >
                                            <a href="#" ng-click="updateFeedbackNotification(nf);">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-star bg-blue"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>{{nf.nome_usuario}}</h4> 
                                                        <p class="text-ellips">enviou um feedback</p>    
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div ng-repeat = "nf in feedback_reply_notification">
                                            <a href="#" ng-click="updateFeedbackReplyNotification(nf);">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-star bg-blue"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>{{nf.nome_usuario}}</h4> 
                                                        <p class="text-ellips">respondeu a um feedback</p>    
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div ng-repeat="notification in notifications | filter: {type:'elo'} |filter: {lido:'0'} | filter: filterElotypes" id="notification_elo_{{notification.id}}">
                                            <a href="#" ng-click="clickOnEloNotification($event, notification.tipo, 'notification_elo_'+notification.id)">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span ng-if="notification.tipo == 0"><i class="fa fa-heart bg-dark-pink"></i></span>
                                                        <span ng-if="notification.tipo == 7"><i class="fa fa-user bg-blue"></i></span>
                                                        <span ng-if="notification.tipo == 8"><i class="fa fa-magic bg-pink"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>{{notification.usuario_responsavel.name}}</h4>
                                                        <p ng-if="notification.tipo == 0" class="text-ellips">lhe enviou um elogio</p>
                                                        <p ng-if="notification.tipo == 7" class="text-ellips">ingressou na empresa</p>
                                                        <p ng-if="notification.tipo == 8" class="text-ellips">teve seu cargo alterado</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div ng-repeat="notification in notifications | filter: {type:'new_likes'} " >
                                            <a href="#" ng-click="clickOnLikeNotification($event,'feed', notification.tipo, notification.id)">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-thumbs-up bg-dark-pink"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>Você</h4>
                                                        <p class="text-ellips">recebeu novas curtidas</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div ng-repeat="notification in notifications | filter: {type:'new_comments'} " >
                                            <a href="#" ng-click="change_timeline_mode('feed', notification.tipo, notification.id)">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-comment bg-dark-pink"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>Você</h4>
                                                        <p class="text-ellips">recebeu novos comentários</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div ng-show="user.empresa.workflow == 1" ng-repeat="notification in notifications | filter: {type:'new_okrs_workflow'} " >
                                            <a href="<?php echo base_url() ?>okr?aba_pendencias=1">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-check bg-pink"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>Você possui objetivos</h4>
                                                        <p class="text-ellips">aguardando aprovação.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div  ng-repeat="notification in notifications | filter: {type:'new_okrs_approved'} " >
                                            <a href="<?php echo base_url() ?>okr" ng-click="marcarOkrAprovadoComoLido(user.id);">
                                                <div class="ng-right-block notification-block row">
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-check bg-blue"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>Objetivos aprovados</h4>
                                                        <p class="text-ellips">pelo seu gestor.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div  ng-repeat="notification in notifications | filter: {type:'new_okrs_repproved'} " >
                                            <a href="<?php echo base_url() ?>okr" ng-click="marcarOkrReprovadoComoLido(user.id);">
                                                <div class="ng-right-block notification-block row" >
                                                    <div class="col-md-3">
                                                        <span><i class="fa fa-close bg-pink"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left: 20px;">
                                                        <h4>Objetivos reprovados</h4>
                                                        <p class="text-ellips">pelo seu gestor.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <!-- comment fixed notificatoins -->
                                        <!-- <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-birthday-cake bg-dark-pink"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Jéssica Pearson</h4> 
                                                    <p class="text-ellips">Está de Aniversário</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-map-marker bg-blue"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Harvey Specter</h4> 
                                                    <p class="text-ellips">Publicou um Checkin</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-heart bg-pink"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Louis Litt</h4> 
                                                    <p class="text-ellips">Enviou um Elogio</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-birthday-cake bg-dark-pink"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Jéssica Pearson</h4> 
                                                    <p class="text-ellips">Está de Aniversário</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-map-marker bg-blue"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Harvey Specter</h4> 
                                                    <p class="text-ellips">Publicou um Checkin</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-heart bg-pink"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Louis Litt</h4> 
                                                    <p class="text-ellips">Enviou um Elogio</p>    
                                                </div>
                                            </div>
                                        </a> -->
                                        <!-- comment fixed notificatoins end -->

                                        <!--<a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-trophy bg-light-green"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <h4>Johnatan Lew</h4> 
                                                    <p class="text-ellips">Acesse e responda as avaliações de.</p>    
                                                </div>
                                            </div>
                                        </a>-->
                                        <!--<a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-heart bg-dark-pink"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <h4>Johnatan Lew</h4> 
                                                    <p class="text-ellips">Acesse e responda as avaliações de.</p>    
                                                </div>
                                            </div>
                                        </a>-->
                                       <!-- <a href="#">

                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-map-marker bg-blue"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <h4>Johnatan Lew</h4> 
                                                    <p class="text-ellips">Acesse e responda as avaliações de.</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-heart bg-pink"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <h4>Johnatan Lew</h4> 
                                                    <p class="text-ellips">Acesse e responda as avaliações de.</p>    
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-trophy bg-light-green"></i></span>
                                                </div>
                                                <div class="col-md-9">
                                                    <h4>Johnatan Lew</h4> 
                                                    <p class="text-ellips">Acesse e responda as avaliações de.</p>    
                                                </div>
                                            </div>
                                        </a>-->
                                        <!-- comment fixed notificatoins -->
                                        <!-- <a href="#">
                                            <div class="ng-right-block notification-block row">
                                                <div class="col-md-3">
                                                    <span><i class="fa fa-check-circle bg-blue"></i></span>
                                                </div>
                                                <div class="col-md-9" style="padding-left: 20px;">
                                                    <h4>Mike Ross</h4> 
                                                    <p class="text-ellips">Comentou em um objetivo</p>    
                                                </div>
                                            </div>
                                        </a> -->
                                        <!-- comment fixed notificatoins end -->

                                    <div class="stats">

                                        <div class="sidebar_widget quick_survey smily-areas" ng-if="quick_survey != ''">
                                                <!-- <div class="sidebar_widget_heading">
                                                    {{quick_survey.nome_pesquisa}} <span class="figures">{{initial_survey}}/{{total_questions?total_questions:quick_survey.total_from}}</span>
                                                </div> -->
                                                <div class="dblock_body">
                                                    <form id="new_quick_servey" method="post" >
                                                        <input type="hidden" name="questioerio_id" value="{{quick_survey.id_questionario}}">
                                                        <input type="hidden" name="id_pesquisa" value="{{quick_survey.id_pesquisa}}">
                                                        <div class="row survey-imoji-container" ng-if="quick_survey.questions != ''">
                                                            <div class="col-md-12" ng-if="quick_survey.questions.type == 'e'" ng-include="'starRatingSurvey'"></div>
                                                            <div class="col-md-12" ng-if="quick_survey.questions.type == 'c'" ng-include="'heartRatingSurvey'"></div>
                                                            <div class="col-md-12" ng-if="quick_survey.questions.type == 'i'" ng-include="'emojiRatingSurvey'"></div>
                                                            <div class="col-md-12" ng-if="quick_survey.questions.type == 'f'" ng-include="'favorRatingSurvey'"></div>
                                                            <div class="col-md-12" ng-if="quick_survey.questions.type == 'o'" ng-include="'multipleAnswerSurvey'"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </form> 
                                                    <div class="clear"></div>
                                                    <div class="smile-btn">
                                                        <a href="javascript:void(0)" class="next_survey_btn" ng-click="giveQuickSurvey()">{{ quick_survey.total_from > 1?"Enviar e ir para próxima pesquisa":"Enviar" }}</a></div>
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
                                            <!-- <div style="display: flex; float: right;" class="m-left">
                                                <div style="margin-top: 32px; margin-right: 15px; color: #787878;font-size: 16px;">Filtro : </div>
                                                <div class="filters_view pull-right" style="width:180px;margin-top:20px;">
                                                    <select id="search-tipo" name="tipo" ng-model="searchTipo" ng-change="filterbyTipo();" class="select2 usuario" data-placeholder="Selecione tipo">
                                                        <option value="-1" selected>Só eu</option>
                                                        <option value="0">Elogio</option>
                                                        <option value="1" >Objetivo</option>
                                                        <option value="2">Resultado Chave</option>
                                                        <option value="3">Feedback</option>
                                                        <option value="4">Atividades</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="clearfix"></div>
                                            
                                        </div>

                                                            </div>

                                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
            <!--welcome_user_box END-->
        </div>

    </div>
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
                                        <div class=""><span class="round yellow"><i class="fa fa-calculator"></i></span> Competências Comportamentais</div>
                                        <br>
                                    </div>
                                    <div class="panel-options">
                                        <table class="table table-bordered" id="valores-table">
                                            <tbody>
                                                <tr>
                                                    <th>Comportamento</th>
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
                                <div class="dblock_body carrier_block" id="carrier_block_hgt_activities">
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
                                        <li role="presentation" class="tab-popups active"><a href="#sectionfirst1" aria-controls="home" role="tab" data-toggle="tab">Editar Perfil</a></li>
                                        <li class="tab-popups" role="presentation"><a href="#Sectionsecond2" aria-controls="profile" role="tab" data-toggle="tab">Mudar senha</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="sectionfirst1">
                                            <form id="form-user" style="margin-bottom:0px;">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="user-name" class="control-label">Nome</label>
                                                            <input id="user-name" name="nome" type="text" class="form-control" value="{{ userDetail.name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="user-birthday" class="control-label">Aniversário</label>
                                                            <div class="input-group">
                                                                <input id="user-birthday" name="birthday" type="text" class="form-control data" value="{{ userDetail.nascimento || '' }}">
                                                                <div class="input-group-addon"> <a href="#"><i class="form-calendar"></i></a> </div>
                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <?php if ($this->session->userdata('email_google') == null) {?>
                                                                <a href="<?php echo GOOGLE_LOGIN_URL ?>" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/googleplus.png" alt="google" class="loginlogo"><span class="verticleshift"> Conectar conta Google </span> </a>
                                                            <?php } else {?>
                                                                <a href="javascript:void(0)" ng-click="removeSocialAccount('email_google')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/googleplus.png" alt="google" class="loginlogo"><span class="verticleshift"> Desconectar conta Google </span> </a>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <?php if ($this->session->userdata('email_linkedin') == null) {?>
                                                                <a href="<?php echo base_url('linkedin_login') ?>" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/linkedin.png" alt="google" class="loginlogo"><span class="verticleshift"> Conectar conta Linkedin </span> </a>
                                                            <?php } else {?>
                                                                <a href="javascript:void(0)" ng-click="removeSocialAccount('email_linkedin')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/linkedin.png" alt="linkedin" class="loginlogo"><span class="verticleshift"> Desconectar conta Linkedin </span> </a>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <?php if ($this->session->userdata('email_slack') == null) {?>
                                                                <a href="https://slack.com/oauth/authorize?client_id=<?php echo SLACK_API_TOKEN ?>&scope=<?php echo SLACK_SCOPE; ?>&redirect_uri=<?php echo SLACK_REDIRECT_URL; ?>" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/slack.png" alt="google" class="loginlogo"><span class="verticleshift"> Conectar conta Slack</span> </a>
                                                            <?php } else {?>
                                                                <a href="javascript:void(0)" ng-click="removeSocialAccount('email_slack')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/slack.png" alt="slack" class="loginlogo"><span class="verticleshift"> Desconectar conta Slack </span> </a>
                                                            <?php }?>
                                                        </div>
                                                    </div>

                                                            <!-- OUTLOOK 
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <?php if ($this->session->userdata('email_outlook') == null) {?>
                                                                <a href="https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=<?php echo OUTLOOK_CLIENT_ID;?>&scope=<?php echo OUTLOOK_SCOPE;?>&response_type=code&redirect_uri=<?php echo OUTLOOK_REDIRECT_URL;?>&response_mode=query" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/outlook.png" alt="google" class="loginlogo"><span class="verticleshift"> Connect outlook account</span> </a> 

                                                                <?php } else {?>
                                                                <a href="javascript:void(0)" ng-click="removeSocialAccount('email_outlook')" class="login-form-btn-default"><img src="<?php echo base_url() ?>assets/portal/img/outlook.png" alt="outlook" class="loginlogo"><span class="verticleshift"> Disconnect outlook account</span> </a>
                                                                <?php }?>
                                                            </div>
                                                        </div> OUTLOOK -->


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
                                                        <div class="col-md-12">
                                                            <p class="error-message text-danger pull-left hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
                                                            <div class="modalBotoes pull-right">
                                                                <button class="mdc-button mdc-fechar" data-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="Sectionsecond2">
                                                <form id="form-user-password" class="modal-content" style="margin-bottom:0px;">
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
                                                            <div class="modalBotoes pull-right">
                                                                <button type="button" class="btn fechar" data-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="btn salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando" ng-click="changeUserPassword()">Mudar senha</button>
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
                            <div class="row" ng-repeat="questionerio in questions[0]" ng-if="questions[0].length > 0">
                                <div class="col-md-12" ng-if="questionerio.type == 'q'" ng-include="'textQuestion'"></div>
                                <div class="col-md-12" ng-if="questionerio.type == 'e'" ng-include="'starRating'"></div>
                                <div class="col-md-12" ng-if="questionerio.type == 'c'" ng-include="'heartRating'"></div>
                                <div class="col-md-12" ng-if="questionerio.type == 'o'" ng-include="'multipleAnswer'"></div>
                            </div>
                            <div class="row" ng-if="questions[0].length < 1">
                                <div class="col-md-12" >
                                    <div class="customs_labels"><strong>Não foram encontradas perguntas.</strong></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="footer_box">
                                <div class="left_footers" >
                                    <div class="button_sets" ng-if="questions[0].length > 0">
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
                                    <div class="modalBotoes pull-right" >
                                        <!--<button ng-click="showOnlyBanner()" type="button" class="btn fechar" data-dismiss="modal">Fechar</button>
                                        <button ng-if="questions[0].length > 0" type="submit" class="btn salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar </button>-->

                                        <button ng-click="showOnlyBanner()" class="mdc-button mdc-fechar" data-dismiss="modal">Fechar</button>
                                        <button ng-if="questions[0].length > 0" type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>        
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
                                        <select class="objectives_updates" data-question-id="{{questionerio.id_pergunta}}" >
                                            <option value="">Vincule Objetivos</option>
                                            <option ng-repeat="tatic in updateprofiletatics" value="{{tatic.id}}">{{tatic.title}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="answers[text_answer][{{questionerio.id_pergunta}}][id_questionario]" ng-value="{{questionerio.id_questionario}}">
                            <textarea name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Descreva sua resposta aqui" class="mb0"></textarea>
                            <div class="clear h-10"></div>
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
                        </script>
                        <script type="text/ng-template" id="multipleAnswer">
                            <label>{{questionerio.question}}</label>
                            <div class="obj-select">
                                <select class="objectives_updates" data-question-id="{{questionerio.id_pergunta}}" >
                                    <option value="">Vincule Objetivos</option>
                                    <option ng-repeat="tatic in updateprofiletatics" value="{{tatic.id}}">{{tatic.title}}</option>
                                </select>

                            </div>
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
                        <script type="text/ng-template" id="feedback_comment_view">
                            <div class="col-md-12 col-sm-12" style="padding:0px; margin-bottom:0px;border-top:1px solid #dadce0;">
                                <div class="feedback-review" ng-if="recieved.comments.length>0" style="overflow-y: auto;max-height: 140px;">
                                    <div ng-repeat="comment in recieved.comments">
                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                            <img src="{{comment.url_image}}" alt="">  
                    </div>
                                        <div class="col-md-2 col-sm-3 col-xs-3 review-pl-0">
                                            <h3>{{comment.nome_usuario}}</h3> 
                </div>
                                        <div class="col-md-7 col-sm-6 col-xs-6 review-pl-0">
                                            <p>{{comment.comentario}}</p> 
            </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                                            <p>{{comment.commentdate}}</p>
        </div>
    </div>
                                </div>                                               
                                <div class="feedback-reply" ng-if="recieved.counts==0">
                                    <div class="col-sm-1 col-xs-1">
                                        <img ng-src="{{ userDetailImage?userDetailImage:user.md_image }}" alt="" style="width:40px;height: 40px;">  
                                    </div>
                                    <div class="col-sm-11 col-xs-11 review-pl-0">
                                        <div class="form-group" style="padding-left:10px;">
                                            <img ng-src="<?php echo base_url() ?>assets/portal/img/ico_send_buttom_grey.png" style="position: absolute;right: 25px;top: 6px;" ng-click="addFeedbackComment(recieved)">
                                            <input type="text" id="feedback_comment_{{recieved.id}}" style="border-radius: 30px;border:none;" name="" placeholder="" value="" class="gstyle">
                                        </div> 
                                    </div>
                            </div>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="youTimeModal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title">You Time</h4>
                </div>
                <div class="modal-body modal-body-popup" style="padding: 10px;">
                    <div class="model_bod">
                        <form id="form_youtime" method="post">
                            <div class="autalizacao-body overflow_dv" style="min-height: 500px;">
                                <div class="row" style="margin: 0px;" ng-repeat="questionerio in questions[0]" ng-if="questions[0].length > 0">
                                    <div class="col-md-12" ng-if="questionerio.type == 'q'" ng-include="'textYouTime'"></div>
                                    <div class="col-md-12" ng-if="questionerio.type == 'e'" ng-include="'starYouTime'"></div>
                                    <div class="col-md-12" ng-if="questionerio.type == 'c'" ng-include="'heartYouTime'"></div>
                                    <div class="col-md-12" ng-if="questionerio.type == 't'" ng-include="'compYouTime'"></div>
                                </div>
                                <div class="row" ng-if="questions[0].length < 1">
                                    <div class="col-md-12" >
                                        <div class="customs_labels"><strong>Não foram encontradas perguntas.</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div style="margin-bottom: 25px;">&nbsp;
                                <div class="right_footers">
                                    <div class="form-group pull-right" >
                                        <button ng-click="" type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                                       
                                        <button ng-if="selectedYouTimeNotification.situacao == 0" ng-click="confirmYouTime()" type="button" class="btn btn-primary salvar">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                        <script type="text/ng-template" id="compYouTime">
                            <div ng-repeat="competencia in questions_competencias_array[questionerio.id_pergunta]" style="margin-top: 10px;">
                                <label class="control-label">{{competencia.comp_name}}</label>
                                <textarea name="answers[competencia][{{questionerio.id_pergunta}}][descriptions][]" placeholder="Descreva sua resposta aqui" class="mb0" disabled>{{competencia.answer}}</textarea>
                                <div class="clear h-10"></div>
                            </div>
                        </script>
                        <script type="text/ng-template" id="textYouTime">
                            <div class="customs_labels bottom-space">
                                <div class="col-md-8">
                                    <div class="update-label">
                                        <label>{{questionerio.question}}</label>
                                    </div>
                                </div>
                            </div>
                            <textarea name="answers[text_answer][{{questionerio.id_pergunta}}][value]" placeholder="Descreva sua resposta aqui" class="mb0" disabled>{{textAnswers[questionerio.id_pergunta]}}</textarea>
                            <div class="clear h-10"></div>
                        </script>
                        <script type="text/ng-template" id="starYouTime">
                            <div class="custom_label_dv">
                                <label>{{questionerio.question}}</label>
                                <div class="custom_radio_lable">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_1">
                                        <span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_2">
                                        <span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_3">
                                        <span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_4">
                                        <span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_5">
                                        <span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_6">
                                        <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_7">
                                        <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_8">
                                        <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_9">
                                        <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="ysm_rad_{{questionerio.id_pergunta}}_10">
                                        <span class="span_{{questionerio.id_pergunta}}_10">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="clear h-10"></div>
                            </div>
                        </script>
                        <script type="text/ng-template" id="heartYouTime">
                            <div class="custom_label_dv star">
                                <label>{{questionerio.question}}</label>

                                <div class="custom_radio_lable">
                                    <label for="smhr_rad21_{{questionerio.id_pergunta}}_1">
                                        <span class="span_{{questionerio.id_pergunta}}_1">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad22_{{questionerio.id_pergunta}}_2">
                                        <span class="span_{{questionerio.id_pergunta}}_2">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad23_{{questionerio.id_pergunta}}_3">
                                        <span class="span_{{questionerio.id_pergunta}}_3">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad24_{{questionerio.id_pergunta}}_4">
                                        <span class="span_{{questionerio.id_pergunta}}_4">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_5">
                                        <span class="span_{{questionerio.id_pergunta}}_5">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_6">
                                        <span class="span_{{questionerio.id_pergunta}}_6">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_7">
                                        <span class="span_{{questionerio.id_pergunta}}_7">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_8">
                                        <span class="span_{{questionerio.id_pergunta}}_8">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_9">
                                        <span class="span_{{questionerio.id_pergunta}}_9">&nbsp;</span>
                                    </label>
                                </div>
                                <div class="custom_radio_lable" ng-if="questionerio.escala == 10">
                                    <label for="smhr_rad25_{{questionerio.id_pergunta}}_10">
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
                                            <option ng-repeat="user in users" ng-value="{{ user.id}}">{{ user.name}}</option>
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
                                            <option ng-repeat="team in teams" ng-value="{{ team.id}}">{{ team.name}}</option>
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
                                            <option ng-repeat="item in objectives" ng-value="{{ item.id}}">{{ item.title}}</option>
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
                <div class="modalBotoes pull-right">
                    <button type="button" class="btn fechar" data-dismiss="modal">{{ "UI.CLOSE" | translate }}</button>
                    <button type="submit" class="btn salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ "UI.SAVE" | translate }}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Model Confirm -->

    <!-- Modal Coursel -->
    <div class="modal fade and carousel slide" id="feed-coursel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body" style="padding: 0px;">
              <ol class="carousel-indicators" ng-if="feedImagesForCoursel.length > 1">
                <li ng-repeat = "feedImage in feedImagesForCoursel" data-target="#feed-coursel" data-slide-to="{{$index}}" ng-class="{'active':$index == selectedFeedCourselIndex}"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item" ng-repeat = "feedImage in feedImagesForCoursel" ng-class="{'active':$index == selectedFeedCourselIndex}">
                    <!-- <img src="http://placehold.it/900x500/777/" alt="First slide"> -->
                  <img src="" ng-src="{{ feedImage.url_image }}" alt="First slide" style="width: 100%;">
                </div>
              </div>
              <a class="left carousel-control" ng-if="feedImagesForCoursel.length > 1" href="#feed-coursel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" ng-if="feedImagesForCoursel.length > 1" href="#feed-coursel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div><!-- /.modal-body -->
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <!-- Modal Coursel End -->

  <!-- Modal delete feed -->
  <div class="modal fade in" id="feed-delete">
        <div class="modal-dialog">
            <form id="delete_feed_form" class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Excluir Postagem</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span>Você tem certeza que deseja excluir?</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBotoes pull-right">
                    <button type="button" class="btn fechar" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn salvar" id="deleteFeedAction" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Continuar</button>
                </div>
            </form>
        </div>
    </div>
  <!-- Modal delete feed End -->

  <!-- Modal edit feed -->
    <div class="modal fade" id="feed-edit" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title">Edição de Conteúdo</h4>
                </div>
                <div class="modal-body">
                    <form id="form-edit-feed">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <textarea id="descricao_elogio" name="descricao_elogio" rows="3" class="form-control" placeholder="Digite algo" style="margin: 0px;min-height: 100px;">{{editingFeed.descricao_elogio}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modalBotoes pull-right">
                    <button type="button" class="btn fechar" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn salvar" ng-click="edit_feed_action()" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal edit feed End -->

</div>

 <script>
        setTimeout(function(){
            $('#form-elo textarea').focus();
            $('#form-elo textarea').show();

            $('#form-elo textarea').on("focus", function(){
                $('#form-elo').addClass("focus");
            });

            $('#form-elo textarea').on("blur", function(){
                $('#form-elo').removeClass("focus");
            });

        }, 2000);
    </script>
<?php
$obj = &get_instance();
$social_logins = $obj->session->userdata('check_social_logins');

if (!empty($social_logins) && isset($social_logins['image']) && !empty($social_logins['image'])) {
    $obj->session->unset_userdata('check_social_logins', '');
    ?>
    <script>
        setTimeout(function(){
            $('#profilepic-modal').modal('show');
            // $(document)
         //    .one('focus.autoExpand', 'textarea.autoExpand', function(){
         //     console.log("one focus.autoExpand");
         //        var savedValue = this.value;
         //        this.value = '';
         //        this.baseScrollHeight = this.scrollHeight;
         //        this.value = savedValue;
         //    })
         //    .on('input.autoExpand', 'textarea.autoExpand', function(){
         //     console.log("on input.autoExpand");
         //        var minRows = this.getAttribute('data-min-rows')|0, rows;
         //        this.rows = minRows;
         //        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
         //        this.rows = minRows + rows;
         //    });
        }, 1000);
    </script>
<?php }
?>

