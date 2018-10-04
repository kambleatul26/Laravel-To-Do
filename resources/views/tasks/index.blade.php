@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')

	@foreach($tasks as $task)

		<div class="row">
			<div class="col-sm-12">
				<h3>
					{{ $task->name }}
					<small>{{ $task->created_at }}</small>
				</h3>
				<p>{{ $task->description }}</p>
				<h4>{{ $task->due_date }}</h4>
			</div>
		</div>
		<hr>
	
	@endforeach

	<div class="row justify-content-center">
		<div class="col-sm-6 text-center">
			{{ $tasks->links() }}
		</div>
	</div>

@endsection