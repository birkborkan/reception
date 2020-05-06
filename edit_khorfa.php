<?php 
include "connect.php";

$time_stay = $_POST['time_stay'];
$khorfa_price = $_POST['khorfa_price'];
$khorfa_id = $_POST['khorfa_id'];



if(!empty($time_stay) and !empty($khorfa_price)){
$update = mysqli_query($conn,"update  khorfa set 
time_stay = '$time_stay',khorfa_price = '$khorfa_price'  where khorfa_id = '$khorfa_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>