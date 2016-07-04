<?php

class Tasks extends MY_Controller{

    private $error = array(
        'stat' => 'error',
        'msg' => 'Sorry, error has occurred.'
    );


    function __construct()
    {
        // Call the Model constructor
        parent::__construct('Tasks');
        //$this->_check_account_not_session();
        $this->load->model('tasks_model');
        $this->load->model('taskviewers_model');

    }

    function index()
    {
        $data['departments']=$this->tasks_model->get_department_list();
        $data['employees']=$this->tasks_model->get_employee_list();
        $this->load->view('tasks_view',$data);
    }


    function transaction($txn){
        $task=$this->tasks_model;
        $viewer=$this->taskviewers_model;

        //*************************************************************************************************************************
        //returns list task in JSON format
        if($txn=='get'){
            echo json_encode(
                    array('data'=>$task->get_task_list()
                )
            );
        }

        //*************************************************************************************************************************
        //post task and returns status and the last inserted data
        if($txn=='create'){


                    $this->db->trans_start();



                    //task table
                    $task->task_title=$this->input->post('task_title');
                    $task->task_description=$this->input->post('task_description');
                    $task->submission_deadline=date('Y-m-d',strtotime($this->input->post('submission_deadline')));
                    $task->posted_by_user=$this->session->user_account_id;
                    $task->save();

                    $task_id=$task->last_insert_id();

                    //task viewers thru department
                    $departments=$this->input->post('departments');
                    if(count($departments)>0){
                        foreach($departments as $row){
                            $viewer->insert_users_list($task_id,$row);
                        }
                    }


                    //task viewers thru employees/users
                    $employees=$this->input->post('employees');
                    if(count($employees)>0){
                        foreach($employees as $employee){
                            $viewer->task_id=$task_id;
                            $viewer->user_account_id=$employee;
                            $viewer->viewer_type='USER_VIEW';
                            $viewer->save();
                        }
                    }



                    $this->db->trans_complete();


                    if( $this->db->trans_status()===TRUE ){
                        echo json_encode(
                            array(
                                'stat'=>'success',
                                'msg'=>'Task successfully published.',
                                'row_added'=>$task->get_task_list($task_id)
                            )
                        );


                    }else{
                        die(json_encode($this->error));
                    }




        }
        //*************************************************************************************************************************

        //*************************************************************************************************************************
        //post task and returns status and the last inserted data
        if($txn=='modify'){


            $this->db->trans_start();



            //task table
            $task_id=$this->input->post('task_id');
            $task->task_title=$this->input->post('task_title');
            $task->task_description=$this->input->post('task_description');
            $task->submission_deadline=date('Y-m-d',strtotime($this->input->post('submission_deadline')));
            $task->posted_by_user=$this->session->user_account_id;
            $task->modify($task_id);



            //task viewers thru department
            $viewer->delete_using_fk($task_id);

            $departments=$this->input->post('departments');
            if(count($departments)>0){
                foreach($departments as $row){
                    $viewer->insert_users_list($task_id,$row);
                }
            }


            //task viewers thru employees/users
            $employees=$this->input->post('employees');
            if(count($employees)>0){
                foreach($employees as $employee){
                    $viewer->task_id=$task_id;
                    $viewer->user_account_id=$employee;
                    $viewer->viewer_type='USER_VIEW';
                    $viewer->save();
                }
            }



            $this->db->trans_complete();


            if( $this->db->trans_status()===TRUE ){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Task successfully updated.',
                        'row_updated'=>$task->get_task_list($task_id)
                    )
                );


            }else{
                die(json_encode($this->error));
            }




        }



        if($txn=='delete'){
            $task_id=$this->input->post('task_id');

            $task->is_deleted=1;
            if($task->modify($task_id)){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Task successfully deleted.'
                    )
                );
            }

        }



        if($txn=='completed'){
            $task_id=$this->input->post('task_id');
            $task->is_completed=1;
            if($task->modify($task_id)){
                $response['stat']='success';
                $response['msg']='Task successfully mark as completed.';
                echo json_encode($response);
            }
        }



    }





}


?>