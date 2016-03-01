<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('cards','cardsController@index');
Route::get('cards/{id}','cardsController@show');
Route::post('cards/{id}','cardsController@addComment');
Route::get('cards/edit/{id}','cardsController@editComment');
Route::post('cards/edit/update/{id}','cardsController@updateComment');

Route::get('relation','Relation@index');

//Route::get('/','FlyersController@index');
//Flyers


Route::group(['middleware' => ['web']], function () {


    Route::post('flyers','FlyersController@store');
    Route::get('show/{postalCode}/{street}','FlyersController@show');
    //Route::get('fileUpload','FlyersController@file');
    Route::get('flyers','FlyersController@craeteFlyer');
    Route::post('show/{zip}/{street}','FlyersController@addPhoto');
    Route::get('photoGallary','FlyersController@displayPhoto');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
});
