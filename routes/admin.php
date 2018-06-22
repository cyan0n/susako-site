<?php
// TODO: Remove registration
Auth::routes();

// View list of categories
Route::view('/', 'admin/dashboard')->name('dashboard');

// Categories
Route::resource('categories', 'CategoryController');

// Artworks (Images)
Route::resource('categories/{category}/image', 'ArtworkController')
	->except([ 'index', 'show' ])
	->parameters(['image' => 'artwork']);
