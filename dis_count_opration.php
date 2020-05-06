<?php 
include "connect.php";
$opr_id = $_POST['opr_id'];
$opr_price = $_POST['opr_price'];
$opr_dis = $_POST['opr_dis'];
$x =  ($opr_dis*$opr_price)/100;
$process = $opr_price - $x;



$money_to_insert =  round($process,0);
$update = mysqli_query($conn,"update opration set opr_price = '$money_to_insert' where opra_id = '$opr_id'");
if($update){
    $select = mysqli_query($conn,"select * from opration where opra_id = '$opr_id'");
    $row = mysqli_fetch_assoc($select);
   ?>
<div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <span>اسم المريض : <?php echo $row['pa_name'];?></span><br>
  
 <hr>
 <div>
 <h3>الإجراء :-</h3>
 <h5>    عملية <?php  echo $row['opr_name'];?>
 <div> 
 <div>
 <h5> تاريخ العملية :</h5>
 <span><?php  echo $row['opr_date']; echo ": </span>   ";?>
 <span style='font-size:12px;color:gray;'> تم تخفيض المبلغ بنسبة </span> <span><?php echo $opr_dis;?>  %</span>
 <br>
<span>المبلغ </span> <span><?php echo $money_to_insert;?>  جنيه</span>
 <div>
 </div>
   <?php
}
?>