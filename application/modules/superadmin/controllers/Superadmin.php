<?php


class Superadmin extends Super_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Super_model');
	} 

	function index()
	{ 
      // $data['title']="School List";
        // $data['school'] = $this->Super_model->get_all_school();

        // $data['_view'] = 'login';
    if(isset($this->session->superuser))
    {
      $data['_view'] = 'dashbord';
    $this->load->view('index', $data);
    }
    else
    {
		$this->load->view('login');
  }
	}

	function admin_index()
	{
		$data['_view'] = 'dashbord';
		$this->load->view('index', $data);
	}

	function loginProcess()
	{


		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
        // var_dump($username);die;

		$authenticationData = $this->Super_model->getResult($username,$password);
		if (is_null($authenticationData)) {
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('login', $data);
		}else{
            // $autorizationData = $this->Login_model->getAutorization($authenticationData['autorization_id']);
			$this->session->superusername = $authenticationData['username'];
			$this->output->enable_profiler(TRUE);
			redirect('superadmin/admin_index');

		}
	}
	function school_list()
	{   
    $data['title']="School List";
    $data['school'] = $this->Super_model->get_all_school();

    $data['_view'] = 'schoollist';
    $this->load->view('index', $data);
  }

  function add_school()
  {
   $data['_view'] = 'schooladd';
   $data['country'] = $this->Super_model->fetch_country();

   $this->load->view('index', $data);
        // echo "Dsd";
 }
 function countSchool()
 {
   $data['school']=$this->Super_model->get_all_schools_count();
   $data['sales']=$this->Super_model->get_sales();
   $data['order']=$this->Super_model->get_order();
   echo json_encode($data);
 }
    /*
     * Adding a new school
     */
    function add()
    {   $data['country'] = $this->Super_model->fetch_country();
    $this->load->library('form_validation');
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $this->load->library('upload', $config);

    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('state', 'State', 'required');
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required|max_length[300]');
    $this->form_validation->set_rules('contact_pri', 'Primary Number', 'required|max_length[13]','min_length[10]');
    $this->form_validation->set_rules('contact_sec', 'Secondry Number', 'max_length[13]|min_length[10]');
    $this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email|is_unique[school.email]');
        // $this->form_validation->set_rules('logo', 'Logo', 'required');
        // $this->form_validation->set_rules('banner', 'Banner', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('latlong', 'Location', 'required');

    if ($this->form_validation->run()) {
    	$params = array(
    		'city_id' => $this->input->post('city'),
    		'state_id' => $this->input->post('state'),
    		'country_id' => $this->input->post('country'),
    		'organization_name' => $this->input->post('name'),
    		'latlong' => $this->input->post('latlong'),
    		'contact_pri' => $this->input->post('contact_pri'),
    		'contact_sec' => $this->input->post('contact_sec'),
    		'email' => $this->input->post('email'),
                // 'logo' => $this->input->post('logo'),
                // 'banner' => $this->input->post('banner'),
    		'address' => $this->input->post('address'),
    		'created_at'=>date('Y-m-d h:i:s'),
    		'modified_at'=>date('Y-m-d h:i:s')

    	);
      if($this->upload->do_upload('logo'))
      {
      $data['image'] =  $this->upload->data();
      $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
      $params['logo']=$image_path;
    }
    if($this->upload->do_upload('banner'))
      {
      $data['images'] =  $this->upload->data();
      $image_path=$data['images']['raw_name'].$data['images']['file_ext'];
      $params['banner']=$image_path;
    }
            // var_dump($params);die;
    	$school_id = $this->Super_model->add_school($params);
    	$data=$this->session->set_flashdata('status','Successfully added');
    	$this->session->alerts = array(
    		'severity'=> 'success',
    		'title'=> 'successfully added',
    		'description'=> ''
    	);
    	redirect('superadmin/school_list');
             // header('location:successmodal.php');
    } else {
             // $this->session->set_flashdata('status','Failed to added');
    	$data['_view'] = 'add';
    	$this->load->view('index', $data);
    	
    }
  }

    /*
     * Editing a school
     */
    function edit($id)
    {
        // check if the school exists before trying to edit it
        $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $this->load->library('upload', $config);
    	$data['school'] = $this->Super_model->get_school($id);
    	
    	$data['country'] = $this->Super_model->fetch_country();
    	
    	$data['state'] = $this->Super_model->fetchState($data['school']['country_id']);
        // var_dump($data['state']);

    	$data['city'] = $this->Super_model->fetchCity($data['school']['state_id']);
    	
    	if (isset($data['school']['id'])) {
    		$this->load->library('form_validation');

    		$this->form_validation->set_rules('city', 'City Name', 'required');
    		$this->form_validation->set_rules('state', 'State Name', 'required');
    		$this->form_validation->set_rules('country', 'Country Name', 'required');
    		$this->form_validation->set_rules('name', 'Name', 'required|max_length[300]');
    		$this->form_validation->set_rules('contact_pri', 'Primary Number', 'max_length[13]','min_length[10]');
    		$this->form_validation->set_rules('contact_sec', 'Secondry Number', 'max_length[13]','min_length[10]');
    		$this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email');
    		$this->form_validation->set_rules('address', 'Address', 'required');
    		$this->form_validation->set_rules('latlong', 'Location', 'required');

    		if ($this->form_validation->run()) {
    			$params = array(
                    // 'school_id' => $this->Super_model->get_school($id),
    				'city_id' => $this->input->post('city'),
    				'state_id' => $this->input->post('state'),
    				'country_id' => $this->input->post('country'),
    				'organization_name' => $this->input->post('name'),
    				'latlong' => $this->input->post('latlong'),
    				'contact_pri' => $this->input->post('contact_pri'),
    				'contact_sec' => $this->input->post('contact_sec'),
    				'email' => $this->input->post('email'),
    				
    				'address' => $this->input->post('address')
                    // 'modified_at'=>date('Y-m-d h:i:s')
    			);
             if($this->upload->do_upload('logo'))
      {
      $data['image'] =  $this->upload->data();
      $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
      $params['logo']=$image_path;
    }
    if($this->upload->do_upload('banner'))
      {
      $data['images'] =  $this->upload->data();
      $image_path=$data['images']['raw_name'].$data['images']['file_ext'];
      $params['banner']=$image_path;
    }
    var_dump($params);
    			$this->Super_model->update_school($id, $params);
    			redirect('superadmin/');
    		} else {
    			$data['_view'] = 'schooledit';
                //var_dump($data);
    			$this->load->view('index', $data);
    		}
    	} else
    	show_error('The school you are trying to edit does not exist.');
    }

    /*
     * Deleting school
     */
    function remove($id)
    {
    	$school = $this->Super_model->get_school($id);

        // check if the school exists before trying to delete it
    	if (isset($school['id'])) {
    		$this->Super_model->delete_school($id);
    		redirect('school/school_list');
    	} else
    	show_error('The school you are trying to delete does not exist.');
    }
    function createAdmin()
    {
    	$data['school']=$this->Super_model->get_all_school_name();
    	$data['_view'] = 'addAdmin';
    	
    	$this->load->view('index', $data);
    }
    function adminAdd()
    {
    	$this->load->library('form_validation');
    	$this->load->model('employee/Employee_model');
    	$config['upload_path']          = './uploads/';
    	$config['allowed_types']        = 'gif|jpg|png';
    	$this->load->library('upload', $config);
    	$this->form_validation->set_rules('name','Admin Name','required|max_length[100]');
    // $this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
    	$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
    	$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
    	$this->form_validation->set_rules('paddress','Address','required');
    	$this->form_validation->set_rules('taddress','Address','required');

    	if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
    	{   
      #admin information
    		$params = array(
    			'name' => $this->input->post('name'),
    			
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
      $username = 'adm'.$this->input->post('school_id').'_'.$employeeId; #emp+schoolid_employid
      $password = rand(1,10000);
      $email = $params['email'];
      $autorizationId = 1;
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
      $this->load->model('student/Student_model');
      $userdata=$this->Student_model->select_uname_password($insertAuthentication);
      
      //     $msg='Your Username='.$userdata->username.' and Password='.$userdata->clear_text.'';
      $smsinfo= array(
       'mobile'=>$this->input->post('mobile'),
       'school_id'=>$this->input->post('school_id'),
       'module'=>'admin add',




       'user_name'=>$userdata->username,
       'password'=>$userdata->clear_text,
       'student_name'=>$this->input->post('employee_Name'),
       'student_id'=>$employeeId

     );
          ##map school admin
      $adminSchoolMap=array('school_id'=>$this->input->post('school_id'),
      	'employee_id'=>$employeeId  );
      $mapping = $this->Super_model->map_school_admin($adminSchoolMap);
      $mapping2 = $this->Super_model->map_school_employee($adminSchoolMap);

          // var_dump($smsinfo);die;

          // modules::run('sms/sms/send_sms',$smsinfo);


          ## for email info
      $emailinfo=array('subject'=>'credential of admin','module'=>'admin add','school_id'=>$this->input->post('school_id'),'email'=>$userdata->email,'student_id'=>$employeeId,'user_name'=>$userdata->username,
        'password'=>$userdata->clear_text,'student_name'=>$this->input->post('name'));
         // var_dump($emailinfo);
          // $insertInfoEmail=$this->Student_model->insert_info_email($emailinfo);
          // modules::run('email/email/send_email',$emailinfo);


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
      redirect('superadmin/school_list');


    }
    else
    {            
      $data['_view'] = 'addAdmin';
      $this->load->view('index',$data);
    }
  }
  function fetch_state()
  {
    if ($this->input->post('country_id')) {
      echo json_encode($this->Super_model->fetch_state($this->input->post('country_id')));

            // $this->load->view('index',$data);

    }
  }

  function fetch_city()
  {
    if ($this->input->post('state_id')) {
      echo json_encode($this->Super_model->fetch_city($this->input->post('state_id')));
    }
  }

  function fetchschoolView()
  {
   echo json_encode($this->Super_model->get_school($this->input->post("id"))) ;
  // echo "dsas";
 }

 function logout(){
  $this->session->unset_userdata('superusername');
  $this->session->sess_destroy();
  redirect('superadmin');
}    



function getCredentialAdmin($id)
{
  $adminId=$this->Super_model->getAdminId($id);
 // var_dump($adminId);
  $adminid=$adminId->employee_id;
  $credential=$this->Super_model->getCredential($adminid);
  // var_dump($credential);
  $username=$credential[0]['username'];
  $password=$credential[0]['password'];
  ##function for ip address
  $ipaddress = '';

  if(isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';

    // echo $ipaddress;
        ##generating logs

        // $logsData=array(
        //     'username'=>($username)?$authenticationData['username']:$username,
        //     'ip_address'=>$ipaddress,
        //     'status'=>($authenticationData)?1:0
        //  );
  // $this->load->model('login/Login_model');
        // $log=$this->Login_model->insertLogs($logsData);
  $userData = $this->Super_model->getEmployDetails($adminid);
         // var_dump($userData );
     $school_id=$this->session->SchoolId = $userData['school_id'];
                    // $this->session->organizationName = $userData['organization_name'];
   $school_name= $this->Super_model->get_school_name($school_id);
   echo $this->session->SchoolName =$school_name->organization_name;

  echo  $this->session->name = $userData['name'];
  echo $this->session->username =$username;
  echo   $this->session->profileImage = $userData['profile_image'];
  $this->output->enable_profiler(TRUE);

                    redirect ('admin');


}


function fetchInstituteByDate()
{

  echo json_encode($this->Super_model->fetch_institute_by_date());
}
function fetchInstituteByMonth()
{

  echo json_encode($this->Super_model->fetch_institute_by_month());
}
function invoice()
{
  $data['school']=$this->Super_model->get_all_school_name();
  $data['_view'] = 'addInvoice';
  $this->load->view('index',$data);
}

function invoiceAdd()
{
  $school_id=$this->input->post('school_id');
  $amount=$this->input->post('amount');
  $invoiceId=$this->Super_model->get_invoice_id();
  $invoiceInfo=array(

    'school_id'=>$school_id,
    'amount'=>$amount,
    'invoice_id'=>$invoiceId


  );
 ## 
  $insertInvoice=$this->Super_model->insert_invoice_info($invoiceInfo);
  $accountInfo=array(

    'school_id'=>$school_id,
    'debit'=>$amount,
    'refrence_type'=>1


  );

  $inserAccountInfo=$this->Super_model->insert_account_info($accountInfo);

}
function reciept()
{
  $data['school']=$this->Super_model->get_all_school_name();
  $data['_view'] = 'addReciept';
  $this->load->view('index',$data);
}

function recieptAdd()
{
  $school_id=$this->input->post('school_id');
  $amount=$this->input->post('amount');
  $payer_name=$this->input->post('payer_name');
  $payer_mobile=$this->input->post('payer_mobile');
  $method=$this->input->post('method');

  $recieptId=$this->Super_model->get_reciept_id();
  $recieptInfo=array(

    'school_id'=>$school_id,
    'amount'=>$amount,
    'reciept_id'=>$recieptId,
    'payer_name'=>$payer_name,
    'payer_mobile'=>$payer_mobile,
    'method'=>''



  );
 ## 
  $insertReciept=$this->Super_model->insert_reciept_info($recieptInfo);
  $accountInfo=array(

    'school_id'=>$school_id,
    'credit'=>$amount,
    'refrence_type'=>2


  );

  $inserAccountInfo=$this->Super_model->insert_account_info($accountInfo);

}
##for graph 
function salesChart()
{


  $data=$this->Super_model->get_sales_details_date();
  echo json_encode($data);
}

function balanceSchool()
{
 $debit_info=$this->Super_model->searchBalInformatiion(1);
 $credit_info=$this->Super_model->gettingTransactionInfo(1);
 $total_debit=$debit_info->debit;
 $total_credit=$credit_info->credit;
 $balance=$total_debit-$total_credit;
 echo $balance;
}  
function getLedgerSchool()
{
$ledgerData=$this->Super_model->get_ledger_details($this->input->post('school_id'));
  echo json_encode($ledgerData);
}


}
?>