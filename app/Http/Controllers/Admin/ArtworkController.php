<?php

namespace App\Http\Controllers\Admin;

use App\Artwork;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
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
            'name' => 'required',
            'image' => 'required'
        ]);
        // TODO: check if path already exists
        $artwork = $category->artworks()->create(
            array_merge(
                request()->all(),
                ['extension' => request()->image->extension()]
            )
        );
        // Save file
		$request->file('image')->storeAs('image/', $artwork->path(), 'public');

		if (!$category->thumbnail) {
			$category->thumbnail()->associate($artwork)->save();
		} else {
			// Update Parent Category update_at
			$category->touch();
		}
		
        return redirect()->action('Admin\CategoryController@show', $category);
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

		// Save file
		if ($request->file('image')) {
			$request->file('image')->storeAs('image/', $artwork->path(), 'public');
		}		

		// Update Parent Category update_at
		$category->touch();

        return redirect()->action('Admin\CategoryController@show', $category);
	}
	
	public function move(Request $request, Category $category, Artwork $artwork)
	{
		$from_path = $artwork->path();
		$to = Category::find($request->input('to'));
		$artwork->category()->associate($to);
		$artwork->save();

		Storage::disk('public')->move('image/'.$from_path, 'image/'.$artwork->path);

		$category->touch();
		$to->touch();

		return redirect()->action('Admin\CategoryController@show', $category);
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

		// Update Parent Category update_at
		$category->touch();

        return redirect()->action('Admin\CategoryController@show', $category);
    }
}
