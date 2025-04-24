
<?php $__env->startSection('title'); ?>

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
                           Foydalanuvchi qo'shish
                            
                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                             asd asd asdf sf 
                            </li>
                        </ol>
                    </nav>
                </div>
               

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pd-20 card-box mb-30">
                   <form action="<?php echo e(route('user.store')); ?>"  method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							
							
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
											<input type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>">
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
											<input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>">
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
											<input type="text" class="form-control" name="middle_name" value="<?php echo e(old('middle_name')); ?>">
										</div>
									</div>
								</div>
							</div>

                            
							 <div class="col-md-4">
								<div class="form-group">
									<label>Username:
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
									<input type="text" class="form-control"  min="6"  placeholder="" name="username" value="<?php echo e(old('username')); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Parol:
										<span class="error">
											<?php $__errorArgs = ['password'];
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
									<input type="text" class="form-control"  min="6"  placeholder="" name="password" value="<?php echo e(old('password')); ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary pull-right m-2">Saqlash</button>
								</div>
							</div>
						</div>
					</form>
                </div>
            </div>
            

        </div>
              
    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

    // window.open('https://javascript.info');


// button.onclick = () => {
//   window.open('https://javascript.info');
// };

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/attestat/resources/views/mk/pages/user/create_.blade.php ENDPATH**/ ?>