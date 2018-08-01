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
        // $data['claasesName']=$this->Student_model->get_class_name();
        $schoolId=$this->session->SchoolId;
        $data['student'] = $this->Student_model->get_all_student($schoolId);
        $data['classes'] = $this->Student_model->getAllClasses($schoolId);
        
        // print_r($data['classes']);

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
    // $this->form_validation->set_rules('classes','class','required');

    $this->form_validation->set_rules('paddress','Permanent Address','required');
    $this->form_validation->set_rules('taddress','Temporary Address','required');

    if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
    {   
     $classes=implode(",",$this->input->post('classes'));
        $params = array(
                // 'password' => $this->input->post('password'),
            'student_name' => $this->input->post('student_name'),
            'email' => $this->input->post('email'),
           
            'mobile' => $this->input->post('mobile'),
            'classes' => $classes,
              
            'permanent_address' => $this->input->post('paddress'),
            'temporary_address' => $this->input->post('taddress')
           

        );
        // var_dump($params);die;
        $data['image'] =  $this->upload->data();
       
        $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
        
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
               ##temporary
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
             $classArray=$this->input->post('classes');
             foreach ($classArray as $row) {
                 # code...
             
             $studentClassMapping=array(
                'student_id'=>$studentId,
                'class_id' =>$row
             );
             ##temporary purpose
             $mapStuClass  = $this->Student_model->add_mappingtoClass($studentClassMapping);
         }
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

                    $schoolId=$this->session->SchoolId;
        // check if the student exists before trying to delete it
        if(isset($student['id']))
        {
            $this->Student_model->delete_student($id);

            $this->Subject_model->delete_studentSchoolMap($id,$schoolId);

            
            redirect('student/student_list');
        }
        else
            show_error('The student you are trying to delete does not exist.');
    }
    
}
