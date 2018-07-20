<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School extends MY_Controller
{
    function __construct()
    {
        // parent::__construct();
        $this->load->model('School_model');
        //  if (!isset($_SESSION['username'])) {
        //      redirect('login');
        // }
       
    }

    /*
     * Listing of school
     */
    function index()
    {
                                      
        $data['_view'] = 'dashbord';

        $this->load->view('../index', $data);
    }
    
    function school_list()
    {
        $data['school'] = $this->School_model->get_all_school();

        $data['_view'] = 'schoollist';
        $this->load->view('index', $data);
    }

    function add_school()
    {
        $data['_view'] = 'add';
        $data['country'] = $this->School_model->fetch_country();

        $this->load->view('index', $data);
    }

    /*
     * Adding a new school
     */
    function add()
    {   $data['country'] = $this->School_model->fetch_country();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[300]');
        $this->form_validation->set_rules('contact_pri', 'Primary Number', 'required|max_length[13]','min_length[10]');
        $this->form_validation->set_rules('contact_sec', 'Secondry Number', 'max_length[13]|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email|is_unique[school.email]');
        // $this->form_validation->set_rules('logo', 'Logo', 'required');
        // $this->form_validation->set_rules('banner', 'Banner', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('latlong', 'Location', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'city_id' => $this->input->post('city'),
                'state_id' => $this->input->post('state'),
                'country_id' => $this->input->post('country'),
                'organization_name' => $this->input->post('name'),
                'latlong' => $this->input->post('latlong'),
                'contact_pri' => $this->input->post('contact_pri'),
                'contact_sec' => $this->input->post('contact_sec'),
                'email' => $this->input->post('email'),
                // 'logo' => $this->input->post('logo'),
                // 'banner' => $this->input->post('banner'),
                'address' => $this->input->post('address'),
                 'created_at'=>date('Y-m-d h:i:s'),
                 'modified_at'=>date('Y-m-d h:i:s')

            );
            // var_dump($params);die;
            $school_id = $this->School_model->add_school($params);
             $data=$this->session->set_flashdata('status','Successfully added');
              $data['_view'] = 'schoollist';
             $this->load->view('../index', $data);
             // header('location:successmodal.php');
        } else {
             // $this->session->set_flashdata('status','Failed to added');
            $data['_view'] = 'add';
             $this->load->view('../index', $data);
           
        }
    }

    /*
     * Editing a school
     */
    function edit($id)
    {
        // check if the school exists before trying to edit it
        $data['school'] = $this->School_model->get_school($id);
        // var_dump($data['school']);
        $data['country'] = $this->School_model->fetch_country();
        
        $data['state'] = $this->School_model->fetchState($data['school']['country_id']);
        $data['city'] = $this->School_model->fetchCity($data['school']['state_id']);
          // var_dump($data['state']);
         // die;

        if (isset($data['school']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('city', 'City Name', 'required');
            $this->form_validation->set_rules('state', 'State Name', 'required');
            $this->form_validation->set_rules('country', 'Country Name', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required|max_length[300]');
            $this->form_validation->set_rules('contact_pri', 'Primary Number', 'max_length[13]','min_length[10]');
            $this->form_validation->set_rules('contact_sec', 'Secondry Number', 'max_length[13]','min_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('latlong', 'Location', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    // 'school_id' => $this->School_model->get_school($id),
                    'city_id' => $this->input->post('city'),
                    'state_id' => $this->input->post('state'),
                    'country_id' => $this->input->post('country'),
                    'organization_name' => $this->input->post('name'),
                    'latlong' => $this->input->post('latlong'),
                    'contact_pri' => $this->input->post('contact_pri'),
                    'contact_sec' => $this->input->post('contact_sec'),
                    'email' => $this->input->post('email'),
                   
                    'address' => $this->input->post('address')
                    // 'modified_at'=>date('Y-m-d h:i:s')
                );

                $this->School_model->update_school($id, $params);
                redirect('school/school_list');
            } else {
                $data['_view'] = 'edit';
                //var_dump($data);
                $this->load->view('../index', $data);
            }
        } else
        show_error('The school you are trying to edit does not exist.');
    }

    /*
     * Deleting school
     */
    function remove($id)
    {
        $school = $this->School_model->get_school($id);

        // check if the school exists before trying to delete it
        if (isset($school['id'])) {
            $this->School_model->delete_school($id);
            redirect('school/school_list');
        } else
        show_error('The school you are trying to delete does not exist.');
    }


    function fetch_state()
    {
        if ($this->input->post('country_id')) {
            echo json_encode($this->School_model->fetch_state($this->input->post('country_id')));

            // $this->load->view('index',$data);

        }
    }

    function fetch_city()
    {
        if ($this->input->post('state_id')) {
            echo json_encode($this->School_model->fetch_city($this->input->post('state_id')));
        }
    }

    function fetch_subject()
    {   $schoolId= $_SESSION['SchoolId'];
        $mapData=$this->School_model->mapSubjects($schoolId);
         $this->output->enable_profiler(TRUE);
        var_dump($mapData);
    }
     function fetch_classes()
    {
        $mapData=$this->School_model->mapClasses($schoolId);
         $this->output->enable_profiler(TRUE);
        var_dump($mapData);
    }
     function fetch_students()
    {
        $mapData=$this->School_model->mapStudents($schoolId);
         $this->output->enable_profiler(TRUE);
        var_dump($mapData);
    }
     function fetch_employees()
     {  
      // $schoolId= $_SESSION['SchoolId'];
        $mapData=$this->School_model->mapEmployees($schoolId);
         $this->output->enable_profiler(TRUE);
        var_dump($mapData);
    }



}

?>