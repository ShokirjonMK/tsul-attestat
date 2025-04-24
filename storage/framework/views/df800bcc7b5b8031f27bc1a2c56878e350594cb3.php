<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<?php $__env->startSection('content'); ?>
<style>
    .mk_removeclass {
        /*z-index: 2;*/
        position: relative;
    }

    .mk_removeclass:hover::before {
        background-color: red;
        display: flex;
        align-items: center;
        justify-content: center;
        content: "x";
        position: absolute;
        z-index: 0;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }


</style>

<div class="xs-pd-20-10 pd-ltr-20">

    <div class="pd-20 card-box" id="noprint">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">

                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('mk')); ?>">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bo'limlar</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="mk_adding_department" data-toggle="modal" data-target="#mk_adding_department"
                       class="bg-light-blue btn text-blue weight-500">
                        Bo'lim qo'shish
                    </a>
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
                        <th>Umumiydan</th>

                        <th>Turlar bo'yicha taqsimoti</th>
                        <th>Turlar soni</th>
                        <th>Holati</th>
                        <th class="table-plus datatable-nosort"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><a class="p-1" href="<?php echo e(route('xquestion', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                        <td><a class="p-1" href="<?php echo e(route('xquestion', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                        <td style="text-align: center;" ><?php echo e($item->questions_count); ?></td>
                        <td style="text-align: center;" ><?php echo e($item->main); ?></td>
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

<!-- Department modal End -->
<div class="modal fade customscroll" id="mk_adding_department" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bo'lim qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                        data-placement="bottom" title="" data-original-title="Yopish">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-0">
                <div class="task-list-form">
                    <ul>
                        <li>
                            <form autocomplete="off" id="mk_form_add_dep" action="<?php echo e(route('xdepstore')); ?>"
                                  method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="form-group row">
                                    <label class="col-md-3">Nomi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" placeholder="Nomini kiriting..."
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Umumiy savollar</label>
                                    <div class="col-md-9">
                                        <input type="number"  required
                                               name="main" required
                                               placeholder="Turlar soni"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3">Turlar soni</label>
                                    <div class="col-md-9">
                                        <input type="number" onchange="mk_inpiut_dis_mis(this)" required
                                               name="type_count" id="mk_type_count" required
                                               placeholder="Turlar soni"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3">Tur taqsimoti</label>
                                    <div class="col-md-9 d-flex ">

                                        <span class="d-flex flex-wrap" id="mk_type_div">
                                       <span class="d-flex mr-3 mk_jonibek p-1"> <span type="button"
                                                                                       class="btn btn-primary"> 1 </span> <input
                                                   type="number"
                                                   disabled
                                                   style="width: 40px" name="type[1]"
                                                   class="mk_type_count_class"/> </span>
                                        </span>
                                        <span><button id="mk_add_type_button" type="button"
                                                      disabled class="btn btn-primary d-flex"> +add</button></span>

                                    </div>
                                </div>

                            </form>
                        </li>

                    </ul>
                </div>
                <div class="add-more-task">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                            class="icon-copy ti-close"></span> Yopish
                </button>
                <button type="submit" form="mk_form_add_dep" class="btn btn-primary"><i class="icon-copy fa fa-save"
                                                                                        aria-hidden="true"></i> Saqlash
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Department modal End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection("js"); ?>
<script>

    function mk_conform() {
        confirm("O'chirilsinmi?!");
    }

    $(document).ready(
        function () {

            if ($("#mk_type_count").val()) {
                $(".mk_type_count_class").disable(true)
            }

            $("#mk_add_type_button").click(function () {

                if ($('.mk_jonibek').length < parseInt($("#mk_type_count").val())) {

                    $("#mk_type_div").append(
                        '<span  id="removeid' + $('.mk_jonibek').length + '"  class="mk_jonibek p-1 d-flex mr-3">  <span onclick="mk_rem0ve(`removeid' + $('.mk_jonibek').length + '`)" type="button" class="mk_removeclass btn btn-primary"> ' + ($('.mk_jonibek').length + 1) + ' </span> <input type="number" class="mk_type_count_class" style="width: 40px" name="type[' + ($('.mk_jonibek').length + 1) + ']" /> </span>'
                    )

                } else {
                    $("#mk_add_type_button").disabled = true;
                }

            })

            $('.mk_removeclass').click(function () {
                console.log("1" + e)
            })
        }
    )

    function mk_rem0ve(e) {

        document.getElementById(e).remove()
    }

    function mk_inpiut_dis_mis(e) {

        var qiymat = $("#mk_type_count").val();
        if (qiymat > 0) {

            $('.mk_type_count_class').attr('disabled', false);
            $('#mk_add_type_button').attr('disabled', false);

        }
    }
</script>

<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/buttons.flash.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/src/plugins/datatables/js/vfs_fonts.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('mk.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/attestat/resources/views/mk/x/index.blade.php ENDPATH**/ ?>