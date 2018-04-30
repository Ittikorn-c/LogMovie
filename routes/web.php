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
Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/{user}', 'UsersController@show')->where('user', '[0-9]+');

Route::get('/admin/users/{user}/review', 'UsersController@review')->where('user','[0-9]+');
Route::get('/admin/users/create', 'UsersController@create');
Route::post('/admin/users', 'UsersController@store');
Route::get('/admin/users/{user}/edit', 'UsersController@edit')->where('user','[0-9]+');
Route::put('/admin/users/{user}', 'UsersController@update')->where('user','[0-9]+');

Route::delete('/admin/users/{user}', 'UsersController@destroy');

Route::get('/admin/movies', 'MoviesController@adminindex');

Route::get('/admin/news', 'NewsController@adminindex');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
