<?php

class Announcements extends MY_Controller {


    private  $error=array(
        'stat'=>'error',
        'msg'=>'Sorry, error has occurred.'
    );


    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor

        parent::__construct('Announcements');
        $this->load->helper('url');
        $this->load->model('announcementmodel');


    }

    function index(){       
    // the default function that is called if no function is given in the uri
    	//$this-> load_header_files();
        //$this->_check_account_not_session();
        $data['departments']=$this->announcementmodel->GetDepartmentList();
        $this->load->view('announcements',$data);
    }

    function PublishAnnouncement(){

        $announce=$this->announcementmodel;
        $data=array(
            'announce_description'=>$this->input->post('announcement')
        );


        if($announce->create( $data )){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'Announcement successfully published.'
                )
            );

        }



    }
  






}

?>