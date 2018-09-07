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
		$data['userdata']=$this->Profile_model->get_user_info($username,$authenticationId);
// var_dump($data['userdata']);die
		$this->load->view('profile',$data);
	}

	function changePassword()
	{	
		$id=$this->input->post('auth_id');
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
	function checkpassword()
	{
		$password=$this->input->post('password');
		echo json_encode($this->load->Profile_model->check_password($password));

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
			redirect('profile/adminProfile');
		}
		else
		{
// $this->load->view('profile');
			redirect('profile');
		}
	}
	function adminProfile()
	{
		$username=$this->session->username;
		$authenticationId=$this->session->authenticationId;
## get details through username
		$data['userdata']=$this->load->Profile_model->get_admin_info($username,$authenticationId);
// var_dump($data['userdata']['auth_id']);die;
		$this->session->profileImage=$data['userdata']->profile_image;
		$data['_view'] = 'profile';
// $this->load->view('../index',$data);
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