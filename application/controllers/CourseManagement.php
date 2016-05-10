<?php

class CourseManagement extends MY_Controller {

  

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('course_management');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('url');
        $this->load->model('CourseManagementModel');
        

    }

    function index(){

    // the default function that is called if no function is given in the uri
        $this-> load_header_files();
        $this->_check_account_not_session();
        $this->load->view('course_management');
    }

    
  

    function ActionGetCourseList(){
     //returns returns array of object of products
        echo json_encode($this->CourseManagementModel->ReturnCourseList());
    }




    function ActionSaveCourseInfo(){
            if($this->CourseManagementModel->CreateCourse()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Course successfully created.',
                        'row'=>$this->CourseManagementModel->ReturnLastAffectedRowDetails()
                    )
                );

            }
        }


    function ActionUpdateCourseInfo(){
            if($this->CourseManagementModel->UpdateCourse()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Course successfully updated.',
                        'row'=>$this->CourseManagementModel->ReturnLastAffectedRowDetails()

                    )
            );

        }
    }

   function ActionDeleteCourseInfo(){
        if($this->CourseManagementModel->RemoveCourse()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'Course successfully removed.',
                    'row'=>$this->CourseManagementModel->ReturnLastAffectedRowDetails()

                )
            );

        }
    } 

}

?>