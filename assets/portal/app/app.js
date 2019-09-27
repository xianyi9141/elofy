'use strict';

var elofy = angular.module('elofyApp', [
	'ngRoute',
  'ngSanitize',
  'Services',
  'luegg.directives',
  'linkify',
  'angularMoment'
]);

if(window.location.href.indexOf('planejamento') > -1){
  angular.
    module('elofyApp').
    config(['$locationProvider', '$routeProvider',
      function config($locationProvider, $routeProvider) {
        //$locationProvider.html5Mode(true);

        $routeProvider.
          when('/', {
            templateUrl: baseurl + 'assets/portal/templates/objetivos-globais.html',
            controller: 'globalCtrl'
          }).
          when('/:objectiveId', {
            templateUrl: baseurl + 'assets/portal/templates/detalhes-global.html',
            controller: 'detailsCtrl'
          }).
          when('/tatic/:taticId/:keyId?/:activityId?', {
            templateUrl: baseurl + 'assets/portal/templates/detalhes-tatico.html',
            controller: 'taticCtrl'
          }).
          otherwise('/');
      }
    ]);
}