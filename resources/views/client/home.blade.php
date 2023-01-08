@extends('client.master')
@section('title', 'Store')
@section('content')
	<div class="slider-area">
		<div class="slider-active owl-dot-style owl-carousel">
			@foreach($news as $item)
				<div class="single-slider pt-100 pb-100 gray-bg">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12 col-sm-7">
								<div class="slider-content slider-animated-1 pt-114">
									<h1 class="animated">{{ $item->title }}</h1>
									<div class="slider-btn">
										<a class="animated" href="{{ route('news.detail', $item->id) }}">Đọc ngay</a>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 col-sm-5">
								<div class="slider-single-img slider-animated-1">
									<img class="animated" src="{{ asset('img/news/'.json_decode($item->img)[0]) }}" alt="{{ $item->title }}">
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="food-category food-category-col pt-100 pb-60">
		<div class="container">
			<div class="row">
				@if(isset($category_800s))
					<div class="col-lg-4 col-md-4">
						<div class="single-food-category cate-padding-1 text-center mb-30">
							<a href="{{ route('product.by.category', $category_800s->id) }}">
								<div class="single-food-hover-2">
									<img src="{{ asset('client/images/800.jpg') }}" alt="">
								</div>
								<div class="single-food-content">
									<h3>Gạch lát nền 800x800</h3>
								</div>
							</a>
						</div>
					</div>
				@endif
				@if(isset($category_600s))
					<div class="col-lg-4 col-md-4">
						<div class="single-food-category cate-padding-1 text-center mb-30">
							<a href="{{ route('product.by.category', $category_600s->id) }}">
								<div class="single-food-hover-2">
									<img src="{{ asset('client/images/600.jpg') }}" alt="">
								</div>
								<div class="single-food-content">
									<h3>Gạch lát nền 600x600</h3>
								</div>
							</a>
						</div>
					</div>
				@endif
				@if(isset($category_500s))
					<div class="col-lg-4 col-md-4">
						<div class="single-food-category cate-padding-1 text-center mb-30">
							<a href="{{ route('product.by.category', $category_500s->id) }}">
								<div class="single-food-hover-2">
									<img src="{{ asset('client/images/tintuc3.jpg') }}" alt="">
								</div>
								<div class="single-food-content">
									<h3>Gạch lát nền 500x500</h3>
								</div>
							</a>
						</div>
					</div>
				@endif
				@if(isset($category_go_thanh))
					<div class="col-lg-4 col-md-4">
						<div class="single-food-category cate-padding-1 text-center mb-30">
							<a href="{{ route('product.by.category', $category_go_thanh->id) }}">
								<div class="single-food-hover-2">
									<img src="{{ asset('client/images/gothanh.jpg') }}" alt="">
								</div>
								<div class="single-food-content">
									<h3>Gạch gỗ thanh 180x800</h3>
								</div>
							</a>
						</div>
					</div>
				@endif
				@if(isset($category_op_400s))
					<div class="col-lg-4 col-md-4">
						<div class="single-food-category cate-padding-1 text-center mb-30">
							<a href="{{ route('product.by.category', $category_op_400s->id) }}">
								<div class="single-food-hover-2">
									<img src="{{ asset('client/images/400800.jpg') }}" alt="">
								</div>
								<div class="single-food-content">
									<h3>Gạch ốp 400x800</h3>
								</div>
							</a>
						</div>
					</div>
				@endif
				@if(isset($category_op_300s))
					<div class="col-lg-4 col-md-4">
						<div class="single-food-category cate-padding-1 text-center mb-30">
							<a href="{{ route('product.by.category', $category_op_300s->id) }}">
								<div class="single-food-hover-2">
									<img src="{{ asset('client/images/300600.jpg') }}" alt="">
								</div>
								<div class="single-food-content">
									<h3>Gạch ốp 300x600</h3>
								</div>
							</a>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
	<div class="product-area pt-45 pb-70 gray-bg">
		<div class="container">
			<div class="section-title text-center mb-55">
				<h3>SẢN PHẨM ĐƯỢC QUAN TÂM NHIỀU NHẤT</h3>
			</div>
			<div class="row">
				@foreach ($products as $product)
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
					<div class="product-wrapper mb-10">
						<div class="product-img">
							<a href="{{ asset('product/detail/'.$product->id) }}">
								<img class="zoom-product" src="{{ asset('img/product/'.json_decode($product->img)[0]) }}"  alt="zoom">
							</a>
						</div>
						<div class="product-content">
							<h4><a href="{{ asset('product/detail/'.$product->id) }}">{{ $product->name }}</a></h4>
							<div class="product-price">
								<span class="new">{{number_format( $product->price, 0, '', ',') }} đ</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
