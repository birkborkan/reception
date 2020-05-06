 <?php
 
 include "connect.php";
 $mog_id = $_POST['mog_id'];
  
 
 $select = mysqli_query($conn,"select * from mogabla where mog_id='$mog_id' ");
 $row = mysqli_fetch_assoc($select);
 
 ?>
 <div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <span>اسم المريض : <?php echo $row['pa_name'];?></span><br>
 
 <hr>
 <div>
 <h3>الإجراء :-</h3>
 <h5> مقابلة طبيب <?php    echo ": </h5> <span>  ".$row['doc_name']."<span>";?>
 <div> 
 <div>
 <h5> تاريخ المقابلة :</h5>
 <span><?php  echo $row['mog_date']; echo ": </span>   ";?>
 <h5>  المبلغ :</h5>
 <span><?php  echo $row['doc_price']; echo ": </span>   ";?>
 <div>
 </div>
 <?php
 
 ?>