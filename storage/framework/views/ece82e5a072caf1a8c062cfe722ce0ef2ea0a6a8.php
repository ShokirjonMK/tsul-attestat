
<?php $__env->startSection('title'); ?>
<?php echo e($data->getfio()); ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('link'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="xs-pd-20-10 pd-ltr-20">

    <div class="pd-20 card-box" id="noprint">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>
                           Foydalanuvchi ko'rish <a class="ml-2 p-1" href="<?php echo e(route('user.edit',$data->id)); ?>" ><i class="dw dw-edit2"></i></a>

                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>">Foydalanuvchilar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e($data->getfio()); ?> 
                            </li>
                        </ol>
                    </nav>
                </div>
               

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pd-20 card-box mb-30">

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Familiya :
												<span class="error">
													<?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<?php echo e($message); ?>

													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
											</label>
											<input readonly type="text" class="form-control" name="last_name" value="<?php echo e($data->last_name); ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Ism :
												<span class="error">
													<?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<?php echo e($message); ?>

													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
											</label>
											<input readonly type="text" class="form-control" name="first_name" value="<?php echo e($data->first_name); ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sharif :
												<span class="error">
													<?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<?php echo e($message); ?>

													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</span>
											</label>
											<input readonly type="text" class="form-control" name="middle_name" value="<?php echo e($data->middle_name); ?>">
										</div>
									</div>
								</div>
							</div>


							<div class="col-md-4">
								<div class="form-group">
									<label>Username :
										<span class="error">
											<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<?php echo e($message); ?>

											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</span>
									</label>
									<input readonly type="text" class="form-control" name="username" value="<?php echo e($data->username); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label id="showpass">Parol : <i style="font-size: 18px" class="dw dw-eye ml-3"></i>
										
									</label>
									<input id="mkpassinput" readonly  type="text" class="form-control" name="username" value="<?php echo e($data->getPass()); ?>">
								</div>
							</div>

						</div>
                </div>
            </div>
            

        </div>

        <div class="card-box mb-30">
            <div class="pb-20 ">
                <table class="table hover data-table-export ">
                    <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">#</th>
                        <th>ID</th>
                        <th>Nomi</th>
                        <th>Savollar soni</th>
                        <th>Turlar bo'yicha taqsimoti</th>
                        <th>Turlar soni</th>
                        <th>Holati</th>
                        <th class="table-plus datatable-nosort"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><a class="p-1" href="<?php echo e(route('xquestion', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                        <td><a class="p-1" href="<?php echo e(route('xquestion', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                        <td><?php echo e($item->questions_count); ?></td>
                        <td>
                            <?php if(isset($item->json_question_count)): ?>
                            <?php $json_question = json_decode($item->json_question_count); ?>
                            <?php $__currentLoopData = $json_question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span style="border: blue 2px solid; margin-right: 3px"> <?php echo e($type); ?> : <?php echo e($count); ?> </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </td>
                        <td><?php echo e($item->type_count); ?></td>

                        <td><?php if($item->status == 1): ?>
                            <?php echo e('Faol'); ?>

                            <?php elseif($item->status == 0): ?>
                            <?php echo e("Nofaol"); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="p-1" href="<?php echo e(route('xquestion', $item->id)); ?>"><i class="dw dw-eye"></i></a>
                            <!--                            <a class="p-1" href="<?php echo e(route('xquestion', $item->id)); ?>"><i class="dw dw-edit2"></i></a>-->
                            <a class="p-1" onclick="mk_conform()" href="<?php echo e(route('xqdepartmentdel', $item->id)); ?>"><i
                                        class="dw dw-delete-3"></i> </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$("#mkpassinput").hide();
$( "#showpass" ).click(function() {
	
  $("#mkpassinput").show();
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/attestat/resources/views/mk/pages/user/show.blade.php ENDPATH**/ ?>