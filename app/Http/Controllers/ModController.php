<?php

namespace App\Http\Controllers;

use App\Movie;
use App\News;
use Illuminate\Http\Request;

class ModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::all();
      $news = News::all();
      return view("mod.index", ["movies" => $movies, "news" => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
