<?php 
include "connect.php";

$fhs_name = $_POST['fhs_name'];
$fhs_price = $_POST['fhs_price'];
 
 


if(!empty($fhs_name) and !empty($fhs_price)){
$insert = mysqli_query($conn,"insert into fhs(fhs_name,fhs_price)
values('$fhs_name','$fhs_price')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>