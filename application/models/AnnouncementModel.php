<?php

class AnnouncementModel extends CI_Model {
    public  $table="announcements"; //table name
    public  $pk_id="announce_id"; //primary key id


    function __construct(){
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
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



    function GetDepartmentList(){
        $this->db->select('department_id, department_title, department_desc');
        $query= $this->db->get('departments');
        return $query->result();
    }

    function get_user_group_list(){
        $this->db->select('user_group_id, user_group_title');
        $query= $this->db->get('user_groups');
        return $query->result();
    }


    //if id=0 no filter on announce id, if criteria is "" no filter on department and announcement, if department_id is 0 no filter on dep id,
    //if show date range is false no filter on published start and end date
    //if posted_user_id is 0 no filter on user id, if start-range is 0 no range filter on announce id
    function GetAnnouncementList($id=null,$criteria=null,$department_id=null,$posted_by_user_id=null,$show_date_range=null,$end_range_id=null,$category_id=null,$filter_by_exception_group=null){
        //$query= $this->db->get('announcements');
        $sql="
        SELECT m.*,
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
                        a.announce_id,a.announce_description,a.category_id,IFNULL(m.attachment_json,'')as attachment_json,
                        DATE_FORMAT(a.post_shown_date,'%m/%d/%Y')as ShownDate,
                        DATE_FORMAT(a.post_expire_date,'%m/%d/%Y')as ExpireDate,
                        a.posted_date,GROUP_CONCAT(d.department_id)as DepartmentIDList,
                        GROUP_CONCAT(d.department_title)as DepartmentList,
                        IFNULL(GROUP_CONCAT(f.user_group_id),'')as ExceptionList,
                        CONCAT_WS(' ',b.emp_fname,b.emp_mname,b.emp_lname) as PostedBy,
                        CONCAT(DAYNAME(posted_date),', ',DATE_FORMAT(posted_date,'%M %d, %Y'))as DayPosted,
                        TIME_FORMAT(posted_date,'%r') as TimePosted,
                        DATEDIFF(NOW(),posted_date)as DaysPosted,
                        HOUR(TIMEDIFF(posted_date,NOW()))as HoursPosted,
                        MINUTE(TIMEDIFF(posted_date,NOW()))as MinutePosted,
                        SECOND(TIMEDIFF(posted_date,NOW()))as SecondPosted

                FROM announcements as a

                        INNER JOIN announcement_viewers as c ON a.announce_id=c.announce_id
                                  LEFT JOIN announce_exceptions as f ON a.announce_id=f.announce_id
                                  LEFT JOIN departments as d ON c.department_id=d.department_id

                                  LEFT JOIN
                                  (
                                   SELECT CONCAT('[',GROUP_CONCAT(
                                                CONCAT(
                                                    '{\"directory\":\"',a.attachment_directory,'\",',
                                                    '\"file\":\"',a.file_name,'\"}'
                                                )
                                            ),']') as attachment_json,
                                            a.announce_id

                                    FROM attachments as a

                                    GROUP BY a.announce_id

                                  ) as m ON a.announce_id=m.announce_id


                        LEFT JOIN employees as b ON a.post_by_user_id=b.user_account_id WHERE a.is_deleted=0 AND a.is_active=1



                ".($id==null?"":" AND a.announce_id=$id")."
                ".($criteria==null?"":" AND (a.announce_description LIKE '%".$criteria."%' OR d.department_title LIKE '".$criteria."%')")."
                ".($department_id==null?"":" AND c.department_id=$department_id")."
                ".($posted_by_user_id==null?"":" AND a.post_by_user_id=$posted_by_user_id")."
                ".($end_range_id==null?"":" AND a.announce_id>$end_range_id")."
                ".($category_id==null?"":" AND a.category_id=$category_id")."
                ".($show_date_range==null?"":" AND DATE_FORMAT(NOW(),'%Y-%m-%d') BETWEEN a.post_shown_date AND a.post_expire_date")."
                ".($filter_by_exception_group==null?"":" AND $filter_by_exception_group NOT IN (SELECT x.user_group_id FROM announce_exceptions as x WHERE x.announce_id=a.announce_id)")."







                GROUP BY a.announce_id

        )as m
          ORDER BY m.announce_id DESC
        ";
        return $this->db->query($sql)->result();
    }





    function GetTimeDescriptionList($id=0){
        //$query= $this->db->get('announcements');
        $sql="
        SELECT m.*,
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
                        a.announce_id,
                        CONCAT(DAYNAME(posted_date),', ',DATE_FORMAT(posted_date,'%M %d, %Y'))as DayPosted,
                        TIME_FORMAT(posted_date,'%r') as TimePosted,
                        DATEDIFF(NOW(),posted_date)as DaysPosted,
                        HOUR(TIMEDIFF(posted_date,NOW()))as HoursPosted,
                        MINUTE(TIMEDIFF(posted_date,NOW()))as MinutePosted,
                        SECOND(TIMEDIFF(posted_date,NOW()))as SecondPosted

                FROM announcements as a
                ".($id==0?"":" WHERE a.announce_id=$id")."


        )as m
          ORDER BY m.announce_id DESC
        ";
        return $this->db->query($sql)->result();
    }


}

?>