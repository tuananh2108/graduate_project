@extends('admin.master.master')

@section('title', 'Danh sách công trình')

@section('construction')
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
        <li class="active">Danh sách công trình</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách công trình</h1>
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
                    </svg>{{ session('message') }}<a href="{{ asset('admin/construction') }}" class="pull-right"><span
                        class="glyphicon glyphicon-remove"></span></a>
                  </div>
                @endif
                <a href="{{ asset('admin/construction/add') }}" class="btn btn-primary">Thêm công trình mới</a>
                <table class="table table-bordered" style="margin-top:20px;">
                  <thead>
                    <tr class="bg-primary">
                      <th style="width: 10%;">@sortablelink('id', 'ID', [], ['class' => 'sortable-link'])</th>
                      <th style="width: 20%;">Thông tin công trình</th>
                      <th style="width: 20%;">@sortablelink('name', 'Tên công trình', [], ['class' => 'sortable-link'])</th>
                      <th style="max-width: 20%;">Nội dung</th>
                      <th width='16%'>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i=1; @endphp
                    @foreach ($constructions as $construction)
                      <tr>
                        <td>{{ $construction->id }}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-3"><img
                                src="{{ asset('img/construction/' . json_decode($construction->img)[0]) }}" alt="None"
                                width="100px" class="thumbnail"></div>
                          </div>
                        </td>
                        <td>
                          {{ $construction->name }}
                        </td>
                        <td>
                          <div style="width:200px; height: auto; word-wrap:break-word;">
                            {{ json_decode($construction->detail)[0] }}
                          </div>
                        </td>
                        <td>
                          <div class="input-group-btn dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Thao tác
                              <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="{{ asset('admin/construction/edit/' . $construction->id) }}"
                                  class="btn btn-default form-control"><i class="fas fa-edit"></i> Cập nhật</a>
                              </li>
                              <li>
                                <a href="{{ asset('admin/construction/delete/' . $construction->id) }}"
                                  class="btn btn-default form-control"
                                  onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không?')"><i
                                    class="fa fa-trash"></i> Xoá</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @php $i++; @endphp
                    @endforeach
                  </tbody>
                </table>
                <div align='right'>
                  {!! $constructions->links() !!}
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
