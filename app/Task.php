<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // set properties to be filled to avoid error
    protected $fillable = [
        'project_id', 'description', 'completed'
    ];

    // set properties to avoid filling
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::Class);
    }

    public function complete($completed = true)
    {
        // check if the task is completed or not and update accordingly
        /* $this -> update([
            'completed' => request() -> has('completed')
        ]); */
        $this -> update( compact('completed') );
    }

    public function incomplete()
    {
        $this -> complete(false);
    }
}
