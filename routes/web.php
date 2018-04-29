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
    return view('welcome');
});
Route::get('/admin', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show')->where('user', '[0-9]+');
Route::get('/users/{user}/review', 'UsersController@review')->where('user','[0-9]+');
Route::get('/users/{user}/edit', 'UsersController@edit')->where('user','[0-9]+');

Route::get('/admin/movies', 'MoviesController@index');
Route::get('/admin/movies/{movie}', 'MoviesController@show');
Route::get('/admin/movies/{movie}/edit', 'MoviesController@edit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
