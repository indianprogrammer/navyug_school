<?php


class Subject extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Subject_model');

    } 

    /*
     * Listing of subject
     */
    function subject_list()
    {
     

        $data['subject'] = $this->Subject_model->get_all_subject();
        
        $data['_view'] = 'subjectList';
        $this->load->view('index',$data);
    }

    /*
     * Adding a new subject
     */
    function add_subject()
    {
        
       $data['_view'] = 'add';
       $this->load->view('index',$data);
   }


   function add()
   {   
    $this->load->library('form_validation');
    

        // $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('subject_name','subject Name','required|max_length[100]|is_unique[subjects.name]');
    
    
    if($this->form_validation->run() )     
    {   
        $params = array(
                // 'password' => $this->input->post('password'),
            'name' => $this->input->post('subject_name')
            
                //  'created_at'=>date(),
                // 'modified_at'=>date()
        );
        
        
        $subject_id = $this->Subject_model->add_subject($params);
        $ids=array(
            
            'subject_id'=>$subject_id,
            'school_id'=>$this->session->SchoolId

        );  
        $map = $this->Subject_model->add_mapping($ids);

        #set notifications
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'this is title',
            'description'=> 'this is description'
        );
        //$this->output->enable_profiler(TRUE);
        redirect('subject/subject_list');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

    /*
     * Editing a subject
     */
    function edit($id)
    {   
        // check if the subject exists before trying to edit it
        $data['subject'] = $this->Subject_model->get_subject($id);
        
        
        if(isset($data['subject']['id']))
        {
            $this->load->library('form_validation');

            
            $this->form_validation->set_rules('subject_name','subject Name','required|max_length[100]|is_unique[subjects.name]');
            
            
            if($this->form_validation->run() )     
            {   
                $params = array(
                 
                    'name' => $this->input->post('subject_name')
                    
                    // 'modified_at'=>date()
                );
                
                $this->Subject_model->update_subject($id,$params);            
                redirect('subject/subject_list');
            }
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('index',$data);
            }
        }
        else
            show_error('The subject you are trying to edit does not exist.');
    } 

    /*
     * Deleting subject
     */
    function remove($id)
    {
        $subject = $this->Subject_model->get_subject($id);

        // check if the subject exists before trying to delete it
        if(isset($subject['id']))
        {
            $this->Subject_model->delete_subject($id);
            redirect('subject/subject_list');
        }
        else
            show_error('The subject you are trying to delete does not exist.');
    }
    
}
