<?php

namespace App\Http\Controllers;

use App\UserReview;
use Illuminate\Http\Request;

class UserReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            if(\Auth::user()->role != "user"){
                return redirect()->back();
            }

        $validatedData = $request->validate([
            'movie_id' => 'required',
            'rate' => 'required',
            'header' => 'required',
            'review' => 'required'
        ]);

        $user = $request->user()->id;
        $movie_id = $request->input('movie_id');
        $review = UserReview::where('user_id', '=', $user)->where('movie_id', '=', $movie_id)->count();
        if($review == 0){
            try {
                $userreview = new UserReview;
                $userreview->user_id = $request->user()->id;
                $userreview->movie_id = $request->input('movie_id');
                $userreview->rate = $request->input('rate');
                $userreview->header = $request->input('header');
                $userreview->review = $request->input('review');
                $userreview->save();
                return  redirect()->back();
            } catch(\Illuminate\Database\QueryException $errors) {
                return  redirect()->back();
            }
        }
        else{
            return  redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function show(UserReview $userReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function edit(UserReview $userReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserReview $userReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserReview $userReview)
    {
        //
    }
}
