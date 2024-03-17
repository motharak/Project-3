@extends('layouts.app')
@section('pageTitle', 'Books')
@section('content')
    <h1>This Genre view page</h1>

    @if(Session::has('msg'))
        <div class="alert alert-primary d-inline-block px-3 py-1 my-1">
            {{ Session::get('msg') }}
        </div>
    @endif

    <h3 class="text-right ml-auto"><a href="{{ route('genre.create') }}" class='btn btn-success'>Add</a></h3>
    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Genre Id</th>
            <th>Genre Title</th>

            <th colspan=3>Action</th>
        </tr>
        @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre->genre_id}}</td>
                <td>{{ $genre->genre_name }}</td>
                <td><a href="{{ route('genre.show', [$genre->genre_id]) }}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{ route('genre.edit', [$genre->genre_id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                <td>
                    <form action="{{ route('genre.destroy', [$genre->genre_id]) }}" method="POST">
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
