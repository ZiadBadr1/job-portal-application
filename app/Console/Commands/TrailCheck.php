<?php

namespace App\Console\Commands;

use App\Mail\PurchaseMail;
use App\Mail\TrailEndNotification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TrailCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trial:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command check if the user trial expiry date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

            $users = User::where('user_trial','!=','Null')->get();
            $today = Carbon::today('Australia/Melbourne');
            foreach ($users as $user) {
                $trialEnd = Carbon::parse($user->user_trial);
                if($trialEnd->isSameDay($today))
                {
                    Mail::to($user->email)->send(new PurchaseMail('weekly','dasd'));

                    $this->info('Trial ended email sent to: ' . $user->email);
                }
            }
        } catch (\Exception $e) {

            $this->error($e->getMessage());
        }
    }
}
