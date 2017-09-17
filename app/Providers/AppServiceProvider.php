<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            echo $query->sql;echo "<br>";
            echo $query->bindings;echo "<br>";
            echo $query->time;echo "<br>";

            // Log::info($query->sql);
            // Log::info($query->bindings);
            // Log::info($query->time);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../Http/helpers.php';
    }
}
