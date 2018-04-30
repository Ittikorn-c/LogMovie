<?php

namespace App\Http\Controllers;

use App\LikeReview;
use Illuminate\Http\Request;

class LikeReviewsController extends Controller
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
        $countlike = LikeReview::where('user_id', '=', '1')->where('review_id', '=', $request->input('review_id'))->count();
        if($countlike == 0){
            try {
                
                $likereview = new LikeReview;
                $likereview->user_id = 1;
                $likereview->review_id = $request->input('review_id');
                $likereview->save();
                return  redirect()->back();
            }catch(\Illuminate\Database\QueryException $errors) {
                return "error";
            }
        }
        else{
            return "OK LIKE";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LikeReview  $likeReview
     * @return \Illuminate\Http\Response
     */
    public function show(LikeReview $likeReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LikeReview  $likeReview
     * @return \Illuminate\Http\Response
     */
    public function edit(LikeReview $likeReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LikeReview  $likeReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LikeReview $likeReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LikeReview  $likeReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(LikeReview $likeReview)
    {
        //
    }
}
