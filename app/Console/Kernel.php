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
        //
        //Commands\getWeather::class,
        //Commands\getWeather1::class
        Commands\getWeatherData::class,
        Commands\redisWeather::class
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

         //$schedule->command('getWeather')->everyTenMinutes()->withoutOverlapping();
         //$schedule->command('getWeather1')->everyMinute()->withoutOverlapping();
         $schedule->command('getWeatherData')->everyMinute()->withoutOverlapping();
         $schedule->command('redisWeather')->everyTenMinutes()->withoutOverlapping();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
