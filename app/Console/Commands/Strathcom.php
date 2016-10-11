<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Strathcom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:strathcom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute Strathcom feed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
