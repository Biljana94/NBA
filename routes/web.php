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

Route::get('/', 'TeamsController@index');

Route::get('/teams/{id}', 'TeamsController@show')->name('teams.show'); //ruta koja nas vodi na svaki tim posebno

Route::get('players/{id}', 'PlayersController@show'); //kad se klikne na svakog igraca da se prikazu njegovi podaci, koristi se metoda show() iz PlayersController.php
