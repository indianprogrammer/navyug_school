<?php


class Sms extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Sms_model');

  } 


 /* function sendSms($to,$message)
  {
##get authentication key and information for sms gateway
    $school_id=$this->session->SchoolId;
    $getInfoSmsGateway=$this->Sms_model->get_info_sms($school_id);

    $senderId = $getInfoSmsGateway['sender_id'];
    $authKey = $getInfoSmsGateway['auth_key'];
    $url=$getInfoSmsGateway['url'];


    $route = $getInfoSmsGateway['route'];
    $postData = array(
      'authkey' => $authKey,
      'mobiles' => $to,
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
    $smslog=array(
      'mobile'=>$to,
      'message'=>$message,
      'sender'=>$senderId,
      'school_id'=>$school_id

    );
    $insertInfo=$this->Sms_model->insertLogInfo($smslog);
    
    return $output;
  }*/

  function send_notification_sms($notification,$notificationStudent,$notificationEmployee)
  {
    $this->load->model('student/Student_model');
    $this->load->model('employee/Employee_model');
    $notificationMsg= $notification;
    $school_id=$this->session->SchoolId;

    $stu=[];

    if($notificationStudent!=0)
    {
      $noOfStudent=count($notificationStudent);
      for ($i=0;$i<$noOfStudent;$i++)
      {


        array_push($stu,$this->Student_model->get_student($notificationStudent[$i]));
      }
// return $st[0][0]['mobile'];die;
// var_dump($stu);
      $studentCount=count($stu);
      for($j=0;$j<$studentCount;$j++)
      {

        $to=$stu[$j]['mobile'];
        $message=$notificationMsg;







        modules::run('sms/sms/sendSms',$to,$message);


      }
// runsendSms($to,$message);
    }
##for employee
    if($notificationEmployee!=0)
    {   
      $emp=[];
// return $notificationEmployee[0];die;
      for ($i=0;$i<count($notificationEmployee);$i++)
      {


        array_push($emp,$this->Employee_model->get_employee($notificationEmployee[$i]));
// return $emp;die;
      }
      $empCount=count($emp);
      for($j=0;$j<$empCount;$j++)
      {

        $to=$emp[$j]['mobile'];
        $message=$notificationMsg;




        sendSms($to,$message);

      }
    }

  }












}
?>