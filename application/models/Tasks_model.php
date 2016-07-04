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



    function get_task_list($id=0,$user_id=0,$not_accomplished_only=null){
        $sql="SELECT mQ.*,(100-mQ.per_completed)as per_non_completed

            FROM

            (SELECT lQ.*,

            (lQ.emp_total_accomplished/lQ.emp_total_count*100)as per_completed,
            CONCAT(lQ.emp_total_accomplished,' of ',lQ.emp_total_count)as completion_ratio


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
                    a.*,DATE_FORMAT(submission_deadline,'%m/%d/%Y')as deadline,CONCAT_WS(' ',b.emp_fname,b.emp_mname,b.emp_lname)as PostedByUser,
                    IF(DATE_FORMAT(submission_deadline,'%m/%d/%Y')<DATE_FORMAT(NOW(),'%m/%d/%Y'),1,0)as is_expired
                     FROM tasks as a LEFT JOIN employees as b ON a.posted_by_user=b.user_account_id WHERE a.is_deleted=0 AND a.is_active=1
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
                            '\",\"employee_id\":\"',b.employee_id,
                            '\",\"user_account_id\":\"',b.user_account_id,
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




            ) as lQ)as mQ WHERE mQ.is_deleted=0 AND mQ.is_active=1

            ".($id==0?"":" AND mQ.task_id=$id")."
            ".($user_id==0?"":" AND mQ.task_id IN (SELECT x.task_id FROM task_viewers as x WHERE x.user_account_id=$user_id GROUP BY x.task_id)")."
            ".($not_accomplished_only==null?"":" AND mQ.task_id IN (SELECT x.task_id FROM task_viewers as x WHERE x.is_accomplished=0 AND x.user_account_id=$user_id GROUP BY x.task_id)")."

            ORDER BY mQ.task_id";


        return $this->db->query($sql)->result();
    }



    function get_department_list(){

   
        $user_group_id   = $this->session->user_group_id;


        $sql="SELECT 
         d.department_id, 
         d.department_title,
         d.department_desc
         FROM departments as d


         INNER JOIN task_distribution_group as td 
         ON d.department_id = td.department_id
         WHERE  
         td.main_user_group_id = $user_group_id



            ";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function get_employee_list(){

$user_group_id   = $this->session->user_group_id;

        $sql="
SELECT * FROM `employees` as e 
INNER JOIN task_distribution_group as ts 
ON e.department_id = ts.department_id 
WHERE ts.main_user_group_id = $user_group_id  
GROUP BY e.user_account_id


            ";
        $query = $this->db->query($sql);







        return $query->result();
    }




















}
?>