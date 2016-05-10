<?php

class UserGroupManagementModel extends CI_Model {
    private $affected_id=0;
    private $error=array(
        'stat'=>'error',
        'msg'=>'Sorry, error has occurred.'
    );



    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }





    function ReturnUserGroupList(){
        $rows=array();
        $sql="SELECT
				CONCAT_WS('|',
				      user_group_id,
                      user_group_title,
                      user_group_desc,
                      active

                )AS   hidden,
                      user_group_title,
                      user_group_desc,
                      date_created

			FROM user_groups
			WHERE active=1

			";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }




    function CreateUserGroup(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $data = array(
                'user_group_title' => $this->input->post('user_group_title',TRUE),
                'user_group_desc'=>$this->input->post('user_group_desc',TRUE)
                
            );

            $this->db->set('date_created', 'NOW()', FALSE);
            $this->db->insert('user_groups',$data) or die(json_encode($this->error));
            $this->affected_id=$this->db->insert_id();	//last insert id, the user role

            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }



    function UpdateUserGroup(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $user_group_id=$this->input->post('id',TRUE);

            $data = array(
                'user_group_title' => $this->input->post('user_group_title',TRUE),
                'user_group_desc'=>$this->input->post('user_group_desc',TRUE)
                
            );

            $this->db->where('user_group_id',$user_group_id);
            $this->db->update('user_groups',$data) or die(json_encode($this->error));
            $this->affected_id=$user_group_id;



            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }

     function RemoveUserGroup(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $user_group_id=$this->input->post('id',TRUE);

            $this->db->set('active',0);
            $this->db->where('user_group_id',$user_group_id);
            $this->db->update('user_groups') or die(json_encode($this->error));
            $this->affected_id=$user_group_id;
            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }





    function ReturnLastAffectedRowDetails(){
        $rows=array();
        $sql="SELECT
                CONCAT_WS('|',
                      user_group_id,
                      user_group_title,
                      user_group_desc,
                      active

                )AS   hidden,
                      user_group_title,
                      user_group_desc,
                      date_created

            FROM user_groups
            WHERE 
          user_group_id=".$this->affected_id;
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) //this will return only 1 row
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }




}


?>