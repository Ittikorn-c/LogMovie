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
    return view('movies.index');
});

Route::resource('/movie', 'MoviesController');

Route::get('/mod',"ModController@index");
Route::get('/movies/create','MoviesController@create');
Route::post('/movies/store','MoviesController@store');
Route::get('/movies/{movie}/edit', 'MoviesController@edit')->where('movie', '[0-9]+');
Route::put('/movies/{movie}', 'MoviesController@update')->where('movie', '[0-9]+');
Route::get('/movies/{movie}', 'MoviesController@show')->where('movie', '[0-9]+');

Route::get('/news/create','NewsController@create');
Route::post('/news/store','NewsController@store');
Route::get('/news/{news}/edit', 'NewsController@edit')->where('news', '[0-9]+');
Route::put('/news/{news}', 'NewsController@update')->where('news', '[0-9]+');
