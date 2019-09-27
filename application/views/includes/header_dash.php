<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 jul 2019 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/favicon (1).ico" type="image/x-icon" />
    <link rel="icon" href="<?= base_url(); ?>assets/favicon (1).ico" type="image/x-icon" />
    <link rel="icon" href="<?= base_url(); ?>assets/favicon (1).ico" type="image/x-icon" />
    <title>Elofy</title>
    <base href="<?php echo '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <script type="text/javascript">
        var baseurl = '<?php echo base_url()?>';


function alteraPonto(valorInput){
      $(valorInput).val(valorInput.val().replace(",", "."));
}
        
    </script>
    <link rel="stylesheet" href="<?php echo base_url('assets/portal/concat')?>/styles.css?fja=V1.4.7.3" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="<?php echo base_url(); ?>assets/portal/css/material-io.css" rel="stylesheet">
    
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="<?php echo base_url(); ?>assets/portal/css/bootstrap-slider.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/portal/css/developer.css?fja=V1.4.7.3" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/portal/concat')?>/new_styles.css?fja=V1.4.7.3" />
    <link href="<?php echo base_url('assets/portal/css')?>/multirange.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/portal/concat/elofy_style.css?fja=V1.4.7.3" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/portal/css/slideControl.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/portal/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/portal/css/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/portal/css/activitystyle.css?fja=V1.4.7.3" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/portal/css/material_elofy.css" rel="stylesheet">
    

    <!-- <script src="<?php echo base_url(); ?>assets/customChart.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    

    <link href="<?php echo base_url(); ?>assets/font/stylesheet.css" rel="stylesheet" type="text/css" />
    <!-- <?php if ($css_personalization_file): ?><link href="<?php echo base_url() . $css_personalization_file ?>?cache=<?= date("m-d-y") ?>" rel="stylesheet" type="text/css" /><?php endif; ?> -->
</head>
<body class="page-body loaded ng-cloak" cz-shortcut-listen="true"  ng-app="elofyApp" ng-controller="mainCtrl">
    <div class="left_side hidden"></div>
    <div class="page-container sidebar-collapsed" style="margin-top:-20px;">
       
        <div class="main-content">
            <div class="row header hide view_header_top pb-0" ng-class="{'hide': !user.id}" <?php if(isset($from_results)): ?> ng-show="false" <?php endif; ?> >
                <div class="container">
                <div class="col-md-2 col-sm-2 col-xs-4 text-center onhover edit-logo">
                       <!-- <form class="col-md-8 pull-left" action="tags" method="post">
                            <div class="input-group" style="width:100%;">
                                <input type="text" name="tag" class="form-control search-tags big" placeholder='{{ "UI.SEARCH_FOR_TAGS" | translate }}'>
                                <span class="input-group-btn">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </span>
                            </div>
                        </form> -->
                        <?php
                    if($this->session->userdata('logo_empresa')!=""){
                    ?>
                    <img style="margin-top: 1px;max-height: 40px;" id="logo_empresa_view_main" src="<?php echo base_url('assets/upload/'.$this->session->userdata('logo_empresa')); ?>"  />
                    <?php
                    }else{
                    ?>
                    <img style="margin-top:8px;" id="logo_empresa_view_main" src="<?php echo base_url('assets/img/default_image.png') ?>" />
                    <?php }
                    if($this->session->userdata('admin')==1){
                        ?>
                        <a href="javascript:void(0)" ng-click="empLogoUpload()" id="update_logo_empresa"><i class="icon-pencil" aria-hidden="true"></i></a>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-2 col-xs-3 clearfix m-center pull-right">
                    <div class="row">

                        <div class=" pull-right" style=" padding-left: 0;padding-right: 0;margin-top: 4px;">
                    <ul class="user-info pull-right pull-none-xsm">
                        <!-- Profile Info -->
                        <li class="profile-info dropdown">
                            <!-- add class "pull-right" if you want to place this from right -->
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="" ng-if="user.xs_image" ng-src="{{ userDetailImage?userDetailImage:user.xs_image }}" class="img-circle" width="34" height="34" alt="{{ user.name }}"/>
                                <span class="image-replace" ng-if="!user.xs_image">{{ initials(user.name) }}</span><!-- {{ user.name }} -->
                                
                            </a>
                            <ul class="dropdown-menu">
                                <li class="caret"></li>
                                <li class="profile">
                                    <h4>{{ user.name }}</h4>
                                    <small>{{ user.email }}</small>
                                    <p>{{ user.empresa.nome_empresa }}</p>
                                </li>
                                <li style="margin-top: 15px;">
                                    <a href="<?php echo base_url()?>logout">
                                        <!-- <i class="icon-logout"></i> --> {{ "UI.LOGOUT" | translate }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                    <div style="margin-top: 7px" class="newObjectiveHeaderDash">
                        <?php
                        if($this->session->userdata('goal_register')=="1" || $this->session->userdata('admin')=="1" || $this->session->userdata('okr')=="1"){
                        ?>
                        <!--<a href="" ng-if="user.goal_register==1" ng-click="okr()" class="hdp newObjectiveHeaderDash"><img src="<?php echo base_url(); ?>assets/portal/img/ico_plus.png" height="20" width="auto"> Objetivo</a>-->
                         <a href="" ng-if="user.goal_register==1" ng-click="okr()">
                             <button class="mdc-button mdc-button--outlined mdc-button--dense" ng-click="okr()">
                                <i class="material-icons mdc-button__icon">add</i>
                                <span class="mdc-button__label">Objetivo</span>
                            </button>
                         </a>
                        <?php } ?>
                         </div>
                    </div>
                 </div>
                <div class="col-sm-8 col-md-8 col-xs-auto text-center onhover">
                    <nav class="navbar navbar-default efli-navbar">
                      <div class="">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div> 
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse p-0 navbar-dropdown mobi-nav" id="navbar-collapse-1">
                          <ul class="nav navbar-nav" style="max-height: 300px;max-width: 732px;margin: 0px auto;float: none;">
                            <li><a href="<?php echo base_url()?>perfil" class="<?php echo uri_string() == 'perfil' ? 'active' : ''; ?>">Perfil</a></li>
                        <!--    <li><a href="#">Check-ins</a></li> -->
						<?php 
								if($this->session->userdata('okr')=="1" and $this->session->userdata('contrato_metas')=="0"){
						?>
                            <li class="dropdown"><a href="<?php echo base_url()?>okr" data-toggle="dropdown" aria-expanded="true">{{ 'OKRS.TITLE' | translate }}<i class="icon-down-open-2"></i></a>
                            <ul class="dropdown-menu">
                                <li ng-show="user.empresa.id_empresa != 137"><a href="<?php echo base_url(); ?>my_dashboard">Dashboard</a></li>
                                
                                <li ng-show="user.empresa.id_empresa != 137"><a href="<?php echo base_url(); ?>planejamento">Visão Empresa</a></li>
                                <li><a href="<?php echo base_url(); ?>okr">{{ 'OKRS.TITLE' | translate }}</a></li>
                                
                                <li ng-show="user.empresa.contrato_metas==0 && user.empresa.id_empresa != 137"><a href="<?php echo base_url(); ?>checkin">Check-ins</a></li>
                                
                            <!--    <li ng-if="user.empresa.contrato_metas=="1"><a href="<?php echo base_url(); ?>avaliacoes">Resultados</a></li> -->
                              </ul>
                            </li>
						
                            <li ng-show="user.activities == 1"><a href="<?php echo base_url()?>atividades" class="<?php echo uri_string() == 'atividades' ? 'active' : ''; ?>">{{ 'ATIVIDADES.TITLE' | translate }}</a></li>
                     <?php 
							}
					 ?>	       
					 <?php 
                                if($this->session->userdata('okr')=="1" and $this->session->userdata('contrato_metas')=="1" and $this->session->userdata('admin')=="1"){
                        ?>
                            <li class="dropdown"><a href="<?php echo base_url()?>okr" data-toggle="dropdown" aria-expanded="true">{{ 'OKRS.TITLE' | translate }}<i class="icon-down-open-2"></i></a>
                            <ul class="dropdown-menu">
                            <!--    <li><a href="<?php echo base_url(); ?>my_dashboard">Dashboard</a></li>
                                <li ><a href="<?php echo base_url(); ?>planejamento">Visão Empresa</a></li> -->
                                <li><a href="<?php echo base_url(); ?>okr">{{ 'OKRS.TITLE' | translate }}</a></li>
                                <li ng-if="user.usuarioviewTime.admin==1"><a href="<?php echo base_url(); ?>indicators">Base de Indicadores</a></li>
                            <!--    <li ng-if="user.empresa.contrato_metas=="1"><a href="<?php echo base_url(); ?>checkin">Check-ins</a></li>
                                <li ng-if="user.empresa.contrato_metas=="1"><a href="<?php echo base_url(); ?>avaliacoes">Resultados</a></li> -->
                              </ul>
                            </li>  
                        
                            <li><a href="<?php echo base_url()?>atividades" class="<?php echo uri_string() == 'atividades' ? 'active' : ''; ?>">Planos de Ação</a></li>
                     <?php 
                            }
                     ?>       



							<li class="dropdown"><a href="<?php echo base_url()?>carreira" data-toggle="dropdown" aria-expanded="true">{{ 'CARREIRA.TITLE' | translate }}<i class="icon-down-open-2"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>carreira">{{user.label_carreer!=''?user.label_carreer:'Carreira'}}</a></li>
                                <li ng-if="user.usuarioviewTime.admin == 1 || user.usuarioviewTime.tipo_cargo == 4"><a href="<?php echo base_url(); ?>feedbacks">Feedbacks</a></li>
                                <li ng-if="user.usuarioviewTime.admin == 1 || user.usuarioviewTime.tipo_cargo == 4"><a href="<?php echo base_url(); ?>ninebox">9 box</a></li>
                              </ul>
                            </li>  
<?php
                        if( $this->session->userdata('user_reviewer')=="1" || $this->session->userdata('admin')=="1"){
                        ?>  
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="true">Ciclos <i class="icon-down-open-2"></i></a>
                                <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>cycleconfiguration">Ciclos de Revisão</a></li>
                                <!--<li><a href="<?php echo base_url(); ?>avaliacoes">Relatório de Avaliações</a></li>
                                <li><a href="<?php echo base_url(); ?>peopledevelopment">Desenvolvimento Pessoal</a></li>-->
                                <li><a href="<?php echo base_url(); ?>results">
                                Resultados e Calibração</a> </li>
                              
                              </ul>
                            </li>
						<?php 
							}
						?>	
						<?php
						if( $this->session->userdata('user_pesquisas')=="1" || $this->session->userdata('admin')=="1"){
						?>						
                            <li>
                                <a href="<?php echo base_url(); ?>pesquisas">Pesquisas</a>
                                <!-- <ul class="dropdown-menu">
                              </ul> -->
                            </li>
						 <?php
						}
						?>	
						<?php 
							if($this->session->userdata('maintenance_user')=="1" || $this->session->userdata('admin')=="1"){
						?>
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="true">Admin <i class="icon-down-open-2"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>times">
                                        {{ 'TIMES.TITLE' | translate }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>usuarios">
                                        {{ 'USUARIOS.TITLE' | translate }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>cargosv1">
                                            Cargos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>questionarios">
                                            Questionários
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>empresa">
                                            Empresa
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>integrations">
                                            Integração
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>zapier">
                                            Integração Zapier
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>category">
                                            Categorias de Competências
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>competencias">
                                            Competência
                                        </a>
                                        <a href="<?php echo base_url(); ?>ciclos">
                                            Configuração de Ciclos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>matriz">
                                            Estrutura Projetos
                                        </a>
                                    </li>
                                </ul>
                            </li>
						<?php 
							}
						?>
                        	<li class="dropdown">
                                <a href="http://help.elofy.com.br") target="blank">Ajuda</a>
                            </li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container -->
                </nav><!-- /.navbar -->

                </div>
                <!-- Profile Info and Notifications -->
                
                </div>
            </div>
            <?php if(!isset($from_results)): ?> 
            <div style="margin-bottom: 61px;"></div>
            <?php endif; ?>
            <!-- Modal Novo Global -->
            <div class="modal fade in" id="delete-tatic-modal">
                <div class="modal-dialog">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Excluir registro</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style="font-size:15px">Você tem certeza que deseja excluir?</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="performTask">Ok</button>
                        </div>
                </div>
            </div>
            <!-- Modal Novo Global -->
            <div class="modal fade in" id="new-okr-global">
                <div class="modal-dialog">
                    <form id="form-okr-global" class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Novo Direcionador Estratégico</h4>
                        </div>
                        <div class="modal-body">
                            <div class="progress" ng-class="{'hide': users.length}" style="margin-top:17px;">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>

                            <div class="form hide" ng-class="{'hide': !users.length}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="okr-global-name" class="control-label">Nome</label>
                                            <input name="nome" type="text" class="form-control" id="okr-global-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="okr-global-description" class="control-label">Descrição</label>
                                            <textarea name="descricao" id="okr-global-description" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="okr-global-user" class="control-label">Responsável</label>
                                            <select id="okr-global-user" name="usuario" class="select2 usuario-okr" data-allow-clear="true" data-placeholder="Selecione um Usuário">
                                                <option value=""></option>
                                                <optgroup label="Usuários">
                                                    <option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="okr-global-year" class="control-label">Ano</label>
                                            <select id="okr-global-year" name="ano" class="select-year form-control" ng-model="currentYear" ng-options="year as year for year in years"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Novo Tático -->
            <div class="modal fade in" id="new-okr-tatic">
                <div class="modal-dialog">
                    <form id="form-okr-tatic" class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">{{ "OBJETIVOS.NEW_GOAL" | translate}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="progress" ng-class="{'hide': users.length}" style="margin-top:17px;">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>

                            <div class="form hide" ng-class="{'hide': !users.length && !teams.length && !objectives.length}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="okr-tatic-name" class="control-label">Nome</label>
                                            <input name="nome" type="text" class="form-control" id="okr-tatic-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="okr-tatic-description" class="control-label">Descrição</label>
                                            <textarea name="descricao" id="okr-tatic-description" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="okr-tatic-user" class="control-label">Responsável</label>
                                            <select id="okr-tatic-user" name="usuario" class="select2 usuario-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Usuário">
                                                <option value=""></option>
                                                <optgroup label="Usuários">
                                                    <option ng-repeat="user in users" ng-value="{{ user.id }}">{{ user.name }}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="okr-tatic-team" class="control-label">Time</label>
                                            <select id="okr-tatic-team" name="time" class="select2 times-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Time">
                                                <option value=""></option>
                                                <optgroup label="Times">
                                                    <option ng-repeat="team in teams" ng-value="{{ team.id }}">{{ team.name }}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="okr-tatic-objectives" class="control-label">{{ 'OKRS.TITLE' | translate }}</label>
                                            <select id="okr-tatic-objectives" name="objetivo" class="select2 objetivo-okr-tatic" data-allow-clear="true" data-placeholder="Selecione um Objetivo" ng-model="objectiveId" ng-change="changeCycle()">
                                                <option value=""></option>
                                                <optgroup label="Objetivos">
                                                    <option ng-repeat="item in objectives" ng-value="{{ item.id }}">{{ item.title }}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" ng-class="{'hidden': !cycles.length}">
                                        <div class="form-group">
                                            <label for="okr-tatic-cycles" class="control-label">Trimestres</label>
                                            <select id="okr-tatic-cycles" multiple="multiple" name="clicos" class="form-control multiple cycles-okr-tatic" ng-model="cyclesModel" ng-options="cycle.id as cycle.name for cycle in cycles">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Novo OKR -->
           <div class="modal fade in bs-example-modal-lg col-2" id="new-okr">
                <div class="modal-dialog modal-lg">
                    <form id="form-okr" class="modal-content">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                       <div class="modal-body clearfix custom-height">
                         <div class="col-md-8">
                                 <div class="modal-header bg-primary">
                                    <h4 class="modal-title">Novo Objetivo</h4>
                                </div>
                                <div class="progress" ng-class="{'hide': users.length && teams.length && years.length}" style="margin-top:17px;">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>

                                <div class="form hide" ng-class="{'hide': !users.length && !teams.length && !years.length}">
                                    <div class="row">
                                        <div class="col-md-12 model_bod">
                                            <div class="model_ch">
                                                <div class="model_che" style="margin: 0 0 10px 0;">
                                                    <input type="checkbox" name="estrategico" id="estrategicoval" value="1" ng-model="estrategico">
                                                    <label for="estrategicoval" > Destacar para Empresa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="okr-name" class="control-label">Nome</label>
                                                <input name="nome" type="text" class="form-control" id="okr-name" placeholder="Nome do Objetivo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="okr-description" class="control-label">Descrição</label>
                                                <textarea name="descricao" id="okr-description" class="form-control" rows="5" placeholder="Descrição"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" ng-show="user.empresa.individual == 1 || user.empresa.team == 1 || user.empresa.shared == 1">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="okr-tipo" class="control-label">Tipo</label>
                                                <br>
                                                <div class="checkbox tipo_radio mr-0" ng-show="user.empresa.individual == 1">
                                                    <input ng-model="selectedTipo" ng-click="showResponsavel()" type="radio" id="individual" value="i" name="tipo" class="styled-checkbox" checked >
                                                    <label for="individual">{{user.empresa.label_individual}}</label>
                                                </div>
                                                <div class="checkbox tipo_radio" ng-show="user.empresa.team == 1">
                                                    <input ng-model="selectedTipo" ng-click="showResponsavel()" type="radio" id="para_o_time" value="t" name="tipo" class="styled-checkbox">
                                                    <label for="para_o_time">{{user.empresa.label_team}}</label>
                                                </div>
                                                <div class="checkbox tipo_radio" ng-show="user.empresa.shared == 1">
                                                    <input ng-model="selectedTipo" ng-click="showResponsavel()" type="radio" id="compartilhado" value="c" name="tipo" class="styled-checkbox">
                                                    <label for="compartilhado">{{user.empresa.label_shared}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-6" id="responsavel_section">
                                            <div class="form-group">
                                                <label for="okr-user" class="control-label">Responsável</label>
                                                <select ng-model="selectedUserTeam" id="okr-user" name="usuario" class="select2 usuario-okr" data-allow-clear="true" data-placeholder="Selecione um Usuário" ng-click="getUserTeam()">
                                                    <option value=""></option>
                                                    <optgroup label="Usuários">
                                                        <option ng-repeat="alluser in users" ng-value="{{ alluser.id }}">{{ alluser.name }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="team_section">
                                            <div class="form-group">
                                                <label for="okr-team" class="control-label">Time</label>
                                                <select id="okr-team" name="time" class="select2 times-okr" data-allow-clear="true" data-placeholder="Selecione um Time">
                                                    <option value=""></option>
                                                    <optgroup label="Times">
                                                        <option ng-repeat="team in teams" ng-value="{{ team.id }}">{{ team.name }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="okr-year" class="control-label">Ano</label>
                                                <select id="okr-year" name="ano" class="select-year-okr form-control" ng-model="currentYearOkr" ng-options="year as year for year in years" ng-change="changeCycleOkr()">
                                                <option value="">Ano</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" ng-class="{'hidden': !cyclesOkr.length}">
                                            <div class="form-group">
                                                <label for="okr-cycles" class="control-label">Trimestres</label>
                                                <select id="okr-cycles" multiple="multiple" name="clicos" class="form-control multiple cycles-okr" ng-model="cyclesModelOkr" ng-options="cycle.id as cycle.name for cycle in cyclesOkr">
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" ng-if="!estrategico">
                                        <div class="link_btns" style="margin-left: 2%">
                                         <div class="valores_dv_pop">
                                            <label for="link" class="control-label">Link</label>
                                          <label class="btn_valoresa_pop valores_dv_btn_pop " >
                                            <input type="checkbox" id="direcionador" onclick="$('#objetivo').attr('checked',false);$('#objetivo').prop('checked',false);$('#estrategico_obj').attr('checked',false);$('#estrategico_obj').prop('checked',false);" ng-model="direcionador" name="link[]" value="1" class="styled-checkbox" ng-click="linkType(1)">
                                            <span >{{ "OKRS.DIRECIONADOR" | translate }}</span>
                                          </label>
                                        </div>
                                        </div>
                                        <div class="link_btns">
                                         <div class="valores_dv_pop">
                                            <label for="link" class="control-label">&nbsp;</label>
                                          <label class="btn_valoresa_pop valores_dv_btn_pop " >
                                            <input type="checkbox" id="objetivo" onclick="$('#direcionador').attr('checked',false);$('#direcionador').prop('checked',false);$('#estrategico_obj').attr('checked',false);$('#estrategico_obj').prop('checked',false);" ng-model="objetivo" value="2" name="link[]" class="styled-checkbox" ng-click="linkType(2)">
                                            <span >{{ "OKRS.OBJETIVO" | translate}}</span>
                                          </label>
                                        </div>
                                        </div>
                                        <div class="link_btns">
                                         <div class="valores_dv_pop">
                                            <label for="estrategico_obj" class="control-label">&nbsp;</label>
                                          <label class="btn_valoresa_pop valores_dv_btn_pop " >
                                            <input type="checkbox" id="estrategico_obj" onclick="$('#direcionador').attr('checked',false);$('#direcionador').prop('checked',false);$('#objetivo').attr('checked',false);$('#objetivo').prop('checked',false);" ng-model="estrategico_obj" value="3" name="link[]" class="styled-checkbox" ng-click="linkType(3)">
                                            <span >{{ "OKRS.DESTACADO" | translate}}</span>
                                          </label>
                                        </div>
                                        </div>
                                        <div class="col-md-12" id="objective_dv" >
                                            <div class="form-group">
                                                <label for="okr-tatic-objectives" class="control-label"></label>
                                                <select ng-model="goalobjectiveid" id="okr-objectives" name="objetivo" class="objetivo-okr-tatic" data-allow-clear="true" data-placeholder="Selecione" >
                                                    <option value=""></option>
                                                    <optgroup label="{{link_text}}">
                                                        <option ng-repeat="item in objectives" value="{{ item.id }}">{{ item.title }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row" ng-class="{'hidden': selectedTipo!='c'}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="new_users_teams" class="control-label">Times</label>
                                                 <select id="new_users_teams" multiple="multiple" name="newteams[]" class="form-control multi-select allusers-newteams" ng-model="userNewTeams" ng-options="newteam.name for newteam in teams track by newteam.id">
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                           <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                            </div>-->
                            <div class="modal-footer modalBotoes pull-right">
                                <button class="mdc-button mdc-fechar" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="mdc-button mdc-button--raised" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
                            </div>                           
                        
                        
                        </div><!--Modal Left End-->
                        <div class="col-md-4 pdr-0">
                           <aside class="grey-bg">
                                 <h4 class="modal-title">Detalhe seus Resultados Chave</h4>
                                        <div class="form-group">
                                            <label for="okr_keyresult_name" class="control-label">Nome</label>
                                            <input name="okr_keyresult_name" ng-value="okr_keyresult_name" type="text" class="form-control" id="okr_keyresult_name" placeholder="Nome do Resultado Chave">
                                        </div>

                                       <div class="form-group">
                                            <label for="okr_keyresult_type" class="control-label">Tipo</label>
                                            <select id="okr_keyresult_type" name="okr_keyresult_type" class="select2 types-okr-tatic" data-allow-clear="true" data-placeholder="Selecione o tipo" ng-model="okr_keyresult_type">
                                                <option value=""></option>
                                                <option value="0">Menor Melhor</option>
                                                <option value="1">Maior Melhor</option>
                                                <option value="2">Plano de Ação</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="okr_keyresult_medida" class="control-label">Unidade de Medida</label>
                                            <input name="okr_keyresult_medida" ng-value="okr_keyresult_medida" pattern="^.{1,15}$" type="text" class="form-control" id="okr_keyresult_medida" placeholder="Utilize: '%', 'R$', 'qtd', 'clientes'">
                                             <div class="requirements row">(Máximo de 15 caracteres) Utilize: '%', 'R$', 'qtd', 'clientes 
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <div>
                                                    <label for="okr_keyresult_target" class="control-label">Ponto de Partida</label>
                                                    <input type="text"  class="form-control" onchange="alteraPonto($(this))" name="okr_ponto_partida" id="okr_ponto_partida" ng-value="okr_ponto_partida?okr_ponto_partida:0" placeholder="Ponto de Partida (0)" pattern="\d+((\.|,)\d+)?">
                                                    <div class="requirements row">
                                                     Deve conter apenas números(0-9) e/ou pontos(.) ou virgulas(,).
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="okr_keyresult_target" class="control-label">Meta</label>
                                                    <input type="text"  class="form-control" onchange="alteraPonto($(this))" id="okr_meta" name="okr_meta" placeholder="Meta (100)" ng-value="okr_meta?okr_meta:100" pattern="\d+((\.|,)\d+)?">
                                                    <div class="requirements row">
                                                     Deve conter apenas números(0-9) e/ou pontos(.) ou virgulas(,).
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   <button type="button" class="btn btn-white center" ng-if="!editKeyBtn" ng-click="addNewKey()">Adicionar Resultado Chave</button>
                                   <button type="button" class="btn btn-white center" ng-if="editKeyBtn == 1" ng-click="editSubmitNewKey(index_id)">Editar Resultado Chave</button>
                                    <div class="clear h-30"></div>
                                        <div class="form-group mb0">
                                        <label class="control-label">Adicionados</label>

                                        </div>

                                        <div class="right text-right clearfix" ng-if="key_list.length>0" ng-repeat="key in key_list">
                                            <span>{{key.name}}</span>
                                            <a href="" class="btn btn-link btn-sm noshadow dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="icon-ellipsis-vert"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="" ng-click="editKeyResult(key.index)">Editar</a>
                                                </li>
                                                <li>
                                                    <a href="" ng-click="deleteKey(key.index)">Deletar</a>
                                                </li>
                                            </ul>
                                     </div>
                                      <div class="clear h-60"></div>
                           </aside>

                        </div> <!--Modal Right End-->

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade in" id="emp-logo-user-img" style="display: none; padding-right: 17px;" >
                <div class="modal-dialog">
                    <form id="form_img_user" class="modal-content ng-pristine ng-valid" novalidate enctype="multipart/form-data">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Editar Logo</h4>
                        </div>
                        <div class="modal-body">
                            <div id="progress_user" class="progress show" style="margin-top:17px;">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                            <input type="hidden" name="id_empresa" value="<?php echo $this->session->userdata('id_empresa') ?>">
                            <div id="log_emp_user_form" class="form hide">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="img img-rounded" style="width:90px; height:90px; background:#ccc;">
                                            <!-- ngIf: userDetailImage -->
                                            <?php
                                            if($this->session->userdata('logo_empresa')!=""){
                                            ?>
                                            <img id="logo_empresa_view" class="img-rounded ng-scope" width="90" height="90" src="<?php echo base_url('assets/upload/'.$this->session->userdata('logo_empresa')); ?>">
                                            <!-- end ngIf: userDetailImage -->
                                            <?php
                                            }else{
                                            ?>
                                                <img id="logo_empresa_view" src="<?php echo base_url('assets/img/default_image.png') ?>" width="90" height="90" />
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="emp-logo-image" class="control-label">Imagem</label>
                                            <input id="emp-logo-image" name="imagem" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p class="error-message text-danger pull-left hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="submit_img" name="update_img_btn" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
