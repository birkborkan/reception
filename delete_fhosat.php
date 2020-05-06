<?php 
session_start();
include "connect.php";
$delete_id = $_POST['delete_id'];
$fhs_price = $_POST['fhs_price'];




if($delete_id){
    mysqli_query($conn,"delete from fhs_op where fatora_num = '$delete_id'");
     
    $insert = mysqli_query($conn,"insert into recicle_bin(full_name,bin_item,bin_price)
values('".$_SESSION['full_name']."','فاتورة فحوصات برقم :$delete_id','$fhs_price')");
    echo "done";
}

?>