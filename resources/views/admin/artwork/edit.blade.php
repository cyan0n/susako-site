@extends('admin.layout.admin')

@section('content')
	<div class="container">
		<h2 class="title">Edit {{ $artwork->name }}</h2>
		{{ Form::model($artwork, ['action' => ['Admin\ArtworkController@update', $artwork->category, $artwork]]) }}
			@method('put')
			@include('admin.artwork.form')
			<div class="field is-grouped">
				<div class="control">
					{{ Form::submit('Save', ["class" => "button is-primary"])}}
				</div>
			</div>
		{{ Form::close() }}
	</div>
@endsection