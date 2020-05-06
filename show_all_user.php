<?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from users  order by user_id desc");
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم بالكامل</td>
 <td width='15%'>اسم المستخدم</td>
 <td width='15%'>الحالة</td>
 <td width='15%'>الصلاحية</td>
 
  

 <td width='20%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['full_name']."</td>
<td>".$row['user_name']."</td>
";
if($row['user_status'] == '1'){
echo "<td>نشط</td>";
}else if($row['user_status'] == '2'){
    echo "<td>موقوف</td>"; 
}

if($row['user_slahia'] == '1'){
echo "<td>مدير</td>";
}else if($row['user_slahia'] == '2'){
    echo "<td>استقبال</td>"; 
}else if($row['user_slahia'] == '3'){
    echo "<td>محاسب</td>"; 
}

 ?>
<td>
<span class='btn btn-success' onclick='edit_user("<?php echo  $row["user_id"];?>", "<?php echo  $row["full_name"];?>","<?php echo  $row["user_name"];?>", "<?php echo  $row["user_password"];?>","<?php echo  $row["user_slahia"];?>","<?php echo  $row["user_status"];?>" )'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='delete_user("<?php echo  $row["user_id"]?>" )'>  حذف </span>
 
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 