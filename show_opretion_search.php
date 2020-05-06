 

 <?php
 include "connect.php";
 $search_text = $_POST['search_text'];
 $user_id= $_POST['user_id'];
 $user_status= $_POST['user_status'];
 @$date = date('Y-m-d'); 
 if( $user_status == 1){
 $select  = mysqli_query($conn,"select * from opration
 where (opr_name like '%$search_text%' or pa_name like '%$search_text%') and convert(date,Date) = '$date' order by opra_id desc");
 }
  else 
  {
 $select  = mysqli_query($conn,"select * from opration
  where (opr_name like '%$search_text%' or pa_name like '%$search_text%') and  convert(date,Date) = '$date' and user_id = '$user_id' order by opra_id desc");
 }

 if($user_status == 1)
 {
      echo "<table class= 'table' style='text-align:right;' >
    <tr style='background:#eee;color:green;'>
    <td width='5%'>#</td>
    <td width='20%'>اسم المريض</td>
    <td width='15%'>اسم العملية</td>
    <td width='5%'>  المبلغ</td>
    <td width='15%'>  تاريخ العملية</td>
    <td width='15%'>  المدخل</td>
   
    <td width='20%'>الخيارات</td>
    </tr>
    
    
    ";
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
   <td>".$row['opr_name']."</td>
   <td>".$row['opr_price']."</td>
   <td>".$row['opr_date']."</td>
   <td>".$user_name."</td>
   <td> ";?>
   
   <span class='btn btn-success' onclick='dis_count_opration("<?php echo  $row["opra_id"];?>","<?php echo  $row["opr_price"];?>" )'>  تخفيض </span>
   <span class='btn btn-danger' onclick='opration_delete("<?php echo  $row["opra_id"];?>")'>    حذف</span>
    <?php
    echo"
   </td>
   </tr>";
    }
     }
 else
 { //////////////////////////
      echo "<table class= 'table' style='text-align:right;' >
    <tr style='background:#eee;color:green;'>
    <td width='5%'>#</td>
    <td width='20%'>اسم المريض</td>
    <td width='20%'>اسم العملية</td>
    <td width='15%'>  المبلغ</td>
    <td width='15%'>  تاريخ العملية</td>
   
    <td width='25%'>الخيارات</td>
    </tr>
    
    
    ";
    $counter = 0;
    while($row = mysqli_fetch_assoc($select)){
        $counter++;
   echo "<tr>
   <td>".$counter."</td>
   <td>".$row['pa_name']."</td>
   <td>".$row['opr_name']."</td>
   <td>".$row['opr_price']."</td>
   <td>".$row['opr_date']."</td>
   <td> ";?>
   
   <span class='btn btn-success' onclick='dis_count_opration("<?php echo  $row["opra_id"];?>","<?php echo  $row["opr_price"];?>" )'>  تخفيض </span>
   <span class='btn btn-danger' onclick='opration_delete("<?php echo  $row["opra_id"];?>")'>    حذف</span>
    <?php
    echo"
   </td>
   </tr>";
    }
   } ?> 
 