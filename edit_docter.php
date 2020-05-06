<?php 
include "connect.php";

$doc_name = $_POST['doc_name'];
$doc_type = $_POST['doc_type'];
$doc_phone = $_POST['doc_phone'];
$doc_price = $_POST['doc_price'];
$doc_id = $_POST['doc_id'];



if(!empty($doc_name) and !empty($doc_type)){
$update = mysqli_query($conn,"update  docter set 
doc_name = '$doc_name',doc_type = '$doc_type',doc_price='$doc_price',doc_phone ='$doc_phone' where doc_id = '$doc_id'");
if($update){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>