{{-- Category --}}
{{ Form::hidden('category_id', $category->id) }}

{{-- Image --}}
{{ Form::label('image', 'Image') }}
{{ Form::file('image') }}
{{-- Name --}}
{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}

{{-- Urlname --}}
{{ Form::label('url_name', 'URL Name') }}
{{ Form::text('url_name') }}

{{-- Description --}}
{{ Form::label('description', 'Description') }}
{{ Form::textarea('description') }}
