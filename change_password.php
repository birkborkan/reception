<?php
session_start();
include "connect.php";
$user_id = $_SESSION['user_id'];




 
$old_pass_e = $_POST['old_password_enter'];
$new_pass = $_POST['new_password'];
$new_pass_e = $_POST['new_password_enter'];
if(!empty($new_pass) and !empty($old_pass_e)and !empty($new_pass_e)){
   $update = mysqli_query($conn,"update users set user_password = '$new_pass' where user_id='$user_id'");
   if($update){
       echo "done";
   }
}else{
    echo "pls_fill_all";
}
?>