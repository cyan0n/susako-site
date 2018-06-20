@extends('layout.app')

@section('content')
    <h2 class="title is-2">Home</h2>
    <artwork-gallery>
		<template slot="categories">			
			@foreach ($categories as $category)
				<category
					href="{{ $category->href() }}"
					image="{{ $category->thumbnail->image() }}"
					index="{{ $loop->index }}"
					title="{{ $category->name }}">
				</category>
			@endforeach
		</template>
	</artwork-gallery>
@endsection
