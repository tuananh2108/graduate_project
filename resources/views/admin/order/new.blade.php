@extends('admin.master.master')

@section('title', 'Tạo hóa đơn')

@section('order')
  class="active"
@endsection

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    {{-- <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tạo hóa đơn</h1>
      </div>
    </div> --}}

    <div class="row" style="margin-top:20px">
      <div class="col-xs-6 col-md-12 col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">Tạo hóa đơn</div>
          <div class="panel-body">
            <form method="post" id="form-order">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Tên khách hàng (*)</label>
                    <input type="text" name="name" class="form-control" required>
                    @if ($errors->has('name'))
											<i><span style="color:red">{{ $errors->first('name') }}</span></i>
										@endif
                    <i>Tên khách hàng phải là chữ cái</i>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Email (*)</label>
                    <input type="email" name="email" class="form-control" required>
                    @if ($errors->has('email'))
											<i><span style="color:red">{{ $errors->first('name') }}</span></i>
										@endif
                    <i>Email phải là một địa chỉ hợp lệ</i>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Số diện thoại (*)</label>
                    <input type="text" name="phone_number" max="10" class="form-control" required>
                    @if ($errors->has('phone_number'))
											<i><span style="color:red">{{ $errors->first('name') }}</span></i>
										@endif
                    <i>Điện thoại phải là số điện thoại hợp lệ (10 chữ số) và bắt đầu bằng 03, 08 hoặc 09</i>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Địa chỉ nhận hàng (*)</label>
                    <input type="text" name="address" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <strong class="d-flex text-align-center">Tổng thanh toán: <h4 style="padding-left: 10px"><span id="order-total">0</span> VNĐ</h4></strong>
                  <input type="hidden" name="order_total" id="total">
                </div>
              </div>
              <input type="hidden" name="list_product_order" id="list_product_order">
              <div style="margin-top: 20px; text-align:right;">
                <input type="submit" value="Tạo hóa đơn" class="btn btn-primary">
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
    // $(document).ready(function() {
    //   localStorage.setItem("infoOder", [$('input[name="name"').val(), $('input[name="email"').val(), $('input[name="phone_number"').val(), $('input[name="order_total"').val(), $('input[name="address"').val()]);
    // });

    let cart = [];
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

      $('#list_product_order').val(JSON.stringify(cart));

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
      if(localStorage.getItem("cart")) {
        cartStorage = JSON.parse(localStorage.getItem("cart"));
        array.map((element) => {
          cartStorage.map(item => {
            item.product_id == element.product_id ? item.quantity = element.quantity : cartStorage.push(element);
          });
        });
        array = uniqueValueCart(cartStorage);
      }

      localStorage.setItem("cart", JSON.stringify(array));
    }

    // re-render table when do not submit form
    function reRender(input, type)
    {
      let cart = JSON.parse(localStorage.getItem("cart"));
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
      }
    }

    // Hàm lọc bỏ những trường trùng lặp
    function uniqueValueCart(array)
    {
      return uniqueObjects = Array.from(new Set(array.map(element => JSON.stringify(element)))).map(element => JSON.parse(element));
    }
  </script>
@endsection
