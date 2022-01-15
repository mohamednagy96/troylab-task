<?php

namespace App\Console\Commands;

use App\Mail\ExpireEnrollmentEmailNotification;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ExpireSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire Subscription that starting at more than avaliable days of course or lecture';

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
        $subscriptions = Subscription::where('status','active')->get();
        foreach($subscriptions as $subscription){
            if($subscription->expiring_at < Carbon::now()->toDateTimeString()){
                $user = $subscription->user;
                $subscription->update(['status' => 'expired']);
                Mail::to($user->email)->send(new ExpireEnrollmentEmailNotification($subscription,$user));
            }
        }
        $this->info('Done');
    }
}
