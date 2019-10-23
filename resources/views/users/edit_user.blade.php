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
            <h3>แก้ไขข้อมูลผู้ใช้งาน <small>(Edit User){{--Graph title sub-title--}}</small></h3>
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
                <form method="POST" action="{{ route('register') }}">
                        @foreach ($users as $edit)
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - นามสกุล') }}</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $edit->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้งาน(Username)') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $edit->username }}" required autocomplete="username">

                                @error('username')
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
                                <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" value="{{ $edit->telephone }}" name="telephone" required pattern="[\d{3}[\-]\d{3}[\-]\d{4}]" maxlength="10">

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
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="3" required>{{ $edit->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('เพศ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="male" @php if($edit->gender == 'male' ){ echo 'selected';} @endphp>ชาย</option>
                                    <option value="female" @php if($edit->gender == 'female' ){ echo 'selected';} @endphp>หญิง</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                                    <option value="security" @php if($edit->status == 'security' ){ echo 'selected';} @endphp>เจ้าหน้าที่รักษาความปลอดภัย</option>
                                    <option value="admin" @php if($edit->status == 'admin' ){ echo 'selected';} @endphp>ผู้ดูแลระบบ</option>
                                </select>

                                @error('status')
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
                                    {{ __('แก้ไขข้อมูลผู้ใช้งาน') }}
                                </button>
                            </div>
                        </div>
                        @endforeach
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
