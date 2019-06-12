@extends('layout')

@section('title', $project->title )

@section('content')

<h1>{{ $project->title }}</h1>

<div class="content"><a href="/projects/{{ $project->id }}/edit">Edit</a></div>

<div class="content">{{ $project->description }}</div>

@if ($project->tasks->count())
<div class="content">

    @foreach ($project->tasks as $task )
        <div>
            <form method="POST" action="/tasks/{{ $task->id }}">
                @method('PATCH')
                @csrf
                <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                    <input type="checkbox" name="completed" onchange="this.form.submit();" {{ $task->completed ? 'checked' : '' }}>
                    {{ $task->description }}
                </label>
            </form>
        </div>
    @endforeach

</div>
@endif

@endsection