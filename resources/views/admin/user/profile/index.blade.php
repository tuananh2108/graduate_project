@extends('admin.master.master')

@section('title', 'Danh sách tài khoản')

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
				<li class="active">Thông tin cá nhân</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thông tin cá nhân</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					@if (session('message'))
						<div class="alert bg-success" role="alert">
							<svg class="glyph stroked checkmark">
								<use xlink:href="#stroked-checkmark"></use>
							</svg>{{ session('message') }}<a href="{{ asset('admin/user/profile/'.$user->id) }}" class="pull-right"><span
									class="glyphicon glyphicon-remove"></span></a>
						</div>
					@endif
					<div class="panel-body">
						<form method="post">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Họ tên (*)</label>
										<input name="name" type="text" value="{{ $user->name }}" class="form-control" placeholder="Vui lòng nhập họ tên nhân viên" required>
										@if ($errors->has('name'))
											<i><span style="color:red">{{ $errors->first('name') }}</span></i>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input name="email" type="email" value="{{ $user->email }}" class="form-control" placeholder="Vui lòng nhập email đăng nhập" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Số điện thoại</label>
										<input name="phone_number" type="text" value="{{ $user->phone_number }}" class="form-control"
											placeholder="Nhập số điện thoại của nhân viên">
										@if ($errors->has('phone_number'))
											<i><span style="color:red">{{ $errors->first('phone_number') }}</span></i>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Địa chỉ</label>
										<input name="address" type="text" value="{{ $user->address }}" class="form-control"
											placeholder="Nhập địa chỉ của nhân viên">
									</div>
								</div>
								<div class="col-md-12">
									<p>
										<strong>Vai trò:</strong>
										<span class="btn btn-{{ $user->role == 'admin' ? 'warning' : 'danger' }}" style="text-transform: uppercase;">{{ $user->role }}</span>
									</p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div>
								<div align='right'>
									<a href="{{ route('edit-password', $user->id) }}" class="btn btn-warning">Đổi mật khẩu</a>
									<button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
