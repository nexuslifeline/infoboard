<?php

class DepartmentManagementModel extends CI_Model {
    private $affected_id=0;
    private $error=array(
        'stat'=>'error',
        'msg'=>'Sorry, error has occurred.'
    );



    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }


    function ReturnDepartmentList(){
        $rows=array();
        $sql="SELECT CONCAT_WS('|', 
        d.department_id,
        d.department_title,  
        d.department_desc,
        d.active )AS hidden,
        d.*
        FROM departments AS d 
        WHERE d.active=1
            ";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }




    function CreateDepartment(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $data = array(
                'department_title' => $this->input->post('department_title',TRUE),
                'department_desc'  => $this->input->post('department_desc',FALSE),
                
            );

            $this->db->set('date_created', 'NOW()', FALSE);
            $this->db->insert('departments',$data) or die(json_encode($this->error));
            $this->affected_id=$this->db->insert_id();  //last insert id, the user role

            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }



    function UpdateDepartment(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $department_id=$this->input->post('id',TRUE);

            $data = array(
                'department_title' => $this->input->post('department_title',TRUE),
                'department_desc'  => $this->input->post('department_desc',FALSE),
            );

            $this->db->where('department_id',$department_id);
            $this->db->update('departments',$data) or die(json_encode($this->error));
            $this->affected_id=$department_id;



            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }

     function RemoveDepartment(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $department_id=$this->input->post('id',TRUE);
            $this->db->set('active',0);
            $this->db->where('department_id',$department_id);
            $this->db->update('departments') or die(json_encode($this->error));
            $this->affected_id=$department_id;
            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }




    function ReturnLastAffectedRowDetails(){
        $rows=array();
        $sql="SELECT CONCAT_WS('|', 
        d.department_id,
        d.department_title,  
        d.department_desc,
        d.active )AS hidden,
        d.*
        FROM departments AS d 
        WHERE
        d.department_id=".$this->affected_id;
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) //this will return only 1 row
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }









}


?>