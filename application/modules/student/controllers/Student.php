<?php


class Student extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Student_model');
    $this->load->model('classes/Classes_model');
    $this->load->library('excel');
  } 

/*
* Listing of student
*/
function index()
{   
// $data['claasesName']=$this->Student_model->get_class_name();
  $data['title']="Student List";
  $schoolId=$this->session->SchoolId;
  if($this->input->get('batch_id'))
  {
    $batchId=$this->input->get('batch_id');
    $fetchStudentId=$this->Student_model->select('table_assign_student',array('batch_id'=>$batchId),array('student_id'));
// var_dump($fetchSubjectId);die;
    $noOfStudent=count($fetchStudentId);
     if($noOfStudent!=0)
     {
                    
    $data=array();
    $data['student']=array();
    for($i=0;$i<$noOfStudent;$i++)
    {
      array_push( $data['student'],$fetchStudentId[$i]['student_id']);

    }
    $data['student'] = $this->Student_model->get_student_by_student_id($data['student']);
  }
  else
  {
    $data['student'] =array();
  }

  }
  else
  {

    $data['student'] = $this->Student_model->get_all_student($schoolId);
   // echo json_encode($data['student']);die;

  }
  $data['classes'] = $this->Classes_model->fetch_classes($schoolId);

  $data['_view'] = 'studentList';
  $this->load->view('index',$data);
}

/*
* Adding a new student
*/
function add_student()
{   
  $data['title']="Add Student";
  $school_id=$this->session->SchoolId;
  // $data['classes'] = $this->Classes_model->fetch_classes($school_id);
  $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Classes_model->select('table_courses',$condition,array('*'));
  $data['_view'] = 'add';
  $this->load->view('index',$data);
}


function add()
{   

   $data['title']="Add Student";
  $this->load->library('form_validation');
  $config['upload_path']          = './uploads/';
  $config['allowed_types']        = 'gif|jpg|png';
  $this->load->library('upload', $config);
  $school_id=$this->session->SchoolId;
  $data['classes'] = $this->Classes_model->fetch_classes($school_id);

  $batch_id=$this->input->post('batch',1);
  $course_id=$this->input->post('course',1);
  $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
  $this->form_validation->set_rules('email','Email','max_length[50]|valid_email');

// $this->form_validation->set_rules('mobile','Mobile','required');
// $this->form_validation->set_rules('classes','class','required');

  $this->form_validation->set_rules('paddress','Permanent Address','required');
  $this->form_validation->set_rules('taddress','Temporary Address','required');

  if($this->form_validation->run() )     
  {   
    // $classes=implode(",",$this->input->post('classes'));
    $params = array(
// 'password' => $this->input->post('password'),
      'name' => strip_tags($this->input->post('student_name',1)),
      'email' => strip_tags($this->input->post('email',1)),

      'mobile' => strip_tags($this->input->post('mobile',1)),
      'classes' => 1,
      'aadhar' => strip_tags($this->input->post('aadhar',1)),

      'permanent_address' => strip_tags($this->input->post('paddress',1)),
      'temporary_address' => strip_tags($this->input->post('taddress',1)),
        'p_city' =>strip_tags($this->input->post('p_city',1)),
        't_city' =>strip_tags($this->input->post('t_city',1)),
        't_pincode' =>strip_tags($this->input->post('t_pincode',1)),
        'p_pincode' =>strip_tags($this->input->post('p_pincode',1)),
        'dob' =>strip_tags($this->input->post('dob',1)),
        'gender' =>strip_tags($this->input->post('gender',1)),
        'blood_group' =>strip_tags($this->input->post('blood_group',1))


    );
// var_dump($params);die;
    if($this->upload->do_upload('profile_image'))
    {
      $data['image'] =  $this->upload->data();
      $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
      $params['profile_image']=$image_path;
    }
#add student information
    $studentId = $this->Student_model->add_student($params);
 $batchAssignParams=array(
        'student_id'=> $studentId,
        'batch_id'=>$batch_id,
          // 'course_id'=>$course_id,
          'school_id'=>$this->session->SchoolId

      );

      $assign_batch_student=$this->Student_model->insert('table_assign_student',$batchAssignParams);
$username = 'stu'.$this->session->SchoolId.'_'.$studentId; #stu+schoolid_parentid
$password = rand(1,10000);
$email = $params['email'];

$userId = $studentId;


$authentication=array(
  'username'=> $username,
  'email'=> $email,
##temporary
  'autorization_id'=>4,
  'password'=>md5($password),
  'user_id'=> $studentId,
  'clear_text'=>$password,
  'school_id'=>$school_id

);
// var_dump($authentication);
$insertStudentAuthentication  = $this->Student_model->add_user($authentication);

##for sms info 
$userdata=$this->Student_model->select_uname_password($insertStudentAuthentication);
$school_id=$this->session->SchoolId;
$this->load->model('admin/Admin_model');
$organization_name=$this->Admin_model->get_school_name($school_id);
// var_dump($userdata);
// $msg='Your Username='.$userdata->username.' and Password='.$userdata->clear_text.'';
$studentDetails= array(
  'mobile'=>$this->input->post('mobile'),
  'school_id'=>$this->session->SchoolId,
  'module'=>'student add',
  'student_id'=>$studentId,
  'user_name'=>$userdata['username'],
  'password'=>$userdata['clear_text'],
  'student_name'=>$this->input->post('student_name'),
  'email'=>$userdata['email'],
  'organization_name'=>$organization_name['organization_name']



);

if($studentDetails['mobile'])
{
// addStudentSms($studentDetailsSms);
  // modules::run('student/student/addStudentSms',$studentDetails);
  $this->addStudentSms($studentDetails);
}
##for mail
if($studentDetails['email'])
{
  // modules::run('student/student/addStudentMail',$studentDetails);
   $this->addStudentMail($studentDetails);
}




$schoolStudentMap=array(

  'student_id'=>$studentId,
  'school_id'=>$this->session->SchoolId

);  
$map  = $this->Student_model->add_mapping($schoolStudentMap);
##student class mapping start
$classArray=$this->input->post('classes');
foreach ($classArray as $row) {
# code...

  $studentClassMapping=array(
    'student_id'=>$studentId,
    'class_id' =>$row
  );
  $mapStuClass  = $this->Student_model->add_mappingtoClass($studentClassMapping);
}
#insert student balance details
  $balanceTableInfo=array(

    'customer_id'=>$studentId,
    'school_id'=>$this->session->SchoolId

  );  
  $addBalanceInfo  = $this->Student_model->add_balance_info_default($balanceTableInfo);

$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully added'

);

redirect('student');
}
else
{            
  $this->add_student();
}
}  

/*
* Editing a student
*/
function edit($id)
{   
// check if the student exists before trying to edit it
   $data['title']="Edit Student";
  $data['student'] = $this->Student_model->get_student($id);
  $config['upload_path']          = './uploads/';
  $config['allowed_types']        = 'gif|jpg|png';
  $school_id=$this->session->SchoolId;
  $data['classes'] = $this->Classes_model->fetch_classes($school_id);
  $this->load->library('upload', $config);


  if(isset($data['student']['id']))
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
    $this->form_validation->set_rules('email','Email','max_length[50]|valid_email');

// $this->form_validation->set_rules('mobile','Mobile','required');

    $this->form_validation->set_rules('paddress','Permanent Address','required');
    $this->form_validation->set_rules('taddress','Temporary Address','required');

    if($this->form_validation->run() )     
    {   
      $params = array(

        'name' => $this->input->post('student_name'),
        'email' => $this->input->post('email'),
        'aadhar' => $this->input->post('aadhar'),
        'mobile' => $this->input->post('mobile'),
// 'profile_image' => $this->input->post('profile_image'),
        'permanent_address' => $this->input->post('paddress'),
        'temporary_address' => $this->input->post('taddress'),

      );
// var_dump($params);die;
      if($this->upload->do_upload('profile_image'))
      {
        $data['image'] =  $this->upload->data();
        $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
        $params['profile_image']=$image_path;
      }
      $this->Student_model->update_student($id,$params);      



      $this->session->alerts = array(
        'severity'=> 'success',
        'title'=> 'successfully edited'
      );
      redirect('student');
    }
    else
    {
      $data['_view'] = 'edit';
      $this->load->view('index',$data);
    }
  }
  else
    show_error('The student you are trying to edit does not exist.');
} 

/*
* Deleting student
*/
function remove($id)
{
  $student = $this->Student_model->get_student($id);

  $schoolId=$this->session->SchoolId;
// check if the student exists before trying to delete it
  if(isset($student['id']))
  {
    $this->Student_model->delete_student($id);

    $this->Student_model->delete_studentSchoolMap($id,$schoolId);
    $this->Student_model->delete_studentClassMap($id);


    redirect('student');
  }
  else
    show_error('The student you are trying to delete does not exist.');
}

function soft_delete_student($id)
{
$student = $this->Student_model->get_student($id);

  $schoolId=$this->session->SchoolId;
}

function assign_student()
{
   $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Classes_model->select('table_courses',$condition,array('*'));
    $data['student'] = $this->Student_model->get_all_student($this->session->SchoolId);
    $data['_view'] = 'assign_student';
      $this->load->view('index',$data);

}
function assign_student_process()
{

  $student_id=$this->input->post('student',1);
  $batch_id=$this->input->post('batch',1);
  $course_id=$this->input->post('course',1);
  $this->load->library('form_validation');
   $this->form_validation->CI =& $this;
   $this->form_validation->set_rules('student','Student','required|trim|callback_check_assign_student['.$batch_id.']');
   $this->form_validation->set_rules('batch','Batch','required|trim');
   $this->form_validation->set_rules('course','Course','required|trim');
   $this->form_validation->set_message('check_assign_student','This Student is already assign for this batch & course' );

    if($this->form_validation->run() )     
    {   

      $params=array(
        'student_id'=> $student_id,
        'batch_id'=>$batch_id,
          // 'course_id'=>$course_id,
          'school_id'=>$this->session->SchoolId

      );

      $insert_id=$this->Student_model->insert('table_assign_student',$params);
      if($insert_id)
      {
        $this->session->alerts = array(
        'severity'=> 'success',
        'title'=> 'successfully Assigned'
      );
      redirect('student/assign_student');
      }
    }
    else
    {
       $condition=array('school_id'=>$this->session->SchoolId);
    $data['course']=$this->Classes_model->select('table_courses',$condition,array('*'));
    $data['student'] = $this->Student_model->get_all_student($this->session->SchoolId);
    $data['_view'] = 'assign_student';
      $this->load->view('index',$data);
    }
}


function check_assign_student($student_id,$batch_id)
{
   // $batch_id=$this->input->post('batch',1);
 log_message('error',''.$student_id.'');
 log_message('error','batch id=>'.$batch_id.'');
  $condition=array('student_id'=>$student_id,'batch_id'=>$batch_id,'school_id'=>$this->session->SchoolId);
 $result=$this->Student_model->select_id('table_assign_student',$condition,array('id'));
 if($result)
 {
  return false;
 }
 else
 {
  return true;
 }
 // print_r($result);
}
function add_bulk_student()
{

  $data['_view'] = 'bulkAdd';
  $this->load->view('index',$data);


}
function import_data() 
{
  if(isset($_FILES["file"]["name"]))
  {

    $path = $_FILES["file"]["tmp_name"];
    $object = PHPExcel_IOFactory::load($path);
    foreach($object->getWorksheetIterator() as $worksheet)
    {
      $highestRow = $worksheet->getHighestRow();
      $highestColumn = $worksheet->getHighestColumn();
      for($row=2; $row<=$highestRow; $row++)
      {
        $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
        $email = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $mobile = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $classes = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $permanent_address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
        $temporary_address = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

        $data[] = array(
          'name'    =>  $name,
          'email'=>$email,
          'mobile'   => $mobile,
          'classes'=>$classes,

          'permanent_address'  =>  $permanent_address,
          'temporary_address'=>$temporary_address
// 'parent_id'=>2

        );
      }
    }
// echo json_encode( $data);
    $this->Student_model->insert_by_excel($data);
    echo 'Data Imported successfully';
  } 
}
function getCsv()
{
 
$csv = array();
$filename=$this->input->get('filename');
$location=base_url()."uploads/".$filename;
$lines = file($location, FILE_IGNORE_NEW_LINES);
$file = fopen($location, 'r');
 $noOfCol =count($line = fgetcsv($file));
 $noOfRow=count($lines);

foreach ($lines as $key => $value)
{
  
    $csv[$key] = str_getcsv($value);
   
}


$i=1;
for($i;$i<$noOfRow;$i++)
{

 $params = array(

      'name' => $csv[$i][0],
      'email' => $csv[$i][1],

      'mobile' => $csv[$i][2],
      'aadhar' => $csv[$i][3],
      'classes' => $csv[$i][4],

      'permanent_address' =>$csv[$i][5],
      'temporary_address' => $csv[$i][6]


    ); 

$studentId = $this->Student_model->add_student($params);
$username = 'stu'.$this->session->SchoolId.'_'.$studentId; #stu+schoolid_parentid
$password = rand(1,10000);
$email = $params['email'];

$userId = $studentId;
$password=rand(1,100000);

$authentication=array(
  'username'=> $username,
  'email'=> $email,
##temporary
  'autorization_id'=>4,
  'password'=>md5($password),
  'user_id'=> $studentId,
  'clear_text'=>$password

);
// var_dump($authentication);
$insertStudentAuthentication  = $this->Student_model->add_user($authentication);
##for sms info 
$userdata=$this->Student_model->select_uname_password($insertStudentAuthentication);
$school_id=$this->session->SchoolId;
$this->load->model('admin/Admin_model');
$organization_name=$this->Admin_model->get_school_name($school_id);
// var_dump($userdata);
// $msg='Your Username='.$userdata->username.' and Password='.$userdata->clear_text.'';
$studentDetails= array(
  'mobile'=>$this->input->post('mobile'),
  'school_id'=>$this->session->SchoolId,
  'module'=>'student add',
  'student_id'=>$studentId,
  'user_name'=>$userdata['username'],
  'password'=>$userdata['clear_text'],
  'student_name'=>$this->input->post('student_name'),
  'email'=>$userdata['email'],
  'organization_name'=>$organization_name['organization_name']



);

if($studentDetails['mobile'])
{

  $this->addStudentSms($studentDetails);
}
##for mail
if($studentDetails['email'])
{
  
  $this->addStudentMail($studentDetails);
}
$schoolStudentMap=array(

  'student_id'=>$studentId,
  'school_id'=>$this->session->SchoolId

);  
$map  = $this->Student_model->add_mapping($schoolStudentMap);
##student class mapping start
$classArray=array($csv[$i][4]);
foreach ($classArray as $row) {
# code...

  $studentClassMapping=array(
    'student_id'=>$studentId,
    'class_id' =>$row
  );
  $mapStuClass  = $this->Student_model->add_mappingtoClass($studentClassMapping);
#insert student balance details
}
  $balanceTableInfo=array(

    'customer_id'=>$studentId,
    'school_id'=>$this->session->SchoolId

  );  
  $addBalanceInfo  = $this->Student_model->add_balance_info_default($balanceTableInfo);

$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully added'

);

}
// redirect('student');
}
##short view in popup
function fetchStudentView()
{
  $student_id=$this->input->post('id');
  echo json_encode($student_view= $this->Student_model->get_student($student_id));
}
##in get request
function filterStudent()
{
  $student_id=$this->input->post('id');
  echo json_encode($student_view= $this->Student_model->filter_student($student_id));
}

function getFullDetails()
{ 
   $data['title']="Student Full Details";
  $school_id=$this->session->SchoolId;
  $student_id=$this->input->get('student_id');
  $data['student_info']= $this->Student_model->get_student_full_details($student_id,$school_id);
  // print_r($data['student_info']);die;
  $data['classes'] = $this->Classes_model->fetch_classes($school_id);
  $condition=array('map_student_batch.school_id'=>$school_id,'student_id'=>$student_id);
  $data['student_batch']=$this->Student_model->student_batch('table_assign_student',$condition,array('batch_name','course_name','start_date','end_date'));
  $bookCondition=array('user_type'=>2,'book_issue.school_id'=>$school_id,'taker_id'=> $student_id,'book_issue.status'=>'issued');

  $data['current_issue_book']=$this->Student_model->library_issue_book_student('table_book_issue',$bookCondition,array('issue_date','due_date','title','author','isbn_no','edition'));
// var_dump($data['current_issue_book']);die;
// var_dump($data['classes']);die;
    // print_r($data['student_batch']);die;
  $data['_view'] = 'studentDetails';
  $this->load->view('index',$data);


}
function addStudentMail($studentDetailsMail)
{
#get student details from $studentdetail

#prepair params 
  $module=$studentDetailsMail['module'];
  $username=$studentDetailsMail['user_name'];
  $password=$studentDetailsMail['password'];
  $student_name=$studentDetailsMail['student_name'];
  $student_id=$studentDetailsMail['student_id'];
  $school_id=$studentDetailsMail['school_id'];
  $to=$studentDetailsMail['email'];
  $school_name=$studentDetailsSms['organization_name'];
#get body data  from database
  $this->load->model('email/Email_model');
  $fetchTemplateData=$this->Email_model->fetch_template_data($school_id,$module);
  $context=$fetchTemplateData['context'];

  $contextString=array('{school_name','{username','{password','{student_name','}');
  $ReplaceString=array($school_name,$username,$password,$student_name,'');
  $body=str_replace($contextString,$ReplaceString,$context);

  $subject = 'student credential';

  $attachments = '';
  modules::run('email/email/sendMail',$to,$subject,$body,$attachments);

#send mail

}
function addStudentSms($studentDetailsSms)
{
#get student details from $studentdetail

  $module=$studentDetailsSms['module'];
  $username=$studentDetailsSms['user_name'];
  $password=$studentDetailsSms['password'];
  $student_name=$studentDetailsSms['student_name'];
  $student_id=$studentDetailsSms['student_id'];
  $school_id=$studentDetailsSms['school_id'];
  $mobile=$studentDetailsSms['mobile'];
  $school_name=$studentDetailsSms['organization_name'];
  $this->load->model('sms/Sms_model');
  $fetchTemplateData=$this->Sms_model->fetch_template_sms($school_id,$module);

  $context=$fetchTemplateData['context'];
  $contextString=array('{school_name','{username','{password','{student_name','}');

  $ReplaceString=array($school_name,$username,$password,$student_name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
#send sms
  modules::run('sms/sms/sendSms',$mobile,$message);



}

##used to search student
function search_student()
{
 $search=$this->input->post("search_student",1);
 $condition=array('school_id'=>$this->session->SchoolId);
 // echo '<pre>';
    echo json_encode($this->Student_model->studentSearch('table_map_school_student',$condition,array('*'),$search));
    // print_r($this->Student_model->studentSearch('table_map_school_student',$condition,array('*'),$search));

}


}
?>