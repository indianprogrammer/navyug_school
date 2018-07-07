<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('School_model');
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
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[300]');
        $this->form_validation->set_rules('contact_pri', 'Primary Number', 'max_length[13]','min_length[10]');
        $this->form_validation->set_rules('contact_sec', 'Secondry Number', 'max_length[13]','min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email|is_unique[school.email]');
        $this->form_validation->set_rules('logo', 'Logo', 'required');
        $this->form_validation->set_rules('banner', 'Banner', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('latlong', 'Latlong', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'city_id' => $this->input->post('city'),
                'state_id' => $this->input->post('state'),
                'country_id' => $this->input->post('country'),
                'school_name' => $this->input->post('name'),
                'latlong' => $this->input->post('latlong'),
                'contact_pri' => $this->input->post('contact_pri'),
                'contact_sec' => $this->input->post('contact_sec'),
                'email' => $this->input->post('email'),
                'logo' => $this->input->post('logo'),
                'banner' => $this->input->post('banner'),
                'address' => $this->input->post('address'),
            );

            $school_id = $this->School_model->add_school($params);
            $this->session->set_flashdata('status','Successfully added');
              $data['_view'] = 'add';
             $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('status','Failed to added');
           
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
            $this->form_validation->set_rules('logo', 'Logo', 'required');
            $this->form_validation->set_rules('banner', 'Banner', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('latlong', 'Latlong', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    // 'school_id' => $this->School_model->get_school($id),
                    'city_id' => $this->input->post('city'),
                    'state_id' => $this->input->post('state'),
                    'country_id' => $this->input->post('country'),
                    'school_name' => $this->input->post('name'),
                    'latlong' => $this->input->post('latlong'),
                    'contact_pri' => $this->input->post('contact_pri'),
                    'contact_sec' => $this->input->post('contact_sec'),
                    'email' => $this->input->post('email'),
                    'logo' => $this->input->post('logo'),
                    'banner' => $this->input->post('banner'),
                    'address' => $this->input->post('address'),
                );

                $this->School_model->update_school($id, $params);
                redirect('school/index');
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


}

?>