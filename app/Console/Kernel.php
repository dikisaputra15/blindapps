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
        \App\Console\Commands\Explosive::class,
        \App\Console\Commands\Actor::class,
        \App\Console\Commands\Subactortype::class,
        \App\Console\Commands\Target::class,
        \App\Console\Commands\Targettype::class,
        \App\Console\Commands\Tanggal::class,
        \App\Console\Commands\Violence::class,
        \App\Console\Commands\Articlelink::class,
        \App\Console\Commands\Business::class,
        \App\Console\Commands\Communnity::class,
        \App\Console\Commands\Goverment::class,
        \App\Console\Commands\Military::class,
        \App\Console\Commands\Police::class,
        \App\Console\Commands\Separatist::class,
        \App\Console\Commands\Terorist::class,
        \App\Console\Commands\Vested::class,
        \App\Console\Commands\Time::class,
        \App\Console\Commands\Timeend::class,
        \App\Console\Commands\Numberprotest::class,
        \App\Console\Commands\Issue::class,
        \App\Console\Commands\Tanggalstart::class,
        \App\Console\Commands\Stance::class,
        \App\Console\Commands\Actoractivist::class,
        \App\Console\Commands\Actorage::class,
        \App\Console\Commands\Actorcentralgov::class,
        \App\Console\Commands\Actorforeign::class,
        \App\Console\Commands\Actorgender::class,
        \App\Console\Commands\Actorintel::class,
        \App\Console\Commands\Actorlocalgov::class,
        \App\Console\Commands\Actorreggov::class,
        \App\Console\Commands\Firearmtype::class,
        \App\Console\Commands\Groupnumber::class,
        \App\Console\Commands\Grouporgan::class,
        \App\Console\Commands\Promotor::class,
        \App\Console\Commands\Targetactivist::class,
        \App\Console\Commands\Targetage::class,
        \App\Console\Commands\Targetbusiness::class,
        \App\Console\Commands\Targetcentralgov::class,
        \App\Console\Commands\Targetcommunity::class,
        \App\Console\Commands\Targetforeigngov::class,
        \App\Console\Commands\Targetgender::class,
        \App\Console\Commands\Targetgov::class,
        \App\Console\Commands\Targetintel::class,
        \App\Console\Commands\Targetlocalgov::class,
        \App\Console\Commands\Targetmil::class,
        \App\Console\Commands\Targetpolice::class,
        \App\Console\Commands\Targetreggov::class,
        \App\Console\Commands\Targetseparatist::class,
        \App\Console\Commands\Targetterorist::class,
        \App\Console\Commands\Targettypefacility::class,
        \App\Console\Commands\Actorrole::class,
        \App\Console\Commands\Targetrole::class,
        \App\Console\Commands\Sponsor::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('task:runcategory')->everyTenMinutes();;

        $schedule->command('task:runincident')->everyFifteenMinutes();

        $schedule->command('task:runsubincident')->everyFifteenMinutes();

        $schedule->command('task:runsocialconflict')->everyFifteenMinutes();

        $schedule->command('task:runweapon')->everyFifteenMinutes();

        $schedule->command('task:runactor')->everyFifteenMinutes();

        $schedule->command('task:runtarget')->everyFifteenMinutes();

        $schedule->command('task:runtargettype')->everyFifteenMinutes();

        $schedule->command('task:runtanggal')->everyFifteenMinutes();

        $schedule->command('task:runsubactortype')->everyFifteenMinutes();

        $schedule->command('task:runexplosive')->everyFifteenMinutes();

        $schedule->command('task:runviolence')->everyFifteenMinutes();

        $schedule->command('task:runarticlelink')->everyFifteenMinutes();

        $schedule->command('task:runbusiness')->everyFifteenMinutes();

        $schedule->command('task:runcommunity')->everyFifteenMinutes();

        $schedule->command('task:rungoverment')->everyFifteenMinutes();

        $schedule->command('task:runmilitary')->everyFifteenMinutes();

        $schedule->command('task:runpolice')->everyFifteenMinutes();

        $schedule->command('task:runseparatist')->everyFifteenMinutes();

        $schedule->command('task:runterorist')->everyFifteenMinutes();

        $schedule->command('task:runvested')->everyFifteenMinutes();

        $schedule->command('task:runtime')->everyFifteenMinutes();

        $schedule->command('task:runtimeend')->everyFifteenMinutes();

        $schedule->command('task:runnumberprotest')->everyFifteenMinutes();

        $schedule->command('task:runissue')->everyFifteenMinutes();

        $schedule->command('task:runtanggalstart')->everyFifteenMinutes();

        $schedule->command('task:runstance')->everyFifteenMinutes();

        $schedule->command('task:runactoractivist')->everyFifteenMinutes();
        $schedule->command('task:runactorage')->everyFifteenMinutes();
        $schedule->command('task:runactorcentralgov')->everyFifteenMinutes();
        $schedule->command('task:runactorforeign')->everyFifteenMinutes();
        $schedule->command('task:runactorgender')->everyFifteenMinutes();
        $schedule->command('task:runactorintel')->everyFifteenMinutes();
        $schedule->command('task:runactorlocalgov')->everyFifteenMinutes();
        $schedule->command('task:runactorreggov')->everyFifteenMinutes();
        $schedule->command('task:runfirearmtype')->everyFifteenMinutes();
        $schedule->command('task:rungroupnumber')->everyFifteenMinutes();
        $schedule->command('task:rungrouporgan')->everyFifteenMinutes();
        $schedule->command('task:runpromotor')->everyFifteenMinutes();
        $schedule->command('task:runtargetactivist')->everyFifteenMinutes();
        $schedule->command('task:runtargetage')->everyFifteenMinutes();
        $schedule->command('task:runtargetbusiness')->everyFifteenMinutes();
        $schedule->command('task:runtargetcentralgov')->everyFifteenMinutes();
        $schedule->command('task:runtargetcommunity')->everyFifteenMinutes();
        $schedule->command('task:runtargetforeigngov')->everyFifteenMinutes();
        $schedule->command('task:runtargetgender')->everyFifteenMinutes();
        $schedule->command('task:runtargetgov')->everyFifteenMinutes();
        $schedule->command('task:runtargetintel')->everyFifteenMinutes();
        $schedule->command('task:runtargetlocalgov')->everyFifteenMinutes();
        $schedule->command('task:runtargetmil')->everyFifteenMinutes();
        $schedule->command('task:runtargetpolice')->everyFifteenMinutes();
        $schedule->command('task:runtargetreggov')->everyFifteenMinutes();
        $schedule->command('task:runtargetseparatist')->everyFifteenMinutes();
        $schedule->command('task:runtargetterorist')->everyFifteenMinutes();
        $schedule->command('task:runtargettypefacility')->everyFifteenMinutes();
        $schedule->command('task:runactorrole')->everyFifteenMinutes();
        $schedule->command('task:runtargetrole')->everyFifteenMinutes();
        $schedule->command('task:runsponsor')->everyFifteenMinutes();
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
