@extends('client.master')
@section('title', 'Cost')
@section('content')
    <div class="shop-area pt-50 pb-100 blog-project">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-details-wrapper res-mrg-top">
                        <div class="single-blog-wrapper">
                            <div class="title-label">
                                <div class="breadcrumb-content text-center">
                                    <h2>Bảng báo giá sửa chữa, cải tạo nhà CNC 2020 !!!</h2>
                                </div>
                            </div>
                            @if(isset($cost))
                            <div class="dec-img-wrapper">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dec-img">
                                            <img src="{{ asset('img/cost/'.json_decode($cost->img)[0]) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dec-img dec-mrg res-mrg-top-2">
                                            <img src="{{ asset('img/cost/'.json_decode($cost->img)[1]) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-details-content">
                                <p>{{ json_decode($cost->details)[0] }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
