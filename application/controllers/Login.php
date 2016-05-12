<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct()
    {
        parent::__construct();
   		$this->load->model('LoginProcessModel');

    }

    function index()
    {


    	$data['item'] =' Login';
    	$data['name'] =' Infoboard';
        $this->load->helper(array('form'));
        $this->load->view('login',$data);
    }


  



    function login_account(){
      
      	$login_m = new LoginProcessModel();

  	   $username 		= $this->input->post('username');
	   $passwordlogin 	= $this->input->post('password');
       //$password 		= sha1($passwordlogin);

	   $result = $login_m->login($username,$passwordlogin);


		if($result==TRUE){

			   foreach ($result as $item) {
			   	$ua_id 		= $item->user_account_id;
			   	$user_group = $item->user_group_title;
			   }

			   $details = $login_m->getUserDetails($ua_id,$user_group);


				if($details==TRUE)
		        {
		            $sess_array = array();
		            foreach($details as $row)
		            {
		                $sess_array = array(
		                    'user_account_id'   	=> $row->user_account_id,
		                    'username'          	=> $row->username,
		                    'fullname'          	=> $row->firstname." ".$row->middlename." ".$row->lastname,
		                    'firstname'          	=> $row->firstname,
		                    'middlename'          	=> $row->middlename,
		                    'lastname'          	=> $row->lastname,
		                    'user_group'          	=> $row->user_group_id,
		                    'department_id'         => $row->department_id,
		                );
		                
		            }
		            $this->session->set_userdata($sess_array);
		            $stat = TRUE;
					$msg = 'Success! Please wait...';
					$title  ='Success ! ';
					$type  ='success';
		        }
		        else
		        {
		           

		            $stat = FALSE;
					$msg = 'Incorrect username or password.';
					$title  ='Failed! ';
					$type  ='error';
		        }

		}else {


		            $stat = FALSE;
					$msg = 'Incorrect username or password.';
					$title  ='Failed! ';
					$type  ='error';


		}
	   echo json_encode(array(
		       				  'title' =>    $title,
		                      'stat'  =>    $stat,
		                      'msg'   =>    $msg,
		                      'type'  =>    $type,
		                  ));

	}



    /*Account Logout */
    function logout_account(){
        
        $this->session->unset_userdata("user_account_id");   
        session_destroy();
        redirect(base_url().'Login');
    }




}
?>