<?php

class Dashboard extends MY_Controller {

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('dashboard');

        //$this->_check_account_not_session();
        $this->load->model('AnnouncementModel');
        $this->load->model('Tasks_model');
        $this->load->model('Taskviewers_model');
        $this->load->model('Dashboard_model');

    }

    function index(){       
    // the default function that is called if no function is given in the uri
    	//$this-> load_header_files();


        //if id=0 no filter on announce id, if criteria is "" no filter on department and announcement, if department_id is 0 no filter on dep id,
        //if show date range is false no filter on published start and end date
        //if posted_user_id is 0 no filter on user id, if end_range_id is 0 no range filter on announce id
        //GetAnnouncementList($id=null,$criteria=null,$department_id=null,$posted_by_user_id=null,$show_date_range=null,$end_range_id=null,$category_id=null)

        $department=$this->session->department_id;
        $user_id=$this->session->user_account_id;
        $user_group_id=$this->session->user_group_id;
        $data['hidden']  = $this->session->user_group_title=='STUDENT' ? 'hidden' : '';

        $data['announcements']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null,1,$user_group_id);
        $data['events']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null,2,$user_group_id);
        $data['news']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null,3,$user_group_id);

        $data['tasks']=$this->Tasks_model->get_task_list(0,$user_id,true);
        $this->load->view('dashboard_view',$data);
    }

    
  
    function transaction($txn){

        $response=array();
        $tasks=$this->Tasks_model;
        $viewers=$this->Taskviewers_model;

        $department=$this->session->department_id;
        $user_id=$this->session->user_account_id;
        $user_group_id=$this->session->user_group_id;


        if($txn=='updater'){
                $last_announce_id=$this->input->get('last_announce_id');
                $last_task_id=$this->input->get('last_task_id');

                //$response['announcements']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,$last_announce_id);
                //GetAnnouncementList($id=null,$criteria=null,$department_id=null,$posted_by_user_id=null,$show_date_range=null,$end_range_id=null)
            //GetAnnouncementList($id=null,$criteria=null,$department_id=null,$posted_by_user_id=null,$show_date_range=null,$end_range_id=null,$category_id=null,$filter_by_exception_group=null)

                $response['announcements']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null,1,$user_group_id);
                $response['events']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null,2,$user_group_id);
                $response['news']=$this->AnnouncementModel->GetAnnouncementList(null,null,$department,null,true,null,3,$user_group_id);
                $response['tasks']=$tasks->get_task_list(0,$user_id,true);
                //$response['group_id']=$user_group_id;
                //$response['announce_id']=$last_announce_id;
                //$response['task_id']=$last_task_id;
                echo json_encode($response);

        }


        if($txn=='marking'){
            $task_id=$this->input->post('task_id');
            $status=$this->input->post('mark');
            $user_id=$this->input->post('user_account_id');

            $viewers->is_accomplished=($status=='1'?1:0);
            if($viewers->modify_where_array(array('task_id'=>$task_id,'user_account_id'=>$user_id))){

                $response['stat']='success';
                $response['msg']='Task successfully mark as '.($status=='1'?'accomplished.':'unaccomplished.');
                $response['task_updated']=$tasks->get_task_list($task_id);
                echo json_encode($response);
            }

        }






        if($txn=='accomplished'){
            // get_task_list($id=0,$user_id=0,$not_accomplished_only=null,$accomplished_only=null)
            $response['data']=$this->Dashboard_model->get_accomplished_task();
            echo json_encode($response);
        }


    }





}

?>