<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return view('welcome');

});

Route::get('/winloss', function () {

    return 'Win Loss Page';

});

Route::get('/games', function () {

    return 'Games Report';

});

Route::get('/player', function () {

    return 'Players Report';

});

Route::get('/api/v1/test','testDbController@show');
Route::get('/api/v1/excelexport','ExcelExport@importToExcel');
Route::get('/api/v1/excelimport','ExcelImport@excelImport');
Route::get('/api/v1/insertdb', 'ExcelImport@insertToDb');
Route::get('/api/v1/insert','insertExcelData@store');


Route::group(['prefix'=>'api/v1/winloss'], function () {
    Route::post('post', 'WinLossController@store');
    Route::get('get/{type}/{id?}', 'WinLossController@show');
});














