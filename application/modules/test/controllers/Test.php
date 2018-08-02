<?php


class Test extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('test_model');

    } 

    /*
     * Listing of test
     */
function index()
    {
         $data['_view'] = 'add';
        $this->load->view('index',$data);
    }


   function graph()
   {
    $q=$this->test_model->get_student_count();
     // var_dump($q);
    echo json_encode($q);
   }
}