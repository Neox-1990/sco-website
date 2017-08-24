<?php
use App\Team;
use App\Mail\TestMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::post('/logout', 'SessionsController@destroy');

Route::get('/myteams', 'MyteamController@show');
Route::get('/myteams/create', 'MyteamController@create');
Route::post('/myteams/create', 'MyteamController@store');
Route::get('/myteams/edit/{team}', 'MyteamController@edit');
Route::post('/myteams/edit/{team}', 'MyteamController@update');
Route::get('/myteams/delete/{team}', 'MyteamController@delete');
Route::post('/myteams/delete/{team}', 'MyteamController@destroy');

Route::get('/teams', 'TeamController@index');
Route::post('/teams', 'TeamController@search');
Route::get('/teams/{team}', 'TeamController@show');

Route::post('/driver', 'DriverController@search');
Route::get('/driver', 'DriverController@index');
Route::get('/driver/{driver}', 'DriverController@show');

Route::get('/user', 'UserController@edit');
Route::post('/user', 'UserController@update');

Route::get('/results', 'ResultController@index');

Route::get('/test', function () {
});

Route::get('/rounds/{round}', 'RoundController@show');

Route::get('/season', 'SeasonController@index');

Route::get('/rules', function () {
    return view('rules.show');
});

Route::get('/admin', 'AdminController@index');
Route::get('/admin/manager', 'AdminController@managerIndex');
Route::get('/admin/manager/{user}', 'AdminController@managerEdit');
Route::post('/admin/manager/{user}', 'AdminController@managerUpdate');
Route::get('/admin/log', 'AdminController@logIndex');
Route::get('/admin/teams', 'AdminController@teamIndex');
Route::get('/admin/teams/{team}', 'AdminController@teamEdit');
Route::post('/admin/teams/{team}', 'AdminController@teamUpdate');
Route::get('/admin/settings', 'AdminController@settingsEdit');
Route::post('/admin/settings', 'AdminController@settingsUpdate');
