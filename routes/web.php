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

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/analysis/{school}', 'AnalysisController@show');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/conductreporting', function () {
        return view('conductreporting');
    });
    Route::get('/attendancereporting', function () {
        return view('attendancereporting');
    });

    Route::resource('students', 'StudentsController');
    Route::resource('schools', 'SchoolsController');



});
