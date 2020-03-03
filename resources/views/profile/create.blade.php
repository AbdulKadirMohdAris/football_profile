@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-10 offset-1">
		<form method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" value="{{ old('nama') }}" name="name">
					@if($errors->any())
						@foreach($errors->get('name') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nationality</label>
				<div class="col-sm-10">
					<select class="form-control" name="nationality_id">
						<option value="">Choose..</option>
						@foreach($countries as $country)
						<option value="{{ $country->id }}" @if( old('nationality_id') == $country->id) selected @endif>{{ $country->name }}</option>
						@endforeach
					</select>
					@if($errors->any())
						@foreach($errors->get('nationality_id') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Position</label>
				<div class="col-sm-10">
					<select class="form-control" name="position_id">
						<option value="">Choose..</option>
						@foreach($positions as $position)
						<option value="{{ $position->id }}" @if( old('position_id') == $position->id) selected @endif>{{ $position->desc }}</option>
						@endforeach
					</select>
					@if($errors->any())
						@foreach($errors->get('position_id') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Height</label>
				<div class="col-sm-10">
					<input type="text" value="{{ old('height') }}" name="height">
					@if($errors->any())
						@foreach($errors->get('height') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Weight</label>
				<div class="col-sm-10">
					<input type="text" value="{{ old('weight') }}" name="weight">
					@if($errors->any())
						@foreach($errors->get('weight') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Current Team</label>
				<div class="col-sm-10">
					<input type="text" value="{{ old('current_team') }}" name="current_team">
					@if($errors->any())
						@foreach($errors->get('current_team') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Birthday</label>
				<div class="col-sm-10">
					<input type="date" value="{{ old('birthday') }}" name="birthday">
					@if($errors->any())
						@foreach($errors->get('birthday') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Age</label>
				<div class="col-sm-10">
					<input type="text" value="{{ old('age') }}" name="age">
					@if($errors->any())
						@foreach($errors->get('age') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Picture</label>
				<div class="col-sm-10">
					<input type="file" name="avatar">
					@if($errors->any())
						@foreach($errors->get('avatar') as $error)
							<span class="text-danger">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-primary">SAVE</button>
		</form>
	</div>
</div>
@endsection