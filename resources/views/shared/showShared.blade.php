@extends('layouts.main')

@section('title', 'Shared Tasks')

@section('content')

    @if($sharedTasks->count() == 0)
        <p class="lead text-center">There are no tasks listed. Why don't you create one!</p>
    @endif

	@foreach($sharedTasks as $task)

		<div class="row">
			<div class="col-sm-12">
				<h3>
					{{ $task->name }}
					<small>{{ $task->created_at }}</small>
				</h3>
				<p>{{ $task->description }}</p>
				<h4>Due Date: <small>{{ $task->due_date }}</small></h4>
                {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('shared.share', $task->id) }}" class="btn btn-sm btn-secondary">Share Task</a>
                    <button type="submit" class="btn btn-small btn-danger">Delete</button>
                {!! Form::close() !!}
			</div>
		</div>
		<hr>

	@endforeach

	<div class="row justify-content-center">
		<div class="col-sm-6 text-center">
			{{ $sharedTasks->links() }}
		</div>
	</div>

@endsection
