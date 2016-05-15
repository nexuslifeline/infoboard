
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | Login Page </title>


    <!-- Checkbox / Radio -->
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">


    <!-- Dropdown / Select picker-->

    <link href="assets/css/dropdown-enhance/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="assets/css/animate.css" rel="stylesheet">

  
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

       
     <link href="assets/css/login/style.css" rel="stylesheet">
     <link href="assets/css/login/reset.css" rel="stylesheet">



    
    <!-- Datepicker --->
    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <link href="assets/js/plugins/notify/pnotify.core.css" rel="stylesheet">


    <!-- SUmmernote -->
    <link href="assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">


    <style>
        .toolbar{
            float: left;
        }

        .tools {
            float: left;
            margin-bottom:5px;
        }

        [contenteditable="true"]:active,
        [contenteditable="true"]:focus{
            border:3px solid #F5C116;
            outline:none;

            background: white;
        }
    </style>
</head>







<div class="loginColumns animated fadeInDown">
 



<div class="pen-title">
<center>
<img style="border-radius: 3px "  src="images/spcf-logo-main.png" class="img-responsive" alt="" />
</center>

  <span>INFOBOARD SYSTEM </span>
</div>

 



<!-- Form Module-->
<div class="module form-module">
  



  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  




<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    


    <form id="frm-login">
    

        <input class="form-control" type="text" name="username" id="username" placeholder="Username"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Username"data-message="Please make sure your Username." required >
     

      <input class="form-control" type="password" name="password" id="password" placeholder="Password"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="password" data-message="Please make sure your Password." required >


    
    </form>

<button id="btn-login"  class="btn btn-primary block full-width m-b" >Login</button>


  </div>
  <div class="form">
    <h2>Create Student account</h2>
  
    <form id="frm-register">

     <input  type="email" placeholder="Email">
     <input  type="text" placeholder="Username">
      <input type="password" placeholder="Password">

    </form>
<button id="btn-register"  class="btn btn-primary block full-width m-b" >Register</button>

   
  </div>


  <div class="cta">Click Pen icon on top to Register</a></div>
</div>








  </div>










<?php include('assets/includes/global_js.php'); ?>

<!--- Dropdown / Selectpicker --->
<script src="assets/css/dropdown-enhance/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/plugins/typehead/bootstrap3-typeahead.js"></script>

<!-- iCheck -->
<script src="assets/js/plugins/iCheck/icheck.min.js"></script>




<!-- Datepicker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- PNotify -->
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.core.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="assets/js/plugins/notify/pnotify.nonblock.js"></script>



<!-- Data Tables -->
<script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- sparkline -->
<script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Peity -->
<script src="assets/js/plugins/peity/jquery.peity.min.js"></script>

   <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>'
    </script>
<!--Custom JS-->
<script src="assets/js/defined/login.event.handlers.js"></script>

<script src="assets/js/defined/register.event.handlers.js"></script>

<!-- Summernote -->
<script src="assets/js/plugins/summernote/summernote.min.js"></script>
<script src="assets/js/plugins/wow/wow.min.js"></script>

<script src="assets/js/index.js"></script>


</body>
</html>
