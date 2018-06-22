@extends('admin.layout.admin')

@section('content')
<div class="container">
	<h1 class="title is-1">Dashboard</h1>
	<a href="{{ action('Admin\CategoryController@index') }}" class="button is-primary">View Categories</a>
	{{-- Category List --}}
	@each('admin.category.item', $categories, 'category')
</div>
@endsection