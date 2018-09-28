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
Route::get('/results/{round}', 'ResultController@show');

Route::get('/test', function () {
});

Route::get('/rounds/{round}', 'RoundController@show');

Route::get('/season', 'SeasonController@index');
Route::get('/archive', 'SeasonController@archiveIndex');
Route::get('/archive/{season}', 'SeasonController@archiveShow');
Route::get('/archive/{season}/{round}', 'SeasonController@archiveShowRound');

Route::get('/rules', function () {
    return view('rules.show');
});
Route::get('/privacy', function () {
    return view('privacy.show');
});

Route::get('/admin', 'AdminController@index');
Route::get('/admin/manager', 'AdminController@managerIndex');
Route::get('/admin/manager/{user}', 'AdminController@managerEdit');
Route::post('/admin/manager/{user}', 'AdminController@managerUpdate');
Route::get('/admin/log', 'AdminController@logIndex');
Route::get('/admin/teams', 'AdminController@teamIndex');
Route::get('/admin/teams/{team}', 'AdminController@teamEdit');
Route::get('/admin/teams/delete/{team}', 'AdminController@teamDelete');
Route::get('/admin/teams/restore/{team}', 'AdminController@teamRestore');
Route::post('/admin/teams/{team}', 'AdminController@teamUpdate');
Route::get('/admin/entrylist', 'AdminController@teamList');
Route::get('/admin/drivers', 'AdminController@driverIndex');
Route::get('/admin/drivers/all', 'AdminController@driverIndexAll');
Route::get('/admin/drivers/{driver}', 'AdminController@driverEdit');
Route::post('/admin/drivers/{driver}', 'AdminController@driverUpdate');
Route::get('/admin/settings', 'AdminController@settingsEdit');
Route::post('/admin/settings', 'AdminController@settingsUpdate');
Route::get('/admin/settings', 'AdminController@settingsEdit');
Route::get('/admin/settings/emails', 'AdminController@showEmails');
Route::get('/admin/results', 'AdminController@resultIndex');
Route::get('/admin/results/create/{round}', 'AdminController@resultCreate');
Route::post('/admin/results/create/{round}', 'AdminController@resultStore');
Route::get('/admin/season', 'AdminController@seasonIndex');
Route::get('/admin/season/edit/{season}', 'AdminController@seasonEdit');
Route::post('/admin/season/edit/{season}', 'AdminController@seasonUpdate');
Route::get('/admin/season/create', 'AdminController@seasonCreate');
Route::Post('/admin/season/create', 'AdminController@seasonStore');
Route::get('/admin/season/edit/{season}/editRound/{round}', 'AdminController@roundEdit');
Route::post('/admin/season/edit/{season}/editRound/{round}', 'AdminController@roundUpdate');
Route::get('/admin/season/edit/{season}/createRound', 'AdminController@roundCreate');
Route::post('/admin/season/edit/{season}/createRound', 'AdminController@roundStore');
Route::get('/admin/invites', 'AdminController@invitesIndex');
Route::post('/admin/invites', 'AdminController@invitesProcess');
Route::get('/admin/briefing', 'AdminController@briefingEdit');
Route::post('/admin/briefing', 'AdminController@briefingSend');

Route::get('/ajax/formerteam/{team}', 'AjaxController@formerTeams');
Route::get('/ajax/changeTeam/{team}', 'AdminController@updateTeamStatus');
