/**
 * Created by apollomm on 8/10/16.
 */
'use strict';
app.controller('WinLossController', ['$scope', 'WinLossService', function ($scope, WinLossService) {

    $scope.title = 'Win Loss';

    WinLossService.get(function(response) {

        $scope.result = response.content;

    }, function (error) {

        console.error(error);

    })

}]);