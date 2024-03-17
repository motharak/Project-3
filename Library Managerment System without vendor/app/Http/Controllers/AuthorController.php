<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        $authors = Author::all();
        return view('authorview.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authorview.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'author_name'=>'required'
        ]);
        Author::create($request->all());
        return redirect()->route('author.index')->with('msg','Add Author success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $author = Author::find($id);
        return view('authorview.detail',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Author::find($id);
        return view('authorview.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'author_name'=>'required'
        ]);
        Author::find($id)->update($request->all());
        return redirect()->route('author.index')->with('msg','Update Author success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Author::find($id)->delete();
        return back()->with('msg','Delete author success');
    }
}
