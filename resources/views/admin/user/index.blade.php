@extends('admin.master.master')

@section('title', 'Danh sách tài khoản')

@section('account')
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
				<li class="active">Danh sách tài khoản</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách tài khoản</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('message'))
									<div class="alert bg-success" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{ session('message') }}<a href="{{ asset('admin/user') }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								<a href="{{ asset('admin/user/add') }}" class="btn btn-primary">Thêm tài khoản</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>@sortablelink('id', 'ID', [], ['class' => 'sortable-link'])</th>
											<th>@sortablelink('name', 'Họ tên', [], ['class' => 'sortable-link'])</th>
											<th>@sortablelink('email', 'Email đăng nhập', [], ['class' => 'sortable-link'])</th>
											<th>Vai trò</th>
											<th width='16%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($users as $user)
										<tr>
											<td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td><a class="btn {{ $user->role == $user::SUPERADMIN ? 'btn-danger' : 'btn-warning' }}"><span style="text-transform: uppercase;">{{ $user->role }}</span></a></td>
                                            <td>
												<a href="admin/user/edit/{{ $user->id }}" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i> Sửa</a>
												<a href="admin/user/delete/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>

								<div align='right'>
									{!! $users->links() !!}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
