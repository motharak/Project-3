@extends('layouts.app')
@section('pageTitle','Products')

@section('content')

<section id="category" class="feature">
	<div class="container">
		<div class="section-header">
			<h2>Category</h2>
		</div>
		<div class="feature-content">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($categories as $item)
				<div class="col-sm-3">
                <div class="card shadow-sm">
					<div class="single-feature">
                    <img src="{{ asset('uploads/' . $item->Picture)}}" width="400"alt="feature image">
                    <div class="single-feature-txt text-center">
                        <h3><a href="/product/{{$item->categoryName}}">{{$item->categoryName}}</a></h3>
                    </div>
                    
					</div>
                </div>
				</div>@endforeach
			</div>
		</div>
	</div>

</section>
@endsection