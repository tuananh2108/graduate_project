@extends('client.master')
@section('title', 'Detail news')
@section('content')
    <div class="breadcrumb-area pt-95 bg-img" style="background-image:url(img/banner/banner-2.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>{{ $news->title }}</h2>
            </div>
        </div>
    </div>
    <div class="shop-area pt-50 pb-100 blog-project">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-details-wrapper res-mrg-top">
                        <div class="single-blog-wrapper">
                            <div class="blog-img mb-30">
                                <img src="{{ asset('img/news/'.json_decode($news->img)[0]) }}" alt="">
                            </div>
                            <div class="blog-details-content">
                                <p>{{ json_decode($news->content)[0] }}</p>
                            </div>
                            <div class="dec-img-wrapper">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dec-img">
                                            @if (json_decode($news->img)[1] != "no-img.jpg")
                                                <img src="{{ asset('img/news/'.json_decode($news->img)[1]) }}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-details-content">
                                <p>{{ json_decode($news->content)[1] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
