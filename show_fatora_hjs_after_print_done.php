<?php 
include "connect.php";
session_start();
 $khorfa_id = $_POST['khorfa_id'];
 

 
    $select = mysqli_query($conn,"select * from khorfa where khorfa_id = '$khorfa_id'");
  
       $row = mysqli_fetch_assoc($select);
       $pa_name = $row['pa_name'];
       $pa_life = $row['pa_life'];
       $pa_gender = $row['pa_gender'];
       $pa_age = $row['pa_age'];
       $time_stay = $row['time_stay'];
       $start_date = $row['start_date'];
       $khorfa_price_hjz = $row['khorfa_price'];
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
       
    

 


?>