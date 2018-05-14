@extends('admin.layout.admin')

@section('content')
	<div class="container">
		<h2 class="title">Edit {{ $category->name }}</h2>
		{{ Form::model($category, ['action' => ['CategoryController@update', $category]]) }}
			@method('put')
			@include('admin.category.form')

			{{-- Thumbnail --}}
			<div class="field">
				{{ Form::label('thumbnail', 'Thumbnail', ['class' => 'label']) }}
				{{--<thumbnail-select :connected="'thumbnail'"></thumbnail-select>
				{{ Form::select('thumbnail', $category->artworks()->get()->keyBy('id'), null, ['class' => 'is-hidden']) }}--}}
				<select-thumbnail name="thumbnail_id"
					:images="{{ $options }}"
					folder="http://susako.dock/storage/image/"
					@if ($category->thumbnail)
						value="{{ $category->thumbnail->id }}"
					@endif>
				</select-thumbnail>
			</div>
			

			<div class="field is-grouped">
				<div class="control">
					{{ Form::submit('Save', ["class" => "button is-primary"])}}
				</div>
			</div>
			
		{{ Form::close() }}
	</div>
@endsection