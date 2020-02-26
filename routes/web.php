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
Route::get('/logout', 'SessionsController@destroy');

Route::prefix('myteams')->group(function () {
    Route::get('/', 'MyteamController@show');
    Route::get('create', 'MyteamController@create');
    Route::post('create', 'MyteamController@store');
    Route::get('edit/{team}', 'MyteamController@edit');
    Route::post('edit/{team}', 'MyteamController@update');
    Route::get('delete/{team}', 'MyteamController@delete');
    Route::post('delete/{team}', 'MyteamController@destroy');
});

Route::prefix('teams')->group(function () {
    Route::get('/', 'TeamController@index');
    Route::post('/', 'TeamController@search');
    Route::get('{team}', 'TeamController@show');
});

Route::get('/spotterguide/{class?}', 'TeamController@spotterguide');

Route::prefix('driver')->group(function () {
    Route::get('/', 'DriverController@index');
    Route::post('/', 'DriverController@search');
    Route::get('{driver}', 'DriverController@show');
});

Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@edit');
    Route::post('/', 'UserController@update');
});

Route::prefix('results')->group(function () {
    Route::get('/', 'ResultController@index');
    Route::get('{round}', 'ResultController@show');
});

Route::get('/rounds/{round}', 'RoundController@show');

Route::get('/season', 'SeasonController@index');

Route::prefix('archive')->group(function () {
    Route::get('/', 'SeasonController@archiveIndex');
    Route::get('{season}', 'SeasonController@archiveShow');
    Route::get('{season}/{round}', 'SeasonController@archiveShowRound');
});

Route::get('/rules', 'RulesController@index');

Route::get('/privacy', function () {
    return view('privacy.show');
});

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', 'Admin\GeneralController@index');

    Route::prefix('manager')->group(function () {
        Route::get('/', 'Admin\ManagerController@index');
        Route::get('{user}', 'Admin\ManagerController@edit');
        Route::post('{user}', 'Admin\ManagerController@update');
    });

    Route::get('log', 'Admin\GeneralController@logIndex');

    Route::prefix('teams')->group(function () {
        Route::get('/', 'Admin\TeamController@index');
        Route::get('{team}', 'Admin\TeamController@edit');
        Route::post('{team}', 'Admin\TeamController@update');
        Route::get('delete/{team}', 'Admin\TeamController@delete');
        Route::get('restore/{team}', 'Admin\TeamController@restore');
    });

    Route::get('entrylist', 'Admin\TeamController@list');

    Route::prefix('drivers')->group(function () {
        Route::get('/', 'Admin\DriverController@index');
        Route::get('all', 'Admin\DriverController@all');
        Route::get('{driver}', 'Admin\DriverController@edit');
        Route::post('{driver}', 'Admin\DriverController@update');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', 'Admin\SettingsController@edit');
        Route::post('/', 'Admin\SettingsController@update');
        Route::get('emails', 'Admin\SettingsController@showEmails');
    });

    Route::prefix('results')->group(function () {
        Route::get('/', 'Admin\ResultController@index');
        Route::get('/create/{round}', 'Admin\ResultController@create');
        Route::post('/create/{round}', 'Admin\ResultController@store');
    });

    Route::prefix('season')->group(function () {
        Route::get('/', 'Admin\SeasonController@index');
        Route::get('create', 'Admin\SeasonController@create');
        Route::Post('create', 'Admin\SeasonController@store');
        Route::get('edit/{season}', 'Admin\SeasonController@edit');
        Route::post('edit/{season}', 'Admin\SeasonController@update');
        Route::get('delete/{season}', 'Admin\SeasonController@delete');
        Route::get('edit/{season}/createRound', 'Admin\SeasonController@roundCreate');
        Route::post('edit/{season}/createRound', 'Admin\SeasonController@roundStore');
        Route::get('edit/{season}/editRound/{round}', 'Admin\SeasonController@roundEdit');
        Route::post('edit/{season}/editRound/{round}', 'Admin\SeasonController@roundUpdate');
        Route::get('edit/{season}/deleteRound/{round}', 'Admin\SeasonController@roundDelete');
    });

    Route::prefix('invites')->group(function () {
        Route::get('/', 'Admin\InviteController@index');
        Route::post('/', 'Admin\InviteController@process');
    });

    Route::prefix('briefing')->group(function () {
        Route::get('/', 'Admin\BriefingController@edit');
        Route::post('/', 'Admin\BriefingController@send');
    });

    Route::prefix('news')->group(function () {
        Route::get('/', 'Admin\NewsController@index');
        Route::get('create', 'Admin\NewsController@create');
        Route::post('create', 'Admin\NewsController@store');
        Route::get('edit/{news}', 'Admin\NewsController@edit');
        Route::post('edit/{news}', 'Admin\NewsController@update');
        Route::get('delete/{news}', 'Admin\NewsController@delete');
    });

    Route::prefix('tools')->group(function () {
        Route::get('/', 'Admin\ToolController@show');
        Route::get('pq', 'Admin\ToolController@pqtoolShow');
        Route::post('pq', 'Admin\ToolController@pqtoolProcess');
    });

    Route::get('driverupdate', 'Admin\GeneralController@updateDriverInfo');
});

Route::prefix('ajax')->group(function () {
    Route::post('formerteam/{team}', 'AjaxController@formerTeams');
    Route::get('changeTeam/{team}', 'Admin\TeamController@updateTeamStatus');
    Route::post('irating/team', 'AjaxController@iratingTeam');
    Route::get('settings/{setting}', 'Admin\GeneralController@updateSetting');
});

Route::get('/downloads', 'DownloadController@index');
