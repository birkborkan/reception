 <?php
 @session_start();
 include "connect.php";
 $user_id=$_SESSION['user_id'];
 $user_sla=$_SESSION['user_slahia']; 
 @$date = date('Y-m-d');
 if( $user_sla == 1){  
 $select  = mysqli_query($conn,"select * from mogabla where convert(date,Date) = '$date' order by mog_id desc");
 } else {
 $select  = mysqli_query($conn,"select * from mogabla where convert(date,Date) = '$date'and user_id = '$user_id'  order by mog_id desc");
 };?>
<div style='text-align:right;'>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search_new("search_text","show_all_mogabla_search.php","stay_id",,<?php echo $user_id; ?>,<?php echo $user_sla; ?>);' onkeyup = 'search_new("search_text","show_all_mogabla_search.php","stay_id",<?php echo $user_id; ?>,<?php echo $user_sla;?>)'/>
 </div>
 <div id = 'stay_id'>
 <?php 
if($user_sla == 1)
{///////////////////////////
    echo "<table class= 'table' style='text-align:right;' >
    <tr style='background:#eee;color:green;'>
    <td width='5%'>#</td>
    <td width='20%'>اسم المريض</td>
    <td width='15%'>اسم الطبيب</td>
    <td width='5%'>  سعر المقابلة</td>
    <td width='10%'>     تاريخ المقابلة</td>
    <td width='15%'>المدخل</td>
    <td width='21%'>الخيارات</td>
    </tr>";
    $counter = 0;
    while($row = mysqli_fetch_assoc($select)){
        $counter++;
        $user_id_=$row['user_id'];
        $get_user  = mysqli_query($conn,"select full_name from users where user_id = '$user_id_'");
        $user_row=mysqli_fetch_array($get_user);
        $user_name=$user_row['full_name'];
   echo "<tr>
   <td>".$counter."</td>
   <td>".$row['pa_name']."</td>
   <td>".$row['doc_name']."</td>
   <td>".$row['doc_price']."</td>
   <td>".$row['mog_date']."</td>
   <td>".$user_name."</td>
    
   <td> ";?>
   
    
   <span class='btn btn-success' onclick='dis_count_mogabla("<?php echo  $row["mog_id"];?>","<?php echo  $row["doc_price"];?>" )'>  تخفيض </span>
   <span class='btn btn-danger' onclick='mogabla_delete("<?php echo  $row["mog_id"];?>" )'>  حذف </span>
    <?php
    echo"
   </td>
   </tr>";
    }
 }
else
{  ////////////////////////// -->
  
    echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم المريض</td>
 <td width='20%'>اسم الطبيب</td>
 <td width='10%'>  سعر المقابلة</td>
 <td width='10%'>     تاريخ المقابلة</td>
 <td width='21%'>الخيارات</td>
 </tr>";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['pa_name']."</td>
<td>".$row['doc_name']."</td>
<td>".$row['doc_price']."</td>
<td>".$row['mog_date']."</td>
 
<td> ";?>

 
<span class='btn btn-success' onclick='dis_count_mogabla("<?php echo  $row["mog_id"];?>","<?php echo  $row["doc_price"];?>" )'>  تخفيض </span>
<span class='btn btn-danger' onclick='mogabla_delete("<?php echo  $row["mog_id"];?>" )'>  حذف </span>
 <?php
 echo"
</td>
</tr>";
 }
 } ?> 