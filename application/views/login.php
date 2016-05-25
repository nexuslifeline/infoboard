
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $item  ?> </title>
   

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

<div style="border-radius: 3px" align="center">

<img  src="images/spcf-logo-main.png" class="img-responsive" alt="" />
</div>

            <h3 class="font-bold">Infoboard System</h3>

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
  <div class="form" align="center">
    <h2>Create Student Account</h2>
  
  <hr>

<p >New inquiries can register on this portal by clicking the register button below.To be approve by the authorized person upon registering to System Plus College Foundation.
                        <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)--></p>

<br>



    
 <button type="button" class="btn btn-primary block full-width m-b" data-toggle="modal" data-target="#student-modal">Register</button>


<!-- Modal -->


<div id="student-modal" class="modal fade" role="dialog"  data-backdrop="static" data-keyboard="false" data-save-mode="new" data-selected-id="0">
<div class="modal-dialog" style=" height:10%; width:50%">

<!-- Modal content-->
<div class="modal-content">

<form id="frm-student">
<div class="modal-body">

<div class="row">
<div class="form-group">
<ul id="tab-content" class="nav nav-tabs" style="margin-left:10px;margin-right:10px;">
    <li class="active">
        <a href="#personal-info" id="pi" data-toggle="tab">
            Student Information
        </a>
    </li>
     <li>
        <a href="#location-info" id="li" data-toggle="tab">
           Location Detail
        </a>
    </li>

    <li>
        <a href="#login-info" id="li" data-toggle="tab">
            Login Information
        </a>
    </li>
    
</ul>


  <form id="frm-register">
<div id="tabs" class="tab-content"  style="margin-left:10px;margin-right:10px;"><!-- /tab contents -->
    <!----><div class="tab-pane fade in active" id="personal-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
         
        <div class="row">
        
            <div class="col-lg-6">
        <div class="form-group">
        <label>Course </label> 
        <select class="form-control" name="course_id" id="course_id">
        <option value="1">BS Information Technology</option>
        </select>
        </div>

        <div class="form-group">
        <label>Student No</label>
        <input class="form-control" type="text" name="student_no" id="student_no" placeholder="student no" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Student no is required." data-message="Please make sure you enter Student No." required="" value="">
        </div>


        <div class="form-group">
        <label>Firstname</label>
        <input class="form-control" type="text" name="stud_fname" id="stud_fname" placeholder="Firstname" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Firstname is required." data-message="Please make sure you enter Firstname." required="" value="">
        </div>   

        <div class="form-group">
        <label>Middlename</label>
        <input class="form-control" type="text" name="stud_mname" id="stud_mname" placeholder="Middlename" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Middlename is required." data-message="Please make sure you enter Middlename." required="" value="">
    </div>

    <div class="form-group">
        <label>Lastname</label>
        <input class="form-control" type="text" name="stud_lname" id="stud_lname" placeholder="Lastname" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Lastname is required." data-message="Please make sure you enter Lastname." required="" value="">
    </div>
    
    <div class="form-group">
              <label>Gender</label>
              <input type="radio" name="gender" checked="" value="Male"> Male 
              <input type="radio" checked="" name="gender" value="Female"> Female
        </div>





        </div>
      
           
     <div class="col-lg-6">

    <div class="form-group">
    
            <label>Contact No</label>
            <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact #" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Contact # is required." data-message="Please make sure you enter Contact #." value="">
        </div>

     <div class="form-group">
            <label>Birthdate</label>
            <input class="form-control" type="text" name="birthdate" id="birthdate" placeholder="Birthdate" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthdate is required." data-message="Please make sure you enter Birthdate" value="">
        </div>



        <div class="form-group">
            <label>Birthplace</label>
            <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Birthplace" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthplace is required." data-message="Please make sure you enter Birthplace" value="">
        </div>

        <div class="form-group">
            <label>Nationality</label>
            <input class="form-control" type="text" name="nationality" id="nationality" placeholder="Nationality" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Nationality is required." data-message="Please make sure you enter Nationality" value="">
        </div>
        <div class="form-group">
            <label>Civil Status</label>
            <input class="form-control" type="text" name="civil_status" id="civil_status" placeholder="Civil Status" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Civil status is required." data-message="Please make sure you enter Civil status" value="">
        </div>
                   

            
            </div>

     </div>

    </div>



<div class="tab-pane fade" id="location-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
        <div class="row">
        
<div class="col-lg-6">

        
      <div class="form-group">
        <label>House No . </label>
        <input class="form-control" type="text" name="house_no" id="house_no" placeholder="House no." data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required." data-message="Please make sure you enter House # ." value="">
    </div>



      <div class="form-group">
        <label>Street </label>
        <input class="form-control" type="text" name="street" id="street" placeholder="Street" data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required." data-message="Please make sure you enter Street " value="">
    </div>



      <div class="form-group">
        <label> Barangay </label>
        <input class="form-control" type="text" name="barangay" id="barangay" placeholder="Barangay" data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required." data-message="Please make sure you enter Barangay " value="">
    </div>
     </div> 

     <div class="col-lg-6">
    <div class="form-group">
        <label>Municipality</label>
        <input class="form-control" type="text" name="municipality" id="municipality" placeholder="Municipality" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Municipality is required." data-message="Please make sure you enter Municipality " value="">
    </div>



    <div class="form-group">
        <label>Zipcode</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" placeholder="Zipcode" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Zipcode is required." data-message="Please make sure you enter Zipcode" value="">
    </div>


    <div class="form-group">
        <label>Province</label>
        <input class="form-control" type="text" name="province" id="province" placeholder="Province" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Province is required." data-message="Please make sure you enter Province" value="">
    </div>

</div>
        
    

        </div>
    </div>







    <div class="tab-pane fade" id="login-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
        <div class="row">
      
            <div class="col-lg-8">

                <label>Username * </label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Username is required." data-message="Please make sure you enter Username." required="">
               
                <label>Email Address * </label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Email Address is required." data-message="Please make sure you enter Email Address." required="">

                <label>Password * </label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password " data-container="body" data-trigger="manual" data-toggle="tooltip" title="Password is required." data-message="Please make sure you enter Password." required="">
            
                <label>Confirm Password * </label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password " data-container="body" data-trigger="manual" data-toggle="tooltip" title="Password is required." data-message="Please make sure you enter Confirm Password." required="">

            </div>
           

        </div>
    </div>


</div>
</div><!--form-group-->
</div>
</div>
</form>

<div class="modal-footer">
    <button id="btn-save" type="button"  class="btn btn-success">Save</button>
    <button id="btn-close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>


</div>

</div>
</div>






    

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


<!-- Summernote -->
<script src="assets/js/plugins/summernote/summernote.min.js"></script>
<script src="assets/js/plugins/wow/wow.min.js"></script>

<script src="assets/js/index.js"></script>


</body>
</html>
