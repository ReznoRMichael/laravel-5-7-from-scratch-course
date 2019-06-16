@extends('layout')

@section('title', $project->title )

@section('content')

<h1>{{ $project->title }}</h1>

<div class="content"><a href="{{ route('projectEdit', ['id' => $project->id]) }}">Edit</a></div>

<div class="content"><i>{{ $project->description }}</i></div>

@if ($project->tasks->count())
<div class="content">

    @foreach ($project->tasks as $task )
        <div>
        <form method="POST" action="{{route('projectTaskUpdate', ['id' => $task->id])}}">
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

{{-- add a new Task --}}

<div>
<form method="POST" action="{{route('projectTaskStore', ['id' => $project->id])}}">
        @csrf
        <div>
            <label for="description" class="new-task">Add a New Task</label>
        </div>

        <input type="text" name="description" placeholder="New Task" required>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @include ('errors')
        
    </form>
</div>

@endsection