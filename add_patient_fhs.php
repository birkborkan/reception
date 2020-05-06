<?php
session_start();
include "connect.php";
$fhs_name = $_POST['fhs_name'];
$fatora_num = $_POST['fatora_num'];
$fhs_price = $_POST['fhs_price'];
$fhs_id = $_POST['fhs_id'];
$pa_id = $_POST['pa_id'];
$pa_name = $_POST['pa_name'];
$pa_phone = $_POST['pa_phone'];

 
@$fhs_date = date("Y-m-d");
if($fhs_name){
    $select2 = mysqli_query($conn,"select * from fhs_op_temp where pa_id = '$pa_id' and convert(date,Date) = '$fhs_date' and fhs_id = '$fhs_id'");
    if(mysqli_num_rows($select2)>0){
 echo "found";
    }else{

    $insert = mysqli_query($conn,"insert into 
    fhs_op_temp(pa_name,pa_phone,fhs_name,fhs_price,fhs_date,fhs_id,pa_id,fatora_num)
    values('$pa_name','$pa_phone','$fhs_name','$fhs_price','$fhs_date','$fhs_id','$pa_id','$fatora_num')
    ");
            

?>
<span class='btn btn-success' onclick='to_print("<?php echo $pa_id;?>")'>إجراء</span>
<?php
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
<td>".$sum_price."</td>
</tr>";
echo "</table>";
}
}
}
?>