<?php

class Tasks_model extends CI_Model
{
    protected   $table="tasks"; //table name
    protected   $pk_id="task_id"; //primary key id



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



    function get_task_list($id=0){
        $sql="SELECT mQ.*,(100-mQ.per_completed)as per_non_completed

            FROM

            (SELECT lQ.*,

            (lQ.emp_total_accomplished/lQ.emp_total_count*100)as per_completed


            FROM

            (SELECT main.*,
            m.emp_details,
            IFNULL(m.emp_total_count,0)as emp_total_count,
            IFNULL(n.emp_total_accomplished,0) as emp_total_accomplished,
            IFNULL(o.emp_total_non_accomplished,0)as emp_total_non_accomplished,
            IFNULL(p.DepartmentIDList,0)as DepartmentIDList,IFNULL(q.UserIDList,0)as UserIDList

            FROM

            (
                    SELECT
                    a.*,DATE_FORMAT(submission_deadline,'%m/%d/%Y')as deadline
                     FROM tasks as a WHERE a.is_deleted=0 AND a.is_active=1
            )as main



            LEFT JOIN

            (

            SELECT a.task_id,
            COUNT(DISTINCT a.user_account_id)as emp_total_count,
            CONCAT('[',
            GROUP_CONCAT(
                    DISTINCT
                    CONCAT(
                            '{\"employee\":\"',
                            CONCAT_WS(' ',b.emp_fname,b.emp_mname,b.emp_lname),
                            '\",\"date_accomplished\":\"',
                            a.date_accomplished,
                            '\",\"is_accomplished\":\"',
                            IF(a.is_accomplished,'1','0'),
                            '\"}'
                    )
            ORDER BY b.emp_fname
            SEPARATOR ','),']')as emp_details
            FROM task_viewers as a
            INNER JOIN employees as b ON a.user_account_id=b.user_account_id
            GROUP BY a.task_id

            )as m ON main.task_id=m.task_id

            LEFT JOIN

            (
            SELECT a.task_id,COUNT(DISTINCT a.user_account_id)as emp_total_accomplished
            FROM task_viewers as a WHERE a.is_accomplished=1
            GROUP BY a.task_id
            )as n ON main.task_id=n.task_id

            LEFT JOIN

            (

            SELECT a.task_id,COUNT(DISTINCT  a.user_account_id)as emp_total_non_accomplished
            FROM task_viewers as a WHERE a.is_accomplished=0
            GROUP BY a.task_id

            )As o ON main.task_id=o.task_id

            LEFT JOIN

            (
                SELECT a.task_id,GROUP_CONCAT(b.department_id)as DepartmentIDList FROM task_viewers as a INNER JOIN employees as b
                ON a.user_account_id=b.user_account_id
                WHERE viewer_type='DEPARTMENT_VIEW' GROUP BY a.task_id
            )as p ON main.task_id=p.task_id

            LEFT JOIN

            (
                SELECT a.task_id,GROUP_CONCAT(a.user_account_id)as UserIDList FROM task_viewers as a
                WHERE viewer_type='USER_VIEW' GROUP BY a.task_id
            )as q ON main.task_id=q.task_id




            ) as lQ)as mQ ".($id==0?"":" WHERE mQ.task_id=$id")." ORDER BY mQ.task_id";


        return $this->db->query($sql)->result();
    }



    function get_department_list(){
        $this->db->select('department_id, department_title, department_desc');
        $query= $this->db->get('departments');
        return $query->result();
    }

    function get_employee_list(){

        $query= $this->db->get('employees');
        return $query->result();
    }




















}
?>