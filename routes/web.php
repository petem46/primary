<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/conductreporting', function () {
        return view('conductreporting');
    });
    Route::get('/attendancereporting', function () {
        return view('attendancereporting');
    });
    Route::get('/analysis/{school}', 'AnalysisController@show');

    Route::resource('students', 'StudentsController');
    Route::resource('schools', 'SchoolsController');


    Route::get('/home', 'HomeController@index')->name('home');

});
