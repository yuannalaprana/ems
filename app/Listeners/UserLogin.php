<?php

namespace App\Listeners;

use App\Models\LoginInformation;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class UserLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $login = LoginInformation::create([
            'user_id' => $user->id
        ]);
    }
}

