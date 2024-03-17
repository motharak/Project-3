@extends('layouts.app')
@section('pageTitle', 'Update Author')

@section('content')
    <h2>Update Author</h2>

    <h3 class="text-right ml-auto"><a href="{{ route('author.index') }}" class='btn btn-success'>Back</a></h3>

    <form class="row g-3" method="POST" action="{{ route('author.update',$data->author_id) }}">
        @csrf
        @method("PUT")
        <div class="col-md-12">
            <label for="" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="" required="" name='author_name' value="{{$data->author_name}}">
        </div>

        <div class="col-10">
            <button class="btn btn-primary" type="submit">Update Author</button>
        </div>
    </form>
@endsection
