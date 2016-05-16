<?php


class UserManagement extends MY_Controller {

  

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('student_modal');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('UserManagementModel');
       

    }

    function index(){       
    // the default function that is called if no function is given in the uri
        $this-> load_header_files();
      
        $this->load->view('student_modal');
    }

    

}

?>