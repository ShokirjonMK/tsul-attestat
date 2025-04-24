

<?php $__env->startSection('link'); ?>

    <style>
        #mkprintbar {
            display: none;
        }

        #mktasdiqlash {
            display: none;
        }

        #mk_fio_shower {
            display: none;
        }

        @media  print {
            #noprint {
                display: none;
            }

            #mkprintonclick {
                display: none;
            }

            #mkprint {
                display: block;
            }

            #mkprintbar {
                display: block;
            }

            #mk_fio_shower {
                display: block;
            }

            #mktasdiqlash {
                display: none !important;
            }
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="pd-20 card-box mb-30" id="noprint">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tarkibiy bo'linmani tanlang </h4>
                </div>

            </div>
            <form autocomplete="off" id="form-doc-mk" action="<?php echo e(route('mk')); ?>" class="" method="HEAD"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-9">
                        <?php if(isset($data)): ?>
                            <select name="department_id" class=" form-control" name="state" style="width: 100%; height: 38px;">
                                <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->name); ?></option>
                            </select>
                        <?php else: ?>

                            <select name="department_id" class="custom-select2 form-control" name="state"
                                style="width: 100%; height: 38px;">
                                <optgroup label="Tarkibiy bo'linmani qidirish...">
                                    <option value="" disabled selected> Tarkibiy bo'linmani tanlang</option>
                                    <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dep_one->department_id); ?>"><?php echo e($dep_one->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            </select>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-3">
                        <?php if(isset($data)): ?>
                            <button type="supmit" disabled class="btn btn-outline-primary w-100">Savol shakllantirish
                            </button>
                        <?php else: ?>
                            <button type="supmit" class="btn btn-outline-primary w-100">Savol shakllantirish</button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>


        <?php if(isset($data)): ?>
            <div class="pd-20 card-box mb-30" id="mkprint">

                <div id="mkprintbar" class="pb-5">
                    <div class="row">
                        <div class="col-md-3 ">
                            <span class="user-icon">
                                <img style="width: 160px;" src="<?php echo e(asset('tsul.png')); ?>" alt="TSUL">
                            </span>
                        </div>
                        <div class="col-md-9">
                            <div class="product-detail-desc card-box height-100-p">
                                <h2 class="pt-5" style="text-align: center">TOSHKENT DAVLAT YURIDIK UNIVERSITETI</h2>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <h3 class="text-blue h4 pt-5" style="font-size: 24px; text-align: center;">Tarkibiy bo'linma nomi:
                            <?php echo e($dep->name); ?></h3>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="">
                        <h3 class="text-blue h4" style="font-size: 24px; text-align: center;">Savol tanlovi</h3>
                    </div>

                    
                    <!--                <div class="pl-2">-->
                    <!--                    <h3 class="text-blue h4" style="font-size: 24px;">Умумий савол:</h3>-->
                    <!--                </div>-->
                    <div class="pl-2">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h4 class="text-blue h4"> <?php echo e($main->question); ?> <?php if(isset($main->file)): ?> <img width="450px" src="/question/<?php echo e($main->department_id); ?>/<?php echo e($main->file); ?>">  <?php endif; ?></h4> <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    

                </div>
                <div id="mk_fio_shower">
                    <div class="pt-5 row" style="margin-top: 80px !important;">
                        <div class="col-md-1"></div>
                        <div class="col-md-9">
                            _______________________________________________ <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            Nomzod F.I.O
                        </div>
                        <div class="col-md-2"> _______________ <br> &nbsp;&nbsp;&nbsp;&nbsp; ( imzo )</div>
                    </div>
                </div>
            </div>

            <button id="mkprintonclick" class="btn btn-outline-primary w-100 mb-20">Chop etish</button>
            <a href="<?php echo e(route('clear')); ?>" id="mktasdiqlash" class="btn btn-outline-primary my-3">Tasdiqlash</a>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php if(session('mk_uji_bor')): ?>
        <script type="text/javascript">
            // $('#sa-test').click(function () {
            $(document).ready(function() {
                swal({
                    type: 'error',
                    title: 'Muvaffaqiyatli!',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    <?php endif; ?>
    <script type="text/javascript">
        $('#mkprintonclick').on("click", function() {

            window.print();

            $('#mktasdiqlash').css('display', 'block');
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/attestat/resources/views/mk/pages/main.blade.php ENDPATH**/ ?>