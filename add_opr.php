<?php 
include "connect.php";

$opr_name = $_POST['opr_name'];
$opr_price = $_POST['opr_price'];

if(!empty($opr_name) and !empty($opr_price)){
$insert = mysqli_query($conn,"insert into opr(opr_name,opr_price)
values('$opr_name','$opr_price')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>