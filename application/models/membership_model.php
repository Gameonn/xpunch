

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Membership_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function validate(){
        $user=$this->input->post('username');
        $this->db->where('username',$user);
        $this->db->where('password',md5($this->input->post('password')));

        $query=$this->db->get('users');
        $q=$query->result();
        
        if($query->num_rows==1){
                    foreach ($q as $row) {
          $m=$row->id;
        }
         $this->session->set_userdata('user_id',$m);

            $this->db->select('*');
            $this->db->from('xpunch');
            $this->db->where('username',$user);
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $go=$this->db->get();
            $gone=$go->result();
            

            // die('dssfdsdf');
            if($go->num_rows==1){
                foreach ($gone as $row) {
                   
                   $entry=$row->punch_type;
                   $entry_date=$row->punch_time;
                }
                    
               $dt = new DateTime($entry_date);

                $date = $dt->format('Y-m-d');
                $time = $dt->format('H:i:s');
                $current_date=date('Y-m-d');  
             
            if($entry='punch in' && $date<$current_date){
                $new_exit_punch_data=array(
            'username'=>$user,
            'userid'=>$m,
            'punch_time'=>$date.' 21:00:00',
            'punch_type'=>'punch out'
            );
     
        $exit_punch_data=$this->db->insert('xpunch',$new_exit_punch_data);


  $note=array(
        'title'=>$user." has punched out",
        'time'=>$date.' 21:00:00',
        'type'=>'punch out'
           );

$note_success=$this->db->insert('notifications',$note);

            }
            }     
            return true;
        }
    }
    function create_member($data){

        // $username=$data['username'];
        $new_member_insert_data=array(
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email'],
            'username'=>$data['username'],
            'password'=>md5($data['password']),
            'status'=>'Inactive'
            );

        $insert=$this->db->insert('users',$new_member_insert_data);
        $note=array(
        'title'=>$data['username']." is registered",
        'time'=>date('Y-m-d H:i:s'),
        'type'=>'Registered'
           );

$note_success=$this->db->insert('notifications',$note);
         return $insert;
              
    }
    function check_if_username_exists($username){
        $this->db->where('username',$username);
        $result=$this->db->get('users');
        if($result->num_rows()>0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    function get_users(){
        $this->db->select('*');
$this->db->from('users');
$this->db->where('status','Active');
// $this->db->join('xpunch', 'xpunch.username = users.username','left');
$query = $this->db->get();
// die($query);
         // $sql = $this->db->query('SELECT username FROM users ORDER BY username ASC');

        // $sql=$this->db->get('users');
        // print_r($sql->result());
        // die($sql->result());
    return $query->result();
    }

        function get_present(){
      $current_date=date('Y-m-d');      
        $this->db->select('*');
$this->db->from('xpunch');
$this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')", $current_date);
$this->db->join('users','users.username = xpunch.username');
$query = $this->db->get();

    return $query->result();
    }
    function punch_time(){
          $username=$this->session->userdata('username');
          $userid=$this->session->userdata('user_id');
        $new_punch_data=array(
            'userid'=>$userid,
            'username'=>$username,
            'punch_time'=>date('Y-m-d H:i:s'),
            'punch_type'=>'punch in'
            );
      // die($new_punch_data);
        $punch_data=$this->db->insert('xpunch',$new_punch_data);

        $note=array(
        'title'=>$username." has punched in",
        'time'=>date('Y-m-d H:i:s'),
        'type'=>'punch in'
           );

$note_success=$this->db->insert('notifications',$note);
// die($punch_data);
        return $new_punch_data;
    }
    function check_punch_in(){
     $username=$this->session->userdata('username');
    $current_date=date('Y-m-d');
  

    if($username!='admin'){
    $this->db->select('*');
    $this->db->from('xpunch');
    // $this->db->where("(xpunch.username ='$as') AND (xpunch.punch_time = 'date('Y-m-d H:i:s')')");
   $this->db->where('username',$username);
     $this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')", $current_date);
   $in=$this->db->get();
      $in_result= $in->result();
    
      $this->db->select('*');
      $this->db->from('users');
       $this->db->where('username',$username);
      $this->db->where('status','Active');
      $act=$this->db->get();
      $active=$act->result();

      if($active){

    if($in_result){
  foreach ($in_result as $row) {
    $punch_entry=$row->punch_type;
    // die($punch_entry);
}
if($punch_entry=='punch out'){
 $data['admin']="not";
$data['exit']="You have punched out for the day";
return $data;
}
else{

     $this->session->set_userdata('punch_type','punch in');
  }
}
else{
     $this->session->set_userdata('punch_type'); 
}
}
else{
    $data['admin']="not";
   $data['exit']="You account confirmation is pending. After your account is confirmed, login again.";
return $data; 
}
}

  else{ 
    
      $current_date=date('Y-m-d');

        $this->db->select('*');
$this->db->from('users');
$this->db->where('status','Active');
$users = $this->db->get();
    $all= $users->result();


$this->db->select("count(punch_type) as count,DATE(punch_time) as my_date");
$this->db->from("xpunch");
// $this->db->order_by("punch_time", "ASC");
$this->db->where("punch_type","punch in");
 
$day = strtotime("-6 day");
$end = strtotime('+1 day');
$dates = array(); 
while($day < $end)
{
    $dates[] = date('Y-m-d', $day); // modified
    $day = strtotime("+1 day", $day) ;
}

$this->db->where_in("DATE_FORMAT(punch_time,'%Y-%m-%d')",$dates);
$this->db->group_by('my_date');
$one=$this->db->get();
$day=$one->result();

// print_r($day);
$this->db->select('*');
$this->db->from('xpunch');
$this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')", $current_date);
$this->db->where('punch_type','punch in');
$present=$this->db->get();
$some=$present->result();

$this->db->select('*');
$this->db->from('xpunch');
$this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')", $current_date);
$this->db->where('punch_type','punch out');
$p1=$this->db->get();
$pout=$p1->result();

$this->db->select('*');
$this->db->from('users');
$this->db->where('status','Inactive');
$p=$this->db->get();
$approve=$p->result();

$this->db->select('*');
$this->db->from('message');
$p=$this->db->get();
$msg=$p->result();

$data=array(
            'admin'=>'Admin',
            'all_users'=>$all,
            'present_today'=>$some,
            'present_each_day'=>$day,
            'approval'=>$approve,
            'punch_out'=>$pout,
            'message'=>$msg
            );
return $data;
   
  }
}

function delete_user(){
 $user= $this->input->post('username');
$this->db->select('*');
$this->db->from('users');
$this->db->where('username', $user);
$delete=$this->db->get();
$d= $delete->result_array();


if(count($d)){

$this->db->where('username', $user);
$this->db->delete('users');

$data['reset']="User Deleted Successfully";
return $data;
}
else{

$data['reset']="No Such User Exists";
return $data;
} 
}


function msg_save($resp){

        
  $username=$this->session->userdata('username');
   // $userid=$this->session->userdata('user_id');
        $new_message_data=array(
            'username'=>$username,
            'userid'=>$resp['userid'],
            'email'=>$resp['email'],
            'message'=>$resp['options']
            );
       $message_data=$this->db->insert('message',$new_message_data);
        return $message_data;

      
        if($resp['options']=='Approve Registration'){

            $data['admin']="not";
   $data['exit']="You account confirmation is pending. After your account is confirmed, login again.";

        }
        else{
  $data['admin']="not";
   $data['exit']='You have punched out for the day';

        }


return $data; 
}


function a_user(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('status','Inactive');
    $app= $this->db->get();
$app_user= $app->result();
  // print_r($app_user);
  // die('fsdf');
    return $app_user;
}

function time_check(){

   $current_date=date('Y-m-d');

        $this->db->select('*');
$this->db->from('users');
$this->db->where('status','Active');
$users = $this->db->get();
    $all= $users->result();

foreach ($all as $row) {

// $this->db->select("ADDTIME(punch_time) as sum,punch_time");
$this->db->select("punch_time,DATE(punch_time) as my_date,username");
$this->db->from("xpunch");
// $this->db->order_by("punch_time", "ASC");
$this->db->where("punch_type","punch in");
$this->db->where("userid",$row->id);
 
$day = strtotime("-6 day");
$end = strtotime('+1 day');
$dates = array(); 
while($day < $end)
{
    $dates[] = date('Y-m-d', $day); // modified
    $day = strtotime("+1 day", $day) ;


}

$this->db->where_in("DATE_FORMAT(punch_time,'%Y-%m-%d')",$dates);
$this->db->group_by('my_date');
$one=$this->db->get();
$in[]=$one->result();
// $this->db->select("ADDTIME(punch_time) as sum");
$this->db->select("punch_time,DATE(punch_time) as my_date");
$this->db->from("xpunch");
// $this->db->order_by("punch_time", "ASC");
$this->db->where("punch_type","punch out");
$this->db->where("username",$row->username);
$this->db->where_in("DATE_FORMAT(punch_time,'%Y-%m-%d')",$dates);
$this->db->group_by('my_date');
$one=$this->db->get();
$out=$one->result();

}
// print_r($in);
// echo "<br>";

// print_r($out);
// die('fsd');


}

function approve_user($id){

$d = array(
           'status' => 'Active'
               );



$this->db->where('id', $id);
$this->db->update('users', $d);
$data['reset']="User Registeration Successful";
return $data;
}

function notify(){
    $this->db->select('*');
    $this->db->from('notifications');
    $this->db->order_by('time','DESC');
    $n=$this->db->get();
$notes=$n->result();
  
    return $notes;

}

function get_msg(){
    $this->db->select('*');
    $this->db->from('message');
    $this->db->order_by('id','DESC');
    $n=$this->db->get();
$notes=$n->result();
  
    return $notes;

}
function time_out(){

        $username=$this->session->userdata('username');
           // die($username);
        $new_exit_punch_data=array(
            'username'=>$username,
            'userid'=>$this->session->userdata('user_id'),
            'punch_time'=>date('Y-m-d H:i:s'),
            'punch_type'=>'punch out'
            );
     
        $exit_punch_data=$this->db->insert('xpunch',$new_exit_punch_data);
  $note=array(
        'title'=>$username." has punched out",
        'time'=>date('Y-m-d H:i:s'),
        'type'=>'punch out'
           );

$note_success=$this->db->insert('notifications',$note);
        return $new_exit_punch_data;  
    }
    

  function check_reset(){

$current_date=date('Y-m-d');

$this->db->select('*');
$this->db->from('xpunch');
$this->db->where('username', $this->input->post('username'));
$this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')",$current_date);
$this->db->where('punch_type','punch out');
$reset=$this->db->get();
$r= $reset->result();

// echo count($r);
// die('fdsf');
if(count($r)){
   
$this->db->where('username', $this->input->post('username'));
$this->db->where("DATE_FORMAT(punch_time,'%Y-%m-%d')",$current_date);
$this->db->where('punch_type','punch out');
$this->db->delete('xpunch');

$data['reset']="User Reset Successful";
return $data;
}
else{

$data['reset']="No Reset Required";
return $data;
}

}

function change_pwd($udata){
    
    $user= $this->session->userdata('username');

 $this->load->library('form_validation');
  $this->db->where('username',$user);
        $this->db->where('password',md5($this->input->post('password')));

        $q=$this->db->get('users');
        $query=$q->result();
     // echo count($query);
        if(count($query)){
       
        $this->form_validation->set_rules('password_new','New Password','trim|required|min_length[4]|max_length[40]');
        $this->form_validation->set_rules('password_confirm','Password Confirmation','trim|required|matches[password_new]');
         
        
            if ($this->form_validation->run()==FALSE)
   {  
  $data['reset']="Password doesnot match";
$data['update']="0";
return $data;

}   
else{
    $update=$this->input->post();
   
    $d = array(
               'password' => md5($update['password_new'])
              
            );

$this->db->where('username', $user);
$this->db->update('users', $d);
$data['reset']="Password successfully changed";
$data['update']="1";
return $data;
}
        }
        else
         { 
            $data['reset']="Enter valid password"; 
            $data['update']="0";
         return $data;
         }  
    }
    function check_if_email_exists($email){
    
        $this->db->where('email',$email);
        $result=$this->db->get('users');
        if($result->num_rows()>0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}

