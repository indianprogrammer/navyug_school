<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends MX_Controller {
	function __construct() 
	{
	parent::__construct();
	$this->load->model('Login_model');
	$this->load->library('form_validation');
	}

public function admin_login()
{
	$this->load->view('adminlogin');
}
public function teacher_login()
{
	$this->load->view('teacherlogin');
}
public function student_login()
{
	$this->load->view('studentlogin');
}


public function admin_login_process() {

$this->form_validation->set_rules('email', 'Email','required');
$this->form_validation->set_rules('password', 'Password','required');
// echo print_r(expression);

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('admin/index');
	
}else{
$this->load->view('adminlogin');
	
}
} else {
$data = array(
'email' => $this->input->post('email'),
'password' => $this->input->post('password')
);
$result = $this->Login_model->login($data);
if ($result == TRUE) {

$email = $this->input->post('email');
$result = $this->Login_model->read_user_information($email);
if ($result != false) {
$session_data = array(

'email' => $result[0]->email
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('admin/index');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('adminlogin', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'email' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('adminlogin', $data);
}
public function ForgotPassword()
   {
         $email = $this->input->post('email');      
         $findemail = $this->Login_model->ForgotPassword($email);  
         echo "dd";
      //    if($findemail){
      //     $this->Login_model->sendpassword($findemail);        
      //      }
      //      else{
      //     $this->session->set_flashdata('msg',' Email not found!');
      //     redirect(base_url().'user/Login','refresh');
      // }
   }
    
}
?>	