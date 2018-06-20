<aside id="sidebar">
	{{-- <img id="logo" src="{{ asset('images/logo.png') }}"> --}}
	<div class="menu">
		<ul class="menu-list">
			<li>
				<a href="{{ route('web.home') }}">Home</a>
				@foreach ($main_categories as $category)
					<a href="/{{ $category->url_name }}">{{ $category->name }}</a>
				@endforeach
				<a href="/{{ route('web.about') }}">About</a>
				<a href="/{{ route('web.commission') }}">Commission</a>
				<a href="/{{ route('web.contact') }}">Contact</a>
			</li>
		</ul>
	</div>
</aside>