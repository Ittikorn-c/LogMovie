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

    //
     public function genre(){
    	return $this->belongsTo('App\Genre','id');
    }

    public function scopeReview($query,$id){
    	return $query ->join('user_reviews.movie_id','=','movies.id')
    				  ->join('users','user_reviews','user_reviews.user_id' ,'=' ,'users.id')
                     ->where('movies.id','=', $id)
                     ->select('users.name','user_reviews.review');

    }

}
