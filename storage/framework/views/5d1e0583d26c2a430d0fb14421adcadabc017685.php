		<div class="popups-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="popup-content">
							<div class="art-scheduling">
								<div class="scheduling-box">
									<div class="title-box">
										<h3 class="title"><?php echo e(__('Thông tin khách hàng')); ?></h3>
									</div>
									<div class="contents scheduling-content">
										<ul>
											<li>
												<label><?php echo e(__('Họ và tên')); ?></label>:</label>
												<span><?php echo $customer->name ?></span>
											</li>
											<li>
												<label><?php echo e(__('Mã số khách hàng')); ?>:</label>
												<span>MS<?php echo $customer->mskh ?></span>
											</li>
											<li>
												<label><?php echo e(__('Điện thoại')); ?>:</label>
												<span><?php echo format_phone_number($customer->phone, '.');?></span>
											</li>
											<li>
												<label>Email:</label>
												<span class="email"><?php echo $customer->email ?></span>
											</li>
										</ul>
									</div>
								</div>
								<div class="scheduling-box examination-history">
									<div class="title-box">
										<h3 class="title"><?php echo e(__('Lịch sử khám bệnh')); ?></h3>
									</div>
									<div class="contents scheduling-content">
										
									<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="item">
											<ul>
												<li>
													<label><?php echo e(__('Loại hình dịch vụ')); ?>:</label>
													<span><?php echo $item->name ?></span>
												</li>
												<li>
													<label><?php echo e(__('Số lượng')); ?>:</label>
													<span><?php echo $item->amount ?></span>
												</li>
												<li>
													<label><?php echo e(__('Vị trí răng')); ?>:</label>
													<span><?php echo $item->position ?></span>
												</li>
												<li>
													<label><?php echo e(__('Ngày thực hiện')); ?>:</label>
													<span><?php echo date('d/m/Y', strtotime($item->day_action)) ?></span>
												</li>
												<li>
													<label><?php echo e(__('Thời hạn bảo hành')); ?>:</label>
													<span><?php echo $item->period ?> ngày</span>
												</li>
											</ul>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
