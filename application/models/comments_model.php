<?php

class Comments_model extends CI_Model
{
    protected   $table="comments"; //table name
    protected   $pk_id="comment_id"; //primary key id
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


    function get_comments($comment_id=null,$task_id=null,$user_account_id=null){
            $sql="SELECT
                        m.*,
                        (
                            CASE
                                WHEN m.DaysPosted>0 THEN CONCAT(m.DaysPosted,' day ago')
                                WHEN m.DaysPosted=0 AND m.HoursPosted>0 THEN CONCAT(m.HoursPosted,' hour ago')
                                WHEN m.DaysPosted=0 AND m.HoursPosted=0 AND m.MinutePosted>0 THEN CONCAT(m.MinutePosted,' min ago')
                                WHEN m.DaysPosted=0 AND m.HoursPosted=0 AND m.MinutePosted=0 AND m.SecondPosted>0 THEN CONCAT(m.SecondPosted,' sec ago')
                                ELSE '1 sec ago'
                            END
                        )as TimeDescription

                        FROM

                              (
                                    SELECT

                                        a.*,
                                        CONCAT(DAYNAME(posted_date),', ',DATE_FORMAT(posted_date,'%M %d, %Y'))as DayPosted,
                                        TIME_FORMAT(posted_date,'%r') as TimePosted,
                                        DATEDIFF(NOW(),posted_date)as DaysPosted,
                                        HOUR(TIMEDIFF(posted_date,NOW()))as HoursPosted,
                                        MINUTE(TIMEDIFF(posted_date,NOW()))as MinutePosted,
                                        SECOND(TIMEDIFF(posted_date,NOW()))as SecondPosted,
                                        CONCAT_WS(' ',b.emp_fname,b.emp_mname,b.emp_lname) as employee,
                                        b.user_profile

                                    FROM comments as a

                                      LEFT JOIN employees as b ON a.user_account_id=b.user_account_id
                                      WHERE a.is_active=1 AND a.is_deleted=0

                                      ".($comment_id==null?"":" AND a.comment_id=$comment_id")."
                                      ".($task_id==null?"":" AND a.task_id=$task_id")."
                                      ".($user_account_id==null?"":" AND a.user_account_id=$user_account_id")."



                              )as m  ORDER BY m.comment_id ASC                        ";
            return $this->db->query($sql)->result();
    }



}
?>