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
      $color = [
        'color' => true,
        'black-white' => false,
      ];
        return view('movies.create', ["genres"=>$genres, "color"=>$color]);
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
        $movie->name = $request->input('name');
        $movie->vdo = $request->input('vdo');
        $movie->storyline = $request->input('storyline');
        $movie->budget = $request->input('budget');
        $movie->opening = $request->input('opening');
        $movie->gross = $request->input('gross');
        $movie->cumulative = $request->input('cumulative');
        $movie->runtime = $request->input('runtime');
        $movie->color = $request->input('color');
        $movie->aspect_ratio = $request->input('aspect_ratio');
        if($cover=$request->file('cover_image')){
            $cover_ext = $cover->getClientOriginalExtension();
            $cover_name="cover".time().'.'.$cover_ext;
            $cover_upload = $cover->storeAs(
              'public/cover_images_movies', $cover_name);
            if ($cover_upload) {
              $movie->cover_image = 'cover_images_movies' . '/' . $cover_name;
            }
        }
        $movie->save();
        if($files=$request->file('images')){
          $n = 1;
          foreach($files as $file){
            $ext = $file->getClientOriginalExtension();
            $name=time().$n.'.'.$ext;
            $upload = $file->storeAs(
              'public/images_movies', $name);
              $n++;
              $image = new ImageMovie;
              $image->movie_id = $movie->id;
              $image->image = 'images_movies' . '/' . $name;
              $image->save();
            }
          }
          if ($genres=$request->input("genres")) {
            foreach ($genres as $gen) {
              $genres = new Genre;
              $genres->movie_id = $movie->id;
              $genres->genres = $gen;
              $genres->save();
            }
          }
          if($upload && $cover_upload){
            return redirect("/movies/".$movie->id);
            // return redirect()
            // ->back()
            // ->with(['status' => 'success', 'message' => 'Image uploaded successfully!']);
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
        $rateavr = 0;
        $n = 0;
        $rates = UserReview::where('movie_id', '=',  $movie->id)->get();
        if($rates->count() != 0){
            foreach ($rates as $rate){
                $rateavr += $rate->rate;
                $n += 1;
            }
            $rate = $rateavr/$n;
        }
        else{
            $rate = 'None';
        }
        
        $pics = ImageMovie::where('movie_id', '=', $movie->id)->get();
        $max = UserReview::where('movie_id', '=', $movie->id)->max('rate');
        $reviews = UserReview::where('movie_id', '=', $movie->id)->where('rate', '=', $max)->get();

        $count = count($reviews);
        if($count > 0){
            $review = $reviews[0];
            $like = LikeReview::where('review_id', '=', $review->id)->count();
            return view('movies.show', ["movie"=>$movie, "review"=>$review, "like"=>$like, "pics"=>$pics, "rate"=>$rate]);
        }
        else{
            $review = 0;
            return view('movies.show', ["movie"=>$movie, "review"=>$review, "pics"=>$pics, "rate"=>$rate]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
      $genres = [
          'Action' => 'Action',
          'Adventure' => 'Adventure',
          'Sci-Fi' => 'Sci-Fi'
      ];
      $color = [
        'color' => true,
        'black-white' => false
      ];
        return view('movies.edit', ["movie"=>$movie,"genres"=>$genres, "color"=>$color]);
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
      ],[]);

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
            'public/cover_images_movies', $cover_name);
          if ($cover_upload) {
            $movie->cover_image = 'cover_images_movies' . '/' . $cover_name;
          }
      }
      $movie->save();
      if($files=$request->file('images')){
        $n = 1;
        foreach($files as $file){
          $ext = $file->getClientOriginalExtension();
          $name=time().$n.'.'.$ext;
          $upload = $file->move(
            'public/images_movies', $name);
            $n++;
            $image = new ImageMovie;
            $image->movie_id = $movie->id;
            $image->image = 'images_movies' . '/' . $name;
            $image->save();
          }
        }
        if ($genres=$request->input("genres")) {
          foreach ($genres as $gen) {
            $genres = new Genre;
            $genres->movie_id = $movie->id;
            $genres->genres = $gen;
            $genres->save();
          }
        }
        if($upload && $cover_upload){
          return redirect("/movies/".$movie->id);
          // return redirect()
          // ->back()
          // ->with(['status' => 'success', 'message' => 'Image uploaded successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
      $movie->delete();
      return redirect('/movies');
    }

    public function pic($path){
        $url = Storage::url($path);
        return $url;
    }
}
