<?php
class Email extends MY_Controller {
    function __construct() {
        parent::__construct();
        // $this->load->modules('test');
       
    }
    function run($data)
    {
        var_dump($data);
         // var_dump($this->session->userdata($datas));
    }
    public function send_mail() {
    	$config=array(
    		'protocol'=>'smtp',
    		'smtp_host'=>'mail.9yug.net',
    		'smtp_port'=>25,
    		'smtp_user'=>'test@9yug.net',
    		 'smtp_pass'=>'test5432@1'


    	);
        $this->load->library('email',$config);
        $from_email = "mail.9yug.net";
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