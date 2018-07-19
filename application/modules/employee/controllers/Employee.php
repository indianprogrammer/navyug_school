<?php

 
class Employee extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
    } 

    /*
     * Listing of employees
     */
    function employee_list()
    {  
     $this->load->library('pagination');
         $params['limit'] = 100; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('employee/index?');
        $config['total_rows'] = $this->Employee_model->get_all_employees_count();
        $this->pagination->initialize($config);

        $data['employees'] = $this->Employee_model->get_all_employees($params);
        
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
        $this->load->library('form_validation');
         $data['emptype'] = $this->Employee_model->get_map_employee();
        $config['upload_path']          = './uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $this->load->library('upload', $config);
		// $this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('employee_Name','employee Name','required|max_length[100]');
		$this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
		$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
		// $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
        $this->form_validation->set_rules('paddress','Address','required');
		$this->form_validation->set_rules('taddress','Address','required');
		
		if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
        {   
            $params = array(
				// 'password' => $this->input->post('password'),
                'name' => $this->input->post('employee_Name'),
				'authentication_id' => $this->input->post('type'),
                'qualification' => $this->input->post('qualification'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				// 'profile_image' => $this->input->post('profile_image'),
                'Permanent_address' => $this->input->post('paddress'),
				'temporary_address' => $this->input->post('taddress'),
                'created_at'=>date('d-m-y/h-m'),
                'modified_at'=>date('d-m-y/h-m')
            );
            // var_dump($params);
             $data['image'] =  $this->upload->data();
              // var_dump($data);
        $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
        $params['profile_image']=$image_path;
            $employee_id = $this->Employee_model->add_employee($params);
             $ids=array(
            
                'employee_id'=>$employee_id,
                'school_id'=>$this->session->SchoolId

          );  
            $map = $this->Employee_model->add_mapping($ids);
            var_dump($params);
            $authentication=array(
               'username'=> $params['username'],
               'email'=> $params['email'],
                'autorization_id'=>$params['authentication_id'],
                'password'=>rand(1,1000)

            );
            var_dump($authentication);
               $map = $this->Employee_model->add_user($authentication);
            // redirect('subject/subject_list');
            redirect('employee/employee_list');
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
        $data['subject'] = $this->Subject_model->get_all_subject();
        $data['employee'] = $this->Employee_model->get_employee($id);
         $config['upload_path']          = './uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $this->load->library('upload', $config);
        
        if(isset($data['employee']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('employee_Name','employee Name','required|max_length[100]');
			$this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
			$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
			$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
			$this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
			$this->form_validation->set_rules('address','Address','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'password' => $this->input->post('password'),
					'employee_Name' => $this->input->post('employee_Name'),
                    'username' => $this->input->post('username'),
					'qualification' => $this->input->post('qualification'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'profile_image' => $this->input->post('profile_image'),
					'address' => $this->input->post('address'),
                    'modified_at'=>date('d-m-y/h-m'),
                );
                 $data['image'] =  $this->upload->data();
              // var_dump($data);
        $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
        $params['profile_image']=$image_path;
                $this->Employee_model->update_employee($id,$params);            
                redirect('employee/employee_list');
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

        // check if the employee exists before trying to delete it
        if(isset($employee['id']))
        {
            $this->Employee_model->delete_employee($id);
            redirect('employee/employeelist');
        }
        else
            show_error('The employee you are trying to delete does not exist.');
    }
    
}
