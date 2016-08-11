/**
 * Created by apollomm on 8/10/16.
 */
'use strict';
app.controller('WinLossDetailsController',
    [
        '$scope'
        ,'$stateParams'
        ,'WinLossDetailsService'
    , function ($scope, $stateParams, WinLossDetailsService) {

        $scope.title = 'Win Loss Details';
        $scope.param ={

            id:$stateParams.id
        };

        WinLossDetailsService.get($scope.param,
            function(response) {

                $scope.result = response;

            }, function (error) {

                console.log(error);

            })

}]);
