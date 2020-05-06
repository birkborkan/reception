<?php
session_start();
$user_id  = $_SESSION['user_id'];
 include "connect.php";
 $pa_id = $_POST['pa_id'];
 $opr_id = $_POST['opr_id'];
 $opr_date = $_POST['opr_date'];
 
//mog_id	doc_price	doc_name	pa_name	pa_id	doc_id	mog_date	date

if(!empty($opr_date)){
 $select  = mysqli_query($conn,"select * from opr  where opr_id = '$opr_id' order by opr_id desc");
 $select2  = mysqli_query($conn,"select * from patient  where pa_id = '$pa_id' order by pa_id desc");



 $row = mysqli_fetch_assoc($select);
 $opr_price  = $row['opr_price'];
 $opr_name  = $row['opr_name'];
  
 
 $row2 = mysqli_fetch_assoc($select2);
 $pa_name  = $row2['pa_name'];
 $pa_life  = $row2['pa_life'];
 $pa_gender  = $row2['pa_gender'];
 $pa_age  = $row2['pa_age'];
 $pa_phone  = $row2['pa_phone'];
 $insert = mysqli_query($conn,"insert into 
 opration(opr_name,opr_price,opr_id,pa_name,pa_id,opr_date,user_id)
 values('$opr_name','$opr_price','$opr_id','$pa_name','$pa_id','$opr_date','$user_id')");
 ?>
 <div style='text-align:right;border-right:2px; solid black;'>
 <div>
 
 
 </div>
 <hr>
 <span>اسم المريض : <?php echo $pa_name;?></span><br>
 <span>  النوع : <?php echo $pa_gender;?></span><br>
 <span>  السكن : <?php echo $pa_life;?></span><br>
 <span>  العمر : <?php echo $pa_age;?> سنة</span><br>
 <hr>

 <span>  نوع العملية : <?php echo $opr_name;?>  ,</span>
 <span>  تاريخ العملية : <?php echo $opr_date;?>  </span><br>
 <hr>
 المبلغ : <?php echo $opr_price;?> جنيه
<br>

 </div>
<?php }else echo "plz_fill_alll";?>