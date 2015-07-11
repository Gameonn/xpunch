<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_verifyLogin extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->model('m_login','login',TRUE);
        $this->load->helper(array('form', 'url','html'));
        $this->load->library(array('form_validation','session'));
    }
 
    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
        if($this->form_validation->run() == FALSE) {
            $this->load->view('v_login',$data);
            } else {
                //Go to private area
                redirect(base_url('c_home'), 'refresh');
            }       
     }
 
     function check_database($password) {
         //Field validation succeeded.  Validate against database
         $username = $this->input->post('username');
         //query the database
         $result = $this->login->login($username, $password);
         if($result) {
             $sess_array = array();
             foreach($result as $row) {
                 //create the session
                 $sess_array = array('id_admin' => $row->id_admin,
                     'name_admin' => $row->name_admin);
                 //set session with value from database
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
          return TRUE;
          } else {
              //if form validate false
              $this->form_validation->set_message('check_database', 'Invalid username or password');
              return FALSE;
          }
      }
}
/* End of file c_verifylogin.php */
/* Location: ./application/controllers/c_verifylogin.php */