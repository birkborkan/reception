<?php
 include "connect.php";
 $pa_id = $_POST['pa_id'];
 $select  = mysqli_query($conn,"select * from opr  order by opr_id desc");
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='30%'>اسم العملية</td>
 
 <td width='20%'>  المبلغ</td>
 <td width='20%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['opr_name']."</td>
<td>".$row['opr_price']."</td>
<td> ";?>

<span class='btn btn-success' onclick='show_opr_done("<?php echo  $row["opr_name"];?>","<?php echo  $row["opr_price"];?>","<?php echo  $row["opr_id"];?>","<?php echo  $pa_id;?>")'> اجراء عملية</span>
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 