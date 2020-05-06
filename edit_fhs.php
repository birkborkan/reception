<?php 
include "connect.php";

$fhs_name = $_POST['fhs_name'];
$fhs_price = $_POST['fhs_price'];
 
$fhs_id = $_POST['fhs_id'];



if(!empty($fhs_name) and !empty($fhs_price)){
$update = mysqli_query($conn,"update  fhs set 
fhs_name = '$fhs_name',fhs_price = '$fhs_price'  where fhs_id = '$fhs_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>