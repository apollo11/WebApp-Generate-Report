/**
 * Created by apollomm on 7/28/16.
 */
'use strict';
app.controller('MenuController',
    [
        '$scope'
        ,'$stateParams'
        ,'$state'
        , function ($scope, $stateParams, $state) {

            $scope.title = 'Menu';

            if(!_.isUndefined($state.params)) {
                $scope.fileName = $state.params.file;
            }


}]);