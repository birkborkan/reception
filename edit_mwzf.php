<?php 
include "connect.php";
$mwzf_id = $_POST['mwzf_id'];
$mwzf_name = $_POST['mwzf_name'];
$mwzf_price = $_POST['mwzf_price'];
$mwzf_job = $_POST['mwzf_job'];


if(!empty($mwzf_name) and !empty($mwzf_price)and !empty($mwzf_job)){
$update = mysqli_query($conn,"update  mwzf set 
mwzf_name = '$mwzf_name',mwzf_job = '$mwzf_job',mwzf_price='$mwzf_price' where mwzf_id = '$mwzf_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>