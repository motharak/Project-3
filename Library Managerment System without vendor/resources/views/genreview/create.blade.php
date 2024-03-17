@extends('layouts.app')
@section('pageTitle', 'Add Author')

@section('content')
    <h2>Add Genre</h2>

    <h3 class="text-right ml-auto"><a href="{{ route('genre.index') }}" class='btn btn-success'>Back</a></h3>

    <form class="row g-3" method="POST" action="{{ route('genre.store') }}">
        @csrf
        <div class="col-md-12">
            <label for="" class="form-label">Genre Title</label>
            <input type="text" class="form-control" id="" required="" name='genre_name'>
        </div>

        <div class="col-10">
            <button class="btn btn-primary" type="submit">Add Genre</button>
        </div>
    </form>
@endsection
