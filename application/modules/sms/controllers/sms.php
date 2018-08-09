<?php


class Sms extends MY_Controller{
    function __construct()
    {
        parent::__construct();
         $this->load->model('Sms_model');
       
    } 

   
function index()
    {
     // $data=array(
     // 	'mobile_to'=>$this->input->post('mobile'),
     // 	'school_id'=>$this->session->SchoolId,
     // 	'msg'=>'hii you got admission',
     // 	'module'=>$this->input->post('module')

     // );
     $data=array(
     	'mobile_to'=>654646456,
     	'school_id'=>$this->session->SchoolId,
     	'msg'=>'hii you got admission',
     	'module'=>'student'

     );
     	$insertInfo=$this->Sms_model->insert_info($data);




    }
    function send_sms($smsinfo)
    {
        $mobile=$smsinfo['mobile_to'];
        $message=$smsinfo['msg'];

    }
}
?>