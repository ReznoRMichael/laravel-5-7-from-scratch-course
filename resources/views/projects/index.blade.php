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
                <a href="{{ route('projectIndex')."/".$project->id }}">{{ $project->title }}</a> | <a href="{{ route('projectEdit', ['id' => $project->id]) }}">Edit</a>
                </div><br>
                <i>{{ $project->description }}</i>
            </div>
        
        @endforeach

@endsection