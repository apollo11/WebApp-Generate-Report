/**
 * Created by apollomm on 8/11/16.
 */
app.controller('PlayerDetailsController',
    [
        '$scope'
        , '$stateParams'
        , 'PlayerDetailsService'
        ,
        function ($scope, $stateParams, PlayerDetailsService) {


            $scope.title = 'Player Details';
            $scope.params = {
                id: $stateParams.id
            };

            PlayerDetailsService.get($scope.params,
                function (response) {

                    $scope.result = response;

                }, function (error) {

                    console.log(error);

                });

        }]);

