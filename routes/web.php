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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::post('/logout', 'SessionsController@destroy');

Route::get('/myteams', 'MyteamController@show');
Route::get('/myteams/create', 'MyteamController@create');
Route::post('/myteams/create', 'MyteamController@store');
Route::get('/myteams/edit/{team}', 'MyteamController@edit');
Route::post('/myteams/edit/{team}', 'MyteamController@update');
