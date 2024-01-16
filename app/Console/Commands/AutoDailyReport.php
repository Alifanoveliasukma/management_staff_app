<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\ReportDaily;
use App\Models\User;

class AutoDailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-daily-report';

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

        $users = User::where('role', 'staf')->get();


        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new ReportDaily($user));
            }
        }

        return 0;

    }
}
