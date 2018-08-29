<?php


class Profile extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
  
    }

function index()
{
	$username=$this->session->username;
	$authenticationId=$this->session->authenticationId;
	## get details through username
	 $data['userdata']=$this->load->Profile_model->get_user_info($username,$authenticationId);
	 // var_dump($data['userdata']);die
	  $this->load->view('profile',$data);
}

function changePassword()
{	
	$id=$this->input->post('user_id');
	$newpasswordMd5=md5($this->input->post('newpassword'));
	$newpassword=$this->input->post('newpassword');
	$changepw=array(
'password'=>$newpasswordMd5,
'clear_text'=>$newpassword

	);
	$this->Profile_model->change_password($changepw,$id);
}
function checkUserName()
{
	echo json_encode($this->Profile_model->check_user_name($this->input->post('username')));

}
function changeUserName()
{
	$username=$this->input->post('username');
	$data=array('username'=>$username);
	$id=$this->input->post('auth_id');
echo json_encode($this->Profile_model->change_user_name($data,$id));
}    
}
?>