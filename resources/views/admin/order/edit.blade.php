@extends('admin.master.master')

@section('title', 'Tạo hóa đơn')

@section('order')
  class="active"
@endsection

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="margin-top:20px">
      <div class="col-xs-6 col-md-12 col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading d-flex" style="justify-content: space-between;"><span>Cập nhật hóa đơn: {{ $order->order_code }}</span><span>Ngày tạo: {{ $order->order_date->format('d/m/Y H:i:s') }}</span></div>
          <div class="panel-body">
            <form method="post" id="form-order">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Tên khách hàng (*)</label>
                    <input type="text" name="name"  value="{{ $order->user->name }}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Email (*)</label>
                    <input type="email" name="email"  value="{{ $order->user->email }}" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Số diện thoại (*)</label>
                    <input type="text" name="phone_number" value="{{ $order->user->phone_number }}" max="10" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Địa chỉ nhận hàng (*)</label>
                    <input type="text" name="address" value="{{ $order->user->address }}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Trạng thái (*)</label>
                    <?php $ORDER_STATUS = ['active' => 'Hoạt động', 'pending' => 'Chờ xử lý', 'delivering' => 'Đang giao', 'delivered' => 'Đã giao', 'cancel' => 'Đã hủy'] ?>
                    <select name="status" class="form-control">
                      @foreach ($ORDER_STATUS as $key => $status)
                        <option value="{{ $key }}">{{ $status }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <strong class="d-flex text-align-center">Tổng thanh toán: <h4 style="padding-left: 10px"><span id="order-total">0</span> VNĐ</h4></strong>
                  <input type="hidden" name="order_total" id="total">
                </div>
              </div>
              <?php
                $cart = [];
                foreach($order->products as $product)
                {
                  $item = ['product' => $product, 'quantity' => $product->pivot->quantity];
                  array_push($cart, $item);
                }
              ?>
              <input type="hidden" id="cart" value="{{ json_encode($cart) }}">
              <input type="hidden" name="list_product_order" id="list_product_order">
              <div style="margin-top: 20px; text-align:right;">
                <input type="submit" value="Cập nhật" id="btn-order" class="btn btn-primary">
              </div>
            </form>
            <hr style="border-color: #999">
            <div>
              <div class="order_product-header">
                <h3 style="font-size: 3rem;font-weight: 500;">Danh sách sản phẩm</h3>
                <div class="form-search">
                  <form role="search" class="d-flex">
                    <input type="search" name="q" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                  </form>
                </div>
              </div>
              <table class="table" id="table-product-order">
                <thead>
                  <tr class="bg-primary">
                    <th>Chọn</th>
                    <th>@sortablelink('name', 'Thông tin sản phẩm', [], ['class' => 'sortable-link'])</th>
                    <th>@sortablelink('price', 'Đơn giá', [], ['class' => 'sortable-link'])</th>
                    <th>Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td><input type="checkbox" name="product" class="select-product" data-product="{{ $product }}"></td>
                      <td>
                        <p><strong>Mã sản phẩm: {{ $product->product_code }}</strong></p>
                        <p>Tên sản phẩm: {{ $product->name }}</p>
                        <p>Danh mục: <?php $category = App\Models\Category::find($product->category->parent);
                        echo empty($category) ? $product->category->name : $category->name; ?></p>
                        @if (!empty(attribute_value($product)))
                          @foreach (attribute_value($product) as $key => $value)
                            <p>{{ $key }}:
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
                      <td><input type="number" name="quantity" value="1" min="1" class="quantity-product" data-product="{{ $product }}"></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div align='right'>
								{!! $products->appends(\Request::except('page'))->render() !!}
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  @parent
  <script>
    // Cart
    
    let cart = localStorage.getItem("cart") ? JSON.parse(localStorage.getItem("cart")) : [];

    let selectProducts = $('.select-product');
    for(let i = 0; i < selectProducts.length; i++)
    {
      $(selectProducts[i]).change(() => {
        let product = $(selectProducts[i]).data('product');
        let quantity = $(quantityProducts[i]).val();
        let status = ($(selectProducts[i]).is(':checked')) ? 'checked' : 'unchecked';
        addToCart(product, quantity, status);
      });

      reRender(selectProducts[i], 'checkbox');
    }

    let quantityProducts = $('.quantity-product');
    for(let i = 0; i < quantityProducts.length; i++)
    {
      $(quantityProducts[i]).change(() => {
        let product = $(quantityProducts[i]).data('product');
        let quantity = $(quantityProducts[i]).val();
        let status = ($(selectProducts[i]).is(':checked')) ? 'checked' : 'unchecked';
        addToCart(product, quantity, status);
      });

      reRender(quantityProducts[i], 'number');
    }

    if($('#cart').val())
    {
      let old_cart = JSON.parse($('#cart').val());
      old_cart.map(element => {
        for(let i = 0; i < selectProducts.length; i++) {
          if($(quantityProducts[i]).data('product').id == element.product.id && !cart.length) $(quantityProducts[i]).val(element.quantity);

          if($(selectProducts[i]).is(':checked') == false && $(selectProducts[i]).data('product').id == element.product.id)
          {
            $(selectProducts[i]).prop('checked', true);
            addToCart(element.product, element.quantity, 'checked');
          }
        }
      })
      $('#cart').remove();
    }

    // Hàm xử lý số sản phẩm thêm vào cart
    function addToCart(product, quantity, status)
    {
      if(status == 'checked') {
        if(!cart.length) {
          cart.push({'product_id': product.id, 'price': product.price, 'quantity': quantity});
        }
        else {
          cart.map((element) => {
            if(element.product_id !== product.id)
              cart.push({'product_id': product.id, 'price': product.price, 'quantity': quantity});
            if(element.product_id == product.id)
              element.quantity = quantity;
          });
        }
      }
      else {
        cart = cart.filter(element => element.product_id !== product.id);
      }

      cart = uniqueValueCart(cart);

      totalOrder(cart);

      insertLocalStorage(cart);
    }

    // Tính tổng hóa đơn và hiển thị
    function totalOrder(cart) {
      const total = cart.reduce((sum, element) => {
        return sum + element.quantity * element.price;
      }, 0);

      $('#order-total').html(String(total).replace(/(.)(?=(\d{3})+$)/g,'$1,'));
      $('#total').val(total);
    }

    // Lưu cart vào localstorage
    function insertLocalStorage(array)
    {
      // cart = localStorage.getItem("cart") ? JSON.parse(localStorage.getItem("cart")) : array;
      // array.map(element => {
      //   console.log(element)
      //   cart.push(element)
      // });
      // cart = uniqueValueCart(cart);
      // console.log(cart);
      $('#list_product_order').val(JSON.stringify(array));
      localStorage.setItem("cart", JSON.stringify(array));
    }

    // re-render table when do not submit form
    function reRender(input, type)
    {
      // render cart
      if(cart)
      {
        for(let index = 0; index < cart.length; index++)
        {
          if(cart[index].product_id == $(input).data('product').id) {
            if(type == 'checkbox') {
              $(input).prop('checked', true);
              break;
            }
            if(type == 'number') {
              $(input).val(cart[index].quantity);
              break;
            }
          }
        }

        totalOrder(cart);
  
        $('#list_product_order').val(JSON.stringify(cart));
      }
    }

    // Hàm lọc bỏ những trường trùng lặp
    function uniqueValueCart(array)
    {
      return uniqueObjects = Array.from(new Set(array.map(element => JSON.stringify(element)))).map(element => JSON.parse(element));
    }

    $('#btn-order').click(() => {
      localStorage.clear();
    })
  </script>
@endsection
