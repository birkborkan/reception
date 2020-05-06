 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from mwzf  order by mwzf_id desc");
 echo "<div style='text-align:right;' >";?>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search("search_text","show_all_msrof_search.php","stay_id");' onkeyup = 'search("search_text","show_all_msrof_search.php","stay_id")'/>
 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='30%'> الاسم  </td>
 <td width='15%'>الوظيفة</td>
 <td width='22%'> الراتب</td>

 <td width='28%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['mwzf_name']."</td>
<td>".$row['mwzf_job']."</td>
<td>".$row['mwzf_price']."</td>
<td> ";?>

<span class='btn btn-success' onclick='edit_mwzf("<?php echo  $row["mwzf_id"]?>", "<?php echo  $row["mwzf_name"]?>","<?php echo  $row["mwzf_job"]?>","<?php echo  $row["mwzf_price"]?>" )'>تعديل البيانات</span>
<span class='btn btn-danger' onclick='mwzf_delete("<?php echo  $row["mwzf_id"]?>" )'>  حذف </span>
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 