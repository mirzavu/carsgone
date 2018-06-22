<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Boost::class,
        Commands\Strathcom::class,
        Commands\Carpages::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $log_boost = storage_path()."/logs/feeds/boost/".date("Y-m-d")."log";
        $schedule->command('feed:boost')->cron('10 4 * * 1,5')->sendOutputTo($log_boost);

    }
}
