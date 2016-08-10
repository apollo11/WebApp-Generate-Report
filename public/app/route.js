/**
 * Created by apollomm on 6/2/16.
 */
'use strict';
app.config(['$stateProvider'
    , '$urlRouterProvider'
    , '$locationProvider'
    , function ($stateProvider, $urlRouterProvider, $locationProvider) {

        //use the HTML5 History API
        $locationProvider.html5Mode(true);
        $locationProvider.hashPrefix('!');

        //For unmatched url, redirect to /state1
        $urlRouterProvider.otherwise('/');
        $stateProvider
            .state('root', {
                abstract:true,
                views: {

                    'menu': {
                        controller:'MenuController',
                        templateUrl:'components/menu/menuView.html'
                    },

                    'footer': {
                        controller:'FooterController',
                        templateUrl:'components/footer/footerView.html'
                    }
                }
            })

            .state('fileupload', {
                url:'/fileupload',
                parent:'root',
                views: {
                    '@': {
                        controller:'FileUploadController',
                        templateUrl: 'components/fileupload/fileuploadView.html'
                    }
                }

            })

            .state('player', {
                url:'/player',
                parent:'root',
                views: {
                    '@': {
                        controller:'PlayerController',
                        templateUrl: 'components/player/playerView.html'
                    }
                }
            })

            .state('game', {
                url:'/game',
                parent:'root',
                views: {
                    '@':{
                        controller:'GameController',
                        templateUrl:'components/game/gameView.html'
                    }
                }
            })

            .state('login', {
                url:'/login',
                parent:'root',
                views: {
                    '@': {
                        controller:'LoginController',
                        templateUrl:'components/login/loginView.html'
                    }
                }
            })

            .state('logout', {
                url:'/logout',
                parent:'root',
                views: {
                    '@': {
                        controller:'LogoutController',
                        templateUrl:'components/logout/logoutView.html'
                    }
                }
            })

            .state('report', {
                url:'/report',
                parent:'root',
                views: {
                    '@': {
                        controller:'ReportController',
                        templateUrl:'components/report/reportView.html'
                    }
                }
            })

            .state('file', {
                url:'/file/:id',
                parent:'root',
                views: {
                    '@': {
                        controller:'FileController',
                        templateUrl:'components/file/fileView.html'
                    }
                }
            })
    }]);
