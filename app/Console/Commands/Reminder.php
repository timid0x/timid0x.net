<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\Reminders;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $users = User::all();


        foreach ($users as $user) {
            Mail::to($user)->send(new Reminders($user));
        }

	Log::channel('stack')->info('[' . Carbon::now() . '] RUN auto-reminder scheduler!');
	Log::channel('slack')->info('🦇 RUN auto-reminder scheduler');
        return 0;
    }
}
