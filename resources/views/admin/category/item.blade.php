<div class="columns">
	<div class="column">{{ $category->name }}</div>
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
