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
      $data['type']= $this->Enquiry_model->enquiry_type();
      $data['assign']= $this->Enquiry_model->assign_type();
      // var_dump($data);
        $data['_view'] = 'add';
        $this->load->view('../index',$data);
    }
    function assignIndivisual()
    {
        $params = array(
       'comment'=> $this->input->post('comment');
       'user_name'=> $this->input->post('user_name');
        $data['type']= $this->Enquiry_model->assign_indivisual($params);
    );
    }
    function statusUpdate()
    {       
    
         $data['type']= $this->Enquiry_model->update_status($this->input->get('id'));
    }
    function add()
    {   
        $this->load->library('form_validation');
       
		
		$this->form_validation->set_rules('name','enquiry Name','required|max_length[100]');
		$this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
		// $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');
		// $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
        // $this->form_validation->set_rules('address','Address','required');
		// $this->form_validation->set_rules('latlong','latitude & longitude','required');
		
		if($this->form_validation->run() )     
        {   
            $params = array(
				
				'name' => $this->input->post('name'),
                'type'=>$this->input->post('type'),
				'username'=>$this->input->post('username'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				 // 'location' => $this->input->post('latlong'),
                'address' => $this->input->post('address'),
				'remarks' => $this->input->post('remarks'),
                'assign'=>$this->input->post('assign')
                // 'school_id'=>$this->session->SchoolId
             // 'date'=>date('d-m-y/h-m')
               
            );
            $enquiryInfoSms= array(
             'mobile'=>$this->input->post('mobile'),
             'school_id'=>$this->session->SchoolId,
             'module'=>'enquiry',
             'student_name'=>$params['name']
                     );
            $enquiryInfoEmail=array(
           
             'school_id'=>$this->session->SchoolId,
             'module'=>'enquiry',
             'student_name'=>$params['name'],
             'email'=>$params['email'],
             'subject'=>"Enquiry"
        );
            $checkUserName=$this->Enquiry_model->check_user_avilability($this->input->post('username'));
            if($checkUserName->username)
            {
            $ticketParams=array('ticket_id'=>$checkUserName->id,'comment'=>$this->input->post('comments'),'assign'=>$this->input->post('assign'),'status'=>1);
            $ticket_id = $this->Enquiry_model->add_ticket($ticketParams);
        }
        else
        {
            $enquiry_id = $this->Enquiry_model->add_enquiry($params);
            $ticketParams=array('ticket_id'=>$enquiry_id,'comment'=>$this->input->post('comments'),'assign'=>$this->input->post('assign'),'status'=>1);
            $ticket_id = $this->Enquiry_model->add_ticket($ticketParams);
            
        }
            // checkUserName

            // modules::run('sms/sms/send_sms',$enquiryInfoSms);
            // modules::run('email/email/send_email',$enquiryInfoEmail);
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
    function callEnquiry($mobile,$port)
    {


        $params=array('mobile_no'=>$mobile,
                        'port'=>$port


    );
         $enquiry_id = $this->Enquiry_model->add_enquiry_order($params);

    }
    
}
