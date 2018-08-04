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
     function totalAmount()
     {
      $debit=$this->Admin_model->get_amount_count_debit();
      $credit=$this->Admin_model->get_amount_count_credit();
      $data['debit']=$debit->debit;
       $data['credit']=$credit->credit;
      // print_r($debit);
      // echo $credit;die;
     // var_dump($q);
      // echo (($debit)); 
       echo (json_encode($data)); 
    }
  

    function studentAdd()
    {

      // $dateto=$this->input->post('dateto');
     // $datefrom= $this->input->post('datefrom');
      $data=$this->Admin_model->get_student_details_date();
      var_dump($data);die;
    }













}
  ?>
