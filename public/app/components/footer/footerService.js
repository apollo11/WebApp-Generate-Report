/**
 * Created by apollomm on 7/29/16.
 */
'use strict';
app.factory('TestService', ['$resource', 'BASE', function($resource,BASE) {

    var ENDPOINT = $resource(BASE.URL + 'api/v1/test', {},
        {
            testData: {
                method:'GET'
            }
        });

    return ENDPOINT;

}]);