<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherController extends MX_Controller {
	function __construct() {
	parent::__construct();
	$this->load->model('Teacher_model');
	$this->load->library('form_validation');
							}

	public function index(){
		$this->load->view('teacher/student_record');
	}
	public function view_student()
    {
        $result=$this->Teacher_model->get_view_student();
        if ($result) 
        {  
            $this->load->view('teacher/student_record',['data'=>  $result]);
        }
        
    }			

}			