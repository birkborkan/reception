<?php
$conn = mysqli_connect("localhost","root","","std");









 
$username =$_POST['username'];
$password =$_POST['password'];
$id       =$_POST['url2'];
    $update = mysqli_query($conn,"update users set
    username='$username',password='$password' where id = '$id' ");
    echo "done";
 
?>