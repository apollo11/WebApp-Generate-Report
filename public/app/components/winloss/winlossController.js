/**
 * Created by apollomm on 8/10/16.
 */
'use strict';
app.controller('WinLossController',
    [
        '$scope'
        , 'WinLossService'
        ,'$stateParams'
        , function ($scope, WinLossService, $stateParams) {

            $scope.title = 'Win Loss';
            $scope.param = {
              file: $stateParams.file
            };

            WinLossService.get($scope.param, function(response) {

                $scope.result = response.content;

            }, function (error) {

                console.error(error);

            })

}]);