<?php
date_default_timezone_set("Asia/Bangkok");
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
<span><?php echo $date; ?></span> เวลา <span id="theTime" style="font-family: Tahoma; color:#FF0000; font-size:18px;"></span> นาที
