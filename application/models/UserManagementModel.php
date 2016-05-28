<?php

class UserManagementModel extends CI_Model {
    private $affected_id=0;
    private $error=array(
        'stat'=>'error',
        'msg'=>'Sorry, error has occurred.'
    );



    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
  
    }


    function ReturnUserList(){
        $rows=array();
        $sql="SELECT CONCAT_WS('|', 
        u.user_account_id,
        u.username,
        u.password, 
        u.email, 
        u.active,
        ug.user_group_id,
        ug.user_group_title
         )AS hidden, 
        u.username,  
        u.email, 
        ug.user_group_title, 
        u.date_created
         FROM user_accounts as u 
         INNER JOIN user_groups as ug ON u.user_group_id = ug.user_group_id
         WHERE u.active=1
            ";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }




    function CreateUser(){
        try{
            //array of data to be inserted
            
            $this->db->trans_start(); //start transaction
            $user_group       =   $this->input->post('user_group',TRUE);
        
            $data = array(
                'username'       => $this->input->post('username',TRUE),
                'password'       => sha1($this->input->post('password',TRUE)),
                'email'          => $this->input->post('email',TRUE),
                'user_group_id'   => $this->input->post('user_group_id',TRUE),
                   
            );

           // $this->db->set('date_created', 'NOW()', FALSE);
            $this->db->insert('user_accounts',$data) or die(json_encode($this->error));
            $this->affected_id=$this->db->insert_id();  //last insert id, the user role

            if($user_group=='ADMINISTRATOR'){

                    $data = array(
                                'user_account_id'       => $this->affected_id,
                                'employee_no'           => $this->input->post('employee_no',TRUE),
                                'department_id'         => $this->input->post('department_id',TRUE),
                                'emp_fname'             => $this->input->post('emp_fname',TRUE),
                                'emp_mname'             => $this->input->post('emp_mname',TRUE),
                                'emp_lname'             => $this->input->post('emp_lname',TRUE),
                                'contact_no'            => $this->input->post('contact_no',TRUE),
                                'house_no'              => $this->input->post('house_no',TRUE),
                                'street'                => $this->input->post('street',TRUE),
                                'barangay'              => $this->input->post('barangay',TRUE),
                                'municipality'          => $this->input->post('municipality',TRUE),
                                'zipcode'               => $this->input->post('zipcode',TRUE),
                                'province'              => $this->input->post('province',TRUE),
                                'birthplace'            => $this->input->post('birthplace',TRUE),
                                'gender'                => $this->input->post('gender',TRUE),
                                'civil_status'          => $this->input->post('civil_status',TRUE),
                                'nationality'           => $this->input->post('nationality',TRUE)
                    );

                    //$this->db->set('date_created', 'NOW()', FALSE);
                    $this->db->insert('employees',$data) or die(json_encode($this->error));


            }elseif($user_group=='STUDENT'){


                     $data = array(
                                'user_account_id'        => $this->affected_id,
                                'student_no'             => $this->input->post('student_no',TRUE),
                                'course_id'              => $this->input->post('course_id',TRUE),
                                'stud_fname'             => $this->input->post('stud_fname',TRUE),
                                'stud_mname'             => $this->input->post('stud_mname',TRUE),
                                'stud_lname'             => $this->input->post('stud_lname',TRUE),
                                'contact_no'            => $this->input->post('contact_no',TRUE),
                                'house_no'              => $this->input->post('house_no',TRUE),
                                'street'                => $this->input->post('street',TRUE),
                                'barangay'              => $this->input->post('barangay',TRUE),
                                'municipality'          => $this->input->post('municipality',TRUE),
                                'zipcode'               => $this->input->post('zipcode',TRUE),
                                'province'              => $this->input->post('province',TRUE),

                                'birthplace'            => $this->input->post('birthplace',TRUE),
                                'gender'                => $this->input->post('gender',TRUE),
                                'civil_status'          => $this->input->post('civil_status',TRUE),
                                'nationality'           => $this->input->post('nationality',TRUE)

                    );

                    //$this->db->set('date_created', 'NOW()', FALSE);
                    $this->db->insert('students',$data) or die(json_encode($this->error));


            }else{


                $data = array(
                                'user_account_id'       => $this->affected_id,
                                'employee_no'           => $this->input->post('employee_no',TRUE),
                                'department_id'         => $this->input->post('department_id',TRUE),
                                'emp_fname'             => $this->input->post('emp_fname',TRUE),
                                'emp_mname'             => $this->input->post('emp_mname',TRUE),
                                'emp_lname'             => $this->input->post('emp_lname',TRUE),
                                'contact_no'            => $this->input->post('contact_no',TRUE),
                                'house_no'              => $this->input->post('house_no',TRUE),
                                'street'                => $this->input->post('street',TRUE),
                                'barangay'              => $this->input->post('barangay',TRUE),
                                'municipality'          => $this->input->post('municipality',TRUE),
                                'zipcode'               => $this->input->post('zipcode',TRUE),
                                'province'              => $this->input->post('province',TRUE),

                                'birthplace'            => $this->input->post('birthplace',TRUE),
                                'gender'                => $this->input->post('gender',TRUE),
                                'civil_status'          => $this->input->post('civil_status',TRUE),
                                'nationality'          => $this->input->post('nationality',TRUE)
                    );

                    //$this->db->set('date_created', 'NOW()', FALSE);
                    $this->db->insert('employees',$data) or die(json_encode($this->error));


            }


            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }



    function UpdateUser(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $user_account_id=$this->input->post('id',TRUE);
            $user_group       =   $this->input->post('user_group',TRUE);
     
            $data = array(
                'username'       => $this->input->post('username',TRUE),
                'password'       => $this->input->post('password',TRUE),
                'email'          => $this->input->post('email',TRUE),
                'user_group_id'   => $this->input->post('user_group_id',TRUE)
            
            );

            $this->db->where('user_account_id',$user_account_id);
            $this->db->update('user_accounts',$data) or die(json_encode($this->error));
            $this->affected_id=$user_account_id;

 
            if($user_group=='ADMINISTRATOR'){
                    
                    $data = array(
                                'user_account_id'       => $this->affected_id,
                                'employee_no'           => $this->input->post('employee_no',TRUE),
                                'department_id'         => $this->input->post('department_id',TRUE),
                                'emp_fname'             => $this->input->post('emp_fname',TRUE),
                                'emp_mname'             => $this->input->post('emp_mname',TRUE),
                                'emp_lname'             => $this->input->post('emp_lname',TRUE),
                                'contact_no'            => $this->input->post('contact_no',TRUE),
                                'house_no'              => $this->input->post('house_no',TRUE),
                                'street'                => $this->input->post('street',TRUE),
                                'barangay'              => $this->input->post('barangay',TRUE),
                                'municipality'          => $this->input->post('municipality',TRUE),
                                'zipcode'               => $this->input->post('zipcode',TRUE),
                                'province'              => $this->input->post('province',TRUE),

                                'birthplace'            => $this->input->post('birthplace',TRUE),
                                'gender'                => $this->input->post('gender',TRUE),
                                'civil_status'          => $this->input->post('civil_status',TRUE),
                                'nationality'          => $this->input->post('nationality',TRUE)
                    );

                    $this->db->where('user_account_id',$user_account_id);
                    $this->db->update('employees',$data) or die(json_encode($this->error));
                    

            }elseif($user_group=='STUDENT'){


                     $data = array(
                                'user_account_id'       => $this->affected_id,
                                'student_no'            => $this->input->post('student_no',TRUE),
                                'course_id'             => $this->input->post('course_id',TRUE),
                                'stud_fname'            => $this->input->post('stud_fname',TRUE),
                                'stud_mname'            => $this->input->post('stud_mname',TRUE),
                                'stud_lname'            => $this->input->post('stud_lname',TRUE),
                                'contact_no'            => $this->input->post('contact_no',TRUE),
                                'house_no'              => $this->input->post('house_no',TRUE),
                                'street'                => $this->input->post('street',TRUE),
                                'barangay'              => $this->input->post('barangay',TRUE),
                                'municipality'          => $this->input->post('municipality',TRUE),
                                'zipcode'               => $this->input->post('zipcode',TRUE),
                                'province'              => $this->input->post('province',TRUE),

                                'birthplace'            => $this->input->post('birthplace',TRUE),
                                'gender'                => $this->input->post('gender',TRUE),
                                'civil_status'          => $this->input->post('civil_status',TRUE),
                                'nationality'          => $this->input->post('nationality',TRUE)
                    );

                    $this->db->where('user_account_id',$user_account_id);
                    $this->db->update('students',$data) or die(json_encode($this->error));
                

            }else{


                $data = array(
                                'user_account_id'       => $this->affected_id,
                                'employee_no'           => $this->input->post('employee_no',TRUE),
                                'department_id'         => $this->input->post('department_id',TRUE),
                                'emp_fname'             => $this->input->post('emp_fname',TRUE),
                                'emp_mname'             => $this->input->post('emp_mname',TRUE),
                                'emp_lname'             => $this->input->post('emp_lname',TRUE),
                                'contact_no'            => $this->input->post('contact_no',TRUE),
                                'house_no'              => $this->input->post('house_no',TRUE),
                                'street'                => $this->input->post('street',TRUE),
                                'barangay'              => $this->input->post('barangay',TRUE),
                                'municipality'          => $this->input->post('municipality',TRUE),
                                'zipcode'               => $this->input->post('zipcode',TRUE),
                                'province'              => $this->input->post('province',TRUE),

                                'birthplace'            => $this->input->post('birthplace',TRUE),
                                'gender'                => $this->input->post('gender',TRUE),
                                'civil_status'          => $this->input->post('civil_status',TRUE),
                                'nationality'          => $this->input->post('nationality',TRUE)
                    );


                    $this->db->where('user_account_id',$user_account_id);
                    $this->db->update('employees',$data) or die(json_encode($this->error));
                    

            }


            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }

     function RemoveUser(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $user_account_id=$this->input->post('id',TRUE);

            $this->db->set('active',0);
            $this->db->where('user_account_id',$user_account_id);
            $this->db->update('user_accounts') or die(json_encode($this->error));
            $this->affected_id=$user_account_id;
            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }





    function ReturnLastAffectedRowDetails(){
        $rows=array();
        $sql="SELECT CONCAT_WS('|', 
        u.user_account_id,
        u.username,
        u.password, 
        u.email, 
        u.active,
        ug.user_group_id,
        ug.user_group_title
         )AS hidden, 
        u.username,  
        u.email, 
        ug.user_group_title, 
        u.date_created
         FROM user_accounts as u 
         INNER JOIN user_groups as ug ON u.user_group_id = ug.user_group_id
         WHERE
          user_account_id=".$this->affected_id;
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) //this will return only 1 row
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }





function GetUserDetails(){

    $user_group = $this->input->post('user_group',TRUE);
    $user_account_id   = $this->input->post('user_account_id',TRUE);

    if($user_group=='ADMINISTRATOR'){

        $sql="
        SELECT        
        *
        FROM employees
        WHERE user_account_id =$user_account_id";
        $query = $this->db->query($sql);


    }else if ($user_group=='STUDENT') {

        $sql="
        SELECT        
        *
        FROM students
        WHERE user_account_id =$user_account_id";
        $query = $this->db->query($sql);


    }else{

        $sql="
        SELECT        
        *
        FROM employees
        WHERE user_account_id =$user_account_id";
        $query = $this->db->query($sql);
    }


return $query->result();


}




function checkUsernameIfExist()
{
        $username = $this->input->post('username',TRUE);
        $rows=array();
        $sql="SELECT        
        username
        FROM user_accounts
        WHERE username ='$username'";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;

}








function checkEmailIfExist()
{
        $email = $this->input->post('email',TRUE);
        $rows=array();
        $sql="SELECT        
        email
        FROM user_accounts
        WHERE email = '$email' ";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;


}















}


?>