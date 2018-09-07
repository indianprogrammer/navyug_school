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
    $school_id=$this->session->SchoolId;
    $data['subject'] = $this->Subject_model->get_all_subject($school_id);

    $data['employee'] = $this->Employee_model->get_all_employees($school_id);

    $data['_view'] = 'add';
    $this->load->view('index',$data);
}


function add()
{   
    $school_id=$this->session->SchoolId;
    $this->load->library('form_validation');
    $data['subject'] = $this->Subject_model->get_all_subject($school_id);
    $data['employee'] = $this->Employee_model->get_all_employees($school_id);



// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('class_name','class Name','required|max_length[100]');

// $this->form_validation->set_rules('address','Address','required');

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
            'title'=> 'successfully added',
            'description'=> ''
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
    $school_id=$this->session->SchoolId;
    $data['class'] = $this->Classes_model->get_class($id);
    $data['subject'] = $this->Subject_model->get_all_subject($school_id);
    $data['employee'] = $this->Employee_model->get_all_employees($school_id);

    if(isset($data['class']['id']))
    {
        $this->load->library('form_validation');

// $this->form_validation->set_rules('password','Password','required|max_length[20]')
        $this->form_validation->set_rules('class_name','class Name','required|max_length[100]');
// $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
// $this->form_validation->set_rules('username','Username','required|max_length[100]');
// $this->form_validation->set_rules('mobile','Mobile','required');
// $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
// $this->form_validation->set_rules('address','Address','required');

        if($this->form_validation->run() )     
        {   
            $params = array(
// 'password' => $this->input->post('password'),
                'name' => $this->input->post('class_name'),

                'description' => $this->input->post('description'),
                'subject_id' => $this->input->post('subject'),
// 'start_time' => $this->input->post('start_time'),
// 'end_time' => $this->input->post('end_time')
//  'created_at'=>date(),
// 'modified_at'=>date()
            );

            $this->Classes_model->update_class($id,$params);     
            $this->session->alerts = array(
                'severity'=> 'success',
                'title'=> 'successfully edited',
                'description'=> ''
            );       
            redirect('classes/index');
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