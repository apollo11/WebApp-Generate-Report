'use strict';

app.factory('FileService', ['$resource', 'BASE', function($resource, BASE) {
    var ENDPOINT = $resource(BASE.URL + '/api/v1/file/get/file/:id',
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