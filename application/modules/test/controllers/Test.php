<?php


class Test extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('test_model');

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
    $q=$this->test_model->get_student_count();
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
     $smsinfo=array('msg'=>'hii sdf sd fsdsdsdsdsdsdsdsdsdsdfsdfds  sfdfsd fd sd fd fsd fds fsdf sdffds fs dfsd f fsd fsd ','mobile'=>9148725074,'student_id'=>2,'module'=>'student','school_id'=>$this->session->SchoolId);
     echo modules::run('sms/sms/send_sms',$smsinfo);
}
}
?>