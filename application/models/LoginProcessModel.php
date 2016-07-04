<?php
Class LoginProcessModel extends CI_Model
{
    function login($username, $password)
    {
       



        $this->db->select('*');
        $this->db->from('user_accounts as ua');
        $this->db->join('user_groups as ug', 'ua.user_group_id = ug.user_group_id','');
        $this->db->where('ua.username', $username);
        $this->db->where('ua.password', sha1($password));


        $this->db->limit(1);
        $query = $this->db->get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }



 function getUserDetails($ua_id,$user_group){

    if($user_group == 'STUDENT'){


        $this->db->select('*,s.stud_fname as firstname,s.stud_mname as middlename ,s.stud_lname as lastname');
        $this->db->from('user_accounts as ua');
        $this->db->join('user_groups as ug', 'ua.user_group_id = ug.user_group_id','');
        $this->db->join('students as s', 'ua.user_account_id = s.user_account_id','');
        $this->db->join('courses as c', 's.course_id = c.course_id','');
        $this->db->join('departments as d', 'c.department_id = d.department_id','');
        $this->db->where('ua.user_account_id', $ua_id);
        $this->db->where('ua.active',1);     
        $this->db->limit(1);
        $query = $this->db->get();

    
    }else{

        $this->db->select('*,e.emp_fname as firstname,e.emp_mname as middlename ,e.emp_lname as lastname');
        $this->db->from('user_accounts as ua');
        $this->db->join('user_groups as ug', 'ua.user_group_id = ug.user_group_id','');
        $this->db->join('employees as e', 'ua.user_account_id = e.user_account_id','');
        $this->db->join('departments as d', 'e.department_id = d.department_id','');
        $this->db->where('ua.user_account_id', $ua_id);
        $this->db->where('ua.active',1);
        $this->db->limit(1);
        $query = $this->db->get();

     }


        

        if($query -> num_rows() > 0 )
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }

}



function  defaultSetting(){

 $sql="
 
     REPLACE INTO
        user_groups
    (user_group_id,user_group_title,user_group_desc,active)
    
    VALUES 

     ('1','ADMINISTRATOR','FULL ACCESS','1'),
     ('2','DEAN','DEAN','1'),
     ('3','FACULTY MEMBER','FACULTY MEMBER','1'),
     ('4','STUDENT','LIMITED ACCESS','1')

            ";

  $query = $this->db->query($sql);
     
  return $query;



}


    function  CreateDefaultCategory(){

        $sql="REPLACE INTO post_categories(category_id,category)
        VALUES (1,'Announcements'),(2,'Events'),(3,'News')";
        $query = $this->db->query($sql);
        return $query;









    }


}
?>