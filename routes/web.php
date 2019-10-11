<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'groupRoute'], function(){
	Route::get('long/{name}', [ 'as' => 'myname', function($name) {
	return "<h1>long hay hoc name: $name</h1>";
	}])->where(['name' => '[a-z]+']);

	Route::get('route', ['as' => 'name', function(){
		echo "string";
	}]);
	Route::get('callname', function(){
		return redirect()->route('name');
	});

	Route::get('test/{ten}/{tuoi}', function($ten, $tuoi){
		return "$ten,$tuoi";
	})->where(['ten' => '[a-z]+', 'tuoi' => '[0-9]{10}']);

	Route::get('call_home', function(){
		$ai = 'anh long chu ai';
		$count = strlen($ai);
		return view('trangchu', compact('ai', 'count'));
	});

	Route::get('testcontroll', 'test_Controller@action1');

	Route::get('view', function(){
		return view('layout.home');
	});
	
});

View::share('title', 'web laravel');


