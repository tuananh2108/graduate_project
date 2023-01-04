@extends('admin.master.master')

@section('title', 'Chi tiết đơn đặt hàng')

@section('order')
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
				<li class="active">Chi tiết đơn đặt hàng</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chi tiết đơn đặt hàng {{ $order->id }}</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-body">
                        <table class="table table-order">
                            <tr>
                                <td><strong>Mã đơn hàng: </strong>{{ $order->order_code }}</td>
                                <td><strong>Ngày đặt hàng: </strong>{{ $order->order_date }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tên khách hàng: </strong>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email: </strong>{{ $order->user->email }}</td>
                                <td><strong>Số điện thoại: </strong>{{ $order->user->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ nhận hàng: </strong>{{ $order->user->address }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Trạng thái đơn hàng: </strong>
                                    @if ($order->status == 'active')
                                        <a class="btn btn-success" role="button">Hoạt động</a>
                                    @elseif ($order->status == 'pending')
                                        <a class="btn btn-warning" role="button">Đang xử lý</a>
                                    @elseif ($order->status == 'delivering')
                                        <a class="btn btn-info" role="button">Đang giao</a>
                                    @elseif ($order->status == 'delivered')
                                        <a class="btn btn-success" role="button">Đã giao</a>
                                    @elseif ($order->status == 'cancel' || $order->status == 'inactive')
                                        <a class="btn btn-danger" role="button">Đã hủy</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong class="d-flex text-align-center">Tổng thanh toán: <h4 style="padding-left: 10px">{{ number_format($order->total, 0, '', '.') }} VNĐ</h4></strong></td>
                            </tr>
                        </table>
                        <hr>
                        <div>
                            <h3 style="font-size: 3rem;font-weight: 500;">Danh sách sản phẩm</h3>
                            <table class="table">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>No.</th>
                                        <th>Thông tin sản phẩm</th>
                                        <th>Đơn giá (VND)</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 1; ?>
                                    @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>
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
                                        </td>
                                        <td>{{ number_format($product->price, 0, '', '.') }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
