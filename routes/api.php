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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

  });

Route::post('/logout', 'AuthController@login');
Route::post('/login', 'AuthController@login');

Route::get('/dev/{schoolname}', 'AnalysisController@index');

Route::get('/dev/dfe_compare/{schoolname}', 'Api\AnalysisController@dfe_compare');

Route::get('/dev/norkpi/{schoolname}', 'Api\AnalysisController@norkpi');
Route::get('/dev/ppkpi/{schoolname}', 'Api\AnalysisController@ppkpi');
Route::get('/dev/attendancekpi/{schoolname}/{enddate}', 'Api\AnalysisController@attendancekpi');
Route::get('/dev/attendancekpi/{enddate}', 'Api\AnalysisController@trustattendancekpi');
Route::get('/dev/pakpi/{schoolname}/{enddate}', 'Api\AnalysisController@pakpi');

Route::get('/dev/cohortsummary/{schoolname}', 'Api\AnalysisController@cohortsummary');
Route::get('/dev/yeargroupsummary/{schoolname}', 'Api\AnalysisController@yeargroupsummary');
Route::get('/dev/startersleaverssummary/{schoolname}/{enddate}', 'Api\AnalysisController@startersleaverssummary');

Route::get('/dev/attendanceweekly/{schoolname}/{enddate}', 'Api\AnalysisController@attendanceweekly');
Route::get('/dev/attendanceweek/{schoolname}/{enddate}', 'Api\AnalysisController@attendanceyear');
Route::get('/dev/attendanceweek/{schoolname}/{enddate}/{week}', 'Api\AnalysisController@attendanceweek');
Route::get('/dev/attendancepie/{schoolname}/{enddate}', 'Api\AnalysisController@attendancepie');

Route::get('/dev/paatrisk/{schoolname}/{enddate}', 'Api\AnalysisController@paatrisk');
Route::get('/dev/paatriskstudents/{schoolname}/{enddate}', 'Api\AnalysisController@paatriskstudents');

Route::get('/dev/exclusionsstudents/{schoolname}', 'Api\AnalysisController@exclusionsstudents');

Route::get('/dev/students/{schoolname}', 'Api\StudentsController@list');
Route::get('/dev/student/details/{schoolname}/{id}', 'Api\StudentsController@details');
Route::get('/dev/student/attendance/{schoolname}/{id}', 'Api\StudentsController@attendance');
Route::get('/dev/student/weekdayattendance/{schoolname}/{id}', 'Api\StudentsController@weekdayattendance');
Route::get('/dev/student/weeklyrunningattendance/{schoolname}/{id}', 'Api\StudentsController@weeklyrunningattendance');
Route::get('/dev/student/assessmentdata/{schoolname}/{id}', 'Api\StudentsController@assessmentdata');

Route::get('/dev/{school}', 'Api\AnalysisController@dev');

Route::resource('/dev', 'Api\AnalysisController');
Route::resource('/Assessment', 'Api\AnalysisController');
Route::resource('/Attendance', 'Api\AnalysisController');


// Route::group(['middleware' => 'auth:api'], function(){
//     Route::resource('/dev', 'Api\AnalysisController');
// });
