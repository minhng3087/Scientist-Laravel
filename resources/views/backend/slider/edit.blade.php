@extends('backend.master')
@section('content')
@section('controller','Quản lý '.$trang)
@section('action','Edit')
<!-- Content Header (Page header) -->
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
    <div class="box">
    	@include('backend.messages_error')
        <div class="box-body">
        	<form method="post" action="backend/slider/edit?id={{$id}}" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      			<div class="row">
              		<div class="col-md-6 col-xs-12">
						<div class="form-group @if ($errors->first('fImages')!='') has-error @endif">
							<div class="form-group">
								<img src="{{ asset('upload/hinhanh/'.$data->photo) }}" onerror="this.src='{{asset('public/admin_assets/images/no-image.jpg')}}'" class="img-responsive"  alt="NO PHOTO" />
								<input type="hidden" name="img_current" value="{!! @$data->photo !!}">
							</div>
							<label for="file">Chọn File ảnh</label>
					     	<input type="file" id="file" name="fImages" >
					    	<p class="help-block">Width:800px - Height: 326px</p>
					    	@if ($errors->first('fImages')!='')
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('fImages'); !!}</label>
					      	@endif
						</div>
						<div class="hidden form-group @if ($errors->first('fImages2')!='') has-error @endif">
							<div class="form-group">
								<img src="{{ asset('upload/hinhanh/'.$data->icon) }}" height="61" onerror="this.src='{{asset('public/admin_assets/images/no-image.jpg')}}'"  alt="NO PHOTO" />
								<input type="hidden" name="img_current2" value="{!! @$data->icon !!}">
							</div>
							<label for="file">Chọn File icon</label>
					     	<input type="file" id="file" name="fImages2" >
					    	<p class="help-block">Width:61px - Height: 61px</p>
					    	@if ($errors->first('fImages2')!='')
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('fImages2'); !!}</label>
					      	@endif
						</div>
						<div class="clearfix"></div>
				    	<div class="form-group @if ($errors->first('txtName')!='') has-error @endif">
					      	<label for="ten">Tên</label>
					      	<input type="text" name="txtName" id="txtName" value="{{ $data->name }}"  class="form-control" />
					      	@if ($errors->first('txtName')!='')
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {!! $errors->first('txtName'); !!}</label>
					      	@endif
						</div>
					     <div class="form-group">
					      	<label for="alias">Link</label>
					      	<input type="text" name="txtLink" id="txtLink" value="{{ $data->link }}"  class="form-control" />
						</div> 
                <?php if(@$_GET['type']!='hinh-anh'){?>
						<div class="form-group">
					      	<label for="desc">Mô tả</label>
					      	<textarea name="txtDesc" rows="5" class="form-control">{{ $data->mota }}</textarea>
						</div>
                <?php } ?>
					</div>
					<div class="col-md-6 col-xs-12 hidden">
						<div class="box box-info">
			                <div class="box-header">
			                  	<h3 class="box-title">Nội dung</h3>
			                  	<div class="pull-right box-tools">
				                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				                </div>
			                </div>
			                <div class="box-body pad">
			        			<textarea name="txtContent" id="txtContent" cols="50" rows="5">{{ $data->content }}</textarea>
			        		</div>
			        	</div>
					</div>
					<!-- <input type="hidden" name="txtCom" value="{{ @$_GET['type'] }}"/> -->
				</div>
	            <div class="clearfix"></div>
	            <div class="row">
				    <div class="col-md-6">
				    	<div class="form-group">
						      <label for="ten">Số thứ tự</label>
						      <input type="number" min="1" name="stt" value="{!! isset($data->status) ? $data->stt : (count($news)+1) !!}" class="form-control" style="width: 100px;">
					    </div>
					    <div class="form-group">
						    <label>
					        	<input type="checkbox" name="status" {!! (!isset($data->status) || $data->status==1)?'checked="checked"':'' !!}> Hiển thị
					    	</label>
					    </div>
				    </div>
			    </div>
			    <div class="clearfix"></div>
			    <div class="box-footer">
			    	<div class="row">
						<div class="col-md-6">
					    	<button type="submit" class="btn btn-primary">Cập nhật</button>
					    	<button type="button" class="btn btn-danger" onclick="javascript:window.location='backend/slider'">Thoát</button>
				    	</div>
			    	</div>
			  	</div>
		    </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection()
