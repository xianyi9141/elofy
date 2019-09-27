<div class="col-md-12 page-left" ng-controller="HelloCtrl">
    <div class="login-container" id="login_screen">
        <form method="post" action="#" id="social_maf_form">
            <input type="hidden" id="social_maf" class="form-control" name="social_maf" value="<?php echo $this->session->flashdata('social_maf'); ?>"/>
            <input type="hidden" id="social_login" class="form-control" name="social_login" value="<?php echo $this->session->flashdata('social_login'); ?>"/>
            <input type="hidden" id="social_email" class="form-control" name="social_email" value="<?php echo $this->session->flashdata('social_email'); ?>"/>
        </form>
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img height="70" width="auto" src="<?php echo base_url()?>assets/portal/img/elofy.png" alt="Elofy"> </a>
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>{{ "UI.LOGIN_IN" | translate }}...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">                
            <h2 class="begin-session">{{ "LOGIN.INITIATE_SESSION" | translate }}</h2>

            <div class="login-content" id="login_maf" style="display: none;">
                <div class="success">
                    <div class="alert alert-success" role="alert"><b>{{ 'UI.SENT_EMAIL' | translate }}</b> Nós enviamos um código para o e-mail <b><span id="email_sent">email</span></b> o código expira em 5min</div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"> <i class="icon-key"></i> </div>
                        <input type="text" class="form-control logincenter" name="maf_code" id="maf_code" placeholder="Code" autocomplete="off"> 
                    </div>
                </div>
                <div class="form-group" >
                    <button type="button" id="btn_maf" class="login-form-btn">   {{ 'UI.LOGIN' | translate }}</button>
                </div>
            </div>

            <div class="login-content" id="login_content">
                <div class="form-login-error" >
                    <h3>{{ "LOGIN.INVALID_LOGIN" | translate }}</h3>
                    <p>{{ "LOGIN.EMAIL_OR_PASSWORD_INCORRECT" | translate }}</p>
                </div>
				<?php
				$message = $this->session->flashdata('item');
				if(!empty($message) && isset($message['message'])) {
					?>
					<div class="form-login-error" style="display:block">
						<h3>{{ "LOGIN.INVALID_LOGIN" | translate }}</h3>
						<p><?php echo $message['message'];?></p>
					</div>
					<?php 
				}
				?>
                <form method="post" role="form" id="form_login" novalidate="novalidate">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-user-1"></i> </div>
                            <input ng-if="redirectUrl != 'null'" type="hidden" name="redirecturl" id="redirect" value="{{redirectUrl}}" />

                            <input type="email" class="form-control logincenter" name="username" id="username" placeholder="{{ 'UI.EMAIL' | translate }}" autocomplete="off"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-key"></i> </div>
                            <input type="password" class="form-control logincenter" name="password" id="password" placeholder="{{ 'UI.PASSWORD' | translate }}" autocomplete="off"> </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox text-left">
                            <!--<label><input name="remember" type="checkbox">{{ 'LOGIN.REMEMBER_ME' | translate }}</label>-->
                            <a href="javascript:void(0)" id="suo_password">Seu primeiro acesso?</a>
                            <a href="javascript:void(0)" id="forgot_password" class="pull-right">{{ 'LOGIN.FORGOT_YOUR_PASSWORD' | translate }}</a>
                        </div>

                    </div>
                    <div class="form-group" >
                    <button type="submit" class="login-form-btn">   {{ 'UI.LOGIN' | translate }}</input>
                    </div>
                    <label style="text-align: center;margin-bottom: 14px;">Ou</label>
                    <div class="form-group" style="margin-bottom: 30px;">
                        <div class="col-sm-4 socialpadding" style="padding-left: 0px;">
                        <a href="<?php echo $google_login_url?>" class="login-form-btn-default"><img src="<?php echo base_url()?>assets/portal/img/search.png" alt="google" class="loginlogo">Entrar</a>
                        </div>
                        <div class="col-sm-4 socialpadding"  style="padding-left: 5px;padding-right: 5px;">
                            <div style="margin: auto;">
                         <a href="<?php echo base_url('linkedin_login')?>" class="login-form-btn-default"><img style="width: 22px; height: 22px; position: relative; left: 3px;" src="<?php echo base_url()?>assets/portal/img/linkedin1.png" alt="linkdin" class="loginlogo">Entrar</a>
                         </div>
                         </div>
                         <!--<div class="col-sm-3">
                         <a href="https://slack.com/oauth/authorize?client_id=<?php echo SLACK_API_TOKEN?>&scope=<?php echo SLACK_SCOPE;?>&redirect_uri=<?php echo SLACK_REDIRECT_URL;?>" class="login-form-btn-default"><img src="<?php echo base_url()?>assets/portal/img/slack.png" alt="google" class="loginlogo"><span class="verticleshift"></span> </a>
                         </div>-->
                         <div class="col-sm-4 socialpadding" style="padding-right: 0px;">
                          <a href="https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=<?php echo OUTLOOK_CLIENT_ID;?>&scope=<?php echo OUTLOOK_SCOPE;?>&response_type=code&redirect_uri=<?php echo OUTLOOK_REDIRECT_URL;?>&response_mode=query" class="login-form-btn-default"><img style="width: 23px;height: 23px; position: relative; left: 3px;" src="<?php echo base_url()?>assets/portal/img/microsoft.png" alt="microsoft" class="loginlogo">Entrar</a>
                          </div>
                    </div>
                    <!--<div class="form-group">
                       
                    </div>
                    <div class="form-group">
                        
                    </div>

                    <div class="form-group">
                        <a href="https://login.live.com/oauth20_authorize.srf?client_id=<?php echo OUTLOOK_CLIENT_ID;?>&scope=<?php echo OUTLOOK_SCOPE;?>&response_type=code&redirect_uri=<?php echo OUTLOOK_REDIRECT_URL;?>" class="login-form-btn-default"><img src="<?php echo base_url()?>assets/portal/img/outlook.png" alt="google" class="loginlogo"><span class="verticleshift">Entrar com Outlook</span> </a>
                    </div>

                    <div class="form-group">
                       
                    </div>-->

                    
                </form>
            </div>
        </div>
    </div>
    <div class="login-container" id="forgot_screen" style="display:none;">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img height="70" width="auto" src="<?php echo base_url()?>assets/portal/img/elofy.png" alt="Elofy"> </a>
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>{{ "UI.LOGIN_IN" | translate }}...</span>
                </div>
            </div>
        </div>
		<div class="login-form" >                
            <h2 class="begin-session">{{ 'LOGIN.RECOVER_PASSWORD' | translate }}</h2>
            
            <div class="login-content">
                <form method="post" role="form" id="form-recuperar" novalidate="novalidate">
                    <div class="success" style="display:none;">
                        <div class="alert alert-success" role="alert"><b>{{ 'UI.SENT_EMAIL' | translate }}</b> {{ 'LOGIN.WE_SENT_AN_EMAIL_TO' | translate }} <i></i> {{ 'LOGIN.SENT_INSTRUCTIONS' | translate }}</div>
                    </div>
                    <div class="error" style="display:none;">
                        <div class="alert alert-danger" role="alert"><b>{{ 'UI.ERROR' | translate }}</b> <span></span></div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-user-1"></i> </div>
                            <input id="recuperar-email" name="recuperar-email" type="email" class="form-control recuperar-email logincenter" placeholder="Email">
                            </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <button type="submit" class="login-form-btn">Enviar e-mail</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="login-form-btn-default voltar_email_screen">Voltar para login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="login-container" id="suopassword_screen" style="display:none;">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"><img height="70" width="auto" src="<?php echo base_url()?>assets/portal/img/elofy.png" alt="Elofy"> </a>
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>{{ "UI.LOGIN_IN" | translate }}...</span>
                </div>
            </div>
        </div>
        <div class="login-form" >                
            <h2 class="begin-session">Primeiro Acesso</h2>
            
            <div class="login-content">
                <form method="post" role="form" id="primeiro_form_login" novalidate="novalidate">
                    <div class="success" style="display:none;">
                        <div class="alert alert-success" role="alert" id="sucesstext"></div>
                    </div>
                    <div class="error" style="display:none;">
                        <div class="alert alert-danger" role="alert" id="errortext"></div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-user-1"></i> </div>
                            <input id="primeiro-email" name="primeiro-email" type="email" class="form-control recuperar-email logincenter" placeholder="Email">
                            </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <button type="submit" class="login-form-btn">Enviar e-mail</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="login-form-btn-default voltar_email_screen">Voltar para login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>