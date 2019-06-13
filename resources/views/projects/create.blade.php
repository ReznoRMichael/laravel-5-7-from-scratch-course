@extends('layout')

@section('title', 'Create Project')

@section('content')

<h1>{{ $create }}</h1>

<form method="POST" action="/projects">

    {{ csrf_field() }}

    <div class="control">
        <input type="text" name="title" placeholder="Project title"
    class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('title') }}" required>
    </div>

    <div class="control">
        <textarea name="description" placeholder="Project description"
        class="input {{ $errors->has('description') ? 'is-danger' : '' }}" required>
        {{ old('description') }}
        </textarea>
    </div>

    <div class="control">
        <button type="submit">Create Project</button>
    </div>

    @include ('errors')

</form>


@endsection