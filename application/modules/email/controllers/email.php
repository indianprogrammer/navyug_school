<?php
class Email extends MX_Controller {
    function __construct() {
        parent::__construct();
       
    }
    
    public function send_mail() {
    	// $config=array(
    	// 	'protocol'=>'smtp',
    	// 	'smtp_host'=>'ssl://smtp.googleemail.com',
    	// 	'smtp_port'=>465,
    	// 	'smtp_user'=>'vivek.et1993@gmail.com',
    	// 	 'smtp_pass'=>'fsdfs@43'


    	// );
        // $this->load->library('email');
        $from_email = "email@example.com";
        $to_email = "vivek.et1993@gmail.com";
        //Load email library
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if($this->email->send())
            echo "send";
        else
            // $this->session->set_flashdata("email_sent","You have encountered an error");
            echo "not send";
        // $this->load->view('contact_email_form');
    }
public function send()
{
	$to = "vivek.et1993@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: vivek.et1993@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
}
}
?>