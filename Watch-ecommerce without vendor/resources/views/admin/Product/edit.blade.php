@extends('layouts.admin.app')
@section('PageTitle','Add Product')

@section('content')


<div class="bg-light rounded h-100 p-5">

<h2 class="text-center mb-5">Edit Product</h2>

<form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hiddenId" value="{{$product->proId}}" />
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{$product->proName}}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{$product->proPrice}}">
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="form-group">
        <label for="category">CategoryNo</label>
        
        <select name="category" id="category" class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example">
            @foreach ($categories as $category)
                <option value="{{ $category->categoryNo }}" {{ isset($product->categoryNo) && $product->categoryNo == $category->categoryNo ? 'selected' : '' }}>
                    {{ $category->categoryName }}
                </option>
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
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Category Description">{{$product->Description}}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="qty">QTY</label>
        <input type="qty" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="QTY" value="{{$product->QTY}}"">
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
    <button type="submit" name="btnSubmit" class="btn btn-primary">Edit Product</button>
</form>


</div>

@endsection