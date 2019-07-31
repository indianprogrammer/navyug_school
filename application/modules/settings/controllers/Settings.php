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
    $username=$this->session->school_username;
    $this->db->where('username',$username);
    $this->db->set('auto_logout_status',$status);
    return $this->db->update('authentication');

    }
function organization_profile()
{

        $school_id=$this->session->SchoolId;
    if($this->input->post())
    {
        $primary_contact=$this->input->post('p_contact',1);
        $sec_contact=$this->input->post('sec_contact',1) ;
        $email=$this->input->post('email',1) ;
        $organization_name=$this->input->post('organization_name',1) ;
        $address=$this->input->post('address',1) ;
          $updateCondition=array('id'=> $school_id);
        $params=array(
          'organization_name'=>$organization_name,
          'address'=>$address,
          'email'=>$email,
          'contact_pri'=>$primary_contact,
          'contact_sec'=>$sec_contact



);

        $upadate=$this->Setting_model->update_col('table_school',$updateCondition,$params);
        if($upadate[]='success')
        {
        $this->session->alerts = array(
                  'severity'=> 'success',
                    'title'=> 'successfully updated'

                            );
      }
      else
      {

      }


    }
    else
    {
        // echo $school_id;
        $condition=array('id'=>$school_id);
        $data['school_info']=$this->Setting_model->select_id('table_school',$condition,array('*'));
        // print_r($data['school_info']);die;
        $data['_view'] = 'organization_profile';
        $this->load->view('index',$data);
    }
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

function email_template_setting()
{
    $school_id=$this->session->SchoolId;
    $data['externel_css']="assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css";
    // $data['externl_css']=11;
         ##fetch school setting
    if($this->input->post())
    {


       $template=$this->input->post('template');   
       $module=$this->input->post('module');
       $id=$this->input->post('id');
       $subject=$this->input->post('subject',1);
       $condition=array('school_id'=>$school_id);
       $length=count($id);
       for($i=0;$i<$length;$i++)
       {
           $templateparam=array(
               'context'=>$template[$i],
               'subject'=>$subject[$i]
           );   

           $condition=array('school_id'=>$school_id,'id'=>$id[$i]);
           $menu=$this->Setting_model->update_col('table_email_template',$condition,$templateparam);
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
              'severity'=> 'failure',
              'title'=> 'not updated'

          );
        }
    }




}
else
{


    $condition=array('school_id'=>$school_id);
    $data['template']=$this->Setting_model->select('table_email_template',$condition,array('module','context','id','subject'));
    $data['_view'] = 'email_template';
    $this->load->view('index',$data);



}

}

function sms_template_setting()
{
    $school_id=$this->session->SchoolId;

    // $data['externl_css']=11;
         ##fetch school setting
    if($this->input->post())
    {


       $template=$this->input->post('template');   
       $module=$this->input->post('module');
       $id=$this->input->post('id');

       $condition=array('school_id'=>$school_id);
       $length=count($id);
       for($i=0;$i<$length;$i++)
       {
           $templateparam=array(
               'context'=>$template[$i],
               'subject'=>$subject[$i]
           );   

           $condition=array('school_id'=>$school_id,'id'=>$id[$i]);
           $menu=$this->Setting_model->update_col('table_sms_template',$condition,$templateparam);
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
              'severity'=> 'failure',
              'title'=> 'not updated'

          );
        }
    }




}
else
{


    $condition=array('school_id'=>$school_id);
    $data['template']=$this->Setting_model->select('table_sms_template',$condition,array('module','context','id'));
    $data['_view'] = 'sms_template';
    $this->load->view('index',$data);



}

}

function sms_configuration()
{
  $school_id=$this->session->SchoolId;
  $condition=array('school_id'=>$school_id);
  // print_r($condition);
  $data['sms']=$this->Setting_model->select_id('table_sms_configuration',$condition,array('id','auth_key','url','sender_id','route'));
  // print_r($data['sms']);die;
   $data['_view'] = 'sms_setting';
  $this->load->view('index',$data);
}

function update_sms_configuration($id)
{
  $data['title']="Sms configuration Update";
 $data['heading']="SMS CONFIGURATION";
 $school_id=$this->session->SchoolId;
 $condition=array('id'=>$id,'school_id'=>$school_id);

 $data['sms'] = $this->Setting_model->select_id('table_sms_configuration',$condition,array('id','auth_key','url','sender_id','route'));
 
 


 if(isset($data['sms']['id']))
 {
      $this->load->library('form_validation');

    $this->form_validation->set_rules('auth_key','Auth key','required');
    $this->form_validation->set_rules('url','Url','required');
    $this->form_validation->set_rules('sender_id','Sender id','required');
    $this->form_validation->set_rules('route','Route','required');
 

  if($this->form_validation->run() )     
  {   

   

   $auth_key=strip_tags($this->input->post('auth_key',1));
   $url=strip_tags($this->input->post('url',1));
  

   $sender_id=strip_tags($this->input->post('sender_id',1));
   $route=strip_tags($this->input->post('route',1));
  
   $itemParams=array(
    'auth_key'=>$auth_key,
    'url'=>$url,
    'route'=>$route,

    'sender_id'=>$sender_id
   

  );
   // print_r($itemParams);

   $this->Setting_model->update_col('table_sms_configuration',$condition,$itemParams);      



   $this->session->alerts = array(
    'severity'=> 'success',
    'title'=> 'successfully updated'
    );
   redirect('settings/sms_configuration');
 }
 else
 {
  $this-> sms_configuration();
}
}
else
  show_error('The item you are trying to edit does not exist.');
} 


}
?>