<?php
// TODO: Remove registration
Auth::routes();

// View list of macro categories
Route::get('/', 'CategoryController@index');

// Categories
Route::resource('categories', 'CategoryController');

// Artworks (Images)
Route::resource('categories/{category}/image', 'ArtWorkController');
