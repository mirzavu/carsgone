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
        Commands\Inspire::class,
        Commands\Boost::class,
        Commands\Cdemo::class,
        Commands\Strathcom::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $filePath = "storage/logs/feeds/boost/".date("Y-m-d")."log";
        $schedule->command('feed:boost')->dailyAt('13:00')->sendOutputTo($filePath);

        $filePath = "storage/logs/feeds/cdemo/".date("Y-m-d")."log";
        $schedule->command('feed:cdemo')->dailyAt('14:00')->sendOutputTo($filePath);
    }
}
