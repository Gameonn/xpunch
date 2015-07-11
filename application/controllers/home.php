<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {
function __construct()
{
 parent::__construct();
}
function index()
 {
$current_date=date('Y-m-d');
   if($this->session->userdata('is_logged_in'))
{
$this->load->model('membership_model');
    	$query_model=$this->membership_model->check_punch_in();

// print_r($query_model);
  if($query_model['admin']=='Admin')
  {	
  	
  	$this->load->view('includes/top');
  	$this->load->view('admin_dashboard',$query_model);
  	$this->load->view('includes/bottom');

  }
  else{

   if($query_model['exit']){
 
   	$this->load->view('punch_out',$query_model);
   }
   else{
 	$str1=$this->session->userdata('punch_type');
	$str2='punch in';
	$equal = strcmp($str1, $str2);

if($equal==0)
{

	 $session_data = $this->session->userdata('is_logged_in');
 // die($this->session->userdata('username'));
 $data['username'] = $this->session->userdata('username');
 $data['set']='1';

 $this->db->select('punch_time');
 $this->db->from('xpunch');
 $this->db->where('username',$data['username']);
 $this->db->where('punch_type','punch in');
 $this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')",$current_date);

 $m=$this->db->get();
 $r=$m->result();
foreach ($r as $row) {
$time=$row->punch_time;
}
$data['time']=$time;

 $this->load->view('v_home', $data);
}
else
 {
 	$session_data = $this->session->userdata('is_logged_in');
 // die($this->session->userdata('username'));
 $data['username'] = $this->session->userdata('username');
 // die($data['username']);
 $data['set']='0';
 $this->load->view('v_home', $data);
}
}
}
}
else
{
 //If no session, redirect to login page
  redirect('login', 'refresh');
}

 }
// function logout()
//  {
//  	$this->session->sess_destroy();
//    // $this->session->unset_userdata('logged_in');
//    // session_destroy();
//    redirect('home', 'refresh');
//  }

}

?>
