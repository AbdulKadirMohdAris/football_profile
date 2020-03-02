@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-10 offset-1">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Picture</th>
					<th>Name</th>
					<th>Nationality</th>
					<th>Position</th>
					<th>Current Team</th>
				</tr>
			</thead>
			<tbody>
				@foreach($profiles as $profile)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>
						<img src="{{ url('storage/avatars/' . $profile->avatar) }}">
					</td>
					<td>{{ $profile->name }}</td>
					<td>{{ $profile->country->name }}</td>
					<td>{{ $profile->position->desc }}</td>
					<td>{{ $profile->current_team }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection