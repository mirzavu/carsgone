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
        Commands\FeedExport::class,
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

        $log_cdemo = storage_path()."/logs/feeds/cdemo/".date("Y-m-d")."log";
        $schedule->command('feed:cdemo')->cron('10 4 * * 2,6')->sendOutputTo($log_cdemo);

        $log_strathcom = storage_path()."/logs/feeds/strathcom/".date("Y-m-d")."log";
        $schedule->command('feed:strathcom')->cron('10 4 * * 0,4')->sendOutputTo($log_strathcom);
    }
}
