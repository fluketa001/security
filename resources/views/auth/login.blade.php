@extends('layouts.app')

<?php
    $_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",
        "04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",
        "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",
        "10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม");

    $vardate=date('Y-m-d');
    $yy=date('Y');
    $mm =date('m');$dd=date('d');
    if ($dd<10){
        $dd=substr($dd,1,2);
    }
    $date=$dd ." ".$_month_name[$mm]."  ".$yy+= 543;
?>

<script language="JavaScript" type="text/javascript">
    function sivamtime() {
    now=new Date();
    hour=now.getHours();
    min=now.getMinutes();
    sec=now.getSeconds();

    if (min<=9) { min="0"+min; }
    if (sec<=9) { sec="0"+sec; }
    if (hour>24) { hour=hour-24; }
    else { hour=hour; }

    time = ((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec;

    if (document.getElementById) { theTime.innerHTML = time; }
    else if (document.layers) {
    document.layers.theTime.document.write(time);
    document.layers.theTime.document.close(); }

    setTimeout("sivamtime()", 1000);
    }
    window.onload = sivamtime;

</script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div align="center"><img src="{{asset('img/Choose.png')}}" width="80%"></div>
            <div class="card">
                <div class="card-header">{{ __('เข้าสู่ระบบ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2" style="text-align:center;">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif--}}
                            </div>
                        </div>
                    </form>
                </div>
                <div align="center" class="form-group mb-4">
                    <?php echo $date; ?><br>
                    <!-- แก้ไขตำแหน่งของนาฬิกาที่ left และ top ครับ -->
                    เวลา <span id="theTime" style="font-family: Tahoma; color:#FF0000; font-size:20px;"></span> นาที
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
