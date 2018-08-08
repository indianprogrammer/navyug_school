<?php


class Test extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('test_model');

    } 

function index()
    {
      // $data=array('usrname'=>'vivek','pw'=>12345);
       // $this->load->controller('email/run', $data, $return = true);
      // modules::run('email/run', $data);
      // $this->session->set_userdata($datas);
    // echo  $this->session->userdata('message');
        bar();
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

}
?>