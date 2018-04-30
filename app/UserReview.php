<?php

namespace App;

use App\LikeReview;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    public function movie() {
        return $this->belongsTo('App\Movie', 'movie_id');
    }

    public function likes() {
        return $this->hasMany('App\LikeReview', 'review_id');
    }

    public function countLike(){
        return LikeReview::where('review_id', '=', $this->id)->get()->count();
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
