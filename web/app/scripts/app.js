'use strict';

// Declare app level module which depends on views, and components
angular.module('medclinic', [
    'ui.router'
])
    .config(function($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/chat');

        $stateProvider
            .state('chat', {
                url: '/chat',
                templateUrl: '../views/chat.html',
                controller: 'ChatCtrl as ctrl'
            })
            .state('admin', {
                url: '/admin',
                templateUrl: '../views/admin.html',
                controller: 'AdminCtrl as ctrl'
            })
        ;
        
    })
    .config(function($httpProvider) {
        $httpProvider.defaults.withCredentials = true;
    })
    .controller('appCtrl', function() {
    });
