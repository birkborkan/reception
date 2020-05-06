 <?php
 include "connect.php";
 $select  = mysqli_query($conn,"select * from recicle_bin order by bin_id desc");
 echo "<div style='text-align:right;' >";?>
 
 <?php  
 
 echo "<table class= 'table' style='text-align:right;' >
 <tr style='background:#eee;color:green;'>
 <td width='5%'>#</td>
 <td width='20%'>اسم الموظف</td>
 <td width='40%'>  المحذوف</td>
 <td width='15%'>  سعر  </td>
 <td width='20%'>     تاريخ  </td>
 
  

  
 </tr>
 
 
 ";
 $counter = 0;
 while($row = mysqli_fetch_assoc($select)){
     $counter++;
echo "<tr>
<td>".$counter."</td>
<td>".$row['full_name']."</td>
<td>".$row['bin_item']."</td>
<td>".$row['bin_price']."</td>
<td>".$row['date']."</td>
 
 ";?>


 <?php
 echo"
 
</tr>";
 }
 
 ?>
 