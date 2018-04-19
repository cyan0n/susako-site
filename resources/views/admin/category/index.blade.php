@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h2 class="title">Categories</h2>

    {{-- Category List --}}
    <a href="{{ action('CategoryController@create') }}">Create New Category</a>

    @each('admin.category.item', $categories, 'category')

</div>
@endsection
