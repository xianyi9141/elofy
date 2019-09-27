<!-- Edição de Usuários -->
<div ng-controller="questionariosCtrl" class="hide questionarios" ng-class="{'hide': !users}">
    <div>
        <h2 ng-show="activetab == 1">
           {{ 'QUESTIONARIOS.TITLE' | translate }} ({{ questionarios.length }})
        </h2>

        <div class="box" ng-show="activetab == 1">
            <h3 class="dashboard-elofy-heading">{{ 'QUESTIONARIOS.ALL_QUESTIONARIES' | translate }}: <div class="pull-right action-add" ng-click="editQuestionario()"><i class="fa fa-plus" aria-hidden="true"></i>  Criar novo</div></h3>

            <hr>
            <table class="questionario_list">
                <tbody>
                <tr ng-repeat="questionario in questionarios">

                    <td>
                        <div class="tipo" ng-switch on="questionario.tipo_questionario">
                             <div ng-switch-when="c">Checkin - Utilizado em Formulários de Checkin</div>
                             <div ng-switch-when="a">Pesquisas - Utilizado em Pesquisas Diversas e Avaliações de Desempenho</div>
                             <div ng-switch-when="b">Crossfeed</div>
                            <div ng-switch-when="s">Enquetes e Pesquisas Rápidas</div>
                            <div ng-switch-when="n">You Time</div>
                            <!--<div ng-switch-when="h">Desenvolvimento Pessoal - Utilizado em Pesquisas Temporais de Escala de Evolução</div>-->
                            <div ng-switch-default>Tipo não identificado</div>
                        </div>
                        <div class="word-break">{{questionario.name}}</div>
                    </td>
                    <td width="70px" class="">
                        <span ng-class="{ 'text-danger': questionario.ativo != 1, 'text-success': questionario.ativo == 1 }" >
                            <span class="active" ng-class="{'hide': (questionario.ativo != 1)?true:false}"><i class="icon-ok-1"></i>{{ 'UI.ACTIVE' | translate }}</span>
                            <span class="inactive" ng-class="{'hide': (questionario.ativo == 1)?true:false}"><i class="icon-cancel"></i>{{ 'UI.UNACTIVE' | translate }}</span>
                        </span>
                    </td>
                    <td class="actions">
                        <a href="#" ng-click="editQuestionario(questionario)">{{ 'UI.EDIT' | translate }}</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="clearfix"></div>
        <form method="post" id="form-questionario" ng-show="activetab == 2" ng-model="selectedQuestionario">
        <div class="row" id="new_cargo_add">

                <div class="col-sm-12">
                    <div class="add_new_function">
                        <div class="header_dv" >
                            {{ 'QUESTIONARIOS.QUESTIONARY_INFORMATION' | translate }}
                        </div>
                        <div class="form_set">
                            <div class="form_row">
                                <label>{{ 'QUESTIONARIOS.QUESTIONARY_NAME' | translate }}</label>
                                <input type="text" placeholder="{{ 'QUESTIONARIOS.INFORM_QUESTIONARY_NAME' | translate }}" id="nome-questionario" name="nome_questionario" ng-model="selectedQuestionario.name" required>
                            </div>
                            <div class="form_row">
                                <div class="custom_radio custom_radio_sidebyside" style="width: auto !important; ">
                                    <label>{{ 'QUESTIONARIOS.WHATS_THE_QUESTIONARY_TYPE' | translate }}</label>
                                     <div class="radio_dv" style="display: block;">
                                        <input type="radio" id="radioA" name="tipo_questionario" value="a" ng-model="selectedQuestionario.tipo_questionario" required>
                                        <label for="radioA">Pesquisas e Avaliações de Desempenho</label>
                                    </div>
                                    
                                    <div class="radio_dv" style="display: block;">
                                        <input type="radio" id="radioC" name="tipo_questionario" value="c" ng-model="selectedQuestionario.tipo_questionario" required>
                                        <label for="radioC">{{ 'QUESTIONARIOS.TYPE_CHECKIN' | translate }}</label>
                                    </div>
                                   
                                    <div class="radio_dv" style="display: block;">
                                        <input type="radio" id="radioB" name="tipo_questionario" value="b" ng-model="selectedQuestionario.tipo_questionario" required>
                                        <label for="radioB">Crossfeed</label>
                                    </div>
                                   <div class="radio_dv" style="display: block;">
                                        <input type="radio" id="radioS" name="tipo_questionario" value="s" ng-model="selectedQuestionario.tipo_questionario" required>
                                        <label for="radioS">Enquetes</label>
                                    </div>
                                    <div class="radio_dv" style="display: block;">
                                        <input type="radio" id="radioN" name="tipo_questionario" value="n" ng-model="selectedQuestionario.tipo_questionario" required>
                                        <label for="radioN">You Time</label>
                                    </div>
                                   <!--<div class="radio_dv" style="display: block;">
                                        <input type="radio" id="radioH" name="tipo_questionario" value="h" ng-model="selectedQuestionario.tipo_questionario" required>
                                        <label for="radioH">Desenvolvimento Pessoal </label>
                                    </div>-->
                                </div>
                            </div>
                            <hr style="display:inline-block;border-top: solid thin #ddd;width:100%;margin-bottom:4px;">
                            <div class="form_row">
                                <div class="custom_radio custom_radio_sidebyside">
                                    <label>Ativo</label>
                                    <div class="radio_dv">
                                        <input type="radio" id="radioAtivo1" name="ativo" value="1" ng-model="selectedQuestionario.ativo">
                                        <label for="radioAtivo1">{{ 'UI.YES' | translate }}</label>
                                    </div>
                                    <div class="radio_dv">
                                        <input type="radio" id="radioAtivo2" name="ativo" value="0" ng-model="selectedQuestionario.ativo">
                                        <label for="radioAtivo2">{{ 'UI.NO' | translate }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="clearfix"></div>
        <div class="row question_list"  ng-show="activetab == 2" >
                <div class="col-sm-12">
                    <div class="add_new_function">
                        <div class="header_dv">
                            {{ 'QUESTIONARIOS.QUESTIONS' | translate }}
                            <div class=" pull-right" style=" padding-left: 0;
    padding-right: 0;">

                                <ul class="user-info pull-right pull-none-xsm">
                                    <!-- Profile Info -->
                                    <li class="profile-info dropdown">
                                        <!-- add class "pull-right" if you want to place this from right -->
                                        <a class="dropdown-toggle ng-binding" data-toggle="dropdown" aria-expanded="false" style="border:none;margin-left: 0px;">
                                            {{ 'QUESTIONARIOS.ADD_QUESTION' | translate }} <i class="icon-down-open-2"></i>
                                        </a>
                                        <ul class="dropdown-menu" ng-if="selectedQuestionario.tipo_questionario == 'a'"  style="margin: 0px !important;">

                                            <!-- Reverse Caret -->
                                            <li class="caret"></li>
                                            <!-- Profile sub-links -->
                                            <li class="profile">
                                                <h4 class="ng-binding">{{ 'QUESTIONARIOS.ALL_QUESTIONS_TYPES' | translate }}</h4>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;"  ng-click="addQuestion('multiplaescolha')">
                                                    Multipla Escolha
                                                </small>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('qualitativa')">
                                                    Qualitativa
                                                </small>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('rating_estrela')">
                                                    Rating
                                                </small>
                                            </li>
                                             <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('escala_favora')">
                                                    Escala Favorabilidade
                                                </small>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;"  ng-click="addQuestion('multiplaescolhaAppraisal')">
                                                    Objetiva para Avaliaçao de Desempenho
                                                </small>
                                            </li>
                                        </ul>
										 <ul class="dropdown-menu" ng-if="selectedQuestionario.tipo_questionario == 'b' ">
											 <!-- Reverse Caret -->
                                            <li class="caret"></li>
                                            <!-- Profile sub-links -->
											<li class="profile">
                                                <h4 class="ng-binding">Todos tipos de questão</h4>
                                            </li>
											<li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('qualitativa')">
                                                    {{ 'QUESTIONARIOS.QUESTION_TYPE_QUALITATIVE' | translate }}
                                                </small>
                                            </li>
                                        </ul>
                                        
                                        <ul class="dropdown-menu" ng-if="selectedQuestionario.tipo_questionario == 'h'">
                                            <!-- Reverse Caret -->
                                            <li class="caret"></li>
                                            <!-- Profile sub-links -->
                                            <li class="profile">
                                                <h4 class="ng-binding">Todos tipos de questão</h4>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('qualitativa')">
                                                    {{ 'QUESTIONARIOS.QUESTION_TYPE_QUALITATIVE' | translate }}
                                                </small>
                                            </li>
                                            <li style="padding-top:10px;">
												<small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('escala_evolucao')">
                                                    Escala de Evolução
                                                </small>
                                            </li>   
                                        </ul>
										 <ul class="dropdown-menu" ng-if="selectedQuestionario.tipo_questionario == 'c'">
                                            <!-- Reverse Caret -->
                                            <li class="caret"></li>
                                            <!-- Profile sub-links -->
                                            <li class="profile">
                                                <h4 class="ng-binding">Todos tipos de questão</h4>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('qualitativa')">
                                                    {{ 'QUESTIONARIOS.QUESTION_TYPE_QUALITATIVE' | translate }}
                                                </small>
                                            </li>
											<li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('rating_estrela')">
                                                    Rating
                                                </small>
                                            </li>												
                                        </ul>
                                        <ul class="dropdown-menu" ng-if="selectedQuestionario.tipo_questionario == 's'">
                                            <!-- Reverse Caret -->
                                            <li class="caret"></li>
                                            <!-- Profile sub-links -->
                                            <li class="profile">
                                                <h4 class="ng-binding">Todos tipos de questão</h4>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;"  ng-click="addQuestion('multiplaescolha')">
                                                    Multipla Escolha
                                                </small>
                                            </li>
											 <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('rating_estrela')">
                                                    Rating
                                                </small>
                                            </li>
                                        </ul>
                                        <ul class="dropdown-menu" ng-if="selectedQuestionario.tipo_questionario == 'n'">
                                            <!-- Reverse Caret -->
                                            <li class="caret"></li>
                                            <!-- Profile sub-links -->
                                            <li class="profile">
                                                <h4 class="ng-binding">Todos tipos de questão</h4>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('qualitativa')">
                                                    {{ 'QUESTIONARIOS.QUESTION_TYPE_QUALITATIVE' | translate }}
                                                </small>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('rating_estrela')">
                                                    Rating
                                                </small>
                                            </li>
                                            <li style="padding-top:10px;">
                                                <small href="#" style="cursor:pointer;font-size:14px;" ng-click="addQuestion('competencia')">
                                                    Competencia
                                                </small>
                                            </li>
                                                
                                        </ul>
                                      
                                    </li>
                                </ul>
                            </div>


                        </div>
                        <hr>


                        <div class="form_set" ng-repeat="question in selectedQuestionario.questions track by $index">
                            <a href="#" ng-click="removeQuestion($index, question, selectedQuestionario)"><i class="fa fa-times fa-times-remove-question" aria-hidden="true"></i></a><ng-include src="returnTemplate(question.type)"></ng-include>
                        </div>


                        <script type="text/ng-template" id="objetiva_yesno">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="clearfix" style="height: 20px"></div>
                     
                        </script>

                        <script type="text/ng-template" id="multiplaescolha">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose" required>
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>{{ 'QUESTIONARIOS.MULTIPLE_QUESTION' | translate }}</label>
                                <input type="text" placeholder="{{ 'QUESTIONARIOS.WRITE_YOUR_MULTIPLE_QUESTION' | translate }}" id="perguntatxt_{{$index}}"  ng-model="question.pergunta" required>


                                <span class="answer" ng-repeat="answer in question.respostas track by $index" ng-if="answer.ativo == 1">
                                        <span class="answer-text" contenteditable="true" ng-model="answer.texto" ng-keydown="onKeyDown($event, answer)" ng-blur="onBlurAnswer($event,answer)" ng-focus="onFocusAnswer($event)">{{ 'QUESTIONARIOS.ANSWER_TEXT' | translate }}</span> |  <span class="answer-percentage" contenteditable="true" ng-keydown="onKeyDown($event, answer)" ng-blur="onBlurAnswer($event, answer)" ng-focus="onFocusAnswer($event)" ng-model="answer.percentual">{{ 'QUESTIONARIOS.PERCENTUAL_WEIGHT' | translate }}</span> %
                                        <a href="#" ng-click="removeAnswer($index, answer, question.respostas)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </span>
                                <a class="add-answer-anchor" href="#" ng-click="addAnswer(question)"><i class="fa fa-plus" aria-hidden="true"></i>{{ 'QUESTIONARIOS.ADD_ONE_MORE_ANSWER' | translate }}</a>
                            </div>
                        </script>
						
						<script type="text/ng-template" id="multiplaescolhaAppraisal">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                            </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>{{ 'QUESTIONARIOS.MULTIPLE_QUESTION' | translate }}</label>
                                <input type="text" placeholder="{{ 'QUESTIONARIOS.WRITE_YOUR_MULTIPLE_QUESTION' | translate }}" id="perguntatxt_{{$index}}" ng-model="question.pergunta" required>

                                <span class="answer" ng-repeat="answer in question.respostas track by $index" ng-if="answer.ativo == 1">
									<span class="answer-text" contenteditable="true" ng-model="answer.texto" ng-keydown="onKeyDown($event, answer)" ng-blur="onBlurAnswer($event,answer)" ng-focus="onFocusAnswer($event)">{{ 'QUESTIONARIOS.ANSWER_TEXT' | translate }}</span> |  <span class="answer-percentage" contenteditable="true" ng-keydown="onKeyDown($event, answer)" ng-blur="onBlurAnswer($event, answer)" ng-focus="onFocusAnswer($event)" ng-model="answer.percentual">{{ 'QUESTIONARIOS.PERCENTUAL_WEIGHT' | translate }}</span> %
									<a href="#" ng-click="removeAnswer($index, answer, question.respostas)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </span>
                                <a class="add-answer-anchor" href="#" ng-click="addAnswerAppraisal(question)"><i class="fa fa-plus" aria-hidden="true"></i>{{ 'QUESTIONARIOS.ADD_ONE_MORE_ANSWER' | translate }}</a>
                            </div>
                        </script>

                        <script type="text/ng-template" id="qualitativa">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                            </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>{{ 'QUESTIONARIOS.QUALITATIVE_TEXTUAL_ANSWER' | translate }}</label>
                                <input type="text" placeholder="{{ 'QUESTIONARIOS.WRITE_YOUR_QUALITATIVE_TEXTUAL_QUESTION' | translate }}" id="perguntatxt_{{$index}}"  ng-model="question.pergunta" required>
                            </div>
                        </script>

                        <script type="text/ng-template" id="competencia">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>{{ 'QUESTIONARIOS.QUALITATIVE_TEXTUAL_ANSWER' | translate }}</label>
                                <input type="text" placeholder="{{ 'QUESTIONARIOS.WRITE_YOUR_QUALITATIVE_TEXTUAL_QUESTION' | translate }}" id="perguntatxt_{{$index}}"  ng-model="question.pergunta" required>
                            </div>
                        </script>

                        <script type="text/ng-template" id="escala_evolucao">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                            </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>Escala de Evolução</label>
                                <input type="text" placeholder="Escala de Evolução Questão" id="perguntatxt_{{$index}}"  ng-model="question.pergunta" required>
								<div class="clear"></div>
								<div class="custom-btn-group btn-group" data-toggle="buttons">
										<label class="btn btn-clr1" data-placement="top" data-toggle="tooltip" data-original-title="Abaixo do esperado">
										<input type="radio" autocomplete="off">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <div class="hvr_item">Abaixo do esperado</div>
									</label>    
										<label class="btn btn-clr2" data-placement="top" data-toggle="tooltip" data-original-title="precisa melhorar">
										<input type="radio" autocomplete="off">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <div class="hvr_item">Precisa melhorar</div>    
									</label>
									<label class="btn btn-clr3" data-placement="top" data-toggle="tooltip" data-original-title="dentro do esperado">
										<input type="radio" autocomplete="off">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <div class="hvr_item">Dentro do esperado</div>
									</label>
										<label class="btn btn-clr4" data-placement="top" data-toggle="tooltip" data-original-title="acima do esperado">
										<input type="radio" autocomplete="off">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <div class="hvr_item">Acima do esperado</div>
									</label>
								</div>								
                        </script>

                        <script type="text/ng-template" id="rating">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                            </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>{{ 'QUESTIONARIOS.RATING_QUESTION' | translate }}</label>
                                <div ng-init="srating.value = 0"></div> 
                                <input type="text" placeholder="{{ 'QUESTIONARIOS.WRITE_YOUR_RATING_QUESTION' | translate }}" id="perguntatxt_{{$index}}"  ng-model="question.pergunta" required>
                                <div class="row">
                                    <div class="col-sm-4" style="margin-top: 20px;">
                                        <label>Selecione o tipo de rating</label>
                                        <select ng-model="question.type" class="categoty_choose" ng-change="changeRatingType(question)">
                                            <option value="rating_estrela">Estrelas</option>
                                            <option value="rating_coracao">Corações</option>
                                            <option value="rating_emoji">Emoticons</option>
                                            <option value="rating_nps">NPS</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 26px; padding-top: 12px; text-align:center;">
                                        <div ng-if="question.type == 'rating_estrela'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="star" data-max="4" on-rating-selected="rateFunction(rating)"></div>
                                        <div ng-if="question.type == 'rating_coracao'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="heart" data-max="4"></div>
                                        <div ng-if="question.type == 'rating_emoji' && question.escala == 3" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="emoji" data-max="2"></div>
                                        <div ng-if="question.type == 'rating_emoji' && question.escala != 3" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="emoji" data-max="4"></div>
                                        <div ng-if="question.type == 'rating_nps'" class="star-rating" star-rating rating-value="srating" rating-enabled="true" rating-type="nps" data-max="10"></div>
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 20px; padding-top: 17px;"  ng-if="question.type != 'rating_nps'">
                                        <div class="custom_radio custom_radio_sidebyside" style="width: auto !important;">
                                            <div class="radio_dv" ng-if="question.type == 'rating_emoji'">
                                                <input type="radio" id="perguntatxt_3_{{$index}}" value="3" ng-model="question.escala">
                                                <label for="perguntatxt_3_{{$index}}">3 Rating</label>
                                            </div>
                                            <div class="radio_dv">
                                                <input type="radio" id="perguntatxt_5_{{$index}}" value="5" ng-model="question.escala" ng-checked="true">
                                                <label for="perguntatxt_5_{{$index}}">5 Rating</label>
                                            </div>
                                            <div class="radio_dv" ng-if="question.type != 'rating_emoji'">
                                                <input type="radio" id="perguntatxt_10_{{$index}}" value="10"  ng-model="question.escala">
                                                <label for="perguntatxt_10_{{$index}}">10 Rating</label>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 20px; padding-top: 17px;"  ng-if="question.type == 'rating_nps'">
                                        <div class="custom_radio custom_radio_sidebyside" style="width: auto !important;">
                                            <div class="radio_dv">
                                                <input type="radio" id="perguntatxt_6_{{$index}}" value="6" ng-model="question.escala" ng-checked="true">
                                                <label for="perguntatxt_6_{{$index}}">Rating de 0 a 5</label>
                                            </div>
                                            <div class="radio_dv">
                                                <input type="radio" id="perguntatxt_5_{{$index}}" value="5" ng-model="question.escala">
                                                <label for="perguntatxt_5_{{$index}}">Rating de 1 a 5</label>
                                            </div>
                                            <div class="radio_dv">
                                                <input type="radio" id="perguntatxt_11_{{$index}}" value="11"  ng-model="question.escala">
                                                <label for="perguntatxt_11_{{$index}}">Rating de 0 a 10</label>
                                            </div>
                                            <div class="radio_dv">
                                                <input type="radio" id="perguntatxt_10_{{$index}}" value="10"  ng-model="question.escala">
                                                <label for="perguntatxt_10_{{$index}}">Rating de 1 a 10</label>
                                            </div>
                                       </div>
                                    </div>

                                </div>


                            </div>
                        </script>

                        <script type="text/ng-template" id="escala_favora">
                            <div class="form_row">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label>Selecione uma Categoria</label>
                                        <select id="perguntacat_{{$index}}"  ng-model="question.perguntacat" class="categoty_choose">
                                            <option value="">Não Selecionada</option>
                                            <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>&nbsp;</label>
                                        <a href="javascript:void(0);" ng-click="newCategory()" class="btn btn-orange ng-scope">Nova Categoria</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>ORDEM</label>
                                        <input type="text" style="height:35px !important;"  id="pergunta_order_{{$index}}"  ng-model="question.pergunta_order" required placeholder="Ordem(Ex:1,2,3)">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="container-block" style="margin-top: 30px; margin-left: 30px;">
                                            <input type="checkbox" id="pergunta_mandatory_{{$index}}" ng-model="question.pergunta_mandatory">
                                            <label for="pergunta_mandatory_{{$index}}" style="color: #222;">Obrigatório</label>
                                        </div>
                                    </div>
                            </div>
                            </div>
                             <div class="clearfix" style="height: 20px"></div>
                            <div class="form_row">
                                <label>Favorabilidade</label>
                                <div ng-init="rating = -1"></div>
                                <input type="text" placeholder="Escreva sua pergunta de resposta em rating" id="perguntatxt_{{$index}}"  ng-model="question.pergunta" required>
                                <div ng-if="question.type == 'escala_favora'" class="star-rating" star-rating rating-value="rating" rating-enabled="false" rating-type="star" data-max="5" on-rating-selected="rateFunction(rating)"></div>
                                <div class="clearfix"></div>
                                
                            </div>
                        </script>

                    </div>

                </div>

        </div>
       <div class="modalBotoes">
           <p class="error-message text-danger  hide" style="margin:0; line-height:34px;">{{ 'UI.FILL_THE_RED_FIELDS' | translate }}</p>
           <button class="btn fechar" ng-click="listQuestionarios()">{{ 'UI.CLOSE' | translate }}</button>
        <button type="submit" class="btn salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> {{ 'UI.SAVING' | translate }}">{{ 'UI.SAVE' | translate }}</button>

       </div>

        </form>

    </div>
</div>

<div class="modal fade in" id="add-category">
    <div class="modal-dialog">
        <form id="new-category" class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Nova Categoria</h4>
            </div>
            <div class="modal-body">

                <div class="form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_name" class="control-label">Nome</label>
                                <input name="category_name" type="text" class="form-control" id="category_name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer modalBotoes">
                <button type="button" class="btn fechar" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
            </div>
        </form>
    </div>
</div>