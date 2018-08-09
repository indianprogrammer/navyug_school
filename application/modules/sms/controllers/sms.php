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
        if(is_null($smsinfo['mobile']))
        {
         $insertInfo=$this->Sms_model->insertLogInfo($smsinfo);
        }
        else
        {
            // var_dump($smsinfo);die;
        $mobile=$smsinfo['mobile'];
        $message=$smsinfo['msg'];
        $authKey = "3832AsCceYITm5346e8ad";
//$mobileNumber = "9827553996,7587075570";
$senderId = "NAVYUG";
//$message = urlencode($mm);
// $message = $mm;
$route = "default";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobile,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);
$url="http://sms.9yug.net/sendhttp.php";
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