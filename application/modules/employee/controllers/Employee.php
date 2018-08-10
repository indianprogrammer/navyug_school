<?php


class Employee extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Employee_model');
    $this->load->model('student/Student_model');
  } 

    /*
     * Listing of employees
     */
    function index()
    {  
     

    
     $schoolId=$this->session->SchoolId;
     $config['total_rows'] = $this->Employee_model->get_all_employees_count($schoolId);
   

     $data['employees'] = $this->Employee_model->get_all_employees($schoolId);

     $data['_view'] = 'employeeList';
     $this->load->view('../index',$data);
   }

    /*
     * Adding a new employee
     */
    function add_employee()
    {    $data['emptype'] = $this->Employee_model->get_map_employee();
    // var_dump($data['emptype']);die;
    $data['_view'] = 'add';
    $this->load->view('../index',$data);
  }
  function add()
  {   
    #validation part
    $this->load->library('form_validation');
    $data['emptype'] = $this->Employee_model->get_map_employee();
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $this->load->library('upload', $config);
    $this->form_validation->set_rules('employee_Name','employee Name','required|max_length[100]');
    // $this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
    $this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
    $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
    $this->form_validation->set_rules('paddress','Address','required');
    $this->form_validation->set_rules('taddress','Address','required');

    if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
    {   
      #employ information
      $params = array(
			  'name' => $this->input->post('employee_Name'),
        'qualification' => $this->input->post('qualification'),
        'email' => $this->input->post('email'),
        'mobile' => $this->input->post('mobile'),
			  'Permanent_address' => $this->input->post('paddress'),
        'temporary_address' => $this->input->post('taddress')
       
      );
      $data['image'] =  $this->upload->data();
      $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
      $params['profile_image']=$image_path;

      #insert personal information (employees)
      #get employ id from last insert
      $employeeId = $this->Employee_model->add_employee($params);


      #authentication data
      $username = 'emp'.$this->session->SchoolId.'_'.$employeeId; #emp+schoolid_employid
      $password = rand(1,10000);
      $email = $params['email'];
      $autorizationId = $this->input->post('type');
      $userId = $employeeId;

      $authenticationData=array(
       'username'=> $username,
       'password'=> md5($password),
       'email'=> $email,
       'autorization_id'=> $autorizationId,
       'clear_text'=> $password,
       'user_id'=> $userId
     );
      #authentication table insert (username,password,email,autorizationid,userid)
      //insertion code

      $insertAuthentication = $this->Employee_model->add_user($authenticationData);
      // var_dump($insertAuthentication);
      $userdata=$this->Student_model->select_uname_password($insertAuthentication);
         // var_dump($userdata);
          $msg='Your Username='.$userdata->username.' and Password='.$userdata->clear_text.'';
          $smsinfo= array('msg'=>$msg,
             'mobile'=>$this->input->post('mobile'),
             'school_id'=>$this->session->SchoolId,
             'module'=>'employee add'
        );
          // var_dump($smsinfo);die;
          // $insertInfo=$this->Student_model->insert_info($smsinfo);
         modules::run('sms/sms/send_sms',$smsinfo);


          ## for email info
         $emailinfo=array('msg'=>$msg,'email'=>$userdata->email,'subject'=>"credential of user",'student_id'=>$employeeId,'module'=>'employee add','school_id'=>$this->session->SchoolId);
         // var_dump($emailinfo);
          // $insertInfoEmail=$this->Student_model->insert_info_email($emailinfo);
          modules::run('email/email/send_email',$emailinfo);


      #create relation map (school->employ)
      $schoolEmployMap = array(
        'school_id' => $this->session->SchoolId,
        'employee_id' => $employeeId,
      );
      //insertion code here
      $map = $this->Employee_model->add_mapping($schoolEmployMap);
       $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added',
         'description'=> ''
       );
      redirect('employee');


    }
    else
    {            
      $data['_view'] = 'add';
      $this->load->view('../index',$data);
    }
  }  

    /*
     * Editing a employee
     */
    function edit($id)
    {   
        // check if the employee exists before trying to edit it
      // $data['subject'] = $this->Subject_model->get_all_subject();
    

    $data['emptype'] = $this->Employee_model->get_map_employee();

      $data['employee'] = $this->Employee_model->get_employee($id);
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $this->load->library('upload', $config);

      if(isset($data['employee']['id']))
      {
        $this->load->library('form_validation');

         $this->form_validation->set_rules('employee_Name','employee Name','required|max_length[100]');
    // $this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
    $this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
    $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
    // $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
    $this->form_validation->set_rules('paddress','Permanent Address','required');
    $this->form_validation->set_rules('taddress','Corresponding Address','required');

        if($this->form_validation->run())     
        {   
          $params = array(

         'name' => $this->input->post('employee_Name'),
        'qualification' => $this->input->post('qualification'),
        'email' => $this->input->post('email'),
        'mobile' => $this->input->post('mobile'),
        'Permanent_address' => $this->input->post('paddress'),
        'temporary_address' => $this->input->post('taddress')
                    // 'modified_at'=>date('d-m-y/h-m'),
         );
          $data['image'] = $this->upload->data();
              // var_dump($data);
          $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
          $params['profile_image']=$image_path;
         $updated_data= $this->Employee_model->update_employee($id,$params);      
          ##

          // $this->Employee_model->update_employe


          redirect('employee');
        }   
        else
        {
          $data['_view'] = 'edit';
          $this->load->view('../index',$data);
        }
      }
      else
        show_error('The employee you are trying to edit does not exist.');
    } 

    /*
     * Deleting employee
     */
    function remove($id)
    {
      $employee = $this->Employee_model->get_employee($id);

         $schoolId=$this->session->SchoolId;
        // check if the employee exists before trying to delete it
      if(isset($employee['id']))
      {
        $this->Employee_model->delete_employee($id);
 $this->Employee_model->delete_EmployeeSchoolMap($id,$schoolId);
        redirect('employee');
      }
      else
        show_error('The employee you are trying to delete does not exist.');
    }
    
  }
