<?php

class Dashboard extends MY_Controller {

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('dashboard');

        $this->_check_account_not_session();
        $this->load->model('AnnouncementModel');
        $this->load->model('Tasks_model');
        $this->load->model('Taskviewers_model');

    }

    function index(){       
    // the default function that is called if no function is given in the uri
    	//$this-> load_header_files();


        //if id=0 no filter on announce id, if criteria is "" no filter on department and announcement, if department_id is 0 no filter on dep id,
        //if show date range is false no filter on published start and end date
        //if posted_user_id is 0 no filter on user id, if end_range_id is 0 no range filter on announce id
        //GetAnnouncementList($id=0,$criteria="",$department_id=0,$posted_by_user_id=0,$show_date_range=false,end_range_id=0)

        $department=$this->session->department_id;
        $user_id=$this->session->user_account_id;

        $data['announcements']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true);
        $data['tasks']=$this->Tasks_model->get_task_list(0,$user_id,true);
        $this->load->view('dashboard_view',$data);
    }

    
  
    function transaction($txn){

        $response=array();
        $tasks=$this->Tasks_model;
        $viewers=$this->Taskviewers_model;

        $department=$this->session->department_id;
        $user_id=$this->session->user_account_id;


        if($txn=='updater'){
                $last_announce_id=$this->input->get('last_announce_id');
                $last_task_id=$this->input->get('last_task_id');

                //$response['announcements']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,$last_announce_id);

                $response['announcements']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null);
                $response['tasks']=$tasks->get_task_list(0,$user_id,true);
                //$response['announce_id']=$last_announce_id;
                //$response['task_id']=$last_task_id;
                echo json_encode($response);

        }


        if($txn=='marking'){
            $task_id=$this->input->post('task_id');

            $viewers->is_accomplished=1;
            if($viewers->modify_where_array(array('task_id'=>$task_id,'user_account_id'=>$user_id))){

                $response['stat']='success';
                $response['msg']='Task successfully mark as accomplished.';

                echo json_encode($response);
            }

        }



    }





}

?>