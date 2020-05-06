<?php 
include "connect.php";
$delete_id = $_POST['delete_id'];
if($delete_id){
    mysqli_query($conn,"delete from khorfa where khorfa_id = '$delete_id'");
    echo "done";
}

?>