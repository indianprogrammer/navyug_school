<?php


class Classes extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
        $this->load->model('subject/Subject_model');
        $this->load->model('employee/Employee_model');

    } 

/*
* Listing of class
*/
function index()
{
    $data['title']="Classes list";
    $school_id=$this->session->SchoolId;
    $data['studentCount']=$this->Classes_model->get_student_count();
    $data['subjectCount']=$this->Classes_model->get_subject_count();

    $data['class'] = $this->Classes_model->get_all_class($school_id);
    $data['_view'] = 'classList';
    $this->load->view('index',$data);
}

/*
* Adding a new class
*/
function add_class()
{            
    $data['title']="Add class";
    $school_id=$this->session->SchoolId;
    $data['subject'] = $this->Subject_model->get_all_subject($school_id);

    $data['employee'] = $this->Employee_model->get_all_employees($school_id);

    $data['_view'] = 'add';
    $this->load->view('index',$data);
}

function add_course()
{
    $data['title']="ADD COURSE";
    // $school_id=$this->session->SchoolId;
    $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Classes_model->select('table_courses',$condition,array('*'));

    $data['_view'] = 'add_course';
    $this->load->view('index',$data);

}
function test()
{
    echo date_set();
}
function add_course_process()
{
$name=strip_tags($this->input->post('course_name',1));
$description=strip_tags($this->input->post('description',1));
$params=array(
    'course_name'=>$name,
    'description'=>$description,
    'school_id'=>$this->session->SchoolId,
    'created_at'=>Date('Y-m-d H:i:s')
);
$result=$this->Classes_model->insert('table_courses',$params);
if($result)
{
     $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'

        );
        redirect('classes/add_course');
}

}

function add_batch()
{


    $condition=array('school_id'=>$this->session->SchoolId);
$data['course']=$this->Classes_model->select('table_courses',$condition,array('id','course_name'));
 $data['_view'] = 'batch/add_batch';
    $this->load->view('index',$data);

}
function add_batch_process()
{

    $course=strip_tags($this->input->post('course',1));
$batch_name=strip_tags($this->input->post('batch_name',1));
$start_date=strip_tags($this->input->post('start_date',1));
$end_date=strip_tags($this->input->post('end_date',1));
        $params=array(
    'course_id'=>$course,
    'batch_name'=>$batch_name,
    'start_date'=>$start_date,
    'end_date'=>$end_date,
    'school_id'=>$this->session->SchoolId,
    'created_at'=>Date('Y-m-d H:i:s')
);
    $result=$this->Classes_model->insert('table_batch',$params);
        if($result)
        {
             $this->session->alerts = array(
                    'severity'=> 'success',
                    'title'=> 'successfully added'

                );
                redirect('classes/batch_list');
        }
}

function batch_list()
{
 $condition=array('batch.school_id'=>$this->session->SchoolId);
$data['batch']=$this->Classes_model->batch_list('table_batch',$condition,array('course_name','batch_name','start_date','end_date','batch.id'));
$data['student_count']=array();
$data['subject_count']=array();
##count no of students
for($i=0;$i<count($data['batch']);$i++)
{
$condition=array('school_id'=>$this->session->SchoolId,'batch_id'=>$data['batch'][$i]['id']);
$student_count=$this->Classes_model->counting('table_assign_student',$condition);
array_push($data['student_count'],$student_count);

##subject count
$subjectCondition=array('school_id'=>$this->session->SchoolId,'batch_id'=>$data['batch'][$i]['id']);
$subject_count=$this->Classes_model->counting('table_assign_subject',$condition);
array_push($data['subject_count'],$subject_count);


}
// $batch_details=array_merge_recursive($data['batch'],$data['student_count']);
// print_r($batch_details);
// print_r(($data['student_count']));
// die;
 $data['_view'] = 'batch/batch_list';
        $this->load->view('index',$data);


}
function add()
{   
    $data['title']="Add class";
    $school_id=$this->session->SchoolId;
    $this->load->library('form_validation');
    $data['subject'] = $this->Subject_model->get_all_subject($school_id);
    $data['employee'] = $this->Employee_model->get_all_employees($school_id);



// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('class_name','class Name','required|max_length[100]');

// $this->form_validation->set_rules('subject','Address','required');

    if($this->form_validation->run() )     
    {   
        $params = array(
// 'password' => $this->input->post('password'),
            'name' => $this->input->post('class_name'),

            'description' => $this->input->post('description')
// 'subject_id' => implode(',', $this->input->post('subject')),
// 'start_time' => $this->input->post('start_time'),
// 'end_time' => $this->input->post('end_time')

        );


        $class_id = $this->Classes_model->add_class($params);
        $ids=array(

            'class_id'=>$class_id,
            'school_id'=>$this->session->SchoolId

        );  
        $map = $this->Classes_model->add_mapping($ids);
##map class and subject
        $subjectId=$this->input->post('subject');
        foreach ($subjectId as $row) {
            $mapping=array(
                'class_id'=>$class_id,
                'subject_id'=>$row

            );
            $map = $this->Classes_model->add_mapping_subject($mapping);
        }
##map employee class
        $employeeId=$this->input->post('employee');
        foreach ($employeeId as $row) {
            $mapping=array(
                'class_id'=>$class_id,
                'employee_id'=>$row

            );
            $map = $this->Classes_model->add_mapping_employee($mapping);
        }

        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'

        );
        redirect('classes');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

/*
* Editing a class
*/
function edit($id)
{   
// check if the class exists before trying to edit it
    $data['title']="Edit Class";
    $school_id=$this->session->SchoolId;
    $data['class'] = $this->Classes_model->get_class($id);
    $data['subject'] = $this->Subject_model->get_all_subject($school_id);
    $data['selected_subject'] = $this->Subject_model->get_selected_subject($id);
    $data['employee'] = $this->Employee_model->get_all_employees($school_id);
    // echo '<pre>';
    // print_r($data);die;
    if(isset($data['class']['id']))
    {
        $this->load->library('form_validation');

// $this->form_validation->set_rules('password','Password','required|max_length[20]')
        $this->form_validation->set_rules('class_name','class Name','required|max_length[100]');


        if($this->form_validation->run() )     
        {   
            $params = array(
// 'password' => $this->input->post('password'),
                'name' => $this->input->post('class_name'),

                'description' => $this->input->post('description'),
// 'subject_id' => $this->input->post('subject'),
// 'start_time' => $this->input->post('start_time'),
// 'end_time' => $this->input->post('end_time')
//  'created_at'=>date(),
// 'modified_at'=>date()
            );

            $this->Classes_model->update_class($id,$params);
            $subjectId=$this->input->post('subject');
            if($subjectId)
            {
                foreach ($subjectId as $row) {
                    $mapping=array(
                        'class_id'=>$id,
                        'subject_id'=>$row

                    );
                    $map = $this->Classes_model->add_mapping_subject($mapping);
                }
            }
##map employee class
            $employeeId=$this->input->post('employee');
            if($employeeId)
            {
                foreach ($employeeId as $row) {
                    $mapping=array(
                        'class_id'=>$id,
                        'employee_id'=>$row

                    );
                    $map = $this->Classes_model->add_mapping_employee($mapping);
                }   
            }  
            $this->session->alerts = array(
                'severity'=> 'success',
                'title'=> 'successfully edited'

            );       
            redirect('classes');
        }
        else
        {
            $data['_view'] = 'edit';
            $this->load->view('index',$data);
        }
    }
    else
        show_error('The class you are trying to edit does not exist.');
} 

/*
* Deleting class
*/
function remove($id)
{
    $class = $this->Classes_model->get_class($id);

    $schoolId=$this->session->SchoolId;
// check if the class exists before trying to delete it
    if(isset($class['id']))
    {
        $this->Classes_model->delete_class($id);
        $this->Classes_model->delete_classSchoolMap($id,$schoolId);
        redirect('classes');
    }
    else
        show_error('The class you are trying to delete does not exist.');
}




}
?>