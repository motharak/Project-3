@extends('layouts.app')
@section('pageTilte', 'Cart')

@section('content')
<section id="category" class="feature">
	<div class="container">
     <h1>Your Cart</h1>

    @if (empty($cartDetails))
        <p>Your cart is empty</p>
    @else
        <ul>
            @foreach ($cartDetails as $product)
                <li>
                    <h4>{{ $product['name'] }}</h4>
                    <img src="{{ $product['picture'] }}" alt="{{ $product['name'] }}" style="max-width: 100px;">
                    <p>Price: ${{ $product['price'] }}</p>
                    <!-- Add more details as needed -->

                    <!-- Add Remove button with a form to submit a DELETE request -->
                    <form action="{{ route('remove-from-cart', ['productId' => $product['id']]) }}" method="post" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
    <hr/>
        <p>Total: ${{ number_format($totalPrice, 2) }}</p>

        <button onclick="window.location.href='{{ url('/view-cart') }}'">View Cart</button>
    @endif
    </div>

</section>
@endsection