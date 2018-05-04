<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Fixed pages
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/commission', function () {
    return view('commission');
})->name('commission');

// Main Categories
Route::get('/{main_category}', function($main_category) {
    return view('category', ['category' => $main_category]);
});
// Sub Categories
Route::get('/{main_category}/{sub_category}', function($main_category, $sub_category) {
    // TODO: Check if $main_category is parent to $sub_category
    return view('category', ['category' => $sub_category]);
});
