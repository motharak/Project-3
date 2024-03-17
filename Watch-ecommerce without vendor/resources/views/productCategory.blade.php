@extends('layouts.app')

@section('content')
    <section id="new-arrivals" class="new-arrivals">
    <br>
	<div class="container">
		<div class="section-header">
			
            @if ($productsByCategory->isNotEmpty())
                <h2>{{ $productsByCategory->first()->categoryName }}</h2>
            @else
                <h2>No products found in this category.</h2>
            @endif
		</div><!--/.section-header-->
		<div class="new-arrivals-content">
			<div class="row">
            @forelse ($productsByCategory as $item)
                <div class="col-md-3 col-sm-4">
                    <div class="single-new-arrival">
                        <div class="single-new-arrival-bg">
                            <img src="{{ asset('uploads/' . $item->Picture) }}" alt="new-arrivals images">
                            <div class="single-new-arrival-bg-overlay"></div>
                            <div class="sale bg-1">
                                <p>sale</p>
                            </div>
                            <div class="new-arrival-cart">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <a href="{{ url('/add-to-cart/') }}/{{$item->proId}}">add <span>to </span> cart</a>
                                </p>
                                <p class="arrival-review pull-right">
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-frame-expand"></span>
                                </p>
                            </div>
                        </div>
                        <h4><a href="/product/item/{{$item->proId}}">{{$item->proName}}</a></h4>
                        <p class="arrival-product-price">${{$item->proPrice}}</p>
                    </div>
                </div>
            @empty
                <p>No products found in this category.</p>
            @endforelse
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.new-arrivals-->
@endsection
