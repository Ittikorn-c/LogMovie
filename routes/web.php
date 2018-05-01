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

//Route::get('/mod',"ModController@index");
//Route::get('/movies/create','MoviesController@create');
//Route::post('/movies/store','MoviesController@store');

// Basic Auth
Auth::routes();

// OAuth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/profile', function () {
    return redirect()->route('profile.show', Auth::id());
})->middleware('auth');


Route::get('/profile/{id}', 'ProfileController@show')->middleware('auth')->name('profile.show');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', 'ProfileController')->except(['index', 'show']);
    Route::get('/account/{id}/edit', 'ProfileController@editAccount')->name('account.edit');
    Route::post('/updateAvatar', 'ProfileController@updateAvatar')->name('updateAvatar');
});

Route::get('/movielist', function () {
   return view('profile.list', ['user' => Auth::user()]);
})->name('movielist');

