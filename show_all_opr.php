 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from opr  order by opr_id desc");
 echo "<div style='text-align:right;' >";?>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search("search_text","show_all_opr_search.php","stay_id");' onkeyup = 'search("search_text","show_all_opr_search.php","stay_id")'/>
 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
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
 