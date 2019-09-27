<div ng-controller="feedbackCtrl" class="feedbackView">
    <div>


        <hr>

        <div class="form_add_row">
            <div class="col-sm-12">

                <div class="dblock">
                    <div class="dblock_head">
                        <h2 ng-if="action==''" class="dheading">{{ "FEEDBACK.TITLE"| translate }}</h2>
                        <h2 ng-if="action=='give'" class="dheading">{{ "FEEDBACK.GIVE_FEEDBACK"| translate }}</h2>
                        <h2 ng-if="action=='ask'" class="dheading">{{ "FEEDBACK.ASK_FEEDBACK"| translate }}</h2>
                        <h2 ng-if="action=='notes'" class="dheading">{{ "FEEDBACK.WRITE_NOTE"| translate }}</h2>
                        <h2 ng-if="action=='complete'" class="dheading">{{ "FEEDBACK.THANKS"| translate }}</h2>
                </div>
                    <div class="dblock_body"><br>



                        <div ng-if="action==''" id="feedback-options" class="actionview fade">
                            <h2>{{ "FEEDBACK.MAIN_QUESTION"| translate }}</h2>
                            <a href="#!/give">{{ "FEEDBACK.GIVE_FEEDBACK" | translate}}</a>
                            <a href="#!/ask">{{ "FEEDBACK.ASK_FEEDBACK" | translate}}</a>
                            <a href="#!/notes">{{ "FEEDBACK.WRITE_NOTE" | translate}}</a>
                        </div>

                        <div ng-if="action=='give'" class="actionview fade" id="give-feedback-pane">
                            <form id="give_feedback">
                                <input ng-if="feedbackDetail" type="hidden" id="id_feedback" name="id_feedback" value="{{feedbackDetail.id}}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feedbacktouser" class="control-label">{{ "MEU_PERFIL.FOR_WHOM_THE_FEEDBACK_IS" | translate }} <i class="fa fa-info-circle" ng-init="infoTipUserName=false" ng-click="infoTipUserName=!infoTipUserName"></i></label>
                                            <select name="feedbacktouser" id="feedbacktouser" ng-model="destino_id" multiple="multiple" class="form-control multiple" ng-disabled="feedbackDetail && feedbackDetail != '' ">
                                                <option value="{{searchuser.id}}" ng-repeat="searchuser in adminusuarios" >{{ searchuser.name }} </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipUserName, 'fade': true}">Você pode escrever um feedback para uma ou mais pessoas por vez</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feedbacktouser" class="control-label">Qual o tipo do seu feedback? <i class="fa fa-info-circle" ng-init="infoTipType=false" ng-click="infoTipType=!infoTipType"></i></label>
                                            <div class="custom_radio">
                                                <div class="radio_dv">
                                                    <input type="radio" id="radioR" name="tipoFeedback" value="r" required="" aria-required="true" checked=checked}>
                                                    <label for="radioR" class="ng-binding">Reconhecimento</label>
                                                </div>
                                                <div class="radio_dv">
                                                    <input type="radio" id="radioM" name="tipoFeedback" value="m" required="" aria-required="true">
                                                    <label for="radioM" class="ng-binding">Oportunidade de melhoria</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipType, 'fade': true}">O tipo de feedback é uma informação que não será publicada para o usuário final</div>
                                    </div>

                                </div>
                                <div class="row" ng-if="feedbackDetail.solicitar && feedbackDetail.solicitar != ''">                                        
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feedback_request" class="control-label">Solicitação de feedback</label>
                                            <span class="fakeInput">"{{feedbackDetail.solicitar}}"</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipFeedbackGivenAnswer, 'fade': true}">Ao conceder um feedback é importante que você procure ser claro, direto e objetivo</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feedback_given_answer" class="control-label">{{ "MEU_PERFIL.WHATS_YOUR_FEEDBACK" | translate }} <i class="fa fa-info-circle" ng-init="infoTipFeedbackGivenAnswer=false" ng-click="infoTipFeedbackGivenAnswer=!infoTipFeedbackGivenAnswer"></i></label>
                                            <textarea  name="feedback_given_answer" id="feedback_given_answer" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipFeedbackGivenAnswer, 'fade': true}">Ao conceder um feedback é importante que você procure ser claro, direto e objetivo</div>
                                    </div>

                                </div>
                                <div class="row" ng-show="valores.length > 0">
                                    <div class="col-md-12">
                                        <label>{{ "FEEDBACK.WANT_TO_CONNECT_ONE_OR_MORE" | translate }} <a href="javascript:void(0)" ng-click="viewValuesempresa()">{{ "FEEDBACK.VALUES_QUESTION" | translate }}</a></label>
                                        <table class="form-group values-table">
                                            <tr class="valores_dv" ng-repeat="valore in valores">
                                                <td class="col-md-3">
                                                    <label class="btn_valoresa valores_dv_checker" ng-click="changeValore(valore)">
                                                        <input type="checkbox" name="valore[]" autocomplete="off" ng-value="{{valore.id}}" ng-model="valore.checked" >
                                                        <span><i class="fa fa-check-circle"></i> {{valore.name}}</span>
                                                    </label>
                                                </td>
                                                <td class="col-md-5">
                                                    <p ng-bind-html="valore.description"></p>
                                                </td>
                                                <td class="col-md-4">
                                                    <div ng-init="valore.value = -1"></div> 
                                                    <div ng-show="valore.checked" class="star-rating" star-rating rating-value="valore" rating-enabled="true" val-id="valore.id" rating-type="emoji" data-min="0" data-max="2"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="modalBotoes pull-right" >

                                            <!--JEFERSON-->
                                            <a mat-raised-button href="<?= base_url().'feedback' ?>" class="mdc-button mdc-fechar">Voltar</a>
                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ "MEU_PERFIL.SHARE_FEEDBACK" | translate }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div ng-if="action=='ask'" class="actionview fade" id="request-feedback-pane">
                            <form id="request_feedback">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="user-name" class="control-label">{{ "MEU_PERFIL.ASK_FEEDBACK_FOR" | translate }} <i class="fa fa-info-circle" ng-init="infoTipUserName=false" ng-click="infoTipUserName=!infoTipUserName"></i></label>
                                            <select id="requestuser" name="requestuser" id="requestuser" multiple="multiple" class="form-control multiple" required>
                                                <option value="{{searchuser.id}}" ng-repeat="searchuser in adminusuarios">{{ searchuser.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipUserName, 'fade': true}">Você pode escrever um feedback para uma pessoa por vez</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="user-name" class="control-label">{{ "FEEDBACK.MESSAGE" | translate }} <i class="fa fa-info-circle" ng-init="infoTipFeedbackGivenAnswer=false" ng-click="infoTipFeedbackGivenAnswer=!infoTipFeedbackGivenAnswer"></i></label>
                                            <textarea  name="request_description" id="request_description" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipFeedbackGivenAnswer, 'fade': true}">Aqui você deve escrever a mensagem para a pessoa que está sendo solicitada a responder o feedback</div>
                                    </div>
                                </div><div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="input-label" for="prazo">Prazo de resposta <i class="fa fa-info-circle" ng-init="infoTipFeedbackGivenDeadline=false" ng-click="infoTipFeedbackGivenDeadline=!infoTipFeedbackGivenDeadline"></i></label>
                                            <div class="filters_view">
                                                <input id="prazo" name="prazo" type="text" class="form-control" ng-model="prazo" required placeholder="Ate">
                                                <div class="input-group-addon hide"> <a href="#"><i class="entypo-calendar"></i></a> </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipFeedbackGivenDeadline, 'fade': true}">Insira uma data de prazo de sua expectativa para a resposta</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="modalBotoes pull-right" >
                                            <!--JEFERSON-->
                                            <a mat-raised-button href="<?= base_url().'feedback' ?>" class="mdc-button mdc-fechar">Voltar</a>
                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ "MEU_PERFIL.ASK_FEEDBACK" | translate }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div ng-if="action=='notes'" class="actionview fade" id="give-feedback-pane">
                            <form id="private_notes">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="privateto" class="control-label">Nota privada para? <i class="fa fa-info-circle" ng-init="infoTipUserName=false" ng-click="infoTipUserName=!infoTipUserName"></i></label>
                                            <select id="privateto" name="privateto" id="privateto" multiple="multiple" class="form-control multiple" required>
                                                <option value="{{searchuser.id}}" ng-repeat="searchuser in adminusuarios">{{ searchuser.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipUserName, 'fade': true}">Você pode escrever uma nota para uma pessoa por vez</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="user-name" class="control-label">O que deseja registrar? <i class="fa fa-info-circle" ng-init="infoTipFeedbackGivenAnswer=false" ng-click="infoTipFeedbackGivenAnswer=!infoTipFeedbackGivenAnswer"></i></label>
                                            <textarea  name="notes_given_answer" id="notes_given_answer" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="tip" ng-class="{'in': infoTipFeedbackGivenAnswer, 'fade': true}">É uma nota privada, sinta-se a vontade para escrever</div>
                                    </div>

                                </div>
                                <div class="row" ng-show="valores.length > 0">
                                    <div class="col-md-12">
                                        <label>{{ "FEEDBACK.WANT_TO_CONNECT_ONE_OR_MORE" | translate }} <a href="javascript:void(0)" ng-click="viewValuesempresa()">{{ "FEEDBACK.VALUES_QUESTION" | translate }}</a></label>
                                        <table class="form-group values-table">
                                            <tr class="valores_dv" ng-repeat="valore in valores">
                                                <td class="col-md-3">
                                                    <label class="btn_valoresa valores_dv_checker">
                                                        <input type="checkbox" name="valore[]" autocomplete="off" ng-value="{{valore.id}}" ng-model="valores_id" >
                                                        <span><i class="fa fa-check-circle"></i> {{valore.name}}</span>
                                                    </label>
                                                </td>
                                                <td class="col-md-9">
                                                    <p ng-bind-html="valore.description"></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="modalBotoes pull-right" >
                                            <!--JEFERSON-->
                                            <a mat-raised-button href="<?= base_url().'feedback' ?>" class="mdc-button mdc-fechar">Voltar</a>
                                            <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar notas</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div ng-if="action=='complete'" class="actionview fade" id="complete-feedback-pane">
                            <?php echo file_get_contents(base_url('assets/portal/img/like_complete.svg')); ?>
                            <p ng-if="lastAction=='give'">{{ 'FEEDBACK.COMPLETE_FEEDBACK_MSG' | translate }}</p>
                            <p ng-if="lastAction=='ask'">{{ 'FEEDBACK.COMPLETE_REQUEST_MSG' | translate }}</p>
                            <p ng-if="lastAction=='notes'">{{ 'FEEDBACK.COMPLETE_NOTE_MSG' | translate }}</p>
                            <p ng-if="lastAction!='notes' && lastAction!='ask' && lastAction!='give'">{{ 'FEEDBACK.YOU_SHOULDNT_BE_HERE' | translate }}</p>

                            <div class="complete-return-buttons">
                                <a href="<?= base_url().'perfil' ?>" class="back button one-straight-corner-blue" >{{ 'FEEDBACK.BACK_TO_PROFILE' | translate }}</a>
                                <a ng-if="lastAction=='notes' || lastAction=='ask' || lastAction=='give'" href="javascript:void(0)" class="back button one-straight-corner-blue" onclick="(function(){ window.history.back() })()">
                                    <span ng-if="lastAction=='give'">{{ 'FEEDBACK.GIVE_MORE_FEEDBACK' | translate }}</span>
                                    <span ng-if="lastAction=='ask'">{{ 'FEEDBACK.ASK_MORE_FEEDBACK' | translate }}</span>
                                    <span ng-if="lastAction=='notes'">{{ 'FEEDBACK.ADD_ANOTHER_PRIVATE_NOTE' | translate }}</span>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <ng-view></ng-view>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>