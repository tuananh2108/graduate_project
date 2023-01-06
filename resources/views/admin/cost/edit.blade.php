@extends('admin.master.master')

@section('title', 'Chỉnh sửa bảng giá cải tạo và sữa chửa nhà')

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
                <li class="active">Bảng giá cải tạo và sữa chửa nhà</li>
            </ol>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Chỉnh sửa bảng giá </h3>
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
                                <label>Nội dung (*)</label>
                                <textarea name="detail" class="form-control" placeholder="Nhập vào nội dung" required>{{ json_decode($cost->detail)[0] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh báo giá chính (*)</label>
                                <input id="img" type="file" name="cost_img" class="form-control hidden" onchange="changeImg(this, '#avatar')">
                                <img id="avatar" class="thumbnail" width="100%" height="300px" src="{{ asset('img/cost/'.json_decode($cost->img)[0]) }}" onclick="clickChangeImg('#img')">
                            </div>
                            <div class="form-group">
                                <label>Nội dung phụ</label>
                                <textarea name="detail2" class="form-control" placeholder="Nhập vào nội dung">{{ json_decode($cost->detail)[1] }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Ảnh báo giá phụ</label>
                                    <input id="img2" type="file" name="cost_img2" class="form-control hidden" onchange="changeImg(this, '#avatar2')">
                                    <img id="avatar2" class="thumbnail" width="100%" height="350px" src="{{ asset('img/cost/'.json_decode($cost->img)[1]) }}" onclick="clickChangeImg('#img2')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="margin-bottom: 50px;">
                    <a href=" {{ asset('admin/cost') }}" class="btn btn-danger" style="margin-left: 15px;">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success pull-left">Cập nhật</button>
                </div>
            </form>
            <div class="overlay hide">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
@endsection
