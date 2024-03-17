@extends('layouts.app')
@section('pageTitle','Book Details')
@section('content')
    <h1>Book Details</h1>
    <h3 class="text-right ml-auto"><a href="{{ route('author.index') }}" class='btn btn-success'>Back</a></h3>

    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Author ID</th>
            <th>Author Name</th>

            <th>Create At</th>
            <th>Update at</th>
        </tr>
        <tr>
            <td>{{ $author->author_id }}</td>
            <td>{{ $author->author_name }}</td>

            <td>{{ $author->created_at }}</td>
            <td>{{ $author->updated_at }}</td>
        </tr>
    </table>
@endsection
