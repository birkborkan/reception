<?php
 @session_start();
 include "connect.php";
 $user_id=$_SESSION['user_id'];
 $user_status=$_SESSION['user_slahia'];
 @$date = date('Y-m-d'); 
 if( $user_status == 1 ){
 $get_opr  = mysqli_query($conn,"select
 pa_name,sum(fhs_price),count(fatora_num),fatora_num,fhs_date,user_id from fhs_op
  where convert(date,Date) = '$date' GROUP BY fatora_num order by fhs_op_id desc");
 
} else {
 $get_opr  = mysqli_query($conn,"select
 pa_name,sum(fhs_price),count(fatora_num),fatora_num,fhs_date from fhs_op
  where convert(date,Date) = '$date' and user_id = '$user_id' GROUP BY fatora_num   order by fhs_op_id desc");
 
}
     
   ?>

<?php

 if (mysqli_num_rows($get_opr)>0) {
     echo "<div id='search_content'>";

 ?>

     <div style='text-align:right;'>
 <span>بحث:</span>
 <input type='text'id='search_text'class='form-control' onkeydown='search_new("search_text","show_fhosat_search.php","stay_id",,<?php echo $user_id; ?>,<?php echo $user_status; ?>);' onkeyup = 'search_new("search_text","show_fhosat_search.php","stay_id",<?php echo $user_id; ?>,<?php echo $user_status; ?>)'/>
 </div>
 <div id = 'stay_id'>
 <?php
 if($user_status == 1)
 {?>
<!-- ///////////////////////////// -->
<table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;font-size:1em'>
                       
          <th>#</th>
               <th>اسم المريص</th>
                  <th>   رقم الفاتورة</th>
                  <th>عدد الفحوصات</th>
                  <th>القيمة</th>
                  <th>تاريخ </th>
                  <th>المدخل </th>
                  <th>الخيارات </th>
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_opr))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2

                            $srno++;
                            $sum+=$row['sum(fhs_price)'];
                            $count+=$row['count(fatora_num)'];
                            $fat_no=$row['fatora_num'];
                            $pa_name=$row['pa_name'];
                            $user_id_=$row['user_id'];
                            $get_user  = mysqli_query($conn,"select full_name from users where user_id = '$user_id_'");
                            $user_row=mysqli_fetch_array($get_user);
                            $user_name=$user_row['full_name'];
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td >".$row['pa_name']."</td>
                        <td >".$row['fatora_num']."</td>
                        <td >".$row['count(fatora_num)'];?>
                        <a href='#' style='font-size:1.2em'onclick='fahis_details("<?php echo $fat_no ; ?>","<?php echo $pa_name ; ?>")'>تفاصيل</a>
                        </td>
                        <?php echo " <td >".$row['sum(fhs_price)']."</td>
                        <td >".$row['fhs_date']."</td>
                        <td >".$user_name."</td>
                        
                       "; ?> 
                       <td>
                       <span class='btn btn-danger' onclick='delete_fhosat("<?php echo  $row["fatora_num"]?>","<?php echo  $sum;?>" )'>  حذف الكل </span>
                       <span class='btn btn-danger' onclick='show_fhosat_to_delete("<?php echo  $row["fatora_num"];?>" )'>  حذف تفاصيل </span>
                       <span class='btn btn-success' onclick='dis_count_fhosat("<?php echo  $row["fatora_num"];?>","<?php echo  $row["sum(fhs_price)"];?>" )'>     التخفيض </span>
 
                       </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
 <?php }
 else
 { ?>
   <!-- ////////////////////////// -->
   <table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;font-size:1em'>
                       
          <th>#</th>
               <th>اسم المريص</th>
                  <th>   رقم الفاتورة</th>
                  <th>عدد الفحوصات</th>
                  <th>القيمة</th>
                  <th>تاريخ </th>
                  <th>الخيارات </th>
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_opr))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            $sum+=$row['sum(fhs_price)'];
                            $count+=$row['count(fatora_num)'];
                            $fat_no=$row['fatora_num'];
                            $pa_name=$row['pa_name'];
                 
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td >".$row['pa_name']."</td>
                        <td >".$row['fatora_num']."</td>
                        <td >".$row['count(fatora_num)'];?>
                        <a href='#' style='font-size:1.2em'onclick='fahis_details("<?php echo $fat_no ; ?>","<?php echo $pa_name ; ?>")'>تفاصيل</a>
                        </td>
                        <?php echo " <td >".$row['sum(fhs_price)']."</td>
                        <td >".$row['fhs_date']."</td>
                        
                       "; ?> 
                       <td>
                       <span class='btn btn-danger' onclick='delete_fhosat("<?php echo  $row["fatora_num"]?>","<?php echo  $sum;?>" )'>  حذف الكل </span>
                       <span class='btn btn-danger' onclick='show_fhosat_to_delete("<?php echo  $row["fatora_num"];?>" )'>  حذف تفاصيل </span>
                       <span class='btn btn-success' onclick='dis_count_fhosat("<?php echo  $row["fatora_num"];?>","<?php echo  $row["sum(fhs_price)"];?>" )'>     التخفيض </span>
 
                       </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
 <?php } ?>   
               </div>
              
                </div>
                <div>
                <?php 
                    }else{
                echo "<h3 style='text-align:center'>لا توجد بيانات</h3>";
                    }
                
            ?>   
                    <!-- start fhs details model -->
        <div class="modal fade" id="fahis_details" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل الفحوصات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div style="text-align:right;padding-right:10%;" id="pa_name">  </div>
                    <div class="modal-body" id='fahis_details_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end fhs details model-->