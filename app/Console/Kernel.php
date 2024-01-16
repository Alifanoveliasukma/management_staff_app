<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:auto-daily-report')->everyMinute(); //buat demo aja setiap menit
        // $schedule->command('app:auto-daily-report')->daily();
        // $schedule->command('app:auto-daily-report')->dailyAt('03:30'); // Eksekusi setiap hari pukul 03:30

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
