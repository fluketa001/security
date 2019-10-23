
@extends('layouts.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>ข้อมูลโครงการ <small>(Project info){{--Graph title sub-title--}}</small></h3>
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
                        <th>ชื่อโครงการ</th>
                        <th>ที่อยู่</th>
                        <th>โทรศัพท์</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
			@foreach($enterprises as $key => $value)
                <tr>
                    <td align="center">{{ $loop->index+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->telephone }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <a class="btn btn-info" href="{{ URL::to('blogs/' . $value->id . '/edit') }}">Edit</a>
                        <button class="btn btn-danger" onclick="Delete()">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>



</div>
</div>
</div>

<script type="text/javascript">
    function Delete(){
        swal({   title: "คุณต้องการจะลบโครงการนี้!",
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
            document.location = "/enterprise";
            }
            else {
                swal("เย้", "โครงการนี้ไม่ถูกลบ!", "error");
                } });
    }
</script>
<!-- /page content -->
@endsection

