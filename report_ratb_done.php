<?php
 include "connect.php";
 $s_date=$_POST['s_date'];
 $s_date1=$_POST['s_date1'];
 $s_date2=$_POST['s_date2'];
 
 
@$date_ = date('Y-m-d h:m:s');
 //  $sch_date2=$_POST['sch_date2'];
// $month_array = array("يناير", "فبراير", "مارس","ابريل", "مايو","تونيو","يوليو","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر");
// $get_pro=mysql_query("select opr_name,sum(oqty),sum(oqty * oprice),count(oid) from cus_order 
// where convert(odate,Date) = '$sch_date3' GROUP BY oitem order by oid desc") or die(mysql_error());  
if(!empty($s_date) or !empty($s_date1) or !empty($s_date2)){
if(!empty($s_date))
    {
      $get_opr=mysqli_query($conn,"select mwzf_job,ratb_price,mwzf_name,ratb_khsm,ratb_alawa ,ratb_month,date from ratb 
       where convert(date,Date) = '$s_date'    GROUP BY ratb_month   order by ratb_id asc") or die(mysql_error());
      
       $text = "بتاريخ   ".$s_date;
    }
    if(!empty($s_date1) or !empty($s_date2))
    {
        $get_opr=mysqli_query($conn,"select mwzf_job,ratb_price,mwzf_name,ratb_khsm,ratb_alawa ,ratb_month,date from ratb 
        where convert(date,Date) between '$s_date1' and '$s_date2'  
        GROUP BY ratb_month  order by ratb_id asc") or die(mysql_error());
       
        $text = "بين تاريخ    ".$s_date1." و ".$s_date2;
    }
    
    
    ?>

<div id='search_content'> 
<?php

 if (mysqli_num_rows($get_opr)>0) {
 ?>
    <div id="reporttitle"  style='float:left;width:50%;direction: rtl;font-size:1.2em;smargin-bottom:10px;border-bottom-style: groove'> تاريخ الطباعة <?php echo $date_;?></div> 
     <div id="reporttitle"  style='float:left;width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير عن المرتبات    <?php echo $text;?></div>
      <table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;font-size:1em'>
                       
          <th>#</th>
               <th>اسم الموظف</th>
               <th>  الوظيفة</th>
               <th>المرتب الاساسي </th>
                  <th>الشهر</th>
                  <th>الخصم</th>
                  <th>العلاوة</th>
                  <th>المرتب الكلي</th>
                  <th>التاريخ</th>
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        $all_all = 0;
                        while($row=mysqli_fetch_array($get_opr))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                         
                            $all_ratb = $row['ratb_price'] + $row['ratb_alawa'] - $row['ratb_khsm'];
                            $all_all += $row['ratb_price'] +$row['ratb_alawa']- $row['ratb_khsm'];
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td >".$row['mwzf_name']."</td>
                        <td >".$row['mwzf_job']."</td>
                        <td >".$row['ratb_price']."</td>
                        <td >".$row['ratb_month']."</td>
                        <td >".$row['ratb_khsm']."</td>
                        <td >".$row['ratb_alawa']."</td>
                        <td >".$all_ratb."</td>
                        
                        <td >".$row['date']."</td>
                       
                       "; ?>  
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
               <?php 
               echo '
               <div style="text-align:right;font-size:1.2em;margin-right:5%">
               اجمالي تكلفة المرتبات : '.number_format($all_all).'  </div>
               ';
              
               ?>
               </div>
               
                 </div>
                 <div>
                 <?php 
                     }else{
                 echo "<h3 style='text-align:center'>لا توجد بيانات</h3>";
                     }
                 }else{
                     echo "<h3 style='text-align:center'>  رجاء اختيار للبحث  </h3>";  
                 }
             ?>   