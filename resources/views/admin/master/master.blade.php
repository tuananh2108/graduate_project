<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
	<!-- css -->
	<link href="{{ asset('/admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/admin/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('/admin/css/styles.css') }}" rel="stylesheet">

	<!--Icons-->
    <script src="{{ asset('/admin/js/lumino.glyphs.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
    @include('admin.master.header')

    @include('admin.master.sidebar')

    @yield('content')

    <!-- javascript -->
    @section('script')
    <script src="{{ asset('/admin/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('/admin/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/admin/js/chart.min.js') }}"></script>
	<script src="{{ asset('/admin/js/easypiechart.js') }}"></script>
	<script src="{{ asset('/admin/js/easypiechart-data.js') }}"></script>
    <script src="{{ asset('/admin/js/bootstrap-datepicker.js') }}"></script>
    {{-- <script src="{{ asset('/admin/js/validation.js') }}"></script> --}}
    <script>
        function changeImg(input, avatar) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $(avatar).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clickChangeImg(input) {
            $(input).click();
        }
    </script>
    @show

</body>
</html>
