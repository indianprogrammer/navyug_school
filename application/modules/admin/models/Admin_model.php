<?php

 
 
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
  
   
  ##for counting row
    function get_all_students_count($school_id)
    {
       $this->db->where('school_id',$school_id);
    $query =$this->db->get('map_school_student')->num_rows();
      return $query;
    }
    function get_all_employees_count($school_id)
    {
      $this->db->where('school_id',$school_id);
      $query=$this->db->get('map_school_employee')->num_rows();
      return $query;
    }
    function get_all_subject_count($school_id)
    {
      $this->db->where('school_id',$school_id);
      $query=$this->db->get('map_school_subject')->num_rows();
      return $query;
    }
    function get_all_class_count($school_id)
    {
      $this->db->where('school_id',$school_id);
      $query=$this->db->get('map_school_class')->num_rows();
      return $query;
    }
    function get_amount_count_debit()
    {
        $this->db->select_sum('debit');
       // $this->db->where('class_id',);
     $query=$this->db->get('account_transaction')->row();
      return $query;

    }
     function get_amount_count_credit()
    {
        $this->db->select_sum('credit');
       // $this->db->where('class_id',);
    return $this->db->get('account_transaction')->row();
      

    }


function get_student_details_date()
{

  // $this->db->select('id');
 
//   $this->db->from('student');
//    $this->db->order_by('created_at','desc');
//   $this->db->group_by('MONTH(created_at)');

// return $this->db->count_all_results('id');
  $query = $this->db->query("select MONTHNAME(created_at) as month,count(id) as count from student  group by MONTH(created_at),MONTHNAME(created_at) order by MONTH(created_at) asc");
   return $query->result_array();
   // return result();
}
function get_invoice_details_date($school_id)
{
$query = $this->db->query("select MONTHNAME(date) as month,sum(total_amount) as total,count(id) as count from invoices where school_id='$school_id' group by MONTH(date),MONTHNAME(date) order by MONTH(date) asc ");
   return $query->result_array();


}
function get_sales_details_date()
{
$query = $this->db->query("select MONTHNAME(date) as month,sum(debit) as debit,sum(credit) as credit,count(id) as count from account_transaction  group by MONTH(date),MONTHNAME(date) order by MONTH(date) asc ");
   return $query->result_array();

}
function get_school_name($school_id)
{
  $this->db->select('organization_name');
  $this->db->from('school');
  $this->db->where('id',$school_id);
  return $this->db->get()->row();
}



}
?>  