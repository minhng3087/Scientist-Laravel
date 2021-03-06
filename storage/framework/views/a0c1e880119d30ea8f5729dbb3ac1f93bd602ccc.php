<?php $__env->startSection('content'); ?>



<?php $__env->startSection('controller','Cập nhật danh mục bài viết'); ?>



<?php $__env->startSection('action','Update'); ?>







<!-- Content Header (Page header) -->



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



  



    <div class="box">



    	<?php echo $__env->make('backend.messages_error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



        <div class="box-body">



        	<form method="post" action="backend/catenew/edit?id=<?php echo e($id); ?>" enctype="multipart/form-data">



        		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />



      			



                  <div class="nav-tabs-custom">



                



	                <ul class="nav nav-tabs">



	                  	<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Thông tin chung</a></li>

                        <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">SEO</a></li>
                        <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">Japan</a></li>    
	                </ul>



	                <div class="tab-content">

	                  	<div class="tab-pane active" id="tab_1">

	                  		<div class="row">

		                  		<div class="col-md-8 col-xs-12">

						        

							    	<div class="form-group <?php if($errors->first('txtName')!=''): ?> has-error <?php endif; ?>">

								      	<label for="ten">Tên</label>

								      	<input type="text" name="txtName" id="txtName" value="<?php echo old('txtName', isset($data) ? $data->name : null); ?>"  class="form-control" />

								      	<?php if($errors->first('txtName')!=''): ?>

								      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $errors->first('txtName');; ?></label>

								      	<?php endif; ?>

									</div>

                                    <div class="form-group">

								      	<label for="ten">Tiêu đề(English)</label>

								      	<input type="text" name="name_eg" value="<?php echo $data->name_eg;?>"  class="form-control" />

									</div>

                                    <div class="form-group">

								      	<label for="ten">Tiêu đề(UAE)</label>

								      	<input type="text" name="name_uae" value="<?php echo $data->name_uae;?>"  class="form-control" />

									</div>

                                    <div class="form-group">

								      	<label for="ten">Tiêu đề(Taiwan)</label>

								      	<input type="text" name="name_tai" value="<?php echo $data->name_tai;?>"  class="form-control" />

									</div>

									<div class="form-group <?php if($errors->first('txtAlias')!=''): ?> has-error <?php endif; ?>">

								      	<label for="alias">Đường dẫn tĩnh</label>

								      	<input type="text" name="txtAlias" id="txtAlias" value="<?php echo e($data->alias); ?>"  class="form-control" />

								      	<?php if($errors->first('txtAlias')!=''): ?>

								      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $errors->first('txtAlias');; ?></label>

								      	<?php endif; ?>

									</div>

                                    <div class="form-group ">

								      	<label for="ten">Mô tả</label>

								      	<textarea  name="mota"  class="form-control" ><?= $data->mota;?></textarea>

									</div>

                                    <div class="form-group ">

								      	<label for="ten">Mô tả(English)</label>

								      	<textarea  name="mota_eg"  class="form-control" ><?= $data->mota_eg;?></textarea>

									</div>

                                    <div class="form-group ">

								      	<label for="ten">Mô tả(UAE)</label>

								      	<textarea  name="mota_uae"  class="form-control" ><?= $data->mota_uae;?></textarea>

									</div>

                                    <div class="form-group ">

								      	<label for="ten">Mô tả(Taiwan)</label>

								      	<textarea  name="mota_tai"  class="form-control" ><?= $data->mota_tai;?></textarea>

									</div>

								</div>

                                <div class="col-md-3">

                                      <button type="submit" class="btn btn-primary btn-block margin-bottom">Lưu</button>

                                      <div class="box box-solid">

                                        <div class="box-header with-border">

                                          <h3 class="box-title">Tác vụ</h3>

                            

                                          <div class="box-tools">

                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                            </button>

                                          </div>

                                        </div>

                                        <div class="box-body no-padding">

                                          <ul class="nav nav-pills nav-stacked">

                                            <li><a style="font-weight: 400px;"><label>

                                            

                                                    <select class="form-control select2" style="width: 100%;" name="home">



                                                        <option value="0" <?php if($data['home'] == 0): ?> selected <?php endif; ?>>--- None ---</option>

                        

                                                        <option value="1" <?php if($data['home'] == 1): ?> selected <?php endif; ?>>Trang chủ</option>

                        

                                                    </select>

                                            

                                            </li>

                                            <li><a style="font-weight: 400px;"><label><input type="checkbox" name="status"  <?php echo (!isset($data->status) || $data->status==1)?'checked="checked"':''; ?>/> Hiển thị</label></a></li>

                                            <li><a style="line-height: 35px;"><input type="number" min="1" name="stt" value="<?php echo isset($data->status) ? $data->stt : (count($parent)+1); ?>" class="form-control" style="width: 100px;margin-right: 10px;float: left;margin-bottom: 10px;"/> Số thứ tự</a><div style="clear: both;"></div></li>

                                            <div style="clear: both;"></div>

                                            <li><a href="<?php echo e(url('backend/productcate')); ?>"><i class="fa fa-trash-o"></i> Thoát</a></li>

                                          </ul>

                                        </div>

                                        

                                        <!-- /.box-body -->

                                      </div>

                                       <!-- /. box -->

                                      <div class="box box-solid" >

                                        <div class="box-header with-border">

                                          <h3 class="box-title">Giao diện</h3>

                            

                                          <div class="box-tools">

                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                            </button>

                                          </div>

                                        </div>

                                        <div class="box-body no-padding">

                                          <ul class="nav nav-pills nav-stacked">

                                            <li><a style="font-weight: 400px;"><label>

                                            

                                                    <select class="form-control select2" style="width: 100%;" name="views">

x

                                                        <option value="0" <?php if($data['views'] == 0): ?> selected <?php endif; ?>>--- Giao diện ---</option>

                                                        <option value="1" <?php if($data['views'] == 1): ?> selected <?php endif; ?>>Thị trường lao động</option>

                                                        <option value="2" <?php if($data['views'] == 2): ?> selected <?php endif; ?>>Tin tức</option>

                                                        <option value="3" <?php if($data['views'] == 3): ?> selected <?php endif; ?>>Tuyển dụng</option>

                                                    </select>

                                            

                                            </li>

                                            <li><a style="font-weight: 400px;"><label><input type="checkbox" name="status"  <?php echo (!isset($data->status) || $data->status==1)?'checked="checked"':''; ?>/> Hiển thị</label></a></li>

                                            <li><a style="line-height: 35px;"><input type="number" min="1" name="stt" value="<?php echo isset($data->status) ? $data->stt : (count($parent)+1); ?>" class="form-control" style="width: 100px;margin-right: 10px;float: left;margin-bottom: 10px;"/> Số thứ tự</a><div style="clear: both;"></div></li>

                                            <div style="clear: both;"></div>

                                            <li><a href="<?php echo e(url('backend/productcate')); ?>"><i class="fa fa-trash-o"></i> Thoát</a></li>

                                          </ul>

                                        </div>

                                        

                                        <!-- /.box-body -->

                                      </div>  

                                      <!-- /. box -->

                                         <div class="box box-solid ">

                                            <div class="box-header with-border">

                                              <h3 class="box-title">Banner</h3>

                                

                                              <div class="box-tools">

                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                                </button>

                                              </div>

                                            </div>

                                            <!-- /.box-header -->

                                            <div class="box-body no-padding">

                                              <ul class="nav nav-pills nav-stacked">

                                                <li id="right-col-li" >

                                                       

                                                  		   <img id="output" src="<?php echo e(asset('upload/hinhanh/'.$data->photo)); ?>" />

                                                           <input class="max-with" name="fImages" type="file"  onchange="loadFile(event)"/>

                                                    

                                                

                                                </li>

                                                <!-------------------->

                                             

                                                <!-------------------->

                                              </ul>

                                            </div>

                                            <!-- /.box-body -->

                                          </div> 

                                          <div class="box box-solid">

                                            <div class="box-header with-border">

                                              <h3 class="box-title">Danh mục</h3>

                                

                                              <div class="box-tools">

                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                                </button>

                                              </div>

                                            </div>

                                            <!-- /.box-header -->

                                            <div class="box-body no-padding">

                                              <ul class="nav nav-pills nav-stacked">

                                              

                                                  <div id="li-cate-admin">  

                                                     <!----------------------------------------->

                                                     <div class="form-group">



                								      	<label for="ten">Danh mục cha</label>

                

                								      	<select name="txtProductCate" class="form-control">

                

                

                

                								      		<option value="0">Chọn danh mục</option>

                

                								      		<?php cate_parent_new($parent,0,"--",$data["parent_id"]) ?>

                

                								      	</select>

                

                									</div>   

                                                      <!----------------------------------------->

                                                     </div>

                                              </ul>

                                            </div>

                                            <!-- /.box-body -->

                                          </div>

                                   </div>

							</div>

							<div class="clearfix"></div>

	                  	</div><!-- /.tab-pane -->

	                     <div class="tab-pane" id="tab_2">

                            <div class="col-md-3 col-xs-12">

                               	<div class="form-group">

							      	<label for="txtTitle">Title</label>

							      	<input type="text" name="txtTitle" value="<?php echo $data->title;?>"  class="form-control" />



								</div>

                            	<div class="form-group">

							      	<label for="keyword">Keyword</label>

							      	<textarea name="txtKeyword" rows="5"  class="form-control"><?php echo $data->keyword;?></textarea>

								</div>

                                <div class="form-group">

							      	<label for="description">Description</label>

							      	<textarea name="txtDescription" rows="5" class="form-control"><?php echo $data->description;?></textarea>

								</div>

                            </div>

                            <div class="col-md-3 col-xs-12">

		                    	 <div class="form-group">

							      	<label for="title_eg">Title(English)</label>

							      	<input type="text" name="title_eg" value="<?php echo $data->title_eg;?>" maxlength="255"  class="form-control" />



								</div>

                            	<div class="form-group">

							      	<label for="keyword">Keyword(English)</label>

							      	<textarea name="keyword_eg" rows="5" maxlength="255" class="form-control"><?php echo $data->keyword_eg;?></textarea>

								</div>

                                <div class="form-group">

							      	<label for="description">Description(English)</label>

							      	<textarea name="description_eg" rows="5" class="form-control"><?php echo $data->description_eg;?></textarea>

								</div>

                            </div>        

                            <div class="col-md-3 col-xs-12">    

								 <div class="form-group">

							      	<label for="title_eg">Title(UAE)</label>

							      	<input type="text" name="title_uae" value="<?php echo $data->title_uae;?>" maxlength="255"  class="form-control" />



								</div>

                            	<div class="form-group">

							      	<label for="keyword">Keyword(UAE)</label>

							      	<textarea name="keyword_uae" rows="5" maxlength="255" class="form-control"><?php echo $data->keyword_uae;?></textarea>

								</div>

                                <div class="form-group">

							      	<label for="description">Description(UAE)</label>

							      	<textarea name="description_uae" rows="5" class="form-control"><?php echo $data->description_uae;?></textarea>

								</div>	

                            </div>  

                            <div class="col-md-3 col-xs-12">    

								<div class="form-group">

							      	<label for="title_eg">Title(Taiwan)</label>

							      	<input type="text" name="title_tai" value="<?php echo $data->title_tai;?>" maxlength="255"  class="form-control" />



								</div>

                            	<div class="form-group">

							      	<label for="keyword">Keyword(Taiwan)</label>

							      	<textarea name="keyword_tai" rows="5" maxlength="255" class="form-control"><?php echo $data->keyword_tai;?></textarea>

								</div>

                                <div class="form-group">

							      	<label for="description">Description(Taiwan)</label>

							      	<textarea name="description_tai" rows="5" class="form-control"><?php echo $data->description_tai;?></textarea>

								</div>	

                            </div>

                            <div class="clearfix"></div>      

                        </div>   
                        <div class="tab-pane" id="tab_3">
                             <div class="form-group">

						      	<label for="ten">Tiêu đề(Japan)</label>

						      	<input type="text" name="name_ja" value="<?= $data->name_ja?>"  class="form-control" />

							</div>
                            <div class="form-group ">

						      	<label for="ten">Mô tả(Japan)</label>

						      	<textarea  name="mota_ja" class="form-control" ><?= $data->mota_ja?></textarea>

							</div>
                            <div class="col-md-12 col-xs-12">    

								<div class="form-group">

							      	<label for="title_eg">Title(Japan)</label>

							      	<input type="text" name="title_ja" value="<?= $data->title_ja?>" maxlength="255"  class="form-control" />



								</div>

                            	<div class="form-group">

							      	<label for="keyword">Keyword(Japan)</label>

							      	<textarea name="keyword_ja" rows="5" maxlength="255" class="form-control"><?= $data->keyword_ja?></textarea>

								</div>

                                <div class="form-group">

							      	<label for="description">Description(Japan)</label>

							      	<textarea name="description_ja" rows="5" class="form-control"><?= $data->description_ja?></textarea>

								</div>	

                            </div> 
                            <div class="clearfix"></div>
                        </div> 
	                </div><!-- /.tab-content -->



	            </div>



	            <div class="clearfix"></div>



			  

		    </form>



        </div><!-- /.box-body -->



    </div><!-- /box -->



    



</section><!-- /.content -->



<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>