@extends('layouts.app')
@section('pageTitle','Book Details')
@section('content')
    <h1>Book Details</h1>
    <h3 class="text-right ml-auto"><a href="{{ route('books.index') }}" class='btn btn-success'>Back</a></h3>

    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>ISBN</th>
            <th>Published Date</th>
            <th>Quantity Available</th>
            <th>Create At</th>
            <th>Update at</th>
        </tr>
        <tr>
            <td>{{ $book->book_id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author->author_name }}</td>
            <td>{{ $book->genre->genre_name }}</td>
            <td>{{ $book->ISBN }}</td>
            <td>{{ $book->published_date }}</td>
            <td>{{ $book->quantity_available }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
        </tr>
    </table>
@endsection
