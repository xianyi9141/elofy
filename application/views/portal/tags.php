<script>
    var tag = "<?php echo $tag; ?>";
</script>
<!-- Pesquisa de Tags -->
<div ng-controller="tagsCtrl">
    <h2>Pesquisa de Tags</h2>

    <hr>

    <h3>Resultados para a Pesquisa de Tag: <i>{{ tag }}</i></h3>

    <!-- Nav tabs -->
    <ul id="results" class="nav nav-tabs" role="tablist" ng-class="{'hide': results.globals.length == 0 && results.tatics.length == 0 && results.keys.length == 0 && results.activities.length == 0}" style="margin-bottom:0; border-bottom:0;">
        <li role="presentation" ng-class="{'hide': results.globals.length == 0, 'active': results.globals.length != 0}"><a href="#globals" aria-controls="globals" role="tab" data-toggle="tab">Objetivos Globais ({{ results.globals.length }})</a></li>
        <li role="presentation" ng-class="{'hide': results.tatics.length == 0, 'active': results.globals.length == 0 && results.tatics != 0}"><a href="#tatics" aria-controls="tatics" role="tab" data-toggle="tab">Objetivos Táticos ({{ results.tatics.length }})</a></li>
        <li role="presentation" ng-class="{'hide': results.keys.length == 0, 'active': results.globals.length == 0 && results.tatics.length == 0 && results.keys.length != 0}"><a href="#keys" aria-controls="keys" role="tab" data-toggle="tab">Resultados Chave ({{ results.keys.length }})</a></li>
        <li role="presentation" ng-class="{'hide': results.activities.length == 0, 'active': results.globals.length == 0 && results.tatics.length == 0 && results.keys.length == 0 && results.activities.length != 0}"><a href="#activities" aria-controls="activities" role="tab" data-toggle="tab">Atividades ({{ results.activities.length }})</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content box">
        <div role="tabpanel" class="tab-pane" ng-class="{'active': results.globals.length != 0}" id="globals">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:55%;">Título</th>
                        <th class="text-center" style="width:15%;">Responsável</th>
                        <th class="text-center" style="width:15%;">Progresso</th>
                        <th style="width:15%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="global in results.globals">
                        <td>{{ global.title }}</td>
                        <td class="text-center">
                            <img src="" ng-if="global.user.image" ng-src="{{ global.user.image }}" class="img-circle" width="32" height="32" alt="{{ global.user.name }}" style="border:#fff 1px solid;" />
                            <span class="image-replace" ng-if="!global.user.image">{{ initials(global.user.name) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="graph" style="margin-top:2px;">
                                <span class="pie">{{ global.percentage }},{{ 100 - global.percentage }}</span>
                            </div>
                            {{ global.percentage }}%
                        </td>
                        <td class="text-right">
                            <a href="<?php echo base_url()?>planejamento#!/{{ global.id }}" class="btn btn-info btn-xs" style="font-size:14px;"><i class="entypo-forward"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" ng-class="{'active': results.globals.length == 0 && results.tatics != 0}" id="tatics">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:55%;">Título</th>
                        <th class="text-center" style="width:15%;">Responsável</th>
                        <th class="text-center" style="width:15%;">Progresso</th>
                        <th style="width:15%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="tatic in results.tatics">
                        <td>{{ tatic.title }}</td>
                        <td class="text-center">
                            <img src="" ng-if="tatic.user.image" ng-src="{{ tatic.user.image }}" class="img-circle" width="32" height="32" title="{{ tatic.user.name }}" style="border:#fff 1px solid;" />
                            <span class="image-replace" ng-if="!tatic.user.image">{{ initials(tatic.user.name) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="graph" style="margin-top:2px;">
                                <span class="pie">{{ tatic.percentage }},{{ 100 - tatic.percentage }}</span>
                            </div>
                            {{ tatic.percentage }}%
                        </td>
                        <td class="text-right">
                            <a href="<?php echo base_url()?>planejamento#!/tatic/{{ tatic.id }}" class="btn btn-info btn-xs" style="font-size:14px;"><i class="entypo-forward"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="keys" ng-class="{'active': results.globals.length == 0 && results.tatics.length == 0 && results.keys.length != 0}">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:55%;">Título</th>
                        <th class="text-center" style="width:15%;">Responsável</th>
                        <th class="text-center" style="width:15%;">Progresso</th>
                        <th style="width:15%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="key in results.keys">
                        <td>{{ key.title }}</td>
                        <td class="text-center">
                            <img src="" ng-if="key.user.image" ng-src="{{ key.user.image }}" class="img-circle" width="32" height="32" data-toggle="tooltip" data-placement="top" title="{{ key.user.name }}" style="border:#fff 1px solid;" />
                            <span class="image-replace" ng-if="!key.user.image">{{ initials(key.user.name) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="graph" style="margin-top:2px;">
                                <span class="pie">{{ key.percentage }},{{ 100 - key.percentage }}</span>
                            </div>
                            {{ key.percentage }}%
                        </td>
                        <td class="text-right">
                            <a href="<?php echo base_url()?>planejamento#!/tatic/{{ key.tatic_id }}/{{ key.id }}" class="btn btn-info btn-xs" style="font-size:14px;"><i class="entypo-forward"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="activities" ng-class="{'active': results.globals.length == 0 && results.tatics.length == 0 && results.keys.length == 0 && results.activities.length != 0}">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:55%;">Título</th>
                        <th class="text-center" style="width:15%;">Responsável</th>
                        <th class="text-center" style="width:15%;">Progresso</th>
                        <th style="width:15%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="activity in results.activities">
                        <td>{{ activity.title }}</td>
                        <td class="text-center">
                            <img src="" ng-if="activity.user.image" ng-src="{{ activity.user.image }}" class="img-circle" width="32" height="32" title="{{ activity.user.name }}" style="border:#fff 1px solid;" />
                            <span class="image-replace" ng-if="!activity.user.image">{{ initials(activity.user.name) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="graph" style="margin-top:2px;">
                                <span class="pie">{{ activity.percentage }},{{ 100 - activity.percentage }}</span>
                            </div>
                            {{ activity.percentage }}%
                        </td>
                        <td class="text-right">
                            <a href="<?php echo base_url()?>planejamento#!/tatic/{{ activity.tatic_id }}/{{ activity.key_id }}/{{ activity.id }}" class="btn btn-info btn-xs" style="font-size:14px;"><i class="entypo-forward"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="well" ng-class="{'hide': results.globals.length != 0 || results.tatics.length != 0 || results.keys.length != 0 || results.activities.length != 0}">
        Nenhum resultado encontrado!
    </div>
</div>