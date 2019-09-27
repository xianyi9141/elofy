<!-- Feed -->
<div ng-controller="feedCtrl" class="hide" ng-class="{'hide': !feeds}">
    <h2>Feed</h2>

    <hr>

    <ul class="cbp_tmtimeline">
        <li ng-repeat="feed in feeds">
            <time class="cbp_tmtime"><span>{{ feed.day }}</span> <span>{{ feed.timeAgo }}</span></time>
            <div class="cbp_tmicon" ng-class="{'bg-success': feed.type == '1', 'bg-secondary': feed.type == '0', 'bg-warning': feed.type == '2'}"> <i ng-class="{'entypo-check': feed.type == '1', 'entypo-cancel': feed.type == '0', 'entypo-info': feed.type == '2'}"></i> </div>
            <div class="cbp_tmlabel">
                <h2>{{ feed.event }}</h2>
                <p>{{ feed.description }}</p>
            </div>
        </li>
    </ul>
</div>