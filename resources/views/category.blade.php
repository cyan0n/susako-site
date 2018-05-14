@extends('layout.app')

@section('content')
	<div class="container">
		<h2 class="title is-2">{{ $category->name }}</h2>
		<ul>
			@foreach ($category->subCategories as $subCategory)
				<li>
					<a href="/{{ $category->url_name }}/{{ $subCategory->url_name }}">{{ $subCategory->name }}</a>
				</li>
			@endforeach
		</ul>
		<h5 class="subtitle is-5">Images</h5>
		<artwork-gallery>
			@foreach ($category->artworks as $artwork)
				<artwork image="{{ $artwork->image() }}" index="{{ $loop->index }}"></artwork>
			@endforeach
		</artwork-gallery>
	</div>
@endsection
