<?php 
include "connect.php";
$user_id = $_POST['user_id'];


  $select = mysqli_query($conn,"select * from ratb where user_id = '$user_id'");
  
 
  echo "<table class= 'table' style='text-align:right;' >
  <tr style='background:#eee;color:green;'>
  <td width='5%'>#</td>
  <td width='20%'>اسم الموظف</td>
  <td width='15%'>   المرتب الاساسي</td>
  <td width='7%'>   الشهر</td>
  <td width='7%'>الخصم</td>
  <td width='1%'>العلاوه</td>
  <td width='15%'>المرتب الكلي</td>
  
   
 
   
  </tr>
  
  
  ";
  $counter = 0;
   
  while($row = mysqli_fetch_assoc($select)){
      $counter++;
      $all_ratb = $row['ratb_price'] + $row['ratb_alawa'] - $row['ratb_khsm'];
 echo "<tr>
 <td>".$counter."</td>
 <td>".$row['mwzf_name']."</td>
 <td>".$row['ratb_price']."</td>
 <td>".$row['ratb_month']."</td>
 <td>".$row['ratb_khsm']."</td>
 <td>".$row['ratb_alawa']."</td>
 <td>".$all_ratb."</td>
 ";
  ?>
 
  <?php
  echo"
 
 </tr>";
  }
  
  ?>
  