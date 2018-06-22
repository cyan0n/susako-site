@extends('admin.layout.admin')

@section('content')
    <div class="container">

        <div class="level">
            <div class="level-left">
                <h2 class="level-item title is-2">Categories</h2>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <a href="{{ action('Admin\CategoryController@create') }}" class="button is-primary">Create New Category</a>
                </div>
            </div>
        </div>

        {{-- Category List --}}
        @each('admin.category.item', $categories, 'category')

    </div>
@endsection
