<?php 
include "connect.php";

$doc_name = $_POST['doc_name'];
$doc_type = $_POST['doc_type'];
$doc_price = $_POST['doc_price'];
 
$doc_phone = $_POST['doc_phone'];

if(!empty($doc_name) and !empty($doc_type)){
$insert = mysqli_query($conn,"insert into docter(doc_name,doc_type,doc_phone,doc_price)
values('$doc_name','$doc_type','$doc_phone','$doc_price')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>