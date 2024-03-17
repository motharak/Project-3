@extends('layouts.app')
@section('pageTilte', 'HomePage')

@section('content')
    {{-- hero section --}}
    			<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<!--/.carousel-indicator -->
				 <ol class="carousel-indicators">
					<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
					<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
					<li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
				</ol><!-- /ol-->
				<!--/.carousel-indicator -->

				<!--/.carousel-inner -->
				<div class="carousel-inner" role="listbox">
					<!-- .hero -->
					<div class="item active">
						<div class="single-slide-item slide1">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>Watch</h4>
													<h2>Chronograph Vector</h2>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. 
													</p>
													<div class="packages-price">
														<p>
															$ 399.00
															<del>$ 499.00</del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="assets/images/1 (2).jpg" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->

					</div><!-- /.hero .active-->

					<div class="item">
						<div class="single-slide-item slide2">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>great design collection</h4>
													<h2>mapple wood accent</h2>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. 
													</p>
													<div class="packages-price">
														<p>
															$ 199.00
															<del>$ 299.00</del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="assets/images/1 (1).png" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->

					<div class="item">
						<div class="single-slide-item slide3">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>great design collection</h4>
													<h2>valvet accent arm</h2>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. 
													</p>
													<div class="packages-price">
														<p>
															$ 25.00
															<del>$ 39.00</del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="assets/images/1 (1).jpg" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
						
					</div><!-- /.item .active-->
				</div><!-- /.carousel-inner-->

			</div><!--/#header-carousel-->
        {{-- End Hero section --}}

        {{-- section 1 --}}
        
<!--new-arrivals start -->
<section id="new-arrivals" class="new-arrivals">
    <div class="container">
        <div class="section-header">
            <h2>new arrivals</h2>
        </div><!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="row">
                @foreach ($products as $index => $product)
                    @if($index < 8)
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
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div><!--/.container-->
</section><!--/.new-arrivals-->

<!--new-arrivals end -->
<section id="new-arrivals" class="new-arrivals">
	<div class="container">
		<div class="section-header">
			<h2>Men Watch</h2>
		</div><!--/.section-header-->
		<div class="new-arrivals-content">
			<div class="row">
			@if ($categoryObj->isEmpty())
				<p style="text-align:center">No products available in this category.</p>
			@else
			@foreach ($categoryObj as $item)
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
									<a href="#">add <span>to </span> cart</a>
								</p>
								<p class="arrival-review pull-right">
									<span class="lnr lnr-heart"></span>
									<span class="lnr lnr-frame-expand"></span>
								</p>
							</div>
						</div>
						<h4><a href="#">{{$item->proName}}</a></h4>
						<p class="arrival-product-price">${{$item->proPrice}}</p>
					</div>
				</div>
			@endforeach
			@endif
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.new-arrivals-->
<!--sofa-collection start -->
<!--sofa-collection end -->

<section id="new-arrivals" class="new-arrivals">
	<div class="container">
		<div class="section-header">
			<h2>Women Watch</h2>
		</div><!--/.section-header-->
		<div class="new-arrivals-content">
			<div class="row">
			@if ($products->isEmpty())
				<p style="text-align:center">No products available in this category.</p>
			@else
			@foreach ($categoryObj1 as $product1)
				<div class="col-md-3 col-sm-4">
					<div class="single-new-arrival">
						<div class="single-new-arrival-bg">
							<img src="{{ asset('uploads/' . $product1->Picture) }}" alt="new-arrivals images">
							<div class="single-new-arrival-bg-overlay"></div>
							<div class="sale bg-1">
								<p>sale</p>
							</div>
							<div class="new-arrival-cart">
								<p>
									<span class="lnr lnr-cart"></span>
									<a href="#">add <span>to </span> cart</a>
								</p>
								<p class="arrival-review pull-right">
									<span class="lnr lnr-heart"></span>
									<span class="lnr lnr-frame-expand"></span>
								</p>
							</div>
						</div>
						<h4><a href="#">{{$product1->proName}}</a></h4>
						<p class="arrival-product-price">${{$product1->proPrice}}</p>
					</div>
				</div>
			@endforeach
			@endif
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.new-arrivals-->


<!--feature start -->

<!--feature end -->

<!--blog start -->

<!--blog end -->

@endsection