<?php
 include "connect.php";
 
 $s_date=$_POST['s_date'];
 $s_date1=$_POST['s_date1'];
 $s_date2=$_POST['s_date2'];
 
 if(isset($_POST['user_id_report'])){
    $user_id_report = intval($_POST['user_id_report']);
@$date_ = date('Y-m-d h:m:s');
 //  $sch_date2=$_POST['sch_date2'];
// $month_array = array("يناير", "فبراير", "مارس","ابريل", "مايو","تونيو","يوليو","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر");
// $get_pro=mysql_query("select opr_name,sum(oqty),sum(oqty * oprice),count(oid) from cus_order 
// where convert(odate,Date) = '$sch_date3' GROUP BY oitem order by oid desc") or die(mysql_error());  
if(!empty($s_date) or !empty($s_date1) or !empty($s_date2)){
if(!empty($s_date))
    {
     
       $get_fhs=mysqli_query($conn,"select fhs_name,sum(fhs_price),count(fhs_op_id),fhs_price from fhs_op 
       where convert(date,Date) = '$s_date' and  user_id = '$user_id_report' GROUP BY fhs_name  order by fhs_op_id asc") or die(mysql_error());
      
       $get_khorfa=mysqli_query($conn,"select pa_name,convert(date,Date),time_stay,sum(khorfa_price),count(khorfa_id),khorfa_price from khorfa 
       where convert(date,Date) = '$s_date' and  user_id = '$user_id_report' GROUP BY pa_name  order by khorfa_id asc") or die(mysql_error());
       $get_mogabla=mysqli_query($conn,"select doc_name,sum(doc_price),count(doc_name),doc_price from mogabla 
       where convert(date,Date) = '$s_date' and  user_id = '$user_id_report'  GROUP BY doc_name  order by mog_id asc") or die(mysql_error());
       $get_opr=mysqli_query($conn,"select opr_name,sum(opr_price),count(opra_id),opr_price from opration 
       where convert(date,Date) = '$s_date' and  user_id = '$user_id_report' GROUP BY opr_name  order by opra_id asc") or die(mysql_error());
       $get_msrof=mysqli_query($conn,"select msrof_byan,sum(msrof_price),count(msrof_id),msrof_price from msrof 
       where convert(date,Date) = '$s_date' and  user_id = '$user_id_report'  GROUP BY msrof_byan  order by msrof_id asc") or die(mysql_error());
       $get_ratb=mysqli_query($conn,"select mwzf_job,sum(ratb_price),mwzf_name,sum(ratb_khsm),sum(ratb_alawa) ,ratb_month,date from ratb 
       where convert(date,Date) = '$s_date'  and  user_id = '$user_id_report'  GROUP BY ratb_month   order by ratb_id asc") or die(mysql_error());
      
       $text = "بتاريخ   ".$s_date;
    }
    if(!empty($s_date1) or !empty($s_date2))
    {
       
        $get_fhs=mysqli_query($conn,"select fhs_name,sum(fhs_price),count(fhs_op_id),fhs_price from fhs_op 
        where convert(date,Date)  between '$s_date1' and '$s_date2'  and  user_id = '$user_id_report' GROUP BY fhs_name  order by fhs_op_id asc") or die(mysql_error());
        
        $get_khorfa=mysqli_query($conn,"select pa_name,convert(date,Date),time_stay,sum(khorfa_price),count(khorfa_id),khorfa_price from khorfa 
        where convert(date,Date) between '$s_date1' and '$s_date2' and  user_id = '$user_id_report' GROUP BY pa_name  order by khorfa_id asc") or die(mysql_error());
        $get_mogabla=mysqli_query($conn,"select doc_name,sum(doc_price),count(doc_name),doc_price from mogabla 
        where convert(date,Date) between '$s_date1' and '$s_date2' and  user_id = '$user_id_report' GROUP BY doc_name  order by mog_id asc") or die(mysql_error());
        $get_opr=mysqli_query($conn,"select opr_name,sum(opr_price),count(opra_id),opr_price from opration 
        where convert(date,Date) between '$s_date1' and '$s_date2' and  user_id = '$user_id_report' GROUP BY opr_name  order by opra_id asc") or die(mysql_error());
        $get_msrof=mysqli_query($conn,"select msrof_byan,sum(msrof_price),count(msrof_id),msrof_price from msrof 
        where convert(date,Date) between '$s_date1' and '$s_date2' and  user_id = '$user_id_report' GROUP BY msrof_byan  order by msrof_id asc") or die(mysql_error());
        $get_ratb=mysqli_query($conn,"select mwzf_job,sum(ratb_price),mwzf_name,sum(ratb_khsm),sum(ratb_alawa) ,ratb_month,date from ratb 
        where convert(date,Date) between '$s_date1' and '$s_date2' and  user_id = '$user_id_report'  
        GROUP BY ratb_month  order by ratb_id asc") or die(mysql_error());
       

        $text = "بين تاريخ    ".$s_date1." و ".$s_date2;
    }
    
    
    ?>


<div id="reporttitle"
    style='float:left;width:50%;direction: rtl;font-size:1.6em;smargin-bottom:10px;border-bottom-style: groove'> تاريخ
    الطباعة <?php echo $date_;?></div>
<div id="reporttitle"
    style='float:left;width:50%;direction: rtl;text-align:center;font-size:1.6em;border-bottom-style: groove;margin-bottom:10px;'>
    التقرير   المستخدم <?php
    $select_user = mysqli_query($conn,"select * from users where user_id = '$user_id_report'");
    $r_user = mysqli_fetch_array($select_user);
    echo $r_user['full_name']."<br>";
    ?> <?php echo $text;?></div>


<table class="table table-bordered" id="dataTable" width="50%" style='font-size:20px;text-align:right;' cellspacing="0">
    <thead>
        <tr style='background:#808080;color:black;font-size:1.8em'>

            <th>
            <span class='btm btn-success' style='background:#b1b1b1;'onclick='opration_detauls("<?php echo $user_id_report;?>")'>=</span>
            العمليات
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
                        
                        $all_sum = 0;
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_opr))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            $sum+=$row['sum(opr_price)'];
                            $count+=$row['count(opra_id)'];
                    
                         }  ?>
        <tr>
            <td>
                <?php 
                $all_sum += $sum;
               echo '
               <span style="text-align:right;font-size:1.6em;margin-right:5%">
               اجمالي تكلفة العمليات : '.number_format($sum).'  </span>
               ';
               echo '
               <span style="text-align:left;font-size:1.6em;margin-right:5%">
               عدد  العمليات : '.$count.'  </span>
               ';
                 ?>
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered" id="dataTable" width="50%" style='font-size:20px;text-align:right;' cellspacing="0">
    <thead>
        <tr style='background:#808080;color:black;font-size:1.8em'>

        <th>
            <span class='btm btn-success' style='background:#b1b1b1;'onclick='fhs_detauls("<?php echo $user_id_report;?>")'>=</span>
            الفحوصات
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_fhs))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            $sum+=$row['sum(fhs_price)'];
                            $count+=$row['count(fhs_op_id)'];
      
                         }  ?>
        <tr>
            <td>

                <?php 
                $all_sum += $sum;
               echo '
               <span style="text-align:right;font-size:1.6em;margin-right:5%">
               اجمالي تكلفة الفحوصات : '.number_format($sum).'  </span>
               ';
               echo '
               <span style="text-align:left;font-size:1.6em;margin-right:5%">
               عدد  الفحوصات : '.$count.'  </span>
               ';
                 ?>
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered" id="dataTable" width="50%" style='font-size:20px;text-align:right;' cellspacing="0">
    <thead>
        <tr style='background:#808080;color:black;font-size:1.8em'>

        <th>
            <span class='btm btn-success' style='background:#b1b1b1;'onclick='mogabla_detauls("<?php echo $user_id_report;?>")'>=</span>
            المقابلات
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_mogabla))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            $sum+=$row['sum(doc_price)'];
                            $count+=$row['count(doc_name)'];
      
                         }  ?>
        <tr>
            <td>

                <?php 
                $all_sum += $sum;
               echo '
               <span style="text-align:right;font-size:1.6em;margin-right:5%">
               اجمالي تكلفة المقابلات : '.number_format($sum).'  </span>
               ';
               echo '
               <span style="text-align:left;font-size:1.6em;margin-right:5%">
               عدد  المقابلات : '.$count.'  </span>
               ';
                 ?>
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered" id="dataTable" width="50%" style='font-size:20px;text-align:right;' cellspacing="0">
    <thead>
        <tr style='background:#808080;color:black;font-size:1.8em'>

        <th>
            <span class='btm btn-success' style='background:#b1b1b1;'onclick='khorfa_detauls("<?php echo $user_id_report;?>")'>=</span>
            حجوزات غرف
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_khorfa))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            $sum+=$row['sum(khorfa_price)'];
                            $count+=$row['count(khorfa_id)'];
      
                         }  ?>
        <tr>
            <td>

                <?php 
                $all_sum += $sum;
               echo '
               <span style="text-align:right;font-size:1.6em;margin-right:5%">
               اجمالي تكلفة حجوزات الغرف : '.number_format($sum).'  </span>
               ';
               echo '
               <span style="text-align:left;font-size:1.6em;margin-right:5%">
               عدد  الحجوزات : '.$count.'  </span>
               ';
                 ?>
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered" id="dataTable" width="50%" style='font-size:20px;text-align:right;' cellspacing="0">
    <thead>
        <tr style='background:#808080;color:black;font-size:1.8em'>

        <th>
            <span class='btm btn-success' style='background:#b1b1b1;'onclick='msrof_detauls("<?php echo $user_id_report;?>")'>=</span>
            المصروفات
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
                        
                        $srno= 0;
                        $sum= 0;
                        $count= 0;
                        while($row=mysqli_fetch_array($get_msrof))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                            $srno++;
                            $sum+=$row['sum(msrof_price)'];
                            $count+=$row['count(msrof_id)'];
      
                         }  ?>
        <tr>
            <td>

                <?php 
               
               echo '
               <span style="text-align:right;font-size:1.6em;margin-right:5%">
               اجمالي تكلفة    المصروفات : '.number_format($sum).'  </span>
               ';
               echo '
               <span style="text-align:left;font-size:1.6em;margin-right:5%">
               عدد  المصروفات : '.$count.'  </span>
               ';
                 ?>
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
<thead>
        <tr style='background:#808080;color:black;font-size:1.8em'>

        <th>
            <span class='btm btn-success' style='background:#b1b1b1;'onclick='ratb_detauls("<?php echo $user_id_report;?>")'>=</span>
            المرتبات
            </th>
        </tr>
    </thead>
                   <tbody>
                    <?php
                        
                
                       
                     
                        $all_all = 0;
                        
                        while($row=mysqli_fetch_array($get_ratb))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                          
                         
        
                            
                            $all_all += ($row['sum(ratb_price)']+$row['sum(ratb_alawa)']-$row['sum(ratb_khsm)']);
                       ?>  
                        </tr>  
                        <?php   
                         }  ?>
                         <tr><td>
                         <?php
                         
                         echo '
               <div style="text-align:right;font-size:1.2em;margin-right:5%">
               اجمالي تكلفة المرتبات : '.number_format($all_all).'  </div>
               ';?>
                         </td></tr>
               </tbody>
                </table>
                
              
<hr>
<div>
<div>مجموع المبلغ = (العمليات + فحوصات + مقابلات + غرف) </div>
<h3>مجموع المبلغ:
<?php echo number_format($all_sum);?>

</h3>
<h3>   المصروفات:
<?php echo number_format($sum);?>

</h3>
<h3>   المرتبات:
<?php echo number_format($all_all);?>

</h3>
<div>صافي المبلغ = (العمليات + فحوصات + مقابلات + غرف) - (المصروفات +المرتبات)
</div>
<h3>   صافي المبلغ:
<?php echo number_format($all_sum-$sum-$all_all);?>

</h3>
</div>
<?php
            
            }

        }else{
            echo " <h4 style='text-align:center;color:red;'>رجاء المحاولة</h4>";
        }
               ?>