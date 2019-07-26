<?php


class Homework extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Homework_model');

    } 

/*
* Listing of homework
*/

function index()
{   
    $data['title']="homework List";
    $schoolId=$this->session->SchoolId;
    $condition=array('t1.school_id'=>$schoolId);
    $data['homework']=$this->Homework_model->fetch_homework('table_homework',$condition,array('t1.id','t1.file_name','t1.description','t1.start_date','t1.submission_date','t1.created_at','t2.name','t2.name as subject_name','t3.batch_name','t4.course_name','t5.name as staff_name'));
    // print_r($data['homework']);die;
    $data['_view'] = 'homework_list';
    $this->load->view('index',$data);
}

/*
* Adding a new homework
*/
public function add_homework()
{
     $schoolId=$this->session->SchoolId;
     $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Homework_model->select('table_courses',$condition,array('id','course_name'));
    $data['title']="Add homework";
    $data['_view'] = 'add';
    $this->load->view('index',$data);
}


public function add()
{   
    $this->load->library('form_validation');
    $this->form_validation->CI =& $this;
    // $this->load->library('MY_Form_validation');
    $homework_name= $this->input->post('homework_name',1);
    $this->form_validation->set_rules('homework_name','homework Name','required');
    $this->form_validation->set_message('homework_check', 'homework already exists');


    if($this->form_validation->run() )     
    {   
        $params = array(

            'name' => $this->input->post('homework_name'),
            'start_date'=>$this->input->post('start_date'),
            'submission_date'=>$this->input->post('submission_date'),
            'description'=>$this->input->post('description'),
            'created_at'=>date('y-m-d h-i-s'),
            'school_id'=>$this->session->schoolId,
            'batch_id'=>$this->input->post('batch'),
            'course_id'=>$this->input->post('course'),
            'subject_id'=>$this->input->post('course')


        );


        $homework_id = $this->homework_model->insert('table_homework',$params);
        

#set notifications
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'
// 'description'=> ''
        );

        redirect('homework');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

public function homework_check($str)

{


 // $this->load->library('form_validation');
 // $this->form_validation->CI =& $this;
    $condition=array('name'=>$str,'map_school_homework.school_id'=>$this->session->SchoolId);
    $result=$this->homework_model->get_all_homework_check('table_map_school_homework',$condition,array('name'));
    // print_r($result);
    if($result)
    {
        // $this->form_validation->set_message('homework_check','hii');
        return FALSE;
    }
    else
    {
        // $this->form_validation->set_message('homework_check','hii');
        return TRUE;
    }
}



}
?>