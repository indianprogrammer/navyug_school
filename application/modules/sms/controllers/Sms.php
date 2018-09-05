<?php


class Sms extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Sms_model');

  } 


  function send_notification_sms($notification,$notificationStudent,$notificationEmployee)
  {
    $notificationMsg= $notification;
    $school_id=$this->session->SchoolId;
    $getInfoSmsGateway=$this->Sms_model->get_info_sms($school_id);
// var_dump($getInfoSmsGateway);die;
    $senderId = $getInfoSmsGateway->sender_id;
    $authKey = $getInfoSmsGateway->auth_key;
    $url=$getInfoSmsGateway->url;
    $route = $getInfoSmsGateway->route;
    $stu=[];
    
    if($notificationStudent!=0)
    {
     for ($i=0;$i<count($notificationStudent);$i++)
     {


       array_push($stu,$this->Sms_model->get_all_students($notificationStudent[$i]));
     }
             // return $st[0][0]['mobile'];die;
     
     for($j=0;$j<count($stu);$j++)
     {
      $data=array
      (
        'mobile'=>$stu[$j][0]['mobile'],
        'msg'=>$notificationMsg,
        'module'=>'notification student',
        'student_id'=>$stu[$j][0]['id'],
        'school_id'=>$school_id
      );
      $data['student'] =$this->Sms_model->data_sms($data);
      
      $postData = array(
        'authkey' => $authKey,
        'mobiles' => $stu[$j][0]['mobile'],
        'message' => $notificationMsg,
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

    }
  }
                    ##for employee
  if($notificationEmployee!=0)
  {   
    $emp=[];
          // return $notificationEmployee[0];die;
    for ($i=0;$i<count($notificationEmployee);$i++)
    {


     array_push($emp,$this->Sms_model->get_all_employees($notificationEmployee[$i]));
               // return $emp;die;
   }
   
   for($j=0;$j<count($emp);$j++)
   {
    $data=array
    (
      'mobile'=>$emp[$j][0]['mobile'],
      'msg'=>$notificationMsg,
      'module'=>'notification employee',
      'student_id'=>$emp[$j][0]['id'],
      'school_id'=>$school_id
    );
    $data['student'] =$this->Sms_model->data_sms($data);
    
    $postData = array(
      'authkey' => $authKey,
      'mobiles' => $emp[$j][0]['mobile'],
      'message' => $notificationMsg,
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

  }
}

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
  if($smsinfo['invoice_id'] || $smsinfo['reciept_id'])
  {
    @$invoice_id=$smsinfo['invoice_id'];
    @$reciept_id=$smsinfo['reciept_id'];
    $organization_name=$smsinfo['organization_name'];
    $customer_name=$smsinfo['customer_name'];
    $total_amount=$smsinfo['total_amount'];
    $contextString=array('{school_name','{customer_name','{invoice_id','{reciept_id','{total_amount','}');
    $ReplaceString=array($organization_name,$customer_name,$invoice_id,$reciept_id,$total_amount,'');
    $msg=str_replace($contextString,$ReplaceString,$context);
  }
  else
  {
    $username=$smsinfo['user_name'];
    $password=$smsinfo['password']; 
    $student_name=$smsinfo['student_name'];
    $school_name=$schoolName->organization_name;
    $contextString=array('{school_name','{username','{password','{student_name','}');
    $ReplaceString=array($school_name,$username,$password,$student_name,'');
    $msg=str_replace($contextString,$ReplaceString,$context);
  }
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