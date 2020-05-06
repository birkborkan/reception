<?php 
include "connect.php";
$user_id = $_POST['user_id'];

  $select = mysqli_query($conn,"select * from fhs_op where user_id = '$user_id'");




  echo "<table class='table'>
  <tr>
  <td>#</td>
  <td>الاسم</td>
  <td>الفحص</td>
  <td>السعر</td>
  <td>التاريخ</td>
  
  </tr>
  ";
  $count = 0;
  while($rows = mysqli_fetch_assoc($select)){
    $count++;
      echo "<tr>
      <td>".$count."</td>
      <td>".$rows['pa_name']."</td>
      <td>".$rows['fhs_name']."</td>
      <td>".$rows['fhs_price']."</td>
      <td>".$rows['date']."</td>
      </tr>";
  }

?>