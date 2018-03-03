<?php
Auth::routes();
Route::get('/', function() {
	return view('admin.home');
});