<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
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
function organization_profile()
{
    $school_id=$this->session->SchoolId;
        // echo $school_id;
    $condition=array('id'=>$school_id);
    $data['school_info']=$this->Setting_model->select_id('table_school',$condition,array('*'));
        // print_r($data['school_info']);die;
    $data['_view'] = 'organization_profile';
    $this->load->view('index',$data);
}
function menu_setting()
{
    $school_id=$this->session->SchoolId;
        ##fetch school setting
    $condition=array('school_id'=>$school_id);
    $menu=$this->Setting_model->select_id('table_school_setting',$condition,array('menu'));

    $data['menu']=json_decode($menu['menu'],1);
    
    $data['_view'] = 'menu_setting';
    $this->load->view('index',$data);

}

function update_menu_setting()
{

     $school_id=$this->session->SchoolId;
         ##fetch school setting
    $condition=array('school_id'=>$school_id);
    $params=array( 
        'student'=>  strip_tags($this->input->post('student',1)),
        'dashboard'=> strip_tags($this->input->post('dashboard',1)), 
        'account'=> strip_tags($this->input->post('account',1)), 
        'staff'=> strip_tags($this->input->post('staff',1)), 
        'classes'=> strip_tags($this->input->post('classes',1)), 
        'subjects'=> strip_tags($this->input->post('subjects',1)), 
        'parents'=> strip_tags($this->input->post('parents',1)), 
        'ticket'=> strip_tags($this->input->post('ticket',1)), 


    );
    $jsonParams=array('menu'=>json_encode($params));
    $menu=$this->Setting_model->update_col('table_school_setting',$condition,$jsonParams);
    if($menu=='success')
    {
    $this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully updated'
  
);
}
else
{
     $this->session->alerts = array(
  'severity'=> 'danger',
  'title'=> 'not updated'
  
);
}
redirect('settings/menu_setting');



}










}
?>