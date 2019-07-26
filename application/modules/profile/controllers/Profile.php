<?php


class Profile extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');

	}

	function index()
	{	 $data['title']="User Profile";
	$username=$this->session->school_username;
	$authenticationId=$this->session->authenticationId;
## get details through username
	$data['userdata']=$this->Profile_model->get_user_info($username,$authenticationId);
	// var_dump($data['userdata']);die;
	$this->load->view('profile',$data);
}

function changePassword()
{	
	$id=$this->session->user_id;
	$newpasswordMd5=md5($this->input->post('newpassword'));
	$newpassword=$this->input->post('newpassword');
	$changepw=array(
		'password'=>$newpasswordMd5,
		'clear_text'=>$newpassword

	);
	$this->Profile_model->update_col('table_login',array('auth_id'=>$id),$changepw);
}
function check_username()
{
	$username=$this->input->post('username',1);
	$result=$this->Profile_model->check_user_name($username);
	if($result)
	{
		echo json_encode($result);

	}
	else
	{
		echo json_encode([]);
	}
}
function change_username()
{
	$username=$this->input->post('username',1);
	$data=array('username'=>$username);
	$id=$this->session->user_id;
			## check username exist or not
	$check=$this->Profile_model->select_id('table_login',$data,array('auth_id'));
	if(!$check)
	{
		$result=$this->Profile_model->change_user_name($data,$id);
		if($result)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		echo 0;
	}
}    
function checkpassword()
{
		// $password=$this->input->post('password');
		// echo json_encode($this->load->Profile_model->check_password($password));

	$password=trim($this->input->post('password'));
	$user_id=$this->session->user_id;
	$condition=array('auth_id'=>$user_id,'password'=>md5($password));
	$password_check=$this->Profile_model->select('table_login',$condition,array('auth_id'));
		  // $password_check= modules::run('api_call/api_call/call_api',''.api_url().'profile/checkPassword',$params,'POST');
		  	// print_r($password_check);
	if($password_check)
	{
		echo json_encode($password_check[0]);
		    // echo json_encode($this->load->Profile_model->check_password($password));
	}
	else
	{
		echo json_encode([]);
	}

}
function updateProfile()
{
	$config['upload_path']          = './uploads/';
	$config['allowed_types']        = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$params = array(

		'name' => $this->input->post('name'),
// 'qualification' => @$this->input->post('qualification'),
		'email' => $this->input->post('email'),
		'mobile' => $this->input->post('mobile'),
		'permanent_address' => $this->input->post('paddress'),

		'temporary_address' => $this->input->post('taddress')

	);
	$authorization_id =$this->input->post('authentication_id');
	$user_id =$this->input->post('user_id');
	if($this->upload->do_upload('profile_image'))
	{
		$data['image'] =  $this->upload->data();
		$image_path=$data['image']['raw_name'].$data['image']['file_ext'];
		$params['profile_image']=$image_path;
	}
// var_dump($params);
	$profileId = $this->Profile_model->update_profile($params,$user_id,$authorization_id);
	if($authorization_id==1)
	{
		redirect('profile/my_profile');
	}
	else
	{
// $this->load->view('profile');
		redirect('profile');
	}
}
function my_profile()
{
	$username=$this->session->school_username;
	$authenticationId=$this->session->authenticationId;
	$user_id=$this->session->user_id;
## get details through username
	$data['userdata']=$this->load->Profile_model->get_admin_info($user_id,$authenticationId);
		// print_r($data['userdata']);die;
	$this->session->profileImage=$data['userdata']->profile_image;
	$data['_view'] = 'profile';

	$this->load->view('index',$data);
}
function logout()
{
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('authenticationId');
// $this->session->unset_userdata('profileImage');
	$this->session->sess_destroy();
	redirect('login');
}
}
?>