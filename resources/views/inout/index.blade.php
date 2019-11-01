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
            <h3>ข้อมูลประวัติรถเข้า-ออกโครงการ <small>(In-Out History info){{--Graph title sub-title--}}</small></h3>
        </div>
        <div class="col-md-6">
            <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                @include('layouts.time')
            </div>
        </div>
    </div>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ทะเบียนรถ</th>
                        <th>ชนิดรถ</th>
                        <th>สถานะ</th>
                        <th>ห้อง</th>
                        <th>เวลาเข้า</th>
                        <th>เวลาออก</th>
                    </tr>
                </thead>
                <tbody>
			@foreach($inouts as $key => $value)
                <tr>
                    <td align="center">{{ $loop->index+1 }}</td>
                    <td>{{ $value->license_plate }}</td>
                    <td>{{ $value->car_type}}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->description }}</td>
                    @php
                        $car_in = new DateTime($value->car_in);
                        $car_out = new DateTime($value->car_out);
                    @endphp
                    <td>@php echo $car_in->format('d-m-Y H:i:s'); @endphp</td>
                    <td>@php echo $car_out->format('d-m-Y H:i:s'); @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>



</div>
</div>
</div>

<script type="text/javascript">
    function Delete(data){
        swal({   title: "คุณต้องการจะลบผู้พักอาศัยนี้!",
        text: "คุณแน่ใจที่จะลบ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "ไม่ลบ!",
        confirmButtonText: "ยืนยันลบ!",
        closeOnConfirm: false,
        closeOnCancel: false },
        function(isConfirm){
            if (isConfirm)
            {
            //swal("Account Removed!", "Your account is removed permanently!", "success");
            document.location = "delete/"+data;
            }
            else {
                swal("เย้", "ผู้พักอาศัยนี้ไม่ถูกลบ!", "error");
                } });
    }
</script>
<!-- /page content -->
@endsection

