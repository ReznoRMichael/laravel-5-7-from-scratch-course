@extends('layout')

@section('title', 'Projects')

@section('content')

<h1>{{ $pro }}</h1>

    {{-- <ul>
        @foreach ($projects as $project)
        
            <li>{{ $project }}</li>
        
        @endforeach
    </ul> --}}

        @foreach ($projectsSQL as $project)
        
            <div class="projects-list">
                <div>
                    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a> | <a href="/projects/{{ $project->id }}/edit">Edit</a>
                </div><br>
                <i>{{ $project->description }}</i>
            </div>
        
        @endforeach

@endsection