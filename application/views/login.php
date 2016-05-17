
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

    <form id="frm-register">

    
<button type="button" id="btn-register" class="btn btn-primary block full-width m-b" data-toggle="modal" data-target="#student-modal">Register</button>

   
    </form>

  </div>


  <div class="cta">Click Pen icon on top to Register</a></div>
</div>








  </div>






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
            Personal Information
        </a>
    </li>

    <li>
        <a  href="#family-info" id="fi" data-toggle="tab">
            Family Information
        </a>
    </li>

    <li>
        <a href="#educational-info" id="ei" data-toggle="tab">
            Educational Background
        </a>
    </li>

    <li>
        <a href="#login-info" id="li" data-toggle="tab">
            Login Information
        </a>
    </li>

</ul>

<div id="tabs" class="tab-content"  style="margin-left:10px;margin-right:10px;"><!-- /tab contents -->
    <!----><div class="tab-pane fade in active" id="personal-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
        <div class="row">
            <div class="col-lg-6">


                <label for="stud_fname">Firstname:</label>
                <input class="form-control" type="text" name="stud_fname" id="stud_fname" placeholder="First Name" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="stud_mname">Middlename:</label>
                <input class="form-control" type="text" name="stud_mname" id="stud_mname" placeholder="Middlename"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="stud_lname">Lastname:</label>
                <input class="form-control" type="text" name="stud_lname" id="stud_lname" placeholder="Lastname"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <Label for="birthdate">Date of Birth:</Label>
                <input class="form-control" type="text"  onpaste="return false;" onDrop="return false" ondrag="return false" onselectstart="return false" name="birthdate" id="birthdate" placeholder="Birth Place" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="birthplace">Place of Birth:</label>
                <input class="form-control" type="text"   name="birthplace" id="birthplace" placeholder="Birth Place" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="nationality">Nationality:</label>
                <input class="form-control" type="text"  name="nationality" id="nationality" placeholder="Nationality" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="contact_no">Contact No:</label>
                <input onpaste="return false;" onDrop="return false" ondrag="return false" onselectstart="return false" onkeypress="return numb(event)" class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact No" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required."   required>




            </div>

            <div class="col-lg-6">

                <label for="address">Address:</label>
                <input class="form-control" type="text"  name="house_no" id="house_no" placeholder="House No"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>
                <br><input class="form-control" type="text"  name="street" id="street" placeholder="Street"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>
                <br><input class="form-control" type="text"  name="barangay" id="barangay" placeholder="Barangay"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>
                <br><input class="form-control" type="text"  name="municipality" id="municipality" placeholder="Municipality"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>
                <br><input class="form-control" type="text"  name="zipcode" id="zipcode" placeholder="Zipcode"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>
                <br><input class="form-control" type="text"  name="province" id="province" placeholder="Province"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <br>
                <label for="gender">Gender:</label>
                <label class="radio-inline"  style="margin-left:20px  padding-left: 0%">
                    <input style="height: 60%;width: 60%;" class="form-control" type="radio" name="gender" id="optmale" value="Male" checked required>
                    Male
                </label>
                <label class="radio-inline"  style="margin-left:20px; padding-left: 0%">
                    <input style="height: 60%;width: 60%;" class="form-control" type="radio" name="gender" id="optfemale" value="Female" required>Female
                </label>
                <br>
                <br>
                <label for="civil_status">Civil Status:</label>
                <label class="radio-inline"  style=" margin-left:20px; padding-left: 1% ">
                    <input style="height: 70%;width: 70%;" class="form-control" type="radio" name="civil_status" id="optsingle" value="single" checked required >Single
                </label>
                <label class="radio-inline"  style=" margin-left:20px;  padding-left: 1%">
                    <input style="height: 70%;width: 70%;" class="form-control" type="radio" name="civil_status" id="optmarried" value="married" required >Married
                </label>

            </div>
        </div>
    </div>
    <!---->
    <div class="tab-pane fade" id="family-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
        <div class="row">
            <div class="col-lg-6">

                <label for="father_fullname">Father's name:</label>
                <input class="form-control" type="text" name="father_fullname" id="father_fullname" placeholder="Fullname of Father"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="father_occupation">Occupation:</label>
                <input class="form-control" type="text" name="father_occupation" id="father_occupation" placeholder="Occupation"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="f_contact_no">Contact No:</label>
                <input class="form-control" type="text" onpaste="return false;" onDrop="return false" ondrag="return false" onselectstart="return false" onkeypress="return numb(event)" name="f_contact_no" id="f_contact_no" placeholder="Contact no"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>


                <label for="mother_fullname">Mother's name:</label>
                <input class="form-control" type="text" name="mother_fullname" id="mother_fullname" placeholder="Fullname of Mother"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="mother_occupation">Occupation:</label>
                <input class="form-control" type="text" name="mother_occupation" id="mother_occupation" placeholder="Occupation"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="m_contact_no">Contact No:</label>
                <input class="form-control" type="text" onpaste="return false;" onDrop="return false" ondrag="return false" onselectstart="return false" onkeypress="return numb(event)" name="m_contact_no" id="m_contact_no" placeholder="Contact no"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="guardian_name">Guardian's name:</label>
                <input class="form-control" type="text" name="guardian_name" id="guardian_name" placeholder="Fullname of Mother"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>




            </div>

            <div class="col-lg-6">
                <label for="guardian_contact_no">Guardian's Contact No:</label>
                <input class="form-control" type="text" onpaste="return false;" onDrop="return false" ondrag="return false" onselectstart="return false" onkeypress="return numb(event)" name="guardian_contact_no" id="guardian_contact_no" placeholder="Contact no"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="guardian_address">Guardian's Address:</label>
                <input class="form-control" type="text"  name="guardian_address" id="guardian_address" placeholder="Address"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>


                <label for="ptbcioe">Person to contacted in case of Emergency:</label>
                <input class="form-control" type="text" name="ptbcioe" id="ptbcioe" placeholder="Ex: Fullname of Mother, Aunt, Cousin"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="ptbcioe_contact_no">Contact No:</label>
                <input class="form-control" type="text" onpaste="return false;" onDrop="return false" ondrag="return false" onselectstart="return false" onkeypress="return numb(event)" name="ptbcioe_contact_no" id="ptbcioe_contact_no" placeholder="Contact no"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required."required>

                <label for="ptbcioe_address">Address:</label>
                <input class="form-control" type="text"  name="ptbcioe_address" id="ptbcioe_address" placeholder="Address"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="ptbcioe_relation">Relation:</label>
                <input class="form-control" type="text"  name="ptbcioe_relation" id="ptbcioe_relation" placeholder="Ex:Mother,Aunt,Cousin"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>


            </div>

        </div>
    </div>

    <div class="tab-pane fade" id="educational-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
        <div class="row">
            <div class="col-lg-12">

                <label for="elementary">Elementary School:</label>
                <input class="form-control" type="text" name="elementary" id="elementary" placeholder="Elementary School"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="elementary_grad">Year Graduated:</label>
                <input class="form-control" type="text" name="elementary_grad" id="elementary_grad" placeholder="1941"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="highschool">High School:</label>
                <input class="form-control" type="text" name="highschool" id="highschool" placeholder="Elementary School"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="highschool_grad">Year Graduated:</label>
                <input class="form-control" type="text" name="highschool_grad" id="highschool_grad" placeholder="1941"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>


                <label for="chckcollege">
                    <input type="checkbox" name="chckcollege" id="chckcollege" value="1" checked onclick=""> I was not enrolled in college before
                </label>

<br>
                <label for="college">College:</label>
                <input class="form-control" type="text" name="college" id="college" placeholder="College"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="college_grad">Year Graduated:</label>
                <input class="form-control" type="text" name="college_grad" id="college_grad" placeholder="1941"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

            </div>
        </div>
    </div>

     <!-- <div class="tab-pane fade" id="family-background" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">-->


    <div class="tab-pane fade" id="login-info" style="border-bottom:1px solid #d5d4d4;border-right:1px solid #d5d4d4;border-left:1px solid #d5d4d4;padding:15px;">
        <div class="row">
            <div class="col-lg-12">

                <label for="email">Email Address:</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                <label for="username" >User Name:</label> <span class="alert-danger" name="checkusername" id="checkusername"></span>
                <input class="form-control" type="text" name="username" id="username" onchange="checkusername(this.value)" placeholder="user name" title="Item code is required." required>
                                        <span id="pass">
                                      <label for="password">Password:</label>
                                      <input class="form-control" type="password" name="password" id="password" placeholder="password"data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>

                                      <label for="confirm_password">Confirm Password:</label>
                                      <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Item code is required." required>
                                        </span>
            </div>
        </div>
    </div>

</div>
</div><!--form-group-->
</div>
</div>
</form>


<div class="modal-footer">
    <button id="btn-save" type="button" onclick="return validations();" class="btn btn-success">Save</button>
    <button id="btn-close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>






<?php include('assets/includes/global_js.php'); ?>

<!--- Dropdown / Selectpicker --->
<script src="assets/css/dropdown-enhance/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/plugins/typehead/bootstrap3-typeahead.js"></script>

<!-- iCheck -->
<script src="assets/js/plugins/iCheck/icheck.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>


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
