<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlyerRequest;
use App\Flyer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use App\Photo;
use Intervention\Image\Facades\Image;

class flyersController extends Controller
{
    public function index(){
		return view('flyers.index');
	}

	public function craeteFlyer(){

		return view('flyers.creat')->with('error',NULL);
	}


	public function store(FlyerRequest $request) {

		Flyer::create(Input::all());

		session()->flash('flash_message','data inserted successfully');
		return redirect()->back();
	}


	public function show($postalCode,$street){

		Flyer::locatedAt($postalCode,$street)->get();
		//dd(Flyer::locatedAt($postalCode,$street));
		$photo = Photo::all();


		return view('flyers.fileUpload')->with('zip',$postalCode)->with('street',$street)->with('photo',$photo);



	}



	public function addPhoto($zip,$street,\Illuminate\Http\Request $request){

		$this->validate($request,[
			'file' => 'required|mimes:jpeg,jpg,png'
		]);


//dd(Flyer::locatedAt($zip,$street));
		$flyer = Flyer::locatedAt($zip,$street);

		$file=$request->file('file');
		$name = str_random(6).'_'.$file->getClientOriginalName();
		$file->move('uploads/',$name);
		$path='uploads/'.$name;
		$th='uploads/th'.$name;
		Image::make($path)->fit('200')->save($th);
		//$flyer = Flyer::find($id);

		$flyer->photos()->create(['photo'=>$name]);
		return "done";


		/*$photo = new Photo();
		$flyer->addPhoto($photo);
		dd(Photo::fromForm($request->file('file')));
		return "done";*/
		//$flyer->addPhoto();
		//$flyer->photos()->create(['photo' => 'uploads/'.$filename]);

		//return $path;/*



		/*$th='uploads/'.'th'.$filename;
		$c=Card::locatedAtById($card)->first();
		$c->cardimages()->create(['image' => $filename ]);
		Image::make($path)->fit(200)->save($th);*/
		//return $path;
	}

	public function displayPhoto(){
		return view('photo.gallaryview');
	}
}
