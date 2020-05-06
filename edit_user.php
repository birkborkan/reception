<?php 
include "connect.php";

$full_name = $_POST['full_name'];
$user_name = $_POST['user_name'];
$user_slahia = $_POST['user_slahia'];
$user_status = $_POST['user_status'];

$user_id = $_POST['user_id'];
if(!empty($full_name) and !empty($user_name)){
$update = mysqli_query($conn,"update  users set 
full_name = '$full_name',user_name = '$user_name',user_slahia = '$user_slahia'  ,user_status = '$user_status'  where user_id = '$user_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>