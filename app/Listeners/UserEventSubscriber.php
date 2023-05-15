<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\PasswordReset;

class UserEventSubscriber
{
    /**
     * Handle successful user login events.
     */
    public function handleUserLogin($event)
    {
        Log::info('{username} logged in.', ['username' => $event->user->username]);
    }

    /**
     * Handle user logout events.
     */
    public function handleUserLogout($event)
    {
        Log::info('{username} logged out.', ['username' => $event->user->username]);
    }

    /**
     * Handle user logout events.
     */
    public function handlePasswordReset($event)
    {
        Log::info('{username} has reset their password.', ['username' => $event->user->username]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
            PasswordReset::class => 'handlePasswordReset'
        ];
    }
}
