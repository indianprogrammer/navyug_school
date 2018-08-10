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
        ##fetch data from template
    // var_dump($smsinfo);
    $school_id=$smsinfo['school_id'];
     $schoolName= modules::run('admin/admin/getSchoolName',$school_id);
    $module=$smsinfo['module'];
    $fetchTemplateData=$this->Sms_model->fetch_template_data($school_id,$module);
    // var_dump($fetchTemplateData);
    $context=$fetchTemplateData->context;
$username=$smsinfo['user_name'];
$password=$smsinfo['password'];
    $student_name=$smsinfo['student_name'];
    $school_name=$schoolName->organization_name;
    $contextString=array('{school_name','{username','{password','{student_name','}');
    $ReplaceString=array($school_name,$username,$password,$student_name,'');
    $msg=str_replace($contextString,$ReplaceString,$context);
     // echo $msg;
    $smslog=array('msg'=>$msg,'mobile'=>$smsinfo['mobile'],'module'=>$module,'school_id'=>$school_id,'student_id'=>$smsinfo['student_id']);

     if(is_null($smsinfo['mobile']))
     {
       $insertInfo=$this->Sms_model->insertLogInfo($smslog);
    }
    else
    {
        $insertInfo=$this->Sms_model->insertLogInfo($smslog);

       $mobile=$smsinfo['mobile'];
       $message=$msg;
      

##get authentication key and information for sms gateway
       $getInfoSmsGateway=$this->Sms_model->get_info_sms($school_id);

       $senderId = $getInfoSmsGateway->sender_id;
       $authKey = $getInfoSmsGateway->auth_key;
       $url=$getInfoSmsGateway->url;


       $route = $getInfoSmsGateway->route;
       $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobile,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );

       $ch = curl_init();
       curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
    ));
       $output = curl_exec($ch);
       curl_close($ch);
       return $output;
   }


 }


}
?>