@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h2 class="title">New Image</h2>
    {{ Form::open(['action' => ['PieceController@store', $category->id], 'files' => true]) }}
        @include('admin.piece.form')
        <input type="submit" value="Create">
    {{ Form::close() }}
</div>
@endsection