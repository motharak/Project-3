@extends('layouts.admin.app')
@section('PageTitle','Category')

@section('content')

<div class="bg-light rounded h-100 p-5">

<h2 class="text-center mb-5">Edit Category</h2>

<form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hiddenId" value="{{$category->categoryNo}}" />
    <div class="form-group">
        <label for="name">CategoryName</label>
        <input type="text" name="name" id="name" value="{{$category->categoryName}}" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>a
        <textarea name="description" id="description" value="{{$category->Desription}}" class="form-control @error('description') is-invalid @enderror" placeholder="Category Description">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="status">Status</label>
        <input class="form-control" type="file" name="file" />
        <br>
        <img width="100" src="{{asset('uploads/'. $category->Picture)}}" />
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br/>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Edit Category</button>
</form>


</div>


@endsection