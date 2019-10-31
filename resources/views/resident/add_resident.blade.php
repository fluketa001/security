@php
    if($user->status != "admin"){
        header( 'refresh: 0; url=/select-project' );
        exit(0);
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
            <h3>เพิ่มข้อมูลผู้พักอาศัย <small>(Add Resident){{--Graph title sub-title--}}</small></h3>
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
                <form method="POST" action="{{ route('resident.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('เพศ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" name="gender" required>
                                    <option value="male">ชาย</option>
                                    <option value="female">หญิง</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="home_number" class="col-md-4 col-form-label text-md-right">{{ __('บ้านเลขที่') }}</label>

                            <div class="col-md-6">
                                <input id="home_number" type="text" class="form-control @error('home_number') is-invalid @enderror" name="home_number" value="{{ old('home_number') }}" required autocomplete="home_number" placeholder="1188/405 A322">

                                @error('home_number')
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
                                <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" name="telephone" required pattern="[\d{3}[\-]\d{3}[\-]\d{4}]" maxlength="10" placeholder="0845216366">

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>

                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" placeholder="เจ้าของ/ผู้พักอาศัย/ผู้เช่า">

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="car_type" class="col-md-4 col-form-label text-md-right">{{ __('ชนิดรถ') }}</label>

                            <div class="col-md-6">
                                <input id="car_type" type="text" class="form-control @error('car_type') is-invalid @enderror" name="car_type" value="{{ old('car_type') }}" required autocomplete="car_type" placeholder="รถจักรยานยนต์/รถยนต์">

                                @error('car_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="license_plate" class="col-md-4 col-form-label text-md-right">{{ __('ทะเบียนรถ') }}</label>

                            <div class="col-md-6">
                                <input id="license_plate" type="text" class="form-control @error('license_plate') is-invalid @enderror" name="license_plate" value="{{ old('license_plate') }}" required autocomplete="license_plate" placeholder="กร4512">

                                @error('license_plate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enterprise_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อโครงการ') }}</label>

                            <div class="col-md-6">
                                <input id="enterprise_name" type="text" class="form-control @error('enterprise_name') is-invalid @enderror" name="enterprise_name" value="{{ $enterprises->name }}" required autocomplete="enterprise_name" readonly>

                                @error('enterprise_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('รูปภาพ') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture">

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>--}}

                        <div class="form-group row" style="margin-top:40px;">
                            <label for="status" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('เพิ่มผู้พักอาศัย') }}
                                </button>
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
