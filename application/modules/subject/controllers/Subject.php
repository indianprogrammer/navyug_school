<?php


class Subject extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Subject_model');

    } 

/*
* Listing of subject
*/
// function index()
// {   
//     $data['title']="Subject List";
//     $schoolId=$this->session->SchoolId;
//     if($this->input->get('classId'))
//     {
//         $classId=$this->input->get('classId');
//         $fetchSubjectId=$this->Subject_model->get_all_subject_by_classid($classId);

//         $noOfSubject=count($fetchSubjectId);
//                     if($noOfSubject!=0)
//                     {

//                     $data=array();
//                     $data['subject']=array();
//                     for($i=0;$i<$noOfSubject;$i++)
//                     {
//                         array_push( $data['subject'],$fetchSubjectId[$i]['subject_id']);

//                     }
//             // echo $data['subject'];
//                     $data['subject'] = $this->Subject_model->get_subject_by_subject_id($data['subject']);
//                      }
//                      else
//                      {
//                         $data['subject']=array();
//                      }

//     }
//     else
//     {
//         $data['subject'] = $this->Subject_model->get_all_subject($schoolId);
//     }
//     $data['_view'] = 'subjectList';
//     $this->load->view('index',$data);
// }
function index()
{   
    $data['title']="Subject List";
    $schoolId=$this->session->SchoolId;
    if($this->input->get('batchId'))
    {
        $batchId=$this->input->get('batchId');
        $fetchSubjectId=$this->Subject_model->select('table_assign_subject',array('school_id'=>$schoolId,'batch_id'=>$batchId),array('batch_id','subject_ids'));
        // print_r($fetchSubjectId);die;    
        $noOfSubject=count($fetchSubjectId);
        if($noOfSubject!=0)
        {

            $data=array();
            $data['subject']=array();
            for($i=0;$i<$noOfSubject;$i++)
            {
                array_push( $data['subject'],$fetchSubjectId[$i]['subject_ids']);

            }
            // echo $data['subject'];
            $data['subject'] = $this->Subject_model->get_subject_by_subject_id($data['subject']);
        }
        else
        {
            $data['subject']=array();
        }

    }
    else
    {
        $data['subject'] = $this->Subject_model->get_all_subject($schoolId);
    }
    $data['_view'] = 'subjectList';
    $this->load->view('index',$data);
}

/*
* Adding a new subject
*/
public function add_subject()
{
    $data['title']="Add Subject";
    $data['_view'] = 'add';
    $this->load->view('index',$data);
}


public function add()
{   
    $this->load->library('form_validation');
    $this->form_validation->CI =& $this;
    // $this->load->library('MY_Form_validation');
    $subject_name= $this->input->post('subject_name');

// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    // $this->form_validation->set_rules('subject_name','subject Name','required|max_length[100]|subject_check[sub]');
    $this->form_validation->set_rules('subject_name','subject Name','required|callback_subject_check');
    $this->form_validation->set_message('subject_check', 'Subject already exists');


    if($this->form_validation->run() )     
    {   
        $params = array(

            'name' => $this->input->post('subject_name')


        );


        $subject_id = $this->Subject_model->add_subject($params);
        $ids=array(

            'subject_id'=>$subject_id,
            'school_id'=>$this->session->SchoolId

        );  
        $map = $this->Subject_model->add_mapping($ids);

#set notifications
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'
// 'description'=> ''
        );

        redirect('subject');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

public function subject_check($str)

{


 // $this->load->library('form_validation');
 // $this->form_validation->CI =& $this;
    $condition=array('name'=>$str,'map_school_subject.school_id'=>$this->session->SchoolId);
    $result=$this->Subject_model->get_all_subject_check('table_map_school_subject',$condition,array('name'));
    // print_r($result);
    if($result)
    {
        // $this->form_validation->set_message('subject_check','hii');
        return FALSE;
    }
    else
    {
        // $this->form_validation->set_message('subject_check','hii');
        return TRUE;
    }
}
function assign_subject()
{
    $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Subject_model->select('table_courses',$condition,array('id','course_name'));
##assigned subject list
    $subjectCondition=array('subject_assign.school_id'=>$this->session->SchoolId);
    $data['assign_subject']=$this->Subject_model->select_assign_subject('table_assign_subject',$subjectCondition,array('subject_assign.id','batch_name','name as subject_name','course.course_name'));
// print_r($data['assign_subject']);die;
    $data['_view'] = 'assign_subject';
    $this->load->view('index',$data);

}

function fetch_batch_by_course()
{
    $course_id=$this->input->post('course_id',1);
    $condition=array('school_id'=>$this->session->SchoolId,'course_id'=>$course_id);
    $data['course']=$this->Subject_model->select('table_batch',$condition,array('id','batch_name'));
    echo json_encode($data['course']);
// echo json_encode($course_id);


}
function fetch_subject()
{
// $course_id=$this->input->post('course_id');
    $condition=array('school_id'=>$this->session->SchoolId);
    $data['subject']=$this->Subject_model->select('table_subject',$condition,array('id','name'));
    echo json_encode($data['subject']);


}
function assign_subject_add()
{
    $this->load->library('form_validation');
    $this->form_validation->CI =& $this;

// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('course','Course Name','required');
    $this->form_validation->set_rules('batch','Batch Name','required');
    $this->form_validation->set_rules('subject[]','Subject Name','required');
    $this->form_validation->set_message('assign_subject_check', 'Subject already exists');


    if($this->form_validation->run() )     
    {   

        $subject=$this->input->post('subject',1);
        for($i=0;$i<count($subject);$i++)
        {
            $params = array(

                'course_id' => $this->input->post('course',1),
                'batch_id' => $this->input->post('batch',1),
                'subject_ids'=>$subject[$i],
                'school_id'=>$this->session->SchoolId,
                'created_at'=>date('Y-m-d H:i:s')


            );
        // print_r($params);die;

            $result = $this->Subject_model->insert('table_assign_subject',$params);
        }

#set notifications
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'
// 'description'=> ''
        );

        redirect('subject/assign_subject');
    }
    else
    {    
        $this->assign_subject();
        // $this->assign_subject();
    }
}

function assign_subject_check($str)
{
    // $this->Subject_model->select_id('');
    $r=print_r($str,true);
   log_message('error',''+$r+'');
   // return false;

}
/*
* Editing a subject
*/
function edit($id)
{   
// check if the subject exists before trying to edit it
    $data['title']="Edit Subject";
    $data['subject'] = $this->Subject_model->get_subject($id);


    if(isset($data['subject']['id']))
    {
        $this->load->library('form_validation');
$this->form_validation->CI =& $this;

        $this->form_validation->set_rules('subject_name','subject Name','required|max_length[100]|callback_subject_check');
        $this->form_validation->set_message('subject_check', 'Subject already exists');


        if($this->form_validation->run() )     
        {   
            $params = array(

                'name' => $this->input->post('subject_name',1)


            );

            $this->Subject_model->update_subject($id,$params);            
            redirect('subject');
        }
        else
        {
            $data['_view'] = 'edit';
            $this->load->view('index',$data);
        }
    }
    else
        show_error('The subject you are trying to edit does not exist.');
} 

function subject_allocation()
{

    $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Subject_model->select('table_courses',$condition,array('id','course_name'));
    $schoolId=$this->session->SchoolId;
    $this->load->model('employee/Employee_model');
    $data['employees'] = $this->Employee_model->get_all_employees($schoolId);
    $data['subject'] = $this->Subject_model->get_all_subject($schoolId);
    ##assigned subject list
    $subjectCondition=array('subject_allocation.school_id'=>$this->session->SchoolId);
    $data['subject_allocation']=$this->Subject_model->select_allocation_subject('table_subject_allocation',$subjectCondition,array('subject_allocation.id','batch_name','subjects.name as subject_name','employees.name as staff_name'));
    $data['_view'] = 'subject_allocation';
    $this->load->view('index',$data);
}
function allote_subject_add()
{

   $this->load->library('form_validation');
   $this->form_validation->CI =& $this;
    $subject=$this->input->post('subject',1);
    $staff=$this->input->post('staff',1);
    $batch=$this->input->post('batch',1);
        // $callbackParam=array("batch_id"=>$batch,'staff_id'=>$staff);
        $callbackParam = ''.$batch . ',' . $staff . ',' ;
   $this->form_validation->set_rules('staff','Staff Name','required');
   $this->form_validation->set_rules('course','Course Name','required');
   $this->form_validation->set_rules('batch','Batch Name','required');
   $this->form_validation->set_rules('subject','Subject Name','required|callback_check_subject_allocation['.$callbackParam.']');
    $this->form_validation->set_message('check_subject_allocation', 'This  {field} is already allocated');


   if($this->form_validation->run() )     
   {   


    $params = array(

        'course_id' => $this->input->post('course',1),
        'batch_id' =>$batch ,
        'subject_id'=>$subject,
        'school_id'=>$this->session->SchoolId,
        'staff_id'=> $staff


    );
        // print_r($params);die;

    $result = $this->Subject_model->insert('table_subject_allocation',$params);


#set notifications
    $this->session->alerts = array(
        'severity'=> 'success',
        'title'=> 'successfully added'
// 'description'=> ''
    );

    redirect('subject/subject_allocation');
}
else
{    
//     $condition=array('school_id'=>$this->session->SchoolId);
// $data['course']=$this->Subject_model->select('table_courses',$condition,array('id','course_name'));
// $schoolId=$this->session->SchoolId;
//     $this->load->model('employee/Employee_model');
//     $data['employees'] = $this->Employee_model->get_all_employees($schoolId);
// $data['_view'] = 'subject_allocation';
//         $this->load->view('index',$data);
    $this->subject_allocation();
}
}


function check_subject_allocation($subject_id,$param)
{
    $result=explode(',',''.$param.'');
    $condition=array('subject_id'=>$subject_id,'staff_id'=>$result[1],'batch_id'=>$result[0],'school_id'=>$this->session->SchoolId);
     $e=print_r($condition,true);
    // log_message('error',''.$param.'');
    // log_message('error',''.$subject_id.'');
    log_message('error',''.$e.'');
   $result=$this->Subject_model->select_id('table_subject_allocation',$condition,array('id')) ;
   // print_r($result);
   if($result)
   {
    // echo "false";
    return false;
   }
   else
   {
    // echo "true";
    return true;
   }
   // print_r($result);
}

/*
* Deleting subject
*/
function remove()
{   
    $id=$this->input->post('id');
    $subject = $this->Subject_model->get_subject($id);
    $schoolId=$this->session->SchoolId;
// check if the subject exists before trying to delete it
    if(isset($subject['id']))
    {
        $this->Subject_model->delete_subject($id);
        $this->Subject_model->delete_subjectSchoolMap($id,$schoolId);
        echo true;
// redirect('subject');
    }
    else
        show_error('The subject you are trying to delete does not exist.');
}


function test()
{
    // $callbackParam=array("batch_id"=>1,'staff_id'=>33);
    // $subject_id=3;
    // $e=print_r($callbackParam,true);
    // echo $e;die;
    $second_parameter = 'first_arg' . '||' . 'second_arg' . '||' . 'third_arg';
    list($first_param, $second_param, $third_param) = split('||', $second_parameter);
    // $this->check_subject_allocation($subject_id,$callbackParam);
}


}
?>