@extends('mk.layouts.master')

@section('link')

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

    @media print {
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
@endsection
@section('content')
{{--
<div class="main-container"> --}}
    <div class="xs-pd-20-10 pd-ltr-20">
        {{--
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Asosiy</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Statistika</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="p-2 m-2" href="#">
                        <i class="icon-copy dw dw-list" style="font-size: 20px"></i>
                    </a>
                    <a class="btn btn-primary " href="#" role="button">
                        Yangi hujjat kiritish
                    </a>
                </div>
            </div>
        </div>
        --}}
        <div class="pd-20 card-box mb-30" id="noprint">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Таркибий бўлинмани танланг </h4>
                </div>

            </div>
            <form autocomplete="off" id="form-doc-mk" action="{{ route('mk') }}" class="" method="HEAD"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        @isset($data)
                        <select name="department_id" class=" form-control" name="state"
                                style="width: 100%; height: 38px;">
                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                        </select>
                        @else

                        <select name="department_id" class="custom-select2 form-control" name="state"
                                style="width: 100%; height: 38px;">
                            <optgroup label="Таркибий бўлинмани қидириш...">
                                <option value="" disabled selected> Таркибий бўлинмани танланг</option>
                                @foreach ($department as $dep_one)
                                <option value="{{$dep_one->department_id}}">{{$dep_one->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @endisset
                    </div>

                    <div class="col-md-3">
                        @isset($data)
                        <button type="supmit" disabled class="btn btn-outline-primary w-100">Саволлар шакллантириш
                        </button>
                        @else
                        <button type="supmit" class="btn btn-outline-primary w-100">Саволлар шакллантириш</button>
                        @endisset
                    </div>
                </div>
            </form>
        </div>
        {{-- 1 --}}
        @isset($data)
        <div class="pd-20 card-box mb-30" id="mkprint">

            <div id="mkprintbar" class="pb-5">
                <div class="row">
                    <div class="col-md-3 ">
                            <span class="user-icon">
                                <img style="width: 160px;" src="{{ asset('tsul.png') }}" alt="TSUL">
                            </span>
                    </div>
                    <div class="col-md-9">
                        <div class="product-detail-desc card-box height-100-p">
                            <h2 class="pt-5">TOSHKENT DAVLAT YURIDIK UNIVERSITETI</h2>
                        </div>
                    </div>
                </div>

                <div class="">
                    <h3 class="text-blue h4 pt-5" style="font-size: 24px; text-align: center;">Таркибий бўлинма номи:
                        {{$dep->name}}</h3>
                </div>
            </div>
            <div class="clearfix">
                <div class="">
                    <h3 class="text-blue h4" style="font-size: 24px; text-align: center;">Саволлар танлови</h3>
                </div>

                @isset($data['main'])
<!--                <div class="pl-2">-->
<!--                    <h3 class="text-blue h4" style="font-size: 24px;">Умумий савол:</h3>-->
<!--                </div>-->
                <div class="pl-5">
                    @foreach ($data['main'] as $main)
                    <h4 class="text-blue h4">{{$main->question}}</h4> <br>

                    @endforeach
                </div>
                @endisset
                <br>
                @isset($data['question_logic'])
<!--                <div class="pl-2">-->
<!--                    <h3 class="text-blue h4" style="font-size: 24px;">Бўлим бўйича савол:</h3>-->
<!--                </div>-->
                <div class="pl-5">
                    @foreach ($data['question_logic'] as $question_logic)
                    <h4 class="text-blue h4">{{$question_logic->question}}</h4> <br>

                    @endforeach
                </div>
                @endisset
                <br>

                @isset($data['question_kazus'])
<!--                <div class="pl-2">-->
<!--                    <h3 class="text-blue h4" style="font-size: 24px;">Казус:</h3>-->
<!--                </div>-->
                <div class="pl-5">
                    @foreach ($data['question_kazus'] as $question_kazus)
                    <h4 class="text-blue h4">{{$question_kazus->question}}</h4> <br>

                    @endforeach
                </div>
                @endisset

            </div>
            <div id="mk_fio_shower">
                <div class="pt-5 row" style="margin-top: 80px !important;">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        _______________________________________________ <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Номзод Ф.И.О
                    </div>
                    <div class="col-md-2"> _______________ <br> &nbsp;&nbsp;&nbsp;&nbsp; ( имзо )</div>
                </div>
            </div>
        </div>

        <button id="mkprintonclick" class="btn btn-outline-primary w-100 mb-20">Chop etish</button>
        <a href="{{route('clear')}}" id="mktasdiqlash" class="btn btn-outline-primary my-3">Tasdiqlash</a>
        @endisset

    </div>
    {{--
</div> --}}
@endsection

@section("js")
@if (session('mk_uji_bor'))
<script type="text/javascript">
    // $('#sa-test').click(function () {
    $(document).ready(function () {
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
@endif
<script type="text/javascript">
    $('#mkprintonclick').on("click", function () {

        window.print();

        $('#mktasdiqlash').css('display', 'block');
    });
</script>

@endsection
