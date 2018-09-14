<?php



class Admin_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  

  ##for counting row




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


  function get_student_details_date($school_id)
  {

## sql query
/*    $query = $this->db->query("select MONTHNAME(created_at) as month,count(id) as count from student LEFT JOIN  map_school_student ON map_school_student.student_id = student.id where school_id='$school_id' group by MONTH(created_at),MONTHNAME(created_at) order by MONTH(created_at) asc");
return $query->result_array();*/
$this->db->select('MONTHNAME(created_at) as month,count(id) as count');
$this->db->from('student');
$this->db->join('map_school_student','map_school_student.student_id = student.id');
$this->db->where('school_id',$school_id);
$this->db->group_by('MONTH(created_at),MONTHNAME(created_at)');
$this->db->order_by('MONTH(created_at)','asc');
return $data=$this->db->get()->result_array();

}
function get_invoice_details_date($school_id)
{
    /*$query = $this->db->query("select MONTHNAME(date) as month,sum(total_amount) as total,count(id) as count from invoices where school_id='$school_id' group by MONTH(date),MONTHNAME(date) order by MONTH(date) asc");
    return $query->result_array();*/
    $this->db->select('MONTHNAME(date) as month,sum(total_amount) as total,count(id) as count');
    $this->db->from('invoices');

    $this->db->where('school_id',$school_id);
    $this->db->group_by('MONTH(date),MONTHNAME(date)');
    $this->db->order_by('MONTH(date)','asc');
    return $data=$this->db->get()->result_array();


  }
  function get_sales_details_date($school_id)
  {
    
    $this->db->select('MONTHNAME(date) as month,sum(debit) as debit,sum(credit) as credit,count(id) as count');
    $this->db->from('account_transaction');

    $this->db->where('school_id',$school_id);
    $this->db->group_by('MONTH(date),MONTHNAME(date)');
    $this->db->order_by('MONTH(date)','asc');
    return $data=$this->db->get()->result_array();


  }
  function get_school_name($school_id)
  {
    $this->db->select('organization_name');
    $this->db->from('school');
    $this->db->where('id',$school_id);
    return $this->db->get()->row_array();
  }

  function get_data_bymonth()
  {
    $query =$this->db->query("SELECT date(date) as date,sum(total_amount) as total,count(id) as count FROM invoices WHERE date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE() group by date(date)");
    return $query->result_array();
  }
  function get_data_bymonth_student($school_id)
  {
    $query = $this->db->query("select * from student LEFT JOIN  map_school_student ON map_school_student.student_id = student.id  WHERE created_at BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) ");
    return $query->result_array();
  }

}
?>  