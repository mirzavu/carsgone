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
	Route::get('/credit-application', 'CreditController@create');

	//edit post
	Route::get('/vehicles/{id}/edit', 'PostController@editVehicle');
	Route::patch('/vehicles/{id}', 'PostController@updateVehicle');

	Route::get('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');
	Route::get('/search', 'SearchController@searchHandler');
	Route::get('/setSessionKeyValue/{key}/{value}', 'SearchController@setSessionKeyValue');
	Route::get('/removeFilter/{params}', 'SearchController@removeFilter')->where('params', '.*');
	Route::get('/vehicle/{slug}', 'VehicleController@showVehicle')->where('slug', '.*');

	Route::post('/save-vehicle', 'PostController@saveVehicle');
	Route::post('/unsave-vehicle', 'PostController@unsaveVehicle');


	//Private Vehicles
	Route::get('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');
	Route::get('/search', 'SearchController@searchHandler');

	Route::get('/post', 'PostController@newPost');
	Route::get('/post/done', 'PostController@getDone');
	Route::post('/post/create', 'PostController@create');
	Route::post('/save-image', 'PostController@saveImage');
	Route::post('/remove-image', 'PostController@removeImage');
	Route::post('/rotate-image', 'PostController@rotateImage');
	Route::post('/remove-image-editpost', 'PostController@removeImageEditPost');
	Route::post('/save-image-editpost', 'PostController@saveImageEditPost');

//Authentication
	Route::post('/signup', 'UserController@postSignUp');
	Route::post('/login', 'UserController@postSignIn');
	Route::get('/logout', 'UserController@logout');
	Route::get('/loggedInUser', 'UserController@loggedInUser');
	Route::get('/signup/confirm/{token}', 'UserController@confirmEmail');

//Dashboard
	Route::get('/dashboard', 'UserController@dashboard')->middleware('auth');
	Route::post('/change-email', 'UserController@changeEmail');
	Route::post('/change-password', 'UserController@changePassword');
	Route::post('/send-reset-link', 'UserController@sendResetLink');
	Route::post('/reset-password', 'UserController@postResetPassword');
	Route::get('/reset-password/{token}', 'UserController@getResetPassword');
	Route::post('/activate-vehicle', 'UserController@activateVehicle');
	Route::post('/deactivate-vehicle', 'UserController@deactivateVehicle');

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
