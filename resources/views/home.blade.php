@extends('layout.app')

@section('content')
    <artwork-gallery>
		<template slot="categories">			
			@foreach ($categories as $category)
				@if ($category->thumbnail)
					<category
						href="{{ $category->href() }}"
						image="{{ $category->thumbnail->image() }}"
						index="{{ $loop->index }}"
						title="{{ $category->name }}">
					</category>
				@endif
			@endforeach
		</template>
	</artwork-gallery>
@endsection
