<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Services\Validation;
use DB;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Validator::resolver(function($translator, $data, $rules, $messages)
		{
		    return new Validation($translator, $data, $rules, $messages);
		});
		DB::listen(function ($query) {
            echo $query->sql."<br>";
            var_dump($query->bindings);echo "<br>";
            echo $query->time;echo "<br>";
        });
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
