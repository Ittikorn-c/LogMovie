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
Route::get('/timelines/{user}', 'TimeLinesController@show')->where('user', '[0-9]+');
Route::get('/mod',"ModController@index");
Route::get('/movies/create','MoviesController@create');
Route::post('/movies/store','MoviesController@store');
Route::get('/movies/{movie}/edit', 'MoviesController@edit')->where('movie', '[0-9]+');
Route::put('/movies/{movie}', 'MoviesController@update')->where('movie', '[0-9]+');
Route::get('/movies/{movie}', 'MoviesController@show')->where('movie', '[0-9]+');

Route::get('/news','NewsController@index');
Route::get('/news/create','NewsController@create');
Route::post('/news/store','NewsController@store');
Route::get('/news/{news}/edit', 'NewsController@edit')->where('news', '[0-9]+');
Route::put('/news/{news}', 'NewsController@update')->where('news', '[0-9]+');
Route::get('/news/{news}', 'NewsController@show')->where('news', '[0-9]+');

Route::get('{folder}/{filename}', function ($folder, $filename)
{
    $path = storage_path('app/public/'.$folder.'/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

// Basic Auth
Auth::routes();

// OAuth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


// Other routes
Route::get('/home', 'HomeController@index')->name('home');
