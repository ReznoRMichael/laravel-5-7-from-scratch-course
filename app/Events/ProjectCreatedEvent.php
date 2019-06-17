<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ProjectCreatedEvent
{
    use Dispatchable, SerializesModels;

    // the project has to be imported for the event to use and put into the constructor
    public $project;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        $this -> project = $project;
    }
}
