<?php 
include "connect.php";
$fatora_num = $_POST['fatora_num'];
 


$fhs_dis = $_POST['fhs_dis'];

$select_fatora_num = mysqli_query($conn,"select * from fhs_op where fatora_num  = '$fatora_num'");

$mony = 0;
while($rfn = mysqli_fetch_assoc($select_fatora_num)){
      $fhs_price  = $rfn['fhs_price'];
      $fhs_op_id  = $rfn['fhs_op_id'];

    $x =  ($fhs_dis*$fhs_price)/100;
    $process = $fhs_price - $x;
    $money_to_insert =  round($process,0);
$update = mysqli_query($conn,"update fhs_op set fhs_price = '$money_to_insert' where fhs_op_id = '$fhs_op_id'");
$mony +=  $money_to_insert;
}





if($update){
   
   ?>
<div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <?php
 $select = mysqli_query($conn,"select * from fhs_op where fatora_num = '$fatora_num'  ");


if(mysqli_num_rows($select) > 0){
    $select2 = mysqli_query($conn,"select * from fhs_op where fatora_num = '$fatora_num' ");

    $rows2 = mysqli_fetch_assoc($select2);
    echo "<div style='float:right;font-size:21px;'>اسم المريض :<br> ".$rows2['pa_name']."</div>";
    echo "<div>الرقم   :  ".$rows2['fatora_num']."<div>";
echo "<table   class='table' style=''
style='text-align:right;'>
<tr style=''>
<td width='5%'style='text-align:right;'>#</td>
<td width='25%'style='text-align:center;font-weight:bold;font-size:22px;'> الفحوصات  </td>
</tr>
";
$counter = 0;
while($rows = mysqli_fetch_assoc($select)){
    $counter++;
    echo "<tr style=''>
    <td style='text-align:right;'>".$counter."</td>
    <td style='text-align:center;font-size:21px;'>".$rows['fhs_name']."</td>
    </tr>
    
    ";
}
echo "</table>";

}
?>
<hr>
 <span style='font-size:12px;color:gray;'> تم تخفيض المبلغ بنسبة </span> <span><?php echo $fhs_dis;?>  %</span>
 <br>
<span>المبلغ </span> <span><?php echo $mony ;?>  جنيه</span>
 <div>
 </div>
   <?php
}
?>