@extends('layouts.app')
@section('pageTitle','Book Details')
@section('content')
    <h1>Book Details</h1>
    <h3 class="text-right ml-auto"><a href="{{ route('genre.index') }}" class='btn btn-success'>Back</a></h3>
{{-- {{dd($genre)}} --}}
    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Genre ID</th>
            <th>Genre Title</th>

            <th>Create At</th>
            <th>Update at</th>
        </tr>
        <tr>
            <td>{{ $genre->genre_id}}</td>  
            <td>{{ $genre->genre_name}}</td>

            <td>{{ $genre->created_at}}</td>
            <td>{{ $genre->updated_at}}</td>
        </tr>
    </table>
@endsection
