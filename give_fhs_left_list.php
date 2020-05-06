<?php
include "connect.php";
$pa_id = $_POST['pa_id'];
@$fhs_date =  date("Y-m-d");
$select = mysqli_query($conn,"select * from fhs_op_temp where pa_id = '$pa_id' and fhs_date = '$fhs_date'");



?>
<span class='btn btn-success' onclick='to_print("<?php echo $pa_id;?>")'>إجراء</span>
<?php
if(mysqli_num_rows($select)>0){

    echo"<table class='table'>
    <tr>
    <td>#</td>
    <td>اسم الفحص</td>
    <td>السعر</td>
    <td>حذف</td>
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
   <span class='btn btn-danger' onclick='delete_fhs_item("<?php echo  $rows["fhs_op_id"];?>","<?php echo  $pa_id;?>")'> X  </span>
    
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