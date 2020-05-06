<?php
 @session_start();

 
 include "connect.php";
 $user_id=$_SESSION['user_id'];
 $user_sla=$_SESSION['user_slahia']; 
 @$date = date('Y-m-d');
 //convert(date,Date) = '@$date' 
 if( $user_sla == 1){   
 $select  = mysqli_query($conn,"select * from khorfa
  where convert(date,Date) = '$date' order by khorfa_id desc");
 } else {
 $select  = mysqli_query($conn,"select * from khorfa
  where convert(date,Date) = '$date'and user_id = '$user_id'  order by khorfa_id desc");
 }

  
 echo "<div style='text-align:right;' >";?>
  
 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='15%'>  اسم المريض    </td>
 <td width='10%'> النوع</td>
 <td width='15%'> السكن</td>
 <td width='10%'> العمر</td>
 <td width='10%'>تاريخ الحجز</td>
 <td width='5%'> زمن البقاء</td>
 <td width='7%'>  المبلغ  </td>
  
 
  

 <td width='33%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['pa_name']."</td>
<td>".$row['pa_gender']."</td>
<td>".$row['pa_life']."</td>
<td>".$row['pa_age']."</td>
<td>".$row['start_date']."</td>
<td>".$row['time_stay']."</td>
<td>".$row['khorfa_price']."</td>

 
<td style='font-size:12px;'> ";?>

<span style='width:40%;font-size:11px;'class='btn btn-success' onclick='show_fatora_hjs_after_print_done("<?php echo  $row["khorfa_id"];?>"  )'>   طباعه</span>
 
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 