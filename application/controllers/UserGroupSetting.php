<?php

class UserGroupSetting extends MY_Controller {

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserGroupSettingModel');

    }

    function index(){       
    // the default function that is called if no function is given in the uri
        $this->load->view('user_group_setting');
    }

    



function ActionSaveUserPriviledgeAcccess(){
        if($this->UserGroupSettingModel->CreateUserPriviledgeAcccess()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'User Priviledge Access Link successfully save.',
                    
                )
            );

        }
    }





  function ActionGetUserGroupPriviledgeList(){
        echo json_encode($this->UserGroupSettingModel->ReturnUserGroupPriviledgeList());
    }






 function ActionGetDeniedAccessLink(){
        echo json_encode($this->UserGroupSettingModel->ReturnDeniedAccessLink());
    }






function ActionSaveUserDistributionAcccess(){
        if($this->UserGroupSettingModel->CreateUserDistributionAcccess()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'User Task Distribution Access  successfully save.',
                    
                )
            );

        }
    }



  function ActionGetUserGroupDistributionList(){
     

        echo json_encode($this->UserGroupSettingModel->ReturnUserGroupDistributionList());
    }
}
?>