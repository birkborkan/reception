<?php 
include "connect.php";
$user_id = $_POST['user_id'];

  $select = mysqli_query($conn,"select * from khorfa where user_id = '$user_id'");




  echo "<table class='table'>
  <tr>
  <td>#</td>
  <td> اسم المريض</td>
  <td>مدة البقاء</td>
  <td>السعر</td>
  <td>تاريخ الحجز</td>
  <td>تاريخ </td>
  
  </tr>
  ";
  $count = 0;
  while($rows = mysqli_fetch_assoc($select)){
    $count++;
      echo "<tr>
      <td>".$count."</td>
      <td>".$rows['pa_name']."</td>
      <td>".$rows['time_stay']."</td>
      <td>".$rows['khorfa_price']."</td>
      <td>".$rows['start_date']."</td>
      <td>".$rows['date']."</td>
      </tr>";
  }

?>