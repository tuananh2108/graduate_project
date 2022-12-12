@extends('admin.master.master')

@section('title', 'Thêm tin tức')

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
                <h3 class="box-title">Thêm mới tin tức</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <h4 style="color:red">{{ $errors->first() }}</h4>
                    @endif
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Tiêu đề (*)</label>
                                <input name="title" type="text" class="form-control" placeholder="Nhập vào tiêu đề tin tức" required>
                            </div>
                            <div class="form-group">
                                <label>Nội dung chính (*)</label>
                                <textarea name="content" class="form-control" placeholder="Nhập vào nội dung tin tức" required></textarea>
                            </div>
                        <div class="form-group">
                                <label>Ảnh chính của tin tức</label>
                                @if ($errors->has('news_img'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('news_img') }}</strong>
                                    </div>
                                @endif
                                <input id="img" type="file" name="news_img" class="form-control hidden" onchange="changeImg(this, '#avatar')">
                                <img id="avatar" class="thumbnail" width="60%" height="200px" src="{{ asset('img/import-img.png') }}" onclick="clickChangeImg('#img')">
                            </div>
                            <div class="form-group">
                                <label>Nội dung phụ</label>
                                <textarea name="content2" class="form-control" placeholder="Nhập vào nội dung"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh phụ của tin tức</label>
                                <input id="img1" type="file" name="news_img2" class="form-control hidden" onchange="changeImg(this, '#avatar1')">
                                <img id="avatar1" class="thumbnail" width="60%" height="200px" src="{{ asset('img/import-img.png') }}" onclick="clickChangeImg('#img1')">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href=" {{ asset('admin/news') }}" class="btn btn-danger" style="margin-left: 15px; margin-bottom: 50px;">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success pull-left">Thêm mới</button>
                </div>
            </form>
            <div class="overlay hide">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
@endsection
