<style>
#user_chart svg{
    margin: 6% 0 0 0;
}

.btn-opt-dash {
    border: solid 1px #ccc;
    float: right !important;
    width: 160px;
    text-align: left;
    background: none;
    padding: 7px 9px;
    color: #000;
}
.caret-rightcat-dash {
    float: right;
    margin: 8px 0 0;
}
.progress-bar-danger {
    background-color: #40b9ea;
}
</style>
<!-- OKR's -->

<div ng-controller="novaAvaliacaoCtrl" class="hide" ng-class="{'hide': !cycles && !dash}">
  <div class="dash-header">

          <div class="col-sm-12">
          <div class="row">
      </div>
      </div>
      <div class="row">
                <div class="col-sm-4">
      <h3 class="hading-dash">{{ filter_year }} Avaliações de Desempenho</h3>
      </div>
      
      
    <div class="col-sm-8">
      <div class="buttons pull-right">
            <form class="form-inline" ng-submit="dashfilter()">
                <div class="form-group">
                    <label style="line-height:35px; font-size:14px; margin:0; vertical-align:top;"{{ 'PAINEL_DE_OBJETIVOS.FILTER' | translate }}</label>
                </div>
                <div class="form-group" style="width:120px;">
                    <select class="select-year" data-native="true" data-text="Times" ng-options="team.id as team.name for team in teams" ng-model="selectedTeam"></select>
                </div>
                <div class="form-group" style="width:120px;">
                    <select class="select-year" data-native="true" ng-change="changeYear()" ng-options="year as year for year in years" ng-model="selectedYear"></select>
                </div>
                <div class="form-group" style="width:140px;">
                    <select class="select-cycle" data-native="true" data-text="Trimestre" ng-options="cycle.id as cycle.name for cycle in cycles" ng-model="selectedCycle"></select>
                </div>
                <button class="btn btn-blue filter" type="submit" data-loading-text="<i class='icon-spinner animate-spin'></i>"><i class="entypo-search"></i></button>
            </form>
        </div>
      </div>
</div>
    
  </div>
  <div class="cycle-review-panel">
    <div class="col-sm-12">
		<div class=row>
		<div class="col-sm-6">
    <h3 class="dashboard-elofy-heading">{{ 'PAINEL_DE_DESEMPENHO.GENERAL_VIEW' | translate }}</h3>
    </div>
    
    <div class="col-sm-6">
		
    <!--<div class="btn-group" style="float:right;">
   
   <button type="button" class="btn btn-default dropdown-toggle btn-lg btn-opt-dash" data-toggle="dropdown" aria-expanded="false">
     Show All Teams
      <span class="caret caret-rightcat-dash"></span>
   </button>
   
   <ul class="dropdown-menu" role="menu">
      <li><a href="#">Team 1</a></li>
      <li><a href="#">Team 2</a></li>
      <li><a href="#">Team 3</a></li>
   </ul>
   </div>-->
    </div>
      </div>
      <br>
      <div class="clearfix"></div>     
      <div class="row">
        <div class="col-sm-5">
          <div class="row">
            <div class="review-panel">
				 
              <div class="col-md-6">
              <div class="icon-dash-panel">
               <div class="icon icon-cycle">
					<img src="<?php echo base_url()?>assets/portal/img/evaluation.png">
				</div>
                <h3 class="clr-avg-yellow">{{ dash.userEvaulated }} <span>{{ 'PAINEL_DE_DESEMPENHO.EVATUATIONS_TOTAL' | translate }}</span></h3>
              </div>
              </div>
				  
              <div class="col-md-6">
              <div class="icon-dash-panel">
              <div class="icon icon-cycle">
					<img src="<?php echo base_url()?>assets/portal/img/review.png">
				</div>
                <h3 class="clr-avg-red">{{ dash.userReviewsCompleted }}<span>{{ 'PAINEL_DE_DESEMPENHO.FINISHED_EVALUATIONS' | translate }}</span></h3>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2"><div class="line-review"></div></div>
        <div class="col-sm-5">
          <div class="row">
            <div class="review-panel">
              <div class="col-md-6">
              <div class="icon-dash-panel">
              <div class="icon icon-cycle">
					<img src="<?php echo base_url()?>assets/portal/img/graph.png">
				</div>
                <h3 class="clr-avg-grn" ng-hide="!dash.avaragePerformance">{{ dash.avaragePerformance | number:2 }}<span>{{ 'PAINEL_DE_DESEMPENHO.PERFORMANCE_AVERAGE' | translate }}</span></h3>
                <h3 class="clr-avg-grn" ng-show="!dash.avaragePerformance">0<span>{{ 'PAINEL_DE_DESEMPENHO.PERFORMANCE_AVERAGE' | translate }}</span></h3>
              </div>
				 </div>
              <div class="col-md-5">
              <div class="icon-dash-panel">
               <div class="icon icon-cycle">
					<img src="<?php echo base_url()?>assets/portal/img/sort-by-order.png">
				</div>
                <h3 class="clr-avg-blue" ng-hide="!dash.avaragePotencial">{{ dash.avaragePotencial| number:2 }}<span>{{ 'PAINEL_DE_DESEMPENHO.POTENTIAL_PERFORMANCE' | translate }}</span></h3>
                <h3 class="clr-avg-grn" ng-show="!dash.avaragePotencial">0<span>{{ 'PAINEL_DE_DESEMPENHO.POTENTIAL_PERFORMANCE' | translate }}</span></h3>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="home-charts row">
    <div class="col-md-6">
      <div class="panel panel-primary box">
        <div class="panel-heading">
          <div class=""><span class="round yellow"><i class="icon-chart-line"></i></span></div>
        </div>
        <div class="panel-options"> <br>
          <div id="performance_bar_chart"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-primary box" style="height: 410px;">
        <div class="panel-heading">
          <div class=""><span class="round gray"><i class="icon-chart-pie"></i></span></div>
        </div>
        <div class="panel-options"> <br>
          <div id="geral_pie_chart" ></div>
        </div>
      </div>
    </div>
  </div>
  <div class="home-charts row">
    <div class="col-sm-6">
      <h3 class="feed-heading">{{ 'PAINEL_DE_DESEMPENHO.EVALUATED_BASE' | translate }}</h3>
		<br>
		<div class="competencias-tabel-panel competencias-tb-pd" style="background:#fff;" id="competenciasTb">
			<table class="table competencias-tabel competencias-tabel-profile">
				<thead>
					<tr>
					<th>{{ 'UI.NAME' | translate }}</th>
					  <th>{{ 'PAINEL_DE_DESEMPENHO.PERFORMANCE' | translate }}</th>
					  <th>{{ 'PAINEL_DE_DESEMPENHO.POTENTIAL' | translate }}</th>
					  <th>{{ 'PAINEL_DE_DESEMPENHO.DETAILS' | translate }}</th>
					</tr>
				</thead>
				<tbody>				
					<tr ng-repeat="review in dash.userperformanceReview">
						<td>{{ review.name }}</td>
						<td ng-show="review.performance">{{ review.performance }}</td>
						<td ng-show="!review.performance">0</td>
						<td ng-show="review.potencial">{{ review.potencial }}</td>
						<td ng-show="!review.potencial">0</td>
						<td><a href="javascript:void(0)" class="btn btn-info btn-xs" ng-click="userReviewOverview(review.userid,review.id)"><i class="entypo-forward"></i></a></td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
    <div class="col-sm-6" ng-show="activetab==1">
		<h3 class="feed-heading">{{ 'PAINEL_DE_DESEMPENHO.USER_DETAILS' | translate }}</h3>
		<br>
      <div class="competencias-tabel-panel competencias-tb-performance" style="background:#fff; padding: 15px">
		  <div class="employes_nmae_ig">
				<div class="dashboard employe_image employe_profile-img" ng-style="{'background-image': (userreviews.userInfo.image) ? 'userreviews.userInfo.image' : 'url({{userreviews.userInfo.image}})'}">
					<img src="" ng-if="userreviews.userInfo.image" ng-src="{{ userreviews.userInfo.image }}" class="img-circle" width="64" height="64" alt="{{ userreviews.userInfo.name }}" />
					<span class="user-image-replace employe_profile-img" ng-if="!userreviews.userInfo.image">{{ initials(userreviews.userInfo.name) }}</span>
				</div>
				<div class="personal_detail personal_detail-graphs">
				  <h2>
					{{ userreviews.userInfo.name }} <span class="user-cashier-panel">{{ userreviews.userInfo.position}}</span></h2>
				  <div class="employe_review">
					<div class="review_left_dv">
						<div class="review_dv" ng-if="userreviews.userInfo.last_change !=''">
                            {{ 'PAINEL_DE_DESEMPENHO.LAST_UPDATE' | translate }} {{ userreviews.userInfo.last_change | amUtc | amDateFormat:'MMMM DD, YYYY' }}
						</div>
						<div class="review_dv" ng-if="userreviews.userInfo.birthday ==''">
                            {{ 'PAINEL_DE_DESEMPENHO.LAST_UPDATE_NOT_DEFINED' | translate }}
						</div>
					</div>
					</div>
				</div>
			</div>
			<h4 class="progress-percent">{{ 'PAINEL_DE_DESEMPENHO.PERFORMANCE' | translate }}<span ng-show="userreviews.userReviewGraph.performance">{{ userreviews.userReviewGraph.performance }}</span><span ng-show="!userreviews.userReviewGraph.performance">0</span></h4>
		<div class="progress progress-bar-1">
			
    <div class="progress-bar progress-bar-success progress-bar-grn-panel" role="progressbar" style="width:{{ userreviews.userReviewGraph.performance }}%"><span class="done_progress"></span>
    </div>
  </div>
  <br>
  <h4 class="progress-percent">{{ 'PAINEL_DE_DESEMPENHO.POTENTIAL' | translate }}<span ng-show="userreviews.userReviewGraph.potencial">{{ userreviews.userReviewGraph.potencial }}</span><span ng-show="!userreviews.userReviewGraph.potencial">0</span></h4>
  <div class="progress progress-bar-1">

    <div class="progress-bar progress-bar-danger progress-bar-red-danger" role="progressbar" style="width:{{ userreviews.userReviewGraph.potencial }}%"><span class="done_progress"></span>
    </div>
  </div>
		</div>
    </div>
  </div>
</div>
