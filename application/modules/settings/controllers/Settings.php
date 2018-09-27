<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->model('Login_model');
         date_default_timezone_set("Asia/Kolkata");

    }
    function settingView()
    {
         $data['_view'] = 'setting';
    $this->load->view('index',$data);
    }
    function changeAutoLogoutStatus()
    {   
       
        $status=$this->input->get('status');
        $username=$this->session->username;
        $this->db->where('username',$username);
        $this->db->set('auto_logout_status',$status);
        return $this->db->update('authentication');

    }
}

// }
?>