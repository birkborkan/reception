<?php 
include "connect.php";
$user_id = $_POST['user_id'];

  $select = mysqli_query($conn,"select * from msrof where user_id = '$user_id'");




  echo "<table class='table'>
  <tr>
  <td>#</td>
  <td>البيان</td>
   
  <td>المبلغ</td>
  <td>التاريخ</td>
  
  </tr>
  ";
  $count = 0;
  while($rows = mysqli_fetch_assoc($select)){
    $count++;
      echo "<tr>
      <td>".$count."</td>
      <td>".$rows['msrof_byan']."</td>
      <td>".$rows['msrof_price']."</td>
     
      <td>".$rows['date']."</td>
      </tr>";
  }

?>