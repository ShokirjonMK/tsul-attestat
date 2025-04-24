

<?php $__env->startSection('link'); ?>

<style>
    #mkprintbar{
        display: none;
    }
    #mktasdiqlash{
        display: none;
    }
    @media  print {
        #noprint  {
            display: none;
        }
        #mkprintonclick  {
            display: none;
        }
        #mkprint  {
            display: block;
        }
        #mkprintbar{
            display: block;
        }
    }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
        <div class="xs-pd-20-10 pd-ltr-20">
            
            <div class="pd-20 card-box mb-30" id="noprint">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Bo'limni tanlang </h4>
                    </div>
          
                </div>
                <form autocomplete="off" id="form-doc-mk" action="<?php echo e(route('mk')); ?>" class="" method="HEAD" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-9">
                            <?php if(isset($data)): ?>
                            <select name="department_id" class=" form-control" name="state" style="width: 100%; height: 38px;">
                                <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->name); ?></option>
                            </select>
                            <?php else: ?>

                            <select name="department_id" class="custom-select2 form-control" name="state" style="width: 100%; height: 38px;">
                                <optgroup label="Bo'limni qidirish...">
                                    <option value="" disabled selected> Tanlang </option>
                                    <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dep_one->id); ?>"><?php echo e($dep_one->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            </select>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                             <?php if(isset($data)): ?>
                            <button type="supmit" disabled class="btn btn-outline-primary w-100">Generatsitya qilish</button>
                            <?php else: ?>
                            <button type="supmit" class="btn btn-outline-primary w-100">Generatsitya qilish</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>    
          
            <?php if(isset($data)): ?>   
            <div class="pd-20 card-box mb-30" id="mkprint">

                <div id="mkprintbar"  class="pb-5">
                    <div class="row">
                        <div class="col-md-3 ">
                            <span class="user-icon">
                                <img style="width: 160px;" src="<?php echo e(asset('tsul.png')); ?>" alt="TSUL">
                            </span>
                        </div>
                        <div class="col-md-9">
                            <div class="product-detail-desc card-box height-100-p">
                                <h2 class="pt-3">Toshkent Davlat Yuridik Universiteti</h4>
                                <h4 class="mb-10 pt-4"><?php echo e($dep->name); ?></h4>
                            </div>                           
                        </div>                       
                    </div>
                </div>
              <div class="clearfix">
                    <div class="">
                        <h3 class="text-blue h4" style="font-size: 24px; text-align: center;">Саволлар</h3>
                    </div>
                    <?php if(isset($data['main'])): ?>
                    <div class="pl-2">
                        <h3 class="text-blue h4" style="font-size: 24px;">Умумий:</h3>
                    </div>
                        <div class="pl-5">
                            <?php $__currentLoopData = $data['main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h4 class="text-blue h4"><?php echo e($main->question); ?></h4>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($data['questions'])): ?>
                    <div class="pl-2">
                        <h3 class="text-blue h4" style="font-size: 24px;">Мутахасислик:</h3>
                    </div>
                        <div class="pl-5">
                            <?php $__currentLoopData = $data['questions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h4 class="text-blue h4"><?php echo e($question->question); ?></h4>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                  
                </div>  
            </div>     
            
            <button id="mkprintonclick" class="btn btn-outline-primary w-100">Chop etish</button>
            <a href="<?php echo e(route('clear')); ?>" id="mktasdiqlash" class="btn btn-outline-primary my-3">Tashdiqlash</a>
            <?php endif; ?>
          
        </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <?php if(session('mk_uji_bor')): ?>
		<script type="text/javascript">
		 // $('#sa-test').click(function () {
             $( document ).ready(function() {
            swal(
                {
                    type: 'error',
                    title: 'Muvaffaqiyatli!',
                    showConfirmButton: false,
                    timer: 1500
                }
                )
            });
            </script>
	<?php endif; ?>
<script type="text/javascript">
    $('#mkprintonclick').on("click", function(){

        window.print();

        $('#mktasdiqlash').css('display', 'block');
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tsul\tsul-attestation\resources\views/mk/pages/main.blade.php ENDPATH**/ ?>