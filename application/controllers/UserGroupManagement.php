<?php

class UserGroupManagement extends MY_Controller {

 


    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct(' user_group_management');
        $this->load->helper('url');
        $this->load->model('UserGroupManagementModel');
    
   



    }

    function index(){    

     $a  = new UserGroupManagementModel();
     //session_destroy();
     $data['item'] = $a->ReturnUserGroupList();
    // the default function that is called if no function is given in the uri
        $this-> load_header_files();
        $this->_check_account_not_session();
        $this->load->view('user_group_management',$data);
    }

    
  


    function ActionGetUserGroupList(){ //returns returns array of object of products*/

        echo json_encode($this->UserGroupManagementModel->ReturnUserGroupList());
    }



    function ActionSaveUserGroupInfo(){
        if($this->UserGroupManagementModel->CreateUserGroup()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'User Group successfully created.',
                    'row'=>$this->UserGroupManagementModel->ReturnLastAffectedRowDetails()
                )
            );

        }
    }



    
    function ActionUpdateUserGroupInfo(){
            if($this->UserGroupManagementModel->UpdateUserGroup()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Group successfully updated.',
                        'row'=>$this->UserGroupManagementModel->ReturnLastAffectedRowDetails()

                    )
            );

        }
    }



   function ActionDeleteUserGroupInfo(){
        if($this->UserGroupManagementModel->RemoveUserGroup()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'User Group successfully removed.',
                    'row'=>$this->UserGroupManagementModel->ReturnLastAffectedRowDetails()

                )
            );

        }
    } 

}

?>