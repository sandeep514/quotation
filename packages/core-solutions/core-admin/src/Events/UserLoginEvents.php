<?php

namespace CoreSolutions\CoreAdmin\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use CoreSolutions\CoreAdmin\Models\UsersLogs;

class UserLoginEvents extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        Event::listen('auth.login', function ($event) {
            UsersLogs::create([
                'user_id' => Auth::user()->id,
                'action'  => 'login',
            ]);
        });
        Event::listen('auth.logout', function ($event) {
            UsersLogs::create([
                'user_id' => Auth::user()->id,
                'action'  => 'logout',
            ]);
        });
    }
}
