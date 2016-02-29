<?php

namespace App\Http\Controllers;
use App\Card;
use App\Comment;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class cardsController extends Controller
{


	public function index()
	{
		$card = new Card();

		$result = $card->all(array('id','title'));


		return view('cards.index')->with('a',$result);
	}



	public function show(Card $id)
	{

		//$id->comments;// using it you will get all comments of that card

		//$card = Card::with('Comment')->find($id)->toArray();//dd($card);
		return view('cards.show')->with('a',$id);
	}




	public function addComment($id)
	{
		$obj               = new Comment();

		$obj->comment_data = Input::get('comment_data');
		$obj->card_id      = $id;

		if (($obj->save()) == true) {
			return back();
		}

	}


	public  function editComment(Comment $id)
	{
		//dd($id);
		return view('cards.edit')->with('commentData',$id);
	}

	public function updateComment(Comment $id)
	{
		//dd(Input::get('comment_data'));
		$data = array('comment_data' => Input::get('comment_data'));
		$id->update($data);
		return back();
	}

}
