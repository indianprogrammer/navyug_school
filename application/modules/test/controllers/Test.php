<?php


class Test extends MY_Controller{
    function __construct()
    {
        parent::__construct();
         $this->load->model('Test_model');

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
}
?>