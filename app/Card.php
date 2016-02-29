<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	public function comments(){

		return $this->hasMany('App\Comment','card_id');
	}
}
