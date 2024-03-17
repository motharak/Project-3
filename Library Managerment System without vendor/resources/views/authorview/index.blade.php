@extends('layouts.app')
@section('pageTitle', 'Books')
@section('content')
    <h1>This Author view page</h1>

    @if(Session::has('msg'))
        <div class="alert alert-primary d-inline-block px-3 py-1 my-1">
            {{ Session::get('msg') }}
        </div>
    @endif

    <h3 class="text-right ml-auto"><a href="{{ route('author.create') }}" class='btn btn-success'>Add</a></h3>
    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Author Id</th>
            <th>Author Name</th>

            <th colspan=3>Action</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->author_id}}</td>
                <td>{{ $author->author_name }}</td>
                <td><a href="{{ route('author.show', [$author->author_id]) }}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{ route('author.edit', [$author->author_id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                <td>
                    <form action="{{ route('author.destroy', [$author->author_id]) }}" method="POST">
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
