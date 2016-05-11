<?php

class AnnouncementModel extends CI_Model {
    public  $table="announcements"; //table name
    public  $pk_id="announce_id"; //primary key id


    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }



    //this should be on Department Model
    //sorry for adding it here!! haha
    function GetDepartmentList(){
        $this->db->select('department_id, department_title, department_desc');
        $query= $this->db->get('departments');
        return $query->result();
    }

    function  begin(){
        $this->db->trans_start(); //start transaction
    }

    function  commit(){
        $this->db->trans_complete(); //commit transaction
    }

    function create($data){
         //array of data to be inserted
        return $this->db->insert($this->table,$data) or false;

    }

    function update($id,$data){
        $this->db->where($this->$pk_id,$id);
         return   $this->db->insert($this->table,$data) or false;
    }

    function last_insert_id(){
        return $this->db->insert_id();
    }




}

?>