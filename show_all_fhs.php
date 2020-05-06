 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from fhs  order by fhs_id desc");
 echo "<div style='text-align:right;' >";?>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search("search_text","show_all_fhs_search.php","stay_id");' onkeyup = 'search("search_text","show_all_fhs_search.php","stay_id")'/>
 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
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
 