<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMovie extends Model
{
    protected $fillable = [
        'movie_id', 'user_id', 'status'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
