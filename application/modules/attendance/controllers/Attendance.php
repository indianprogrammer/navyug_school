    <?php


    class Attendance extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Attendance_model');
        } 

    /*
     * Listing of attendance
     */
    // function attendance_list()
    // {
    //     $data['attendance'] = $this->Attendance_model->get_all_attendance();
        
    //     $data['_view'] = 'attendanceList';
    //     $this->load->view('index',$data);
    // }

    /*
     * Adding a new attendance
     */
    function take_attendance()
     { 
        $school_id=$this->session->SchoolId;
        $data['classes'] = $this->Attendance_model->fetch_classes($school_id);
       $data['_view'] = 'attendence';
       $this->load->view('index',$data);
   }


 
function fetchStudent() 
{   

     $data['classID']=$this->input->post('attendance');
    $data['students'] = $this->Attendance_model->fetch_students($data['classID']);

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

   $school_id=$this->session->SchoolId;
    $data['classes'] = $this->Attendance_model->fetch_classes($school_id);
    // var_dump($data['classes'] );die;
    $data['_view'] = 'selectList';
       $this->load->view('index',$data);

}
    
function show_report()
{
    $school_id=$this->session->SchoolId;
    $classId= $this->input->post('id');
    $date= $this->input->post('date');
     // var_dump($date);die;
  

  $data['report'] = $this->Attendance_model->fetch_report($school_id,$classId,$date);
  // $data['report'] = $this->Attendance_model->fetch_reports($date);
  // var_dump($data['report']);die;

  $data['student']=$this->Attendance_model->fetch_student_name($school_id);
 echo json_encode($data);
   // $data['_view'] = 'attendanceList';
   //     $this->load->view('index',$data);
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
         
            echo json_encode($this->Attendance_model->fetch_students($this->input->post('classes_id')));
                                                }
    
}
