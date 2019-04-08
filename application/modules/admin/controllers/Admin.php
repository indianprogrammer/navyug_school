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
    // print_r($schoolId);
    $this->load->model('student/Student_model');                      
    $this->load->model('employee/Employee_model');                      
    $this->load->model('subject/Subject_model');                      
    $this->load->model('classes/Classes_model');                      
    // $this->load->model('account/Account_model');                      
    $data['students'] = $this->Student_model->get_all_students_count($schoolId); 

    $data['employee'] = $this->Employee_model->get_all_employees_count($schoolId);                           
    $data['subject'] = $this->Subject_model->get_all_subject_count($schoolId);    
    $data['batches']=  $this->Subject_model->counting('table_batch',array('school_id'=>$schoolId));                         
    // $data['class'] = $this->Classes_model->get_all_class_count($schoolId);   
    $data['pending_invoice'] = $this->Admin_model->counting('table_invoices',array('school_id'=>$schoolId,'status'=>'pending'));   
    $data['partial_invoice'] = $this->Admin_model->counting('table_invoices',array('school_id'=>$schoolId,'status'=>'partially'));   
    $pending_amount=$this->Admin_model->select_id('table_invoices',array('school_id'=>$schoolId,'status!='=>'paid'),array('sum(total_amount-amount_paid) as pending'));   
    $data['pending_amount']=$pending_amount['pending'];
    echo json_encode ($data);
  }
  function totalAmount()
  {
    $debit=$this->Admin_model->get_amount_count_debit();
    $credit=$this->Admin_model->get_amount_count_credit();
    $data['debit']=$debit->debit;
    $data['credit']=$credit->credit;

    echo json_encode($data); 
  }

##student admission detail counting in a month 
  function studentAdd()
  {

// $dateto=$this->input->post('dateto');
// $datefrom= $this->input->post('datefrom');
    $schoolId=$this->session->SchoolId;
    $data=$this->Admin_model->get_student_details_date($schoolId);
    echo json_encode($data);
  }
  function invoiceReport()
  {
    $schoolId=$this->session->SchoolId;
    $data=$this->Admin_model->get_invoice_details_date($schoolId);
    echo json_encode($data);

  }
  function salesChart()
  {

    $schoolId=$this->session->SchoolId;
    $data=$this->Admin_model->get_sales_details_date($schoolId);
    echo json_encode($data);
  }
  function getSchoolName($school_id)
  {
    return $this->Admin_model->get_school_name($school_id);

  }
##not use in frontend noe last 2 function
  function getDataPreviousMonth()
  {
    $schoolId=$this->session->SchoolId;
    echo json_encode(($this->Admin_model->get_data_bymonth()));

  }
  function getDataStudentMonth()
  {
    var_dump($this->Admin_model->get_data_bymonth_student(1));

  }
}
?>
