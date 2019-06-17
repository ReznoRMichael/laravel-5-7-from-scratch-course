<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;
use App\Events\ProjectCreatedEvent;

class Project extends Model
{
    // set properties to be filled to avoid error
    protected $fillable = [
        'owner_id', 'title', 'description'
    ];

    // set properties to avoid filling
    protected $guarded = [];

    // when Laravel fires the created event, trigger also the ProjectCreatedEvent automatically
    protected $dispatchesEvents = [
        'created' => ProjectCreatedEvent::class
    ];

    /* protected static function boot()
    {
        parent::boot();

        // this function will be executed every time that a project is created
        // ::created is a name of the event that happened
        static::created(function ($project) {
            Mail::to($project->owner->email) -> send(
                new ProjectCreated($project)
            );
        });
    } */

    // get the project owner (owner_id)
    public function owner()
    {
        // the project belongs to one user
        return $this -> belongsTo(User::class);
    }

    public function tasks()
    {
        // the project has many tasks
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        /*  // First way:
            Task::create([
            'project_id' => $this->id,
            'description' => $description
        ]); */

        // second way:
        $this -> tasks() -> create( $task );
    }
}
