<?php 
include "connect.php";
$mog_id = $_POST['mog_id'];
$mog_price = $_POST['mog_price'];
$mog_dis = $_POST['mog_dis'];
$x =  ($mog_dis*$mog_price)/100;
$process = $mog_price - $x;

@$mog_date = date("Y-m-d");


$money_to_insert =  round($process,0);
$update = mysqli_query($conn,"update mogabla set doc_price = '$money_to_insert' where mog_id = '$mog_id'");
if($update){
    $select = mysqli_query($conn,"select * from mogabla where mog_id = '$mog_id'");
    $row = mysqli_fetch_assoc($select);
   ?>
<div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <span>اسم المريض : <?php echo $row['pa_name'];?></span><br>
  
 <hr>
 <div>
 <h3>الإجراء :-</h3>
 <h5> مقابلة طبيب <?php  echo $row['doc_name'];?>
 <div> 
 <div>
 <h5> تاريخ المقابلة :</h5>
 <span><?php  echo $mog_date; echo ": </span>   ";?>
 <span style='font-size:12px;color:gray;'> تم تخفيض المبلغ بنسبة </span> <span><?php echo $mog_dis;?>  %</span>
 <br>
<span>المبلغ </span> <span><?php echo $money_to_insert;?>  جنيه</span>
 <div>
 </div>
   <?php
}
?>