<?php


class Notification extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Notification_model');
    $this->load->model('student/Student_model');
    $this->load->model('employee/Employee_model');
    $this->load->model('classes/Classes_model');
  } 

  function index()
  {
    $school_id=$this->session->SchoolId;
    $data['schoolName']= modules::run('admin/admin/getSchoolName',$school_id);
    $data['_view'] = 'filter';

    $this->load->view('../index', $data);
  }
  function fetchStudentClassWise()
  {

   $data=$this->Notification_model->fetch_student_class_wise($this->input->post('id'));
   echo json_encode($data);

 } 
 function fetchAllStudent() 
 {
  $school_id=$this->session->SchoolId;
  $Student=$this->Student_model->get_all_student($school_id);
  // print_r(($Student));
  echo json_encode($Student);
}

function fetchAllEmployee() 
{
  $school_id=$this->session->SchoolId;
  $employee=$this->Employee_model->get_all_employees($school_id);
  echo json_encode($employee);
}
function fetchAllClasses()
{
  $school_id=$this->session->SchoolId;
  $data['class'] = $this->Classes_model->get_all_class($school_id);
  echo json_encode($data['class']);
}/**/
function fetchEmployeeClassWise()
{

 $data=$this->Notification_model->fetch_Employee_class_wise($this->input->post('id'));
 echo json_encode($data);

} 
function sendNotification()

{
  $notification=$this->input->post("notification");
  // var_dump(expression)
  $notificationStudent=$this->input->post('student_details');
  $notificationEmployee=$this->input->post('employee_id');
  // $notification=$this->input->post();
  // var_dump($notification);die;
  if(is_null($notificationEmployee))
  {
    $notificationEmployee=0;
  }
  if(is_null($notificationStudent))
  {
    $notificationStudent=0;
  }
 
   modules::run('sms/sms/send_notification_sms',$notification,$notificationStudent,$notificationEmployee);
   modules::run('email/email/send_notification_email',$notification,$notificationStudent,$notificationEmployee);
   $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully sent',
         'description'=> ''
       );
      redirect('notification');

  



}



}
?>
