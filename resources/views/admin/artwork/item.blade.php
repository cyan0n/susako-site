<div class="level">
	<div class="level-left">
		<div class="level-item">
			<img src="{{ $artwork->image() }}" style="height:50px">
		</div>
		<h5 class="level-item subtitle is-5">{{ $artwork->name }}</h5>
	</div>
	<div class="level-right">
		<div class="level-item">
			@if ($artwork->thumbnailOf)
				Main Image
			@else
				{{ Form::open(['method' => 'put', 'action' => ['Admin\CategoryController@setThumbnail', $artwork->category->id]]) }}
					{{ Form::hidden('artwork_id', $artwork->id) }}
					{{ Form::submit('Set as Main', ["class" => "button"])}}
				{{ Form::close() }}
			@endif
		</div>
		<div class="level-item">
			{{ Form::open(['method' => 'put', 'action' => ['Admin\ArtworkController@move', $artwork->category, $artwork]]) }}
				<div class="select">
					<select name="to">
						<option value="">- Segli Categoria -</option>
						@foreach ($main_categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@foreach ($category->subCategories as $subCategories)
								<option value="{{ $subCategories->id }}"> &rsaquo; {{ $subCategories->name }}</option>
							@endforeach
						@endforeach
					</select>
				</div>
				<input type="submit" value="Move" class="button">
			{{ Form::close() }}
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
