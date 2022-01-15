<?php

namespace App\Interfaces;

use App\User;

interface SubscriptionInterface
{
    public function subscribe(User $user);
}
