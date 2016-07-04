<?php

class UserProfile extends MY_Controller {

  

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('user_profile');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('UserManagementModel');
        $this->load->model('DepartmentManagementModel');
        $this->load->model('CourseManagementModel');
    }

    function index(){       

        $this->_check_account_not_session();
$u  = new UserManagementModel();

$user_account_id   = $this->session->userdata('user_account_id');

$user_group   = $this->session->userdata('user_group_title');

$data['results'] = $u->GetUserDetails($user_account_id,$user_group);


$this->load->view('user_profile',$data);





    }

      function ActionUpdateProfileInfo(){

            if($this->UserManagementModel->UpdateUser()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'User successfully updated.',
                        

                    )
            );

        }
    }
  



























function UpdateForm(){

    $user_m             =       new  UserManagementModel();
    $department_m       =       new  DepartmentManagementModel();
    $course_m           =       new  CourseManagementModel();

    $departments        =       $department_m->ReturnDepartmentList();
    $courses            =       $course_m->ReturnCourseList();

    $user_group         =       $this->session->userdata('user_group_title');
    $user_account_id    =       $this->session->userdata('user_account_id');

    $userdetails        =       $user_m->GetUserDetails($user_account_id,$user_group);



if($user_group=='STUDENT') {
        
        

    if($userdetails){
        foreach ($userdetails as $userdetail) {
            $student_no    =    $userdetail->student_no;
            $stud_fname     =   $userdetail->stud_fname;
            $course_id     =    $userdetail->course_id;
            $stud_mname     =   $userdetail->stud_mname;
            $stud_lname     =   $userdetail->stud_lname;
            $contact_no    =    $userdetail->contact_no;
            $house_no      =    $userdetail->house_no;
            $street        =    $userdetail->street;
            $barangay      =    $userdetail->barangay;
            $municipality  =    $userdetail->municipality;
            $zipcode       =    $userdetail->zipcode;
            $province      =    $userdetail->province;
            $birthdate     =    $userdetail->birthdate;
            $birthplace    =    $userdetail->birthplace;
            $nationality   =    $userdetail->nationality;
            $gender        =    $userdetail->gender;
            $civil_status  =    $userdetail->civil_status;
        }

    }else{

            $student_no    =    '';
            $stud_fname     =    '';
            $course_id =    '';
            $stud_mname     =    '';
            $stud_lname     =    '';
            $contact_no    =    '';
            $house_no      =    '';
            $street        =    '';
            $barangay      =    '';
            $municipality  =    '';
            $zipcode       =    '';
            $province      =    '';
            $birthdate     =    '';
            $birthplace    =    '';
            $nationality   =    '';
            $gender        =    '';
            $civil_status  =    '';

    }
         
echo ' 
   <h2 style="block:inline;"><i class="fa fa-users"></i> Personal Information</h2>
  


    <div class="form-group">
        <label>Student No</label>
        <input class="form-control" type="text" name="student_no" id="student_no" placeholder="student no"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Student no is required."data-message="Please make sure you enter Student No." required value="'.$student_no.'" >
    </div>


    <div class="form-group">
        <label>Firstname</label>
        <input class="form-control" type="text" name="stud_fname" id="stud_fname" placeholder="Firstname"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Firstname is required."data-message="Please make sure you enter Firstname." required value="'.$stud_fname.'" >
    </div>



    <div class="form-group">
        <label>Middlename</label>
        <input class="form-control" type="text" name="stud_mname" id="stud_mname" placeholder="Middlename"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Middlename is required."data-message="Please make sure you enter Middlename." required  value="'.$stud_mname.'">
    </div>



    <div class="form-group">
        <label>Lastname</label>
        <input class="form-control" type="text" name="stud_lname" id="stud_lname" placeholder="Lastname"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Lastname is required."data-message="Please make sure you enter Lastname." required value="'.$stud_lname.'" >
    </div>


 
    <div class="form-group">
        <label>Contact No</label>
        <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact #"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Contact # is required."data-message="Please make sure you enter Contact #." value="'.$contact_no.'"  >
    </div>

 <div class="form-group">
        <label>Birthdate</label>
        <input class="form-control" type="text" name="birthdate" id="birthdate" placeholder="Birthdate"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthdate is required."data-message="Please make sure you enter Birthdate"  value="'.$birthdate.'"  >
    </div>



    <div class="form-group">
        <label>Birthplace</label>
        <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Birthplace"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthplace is required."data-message="Please make sure you enter Birthplace" value="'.$birthplace.'"  >
    </div>';
                             if($gender=='Female'){

                            $checked1  = '';
                            $checked2  = 'checked';


                            }else {

                            $checked1  = 'checked';
                            $checked2  = '';



                            }
                         echo '<div class="form-group">
                      <label>Gender</label>
                      <input type="radio" '.$checked1.' name="gender" checked value="Male"> Male 
                      <input type="radio"  '.$checked2.' name="gender" value="Female"> Female
                    </div>


    <div class="form-group">
        <label>Nationality</label>
        <input class="form-control" type="text" name="nationality" id="nationality" placeholder="Nationality"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Nationality is required."data-message="Please make sure you enter Nationality" value="'.$nationality.'"   >
    </div>
    <div class="form-group">
        <label>Civil Status</label>
        <input class="form-control" type="text" name="civil_status" id="civil_status" placeholder="Civil Status"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Civil status is required."data-message="Please make sure you enter Civil status" value="'.$civil_status.'"   >
    </div>

   <h2 style="block:inline;"><i class="fa fa-users"></i> Location Details </h2>
      <div class="form-group">
        <label>House No . </label>
        <input class="form-control" type="text" name="house_no" id="house_no" placeholder="House no."  data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required."data-message="Please make sure you enter House # ." value="'.$house_no.'"   >
    </div>



      <div class="form-group">
        <label>Street </label>
        <input class="form-control" type="text" name="street" id="street" placeholder="Street"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required."data-message="Please make sure you enter Street "  value="'.$street.'"  >
    </div>



      <div class="form-group">
        <label> Barangay </label>
        <input class="form-control" type="text" name="barangay" id="barangay" placeholder="Barangay"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required."data-message="Please make sure you enter Barangay "  value="'.$barangay.'"  >
    </div>

    
    <div class="form-group">
        <label>Municipality</label>
        <input class="form-control" type="text" name="municipality" id="municipality" placeholder="Municipality"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Municipality is required."data-message="Please make sure you enter Municipality "  value="'.$municipality.'"  >
    </div>



    <div class="form-group">
        <label>Zipcode</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" placeholder="Zipcode"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Zipcode is required."data-message="Please make sure you enter Zipcode" value="'.$zipcode.'"  >
    </div>


    <div class="form-group">
        <label>Province</label>
        <input class="form-control" type="text" name="province" id="province" placeholder="Province"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Province is required."data-message="Please make sure you enter Province" value="'.$province.'"  >
    </div>


   

';// end of echo

    }else{
 
    if($userdetails){
        foreach ($userdetails as $userdetail) {
            $employee_no       =    $userdetail->employee_no;
            $emp_fname     =    $userdetail->emp_fname;
            $department_id =    $userdetail->department_id;
            $emp_mname     =    $userdetail->emp_mname;
            $emp_lname     =    $userdetail->emp_lname;
            $contact_no    =    $userdetail->contact_no;
            $house_no      =    $userdetail->house_no;
            $street        =    $userdetail->street;
            $barangay      =    $userdetail->barangay;
            $municipality  =    $userdetail->municipality;
            $zipcode       =    $userdetail->zipcode;
            $province      =    $userdetail->province;
            $birthdate     =    $userdetail->birthdate;
            $birthplace    =    $userdetail->birthplace;
            $nationality   =    $userdetail->nationality;
            $gender        =    $userdetail->gender;
            $civil_status  =    $userdetail->civil_status;
        }

    }else{

            $employee_no        =    '';
            $emp_fname     =    '';
            $department_id =    '';
            $emp_mname     =    '';
            $emp_lname     =    '';
            $contact_no    =    '';
            $house_no      =    '';
            $street        =    '';
            $barangay      =    '';
            $municipality  =    '';
            $zipcode       =    '';
            $province      =    '';
            $birthdate     =    '';
            $birthplace    =    '';
            $nationality   =    '';
            $gender        =    '';
            $civil_status  =    '';

    }
        
echo'<h2 style="block:inline;"><i class="fa fa-users"></i> Employee Information</h2>
   <div class="form-group">
        <label>Emploeyee No</label>
        <input class="form-control" type="text" name="employee_no" id="employee_no" placeholder="Employee no"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Employee no is required."data-message="Please make sure you enter Employee no." required value="'.$employee_no.'" >
    </div>


    <div class="form-group">
        <label>Firstname</label>
        <input class="form-control" type="text" name="emp_fname" id="emp_fname" placeholder="Firstname"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Firstname is required."data-message="Please make sure you enter Firstname." required value="'.$emp_fname.'" >
    </div>



    <div class="form-group">
        <label>Middlename</label>
        <input class="form-control" type="text" name="emp_mname" id="emp_mname" placeholder="Middlename"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Middlename is required."data-message="Please make sure you enter Middlename." required  value="'.$emp_mname.'">
    </div>



    <div class="form-group">
        <label>Lastname</label>
        <input class="form-control" type="text" name="emp_lname" id="emp_lname" placeholder="Lastname"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Lastname is required."data-message="Please make sure you enter Lastname." required value="'.$emp_lname.'" >
    </div>



    <div class="form-group">
        <label>Contact No</label>
        <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact #"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Contact # is required."data-message="Please make sure you enter Contact #." value="'.$contact_no.'"  >
    </div>

 <h2 style="block:inline;"><i class="fa fa-users"></i> Personal Information</h2>';
                             if($gender=='Female'){

                            $checked1  = '';
                            $checked2  = 'checked';


                            }else {

                            $checked1  = 'checked';
                            $checked2  = '';



                            }
                         echo '<div class="form-group">
                      <label>Gender</label>
                      <input type="radio" '.$checked1.' name="gender" checked value="Male"> Male 
                      <input type="radio"  '.$checked2.' name="gender" value="Female"> Female
                    </div>


    <div class="form-group">
        <label>Birthdate</label>
        <input class="form-control" type="text" name="birthdate" id="birthdate" placeholder="Birthdate"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthdate is required."data-message="Please make sure you enter Birthdate"  value="'.$birthdate.'"  >
    </div>



    <div class="form-group">
        <label>Birthplace</label>
        <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Birthplace"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthplace is required."data-message="Please make sure you enter Birthplace" value="'.$birthplace.'"  >
    </div>


    <div class="form-group">
        <label>Nationality</label>
        <input class="form-control" type="text" name="nationality" id="nationality" placeholder="Nationality"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Nationality is required."data-message="Please make sure you enter Nationality" value="'.$nationality.'"   >
    </div>
    <div class="form-group">
        <label>Civil Status</label>
        <input class="form-control" type="text" name="civil_status" id="civil_status" placeholder="Civil Status"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Civil status is required."data-message="Please make sure you enter Civil status" value="'.$civil_status.'"   >
    </div>

   <h2 style="block:inline;"><i class="fa fa-users"></i> Location Details </h2>


      <div class="form-group">
        <label>House No . </label>
        <input class="form-control" type="text" name="house_no" id="house_no" placeholder="House no."  data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required."data-message="Please make sure you enter House # ." value="'.$house_no.'"   >
    </div>


      <div class="form-group">
        <label>Street </label>
        <input class="form-control" type="text" name="street" id="street" placeholder="Street"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required."data-message="Please make sure you enter Street "  value="'.$street.'"  >
    </div>



      <div class="form-group">
        <label> Barangay </label>
        <input class="form-control" type="text" name="barangay" id="barangay" placeholder="Barangay"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="House #  is required."data-message="Please make sure you enter Barangay "  value="'.$barangay.'"  >
    </div>

    
    <div class="form-group">
        <label>Municipality</label>
        <input class="form-control" type="text" name="municipality" id="municipality" placeholder="Municipality"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Municipality is required."data-message="Please make sure you enter Municipality "  value="'.$municipality.'"  >
    </div>



    <div class="form-group">
        <label>Zipcode</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" placeholder="Zipcode"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Zipcode is required."data-message="Please make sure you enter Zipcode" value="'.$zipcode.'"  >
    </div>


    <div class="form-group">
        <label>Province</label>
        <input class="form-control" type="text" name="province" id="province" placeholder="Province"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Province is required."data-message="Please make sure you enter Province" value="'.$province.'"  >
    </div>


';// end of echo



     }


} // end create form

























 function UploadProflie(){

      $u  = new  UserManagementModel();
        
        $user_id      = $this->session->userdata('user_account_id');
        $user_group_title      = $this->session->userdata('user_group_title');
     
        


        $allowed = array('png', 'jpg', 'jpeg','bmp');

        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($extension), $allowed)){
                die ('{"status":"error"}');
            }


           
            $upload_path='images/users/'.md5(uniqid()).'.'.$extension ;
            if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path)){

              $u->updateProfile($user_id,$user_group_title,$upload_path);

                $this->session->user_profile  = $upload_path;
                echo $upload_path;
                exit;
            }
        }

        die ('{"status":"error"}');
    }






}

?>