<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        /*
        // one way to do it
        // check if the task is completed or not and update accordingly
        $task -> update([
            'completed' => request() -> has('completed')
        ]); */

        // second way
        // Encapsulation - hide internal values and state inside a class
        //$task -> complete();

        $method = request() -> has('completed') ? 'complete' : 'incomplete';
        $task -> $method();

        return back();
    }

    public function store(Project $project)
    {
        /*  // First way:
            Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]); */

        // second way:
        $attributes = request() -> validate([ 'description' => 'required' ]);
        $project -> addTask( $attributes );

        return back();
    }
}
