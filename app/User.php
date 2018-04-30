<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeReview($query,$id){
        return $query->join('user_reviews','user_reviews.user_id' ,'=' ,'users.id')
                     ->join('movies','user_reviews.movie_id','=','movies.id')
                     ->where('users.id','=', $id)
                     ->select('movies.name','user_reviews.review');
    }
    public function isSuperAdmin(){
        return $this->role==='admin';
    }
}
