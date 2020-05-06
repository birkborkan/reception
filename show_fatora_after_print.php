<?php
 @session_start();

 
 include "connect.php";
 $user_id=$_SESSION['user_id'];
 $user_sla=$_SESSION['user_slahia']; 
 @$date = date('Y-m-d');
 //convert(date,Date) = '@$date' 
 if( $user_sla == 1){   
 $get_opr  = mysqli_query($conn,"select fatora_num,pa_name,sum(fhs_price),count(fhs_op_id),fhs_price from fhs_op
  where convert(date,Date) = '$date'GROUP BY fatora_num  order by fhs_op_id desc");
 } else {
 $get_opr  = mysqli_query($conn,"select fatora_num,pa_name,sum(fhs_price),count(fhs_op_id),fhs_price from fhs_op
  where convert(date,Date) = '$date'and user_id = '$user_id' GROUP BY fatora_num order by fhs_op_id desc");
 }
   
    ?>

<div id='search_content'> 
<?php

 
 ?>
   
      <table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;font-size:1em'>
                       
          <th>#</th>
               <th>الاسم</th>
                
               <th>عدد فحوصات </th>
                  <th>القيمة</th>
                  <th>الفاتورة</th>
                  <th>خيارات</th>
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                        $srno= 0;
                     
                      
                        while($row=mysqli_fetch_array($get_opr))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                           
                         
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td >".$row['pa_name']."</td>
                          
                        <td >".$row['count(fhs_op_id)']."</td>
                        <td >".$row['sum(fhs_price)']."</td>
                        <td >".$row['fatora_num']."</td>
                       
                       "; ?>  
                       <td><span class='btn btn-success'onclick='print_fhs_fatora("<?php echo $row["fatora_num"];?>","<?php echo $row["pa_name"];?>")'>طباعه</span></td>
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
               
               </div>
               
                 </div>
                 <div>   