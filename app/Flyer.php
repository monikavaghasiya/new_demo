<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Flyer extends Model
{
	protected $fillable = [
		'street', 'city', 'postalCode', 'country','state','homeDescription','price'
	];

    public  function  photos(){
		return $this->hasMany('App\Photo');
	}

	public function scopeLocatedAt($query,$postalCode,$street){

		$street = str_replace('-',' ',$street);

		return $query->where(compact('postalCode','street'))->first() ;
	}

	public function addPhoto(Photo $photo){
		return $this->photos()->save($photo);
	}
}
