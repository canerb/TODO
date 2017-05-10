@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-12 col-md-6 col-md-offset-3">
			<h2>Create a Task</h2>

			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<form class="" action="{{ route('tasks.store') }}" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="description">Description</label>
					<input class="form-control" type="text" id="description" name="description" value="{{ old('description') }}" placeholder="Beispielseite mit dem Bootstrap Framework anlegen"/>
				</div>

				<div class="form-group">
					<label for="deadline">Deadline (YYYY-MM-DD)</label>
					<input class="form-control" type="date" id="dead_at" name="dead_at" value="{{ old('dead_at') }}"/>
				</div>

				<div class="form-group">
					<label for="progress">Progress in %</label>
					<input class="form-control" type="number" id="progress" name="progress" value="{{ old('progress') }}" step="1" min="0" max="100"/>
				</div>

				<button class="btn btn-primary" type="submit">Create</button>
			</form>
		</div>
	</div>
@endsection