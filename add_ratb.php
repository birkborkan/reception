<?php 
session_start();
include "connect.php";
$user_id  = $_SESSION['user_id'];
$ratb_id = $_POST['ratb_name'];
$ratb_month = $_POST['ratb_month'];
$ratb_khsm = $_POST['ratb_khsm'];
$ratb_alawa = $_POST['ratb_alawa'];
 

if(!empty($ratb_month) and !empty($ratb_id)){
    $select = mysqli_query($conn,"select * from mwzf where mwzf_id = '$ratb_id'");
    $row = mysqli_fetch_assoc($select);
    $mwzf_name = $row['mwzf_name'];
    $mwzf_job = $row['mwzf_job'];
    $mwzf_price = $row['mwzf_price'];
    //ratb_id	mwzf_name	mwzf_job	mwzf_id	ratb_moth	ratb_alawa	ratb_khsm

$insert = mysqli_query($conn,"insert into 
ratb(mwzf_name,ratb_month,ratb_khsm,ratb_alawa,mwzf_id,mwzf_job,ratb_price,user_id)
values('$mwzf_name','$ratb_month','$ratb_khsm','$ratb_alawa','$ratb_id','$mwzf_job','$mwzf_price','$user_id')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>