@extends('layouts.app')
@section('pageTitle', 'Update Genre')

@section('content')
    <h2>Update Genre</h2>

    <h3 class="text-right ml-auto"><a href="{{ route('genre.index') }}" class='btn btn-success'>Back</a></h3>

    <form class="row g-3" method="POST" action="{{ route('genre.update',$data->genre_id) }}">
        @csrf
        @method("PUT")
        <div class="col-md-12">
            <label for="" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="" required="" name='genre_name' value="{{$data->genre_name}}">
        </div>

        <div class="col-10">
            <button class="btn btn-primary" type="submit">Update Genre</button>
        </div>
    </form>
@endsection
