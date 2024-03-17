<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    public function index()
    {
        $genres = Genre::all();
        return view('genreview.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genreview.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'genre_name'=>'required'
        ]);
        Genre::create($request->all());
        return redirect()->route('genre.index')->with('msg','Add Genre Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::find($id);
        return view('genreview.detail', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Genre::find($id);
        return view('genreview.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'genre_name'=>'required'
        ]);
        Genre::find($id)->update($request->all());
        return redirect()->route('genre.index')->with('msg','Update Genre Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id)->delete();
        return back()->with('msg','Delete Genre Successfully!');
    }
}
