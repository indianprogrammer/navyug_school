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
        $data['attendance'] = $this->attendance_model->get_all_attendance();
        
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
       $data['_view'] = 'add';
       $this->load->view('index',$data);
   }


   function add()
   {   
    $this->load->library('form_validation');
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $this->load->library('upload', $config);

        // $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('attendance_name','attendance Name','required|max_length[100]');
    $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
    $this->form_validation->set_rules('username','Username','required|max_length[100]');
    $this->form_validation->set_rules('mobile','Mobile','required');

    $this->form_validation->set_rules('paddress','Permanent Address','required');
    $this->form_validation->set_rules('taddress','Temporary Address','required');

    if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
    {   
        $params = array(
                // 'password' => $this->input->post('password'),
            'attendance_name' => $this->input->post('attendance_name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'mobile' => $this->input->post('mobile'),
                // 'profile_image' => $this->input->post('profile_image'),
            'permanent_address' => $this->input->post('paddress'),
            'temporary_address' => $this->input->post('taddress'),
            'created_at'=>date('Y-m-d h:i:s'),
            'modified_at'=>date('Y-m-d h:i:s')

        );
        $data['image'] =  $this->upload->data();
              // var_dump($data);
        $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
        $params['profile_image']=$image_path;

        $attendance_id = $this->attendance_model->add_attendance($params);
        redirect('attendance/attendance_list');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
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
    
}
