<?php 
session_start();
include "connect.php";
$delete_id = $_POST['delete_id'];
if($delete_id){




    $select = mysqli_query($conn,"select * from fhs_op where fhs_op_id = '$delete_id'");
    $row = mysqli_fetch_assoc($select);
    $fhs_name = $row['fhs_name'];
    $fhs_price = $row['fhs_price'];
    mysqli_query($conn,"delete from fhs_op where fhs_op_id = '$delete_id'");
$insert = mysqli_query($conn,"insert into recicle_bin(full_name,bin_item,bin_price)
values('".$_SESSION['full_name']."','$fhs_name','$fhs_price')");
    echo "done";
}

?>