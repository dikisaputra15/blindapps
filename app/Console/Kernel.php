<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\AutoStatistik::class,
        \App\Console\Commands\Incident::class,
        \App\Console\Commands\Subincident::class,
        \App\Console\Commands\Socialconflict::class,
        \App\Console\Commands\Weapon::class,
        \App\Console\Commands\Actor::class,
        \App\Console\Commands\Actortype::class,
        \App\Console\Commands\Target::class,
        \App\Console\Commands\Targettype::class,
        \App\Console\Commands\Tanggal::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('task:runcategory')->dailyAt('22:00');

        $schedule->command('task:runincident')->dailyAt('22:10');

        $schedule->command('task:runsubincident')->dailyAt('22:20');

        $schedule->command('task:runsocialconflict')->dailyAt('22:30');

        $schedule->command('task:runweapon')->dailyAt('22:40');

        $schedule->command('task:runactor')->dailyAt('22:50');

        $schedule->command('task:runactortype')->dailyAt('23:00');

        $schedule->command('task:runtarget')->dailyAt('23:10');

        $schedule->command('task:runtargettype')->dailyAt('23:20');

        $schedule->command('task:runtanggal')->dailyAt('23:30');

        $schedule->command('task:runsubactortype')->dailyAt('23:40');
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
