<?php

namespace Vanguard\Console;

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
        \Vanguard\Console\Commands\Inspire::class,
        \Vanguard\Console\Commands\Notifications::class,
        \Vanguard\Console\Commands\NotificationsEmails::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->command('notification:sms')
                 ->dailyAt('06:00');
                 //->everyMinute();

        $schedule->command('reminder:email')
                 ->dailyAt('06:00');
                 //->everyMinute();

    }
}
