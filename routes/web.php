<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home'); 
});

Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('signup', 'App\Http\Controllers\LoginController@signup_form');
Route::post('signup', 'App\Http\Controllers\LoginController@do_signup');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');
Route::post('modifica-profilo','App\Http\Controllers\LoginController@modifica');

Route::get('home', 'App\Http\Controllers\ViewController@home');
Route::get('preferiti', 'App\Http\Controllers\ViewController@preferiti');
Route::get('profile', 'App\Http\Controllers\ViewController@profile');
Route::get('ricerca', 'App\Http\Controllers\ViewController@ricerca');
Route::get('intro', 'App\Http\Controllers\ViewController@intro');

Route::get('preferiti/movies', 'App\Http\Controllers\ListController@get_movies');
Route::get('preferiti/series', 'App\Http\Controllers\ListController@get_series');
Route::post('preferiti/remove_film', 'App\Http\Controllers\ListController@remove_film');
Route::get('preferiti/remove_series/{id}', 'App\Http\Controllers\ListController@remove_serie');
Route::post('save/film', 'App\Http\Controllers\ListController@save_film');
Route::post('save/series', 'App\Http\Controllers\ListController@save_series');

Route::get('preferiti/search/{id}', 'App\Http\Controllers\SearchController@searchInfo');
Route::get('ricerca/titolo/{query}', 'App\Http\Controllers\SearchController@search');
Route::get('ricerca/info/{id}', 'App\Http\Controllers\SearchController@searchInfo');
Route::get('ricerca/trailer/{q}', 'App\Http\Controllers\SearchController@searchTrailer');
Route::get('intro/searchFilms', 'App\Http\Controllers\SearchController@searchFilms');
Route::get('intro/searchSeries', 'App\Http\Controllers\SearchController@searchSeries');