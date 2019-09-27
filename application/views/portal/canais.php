<!-- Canal -->
<script>
    var id_channel = "<?php echo $id; ?>";
</script>
<div ng-controller="channelsCtrl" class="hide" ng-class="{'hide': !channel}">
    <div>
        <h2 class="button title col-md-9" style="padding-left:0; margin-bottom:20px">
            <span ng-if="!editingTitle"><i class="icon-hashtag"></i> {{ channel.canal.name }}</span>
            <form ng-if="editingTitle && channel.canal.type != 'Global'" ng-submit="submitTitle()" style="margin:-10px 0;">
                <div class="input-group" style="width:100%;">
                    <input id="editTitle" type="text" class="form-control" placeholder="Título" ng-value="channel.canal.name"> 
                    <span class="input-group-btn"> 
                        <button class="btn btn-info" type="submit">Salvar</button>
                    </span>
                </div>
            </form>
            <a href="" ng-if="!editingTitle && channel.canal.type != 'Global'" class="btn btn-info" ng-click="editTitle()"><i class="icon-edit"></i> Editar nome</a>
        </h2>

        <div class="buttons pull-right col-md-3" style="margin-top:-5px;">
            <form style="margin:25px 0 0;" ng-submit="search()" class="ng-pristine ng-valid">
                <div class="input-group" style="width:100%;">
                    <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="Busca" ng-model="query"> 
                    <span class="input-group-btn"> 
                        <button type="submit"><i class="icon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

    </div>

    <hr style="width:100%" class="clearfix">

    <div class="box">
        <div class="header-bar row">
            <div class="col-md-12">
                <div ng-if="channel.canal.type == 'Global'" class="channel-users images">
                    <div class="dropdown">
                        <a>
                            <img src="" ng-if="channel.users[0].image" ng-src="{{ channel.users[0].image }}" class="img-circle" width="30" height="30" alt="{{ channel.users[0].name }}" />
                            <span class="image-replace" ng-if="!channel.users[0].image">{{ initials(channel.users[0].name) }}</span>
                        </a>
                    </div>

                    <span class="bar" ng-if="channel.users.length > 1"></span>

                    <a class="contr" ng-repeat="user in channel.users | limitTo:3:1">
                        <img src="" ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" alt="{{ user.name }}" />
                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                    </a>

                    <div class="dropdown" ng-if="channel.users.length > 3">
                        <a href="" class="dropdown-toggle" id="link-responsibles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="image-replace">mais {{channel.users.length-3}}</span>
                        </a>
                        <div class="dropdown-menu">
                            <p style="margin-top:0;">Membros:</p>
                            <hr>
                            <div class="scroll">
                                <span class="link" ng-repeat="user in channel.users | limitTo: (4 - channel.users.length)">
                                    <img src="" ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" alt="{{ user.name }}" />
                                    <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                                    <span class="text">{{ user.name }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div ng-if="channel.canal.type != 'Global'" class="channel-users images">
                    <div class="dropdown">
                        <a>
                            <img src="" ng-if="channel.users[0].image" ng-src="{{ channel.users[0].image }}" class="img-circle" width="30" height="30" alt="{{ channel.users[0].name }}" />
                            <span class="image-replace" ng-if="!channel.users[0].image">{{ initials(channel.users[0].name) }}</span>
                        </a>
                    </div>

                    <span class="bar" ng-if="channel.users.length > 1"></span>

                    <a class="contr" ng-repeat="user in channel.users | limitTo:3:1" ng-click="removeUser(user.id)">
                        <img src="" ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" alt="{{ user.name }}" />
                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                        <span class="hover red"><i class="icon-trash"></i></span>
                        <span class="red" ng-click="removeUser(user.id)"><i class="icon-trash"></i></span>
                    </a>

                    <div class="dropdown" ng-if="channel.users.length > 3">
                        <a href="" class="dropdown-toggle" id="link-responsibles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="image-replace">mais {{channel.users.length-4}}</span>
                        </a>
                        <div class="dropdown-menu">
                            <p style="margin-top:0;">Membros:</p>
                            <hr>
                            <div class="scroll">
                                <span class="link" ng-repeat="user in channel.users | limitTo: (4 - channel.users.length)">
                                    <img src="" ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" alt="{{ user.name }}" />
                                    <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                                    <span class="text">{{ user.name }}</span>
                                    <a href="" class="red" ng-click="removeUser(user.id)"><i class="icon-trash"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <span class="bar"></span>

                    <div class="dropdown">
                        <a href="" class="dropdown-toggle" id="link-add-responsibles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="image-replace"><i class="icon-user-plus"></i></span>
                        </a>
                        <div class="dropdown-menu">
                            <form ng-submit="searchUsers(selectedUsers)" class="ng-pristine ng-valid">
                                <div class="input-group" style="width:100%;">
                                    <input type="text" class="form-control" placeholder="Pesquisar Usuários" ng-model="selectedUsers">
                                    <span class="input-group-btn"> 
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </span>
                                </div>
                            </form>
                            <p>Adicionar Membro:</p>
                            <hr>
                            <div class="scroll">
                                <a href="" class="link" ng-class="{'selected': checkId(user.id)}" ng-repeat="user in users | filter:filterUsers" ng-click="addUser(user.id)">
                                    <img src="" ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" alt="{{ user.name }}" />
                                    <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                                    <span class="text">{{ user.name }}</span>
                                    <i class="icon-ok" ng-if="checkId(user.id)"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="channel-description">
                    <div ng-if="!editingDescription" ng-bind-html="description"></div>
                    <form ng-if="editingDescription" ng-submit="submitDescription()">
                        <div class="input-group" style="width:100%;">
                            <div class="form-group" style="overflow:hidden;">
                                <textarea id="newDescription" name="descricao" class="form-control" rows="4" ng-value="channel.canal.description"></textarea>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-info" type="submit">Salvar</button>
                            </div>
                        </div>
                    </form>
                    <a href="" ng-if="!editingDescription" class="btn btn-info" ng-class="{'no-description': !channel.canal.description}" ng-click="editDescription()"><i class="icon-edit"></i> <span ng-if="channel.canal.description">Editar descrição</span> <span ng-if="!channel.canal.description">Adicionar descrição</span></a>
                </div>
            </div>    
        </div>

        <hr style="margin-bottom:0;">  

        <div class="channel-scroll" exec-on-scroll-to-top="scrollToTop" scroll-glue-bottom="glued">
            <div id="message{{ mens.id }}" class="media"  ng-repeat="mens in messages">
                <div class="media-left">
                    <span>
                        <img class="media-object" ng-if="mens.image" ng-src="{{ mens.image }}" alt="" style="width:50px; height:50px;">
                        <span class="image-replace media-object" ng-if="!mens.image" style="width:50px; height:50px; line-height:50px; font-size:24px;">{{ initials(user.name) }}</span>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ mens.user }}<small> {{ mens.date }}</small></h4>
                    <div ng-bind="mens.mens" linkify="twitter"></div>
                    <div class="img" ng-if="mens.file && mens.mime.indexOf('image') > -1" style="margin-top:5px;">
                        <img ng-src="{{ mens.file }}" alt="" class="img-responsive" />
                    </div>
                    <div class="anexo" ng-if="mens.file && mens.mime.indexOf('image') == -1" style="margin-top:5px;">
                        <a ng-href="{{ mens.file }}" target="_blank"><i class="icon icon-download"></i> {{ mens.file }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div ng-if="!messages.length">
            <h4 style="padding:25px 0">Não existem mensagens neste grupo. Seja o primeiro(a).</h4>
        </div>
        
        <hr style="margin-top:0;">

        <form id="nova-mensagem" ng-submit="newMessage()">
            <div class="form-group">
            	<div id="editor" class="header-bar">
                    <textarea id="textarea" class="textarea form-control autoExpand" rows="1" data-min-rows="0" placeholder="Nova Mensagem"></textarea>
                    <div class="icons">
                        <div class="dropdown pull-left">
                            <a href="" ng-class="{'selected': selectedFile}" class="dropdown-toggle image-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon icon-attach"></i></a>
                            <div class="dropdown-menu right bottom form-inline" style="width:380px;">
                                <p style="margin-top:0;">Adicionar Arquivo:</p>
                                <div class='form-group'>
                                    <input id='file' name='file' type='file' class='form-control' style="width:306px;" onchange="angular.element(this).scope().fileChange()">
                                </div>
                                <a href="" ng-click="closePopup()" class="btn btn-info" style="margin-left:5px;">Ok</a>
                            </div>
                        </div>



                        <div class="dropdown pull-left">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="icon icon-at"></i>
                            </a>
                            <div class="dropdown-menu right bottom">
                                <div>
                                    <div class="input-group" style="width:100%;">
                                        <input type="text" class="form-control" placeholder="Pesquisar Membros" ng-model="selectedMembers">
                                        <span class="input-group-btn"> 
                                            <button type="button" ng-click="searchMembers(selectedMembers)"><i class="icon-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <p>Mensionar:</p>
                                <hr>
                                <div class="scroll">
                                    <a href="" class="link" ng-repeat="user in channel.users | filter:filterMembers" ng-click="mention(user.id)">
                                        <img src="" ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="30" height="30" alt="{{ user.name }}" />
                                        <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
                                        <span class="text">{{ user.name }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <a href="" class="pull-left" ng-click="toggleEmoji()"><i class="icon icon-smile"></i></a>
                    </div>
            	</div>
			</div>
            <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
        </form>

    </div>
</div>