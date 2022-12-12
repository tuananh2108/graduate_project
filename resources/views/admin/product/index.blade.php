@extends('admin.master.master')

@section('title', 'Danh sách sản phẩm')

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
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
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
										</svg>{{ session('message') }}<a href="{{ asset('admin/product') }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								<a href="{{ asset('admin/product/add') }}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>@sortablelink('id', 'ID', [], ['class' => 'sortable-link'])</th>
											<th>@sortablelink('name', 'Thông tin sản phẩm', [], ['class' => 'sortable-link'])</th>
											<th>@sortablelink('price', 'Đơn giá', [], ['class' => 'sortable-link'])</th>
											<th>@sortablelink('status', 'Tình trạng', [], ['class' => 'sortable-link'])</th>
											<th>@sortablelink('category_id', 'Danh mục', [], ['class' => 'sortable-link'])</th>
											<th width='16%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@php $i=1; @endphp
										@foreach ($products as $product)
										<tr>
											<td>{{$product->id}}</td>
											<td>
												<div class="row">
													<div class="col-md-3">
														<img src="{{ asset('img/product/'.json_decode($product->img)[0]) }}" alt="None" width="100px" class="thumbnail">
													</div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm: {{ $product->product_code }}</strong></p>
														<p>Tên sản phẩm: {{ $product->name }}</p>
														<p>Danh mục: <?php $category = App\Models\Category::find($product->category->parent); echo empty($category) ? $product->category->name : $category->name; ?></p>
														@if (!empty(attribute_value($product)))
															@foreach (attribute_value($product) as $key=>$value)
																<p>{{$key}}:
																	@php $i=1; @endphp
																	@foreach ($value as $item)
																		@if ($i == count($value))
																			{{ $item }}
																		@else
																			{{ $item }},
																		@endif

																		@php $i++; @endphp
																	@endforeach
																</p>
															@endforeach
														@endif
													</div>
												</div>
											</td>
											<td>{{ number_format($product->price, 0, '', '.') }} VND</td>
											<td>
												@if ($product->status == 'available')
													<a class="btn btn-success" href="#" role="button">Còn hàng</a>
												@else
													<a class="btn btn-danger" href="#" role="button">Hết Hàng</a>
												@endif
											</td>
											<td><?php $category = App\Models\Category::find($product->category->parent); echo empty($category) ? $product->category->name : $category->name; ?></td>
											<td>
												<a href="admin/product/edit/{{ $product->id }}" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i> Sửa</a>
												<a href="admin/product/delete/{{ $product->id }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@php $i++; @endphp
										@endforeach
									</tbody>
								</table>

								<div align='right'>
									{!!$products->links() !!}
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
