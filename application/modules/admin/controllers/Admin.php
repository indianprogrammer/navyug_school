    <?php


    class Admin extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Admin_model');
        } 

    /*
     * Listing of admin
     */
    function dmin_list()
    {
        $data['admin'] = $this->Admin_model->get_all_admin();
        
        $data['_view'] = 'adminList';
        $this->load->view('index',$data);
    }

    /*
     * Adding a new admin
     */
    function add_admin()
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
    $this->form_validation->set_rules('admin_name','admin Name','required|max_length[100]');
    $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
    $this->form_validation->set_rules('username','Username','required|max_length[100]');
    $this->form_validation->set_rules('mobile','Mobile','required');

    $this->form_validation->set_rules('paddress','Permanent Address','required');
    $this->form_validation->set_rules('taddress','Temporary Address','required');

    if($this->form_validation->run() && $this->upload->do_upload('profile_image'))     
    {   
        $params = array(
                // 'password' => $this->input->post('password'),
            'admin_name' => $this->input->post('admin_name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'mobile' => $this->input->post('mobile'),
                // 'profile_image' => $this->input->post('profile_image'),
            'permanent_address' => $this->input->post('paddress'),
            'temporary_address' => $this->input->post('taddress'),
            'created_at'=>date('Y-m-d h:i:s'),
            'modified_at'=>date('Y-m-d h:i:s')

        );
        $data['image'] =  $this->upload->data();
              // var_dump($data);
        $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
        $params['profile_image']=$image_path;

        $admin_id = $this->Admin_model->add_admin($params);
        redirect('admin/admin_list');
    }
    else
    {            
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }
}  

    /*
     * Editing a admin
     */
    function edit($id)
    {   
        // check if the admin exists before trying to edit it
        $data['admin'] = $this->Admin_model->get_admin($id);
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);

        
        if(isset($data['admin']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('admin_name','admin Name','required|max_length[100]');
            $this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
            $this->form_validation->set_rules('username','Username','required|max_length[100]');
            $this->form_validation->set_rules('mobile','Mobile','required');

            $this->form_validation->set_rules('paddress','Permanent Address','required');
            $this->form_validation->set_rules('taddress','Temporary Address','required');

            if($this->form_validation->run() )     
            {   
                $params = array(

                    'admin_name' => $this->input->post('admin_name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                // 'profile_image' => $this->input->post('profile_image'),
                    'permanent_address' => $this->input->post('paddress'),
                    'temporary_address' => $this->input->post('taddress'),
                    
                );
                // var_dump($params);die;
                $data['image'] =  $this->upload->data();
              // var_dump($data);
                $image_path=base_url()."uploads/".$data['image']['raw_name'].$data['image']['file_ext'];
               // echo $image_path;die;
                $params['profile_image']=$image_path;
                $this->Admin_model->update_admin($id,$params);            
                redirect('admin/admin_list');
            }
            else
            {
                $data['_view'] = 'edit';
                $this->load->view('index',$data);
            }
        }
        else
            show_error('The admin you are trying to edit does not exist.');
    } 

    /*
     * Deleting admin
     */
    function remove($id)
    {
        $admin = $this->Admin_model->get_admin($id);

        // check if the admin exists before trying to delete it
        if(isset($admin['id']))
        {
            $this->Admin_model->delete_admin($id);
            redirect('admin/admin_list');
        }
        else
            show_error('The admin you are trying to delete does not exist.');
    }
    
}
