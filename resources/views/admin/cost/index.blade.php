@extends('admin.master.master')

@section('title', 'Bảng báo giá')

@section('cost')
  class="active"
@endsection

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <svg class="glyph stroked home">
              <use xlink:href="#stroked-home"></use>
            </svg>
          </a>
        </li>
        <li class="active">Bảng báo giá</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Bảng báo giá</h1>
      </div>
    </div>
    @if (session('message'))
      <div class="alert bg-success" role="alert">
        <svg class="glyph stroked checkmark">
          <use xlink:href="#stroked-checkmark"></use>
        </svg>{{ session('message') }}<a href="{{ asset('admin/cost') }}" class="pull-right"><span
            class="glyphicon glyphicon-remove"></span></a>
      </div>
    @endif

    <div class="row">
      <div class="col-lg-12">
        @if(count($costs) < 1)
          <a href="{{ asset('admin/cost/add') }}" class="btn btn-primary">Thêm mới</a>
        @endif
      </div>
      @foreach ($costs as $cost)
        <div class="shop-area pt-50 pb-100 blog-project">
          <div class="container">
            <div class="row flex-row-reverse">
              <div class="col-lg-12 col-md-12">
                <div class="blog-details-wrapper res-mrg-top">
                  <div class="single-blog-wrapper">
                    <div class="blog-img mb-30">
                      <img src="{{ asset('img/cost/' . json_decode($cost->img)[0]) }}">
                    </div>
                    <div class="blog-details-content">
                      <p> {{ json_decode($cost->detail)[0] }}</p>
                    </div>
                    <div class="dec-img-wrapper">
                      <div class="row justify-content-md-center">
                        <div class="col-md-6 col-sm-6">
                          <div class="dec-img">
                            <img src="{{ asset('img/cost/' . json_decode($cost->img)[1]) }}" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <p> {{ json_decode($cost->detail)[1] }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <a href="{{ asset('admin/cost/edit/' . $cost->id) }}" class="btn btn-primary form-control"><i
              class="fa fa-pencil"></i> Cập nhật</a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
