<div class="columns">
	<div class="column">{{ $artwork->name }}</div>
	<div class="column"></div>
	<div class="column is-1">
	<img src="{{ $artwork->image() }}">
		{{-- <a href="{{ action('ArtworkController@show', ['id' => $artwork->id]) }}">Open</a> --}}
	</div>
	<div class="column is-1">
		<a href="{{ action('ArtworkController@edit', [$artwork->category, $artwork]) }}">Edit</a>
	</div>
	<div class="column is-1">
		{{ Form::open(['action' => ['ArtworkController@destroy', $artwork->category, $artwork]]) }}
			@method('delete')
			<input type="submit" value="Delete" class="button is-danger">
		{{ Form::close() }}
	</div>
</div>