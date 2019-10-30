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
    /*the container must be positioned relative:*/
    .custom-select {
      position: relative;
      font-family: Arial;
    }

    .custom-select select {
      display: none; /*hide original SELECT element:*/
    }

    .select-selected {
      background-color: DodgerBlue;
    }

    /*style the arrow inside the select element:*/
    .select-selected:after {
      position: absolute;
      content: "";
      top: 14px;
      right: 10px;
      width: 0;
      height: 0;
      border: 6px solid transparent;
      border-color: #fff transparent transparent transparent;
    }

    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
      border-color: transparent transparent #fff transparent;
      top: 7px;
    }

    /*style the items (options), including the selected item:*/
    .select-items div,.select-selected {
      color: #ffffff;
      padding: 6px 16px;
      border: 1px solid transparent;
      border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
      cursor: pointer;
      user-select: none;
      border-radius: 5px;
    }

    /*style items (options):*/
    .select-items {
      position: relative;
      background-color: DodgerBlue;
      top: 100%;
      left: 0;
      right: 0;
      z-index: 999;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    /*hide the items when the select box is closed:*/
    .select-hide {
      display: none;
    }

    .select-items div:hover, .same-as-selected {
      background-color: rgba(0, 0, 0, 0.1);
    }
    .custom{
        width: 200px;
        border-radius: 5px;
        padding:7px 7px 7px 7px;
    }

    </style>
<!-- page content -->
<div class="right_col" role="main">

<div class="row">
        @if (session('Confirm'))
            <div class="alert alert-success">
                {{ session('Confirm') }}
            </div>
        @endif
<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>ข้อมูลผู้ใช้งาน <small>(Users info){{--Graph title sub-title--}}</small></h3>
        </div>
        <div class="col-md-6">
            <div class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                @include('layouts.time')
            </div>
        </div>
    </div>
    <center><a href="/register"><button class="btn btn-success">เพิ่มผู้ใช้งาน</button></a></center>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align:center;">ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เบอร์โทร</th>
                        <th>ที่อยู่</th>
                        <th>เพศ</th>
                        <th>สถานะ</th>
                        {{--
                        @foreach($enterprises as $key => $value)
                        <th width="150" style="text-align:center;">{{ $value->name }}</th>
                        @endforeach
                        --}}
                        <th>โครงการที่รับผิดชอบ</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            @foreach($users as $key => $value)
                @php
                    $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2$3", $value->telephone);
                @endphp
                <tr>
                    {{--$users--}}
                    <td align='center' style="vertical-align: top;">{{ $loop->index+1 }}</td>
                    <td style="vertical-align: top;width:150px;">{{ $value->name }}</td>
                    <td align='center' style="vertical-align: top;width:120px;">{{ $formatted_number }}</td>
                    <td style="vertical-align: top;">{{ $value->address }}</td>
                    <td align='center' style="vertical-align: top;">@php if($value->gender == "male"){ echo"ชาย"; }else{ echo"หญิง"; } @endphp</td>
                    <td align='center' style="vertical-align: top;">{{ $value->status }}</td>
                    {{--
                    @foreach($enterprises as $key_enterprises => $value_enterprises)
                        @foreach($detail_user as $detail => $value_detail)
                            @php if( $value_enterprises->id == $value_detail->enterprises_id && $value_detail->user_id == $value->id ){
                                    echo "<td align='center'><input type='checkbox' name='{{$value->enterprises_id}}' value='{{$value->enterprises_id}}' checked disabled/></td>";
                                }else{
                                    echo "<td align='center'><input type='checkbox' name='{{$value->enterprises_id}}' value='{{$value->enterprises_id}}' disabled/></td>";
                                };
                            @endphp
                        @endforeach
                    @endforeach
                    --}}
                    <td align="center" style="vertical-align: top;">
                        <div style="width:220px;">
                            <div class="custom-select" style="width:220px;">
                                <select>
                                    @php
                                        $n = 0;
                                    @endphp
                                    @foreach($enterprises as $key_enterprises => $value_enterprises)
                                        @foreach($detail_user as $detail => $value_detail)
                                            @php
                                            if( $value_enterprises->id == $value_detail->enterprises_id && $value_detail->user_id == $value->id ){
                                                    $n = $n+1;
                                                    if($n == 1){
                                                        echo "<option selected='true' disabled='disabled'>มีโครงการ</option>";
                                                    }
                                                    echo "<option>{$value_detail->enterprises_name}</option>";
                                                }
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    @php
                                        if($n == 0){
                                            echo "<option selected='true' disabled='disabled'>ไม่มีโครงการที่รับผิดชอบ</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td width="150" style="vertical-align: top;">
                            <select class="custom btn-primary" onchange="location = this.value;">
                                <option selected="true" disabled="disabled">แก้ไข</option>
                                <option value="/user/{{$value->id}}/edit" style="position:relative;">แก้ไขข้อมูลผู้ใช้งาน</option>
                                <option value="/enterprise">แก้ไขข้อมูลโครงการที่รับผิดชอบ</option>
                            </select>
                    </td>
                    <td style="vertical-align: top;">
                        <button class="btn btn-danger" onclick="Delete({{$value->id}})">Delete</button>
                        {{--<a href="#" onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?');"><button class="btn btn-danger">Delete</button></a>--}}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>



</div>
</div>
</div>
<script type="text/javascript">
    function Delete(data){
        swal({   title: "คุณต้องการจะลบผู้ใช้นี้!",
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
            document.location = "user/delete/"+data;
            }
            else {
                swal("เย้", "ผู้ใช้ไม่ถูกลบ!", "error");
                } });
    }
    </script>
<script>

        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
          selElmnt = x[i].getElementsByTagName("select")[0];
          /*for each element, create a new DIV that will act as the selected item:*/
          a = document.createElement("DIV");
          a.setAttribute("class", "select-selected");
          a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
          x[i].appendChild(a);
          /*for each element, create a new DIV that will contain the option list:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "select-items select-hide");
          for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                  if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                      y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                  }
                }
                h.click();
            });
            b.appendChild(c);
          }
          x[i].appendChild(b);
          a.addEventListener("click", function(e) {
              /*when the select box is clicked, close any other select boxes,
              and open/close the current select box:*/
              e.stopPropagation();
              closeAllSelect(this);
              this.nextSibling.classList.toggle("select-hide");
              this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
          /*a function that will close all select boxes in the document,
          except the current select box:*/
          var x, y, i, arrNo = [];
          x = document.getElementsByClassName("select-items");
          y = document.getElementsByClassName("select-selected");
          for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
              arrNo.push(i)
            } else {
              y[i].classList.remove("select-arrow-active");
            }
          }
          for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
              x[i].classList.add("select-hide");
            }
          }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
        </script>
<!-- /page content -->
@endsection

