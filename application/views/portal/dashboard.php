<!-- OKR's -->
<div ng-controller="dashboardCtrl" class="hide" ng-class="{'hide': !cycles && !dash}">
    <div id="dash-header" class='dashboard'>
	    <h2>
	        <div class="buttons pull-right" style="margin-top:2px">
                <form class="form-inline" ng-submit="filter()">
                    <div class="form-group">
                        <label style="line-height:35px; font-size:14px; color:#000; margin:0; vertical-align:top;"{{ 'PAINEL_DE_OBJETIVOS.FILTER' | translate }}</label>
                    </div>
                    <div class="form-group" style="width:130px;">
                        <select class="select-teams" data-native="true" data-text="Times" ng-options="team.id as team.name for team in teams" ng-model="selectedTeam"></select>
                    </div>
                    <div class="form-group" style="width:140px;">
                        <select class="select-year" data-native="true" ng-change="changeYear()" ng-options="year as year for year in years" ng-model="selectedYear"></select>
                    </div>
                    <div class="form-group" style="width:140px;">
                        <select class="select-cycle" data-native="true" data-text="Trimestre" ng-options="cycle.id as cycle.name for cycle in cycles" ng-model="selectedCycle"></select>
                    </div>
                    <button class="btn btn-white filter" type="submit" data-loading-text="<i class='icon-spinner animate-spin'></i>"><i class="entypo-search"></i></button>
                </form>
            </div>
            <span style="text-transform: uppercase;">{{ 'PAINEL_DE_OBJETIVOS.DASHBOARD' | translate }}</span>
	        <span class="small">{{ 'PAINEL_DE_OBJETIVOS.WELCOME' | translate }}</span>
	    </h2>
		<?php
		/*
		?>
		<hr>
	    <div class="profile">
			<div class="img">
				<img src=""  ng-if="user.image" ng-src="{{ user.image }}" class="img-circle" width="85" height="85" data-toggle="tooltip" data-placement="top" title="{{ user.name }}" />
                <span class="image-replace" ng-if="!user.image">{{ initials(user.name) }}</span>
			</div>
			<div class="info">
				<h3>{{ user.name }}</h3>
				<p>
					<span ng-if="user.admin == '1'"><i class="icon-user"></i> Administrador</span>
					<span><i class="icon-email"></i> {{ user.email }}</span>
					<span><i class="icon-briefcase"></i> {{ user.empresa.nome_empresa }}</span>
				</p>
				<div class="btns">
					<a href="<?php echo base_url()?>perfil" class="btn btn-info btn-xs"><i class="icon-edit"></i> Editar Perfil</a>
					<a href="<?php echo base_url()?>configuracoes" class="btn btn-info btn-xs"><i class="icon-cog"></i> Configura��es</a>
					<a href="<?php echo base_url()?>logout" class="btn btn-info btn-xs"><i class="icon-logout"></i> Sair</a>
				</div>
			</div>
			<!--<div class="quant text-right">
				<div class="block">
					<p>Minhas Tarefas</p>
					<p><big>06</big> Tarefas</p>
				</div>
				<div class="block">
					<p>Minhas Avalia��es</p>
					<p><big>03</big> Avalia��es</p>
				</div>
			</div>-->
	    </div>
		<?php
		*/
		?>

    </div>

    <div id="dash-cards" class="row">
		<!--<div class="col-md-3">
			<div class="stats">
				<div class="icon">
					<i class="icon-chart-bar"></i>
				</div>
				<h3>Visitantes por dia</h3>
				<p>135</p>
			</div>
		</div>-->
		<div class="col-md-4">
			<div class="stats okr">
				<div class="icon">
					<i class="logo"></i>
				</div>
				<h3>{{ 'PAINEL_DE_OBJETIVOS.TOTAL_GOALS' | translate }}</h3>
				<p>{{ dash.totalOkr }}</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="stats atingidos">
				<div class="icon">
					<i class="icon-smile"></i>
				</div>
				<h3>{{ 'PAINEL_DE_OBJETIVOS.ACHIEVED_GOALS_TOTAL' | translate }}</h3>
				<p>{{ dash.totalOkrAtingidos }}</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="stats cancelados">
				<div class="icon">
					<i class="icon-frown"></i>
				</div>
				<h3>{{ 'PAINEL_DE_OBJETIVOS.CANCELED_GOALS_TOTAL' | translate }}</h3>
				<p>{{ dash.totalOkrCancelados }}</p>
			</div>
		</div>
    </div>

    <div class="home-charts row">
		<div class="col-md-8">
			<div class="panel panel-primary box">
				<div class="panel-heading">
					<div class=""><span class="round yellow"><i class="icon-chart-line"></i></span> {{ 'PAINEL_DE_OBJETIVOS.QNTY_GOALS_TEAM' | translate }}</div>
				</div>
				<div class="panel-options">
					<br>
					<div id="chart-bar"></div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary box" style="height:410px;">
				<div class="panel-heading">
					<div class=""><span class="round gray"><i class="icon-chart-pie"></i></span> {{ 'PAINEL_DE_OBJETIVOS.NOT_FINISHED_GOALS' | translate }}</div>
				</div>
				<div class="panel-options">
					<br>
					<div id="chart-pie" style="margin:auto; width:270px;"></div>
				</div>
			</div>
		</div>
    </div>

    <div class="home-charts row">
		<div class="col-md-6">
			<div class="panel panel-primary box">
				<div class="panel-heading">
					<div class=""><span class="round green"><i class="icon-ok-1"></i></span> {{ 'PAINEL_DE_OBJETIVOS.PERCENTAGE_ACHIEVED' | translate }}</div>
				</div>
				<div class="panel-options">
					<br>
					<div id="chart-bar-vertical" style="height:600px"></div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-primary box">
				<div class="panel-heading">
					<div class=""><span class="round blue"><i class="icon-cw"></i></span> {{ 'PAINEL_DE_OBJETIVOS.TOTAL_GOALS_CICLE' | translate }}</div>
				</div>
				<div class="panel-options">
					<br>
					<div id="chart-area"></div>
				</div>
			</div>
		</div>
    </div>
</div>
