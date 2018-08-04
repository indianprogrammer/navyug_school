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

  $this->db->select('*');
  $this->db->from('student');
  $this->db->where('DATE(created_at)>=','2018-07-28');
 $this->db->where('DATE(created_at) <=', '2018-07-30');
return $this->db->get()->result();
}






}
?>  