/**
 * Created by apollomm on 7/28/16.
 */
app.controller('GameController',
    [
        '$scope'
        , 'GameService'
        ,'$stateParams'
        , function ($scope, GameService, $stateParams) {

        $scope.title = 'Games';
        $scope.param =  {
            file: $stateParams.file
        };

        GameService.get($scope.param, function(response) {

            $scope.result = response.content;

        }, function (error) {

            console.error(error);

        })

}]);