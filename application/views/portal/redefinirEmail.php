<style type="text/css">
    .login-page .form-register-success{
        display: block;
    }
</style>
<div class="col-md-5 page-left">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo.png" alt="Elofy"> </a>
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>Alterando...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <div class="form-register-success">
                    <h3>Email alterada com sucesso.</h3>
                    <p><a href="<?php echo base_url(); ?>" style="color:#fff; text-decoration:none;"><b><ins>Clique aqui para fazer login</ins></b></a></p>
                </div>
                <div class="form-login-error">
                    <h3>Ocorreu um erro</h3>
                    <p></p>
                </div>
                <div class="form-description">
                    <h3>Redefinir sua email</h3>
                    <p>Email: <i><?php echo $usuario['email_usuario']; ?></i></p>
                    <br><br>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="col-md-7 page-right">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active" style="background-image:url(<?php echo base_url()?>assets/portal/img/banner1.jpg);">
              <div class="carousel-caption">
                <h2>Estratégia Ágil. <br>Colaborativa. <br>Eficaz.</h2>
                <p>Objetivos alinhados e time engajado.</p>
              </div>
            </div>
            <div class="item" style="background-image:url(<?php echo base_url()?>assets/portal/img/banner2.jpg);">
              <div class="carousel-caption">
                <h2>Você sabia que com <br>o elofy você pode <br>lorem ipsum dolor?</h2>
                <p>Objetivos alinhados e time engajado.</p>
              </div>
            </div>
        </div>
    </div>
</div>