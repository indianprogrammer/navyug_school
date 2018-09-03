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
    function index()
    {   
        // $data['claasesName']=$this->Student_model->get_class_name();
        $schoolId=$this->session->SchoolId;
        $data['student'] = $this->Student_model->get_all_student($schoolId);
        $data['classes'] = $this->Student_model->getAllClasses($schoolId);
      // var_dump($data['student']);
        // var_dump($data['classes']);
        // die();


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
        $this->form_validation->set_rules('email','Email','max_length[50]|valid_email');

        // $this->form_validation->set_rules('mobile','Mobile','required');
    // $this->form_validation->set_rules('classes','class','required');

        $this->form_validation->set_rules('paddress','Permanent Address','required');
        $this->form_validation->set_rules('taddress','Temporary Address','required');

        if($this->form_validation->run() )     
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
          
           if($this->upload->do_upload('profile_image'))
      {
      $data['image'] =  $this->upload->data();
      $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
      $params['profile_image']=$image_path;
    }
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

             ##for sms info 
         $userdata=$this->Student_model->select_uname_password($insertStudentAuthentication);
         // var_dump($userdata);
         // $msg='Your Username='.$userdata->username.' and Password='.$userdata->clear_text.'';
         $smsinfo= array(
           'mobile'=>$this->input->post('mobile'),
           'school_id'=>$this->session->SchoolId,
           'module'=>'student add',
           'student_id'=>$studentId,
           'user_name'=>$userdata->username,
           'password'=>$userdata->clear_text,
           'student_name'=>$this->input->post('student_name')
          
          

       );
         
         modules::run('sms/sms/send_sms',$smsinfo);


          ## for email info
         $emailinfo=array('email'=>$userdata->email,'subject'=>"admission credential",'student_id'=>$studentId,'module'=>'student add','school_id'=>$this->session->SchoolId, 'user_name'=>$userdata->username,
           'password'=>$userdata->clear_text,'student_name'=>$this->input->post('student_name'));
         // var_dump($emailinfo);
          // $insertInfoEmail=$this->Student_model->insert_info_email($emailinfo);
         modules::run('email/email/send_email',$emailinfo);




           // $this->session->set_userdata($smsinfo);



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

       redirect('student');
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
         $school_id=$this->session->SchoolId;
        $this->load->library('upload', $config);

        
        if(isset($data['student']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
            // $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            
            // $this->form_validation->set_rules('mobile','Mobile','required');

            $this->form_validation->set_rules('paddress','Permanent Address','required');
            $this->form_validation->set_rules('taddress','Temporary Address','required');

            if($this->form_validation->run() )     
            {   
                $params = array(

                    'student_name' => $this->input->post('student_name'),
                    'email' => $this->input->post('email'),

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
                $smsdata=$this->Student_model->update_sms_info($id,$school_id);      
              // var_dump($smsdata);die;
                $smsinfo= array('msg'=> $smsdata->msg,
                   'mobile'=>$this->input->post('mobile'),
                   'school_id'=>$school_id,
                   'module'=>'student edit',
                   'student_id'=>$id
               );
                modules::run('sms/sms/send_sms',$smsinfo);


          ## for email info
                $emailinfo=array('msg'=>$smsdata->msg,'email'=>$this->input->post('email'),'subject'=>"admission credential detail",'student_id'=>$id,'module'=>'student edit','school_id'=>$this->session->SchoolId);
     
                modules::run('email/email/send_email',$emailinfo);

               
                $this->session->alerts = array(
                    'severity'=> 'success',
                    'title'=> 'successfully edited',
                    'description'=> ''      );
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
    function fetchStudentView()
    {
       echo json_encode($student_view= $this->Student_model->get_student($this->input->post('id')));
   }
   function filterStudent()
   {
       echo json_encode($student_view= $this->Student_model->filter_student($this->input->post('id')));
   }
   function studentCompleteInformationInvoice()
   {

    $stuInfo=$this->Student_model->student_complete_info_invoice($this->input->post('id'));
    echo json_encode($stuInfo);



}
function studentCompleteInformationReciept()
{

    $stuInfo=$this->Student_model->student_complete_info_reciepts($this->input->post('id'));
    echo json_encode($stuInfo);



}

function crossmoduleadd($param1 =5 ,$param2 = 10){
    return $param1+$param2;
}
}
?>