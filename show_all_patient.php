 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from patient  order by pa_id desc limit 100");
 echo "<div style='text-align:right;' >";?>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search("search_text","show_all_patient_search.php","stay_id");' onkeyup = 'search("search_text","show_all_patient_search.php","stay_id")'/>
 <?php echo "
 </div>";
 echo "<div id = 'stay_id'>";
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم</td>
 <td width='5%'>النوع</td>
 <td width='15%'>السكن</td>
 <td width='5%'>العمر</td>
 <td width='15%'>الهاتف</td>
 <td width='35%'>الخيارات</td>
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['pa_name']."</td>
<td>".$row['pa_gender']."</td>
<td>".$row['pa_life']."</td>
<td>".$row['pa_age']."</td>
<td>".$row['pa_phone']."</td>
<td> 
";?>
<span class='btn btn-success' onclick='edit_patient("<?php echo  $row["pa_id"]?>","<?php echo  $row["pa_name"]?>","<?php echo  $row["pa_gender"]?>","<?php echo  $row["pa_life"]?>","<?php echo  $row["pa_phone"]?>","<?php echo  $row["pa_age"]?>")'>تعديل</span>
<span class='btn btn-success'onclick='fhs_patient("<?php echo  $row["pa_id"]?>","<?php echo  $row["pa_name"]?>","<?php echo  $row["pa_gender"]?>","<?php echo  $row["pa_life"]?>","<?php echo  $row["pa_phone"]?>","<?php echo  $row["pa_age"]?>")'>فحص</span>
<span class='btn btn-success'onclick='mogabla("<?php echo  $row["pa_name"]?>","<?php echo  $row["pa_gender"]?>","<?php echo  $row["pa_life"]?>","<?php echo  $row["pa_age"]?>","<?php echo  $row["pa_id"]?>")'>مقابلة</span>
<span class='btn btn-success'onclick='hjz_khorfa("<?php echo  $row["pa_name"]?>","<?php echo  $row["pa_gender"]?>","<?php echo  $row["pa_life"]?>","<?php echo  $row["pa_age"]?>","<?php echo  $row["pa_id"]?>")'>ح.غرفة</span>
<span class='btn btn-success'onclick='opr("<?php echo  $row["pa_name"]?>","<?php echo  $row["pa_gender"]?>","<?php echo  $row["pa_life"]?>","<?php echo  $row["pa_age"]?>","<?php echo  $row["pa_id"]?>")'>عملية</span>


<?php  
echo"                                                                  

</td>
</tr>";
 }
 
 ?>
 </div>