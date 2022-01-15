<?php

namespace App\Providers;

use App\Events\GenerateUsers;
use App\Events\LoggedInHistory;
use App\Listeners\GenerateUsersListeners;
use App\Listeners\LoggedInHistoryListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        LoggedInHistory::class => [
            LoggedInHistoryListener::class,
        ],
        GenerateUsers::class => [
            GenerateUsersListeners::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
