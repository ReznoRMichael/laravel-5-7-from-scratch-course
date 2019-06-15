<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project; // like 'using namespace' in C++

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
        // use with -> only() or except() to exclude some methods
    }
    public function index()
    {
        $projects = [
            'Project 1',
            'Project 2',
            'Project 3',
        ];

        //$projectsSQL = Project::all(); // or \App\Project
        $projectsSQL = Project::where( 'owner_id', auth()->id() ) -> get(); // view only projects of a given owner_id

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

        $attributes['owner_id'] = auth()->id();
        Project::create( $attributes );

        // redirect to /projects on finish
        return redirect('/projects');
    }

    // Project $project - doesn't need Project::find
    public function show(Project $project)
    {
        // don't allow the user viewing projects of other users
        /* if($project->owner_id !== auth()->id())
        {
            abort(403); // abort with 403 Error
        } */

        // Laravel helper functions for doing the same
        //abort_if($project->owner_id != auth()->id(), 403);
        //abort_unless(auth()->user()->owns($project), 403);

        $this -> authorize('update', $project);

        return view('projects.show', compact('project') );
    }

    public function edit(Project $project)
    {
        // find the entry in the database
        //$project = Project::find($id);

        $this -> authorize('update', $project);

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

        $this -> authorize('update', $project);

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

        $this -> authorize('update', $project);

        $project -> delete();

        // redirect to /projects on finish
        return redirect('/projects');
    }
}
    