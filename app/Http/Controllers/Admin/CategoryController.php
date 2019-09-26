<?php

namespace App\Http\Controllers\Admin;

use App\Artwork;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display list of all "Main" Categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::macros()->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new Category
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->id) {
            $parent = Category::find(request()->id);
        }

        return view('admin.category.create', compact('parent'));
    }

    /**
     * Store a newly created Category in the Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: expand form validation, custom validator
        $this->validate(request(), [
            'name' => 'required'
        ]);

        Category::create(request()->all());
        if (request()->category_id) {
            return redirect()->action('Admin\CategoryController@show', ['id' => request()->category_id]);
        } else {
            return redirect()->action('Admin\CategoryController@index');
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
        $artworks = \App\Artwork::ByCategory($category)->get()->keyBy('id');
        return view('admin.category.edit', compact('category', 'artworks'));
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
        // TODO: rename directory if url_name changed
        $category->update(request()->all());
        $category->save();
        if (request()->category_id) {
            return redirect()->action('Admin\CategoryController@show', ['id' => request()->category_id]);
        } else {
            return redirect()->action('Admin\CategoryController@index');
        }
	}
	
	public function setThumbnail(Request $request, Category $category)
	{
		$artwork = Artwork::find($request->artwork_id);
		$category->thumbnail()->associate($artwork)->save();

		return redirect()->action('Admin\CategoryController@show', ['id' => $category->id]);
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
            return redirect()->action('Admin\CategoryController@show', ['id' => $parent_id]);
        } else {
            return redirect()->action('Admin\CategoryController@index');
        }
    }
}
