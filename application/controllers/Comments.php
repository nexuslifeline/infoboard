<?php

class Comments extends MY_Controller {

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('dashboard');
        $this->load->model('Tasks_model');
        $this->load->model('comments_model');
        $this->load->model('File_archive_model');

    }

    function index(){

        $task_id=$this->input->get('task_id');
        $user_account_id=$this->session->user_account_id;

        //($comment_id=null,$task_id=null,$user_account_id=null)

        $data['task']=$this->Tasks_model->get_task_list($task_id);
        $data['comments']=$this->comments_model->get_comments(null,$task_id,null);
        $data['files']=$this->File_archive_model->get_file_list(null,$task_id);
        $this->load->view('comments_view',$data);

    }


    function transaction($txn){
        $m_comments=$this->comments_model;


        $user_account_id=$this->session->user_account_id;
        $message=$this->input->post('message');

        if($txn=='messaging'){

            $task_id=$this->input->post('task_id');

            $m_comments->comments=$message;
            $m_comments->task_id=$task_id;
            $m_comments->user_account_id=$user_account_id;

            if($m_comments->save()){

                $response['stat']="success";
                $response['msg']="Message successfully posted.";
                $response['posted_id']=$m_comments->last_insert_id();

                echo json_encode($response);
            }
        }


        if($txn=='messages'){

            $task_id=$this->input->get('task_id');
            $response['comments']=$m_comments->get_comments(null,$task_id,null);
            $response['files']=$this->File_archive_model->get_file_list(null,$task_id);
            echo json_encode($response);
        }


        if($txn=='upload'){
                $data=array();
                $files=array();
                $directory='images/files/';
                $m_files=$this->File_archive_model;


                foreach($_FILES as $file){
                    $server_file_name=uniqid('');
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_path=$directory.$server_file_name.'.'.$extension;
                    $orig_file_name=$file['name'];

                    if(move_uploaded_file($file['tmp_name'],$file_path)){
                        //echo json_encode(array('msg'=>'success'.$extension));

                        $m_files->file_directory=$file_path;
                        $m_files->file_name=$orig_file_name;
                        $m_files->task_id=$this->input->get('task_id');
                        $m_files->user_account_id=$this->session->user_account_id;

                        if($m_files->save()){
                            $files[]=$orig_file_name;
                        }

                    }

                }


                $response['stat']="success";
                $response['msg']="File successfully uploaded.";
                //$response['file_list']=$files;
                echo json_encode($response);


        }



    }







}

?>
