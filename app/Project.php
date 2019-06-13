<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // set properties to be filled to avoid error
    protected $fillable = [
        'title', 'description'
    ];

    // set properties to avoid filling
    protected $guarded = [];

    public function tasks()
    {
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
