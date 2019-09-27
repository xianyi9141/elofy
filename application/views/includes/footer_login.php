    <script src="<?php echo base_url('assets/portal/concat')?>/login.js?v=3>"></script>

    <?php
    //TODO: Colocar os js abaixo no grunt e no login.js concatenado
    //TODO: avaliar melhor lugar para colocação da configuração do translate - até para modulação
    ?>

    <script src="<?php echo base_url('assets/portal/js')?>/angular.min.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/angular-sanitize.min.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/angular-translate.min.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/angular-translate-loader-static-files.min.js"></script>

    <script>

        var helloApp = angular.module("helloApp", ['ngSanitize','pascalprecht.translate']);


        helloApp.config(['$translateProvider', function ($translateProvider){
            // adicionando português direto no código por que éa língua padrão no momento
            // e será carregada direto, antes mesmo de outras que forem chamadas, para evitar campos sem informação em um FOUC - Flash of untranslated content
            var translationsPT = {
                UI: {
                    ACTIVE: "Ativo",
                    UNACTIVE: "Inativo",
                    EDIT: "Editar",
                    YES: "Sim",
                    NO: "Não",
                    FILL_THE_RED_FIELDS: "Por favor preencha os campos destacados em vermelho.",
                    CLOSE: "Fechar",
                    SAVE: "Salvar",
                    SAVING: "Salvando",
                    REMOVAL_ASKCONFIRMATION: "Tem certeza de que gostaria de remover?",
                    REMOVAL_CONFIRMATION: "Remoção Concluída!",
                    SAVED: "Salvo!",
                    SEARCH_FOR_TAGS: "Pesquise por Tags",
                    EDIT_PROFILE: "Editar Perfil",
                    LOGOUT: "Sair",
                    LOGIN_IN: "Logando",
                    NEW_PERSONAL_GOAL: "Novo Objetivo Pessoal",
                    NAME: "Nome",
                    DESCRIPTION: "Descrição",
                    TYPE: "Tipo",
                    RESPONSIBLE: "Responsável",
                    USERS: "Usuários",
                    SELECT_USER: "Selecione um Usuário",
                    TEAM: "Time",
                    TEAMS: "Times",
                    YEAR: "Ano",
                    LINK: "Link",
                    QUARTERS: "Trimestres",
                    EMAIL: "E-mail",
                    PASSWORD: "Senha",
                    LOGIN: "Entrar",
                    SEND: "Enviar",
                    ERROR: "Erro!",
                    SENT_EMAIL: "E-mail Enviado!",



                    //  Itens de menu Pseudoviews
                    RECURSOS_HUMANOS:"Recursos Humanos",
                    PAINEIS: "Painéis",
                    ADMIN: "Admin",
                    CONFIGURACOES: "Configurações",

                },
                LOGIN:{
                    REMEMBER_ME: "Lembrar de mim",
                    INITIATE_SESSION: "Iniciar sessão",
                    FORGOT_YOUR_PASSWORD: "Esqueceu sua senha?",
                    EMAIL_OR_PASSWORD_INCORRECT: "E-mail ou senha incorretos.",
                    INVALID_LOGIN: "Login Inválido",
                    RECOVER_PASSWORD: "Recuperar Senha",
                    RECOVER_PASSWORD_INFO: "Informe seu e-mail e enviaremos instruções para você recuperar sua conta.",
                    WE_SENT_AN_EMAIL_TO: "Enviamos um e-mail para",
                    SENT_INSTRUCTIONS: "com as instruções e o link para você trocar a senha. Caso você não receba o e-mail em alguns minutos, verifique a sua caixa de spam ou repita o processo.",


                },

            };

            $translateProvider.useSanitizeValueStrategy('escape')
                .translations('pt', translationsPT)
                .useStaticFilesLoader({
                    prefix: 'assets/t10n/',
                    suffix: '.json'
                })
                .preferredLanguage('pt').fallbackLanguage('pt')
                .registerAvailableLanguageKeys(['en', 'pt'], {
                    // 'en_US': 'en',
                    // 'en_UK': 'en',
                    'en_*':"en",
                    'pt_BR': 'pt',
                    '*': 'pt'
                });


        }]);

        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        helloApp.controller("HelloCtrl", function($scope, $translate) {
            $scope.name = "Calvin Hobbes";
            $scope.redirectUrl = getParameterByName('redirectUrl')+location.hash;
        });
        $(document).ready(function(){
            $('#forgot_screen').hide();
            $('#login_screen').show();
            $('#suopassword_screen').hide();
            $('#forgot_password').click(function(){
                $('#forgot_screen').show();
                $('#login_screen').hide();
                $('#suopassword_screen').hide();
            });
            $('.voltar_email_screen').click(function(){
                $('#forgot_screen').hide();
                $('#suopassword_screen').hide();
                $('#login_screen').show();
            });
            $('#suo_password').click(function(){
                $('#forgot_screen').hide();
                $('#login_screen').hide();
                $('#suopassword_screen').show();
            });
        });
    </script>
</body>
</html>