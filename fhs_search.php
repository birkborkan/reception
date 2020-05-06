 <?php
 include "connect.php";
  
 $pa_name = $_POST['pa_name'];
 $pa_id = $_POST['pa_id'];
 $pa_gender = $_POST['pa_gender'];
 $pa_age = $_POST['pa_age'];
 $pa_phone = $_POST['pa_phone'];
 $fatora_num = $_POST['fatora_num'];

 $search_text = $_POST['search_text'];
 $select  = mysqli_query($conn,"select * from fhs where fhs_name like '%$search_text%' order by fhs_id desc");
 echo "<table class= 'table' style='text-align:right; background:#008080; color:white;' >
 <tr style='background:#005b5b;'>
 <td width='5%'>#</td>
 <td width='37%'>اسم الفحص</td>
 <td width='37%'></td>
 
  

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
<span class='btn btn-success' onclick='add_patient_fhs("<?php echo  $row["fhs_id"]?>" ,"<?php echo  $row["fhs_name"]?>" ,"<?php echo  $row["fhs_price"]?>"  ,"<?php echo  $pa_name;?>"  ,"<?php echo  $pa_phone;?>","<?php echo  $pa_id;?>","<?php echo  $fatora_num;?>"  )'> +  </span>
 <?php
 echo"
</td>
</tr>";

 }
 echo "</table>";
 ?>
 