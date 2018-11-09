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

//all teams
Route::get('/', 'TeamsController@index')->name('teams.index');

//team
Route::get('/teams/{id}', 'TeamsController@show')->name('teams.show'); //ruta koja nas vodi na svaki tim posebno

//players
Route::get('players/{id}', 'PlayersController@show'); //kad se klikne na svakog igraca da se prikazu njegovi podaci, koristi se metoda show() iz PlayersController.php

//registracija
Route::get('/register', 'RegisterController@create'); //ruta za kreiranje korisnika
Route::post('/register', 'RegisterController@store'); //ruta za cuvanje korisnika, kad se user registruje korisnik se cuva u bazi podataka


//verifikacija
Route::get('/verify/{verification_code}', 'RegisterController@verify');


//login
Route::get('/login', 'LoginController@index')->name('login'); //middleware(auth)-gost stranice moze da vidi samo login stranicu
Route::post('/login', 'LoginController@login')->middleware('verify.email'); //login metoda iz LoginController.php, ne mozemo staviti samo praznu rutu, a metoda login ce nas redirektovati na stranicu svih timova kad se ulogujemo


//komentari
Route::post('/teams/{team_id}/comments', 'CommentsController@store')->middleware('bad.words'); //ruta za komentare, kad se postavi komentar da se stavi u bazu podataka


//logout
Route::get('/logout', 'LoginController@logout');
