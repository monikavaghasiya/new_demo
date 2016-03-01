<?php

namespace App;
use App\Role;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';
    public function roles(){
		return $this->belongsToMany('App\Role');
	}
}
