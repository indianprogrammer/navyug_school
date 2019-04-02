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


/*
* Adding a new subject
*/
function add_books()
{
    $data['title']="Add Subject";
     $condition=array('school_id'=>$this->session->SchoolId);
    $data['book_category']=$this->Library_model->select('table_book_category',$condition,array('*'));
    $data['_view'] = 'add_books';
    $this->load->view('index',$data);
}


function add_book_process()
{   
    // print_r($this->input->post());die;
    $this->load->library('form_validation');


// $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('book_no','book no','required');
    $this->form_validation->set_rules('title','title','required');
    $this->form_validation->set_rules('author','author','required');
    $this->form_validation->set_rules('edition','edition','required');
    $this->form_validation->set_rules('book_category','Book category','required');
    $this->form_validation->set_rules('publisher','Publisher','required');


    if($this->form_validation->run() )     
    {   
        $params = array(

            'title' => strip_tags($this->input->post('title',1)),
               'book_no'=> strip_tags($this->input->post('book_no',1)),
               'author'=> strip_tags($this->input->post('author',1)),
               'edition'=> strip_tags($this->input->post('edition',1)),
               'book_category'=> strip_tags($this->input->post('book_category',1)),
               'publisher'=> strip_tags($this->input->post('publisher',1)),
               'langauge'=> strip_tags($this->input->post('langauge',1)),
               'shelf_no'=> strip_tags($this->input->post('shelf',1)),
               'copy'=> strip_tags($this->input->post('copies',1)),
               'book_position'=> strip_tags($this->input->post('position',1)),
               'book_condition'=> strip_tags($this->input->post('condition',1)),
               'book_cost'=> strip_tags($this->input->post('cost',1)),
               'school_id'=>$this->session->SchoolId,
               'created_at'=>date('Y-m-d H:i:s'),
                     'isbn_no' =>      strip_tags($this->input->post('isbn_no',1))

        );


        $subject_id = $this->Library_model->insert('table_books',$params);
      

#set notifications
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'
// 'description'=> ''
        );

        redirect('library/add_books');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

function issue_book()
{
$data['_view'] = 'issue_book';
    $this->load->view('index',$data);

}
function books_list()
{
$condition=array('school_id'=>$this->session->SchoolId);
$data['book_list']=$this->Library_model->select('table_books',$condition,array('*'));
    $data['_view'] = 'book_list';
    $this->load->view('index',$data);

}
function search_books()
{

    $search=strip_tags($this->input->get('search',1));
    // print_r( $search);
    $condition=array('school_id'=>$this->session->SchoolId);
    $data['book_list']=$this->Library_model->searchBooks('table_books',$condition,array('*'),$search);
    echo json_encode($data['book_list']);
   // $this->output->enable_profiler(TRUE);


}

##whenever any student or emplyee issue the book from library this will maintain record
    
function issue_book_record_insert()
{
    // print_r($this->input->post());die;
    $book_id=$this->input->post('book_id',1);
     $condition=array('school_id'=>$this->session->SchoolId);
    $result_date=$this->Library_model->select_id('table_school_setting',$condition,array('library_due_day','fine'));
    // print_r($due_date['library_due_day']);
    // $date_due=;
    $date_due= date('Y-m-d H:i:s', strtotime('+'.$result_date['library_due_day'].' days'));
    for($i=0;$i<count($book_id);$i++)
    {

    $params=array(
             'user_type' => strip_tags($this->input->post('user_type',1)),
               'taker_id'=> strip_tags($this->input->post('taker_id',1)),
               'status'=> 'issued',
               'issue_date'=>date('Y-m-d H:i:s'),
               'due_date'=>$date_due,
               'school_id'=>$this->session->SchoolId,
               'staff_id'=>$this->session->staff_id,
               'book_id'=>$book_id[$i]
           );

        $result=$this->Library_model->insert('table_book_issue',$params);
        if($result)
        {
                $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'
// 'description'=> ''
        );

        redirect('library/book_issue_list');

        }
}

}

function book_issue_list()
{
    $conditionStu=array('book_issue.school_id'=>$this->session->SchoolId,'user_type'=>2);
    $conditionEmp=array('book_issue.school_id'=>$this->session->SchoolId,'user_type'=>1);
    $data1=$this->Library_model->issue_book_list_stu('table_book_issue',$conditionStu,array('book_issue.id','book_issue.user_type','name','title','issue_date','due_date','returning_date','author','book_issue.status','book_no'));
    $data2=$this->Library_model->issue_book_list_emp('table_book_issue',$conditionEmp,array('book_issue.id','book_issue.user_type','name','title','issue_date','due_date','returning_date','author','book_issue.status','book_no'));
    $data['issue_book']=array_merge($data1,$data2);
    // echo '<pre>';
    // print_r($data['issue_book']);
    // print_r($data2);
   $data['_view'] = 'book_issue_list';
    $this->load->view('index',$data);
}



function add_book_category()
{
    $condition=array('school_id'=>$this->session->SchoolId);
$data['book_category']=$this->Library_model->select('table_book_category',$condition,array('*'));

 $data['_view'] = 'add_book_category';
        $this->load->view('index',$data);

}
function add_book_category_process()
{
     $this->load->library('form_validation');
    $category_name = strip_tags(strtolower($this->input->post('cat_name',1)));
    $this->form_validation->set_rules('cat_name', 'Book Category Name', 'required|check_book_category['.$category_name.']');
     $this->form_validation->set_message('check_book_category', 'This {field}  is already exists');
  if($this->form_validation->run() )     
    { 
    $categoryParam=array(
        'school_id'=>$this->session->SchoolId,
        'created_at'=>date('Y-m-d H:i:s'),
        'category_name'=>$category_name

    );
    $result=$this->Library_model->insert('table_book_category',$categoryParam);
    if($result)
    {
    $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'

        );

        redirect('library/add_book_category');
    }
}
else
{
 $condition=array('school_id'=>$this->session->SchoolId);
$data['book_category']=$this->Library_model->select('table_book_category',$condition,array('*'));

 $data['_view'] = 'add_book_category';
        $this->load->view('index',$data);

}

}

##for book_category is unique or not checking
function check_book_category($str)
{
 $this->load->library('form_validation');
     $condition=array('school_id'=>$this->session->SchoolId,'category_name'=>$str);
     $data=$this->Library_model->select_id('table_book_category',$condition,array('category_name'));
     // print_r($data);
      if($data)
      {
         $this->form_validation->set_message('check_book_category', 'This {field} field is already exists');
        return false;
      }
      else
      {
        // $this->form_validation->set_message('check_book_category', 'This {field} field is already exists');
        return true; 
      }


}



function books_return()
{
 $data['_view'] = 'book_return';
        $this->load->view('index',$data);

}
function books_return_record()
{
    // print_r($this->input->post());
    $id=$this->input->post('id',1);
    for($i=0;$i<count($id);$i++)
    {
    $param=array('status'=>'return','returning_date'=>date('Y-m-d H:i:'));
    $condition=array('id'=>$id[$i]);
    $result=$this->Library_model->update_col('table_book_issue',$condition,$param);
    if($result=='success')
    {

        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'

        );

        redirect('library/book_issue_list');
    }
    }   

}
function search_issue_record()
{

    $id=$this->input->post('search',1);
    $type=$this->input->post('type',1);
    if($type==1)
    {
         $condition= array('book_issue.school_id'=>$this->session->SchoolId,'taker_id'=>$id,'user_type'=>1,'book_issue.status'=>'issued');
     $result=$this->Library_model->select_issued_book_emp('table_book_issue',$condition,array('book_issue.id','title','due_date','issue_date','author','isbn_no','book_no'));
    }
    if($type==2)
       { 
    $condition= array('book_issue.school_id'=>$this->session->SchoolId,'taker_id'=>$id,'user_type'=>2,'book_issue.status'=>'issued');
     $result=$this->Library_model->select_issued_book_stu('table_book_issue',$condition,array('book_issue.id','title','due_date','issue_date','author','isbn_no','book_no'));
        }
     // echo '<pre>';
     echo json_encode($result);
}
function library_setting()
{

$data['_view'] = 'due_date_setting';
        $this->load->view('index',$data);

}

function add_library_setting()
{
   $due_day= strip_tags($this->input->post('due_day',1));
   $fine= strip_tags($this->input->post('fine',1));
   $condition=array('school_id'=>$this->session->SchoolId);
   $params=array(
    'library_due_day'=>$due_day,
    'fine'=>$fine

   );
   $result=$this->Library_model->update_col('table_school_setting',$condition,$params);


}
// function search_issue_record_stu()
// {

//     $id=$this->input->post('search_employee',1);
//     $condition= array('book_issue.school_id'=>$this->session->SchoolId,'taker_id'=>$id,'user_type'=>1,'book_issue.status'=>'issued');
//      $result=$this->Library_model->select_issued_book_emp('table_book_issue',$condition,array('book_issue.id','title','due_date','issue_date','author','isbn_no','book_no'));
//      // echo '<pre>';
//      echo json_encode($result);
// }

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


function test()
{

     $condition=array('school_id'=>$this->session->SchoolId);
    $result_date=$this->Library_model->select_id('table_school_setting',$condition,array('library_due_day','fine'));
    // print_r($due_date['library_due_day']);
    $date_due=$result_date['library_due_day'];
     echo date('Y-m-d H:i:s', strtotime('+'.$date_due.' days'));
}











}
?>