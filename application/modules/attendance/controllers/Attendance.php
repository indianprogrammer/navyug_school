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
    function attendance_list()
    {
        $data['attendance'] = $this->Attendance_model->get_all_attendance();
        
        $data['_view'] = 'attendanceList';
        $this->load->view('index',$data);
    }

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


   function add_attendance()
   {   
             $school_id=$this->session->SchoolId;
             $value=$this->input->post('student');
             var_dump($value);
       
}  
function fetchStudent()
{   
    $classID=$this->input->post('attendance');
    $data['students'] = $this->Attendance_model->fetch_students($classID);
     $data['_view'] = 'add';
       $this->load->view('index',$data);
}
function insertAttendance()
{   

    $attendenceData = $this->input->post();
     

     
    foreach ($attendenceData as $studentName => $status) {
    
       ##change in future, (temporary code)
        $this->db->query("insert into attendance_record (student_name,attendance_status) value ('$studentName','$status') ");
    }

}

    /*
     * Editing a attendance
     */
    function edit($id)
    {   
        // check if the attendance exists before trying to edit it
        $data['attendance'] = $this->attendance_model->get_attendance($id);
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);

        
        if(isset($data['attendance']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('attendance_name','attendance Name','required|max_length[100]');
            $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            $this->form_validation->set_rules('username','Username','required|max_length[100]');
            $this->form_validation->set_rules('mobile','Mobile','required');

            $this->form_validation->set_rules('paddress','Permanent Address','required');
            $this->form_validation->set_rules('taddress','Temporary Address','required');

            if($this->form_validation->run() )     
            {   
                $params = array(

                    'attendance_name' => $this->input->post('attendance_name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                // 'profile_image' => $this->input->post('profile_image'),
                    'permanent_address' => $this->input->post('paddress'),
                    'temporary_address' => $this->input->post('taddress'),
                    
                );
                // var_dump($params);die;
                $data['image'] =  $this->upload->data();
              // var_dump($data);
                $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
                $params['profile_image']=$image_path;
                $this->attendance_model->update_attendance($id,$params);            
                redirect('attendance/attendance_list');
            }
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('index',$data);
            }
        }
        else
            show_error('The attendance you are trying to edit does not exist.');
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
