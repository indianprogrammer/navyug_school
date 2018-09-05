<?php
class Email extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Email_model');
        $this->load->model('sms/Sms_model');


    }

    function send_email($emailinfo) {
         ##fetch data from template

        $school_id=$emailinfo['school_id'];
        $schoolName= modules::run('admin/admin/getSchoolName',$school_id);
        $module=$emailinfo['module'];
        $fetchTemplateData=$this->Email_model->fetch_template_data($school_id,$module);
        $context=$fetchTemplateData->context;
        $username=$emailinfo['user_name'];
        $password=$emailinfo['password'];
        $student_name=$emailinfo['student_name'];
        $school_name=$schoolName->organization_name;
        $contextString=array('{school_name','{username','{password','{student_name','}');
        $ReplaceString=array($school_name,$username,$password,$student_name,'');
        $msg=str_replace($contextString,$ReplaceString,$context);
     // echo $msg;die;
        $emaillog=array('msg'=>$msg,'email'=>$emailinfo['email'],'module'=>$module,'school_id'=>$school_id,'student_id'=>$emailinfo['student_id'],
            'subject'=>$emailinfo['subject']);
        if(is_null($emailinfo['email']))
        {
         $insertInfo=$this->Email_model->insertEmailLog($emaillog);

     }
     else
     {
       $insertInfo=$this->Email_model->insertEmailLog($emaillog);

       $to=$emailinfo['email'];
       $subject=$emailinfo['subject'];
       $body=$msg;
        ## get information of email gateway
       $schoolId=$this->session->SchoolId;       

       $getInfoEmailGateway=$this->Email_model->get_info_email($schoolId);
// var_dump($getInfoEmailGateway);
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
        echo "send";
    else
            // $this->session->set_flashdata("email_sent","You have encountered an error");
        echo "not send";
        // $this->load->view('contact_email_form');
}
}



function send_notification_email($notification,$notificationStudent,$notificationEmployee)
{

    $school_id=$this->session->SchoolId;
    $getInfoEmailGateway=$this->Email_model->get_info_email($schoolId);
// var_dump($getInfoEmailGateway);
    $config=array(
        'protocol'=>$getInfoEmailGateway['protocol'],
        'smtp_host'=>$getInfoEmailGateway['smtp_host'],
        'smtp_port'=>$getInfoEmailGateway['smtp_port'],
        'smtp_user'=>$getInfoEmailGateway['smtp_user'],
        'smtp_pass'=>$getInfoEmailGateway['smtp_password']


    );
    $from_email = $getInfoEmailGateway['smtp_host'];

    $this->load->library('email',$config);
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
    $dataemail=array('msg'=>$notification,
        'email'=>$stu[$j][0]['email'],

        'school_id'=>$school_id,
        'student_id'=>$stu[$j][0]['id'],
        'module'=>'notification student',
        'student_id'=>$stu[$j][0]['id'],
        'school_id'=>$school_id );
    $data['student'] =$this->Email_model->insertEmailLog($dataemail);
                                //Load email library
    $this->email->from($from_email, 'Identification');
    $this->email->to($stu[$j][0]['email']);
    $this->email->subject("notification");
    $this->email->message($notification);
                                //Send mail
    if($this->email->send())
        echo "send";
    else
                                    // $this->session->set_flashdata("email_sent","You have encountered an error");
        echo "not send";
                                // $this->load->view('contact_email_form');
}
} 
$emp=[];
if($notificationEmployee!=0)
{
 for ($i=0;$i<count($notificationEmployee);$i++)
 {


   array_push($emp,$this->Sms_model->get_all_employees($notificationEmployee[$i]));
}
             // return $st[0][0]['mobile'];die;

for($j=0;$j<count($emp);$j++)
{
    $dataemail=array('msg'=>$notification,
        'email'=>$emp[$j][0]['email'],

        'school_id'=>$school_id,
        'student_id'=>$emp[$j][0]['id'],
        'module'=>'notification employee',
        'student_id'=>$emp[$j][0]['id'],
        'school_id'=>$school_id );
    $data['student'] =$this->Email_model->insertEmailLog($dataemail);
                                //Load email library
    $this->email->from($from_email, 'Identification');
    $this->email->to($emp[$j][0]['email']);
    $this->email->subject("notification");
    $this->email->message($notification);
    
    if($this->email->send())
        echo "send";
    else
        
        echo "not send";
    
}
}   
}          
}
?>