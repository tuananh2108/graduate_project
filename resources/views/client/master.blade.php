<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CNC Company</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('client/assets/css/responsive.css')}}">

        <!--customization-->
        <link rel="stylesheet" href="{{asset('client/css/customization.css')}}">
    </head>
    <body>
        <header class="header-area">
            
            <div class="header-bottom transparent-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-5">
                            <div class="logo" >
                                <a href="/"><img alt="" src="{{asset('client/images/logo.jpg')}}"></a>
                            </div>
                        </div>
                        <!--MENU-->
                        <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a class="main-menu-1" href="/">Trang chủ</a>
                                        </li>
                                        <li><a class="main-menu-1" href="{{ route('product') }}">Sản phẩm</a>
                                            <ul class="submenu">
                                                <?php $categories = App\Models\Category::where('parent', '0')->get(); ?>
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <a href="{{ route('product.by.category', $category->id) }}">{{ $category->name }}</a>
                                                        <?php $category_child = App\Models\Category::where('parent', $category->id)->get(); ?>
                                                        @if (count($category_child) > 0)
                                                            <ul class="submenu-2">
                                                                @foreach ($category_child as $rc)
                                                                    <li><a href="{{ route('product.by.category', $rc->id) }}">{{ $rc->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a class="main-menu-1" href="">Lĩnh vực khác</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('construction') }}">Công trình</a></li>
                                                <li><a href="{{ route('cost') }}">Bảng giá sửa chữa và cải tạo nhà</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="main-menu-1" href="{{ route('project') }}">dự án</a></li>
                                        <li><a class="main-menu-1" href="{{ route('contact') }}">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                            <div class="search-content custom-search-content">
                                <div class="phone-contact">
                                    <span class="icon-phone">0329561925</span>
                                </div>
                                <form method="get" action="{{ route('search') }}">
                                    <input type="text" name="product" placeholder="Search">
                                    <button>
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="#">HOME</a></li>
                                        <li><a href="#">Sản phẩm</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Gạch lát nền</a>
                                                    <ul>
                                                        <li><a href="#">800x800mm</a></li>
                                                        <li><a href="#">800x800mm</a></li>
                                                        <li><a href="#">800x800mm</a></li>
                                                        <li><a href="#">800x800mm</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Gạch ốp</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Lĩnh vực khác</a>
                                            <ul>
                                                <li><a href="#">Công trình</a></li>
                                                <li><a href="#">Công trình</a></li>
                                                <li><a href="#">Công trình</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Dự án</a></li>
                                        <li><a href="#">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <div class="blog-area gray-border-bottom gray-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="newsletter-style">
                            <div class="newsletter-title">
                                <i class="icon-cursor"></i>
                                <span>Đăng ký nhận bản tin</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="newsletter-style">
                            <div id="mc_embed_signup" class="subscribe-form">
                                <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input type="email" value="" name="EMAIL" class="email" placeholder="Nhập email của bạn" required="">
                                        <div class="clear"><input type="submit" value="GỬI" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<footer class="footer-area gray-bg-3">
            <div class="footer-top pt-80 pb-30 gray-border-bottom">
                <div class="container">
                    <div class="row">
                        <!--Logo-->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-logo mb-30">
                                <div class="logo-footer text-center">
                                    <a href="/"><img alt="" src="{{asset('client/images/logo.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                        <!--Introduction-->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-info-wrapper">
                                    <p>CNC hoạt động với mong muốn cung cấp các dịch vụ Tư vấn thiết kế và Thi công chuyên nghiệp đáp ứng một cách đồng bộ các nhu cầu của nhà đầu tư về các lĩnh vực Kiến trúc – Cảnh quan – Nội thất – Thi công xây dựng.</p>
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                            <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Contact-->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                            <div class="footer-widget">
                                <h5 class="title-contact">Thông tin liên hệ</h5>
                                <div class="content-contact">
                                    <ul>
                                        <li>
                                            <i class="icon-home"></i>
                                            <span>Số nhà 114 C14 Khu tập thể Kim Liên - Kim Liên - Đống Đa - Hà Nội</span>
                                        </li>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <span>+ 1235 2355 98</span>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <span>info@yoursite.com</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom gray-bg-3 pt-17 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                                <p>Copyright @ 2022 - by ATH (Design Your Future)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</footer>
        <div class="row">
            <!-- Call Us Button -->
            <div class="call-buton">
                <a class="cc-calto-action-ripple" href="tel:+84329561925">
                    <i class="icon-phone"></i>
                    {{-- <span class="num">032.956.1925</span> --}}
                </a>
            </div>
            <!-- Message Facebook Button -->
            <div class="message-fb-btn">
                <!-- Messenger Plugin chat Code -->
                <div id="fb-root"></div>

                <!-- Your Plugin chat code -->
                <div id="fb-customer-chat" class="fb-customerchat"></div>
            </div>
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "202666397019523");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml            : true,
                    version          : 'v15.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
		
		<!-- all js here -->
        <script src="{{asset('client/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{asset('client/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('client/assets/js/popper.js')}}"></script>
        <script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('client/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('client/assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('client/assets/js/elevetezoom.js')}}"></script>
        <script src="{{asset('client/assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('client/assets/js/plugins.js')}}"></script>
        <script src="{{asset('client/assets/js/main.js')}}"></script>
        <script src="{{asset('client/js/customization.js')}}"></script>
        
    </body>
</html>
        






        