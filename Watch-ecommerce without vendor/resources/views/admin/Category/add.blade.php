@extends('layouts.admin.app')
@section('PageTitle','Categroy')

@section('content')

<div class="bg-light rounded h-100 p-5">

<h2 class="text-center mb-5">Create New Category</h2>

<form method="POST" action="{{route('addcartegory.action')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">CategoryName</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>a
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Category Description">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input class="form-control" type="file" name="file" />
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br/>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Create Category</button>
</form>


</div>


@endsection