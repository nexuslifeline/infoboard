<?php

class Tasks_model extends CI_Model
{
    public  $table="tasks"; //table name
    public  $pk_id="task_id"; //primary key id


    function __construct(){
        // Call the Model constructor
        parent::__construct();
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
        $this->db->where($this->pk_id,$id);
        return   $this->db->update($this->table,$data) or false;
    }

    function delete($id){
        $this->db->where($this->pk_id,$id);
        return   $this->db->delete($this->table) or false;
    }

    function last_insert_id(){
        return $this->db->insert_id();
    }



    function get_task_list(){
        $sql="SELECT mQ.*,(100-mQ.per_completed)as per_non_completed

FROM

(SELECT lQ.*,

(lQ.emp_total_accomplished/lQ.emp_total_count*100)as per_completed


FROM

(SELECT main.*,
m.emp_details,
IFNULL(m.emp_total_count,0)as emp_total_count,
IFNULL(n.emp_total_accomplished,0) as emp_total_accomplished,
IFNULL(o.emp_total_non_accomplished,0)as emp_total_non_accomplished

FROM

(
		SELECT
		a.*,
        (10)as completed_count,(50) as completed_percent FROM tasks as a
)as main



LEFT JOIN

(

SELECT a.task_id,
COUNT(a.user_account_id)as emp_total_count,
CONCAT('[',
GROUP_CONCAT(
		CONCAT(
        		'{".chr(34)."employee".chr(34).":".chr(34)."',
        		CONCAT_WS(' ',b.emp_fname,b.emp_mname,b.emp_lname),
                '".chr(34).",".chr(34)."date_accomplished".chr(34).":".chr(34)."',
                a.date_accomplished,
                '".chr(34).",".chr(34)."is_accomplished".chr(34).":".chr(34)."',
                IF(a.is_accomplished,'1','0'),
                '".chr(34)."}'
        )
SEPARATOR ','),']')as emp_details
FROM task_viewers as a
INNER JOIN employees as b ON a.user_account_id=b.user_account_id
GROUP BY a.task_id

)as m ON main.task_id=m.task_id

LEFT JOIN

(
SELECT a.task_id,COUNT(a.user_account_id)as emp_total_accomplished
FROM task_viewers as a WHERE a.is_accomplished=1
GROUP BY a.task_id
)as n ON main.task_id=n.task_id

LEFT JOIN

(

SELECT a.task_id,COUNT(a.user_account_id)as emp_total_non_accomplished
FROM task_viewers as a WHERE a.is_accomplished=0
GROUP BY a.task_id

)As o ON main.task_id=o.task_id) as lQ)as mQ";


        return $this->db->query($sql)->result();
    }






















}
?>