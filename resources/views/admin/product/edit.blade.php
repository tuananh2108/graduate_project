@extends('admin.master.master')

@section('title', 'Sửa sản phẩm')

@section('product')
    class="active"
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-primary">
                        <div class="panel-heading">Sửa sản phẩm: {{ $product->name }} ({{ $product->product_code }})</div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="row">
                                        <form action="" method="post"></form> {{-- form ảo --}}
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label style="color: #30a5ff;">Danh mục</label>
                                                <select name="category" class="form-control">
                                                    {{ Getcategory($categories, 0, '', $product->category_id) }}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label style="color: #30a5ff;">Mã sản phẩm</label>
                                                <input  type="text" name="product_code" class="form-control"
                                                    value="{{ $product->product_code }}">
                                            </div>
                                            <div class="form-group">
                                                <label style="color: #30a5ff;">Tên sản phẩm</label>
                                                <input  type="text" name="product_name" class="form-control"
                                                    value="{{ $product->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label style="color: #30a5ff;">Giá sản phẩm (Giá chung)</label>
                                                <a href="admin/product/variant/edit/{{ $product->id }}">
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                    Giá theo biến thể
                                                </a>
                                                <input  type="number" name="product_price" class="form-control" value="{{ $product->price }}">
                                            </div>
                                            <div class="form-group">
                                                <label style="color: #30a5ff;">Trạng thái</label>
                                                <select  name="product_status" class="form-control">
                                                    <option @if($product->status=='available') selected @endif value="available">Còn hàng</option>
                                                    <option @if($product->status=='unavailable') selected @endif value="unavailable">Hết hàng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body tabs" style="width: 500px; padding-left: 183px; margin-bottom: 80px;">
                                                    @if ($errors->has('attribute_name'))
                                                        <div class="alert alert-danger" role="alert">
                                                        <strong>{{ $errors->first('attribute_name') }}</strong>
                                                        </div>
                                                    @endif
                                                    @if (session('message'))
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>{{ session('message') }}</strong>
                                                        </div>
                                                    @endif
                                                    @if (session('error-message'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>{{ session('error-message') }}</strong>
                                                        </div>
                                                    @endif
                                                    <label>Các thuộc Tính <a href="admin/product/attribute">
                                                        <span class="glyphicon glyphicon-cog"></span>
                                                            Tuỳ chọn</a>
                                                    </label>
                                                    <ul class="nav nav-tabs">
                                                        @php $i=1; @endphp

                                                        @foreach ($attributes as $attribute)
                                                            <li @if($i==1) class='active' @endif><a href="#tab{{ $attribute->id }}" data-toggle="tab">{{ $attribute->name }}</a></li>
                                                            @php $i=2; @endphp  
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @foreach ($attributes as $attribute)
                                                            <div class="tab-pane fade @if($i==2) active @endif in" id="tab{{ $attribute->id }}">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            @foreach ($attribute->values as $value)
                                                                                <th>{{ $value->value }}</th>
                                                                            @endforeach
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            @foreach ($attribute->values as $value)
                                                                                <td><input @if(check_value($product, $value->id)) checked @endif class="form-check-input" type="checkbox" name="value[{{ $attribute->name }}][]" value="{{ $value->id }}"></td>
                                                                            @endforeach
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                            </div>

                                                            @php $i=3; @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <p></p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="float: left;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="color: #30a5ff;">Ảnh sản phẩm</label>
                                                    <input id="img" type="file" name="product_img" value="{{ json_decode($product->img)[0] }}" class="form-control hidden" onchange="changeImg(this, '#avatar')">
                                                    <img id="avatar" class="thumbnail" width="100%" height="250px" src="{{ asset('img/product/'.json_decode($product->img)[0]) }}" onclick="clickChangeImg('#img')">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="color: #30a5ff;">Ảnh 2 của sản phẩm</label>
                                                    <input id="img2" type="file" name="product_img2" value="{{ json_decode($product->img)[1] }}" class="form-control hidden" onchange="changeImg(this, '#avatar2')">
                                                    <img id="avatar2" class="thumbnail" width="100%" height="250px" src="{{ asset('img/product/'.json_decode($product->img)[1]) }}" onclick="clickChangeImg('#img2')">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="color: #30a5ff;">Ảnh 3 của sản phẩm</label>
                                                    <input id="img3" type="file" name="product_img3" value="{{ json_decode($product->img)[2] }}" class="form-control hidden" onchange="changeImg(this, '#avatar3')">
                                                    <img id="avatar3" class="thumbnail" width="100%" height="250px" src="{{ asset('img/product/'.json_decode($product->img)[2]) }}" onclick="clickChangeImg('#img3')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin</label>
                                        <textarea  name="info" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[0] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin 2</label>
                                        <textarea  name="info1" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[1] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin 3</label>
                                        <textarea  name="info2" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[2] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin 4</label>
                                        <textarea  name="info3" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[3] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin 5</label>
                                        <textarea  name="info4" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[4] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin 6</label>
                                        <textarea  name="info5" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[5] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Thông tin 7</label>
                                        <textarea  name="info6" class="form-control" style="width: 100%;height: 100px;">{{ json_decode($product->info)[6] }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="color: #30a5ff;">Miêu tả</label>
                                        <textarea id="editor" name="description" class="form-control" style="width: 100%;height: 100px;"> {{ $product->description }}</textarea>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                    <a href="{{ asset('admin/product')}}"class="btn btn-danger">Huỷ bỏ</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
