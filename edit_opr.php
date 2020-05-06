<?php 
include "connect.php";

$opr_name = $_POST['opr_name'];
$opr_price = $_POST['opr_price'];
 
$opr_id = $_POST['opr_id'];



if(!empty($opr_name) and !empty($opr_price)){
$update = mysqli_query($conn,"update  opr set 
opr_name = '$opr_name',opr_price = '$opr_price'  where opr_id = '$opr_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>