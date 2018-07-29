    <?php


    class Student extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Student_model');
        } 

    /*
     * Listing of student
     */
    function student_list()
    {
        $data['student'] = $this->Student_model->get_all_student();
        
        $data['_view'] = 'studentList';
        $this->load->view('index',$data);
    }

    /*
     * Adding a new student
     */
    function add_student()
    {   
        $school_id=$this->session->SchoolId;
        $data['classes'] = $this->Student_model->fetch_classes($school_id);
       $data['_view'] = 'add';
       $this->load->view('index',$data);
   }


   function add()
   {   
    $this->load->library('form_validation');
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $this->load->library('upload', $config);
    $school_id=$this->session->SchoolId;
     $data['classes'] = $this->Student_model->fetch_classes($school_id);

    $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
    $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
   
    $this->form_validation->set_rules('mobile','Mobile','required');
    $this->form_validation->set_rules('classes','class','required');

    $this->form_validation->set_rules('paddress','Permanent Address','required');
    $this->form_validation->set_rules('taddress','Temporary Address','required');

    if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
    {   
        $params = array(
                // 'password' => $this->input->post('password'),
            'student_name' => $this->input->post('student_name'),
            'email' => $this->input->post('email'),
           
            'mobile' => $this->input->post('mobile'),
            'classes' => implode(",",$this->input->post('classes')),
              
            'permanent_address' => $this->input->post('paddress'),
            'temporary_address' => $this->input->post('taddress'),
            'created_at'=>date('Y-m-d h:i:s'),
            'modified_at'=>date('Y-m-d h:i:s')

        );
        $data['image'] =  $this->upload->data();
       
        $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
        
        $params['profile_image']=$image_path;
        #add student information
        $studentId = $this->Student_model->add_student($params);
         $username = 'stu'.$this->session->SchoolId.'_'.$studentId; #stu+schoolid_parentid
             $password = rand(1,10000);
             $email = $params['email'];

             $userId = $studentId;
             $password=rand(1,100000);
                // $data['master_authorization'] = $this->Student_model->get_authentication_id();
                // var_dump($data['master_authorization']);
             $authentication=array(
               'username'=> $username,
               'email'=> $email,
               'autorization_id'=>4,
               'password'=>md5($password),
                'user_id'=> $studentId,
               'clear_text'=>$password

           );
             // var_dump($authentication);
             $insertStudentAuthentication  = $this->Student_model->add_user($authentication);
             $schoolStudentMap=array(

                'student_id'=>$studentId,
                'school_id'=>$this->session->SchoolId

            );  
             $map  = $this->Student_model->add_mapping($schoolStudentMap);
             ##student class mapping start
             $studentClassMapping=array(
                'student_id'=>$studentId,
                'class_id' =>$params['classes']
             );
             $mapStuClass  = $this->Student_model->add_mappingtoClass($studentClassMapping);
              $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added',
         'description'=> ''
     );

        redirect('student/student_list');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

    /*
     * Editing a student
     */
    function edit($id)
    {   
        // check if the student exists before trying to edit it
        $data['student'] = $this->Student_model->get_student($id);
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);

        
        if(isset($data['student']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
            $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            $this->form_validation->set_rules('username','Username','required|max_length[100]');
            $this->form_validation->set_rules('mobile','Mobile','required');

            $this->form_validation->set_rules('paddress','Permanent Address','required');
            $this->form_validation->set_rules('taddress','Temporary Address','required');

            if($this->form_validation->run() )     
            {   
                $params = array(

                    'student_name' => $this->input->post('student_name'),
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
                $this->Student_model->update_student($id,$params);      
                 $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully edited',
         'description'=> ''      );
                redirect('student/student_list');
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

        // check if the student exists before trying to delete it
        if(isset($student['id']))
        {
            $this->Student_model->delete_student($id);
            redirect('student/student_list');
        }
        else
            show_error('The student you are trying to delete does not exist.');
    }
    
}
