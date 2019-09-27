<div class="col-md-12 page-left" ng-controller="HelloCtrl">
    <div class="login-container" id="login_screen">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo-white.png" alt="Elofy"> </a>
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


            <div class="login-content">
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
                            <label><input name="remember" type="checkbox">{{ 'LOGIN.REMEMBER_ME' | translate }}</label>
                            <a href="javascript:void(0)" id="suo_password" style="padding-left: 10px;">Seu primeiro acesso?</a>
                            <a href="javascript:void(0)" id="forgot_password" class="pull-right">{{ 'LOGIN.FORGOT_YOUR_PASSWORD' | translate }}</a>
                        </div>

                    </div>
                    <div class="form-group">
                    <button type="submit" class="login-form-btn">   {{ 'UI.LOGIN' | translate }}</button>
                    </div>
                    <div class="form-group">
                        <a href="<?php echo $google_login_url?>" class="login-form-btn-default"><img src="<?php echo base_url()?>assets/portal/img/googleplus.png" alt="google" class="loginlogo"><span class="verticleshift">Entrar com Google </span> </a>
                    </div>
                    <div class="form-group">
                        <a href="<?php echo base_url('linkedin_login')?>" class="login-form-btn-default"><img src="<?php echo base_url()?>assets/portal/img/linkedin.png" alt="google" class="loginlogo"><span class="verticleshift">Entrar com Linkedin</span> </a>
                    </div>
                    <div class="form-group">
                        <a href="https://slack.com/oauth/authorize?client_id=<?php echo SLACK_API_TOKEN?>&scope=<?php echo SLACK_SCOPE;?>&redirect_uri=<?php echo SLACK_REDIRECT_URL;?>" class="login-form-btn-default"><img src="<?php echo base_url()?>assets/portal/img/slack.png" alt="google" class="loginlogo"><span class="verticleshift">Entrar com Slack</span> </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="login-container" id="forgot_screen" style="display:none;">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo-white.png" alt="Elofy"> </a>
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
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo-white.png" alt="Elofy"> </a>
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