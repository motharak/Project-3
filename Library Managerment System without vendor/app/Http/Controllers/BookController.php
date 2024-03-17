<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Book;
    use App\Models\Author;
use App\Models\Genre;

class BookController extends Controller
{
    // ...
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    public function index()
    {
        $books = Book::all();
        return view('booksview.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('booksview.create', compact('authors','genres'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'author_id'=>'required',
            'genre_id'=>'required',
            'ISBN'=>'required',
            'published_date'=>'required',
            'quantity_available'=>'required',
        ]);
        Book::create($request->all());

        return redirect()->route('books.index')->with('msg','Add Book susses');
    }

    public function show(string $id)
    {
        $book = Book::find($id);
        return view('booksview.detail', compact('book',));
    }

    public function edit(string $id)
    {
        $genres = Genre::all();
        $authors = Author::all();
        $book = Book::find($id);
        return view('booksview.edit', compact('book','authors','genres'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'author_id'=>'required',
            'genre_id'=>'required',
            'ISBN'=>'required',
            'published_date'=>'required',
            'quantity_available'=>'required',
        ]);
        Book::find($id)->update($request->all());

        return redirect()->route('books.index')->with('msg','Update Book susses');
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
