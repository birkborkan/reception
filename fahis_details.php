 <?php
 include "connect.php";
 $fatora_no = $_POST['fatora_no'];
 $select  = mysqli_query($conn,"select * from fhs_op where fatora_num ='$fatora_no'  order by fhs_op_id desc");

 
 echo "<table class= 'table' style='text-align:right;width:80%' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='37%'>اسم الفحص</td>

 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['fhs_name']."</td>


</tr>";
 }
 
 ?>
 