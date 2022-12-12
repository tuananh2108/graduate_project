@extends('client.master')
@section('title', 'detail')
@section('content')
    <div class="shop-area pt-50 pb-100 blog-project">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-details-wrapper res-mrg-top">
                        <div class="single-blog-wrapper">
                            <div class="blog-img mb-30">
                                <img src="{{ asset('img/project/'.json_decode($project->img)[0]) }}" alt="">
                            </div>
                            <div class="blog-details-content">
                                <h2>{{ $project->name }}</h2>
                            </div>
                            <p>{{ json_decode($project->detail)[0] }}</p>
                            <div class="dec-img-wrapper">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dec-img">
                                            @if (json_decode($project->img)[1] != 'no-img.jpg')
                                                <img src="{{ asset('img/project/'.json_decode($project->img)[1]) }}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{{ json_decode($project->detail)[1] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
