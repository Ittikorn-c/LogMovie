<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	public function newsImage() {
		return $this->hasMany('App\ImagesNews', 'news_id');
	}
}
