<?php 
include "connect.php";
$delete_id = $_POST['delete_id'];
 
if($delete_id){
    mysqli_query($conn,"delete from fhs_op_temp where pa_id = '$delete_id'");
    echo "done";
}

?>