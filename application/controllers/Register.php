<?php
<?php

class UserManagement extends MY_Controller {

  

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('user_management');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('UserManagementModel');
       

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
        if($this->UserManagementModel->CreateUser()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'User successfully created.',
                    'row'=>$this->UserManagementModel->ReturnLastAffectedRowDetails()
                )
            );

        }
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



/*

public function upload_file()
{
    $status = "";
    $msg = "";
    $file_element_name = 'userfile';
    
    if ($status != "error")
    {
        $config['upload_path'] = './files/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $file_id = $this->UserManagementModel->CreateUser($data['file_name']);
            if($file_id)
            {
                $status = "success";
                $msg = "File successfully uploaded";
            }
            else
            {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        }
        @unlink($_FILES[$file_element_name]);
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
}
*/



function default(){
    
        $u = new UserManagementModel();
        $u->defaultSetting();
}



}

?>