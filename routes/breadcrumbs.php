<?php
// Home
Breadcrumbs::for('dashboard', function($trail) {
	$trail->push('Dashboard', route('dashboard'));
});
// Home > Category
// Home > Category > Category
Breadcrumbs::for('category', function($trail, $category) {
	$trail->parent('dashboard');
	if ($category->category_id) {
		$trail->push($category->macroCategory->name, action('Admin\CategoryController@show', $category->macroCategory->id));
	}
	$trail->push($category->name, action('Admin\CategoryController@show', $category->id));
});
// Home > Category > Artwork
// Home > Categoty > Category > Artwork
Breadcrumbs::for('artwork', function($trail, $artwork) {
	$trail->parent('category', $artwork->category);
	$trail->push($artwork->name, action('Admin\ArtworkController@edit', [$artwork->category->id, $artwork->id]));
});