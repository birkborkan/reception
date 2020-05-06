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
    @media-print{
      #header_img{
          display:block;
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
    </style>
</head>

<body dir='rtl'>
<div  id='header_img' style='display:none;'>
<img src='images/logo2.png' alt='' width='100%' height='100'>
</div>
<img src="images/dr.png" class='img-responsive' style='float:left;' width='100' height='129' alt=""
               
               srcset="" />
    <div class='container'>
        <div id='print_content'></div>
        <div class='loading_place' style='display:none;'></div>
        
        
        <div class='header'>



            <img src="images/logo2.png" class='img-responsive' height='129' width='80%' alt="" srcset="" />

            <img src="images/logo.png" class='img-responsive' style='float:left;' width='100' height='129' alt=""
                srcset="" />

            <img src="images/logo_.png" class='img-responsive' style='float:right;
                margin-right:10px;' width='100' height='129' alt="" srcset="" />


        </div>
      
        <div id="give_conent">
            <img src="images/reception2.jpg" class='img-responsive' width='100%' alt="" srcset="">
        </div>
        <div class='footer'>
            Powerd by WHD &copy;
        </div>

        <!--end container-->
        <!--start models -->
        <!-- start add patient model -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"> تسجيل الدخول </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method='post' style='text-align:right;width:100%;'>

                            <div class="form-group">
                                <label class="col-form-label"> اسم المستخدم</label>
                                <input type='text' style='width:100%;' id='username' class='form-control' />

                                <label>كلمة المرور </label>
                                <input type='password' id='password' class='form-control' />
                              
                               
                                <span class='btn btn-success' onclick='login()'>الدخول </span>
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
 
       
        
        <!--end models-->


</body>

</html>
<script type='text/javascript'>
/////////////
$(document).ready(function() {
$("#login").modal("toggle");
});
function login() {

    $(document).ready(function() {
var mydata = {
    "username":$("#username").val(),
    "password":$("#password").val()
}
        $.ajax({
            url: "login_done.php",
            data:mydata,
            method: "POST",
            
            dataType: "html",
            beforeSend: function() {
                $('.loading_place').show();
                $('.loading_place').html('جاري المعالجة...');
            },
            success: function(data) {
                $('.loading_place').html('');
                $('.loading_place').hide();

                if(data == "done"){
                    window.location.assign("index.php");
                }
                if(data == 'nofound'){
                    alert("هذا المستخدم غير موجود");
                }
                if(data == 'stop'){
                    alert("تم ايقاف هذا المستخدم رجاء مقابلة الإدارة ");
                }


            }
        });
    });
}
//////////////////////////


</script>