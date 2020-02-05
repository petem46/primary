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

Route::get('/dev/{schoolname}', 'AnalysisController@index');
Route::get('/dev/norkpi/{schoolname}', 'Api\AnalysisController@norkpi');
Route::get('/dev/ppkpi/{schoolname}', 'Api\AnalysisController@ppkpi');
Route::get('/dev/attendancekpi/{schoolname}', 'Api\AnalysisController@attendancekpi');
Route::get('/dev/pakpi/{schoolname}', 'Api\AnalysisController@pakpi');
Route::get('/dev/cohortsummary/{schoolname}', 'Api\AnalysisController@cohortsummary');
Route::get('/dev/yeargroupsummary/{schoolname}', 'Api\AnalysisController@yeargroupsummary');
Route::get('/dev/startersleaverssummary/{schoolname}', 'Api\AnalysisController@startersleaverssummary');
Route::get('/dev/attendanceweekly/{schoolname}', 'Api\AnalysisController@attendanceweekly');



Route::get('/dev/{school}', 'Api\AnalysisController@dev');

Route::resource('/dev', 'Api\AnalysisController');


// Route::group(['middleware' => 'auth:api'], function(){
//     Route::resource('/dev', 'Api\AnalysisController');
// });
