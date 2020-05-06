<?php

include "connect.php";

$fatora_num = $_POST['fatora_num'];
$pa_name = $_POST['pa_name'];
 

$select = mysqli_query($conn,"select * from fhs_op where fatora_num = '$fatora_num'  ");
echo "<div style='float:right;font-size:21px;'>اسم المريض :<br> ".$pa_name."</div>";
echo "<div>الرقم   :  ".$fatora_num."<div>";
echo "<table   class='table' style=''
style='text-align:right;'>
<tr style=''>
<td width='5%'style='text-align:right;'>#</td>
<td width='25%'style='text-align:center;font-weight:bold;font-size:22px;'> الفحوصات  </td>
</tr>
";$counter = 0;
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
 
?>
<hr>
reprocessing