@extends('layout')

@section('title', 'Welcome Page')

@section('content')

<h1>{{ $welcome.", ".(Auth::user() ? ucwords(Auth::user()->name) : 'Guest' ) }}</h1>

    <ul>
        @foreach ($tasks as $task)
        
            <li>{{ $task }}</li>
        
        @endforeach
    </ul>

@endsection