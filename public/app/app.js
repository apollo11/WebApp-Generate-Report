'use strict';
var app = angular.module('backdoor',
    [
         'ui.router'
        ,'ngResource'
        ,'ngCookies'
        ,'infinite-scroll'
        ,'angularFileUpload'
    ]
);

app.constant('BASE', {URL:'http://backdoor.local/'});
