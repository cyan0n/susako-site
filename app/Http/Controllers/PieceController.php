<?php

namespace App\Http\Controllers;

use App\Piece;
use App\Category;
use Illuminate\Http\Request;

class PieceController extends Controller
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
        return view('admin.piece.create', compact('category'));
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
        $id = $category->pieces()->create(request()->all())->id;
        // Save file
        $request->file('image')->storeAs('image/', $id, 'public');
        return redirect()->action('CategoryController@show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Piece $piece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Piece $piece)
    {
        //
    }
}
