{{-- Category --}}
{{ Form::hidden('category_id', $category->id) }}

{{-- Image --}}
<div class="field has-name">
	<label class="file-label">
		{{ Form::file('image', [
			'class' => 'file-input',
			'accept' => 'image/gif,image/jpeg,image/jpg,image/png',
			'@change' => 'chosenImage'
		]) }}
		<span class="file-cta">
			<span class="file-icon">
				<i class="fa fa-upload"></i>
			</span>
			<span class="file-label">
				Choose an image…
		    </span>
		</span>
		<span class="file-name" v-html="filename">
		</span>
	</label>
</div>

@isset($artwork)
	<img src="{{ $artwork->image() }}" alt="">				
@endisset

{{-- Name --}}
<div class="field">
	{{ Form::label('name', 'Name', ['class' => 'label']) }}
	<div class="control">
		{{ Form::text('name', null, ['class' => 'input']) }}
	</div>
</div>

{{-- Urlname --}}
<div class="field">
	{{ Form::label('url_name', 'URL Name', ['class' => 'label']) }}
	<div class="control">
		{{ Form::text('url_name', null, ['class' => 'input']) }}
	</div>
</div>

{{-- Description --}}
<div class="field">
	{{ Form::label('description', 'Description', ['class' => 'label']) }}
	<div class="control">
		{{ Form::textarea('description', null, ['class' => 'textarea']) }}
	</div>
</div>
