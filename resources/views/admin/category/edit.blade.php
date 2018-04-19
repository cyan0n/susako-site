@extends('admin.layout.admin')

@section('content')
<div class="container">
	<h2 class="title">Edit {{ $category->name }}</h2>
	{{ Form::model($category, ['action' => ['CategoryController@update', $category]]) }}
		@method('put')
		@include('admin.category.form')
        <div class="field is-grouped">
            <div class="control">
				{{ Form::submit('Save', ["class" => "button is-primary"])}}
            </div>
        </div>
		
    {{ Form::close() }}
</div>
@endsection