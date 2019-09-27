<div class="col-md-12 page-left">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo.png" alt="Elofy"> </a>
                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>cadastrando...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <form method="post" role="form" id="form_register" novalidate="novalidate">
                    <div class="form-register-success">
                        <h3>Você foi cadastrado com sucesso.</h3>
                        <p>Nós enviamos um email para ativação do seu cadastro.</p>
                    </div>
                    <div class="form-login-error">
                        <h3>Ocorreu um Erro.</h3>
                        <p>Por favor valide seus dados e tente novamente.</p>
                    </div>
                    <div class="form-steps">
                        <div class="step current" id="step-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="icon-group"></i> </div>
                                    <input type="text" class="form-control" name="nomeEmpresa" id="nomeEmpresa" placeholder="Nome da Empresa" autocomplete="off"> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="icon-mail-alt"></i> </div>
                                    <input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail Profissional" autocomplete="off"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="icon-user-1"></i> </div>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu Nome" autocomplete="off"> </div>
                            </div>                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="icon-lock"></i> </div>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua Senha" autocomplete="off"> </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="icon-lock"></i> </div>
                                    <input type="password" class="form-control" name="senhaConfirmacao" id="repetir" placeholder="Repita sua Senha" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group" style="text-align: left;">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="normal_user" name="normal_user" value="1" checked="checked">
                                        Normal user
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" style="text-align: left;">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="termos" name="termos">
                                        Eu aceito os <a href=""><b>termos e condições</b></a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-login"> Criar minha conta
                                </button>
                            </div>
                            <div class="form-group" style="margin:30px 0">
                                <p>Ja possui cadastro? <a href="<?php echo base_url(); ?>"><b><ins>Entrar</ins></b></a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>