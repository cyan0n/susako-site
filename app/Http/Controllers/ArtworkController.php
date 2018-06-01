<?php

namespace App\Http\Controllers;

use App\Artwork;
use App\Category;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('admin.artwork.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);
        // TODO: check if path already exists
        $path = $category->path() . $request->input('url_name');
        $category->artworks()->create(request()->all())->id;
        // Save file
        $request->file('image')->storeAs('image/', $path, 'public');
        return redirect()->action('CategoryController@show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Artwork $artwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Artwork $artwork)
    {
        return view('admin.artwork.edit', compact('category', 'artwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Artwork $artwork)
    {
        $artwork->update(request()->all());
        $artwork->save();

        return redirect()->action('CategoryController@show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Artwork $artwork)
    {
        $artwork->delete();
        return redirect()->action('CategoryController@show', $category);
    }
}
