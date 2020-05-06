<?php
session_start();

include "connect.php";

$pa_id = $_POST['pa_id'];
$user_id = $_SESSION["user_id"];
 
@$fhs_date = date("Y-m-d");

$select_to_insert = mysqli_query($conn,"select * from fhs_op_temp where pa_id = '$pa_id' and fhs_date = '$fhs_date'");
while($row_to_insert = mysqli_fetch_assoc($select_to_insert)){
    $pa_name = $row_to_insert['pa_name'];
    $pa_phone = $row_to_insert['pa_phone'];
    $fhs_name = $row_to_insert['fhs_name'];
    $fhs_price = $row_to_insert['fhs_price'];
    $fhs_date = $row_to_insert['fhs_date'];
    $fhs_id = $row_to_insert['fhs_id'];
    $pa_id = $row_to_insert['pa_id'];
    $fatora_num = $row_to_insert['fatora_num'];

    $insert = mysqli_query($conn,"insert into 
    fhs_op(pa_name,pa_phone,fhs_name,fhs_price,fhs_date,fhs_id,pa_id,fatora_num,user_id)
    values('$pa_name','$pa_phone','$fhs_name','$fhs_price','$fhs_date','$fhs_id','$pa_id','$fatora_num','$user_id')
    ");
}
$select = mysqli_query($conn,"select * from fhs_op_temp where pa_id = '$pa_id' and fhs_date = '$fhs_date'");


if(mysqli_num_rows($select) > 0){
    $select2 = mysqli_query($conn,"select * from fhs_op_temp where pa_id = '$pa_id' and fhs_date = '$fhs_date'");

    $rows2 = mysqli_fetch_assoc($select2);
    echo "<div style='float:right;font-size:21px;'>اسم المريض :<br> ".$rows2['pa_name']."</div>";
    echo "<div>الرقم   :  ".$rows2['fatora_num']."<div>";
echo "<table   class='table' style=''
style='text-align:right;'>
<tr style=''>
<td width='5%'style='text-align:right;'>#</td>
<td width='12%'style='text-align:center;font-weight:bold;font-size:22px;'> الفحوصات  </td>
<td width='12%'style='text-align:center;font-weight:bold;font-size:22px;'> القيمة  </td>
</tr>
";
$counter = 0;
$fhs_sum = 0;
while($rows = mysqli_fetch_assoc($select)){
    $counter++;
    echo "<tr style=''>
    <td style='text-align:right;'>".$counter."</td>
    <td style='text-align:center;font-size:21px;'>".$rows['fhs_name']."</td>
    <td style='text-align:center;font-size:21px;'>".$rows['fhs_price']."</td>
    </tr>
    
    ";
    $fhs_sum +=$rows['fhs_price']; 
}
echo "<tr>
<td>مجموع المبلغ  ".$fhs_sum."</td>;
</tr>";
echo "</table>";

}
?>
<hr>