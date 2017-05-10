@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-12 col-md-6 col-md-offset-3">
			<h2>Edit task with id #1</h2>

			<form class="" action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
				{{-- Form Method Spoofing --}}
				{{ method_field('PUT') }}
				{{ csrf_field() }}

				<div class="form-group">
					<label for="description">Description</label>
					<input class="form-control" type="text" id="description" name="description" value="{{ $task->description }}" placeholder="Beispielseite mit dem Bootstrap Framework anlegen"/>
				</div>

				<div class="form-group">
					<label for="deadline">Deadline</label>
					<input class="form-control" type="date" id="dead_at" name="dead_at" value="{{ $task->dead_at->format('Y-m-d')}}"/>
				</div>

				<div class="form-group">
					<label for="progress">Progress in %</label>
					<input class="form-control" type="number" id="progress" name="progress" value="{{ $task->progress }}" step="1" min="0" max="100"/>
				</div>

				<button class="btn btn-primary" type="submit">Update</button>
			</form>
		</div>
	</div>
@endsection
