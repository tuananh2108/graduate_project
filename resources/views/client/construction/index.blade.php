@extends('client.master')
@section('title', 'Construction')
@section('content')
    <div class="pt-95">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>DANH SÁCH CÁC CÔNG TRÌNH ĐÃ VÀ ĐANG THI CÔNG</h2>
            </div>
        </div>
    </div>
    <div class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach ($constructions as $construction)
                            <div class="col-lg-4 col-md-4">
                                <div class="blog-wrapper mb-30 gray-bg">
                                    <div class="blog-img hover-effect">
                                        <a href="{{ route('construction.detail', $construction->id) }}">
                                            <img alt="" src="{{asset('img/construction/'.json_decode($construction->img)[0])}}">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="{{ route('construction.detail', $construction->id) }}">{{ $construction->name }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination-style text-center mt-10">
                        {{ $constructions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection