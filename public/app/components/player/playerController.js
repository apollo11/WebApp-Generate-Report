/**
 * Created by apollomm on 7/28/16.
 */
app.controller('PlayerController', ['$scope', 'PlayerService', function ($scope, PlayerService) {

    $scope.title = 'Player';

    PlayerService.get(function(response) {

        $scope.result = response.content;

    }, function (error) {

        console.log(error);

    })

}]);