<?php

 
class Student extends MY_Controller{
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
        
        $data['_view'] = 'studentList';
        $this->load->view('index',$data);
    }

    /*
     * Adding a new student
     */
 function add_student()
 {
     $data['_view'] = 'add';
        $this->load->view('index',$data);
 }


    function add()
    {   
        $this->load->library('form_validation');
          $config['upload_path']          = './uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $this->load->library('upload', $config);

        // $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
        $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
        $this->form_validation->set_rules('username','Username','required|max_length[100]');
        $this->form_validation->set_rules('mobile','Mobile','required');
        // $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
        $this->form_validation->set_rules('address','Address','required');
        
        if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
        {   
            $params = array(
                // 'password' => $this->input->post('password'),
                'student_name' => $this->input->post('student_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'profile_image' => $this->input->post('profile_image'),
                'permanent_address' => $this->input->post('address'),
                'temporary_address' => $this->input->post('address'),
                 'created_at'=>date(),
                'modified_at'=>date()
            );
             $data['image'] =  $this->upload->data();
              // var_dump($data);
            $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
            $params['profile_image']=$image_path;
            
            $student_id = $this->Student_model->add_student($params);
            redirect('student/index');
        }
        else
        {            
            $data['_view'] = 'add';
            $this->load->view('index',$data);
        }
    }  

    /*
     * Editing a student
     */
    function edit($id)
    {   
        // check if the student exists before trying to edit it
        $data['student'] = $this->Student_model->get_student($id);
         $config['upload_path']          = './uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $this->load->library('upload', $config);
        
        if(isset($data['student']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('student_name','Student Name','required|max_length[100]');
            $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            $this->form_validation->set_rules('username','Username','required|max_length[100]');
            $this->form_validation->set_rules('mobile','Mobile','required');
            // $this->form_validation->set_rules('profile_image','Profile Image','required|max_length[255]');
            $this->form_validation->set_rules('address','Address','required');
        
            if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
            {   
                $params = array(
                    'password' => $this->input->post('password'),
                    'student_name' => $this->input->post('student_name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                    // 'profile_image' => $this->input->post('profile_image'),
                    'address' => $this->input->post('address'),
                    'modified_at'=>date()
                );
                var_dump($params);die;
                 $data['image'] =  $this->upload->data();
              // var_dump($data);
                 $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
                 $params['profile_image']=$image_path;
                $this->Student_model->update_student($id,$params);            
                redirect('student/index');
            }
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('index',$data);
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
