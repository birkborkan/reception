<?php 
include "connect.php";

$ratb_id = $_POST['ratb_id'];
$ratb_khsm = $_POST['ratb_khsm'];
$ratb_alawa = $_POST['ratb_alawa'];
 



 
$update = mysqli_query($conn,"update  ratb set 
ratb_alawa = '$ratb_alawa',ratb_khsm = '$ratb_khsm'  where ratb_id = '$ratb_id'");
if($update){
    echo "done";
}
 


?>