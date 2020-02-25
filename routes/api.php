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
Route::get('/dev/attendancekpi/{schoolname}/{enddate}', 'Api\AnalysisController@attendancekpi');
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
Route::get('/dev/student/data/{schoolname}/{id}', 'Api\StudentsController@data');

Route::get('/dev/fcat/norkpi/{schoolname}', 'Api\FCATAnalysisController@norkpi');
Route::get('/dev/fcat/ppkpi/{schoolname}', 'Api\FCATAnalysisController@ppkpi');
Route::get('/dev/fcat/attendancekpi/{schoolname}/{enddate}', 'Api\FCATAnalysisController@attendancekpi');
Route::get('/dev/fcat/pakpi/{schoolname}/{enddate}', 'Api\FCATAnalysisController@pakpi');

Route::get('/dev/fcat/cohortsummary/{schoolname}', 'Api\FCATAnalysisController@cohortsummary');
Route::get('/dev/fcat/yeargroupsummary/{schoolname}', 'Api\FCATAnalysisController@yeargroupsummary');
Route::get('/dev/fcat/startersleaverssummary/{schoolname}/{enddate}', 'Api\FCATAnalysisController@startersleaverssummary');

Route::get('/dev/fcat/attendanceweekly/{schoolname}/{enddate}', 'Api\FCATAnalysisController@attendanceweekly');
Route::get('/dev/fcat/attendanceweek/{schoolname}/{enddate}', 'Api\FCATAnalysisController@attendanceyear');
Route::get('/dev/fcat/attendanceweek/{schoolname}/{enddate}/{week}', 'Api\FCATAnalysisController@attendanceweek');
Route::get('/dev/fcat/attendancepie/{schoolname}/{enddate}', 'Api\FCATAnalysisController@attendancepie');

Route::get('/dev/fcat/paatrisk/{schoolname}/{enddate}', 'Api\FCATAnalysisController@paatrisk');
Route::get('/dev/fcat/paatriskstudents/{schoolname}/{enddate}', 'Api\FCATAnalysisController@paatriskstudents');

Route::get('/dev/fcat/exclusionsstudents/{schoolname}', 'Api\FCATAnalysisController@exclusionsstudents');




Route::get('/dev/{school}', 'Api\AnalysisController@dev');

Route::resource('/dev', 'Api\AnalysisController');
Route::resource('/Assessment', 'Api\AnalysisController');
Route::resource('/Attendance', 'Api\AnalysisController');


// Route::group(['middleware' => 'auth:api'], function(){
//     Route::resource('/dev', 'Api\AnalysisController');
// });
