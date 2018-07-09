<?php

 
class Student extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
    } 

    /*
     * Listing of student
     */
    function index()
    {
        $data['student'] = $this->Student_model->get_all_student();
        
        $data['_view'] = 'student/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new student
     */
    function add()
    {   
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
        $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
        $this->form_validation->set_rules('username','Username','required|max_length[100]');
        $this->form_validation->set_rules('mobile','Mobile','required');
        $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
        $this->form_validation->set_rules('address','Address','required');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'password' => $this->input->post('password'),
                'student_name' => $this->input->post('student_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'profile_image' => $this->input->post('profile_image'),
                'address' => $this->input->post('address'),
            );
            
            $student_id = $this->Student_model->add_student($params);
            redirect('student/index');
        }
        else
        {            
            $data['_view'] = 'student/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a student
     */
    function edit($id)
    {   
        // check if the student exists before trying to edit it
        $data['student'] = $this->Student_model->get_student($id);
        
        if(isset($data['student']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
            $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            $this->form_validation->set_rules('username','Username','required|max_length[100]');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
            $this->form_validation->set_rules('address','Address','required');
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'password' => $this->input->post('password'),
                    'student_name' => $this->input->post('student_name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                    'profile_image' => $this->input->post('profile_image'),
                    'address' => $this->input->post('address'),
                );

                $this->Student_model->update_student($id,$params);            
                redirect('student/index');
            }
            else
            {
                $data['_view'] = 'student/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The student you are trying to edit does not exist.');
    } 

    /*
     * Deleting student
     */
    function remove($id)
    {
        $student = $this->Student_model->get_student($id);

        // check if the student exists before trying to delete it
        if(isset($student['id']))
        {
            $this->Student_model->delete_student($id);
            redirect('student/index');
        }
        else
            show_error('The student you are trying to delete does not exist.');
    }
    
}
