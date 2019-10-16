<?php
// TODO: Remove registration
Auth::routes();

// View list of categories
Route::get('/', function() {
	$categories = App\Category::orderBy('updated_at', 'desc')->limit(3)->get();
    return view('admin/dashboard', ['categories' => $categories]);
})->name('dashboard');

// Categories
Route::resource('categories', 'CategoryController');
Route::put('categories/{category}/thumbnail', 'CategoryController@setThumbnail');

// Artworks (Images)
Route::resource('categories/{category}/image', 'ArtworkController')
	->except([ 'index', 'show' ])
	->parameters(['image' => 'artwork']);
Route::put('categories/{category}/move/{artwork}', 'ArtworkController@move');
