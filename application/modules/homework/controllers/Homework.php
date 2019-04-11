<?php


class Homework extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Homework_model');

    } 


function index()
{   
    $data['title']="homework List";
    $condition=array('homework.school_id'=>$this->session->SchoolId);
     $data['homework']=$this->Homework_model->fetch_homework('table_homework',$condition,array('homework.id','course.course_name','batch.batch_name','subjects.name as subject_name','homework.start_date','homework.submission_date','homework.file_name','homework.description','employees.name as staff_name'));
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
    $config['upload_path']          = './uploads/homework';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $this->load->library('upload', $config);
    $this->form_validation->CI =& $this;
    // $this->load->library('MY_Form_validation');
    $homework_name= $this->input->post('homework_name');

// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    // $this->form_validation->set_rules('homework_name','homework Name','required|max_length[100]|homework_check[sub]');
    $this->form_validation->set_rules('batch','batch','required');
    $this->form_validation->set_rules('course','Course','required');
    $this->form_validation->set_rules('subject','Subject','required');



    if($this->form_validation->run() )     
    {   
        $params = array(


            'start_date'=>$this->input->post('start_date',1),
            'submission_date'=>$this->input->post('submission_date',1),
            'description'=>$this->input->post('description',1),
            'created_at'=>date('y-m-d H-i-s'),
            'school_id'=>$this->session->SchoolId,
            'batch_id'=>  $this->input->post('batch',1) ,
            'course_id'=>  $this->input->post('course',1) ,
            'subject_id'=>  $this->input->post('subject',1),
            'staff_id'=>$this->session->staffId 



        );

        if($this->upload->do_upload('document'))
        {
            $data['image'] =  $this->upload->data();
            $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
            $params['file_name']=$image_path;
        }
        $homework_id = $this->Homework_model->insert('table_homework',$params);

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
        $data['error'] = array('error' => $this->upload->display_errors());
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  






/*
* Editing a homework
*/
function edit($id)
{   
// check if the homework exists before trying to edit it
    $data['title']="Edit homework";
    $data['homework'] = $this->homework_model->get_homework($id);


    if(isset($data['homework']['id']))
    {
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;

        $this->form_validation->set_rules('homework_name','homework Name','required|max_length[100]|callback_homework_check');
        $this->form_validation->set_message('homework_check', 'homework already exists');


        if($this->form_validation->run() )     
        {   
            $params = array(

                'name' => $this->input->post('homework_name',1)


            );

            $this->homework_model->update_homework($id,$params);            
            redirect('homework');
        }
        else
        {
            $data['_view'] = 'edit';
            $this->load->view('index',$data);
        }
    }
    else
        show_error('The homework you are trying to edit does not exist.');
} 


function remove()
{   
    $id=$this->input->post('id');
    $homework = $this->homework_model->get_homework($id);
    $schoolId=$this->session->SchoolId;
// check if the homework exists before trying to delete it
    if(isset($homework['id']))
    {
        $this->homework_model->delete_homework($id);
        $this->homework_model->delete_homeworkSchoolMap($id,$schoolId);
        echo true;
// redirect('homework');
    }
    else
        show_error('The homework you are trying to delete does not exist.');
}


function student_homework()
{
 $student_id=1;
 $schoolId=$this->session->SchoolId;
 ##fetch batch id through student id
 $condition=array('student_id'=>$student_id,'school_id'=>$schoolId);
 $result=$this->Homework_model->select('table_assign_student',$condition,array('batch_id'));
 // print_r($result);
 $data['homework']=[];
 for($i=0;$i<count($result);$i++)
   { 
 $homeworkCondition=array('homework.school_id'=>$schoolId,'batch_id'=>$result[$i]['batch_id']);
  $homework=$this->Homework_model->fetch_homework('table_homework',$homeworkCondition,array('homework.id','course.course_name','batch.batch_name','subjects.name as subject_name','homework.start_date','homework.submission_date','homework.file_name','homework.description','employees.name as staff_name'));

        array_push($data['homework'],$homework);
}
echo '<pre>';
print_r($data['homework']);
print_r($homework);
}


}
?>