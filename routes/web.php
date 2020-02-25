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

use Illuminate\Database\Connection;

// Route::get('/', function () {

//     // Test database connection
//     try {
//         DB::connection()->getPdo();
//         echo "Connected successfully to: " . DB::connection()->getDatabaseName();
//     } catch (\Exception $e) {
//         die("Could not connect to the database. Please check your configuration. error:" . $e );
//     }

//     return view('welcome');
// });



Route::get('/notapproved', function () {
    return view('notapproved');
});


Auth::routes();

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/analysis/{school}', 'AnalysisController@show');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('/', function () {
    //     return redirect('/analysis/' . App\User::first()->getSchool());
    // })->name('dashboard');

    // Route::get('/home', function () {
    //     return redirect('/analysis/' . App\User::first()->getSchool());
    // })->name('dashboard');

    // Route::get('/dev/{school}', 'AnalysisController@dev');

    // Route::get('/analysis/assessment/{school}', 'AnalysisController@assessment');

    // Route::get('/conductreporting', function () {
    //     return view('conductreporting');
    // });
    // Route::get('/attendancereporting', function () {
    //     return view('attendancereporting');
    // });

    // Route::resource('students', 'StudentsController');
    // Route::resource('schools', 'SchoolsController');


});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
