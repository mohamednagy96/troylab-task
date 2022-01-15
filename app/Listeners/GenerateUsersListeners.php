<?php

namespace App\Listeners;

use App\Events\GenerateUsers;
use App\Models\User;
use App\Notifications\NumberOfNewStudentEmail;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class GenerateUsersListeners
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
    public function handle(GenerateUsers $event)
    {
        $noUsers = $event->no_of_users;
            try{
                Notification::route('mail', 'taylor@laravel.com')->notify(new NumberOfNewStudentEmail($noUsers));
            }catch(Exception $e){
        }
    }
}
