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
    }

    function index()
    {
        $this->load->view('tasks_view');
    }


    function transaction($txn){
        if($txn=='get'){
            echo json_encode(
                    array('data'=>$this->tasks_model->get_task_list()
                )
            );
        }
    }





}


?>