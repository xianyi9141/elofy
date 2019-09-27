<div class="col-md-12 page-left" ng-controller="HelloCtrl">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo.png" alt="Elofy"> </a>
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>{{ "UI.LOGIN_IN" | translate }}...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <div class="form-login-error">
                    <h3>{{ "LOGIN.INVALID_LOGIN" | translate }}</h3>
                    <p>{{ "LOGIN.EMAIL_OR_PASSWORD_INCORRECT" | translate }}</p>
                </div>
                <form method="post" role="form" id="survey_form_login" novalidate="novalidate">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-user-1"></i> </div>
                            <input type="email" class="form-control" name="username" id="username" placeholder="{{ 'UI.EMAIL' | translate }}" autocomplete="off"> </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login text-center">{{ 'UI.LOGIN' | translate }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>