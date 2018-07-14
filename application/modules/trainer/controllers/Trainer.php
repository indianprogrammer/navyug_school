<?php

 
class Trainer extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Trainer_model');
    } 

    /*
     * Listing of trainers
     */
    function trainer_list()
    {   $this->load->library('pagination');
         $params['limit'] = 100; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('trainer/index?');
        $config['total_rows'] = $this->Trainer_model->get_all_trainers_count();
        $this->pagination->initialize($config);

        $data['trainers'] = $this->Trainer_model->get_all_trainers($params);
        
        $data['_view'] = 'trainerList';
        $this->load->view('../index',$data);
    }

    /*
     * Adding a new trainer
     */
    function add_trainer()
    {
        $data['_view'] = 'add';
        $this->load->view('../index',$data);
    }
    function add()
    {   
        $this->load->library('form_validation');
        $config['upload_path']          = './uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $this->load->library('upload', $config);
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('trainer_Name','Trainer Name','required|max_length[100]');
		$this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
		$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
		// $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
		$this->form_validation->set_rules('address','Address','required');
		
		if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
        {   
            $params = array(
				'password' => $this->input->post('password'),
				'trainer_Name' => $this->input->post('trainer_Name'),
                'qualification' => $this->input->post('qualification'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				// 'profile_image' => $this->input->post('profile_image'),
				'address' => $this->input->post('address'),
                'created_at'=>date('d-m-y/h-m'),
                'modified_at'=>date('d-m-y/h-m'),
            );
            // var_dump($params);
             $data['image'] =  $this->upload->data();
              // var_dump($data);
        $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
        $params['profile_image']=$image_path;
            $trainer_id = $this->Trainer_model->add_trainer($params);
            redirect('trainer/add/successmodal');
        }
        else
        {            
            $data['_view'] = 'add_trainer';
            $this->load->view('../index',$data);
        }
    }  

    /*
     * Editing a trainer
     */
    function edit($id)
    {   
        // check if the trainer exists before trying to edit it
        $data['trainer'] = $this->Trainer_model->get_trainer($id);
         $config['upload_path']          = './uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $this->load->library('upload', $config);
        
        if(isset($data['trainer']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('trainer_Name','Trainer Name','required|max_length[100]');
			$this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
			$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
			$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
			$this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
			$this->form_validation->set_rules('address','Address','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'password' => $this->input->post('password'),
					'trainer_Name' => $this->input->post('trainer_Name'),
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
                $this->Trainer_model->update_trainer($id,$params);            
                redirect('trainer/trainer_list');
            }   
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('../index',$data);
            }
        }
        else
            show_error('The trainer you are trying to edit does not exist.');
    } 

    /*
     * Deleting trainer
     */
    function remove($id)
    {
        $trainer = $this->Trainer_model->get_trainer($id);

        // check if the trainer exists before trying to delete it
        if(isset($trainer['id']))
        {
            $this->Trainer_model->delete_trainer($id);
            redirect('trainer/trainerlist');
        }
        else
            show_error('The trainer you are trying to delete does not exist.');
    }
    
}
