<?php 
include "connect.php";

$full_name = $_POST['full_name'];
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_slahia = $_POST['user_slahia'];
$user_status = $_POST['user_status'];
 
 


if(!empty($full_name) and !empty($user_name)and !empty($user_password)){
    $select = mysqli_query($conn,"select * from users where user_name = '$user_name'");
    if(mysqli_num_rows($select) > 0 ){
    echo "found";
    }else{
        $insert = mysqli_query($conn,"insert into users(full_name,user_name,user_password,user_slahia,user_status)
        values('$full_name','$user_name','$user_password','$user_slahia','$user_status')");
        if($insert){
            echo "done";
        }
    }

}else{
    echo "pls_fill_all";
}


?>