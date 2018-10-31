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

Route::get('/', 'TeamsController@index')->name('teams.index');

Route::get('/teams/{id}', 'TeamsController@show')->name('teams.show'); //ruta koja nas vodi na svaki tim posebno

Route::get('players/{id}', 'PlayersController@show'); //kad se klikne na svakog igraca da se prikazu njegovi podaci, koristi se metoda show() iz PlayersController.php

Route::get('/register', 'RegisterController@create'); //ruta za kreiranje korisnika
Route::post('/register', 'RegisterController@store'); //ruta za cuvanje korisnika, kad se user registruje korisnik se cuva u bazi podataka

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login'); //login metoda iz LoginController.php, ne mozemo staviti samo praznu rutu, a metoda login ce nas redirektovati na stranicu svih timova kad se ulogujemo

Route::get('/logout', 'LoginController@logout');
