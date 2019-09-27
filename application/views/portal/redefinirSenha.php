<div class="col-md-12 page-left">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo-white.png" alt="Elofy"> </a>
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
                    <h3>Senha alterada com sucesso.</h3>
                    <p><a href="<?php echo base_url(); ?>" style="color:#fff; text-decoration:none;"><b><ins>Clique aqui para fazer login</ins></b></a></p>
                </div>
                <div class="form-login-error">
                    <h3>Ocorreu um erro</h3>
                    <p></p>
                </div>
                <div class="form-description">
                    <h3>Primeiro Acesso</h3>
                    <p>Email: <i><?php echo $usuario['email_usuario']; ?></i></p>
                    <br><br>
                </div>
                <form method="post" role="form" id="form_reset" novalidate="novalidate">
                    <input type="hidden" id="hash" name="hash" value="<?php echo $this->uri->segment(2); ?>" />
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-lock"></i> </div>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Nova Senha" autocomplete="off"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-lock"></i> </div>
                            <input type="password" class="form-control" name="senhaConfirmacao" id="repetir" placeholder="Repita sua Senha" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-form-btn">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
