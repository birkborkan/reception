<?php 
include "connect.php";

$msrof_byan = $_POST['msrof_byan'];
$msrof_price = $_POST['msrof_price'];
 
$msrof_id = $_POST['msrof_id'];



if(!empty($msrof_byan) and !empty($msrof_price)){
$update = mysqli_query($conn,"update  msrof set 
msrof_price = '$msrof_price',msrof_byan = '$msrof_byan'  where msrof_id = '$msrof_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>