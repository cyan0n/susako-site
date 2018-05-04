<aside id="sidebar" class="menu">
	<ul class="menu-list">
		<li>
			<a href="{{ route('home') }}">Home</a>
			@foreach ($main_categories as $category)
				<a href="/{{ $category->url_name }}">{{ $category->name }}</a>
			@endforeach
			<a href="/{{ route('about') }}">About</a>
			<a href="/{{ route('commission') }}">Commission</a>
			<a href="/{{ route('contact') }}">Contact</a>
		</li>
	</ul>
</aside>