@extends('layouts.main')
@section('content')
<div class="card">
	<div class="card-body">
		<a href="/">LIST</a>
		<table>
			<tr>
				<td>{{ $profiles->name }}</td>
			</tr>
			<tr>
				<td>{{ $profiles->country->name }}</td>
			</tr>
			<tr>
				<td>{{ $profiles->position->desc }}</td>
			</tr>
			<tr>
				<td>{{ $profiles->height }} Meter</td>
			</tr>
			<tr>
				<td>{{ $profiles->weight }} KG</td>
			</tr>
			<tr>
				<td>{{ $profiles->current_team }}</td>
			</tr>
			<tr>
				<td>{{ date("d M Y", strtotime($profiles->birthday)) }}</td>
			</tr>
			<tr>
				<td>{{ $profiles->age }}</td>
			</tr>
		</table>
	</div>
</div>
@endsection