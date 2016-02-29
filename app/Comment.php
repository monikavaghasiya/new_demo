<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $table="comments";
	protected $primaryKey = 'comment_id';
	protected $fillable = [
		'comment_data', 'card_id',
	];
    public function Card(){

		return $this->belongsTo('App\Card');
	}
}
