/**
 * Created by apollomm on 8/8/16.
 */
'use strict';
app.controller('FileController', ['$scope', '$stateParams', 'FileService', function ($scope, $stateParams, FileService) {

    $scope.title = 'File Controller';
    $scope.param = {
        id: $stateParams.id
    };

    FileService.geFile($scope.param, function (response) {

        $scope.result = response;
    },
     function (error) {
            console.log = error;
     });

}]);