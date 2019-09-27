<div ng-controller="surveyListCtrl" class="surveyListView" ng-init="idSurvey = <?= $idSurvey ?>">
    <div>
        <h2>
            Escolha um usuário para avaliar
        </h2>

        <hr>

        <div class="form_add_row">
            <div class="col-sm-12">

                <div class="dblock">
                    <div class="dblock_head">
                        <h2 class="title_heading">{{evaluatedUsers[0].nome_pesquisa}}</h2><br>

                    </div>
                    <div class="dblock_body"><br>
                        <ul class="users-list">
                           <li ng-repeat="user in evaluatedUsers" ng-click="selectUser(user.id)" class="col-xs-4" ng-class="{'selected' : user.id == userSelected }">
                               <div class="user_img_dv" ng-if="user.image">
                                   <img src=""  ng-src="{{ user.md_image }}" class="img-circle" alt="{{ initials(user.name_user) }}" height="60" width="60"/>
                               </div>
                               <div class="user_img_nam" ng-if="!user.image" height="60" width="60">{{ initials(user.name_user) }}</div>
                               <label>{{ user.name_user }}</label>

                           </li>
                        </ul>
                        <div class="clearfix"></div>
                        <br>

                        <img class="example-img" ng-src="<?php echo base_url('assets/portal/img/elofy_rating_example.png')?>">
                        <div class="btn-default">
                            <a ng-click="goToSurvey('<?php echo base_url();?>survey/#!/<?= $idSurvey ?>/')" href="javascript:void(0)" ng-class="{'disabled' : !userSelected }" >Responder Pesquisa</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12">
                <div class="disclaimer">
                    <p>Suas respostas serão armazenadas seguramente e mantidas pelo Elofy de acordo com nossas políticas de Segurança e privacidade.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>