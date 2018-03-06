<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // List Macro Categories
        $categories = Category::macros()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->id) {
            $parent = Category::find(request()->id);
            return view('admin.category.create', compact('parent'));
        } else {
            return view('admin.category.create');
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);
        Category::create(request()->all());
        if (request()->category_id) {
            return redirect()->action('CategoryController@show', ['id' => request()->category_id]);
        } else {
            return redirect()->action('CategoryController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $subCategories = Category::sub($category->id)->get();
        return view('admin.category.view', compact('category', 'subCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update(request()->all());
        $category->save();
        if (request()->category_id) {
            return redirect()->action('CategoryController@show', ['id' => request()->category_id]);
        } else {
            return redirect()->action('CategoryController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $parent_id = $category->category_id;
        $category->delete();
        if ($parent_id) {
            return redirect()->action('CategoryController@show', ['id' => $parent_id]);
        } else {
            return redirect()->action('CategoryController@index');
        }
    }
}
