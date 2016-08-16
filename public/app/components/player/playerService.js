/**
 * Created by apollomm on 7/28/16.
 */
'use strict';
app.factory('PlayerService', ['$resource', 'BASE', function($resource, BASE) {
    var ENDPOINT = $resource(BASE.URL + 'api/v1/report/player/get/file/:file',
        {
            file:'@file'
        },
        {
            getPlayer: {
                method: 'GET'
            }
        });

    return ENDPOINT;

}]);