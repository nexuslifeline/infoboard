<?php

class CourseManagementModel extends CI_Model {
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


    function ReturnCourseList(){
        $rows=array();
        $sql="SELECT CONCAT_WS('|', 
        c.course_id,
        c.course_title, 
        c.course_desc,
        c.course_code,
        d.department_id  
        )AS hidden, 
        c.*,d.department_title 
        FROM courses c 
        INNER JOIN departments AS d ON c.department_id = d.department_id 
        WHERE C.active=1
            ";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }




    function CreateCourse(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $data = array(
                
                'course_code' => $this->input->post('course_code',TRUE),
                'course_title' => $this->input->post('course_title',TRUE),
                'department_id' => $this->input->post('department_id',TRUE),
                'course_desc'  => $this->input->post('course_desc',FALSE),
                
            );

            $this->db->set('date_created', 'NOW()', FALSE);
            $this->db->insert('courses',$data) or die(json_encode($this->error));
            $this->affected_id=$this->db->insert_id();  //last insert id, the user role

            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }



    function UpdateCourse(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $course_id=$this->input->post('id',TRUE);

            $data = array(
                'course_code' => $this->input->post('course_code',TRUE),
                'course_title' => $this->input->post('course_title',TRUE),
                'department_id' => $this->input->post('department_id',TRUE),
                'course_desc'  => $this->input->post('course_desc',FALSE),
                
            );

            $this->db->where('course_id',$course_id);
            $this->db->update('courses',$data) or die(json_encode($this->error));
            $this->affected_id=$course_id;



            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }

     function RemoveCourse(){
        try{
            //array of data to be inserted
            $this->db->trans_start(); //start transaction
            $course_id=$this->input->post('id',TRUE);
            $this->db->set('active',0);
            $this->db->where('course_id',$course_id);
            $this->db->update('courses') or die(json_encode($this->error));
            $this->affected_id=$course_id;
            $this->db->trans_complete(); //end transaction
            return true;

        }catch(Exception $e){
            die(json_encode($this->error));
        }
    }




    function ReturnLastAffectedRowDetails(){
        $rows=array();
        $sql="SELECT CONCAT_WS('|', 
        c.course_id,
        c.course_title, 
        c.course_desc,
        c.course_code,  
        d.department_id
         )AS hidden, 
        c.*,d.department_title 
        FROM courses c 
        INNER JOIN departments AS d ON c.department_id = d.department_id 
        WHERE 
        c.course_id=".$this->affected_id;
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) //this will return only 1 row
        {
            $rows[]=$row; //assign each row of query in array
        }

        return $rows;
    }









}


?>