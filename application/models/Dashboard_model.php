<?php

class Dashboard_model extends CI_Model
{
        protected  $table = "announcements"; //table name
        protected $pk_id = "announce_id"; //primary key id


        function __construct()
        {
            // Call the Model constructor
            parent::__construct();

        }


        function get_accomplished_task(){
                $user_id=$this->session->user_account_id;
                $sql="SELECT m.*,n.date_accomplished
                  FROM
                        (
                          SELECT a.* FROM tasks as a WHERE a.`task_id`
                          IN (SELECT x.task_id FROM task_viewers as x WHERE x.user_account_id=$user_id AND
                          x.is_accomplished=1)
                        )as m

                      LEFT JOIN

                      (
                          SELECT x.task_id,x.date_accomplished FROM task_viewers as x WHERE x.user_account_id=$user_id AND
                          x.is_accomplished=1 GROUP BY x.task_id,x.user_account_id

                      )As n
                  ON m.task_id=n.task_id";
            return $this->db->query($sql)->result();
        }


}



?>