<?php

class File_archive_model extends CI_Model
{
    protected   $table="file_archives"; //table name
    protected   $pk_id="file_id"; //primary key id
    protected   $fk_id="task_id"; //foreign key id


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

    function update($id,$data){
        $this->db->where($this->pk_id,$id);
        return   $this->db->update($this->table,$data);
    }

    function delete($id){
        $this->db->where($this->pk_id,$id);
        return   $this->db->delete($this->table);
    }

    function last_insert_id(){
        return $this->db->insert_id();
    }


    function get_file_list($file_id=null,$task_id=null){
        $sql="SELECT a.*,
                CONCAT_WS(' ',b.emp_fname,b.emp_mname,b.emp_lname)as posted_by,DATE_FORMAT(a.posted_date,'%m/%d/%Y %r')as date_posted
                FROM file_archives as a

              LEFT JOIN
                employees as b ON a.user_account_id=b.user_account_id

              WHERE a.is_active=1 AND a.is_deleted=0
              ".($file_id==null?"":" AND a.file_id=$file_id")."
              ".($task_id==null?"":" AND a.task_id=$task_id")."
        ";
        return $this->db->query($sql)->result();
    }

}
?>