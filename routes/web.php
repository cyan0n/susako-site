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
    $categories = App\Category::macros()->get();
    return view('home', ['categories' => $categories]);
})->name('web.home');
Route::get('/about', function () {
    return view('about');
})->name('web.about');
Route::get('/contact', function () {
    return view('contact');
})->name('web.contact');
Route::get('/commission', function () {
    return view('commission');
})->name('web.commission');

// Main Categories
Route::get('/{main_category}', function($main_category) {
    return view('category', ['category' => $main_category]);
})->name('web.category');
// Sub Categories
Route::get('/{main_category}/{sub_category}', function($main_category, $sub_category) {
    // TODO: Check if $main_category is parent to $sub_category
    return view('category', ['category' => $sub_category]);
})->name('web.sub-category');
