<div class="col-md-5 page-left">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a class="logo"> <img src="<?php echo base_url()?>assets/portal/img/logo.png" alt="Elofy"> </a>
                <div class="login-progressbar-indicator">
                    <h3>0%</h3> <span>logando...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <div class="form-login-error">
                    <h3>Login Inválido</h3>
                    <p>E-mail ou senha incorretos.</p>
                </div>
                <form method="post" role="form" id="form_login" novalidate="novalidate">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-user-1"></i> </div>
                            <input type="email" class="form-control" name="username" id="username" placeholder="E-mail" autocomplete="off"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="icon-key"></i> </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Senha" autocomplete="off"> </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox text-left">
                            <label><input name="remember" type="checkbox">Lembrar de mim</label>
                            <a href="" data-toggle="modal" data-target="#modal-recuperar" class="pull-right"><b>Esqueceu sua senha?</b></a>
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login text-center">Entrar</button>
                    </div>
                   <!-- BOTÃO CADASTRE-SE COMENTADO <div class="form-group" style="margin:30px 0">
                        <p>Não possui cadastro? <a href="<?php echo base_url('cadastro')?>" class="text-underline"><b><ins>Cadastre-se.</ins></b></a></p>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-7 page-right">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
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
                <h2 style="font-size:40px;">Obtenha resultados através <br>da Execução colaborativa <br>da sua Estratégia</h2>
                <p>Gestão de Performance Contínua</p>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Recuperar Senha -->
<div class="modal fade in" id="modal-recuperar">
    <div class="modal-dialog small">
        <form id="form-recuperar" class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Recuperar Senha</h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    <p>Informe seu e-mail e enviaremos instruções para você recuperar sua conta.</p>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="recuperar-email" class="control-label">E-mail</label>
                                <input id="recuperar-email" name="recuperar-email" type="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="success" style="display:none;">
                    <div class="alert alert-success" role="alert"><b>E-mail Enviado!</b> Enviamos um e-mail para <i></i> com as instruções e o link para você trocar a senha. Caso você não receba o e-mail em alguns minutos, verifique a sua caixa de spam ou repita o processo.</div>
                </div>
                <div class="error" style="display:none;">
                    <div class="alert alert-danger" role="alert"><b>Erro!</b> <span></span></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>