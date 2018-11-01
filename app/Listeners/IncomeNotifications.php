<?php

namespace App\Listeners;

use App\Events\UserHasIncome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncomeNotifications
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
     * @param  UserHasIncome  $event
     * @return void
     */
    public function handle(UserHasIncome $event)
    {
        var_dump('New income');
    }
}
