<?php

class DepartmentManagement extends MY_Controller {

  

    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor
        parent::__construct('department_management');
        $this->load->helper('url');
        $this->load->model('DepartmentManagementModel');
        

    }

    function index(){       
    // the default function that is called if no function is given in the uri
        $this-> load_header_files();
        $this->_check_account_not_session();
        $this->load->view('department_management');
    }

    
  

    function ActionGetDepartmentList(){
     //returns returns array of object of products
        echo json_encode($this->DepartmentManagementModel->ReturnDepartmentList());
    }




    function ActionSaveDepartmentInfo(){
            if($this->DepartmentManagementModel->CreateDepartment()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Department successfully created.',
                        'row'=>$this->DepartmentManagementModel->ReturnLastAffectedRowDetails()
                    )
                );

            }
        }


    function ActionUpdateDepartmentInfo(){
            if($this->DepartmentManagementModel->UpdateDepartment()){
                echo json_encode(
                    array(
                        'stat'=>'success',
                        'msg'=>'Department successfully updated.',
                        'row'=>$this->DepartmentManagementModel->ReturnLastAffectedRowDetails()

                    )
            );

        }
    }

   function ActionDeleteDepartmentInfo(){
        if($this->DepartmentManagementModel->RemoveDepartment()){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'Department successfully removed.',
                    'row'=>$this->DepartmentManagementModel->ReturnLastAffectedRowDetails()

                )
            );

        }
    } 

}

?>