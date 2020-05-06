<?php 
@session_start();
$user_id  = $_SESSION['user_id'];
include "connect.php";
$msrof_byan = $_POST['msrof_byan'];
$msrof_price = $_POST['msrof_price'];
$full_name = $_SESSION['full_name'];
 
 


if(!empty($msrof_byan) and !empty($msrof_price)){
$insert = mysqli_query($conn,"insert into msrof(msrof_byan,msrof_price,full_name,user_id)
values('$msrof_byan','$msrof_price','$full_name','$user_id')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>