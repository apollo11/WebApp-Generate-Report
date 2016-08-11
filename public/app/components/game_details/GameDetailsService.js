'use strict';
app.factory('GameDetailsService', ['$resource', 'BASE', function($resource, BASE) {

    var ENDPOINT = $resource(BASE.URL + '/api/v1/report/games/get/:id',
        {
            id:'@id'
        },
        {
            geDetails: {
                method: 'GET',
            }
        });

    return ENDPOINT;
}]);