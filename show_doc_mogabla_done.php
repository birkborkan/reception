 <?php
 @session_start();
 $user_id = $_SESSION['user_id'];
 include "connect.php";
 $pa_id = $_POST['pa_id'];
 $doc_id = $_POST['doc_id'];
 @$mog_date = date('Y-m-d');
 $select  = mysqli_query($conn,"select * from docter  where doc_id = '$doc_id' order by doc_id desc");
 $select2  = mysqli_query($conn,"select * from patient  where pa_id = '$pa_id' order by pa_id desc");
$row = mysqli_fetch_assoc($select);
 $doc_price  = $row['doc_price'];
 $doc_name  = $row['doc_name'];
 $doc_type  = $row['doc_type']; 
 $row2 = mysqli_fetch_assoc($select2);
 $pa_name  = $row2['pa_name'];
 $pa_life  = $row2['pa_life'];
 $pa_gender  = $row2['pa_gender'];
 $pa_age  = $row2['pa_age'];
 $pa_phone  = $row2['pa_phone'];
 if(!empty($mog_date)){
@$date_today = date("Y-m-d");
 $select = mysqli_query($conn,"select * from mogabla where convert(date,Date) = '$date_today' and pa_id='$pa_id' and doc_id='$doc_id' ");
 if(mysqli_num_rows($select) > 0 ){
     echo"found";
 }else{
 $insert = mysqli_query($conn,"insert into 
 mogabla(doc_name,doc_price,doc_id,pa_name,pa_id,mog_date,user_id)
 values('$doc_name','$doc_price','$doc_id','$pa_name','$pa_id','$mog_date','$user_id')");
 ?>
 <div style='text-align:right;border-right:2px; solid black;'>
 <hr>
 <span>اسم المريض : <?php echo $pa_name;?></span><br>
 <span>  النوع : <?php echo $pa_gender;?></span><br>
 <span>  السكن : <?php echo $pa_life;?></span><br>
 <span>  العمر : <?php echo $pa_age;?> سنة</span><br>
 <hr>
 <div>
 <h3>الإجراء :-</h3>
 <h5> مقابلة طبيب <?php  echo $doc_type; echo ": </h5> <span>  ".$doc_name."<span>";?>
 <div> 
 <div>
 <h5> تاريخ المقابلة :</h5>
 <span><?php  echo $mog_date; echo ": </span>   ";?>
 <h5>  المبلغ :</h5>
 <span><?php  echo $doc_price; echo " </span>   ";?>
 <div>
 </div>
 <?php
}
}else{
    echo "fill_date";
}?>