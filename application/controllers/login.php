      <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      session_start();
      class Login extends CI_Controller {

        function __construct()
        {
         parent::__construct();
         $this->load->helper('date');
         date_default_timezone_set("Asia/Calcutta");


      //   if($this->session->userdata('is_logged_in')){
      // // $this->load->view('v_home');
      // } else {
      //      // $this->load->view('login_form');
      // }
       }

       function already_set(){
        if($this->session->userdata('is_logged_in')){
          redirect('home');
        } else {
           // $this->load->view('login_form');
        }
      }
      function index() {
        $this->already_set();
        $this->load->view('includes/header');
              // $this->load->view('login_form');
        $this->load->view('v_home');    
               $this->load->view('includes/footer'); //load view for login
             }

             function validate_credentials(){

               $this->load->model('membership_model');
               $query=$this->membership_model->validate();

               if($query){

                $data=array(

                  'username'=>$this->input->post('username'),
                  'is_logged_in'=>true
                  );
                $this->session->set_userdata($data);
                  // die($data);
                redirect('index.php/home');
              }
              else{
                  // $this->form_validation->set_message('validate_credentials',"Incorrect email or password. Please try again" );
                $this->index();
              }
            }
            function signup(){
             $this->already_set();
             $this->load->view('includes/header');
             $this->load->view('signup_form');
             $this->load->view('includes/footer');
           }

           function create_member(){
             $this->load->library('form_validation');
             $this->form_validation->set_rules('first_name','Name','trim|required');
             $this->form_validation->set_rules('last_name','Last Name','trim|required');
             $this->form_validation->set_rules('email','Email Address','trim|required|valid_email|callback_check_if_email_exists');  
             $this->form_validation->set_message('check_if_email_exists', 'Email already in use');
             $this->form_validation->set_rules('username','Username','trim|required|min_length[3]|callback_check_if_username_exists');
             $this->form_validation->set_message('check_if_username_exists', 'Username already in use');
             $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[40]');
             $this->form_validation->set_rules('password_confirm','Password Confirmation','trim|required|matches[password]');

             if ($this->form_validation->run()==FALSE)
             {  
              $this->load->view('includes/header');
              $this->load->view('signup_form');
              $this->load->view('includes/footer');
            }  
            else{
              $data=$this->input->post();
              $this->load->model('membership_model');
              if($query=$this->membership_model->create_member($data))
              {
                $this->db->select('id');
                $this->db->from('users');
                $this->db->where('username',$data['username']);
                $m=$this->db->get();
                $mid=$m->result();


                if($query){
                  $data=array(
                    'user_id'=>$mid,
                    'username'=>$data['username'], 
                    'is_logged_in'=>true
                    );
                  $this->session->set_userdata($data);
                  
                  redirect('index.php/home');
                }
                else{
                  // $this->form_validation->set_message('validate_credentials',"Incorrect email or password. Please try again" );
                  $this->index();
                }
              }
              else{
                $this->load->view('includes/header');
                $this->load->view('signup_form');
                $this->load->view('includes/footer');
              } 
            }
          }

          function check_if_username_exists($requested_username){
            $this->load->model('membership_model');
            $username_available=$this->membership_model->check_if_username_exists($requested_username);

            if($username_available){
              return TRUE;

            }
            else{
              return FALSE;
            }}  

            function timespan(){
              $this->load->model('membership_model');
              $username_available=$this->membership_model->time_check();


            }

            function check_if_email_exists($requested_email){
              $this->load->model('membership_model');
              $email_available=$this->membership_model->check_if_email_exists($requested_email);
              if($email_available){
                return TRUE;
              }
              else{
                return FALSE;
              }}

              function punch_in($flag){
               if($flag==1){
                $this->load->model('membership_model');
                $query=array();
                $query=$this->membership_model->punch_time();

                if($query){

                 $data=array(
                   'username'=>$query['username'],
                   'set'=>'1',
                   'punch_type'=> $query['punch_type']
              // 'punch_time'=>$query[punch_time]
              // 'punch_time'=> $this->db->select('punch_time');
              // $this->db->from('members');
              // $this->db->where('username',username);
                   );
                 $this->session->set_userdata($data);
             // die($data['punch_time']);
                 redirect('home', 'refresh');

               }
               
             }
           }
           function punch_out(){

            $this->load->model('membership_model');
            $query=$this->membership_model->time_out();

            if($query){
             $data=array(
              'username'=>$query['username'],
              'set'=>'0',
              'punch_type'=> $query['punch_type']
              );
             $this->session->set_userdata($data);
             $this->session->unset_userdata('is_logged_in','punch_type','user_id');
             $this->session->set_userdata('punch_type');
             $this->session->set_userdata('user_id');
             session_destroy();
             
        // $this->load->view('v_home',$data);

           }
           redirect('home', 'refresh');

         }

         function msg(){
          $r=$this->input->post();
          $this->load->model('membership_model');
          $q1=$this->membership_model->msg_save($r); 

          $this->load->view('punch_out',$q1);
        }

        function delete(){
         $this->load->model('membership_model');
         $q1=$this->membership_model->delete_user(); 
         $q2=$this->membership_model->check_punch_in();
              // $msg = $this->session->flashdata($query['msg']);
         $q3=array_merge_recursive($q1,$q2);   
         $this->load->view('includes/top');
         $this->load->view('admin_dashboard',$q3);
         $this->load->view('includes/bottom');
       }

       function change(){
        $this->load->view('includes/top');
        $this->load->view('change_password');
        $this->load->view('includes/bottom');

      }

      function password(){

        $re=$this->input->post();
        
        $this->load->model('membership_model');
        $q1=$this->membership_model->change_pwd($re); 
          //    $q2=$this->membership_model->check_punch_in();
          //     // $msg = $this->session->flashdata($query['msg']);
          //    $q3=array_merge_recursive($q1,$q2);  
          // print_r($q1);

        
        if($q1['update']==1){
         $this->session->unset_userdata('is_logged_in','punch_type','user_id');
         $this->session->set_userdata('punch_type');
         $this->session->set_userdata('user_id');
         session_destroy();
         redirect('home', 'refresh');
       }
       else{
        $this->load->view('includes/top');
        $this->load->view('change_password',$q1);
        $this->load->view('includes/bottom');  
      }
    }

    function all_users(){

     if($this->session->userdata('is_logged_in'))
     {
       $data['username'] = $this->session->userdata('username');
       if($data['username'] =='admin'){
         $session_data = $this->session->userdata('is_logged_in');
       // die($this->session->userdata('username'));


       // $this->load->view('v_home', $data);

         $this->load->model('membership_model');
         $query =  $this->membership_model->get_users();
           // die($query);

           // if($query){
         $data['query']=$query;
              // print_r($data);
              // die($data);
         $this->load->view('includes/top');
         $this->load->view('users',$data);
         $this->load->view('includes/bottom');


       }
     }
     else
     {
       //If no session, redirect to login page
      redirect('login', 'refresh');
    }

  }

  function users_present(){
   if($this->session->userdata('is_logged_in'))
   {
     $data['username'] = $this->session->userdata('username');
     if($data['username'] =='admin'){
       $session_data = $this->session->userdata('is_logged_in');
       $this->load->model('membership_model');
       $query =  $this->membership_model->get_present();

       $data['query']=$query;

       $this->load->view('includes/top');
       $this->load->view('present',$data);
       $this->load->view('includes/bottom');


     }
   }
   else{}
 }

function notification(){
  $this->load->model('membership_model'); 
  $q1=$this->membership_model->notify();

  $q2=$this->membership_model->check_punch_in(); 
  $q3=array_merge($q1,$q2);   
  $data['pop']=$q1;
  $this->load->view('includes/top');
  $this->load->view('notifications',$data);
  $this->load->view('includes/bottom');
}

function message_show(){
  $this->load->model('membership_model'); 
  $q1=$this->membership_model->get_msg();

  $q2=$this->membership_model->check_punch_in(); 
  $q3=array_merge($q1,$q2);   
  $data['message']=$q1;
  $this->load->view('includes/top');
  $this->load->view('messages',$data);
  $this->load->view('includes/bottom');
}

function approve(){
  $this->load->model('membership_model'); 
  $query=$this->membership_model->a_user();
  $data['query']=$query;
  $this->load->view('includes/top');
  $this->load->view('approve',$data);
  $this->load->view('includes/bottom');
}
function awaited($id){
  //   echo $id;
  // die('fsd');
  $this->load->model('membership_model'); 
  $q1=$this->membership_model->approve_user($id);
  $q2=$this->membership_model->check_punch_in();
  $q3=array_merge($q1,$q2);   
  $this->load->view('includes/top');
  $this->load->view('admin_dashboard',$q3);
  $this->load->view('includes/bottom');
}

function track(){
  
 $this->load->model('membership_model');
               $query=$this->membership_model->validate();

               if($query){

                $data=array(

                  'username'=>$this->input->post('username'),
                  'is_logged_in'=>true
                  );
                $this->session->set_userdata($data);
                  // die($data);
                redirect('index.php/home');
              }
              // else{
              //     // $this->form_validation->set_message('validate_credentials',"Incorrect email or password. Please try again" );
              //   $this->index();
              // }
            }
            
function reset(){

  $this->load->model('membership_model');
  $q1=$this->membership_model->check_reset();
  $q2=$this->membership_model->check_punch_in();
              // $msg = $this->session->flashdata($query['msg']);
  $q3=array_merge($q1,$q2);   
  $this->load->view('includes/top');
  $this->load->view('admin_dashboard',$q3);
  $this->load->view('includes/bottom');
}
function logout(){
  $this->session->unset_userdata('is_logged_in','punch_type','user_id');
  $this->session->set_userdata('punch_type');
  $this->session->set_userdata('user_id');
  session_destroy();
  redirect('home', 'refresh');
}		
}

