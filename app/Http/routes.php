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
	Route::get('/fb', 'HomeController@fb');
	Route::get('/searchterm/{term}', 'HomeController@searchTerm');  //from homepage
	Route::get('/getModels/{term}', 'HomeController@getModels');
	Route::get('/autoloans', 'PageController@autoloan');
	Route::get('/autoloans/{slug}', 'PageController@viewLoanPage');

	Route::get('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');
	Route::get('/search', 'SearchController@searchHandler');
	Route::get('/setSessionKeyValue/{key}/{value}', 'SearchController@setSessionKeyValue');
	Route::get('/removeFilter/{params}', 'SearchController@removeFilter')->where('params', '.*');
	Route::get('/vehicle/{slug}', 'VehicleController@showVehicle')->where('slug', '.*');

	Route::get('/post', 'PostController@post_ad');
	Route::post('/save-image', 'PostController@save_image');
	Route::post('/remove-image', 'PostController@remove_image');
	Route::post('/rotate-image', 'PostController@rotate_image');

//Authentication
	Route::post('/signup', 'UserController@postSignUp');
	Route::post('/login', 'UserController@postSignIn');
	Route::get('/logout', 'UserController@logout');

//Dealers
	Route::get('/auto-dealers/info', 'DealerController@info');
	Route::get('/auto-dealers', 'DealerController@listing');
	Route::get('/auto-dealers/{params}', 'DealerController@listing')->where('params', '.*');
	Route::get('/dealer/{slug}', 'DealerController@showDealer')->where('slug', '.*');

//Footer links
	Route::get('/help', 'PageController@help');
	Route::get('/privacy', 'PageController@privacy');
	Route::get('/contact', 'PageController@contact');

//Route::auth();

	Route::group(['namespace' => 'Admin','middleware' => 'admin', 'prefix' => config('backpack.base.route_prefix')], function ()
	{
		CRUD::resource('make', 'MakeCrudController');
		CRUD::resource('model', 'VehicleModelCrudController');
		CRUD::resource('dealer', 'DealerCrudController');
		CRUD::resource('content', 'ContentPageCrudController');
	});
