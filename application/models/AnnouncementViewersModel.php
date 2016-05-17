<?php

class AnnouncementViewersModel extends CI_Model {
    public  $table="announcement_viewers"; //table name
    public  $pk_id="announce_department_id"; //primary key id


    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
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
    function create_batch($data){
        //array of data to be inserted
        return $this->db->insert_batch($this->table,$data) or false;
    }

    function update($id,$data){
        $this->db->where($this->pk_id,$id);
        return   $this->db->insert($this->table,$data) or false;
    }

    function last_insert_id(){
        return $this->db->insert_id();
    }

    function delete($id){
        $this->db->where('announce_id',$id);
        return   $this->db->delete($this->table) or false;
    }


}

?>