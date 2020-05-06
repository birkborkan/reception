<?php 
include "connect.php";

$pa_name = $_POST['pa_name'];
$pa_gender = $_POST['pa_gender'];
$pa_life = $_POST['pa_life'];
$pa_age = $_POST['pa_age'];
$pa_phone = $_POST['pa_phone'];
$pa_id = $_POST['pa_id'];
 
 
 



if(!empty($pa_name)){
$update = mysqli_query($conn,"update  patient set 
pa_name = '$pa_name',pa_gender = '$pa_gender',pa_age='$pa_age',pa_life='$pa_life',
pa_phone='$pa_phone'  where pa_id = '$pa_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>