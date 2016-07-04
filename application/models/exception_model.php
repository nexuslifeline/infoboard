<?php

class Exception_model extends CI_Model {
    protected   $table="announce_exceptions"; //table name
    protected   $pk_id="exception_id"; //primary key id
    protected   $fk_id="announce_id"; //foreign key id



    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }




    function save(){
        return $this->db->insert($this->table, $this);
    }

    function modify($id){
        $this->db->where($this->pk_id,$id);
        return $this->db->update($this->table, $this);
    }

    function delete_via_fk($id){
        $this->db->where($this->fk_id,$id);
        return   $this->db->delete($this->table);
    }




}

?>