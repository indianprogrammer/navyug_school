<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLoginController extends MX_Controller {
	function __construct() 
	{
	parent::__construct();
	$this->load->model('Admin_model');
	$this->load->library('form_validation');
	}
public function index() {
	$results = $this->unlinkInstaller();

        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php/institute/AdminController/dashboard', 'refresh');

        if ($results['RESULT'] == 'INVALID' || $results['RESULT'] == 'EMPTY' || $results['RESULT'] == 'INVALID_DOMAIN') {
            $this->load->view('error');
        } else {
            $this->load->view('adminlogin');
        }
    }


 function forgot_password()
    {
        $this->load->view('admin/forgotpassword');
    }
     //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        								}

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request
    function validate_login($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => $password);


        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->id);
           
            $this->session->set_userdata('email', $row->email);
           
            return 'success';
        }
        return 'invalid';
}
}
?>