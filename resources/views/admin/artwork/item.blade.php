{{ $artwork->name }}
<img src="{{ $artwork->image() }}" alt="{{ $artwork->name }}" width="200px">

<div class="columns">
	<div class="column">{{ $artwork->name }}</div>
	<div class="column"></div>
	<div class="column is-1">
		<a href="{{ action('CategoryController@show', ['id' => $category->id]) }}">Open</a>
	</div>
	<div class="column is-1">
		<a href="{{ action('CategoryController@edit', ['id' => $category->id]) }}">Edit</a>
	</div>
	<div class="column is-1">
		{{ Form::open(['action' => ['CategoryController@destroy', $category]]) }}
			@method('delete')
			<input type="submit" value="Delete" class="button is-danger">
		{{ Form::close() }}
	</div>
</div>