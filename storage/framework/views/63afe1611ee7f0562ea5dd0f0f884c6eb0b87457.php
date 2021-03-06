<?php $__env->startSection('content'); ?>

<?php $__env->startSection('controller','Orders List'); ?>

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

      if (hoi==true) document.location = homeUrl()+"/backend/orders/"+listid+"/delete_list";

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

        <?php if(session('status')): ?>

        <div class="box-header">

            <h3 class="box-title alert_thongbao text-green"><?php echo e(session('status')); ?></h3>

        </div>

        <?php endif; ?>

        <!--<div class="box-header">

          <h3 class="box-title">Data Table With Full Features</h3>

        </div>-->

        <div class="box-body">

           <table id="example1" class="table table-bordered table-striped"> 

            <thead>

              <tr>

                <th style="width: 20px;"><input type="checkbox" name="chonhet" class="minimal" id="chonhet" /></th>

                <th class="text-center with_dieuhuong">Stt</th>

                <th>Mã đơn hàng</th>

                <th>Họ tên</th>

                <th>Ngày tạo</th>

                <th>Tình trạng</th>

                <th class="text-center with_dieuhuong">Sửa</th>

                <th class="text-center with_dieuhuong">Xóa</th>

              </tr>

            </thead>

            <tbody>

              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>

                <td><input type="checkbox" name="chon" id="chon" value="<?php echo e($item->id); ?>" class="chon" /></td>

                <td class="text-center with_dieuhuong"><?php echo e($k+1); ?></td>

                <td><?php echo e($item->code); ?></td>

                <td><?php echo e($item->name); ?></td>

                <td><?php echo e($item->created_at); ?></td>

                <td>

                  <?php  $trangthai = DB::table('order_status')->select()->where('id', $item->status)->first();

                  ?>

                    <?php echo e(@$trangthai->name); ?>


                </td>


                <td class="text-center with_dieuhuong">

                  <i class="fa fa-pencil fa-fw"></i><a href="backend/orders/edit?id=<?php echo e($item->id); ?>">Edit</a>

                </td>

                <td class="text-center">

                  <i class="fa fa-trash-o fa-fw"></i><a onClick="if(!confirm('Xác nhận xóa')) return false;" href="backend/orders/<?php echo e($item->id); ?>/delete">Delete</a>

                </td>

              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

          </table>

        </div><!-- /.box-body -->

        <div class="box-footer col-md-12">

          <div class="col-md-6">

      
            <button type="button" id="xoahet" class="btn btn-success">Xóa</button>

            <input type="button" value="Thoát" onclick="javascript:window.location='backend'" class="btn btn-danger" />



          </div>

        </div>

      </div><!-- /.box -->

    </div><!-- /.col -->

  </div><!-- /.row -->

</section><!-- /.content -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>