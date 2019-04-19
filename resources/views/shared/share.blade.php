@extends('layouts.main')

@section('title', 'Share Task')

@section('content')

	<div class="row">
		<div class="col-sm-12">
            <h1>Share</h1>
            <hr>
            {!! Form::model($task, ['route' => ['shared.shareTo', $task->id], 'method' => 'POST']) !!}
                {{ Form::label('email', 'Enter Email', ['class' => 'control-label']) }}
                {{ Form::text('email', 'abc@xyz.com', ['class' => 'form-control form-control-lg', 'placeholder' => 'Your Friend\'s email']) }}
                <div class="row justify-content-center mt-3">
                    <div class="col-sm-4">
                        <a href="{{ route('task.index') }}" class="btn btn-block btn-secondary">Go Back</a>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-block btn-primary" type="submit">Share Task</button>
                    </div>
                </div>
            {!! Form::close() !!}
		</div>
	</div>

@endsection
