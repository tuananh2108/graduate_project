@extends('client.master')
@section('title', 'Detail construction')
@section('content')
    <div class="breadcrumb-area pt-95 bg-img" style="background-image:url(assets/img/banner/banner-2.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>{{ $construction->name }}</h2>
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
                                <img src="{{ asset('img/construction/'.json_decode($construction->img)[0]) }}" alt="">
                            </div>
                            <div class="blog-details-content">
                            
                            </div>
                            <p> {{ json_decode($construction->detail)[0] }}</p>
                            <div class="dec-img-wrapper">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dec-img">
                                            <img src="{{ asset('img/construction/'.json_decode($construction->img)[1]) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p> {{ json_decode($construction->detail)[1] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
