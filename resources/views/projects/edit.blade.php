@extends('layout')

@section('title', 'Edit project')

@section('content')

<h1>Edit Project</h1>

<form method="POST" action="{{ route('projectIndex')."/".$project->id }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="field">
        <label class="label" for="title">Project Title</label>

            <div class="control">
            <input type="text" name="title" class="input" placeholder="Project Title" value="{{ $project->title }}">
            </div>

    </div>

    <div class="field">
        <label class="label" for="description">Project Description</label>
    
            <div class="control">
                <textarea name="description" class="input" placeholder="Project Description">{{ $project->description }}</textarea>
            </div>
    
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Submit Edit</button>
        </div>
    </div>

</form>

@include ('errors')

<form action="{{ route('projectIndex')."/".$project->id }}" method="post">
    @method('DELETE')
    @csrf

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Delete Project</button>
        </div>
    </div>

</form>

@endsection