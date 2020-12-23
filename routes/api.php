<?php

use Illuminate\Http\Request;

Route::post('/login','Api\AuthController@login');
Route::post('/register','Api\AuthController@register');
Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/info','Api\AuthController@info');
	Route::post('/update-info','Api\AuthController@updateInfo');
	Route::post('/update-password','Api\AuthController@updatePassword');
	Route::post('/isAuth','Api\AuthController@isAuth');
	Route::get('/users','Api\AuthController@users');
	Route::get('/cages','Api\CageController@index');
	Route::post('/cages/store','Api\CageController@store');
	Route::post('/cages/update/info','Api\CageController@updateInfo');
	Route::post('/cages/update/current','Api\CageController@updateCurrent');
	Route::delete('/cages/delete/{id}','Api\CageController@destroy');

	//================ Category ================//
	Route::get('/get-category','Api\CageController@getCategory');
	//================ Category ================//

	//================ Gejala ================//
	Route::get('/get-gejala','Api\GejalaController@index');
	Route::post('/set-gejala','Api\GejalaController@input');
	Route::get('/selesai-gejala','Api\GejalaController@selesai');
	Route::post('/update-gejala','Api\GejalaController@updateGejala');
	//================ Gejala ================//

	//================ Penyakit ================//
	Route::post('/set-penyakit','Api\GejalaController@store');
	Route::post('/update-penyakit','Api\GejalaController@update');
	Route::get('/get-penyakit','Api\GejalaController@indexPenyakit');
	//================ Penyakit ================//

	//================ Artikel ================//
	Route::get('/get-artikel','Api\ArtikelController@index');
	Route::post('/set-artikel','Api\ArtikelController@store');
	Route::post('/edit-artikel','Api\ArtikelController@update');
	Route::post('/delete-artikel','Api\ArtikelController@destroy');
	//================ Artikel ================//

});
