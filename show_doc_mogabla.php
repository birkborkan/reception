 <?php
 include "connect.php";
 $pa_id = $_POST['pa_id'];
 $select  = mysqli_query($conn,"select * from docter  order by doc_id desc");
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='30%'>اسم</td>
 <td width='25%'>التخصص</td>
 
 <td width='20%'> سعرالمقابلة</td>
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
<td>".$row['doc_price']."</td>
<td> ";?>

<span class='btn btn-success' onclick='show_doc_mogabla_done("<?php echo  $row["doc_name"];?>","<?php echo  $row["doc_type"];?>","<?php echo  $row["doc_id"];?>","<?php echo  $pa_id;?>")'> مقابلة</span>
 <?php
 echo"
</td>
</tr>";
 }
 
 ?>
 