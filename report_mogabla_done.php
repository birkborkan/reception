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
      $get_opr=mysqli_query($conn,"select doc_name,sum(doc_price),count(doc_name),doc_price from mogabla 
       where convert(date,Date) = '$s_date' GROUP BY doc_name  order by mog_id asc") or die(mysql_error());
      
       $text = "بتاريخ   ".$s_date;
    }
    if(!empty($s_date1) or !empty($s_date2))
    {
        
        $get_opr=mysqli_query($conn,"select doc_name,sum(doc_price),count(doc_name),doc_price from mogabla 
        where convert(date,Date) between '$s_date1' and '$s_date2' GROUP BY doc_name  order by mog_id asc") or die(mysql_error());
       
        $text = "بين تاريخ    ".$s_date1." و ".$s_date2;
    }
    
    
    ?>

<div id='search_content'> 
<?php

 if (mysqli_num_rows($get_opr)>0) {
 ?>
    <div id="reporttitle"  style='float:left;width:50%;direction: rtl;font-size:1.2em;smargin-bottom:10px;border-bottom-style: groove'> تاريخ الطباعة <?php echo $date_;?></div> 
     <div id="reporttitle"  style='float:left;width:50%;direction: rtl;text-align:center;font-size:1.2em;border-bottom-style: groove;margin-bottom:10px;'> تقرير عن المقابلات    <?php echo $text;?></div>
      <table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;font-size:1em'>
                       
          <th>#</th>
               <th>اسم الدكتور</th>
               <th>سعر المقابلة</th>
               <th>العدد </th>
                  <th>القيمة</th>
                   
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
                            $sum+=$row['sum(doc_price)'];
                            $count+=$row['count(doc_name)'];
                            echo "
                        <tr>
                        <td>".$srno."</td>
                        <td >".$row['doc_name']."</td>
                        <td >".$row['doc_price']."</td>
                        <td >".$row['count(doc_name)']."</td>
                        <td >".$row['sum(doc_price)']."</td>
                       
                       "; ?>  
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
               <?php 
               echo '
               <div style="text-align:right;font-size:1.2em;margin-right:5%">
               اجمالي تكلفة المقابلات : '.number_format($sum).'  </div>
               ';
               echo '
               <div style="text-align:left;font-size:1.2em;margin-right:5%">
               عدد  المقابلات : '.$count.'  </div>
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