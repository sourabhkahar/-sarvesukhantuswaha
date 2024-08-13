<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schedule;

class SendContactEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return $this->call('queue:work', [
            // '--queue' => 'emails', // remove this if queue is default
            '--stop-when-empty' => null,
        ]);
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('emails:work')->everyMinute()->withoutOverlapping();
        // you can add ->withoutOverlapping(); if you think it won't finish in 1 minute
    }
}
