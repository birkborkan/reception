 <?php
 $fatora_num = "SD".rand(0,999999999);
 $_SESSION['fatora_num'] = $fatora_num;
 include "connect.php";
 
 $pa_name = $_POST['pa_name'];
 $pa_id = $_POST['pa_id'];
 $pa_gender = $_POST['pa_gender'];
 $pa_age = $_POST['pa_age'];
 $pa_phone = $_POST['pa_phone'];
 $select  = mysqli_query($conn,"select * from fhs  order by fhs_id desc");
 //pa_id,pa_name,pa_gender,pa_age,phone,fatora_num
 echo "<div style='text-align:right;' >";?>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search_fhs("search_text","fhs_search.php","stay_id","<?php echo $pa_id;?>","<?php echo $pa_name;?>","<?php echo $pa_gender;?>","<?php echo $pa_age;?>","<?php echo $pa_phone;?>","<?php echo $fatora_num;?>");' onkeyup = 'search_fhs("search_text","fhs_search.php","stay_id","<?php echo $pa_id;?>","<?php echo $pa_name;?>","<?php echo $pa_gender;?>","<?php echo $pa_age;?>","<?php echo $pa_phone;?>","<?php echo $fatora_num;?>");'/>
 <?php echo "
 </div>";
  
 echo"<div class='row'>";
 echo"<div class='col-7' id = 'stay_id'>";
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

<span class='btn btn-success' onclick='add_patient_fhs("<?php echo  $row["fhs_id"]?>" ,"<?php echo  $row["fhs_name"]?>" ,"<?php echo  $row["fhs_price"]?>"  ,"<?php echo  $pa_name;?>"  ,"<?php echo  $pa_phone;?>","<?php echo  $pa_id;?>","<?php echo  $_SESSION["fatora_num"];?>"  )'> +  </span>
 
 <?php
 echo"
</td>
</tr>";

 }
 echo "</table>";
  
 echo"</div>";
 
 echo"<div class='col-4' style='text-align:right;'>";
 echo"<div style='background:#005b5b;color:white;padding:3px;'>";
  echo"<span> اسم المريض : </span>";
  echo"<span>".$pa_name."</span> <br>";

  echo"<span>  العمر   : </span>";
  echo"<span>".$pa_age."</span> <br>";

  echo"<span>  النوع   : </span>";
  echo"<span>".$pa_gender."</span> <br>";
  echo "</div>";
  echo "<div id ='fhs_content'  >";
  
  ?>
  
  <span class='btn btn-success' onclick='to_print("<?php echo $pa_id;?>")'>إجراء</span>
  <?php
  
  @$fhs_date = date("Y-m-d");
  $select = mysqli_query($conn,"select * from fhs_op_temp where pa_id = '$pa_id' and fhs_date = '$fhs_date'");
   
  if(mysqli_num_rows($select)>0){
    echo"<table class='table' style='background:#005b5b;color:white;padding:3px;'>
    <tr>
    <td>#</td>
    <td>اسم الفحص</td>
    <td>السعر</td>
   
    <tr>";
    $counter = 0;
    $sum_price = 0;
while($rows = mysqli_fetch_assoc($select)){
    $counter++;
    $sum_price += $rows['fhs_price'];
   echo "<tr>
   <td>".$counter."</td>
   <td>".$rows['fhs_name']."</td>
   <td>".$rows['fhs_price']."</td>
   ";?>
   <td>   
   <span class='btn btn-danger' onclick='delete_fhs_item("<?php echo  $rows["fhs_op_id"];?>","<?php echo  $pa_id;?>" )'>  X </span>
    </td>
   <?php
   echo"
   </tr>";
}
echo"<tr>
<td>المجموع المبلغ</td>
<td colspan='3'>".$sum_price."</td>
</tr>";
echo "</table>";
}
  
  echo"</div>";
 echo"</div";
 echo"</div";
 ?>
 