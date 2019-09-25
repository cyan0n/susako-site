@extends('admin.layout.admin')

@section('content')
    <div class="container">
        <h2 class="title">New Image</h2>
        {{ Form::open(['action' => ['Admin\ArtworkController@store', $category->id], 'files' => true]) }}
            @include('admin.artwork.form')
            <div class="field is-grouped">
                <div class="control">
                    {{ Form::submit('Create', ["class" => "button is-primary"])}}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection