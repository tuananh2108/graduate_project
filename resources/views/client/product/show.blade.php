@extends('client.master')
@section('title', 'Detail')
@section('content')
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-img">
                    <div class="owl-carousel">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="item">
                                <img src="{{asset('img/product/'.json_decode($product->img)[$i])}}"/>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content">
                    <h2>{{ $product->name }}</h2>
                    <div class="product-price">
                        <span class="new">{{number_format( $product->price, 0, '', ',') }} đ</span>
                    </div>
                    <div class="in-stock">
                            @if ($product->status == "available")
                            <span><i class="ion-android-checkbox-outline"></i>Còn Hàng</span>
                        @else
                            <span><i class="ion-android-checkbox-outline"></i>Hết Hàng</span>
                        @endif
                    </div>
                    @for($i = 0; $i < 7; $i++)
                        <p>{{ json_decode($product->info)[$i] }}</p>
                    @endfor
                    <p>{{ $product->description }}</p>
                    <div class="product-list-action">
                        <div class="product-list-action-left">
                            <a class="addtocart-btn" href="{{ route('contact') }}" title="Add to cart">
                                <i class="ion-bag"></i>
                                Liên hệ đặt hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        var slideIndex = 1;
            showDivs(slideIndex);

            function plusSlides(n) {
              showDivs(slideIndex += n);
            }

            function showDivs(n) {
              var i;
              var x = document.getElementsByClassName("mySlidesImage");
              if (n > x.length) {slideIndex = 1}
              if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              x[slideIndex-1].style.display = "block";  
            }
    </script>
@endsection
