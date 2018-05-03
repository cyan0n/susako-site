<div class="level">
	<div class="level-left">
		<h5 class="level-item subtitle is-5">{{ $category->name }}</h5>
	</div>
	<div class="level-right">
		<div class="level-item">
			<a href="{{ action('CategoryController@show', ['id' => $category->id]) }}" class="button is-info">Open</a>
		</div>
		<div class="level-item">
			<a href="{{ action('CategoryController@edit', ['id' => $category->id]) }}" class="button is-success">Edit</a>
		</div>
		<div class="level-item">
			{{ Form::open(['action' => ['CategoryController@destroy', $category]]) }}
				@method('delete')
				<input type="submit" value="Delete" class="button is-danger">
			{{ Form::close() }}
		</div>
	</div>
</div>
