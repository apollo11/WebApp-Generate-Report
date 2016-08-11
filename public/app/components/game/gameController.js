/**
 * Created by apollomm on 7/28/16.
 */
app.controller('GameController', ['$scope', 'GameService', function ($scope, GameService) {

    $scope.title = 'Games';

    GameService.get(function(response) {

        $scope.result = response.content;

    }, function (error) {

        console.error(error);

    })

}]);