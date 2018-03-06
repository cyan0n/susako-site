<?php
// TODO: Remove registration
Auth::routes();

// View list of macro categories
Route::get('/', 'CategoryController@index');

// Macro categories
Route::resource('categories', 'CategoryController');