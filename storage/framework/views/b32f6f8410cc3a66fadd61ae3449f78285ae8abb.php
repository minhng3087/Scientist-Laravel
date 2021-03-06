<style type="text/css">

#example2_paginate{

    display: none;

}

#example2_info{

    display: none;

}

</style>



<?php $__env->startSection('content'); ?>

<?php $__env->startSection('controller','Bài viết'); ?>

<?php $__env->startSection('action','Danh sách'); ?>

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

      if (hoi==true) document.location = homeUrl()+"/backend/post/"+listid+"/deleteList";

    });

  });

</script>
<script type="text/javascript">
    function changepos() {
        document.frm1.action = "backend/post/changepos";
        document.frm1.submit();
    }

</script>
<section class="content-header">

  <h1>

    <?php echo $__env->yieldContent('controller'); ?>

    <small><?php echo $__env->yieldContent('action'); ?></small>

  </h1>

  <ol class="breadcrumb">

    <li><a href="backend"><i class="fa fa-dashboard"></i> Home</a></li>

    <li><a href="javascript:"><?php echo $__env->yieldContent('controller'); ?></a></li>

    <li class="active"><?php echo $__env->yieldContent('action'); ?></li>

  </ol>

</section>




<!-- Main content -->
<form method="post" name="frm1" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <?php echo $__env->make('backend.messages_error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--<div class="box-header">

          <h3 class="box-title">Data Table With Full Features</h3>

        </div>-->

        <div class="box-body">

           <table id="example1" class="table table-bordered table-striped"> 

            <thead>

              <tr>

                <th style="width: 20px;"><input type="checkbox" name="chonhet" class="minimal" id="chonhet" /></th>

                <th class="text-center with_dieuhuong">Stt</th>

                <th>Danh mục cha</th>

                <th>Tên sản phẩm</th>
                <th style="text-align:center;"><a  onclick="changepos()">Vị trí</a></th>
                <th>Hình ảnh</th>
                
                <th class="text-center with_dieuhuong">Hoạt động</th>

                <th class="text-center with_dieuhuong">Sửa</th>

                <th class="text-center with_dieuhuong">Xóa</th>

                <th class="text-center with_dieuhuong">Id</th>

              </tr>

            </thead>

            <tbody>

              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php @$catpro = DB::table('product_categories')->select('name','id','alias')->where('id',@$item->cate_id)->first();?>
              <tr>
                <td><input type="checkbox" name="chon" id="chon" value="<?php echo e($item->id); ?>" class="chon" /></td>
                <td class="text-center with_dieuhuong"><?php echo e($k+1); ?></td>
                 <td>
                    <?php
                        $cate= explode(',',$item->cate_id);
                        $ids= array();
                        foreach($cate as $value){
                            $ids[]=$value;
                        }
                     @$cate_news = DB::table('product_categories')->select('name','id')->whereIn('id', $ids)->get();
                        foreach($cate_news as $row){
                          echo @$row->name; echo ' | '; 
                        }    
                    ?>
                 </td>
                <td><a><?php echo e($item->name); ?></a>
                   
                </td>
                <td style="text-align:center;" >
                    <input class="text-input medium-input" style="text-align:center; width:30% !important;" type="text" value="<?php echo $item->stt?>" name="order[<?php echo $item->id; ?>]" />
                    <input type="hidden"  value="<?php echo $item->id?>" name="idsy[<?php echo $item->id; ?>]" />
                </td>
               
                <td>

                    <img src="<?php echo e(asset('upload/product/'.$item->photo)); ?>" onerror="this.src='<?php echo e(asset('public/admin_assets/images/no-image.jpg')); ?>'" style="max-width: 100%;max-height: 200px;"  alt="NO PHOTO" />

                </td>
               
               <td class="text-center with_dieuhuong">

                  <div class="form-group"> 
                    <?php if($item->status>0): ?>
                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&hienthi=<?php echo e(time()); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>
                    <?php else: ?>
                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&hienthi=<?php echo e(time()); ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> No Hiển thị</a>
                    <?php endif; ?>

                  </div>

                  <div class="form-group" > 

                    <?php if($item->noibat>0): ?>

                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&noibat=<?php echo e(time()); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Nổi bật(home)</a>

                    <?php else: ?>

                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&noibat=<?php echo e(time()); ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> No Nổi bật(home)</a>

                    <?php endif; ?>

                  </div>

                  <div class="form-group hidden" > 

                    <?php if($item->hot>0): ?>

                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&hot=<?php echo e(time()); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Bán chạy(Danh mục)</a>

                    <?php else: ?>

                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&hot=<?php echo e(time()); ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> No Bán chạy(Danh mục)</a>

                    <?php endif; ?>

                  </div>

                  <div class="form-group hidden" > 

                    <?php if($item->hotleft>0): ?>

                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&hotleft=<?php echo e(time()); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Bán chạy detail</a>

                    <?php else: ?>

                      <a href="backend/post/edit?id=<?php echo e($item->id); ?>&hotleft=<?php echo e(time()); ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> No Bán chạy detail</a>

                    <?php endif; ?>

                  </div>

                </td>

                <td class="text-center with_dieuhuong">

                  <i class="fa fa-pencil fa-fw"></i><a href="backend/post/edit?id=<?php echo e($item->id); ?>">Edit</a>

                </td>

                <td class="text-center">

                  <i class="fa fa-trash-o fa-fw"></i><a onClick="if(!confirm('Xác nhận xóa')) return false;" href="admin/post/<?php echo e($item->id); ?>/delete">Delete</a>

                </td>

                 <td style="text-align: center;"><a><?php echo e($item->id); ?></a></td>

              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

          </table>

         <?php echo e($data->links()); ?>


        </div><!-- /.box-body -->

        <div class="box-footer col-md-12">

          <div class="row">

            <div class="col-md-6">

              <input type="button" onclick="javascript:window.location='backend/post/add'" value="Thêm" class="btn btn-primary" />

              <button type="button" id="xoahet" class="btn btn-success">Xóa</button>

              <input type="button" value="Thoát" onclick="javascript:window.location='backend'" class="btn btn-danger" />



            </div>

          </div>

        </div>

      </div><!-- /.box -->

    </div><!-- /.col -->

  </div><!-- /.row -->

</section><!-- /.content -->
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>