<?php
session_start();
 
 include "connect.php";


 
 $opra_id = $_POST['opra_id'];
 
 
//mog_id	doc_price	doc_name	pa_name	pa_id	doc_id	mog_date	date

 
 $select  = mysqli_query($conn,"select * from opration  where opra_id = '$opra_id' order by opra_id desc");
 

 $row = mysqli_fetch_assoc($select);
 $opr_price  = $row['opr_price'];
 $opr_name  = $row['opr_name'];
 $pa_name  = $row['pa_name'];
 $opr_date  = $row['opr_date'];
  
 
  
 ?>
 <div style='text-align:right;border-right:2px; solid black;'>
 <div>
 
 
 </div>
 <hr>
 <span>اسم المريض : <?php echo $pa_name;?></span><br>
  
 <hr>

 <span>  نوع العملية : <?php echo $opr_name;?>  ,</span><br>
 <span>  تاريخ العملية : <?php echo $opr_date;?>  </span><br>
 <hr>
 المبلغ : <?php echo $opr_price;?> جنيه
<br>

 </div>
 