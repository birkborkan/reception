<?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from ratb  order by ratb_id desc");
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم الموظف</td>
 <td width='15%'>   المرتب الاساسي</td>
 <td width='7%'>   الشهر</td>
 <td width='7%'>الخصم</td>
 <td width='1%'>العلاوه</td>
 <td width='15%'>المرتب الكلي</td>
 
  

 <td width='20%'>الخيارات</td>
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
<td>
<span class='btn btn-success' onclick='edit_ratb("<?php echo  $row["ratb_id"];?>", "<?php echo  $row["ratb_khsm"];?>","<?php echo  $row["ratb_alawa"];?>" )'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='delete_ratb("<?php echo  $row["ratb_id"]?>" )'>  حذف </span>
 
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 