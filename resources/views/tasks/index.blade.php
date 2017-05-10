@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<table class="table" id="todo-list">
				<thead>
					<tr>
						<th>TODO</th>
						<th>Deadline</th>
						<th>Progress</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($tasks as $task)
						<tr>
							<td>{{ $task->description }}</td>
							<td>{{ $task->dead_at->diffForHumans() }}</td>
							<td>{{ $task->progress }}</td>
							<td>
								<a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="glyphicon glyphicon-pencil btn btn-primary btn-xs btn btn-primary"></a>

								<form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST" style="display: inline;">
									{{-- Form Method Spoofing --}}
									{{ method_field('DELETE') }}
									{{ csrf_field() }}

									<button class="glyphicon glyphicon-remove btn btn-primary btn-xs btn-danger" type="submit"></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection