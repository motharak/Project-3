@extends('layouts.app')
@section('pageTitle','Products')

@section('content')
    <section id="new-arrivals" class="new-arrivals">
    <br>
	<div class="container">
		<div class="section-header">
			<h2>All Product</h2>
		</div><!--/.section-header-->
		<div class="new-arrivals-content">
			<div class="row">
			@foreach ($products as $product)
				<div class="col-md-3 col-sm-4">
					<div class="single-new-arrival">
						<div class="single-new-arrival-bg">
							<img src="{{ asset('uploads/' . $product->Picture) }}" alt="new-arrivals images">
							<div class="single-new-arrival-bg-overlay"></div>
							<div class="sale bg-1">
								<p>sale</p>
							</div>
							<div class="new-arrival-cart">
								<p>
									<span class="lnr lnr-cart"></span>
									<a href="{{ url('/add-to-cart/') }}/{{$product->proId}}">add <span>to </span> cart</a>
								</p>
								<p class="arrival-review pull-right">
									<span class="lnr lnr-heart"></span>
									<span class="lnr lnr-frame-expand"></span>
								</p>
							</div>
						</div>
						<h4><a href="/product/item/{{$product->proId}}">{{$product->proName}}</a></h4>
						<p class="arrival-product-price">${{$product->proPrice}}</p>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.new-arrivals-->
@endsection