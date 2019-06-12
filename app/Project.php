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
}
