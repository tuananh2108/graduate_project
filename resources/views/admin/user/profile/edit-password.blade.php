@extends('admin.master.master')

@section('title', 'Thay đổi mật khẩu')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a>
          <svg class="glyph stroked home">
            <use xlink:href="#stroked-home"></use>
          </svg>
        </a>
      </li>
      <li class="active">Thay đổi mật khẩu</li>
    </ol>
  </div>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Thay đổi mật khẩu</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        @if (session('message'))
        <div class="alert bg-danger" role="alert">
          <svg class="glyph stroked checkmark">
            <use xlink:href="#stroked-checkmark"></use>
          </svg>{{ session('message') }}<a href="{{ route('edit-password', $user->id) }}" class="pull-right"><span
              class="glyphicon glyphicon-remove"></span></a>
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
              <label>Mật khẩu hiện tại (*)</label>
              <input name="current_password" type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu hiện tại" required>
              @if(session('current_password'))
                <i><span style="color:red">{{ session('current_password') }}</span></i>
              @endif
            </div>
            <div class="form-group">
              <label>Mật khẩu mới (*)</label>
              <input name="password" type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu mới" required>
              @if ($errors->has('password'))
                <i><span style="color:red">{{ $errors->first('password') }}</span></i>
              @endif
            </div>
            <div class="form-group">
              <label>Xác nhận mật khẩu (*)</label>
              <input name="password_confirmation" type="password" class="form-control" placeholder="Vui lòng nhập lại mật khẩu mới" required>
              @if ($errors->has('password_confirmation'))
                <i><span style="color:red">{{ $errors->first('password_confirmation') }}</span></i>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <a href=" {{ asset('admin/user/profile/'.$user->id) }}" class="btn btn-danger" style="margin-left: 15px; margin-bottom: 50px;">Hủy bỏ</a>
        <button type="submit" class="btn btn-success pull-left">Cập nhật</button>
      </div>
    </form>
    <div class="overlay hide">
      <i class="fa fa-refresh fa-spin"></i>
    </div>
  </div>
</div>
@endsection
