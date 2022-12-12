@extends('admin.master.master')

@section('title', 'Thêm sản phẩm')

@section('news')
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
                <li class="active">Bảng tin tức</li>
            </ol>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Cập nhật tin tức</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <h4 style="color:red">{{$errors->first()}}</h4>
                    @endif
                </div>
            </div>
            <form method="post" class="validate" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tiêu đề (*)</label>
                                <input type="text" name="title" value="{{ $news->title }}" class="form-control" placeholder="Nhập vào tiêu đề tin tức" required>
                            </div>
                            <div class="form-group">
                                <label>Nội dung chính (*)</label>
                                <textarea name="content" class="form-control" placeholder="Nhập vào nội dung tin tức" required>{{ json_decode($news->content)[0] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh chính của tin tức</label>
                                <input id="img" type="file" name="news_img" class="form-control hidden" onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" width="60%" height="200px" src="{{ asset('img/news/'.json_decode($news->img)[0]) }}">
                            </div>
                            <div class="form-group">
                                <label>Nội dung phụ(*)</label>
                                <textarea name="content2" class="form-control" placeholder="Nhập vào nội dung">{{ json_decode($news->content)[1] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh phụ của tin tức</label>
                                <input id="img1" type="file" name="news_img2" class="form-control hidden" onchange="changeImg1(this)">
                                <img id="avatar1" class="thumbnail" width="60%" height="200px" src="{{ asset('img/news/'.json_decode($news->img)[1]) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="margin-bottom: 50px;">
                    <a href="{{ asset('admin/news') }}" class="btn btn-danger" style="margin-left: 15px;">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success pull-left">Cập nhật</button>
                </div>
            </form>
            <div class="overlay hide">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
@endsection
