<?php

 
class Enquiry extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Enquiry_model');
    } 

    /*
     * Listing of enquirys
     */
    function enquiry_list()
    {   $this->load->library('pagination');
         $params['limit'] = 100; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('enquiry/index?');
        $config['total_rows'] = $this->Enquiry_model->get_all_enquirys_count();
        $this->pagination->initialize($config);

        $data['enquiry'] = $this->Enquiry_model->get_all_enquirys($params);
        
        $data['_view'] = 'enquiryList';
        $this->load->view('../index',$data);
    }

    /*
     * Adding a new enquiry
     */
    function add_enquiry()
    {
        $data['_view'] = 'add';
        $this->load->view('../index',$data);
    }
    function add()
    {   
        $this->load->library('form_validation');
      
		
		$this->form_validation->set_rules('name','enquiry Name','required|max_length[100]');
		$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
		// $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
		// $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
        $this->form_validation->set_rules('address','Address','required');
		// $this->form_validation->set_rules('latlong','latitude & longitude','required');
		
		if($this->form_validation->run() )     
        {   
            $params = array(
				
				'name' => $this->input->post('name'),
               
				
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				 'location' => $this->input->post('latlong'),
                'address' => $this->input->post('address'),
				'remarks' => $this->input->post('remarks'),
                'created_at'=>date('d-m-y/h-m'),
                'modified_at'=>date('d-m-y/h-m')
            );
            // var_dump($params);
            $data=$this->session->set_flashdata('status','Successfully added');
            $enquiry_id = $this->Enquiry_model->add_enquiry($params);
            redirect('enquiry/add_enquiry',$data);
        }
        else
        {            
            $data['_view'] = 'add';
            $this->load->view('../index',$data);
        }
    }  

    /*
     * Editing a enquiry
     */
    function edit($id)
    {   
        // check if the enquiry exists before trying to edit it
        $data['enquiry'] = $this->Enquiry_model->get_enquiry($id);
       
        
        if(isset($data['enquiry']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('enquiry_Name','enquiry Name','required|max_length[100]');
			$this->form_validation->set_rules('qualification','Qualification','required|max_length[50]');
			$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
			$this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
			$this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
			$this->form_validation->set_rules('address','Address','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                
                'name' => $this->input->post('enquiry_Name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                 'location' => $this->input->post('latlong'),
                'address' => $this->input->post('address'),
                'remarks' => $this->input->post('remarks'),
                'created_at'=>date('d-m-y/h-m'),
                'modified_at'=>date('d-m-y/h-m')
            );
                
                $this->eEquiry_model->update_enquiry($id,$params);            
                redirect('enquiry/enquiry_list');
            }   
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('../index',$data);
            }
        }
        else
            show_error('The enquiry you are trying to edit does not exist.');
    } 

    /*
     * Deleting enquiry
     */
    function remove($id)
    {
        $enquiry = $this->Enquiry_model->get_enquiry($id);

        // check if the enquiry exists before trying to delete it
        if(isset($enquiry['id']))
        {
            $this->Enquiry_model->delete_enquiry($id);
            redirect('enquiry/enquiry_list');
        }
        else
            show_error('The enquiry you are trying to delete does not exist.');
    }
    
}
