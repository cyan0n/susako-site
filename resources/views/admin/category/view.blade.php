@extends('admin.layout.admin')

@section('content')
	<div class="container">
		<p class="title is-2">{{ $category->name }}</p>
		<p class="subtitle is-6 has-text-grey-light">({{ $category->url_name }})</p>

		<div class="content">
			<p>
				{{ $category->description }}
			</p>
		</div>

		{{-- Check if has a "parent" Category --}}
		@empty ($category->category_id)
			<div class="level">
				<div class="level-left">
					<h4 class="title is-4 level-item">Sub-Categories</h4>
				</div>
				<div class="left-right">
					<div class="level-item">
						<a href="{{ action('CategoryController@create', ['id' => $category->id]) }}" class="button is-primary">Create New Sub-Category</a>
					</div>
				</div>
			</div>
			{{-- Sub Categories List --}}
			@each('admin.category.item', $category->subCategories, 'category')
		@endempty
		
		<div class="level">
			<div class="level-left">
				<h4 class="title is-4 level-item">Images</h4>
			</div>
			<div class="left-right">
				<div class="level-item">
					<a href="{{ action('ArtworkController@create', ['id' => $category->id]) }}" class="button is-primary">Add Image</a>
				</div>
			</div>
		</div>
		{{-- Artworks List --}}
		@each('admin.artwork.item', $category->artworks, 'artwork')
	</div>
@endsection