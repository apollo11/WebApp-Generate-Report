'use strict';

app.factory('PlayerDetailsService', ['$resource', 'BASE', function($resource, BASE) {
    var ENDPOINT = $resource(BASE.URL + '/api/v1/report/player/get/:id',
        {
            id:'@id'
        },
        {
            geFile: {
                method: 'GET'
            }
        });

    return ENDPOINT;
}]);