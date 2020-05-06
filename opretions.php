<?php
//if add 
if($_POST['class_name'] ==  "azn"){
    if($_POST['fanc'] ==  "azn_toread"){
        azn::azn_toread($_POST['std_id'],$_POST['std_name'],$_POST['std_un_no'],$_POST['dof_id'],$_POST['mos_id'],$_POST['sem_id']);
    }

}
if($_POST['class_name'] ==  "add"){
        if($_POST['fanc'] ==  "add_coll"){
       
            add::add_coll($_POST['coll_name']);

        }        
          if($_POST['fanc'] ==  "add_first_rosoom"){
       
            add::add_first_rosoom($_POST['std_id']);

        }   
          if($_POST['fanc'] ==  "add_result"){
       
            add::add_result($_POST['std_id'],$_POST['std_name'],$_POST['std_un_no'],$_POST['coll_id'],$_POST['dep_id'],$_POST['mos_id'],$_POST['sem_id'],$_POST['dof_id'],$_POST['co_id'],$_POST['co_name'],$_POST['co_hour'],$_POST['result']);

        }  
        
        
        
        if($_POST['fanc'] ==  "add_dofa"){
            add::add_dofa($_POST['dof_name'],$_POST['dep_id'],$_POST['ros_ts'],$_POST['ros_one'],$_POST['ros_two'],$_POST['ros_all']);

        }   
         
        if($_POST['fanc'] ==  "add_dep"){
            add::add_dep($_POST['coll_id'],$_POST['dep_name'],$_POST['dep_asign'],$_POST['dep_classes']);
        } 
          if($_POST['fanc'] ==  "add_course"){
            add::add_course($_POST['co_name'],$_POST['co_asign'],$_POST['co_hour'],$_POST['dep_id'],$_POST['sem_id'],$_POST['mos_id']);
        }  
        if($_POST['fanc'] ==  "add_std"){
            add::add_std($_POST['coll_id'],$_POST['dep_id'],$_POST['dof_id'],$_POST['mos_id'],$_POST['sem_id'],
            $_POST['ros_ts'],$_POST['ros_one'],
            $_POST['ros_two'],$_POST['ros_all'],$_POST['ros_card'],$_POST['ros_tamin'],$_POST['std_un_no'],
            $_POST['std_name'],$_POST['std_type_gbol'],$_POST['std_program'],$_POST['std_wly_phone'],$_POST['std_wly_name'],
            $_POST['rgm_wtny'],$_POST['std_phone'],$_POST['std_wly_address'],$_POST['std_type'],$_POST['std_full_address'],$_POST['std_fdm'] 
        );
        }
}

if($_POST['class_name'] ==  "update"){
        if($_POST['fanc'] ==  "update_coll"){
            update::update_coll($_POST['coll_id'],$_POST['coll_name']);

        } 
         if($_POST['fanc'] ==  "update_dofa"){
            update::update_dofa($_POST['dof_id'],$_POST['dof_name'],$_POST['dep_id'],$_POST['ros_ts'],$_POST['ros_one'],$_POST['ros_two'],$_POST['ros_all']);

        }  
        if($_POST['fanc'] ==  "update_result_done"){
            update::update_result_done($_POST['res_id'],$_POST['degree']);

        }   
        if($_POST['fanc'] ==  "update_depart"){
            update::update_depart($_POST['dep_name'],$_POST['dep_id'],$_POST['dep_asign'],$_POST['dep_classes'],$_POST['coll_id']);
        }
        if($_POST['fanc'] ==  "update_course"){
                                      
            update::update_course($_POST['co_name3'],$_POST['co_asign3'],$_POST['co_hour3'],$_POST['dep_id3'],$_POST['sem_id3'],$_POST['mos_id3'],$_POST['co_id3']);
        }
         if($_POST['fanc'] ==  "update_std"){
            update::update_std($_POST['coll_id'],$_POST['dep_id'],$_POST['dof_id'],$_POST['mos_id'],$_POST['sem_id'],
            $_POST['ros_ts'],$_POST['ros_one'],
            $_POST['ros_two'],$_POST['ros_all'],$_POST['ros_card'],$_POST['ros_tamin'],$_POST['std_un_no'],
            $_POST['std_name'],$_POST['std_type_gbol'],$_POST['std_program'],$_POST['std_wly_phone'],$_POST['std_wly_name'],
            $_POST['rgm_wtny'],$_POST['std_phone'],$_POST['std_wly_address'],$_POST['std_type'],$_POST['std_full_address'],$_POST['std_fdm'],$_POST['std_id'] 
        );                     
  
        }
}
//if give
if($_POST['class_name'] ==  "give"){
        if($_POST['fanc'] ==  "give_student"){
            give::give_student($_POST['dep_id'],$_POST['mos_id'],$_POST['sem_id'],$_POST['co_id']);
        }  
        
        if($_POST['fanc'] ==  "give_dofa"){
            give::give_dofa($_POST['dep_id'],$_POST['mos_id'],$_POST['sem_id'],$_POST['dof_id']);
        } 
         if($_POST['fanc'] ==  "give_dofa2"){
            give::give_dofa2($_POST['dep_id'],$_POST['dof_id']);
        } 
        if($_POST['fanc'] ==  "give_dofa9"){
            give::give_dofa9($_POST['dep_id'],$_POST['dof_id'],$_POST['sem_id'],$_POST['result_type']);
        }  
  
}
//if select
if($_POST['class_name'] ==  "select"){
        if($_POST['fanc'] ==  "std"){
            select::std($_POST['std_id']);
        }   
        if($_POST['fanc'] ==  "course"){
            select::course($_POST['dep_id'],$_POST['mos_id'],$_POST['sem_id']);
        
        }
        if($_POST['fanc'] ==  "dofa"){
            select::dofa($_POST['dep_id']);
        
        }  
         if($_POST['fanc'] ==  "sem"){
            select::sem($_POST['dep_id']);
        
        }   
   
}
//if delete
if($_POST['class_name'] ==  "delete"){
        if($_POST['fanc'] ==  "delete_"){
            delete::delete_($_POST['t_name'],$_POST['t_id'],$_POST['del_id']);
        }   
   
}
//fil list

if($_POST['class_name'] ==  "fill_list"){
    
    fill_list::listy($_POST['t_name']);
         
   
}
//fil list2

if($_POST['class_name'] ==  "fill_list2"){
    
    fill_list2::listy($_POST['t_name'],$_POST['t_id'],$_POST['where_id']);
         
   
}

//fil give_limit_from_table

if($_POST['class_name'] ==  "give_limit_from_table"){
    
    give_limit_from_table::give_limit($_POST['t_name_to_give_limit'],$_POST['mos_id'],$_POST['id_feild_name'],$_POST['name']);
         
     
}

if($_POST['class_name'] ==  "give_limit_from_table2"){
    
    give_limit_from_table2::give_limit2($_POST['t_name'],$_POST['limit']);
         
   
}



//add class
class add{
        public function add_first_rosoom($std_id){
            include "connect.php";
            $select_std_data = mysqli_query($conn,"select * from student where std_id='$std_id'");
            $select_check = mysqli_query($conn,"select * from rosoom where std_id = '$std_id'");
            if(mysqli_num_rows($select_check) > 0){
                  $ro = mysqli_fetch_assoc($select_std_data);
                   $sem_id = $ro['sem_id'];
                   $dep_id = $ro['dep_id'];
                   $mos_id = $ro['mos_id'];
                   $select_mdl = mysqli_query($conn,"select * from result where std_id = '$std_id' and dep_id='$dep_id' and sem_id = '$sem_id'  and mos_id='$mos_id'");
                
                              $poin = 0;
                              $hour = 0;

                              while ($crow= mysqli_fetch_array($select_mdl))
                                     { 
                                        $poin +=  floatval($crow['co_points']) * floatval($crow['co_hour']) ;
                                           $hour += floatval($crow['co_hour']);
                                        
                                     }
                                    
   if($poin<=0){
      echo "you_first_success";
         }
          else
          {
      if(round($poin/$hour,2) < 2)
       {
     echo "you_first_success";
     
     
    }
   else{
        
   $dep_cl = mysqli_query($conn,"select * from departs where dep_id = '$dep_id'");
   $dep_row = mysqli_fetch_assoc($dep_cl);
   $dep_classes = $dep_row['dep_classes'];
          if($sem_id+1 <= $dep_classes){
        $select =mysqli_query($conn,"select * from student where std_id = '$std_id'");
        $row = mysqli_fetch_assoc($select);
        $std_un_no = $row['std_un_no'];
        $std_id = $row['std_id'];
 
        $ros_ts = $row['ros_ts'];
        $ros_sem = $row['ros_one'];
        $ros_card = $row['ros_card'];
        $ros_tamin = $row['ros_tamin'];
        $ros_all = $row['ros_tamin'] + $row['ros_ts'] + $row['ros_card'] + $row['ros_one'];
            if(($sem_id+1)%2 == 0){
               //0000000
                   $all_sem = $sem_id+1;
        $update = mysqli_query($conn,"update student set 
        sem_id='$all_sem'
         where std_id='$std_id'");
                  if($update){
                    $insert  = mysqli_query($conn,"insert into 
                    rosoom(std_id,std_un_no,sem_id,ros_ts,ros_sem,ros_all)
                    values('$std_id','$std_un_no','$all_sem','$ros_ts','$ros_sem','$ros_all')");
                    if($insert){
                        echo "done";
                    }
                       }                               
                                            
                         }else{
                              // 11111111
                               $all_mos = $mos_id+1;
                              $all_sem = $sem_id+1;
  $update = mysqli_query($conn,"update student set sem_id='$all_sem',mos_id='$all_mos'
  where std_id='$std_id'");
    if($update){
        $insert  = mysqli_query($conn,"insert into 
        rosoom(std_id,std_un_no,sem_id,ros_ts,ros_sem,ros_card,ros_tamin,ros_all)
        values('$std_id','$std_un_no','$all_sem','$ros_ts','$ros_sem','$ros_card','$ros_tamin','$ros_all')");
        if($insert){
            echo "done";
        }
    }                               

                                              }
                                            }else{echo "grad";}
                                            }
                                      
                                     }   
                             

            }else{

            
            $select =mysqli_query($conn,"select * from student where std_id = '$std_id'");
            $row = mysqli_fetch_assoc($select);
            $std_un_no = $row['std_un_no'];
            $std_id = $row['std_id'];
            $sem_id = $row['sem_id'];
            $ros_ts = $row['ros_ts'];
            $ros_sem = $row['ros_one'];
            $ros_card = $row['ros_card'];
            $ros_tamin = $row['ros_tamin'];
            $ros_all = $ros_tamin +  $ros_ts + $ros_card + $ros_sem;
            $insert  = mysqli_query($conn,"insert into 
            rosoom(std_id,std_un_no,sem_id,ros_ts,ros_sem,ros_card,ros_tamin,ros_all)
            values('$std_id','$std_un_no','$sem_id','$ros_ts','$ros_sem','$ros_card','$ros_tamin','$ros_all')");
            if($insert){
                echo "done";
            }
           
        }  
     }
        
        public function add_coll($coll_name){
            include "connect.php";
            $select =mysqli_query($conn,"select * from college where coll_name = '$coll_name'");
            if(mysqli_num_rows($select) > 0){
                echo "found";
            }else{
       if(!empty($coll_name)){
        $insert = mysqli_query($conn,"insert into college(coll_name) values('$coll_name')");

        if($insert){
            echo "done";
        } 
       }else{
      
        echo "null";
       }
    }
        }       
          public function add_dofa($dof_name,$dep_id,$ros_ts,$ros_one,$ros_two,$ros_all){
            include "connect.php";
            $mydate = date("Y-m-d");
            $select =mysqli_query($conn,"select * from dofa where dof_name = '$dof_name'  and dep_id = '$dep_id'");
            if(mysqli_num_rows($select) > 0){
                echo "found";
            }else{
       if(!empty($dof_name)  and !empty($dep_id)){
        $insert = mysqli_query($conn,"insert into dofa(dof_name,dep_id,ros_ts,ros_one,ros_two,ros_all,date) 
        values('$dof_name','$dep_id','$ros_ts','$ros_one','$ros_two','$ros_all','$mydate')");

        if($insert){
            echo "done";
        } 
       }else{
      
        echo "null";
       }
    }
        }    
          public function add_result($std_id,$std_name,$std_un_no,$coll_id,$dep_id,$mos_id,$sem_id,$dof_id,$co_id,$co_name,$co_hour,$result){
            include "connect.php";
             $point = 0;
             $tgdeer = "";
             $letter = "";
             if($result >= 80){
                 $point = 4;
                 $tgdeer = "ممتاز";
                 $letter = "A";
             }
             else if($result >= 75){
                 $point = 3.5;
                 $tgdeer = "ممتاز";
                 $letter = "B+";
             }
             else if($result >= 70){
                 $point = 3;
                 $tgdeer = "جيد جدآ";
                 $letter = "B";
             } 
             else if($result >= 65){
                 $point = 2.5;
                 $tgdeer = "جيد";
                 $letter = "C+";
             } 
             else if($result >= 60){
                 $point = 2;
                 $tgdeer = "مقبول";
                 $letter = "C";
             } 
             else if($result >= 55){
                 $point = 1.5;
                 $tgdeer = "مقبول";
                 $letter = "D+";
             }
             else if($result >= 50){
                 $point = 1;
                 $tgdeer = "مقبول";
                 $letter = "D";
             }
             else if($result < 50){
                 $point = 0;
                 $tgdeer = "رسوب";
                 $letter = "F";
             }
$select =  mysqli_query($conn,"select * from result where std_id='$std_id' and co_id = '$co_id'");
if(mysqli_num_rows($select) > 0){
    $update = mysqli_query($conn,"update result set 
    result = '$result',co_points ='$point',co_tgdeer='$tgdeer',co_letter = '$letter' where co_id = '$co_id' and std_id='$std_id'");

    if($update){
     if($result>49.98){
 mysqli_query($conn,"delete from result2 where std_id='$std_id' and co_id = '$co_id'");
 echo "updated";
     }else{
        $select =  mysqli_query($conn,"select * from result2 where std_id='$std_id' and co_id = '$co_id'");
        if(mysqli_num_rows($select) > 0){
            mysqli_query($conn,"update result set 
            result = '$result',co_points ='$point',co_tgdeer='$tgdeer',co_letter = '$letter' where co_id = '$co_id' and std_id='$std_id'");
        
            echo "updated";
        }else{
//insert into result2   
$insert2  = mysqli_query($conn,"insert into 
result2(std_id,std_name,std_un_no,coll_id,dep_id,mos_id,sem_id,dof_id,co_id,co_name,co_hour,result,co_points,co_tgdeer,co_letter)
values('$std_id','$std_name','$std_un_no','$coll_id','$dep_id','$mos_id','$sem_id','$dof_id','$co_id','$co_name','$co_hour','$result','$point','$tgdeer','$letter')");
      
            echo "updated";
        }
        
     }
 
}
   
}else{
    if($result < 49.99){
        //insert into result
    $insert  = mysqli_query($conn,"insert into 
    result(std_id,std_name,std_un_no,coll_id,dep_id,mos_id,sem_id,dof_id,co_id,co_name,co_hour,result,co_points,co_tgdeer,co_letter)
  values('$std_id','$std_name','$std_un_no','$coll_id','$dep_id','$mos_id','$sem_id','$dof_id','$co_id','$co_name','$co_hour','$result','$point','$tgdeer','$letter')");
  //insert into result2   
  $insert2  = mysqli_query($conn,"insert into 
    result2(std_id,std_name,std_un_no,coll_id,dep_id,mos_id,sem_id,dof_id,co_id,co_name,co_hour,result,co_points,co_tgdeer,co_letter)
  values('$std_id','$std_name','$std_un_no','$coll_id','$dep_id','$mos_id','$sem_id','$dof_id','$co_id','$co_name','$co_hour','$result','$point','$tgdeer','$letter')");
          
  //if result and result2 insert done    
         if($insert and $insert2){
             echo "done";
         }   
         }   else{
            $insert  = mysqli_query($conn,"insert into 
            result(std_id,std_name,std_un_no,coll_id,dep_id,mos_id,sem_id,dof_id,co_id,co_name,co_hour,result,co_points,co_tgdeer,co_letter)
          values('$std_id','$std_name','$std_un_no','$coll_id','$dep_id','$mos_id','$sem_id','$dof_id','$co_id','$co_name','$co_hour','$result','$point','$tgdeer','$letter')");
                      
                 if($insert){
                     echo "done";
                 }  
         }
}
  
        } 
        public function   add_dep($coll_id , $dep_name,$dep_asign,$dep_classes){
            include "connect.php";
         
            if(!empty($dep_name) and !empty($coll_id) and !empty($dep_asign) and !empty($dep_classes)){
             $insert = mysqli_query($conn,"insert into departs(dep_name,dep_asign,dep_classes,coll_id) 
             values('$dep_name','$dep_asign','$dep_classes','$coll_id')");
     
             if($insert){
                 echo "done";
             } 
            }else{
      
                echo "null";
               }
           
        }       
         public function   add_std($coll_id , $dep_id,$dof_id,$mos_id,$sem_id,$ros_ts,$ros_one,$ros_two,$ros_all,$ros_card,$ros_tamin,$std_un_no,$std_name,$std_type_gbol,$std_program,$std_wly_phone,$std_wly_name,$rgm_wtny,$std_phone,$std_wly_address,$std_type,$std_full_address,$std_fdm ){
             //std_name,std_type_gbol,std_program,std_wly_phone,std_wly_name,rgm_wtny,std_phone,std_wly_address,std_type
 
             //echo $coll_id ." - ". $dep_id  ."=".$dof_id."?".$mos_id."=".$sem_id;
             //echo $ros_ts ." - ". $ros_one  ."=".$ros_two."?".$ros_all."=".$ros_card."_".$ros_tamin."=".$std_un_no;
             //echo $std_name ." - ". $std_type_gbol  ."=".$std_program."?".$std_wly_phone."=".$std_wly_name."_".$rgm_wtny."=".$std_phone;
            // echo $std_wly_address ." - ". $std_type  ;

           // std_id	std_name	std_un_no	dep_id	mos_id	std_fdm	std_state	sem_id	std_wly_name	std_wly_phone	std_wly_address	std_phone	std_type_gbol	dof_id	ros_ts	ros_one	ros_two	ros_all	ros_card	ros_tamin	std_program	rgm_wtny	std_type

            include "connect.php";

 $select = mysqli_query($conn,"select * from student where std_un_no = '$std_un_no' ");
 if(mysqli_num_rows($select) > 0 ){
     echo "found";
 }else{
    $insert = mysqli_query($conn,"insert into 
    student(coll_id,dep_id,dof_id,mos_id,sem_id,ros_ts,ros_one,ros_two,
    ros_all,ros_card,ros_tamin,std_un_no,std_name,std_type_gbol,
    std_program,std_wly_phone,std_wly_name,rgm_wtny,std_phone,std_wly_address,
    std_type,std_full_address,std_fdm)
    values('$coll_id','$dep_id','$dof_id','$mos_id','$sem_id','$ros_ts',
    '$ros_one','$ros_two','$ros_all','$ros_card','$ros_tamin','$std_un_no',
    '$std_name','$std_type_gbol','$std_program','$std_wly_phone','$std_wly_name','$rgm_wtny',
    '$std_phone','$std_wly_address','$std_type','$std_full_address','$std_fdm')");
         
    if($insert){
        echo "done";
    }
        
}    
        }
         public function   add_course($co_name,$co_asign,$co_hour,$dep_id,$sem_id,$mos_id){
             
            include "connect.php";
            if(!empty($co_name) and !empty($dep_id) and !empty($mos_id) and !empty($co_hour)){
                $select = mysqli_query($conn,"select * from course where co_name = '$co_name' and dep_id = '$dep_id' and mos_id = '$mos_id'");
                if(mysqli_num_rows($select)> 0 ){
                    echo "found";
                }else{
                   $insert = mysqli_query($conn,"insert into course(co_name,co_asign,co_hour,dep_id,sem_id,mos_id) 
                   values('$co_name','$co_asign','$co_hour','$dep_id','$sem_id','$mos_id')");
           
                   if($insert){
                       echo "done";
                   } 
                }
                 
            }else{
                echo "pls_fill";
            }
        
            
        }
}
//update class
class update{
    public function update_coll($coll_id,$coll_name){
          include "connect.php";
          if(!empty($coll_name)){
          $select =mysqli_query($conn,"select * from college where coll_name = '$coll_name'");
          if(mysqli_num_rows($select) > 0){
              echo "found";
          }else{
            $update = mysqli_query($conn,"update  college  set coll_name = '$coll_name' where coll_id = '$coll_id'");

            if($update){
                echo "done";
            } 
        }
    }else{
        echo "pls_fill"; 
    }
     }  
     
     public function update_result_done($res_id,$result){
          include "connect.php";
          $point = 0;
          $tgdeer = "";
          $letter = "";
          if($result >= 80){
              $point = 4;
              $tgdeer = "ممتاز";
              $letter = "A";
          }
          else if($result >= 75){
              $point = 3.5;
              $tgdeer = "ممتاز";
              $letter = "B+";
          }
          else if($result >= 70){
              $point = 3;
              $tgdeer = "جيد جدآ";
              $letter = "B";
          } 
          else if($result >= 65){
              $point = 2.5;
              $tgdeer = "جيد";
              $letter = "C+";
          } 
          else if($result >= 60){
              $point = 2;
              $tgdeer = "مقبول";
              $letter = "C";
          } 
          else if($result >= 55){
              $point = 1.5;
              $tgdeer = "مقبول";
              $letter = "D+";
          }
          else if($result >= 50){
              $point = 1;
              $tgdeer = "مقبول";
              $letter = "D";
          }
          else if($result < 50){
              $point = 0;
              $tgdeer = "رسوب";
              $letter = "F";
          }
          if(!empty($result)){
           // co_points,co_tgdeer,co_letter
           if($result >= 0 and $result <= 100){
            $update = mysqli_query($conn,"update  result  set
             result = '$result',
             co_points='$point',
             co_tgdeer='$tgdeer',
             co_letter='$letter'
              where res_id = '$res_id'");

            if($update){
                echo "done";
            } 
        }else{
            echo "fill_true_result";
        }
    }else{
        echo "pls_fill"; 
    }
     }  
      public function update_dofa($dof_id,$dof_name,$dep_id,$ros_ts,$ros_one,$ros_two,$ros_all){
          include "connect.php";
          if(!empty($dof_name) or !empty($ros_ts) or !empty($ros_one) or !empty($ros_two) or !empty($ros_all)  ){
            
              $update = mysqli_query($conn,"update  dofa  set
               dof_name = '$dof_name',dep_id='$dep_id',
               ros_ts='$ros_ts',ros_one='$ros_one',
               ros_two = '$ros_two',ros_all = '$ros_all' where dof_id = '$dof_id'");
  
              if($update){
                  echo "done";
              } 
           
          }else{
            echo "pls_fill";  
          }
       
     } 
     public function update_depart($dep_name , $dep_id , $dep_asign , $dep_classes , $coll_id){
          include "connect.php";
          $q1 = mysqli_query($conn,"select * from departs where dep_name = '$dep_name' ");
          if(mysqli_num_rows($q1) > 0 ){
           echo  "found";
            } 
             else{
                if(!empty($dep_name) and !empty($dep_id) and !empty($dep_asign) and !empty($dep_classes) and !empty($coll_id))
                {
                    $update = mysqli_query($conn,"update  departs  set 
                    dep_name = '$dep_name',dep_asign='$dep_asign',dep_classes='$dep_classes',coll_id='$coll_id' where dep_id = '$dep_id'") ;
                    if($update){
                        echo "done";
                    }     
                }else{
                    echo "pls_fill";
                }
            }
        }
        
     public function update_course($co_name3 , $co_asign3 , $co_hour3 , $dep_id3 , $sem_id3, $mos_id3 , $co_id3){
               //co_name3 ,co_asign3,co_hour3,dep_id3,sem_id3,   mos_id3,co_id3
          include "connect.php";
        
            
             if(!empty($co_name3) and !empty($co_asign3) and !empty($co_hour3) and !empty($dep_id3) and !empty($sem_id3) and !empty($mos_id3) )
             {
              $update = mysqli_query($conn,"update  course  set 
              co_name = '$co_name3',
              co_asign='$co_asign3',
              co_hour='$co_hour3',
               sem_id='$sem_id3',
               mos_id='$mos_id3',
              dep_id='$dep_id3' where co_id = '$co_id3'") ;
             
              
              if($update){
                  echo "done";
              }
  
             }else{
                 echo "pls_fill";
             }
           
  
          
         
    
     }    
      public function update_std($coll_id , $dep_id,$dof_id,$mos_id,$sem_id,
      $ros_ts,$ros_one,$ros_two,$ros_all,$ros_card,$ros_tamin,$std_un_no,
      $std_name,$std_type_gbol,$std_program,$std_wly_phone,$std_wly_name,
      $rgm_wtny,$std_phone,$std_wly_address,$std_type,$std_full_address,
      $std_fdm,$std_id){
          include "connect.php";
        
            
           
              $update = mysqli_query($conn,"update  student  set 
              coll_id = '$coll_id',
              dep_id = '$dep_id',
              dof_id = '$dof_id',
              mos_id = '$mos_id',
              sem_id = '$sem_id',
              ros_ts = '$ros_ts',
              ros_one = '$ros_one',
              ros_two = '$ros_two',
              ros_all = '$ros_all',
              ros_card = '$ros_card',
              ros_tamin = '$ros_tamin',
              std_un_no = '$std_un_no',
              std_name = '$std_name',
              std_type_gbol = '$std_type_gbol',
              std_program = '$std_program',
              std_wly_phone = '$std_wly_phone',
              std_wly_name = '$std_wly_name',
              rgm_wtny = '$rgm_wtny',
              std_phone = '$std_phone',
              std_wly_address = '$std_wly_address',
              std_type = '$std_type',
              std_full_address = '$std_full_address',
              std_fdm = '$std_fdm'   where std_id = '$std_id'") ;
             
              
              if($update){
                  echo "done";
              }
        }
}

///azn toread class
class azn{
        public function azn_toread($std_id,$std_name,$std_un_no,$dof_id,$mos_id,$sem_id){
           
            include "connect.php";
          $select  = mysqli_query($conn,"select * from student where std_id ='$std_id'");
          if(mysqli_num_rows($select)>0){
             $sel_rosoom = mysqli_query($conn,"select * from rosoom where std_id ='$std_id'");
             if(mysqli_num_rows($sel_rosoom)>0){
                    if(($sem_id+1)%2 == 0){ //semister zogy 
                        $rows = mysqli_fetch_assoc($select);
                        $coll_id = $rows['coll_id'];
                        $sem_id = $rows['sem_id'];
                        $mos_id = $rows['mos_id'];
                        $ros_ts = $rows['ros_ts'];
                        $ros_one = $rows['ros_one'];
                        $ros_card = $rows['ros_card'];
                        $ros_tamin  = $rows['ros_tamin'];
                        $std_name_db  = $rows['std_name'];
                        $std_un_no_db  = $rows['std_un_no'];
                        $dep_id  = $rows['dep_id'];
                         ?>
<div style='text-align:center;'> بسم الله الرحمن الرحيم</div>
<div style='text-align:center;font-weight:bold;'> وزارة التعليم العالي والبحث العلمي</div>



<div style='text-align:center;'>
    <img src="images/logo.png" alt="" class="src">
</div>
<br>
<div style='display: block; padding:20px;font-size:40px;
         margin-right: auto;
         margin-left: auto;
         text-align:center;font-weight:bold;width:40%; border:4px solid gray;border-radius:5px;'> إذن توريد مالي </div>
<br>
<br>
<div style='font-size:18px;'>
    <div style='text-align:right;'>
        <div>السيد / مدير بنك النيل - حساب رقم 17945</div>
        <div>التكرم بإستلام المبلغ الموضح أدناه من <?php echo $std_name_db;?></div>
        <div>
            الكلية :
            <?php $select_coll = mysqli_query($conn,"select * from college where coll_id = '$coll_id'");
         $row_coll = mysqli_fetch_assoc($select_coll);
         echo $row_coll['coll_name'];
         ?>
        </div>
        <div>
            رقم الطالب الجامعي : <?php echo $std_un_no_db;?>

            السنه : <?php echo "  ";  
         $select_mos = mysqli_query($conn,"select * from mostwa where mos_id = '$mos_id' ");
         $row_mos = mysqli_fetch_assoc($select_mos);
               $sim = array('الاول','الثاني','الثالث','الرابع','الخامس','السادس');
               if(($sem_id+1)%2 == 0){
                $y =  $row_mos['mos_level']-1;
                echo "    ".$sim[$y];
               }else{
                $y =  $row_mos['mos_level'];
                echo "    ".$sim[$y];
               }
          
        
       
       ?>

            التخصص :
            <?php echo "  ";  
         $select_dep = mysqli_query($conn,"select * from departs where dep_id = '$dep_id' ");
         $row_dep = mysqli_fetch_assoc($select_dep);
         
        echo $row_dep['dep_name'];
       
       ?>
        </div>

    </div>
    <br>
    <table class='table' style='text-align:center;'>
        <tr>
            <td width='5%' style='border-left:1px solid #eee;'>الرقم</td>
            <td width='30%' style='border-left:1px solid  #eee;'>المبلغ المالي المستحق دفعه</td>
            <td width='65%' style='border-left:1px solid  #eee;'>البيان</td>

        </tr>
        <tr>
            <td style='border-left:1px solid  #eee;'>1</td>
            <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_ts'];?> </td>
            <td style='border-left:1px solid  #eee;'>رسوم تسجيل</td>

        </tr>
        <tr>
            <td style='border-left:1px solid  #eee;'>2</td>
            <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_two'];?></td>
            <td style='border-left:1px solid  #eee;'>رسوم دراسية فصل دارسي
                <?php
                   $sem_arry = array('0','الاول','الثاني','الثالث','الرابع','الخامس','السادس','السابع','الثامن','التاسع','العاشر','الحادي عشر','الثاني عشر');
                  echo $sem_arry[$sem_id+1];
                  ?>
            </td>

        </tr>

        <tr>
            <td>الجملة</td>

            <td> <?php echo  $rows['ros_two']+$rows['ros_ts'];?> </td>
            <td> </td>


        </tr>
    </table>
    <div style='text-align:right;'>
        اسم موظف المسئول
        :................................................................................التوقيع:........................................التاريخ
        <?php echo date("Y/m/d");?>
    </div>
    <br><br>
    <div style='text-align:right;text-decoration:underline;'>
        لاستخدام موظف البنك :
    </div>
    <br>
    <table class='table' style='text-align:right;'>
        <tr>
            <td style='border-left:1px solid  #eee;'>المبلغ المستلم
                :بالأرقام:................................................</td>
            <td colspan='2' style='border-left:1px solid  #eee;'>
                كتابة:..............................................................................</td>
        </tr>
        <tr>
            <td style='border-left:1px solid  #eee;'>رقم الايصال :................................................</td>
            <td colspan='2' style='border-left:1px solid  #eee;'>اسم
                المحاسب:......................................................</td>
        </tr>
        <tr>
            <td style='border-left:1px solid  #eee;'> التوقيع :................................................</td>
            <td style='border-left:1px solid  #eee;'> التاريخ:......................................</td>
            <td style='border-left:1px solid  #eee;'> الختم: .........................................</td>
        </tr>

    </table>
    <br>
    <div style='text-align:right;text-decoration:underline;'>
        اعتماد مكتب المسجل :
    </div>
    <br>
    <table class='table' style='text-align:right;'>
        <tr>
            <td style='border-left:1px solid  #eee;'> توقيع المسجل بعد
                التوريد:................................................</td>
            <td style='border-left:1px solid  #eee;'> التاريخ:........................................</td>
            <td style='border-left:1px solid  #eee;'> الختم:........................................</td>
        </tr>
    </table>


    <?php
                    }else{//semiter ferdy
                        $rows = mysqli_fetch_assoc($select);
                        $coll_id = $rows['coll_id'];
                        $sem_id = $rows['sem_id'];
                        $mos_id = $rows['mos_id'];
                        $ros_ts = $rows['ros_ts'];
                        $ros_one = $rows['ros_one'];
                        $ros_card = $rows['ros_card'];
                        $ros_tamin  = $rows['ros_tamin'];
                        $std_name_db  = $rows['std_name'];
                        $std_un_no_db  = $rows['std_un_no'];
                        $dep_id  = $rows['dep_id'];
                         ?>
    <div style='text-align:center;'> بسم الله الرحمن الرحيم</div>
    <div style='text-align:center;font-weight:bold;'> وزارة التعليم العالي والبحث العلمي</div>



    <div style='text-align:center;'>
        <img src="images/logo.png" alt="" class="src">
    </div>
    <br>
    <div style='display: block; padding:20px;font-size:40px;
         margin-right: auto;
         margin-left: auto;
         text-align:center;font-weight:bold;width:40%; border:4px solid gray;border-radius:5px;'> إذن توريد مالي </div>
    <br>
    <br>
    <div style='font-size:18px;'>
        <div style='text-align:right;'>
            <div>السيد / مدير بنك النيل - حساب رقم 17945</div>
            <div>التكرم بإستلام المبلغ الموضح أدناه من <?php echo $std_name_db;?></div>
            <div>
                الكلية :
                <?php $select_coll = mysqli_query($conn,"select * from college where coll_id = '$coll_id'");
         $row_coll = mysqli_fetch_assoc($select_coll);
         echo $row_coll['coll_name'];
         ?>
            </div>
            <div>
                رقم الطالب الجامعي : <?php echo $std_un_no_db;?>

                السنه : <?php echo "  ";  
         $select_mos = mysqli_query($conn,"select * from mostwa where mos_id = '$mos_id' ");
         $row_mos = mysqli_fetch_assoc($select_mos);
               $sim = array('الاول','الثاني','الثالث','الرابع','الخامس','السادس');
               if(($sem_id+1)%2 == 0){
                $y =  $row_mos['mos_level']-1;
                echo "    ".$sim[$y];
               }else{
                $y =  $row_mos['mos_level'];
                echo "    ".$sim[$y];
               }
          
        
       
       ?>

                التخصص :
                <?php echo "  ";  
         $select_dep = mysqli_query($conn,"select * from departs where dep_id = '$dep_id' ");
         $row_dep = mysqli_fetch_assoc($select_dep);
         
        echo $row_dep['dep_name'];
       
       ?>
            </div>

        </div>
        <br>
        <table class='table' style='text-align:center;'>
            <tr>
                <td width='5%' style='border-left:1px solid #eee;'>الرقم</td>
                <td width='30%' style='border-left:1px solid  #eee;'>المبلغ المالي المستحق دفعه</td>
                <td width='65%' style='border-left:1px solid  #eee;'>البيان</td>

            </tr>
            <tr>
                <td style='border-left:1px solid  #eee;'>1</td>
                <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_ts'];?> </td>
                <td style='border-left:1px solid  #eee;'>رسوم تسجيل</td>

            </tr>
            <tr>
                <td style='border-left:1px solid  #eee;'>2</td>
                <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_one'];?></td>
                <td style='border-left:1px solid  #eee;'>رسوم دراسية فصل دارسي
                    <?php
                   $sem_arry = array('0','الاول','الثاني','الثالث','الرابع','الخامس','السادس','السابع','الثامن','التاسع','العاشر','الحادي عشر','الثاني عشر');
                  echo $sem_arry[$sem_id+1];
                  ?>
                </td>

            </tr>
            <tr>
                <td style='border-left:1px solid  #eee;'>3</td>
                <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_card'];?></td>
                <td style='border-left:1px solid  #eee;'> رسوم بطاقة</td>


            </tr>
            <tr>
                <td style='border-left:1px solid  #eee;'>3</td>
                <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_tamin'];?></td>
                <td style='border-left:1px solid  #eee;'> رسوم تأمين</td>


            </tr>
            <tr>
                <td>الجملة</td>

                <td> <?php echo $rows['ros_tamin']+$rows['ros_card']+$rows['ros_one']+$rows['ros_ts'];?> </td>
                <td> </td>


            </tr>
        </table>
        <div style='text-align:right;'>
            اسم موظف المسئول
            :................................................................................التوقيع:........................................التاريخ
            <?php echo date("Y/m/d");?>
        </div>
        <br><br>
        <div style='text-align:right;text-decoration:underline;'>
            لاستخدام موظف البنك :
        </div>
        <br>
        <table class='table' style='text-align:right;'>
            <tr>
                <td style='border-left:1px solid  #eee;'>المبلغ المستلم
                    :بالأرقام:................................................</td>
                <td colspan='2' style='border-left:1px solid  #eee;'>
                    كتابة:..............................................................................</td>
            </tr>
            <tr>
                <td style='border-left:1px solid  #eee;'>رقم الايصال :................................................
                </td>
                <td colspan='2' style='border-left:1px solid  #eee;'>اسم
                    المحاسب:......................................................</td>
            </tr>
            <tr>
                <td style='border-left:1px solid  #eee;'> التوقيع :................................................</td>
                <td style='border-left:1px solid  #eee;'> التاريخ:......................................</td>
                <td style='border-left:1px solid  #eee;'> الختم: .........................................</td>
            </tr>

        </table>
        <br>
        <div style='text-align:right;text-decoration:underline;'>
            اعتماد مكتب المسجل :
        </div>
        <br>
        <table class='table' style='text-align:right;'>
            <tr>
                <td style='border-left:1px solid  #eee;'> توقيع المسجل بعد
                    التوريد:................................................</td>
                <td style='border-left:1px solid  #eee;'> التاريخ:........................................</td>
                <td style='border-left:1px solid  #eee;'> الختم:........................................</td>
            </tr>
        </table>


        <?php
                    }
             }else{//first Time to
                 $rows = mysqli_fetch_assoc($select);
                 $coll_id = $rows['coll_id'];
                 $sem_id = $rows['sem_id'];
                 $mos_id = $rows['mos_id'];
                 $ros_ts = $rows['ros_ts'];
                 $ros_one = $rows['ros_one'];
                 $ros_card = $rows['ros_card'];
                 $ros_tamin  = $rows['ros_tamin'];
                 $std_name_db  = $rows['std_name'];
                 $std_un_no_db  = $rows['std_un_no'];
                 $dep_id  = $rows['dep_id'];
                  ?>
        <div style='text-align:center;'> بسم الله الرحمن الرحيم</div>
        <div style='text-align:center;font-weight:bold;'> وزارة التعليم العالي والبحث العلمي</div>



        <div style='text-align:center;'>
            <img src="images/logo.png" alt="" class="src">
        </div>
        <br>
        <div style='display: block; padding:20px;font-size:40px;
  margin-right: auto;
  margin-left: auto;
  text-align:center;font-weight:bold;width:40%; border:4px solid gray;border-radius:5px;'> إذن توريد مالي </div>
        <br>
        <br>
        <div style='font-size:18px;'>
            <div style='text-align:right;'>
                <div>السيد / مدير بنك النيل - حساب رقم 17945</div>
                <div>التكرم بإستلام المبلغ الموضح أدناه من <?php echo $std_name_db;?></div>
                <div>
                    الكلية :
                    <?php $select_coll = mysqli_query($conn,"select * from college where coll_id = '$coll_id'");
  $row_coll = mysqli_fetch_assoc($select_coll);
  echo $row_coll['coll_name'];
  ?>
                </div>
                <div>
                    رقم الطالب الجامعي : <?php echo $std_un_no_db;?>

                    السنه : <?php echo "  ";  
  $select_mos = mysqli_query($conn,"select * from mostwa where mos_id = '$mos_id' ");
  $row_mos = mysqli_fetch_assoc($select_mos);
        $sim = array('الاول','الثاني','الثالث','الرابع','الخامس','السادس');
        $y =  $row_mos['mos_level']-1;
   echo "    ".$sim[$y];
 

?>

                    التخصص :
                    <?php echo "  ";  
  $select_dep = mysqli_query($conn,"select * from departs where dep_id = '$dep_id' ");
  $row_dep = mysqli_fetch_assoc($select_dep);
  
 echo $row_dep['dep_name'];

?>
                </div>

            </div>
            <br>
            <table class='table' style='text-align:center;'>
                <tr>
                    <td width='5%' style='border-left:1px solid #eee;'>الرقم</td>
                    <td width='30%' style='border-left:1px solid  #eee;'>المبلغ المالي المستحق دفعه</td>
                    <td width='65%' style='border-left:1px solid  #eee;'>البيان</td>

                </tr>
                <tr>
                    <td style='border-left:1px solid  #eee;'>1</td>
                    <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_ts'];?> </td>
                    <td style='border-left:1px solid  #eee;'>رسوم تسجيل</td>

                </tr>
                <tr>
                    <td style='border-left:1px solid  #eee;'>2</td>
                    <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_one'];?></td>
                    <td style='border-left:1px solid  #eee;'>رسوم دراسية فصل دارسي الاول</td>

                </tr>
                <tr>
                    <td style='border-left:1px solid  #eee;'>3</td>
                    <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_card'];?></td>
                    <td style='border-left:1px solid  #eee;'> رسوم بطاقة</td>


                </tr>
                <tr>
                    <td style='border-left:1px solid  #eee;'>3</td>
                    <td style='border-left:1px solid  #eee;'> <?php echo $rows['ros_tamin'];?></td>
                    <td style='border-left:1px solid  #eee;'> رسوم تأمين</td>


                </tr>
                <tr>
                    <td>الجملة</td>

                    <td> <?php echo $rows['ros_tamin']+$rows['ros_card']+$rows['ros_one']+$rows['ros_ts'];?> </td>
                    <td> </td>


                </tr>
            </table>
            <div style='text-align:right;'>
                اسم موظف المسئول
                :................................................................................التوقيع:........................................التاريخ
                <?php echo date("Y/m/d");?>
            </div>
            <br><br>
            <div style='text-align:right;text-decoration:underline;'>
                لاستخدام موظف البنك :
            </div>
            <br>
            <table class='table' style='text-align:right;'>
                <tr>
                    <td style='border-left:1px solid  #eee;'>المبلغ المستلم
                        :بالأرقام:................................................</td>
                    <td colspan='2' style='border-left:1px solid  #eee;'>
                        كتابة:..............................................................................</td>
                </tr>
                <tr>
                    <td style='border-left:1px solid  #eee;'>رقم الايصال
                        :................................................</td>
                    <td colspan='2' style='border-left:1px solid  #eee;'>اسم
                        المحاسب:......................................................</td>
                </tr>
                <tr>
                    <td style='border-left:1px solid  #eee;'> التوقيع :................................................
                    </td>
                    <td style='border-left:1px solid  #eee;'> التاريخ:......................................</td>
                    <td style='border-left:1px solid  #eee;'> الختم: .........................................</td>
                </tr>

            </table>
            <br>
            <div style='text-align:right;text-decoration:underline;'>
                اعتماد مكتب المسجل :
            </div>
            <br>
            <table class='table' style='text-align:right;'>
                <tr>
                    <td style='border-left:1px solid  #eee;'> توقيع المسجل بعد
                        التوريد:................................................</td>
                    <td style='border-left:1px solid  #eee;'> التاريخ:........................................</td>
                    <td style='border-left:1px solid  #eee;'> الختم:........................................</td>
                </tr>
            </table>


            <?php
             }
          }
            

        }
}
///select class
class select{
        public function std($std_id){
            include "connect.php";

            $select = "select *  from student where std_id = ".$std_id ;
            $q = mysqli_query($conn, $select);
            $rows = array();

            while($r = mysqli_fetch_assoc($q) ){
            $rows[] = $r;
            }
            print json_encode($rows);
             
             

        }      
          public function course($dep_id,$mos_id,$sem_id){
            include "connect.php";
             
            $select = "select *  from course where dep_id = ".$dep_id ." and mos_id = ".$mos_id." and sem_id=".$sem_id ;
            $q = mysqli_query($conn, $select);
            $rows = array();

            while($r = mysqli_fetch_assoc($q) ){
            $rows[] = $r;
            }
            print json_encode($rows);
             
             

        }   
           public function dofa($dep_id){
            include "connect.php";
             
            $select = "select *  from dofa where dep_id = ".$dep_id ;
            $q = mysqli_query($conn, $select);
            $rows = array();

            while($r = mysqli_fetch_assoc($q) ){
            $rows[] = $r;
            }
            print json_encode($rows);
             
             

        }  
            public function sem($dep_id){
            include "connect.php";
             
            $select = "select *  from departs where dep_id = ".$dep_id ;
            $q = mysqli_query($conn, $select);
            $rows = array();

            while($r = mysqli_fetch_assoc($q) ){
            $rows[] = $r;
            }
            print json_encode($rows);
             
             

        }
}
///delete class
class delete{
        public function delete_($table_name,$table_id,$delete_id){
            include "connect.php";

            
            $del_row = "delete from ".$table_name. ' where ' . $table_id . ' = ' . $delete_id;
            if($delete_id){

                $del = mysqli_query($conn,$del_row);
                
                if($del){
                       if($table_name == "college"){
                        mysqli_query($conn,"delete from departs where coll_id = '$delete_id'");  
                        }
                    echo "done";
                }
            }

        }
}
///fill_lsit class
class fill_list{
        public function listy($t_name){
            include "connect.php";
 
            
            $select = "select *  from ".$t_name ;
            $q = mysqli_query($conn, $select);
            $rows = array();

            while($r = mysqli_fetch_assoc($q) ){
            $rows[] = $r;
            }
            print json_encode($rows);
             

        }
}
//fill_lsit class
class fill_list2{
        public function listy($t_name,$t_id,$where_id){
            include "connect.php";
 
            if($t_name == "dofa"){

                $select = "select *  from ".$t_name." where ".$t_id ."=". $where_id ;
                $q = mysqli_query($conn, $select);

                $rows = array();
    
                while($r = mysqli_fetch_assoc($q) ){
                       
                            $date1 = $r['date'];
                            $date2 = date("Y-m-d");
                            $diff = abs(strtotime($date2) - strtotime($date1));

                            $years = floor($diff / (365*60*60*24));
                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
 
                             if($years < 1){
                                if($months < 4){
                                    $rows[] = $r;
                                }
                            }

                       


                }
                print json_encode($rows);



            }
            
            if($t_name == "dofa2"){
                $select = "select *  from dofa where ".$t_id ."=". $where_id ;
                $q = mysqli_query($conn, $select);

                $rows = array();
    
                while($r = mysqli_fetch_assoc($q) ){
                       
                            $date1 = $r['date'];
                            $date2 = date("Y-m-d");
                            $diff = abs(strtotime($date2) - strtotime($date1));

                            $years = floor($diff / (365*60*60*24));
                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
 
                             if($years < 1){
                                if($months < 4){
                                    $rows[] = $r;
                                }
                            }

                       


                }
                print json_encode($rows);

            }
            
            if($t_name == "departs"){
                $select = "select *  from ".$t_name." where ".$t_id ."=". $where_id ;
                $q = mysqli_query($conn, $select);
                $rows = array();
    
                while($r = mysqli_fetch_assoc($q) ){
                $rows[] = $r;
                }
                print json_encode($rows);
            }
            

           
             

        }
}
///list fill with limit select
class fill_select{
        public function select_with_limit($t_name ,$feild_show_in_select ,$limit){
            include "connect.php";
 
            
            $select = "select *  from ".$t_name." limit ".$limit ;
            $q = mysqli_query($conn, $select);
            

            while($r = mysqli_fetch_assoc($q) ){
               echo "<option>".$r[$feild_show_in_select]."</option>";
            }
            
             

        }

}
///give class
class give{
    public function   give_dofa9($dep_id,$dof_id,$sem_id,$result_type){
      
        include "connect.php";
 $sem_array  = 0;
 $my_array  = array();
 while($sem_array < $sem_id){
  $sem_array++;
  $my_array[] += $sem_array;
  
 
 }
 $count_dep_sem = mysqli_query($conn,"select *  from departs where dep_id = '$dep_id'");
 $dep_cla = mysqli_fetch_assoc($count_dep_sem);
 $dep_classes = $dep_cla['dep_classes'];
if(!empty($dep_id) and   !empty($dof_id) and   !empty($sem_id) and !empty($result_type) ){
 ?>
            <div class="table-responsive" id='result_content'>
                <table class="table table" cellspacing="0" style='text-align:center;  '>
                    <thead>

                        <tr style='background:gray;color:yellow;text-overflow:ellipsis;white-space:nowrap;'>
                            <?php   
                     include "connect.php";
                           //first query and while
                        $q1  = mysqli_query($conn,"select *  from course where dep_id = '$dep_id'
                         and sem_id='$sem_id'");?>

                            <td style='border:0;background:white;'></td>
                            <td style='border:0;background:white;'></td>

                            <td colspan='<?php echo mysqli_num_rows($q1);?>'>
                                <?php
                      $mos =  
                      $select_dep = mysqli_query($conn,"select * from departs where dep_id = '$dep_id'");
                      $row_dep= mysqli_fetch_assoc($select_dep);
                       $coll_id = $row_dep['coll_id'];
                       $select_coll = mysqli_query($conn,"select * from college where coll_id = '$coll_id'");
                      $row_coll= mysqli_fetch_assoc($select_coll);
                      echo "<span> كلية  ".$row_coll['coll_name']."</span><br>";
                      echo "<span> قسم  ".$row_dep['dep_name']."</span>";
if($sem_id>=11){
    $mos = "السادس";
}else if($sem_id >= 9){
    $mos = "الخامس";
}else if($sem_id>=7){
    $mos = "الرابع";
}else if($sem_id>=5){
    $mos = "الثالث ";
}else if($sem_id>=3){
    $mos = "الثاني";
}else if($sem_id>=1){
    $mos = "الاول ";
} 
                      echo "<br><span> المستـــــــوى  ".$mos."</span>";
 // $sm = array("الاول","الثاني","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر");
  echo "<br><span> الفصل الــــدراسي  ";
 if($sem_id%2 == 0){
     echo "الثاني";
 }else{
     echo "الاول";
 }
  echo "</span>";
                      $select_dof = mysqli_query($conn,"select * from dofa where dof_id = '$dof_id'");
                      $row_dof= mysqli_fetch_assoc($select_dof);
                      echo "<br><span> دفعة  ".$row_dof['dof_name']."</span>";
                      ?>
                            </td>
                        </tr>
                        <tr style='background:gray;color:yellow;text-overflow:ellipsis;white-space:nowrap;'>
                            <?php   
                     include "connect.php";
                           //first query and while
                        $q1  = mysqli_query($conn,"select *  from course where dep_id = '$dep_id'
                         and sem_id='$sem_id'");?>

                            <td></td>
                            <td></td>

                            <td colspan='<?php echo mysqli_num_rows($q1);?>'>
                                <h2> الكورســـــــــــــــــــــــــــــــات الدراســـــــــــــــــــــية </h2>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='background:gray;color:yellow;'>


                            <th style='text-align:right;width:4%;'> # </th>
                            <th style='text-align:right;width:20%;'> الاسم </th>

                            <?php
                           include "connect.php";
                           //first query and while
                        $q1  = mysqli_query($conn,"select *  from course  where dep_id = '$dep_id'
                        and sem_id='$sem_id'");
                        
                        $cors = array();
                        while($row_q1 = mysqli_fetch_assoc($q1)){
                            $cors[] += $row_q1['co_id'];
                            
                          echo "<th  style='background-color:#e1e0cf;color:green;width:7%;
                          font-size:13px;'> 
                           ".$row_q1['co_name']."<sup>".$row_q1['co_hour']."</sup> </th>" ;
                         
                        }  
                     
                        //end first query and while
                          ?>
                            </th>

                            <th width='7%'> م.فصلي</th>
                            <th width='7%'> م.تراكمي</th>
                            <th width='7%'> التقدير</th>

                        </tr>
                    </thead>
                    <?php
                   //secend query and while
   $q2 = mysqli_query($conn,"select    distinct std_id , std_name from result where dof_id = '$dof_id'
   and sem_id ='$sem_id'");
   $counter = 0;
    while ($row = mysqli_fetch_array($q2)) {
        $counter++;
     echo"<tr> <td width='4%'style='text-align:right; border:3px solid gray;'>". $counter."</td>";
     echo"  <td style='text-align:right; border:3px solid gray;'>".$row['std_name']."</td>";
              $std_id = $row['std_id'];
              $std_name = $row['std_name'];
    // q3= select coresid,corsname from students where id = q2.id
    
               
             
  
    $points = 0;       
    $hours  = 0; 
     $tra_points = 0;       
    $tra_hours  = 0;       
                     foreach ($cors as $cors2)
                     {
                        $q3 = mysqli_query($conn,"select * from result where std_id = '$std_id'  and dep_id = '$dep_id'
                        and sem_id='$sem_id' and dof_id='$dof_id'");
                        $found= 0;
                        $current_item = ''; 
                       
                         while ($crow= mysqli_fetch_array($q3))
                                { 
                                  if($cors2 == $crow['co_id'])
                                  {
                                    
                                      
                                      $points +=  floatval($crow['co_points']) * floatval($crow['co_hour']) ;
                                      $hours += floatval($crow['co_hour']);
                                    $found= 1;
                                    $current_item  = $crow['result'];
                                    $course  = $crow['co_name'];
                                   
                                    $res_id  = $crow['res_id'];
                                    foreach($my_array as $cors2){
                                    $q4 = mysqli_query($conn,"select * from result where std_id = '$std_id' and dep_id='$dep_id'   and sem_id='$cors2' and dof_id = '$dof_id'");                      
                                    while($r4 = mysqli_fetch_assoc($q4)){
                                      
                     
                                       $tra_points +=  floatval($r4['co_points']) * floatval($r4['co_hour']) ;
                                         $tra_hours += floatval($r4['co_hour']);
                                         //echo $tra_points."*".$tra_hours."/".$tra_hours."<br>";

                                        }
                                    }
                                 
                                  }
                                  if($found==1){  break;}
                                    
                                }
                                if($found==1)
                                {
                                    if($current_item < 50){
                                        ?>

                    <td class='hover_edit' id='_<?php echo $res_id;?>_<?php echo $current_item;?>'
                        style='background:#ffe8e8;color:red;border:1px solid black;'
                        onclick='edit_result("<?php echo $res_id;?>","<?php echo $current_item;?>","<?php echo $std_name;?>","<?php echo $course;?>","<?php echo $dep_id;?>","<?php echo $sem_id;?>","<?php echo $dof_id;?>","<?php echo $result_type;?>")'>
                        <?php echo $current_item;?></td>;
                    <?php   
                                }else{
                                       ?>
                    <td class='hover_edit' id="_<?php echo $res_id;?>_<?php echo $current_item;?>"
                        style="border:1px solid gray;color:green;"
                        onclick='edit_result("<?php echo $res_id;?>","<?php echo $current_item;?>","<?php echo $std_name;?>","<?php echo $course;?>","<?php echo $dep_id;?>","<?php echo $sem_id;?>","<?php echo $dof_id;?>","<?php echo $result_type;?>")'>
                        <?php echo $current_item;?></td>
                    <?php
                                       
                                    }
                                              
                                 }
                                   else
                                       {
                                            echo   "<td style='border:1px solid green; background:#99ab92;'> </td> ";  
                                       }
                      } 
                      
                      
                         // echo $avg;echo "<br>";
                         
                        //$avarge = $avg/$count;
                 
                        if($points  > 0){
                            
                            if(round(($points/$hours ),2) < 2){
                                echo " <td style='background:#dfd9d9;color:red;style='border:1px solid gray;''> 
                                ". round(($points/$hours ),2)."
                                </td>";
                            }else{
                               
                                echo " <td style='border:1px solid gray;'> ". round(($points/$hours ),2)."</td>";
                            }
                            
                            
                           
                        }else{
                            if($hours > 0 and $points > 0){
                              
                                echo " <td style='background:#dfd9d9;color:red;style='border:1px solid gray;''>
                                ". round(($points/$hours ),2)."
                                </td>";   
                            }else{
                               
                                echo " <td style='background:#dfd9d9;color:red;style='border:1px solid gray;''>
                                ##
                                </td>"; 
                            }

                          
                        }
///////trakomey
                        if($tra_points  > 0){
                            
                            if(round(($tra_points/$tra_hours ),2) < 2){
                                echo " <td style='background:#dfd9d9;color:red;style='border:1px solid gray;''> 
                                ". round(($tra_points/$tra_hours ),2)."
                                </td>";
                            }else{
                               
                                echo " <td style='border:1px solid gray;'> ". round(($tra_points/$tra_hours ),2)."</td>";
                            }
                            
                            
                           
                        }else{
                            echo "<td style='background:#4d4b4b;'>-</td>";
                        }
                        ///////////
                        if($points  > 0){
                        if(round(($points/$hours ),2) >= 3.49){
                            echo "<td style='background:#a4dca4;border:2px solid lightgreen;
                            color:green;'>ممتاز</td>";
                        } 
                        else if(round(($points/$hours ),2) >= 2.99){
                            echo "<td style='background:#a4dca4;border:2px solid lightgreen;
                            color:green;'>جيد جدآ </td>";
                        } 
                        else if(round(($points/$hours ),2) >= 2.49){
                            echo "<td style='background:#a4dca4;border:2px solid lightgreen;
                            color:green; '> جيد</td>";
                        } 
                        else if(round(($points/$hours ),2) >= 1.99){
                            echo "<td style='border:2px solid gray;'> مقبول</td>";
                        } 
                        else if(round(($points/$hours ),2) >= 1.49){
                            echo "<td style='border:2px solid gray;'> إعادة</td>";
                        } else if(round(($points/$hours ),2) < 1.49){
                            echo "<td style='border:2px solid gray;'> فصل</td>";
                        }else{
                            echo " <td style='background:#4d4b4b;color:yellow;border:2px solid gray;'>ضعيف</td>"; 
                        }
                   
                    }else{
                        echo "<td style='background:#4d4b4b;'>-</td>";
                    }
                
                                echo"</tr>";         
                      }
        

                  ?>
                    <tbody>

                </table>

            </div>
            <!--start model-->
            <?php
    }else{echo "pls_fill";}
}  
public function   give_dofa2($dep_id,$dof_id){
      
    include "connect.php";

$count_dep_sem = mysqli_query($conn,"select *  from departs where dep_id = '$dep_id'");
$dep_cla = mysqli_fetch_assoc($count_dep_sem);
$dep_classes = $dep_cla['dep_classes'];
if(!empty($dep_id) and   !empty($dof_id) ){
?>
            <div class="table-responsive" style=" ">
                <table class="table table" cellspacing="0" style='text-align:center;  '>
                    <thead>

                        <tr style='background:gray;color:yellow;text-overflow:ellipsis;white-space:nowrap;'>
                            <?php   
                 include "connect.php";
                       //first query and while
$q1  = mysqli_query($conn,"select *  from semister limit $dep_classes");?>

                            <td style='border:0;background:white;'></td>

                            <td style='background:#d8d8be;color:green;' colspan='<?php echo mysqli_num_rows($q1);?>'>
                                <h2>المعدلات فصول الدراسية</h2>
                            </td>
                        </tr>
                        <tr style='background:#d8d8be;color:brown;'>


                            <th style='text-align:right;width:15%;text-align:center;'> الاسم </th>

                            <?php
                       include "connect.php";
                       //first query and while
                     
                    $qq  = mysqli_query($conn,"select *  from semister  limit $dep_classes ");
$sem_array = array('الاول','الثاني','الثالث','الرابع','الخامس','السادس','السابع','الثامن','التاسع','العاشر','الحادي عشر','الثاني عشر');
                    $cors = array();
                    $x = 0;
                    while($row_q1 = mysqli_fetch_assoc($qq)){
                        $cors[] += $row_q1['sem_id'];
                        
                      echo "<th style='background:#e1e0cf;color:green;border:1px solid green;'> الفصل الدراسي ".$sem_array[$x]." </th>" ;
                   $x++;
                    }  
                 
                    //end first query and while
                      ?>
                            </th>

                            <th width='14%'> م.التراكمي</th>


                        </tr>
                    </thead>
                    <?php
               //secend query and while
               $q2 = mysqli_query($conn,"select     * from student where dep_id='$dep_id' and  dof_id='$dof_id' ");
               while ($row = mysqli_fetch_array($q2)) {
                echo"<tr> <td style='background:#eaeadc;color:green;border:1px solid green;'>".$row['std_name']."</td>";
                         $std_id = $row['std_id'];
                         $sem_id = $row['sem_id'];
    
                         $t_poin = 0;
                         $t_hour = 0;
                                foreach ($cors as $cors2)
                                {
                                    $poin = 0;
                                    $hour = 0;
                                   $q3 = mysqli_query($conn,"select * from result where std_id = '$std_id' and dep_id='$dep_id'   and sem_id='$cors2' and dof_id = '$dof_id'");
                                   $found= 0;
                                   $current_item = ''; 
                                  
                                    while ($crow= mysqli_fetch_array($q3))
                                           { 
                                              $poin +=  floatval($crow['co_points']) * floatval($crow['co_hour']) ;
                                                 $hour += floatval($crow['co_hour']);
                                              
                                           }
                                          
                                           if($poin<=0){
                                            echo "<td style='background:#eaeadc;color:green;border:1px solid green;'>";
                                               echo "-";
                                               echo "</td>";
                                           }else{
                                              if(round($poin/$hour,2) < 2){
                                                echo "<td style='background:#fee0eb;border:1px solid green;color:green;'>";
                                                echo    round($poin/$hour,2);
                                                  echo "</td>";
                                              }else{
                                                echo "<td style='background:#e1e0cf;color:green;border:1px solid green;'>";
                                                echo    round($poin/$hour,2);
                                                  echo "</td>";
                                              }
                                            
                                           }
                              $t_poin += $poin;
                              $t_hour += $hour;
                                  
                                 }
                                 if($t_poin<=0){
                                    echo "<td style='background:#e1e0cf;color:green;border:1px solid green;'>";
                                       echo "-";
                                       echo "</td>";
                                   }else{
                                      if(round($t_poin/$t_hour,2) < 2){
                                        echo "<td style='background:#fee0eb;color:green;border:1px solid green;'>";
                                        echo    round($t_poin/$t_hour,2);
                                          echo "</td>";
                                      }else{
                                        echo "<td style='background:#e1e0cf;color:green;border:1px solid green;'>";
                                        echo    round($t_poin/$t_hour,2);
                                          echo "</td>";
                                      }
                                    
                                   }
                                 echo"</tr>";
                                }
              //////////////
              ?>
                    <tbody>

                </table>
            </div>

            <!--start model-->
            <?php
}else{echo "pls_fill";}
} 
public function   give_dofa($dep_id,$mos_id,$sem_id_,$dof_id){
      
        include "connect.php";

if($sem_id_ ==  1){
    $sem_id = $mos_id + $mos_id -1;
}else{
    $sem_id = $mos_id + $mos_id;
}
if(!empty($dep_id) and !empty($mos_id) and !empty($sem_id) and !empty($dof_id) ){
 ?>
            <div class="table-responsive">
                <table class="table table" cellspacing="0" style='text-align:center;  '>
                    <thead>

                        <tr style='background:gray;color:yellow;text-overflow:ellipsis;white-space:nowrap;'>
                            <?php   
                     include "connect.php";
                           //first query and while
 $q1  = mysqli_query($conn,"select *  from course where dep_id='$dep_id' and mos_id='$mos_id' and sem_id='$sem_id' ");?>

                            <td style='border:0;background:white;'></td>

                            <td colspan='<?php echo mysqli_num_rows($q1);?>'>
                                <h2>الكورسات الدراسية</h2>
                            </td>
                        </tr>
                        <tr style='background:gray;color:yellow;'>


                            <th style='text-align:right;width:15%;'> الاسم </th>

                            <?php
                           include "connect.php";
                           //first query and while
                        $q1  = mysqli_query($conn,"select *  from course where dep_id='$dep_id' and mos_id='$mos_id' and sem_id='$sem_id'  ");
                        
                        $cors = array();
                        while($row_q1 = mysqli_fetch_assoc($q1)){
                            $cors[] += $row_q1['co_id'];
                            
                          echo "<th style='background:#e1e0cf;color:green;'>  ".$row_q1['co_name']." </th>" ;
                        }  
                     
                        //end first query and while
                          ?>
                            </th>

                            <th width='7%'> م.فصلي</th>
                            <th width='7%'> التقدير</th>

                        </tr>
                    </thead>
                    <?php
                   //secend query and while
   $q2 = mysqli_query($conn,"select    distinct std_id , std_name from result where dep_id='$dep_id' and mos_id='$mos_id' and sem_id='$sem_id' and dof_id = '$dof_id'");
    while ($row = mysqli_fetch_array($q2)) {
     echo"<tr> <td style='text-align:right; border:3px solid gray;'>".$row['std_name']."</td>";
              $std_id = $row['std_id'];
    // q3= select coresid,corsname from students where id = q2.id
    
               
             
  
    $points = 0;       
    $hours  = 0;       
                     foreach ($cors as $cors2)
                     {
                        $q3 = mysqli_query($conn,"select * from result where std_id = '$std_id' and dep_id='$dep_id' and mos_id='$mos_id' and sem_id='$sem_id' and dof_id = '$dof_id'");
                        $found= 0;
                        $current_item = ''; 
                       
                         while ($crow= mysqli_fetch_array($q3))
                                { 
                                  if($cors2 == $crow['co_id'])
                                  {
                                    
                                      
                                      $points +=  floatval($crow['co_points']) * floatval($crow['co_hour']) ;
                                      $hours += floatval($crow['co_hour']);

                                    $found= 1;
                                    $current_item  = $crow['result'];
                                 
                                  }
                                  if($found==1){  break;}
                                    
                                }
                                if($found==1)
                                {
                                    if($current_item < 50){
                                        echo " <td style='background:#ffe8e8;color:red;border:1px solid black;'>".$current_item."</td>";
                                    }else{
                                        echo " <td style='border:1px solid gray;background:#e1e0cf;color:green;'>".$current_item."</td>";
                                    }
                                              
                                 }
                                   else
                                       {
                                            echo   "<td style='border:1px solid green; background:#99ab92;'> </td> ";  
                                       }
                      } 
                      
                      
                         // echo $avg;echo "<br>";
                         
                        //$avarge = $avg/$count;
                        if($points  > 0){
                            
                            if(round(($points/$hours ),2) < 2){
                                echo " <td style='background:#dfd9d9;color:red;style='border:1px solid gray;''> 
                                ". round(($points/$hours ),2)."
                                </td>";
                            }else{
                               
                                echo " <td style='border:1px solid gray;'> ". round(($points/$hours ),2)."</td>";
                            }
                            
                            
                           
                        }else{
                            echo " <td style='background:#dfd9d9;color:red;style='border:1px solid gray;''>
                            ". round(($points/$hours ),2)."
                            </td>"; 
                        }
                        if(round(($points/$hours ),2) >= 3.5){
                            echo "<td style='background:#a4dca4;border:2px solid lightgreen;
                            color:green;'>ممتاز</td>";
                        } 
                        else if(round(($points/$hours ),2) >= 300){
                            echo "<td style='background:#a4dca4;border:2px solid lightgreen;
                            color:green;'>جيد جدآ </td>";
                        } 
                        else if(round(($points/$hours ),2) >= 2.5){
                            echo "<td style='background:#a4dca4;border:2px solid lightgreen;
                            color:green; '> جيد</td>";
                        } 
                        else if(round(($points/$hours ),2) >= 2.00){
                            echo "<td style='border:2px solid gray;'> مقبول</td>";
                        }else{
                            echo " <td style='background:#4d4b4b;color:yellow;border:2px solid gray;'>ضعيف</td>"; 
                        }
                   
             
                
                                echo"</tr>";         
                      }
        

                  ?>
                    <tbody>

                </table>
            </div>

            <!--start model-->
            <?php
    }else{echo "pls_fill";}
}
        public function   give_student($dep_id,$mos_id,$sem_id,$co_id){
            include "connect.php";
 if(!empty($dep_id) and !empty($mos_id) and !empty($sem_id) and !empty($co_id) ){
            $select = "select *  from student where dep_id = ".$dep_id ." and mos_id = ".$mos_id." and sem_id=".$sem_id  ;
            $select_course = "select *  from course where co_id = ".$co_id ;
   
            $q = mysqli_query($conn, $select);
            $q2 = mysqli_query($conn, $select_course);
            if(mysqli_num_rows($q) > 0){
         
        $row_course = mysqli_fetch_assoc($q2);
            
           ?>
            <table class='table'>
                <tr class='alert-success'>
                    <td>#</td>
                    <td>الاسم</td>
                    <td>ر.جامعي</td>
                    <td colspan='2'>درجة مادة <?php echo $row_course['co_name']?></td>
                </tr>
                <?php
           $counter = 0;
            while($r = mysqli_fetch_assoc($q) ){
                $counter++;
             ?>
                <tr>
                    <td> <button type="button" class="btn btn-outline-success" style='border-radius:100%;'>
                            <span class="badge badge-light"><?php echo $counter?></span>
                        </button></td>
                    <td id='std_name_<?php  echo $r['std_id'];?>'><?php echo $r['std_name'];?></td>
                    <td id='std_un_no_<?php  echo $r['std_id'];?>'><?php echo $r['std_un_no'];?></td>
                    <input type='hidden' value='<?php  echo $r['coll_id'];?>'
                        id='coll_id_<?php  echo $r['std_id'];?>' />
                    <input type='hidden' value='<?php  echo $r['sem_id'];?>' id='sem_id_<?php  echo $r['std_id'];?>' />
                    <input type='hidden' value='<?php  echo $r['dep_id'];?>' id='dep_id_<?php  echo $r['std_id'];?>' />
                    <input type='hidden' value='<?php  echo $r['mos_id'];?>' id='mos_id_<?php  echo $r['std_id'];?>' />
                    <input type='hidden' value='<?php  echo $r['dof_id'];?>' id='dof_id_<?php  echo $r['std_id'];?>' />

                    <td width='20%'>
                        <?php    
$std_id = $r['std_id'];  
   $select_if_found =  mysqli_query($conn,"select * from result where std_id='$std_id' and co_id = '$co_id'");
?>
                        <input type='hidden' id='co_name_<?php  echo $row_course['co_id'];?>'
                            value="<?php echo $row_course['co_name'];?>" />
                        <input type='hidden' id='co_hour_<?php  echo $row_course['co_id'];?>'
                            value="<?php echo $row_course['co_hour'];?>" />
                        <input type='number' placeholder='<?php
                  $select_if_found =  mysqli_query($conn,"select * from result where std_id='$std_id' and co_id = '$co_id'");
                  if(mysqli_num_rows($select_if_found) > 0){
                      $r3 = mysqli_fetch_assoc($select_if_found);
                     echo $r3['result'];
                }?>' id='result_<?php  echo $r['std_id'];?>' class="form-control" />
                    </td>
                    <td>
                        <?php
            $std_id = $r['std_id'];
            $co_id = $row_course['co_id'];
                     $select_if_found =  mysqli_query($conn,"select * from result where std_id='$std_id' and co_id = '$co_id'");
                     if(mysqli_num_rows($select_if_found) > 0){
            ?>
                        <span class="btn btn-success"
                            onclick='add_result("add","add_result",<?php echo $r["std_id"];?>,<?php echo $row_course["co_id"];?>);'>
                            <i class="fa fa-plus"></i>
                        </span>
                        <?php }else{?>
                        <span class="btn btn-danger" id='change_color_<?php echo $r['std_id'];?>'
                            onclick='add_result("add","add_result",<?php echo $r["std_id"];?>,<?php echo $row_course["co_id"];?>);'>
                            <i class="fa fa-plus"></i>
                        </span>

                        <?php }?>
                    </td>


                </tr>

                <?php
            }
            ?>
            </table>
            <?php
  
             
        }else{
            echo "notfound";
        }     
    }else{
        echo "pls_fill";
    }       

        }
}
///list fill with limit select
class give_limit_from_table{
        public function give_limit($t_name_to_give_limit ,$limit_id,$id_feild_name,$name){
            include "connect.php";
 
            
            $select = "select *  from ".$t_name_to_give_limit." where  ".$id_feild_name." = ".$limit_id ;
            $q = mysqli_query($conn, $select);
            

           $r = mysqli_fetch_assoc($q);
           echo $r[$name];
        

        }
}
///list fill with limit select2
class give_limit_from_table2{
        public function give_limit2($t_name,$limit){
            include "connect.php";
 
   if($t_name == "semister"){
    $x = $limit + $limit - 1;
   
    $select = "select *  from ".$t_name." where sem_name = ".$x."  limit  2" ;
    $q = mysqli_query($conn, $select);
    $sim = array('الاول','الثاني');
    $y = 0;
    echo "<option></option>";
  while($rows = mysqli_fetch_assoc($q)){
      $sum = $rows['sem_id'] + 1;
      echo "<option value='".$rows['sem_id']."'>".$sim[$y]."</option>";
      echo "<option value='".$sum."'>".$sim['1']."</option>";
      $y++;
  }
   }else if($t_name == "mostwa"){
    $x = $limit;
    $select = "select *  from ".$t_name."  limit  ".$x ;
    $q = mysqli_query($conn, $select);
    $sim = array('الاول','الثاني','الثالث','الرابع','الخامس','السادس');
$y = 0;
echo "<option></option>";
    while($rows = mysqli_fetch_assoc($q)){
  echo "<option value='".$rows['mos_id']."'>".$sim[$y]."</option>";
  $y++;
} 
     }
   }
       
        
 
        }


 
?>