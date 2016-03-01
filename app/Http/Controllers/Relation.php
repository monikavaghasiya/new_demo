<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Role;

class Relation extends Controller
{
    public function index()
	{
		$person = Role::with('persons')->where('id','=','1')->orWhere('id','=','2')->get();
		//->where('id','=','1')->orWhere('id','=','2')->get();
		dd($person);
	}
}
