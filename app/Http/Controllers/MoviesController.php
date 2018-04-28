<?php

namespace App\Http\Controllers;

use App\Movie;
use App\ImageMovie;
use App\Genre;
use App\UserReview;
use App\LikeReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $movie = Movie::all();
        
        return view('movies.index', ["movie" => $movie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
      $genres = [
          'Action' => 'Action',
          'Adventure' => 'Adventure',
          'Sci-Fi' => 'Sci-Fi'
      ];
        return view('movies.create', ["genres"=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
          'name' => 'required',
          'images' => 'required',
          'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'vdo' => 'required',
          'storyline' => 'required',
          'budget' => 'required|min:0',
          'opening' => 'required',
          'gross' => 'required',
          'cumulative' => 'required',
          'runtime' => 'required|min:0',
          'color' => 'required',
          'aspect_ratio' => 'required',
          'genres' => 'required',
        ]);
        $movie = new Movie;
        $genres = new Genre;
        $movie->name = $request->input('name');
        $movie->vdo = $request->input('vdo');
        $movie->storyline = $request->input('storyline');
        $movie->budget = $request->input('budget');
        $movie->opening = $request->input('opening');
        $movie->gross = $request->input('gross');
        $movie->cumulative = $request->input('cumulative');
        $movie->runtime = $request->input('runtime');
        $movie->color = true;
        $movie->aspect_ratio = $request->input('aspect_ratio');
        if($cover=$request->file('cover_image')){
            $cover_ext = $cover->getClientOriginalExtension();
            $cover_name="cover".time().'.'.$cover_ext;
            $cover_upload = $cover->storeAs(
              '/public/cover_images_movies', $cover_name);
            if ($cover_upload) {
              $movie->cover_image = '/public/cover_images_movies' . '/' . $cover_name;
            }
        }
        $movie->save();
        if($files=$request->file('images')){
          $n = 1;
          foreach($files as $file){
            $ext = $file->getClientOriginalExtension();
            $name=time().$n.'.'.$ext;
            $upload = $file->storeAs(
              '/public/images_movies', $name);
              $n++;
              $image = new ImageMovie;
              $image->movie_id = $movie->id;
              $image->image = '/public/images_movies' . '/' . $name;
              $image->save();
            }
          }
          $genres->movie_id = $movie->id;
          $genres->genres = $request->input('genres');
          $genres->save();
          if($upload && $cover_upload){
            return redirect()
            ->back()
            ->with(['status' => 'success', 'message' => 'Image uploaded successfully!']);
          }
          else {
            return redirect()->withInput();
          }
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {   
        $max = UserReview::max('rate');
        $review = UserReview::where('rate', '=', $max)->get()[0];
        $like = LikeReview::where('movie_id', '=', $movie->id)->count();
        return view('movies.show', ["movie"=>$movie, "review"=>$review, "like"=>$like]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
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

    public function pic($path){
        $url = Storage::url($path);
        return $url;
    }
}
