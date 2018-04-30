<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	
  public function imgs(){
    return $this->hasMany('App\ImagesNews', 'news_id');
  }

}
