@extends('mk.layouts.master')
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/uz/uz-all.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
@section('content')
<div class="xs-pd-20-10 pd-ltr-20">

    <div class="pd-20 card-box" id="noprint">
        <div class="page-header">
            <div class="row">
                <div class="col-md-2 col-sm-12">

                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('x')}}">Bo'limlar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Savollar</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-7 col-sm-12">
                    <h5>Umumiy savollar</h5>
                   
                </div>
                <div class="col-md-3 col-sm-12 text-right"
                     style="    display: flex;justify-content: flex-end; align-items: center;">
                    <span class="close mr-5" style="font-size: 18px; "> <a href="{{ asset('shablon1.xlsx') }}">
                    Shablon <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                                            </span>

                    </a>
                    <a href="mk_excel_modal" data-toggle="modal" data-target="#mk_excel_modal"
                       class="bg-light-blue btn text-blue weight-500">
                        Excel yuklash
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
                        <th>Savol</th>
                        
                        <th>Holati</th>
                        <th class="table-plus datatable-nosort"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($data as $item)

                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->question}}</td>
                      

                        <td>@if ($item->status == 1)
                            {{'Faol'}}
                            @elseif ($item->status == 0)
                            {{"Nofaol"}}
                            @endif
                        </td>
                        <td>
                            <!--                            <a class="p-1" href="#"><i class="dw dw-eye"></i></a>-->
                            <!--                            <a class="p-1" href="#"><i class="dw dw-edit2"></i></a>-->
                            <a class="p-1" onclick="mk_conform()" href="{{route('maindel', $item->id)}}"><i
                                        class="dw dw-delete-3"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<!---->

<!-- Excel upload modal End -->
<div class="modal fade customscroll" id="mk_excel_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Faqat ushbu bo'lim uchun yuklang</h5>
                <span class="close" style="font-size: 18px; "> <a href="{{ asset('shablon.xlsx') }}">
                    Shablon <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                    </a>
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip"
                        data-placement="bottom" title="" data-original-title="Yopish">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-0">
                <div class="task-list-form">
                    <ul>
                        <li>
                            <form autocomplete="off" id="mk_form_add_dep" action="{{ route('mainupload') }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group row">
                                    <div class="col-md-12 row ">
                                        <div class="col-md-12">
                                            <div class="wrap">
                                                <div class="valign-middle">
                                                    <div class="form-group">
                                                        <label for="file" class="sr-only"> </label>
                                                        <input required="true" type="file" id="file"
                                                               class="form-control file-input" name="excel_file"
                                                               accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </li>

                    </ul>
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
<!-- Excel upload End -->

@endsection


@section("js")

<script>

    function mk_conform() {
        confirm("O'chirilsinmi?!");
    }

    var uploadField = document.getElementById("file");

    uploadField.onchange = function () {

        if (this.files[0].size > 3145680) {
            alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. 5 Mb dan kichikroq fayl tanlang!");
            this.value = "";
            $("#image_teg").attr("src", "");

        }
        ;
    };
    $('input[type="file"]').each(function () {
        // get label text
        var label = $(this).parents('.form-group').find('label.lab111').text();
        label = (label) ? label : 'Excel fayl tanlang';

        // wrap the file input
        $(this).wrap('<div class="input-file"></div>');
        // display label
        $(this).before('<span class="btn" style="width: 110%">' + label + '</span>');
        // we will display selected file here
        $(this).before('<span class="file-selected" style="height: 0px;"></span>');

        // file input change listener
        $(this).change(function (e) {
            // Get this file input value
            var val = $(this).val();

            // Let's only show filename.
            // By default file input value is a fullpath, something like
            // C:\fakepath\Nuriootpa1.jpg depending on your browser.
            var filename = val.replace(/^.*[\\\/]/, '');

            // Display the filename
            $(this).siblings('.file-selected').text(filename);
        });
    });

    // Open the file browser when our custom button is clicked.
    $('.input-file .btn').click(function () {
        $(this).siblings('input[type="file"]').trigger('click');
    });
</script>


<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
@endsection

