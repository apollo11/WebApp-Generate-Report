/**
 * Created by apollomm on 7/28/16.
 */
'use strict';
app.factory('GameService', ['$resource', 'BASE', function($resource, BASE) {
    var ENDPOINT = $resource(BASE.URL + '/api/v1/report/games/get',{},
        {
            gamesReport: {
                method: 'GET'
            }
        });

    return ENDPOINT;

}]);