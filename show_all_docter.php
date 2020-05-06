 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from docter  order by doc_id desc");
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم</td>
 <td width='15%'>التخصص</td>
 
 <td width='15%'>الهاتف</td>
 <td width='25%'> سعرالمقابلة</td>
 <td width='20%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['doc_name']."</td>
<td>".$row['doc_type']."</td>
 
<td>".$row['doc_phone']."</td>
<td>".$row['doc_price']."</td>
<td> ";?>

<span class='btn btn-success' onclick='edit_docter("<?php echo  $row["doc_id"]?>","<?php echo  $row["doc_name"]?>","<?php echo  $row["doc_type"]?>","<?php echo  $row["doc_phone"]?>","<?php echo  $row["doc_price"]?>")'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='docter_delete("<?php echo  $row["doc_id"]?>" )'>  حذف </span>
 
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 