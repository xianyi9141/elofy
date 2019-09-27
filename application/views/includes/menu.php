<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <div class="logo">
                <a href="<?php echo base_url()?>/dashboard"> <img src="<?php echo base_url()?>assets/portal/img/logo-white.png" alt="Elofy"> </a>
            </div>
            <div class="logo-collapse">
                <a href="<?php echo base_url()?>/dashboard"> <img src="<?php echo base_url()?>assets/portal/img/logo-collapse.png" alt="Elofy"> </a>
            </div>
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><img src="<?php echo base_url('assets/portal/img')?>/MENU.png"/></a>
            </div>
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><i class="entypo-menu"></i> </a>
            </div>
        </header>
        <?php
        if($this->session->userdata('logged_in')){
        ?>
        <ul id="main-menu" class="main-menu">
            <li class="root-level <?php if($this->uri->segment(1)=="perfil"){echo 'active';}?>">
                <a href="<?php echo base_url()?>perfil">
                    <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/001-user.png"/>
                    <span class="title">{{ "MEU_PERFIL.TITLE" | translate }}</span>
                </a>
            </li>
			 <?php 
                if($this->session->userdata('okr')=="1"){
            ?>
            <li class="root-level <?php if($this->uri->segment(1)=="user_dashboard"){echo 'active';}?>">
                <a href="<?php echo base_url()?>my_dashboard">
                    <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/bar-chart-icon.png"/>
                    <span class="title">Dashboard</span>
                </a>
            </li>
           
            <li class="root-level <?php if($this->uri->segment(1)=="planejamento"){echo 'active';}?>" ng-if="user.okr == 1">
                <a href="<?php echo base_url()?>planejamento">
                     <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/005-tactics.png"/>
                    <span class="title">{{ "VISAO_EMPRESA.TITLE" | translate }}</span>
                </a>
            </li>


            <li class="root-level <?php if($this->uri->segment(1)=="okr"){echo 'active';}?>" ng-if="user.okr == 1">
                <a href="<?php echo base_url()?>okr">
                     <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/004-list.png"/>
                    <span class="title">{{ "OKRS.TITLE" | translate }}</span>
                </a>
            </li>

            <?php
            }
            if( $this->session->userdata('user_reviewer')=="1" || $this->session->userdata('admin')=="1"){
            ?>
            <li class="root-level  <?php if($this->uri->segment(1)=="avaliacoes" or $this->uri->segment(1)=="nova_avaliacao" or $this->uri->segment(1)=="performance_dashboard"){echo 'active';}?>">
                <a href="">
                     <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/002-group.png"/>
                    <span class="title">{{ "UI.RECURSOS_HUMANOS" | translate }}</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url()?>cycleconfiguration">
                            <span class="title">Ciclos de Revisão</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>avaliacoes">
                            <span class="title">{{ "RELATORIO_DE_AVALIACOES.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>peopledevelopment">
                            <span class="title">{{ "PEOPLEDEVELOPMENT.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>results">
                            <span class="title">Resultados e Calibração</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>ninebox">
                            <span class="title">Análise 9 box</span>
                        </a>
                    </li>
                </ul>
            </li>
            

            <?php }
            if($this->session->userdata('maintenance_user')=="1" || $this->session->userdata('admin')=="1"){
            ?>
            <li class="root-level has-sub <?php if($this->uri->segment(1)=="times" or $this->uri->segment(1)=="usuarios" or $this->uri->segment(1)=="cargosv1" or $this->uri->segment(1)=="questionarios" or $this->uri->segment(1)=="empresa" or $this->uri->segment(1)=="integrations" or $this->uri->segment(1)=="category" or $this->uri->segment(1)=="competencias"){echo 'active';}?>" >
                <a href="">
                     <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/002-wheel-outline.png"/>
                    <span class="title">{{ "UI.ADMIN" | translate }}</span>
                </a>
                <ul>
                    <li >
                        <a href="<?php echo base_url()?>times">
                            <span class="title">{{ "TIMES.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>usuarios">
                            <span class="title">{{ "USUARIOS.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>cargosv1">
                            <span class="title">{{ "CARGOS.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>questionarios">
                            <span class="title">{{ "QUESTIONARIOS.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>empresa">
                            <span class="title">{{ "EMPRESA.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>integrations">
                            <span class="title">{{ "INTEGRATION.TITLE" | translate }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>zapier">
                            <span class="title">Integração Zapier</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>category">
                            <span class="title">Categorias de Competências</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>competencias">
                            <span class="title">Competência</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php
            }
            ?>
    
            <?php
            if( $this->session->userdata('user_reviewer')=="1" || $this->session->userdata('admin')=="1"){
            ?>
            <li class="root-level <?php if($this->uri->segment(1)=="pesquisas" || $this->uri->segment(1)=="pesquisaseditor"){echo 'active';}?>">
                <a href="<?php echo base_url()?>pesquisas">
                     <img class="icon-user" style="width: 21px; height: 21px;" src="<?php echo base_url('assets/portal/img')?>/003-is-approximately-equal-to.png"/>
                    <span class="title">Pesquisas</span>
                </a>
            </li>
            <?php } ?>
        </ul>
        <?php } ?>
    </div>
</div>