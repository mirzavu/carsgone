<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


	Route::get('/', [
		'uses' => 'HomeController@index', 
		'as' => 'home'
	]);

	Route::get('/searchterm/{term}', 'HomeController@searchTerm');
	Route::get('/auto-loans/{slug}', 'ContentController@viewPage');

	Route::get('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');
	Route::post('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['namespace' => 'Admin','middleware' => 'admin', 'prefix' => config('backpack.base.route_prefix')], function () {
	CRUD::resource('make', 'MakeCrudController');
	CRUD::resource('model', 'VehicleModelCrudController');
	CRUD::resource('dealer', 'DealerCrudController');
	CRUD::resource('content', 'ContentPageCrudController');
	});
