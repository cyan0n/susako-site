<div class="level">
	<div class="level-left">
		<h5 class="level-item subtitle is-5">{{ $artwork->name }}</h5>
	</div>
	<div class="level-right">
		<div class="level-item">
			<img src="{{ $artwork->image() }}" style="height:50px">
		</div>
		<div class="level-item">
			<a href="{{ action('Admin\ArtworkController@edit', [$artwork->category, $artwork]) }}" class="button is-success">Edit</a>
		</div>
		<div class="level-item">
			{{ Form::open(['action' => ['Admin\ArtworkController@destroy', $artwork->category, $artwork]]) }}
				@method('delete')
				<input type="submit" value="Delete" class="button is-danger">
			{{ Form::close() }}
		</div>
	</div>
</div>
