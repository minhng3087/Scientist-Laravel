@extends('backend.master')
@section('content')
@section('controller','Quản lý '.$trang)
@section('action','List')
<!-- Content Header (Page header) -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#chonhet").click(function(){
      var status=this.checked;
      $("input[name='chon']").each(function(){this.checked=status;})
    });
    $("#xoahet").click(function(){
      var listid="";
      $("input[name='chon']").each(function(){
        if (this.checked) listid = listid+","+this.value;
        })
      listid=listid.substr(1);   //alert(listid);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location = homeUrl()+"/backend/customers/"+listid+"/deleteList}";
    });
  });
</script>
<section class="content-header">
  <h1>
    @yield('controller')
    <small>@yield('action')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="backend"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="javascript:">@yield('controller')</a></li>
    <li class="active">@yield('action')</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('backend.messages_error')
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 20px;"><input type="checkbox" name="chonhet" class="minimal" id="chonhet" /></th>
                <th class="text-center with_dieuhuong">MSKH</th>
                <th>Tên khách hàng</th>
                <th>Lịch sử</th>
                <th class="text-center with_dieuhuong">Hoạt động</th>
                <th class="text-center with_dieuhuong">Sửa</th>
                <th class="text-center with_dieuhuong">Xóa</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $k=>$item)
              <tr>
                <td><input type="checkbox" name="chon" id="chon" value="{{$item->mskh}}" class="chon" /></td>
                <td class="text-center with_dieuhuong">{{$item->mskh}}</td>
                <td>{{$item->name}}</td>
                <td><a href="{!! URL::route('backend.customers.show',$item->mskh) !!}">Xem</a></td>
                <td class="text-center with_dieuhuong">
                  <div class="form-group"> 
                    @if($item->status>0)
                      <a href="backend/customers/edit?mskh={{$item->mskh}}&hienthi={{ time() }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>
                    @else
                      <a href="backend/customers/edit?mskh={{$item->mskh}}&hienthi={{ time() }}" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>
                    @endif
                  </div>
                </td>
                <td class="text-center with_dieuhuong">
                  <i class="fa fa-pencil fa-fw"></i><a href="backend/customers/edit?mskh={{$item->mskh}}">Edit</a>
                </td>
                <td class="text-center">
                  <i class="fa fa-trash-o fa-fw"></i><a onClick="if(!confirm('Xác nhận xóa')) return false;" href="backend/customers/{{$item->mskh}}/delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
        <div class="box-footer col-md-12">
          <div class="row">
            <div class="col-md-6">
              <input type="button" onclick="javascript:window.location='backend/customers/add'" value="Thêm" class="btn btn-primary" />
              <button type="button" id="xoahet" class="btn btn-success">Xóa</button>
              <input type="button" value="Thoát" onclick="javascript:window.location='backend'" class="btn btn-danger" />
            </div>
          </div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection()
