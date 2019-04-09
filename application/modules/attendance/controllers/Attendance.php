<?php


class Attendance extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Attendance_model');
    $this->load->model('classes/Classes_model');
    $this->load->model('student/Student_model');
  } 

/*
* Listing of attendance
*/


/*
* Adding a new attendance
*/
function take_attendance()
{ 
  $data['title']="Take Attendance";
  $school_id=$this->session->SchoolId;
  $condition=array('school_id'=>$school_id);
  $data['classes'] = $this->Attendance_model->select('table_courses',$condition,array('*'));
  $data['_view'] = 'attendence';
  $this->load->view('index',$data);
}



function fetchStudent() 
{   

  // $data['classID']=$this->input->post('attendance');
  $course_id=$this->input->post('course_id');
  $batch_id=$this->input->post('batch_id');
  $condition=array('batch_id'=>$batch_id,'school_id'=>$this->session->SchoolId);
  // $data['students'] = $this->Student_model->fetch_students($data['classID']);
  $data['students'] = $this->Attendance_model->fetch_students_by_batch('table_assign_student',$condition,array('student.id','student.name'));
// var_dump( $data['students'] );die;
  $data['_view'] = 'add';
  $this->load->view('index',$data);
}
function insertAttendance()
{   

  $class_id= $this->session->classID;
  $attendenceData = $this->input->post();
// var_dump($attendenceData);die;


#collect data for insertion into insertionData
  $insertionData = array();

  foreach ($attendenceData as $studentName => $status) {

##change in future, (temporary code)
    $data=array(
      'student_id'=>$studentName,
      'attendance_status'=>$status,
      'class_id'=>$class_id,
      'school_id'=>$this->session->SchoolId,
      'date'=>date('y/m/d')


    );

    array_push($insertionData,$data);

  }
// var_dump($insertionData);die;
// $this->Attendance_model->insert_attendance($insertionData);
  $this->db->insert_batch('attendance_record',$insertionData);
  redirect("attendance/attendance_list");

}
function attendance_list()
{
  $data['title']="Attendance list";
  $school_id=$this->session->SchoolId;
   $school_id=$this->session->SchoolId;
  $condition=array('school_id'=>$school_id);
  $data['classes'] = $this->Attendance_model->select('table_courses',$condition,array('*'));
  // $data['classes'] = $this->Classes_model->fetch_classes($school_id);
// var_dump($data['classes'] );die;
  $data['_view'] = 'selectList';
  $this->load->view('index',$data);

}

function show_report()
{
  $data['title']="Show Report";
  $school_id=$this->session->SchoolId;
  $classId= $this->input->post('id');
  $date= $this->input->post('date');
   $this->load->helper('user_helper');
   // $date_range = explode(' - ',$date);
    $start_date = date_change_db($date);
    // echo json_encode($start_date);

  $data['report'] = $this->Attendance_model->fetch_report($school_id,$classId,$start_date);

  $this->load->model('student/Student_model');
  $data['student']=$this->Student_model->fetch_student_name($school_id);
  echo json_encode($data);

}


/*
* Deleting attendance
*/
function remove($id)
{
  $attendance = $this->attendance_model->get_attendance($id);

// check if the attendance exists before trying to delete it
  if(isset($attendance['id']))
  {
    $this->attendance_model->delete_attendance($id);
    redirect('attendance/attendance_list');
  }
  else
    show_error('The attendance you are trying to delete does not exist.');
}
function fetch_student()
{
  $classes_id=$this->input->post('classes_id');
  echo json_encode($this->Attendance_model->fetch_students($classes_id));
}


function test()
{
  $this->load->helper('user_helper');
    $date='09-04-2019';
   $start_date = date_change_db($date);
    echo ($start_date);
}



















}
