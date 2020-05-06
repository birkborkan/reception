<?php 
include "connect.php";
$khorfa_id = $_POST['khorfa_id'];
$khorfa_price = $_POST['khorfa_price'];
$khorfa_dis = $_POST['khorfa_dis'];
$x =  ($khorfa_dis*$khorfa_price)/100;
$process = $khorfa_price - $x;



$money_to_insert =  round($process,0);
$update = mysqli_query($conn,"update khorfa set khorfa_price = '$money_to_insert' where khorfa_id = '$khorfa_id'");
if($update){
    $select = mysqli_query($conn,"select * from khorfa where khorfa_id = '$khorfa_id'");
    $row = mysqli_fetch_assoc($select);
   ?>
<div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <span>اسم المريض : <?php echo $row['pa_name'];?></span><br>
 <span>  النوع : <?php echo $row['pa_gender'];?></span><br>
 <span>  السكن : <?php echo $row['pa_life'];?></span><br>
 <span>  العمر : <?php echo $row['pa_age'];?> سنة</span><br>
 <hr>
 <div>
 <h3>الإجراء :</h3><h3>  حجز سرير</h3>
 <span>مدة البقاء  :</span>
 <span> <?php  echo $row['time_stay']." يوم"; ?></span><br>
 <span>  تاريخ الحجز  :</span>
 <span> <?php  echo $row['start_date']; ?></span><br>
 <span style='font-size:12px;color:gray;'> تم تخفيض المبلغ بنسبة </span> <span><?php echo $khorfa_dis;?>  %</span>
 <br>
<span>المبلغ </span> <span><?php echo $money_to_insert;?>  جنيه</span>
 <div>
 </div>
   <?php
}
?>