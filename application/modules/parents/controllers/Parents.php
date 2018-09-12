<?php


class Parents extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Parents_model');
  } 

/*
* Listing of parents
*/


function index(){
  $schoolId=$this->session->SchoolId;
  $data['parents'] = $this->Parents_model->get_all_parents($schoolId);
  $data['_view'] = 'parentList';
  $this->load->view('../index',$data);
}

/*
* Adding a new parent
*/
function add_parent()
{   
  if($this->input->post("studentId"))
  {
    $student_id=$this->input->post("studentId"); 
    $this->session->studentID=$student_id;
  }   
  $data['ptype'] = $this->Parents_model->fetch_type();
// var_dump( $data['ptype']);die;
  $data['_view'] = 'add';
  $this->load->view('../index',$data);
}
function add()
{   

  $data['ptype'] = $this->Parents_model->fetch_type();
#validation
  $this->load->library('form_validation');
  $config['upload_path']          = './uploads/';
  $config['allowed_types']        = 'gif|jpg|png';
  $this->load->library('upload', $config);

  $this->form_validation->set_rules('parent_Name','parent Name','required|max_length[100]');
  $this->form_validation->set_rules('ptype','parent type','required');
  $this->form_validation->set_rules('email','Email','max_length[40]|valid_email');
  $this->form_validation->set_rules('mobile','Mobile','max_length[15]');

  if($this->form_validation->run() )     
  {   
    $params = array(

      'name' => $this->input->post('parent_Name'),
      'type' => $this->input->post('ptype'),


      'email' => $this->input->post('email'),
      'mobile' => $this->input->post('mobile'),

      'permanent_address' => $this->input->post('paddress'),
      'temporary_address' => $this->input->post('taddress')

    );
    if($this->upload->do_upload('profile_image'))
    {
      $data['image'] =  $this->upload->data();
      $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
      $params['profile_image']=$image_path;
    }
// var_dump($params);die;
    $parentId = $this->Parents_model->add_parent($params);


$username = 'par'.$this->session->SchoolId.'_'.$parentId; #par+schoolid_parentid
// $password = rand(1,10000);
$email = $params['email'];

$userId = $parentId;
$password=rand(1,100000);

$authentication=array(
  'username'=> $username,
  'email'=> $email,
  'autorization_id'=>3,
  'password'=>md5($password),
  'user_id'=> $userId,
  'clear_text'=>$password

);
// var_dump($authentication);
$insertAuthentication  = $this->Parents_model->add_user($authentication);
$this->load->model('student/Student_model');
$userdata=$this->Student_model->select_uname_password($insertAuthentication);


$school_id=$this->session->SchoolId;
$this->load->model('admin/Admin_model');
$organization_name=$this->Admin_model->get_school_name($school_id);


$sendDetails= array(
  'mobile'=>$this->input->post('mobile'),
  'school_id'=>$school_id,
  'module'=>'parent add',
  'id'=>$parentId,
  'user_name'=>$userdata['username'],
  'password'=>$userdata['clear_text'],
  'name'=>$this->input->post('parent_Name'),
  'email'=>$userdata['email'],
  'organization_name'=>$organization_name['organization_name']



);


if($sendDetails['mobile'])
{
 
 $this->addSms($sendDetails);
}
##for mail
if($sendDetails['email'])
{
  // modules::run('parents/parents/addMail',$sendDetails);
  $this->addMail($sendDetails);
}
$schoolParentMap=array(

  'parent_id'=>$parentId,
  'school_id'=>$this->session->SchoolId

);  
$map  = $this->Parents_model->add_mapping($schoolParentMap);
## parent student mapping
if($this->session->studentID)
{
  $parentStudentMap=array(
    "parent_id"=>$parentId,
    "student_id"=> $this->session->studentID
  );
  $mappingToStudent  = $this->Parents_model->add_mapping_student($parentStudentMap);
##insert parent id in student table
  $updateStudent=$this->Parents_model->update_student_parent_name($parentId,$this->session->studentID);
}
$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully added'
 
);
redirect('parents');
}
else
{            
  $data['_view'] = 'add';
  $this->load->view('../index',$data);
}
}  

/*
* Editing a parent
*/
function edit($id)
{   
// check if the parent exists before trying to edit it
  $data['parent'] = $this->Parents_model->get_parent($id);

  if(isset($data['parent']['id']))
  {
    $this->load->library('form_validation');


    $this->form_validation->set_rules('parent_Name','parent Name','required|max_length[100]');
    $this->form_validation->set_rules('ptype','parent type','required');
    $this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
    $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');

    if($this->form_validation->run())     
    {   
      $params = array(
// 'password' => $this->input->post('password'),
        'name' => $this->input->post('parent_Name'),
// 'type' => $this->input->post('ptype'),
// 'qualification' => $this->input->post('qualification'),

        'email' => $this->input->post('email'),
        'mobile' => $this->input->post('mobile'),
// 'profile_image' => $this->input->post('profile_image'),
        'permanent_address' => $this->input->post('paddress'),
        'temporary_address' => $this->input->post('taddress')

      );


      $this->Parents_model->update_parent($id,$params);    
      $this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully edit'
 
);        
      redirect('parents');
    }   
    else
    {
      $data['_view'] = 'edit';
      $this->load->view('../index',$data);
    }
  }
  else
    show_error('The parent you are trying to edit does not exist.');
} 

/*
* Deleting parent
*/
function remove($id)
{
  $parent = $this->Parents_model->get_parent($id);

// check if the parent exists before trying to delete it
  if(isset($parent['id']))
  {
##reamaning some mapping delete if required
    $this->Parents_model->delete_parent($id);
    redirect('parents');
  }
  else
    show_error('The parent you are trying to delete does not exist.');
}

function addMail($detailsMail)
{
#get student details from $studentdetail

#prepair params 
  $module=$detailsMail['module'];
  $username=$detailsMail['user_name'];
  $password=$detailsMail['password'];
  $name=$detailsMail['name'];
  $id=$detailsMail['id'];
  $school_id=$detailsMail['school_id'];
  $to=$detailsMail['email'];
  $school_name=$studentDetailsSms['organoization_name'];
#get body data  from database
  $this->load->model('email/Email_model');
  $fetchTemplateData=$this->Email_model->fetch_template_data($school_id,$module);
  $context=$fetchTemplateData['context'];

  $contextString=array('{school_name','{username','{password','{name','}');
  $ReplaceString=array($school_name,$username,$password,$name,'');
  $body=str_replace($contextString,$ReplaceString,$context);

  $subject = 'User credential';

  $attachments = '';
  modules::run('email/email/sendMail',$to,$subject,$body,$attachments);

#send mail

}
function addSms($detailsSms)
{
#get student details from $studentdetail

  $module=$detailsSms['module'];
  $username=$detailsSms['user_name'];
  $password=$detailsSms['password'];
  $name=$detailsSms['name'];
  $id=$detailsSms['id'];
  $school_id=$detailsSms['school_id'];
  $mobile=$detailsSms['mobile'];
  $school_name=$studentDetailsSms['organoization_name'];
  $this->load->model('sms/Sms_model');
  $fetchTemplateData=$this->Sms_model->fetch_template_sms($school_id,$module);

  $context=$fetchTemplateData['context'];
  $contextString=array('{school_name','{username','{password','{name','}');

  $ReplaceString=array($school_name,$username,$password,$name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
#send sms
  modules::run('sms/sms/sendSms',$mobile,$message);



}













}
?>