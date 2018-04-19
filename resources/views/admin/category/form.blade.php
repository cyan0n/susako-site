{{-- Parent --}}
@isset($parent)
	{{ Form::hidden('category_id', $parent->id) }}
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
