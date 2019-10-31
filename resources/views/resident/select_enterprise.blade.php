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
<style>
    .center {
        margin: auto;
        width: 40%;
        text-align: center;
        padding: 10px;
    }
</style>
<!-- page content -->
<div class="right_col">

<div class="row">
    @if (session('Confirm'))
        <div class="alert alert-success">
            {{ session('Confirm') }}
        </div>
    @else
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif
<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>โครงการ <small>(Project info){{--Graph title sub-title--}}</small></h3>
        </div>
        <div class="col-md-6">
            <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                @include('layouts.time')
            </div>
        </div>
    </div>

    <div class="card center" style="font-size:20px;">
        <div class="card-header">{{ __('เลือกโครงการ') }}</div>
            <div class="card-body">
                @foreach($enterprises as $key => $value)
                <div class="form-group">
                    {{--<img src="/img/{{$value->picture}}" width="450px">--}}
                    <a href="{{ url('/resident',$value->id) }}"><button type="button" class="btn btn-primary btn-lg btn-block" style="padding:15px 15px 15px 15px;margin:10px 10px 10px 10px;">{{ $value->name }}</button></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
</div>
</div>
<!-- /page content -->
@endsection

