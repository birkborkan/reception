<?php
session_start();
if(!isset($_SESSION['user_name'])){
    @header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='bootstrap/js/bootstrap.bundle.min.js'></script>

    <title>Receivtion</title>
    <style>
    body {
        -webkit-print-color-adjust: exact;
    }

    #report_content {
        -webkit-print-color-adjust: exact;
    }

    @media-print {
        #header_img {
            display: block;
        }
    } 
    @media screen and (max-width: 1000px) {
       .right_left {
            display: none;
        }
    }

    body {
        background-color: #002f2f;
    }

    .dropdown-item {
        text-align: right;
    }

    .header {
        height: 130px;
        background-color: #004040;
    }

    .footer {
        height: 100px;
        background-color: #004040;
        color: white;

    }

    .navbar {


        position: relative;
        top: 0px;
        background: blue;
    }

    .bg-dark {
        background-color: #055656 !important;
    }

    .container {

        background-color: white;
    }

    .nav-item a {
        text-align: right;
    }

    .dropdown-menu .dropdown-item {
        text-align: right;
    }

    input[text] {
        width: 100%;
    }

    .loading_place {
        position: fixed;
        margin-right: auto;
        margin-left: auto;
        top: 100px;
        right: 400px;
        z-index: 10000000;
        color: green;
        background: #3fa3b4;
        width: 200px;
        padding: 10px;
        text-align: right;
    }


    .name_to_right{
        position:fixed;
        left:5px;
        text-align:left;
        color:white;
        font-size:14px;
    }
    </style>
</head>

<body dir='rtl'>


    <div id='header_img' style='display:none;'>
        <img src='images/logo2.png' alt='' width='100%' height='100'>
      
    </div>
    <img src="images/dr.png" class='img-responsive' style='float:left;' width='100' height='129' alt="" srcset="" />
  <div class='name_to_right'><br><br><br><br><br><br>المستخدم الحالي<br>  <?php echo  $_SESSION['full_name'];?></div>
    <div class='container'>
        <div id='print_content'></div>
        <div class='loading_place' style='display:none;'></div>
        <input type='hidden' id='user_name_' value='<?php echo $_SESSION['user_name'];?>' />
        <input type='hidden' id='user_password_' value='<?php echo $_SESSION['user_password'];?>' />
        <input type='hidden' id='full_name_' value='<?php echo $_SESSION['full_name'];?>' />
        <input type='hidden' id='user_slahia_' value='<?php echo $_SESSION['user_slahia'];?>' />
        <input type='hidden' id='user_status_' value='<?php echo $_SESSION['user_status'];?>' />
        <input type='hidden' id='user_id_' value='<?php echo $_SESSION['user_id'];?>' />

        <div class='header'>



            <img src="images/logo2.png" class='img-responsive' height='129' width='80%' alt="" srcset="" />

            <img src="images/logo.png" class='img-responsive right_left'  style='float:left;' width='100' height='129' alt=""
                srcset="" />

            <img src="images/logo_.png" class='img-responsive right_left' style='float:right;
                margin-right:10px;' width='100' height='129' alt="" srcset="" />


        </div>
        <!--end nav-->

        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" style='font-size:13px;'>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            المرضى
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="open_modal('add_patient')"> إضافة مريض </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_patient.php")'> عرض المرضى </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            الفواتير
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="show_fatora_after_print()">    فاتورة الفحوصات </a>
                            <a class="dropdown-item" onclick="show_fatora_mogabla_after_print()">    فاتورة المقابلات </a>
                            <a class="dropdown-item" onclick="show_fatora_opration_after_print()">    فاتورة العمليات </a>
                            <a class="dropdown-item" onclick="show_fatora_hjs_after_print()">    فاتورة الحجز </a>

                        </div>
                    </li>




                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            سير العمليات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick='give_pages("show_all_khorfa.php")'> عرض الحجوزات </a>

                            <a class="dropdown-item" onclick='give_pages("show_all_mogabla.php")'> عرض المقابلات </a>
                            <a class="dropdown-item" onclick='give_pages("show_opretion.php")'> عرض العمليات </a>
                            <a class="dropdown-item" onclick='give_pages("show_fhosat.php")'> الفحوصات </a>

                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            الاعدادات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="open_modal('add_docter')"> إضافة طبيب </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_docter.php")'> عرض الاطباء </a>

                            <hr>
                            <a class="dropdown-item" onclick="open_modal('add_fhs')"> إضافة فصح </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_fhs.php")'> عرض الفحوصات </a>

                            <hr>
                            <a class="dropdown-item" onclick="open_modal('add_opr')"> إضافة عملية </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_opr.php")'> عرض العمليات </a>
                            <hr>
                            <a class="dropdown-item" onclick="open_modal('add_mwzf')"> إضافة موظف </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_mwzf.php")'> عرض الموظفين </a>

                            <hr>

                        </div>
                    </li>
                    <li class="nav-item dropdown  active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            المصروفات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" onclick="open_modal('add_msrof')"> إضافة مصروف </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_msrof.php")'> عرض المصروفات </a>
                            <hr>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            المرتبات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


                            <a class="dropdown-item" onclick="open_modal('add_ratb')"> إضافة الراتب </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_ratb.php")'> عرض الرواتب </a>

                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            التقارير
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <!-- <a class="dropdown-item" data-toggle="modal" data-target="#add_fhs"> تقرير عن العمليات  </a> -->
                            <a class="dropdown-item" onclick='give_pages("show_report_op.php")'> تقرير عن العمليات </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_fahis.php")'> تقرير عن الفحوصات
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_mogabla.php")'> تقرير عن المقابلات
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_docter.php")'> تقرير عن الاطباء
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_khorfa.php")'> تقرير عن الغرف </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_msrof.php")'> تقرير عن المصروفات
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_docter.php")'> تقرير عن الاطباء
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_ratb.php")'> تقرير عن المرتبات
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_users.php")'> تقرير عن المستخدمين
                            </a>
                            <a class="dropdown-item" onclick='give_pages("show_report_all.php")'> تقرير الكلي </a>

                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            المستخدمين
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="open_modal('add_user')"> إضافة مستخدم </a>
                            <a class="dropdown-item" onclick='give_pages("show_all_user.php")'> عرض المستخدمين </a>

                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="logout()">تسجيل الخروج <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="open_modal('change_password')">تغيير المرور <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="give_pages('lab.php')"> المعمل   <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <?php if($_SESSION['user_slahia'] == 1){?>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="backup()">backup <span class="sr-only">(current)</span></a>
                    </li>
                    <?php }?>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="open_recicle_bin()">
                            <img src="images/deleted.ico" width='30' height='30' alt="" srcset="">
                            <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--end nav-->
        <div id="give_conent">
            <img src="images/reception2.jpg" class='img-responsive' width='100%' alt="" srcset="">
        </div>
        <div class='footer'>
            Powerd by WHD &copy;
        </div>

        <!--end container-->
        <!--start models -->
        <!-- start add patient model -->
        <div class="modal fade" id="add_patient" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة مريض</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم المريض</label>
                                <input type='text' style='width:100%;' id='add_pa_name' class='form-control' />

                                <label>السكن </label>
                                <input type='text' id='add_pa_life' class='form-control' />
                                <label>النوع </label>
                                <select id='add_pa_gender' class='form-control'>
                                    <option></option>
                                    <option>ذكر</option>
                                    <option>انثى</option>
                                </select>
                                <label>العمر </label>
                                <input type='text' id='add_pa_age' class='form-control' />
                                <label>التلفون </label>
                                <input type='text' id='add_pa_phone' class='form-control' />

                                <span class='btn btn-success' onclick='add_patient()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_docter model-->

        <!-- start add docter model -->
        <div class="modal fade" id="add_docter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة طبيب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم الطبيب</label>
                                <input type='text' style='width:100%;' id='add_doc_name' class='form-control' />


                                <label>التخصص </label>
                                <input type='text' id='add_doc_type' class='form-control' />

                                <label>التلفون </label>
                                <input type='text' id='add_doc_phone' class='form-control' />
                                <label>سعر المقابلة </label>
                                <input type='number' id='add_doc_price' class='form-control' />

                                <span class='btn btn-success' onclick='add_docter()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_docter add_docter-->
        <!-- start add docter model -->
        <div class="modal fade" id="add_fhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة فحص</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم الفحص</label>
                                <input type='text' style='width:100%;' id='add_fhs_name' class='form-control' />


                                <label>السعر </label>
                                <input type='text' id='add_fhs_price' class='form-control' />


                                <span class='btn btn-success' onclick='add_fhs()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_msrof add_user-->
        <!-- start add add_msrof model -->
        <div class="modal fade" id="add_msrof" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة مصروفات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> البيان</label>
                                <textarea style='width:100%;' id='add_msrof_byan' class='form-control'></textarea>


                                <label>المبلغ </label>
                                <input type='number' id='add_msrof_price' class='form-control' />


                                <span class='btn btn-success' onclick='add_msrof()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_msrof add_msrof-->
        <!-- start add_mwzf add_mwzf model -->
        <div class="modal fade" id="add_mwzf" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة الموظفين</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> الاسم</label>

                                <input type='text' id='add_mwzf_name' class='form-control' />
                                <label>الوظيفة </label>
                                <input type='text' id='add_mwzf_job' class='form-control' />
                                <label>الراتب </label>
                                <input type='number' min='0' id='add_mwzf_price' class='form-control' />
                                <label>تاريخ التأيين </label>
                                <input type='date' id='add_mwzf_date' class='form-control' />
                                <span class='btn btn-success' onclick='add_mwzf()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_msrof add_msrof-->
        <!-- start add_ratb add_ratb model -->
        <div class="modal fade" id="add_ratb" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة الرواتب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم الموظف</label>
                                <select type='text' id='add_ratb_name' class='form-control'>
                                    <option></option>
                                    <?php
                                include "connect.php";
                               $select = mysqli_query($conn,"select * from mwzf order by mwzf_id desc");
                               while($row = mysqli_fetch_assoc($select)){
                                   echo "<option value='".$row['mwzf_id']."'>".$row['mwzf_name']."</option>";
                               }

                                ?>
                                </select>

                                <label>الشهر </label>
                                <select type='text' id='add_ratb_month' class='form-control'>
                                    <option></option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                    <option value='11'>11</option>
                                    <option value='12'>12</option>
                                </select>
                                <label> الخصم </label>
                                <input type='number' id='add_ratb_khsm' class='form-control' />
                                <label> علاوه </label>
                                <input type='number' id='add_ratb_alawa' class='form-control' />

                                <span class='btn btn-success' onclick='add_ratb()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_ratb add_ratb-->
        <!-- start add add_user model -->
        <!-- start add docter model -->
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة مستخدم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم بالكامل</label>
                                <input type='text' style='width:100%;' id='add_full_name' class='form-control' />


                                <label>اسم المستخدم </label>
                                <input type='text' id='add_user_name' class='form-control' />

                                <label> كلمة السر </label>
                                <input type='text' id='add_user_password' class='form-control' />
                                <label> الصلاحية </label>
                                <select id='add_user_slahia' class='form-control'>

                                    <option value='1'>المدير</option>
                                    <option value='2'>الاستقبال</option>
                                    <option value='3'>محاسب</option>
                                </select>
                                <label> الحالة </label>
                                <select id='add_user_status' class='form-control'>
                                    <option value='1'>نشط</option>
                                    <option value='2'>موقف</option>

                                </select>


                                <span class='btn btn-success' onclick='add_user()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add edit_user edit_user-->
        <!-- start add edit_user model -->
        <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل مستخدم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم بالكامل</label>
                                <input type='text' style='width:100%;' id='edit_full_name' class='form-control' />


                                <label>اسم المستخدم </label>
                                <input type='text' id='edit_user_name' class='form-control' />
                                <input type='hidden' id='edit_user_id' class='form-control' />


                                <label> الصلاحية </label>
                                <select id='edit_user_slahia' class='form-control'>


                                </select>
                                <label> الحالة </label>
                                <select id='edit_user_status' class='form-control'>


                                </select>


                                <span class='btn btn-success' onclick='edit_user_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_user add_user-->
        <!-- start add edit_user edit_user -->
        <div class="modal fade" id="add_khorfa" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة غرفة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> رقم الغرفة</label>
                                <input type='number' style='width:100%;' id='khorfa_num' class='form-control' />


                                <label>السعر </label>
                                <input type='number' id='khorfa_price' class='form-control' />


                                <span class='btn btn-success' onclick='add_khorfa()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_khorfa add_khorfa-->
        <div class="modal fade" id="add_opr" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> إضافة عملية</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم العملية</label>
                                <input type='text' style='width:100%;' id='add_opr_name' class='form-control' />


                                <label>السعر </label>
                                <input type='number' id='add_opr_price' class='form-control' />


                                <span class='btn btn-success' onclick='add_opr()'>إضافة </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end add add_fhs add_fhs-->
        <!-- start edit docter model -->
        <div class="modal fade" id="edit_docter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل طبيب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم الطبيب</label>
                                <input type='text' style='width:100%;' id='edit_doc_name' class='form-control' />
                                <input type='hidden' id='edit_doc_id' />

                                <label>التخصص </label>
                                <input type='text' id='edit_doc_type' class='form-control' />
                                <label>سعر المقابلة </label>
                                <input type='number' id='edit_doc_price' class='form-control' />

                                <label>التلفون </label>
                                <input type='text' id='edit_doc_phone' class='form-control' />

                                <span class='btn btn-success' onclick='edit_docter_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_docter edite_docter-->
        <!-- start edit fhs model -->
        <div class="modal fade" id="edit_fhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل الفحص</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم الفحص</label>
                                <input type='text' style='width:100%;' id='edit_fhs_name' class='form-control' />
                                <input type='hidden' id='edit_fhs_id' />

                                <label>السعر </label>
                                <input type='number' id='edit_fhs_price' class='form-control' />


                                <span class='btn btn-success' onclick='edit_fhs_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit fhs model -->
        <div class="modal fade" id="opration_detauls" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل العمليات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='opration_detauls_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit fhs model -->
        <div class="modal fade" id="msrof_detauls" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل المصروفات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='msrof_detauls_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit fhs model -->
        <div class="modal fade" id="ratb_detauls" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل المصروفات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='ratb_detauls_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->

        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit fhs model -->
        <div class="modal fade" id="mogabla_detauls" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل المقابلات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='mogabla_detauls_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->
        <!-- start edit fhs model -->
        <div class="modal fade" id="khorfa_detauls" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل الحجوزات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='khorfa_detauls_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <!--end edit_docter edite_docter-->

        <!-- start edit fhs model -->
        <div class="modal fade" id="fhs_detauls" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تفاصيل الفحوصات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='fhs_detauls_in'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <div class="modal fade" id="edit_msrof" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل المصروفات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> البيان </label>
                                <input type='text' style='width:100%;' id='edit_msrof_byan' class='form-control' />
                                <input type='hidden' id='edit_msrof_id' />

                                <label>المبلغ </label>
                                <input type='number' id='edit_msrof_price' class='form-control' />


                                <span class='btn btn-success' onclick='edit_msrof_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <div class="modal fade" id="edit_ratb" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل الراتب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> العلاوه </label>
                                <input type='number' style='width:100%;' id='edit_ratb_alawa' class='form-control' />
                                <input type='hidden' id='edit_ratb_id' />

                                <label>الخصم </label>
                                <input type='number' id='edit_ratb_khsm' class='form-control' />


                                <span class='btn btn-success' onclick='edit_ratb_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit edit_msrof model -->
        <div class="modal fade" id="edit_mwzf" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل الموظف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> الاسم </label>
                                <input type='text' style='width:100%;' id='edit_mwzf_name' class='form-control' />
                                <input type='hidden' id='edit_mwzf_id' />

                                <label>الوظفيفة </label>
                                <input type='text' id='edit_mwzf_job' class='form-control' />
                                <label>الراتب </label>
                                <input type='number' id='edit_mwzf_price' class='form-control' />


                                <span class='btn btn-success' onclick='edit_mwzf_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_msrof edit_msrof-->
        <!-- start edit khorfa model -->
        <!-- start edit khorfa model -->
        <div class="modal fade" id="edit_khorfa" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل الغرفة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> زمن البقاء </label>
                                <input type='number' style='width:100%;' id='edit_time_stay' class='form-control' />
                                <input type='hidden' id='edit_khorfa_id' />

                                <label>السعر </label>
                                <input type='number' id='edit_khorfa_price' class='form-control' />


                                <span class='btn btn-success' onclick='edit_khorfa_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end khorfa khorfa-->
        <!-- start edit khorfa model -->
        <div class="modal fade" id="dis_count_khorfa" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> التخفيص </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">

                                <input type='hidden' id='dis_count_khorfa_id' />

                                <label>السعر الاساسي </label>
                                <input type='number' disabled id='dis_count_khorfa_price' class='form-control' />
                                <label>نسبة التخفيض </label>
                                <input type='number' onkeyup='dis_count_onchange();' onkeydown='dis_count_onchange();'
                                    min='0' id='dis_count_khorfa_dis' class='form-control' placeholder='0.0%' />


                                <span class='btn btn-success' onclick='dis_count_khorfa_done()'>تخفيض </span>
                                <br>
                                <input type='text' disabled id='dis_count_after' />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end khorfa khorfa-->     <!-- start edit khorfa model -->
        <!-- start edit dis_count_fhs model -->
        <div class="modal fade" id="dis_count_fhs" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> التخفيص </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">

                                <input type='hidden' id='dis_count_fatora_num' />

                                <label>السعر الاساسي </label>
                                <input type='number' disabled id='dis_count_fhs_price' class='form-control' />
                                <label>نسبة التخفيض </label>
                                <input type='number' onkeyup='dis_count_onchange_fhs();' onkeydown='dis_count_onchange();'
                                    min='0' id='dis_count_fhs_dis' class='form-control' placeholder='0.0%' />


                                <span class='btn btn-success' onclick='dis_count_fhs_done()'>تخفيض </span>
                                <br>
                                <input type='text' disabled id='dis_count_after_fhs' />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end dis_count_fhs dis_count_fhs-->     <!-- start edit dis_count_fhs model -->
       
        <div class="modal fade" id="dis_count_opration" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> التخفيص </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">

                                <input type='hidden' id='dis_count_opra_id' />

                                <label>السعر الاساسي </label>
                                <input type='number' disabled id='dis_count_opr_price' class='form-control' />
                                <label>نسبة التخفيض </label>
                                <input type='number' onkeyup='dis_count_onchange_opration();' onkeydown='dis_count_onchange_opration();'
                                    min='0' id='dis_count_opr_dis' class='form-control' placeholder='0.0%' />


                                <span class='btn btn-success' onclick='dis_count_opration_done()'>تخفيض </span>
                                <br>
                                <input type='text' disabled id='dis_count_after_opr' />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end khorfa khorfa-->  

          <!-- start edit khorfa model -->
        <div class="modal fade" id="dis_count_mogabla" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تخفيض المقابلة </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">

                                <input type='hidden' id='dis_count_mog_id' />

                                <label>السعر الاساسي </label>
                                <input type='number' disabled id='dis_count_mog_price' class='form-control' />
                                <label>نسبة التخفيض </label>
                                <input type='number' onkeyup='dis_count_onchange_mogabla();' onkeydown='dis_count_onchange();'
                                    min='0' id='dis_count_mog_dis' class='form-control' placeholder='0.0%' />


                                <span class='btn btn-success' onclick='dis_count_mogabla_done()'>تخفيض </span>
                                <br>
                                <input type='text' disabled id='dis_count_after_mog' />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end khorfa khorfa-->
        <!-- start edit khorfa model -->
        <div class="modal fade" id="edit_opr" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل العملية</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم العملية</label>
                                <input type='text' style='width:100%;' id='edit_opr_name' class='form-control' />
                                <input type='hidden' id='edit_opr_id' />

                                <label>السعر </label>
                                <input type='number' id='edit_opr_price' class='form-control' />


                                <span class='btn btn-success' onclick='edit_opr_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_docter edite_opr-->
        <!-- start edit patient model -->
        <div class="modal fade" id="edit_patient" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تعديل بيانات المريض</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم المريض </label>
                                <input type='text' style='width:100%;' id='edit_pa_name' class='form-control' />
                                <input type='hidden' id='edit_pa_id' />

                                <label>الجنس </label>
                                <select id='edit_pa_gender' class='form-control'>

                                </select>
                                <label>السكن </label>
                                <input type='text' id='edit_pa_life' class='form-control' />
                                <label>تلفون </label>
                                <input type='text' id='edit_pa_phone' class='form-control' />
                                <label>العمر </label>
                                <input type='text' id='edit_pa_age' class='form-control' />


                                <span class='btn btn-success' onclick='edit_patient_done()'>تحديث </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_docter edite_patinet-->
        <!-- start edit patient model -->
        <div class="modal fade" id="show_fhosat_to_delete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> حذف تفاصيل الفحوصات </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='show_fhosat_to_delete_put_id'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_docter edite_patinet-->
        <!-- start edit patient model -->
        <div class="modal fade" id="mogabla" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle_mogable"
                            style='text-align:right;background:#004040;color:white;padding:5px;font-size:15px;'> </h5>
                        <button type="button" class="close" style='color:red;' data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                       
                    </div>
                    <input type='hidden' id='mogabla_pa_id' />
                    <div class="modal-body" id='mogabla_content'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end edit_docter edite_patinet-->
        <!-- start opr model -->
        <div class="modal fade" id="opr" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle_opr"
                            style='text-align:right;background:#004040;color:white;padding:5px;font-size:15px;'> </h5>
                        <button type="button" class="close" style='color:red;' data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span>ادخل تاريخ </span>
                        <input style='width:35%;' type='date' name='' id='opr_date' class='form-control' />
                    </div>
                    <input type='hidden' id='opr_pa_id' />
                    <div class="modal-body" id='opr_content'>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end hjz_khorfa hjz_khorfa-->
        <!-- start opr model -->
        <div class="modal fade" id="hjz_khorfa" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle_hjz_khorfa"
                            style='text-align:right;background:#004040;color:white;padding:5px;font-size:15px;'> حجز
                            غرفة</h5>
                        <button type="button" class="close" style='color:red;' data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span>ادخل تاريخ </span>
                        <input style='width:35%;' type='date' name='' id='opr_date' class='form-control' />

                    </div>
                    <div class="modal-body" id=' '>
                        <form style='text-align:right;'>
                            <input type='hidden' id='pa_id_hjz' />
                            <span>اسم المريض</span>
                            <input type='text' id='pa_name_hjz' disabled class='form-control' />
                            <span> النوع</span>
                            <input type='text' id='pa_gender_hjz' disabled class='form-control' />
                            <span> السكن </span>
                            <input type='text' id='pa_life_hjz' disabled class='form-control' />
                            <span> العمر</span>
                            <input type='text' id='pa_age_hjz' disabled class='form-control' />

                            <span> زمن البقاء بألايام</span>
                            <input type='text' id='time_stay' class='form-control' />
                            <span> المبلغ </span>
                            <input style='width:35%;' type='number' id='khorfa_price_hjz' class='form-control' />

                            <span> تاريخ الحجز </span>
                            <input style='width:35%;' type='date' id='start_date' class='form-control' />

                        </form>
                    </div>
                    <div class="modal-footer">
                        <span class='btn btn-success' onclick='add_hjz()'>إضافة </span>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end hjz_khorfa hjz_khorfa-->
        <!-- start  change password model -->
        <div class="modal fade" id="change_password" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle_hjz_khorfa"
                            style='text-align:right;background:#004040;color:white;padding:5px;font-size:15px;'> تغيير
                            كلمة المرور </h5>
                        <button type="button" class="close" style='color:red;' data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body" id=' '>
                        <form style='text-align:right;'>


                            <input type='hidden' id='old_password' value='<?php echo $_SESSION['user_password'];?>'
                                class='form-control' />

                            <span>كلمة السر القديمة </span>
                            <input type='password' id='old_password_enter' class='form-control' />
                            <span>كلمة السر الجديدة </span>
                            <input type='password' id='new_password' class='form-control' />
                            <span> اعادة كلمة السر الجديدة </span>
                            <input type='password' id='new_password_enter' class='form-control' />


                        </form>
                    </div>
                    <div class="modal-footer">
                        <span class='btn btn-success' onclick='change_password()'>تغيير </span>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end change_password change_password-->
        <!-- start  recicle_bin recicle_bin model -->
        <div class="modal fade" id="recicle_bin" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">


                    </div>
                    <div class="modal-body" id='recicle_bin_content'>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!--end change_password change_password-->
        <!-- start  show_fatora_after_print show_fatora_after_print model -->
        <div class="modal fade" id="show_fatora_after_print" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-scrollable" role="document">

                <div class="modal-content">
                    <div class="modal-header-fhs">


                    </div>
                    <div class="modal-body" id='show_fatora_after_print_item'>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!--end show_fatora_after_print show_fatora_after_print-->  
         <!-- start  show_fatora_mogabla_after_print show_fatora_mogabla_after_print model -->
        <div class="modal fade" id="show_fatora_mogabla_after_print" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-scrollable" role="document">

                <div class="modal-content">
                    <div class="modal-header-mogabla">

                   
                    </div>
                    <div class="modal-body" id='show_fatora_mogabla_after_print_item'>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>   
         <!-- start  show_fatora_mogabla_after_print show_fatora_mogabla_after_print model -->
        <div class="modal fade" id="show_fatora_opration_after_print" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" >

            <div class="modal-dialog modal-dialog-scrollable" role="document" >

                <div class="modal-content" >
                    <div class="modal-header-opration">

                   
                    </div>
                    <div class="modal-body" id='show_fatora_opration_after_print_item'>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>     <!-- start  show_fatora_mogabla_after_print show_fatora_mogabla_after_print model -->
        <div class="modal fade" id="show_fatora_hjs_after_print" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header-hjs">

                   
                    </div>
                    <div class="modal-body" id='show_fatora_hjs_after_print_item'>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!--end show_fatora_after_print show_fatora_after_print-->
        <!--end models-->
        <div id='all_report'>
            <div style='width:50%;margin-right:auto;margin-left:auto;'>
                <div id='header'></div>
                <br>
                <div id='report_content'></div>
                <div style='text-align:left;display:none;' id='report_footer'>
                    تم الاستخراج بواسطة :<?php echo $_SESSION['full_name'];?><br>
                    تاريخ الاستخراج :<?php echo @date("Y-m-d");?><br>
                </div>
            </div>
        </div>
</body>

</html>
<script type='text/javascript'>
/////////////
function give_pages(ul) {
    $(document).ready(function() {
        var slah = $("#user_slahia_").val();

        if (slah == 2) {
            if (ul != 'show_report_fahis.php' && ul != 'show_fhosat.php' && ul != 'show_opretion.php' && ul !=
                'show_all_mogabla.php' && ul != 'show_all_khorfa.php' && ul !=
                'show_report_khorfa.php' && ul != 'show_report_op.php' && ul != 'show_report_all.php' && ul !=
                'show_report_mogabla.php' && ul != 'show_report_users.php' && ul != 'show_all_patient.php' &&
                ul != 'show_report_docter.php') {
                alert("ليس لديك صلاحية الدخول");
            } else {
                $.ajax({
                    url: ul,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        $('#give_conent').html(data);


                    }
                });
            }

        } else if (slah == 3) {
            if (ul != 'add_msrof.php' && ul != 'show_report_fahis.php' && ul != 'show_all_msrof.php' && ul !=
                'show_report_msrof.php' && ul != 'show_report_khorfa.php' && ul != 'show_report_op.php' && ul !=
                'show_report_all.php' && ul != 'show_report_users.php' && ul != 'show_report_ratb.php' && ul !=
                'show_report_docter.php' && ul != 'show_report_mogabla.php' && ul != 'show_all_ratb.php') {
                alert("ليس لديك صلاحية الدخول");
            } else {
                $.ajax({
                    url: ul,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        $('#give_conent').html(data);


                    }
                });
            }
        } else {
            if (slah == 1) {

                $.ajax({
                    url: ul,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        $('#give_conent').html(data);


                    }
                });

            }
        }

    });

}

//////////////////////////
function open_modal(url) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        if (slah == 2 && url != 'add_patient' && url != 'change_password' && url != 'show_fatora_after_print'&& url != 'show_fatora_mogabla_after_print'&& url != 'show_fatora_opration_after_print'&& url != 'show_fatora_hjs_after_print') {
            alert("ليس لديك صلاحية الدخول");
        } else {
            $("#" + url).modal("toggle");

        }
    }
    if (slah == 1) {

        $("#" + url).modal("toggle");

    }
    if (slah == 3) {
        if (url == 'add_msrof' || url == 'change_password' || url == 'add_ratb') {
            $("#" + url).modal("toggle");
        } else {

            alert("ليس لديك صلاحية الدخول");
        }
    }


}

function show_doc_mogabla_done(doc_name, doc_type, doc_id, pa_id) {
    if (confirm("هل تريد      مقابلة طبيب " + doc_type + " " + doc_name + " ?")) {

        $(document).ready(function() {
            var mydata = {
                'doc_id': doc_id,
                'pa_id': pa_id,
                'mog_date': $("#mog_date").val()
            }


            $.ajax({
                url: "show_doc_mogabla_done.php",
                method: "POST",
                data: mydata,
                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    $('.loading_place').html('');
                    $('.loading_place').hide();
                    if (data == " found") {
                        alert("هذا المريض قابل هذا الطبيب اليوم");
                    }  else {

                        $('#report_content').html(data);
                        printery("all_report");
                        $('#report_content').html('');

                        $("#opr").hide();
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"

                        });
                    }


                }
            });
        });
    }
}
//////////////////////////
function show_opr_done(opr_name, opr_price, opr_id, pa_id) {
    if (confirm("هل تريد   اجراء عملية " + opr_name + "  ?")) {

        $(document).ready(function() {
            var mydata = {
                'opr_id': opr_id,
                'pa_id': pa_id,
                'opr_date': $("#opr_date").val()
            }


            $.ajax({
                url: "show_opr_done.php",
                method: "POST",
                data: mydata,
                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    $('.loading_place').html('');
                    $('.loading_place').hide();
                    if (data == 'plz_fill_alll') {
                        alert("رجاء ملئ جميع الحقول");
                    } else {

                        $('#report_content').html(data);
                        printery("all_report");
                        $('#report_content').html('');

                        $("#opr").hide();
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"
                        });


                    }
                }
            });
        });
    }
}
/////////////
function fhs_delete(ul) {
    if (confirm("هل تريد هذا الفحص")) {
        $(document).ready(function() {
            var mydata = {
                'delete_id': ul
            }

            $.ajax({
                url: 'delete.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        give_pages("show_all_fhs.php");
                    }

                }
            });
        });
    }
}
/////////////
function delete_fhs_after_all(ul) {

    $(document).ready(function() {
        var mydata = {
            'delete_id': ul
        }

        $.ajax({
            url: 'delete_fhs_after_all.php',
            data: mydata,
            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                if (data == "done") {
                    $('.loading_place').html('');
                    $('.loading_place').hide();

                    give_pages("show_all_patient.php");
                }

            }
        });
    });

}

/////////////
function show_fatora_after_print() {

    $(document).ready(function() {

        $.ajax({
            url: 'show_fatora_after_print.php',

            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').hide();
                $('#show_fatora_after_print_item').html(data);
                open_modal('show_fatora_after_print');
                $(".modal-header-fhs").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>');
                $(".modal-header-fhs").append("فواتير الفحوصات");



            }
        });
    });

}
/////////////
function show_fatora_mogabla_after_print() {

    $(document).ready(function() {

        $.ajax({
            url: 'show_fatora_mogabla_after_print.php',

            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').hide();
                $('#show_fatora_mogabla_after_print_item').html(data);
                open_modal('show_fatora_mogabla_after_print');
 $(".modal-header-mogabla").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>');
 $(".modal-header-mogabla").append("فواتير المقابلات");

            }
        });
    });

}
/////////////
function show_fatora_opration_after_print() {

    $(document).ready(function() {

        $.ajax({
            url: 'show_fatora_opration_after_print.php',

            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').hide();
                $('#show_fatora_opration_after_print_item').html(data);
                open_modal('show_fatora_opration_after_print');
 $(".modal-header-opration").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>');
 $(".modal-header-opration").append("فواتير العمليات");

            }
        });
    });

}
/////////////
function show_fatora_hjs_after_print() {

    $(document).ready(function() {

        $.ajax({
            url: 'show_fatora_hjs_after_print.php',

            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').hide();
                $('#show_fatora_hjs_after_print_item').html(data);
                open_modal('show_fatora_hjs_after_print');
 $(".modal-header-hjs").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>');
 $(".modal-header-hjs").append("فواتير الحجز");

            }
        });
    });

}
/////////////
function msrof_delete(ul) {
    if (confirm("هل تريد حذف المصروف")) {
        $(document).ready(function() {
            var mydata = {
                'delete_id': ul
            }

            $.ajax({
                url: 'delete_msrof.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        give_pages("show_all_msrof.php");
                    }

                }
            });
        });
    }
}
/////////////
function open_recicle_bin() {


    $(document).ready(function() {


        $.ajax({
            url: 'show_all_recicle.php',

            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('');
                $('.loading_place').hide();
                $("#recicle_bin_content").html(data);
                $("#recicle_bin").modal('toggle');




            }
        });
    });

}
/////////////
function delete_fhosat_detaul(ul) {
    var slah = $("#user_slahia_").val();
    if (slah == 3) {
        alert("ليس لديك الصلاحية");
    } else if (slah == 2) {
        alert("ليس لديك الصلاحية");
    } else {
        if (confirm("هل تريد حذف الفحص  ")) {
            $(document).ready(function() {
                var mydata = {
                    'delete_id': ul
                }

                $.ajax({
                    url: 'delete_fhosat_detaul.php',
                    data: mydata,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        if (data == "done") {
                            $('.loading_place').html('');
                            $('.loading_place').hide();

                            $('#show_fhosat_to_delete').modal('hide');
                            give_pages("show_fhosat.php");
                        }

                    }
                });
            });
        }
    }
}
/////////////
function delete_ratb(ul) {
    var slah = $("#user_slahia_").val();
    if (slah == 3 || slah == 1) {
        if (confirm("هل تريد حذف الراتب")) {
            $(document).ready(function() {
                var mydata = {
                    'delete_id': ul
                }

                $.ajax({
                    url: 'delete_ratb.php',
                    data: mydata,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        if (data == "done") {
                            $('.loading_place').html('');
                            $('.loading_place').hide();

                            give_pages("show_all_ratb.php");
                        }

                    }
                });
            });
        }
    } else {
        alert("ليس لديك صلاحية ");

    }
}
/////////////
function mwzf_delete(ul) {
    if (confirm("هل تريد حذف الموظف")) {
        $(document).ready(function() {
            var mydata = {
                'delete_id': ul
            }

            $.ajax({
                url: 'delete_mwzf.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        give_pages("show_all_mwzf.php");
                    }

                }
            });
        });
    }
}
/////////////
function mogabla_delete(ul) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else {
        if (confirm("هل تريد حذف المصروف")) {
            $(document).ready(function() {
                var mydata = {
                    'delete_id': ul
                }

                $.ajax({
                    url: 'delete_mogabla.php',
                    data: mydata,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        if (data == "done") {
                            $('.loading_place').html('');
                            $('.loading_place').hide();

                            give_pages("show_all_mogabla.php");
                        }

                    }
                });
            });
        }
    }
}
/////////////
function delete_fhosat(ul, price) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else {
        if (confirm("هل تريد حذف الفحص")) {
            $(document).ready(function() {
                var mydata = {
                    'delete_id': ul,
                    'fhs_price': price
                }

                $.ajax({
                    url: 'delete_fhosat.php',
                    data: mydata,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        if (data == "done") {
                            $('.loading_place').html('');
                            $('.loading_place').hide();

                            give_pages("show_fhosat.php");
                        }

                    }
                });
            });
        }
    }
}
/////////////
function opration_delete(ul) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else {
        if (confirm("هل تريد حذف المصروف")) {
            $(document).ready(function() {
                var mydata = {
                    'delete_id': ul
                }

                $.ajax({
                    url: 'delete_opration.php',
                    data: mydata,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        if (data == "done") {
                            $('.loading_place').html('');
                            $('.loading_place').hide();

                            give_pages("show_opretion.php");
                        }

                    }
                });
            });
        }
    }
}

/////////////
function change_password() {
    if (confirm("هل تريد تغيير كلمة السر  ")) {


        $(document).ready(function() {
            var old_password = $("#old_password").val();
            var old_password_enter = $("#old_password_enter").val();
            var new_password = $("#new_password").val();
            var new_password_enter = $("#new_password_enter").val();

            if (old_password == old_password_enter) {
                if (new_password == new_password_enter) {
                    var mydata = {
                        'new_password': new_password,
                        'new_password_enter': new_password_enter,
                        'old_password_enter': old_password_enter,
                        'old_password': old_password
                    }

                    $.ajax({
                        url: 'change_password.php',
                        data: mydata,
                        method: "POST",

                        dataType: "html",
                        beforeSend: function() {
                            $('.loading_place').show();
                            $('.loading_place').html('جاري المعالجة...');
                        },
                        success: function(data) {
                            if (data == "done") {
                                $('.loading_place').html('');
                                $('.loading_place').hide();

                                logout2();
                            }
                            if (data == "pls_fill_all") {
                                alert("رجاء ملئ جميع الحقول");
                            }
                        }
                    });
                } else {
                    alert("كلمة السر الجديدة غير متطابق");
                }
            } else {
                alert("كلمة السر قديمة غير صحيح");
            }

        });
    }
}
/////////////
function khorfa_delete(ul) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else {
        if (confirm("هل تريد هذا الغرفة")) {
            $(document).ready(function() {
                var mydata = {
                    'delete_id': ul
                }

                $.ajax({
                    url: 'khorfa_delete.php',
                    data: mydata,
                    method: "POST",

                    dataType: "html",
                    beforeSend: function() {
                        $('.loading_place').show();
                        $('.loading_place').html('جاري المعالجة...');
                    },
                    success: function(data) {
                        if (data == "done") {
                            $('.loading_place').html('');
                            $('.loading_place').hide();

                            give_pages("show_all_khorfa.php");
                        }

                    }
                });
            });
        }
    }
}
/////////////
function add_hjz(ul) {

    if (confirm("هل تريد اضافة الحجز")) {
        $(document).ready(function() {
            var mydata = {
                'pa_id': $("#pa_id_hjz").val(),
                'pa_name': $("#pa_name_hjz").val(),
                'pa_gender': $("#pa_gender_hjz").val(),
                'pa_age': $("#pa_age_hjz").val(),
                'pa_life': $("#pa_life_hjz").val(),
                'time_stay': $("#time_stay").val(),
                'khorfa_price_hjz': $("#khorfa_price_hjz").val(),
                'start_date': $("#start_date").val()
            }

            $.ajax({
                url: 'add_hjz_done.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    $('.loading_place').html('');
                    $('.loading_place').hide();

                    if (data == "pls_fill_all") {
                        alert("رجاء ملئ جميع الحقول");
                    } else if (data == "found") {
                        alert("  لا يمكن حجز مرتين في اليوم لشخص واحد ");
                    } else {
                        $('.loading_place').html('');
                        $('.loading_place').hide();
                        $("#time_stay").val('');
                        $("#khorfa_price_hjz").val('');
                        $("#start_date").val('');
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"
                        });
                        $('#report_content').html(data);
                        printery("all_report");
                        $('#report_content').html('');

                        give_pages("show_all_patient.php");
                    }

                }
            });
        });
    }
}
/////////////
function delete_user(ul) {
    if (confirm("هل تريد هذا المستخدم")) {
        $(document).ready(function() {
            var mydata = {
                'delete_id': ul
            }

            $.ajax({
                url: 'delete_user.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        give_pages("show_all_user.php");
                    }

                }
            });
        });
    }
}
/////////////
function backup() {
    if (confirm("هل تريد هذا حفظ نسخة احتياطية")) {
        $(document).ready(function() {


            $.ajax({
                url: 'export.php',

                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    if (data == "Successfully backed up") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        alert("تم حفظ النسخة الاحتياطية بنجاح");
                    }

                }
            });
        });
    }
}
/////////////
function logout() {
    if (confirm("هل تريد    تسجيل الخروج  ")) {
        $(document).ready(function() {

            $.ajax({
                url: 'logout.php',

                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    window.location.assign("login.php");
                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();


                    }

                }
            });
        });
    }
}
/////////////
function logout2() {

    $(document).ready(function() {

        $.ajax({
            url: 'logout.php',

            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                window.location.assign("login.php");
                if (data == "done") {
                    $('.loading_place').html('');
                    $('.loading_place').hide();


                }

            }
        });
    });

}

/////////////
function opr_delete(ul) {
    if (confirm("هل تريد هذا العملية")) {
        $(document).ready(function() {
            var mydata = {
                'delete_id': ul
            }

            $.ajax({
                url: 'delete_opr.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        give_pages("show_all_opr.php");
                    }

                }
            });
        });
    }
}
/////////////
function delete_fhs_item(fhs_id, pa_id) {

    if (confirm("هل تريد    حذف هذا الفحص")) {
        $(document).ready(function() {
            var mydata = {
                'delete_id': fhs_id
            }

            $.ajax({
                url: 'delete_fhs_item.php',
                data: mydata,
                method: "POST",

                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {

                    if (data == "done") {
                        $('.loading_place').html('');
                        $('.loading_place').hide();

                        give_fhs_left_list(pa_id);
                    }

                }
            });
        });
    }
}
/////////////
function give_fhs_left_list(pa_id) {

    $(document).ready(function() {
        var mydata = {
            'pa_id': pa_id
        }

        $.ajax({
            url: 'give_fhs_left_list.php',
            data: mydata,
            method: "POST",

            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('');
                $('.loading_place').hide();
                $('#fhs_content').html(data);



            }
        });
    });

}
/////////////////////////////////////

function add_patient() {

    $(document).ready(function() {

        var mydata = {
            'pa_name': $('#add_pa_name').val(),
            'pa_phone': $('#add_pa_phone').val(),
            'pa_age': $('#add_pa_age').val(),
            'pa_gender': $('#add_pa_gender').val(),
            'pa_life': $('#add_pa_life').val()

        };
        $.ajax({
            url: 'add_patient.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {
                    $('#add_pa_name').val('');
                    $('#add_pa_phone').val('');
                    $('#add_pa_age').val('');
                    $('#add_pa_gender').val('');
                    $('#add_pa_life').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_patient').modal('hide');
                    give_pages("show_all_patient.php");

                }
            }
        });
    });
}
/////////////////////////
//////////////////////////

function add_docter() {

    $(document).ready(function() {

        var mydata = {
            'doc_name': $('#add_doc_name').val(),
            'doc_phone': $('#add_doc_phone').val(),
            'doc_type': $('#add_doc_type').val(),
            'doc_price': $('#add_doc_price').val()

        };
        $.ajax({
            url: 'add_docter.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {
                    $('#add_doc_name').val('');
                    $('#add_doc_phone').val('');
                    $('#add_doc_type').val('');
                    $('#add_doc_price').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_docter').modal('hide');
                    give_pages("show_all_docter.php");

                }
            }
        });
    });
}
//////////////////////////

function add_ratb() {

    $(document).ready(function() {

        var mydata = {
            'ratb_name': $('#add_ratb_name').val(),
            'ratb_month': $('#add_ratb_month').val(),
            'ratb_khsm': $('#add_ratb_khsm').val(),
            'ratb_alawa': $('#add_ratb_alawa').val(),


        };
        $.ajax({
            url: 'add_ratb.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                if (data == 'done') {
                    $('#add_ratb_alawa').val('');
                    $('#add_ratb_khsm').val('');
                    $('#add_ratb_name').val('');
                    $('#add_ratb_month').val('');

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_ratb').modal('hide');
                    give_pages("show_all_ratb.php");

                }
            }
        });
    });
}
//////////////////////////

function add_fhs() {

    $(document).ready(function() {

        var mydata = {
            'fhs_name': $('#add_fhs_name').val(),
            'fhs_price': $('#add_fhs_price').val()


        };
        $.ajax({
            url: 'add_fhs.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {
                    $('#add_fhs_name').val('');
                    $('#add_fhs_price').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_fhs').modal('hide');
                    give_pages("show_all_fhs.php");

                }
            }
        });
    });
}
//////////////////////////

function add_msrof() {

    $(document).ready(function() {

        var mydata = {
            'msrof_byan': $('#add_msrof_byan').val(),
            'msrof_price': $('#add_msrof_price').val()


        };
        $.ajax({
            url: 'add_msrof.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
               
                if (data == 'done') {
                 
                    $('#add_msrof_byan').val('');
                    $('#add_msrof_price').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_msrof').modal('hide');
                    give_pages("show_all_msrof.php");

                }
                if (data == 'pls_fill_all') {
                    alert("رجاء ملئ جميع الحقول");
                }
            }
        });
    });
}
//////////////////////////
function add_mwzf() {

    $(document).ready(function() {

        var mydata = {
            'mwzf_name': $('#add_mwzf_name').val(),
            'mwzf_job': $('#add_mwzf_job').val(),
            'mwzf_date': $('#add_mwzf_date').val(),
            'mwzf_price': $('#add_mwzf_price').val()
        };
        $.ajax({
            url: 'add_mwzf.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                alert(data);
                if (data == 'done') {
                    $('#add_mwzf_price').val('');
                    $('#add_mwzf_date').val('');
                    $('#add_mwzf_job').val('');
                    $('#add_mwzf_name').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_mwzf').modal('hide');
                    give_pages("show_all_mwzf.php");

                }
                if (data == 'pls_fill_all') {
                    alert("رجاء ملئ جميع الحقول");
                }
            }
        });
    });
}
//////////////////////////

function add_user() {

    $(document).ready(function() {

        var mydata = {
            'full_name': $('#add_full_name').val(),
            'user_name': $('#add_user_name').val(),
            'user_password': $('#add_user_password').val(),
            'user_slahia': $('#add_user_slahia').val(),
            'user_status': $('#add_user_status').val()


        };
        $.ajax({
            url: 'add_user.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                if (data == 'done') {
                    $('#add_full_name').val('');
                    $('#add_user_name').val('');
                    $('#add_user_password').val('');
                    $('#add_user_slahia').val('');
                    $('#add_user_status').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_user').modal('hide');
                    give_pages("show_all_user.php");

                }
                if (data == "found") {
                    alert("تم اضافة المستخدم مسبقآ");
                }
            }
        });
    });
}
//////////////////////////

function add_khorfa() {

    $(document).ready(function() {

        var mydata = {
            'khorfa_num': $('#khorfa_num').val(),
            'khorfa_price': $('#khorfa_price').val()


        };
        $.ajax({
            url: 'add_khorfa.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {
                    $('#khorfa_num').val('');
                    $('#khorfa_price').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_khorfa').modal('hide');
                    give_pages("show_all_khorfa.php");

                }
                if (data == 'found') {
                    alert("هذه الغرفة تم اضافته من  قبل");
                }
                if (data == 'pls_fill_all') {
                    alert("   رجاء ملئ جميع الحقول ");
                }
            }
        });
    });
}
//////////////////////////

function add_opr() {

    $(document).ready(function() {

        var mydata = {
            'opr_name': $('#add_opr_name').val(),
            'opr_price': $('#add_opr_price').val()


        };
        $.ajax({
            url: 'add_opr.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                if (data == 'done') {
                    $('#add_opr_name').val('');
                    $('#add_opr_price').val('');
                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#add_opr').modal('hide');
                    give_pages("show_all_opr.php");

                }
            }
        });
    });
}
////////////////////////



function edit_docter(ul, doc_name, doc_type, doc_phone, doc_price) {
    $(document).ready(function() {
        $('#edit_doc_name').val(doc_name);
        $('#edit_doc_type').val(doc_type);
        $('#edit_doc_phone').val(doc_phone);
        $('#edit_doc_price').val(doc_price);
        $('#edit_doc_id').val(ul);

        $('#edit_docter').modal('toggle');


    });
}
///////////////////////////
function edit_user(user_id, full_name, user_name, user_password, user_slahia, user_status) {
    $(document).ready(function() {
        $('#edit_user_slahia').html('');
        $('#edit_user_status').html('');
        $('#edit_user_name').val(user_name);


        if (user_slahia == 1) {
            $('#edit_user_slahia').append("<option value='1'>مدير</option>");
            $('#edit_user_slahia').append("<option value='2'>استقبال</option>");
            $('#edit_user_slahia').append("<option value='3'>محاسب</option>");
        } else if (user_slahia == 2) {
            $('#edit_user_slahia').append("<option value='2'>استقبال</option>");
            $('#edit_user_slahia').append("<option value='1'>مدير</option>");
            $('#edit_user_slahia').append("<option value='3'>محاسب</option>");

        } else if (user_slahia == 3) {
            $('#edit_user_slahia').append("<option value='3'>محاسب</option>");

            $('#edit_user_slahia').append("<option value='1'>مدير</option>");
            $('#edit_user_slahia').append("<option value='2'>استقبال</option>");

        }
        if (user_status == 1) {
            $('#edit_user_status').append("<option value='1'> نشط</option>");
            $('#edit_user_status').append("<option value='2'> موقوف</option>");
        } else if (user_status == 2) {
            $('#edit_user_status').append("<option value='2'> موقوف</option>");
            $('#edit_user_status').append("<option value='1'> نشظ</option>");
        }
        $('#edit_full_name').val(full_name);
        $('#edit_user_name').val(user_name);
        $('#edit_user_id').val(user_id);
        $('#edit_user').modal('toggle');


    });
}

///////////////////////////

function edit_fhs(fhs_id, fhs_name, fhs_price) {
    $(document).ready(function() {
        $('#edit_fhs_name').val(fhs_name);
        $('#edit_fhs_price').val(fhs_price);
        $('#edit_fhs_id').val(fhs_id);


        $('#edit_fhs').modal('toggle');


    });
}
///////////////////////////

function edit_msrof(msrof_id, msrof_byan, msrof_price) {
    $(document).ready(function() {
        $('#edit_msrof_byan').val(msrof_byan);
        $('#edit_msrof_price').val(msrof_price);
        $('#edit_msrof_id').val(msrof_id);


        $('#edit_msrof').modal('toggle');


    });
}
///////////////////////////

function edit_ratb(ratb_id, ratb_khsm, ratb_alawa) {
    $(document).ready(function() {
        $('#edit_ratb_id').val(ratb_id);
        $('#edit_ratb_khsm').val(ratb_khsm);
        $('#edit_ratb_alawa').val(ratb_alawa);



        $('#edit_ratb').modal('toggle');


    });
}
///////////////////////////

function edit_mwzf(mwzf_id, mwzf_name, mwzf_job, mwzf_price) {
    $(document).ready(function() {
        $('#edit_mwzf_id').val(mwzf_id);
        $('#edit_mwzf_name').val(mwzf_name);
        $('#edit_mwzf_job').val(mwzf_job);
        $('#edit_mwzf_price').val(mwzf_price);


        $('#edit_mwzf').modal('toggle');


    });
}

///////////////////////////

function edit_khorfa(khorfa_id, time_stay, khorfa_price) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else {
        $(document).ready(function() {
            $('#edit_time_stay').val(time_stay);
            $('#edit_khorfa_price').val(khorfa_price);
            $('#edit_khorfa_id').val(khorfa_id);


            $('#edit_khorfa').modal('toggle');


        });
    }
}
///////////////////////////

function dis_count_onchange() {

    var dis_count_khorfa_price = $("#dis_count_khorfa_price").val();
    var dis_count_khorfa_dis = $("#dis_count_khorfa_dis").val();

    x = parseInt(dis_count_khorfa_price) - (parseInt(dis_count_khorfa_price) * parseInt(dis_count_khorfa_dis) / 100);
    if (dis_count_khorfa_dis < 1) {
        $("#dis_count_after").val(0);
    } else {
        $("#dis_count_after").val(Math.round(x,0));
    }

}
///////////////////////////

function dis_count_onchange_mogabla() {

    var dis_count_mog_price = $("#dis_count_mog_price").val();
    var dis_count_mog_dis = $("#dis_count_mog_dis").val();

    x = parseInt(dis_count_mog_price) - (parseInt(dis_count_mog_price) * parseInt(dis_count_mog_dis) / 100);
    if (dis_count_khorfa_dis < 1) {
        $("#dis_count_after_mog").val(0);
    } else {
        $("#dis_count_after_mog").val(Math.round(x,0));
    }

}///////////////////////////

function dis_count_onchange_fhs() {

    var dis_count_fhs_price = $("#dis_count_fhs_price").val();
    var dis_count_fhs_dis = $("#dis_count_fhs_dis").val();

    x = parseInt(dis_count_fhs_price) - (parseInt(dis_count_fhs_price) * parseInt(dis_count_fhs_dis) / 100);
    if (dis_count_khorfa_dis < 1) {
        $("#dis_count_after_fhs").val(0);
    } else {
        $("#dis_count_after_fhs").val(Math.round(x,0));
    }

}
///////////////////////////

function dis_count_onchange_opration() {

    var dis_count_opr_price = $("#dis_count_opr_price").val();
    var dis_count_opr_dis = $("#dis_count_opr_dis").val();

    x = parseInt(dis_count_opr_price) - (parseInt(dis_count_opr_price) * parseInt(dis_count_opr_dis) / 100);
    if (dis_count_opr_dis < 1) {
        $("#dis_count_after_opr").val(0);
    } else {
        $("#dis_count_after_opr").val(Math.round(x,0));
    }

}

function dis_count_khorfa(khorfa_id, khorfa_price) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else if (slah == 3) {
        alert("ليس لديك صلاحية ");
    } else {
        $(document).ready(function() {

            $('#dis_count_khorfa_price').val(khorfa_price);
            $('#dis_count_khorfa_id').val(khorfa_id);


            $('#dis_count_khorfa').modal('toggle');


        });
    }
}
/////////
function dis_count_fhosat(fatora_num, fhs_price) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else if (slah == 3) {
        alert("ليس لديك صلاحية ");
    } else {
        $(document).ready(function() {

            $('#dis_count_fhs_price').val(fhs_price);
            $('#dis_count_fatora_num').val(fatora_num);


            $('#dis_count_fhs').modal('toggle');


        });
    }
}
//////////////
function dis_count_mogabla(mog_id, doc_price) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else if (slah == 3) {
        alert("ليس لديك صلاحية ");
    } else {
        $(document).ready(function() {

            $('#dis_count_mog_price').val(doc_price);
            $('#dis_count_mog_id').val(mog_id);


            $('#dis_count_mogabla').modal('toggle');


        });
    }
}//////////////
function dis_count_opration(opra_id, opr_price) {
    var slah = $("#user_slahia_").val();
    if (slah == 2) {
        alert("ليس لديك صلاحية ");
    } else if (slah == 3) {
        alert("ليس لديك صلاحية ");
    } else {
        $(document).ready(function() {

            $('#dis_count_opr_price').val(opr_price);
            $('#dis_count_opra_id').val(opra_id);


            $('#dis_count_opration').modal('toggle');


        });
    }
}
///////////////////////////

function edit_opr(opr_id, opr_name, opr_price) {
    $(document).ready(function() {
        $('#edit_opr_name').val(opr_name);
        $('#edit_opr_price').val(opr_price);
        $('#edit_opr_id').val(opr_id);


        $('#edit_opr').modal('toggle');


    });
}
///////////////////////////

function edit_patient(pa_id, pa_name, pa_gender, pa_life, pa_phone, pa_age) {
    $(document).ready(function() {
        $('#edit_pa_id').val(pa_id);

        $('#edit_pa_name').val(pa_name);
        $('#edit_pa_life').val(pa_life);
        $('#edit_pa_phone').val(pa_phone);
        $('#edit_pa_age').val(pa_age);
        if (pa_gender == 'ذكر') {
            $('#edit_pa_gender').html("<option>ذكر</option><option>انثى</option>");
        } else {
            $('#edit_pa_gender').html("<option>انثى</option><option>ذكر</option>");
        }

        $('#edit_patient').modal('toggle');


    });
}
///////////////////////////

function fhs_patient(pa_id, pa_name, pa_gender, pa_life, pa_phone, pa_age) {
    $(document).ready(function() {
        var mydata = {
            'pa_name': pa_name,
            'pa_gender': pa_gender,
            'pa_age': pa_age,
            'pa_phone': pa_phone,
            'pa_id': pa_id

        };
        $.ajax({
            url: 'fhs.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('');
                $('#give_conent').html(data);
                $('.loading_place').slideUp();


            }
        });
    });
}
///////////////////////////

function add_patient_fhs(fhs_id, fhs_name, fhs_price, pa_name, pa_phone, pa_id, fatora_num) {
    $(document).ready(function() {
        var mydata = {
            'fhs_name': fhs_name,
            'fhs_price': fhs_price,
            'pa_name': pa_name,
            'pa_phone': pa_phone,
            'pa_id': pa_id,
            'fatora_num': fatora_num,

            'fhs_id': fhs_id

        };
        $.ajax({
            url: 'add_patient_fhs.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('');

                $('.loading_place').slideUp();
                if (data == "found") {
                    alert("تم اجراء هذا الفحص اليوم");
                } else {
                    $('#fhs_content').html(data);
                }



            }
        });
    });
}
///////////////////////////

function opr(pa_name, pa_gender, pa_life, pa_age, pa_id) {
    $(document).ready(function() {
        var mydata = {

            'pa_id': pa_id


        };
        $('#exampleModalScrollableTitle_opr').html('');
        $.ajax({
            url: 'show_opr.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('#opr_content').html(data);
                $('#exampleModalScrollableTitle_opr').append("اسم المريض :" + pa_name + "<br>");
                $('#exampleModalScrollableTitle_opr').append("   النوع :" + pa_gender + "<br>");
                $('#exampleModalScrollableTitle_opr').append("   السكن :" + pa_life + "<br>");
                $('#exampleModalScrollableTitle_opr').append("   العمر :" + pa_age + "<br>");


                $('.loading_place').slideUp();
                $('#opr').modal('toggle');
                //mogabla

            }
        });
    });
}
///////////////////////////

function hjz_khorfa(pa_name, pa_gender, pa_life, pa_age, pa_id) {
    $(document).ready(function() {
        $("#pa_id_hjz").val(pa_id);
        $("#pa_name_hjz").val(pa_name);
        $("#pa_gender_hjz").val(pa_gender);
        $("#pa_life_hjz").val(pa_life);
        $("#pa_age_hjz").val(pa_age);


        $('#hjz_khorfa').modal('toggle');


    });
}

///////////////////////////

function mogabla(pa_name, pa_gender, pa_life, pa_age, pa_id) {
    $(document).ready(function() {
        var mydata = {

            'pa_id': pa_id


        };
        $('#exampleModalScrollableTitle_mogable').html('');
        $.ajax({
            url: 'show_doc_mogabla.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('#mogabla_content').html(data);
                $('#exampleModalScrollableTitle_mogable').append("اسم المريض :" + pa_name + "<br>");
                $('#exampleModalScrollableTitle_mogable').append("   النوع :" + pa_gender + "<br>");
                $('#exampleModalScrollableTitle_mogable').append("   السكن :" + pa_life + "<br>");
                $('#exampleModalScrollableTitle_mogable').append("   العمر :" + pa_age + "<br>");


                $('.loading_place').slideUp();
                $('#mogabla').modal('toggle');
                //mogabla

            }
        });
    });
}
////////////////////////////////////////////////////

function edit_docter_done() {
    $(document).ready(function() {
        var doc_name = $('#edit_doc_name').val();
        var doc_type = $('#edit_doc_type').val();
        var doc_phone = $('#edit_doc_phone').val();
        var doc_price = $('#edit_doc_price').val();
        var ul = $('#edit_doc_id').val();


        var mydata = {
            'doc_name': doc_name,
            'doc_phone': doc_phone,
            'doc_type': doc_type,
            'doc_price': doc_price,
            'doc_id': ul

        };
        $.ajax({
            url: 'edit_docter.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_docter').modal('hide');
                    give_pages("show_all_docter.php");


                }
            }
        });
    });
}
////////////////////////////////////////////////////

function edit_user_done() {
    $(document).ready(function() {
        var full_name = $('#edit_full_name').val();
        var user_name = $('#edit_user_name').val();
        var user_slahia = $('#edit_user_slahia').val();
        var user_status = $('#edit_user_status').val();
        var user_id = $('#edit_user_id').val();


        var mydata = {
            'full_name': full_name,
            'user_name': user_name,
            'user_slahia': user_slahia,
            'user_status': user_status,
            'user_id': user_id

        };
        $.ajax({
            url: 'edit_user.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_user').modal('hide');
                    give_pages("show_all_user.php");


                }
            }
        });
    });
} ////////////////////////////////////////////////////

function dis_count_khorfa_done() {
    $(document).ready(function() {
        var dis_count_khorfa_id = $('#dis_count_khorfa_id').val();
        var dis_count_khorfa_price = $('#dis_count_khorfa_price').val();
        var dis_count_khorfa_dis = $('#dis_count_khorfa_dis').val();
        var mydata = {
            'khorfa_dis': dis_count_khorfa_dis,
            'khorfa_price': dis_count_khorfa_price,
            'khorfa_id': dis_count_khorfa_id

        };
        $.ajax({
            url: 'dis_count_khorfa.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                        $('.loading_place').hide();
                        $("#time_stay").val('');
                        $("#khorfa_price_hjz").val('');
                        $("#start_date").val('');
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"
                        });
                        $('#report_content').html(data);
                        printery("all_report");
                        $('#report_content').html('');

                        give_pages("show_all_khorfa.php");

            }
        });
    });
} ////////////////////////////////////////////////////

function dis_count_fhs_done() {
    $(document).ready(function() {
        var dis_count_fatora_num = $('#dis_count_fatora_num').val();
        var dis_count_fhs_price = $('#dis_count_fhs_price').val();
        var dis_count_fhs_dis = $('#dis_count_fhs_dis').val();
        var mydata = {
            'fhs_dis': dis_count_fhs_dis,
            'fhs_price': dis_count_fhs_price,
            'fatora_num': dis_count_fatora_num

        };
        $.ajax({
            url: 'dis_count_fhosat.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                        $('.loading_place').hide();
                        $("#time_stay").val('');
                        $("#khorfa_price_hjz").val('');
                        $("#start_date").val('');
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"
                        });
                        $('#report_content').html(data);
                        printery("all_report");
                        $('#report_content').html('');

                        give_pages("show_fhosat.php");

            }
        });
    });
}
 ////////////////////////////////////////////////////

function dis_count_mogabla_done() {
    $(document).ready(function() {
        var dis_count_mog_id = $('#dis_count_mog_id').val();
        var dis_count_mog_price = $('#dis_count_mog_price').val();
        var dis_count_mog_dis = $('#dis_count_mog_dis').val();
        var mydata = {
            'mog_dis': dis_count_mog_dis,
            'mog_price': dis_count_mog_price,
            'mog_id': dis_count_mog_id

        };
        $.ajax({
            url: 'dis_count_mogabla.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                        $('.loading_place').hide();
                         
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"
                        });
                        $('#report_content').html(data);
                        printery("all_report");
                        $('#report_content').html('');

                        give_pages("show_all_mogabla.php");

            }
        });
    });
}////////////////////////////////////////////////////

function dis_count_opration_done() {
    $(document).ready(function() {
        var dis_count_opra_id = $('#dis_count_opra_id').val();
        var dis_count_opr_price = $('#dis_count_opr_price').val();
        var dis_count_opr_dis = $('#dis_count_opr_dis').val();
        var mydata = {
            'opr_dis': dis_count_opr_dis,
            'opr_price': dis_count_opr_price,
            'opr_id': dis_count_opra_id

        };
        $.ajax({
            url: 'dis_count_opration.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                        $('.loading_place').hide();
                         
                        $(".modal").hide();
                        $(".fade").hide();
                        $(".modal-open").css({
                            "overflow": "auto"
                        });
                        $('#report_content').html(data);
                        printery("all_report");
                         $('#report_content').html('');

                        give_pages("show_opretion.php");

            }
        });
    });
}
////////////////////////////////////////////////////

function show_fhosat_to_delete(fatora_num) {
    $(document).ready(function() {
        var slah = $("#user_slahia_").val();
        if (slah == 3) {
            alert("ليس لديك الصلاحية");
        } else if (slah == 2) {
            alert("ليس لديك الصلاحية");
        } else {


            var mydata = {

                'fatora_num': fatora_num
            };
            $.ajax({
                url: 'show_fhosat_to_delete.php',
                method: "POST",
                data: mydata,
                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {


                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#show_fhosat_to_delete_put_id').html(data);
                    $('#show_fhosat_to_delete').modal('toggle');




                }
            });
        }
    });
}
////////////////////////////////////////////////////

function edit_fhs_done() {
    $(document).ready(function() {
        var fhs_name = $('#edit_fhs_name').val();
        var fhs_price = $('#edit_fhs_price').val();
        var fhs_id = $('#edit_fhs_id').val();
        var mydata = {
            'fhs_name': fhs_name,
            'fhs_price': fhs_price,
            'fhs_id': fhs_id
        };
        $.ajax({
            url: 'edit_fhs.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_fhs').modal('hide');
                    give_pages("show_all_fhs.php");


                }
            }
        });
    });
} ////////////////////////////////////////////////////

function opration_detauls(ul) {

    $(document).ready(function() {

        var mydata = {
            "user_id": ul
        };
        $.ajax({
            url: 'opration_detauls.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').html('');

                $('.loading_place').slideUp();
                $('#opration_detauls_in').html(data);
                $('#opration_detauls').modal('toggle');




            }
        });
    });
} ////////////////////////////////////////////////////

function msrof_detauls(ul) {

    $(document).ready(function() {

        var mydata = {
            "user_id": ul
        };
        $.ajax({
            url: 'msrof_detauls.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').html('');

                $('.loading_place').slideUp();
                $('#msrof_detauls_in').html(data);
                $('#msrof_detauls').modal('toggle');


            }
        });
    });
} ////////////////////////////////////////////////////

function ratb_detauls(ul) {

    $(document).ready(function() {

        var mydata = {
            "user_id": ul
        };
        $.ajax({
            url: 'ratb_detauls.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').html('');

                $('.loading_place').slideUp();
                $('#ratb_detauls_in').html(data);
                $('#ratb_detauls').modal('toggle');




            }
        });
    });
}
////////////////////////////////////////////////////
////////////////////////////////////////////////////

function mogabla_detauls(ul) {

    $(document).ready(function() {

        var mydata = {
            "user_id": ul
        };
        $.ajax({
            url: 'mogabla_detauls.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').html('');

                $('.loading_place').slideUp();
                $('#mogabla_detauls_in').html(data);
                $('#mogabla_detauls').modal('toggle');




            }
        });
    });
} ////////////////////////////////////////////////////

function khorfa_detauls(ul) {

    $(document).ready(function() {

        var mydata = {
            "user_id": ul
        };
        $.ajax({
            url: 'khorfa_detauls.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').html('');

                $('.loading_place').slideUp();
                $('#khorfa_detauls_in').html(data);
                $('#khorfa_detauls').modal('toggle');




            }
        });
    });
}
////////////////////////////////////////////////////

function fhs_detauls(ul) {

    $(document).ready(function() {

        var mydata = {
            "user_id": ul
        };
        $.ajax({
            url: 'fhs_detauls.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('');
                $('.loading_place').html('');

                $('.loading_place').slideUp();
                $('#fhs_detauls_in').html(data);
                $('#fhs_detauls').modal('toggle');




            }
        });
    });
}
////////////////////////////////////////////////////
function edit_msrof_done() {
    $(document).ready(function() {
        var msrof_byan = $('#edit_msrof_byan').val();
        var msrof_price = $('#edit_msrof_price').val();
        var msrof_id = $('#edit_msrof_id').val();
        var mydata = {
            'msrof_byan': msrof_byan,
            'msrof_price': msrof_price,
            'msrof_id': msrof_id
        };
        $.ajax({
            url: 'edit_msrof.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_msrof').modal('hide');
                    give_pages("show_all_msrof.php");
                }
            }
        });
    });
}
////////////////////////////////////////////////////
function edit_ratb_done() {
    $(document).ready(function() {
        var ratb_id = $('#edit_ratb_id').val();
        var ratb_khsm = $('#edit_ratb_khsm').val();
        var ratb_alawa = $('#edit_ratb_alawa').val();

        var mydata = {
            'ratb_id': ratb_id,
            'ratb_khsm': ratb_khsm,
            'ratb_alawa': ratb_alawa
        };
        $.ajax({
            url: 'edit_ratb.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_ratb').modal('hide');
                    give_pages("show_all_ratb.php");
                }
            }
        });
    });
}
////////////////////////////////////////////////////
function edit_mwzf_done() {
    $(document).ready(function() {

        var mydata = {
            'mwzf_id': $('#edit_mwzf_id').val(),
            'mwzf_name': $('#edit_mwzf_name').val(),
            'mwzf_price': $('#edit_mwzf_price').val(),
            'mwzf_job': $('#edit_mwzf_job').val()

        };

        $.ajax({
            url: 'edit_mwzf.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_mwzf').modal('hide');
                    give_pages("show_all_mwzf.php");
                }
            }
        });
    });
}
////////////////////////////////////////////////////

function edit_khorfa_done() {
    $(document).ready(function() {
        var time_stay = $('#edit_time_stay').val();
        var khorfa_price = $('#edit_khorfa_price').val();
        var khorfa_id = $('#edit_khorfa_id').val();



        var mydata = {
            'time_stay': time_stay,
            'khorfa_price': khorfa_price,
            'khorfa_id': khorfa_id


        };
        $.ajax({
            url: 'edit_khorfa.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_khorfa').modal('hide');
                    give_pages("show_all_khorfa.php");


                }
            }
        });
    });
}
////////////////////////////////////////////////////

function print_fhs_fatora(fatora_num, pa_name) {
    $(document).ready(function() {


        var mydata = {
            'fatora_num': fatora_num,
            'pa_name': pa_name



        };
        $.ajax({
            url: 'print_fhs_fatora.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();

                $('#report_content').html(data);

                printery("all_report");
                $('#report_content').html("");

                $('#show_fatora_after_print').modal('hide');
                $("#show_fatora_after_print").hide();
                $(".modal").hide();
                $(".fade").hide();
                $(".modal-open").css({
                    "overflow": "auto"
                });

                open_modal("show_fatora_after_print");



            }
        });
    });
}
////////////////////////////////////////////////////

function show_fatora_mogabla_after_print_done(mog_id) {
    $(document).ready(function() {


        var mydata = {
            'mog_id': mog_id 



        };
        $.ajax({
            url: 'show_fatora_mogabla_after_print_done.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();

                $('#report_content').html(data);

                printery("all_report");
                $('#report_content').html("");

                $('#show_fatora_after_print').modal('hide');
                $("#show_fatora_after_print").hide();
                $(".modal").hide();
                $(".fade").hide();
                $(".modal-open").css({
                    "overflow": "auto"
                });

                open_modal("show_fatora_mogabla_after_print");



            }
        });
    });
}////////////////////////////////////////////////////

function show_fatora_opration_after_print_done(opra_id) {
    $(document).ready(function() {


        var mydata = {
            'opra_id': opra_id 



        };
        $.ajax({
            url: 'show_fatora_opration_after_print_done.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();

                $('#report_content').html(data);

                printery("all_report");
                $('#report_content').html("");

                $('#show_fatora_opration_after_print').modal('hide');
                $("#show_fatora_opration_after_print").hide();
                $(".modal").hide();
                $(".fade").hide();
                $(".modal-open").css({
                    "overflow": "auto"
                });

                open_modal("show_fatora_opration_after_print");



            }
        });
    });
}
////////////////////////////////////////////////////

function show_fatora_hjs_after_print_done(khorfa_id) {
    $(document).ready(function() {


        var mydata = {
            'khorfa_id': khorfa_id 



        };
        $.ajax({
            url: 'show_fatora_hjs_after_print_done.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();

                $('#report_content').html(data);

                printery("all_report");
                $('#report_content').html("");

                $('#show_fatora_hjs_after_print').modal('hide');
                $("#show_fatora_hjs_after_print").hide();
                $(".modal").hide();
                $(".fade").hide();
                $(".modal-open").css({
                    "overflow": "auto"
                });

                open_modal("show_fatora_hjs_after_print");



            }
        });
    });
}
////////////////////////////////////////////////////

function edit_opr_done() {
    $(document).ready(function() {
        var opr_name = $('#edit_opr_name').val();
        var opr_price = $('#edit_opr_price').val();
        var opr_id = $('#edit_opr_id').val();
        var mydata = {
            'opr_name': opr_name,
            'opr_price': opr_price,
            'opr_id': opr_id


        };
        $.ajax({
            url: 'edit_opr.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_opr').modal('hide');
                    give_pages("show_all_opr.php");


                }
            }
        });
    });
}

////////////////////////////////////////////////////

function edit_patient_done() {
    $(document).ready(function() {
        var pa_name = $('#edit_pa_name').val();
        var pa_gender = $('#edit_pa_gender').val();
        var pa_age = $('#edit_pa_age').val();
        var pa_life = $('#edit_pa_life').val();
        var pa_phone = $('#edit_pa_phone').val();
        var pa_id = $('#edit_pa_id').val();

        var mydata = {
            'pa_name': pa_name,
            'pa_gender': pa_gender,
            'pa_phone': pa_phone,
            'pa_life': pa_life,
            'pa_age': pa_age,
            'pa_id': pa_id


        };
        $.ajax({
            url: 'edit_patient.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                if (data == 'done') {

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').html('');

                    $('.loading_place').slideUp();
                    $('#edit_patient').modal('hide');
                    give_pages("show_all_patient.php");


                }
            }
        });
    });
}
////////////////////////////////////////////////////

function to_print(pa_id) {
    $(document).ready(function() {


        var mydata = {

            'pa_id': pa_id


        };
        $.ajax({
            url: 'give_fhs_to_print.php',
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                $('#report_content').html(data);
                printery("all_report");


                $('#report_content').html('');
                delete_fhs_after_all(pa_id);



            }
        });
    });
}
////////////////////////////////////////////////////

function search(id, ul, stay_id) {
    $(document).ready(function() {
        var mydata = {

            'search_text': $("#" + id).val()

        };
        $.ajax({
            url: ul,
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                $('#' + stay_id).html(data);

 }
        });
    });
}
////////////////////////////////////////////////////
function search_new(id, ul, stay_id,user_id,user_status) { 
    $(document).ready(function() {
        var mydata = {

            'search_text': $("#" + id).val(),
            'user_id': user_id,
            'user_status': user_status

        };
        $.ajax({
            url: ul,
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                $('#' + stay_id).html(data);

 }
        });
    });
}
////////////////////////////////////////////////////

function search_fhs(id, ul, stay_id, pa_id, pa_name, pa_gender, pa_age, pa_phone, fatora_num) {
    //pa_id,pa_name,pa_gender,pa_age,phone,fatora_num
    $(document).ready(function() {


        var mydata = {

            'search_text': $("#" + id).val(),
            'pa_name': pa_name,
            'pa_id': pa_id,
            'pa_gender': pa_gender,
            'pa_age': pa_age,
            'fatora_num': fatora_num,
            'pa_phone': pa_phone



        };
        $.ajax({
            url: ul,
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {


                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                $('#' + stay_id).html(data);






            }
        });
    });
}
// ***************************** amaliyat tagreer
function reports(url) {
    
    $(document).ready(function() {
        if (url === "report_users.php") {
            var s_date1 = $('#sch_date1').val();
            var s_date2 = $('#sch_date2').val();
            var s_date = $('#sch_date3').val();

            var mydata = {
                's_date1': s_date1,
                's_date2': s_date2,
                's_date': s_date,
                'user_id_report': $('#user_id_report').val()
            };
            $.ajax({
                url: "report_users.php",
                method: "POST",
                data: mydata,
                dataType: "html",
                beforeSend: function() {
                    $('.loading_place').show();
                    $('.loading_place').html('جاري المعالجة...');
                },
                success: function(data) {
                    // alert("Data: " + data + "\nStatus: " + status);

                    $('.loading_place').html('تم التسجيل');
                    $('.loading_place').hide();
                    if (data == 'notfound') {
                        alert("لا توجد بيانات");
                    } else {

                        $('#report_content').html(data);

                    }

                }
            });
        }
        var s_date1 = $('#sch_date1').val();
        var s_date2 = $('#sch_date2').val();
        var s_date = $('#sch_date3').val();
        var mydata = {
            's_date1': s_date1,
            's_date2': s_date2,
            's_date': s_date
        };
        $.ajax({
            url: url,
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                // alert("Data: " + data + "\nStatus: " + status);

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                if (data == 'notfound') {
                    alert("لا توجد بيانات");
                } else {

                    $('#report_content').html(data);

                }

            }
        });
    });
}
// ***************************** amaliyat tagreer
function reports_docter(url) {
    // alert("aaaaa")
    $(document).ready(function() {

        var s_date1 = $('#sch_date1').val();
        var s_date2 = $('#sch_date2').val();
        var s_date = $('#sch_date3').val();
        var doc_id = $('#docter_name_report').val();
        var mydata = {
            's_date1': s_date1,
            's_date2': s_date2,
            'doc_id': doc_id,
            's_date': s_date
        };
        $.ajax({
            url: url,
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                // alert("Data: " + data + "\nStatus: " + status);

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                if (data == 'notfound') {
                    alert("لا توجد بيانات");
                } else {

                    $('#report_content').html(data);

                }





            }
        });
    });
}
// ***************************** amaliyat tagreer
function reports_ratb(url) {
    // alert("aaaaa")
    $(document).ready(function() {

        var s_date1 = $('#sch_date1').val();
        var s_date2 = $('#sch_date2').val();
        var s_date = $('#sch_date3').val();

        var mydata = {
            's_date1': s_date1,
            's_date2': s_date2,

            's_date': s_date
        };
        $.ajax({
            url: url,
            method: "POST",
            data: mydata,
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                // alert("Data: " + data + "\nStatus: " + status);

                $('.loading_place').html('تم التسجيل');
                $('.loading_place').hide();
                if (data == 'notfound') {
                    alert("لا توجد بيانات");
                } else {

                    $('#report_content').html(data);

                }





            }
        });
    });
}
//////////////
function select_change_sell() {
    $(document).ready(function() {
        if ($("#sch_option").val() == "between") {
            $("#sch_date3").hide();
            $("#sch_date3").val('');

            $("#bet").show();
        }
        if ($("#sch_option").val() == "date") {

            $("#sch_date1").val('');
            $("#sch_date2").val('');
            $("#bet").hide();
            $("#sch_date3").show();
        }
    });
}
/////////////////////////
function printery(url) {
    $('#header').html($("#header_img").html());
    $('#report_footer').show();
    var body = document.body.innerHTML;

    var print_content = document.getElementById(url).innerHTML;

    document.body.innerHTML = print_content;
    window.print();
    document.body.innerHTML = body;
    print_content = "";
    $('#header').html('');
    $('#report_footer').hide();

}
////////////////////////////////////////////
function fahis_details(fatora_no,pa_name) {

$(document).ready(function() {

    var mydata = {
        "fatora_no": fatora_no
    };
    $.ajax({
        url: 'fahis_details.php',
        method: "POST",
        data: mydata,
        dataType: "html",
        beforeSend: function() {
            $('.loading_place').show();
            $('.loading_place').html('جاري المعالجة...');
        },
        success: function(data) {
            $('.loading_place').html('');
            $('.loading_place').html('');

            $('.loading_place').slideUp();
            $('#pa_name').html("اسم المريض:"+pa_name);
            $('#fahis_details_in').html(data);
            $('#fahis_details').modal('toggle');


        }
    });
});
}
</script>