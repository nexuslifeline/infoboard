<?php

class RegisterProcessModel extends CI_Model {
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
       
            
            $data = array(
                'username'       => $this->input->post('username',TRUE),
                'password'       => sha1($this->input->post('password',TRUE)),
                'email'          => $this->input->post('email',TRUE),
                'user_group_id'   => $this->input->post('user_group_id',TRUE),


                   
            );

            $this->db->set('date_created', 'NOW()', FALSE);
            $this->db->insert('user_accounts',$data) or die(json_encode($this->error));
            $this->affected_id=$this->db->insert_id();  //last insert id, the user role

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

     
            $data = array(
                'username'       => $this->input->post('username',TRUE),
                'password'       => $this->input->post('password',TRUE),
                'email'          => $this->input->post('email',TRUE),
                'user_group_id'   => $this->input->post('user_group_id',TRUE)
            
            );

            $this->db->where('user_account_id',$user_account_id);
            $this->db->update('user_accounts',$data) or die(json_encode($this->error));
            $this->affected_id=$user_id;



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





 public function _getLogin($username){
       
        $query = $this->db->get('user');
         $this->db->where("( username = '$username' ");

        $n = 0;
        $type = '';
        $id = '';

        // check for main account login
        if($query->num_rows() > 0){
            foreach($query->result() as $row)
            {
                $user_id  = $row->user_id;
                $username = $row->username;
                
                $n++;
            }
            if($n > 0){ 
                $data = array(
                        'user_id' => $row->user_id,
                        'username' => $row->username,
                        'user_role_id' => $row->user_role_id
                    );
                $this->session->set_userdata($data);
                return 2;
            }

        }
    }


























}


?>