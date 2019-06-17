<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project; // like 'using namespace' in C++
use App\Mail\ProjectCreated;
use App\Events\ProjectCreatedEvent;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
        // use with -> only() or except() to exclude some methods
    }
    public function index()
    {
        //$projectsSQL = Project::all(); // or \App\Project
        // projects where the owner_id is the same as the currently logged in user's id - and get the results
        //$projectsSQL = Project::where( 'owner_id', auth()->id() ) -> get();

        // different way - create a project relationship to the user (User.php)
        // $projectsSQL = auth() -> user() -> projects;

        //dump($projectsSQL);

        // resources/views/projects/index.blade.php
        // compact() - the same, but shorter as =>
        // return view('projects.index', compact('projectsSQL') );
        // other way - put the variable directly here in []
        return view('projects.index', [
            'projects' => auth() -> user() -> projects    
        ]);
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

        /* $attributes = request() -> validate([
            'title' => ['required', 'min:3', 'max:191'],
            'description' => ['required', 'min:3']
        ]); */

        $attributes = $this -> validateProject();

        // shorter version
        //Project::create( request( ['title', 'description'] ) );
        // even shorter version

        $attributes['owner_id'] = auth()->id();

        /* $project = Project::create( $attributes );

        // send a mail on creating a new project
        \Mail::to($project->owner->email) -> send(
            new ProjectCreated($project)
        ); */

        Project::create( $attributes );

        // event(new ProjectCreatedEvent($project));

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
        $project -> update( $this -> validateProject() );

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

    protected function validateProject()
    {
        return request() -> validate([
            'title' => ['required', 'min:3', 'max:191'],
            'description' => ['required', 'min:3']
        ]);
    }
}
    