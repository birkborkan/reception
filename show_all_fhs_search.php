 <?php
 include "connect.php";
 $search_text = $_POST['search_text'];
 $select  = mysqli_query($conn,"select * from fhs  where fhs_name like '%$search_text%' order by fhs_id desc");
  
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='37%'>اسم الفحص</td>
 <td width='37%'>السعر</td>
 
  

 <td width='21%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['fhs_name']."</td>
<td>".$row['fhs_price']."</td>
 
<td> ";?>

<span class='btn btn-success' onclick='edit_fhs("<?php echo  $row["fhs_id"]?>", "<?php echo  $row["fhs_name"]?>","<?php echo  $row["fhs_price"]?>" )'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='fhs_delete("<?php echo  $row["fhs_id"]?>" )'>  حذف </span>
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 