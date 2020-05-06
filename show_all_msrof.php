 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from msrof  order by msrof_id desc");
 echo "<div style='text-align:right;' >";?>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search("search_text","show_all_msrof_search.php","stay_id");' onkeyup = 'search("search_text","show_all_msrof_search.php","stay_id")'/>
 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='30%'> البيان  </td>
 <td width='15%'>المبلغ</td>
 <td width='22%'> التاريخ</td>

 <td width='28%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['msrof_byan']."</td>
<td>".$row['msrof_price']."</td>
<td>".$row['date']."</td>
 
<td> ";?>

<span class='btn btn-success' onclick='edit_msrof("<?php echo  $row["msrof_id"]?>", "<?php echo  $row["msrof_byan"]?>","<?php echo  $row["msrof_price"]?>" )'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='msrof_delete("<?php echo  $row["msrof_id"]?>" )'>  حذف </span>
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 