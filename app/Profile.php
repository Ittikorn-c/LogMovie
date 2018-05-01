<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'gender', 'birthday', 'location', 'available_at', 'about_me', 'avatar'
    ];

    protected $dates = ['birthday'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getFormattedDay()
    {
        return $this->birthday->format('jS F Y');
    }
}
