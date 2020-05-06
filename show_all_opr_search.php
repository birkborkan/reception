 <?php
 include "connect.php";
 $search_text = $_POST['search_text'];
 $select  = mysqli_query($conn,"select * from opr where opr_name like '%$search_text%' order by opr_id desc");
  
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='37%'>اسم العملية</td>
 <td width='37%'>السعر</td>
 
  

 <td width='21%'>الخيارات</td>
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

<span class='btn btn-success' onclick='edit_opr("<?php echo  $row["opr_id"]?>", "<?php echo  $row["opr_name"]?>","<?php echo  $row["opr_price"]?>" )'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='opr_delete("<?php echo  $row["opr_id"]?>" )'>  حذف </span>
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 