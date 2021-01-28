<?php $__env->startSection('content'); ?>

<?php $__env->startSection('controller','Quản lý '.$trang); ?>

<?php $__env->startSection('action','List'); ?>

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

      if (hoi==true) document.location = homeUrl()+"/backend/lienket/"+listid+"/deleteList?type=<?php echo e(@$_GET[type]); ?>";

    });

  });

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

<section class="content">

  <div class="row">

    <div class="col-xs-12">

      <div class="box">

        <?php echo $__env->make('backend.messages_error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--<div class="box-header">

          <h3 class="box-title">Data Table With Full Features</h3>

        </div>-->

        <div class="box-body">

          <table id="example1" class="table table-bordered table-hover">

            <thead>

              <tr>

                <th style="width: 20px;"><input type="checkbox" name="chonhet" class="minimal" id="chonhet" /></th>

                <th class="text-center with_dieuhuong">Stt</th>

                <th>Tiêu đề</th>

                <?php if($_GET['type']!='cam-nhan'): ?><th>Hình ảnh</th><?php endif; ?>

                <th class="text-center with_dieuhuong">Hoạt động</th>

                <th class="text-center with_dieuhuong">Sắp xếp</th>

                <th class="text-center with_dieuhuong">Sửa</th>

                <th class="text-center with_dieuhuong">Xóa</th>

              </tr>

            </thead>

            <tbody>

              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>

                <td><input type="checkbox" name="chon" id="chon" value="<?php echo e($item->id); ?>" class="chon" /></td>

                <td class="text-center with_dieuhuong"><?php echo e($k+1); ?></td>

                <td><?php echo e($item->name); ?></td>

              

                <td><img src="<?php echo e(asset('upload/hinhanh/'.$item->photo)); ?>" onerror="this.src='<?php echo e(asset('public/admin_assets/images/no-image.jpg')); ?>';" class="img_product"  alt="NO PHOTO" /></td>

                

                <td class="text-center with_dieuhuong">

                  <div class="form-group"> 

                    <?php if($item->status>0): ?>

                      <a href="backend/lienket/edit?id=<?php echo e($item->id); ?>&hienthi=<?php echo e(time()); ?>&type=<?php echo e(@$_GET['type']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>

                    <?php else: ?>

                      <a href="backend/lienket/edit?id=<?php echo e($item->id); ?>&hienthi=<?php echo e(time()); ?>&type=<?php echo e(@$_GET['type']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> Hiển thị</a>

                    <?php endif; ?>

                  </div>

                  <!-- <div class="form-group"> 

                    <?php if($item->noibat>0): ?>

                      <a href="backend/lienket/edit?id=<?php echo e($item->id); ?>&noibat=<?php echo e(time()); ?>&type=<?php echo e(@$_GET['type']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Nổi bật</a>

                    <?php else: ?>

                      <a href="backend/lienket/edit?id=<?php echo e($item->id); ?>&noibat=<?php echo e(time()); ?>&type=<?php echo e(@$_GET['type']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> Nổi bật</a>

                    <?php endif; ?>

                  </div> -->

                </td>

                <td class="text-center with_dieuhuong"><?php echo e($item->stt); ?></td>

                <td class="text-center with_dieuhuong">

                  <i class="fa fa-pencil fa-fw"></i><a href="backend/lienket/edit?id=<?php echo e($item->id); ?>&type=<?php echo e(@$_GET['type']); ?>">Edit</a>

                </td>

                <td class="text-center">

                  <i class="fa fa-trash-o fa-fw"></i><a onClick="if(!confirm('Xác nhận xóa')) return false;" href="backend/lienket/<?php echo e($item->id); ?>/delete?type=<?php echo e(@$_GET['type']); ?>">Delete</a>

                </td>

              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

          </table>

        </div><!-- /.box-body -->

        <div class="box-footer col-md-12">

          <div class="row">

            <div class="col-md-6">

              <input type="button" onclick="javascript:window.location='backend/lienket/add?type=<?php echo e(@$_GET[type]); ?>'" value="Thêm" class="btn btn-primary" />

              <button type="button" id="xoahet" class="btn btn-success">Xóa</button>

              <input type="button" value="Thoát" onclick="javascript:window.location='backend'" class="btn btn-danger" />



            </div>

          </div>

        </div>

      </div><!-- /.box -->

    </div><!-- /.col -->

  </div><!-- /.row -->

</section><!-- /.content -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>