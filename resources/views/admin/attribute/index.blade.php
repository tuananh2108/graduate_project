@extends('admin.master.master')

@section('title', 'Quản lý thuộc tính')

@section('product')
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
				<li class="active">Thuộc tính</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý thuộc tính</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					@if (session('message'))
						<div class="alert alert-success" role="alert">
							<strong>{{ session('message') }}</strong>
						</div>
					@endif
					<div class="panel-body">
						@foreach ($attributes as $attribute)
							<div class="row magrin-attr">
								<div class="col-md-2 panel-blue widget-left">
									<strong class="large">{{ $attribute->name }}</strong>
									<a class="delete-attr" href="admin/product/attribute/delete/{{ $attribute->id }}" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i class="fas fa-times"></i></a>
									<a class="edit-attr" href="admin/product/attribute/edit/{{ $attribute->id }}"><i class="fas fa-edit"></i></a>
								</div>
								<div class="col-md-10 widget-right boxattr">
									@foreach ($attribute->values as $value)
										<div class="text-attr">{{ $value->value }}
											<a href="admin/product/value/edit/{{ $value->id }}" class="edit-value"><i class="fas fa-edit"></i></a>
											<a href="admin/product/value/delete/{{ $value->id }}" class="del-value" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i class="fas fa-times"></i></a>
										</div>
									@endforeach
								</div>		
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
