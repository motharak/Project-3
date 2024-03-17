@extends('layouts.app')
@section('pageTilte', 'HomePage')

@section('content')
<section id="category" class="feature">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $product->proName }}</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('uploads/'.$product->Picture) }}" alt="{{ $product->Picture }}" class="img-thumbnail">
            </div>
            <div class="col-md-8">
                <h4>Description:</h4>
                <p>{{ $product->Description }}</p>
                <h4>Price:</h4>
                <p>{{ $product->proPrice }}</p>
                <h4>QTY:</h4>
                <p>{{ $product->QTY }}</p>

                <form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" id="qty" min="1" max="{{ $product->QTY }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

            </div>
        </div>
    </div>
</section>
@endsection