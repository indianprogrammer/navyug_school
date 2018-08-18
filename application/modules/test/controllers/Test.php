<?php


class Test extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Test_model');
    $this->load->model('sms/Sms_model');

  }

  function studentcross(){
        #cross controller function
      // echo   modules::run('student/Student/crossmoduleadd');   //without argument default value
      // echo   modules::run('student/Student/crossmoduleadd',2,5);   //with argument
      echo   modules::run('student/Student/crossmoduleadd',20);   //with argument
    }

    function index()
    {
      // $data=array('usrname'=>'vivek','pw'=>12345);
       // $this->load->controller('email/run', $data, $return = true);
      // modules::run('email/run', $data);
      // $this->session->set_userdata($datas);
    // echo  $this->session->userdata('message');
       // bar();
    }


    function graph()
    {
      $q=$this->Test_model->get_student_count();
     // var_dump($q);
      print_r(json_encode($q)); 
    }
    function bar()
    {
     $data['_view'] = 'bar';
     $this->load->view('index',$data);
   }
   function line()
   {
     $data['_view'] = 'line';
     $this->load->view('index',$data);
   }


   function sendarray()
   {   
    $f=array('a'=>3,'b'=>5,'c'=>"tret");
    echo modules::run('email/email/sendarray',$f);
  }
  function tests() 
  {
    $emailinfo=array('msg'=>'fsefsf','email'=>null,'subject'=>'admission','student_id'=>2,'module'=>'student','school_id'=>$this->session->SchoolId);
    echo modules::run('email/email/send_email',$emailinfo);
  }
  function smstest()
  {
   $smsinfo=array('user_name'=>'vivek123','password'=>12345,'student_name'=>'vivek','mobile'=>9148725074,'student_id'=>2,'module'=>'student add','school_id'=>$this->session->SchoolId);
   echo modules::run('sms/sms/send_sms',$smsinfo);
 }
 function templatetests()
 {
   $test=$this->Test_model->templatetest(1,"student");
   $r=$test->context;
 // echo $r.'<br>';
   $user="vivek";
   $school_name="ssm";
   $password=12345;
   $templatemsg=array('{school_name','{username','{password','}','email');
   $phpmsg=array( $school_name,$user,$password,'','email');
   echo $withoutparam =str_replace($templatemsg, $phpmsg, $r);
 // echo str_replace('%username',  $user, $withoutparam );

 }
 function testschool()
 {
  $schoolName= modules::run('admin/admin/getSchoolName',$school_id);
  var_dump($var);
}
function ipadd()
{
  echo $IP = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
// echo $computerName = gethostbyaddr($IP); 
}
function idtest($notification,$notificationStudent,$notificationEmployee)
{
  $notificationMsg= $notification;
 $getInfoSmsGateway=$this->Sms_model->get_info_sms(1);

 $senderId = $getInfoSmsGateway->sender_id;
 $authKey = $getInfoSmsGateway->auth_key;
 $url=$getInfoSmsGateway->url;
 $route = $getInfoSmsGateway->route;
 $stu=[];
 
        if($notificationStudent!=0)
        {
             for ($i=0;$i<count($notificationStudent);$i++)
             {


               array_push($stu,$this->Test_model->get_all_students($notificationStudent[$i]));
             }
             // return $st[0][0]['mobile'];die;
             
                     for($j=0;$j<count($stu);$j++)
                     {
                      $data=array
                      (
                        'mobile'=>$stu[$j][0]['mobile'],
                        'msg'=>$notificationMsg
                      );
                       $data['student'] =$this->Test_model->data_sms($data);
                      
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


               array_push($emp,$this->Test_model->get_all_employees($notificationEmployee[$i]));
               // return $emp;die;
             }
             
                     for($j=0;$j<count($emp);$j++)
                     {
                      $data=array
                      (
                        'mobile'=>$emp[$j][0]['mobile'],
                        'msg'=>$notificationMsg
                      );
                       $data['student'] =$this->Test_model->data_sms($data);
                      
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
echo "fsd";
}
function real_ip()
{
    // $ipaddress = '';
 
    // $_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    // else if($_SERVER['HTTP_X_FORWARDED_FOR'])
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    // else if($_SERVER['HTTP_X_FORWARDED'])
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    // else if($_SERVER['HTTP_FORWARDED_FOR'])
    //     $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    // else if($_SERVER['HTTP_FORWARDED'])
    //     $ipaddress = $_SERVER['HTTP_FORWARDED'];
    // else if($_SERVER['REMOTE_ADDR'])
    //     $ipaddress = $_SERVER['REMOTE_ADDR'];
    // else
    //     $ipaddress = 'UNKNOWN';
 
    echo $ipaddress;
  // echo getHostByName(getHostName());
}
function check()
{
  $data['_view'] = 'checkbox';
     $this->load->view('index',$data);
  // calling(1,2);
}
function calling($a,$b)
{
  echo $a;
  echo $b;

}
}
?>