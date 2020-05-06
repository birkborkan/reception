<span id="smonth"></span>	
<span id="sch_text"></span>	
<form  style='text-align:right; font-size:1em;'>
<div   style='width:100%;direction: rtl;text-align:right;
background:#eee; font-size:24px;'> تقرير عن المرتبات   </div>              

<table width='100%' class='table'>
<tr width='100%'>
<td  width='10%'>بحث بــ:</td>
<td>
     <select name="sch" id="sch_option" class="form-control " onchange='select_change_sell()'>
     <!-- <select name="sch" id="sch_option" class="form-control " onchange='select_change_sell()'> -->
      
     <option value="date">التاريخ </option>

      <option value="between" >بين فترتين </option>
     </select>
</td>
 
           
 <td>
 <input  type="date" id="sch_date3" class="form-control" />
 </td>
 <td> <a href="#" onclick = 'return false;' onmousedown='reports_ratb("report_ratb_done.php");'class="btn btn-primary btn-user btn-block"> بحث</a></td>
 <td> <a href="#" onclick = 'return false;' onmousedown='printery("all_report");'class="btn btn-primary btn-user btn-block"> طباعة</a></td>
 
 </tr>

 <tr width='100%' style='display:none;' id='bet' >
 
 <td width='20%'>المرتبات بين فترتين :</td>
 <td>من :<input  type="date" name="date" id="sch_date1" class="form-control" /></td>  
 <td>الي :<input  type="date" name="date" id="sch_date2" class="form-control" /></td>  
 <input type='hidden' id='sch_date3'/>
</tr>          
</table>
</form>
<div id='all_report'>

    <div id='header'></div>
 
<br>
    <div id='report_content'></div>        
    </div>        

