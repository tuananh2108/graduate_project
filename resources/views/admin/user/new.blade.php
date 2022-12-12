@extends('admin.master.master')

@section('title', 'Thiết lập tài khoản')

@section('user')
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
                <li class="active">Thiết lập tài khoản</li>
            </ol>
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Thiết lập tài khoản</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(session('message'))
                        <div class="alert bg-danger" role="alert">
                            <svg class="glyph stroked checkmark">
                                <use xlink:href="#stroked-checkmark"></use>
                            </svg>{{ session('message') }}<a href="{{ asset('admin/user/add') }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    @endif
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên (*)</label>
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Vui lòng nhập họ tên nhân viên" required>
                                @if($errors->has('name'))
                                    <i><span style="color:red">{{ $errors->first('name') }}</span></i>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Vui lòng nhập email đăng nhập" required>
                                @if($errors->has('email'))
                                    <i><span style="color:red">{{ $errors->first('email') }}</span></i>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password (*)</label>
                                <input name="password" type="password" value="{{ old('password') }}" class="form-control" placeholder="Vui lòng nhập mật khẩu đăng nhập" required>
                                @if($errors->has('password'))
                                    <i><span style="color:red">{{ $errors->first('password') }}</span></i>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="phone_number" type="text" value="{{ old('phone_number') }}" class="form-control" placeholder="Nhập số điện thoại của nhân viên">
                                @if($errors->has('phone_number'))
                                    <i><span style="color:red">{{ $errors->first('phone_number') }}</span></i>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input name="address" type="text" value="{{ old('address') }}" class="form-control" placeholder="Nhập địa chỉ của nhân viên">
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select name="role" class="form-control">
                                    <option value="superadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href=" {{ asset('admin/user') }}" class="btn btn-danger" style="margin-left: 15px; margin-bottom: 50px;">Hủy bỏ</a>
                    <button type="submit" class="btn btn-success pull-left">Thêm mới</button>
                </div>
            </form>
            <div class="overlay hide">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
@endsection
