@extends('client.master')
@section('title', 'Search product')
@section('content')
  <div class="shop-area pt-100 pb-100">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9">
          <div class="grid-list-product-wrapper">
            <div class="product-view product-grid">
              <div class="row">
                @foreach ($products as $product)
                  <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                      <div class="product-img">
                        <a href="{{ route('product.detail', $product->id) }}">
                          <img class="zoom-product" src="{{ asset('img/product/' . json_decode($product->img)[0]) }}"
                            alt="">
                        </a>
                      </div>
                      <div class="product-content">
                        <h4><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h4>
                        <div class="product-price">
                          <span class="new">{{ number_format($product->price, 0, '', ',') }} đ</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="pagination-style text-center mt-10" style="display: flex;justify-content: center;">
                {!! $products->links() !!}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="shop-sidebar">
            <!--Menu slidebar-->
            <div class="shop-widget">
              <h4 class="shop-sidebar-title">THƯƠNG HIỆU</h4>
              <nav id="sidebar" class="shop-list-style mt-20">
                <ul class="list-unstyled components slidebar-menu">
                  @foreach ($attribute->values as $item)
                    <li class="active">
                      <a href="{{ route('product.by.value', $item->id) }}">{{ $item->value }}</a>
                    </li>
                  @endforeach
                </ul>
              </nav>
            </div>
            <div class="shop-widget mt-50">
              <h4 class="shop-sidebar-title">DÒNG SẢN PHẨM</h4>
              <nav id="sidebar" class="shop-list-style mt-20">
                <ul class="list-unstyled components slidebar-menu">
                  @foreach ($categories as $category)
                    @if ($category->parent == 0)
                      <li class="active">
                        <a href="#homeSubmenu-{{ $category->id }}" data-toggle="collapse" aria-expanded="false"
                          class="dropdown-toggle menu-dropdown-toggle">{{ $category->name }}</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu-{{ $category->id }}">
                          @foreach ($categories as $item)
                            @if ($item->parent == $category->id)
                              <li>
                                <a href="{{ route('product.by.category', $item->id) }}">{{ $item->name }}</a>
                              </li>
                            @endif
                          @endforeach
                        </ul>
                      </li>
                    @endif
                  @endforeach
                </ul>
              </nav>
            </div>
            <!--Filter-->
            <div class="shop-widget mt-50">
              <h4 class="shop-sidebar-title">KHOẢNG GIÁ</h4>
              <form method="get" action="{{ route('search.product') }}">
                @csrf
                <div class="price_filter mt-25">
                  <div class="form-group">
                    <label for="inputState">Từ</label>
                    <select id="inputState" class="form-control" name="start">
                      <option value="100000">100.000 đ</option>
                      <option value="200000">200.000 đ</option>
                      <option value="500000">500.000 đ</option>
                      <option value="800000">800.000 đ</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputState">Đến</label>
                    <select id="inputState" class="form-control" name="end">
                      <option value="1000000">1.000.000 đ</option>
                      <option value="2000000">2.000.000 đ</option>
                      <option value="3000000">3.000.000 đ</option>
                      <option value="4000000">4.000.000 đ</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit"
                      class="btn btn-large btn-block btn-outline-secondary btn-radius-5 cursor-pointer">Tìm kiếm</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
