'use strict';

app.factory('file', ['$resource', 'BASE', function($resource, BASE) {
    var ENDPOINT = $resource(BASE.URL + '/api/v1/winloss/get',{},
        {
            geFile: {
                method: 'GET'
            }
        });

    return ENDPOINT;
}]);