@extends('layout.app')

@section('content')
	<h2 class="title is-2">{{ $category->name }}</h2>
	<artwork-gallery>
		<template slot="categories">			
			@foreach ($category->subCategories as $subCategory)
				<category
					href="{{ $subCategory->href() }}"
					image="{{ $subCategory->thumbnail->image() }}"
					index="{{ $loop->index }}"
					title="{{ $subCategory->name }}">
				</category>
			@endforeach
		</template>
		@foreach ($category->artworks as $artwork)
			<artwork image="{{ $artwork->image() }}" index="{{ $loop->index + count($category->subCategories) }}"></artwork>
		@endforeach
	</artwork-gallery>
@endsection
