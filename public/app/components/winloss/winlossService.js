/**
 * Created by apollomm on 8/10/16.
 */
'use strict';
app.factory('WinLossService', ['$resource', 'BASE', function($resource, BASE) {

    var ENDPOINT = $resource(BASE.URL + '/api/v1/report/winloss/get',{},
        {
            winLossReport: {
                method: 'GET',
            }
        });

    return ENDPOINT;

}]);