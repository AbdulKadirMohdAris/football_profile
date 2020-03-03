@extends('layouts.main')

@section('content')

<div class="row">
	
	<div class="col-10 offset-1">
		<form method="get">
			<a href="/create/profile" class="btn btn-primary">CREATE</a>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Taip disini untuk carian..." name="q" value="{{ request()->q }}">
				<div class="input-group-append">
					<button class="btn btn-secondary" type="submit">Search</button>
				</div>
			</div>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Picture</th>
						<th>Name</th>
						<th>Nationality</th>
						<th>Position</th>
						<th>Current Team</th>
						<th>Action</th>
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
						<td>
							<a href="/show/profile/{{ $profile->id }}" class="btn btn-secondary">Show</a>
							<a href="/edit/profile/{{ $profile->id }}" class="btn btn-info">Edit</a>
							<a href="/delete/profile/{{ $profile->id }}" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
		
	</div>
</div>

@endsection