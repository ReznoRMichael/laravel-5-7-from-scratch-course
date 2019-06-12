<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project; // like 'using namespace' in C++

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = [
            'Project 1',
            'Project 2',
            'Project 3',
        ];

        $projectsSQL = Project::all(); // or \App\Project

        // resources/views/projects/index.blade.php
        return view('projects.index',
        compact('projectsSQL'), [
            'projects' => $projects
            ]);
            // compact() - the same, but shorter as =>
            
    }
    
    // create a new project (subpage)
    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        /* // create a new project object from the POST request
        $project = new Project();
        $project -> title = request('title');
        $project -> description = request('description');
                
        // save the project into database
        $project -> save();
        */

        /* Project::create([
            'title' => request('title'),
            'description' => request('description')
        ]); */

        $attributes = request() -> validate([
            'title' => ['required', 'min:3', 'max:191'],
            'description' => ['required', 'min:3']
        ]);

        // shorter version
        //Project::create( request( ['title', 'description'] ) );
        // even shorter version
        Project::create( $attributes );

        // redirect to /projects on finish
        return redirect('/projects');
    }

    // Project $project - doesn't need Project::find
    public function show(Project $project)
    {
        return view('projects.show', compact('project') );
    }

    public function edit(Project $project)
    {
        // find the entry in the database
        //$project = Project::find($id);

        return view('projects.edit', compact('project') );
    }

    public function update(Project $project)
    {
        // Die & Dump - quick debugging 
        //dd('Hello!');
       /*  $project = Project::find($id);

        // get the updated fields from form
        $project -> title = request('title');
        $project -> description = request('description');

        // save the updated project into database
        $project -> save(); */

        // shorter version
        $project -> update( request( ['title', 'description'] ));

        // redirect to /projects on finish
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        //dd('delete '.$id);
        // find or fail - 404 error on not finding entry
        //$project = Project::findOrFail($id) -> delete();

        $project -> delete();

        // redirect to /projects on finish
        return redirect('/projects');
    }
}
    