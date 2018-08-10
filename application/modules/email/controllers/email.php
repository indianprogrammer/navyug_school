<?php
class Email extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Email_model');
       
    }
  
    public function send_email($emailinfo) {
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
    		'protocol'=>$getInfoEmailGateway->protocol,
    		'smtp_host'=>$getInfoEmailGateway->smtp_host,
    		'smtp_port'=>$getInfoEmailGateway->smtp_port,
    		'smtp_user'=>$getInfoEmailGateway->smtp_user,
    		 'smtp_pass'=>$getInfoEmailGateway->smtp_password


    	);

        $this->load->library('email',$config);
        $from_email = $getInfoEmailGateway->smtp_host;
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

function sendarray($data)
{
   return $data['a']+$data['b'];
}

}
?>