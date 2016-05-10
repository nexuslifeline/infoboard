<?php

class Dashboard extends MY_Controller {

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('dashboard');
        $this->load->helper('url');
    


    }

    function index(){       
    // the default function that is called if no function is given in the uri
    	$this-> load_header_files();
        $this->_check_account_not_session();
        $this->load->view('dashboard');
    }

    
  






}

?>