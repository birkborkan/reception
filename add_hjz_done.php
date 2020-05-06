<?php 
include "connect.php";
session_start();
$user_id = $_SESSION['user_id'];
 // pa_id,pa_name,pa_gender,pa_age,pa_life,time_stay,khorfa_price_hjz,start_date
$pa_id = $_POST['pa_id'];
$pa_name = $_POST['pa_name'];
$pa_gender = $_POST['pa_gender'];
$pa_age = $_POST['pa_age'];
$pa_life = $_POST['pa_life'];
$time_stay = $_POST['time_stay'];
$khorfa_price_hjz = $_POST['khorfa_price_hjz'];
$start_date = $_POST['start_date'];
@$today_date  = date("Y-m-d");
if(!empty($khorfa_price_hjz) and !empty($start_date)and !empty($time_stay)){
    $select = mysqli_query($conn,"select * from khorfa where pa_id = '$pa_id' and convert(date,Date) = '$today_date'");
    if(mysqli_num_rows($select) > 0){
echo  "found";
    }else{
        $insert = mysqli_query($conn,"insert into khorfa(pa_id,pa_name,pa_gender,pa_life,pa_age
        ,khorfa_price,time_stay,start_date,user_id)
        values('$pa_id','$pa_name','$pa_gender','$pa_life','$pa_age','$khorfa_price_hjz'
        ,'$time_stay','$start_date','$user_id')");
        if($insert){
            ?>
<div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <span>اسم المريض : <?php echo $pa_name;?></span><br>
 <span>  النوع : <?php echo $pa_gender;?></span><br>
 <span>  السكن : <?php echo $pa_life;?></span><br>
 <span>  العمر : <?php echo $pa_age;?> سنة</span><br>
 <hr>
 <div>
 <h3>الإجراء :</h3><h3>  حجز سرير</h3>
 <span>مدة البقاء  :</span>
 <span> <?php  echo $time_stay." يوم"; ?></span><br>
 <span>  تاريخ الحجز  :</span>
 <span> <?php  echo $start_date; ?></span><br>
</span>المبلغ </span> <span><?php echo $khorfa_price_hjz;?>  جنيه</span>
 <div>
 </div>
 
            <?php
        }
    }

}else{
    echo "pls_fill_all";
}


?>