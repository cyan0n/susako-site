@extends('admin.layout.admin')

@section('content')
<div class="container">
	<h2 class="title">Edit {{ $category->name }}</h2>
	{{ Form::model($category, ['action' => ['CategoryController@update', $category]]) }}
		@method('put')
		@include('admin.category.form')
		{{ Form::submit('Save')}}
    {{ Form::close() }}
</div>
@endsection