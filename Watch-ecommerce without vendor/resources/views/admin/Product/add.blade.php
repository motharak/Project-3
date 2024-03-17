@extends('layouts.admin.app')
@section('PageTitle','Add Product')

@section('content')


<div class="bg-light rounded h-100 p-5">

<h2 class="text-center mb-5">Add Product</h2>

<form method="POST" action="{{route('addproduct.action')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{ old('price') }}">
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="form-group">
        <label for="category">CategoryNo</label>
        
                <select name="category" id="category" class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example">
                                    @foreach ($categories as $item)
                                        <option value="{{$item->categoryNo}}">{{$item->categoryName}}</option>
                                    @endforeach
                </select>
        
        @error('category')
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
        <label for="qty">QTY</label>
        <input type="qty" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="QTY" value="{{ old('qty') }}">
        @error('qty')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="picture">Picture</label>
        <input class="form-control" type="file" name="file" />
        @error('picture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br/>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Add Product</button>
</form>


</div>

@endsection