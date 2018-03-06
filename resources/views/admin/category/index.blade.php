@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h2 class="title">Admin Home</h2>
    {{-- Category List --}}
    <a href="{{ action('CategoryController@create') }}">Create Macro</a>
    @each('admin.category.item', $categories, 'category')
</div>
@endsection
