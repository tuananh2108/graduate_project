@extends('admin.master.master')

@section('title', 'Danh mục')

@section('category')
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
                <li class="active">Danh mục</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Danh mục cha:</label>
                                        <select class="form-control" name="parent" id="">
                                            <option value="0">----ROOT----</option>
                                            {{ GetCategory($category, 0, '', 0) }}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category-name">Tên Danh mục</label>
                                        <input type="text" class="form-control" name="name" id="category-name" placeholder="Tên danh mục mới">

                                        @if($errors->has('name'))
                                            <div class="alert bg-danger" role="alert">
                                                <svg class="glyph stroked cancel">
                                                    <use xlink:href="#stroked-cancel"></use>
                                                </svg>{{ $errors->first('name') }}<a href="{{ asset('admin/category') }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                </form>
                            </div>

                            <div class="col-md-7">
                            @if(session('message'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>{{ session('message') }}<a href="{{ asset('admin/category') }}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                            @endif

                                <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục</div>
                                    {{ ShowCategory($category, 0, '') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- javascript --}}
    <script>
        function AlertCategory()
        {
            return confirm('Bạn có chắc muốn xóa bản ghi này không?');
        }
    </script>

@endsection
