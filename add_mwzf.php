<?php 
include "connect.php";
 
$mwzf_name = $_POST['mwzf_name'];
$mwzf_job = $_POST['mwzf_job'];
$mwzf_price = $_POST['mwzf_price'];
$mwzf_date = $_POST['mwzf_date'];
 

if(!empty($mwzf_name) and !empty($mwzf_job)and !empty($mwzf_price)){
$insert = mysqli_query($conn,"insert into 
   mwzf(mwzf_name,mwzf_job,mwzf_price,mwzf_date)
values('$mwzf_name','$mwzf_job','$mwzf_price','$mwzf_date')");
if($insert){
    echo "done";
}
}else{
    echo "pls_fill_all";
}


?>