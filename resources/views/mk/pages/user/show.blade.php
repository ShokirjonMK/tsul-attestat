@extends('mk.layouts.master')
@section('title')
{{$data->getfio()}} 
@endsection
@section('link')
@endsection
@section('content')

<div class="xs-pd-20-10 pd-ltr-20">

    <div class="pd-20 card-box" id="noprint">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>
                           Foydalanuvchi ko'rish <a class="ml-2 p-1" href="{{route('user.edit',$data->id)}}" ><i class="dw dw-edit2"></i></a>

                        </h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mk')}}">Bosh</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Foydalanuvchilar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                            {{$data->getfio()}} 
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
													@error('last_name')
													{{ $message }}
													@enderror
												</span>
											</label>
											<input readonly type="text" class="form-control" name="last_name" value="{{ $data->last_name }}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label><span>*</span>Ism :
												<span class="error">
													@error('first_name')
													{{ $message }}
													@enderror
												</span>
											</label>
											<input readonly type="text" class="form-control" name="first_name" value="{{ $data->first_name}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sharif :
												<span class="error">
													@error('middle_name')
													{{ $message }}
													@enderror
												</span>
											</label>
											<input readonly type="text" class="form-control" name="middle_name" value="{{ $data->middle_name }}">
										</div>
									</div>
								</div>
							</div>


							<div class="col-md-4">
								<div class="form-group">
									<label>Username :
										<span class="error">
											@error('username')
											{{ $message }}
											@enderror
										</span>
									</label>
									<input readonly type="text" class="form-control" name="username" value="{{ $data->username}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label id="showpass">Parol : <i style="font-size: 18px" class="dw dw-eye ml-3"></i>
										
									</label>
									<input id="mkpassinput" readonly  type="text" class="form-control" name="username" value="{{$data->getPass()}}">
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
                    @php $i=1; @endphp
                    @foreach($department as $item)

                    <tr>
                        <td>{{$i++}}</td>
                        <td><a class="p-1" href="{{route('xquestion', $item->id)}}">{{$item->id}}</a></td>
                        <td><a class="p-1" href="{{route('xquestion', $item->id)}}">{{$item->name}}</a></td>
                        <td>{{$item->questions_count}}</td>
                        <td>
                            @isset($item->json_question_count)
                            @php $json_question = json_decode($item->json_question_count); @endphp
                            @foreach($json_question as $type => $count)
                            <span style="border: blue 2px solid; margin-right: 3px"> {{ $type}} : {{ $count }} </span>
                            @endforeach
                            @endisset

                        </td>
                        <td>{{$item->type_count}}</td>

                        <td>@if ($item->status == 1)
                            {{'Faol'}}
                            @elseif ($item->status == 0)
                            {{"Nofaol"}}
                            @endif
                        </td>
                        <td>
                            <a class="p-1" href="{{route('xquestion', $item->id)}}"><i class="dw dw-eye"></i></a>
                            <!--                            <a class="p-1" href="{{route('xquestion', $item->id)}}"><i class="dw dw-edit2"></i></a>-->
                            <a class="p-1" onclick="mk_conform()" href="{{route('xqdepartmentdel', $item->id)}}"><i
                                        class="dw dw-delete-3"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
@endsection

@section('js')
<script>
$("#mkpassinput").hide();
$( "#showpass" ).click(function() {
	
  $("#mkpassinput").show();
});

</script>

@endsection