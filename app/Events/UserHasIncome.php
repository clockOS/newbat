<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Income;

class UserHasIncome extends Event
{
    use SerializesModels;
    
    public $income;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Income $income)
    {
        $this->income = $income;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
