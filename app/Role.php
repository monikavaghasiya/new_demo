<?php

namespace App;
use App\Person;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function persons(){
		return $this->belongsToMany('App\Person');
	}
}
