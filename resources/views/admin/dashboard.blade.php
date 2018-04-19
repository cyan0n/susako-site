@extends('admin.layout.admin')

@section('content')
<div class="container">
	<h1>Dashboard</h1>
	<a href="{{ action('CategoryController@index') }}">View Categories</a>
</div>
@endsection