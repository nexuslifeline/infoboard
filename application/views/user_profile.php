<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Infoboard | User Profile </title>


     <?php include('assets/includes/global_css.html'); ?>

    <!-- Checkbox / Radio -->
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">


    <!-- Dropdown / Select picker-->
    <link href="assets/css/dropdown-enhance/dist/css/bootstrap-select.min.css" rel="stylesheet">

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

        [contenteditable="true"]{
            border: 1px solid black;
            min-height: 180px;
            max-height: 180px;
            margin: 10px;
        }

        [contenteditable="true"]:active,
        [contenteditable="true"]:focus{
            border:3px solid #F5C116;
            outline:none;
            background: white;
        }


    </style>
</head>

<body>

<div id="wrapper">
    <!-- /left navigation -->
    <?php $this->load->view('templates/left_navigation.php'); ?>
    <!-- /left navigation -->



    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <!-- /top navigation -->
            <?php $this->load->view('templates/top_navigation.php'); ?>
            <!-- /top navigation -->
        </div>



        <div class="wrapper wrapper-content">


 <div class="row">
            <div class="col-lg-12">

                <div class="panel-group" id="accordion">
                    <div class=" panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-laptop"></i> Upload Profile Picture</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">

<?php

//print_r($results);

if  ($this->session->userdata("user_group_title")=='STUDENT') {
    if($results){
        foreach ($results as $result) {
            $no        =   $result->student_no;
            $id        =   $result->course_id;
            $fname     =   $result->stud_fname;
            $mname     =   $result->stud_mname;
            $lname     =   $result->stud_lname;
     
        }

    }else{

            $no        =    '';
            $id        =    '';
            $fname     =    '';
            $mname     =    '';
            $lname     =    '';
          

    }
}else{

  if($results){
        foreach ($results as $result) {

            $no        =    $result->employee_no;
            $id        =    $result->department_id;
            $fname     =    $result->emp_fname;
            $mname     =    $result->emp_mname;
            $lname     =    $result->emp_lname;
     
        }

    }else{

            $no        =    '';
            $id        =    '';
            $fname     =    '';
            $mname     =    '';
            $lname     =    '';
          

    }



}

?>
<img src='<?php echo $result->user_profile?>' id='user_picture' height='200px' width='200px'>

<input type="file" name="picture_upload" id="picture_upload">
<div class="hidden progress progress-striped active m-b-sm">
<div style="width: 50%;" class="progress-bar"></div>
</div>

      

                            </div>
                        </div>
                    </div>




                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-laptop"></i> User Profile </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="panel-body">

                               


<form id="frm_info">
        <h2 style="block:inline;"><i class="fa fa-users"></i> Login Details  </h2>
        <div class="form-group">
            <label>Username * </label>
            <input class="form-control " value="<?php echo $result->username ;?>"  type="text" name="username" id="username" placeholder="Username" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Username is required." data-message="Please make sure you enter Username." required="" readonly>
        </div>

          <div class="form-group">
            <label>Email Address * </label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Email Address is required." data-message="Please make sure you enter Email Address." required="" readonly  value="<?php echo $result->email ;?>">
        </div>

         <div class="form-group">
            <label>Re-Type Password * </label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password " data-container="body" data-trigger="manual" data-toggle="tooltip" title="Password is required." data-message="Please make sure you enter Password." required="" readonly value="<?php echo $result->password ;?>">
        </div>

       <div class="form-group">
            <label>Confirm Password * </label>
            <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password " data-container="body" data-trigger="manual" data-toggle="tooltip" title="Password is required." data-message="Please make sure you enter Confirm Password." required="" readonly
            value="<?php echo $result->password ;?>">
        </div>






<?php

if($this->session->userdata("user_group_title")!='STUDENT'){
echo '
<h2 style="block:inline;"><i class="fa fa-users"></i> Personal Information</h2><div class="form-group">
    <input type="hidden" name="employee_no" id="employee_no"  required="" value="'.$no.'" >
    <input type="hidden" name="department_id" id="department_id"  required="" value="'.$id.'" >
    <div class="form-group">
        <label>Firstname</label>
        <input class="form-control" type="text" name="emp_fname" id="emp_fname" placeholder="Firstname" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Firstname is required." data-message="Please make sure you enter Firstname."  readonly required="" value="'.$fname.'" >
    </div>



    <div class="form-group">
        <label>Middlename</label>
        <input class="form-control" type="text" name="emp_mname" id="emp_mname" placeholder="Middlename" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Middlename is required." data-message="Please make sure you enter Middlename."  readonly required="" value="'.$mname.'">
    </div>



    <div class="form-group">
        <label>Lastname</label>
        <input class="form-control" type="text" name="emp_lname" id="emp_lname" placeholder="Lastname" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Lastname is required." data-message="Please make sure you enter Lastname."   readonly required="" value="'.$lname.'">
    </div>

';

}else{
echo '
<h2 style="block:inline;"><i class="fa fa-users"></i> Personal Information</h2><div class="form-group">
    <input type="hidden" name="student_no" id="student_no"  required="" value="'.$no.'" >
    <input type="hidden" name="course_id" id="course_id"  required="" value="'.$id.'" >
    <div class="form-group">
        <label>Firstname</label>
        <input class="form-control" type="text" name="stud_fname" id="stud_fname" placeholder="Firstname" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Firstname is required." data-message="Please make sure you enter Firstname."  readonly required="" value="'.$fname.'" >
    </div>



    <div class="form-group">
        <label>Middlename</label>
        <input class="form-control" type="text" name="stud_mname" id="stud_mname" placeholder="Middlename" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Middlename is required." data-message="Please make sure you enter Middlename."  readonly required="" value="'.$mname.'">
    </div>



    <div class="form-group">
        <label>Lastname</label>
        <input class="form-control" type="text" name="stud_lname" id="stud_lname" placeholder="Lastname" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Lastname is required." data-message="Please make sure you enter Lastname."  readonly required="" value="'.$lname.'">
    </div>

';

}




?>                                        


    <div class="form-group">
        <label>Contact No</label>
        <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact #" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Contact # is required." data-message="Please make sure you enter Contact #." value="<?php echo $result->contact_no ;?>"  readonly>
    </div>


 
  <label>Gender</label>
  <input type="radio" checked="" name="gender" value="Male"> Male 
  <input type="radio" name="gender" value="Female"> Female
</div>


    <div class="form-group">
        <label>Birthdate</label>
        <input class="form-control" type="text" name="birthdate" id="birthdate" placeholder="Birthdate" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthdate is required." data-message="Please make sure you enter Birthdate" value="<?php echo $result->birthdate ;?>"  readonly>
    </div>



    <div class="form-group">
        <label>Birthplace</label>
        <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Birthplace" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthplace is required." data-message="Please make sure you enter Birthplace" value="<?php echo $result->birthplace ;?>"  readonly>
    </div>


    <div class="form-group">
        <label>Nationality</label>
        <input class="form-control" type="text" name="nationality" id="nationality" placeholder="Nationality" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Nationality is required." data-message="Please make sure you enter Nationality" value="<?php echo $result->nationality ;?>"  readonly>
    </div>
    <div class="form-group">
        <label>Civil Status</label>
        <input class="form-control" type="text" name="civil_status" id="civil_status" placeholder="Civil Status" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Civil status is required." data-message="Please make sure you enter Civil status" value="<?php echo $result->civil_status ;?>"  readonly>
    </div>

   <h2 style="block:inline;"><i class="fa fa-users"></i> Location Details </h2>


      <div class="form-group">
        <label>House No . </label>
        <input class="form-control" type="text" name="house_no" id="house_no" placeholder="House no." data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required." data-message="Please make sure you enter House # ." value="<?php echo $result->house_no ;?>"  readonly>
    </div>


      <div class="form-group">
        <label>Street </label>
        <input class="form-control" type="text" name="street" id="street" placeholder="Street" data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required." data-message="Please make sure you enter Street " value="<?php echo $result->street ;?>"  readonly>
    </div>



      <div class="form-group">
        <label> Barangay </label>
        <input class="form-control" type="text" name="barangay" id="barangay" placeholder="Barangay" data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required." data-message="Please make sure you enter Barangay " value="<?php echo $result->barangay ;?>"  readonly>
    </div>

    
    <div class="form-group">
        <label>Municipality</label>
        <input class="form-control" type="text" name="municipality" id="municipality" placeholder="Municipality" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Municipality is required." data-message="Please make sure you enter Municipality " value="<?php echo $result->municipality ;?>"  readonly>
    </div>



    <div class="form-group">
        <label>Zipcode</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" placeholder="Zipcode" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Zipcode is required." data-message="Please make sure you enter Zipcode" value="<?php echo $result->zipcode ;?>"  readonly>
    </div>


    <div class="form-group">
        <label>Province</label>
        <input class="form-control" type="text" name="province" id="province" placeholder="Province" data-container="body" data-trigger="manual" data-toggle="tooltip" title="Province is required." data-message="Please make sure you enter Province" value="<?php echo $result->province ;?>"  readonly>
    </div>



</form>



 <button id="edit_login" type="button" data-btn='0' class="btn btn-primary"><i class="fa fa-save"></i> <u>E</u>dit  Details </button>

                            </div>
                        </div>
                    </div>


                   
                </div>






            </div>
        </div>




















































                       







        <!-- /footer -->
        <?php $this->load->view('templates/footer'); ?>
        <!-- /footer -->


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


<!--Custom JS-->
<script src="assets/js/defined/user.profile.event.handlers.js"></script>

<!-- Summernote -->
<script src="assets/js/plugins/summernote/summernote.min.js"></script>






</body>

</html>
