/**
 * Created by apollomm on 7/29/16.
 */
'use strict';
app.controller('FooterController', ['$scope', 'TestService', function ($scope, TestService) {

    $scope.title = 'Footer';

    TestService.query(function (response) {
        $scope.testData = response;
    },function(error) {
        console.log(error);
    })

}]);
