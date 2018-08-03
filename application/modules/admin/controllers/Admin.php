    <?php


    class Admin extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Admin_model');
        } 

   function index()
   {
                               
        $data['_view'] = 'dashbord';

        $this->load->view('../index', $data);
    }
    function dashboardCounting()
    {

         $schoolId=$this->session->SchoolId;                         
      $data['students'] = $this->Admin_model->get_all_students_count($schoolId); 

         $data['employee'] = $this->Admin_model->get_all_employees_count($schoolId);                           
            $data['subject'] = $this->Admin_model->get_all_subject_count($schoolId);                           
           $data['class'] = $this->Admin_model->get_all_class_count($schoolId);  
           echo json_encode ($data);
    }
  }
  ?>
