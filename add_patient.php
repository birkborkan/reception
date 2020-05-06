<?php 
include "connect.php";

$pa_name = $_POST['pa_name'];
$pa_age = $_POST['pa_age'];
$pa_life = $_POST['pa_life'];
$pa_gender = $_POST['pa_gender'];
$pa_phone = $_POST['pa_phone'];

if(!empty($pa_name) and !empty($pa_age)and !empty($pa_phone) ){
$insert = mysqli_query($conn,"insert into patient(pa_name,pa_gender,pa_phone,pa_life,pa_age)
values('$pa_name','$pa_gender','$pa_phone','$pa_life','$pa_age')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>