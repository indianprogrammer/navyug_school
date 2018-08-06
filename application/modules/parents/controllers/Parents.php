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

function index(){
    $schoolId=$this->session->SchoolId;
    $data['parents'] = $this->Parents_model->get_all_parents($schoolId);
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
     #validation
 $this->load->library('form_validation');

 $this->form_validation->set_rules('parent_Name','parent Name','required|max_length[100]');
 $this->form_validation->set_rules('ptype','parent type','required');
 $this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
 $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');

 if($this->form_validation->run() )     
 {   
    $params = array(

        'name' => $this->input->post('parent_Name'),
        'type' => $this->input->post('ptype'),


        'email' => $this->input->post('email'),
        'mobile' => $this->input->post('mobile'),

        'permanent_address' => $this->input->post('paddress'),
        'temporary_address' => $this->input->post('taddress')
       
    );


    $parentId = $this->Parents_model->add_parent($params);


             $username = 'par'.$this->session->SchoolId.'_'.$parentId; #par+schoolid_parentid
             $password = rand(1,10000);
             $email = $params['email'];

             $userId = $parentId;
             $password=rand(1,100000);

             $authentication=array(
               'username'=> $username,
               'email'=> $email,
               'autorization_id'=>3,
               'password'=>md5($password),
                'user_id'=> $userId,
               'clear_text'=>$password

           );
             // var_dump($authentication);
             $insertAuthentication  = $this->Parents_model->add_user($authentication);
             $schoolParentMap=array(

                'parent_id'=>$parentId,
                'school_id'=>$this->session->SchoolId

            );  
             $map  = $this->Parents_model->add_mapping($schoolParentMap);
              $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added',
         'description'=> ''
     );
             redirect('parents');
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

           
           $this->form_validation->set_rules('parent_Name','parent Name','required|max_length[100]');
             $this->form_validation->set_rules('ptype','parent type','required');
             $this->form_validation->set_rules('email','Email','required|max_length[40]|valid_email');
             $this->form_validation->set_rules('mobile','Mobile','required|max_length[15]');

            if($this->form_validation->run())     
            {   
                $params = array(
					// 'password' => $this->input->post('password'),
                  'name' => $this->input->post('parent_Name'),
                // 'type' => $this->input->post('ptype'),
                // 'qualification' => $this->input->post('qualification'),
                 
                  'email' => $this->input->post('email'),
                  'mobile' => $this->input->post('mobile'),
                 // 'profile_image' => $this->input->post('profile_image'),
                  'permanent_address' => $this->input->post('paddress'),
                  'temporary_address' => $this->input->post('taddress')
                  // 'modified_at'=>date('Y-m-d h:i:s')
                     // 'modified_at'=>date('Y-m-d h:i:s')
              );


                $this->Parents_model->update_parent($id,$params);            
                redirect('parents');
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
            redirect('parents');
        }
        else
            show_error('The parent you are trying to delete does not exist.');
    }
    
}
?>