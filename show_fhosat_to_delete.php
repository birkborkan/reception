<?php
 include "connect.php";
 $fatora_num = $_POST['fatora_num'];
     
      $get_opr=mysqli_query($conn,"select
      * from fhs_op 
      where fatora_num = '$fatora_num' order by fhs_op_id asc") or die(mysql_error());
     
  
    
    ?>

<?php
 if (mysqli_num_rows($get_opr)>0) {
     echo "<div id='search_content'>";
 ?>
    
      <table class="table table-bordered" id="dataTable" width="50%" style='font-size:11px;text-align:right;' cellspacing="0">
                  <thead>
                  <tr style='background:#808080;color:white;font-size:1em'>
                       
           
               <th>اسم المريص</th>
                  <th> اسم الفحص</th>
                  
                  <th>القيمة</th>
                  <th>تاريخ </th>
                  <th>الخيارات </th>
                   
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                        
                   
                        while($row=mysqli_fetch_array($get_opr))
                        {//dname,dphone,pname,ptype,pqty,psel,pcost,pbuy,ppro,plos,lfees,ldate1,ldate2
                          
                            echo "
                        <tr>
                       
                        <td >".$row['pa_name']."</td>
                        <td >".$row['fhs_name']."</td>
                        <td >".$row['fhs_price']."</td>
                        <td >".$row['fhs_date']."</td>
                        
                       "; ?> 
                       <td>
                       <span class='btn btn-danger' onclick='delete_fhosat_detaul("<?php echo  $row["fhs_op_id"];?>" )'>  X   </span>
    
                       </td> 
                        </tr>  
                        <?php   
                         }  ?>
               </tbody>
                </table>
               
        
               
              </div>
              
                </div>
                <div>
                <?php 
                    }else{
                echo "<h3 style='text-align:center'>لا توجد بيانات</h3>";
                    }
                
            ?>   