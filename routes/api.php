<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'ApiController@index');
Route::post('/submit', 'ApiController@submit');
Route::get('/data', 'ApiController@data');
Route::get('/analysis', 'ApiController@analysis');
// Route::get('/getjson', 'ApiController@getjson');
Route::get('/charts', 'ApiController@charts');
