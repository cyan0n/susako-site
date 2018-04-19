@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h2 class="title">New Category</h2>
    {{ Form::open(['action' => 'CategoryController@store']) }}
        @include('admin.category.form')
        <div class="field is-grouped">
            <div class="control">
				{{ Form::submit('Create', ["class" => "button is-primary"])}}
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection