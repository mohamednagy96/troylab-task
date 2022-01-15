<?php

namespace App\Listeners;

use App\Events\LoggedInHistory;
use App\Notifications\LogInEmail;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LoggedInHistoryListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LoggedInHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;

        $saveHistory = DB::table('login_history')->insert(
            ['name' => $userinfo->name, 'email' => $userinfo->email, 'created_at' => $current_timestamp, 'updated_at' => $current_timestamp]
        );
        try{
            $userinfo->notify(new LogInEmail());
        }catch(Exception $e){
        }

        return $saveHistory;

    }
}
