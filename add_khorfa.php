<?php 
include "connect.php";

$khorfa_num = $_POST['khorfa_num'];
$khorfa_price = $_POST['khorfa_price'];


if(!empty($khorfa_price) and !empty($khorfa_num)){
    $select = mysqli_query($conn,"select * from khorfa where khorfa_num = '$khorfa_num'");
    if(mysqli_num_rows($select) > 0){
echo  "found";
    }else{
        $insert = mysqli_query($conn,"insert into khorfa(khorfa_num,khorfa_price)
        values('$khorfa_num','$khorfa_price')");
        if($insert){
            echo "done";
        }
    }

}else{
    echo "pls_fill_all";
}


?>