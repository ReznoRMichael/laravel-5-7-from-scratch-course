@extends('layout')

@section('title', 'Projects')

@section('content')

<h1>{{ $pro }}</h1>

    {{-- <ul>
        @foreach ($projects as $project)
        
            <li>{{ $project }}</li>
        
        @endforeach
    </ul> --}}

    <ul class="lt-list-inside">
        @foreach ($projectsSQL as $project)
        
            <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a> | 
                <a href="/projects/{{ $project->id }}/edit">Edit</a>
                <br><i>{{ $project->description }}</i>
            </li>
        
        @endforeach
    </ul>

@endsection