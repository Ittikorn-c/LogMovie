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

Route::resource('/movies', 'MoviesController');
Route::resource('/likereviews', 'LikeReviewsController');
Route::resource('/userreviews', 'UserReviewsController');
Route::get('/mod',"ModController@index");
Route::get('/movies/create','MoviesController@create');
Route::post('/movies/store','MoviesController@store');
