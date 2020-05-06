 <?php
 include "connect.php";
 $search_text = $_POST['search_text'];
 $user_id= $_POST['user_id'];
 $user_status= $_POST['user_status'];
 @$date = date('Y-m-d'); 
 if( $user_status == 1){
 $select  = mysqli_query($conn,"select * from khorfa
  where (pa_name like '%$search_text%' or pa_life like '%$search_text%') and convert(date,Date) = '$date'  order by khorfa_id desc");
 }
  else 
  {
 $select  = mysqli_query($conn,"select * from khorfa
 where (pa_name like '%$search_text%' or pa_life like '%$search_text%') and  convert(date,Date) = '$date' and user_id = '$user_id' order by khorfa_id desc");
 }
?>
<?php if($user_status == 1)
 { ////////////
    echo "<table class= 'table' style='text-align:right;font-size:1em;' >
    <tr style='background:#eee;color:green;'>
    <td width='5%'>#</td>
    <td width='15%'>  اسم المريض    </td>
    <td width='5%'> النوع</td>
    <td width='10%'> السكن</td>
    <td width='5%'> العمر</td>
    <td width='10%'>تاريخ الحجز</td>
    <td width='5%'> زمن البقاء</td>
    <td width='7%'>  المبلغ  </td>
    <td width='15%'>  المدخل  </td>
     <td width='37%'>الخيارات</td>
    </tr> ";
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
   <td>".$row['pa_gender']."</td>
   <td>".$row['pa_life']."</td>
   <td>".$row['pa_age']."</td>
   <td>".$row['start_date']."</td>
   <td>".$row['time_stay']."</td>
   <td>".$row['khorfa_price']."</td>
   <td>".$user_name."</td>
   
   <td style='font-size:12px;'> ";?>
   
   <span style='width:40%;'class='btn btn-success' onclick='edit_khorfa("<?php echo  $row["khorfa_id"]?>", "<?php echo  $row["time_stay"]?>","<?php echo  $row["khorfa_price"]?>" )'>تعديل </span>
   <span style='width:28%;' class='btn btn-success' onclick='dis_count_khorfa("<?php echo  $row["khorfa_id"]?>","<?php echo  $row["khorfa_price"]?>" )'>  تخفيض</span>
   <span style='width:28%;' class='btn btn-danger' onclick='khorfa_delete("<?php echo  $row["khorfa_id"]?>" )'>  حذف </span>
    <?php
    echo"
   </td>
   </tr>";
    }
    ?>
    </table>


 <?php }
 else
 { ////////////////////////////

     echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='15%'>  اسم المريض    </td>
 <td width='10%'> النوع</td>
 <td width='15%'> السكن</td>
 <td width='10%'> العمر</td>
 <td width='10%'>تاريخ الحجز</td>
 <td width='5%'> زمن البقاء</td>
 <td width='7%'>  المبلغ  </td>
  <td width='33%'>الخيارات</td>
 </tr> ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['pa_name']."</td>
<td>".$row['pa_gender']."</td>
<td>".$row['pa_life']."</td>
<td>".$row['pa_age']."</td>
<td>".$row['start_date']."</td>
<td>".$row['time_stay']."</td>
<td>".$row['khorfa_price']."</td>

<td style='font-size:12px;'> ";?>

<span style='width:40%;font-size:11px;'class='btn btn-success' onclick='edit_khorfa("<?php echo  $row["khorfa_id"]?>", "<?php echo  $row["time_stay"]?>","<?php echo  $row["khorfa_price"]?>" )'>تعديل البيانات</span>
<span style='width:28%;' class='btn btn-success' onclick='dis_count_khorfa("<?php echo  $row["khorfa_id"]?>","<?php echo  $row["khorfa_price"]?>" )'>  تخفيض</span>
<span style='width:28%;' class='btn btn-danger' onclick='khorfa_delete("<?php echo  $row["khorfa_id"]?>" )'>  حذف </span>
 <?php
 echo"
</td>
</tr>";
 }
 ?>
 </table>
 <?php } ?> 