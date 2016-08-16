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
                abstract: true,
                views: {

                    'menu': {
                        controller: 'MenuController',
                        templateUrl: 'components/menu/menuView.html'
                    },

                    'footer': {
                        controller: 'FooterController',
                        templateUrl: 'components/footer/footerView.html'
                    }
                }
            })

            .state('fileupload', {
                url: '/fileupload',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'FileUploadController',
                        templateUrl: 'components/fileupload/fileuploadView.html'
                    }
                }

            })

            .state('player', {
                url: '/player/:file',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'PlayerController',
                        templateUrl: 'components/player/playerView.html'
                    }
                }
            })

            .state('playerdetails', {
                url: '/playerdetails/:id',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'PlayerDetailsController',
                        templateUrl: 'components/playerdetails/playerdetailsView.html'
                    }
                }
            })

            .state('game', {
                url: '/game/:file',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'GameController',
                        templateUrl: 'components/game/gameView.html'
                    }
                }
            })

            .state('login', {
                url: '/login',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'LoginController',
                        templateUrl: 'components/login/loginView.html'
                    }
                }
            })

            .state('logout', {
                url: '/logout',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'LogoutController',
                        templateUrl: 'components/logout/logoutView.html'
                    }
                }
            })

            .state('report', {
                url: '/report',
                parent: 'root',
                views: {
                    'report@': {
                        controller: 'ReportController',
                        templateUrl: 'components/report/reportView.html'
                    },
                    'winloss@': {
                        controller: 'WinLossController',
                        templateUrl: 'components/winloss/winlossView.html'
                    },
                    'games@': {
                        controller: 'GameController',
                        templateUrl: 'components/game/gameView.html'
                    },
                    'player@': {
                        controller: 'PlayerController',
                        templateUrl: 'components/player/playerView.html'
                    }
                }
            })

            .state('file', {
                url: '/file/:id',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'FileController',
                        templateUrl: 'components/file/fileView.html'
                    }
                }
            })

            .state('winloss', {
                url: '/winloss/:file',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'WinLossController',
                        templateUrl: 'components/winloss/winlossView.html'
                    }
                }
            })
            .state('winloss.test', {
                templateUrl: 'components/winloss/winlossView.html'
            })

            .state('winlossdetails', {
                url: '/winlossdetails/:id',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'WinLossDetailsController',
                        templateUrl: 'components/winlossdetails/winlossdetailsView.html'
                    }
                }
            })

            .state('games', {
                url: '/games/:file',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'GameController',
                        templateUrl: 'components/game/gameView.html'
                    }
                }
            })

            .state('game_details', {
                url: '/game_details/:id',
                parent: 'root',
                views: {
                    '@': {
                        controller: 'GameDetailsController',
                        templateUrl: 'components/game_details/GameDetailsView.html'
                    }
                }
            })

            .state('testxyz', {
                parent: 'root',
                url:'/testxyz',
                views: {
                    'filters@': {
                        template: '<h1> Filter test</h1>'
                    },
                    'tabledata@': {
                        template:'<h1>Table Data </h1>'
                    }
                }
            })

    }]);
