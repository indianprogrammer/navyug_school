<?php

 
class Enquiry extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Enquiry_model');
        // if (!isset($_SESSION['username'])) {
        //      redirect('login');
        // }
    } 

    /*
     * Listing of enquirys
     */
    function index()
    {   
            $schoolId=$this->session->SchoolId;
        $data['enquiry'] = $this->Enquiry_model->get_all_enquirys($schoolId);
        
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
                'purpose'=>$this->input->post('purpose'),
				
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				 'location' => $this->input->post('latlong'),
                'address' => $this->input->post('address'),
				'remarks' => $this->input->post('remarks'),
                'school_id'=>$this->session->SchoolId
                // 'created_at'=>date('d-m-y/h-m')
               
            );
            
            $enquiry_id = $this->Enquiry_model->add_enquiry($params);
            $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added',
         'description'=> ''
        );
            redirect('enquiry');
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
                'remarks' => $this->input->post('remarks')
                
            );
                
                $this->eEquiry_model->update_enquiry($id,$params);            
                redirect('enquiry');
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
            redirect('enquiry');
        }
        else
            show_error('The enquiry you are trying to delete does not exist.');
    }
    
}
