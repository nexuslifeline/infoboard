<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $params;
    protected $report_params;
    
    private $controller_name;
    private $js_files;
    private $css_files;
    


    public function __construct($controller_name='') {
        parent::__construct();

        $this->params = array();
        $this->params_admin = array();
        $this->report_params = array();

        $this->js_files = array(
            /*'jquery-latest.min.js',
            'dataTables/jquery.dataTables.js' , 
            'dataTables/dataTables.bootstrap.js' , 
            'plugins/input-mask/jquery.inputmask.js',
            'plugins/input-mask/jquery.inputmask.date.extensions.js',
            'plugins/input-mask/jquery.inputmask.extensions.js',
            'plugins/bootbox/bootbox.js',
            'plugins/number/jquery.number.js',
            'script/main.js'*/
        );
        $this->css_files = array(
            /*
            'bootstrap/bootstrap.min.css',
            'datatables/datatables.min.css',
            'style.css'*/
        );
        
        
        $this->controller_name = $controller_name;
        $this->params['controller_name'] = $this->controller_name;

        //$this->_check_account_not_session();

        //$this->load->database();
    }

    protected function load_header_files()
    {
        $include_js = '';
        $include_css = '';

        foreach ($this->css_files as $path)
        {
            $include_css .= sprintf('   <link href="%s" media="screen" rel="stylesheet" type="text/css" />%s',
                base_url('assets/css/' . $path), "\n");
        }

        foreach ($this->js_files as $path)
        {
            $include_js .= sprintf('    <script type="text/javascript" src="%s"></script>%s',
                site_url('assets/js/' . $path), "\n");
        }

        $this->params['css_files'] = $include_css;
        $this->params['js_files'] = $include_js;
    }
    
    protected function add_styles($values)
    {
        $this->css_files = array_merge($this->css_files, (array) $values);
    }

    protected function add_scripts($values)
    {
        $this->js_files = array_merge($this->js_files, (array) $values);
    }

    /* URL Validation for Backend*/
    
    public function _check_account_session(){
        if($this->session->userdata("user_account_id")){
             redirect(base_url()."Dashboard");
        }
     }

     
    public function _check_account_not_session(){
        if(!$this->session->userdata("user_account_id")){
            redirect(base_url().'Login');
        }
        
     }
     
    /*Account Logout */
    public function logout_account(){
        
        $this->session->unset_userdata("user_account_id");   
        session_destroy();
        redirect(base_url().'Login');
    }


}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */