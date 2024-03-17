@extends('layouts.app')
@section('pageTitle', 'Books')
@section('content')
    <h1>This Book view page</h1>

    @if(Session::has('msg'))
        <div class="alert alert-primary d-inline-block px-3 py-1 my-1">
            {{ Session::get('msg') }}
        </div>
    @endif

    <h3 class="text-right ml-auto"><a href="{{ route('books.create') }}" class='btn btn-success'>Add</a></h3>
    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Book Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>

            <th>Quantity Available</th>
            <th colspan=3>Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->book_id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->author_name }}</td>
                <td>{{ $book->genre->genre_name }}</td>

                <td>{{ $book->quantity_available }}</td>
                <td><a href="{{ route('books.show', [$book->book_id]) }}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{ route('books.edit', [$book->book_id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                <td>
                    <form action="{{ route('books.destroy', [$book->book_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
@endsection
