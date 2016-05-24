<?php

class Taskviewers_model extends CI_Model
{
    protected   $table="task_viewers"; //table name
    protected   $pk_id="task_viewer_id"; //primary key id
    protected   $fk_id="task_id"; //foreign key id


    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }


    function save(){
        return $this->db->insert($this->table, $this);
    }

    function last_insert_id(){
        return $this->db->insert_id();
    }


    function  begin(){
        $this->db->trans_start(); //start transaction
    }

    function  commit(){
        $this->db->trans_complete(); //commit transaction
    }

    function create($data){
        //array of data to be inserted
        return $this->db->insert($this->table,$data);
    }

    function insert_users_list($task_id,$department_id){
        $sql="INSERT INTO task_viewers(task_id,user_account_id,viewer_type) SELECT $task_id,x.user_account_id,'DEPARTMENT_VIEW' FROM employees as x WHERE department_id=$department_id";

        //$sql="INSERT INTO `task_viewers`(`task_id`) VALUES(1)";
        return $this->db->query($sql);


    }

    function update($id,$data){
        $this->db->where($this->pk_id,$id);
        return   $this->db->update($this->table,$data);
    }

    function delete_using_fk($id){
        $this->db->where($this->fk_id,$id);
        return   $this->db->delete($this->table);
    }








}
?>