<script>
    var id_global = "<?php echo $id; ?>";
</script>
<!-- OKR's -->
<div ng-controller="organogramaCtrl" class="hide" ng-class="{'hide': !tree}">
    <h2>
       <a href="javascript:history.back()" class="btn btn-white"><i class="icon-left-3"></i></a> Organograma
    </h2>

    <hr>

    <div id="tree">
        <ul>
            <li ng-repeat="item in tree" ng-include="'itemVal'"></li>
        </ul>
    </div>

    <script type="text/ng-template" id="itemVal">
        <li>
            <a ng-if="item.percentage <= 50" style="background: rgba(226, 68, 92, 0.5);" href="<?php echo base_url()?>planejamento#!/{{ item.type == 'global' ? item.id : 'tatic/' + item.id }}" target="_blank" class="box">
                <h3>{{ item.title }}</h3>
                <div class="info">
                    <div class="pull-left text-right">
                        <div class="user">
                            <img src="" ng-if="item.user.image" ng-src="{{ item.user.image }}" class="img-circle" width="24" height="24" data-toggle="tooltip" data-placement="top" title="{{ item.user.name }}" />
                            <span class="image-replace" ng-if="!item.user.image">{{ initials(item.user.name) }}</span>
                        </div>
                    </div>
                    <p ng-if="item.type == 'global'" class="pull-right">Objetivo Global</p>
                    <p ng-if="item.type == 'tatic'" class="pull-right">Objetivo Tático</p>
                </div>
                <div class="progress progress-bar-default" style="margin:7px 0;">
                    <div ng-if="item.percentage <= 50" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ item.percentage }}" aria-valuemin="0" aria-valuemax="100" style="background-color: rgba(226, 68, 92, 1) !important; min-width: 2em; width: {{ item.percentage }}%;">
                        {{ item.percentage }}%
                    </div>
                </div>
            </a>
            <a ng-if="item.percentage > 50 && item.percentage <= 80" style="background: rgba(253, 171, 61, 0.5);" href="<?php echo base_url()?>planejamento#!/{{ item.type == 'global' ? item.id : 'tatic/' + item.id }}" target="_blank" class="box">
                <h3>{{ item.title }}</h3>
                <div class="info">
                    <div class="pull-left text-right">
                        <div class="user">
                            <img src="" ng-if="item.user.image" ng-src="{{ item.user.image }}" class="img-circle" width="24" height="24" data-toggle="tooltip" data-placement="top" title="{{ item.user.name }}" />
                            <span class="image-replace" ng-if="!item.user.image">{{ initials(item.user.name) }}</span>
                        </div>
                    </div>
                    <p ng-if="item.type == 'global'" class="pull-right">Objetivo Global</p>
                    <p ng-if="item.type == 'tatic'" class="pull-right">Objetivo Tático</p>
                </div>
                <div class="progress progress-bar-default" style="margin:7px 0;">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ item.percentage }}" aria-valuemin="0" aria-valuemax="100" style="background: rgba(253, 171, 61, 1) !important; min-width: 2em; width: {{ item.percentage }}%;">
                        {{ item.percentage }}%
                    </div>
                </div>
            </a>
            <a ng-if="item.percentage > 80 && item.percentage <= 99" style="background: rgba(0, 201, 117, 0.5);" href="<?php echo base_url()?>planejamento#!/{{ item.type == 'global' ? item.id : 'tatic/' + item.id }}" target="_blank" class="box">
                <h3>{{ item.title }}</h3>
                <div class="info">
                    <div class="pull-left text-right">
                        <div class="user">
                            <img src="" ng-if="item.user.image" ng-src="{{ item.user.image }}" class="img-circle" width="24" height="24" data-toggle="tooltip" data-placement="top" title="{{ item.user.name }}" />
                            <span class="image-replace" ng-if="!item.user.image">{{ initials(item.user.name) }}</span>
                        </div>
                    </div>
                    <p ng-if="item.type == 'global'" class="pull-right">Objetivo Global</p>
                    <p ng-if="item.type == 'tatic'" class="pull-right">Objetivo Tático</p>
                </div>
                <div class="progress progress-bar-default" style="margin:7px 0;">
                    <div ng-if="item.percentage > 80 && item.percentage <= 99" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ item.percentage }}" aria-valuemin="0" aria-valuemax="100" style="background-color: rgba(0, 201, 117, 1) !important; min-width: 2em; width: {{ item.percentage }}%;">
                        {{ item.percentage }}%
                    </div>
                </div>
            </a>
            <a ng-if="item.percentage > 99" style="background: rgba(5, 83, 223, 0.5);" href="<?php echo base_url()?>planejamento#!/{{ item.type == 'global' ? item.id : 'tatic/' + item.id }}" target="_blank" class="box">
                <h3>{{ item.title }}</h3>
                <div class="info">
                    <div class="pull-left text-right">
                        <div class="user">
                            <img src="" ng-if="item.user.image" ng-src="{{ item.user.image }}" class="img-circle" width="24" height="24" data-toggle="tooltip" data-placement="top" title="{{ item.user.name }}" />
                            <span class="image-replace" ng-if="!item.user.image">{{ initials(item.user.name) }}</span>
                        </div>
                    </div>
                    <p ng-if="item.type == 'global'" class="pull-right">Objetivo Global</p>
                    <p ng-if="item.type == 'tatic'" class="pull-right">Objetivo Tático</p>
                </div>
                <div class="progress progress-bar-default" style="margin:7px 0;">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ item.percentage }}" aria-valuemin="0" aria-valuemax="100" style="background-color: rgba(5, 83, 223, 1) !important; min-width: 2em; width: {{ item.percentage }}%;">
                        {{ item.percentage }}%
                    </div>
                </div>
            </a>
            <ul ng-if="item.sub.length">
                <li ng-repeat="item in item.sub" ng-include="'itemVal'"></li>
            </ul>
        </li>
    </script>
</div>