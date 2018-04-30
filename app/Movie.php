<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function reviews() {
        return $this->hasMany('App\UserReview', 'movie_id');
    }

    
}
