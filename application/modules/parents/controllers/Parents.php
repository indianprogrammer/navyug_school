<?php

 
class Parents extends MY_Controller{
    function __construct()
    {
        parent::__construct();
         $this->load->model('Parents_model');
    } 

    /*
     * Listing of parents
     */
    function parent_list_bkp()
    {   $this->load->library('pagination');
         $params['limit'] = 100; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('parent/index?');
        $config['total_rows'] = $this->Parents_model->get_all_parents_count();
        $this->pagination->initialize($config);

        $data['parents'] = $this->Parents_model->get_all_parents($params);
        
        $data['_view'] = 'parentList';
        $this->load->view('../index',$data);
    }

    function parent_list(){
        $data['parents'] = $this->Parents_model->get_all_parents();
        $data['_view'] = 'parentList';
        $this->load->view('../index',$data);
    }

    /*
     * Adding a new parent
     */
    function add_parent()
    {   $data['ptype'] = $this->Parents_model->fetch_type();
        // var_dump( $data['ptype']);die;
        $data['_view'] = 'add';
        $this->load->view('../index',$data);
    }
    function add()
    {   
     $data['ptype'] = $this->Parents_model->fetch_type();
        $this->load->library('form_validation');
        // $config['upload_path']          = './uploads/';
       // $config['allowed_types']        = 'gif|jpg|png';
       // $this->load->library('upload', $config);
		// $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('parent_Name','parent Name','required|max_length[100]');
        $this->form_validation->set_rules('ptype','parent type','required');
		$this->form_validation->set_rules('username','username','required|max_length[100]');
		// $this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
		$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
		// $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
		// $this->form_validation->set_rules('address','Address','required');
		
		if($this->form_validation->run() )     
        {   
            $params = array(
				// 'password' => $this->input->post('password'),
                'name' => $this->input->post('parent_Name'),
				'type' => $this->input->post('ptype'),
                // 'qualification' => $this->input->post('qualification'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				 // 'profile_image' => $this->input->post('profile_image'),
                 'permanent_address' => $this->input->post('paddress'),
				 'temporary_address' => $this->input->post('taddress'),
                 // 'created_at'=>date('Y-m-d h:i:s'),
                 // 'modified_at'=>date('Y-m-d h:i:s')
            );
             // var_dump($params);die;
             // $data['image'] =  $this->upload->data();
              // var_dump($data);
        // $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
        // $params['profile_image']=$image_path;

            $parent_id = $this->Parents_model->add_parent($params);
             $ids=array(
            
                'parent_id'=>$parent_id,
                'school_id'=>$this->session->SchoolId

          );  
            // $map = $this->Parents_model->add_mapping($ids);
            var_dump($params);
             $pPass=rand(1,100000);

            $authentication=array(
               'username'=> $params['username'],
               'email'=> $params['email'],
                'autorization_id'=>3,
                'password'=>md5($pPass),
                'clear_text'=>$pPass

            );
            var_dump($authentication);
               $map = $this->Parents_model->add_user($authentication);
            redirect('Parents/parent_list');
        }
        else
        {            
            $data['_view'] = 'add';
            $this->load->view('../index',$data);
        }
    }  

    /*
     * Editing a parent
     */
    function edit($id)
    {   
        // check if the parent exists before trying to edit it
        $data['parent'] = $this->Parents_model->get_parent($id);
        
        if(isset($data['parent']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('parent_Name','parent Name','required|max_length[100]');
        // $this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
        $this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
        $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
        // $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
        $this->form_validation->set_rules('address','Address','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					// 'password' => $this->input->post('password'),
					 'name' => $this->input->post('parent_Name'),
                // 'type' => $this->input->post('ptype'),
                // 'qualification' => $this->input->post('qualification'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                 // 'profile_image' => $this->input->post('profile_image'),
                 'permanent_address' => $this->input->post('paddress'),
                 'temporary_address' => $this->input->post('taddress')
                  // 'modified_at'=>date('Y-m-d h:i:s')
                     // 'modified_at'=>date('Y-m-d h:i:s')
                );


                $this->Parents_model->update_parent($id,$params);            
                redirect('parents/parent_list');
            }   
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('../index',$data);
            }
        }
        else
            show_error('The parent you are trying to edit does not exist.');
    } 

    /*
     * Deleting parent
     */
    function remove($id)
    {
        $parent = $this->Parents_model->get_parent($id);

        // check if the parent exists before trying to delete it
        if(isset($parent['id']))
        {
            $this->Parents_model->delete_parent($id);
            redirect('parents/parent_list');
        }
        else
            show_error('The parent you are trying to delete does not exist.');
    }
    
}
?>