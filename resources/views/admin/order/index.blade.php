@extends('admin.master.master')

@section('title', 'Danh sách đơn đặt hàng')

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
        <li class="active">Danh sách đơn đặt hàng</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách đơn đặt hàng</h1>
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
                    </svg>{{ session('message') }}<a href="{{ asset('admin/order') }}" class="pull-right"><span
                        class="glyphicon glyphicon-remove"></span></a>
                  </div>
                @endif
                <a href="{{ asset('admin/order/add') }}" class="btn btn-primary">Tạo hóa đơn</a>
                <table class="table table-bordered" style="margin-top:20px;">
                  <thead>
                    <tr class="bg-primary">
                      <th rowspan="2">@sortablelink('id', 'ID', [], ['class' => 'sortable-link'])</th>
                      <th colspan="3" class="text-center">Thông tin sản phẩm</th>
                      <th rowspan="2">@sortablelink('total', 'Tổng thanh toán', [], ['class' => 'sortable-link'])</th>
                      <th rowspan="2">@sortablelink('user.name', 'Khách hàng', [], ['class' => 'sortable-link'])</th>
                      <th rowspan="2">@sortablelink('status', 'Trạng thái', [], ['class' => 'sortable-link'])</th>
                      <th rowspan="2">Tùy chọn</th>
                    </tr>
                    <tr class="bg-primary">
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                      <?php $products = $order->products; ?>
                      @if (count($products) > 0)
                        <tr>
                          <td rowspan="{{ count($products) }}">{{ $order->id }}</td>
                          <td>{{ $products->first()['name'] }}</td>
                          <td>{{ number_format($products->first()['price'], 0, '', '.') }} VND</td>
                          <td>{{ $products->first()['pivot']['quantity'] }}</td>
                          <td rowspan="{{ count($products) }}">{{ number_format($order->total, 0, '', '.') }} VND</td>
                          <td rowspan="{{ count($products) }}">{{ $order->user->name }}</td>
                          <td rowspan="{{ count($products) }}">
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
                          <td rowspan="{{ count($products) }}">
                            <div class="input-group-btn dropdown">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Thao tác
                                <span class="fa fa-caret-down"></span>
                              </button>
                              <ul class="dropdown-menu" style="left:-56px">
                                <li>
                                  <a href="admin/order/show/{{ $order->id }}" class="btn btn-default form-control"><i
                                      class="fas fa-eye"></i> Chi tiết</a>
                                </li>
                                <li>
                                  <a href="admin/order/edit/{{ $order->id }}" class="btn btn-default form-control"><i
                                      class="fas fa-edit"></i> Sửa</a>
                                </li>
                                <li>
                                  <a href="admin/order/delete/{{ $order->id }}" class="btn btn-default form-control"
                                    onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i
                                      class="fa fa-trash"></i> Xoá</a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        @for ($key = 1; $key < count($products); $key++)
                          <tr>
                            <td>{{ $products[$key]->name }}</td>
                            <td>{{ number_format($products[$key]->price, 0, '', '.') }} VND</td>
                            <td>{{ $products[$key]->pivot->quantity }}</td>
                          </tr>
                        @endfor
                      @endif
                    @endforeach
                  </tbody>
                </table>

                <div align='right'>
                  {!! $orders->links() !!}
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
