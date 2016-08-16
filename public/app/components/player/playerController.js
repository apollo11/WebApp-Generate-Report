/**
 * Created by apollomm on 7/28/16.
 */
app.controller('PlayerController',
    [
        '$scope'
        , 'PlayerService'
        , '$stateParams'
        , function ($scope, PlayerService, $stateParams) {

    $scope.title = 'Player';
    $scope.param = {
        file: $stateParams.file
    };

    PlayerService.get($scope.param ,function(response) {

        $scope.result = response.content;

    }, function (error) {

        console.log(error);

    })

}]);