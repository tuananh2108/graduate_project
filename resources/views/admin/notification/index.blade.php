@extends('admin.master.master')

@section('title', 'Bảng tin tức')

@section('notification')
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

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bảng tin tức</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if (session('message'))
									<div class="alert bg-success" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{ session('message') }}<a href="{{ asset('admin/notification') }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								<a href="{{ asset('admin/notification/add') }}" class="btn btn-success">Thêm tin tức</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
		                                <tr bgcolor="#33b8ff">
		                                    <th class="text-center">#</th>
		                                    <th class="text-center">Thông tin dự án</th>
		                                    <th class="text-center">Tiêu đề</th>
		                                    <th class="text-center">Nội dung</th>
		                                    <th>Thao tác</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                @foreach ($notifications as $notification)
		                                <tr>
		                                    <td class="text-center">{{ $notification->id }}</td>
		                                    <td class="text-center" style="width:200px;"><img src="{{ asset('/common/img/notification/'.json_decode($notification->img)[0]) }}" alt="Chưa có ảnh" width="200px" class="thumbnail"></td>
		                                    <td class="text-center" style="width:200px;">{{ $notification->title }}</td>
		                                    <td class="text-center">
												<div style="width:200px; height: auto; word-wrap:break-word;">
													{{ json_decode($notification->content)[0] }}
												</div>
											</td>
		                                    <td>
		                                        <div class="input-group-btn dropdown">
		                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														Thao tác
		                                                <span class="fa fa-caret-down"></span>
													</button>
		                                            <ul class="dropdown-menu">
		                                                <li>
		                                                    <a href="{{ asset('admin/notification/edit/'.$notification->id) }}" class="btn btn-default form-control"><i class="fa fa-pencil"></i> Cập nhật</a>
		                                                </li>
		                                                <li>
															<a href="{{ asset('admin/notification/delete/'.$notification->id) }}" class="btn btn-default form-control" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i class="fa fa-trash"></i> Xoá</a>
		                                                </li>
		                                            </ul>
		                                        </div>
		                                    </td>
		                                </tr>
		                                @endforeach
		                            </tbody>
								</table>
								<div align='right'>
									{!! $notifications->links() !!}
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
