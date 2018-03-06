@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h2 class="title">New Category</h2>
    {{ Form::open(['action' => 'CategoryController@store']) }}
        @include('admin.category.form')
        <input type="submit" value="Create">
    {{ Form::close() }}
</div>
@endsection