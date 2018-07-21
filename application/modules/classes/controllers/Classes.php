<?php

 
class Classes extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
        
    } 

    /*
     * Listing of class
     */
    function class_list()
    {
        // var_dump($school_id);die;
        $data['class'] = $this->Classes_model->get_all_class();
        
        $data['_view'] = 'classList';
        $this->load->view('index',$data);
    }

    /*
     * Adding a new class
     */
 function add_class()
 {              $school_id=$this->session->SchoolId;
        $data['subject'] = $this->Classes_model->fetch_subject($school_id);
        // var_dump($data['subject']);die;
        $data['employee'] = $this->Classes_model->fetch_employee($school_id);
        // var_dump($data['subject']);die;
     $data['_view'] = 'add';
        $this->load->view('index',$data);
 }


    function add()
    {   
        $school_id=$this->session->SchoolId;
        $this->load->library('form_validation');
    $data['subject'] = $this->Classes_model->fetch_subject($school_id);
     $data['employee'] = $this->Classes_model->fetch_employee($school_id);
    


        // $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('class_name','class Name','required|max_length[100]');
       
        // $this->form_validation->set_rules('address','Address','required');
        
        if($this->form_validation->run() )     
        {   
            $params = array(
                // 'password' => $this->input->post('password'),
                'name' => $this->input->post('class_name'),
                
                'description' => $this->input->post('description'),
                'subject_id' => $this->input->post('subject'),
                'start_time' => $this->input->post('start_time'),
                'end_time' => $this->input->post('end_time')
                //  'created_at'=>date(),
                // 'modified_at'=>date()
            );
           
            
            $class_id = $this->Classes_model->add_class($params);
             $ids=array(
            
                'class_id'=>$class_id,
                'school_id'=>$_SESSION['SchoolId']

          );  
               $map = $this->Classes_model->add_mapping($ids);
            redirect('classes/class_list');
        }
        else
        {            
            $data['_view'] = 'add';
            $this->load->view('index',$data);
        }
    }  

    /*
     * Editing a class
     */
    function edit($id)
    {   
        // check if the class exists before trying to edit it
        $data['class'] = $this->Classes_model->get_class($id);
     
        if(isset($data['class']['id']))
        {
            $this->load->library('form_validation');

            // $this->form_validation->set_rules('password','Password','required|max_length[20]')
            $this->form_validation->set_rules('class_name','class Name','required|max_length[100]');
            // $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            // $this->form_validation->set_rules('username','Username','required|max_length[100]');
            // $this->form_validation->set_rules('mobile','Mobile','required');
            // $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
            // $this->form_validation->set_rules('address','Address','required');
        
            if($this->form_validation->run() )     
            {   
                 $params = array(
                // 'password' => $this->input->post('password'),
                'name' => $this->input->post('class_name'),
                
                'description' => $this->input->post('description'),
                'subject_id' => $this->input->post('subject'),
                'start_time' => $this->input->post('start_time'),
                'end_time' => $this->input->post('end_time')
                //  'created_at'=>date(),
                // 'modified_at'=>date()
            );
               
                $this->Classes_model->update_class($id,$params);            
                redirect('class/index');
            }
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('index',$data);
            }
        }
        else
            show_error('The class you are trying to edit does not exist.');
    } 

    /*
     * Deleting class
     */
    function remove($id)
    {
        $class = $this->Classes_model->get_class($id);

        // check if the class exists before trying to delete it
        if(isset($class['id']))
        {
            $this->Classes_model->delete_class($id);
            redirect('class/class_list');
        }
        else
            show_error('The class you are trying to delete does not exist.');
    }
   
}
