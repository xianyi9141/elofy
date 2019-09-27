'use strict';

var elofy = angular.module('elofyApp', [
	'ngRoute',
  'ngSanitize',
  'Services'
]);

if(window.location.href.indexOf('planejamento') > -1){
  angular.
    module('elofyApp').
    config(['$locationProvider', '$routeProvider',
      function config($locationProvider, $routeProvider) {
        //$locationProvider.html5Mode(true);

        $routeProvider.
          when('/', {
            templateUrl: 'templates/objetivos-globais.html',
            controller: 'globalCtrl'
          }).
          when('/:objectiveId', {
            templateUrl: 'templates/detalhes-global.html',
            controller: 'detailsCtrl'
          }).
          when('/tatic/:taticId/:keyId?/:activityId?', {
            templateUrl: 'templates/detalhes-tatico.html',
            controller: 'taticCtrl'
          }).
          otherwise('/');
      }
    ]);
}