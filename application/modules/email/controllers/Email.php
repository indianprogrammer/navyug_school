<?php
class Email extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('Email_model');



  }


#function to send mail
  function sendMail($to,$subject,$body,$attachments = null){

## get information of email gateway
    $schoolId=$this->session->SchoolId;       

    $getInfoEmailGateway=$this->Email_model->get_info_email($schoolId);

    $config=array(
      'protocol'=>$getInfoEmailGateway['protocol'],
      'smtp_host'=>$getInfoEmailGateway['smtp_host'],
      'smtp_port'=>$getInfoEmailGateway['smtp_port'],
      'smtp_user'=>$getInfoEmailGateway['smtp_user'],
      'smtp_pass'=>$getInfoEmailGateway['smtp_password']


    );

    $this->load->library('email',$config);
    $from_email = $getInfoEmailGateway['smtp_host'];
//Load email library
    $this->email->from($from_email, 'Identification');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($body);
//Send mail
    if($this->email->send())
    {
      $emaillog=array(
        'email'=>$to,
        'subject'=>$subject,
        'body'=>$body,
        'school_id'=>$schoolId,
        'sender_id'=>$getInfoEmailGateway['smtp_host']
      );
      $insertInfo=$this->Email_model->insertEmailLog($emaillog);
      echo "send";
#send log
    }
    else

      echo "not send";

  }







  function send_notification_email($notification,$notificationStudent,$notificationEmployee)
  {
    $this->load->model('student/Student_model');
    $this->load->model('employee/Employee_model');
    $stu=[];

    if($notificationStudent!=0)
    {
      for ($i=0;$i<count($notificationStudent);$i++)
      {


        array_push($stu,$this->Student_model->get_student($notificationStudent[$i]));
      }
// return $st[0][0]['mobile'];die;
      $studentCount=count($stu);
      for($j=0;$j<$studentCount;$j++)
      {
// $dataemail=array('msg'=>$notification,
//   'email'=>$stu[$j][0]['email'],

//   'school_id'=>$school_id,
//   'student_id'=>$stu[$j][0]['id'],
//   'module'=>'notification student',
//   'student_id'=>$stu[$j][0]['id'],
//   'school_id'=>$school_id );
        $to=$stu[$j]['email'];
        $body=$notification;
        $subject='notification';
        $attachments='';
        $this->sendMail($to,$subject,$body,$attachments);

      }
    } 


    $emp=[];
    if($notificationEmployee!=0)
    {
      for ($i=0;$i<count($notificationEmployee);$i++)
      {


        array_push($emp,$this->Employee_model->get_employee($notificationEmployee[$i]));
      }
// return $st[0][0]['mobile'];die;
      $empCount=count($emp);
      for($j=0;$j<$empCount;$j++)
      {
// $dataemail=array('msg'=>$notification,
//   'email'=>$emp[$j][0]['email'],

//   'school_id'=>$school_id,
//   'student_id'=>$emp[$j][0]['id'],
//   'module'=>'notification employee',
//   'student_id'=>$emp[$j][0]['id'],
//   'school_id'=>$school_id );
        $to=$emp[$j]['email'];
        $body=$notification;
        $subject='notification';
        $attachments='';
        $this->sendMail($to,$subject,$body,$attachments);


      }
    }   
  }  






}
?>