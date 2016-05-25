<?php

class UserGroupSettingModel extends CI_Model {

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











function CreateUserPriviledgeAcccess(){
    try{
        //array of data to be inserted
        $this->db->trans_start(); //start transaction

        $user_group_id     = $this->input->post('user_group_id',TRUE) != '' ? $this->input->post('user_group_id',TRUE) : '';
        $alias_id         = $this->input->post('alias_id',TRUE) != '' ? $this->input->post('alias_id',TRUE) : '';

        $this->db->where('user_group_id', $user_group_id);
        $this->db->delete('user_priviledge') or die(json_encode($this->error));
        

        if($alias_id !=''){
            $datas = array();

            for($i=0;$i<=count($alias_id)-1;$i++){
                $datas[]=array(
                'user_group_id'        =>  $user_group_id!=''   ? $user_group_id: '' ,
                'alias_id'             =>  $alias_id[$i]!='' ? $alias_id[$i] : '' 
                );
            }

            $this->db->insert_batch('user_priviledge', $datas);      
        }
        

        $this->db->trans_complete();
        return TRUE;
    }catch(Exception $e){
        die(json_encode($this->error));
    }
}








function CreateUserDistributionAcccess(){
    try{
        //array of data to be inserted
        $this->db->trans_start(); //start transaction

        $main_user_group_id     = $this->input->post('main_user_group_id',TRUE) != '' ? $this->input->post('main_user_group_id',TRUE) : '';
        $department_id         = $this->input->post('department_id',TRUE) != '' ? $this->input->post('department_id',TRUE) : '';

        $this->db->where('main_user_group_id', $main_user_group_id);
        $this->db->delete('task_distribution_group') or die(json_encode($this->error));
        

        if($department_id !=''){
            $datas = array();

            for($i=0;$i<=count($department_id)-1;$i++){
                $datas[]=array(
                'main_user_group_id'        =>  $main_user_group_id!=''   ? $main_user_group_id: '' ,
                'department_id'             =>  $department_id[$i]!='' ? $department_id[$i] : '' 
                );
            }

            $this->db->insert_batch('task_distribution_group', $datas);      
        }
        

        $this->db->trans_complete();
        return TRUE;
    }catch(Exception $e){
        die(json_encode($this->error));
    }
}





    function ReturnUserGroupPriviledgeList(){
        $user_group_id     =   $this->input->post('user_group_id',TRUE);
        $sql="
            SELECT l.alias_id,  IF( ISNULL( m.user_priviledge_id ) ,  0, 1 ) AS
            status ,l.link
            FROM (
            SELECT a. *
            FROM link_table AS a
            ) AS l
            LEFT JOIN (
            SELECT b.user_priviledge_id, b.alias_id
            FROM user_priviledge AS b
            WHERE b.user_group_id =$user_group_id
            ) AS m ON l.alias_id = m.alias_id

            ORDER BY  alias_id
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }






    function ReturnDeniedAccessLink(){
        $user_group_id     =   $this->input->post('user_group_id',TRUE);
        $sql="
            SELECT * FROM link_table 
            WHERE alias_id IN 
            (SELECT alias_id FROM user_priviledge WHERE user_group_id = $user_group_id)
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }







    function ReturnUserGroupDistributionList(){
        $main_user_group_id     =   $this->input->post('main_user_group_id',TRUE);
        $sql="
            SELECT l.department_id,
            IF(ISNULL( m.main_user_group_id),0,1) 
            AS status,l.department_title 
            FROM 
            (SELECT d. * FROM departments AS d )
            AS l LEFT JOIN (SELECT b.main_user_group_id , b.department_id 
            FROM task_distribution_group AS b WHERE b.main_user_group_id = $main_user_group_id) 
            AS m ON l.department_id = m.department_id 
            ORDER BY  l.department_id
        ";

        $query = $this->db->query($sql);

        return $query->result();
    }





function Isallowed($user_group_id,$alias_id){
    $sql = "SELECT 
    * FROM 
    user_priviledge 
    WHERE user_group_id ='$user_group_id' 
    AND alias_id = '$alias_id' ";
    $query = $this->db->query($sql);

    return $query->num_rows();

}


function isParentAllowed($user_group_id,$alias_id){
    
    $sql = "SELECT 
    * FROM 
    user_priviledge 
    WHERE user_group_id ='$user_group_id' 
    AND alias_id LIKE '$alias_id' ";
    $query = $this->db->query($sql);

    return $query->num_rows();

}











}


?>