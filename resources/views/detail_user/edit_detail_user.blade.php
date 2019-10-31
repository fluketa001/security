@php
if(!empty($user)){
    if($user->status != "admin"){
        redirect()->to('/home')->send();
        exit(0);
    }
}else{
    redirect()->to('/home')->send();
}
@endphp

@extends('layouts.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>แก้ไขข้อมูลโครงการที่รับผิดชอบ <small>(Edit Enterprise){{--Graph title sub-title--}}</small></h3>
        </div>
        <div class="col-md-6">
            <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                @include('layouts.time')
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-md-8">
                <div class="card">
        <div style="margin:50px 50px 50px 50px;">
            @foreach ($users as $value_user)
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - นามสกุล')  }}</label>

                <div class="col-md-6">
                    <h4><label class="col-md-12 col-form-label text-md-right">{{ $value_user->name }}</label></h4>
                </div>
            </div>
            @endforeach
            <br>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" style="text-align:center;">{{ __('ชื่อโครงการ')  }}</label>

                <div class="col-md-6">
                </div>
            </div>
            @foreach ($users as $update)
                <form method="POST" action="{{ route('detail_user.update', $update->id) }}">
                    @foreach ($enterprises as $value)
                        @php
                            $n = 0;
                        @endphp
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ $value->name }}</label>

                            <div class="col-md-6">
                            @foreach ($detail_user as $value_detail)
                                @if($value->id == $value_detail->enterprises_id)
                                    {{--<input type="hidden" name="enterprise_id[]" value="{{ $value->id }}">--}}
                                    <input type="checkbox" class="form-control @error('name') is-invalid @enderror" name="detail_user[]" value="{{ $value->id }}" checked>
                                    @php $n = $n+1; @endphp
                                @endif
                            @endforeach
                            @if($n == 0)
                                {{--<input type="hidden" name="enterprise_id[]" value="{{ $value->id }}">--}}
                                <input type="checkbox" class="form-control @error('name') is-invalid @enderror" name="detail_user[]" value="{{ $value->id }}">
                            @endif
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group row" style="margin-top:40px;">
                            <label for="status" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('แก้ไขข้อมูลโครงการที่รับผิดชอบ') }}
                                </button>
                                <a href='{{ URL('/user') }}'>
                                    <button type='button' class='btn btn-danger'>
                                        {{ __('ย้อนกลับ') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                @endforeach
        </div>
        </div>
    </div>
    </div>



</div>
</div>
</div>
<!-- /page content -->
@endsection
