 <?php


 class Employee extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Employee_model');
    $this->load->model('student/Student_model');
  } 
  // public 
    /*
     * Listing of employees
     */
// public $staff_menu_name=strtoupper($this->session->menu_staff ? $this->session->menu_staff:'STAFF');
    function index()
    {  

      $staff_menu_name=strtoupper($this->session->menu_staff ? $this->session->menu_staff: 'STAFF' );
      $data['title']=  $staff_menu_name." LIST";
      $schoolId=$this->session->SchoolId;
      
      $data['employees'] = $this->Employee_model->get_all_employees($schoolId);

      $data['_view'] = 'employeeList';
      $this->load->view('../index',$data);
    }

    /*
     * Adding a new employee
     */
    function add_employee()
    {   
      $staff_menu_name=strtoupper($this->session->menu_staff ? $this->session->menu_staff:'STAFF');
      $data['title']="Add ".$staff_menu_name;
      $data['emptype'] = $this->Employee_model->get_map_employee();

      $data['_view'] = 'add';
      $this->load->view('../index',$data);
    }

    function add()
    {   
    #validation part
      $staff_menu_name=strtoupper($this->session->menu_staff ? $this->session->menu_staff:'STAFF');
      $data['title']="Add ".$staff_menu_name;
      $this->load->library('form_validation');
      $data['emptype'] = $this->Employee_model->get_map_employee();
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $this->load->library('upload', $config);
      $this->form_validation->set_rules('employee_Name','employee Name','required|max_length[100]');
    // $this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
      $this->form_validation->set_rules('email','Email','max_length[40]|valid_email');
      $this->form_validation->set_rules('mobile','Mobile','max_length[13]');
      $this->form_validation->set_rules('paddress','Address','required');
      $this->form_validation->set_rules('taddress','Address','required');
      $school_id=$this->session->SchoolId;
      if($this->form_validation->run() )     
      {   
      #employ information
        $params = array(
         'name' => $this->input->post('employee_Name'),
         'qualification' => $this->input->post('qualification'),
         'email' => $this->input->post('email'),
         'mobile' => $this->input->post('mobile'),
         
         'aadhar' => strip_tags($this->input->post('aadhar',1)),

         'permanent_address' => strip_tags($this->input->post('paddress',1)),
         'temporary_address' => strip_tags($this->input->post('taddress',1)),
         'p_city' =>strip_tags($this->input->post('p_city',1)),
         't_city' =>strip_tags($this->input->post('t_city',1)),
         't_pincode' =>strip_tags($this->input->post('t_pincode',1)),
         'p_pincode' =>strip_tags($this->input->post('p_pincode',1)),
         'designation' =>strip_tags($this->input->post('designation',1)),
         'dob' =>strip_tags($this->input->post('dob',1)),
         'gender' =>strip_tags($this->input->post('gender',1)),
         'blood_group' =>strip_tags($this->input->post('blood_group',1))
         
       );
        if($this->upload->do_upload('profile_image'))
        {
          $data['image'] =  $this->upload->data();
          $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
          $params['profile_image']=$image_path;
        }


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
       'user_id'=> $userId,
       'school_id'=>$school_id
     );
      #authentication table insert (username,password,email,autorizationid,userid)
      //insertion code

      $insertAuthentication = $this->Employee_model->add_user($authenticationData);

      $userdata=$this->Student_model->select_uname_password($insertAuthentication);
      
      $this->load->model('admin/Admin_model');
      $organization_name=$this->Admin_model->get_school_name($school_id);


      $sendDetails= array(
       'mobile'=>$this->input->post('mobile'),
       'school_id'=>$school_id,
       'module'=>'employee add',
       'id'=>$employeeId,
       'user_name'=>$userdata['username'],
       'password'=>$userdata['clear_text'],
       'name'=>$this->input->post('employee_Name'),
       'email'=>$userdata['email'],
       'organization_name'=>$organization_name['organization_name']



     );


      if($sendDetails['mobile'])
      {
      // modules::run('employee/employee/addSms',$sendDetails);
        $this->addSms($sendDetails);
      }
      if($sendDetails['mail'])  
       { ##for mail
      // modules::run('employee/employee/addMail',$sendDetails);
        $this->addMail($sendDetails);
      }



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
           'permanent_address' => $this->input->post('paddress'),
           'temporary_address' => $this->input->post('taddress')
                    // 'modified_at'=>date('d-m-y/h-m'),
         );
          if($this->upload->do_upload('profile_image'))
          {
            $data['image'] =  $this->upload->data();
            $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
            $params['profile_image']=$image_path;
          }
          else
          {
            $data['error'] = $this->upload->display_errors();
            $data['_view'] = 'edit';
            $this->load->view('../index',$data);

          }

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



    function fetchEmployeeView()
    {
      $id=$this->input->post('id');
      echo json_encode($employee_view= $this->Employee_model->get_employee($id));
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
     $school_name=$detailsMail['organization_name'];
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
     $school_name=$detailsSms['organization_name'];
     $this->load->model('sms/Sms_model');
     $fetchTemplateData=$this->Sms_model->fetch_template_sms($school_id,$module);

     $context=$fetchTemplateData['context'];
     $contextString=array('{school_name','{username','{password','{name','}');

     $ReplaceString=array($school_name,$username,$password,$name,'');
     $message=str_replace($contextString,$ReplaceString,$context);
      #send sms
     modules::run('sms/sms/sendSms',$mobile,$message);



   }

##used to search student
   function search_employee()
   {
     $search=$this->input->post("search_employee",1);
     $condition=array('school_id'=>$this->session->SchoolId);
     echo json_encode($this->Employee_model->employeeSearch('table_map_school_employee',$condition,array('*'),$search));

   }




 }
 ?>