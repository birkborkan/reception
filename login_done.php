<?php
session_start();
 include "connect.php";
 $username = $_POST['username'];
 $password = $_POST['password'];
 $select = mysqli_query($conn,"select * from users where user_name = '$username' and user_password='$password'");
 if(mysqli_num_rows($select) >0){
     $row = mysqli_fetch_assoc($select);
     $user_name = $row['user_name'];
     $user_password = $row['user_password'];
     $user_full_name = $row['full_name'];
     $user_slahia = $row['user_slahia'];
     $user_status = $row['user_status'];
     $user_id = $row['user_id'];
     if($user_password == $password and $user_name == $username){
if($user_status == 2){
    echo "stop";
}else{
         $_SESSION['user_name'] = $user_name;
         $_SESSION['user_password'] = $user_password;
         $_SESSION['user_slahia'] = $user_slahia;
         $_SESSION['user_status'] = $user_password;
         $_SESSION['full_name'] = $user_full_name;
         $_SESSION['user_id'] = $user_id;
         echo "done";
     }
     }

 }else{
     echo "nofound";
 }
  ?>