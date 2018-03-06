@extends('admin.layout.admin')

@section('content')
	<h1 class="title">{{ $category->name }}</h1>
	<h3>{{ $category->url_name }}</h3>
	<p>
		{{ $category->description }}
	</p>
	{{-- Sub Categories --}}
	<a href="{{ action('CategoryController@create', ['id' => $category->id]) }}">Create Sub</a>
	@each('admin.category.item', $subCategories, 'category')
@endsection