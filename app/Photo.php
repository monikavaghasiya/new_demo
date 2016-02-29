<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{
	protected $fillable = [
		'photo'	];

    public function flyer(){
		return $this->belongsTo('App\Flyer');
	}

	public  static function fromForm(UploadedFile $file){
		$photo = new static;
		$filename = str_random(6).'_'.$file->getClientOriginalName();
		$path='uploads/'.$filename;
		$file->move('uploads/'.$filename);
		return $path;
	}
}
