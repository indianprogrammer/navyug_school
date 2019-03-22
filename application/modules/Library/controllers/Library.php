<?php


class Library extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Library_model');

    } 

/*
* Listing of subject
*/
function index()
{   
    $data['title']="Subject List";
    $schoolId=$this->session->SchoolId;
    if($this->input->get('classId'))
    {
        $classId=$this->input->get('classId');
        $fetchSubjectId=$this->Subject_model->get_all_subject_by_classid($classId);

        $noOfSubject=count($fetchSubjectId);
                    if($noOfSubject!=0)
                    {
                    
                    $data=array();
                    $data['subject']=array();
                    for($i=0;$i<$noOfSubject;$i++)
                    {
                        array_push( $data['subject'],$fetchSubjectId[$i]['subject_id']);

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
function add_book()
{
    $data['title']="Add Subject";
    $data['_view'] = 'add_books';
    $this->load->view('index',$data);
}


function add_book_process()
{   
    $this->load->library('form_validation');

        $this->input->post('isbn_number',1);

// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('subject_name','subject Name','required|max_length[100]');


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

function add_book_category()
{
// $data['book_category']=$this->Library_model->select('table_book_category',$condition,array('*'));

 $data['_view'] = 'add_book_category';
        $this->load->view('index',$data);

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


        $this->form_validation->set_rules('subject_name','subject Name','required|max_length[100]|is_unique[subjects.name]');


        if($this->form_validation->run() )     
        {   
            $params = array(

                'name' => $this->input->post('subject_name')


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

}
?>