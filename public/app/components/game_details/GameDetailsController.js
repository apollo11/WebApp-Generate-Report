/**
 * Created by apollomm on 8/10/16.
 */
'use strict';
app.controller('GameDetailsController',
    [
        '$scope'
        ,'$stateParams'
        ,'GameDetailsService'
        , function ($scope, $stateParams, GameDetailsService) {

        $scope.title = 'Game Details';
        $scope.param ={

            id:$stateParams.id
        };

        GameDetailsService.get($scope.param,
            
            function(response) {

                $scope.result = response;

            }, function (error) {

                console.log(error);

            })

    }]);
