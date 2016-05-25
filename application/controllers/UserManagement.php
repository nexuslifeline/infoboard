<?php

class UserManagement extends MY_Controller {

  

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('user_management');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('UserManagementModel');
        $this->load->model('DepartmentManagementModel');
        $this->load->model('CourseManagementModel');
    }

    function index(){       
    // the default function that is called if no function is given in the uri
        $this-> load_header_files();    

        $this->load->view('user_management');

    }

    
    




    function ActionGetUserList(){ //returns returns array of object of products
            echo json_encode($this->UserManagementModel->ReturnUserList());
    }













function ActionSaveUserInfo(){
        $user_m = new  UserManagementModel();
            if(!$user_m->checkEmailIfExist()){
                    if(!$user_m->checkUsernameIfExist()){
                                if($user_m->CreateUser()){
                                    $stat =  'success';
                                    $msg  =  'User successfully created.';
                                    $row  =   $user_m->ReturnLastAffectedRowDetails() ;
                                 }

                    }else{
                            $stat ='error';
                            $msg  ='Username Already Exist!';
                            $row  ='';


                    }
            }else{
                


                            $stat ='error';
                            $msg  ='Email Already Exist!';
                            $row  ='';


            }

        echo json_encode(
                    array(
                            'stat'=> $stat,
                            'msg' => $msg,
                            'row' => $row,
                    )
                );
    }









    function ActionUpdateUserInfo(){
            if($this->UserManagementModel->UpdateUser()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'User successfully updated.',
                        'row'=>$this->UserManagementModel->ReturnLastAffectedRowDetails()

                    )
            );

        }
    }

   function ActionDeleteUserInfo(){
        if($this->UserManagementModel->RemoveUser()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'User successfully removed.',
                    'row'=>$this->UserManagementModel->ReturnLastAffectedRowDetails()

                )
            );

        }
    } 






function CreateForm(){

    $user_m             =       new  UserManagementModel();
    $department_m       =       new  DepartmentManagementModel();
    $course_m           =       new  CourseManagementModel();
    $userdetails        =        $user_m->GetUserDetails();
    $departments         =       $department_m->ReturnDepartmentList();
    $courses             =       $course_m->ReturnCourseList();

    $user_group         = 
    $this->input->post('user_group',TRUE)!='' ?
    $this->input->post('user_group',TRUE) :'';
    $user_account_id   = 
    $this->input->post('user_account_id',TRUE)!='' ? 
    $this->input->post('user_account_id',TRUE) :'';


if($user_group=='ADMINISTRATOR' || $user_group=='DEAN' || $user_group=='FACULTY' || $user_group=='STAFF'){

    if($userdetails){
        foreach ($userdetails as $userdetail) {
            $employee_no        =    $userdetail->employee_no;
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
        
echo ' 
     <h2 style="block:inline;"><i class="fa fa-users"></i> Employee Information</h2>
      <div class="form-group">
        <label>Department </label> 
        <select class="form-control"  name="department_id" id="department_id">
        ';
        foreach($departments as $department){
            if($department->department_id==$department_id)    
            {     
             echo '<option selected value='.$department->department_id.' >'.$department->department_title.'</option>';

            }else{
            
            echo '<option value='.$department->department_id.'>'.$department->department_title.'</option>';
            }
            
        } echo'
        </select>
      </div>

  
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

 <h2 style="block:inline;"><i class="fa fa-users"></i> Personal Information</h2>


    <div class="form-group">
        <label>Birthdate</label>
        <input class="form-control" type="text" name="birthdate" id="birthdate" placeholder="Birthdate"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthdate is required."data-message="Please make sure you enter Birthdate"  value="'.$birthdate.'"  >
    </div>



    <div class="form-group">
        <label>Birthplace</label>
        <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Birthplace"  data-container="body" data-trigger="manual" data-toggle="tooltip" title="Birthplace is required."data-message="Please make sure you enter Birthplace" value="'.$birthplace.'"  >
    </div>

   ';
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
                      <input type="radio" '.$checked2.' name="gender" value="Female"> Female
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




'; // end of echo


    }elseif  ($user_group=='STUDENT') {
        
        

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
        <label>Course </label> 
        <select class="form-control"  name="course_id" id="course_id">
        ';
        foreach($courses as $course){
            if($course->course_id==$course_id)    
            {     
             echo '<option selected value='.$course->course_id.' >'.$course->course_title.'</option>';

            }else{
            
            echo '<option  value='.$course->course_id.' >'.$course->course_title.'</option>';
            }
            
        } echo'
        </select>
      </div>


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
        <label>Department </label> 
        <select class="form-control"  name="department_id" id="department_id">
        ';
        foreach($departments as $department){
            if($department->department_id==$department_id)    
            {     
             echo '<option selected value='.$department->department_id.' >'.$department->department_title.'</option>';

            }else{
            
            echo '<option value='.$department->department_id.'>'.$department->department_title.'</option>';
            }
            
        } echo'
        </select>
      </div>

  
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


























}

?>