<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function reviews() {
        return $this->hasMany('App\UserReview', 'movie_id');
    }
    public function gen() {
        return $this->hasMany('App\Genre', 'movie_id');
    }

    public function im() {
        return $this->hasMany('App\ImageMovie', 'movie_id');
    }

}
