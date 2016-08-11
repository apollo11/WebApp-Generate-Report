'use strict';

app.factory('WinLossDetailsService', ['$resource', 'BASE', function($resource, BASE) {
    var ENDPOINT = $resource(BASE.URL + '/api/v1/report/winloss/get/:id',
        {
            id:'@id'
        },
        {
            geDetails: {
                method: 'GET',
                isArray:false
            }
        });

    return ENDPOINT;
}]);