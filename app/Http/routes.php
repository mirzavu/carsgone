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
	Route::get('/searchterm', 'HomeController@searchTerm');  //from homepage
	Route::get('/getModels/{term}', 'HomeController@getModels');
	Route::get('/autoloans', 'PageController@autoloan');
	Route::get('/autoloans/{slug}', 'PageController@viewLoanPage');

	//Credit Application
	Route::get('/credit-application', 'CreditController@create');
	Route::post('/credit-application', 'CreditController@send');
	Route::post('/quick-finance', 'CreditController@quickfinance');

	//edit post
	Route::get('/vehicles/{id}/edit', 'PostController@editVehicle');
	Route::patch('/vehicles/{id}', 'PostController@updateVehicle');

	//Search
	Route::get('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');
	Route::get('/search', 'SearchController@searchHandler');
	Route::get('/setSessionKeyValue/{key}/{value}', 'SearchController@setSessionKeyValue');
	Route::get('/removeSessionAll', 'SearchController@removeSessionAll');
	
	Route::get('/removeFilter/{params}', 'SearchController@removeFilter')->where('params', '.*');

	Route::post('/save-vehicle', 'PostController@saveVehicle');
	Route::post('/unsave-vehicle', 'PostController@unsaveVehicle');

	//Brochure
	Route::get('/vehicle/{slug}', 'VehicleController@showVehicle')->where('slug', '.*');
	Route::get('/vehicle-related/{slug}', 'VehicleController@relatedVehicle')->where('slug', '.*');
	Route::post('/contact-dealer', 'VehicleController@contactDealer');
	Route::post('/finance', 'VehicleController@finance');


	//To delete
	Route::post('/make-offer', 'VehicleController@makeOffer');
	Route::post('/trade-vehicle', 'VehicleController@tradeVehicleForm');

	//Private Vehicles
	Route::get('/search/{params}', 'SearchController@searchHandler')->where('params', '.*');
	Route::get('/search', 'SearchController@searchHandler');

	//Post Vehicle
	Route::get('/promote-vehicle/{id}', 'PostController@payPaypal')->where('id', '[0-9]+');
	Route::get('/post', 'PostController@newPost');
	Route::get('/post/done', 'PostController@getDone');
	Route::post('/post/create', 'PostController@create');
	Route::post('/save-image', 'PostController@saveImage');
	Route::post('/remove-image', 'PostController@removeImage');
	Route::post('/rotate-image', 'PostController@rotateImage');
	Route::post('/remove-image-editpost', 'PostController@removeImageEditPost');
	Route::post('/save-image-editpost', 'PostController@saveImageEditPost');
	Route::post('/set-main-photo', 'PostController@setMainPhoto');


//Authentication
	Route::post('/signup', 'UserController@postSignUp');
	Route::post('/dealer-signup', 'UserController@postDealerSignUp');
	Route::post('/login', 'UserController@postSignIn');
	Route::post('/login-signup', 'UserController@postLoginSignup');
	Route::get('/logout', 'UserController@logout');
	Route::get('/loggedInUser', 'UserController@loggedInUser');
	Route::get('/signup/confirm/{token}', 'UserController@confirmEmail');

//Dashboard
	Route::get('/dashboard', 'UserController@dashboard')->middleware('auth');
	Route::post('/change-email', 'UserController@changeEmail');
	Route::post('/change-password', 'UserController@changePassword');
	Route::post('/change-postal', 'UserController@changePostalCode');
	Route::post('/send-reset-link', 'UserController@sendResetLink');
	Route::post('/reset-password', 'UserController@postResetPassword');
	Route::get('/reset-password/{token}', 'UserController@getResetPassword');
	Route::post('/activate-vehicle', 'UserController@activateVehicle');
	Route::post('/deactivate-vehicle', 'UserController@deactivateVehicle');
	Route::post('/delete-vehicle', 'UserController@deleteVehicle');

//Dealers
	Route::get('/auto-dealers/info', 'DealerController@info');
	Route::get('/auto-dealers', 'DealerController@listing');
	Route::get('/auto-dealers/{params}', 'DealerController@listing')->where('params', '.*');
	Route::get('/dealer/{slug}', 'DealerController@showDealer')->where('slug', '.*');

//Footer links
	Route::get('/help', 'PageController@help');
	Route::get('/privacy', 'PageController@privacy');
	Route::get('/contact', 'PageController@contact');
	Route::post('/contact', 'PageController@contactSend');

//Route::auth();

/****  ADMIN PANEL **********/
	Route::group(['namespace' => 'Admin','middleware' => 'admin', 'prefix' => config('backpack.base.route_prefix')], function ()
	{
		CRUD::resource('make', 'MakeCrudController');
		CRUD::resource('model', 'VehicleModelCrudController');
		CRUD::resource('dealer', 'UserCrudController');
		CRUD::resource('content', 'ContentPageCrudController');
	});

	Route::group(['namespace' =>'Admin', 'prefix' => config('backpack.base.route_prefix')], function () {
    	Route::get('dashboard', 'AdminController@dashboard');
    	Route::get('settings', 'AdminController@settings');
    	Route::patch('settings', 'AdminController@settingUpdate');
    	Route::auth();
	});	

/****  ADMIN PANEL END**********/

// Route::group(
//                 [
//                     'middleware' => 'web',
//                     'prefix'     => config('backpack.base.route_prefix'),
//                     'namespace'     => '..\..\..\Backpack\Base\Http\Controllers',
//                 ],
//                 function () {
//                     // setup the auth routes
//                     Route::auth();
//                     Route::get('logout', 'Auth\LoginController@logout');

//                     // setup the dashboard routes
//                     Route::get('dashboard', 'AdminController@dashboard');
//                     Route::get('/', 'AdminController@redirect');
//                 });