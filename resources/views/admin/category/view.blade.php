@extends('admin.layout.admin')

@section('content')
	<h1 class="title">{{ $category->name }}</h1>
	<h3>{{ $category->url_name }}</h3>
	<p>
		{{ $category->description }}
	</p>
	@empty ($category->category_id)
		{{-- Sub Categories --}}
		<a href="{{ action('CategoryController@create', ['id' => $category->id]) }}">Create Sub</a>
		@each('admin.category.item', $category->subCategories, 'category')
	@endempty
	{{-- Artworks --}}
	<a href="{{ action('ArtworkController@create', ['id' => $category->id]) }}">Add Image</a>
	@each('admin.artwork.item', $category->artworks, 'artwork')
@endsection