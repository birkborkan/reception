<?php
 @session_start();

 
 include "connect.php";
 $user_id=$_SESSION['user_id'];
 $user_sla=$_SESSION['user_slahia']; 
 @$date = date('Y-m-d');
 //convert(date,Date) = '@$date' 
 if( $user_sla == 1){   
 $select  = mysqli_query($conn,"select * from opration 
  where convert(date,Date) = '$date' order by opra_id desc");
 } else {
 $select  = mysqli_query($conn,"select * from opration 
  where convert(date,Date) = '$date'and user_id = '$user_id'  order by opra_id desc");
 }
 
 echo "<div style='text-align:right;' >";?>

 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
 echo "<table class= 'table' style='text-align:right;width:100%' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم المريض</td>
 <td width='20%'>اسم العملية</td>
 <td width='15%'>  المبلغ</td>
 <td width='15%'>  تاريخ العملية</td>

 <td width='25%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['pa_name']."</td>
<td>".$row['opr_name']."</td>
<td>".$row['opr_price']."</td>
<td>".$row['opr_date']."</td>
<td> ";?>

<span class='btn btn-success' onclick='show_fatora_opration_after_print_done("<?php echo  $row["opra_id"];?>")'>  طباعه </span>
 
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 