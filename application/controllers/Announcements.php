<?php

class Announcements extends MY_Controller {


    private  $error=array(
        'stat'=>'error',
        'msg'=>'Sorry, error has occurred.'
    );


    function __construct(){ // gets called every time the controller is loaded (example: $unit=new Unit_controller()) or when called in url
        // Call the Model constructor

        parent::__construct('Announcements');

        $this->_check_account_not_session();
        $this->load->model('announcementmodel');
        $this->load->model('announcementviewersmodel');
        $this->load->model('Attachment_model');
        $this->load->model('Exception_model');

    }

    function index(){

        // function GetAnnouncementList($id=null,$criteria=null,$department_id=null,$posted_by_user_id=null,$show_date_range=null,$end_range_id=null,$category_id=null)
        $data['departments']=$this->announcementmodel->GetDepartmentList();
        $data['announcements']=$this->announcementmodel->GetAnnouncementList(null,null,null,$this->session->user_account_id);
        $data['groups']=$this->announcementmodel->get_user_group_list();
        $this->load->view('announcements',$data);
    }


    function GetTimeDescriptionList(){
        echo json_encode($this->announcementmodel->GetTimeDescriptionList());
    }

    function GetAnnouncementInfo($id){
        echo json_encode($this->announcementmodel->GetAnnouncementList($id));
    }




    function PublishAnnouncement(){
        /***
         * announcement table : announcement details
         */
        $this->db->trans_start();

        $announce=$this->announcementmodel;
        $m_attachments=$this->Attachment_model;

        $data=array(
            'announce_description'=>$this->input->post('description'),
            'post_shown_date'=>date('Y-m-d',strtotime($this->input->post('start'))),
            'post_expire_date'=>date('Y-m-d',strtotime($this->input->post('end'))),
            'category_id'=>$this->input->post('category'),
            'post_by_user_id'=>$this->session->user_account_id
        );

        //$announce->begin();
        $announce->create( $data );


        /****
         * announcement_viewers table -> list of of department who can view this announcement
         */

        $rows=array();
        $announce_id=$announce->last_insert_id();
        $departments=$this->input->post('departments');
        foreach($departments as $department){
            $rows[]=array(
                        'department_id'=>$department,
                        'announce_id'=>$announce_id
                );
        }
        $this->announcementviewersmodel->create_batch($rows);



        $attachments=$this->input->post('attachments');
        $attach_name=$this->input->post('attach_file_name');
        for($x=0;$x<count($attachments);$x++){
            $m_attachments->announce_id=$announce_id;
            $m_attachments->attachment_directory=$attachments[$x];
            $m_attachments->file_name=$attach_name[$x];
            $m_attachments->save();
        }


        $m_exception=$this->Exception_model;
        $groups=$this->input->post('exception');
        for($x=0;$x<count($groups);$x++){
            $m_exception->announce_id=$announce_id;
            $m_exception->user_group_id=$groups[$x];
            $m_exception->save();
        }


        //$success=$success && $viewers->create_batch( $datas );
        $this->db->trans_complete();

        if(  $this->db->trans_status()===TRUE ){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'Announcement successfully published.',
                    'row_added'=>$this->announcementmodel->GetAnnouncementList($announce_id)
                )
            );
        }


    }


    function UpdateAnnouncement(){
        /***
         * announcement table : announcement details
         */
        $this->db->trans_start();
        $m_attachments=$this->Attachment_model;

        $announce_id=$this->input->post('id');
        $announce=$this->announcementmodel;
        $data=array(
            'announce_description'=>$this->input->post('description'),
            'post_shown_date'=>date('Y-m-d',strtotime($this->input->post('start'))),
            'post_expire_date'=>date('Y-m-d',strtotime($this->input->post('end'))),
            'category_id'=>$this->input->post('category'),
            'post_by_user_id'=>$this->session->user_account_id
        );

        //$announce->begin();
        $announce->update($announce_id, $data );


        /****
         * announcement_viewers table -> list of of department who can view this announcement
         */

        $rows=array();
        $departments=$this->input->post('departments');

        //delete announcement viewers
        $this->announcementviewersmodel->delete($announce_id);

        //then insert new one's
        foreach($departments as $department){
            $rows[]=array(
                'department_id'=>$department,
                'announce_id'=>$announce_id
            );
        }
        $this->announcementviewersmodel->create_batch($rows);



        $m_attachments->delete_via_fk($announce_id);

        $attachments=$this->input->post('attachments');
        $attach_name=$this->input->post('attach_file_name');

        for($x=0;$x<count($attachments);$x++){
            $m_attachments->announce_id=$announce_id;
            $m_attachments->attachment_directory=$attachments[$x];
            $m_attachments->file_name=$attach_name[$x];
            $m_attachments->save();
        }


        $m_exception=$this->Exception_model;
        $groups=$this->input->post('exception');

        $m_exception->delete_via_fk($announce_id);
        for($x=0;$x<count($groups);$x++){
            $m_exception->announce_id=$announce_id;
            $m_exception->user_group_id=$groups[$x];
            $m_exception->save();
        }


        //$success=$success && $viewers->create_batch( $datas );
        $this->db->trans_complete();

        if(  $this->db->trans_status()===TRUE ){
            echo json_encode(
                array(
                    'stat'=>'success',
                    'msg'=>'Announcement successfully updated.',
                    'row_updated'=>$this->announcementmodel->GetAnnouncementList($announce_id)
                )
            );
        }


    }

    function UploadImage(){
        $allowed = array('png', 'jpg', 'jpeg','bmp');

        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($extension), $allowed)){
                die ('{"status":"error"}');
            }

            $upload_path='images/announcements/'.$_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path)){
                echo $upload_path;
                exit;
            }
        }

        die ('{"status":"error"}');
    }


    function UploadAttachment(){

            $data=array();
            $files=array();
            $directory='images/attachments/';



            foreach($_FILES as $file){
                $server_file_name=uniqid('');
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $file_path=$directory.$server_file_name.'.'.$extension;
                $orig_file_name=$file['name'];

                if(move_uploaded_file($file['tmp_name'],$file_path)){
                    $files[]=array('file_path'=>$file_path,'file_name'=>$orig_file_name);
                }

            }


            $response['stat']="success";
            $response['msg']="File successfully uploaded.";
            $response['file_list']=$files;
            echo json_encode($response);





    }


    function  RemoveAnnouncement($id){
        if($this->announcementmodel->update($id,array('is_deleted'=>1))){
            echo json_encode(array('stat'=>'success','msg'=>'Announcement successfully deleted.'));
        }

    }

    function SearchAnnouncements(){
        $criteria=$this->input->get('criteria');
        echo json_encode($this->announcementmodel->GetAnnouncementList(0,$criteria));
    }



}

?>