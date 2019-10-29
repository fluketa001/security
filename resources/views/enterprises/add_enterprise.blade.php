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
            <h3>เพิ่มโครงการใหม่ <small>(Add Enterprise){{--Graph title sub-title--}}</small></h3>
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
                <form method="POST" action="{{ route('enterprise.store') }}">
                    @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อโครงการ') }}</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                            <div class="col-md-6">
                                <font color="red">*ไม่ต้องใส่ ( - ) คั่นระหว่างเบอร์</font>
                                <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" name="telephone" required pattern="[\d{3}[\-]\d{3}[\-]\d{4}]" maxlength="10">

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="3" required></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('รูปภาพ') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture">

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top:40px;">
                            <label for="status" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('เพิ่มโครงการใหม่') }}
                                </button>
                                <a href="{{ URL('/enterprise') }}">
                                    <button type="button" class="btn btn-danger">
                                        {{ __('ย้อนกลับ') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
        </div>
    </div>
    </div>



</div>
</div>
</div>
<!-- /page content -->
@endsection
