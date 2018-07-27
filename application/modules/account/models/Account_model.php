<?php


class Account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    function fetch_classes($school_id)
    {

        $this->db->select('classes.name,classes.id');
        $this->db->from('map_school_class');
        $this->db->join('school', 'map_school_class.school_id=school.id', 'Left');
        $this->db->join('classes', 'map_school_class.class_id=classes.id', 'Left');
        $this->db->where('school_id',$school_id);
        return $query = $this->db->get()->result();
    } 
    function fetch_students($classes_id)
    {

        $this->db->select('student.student_name,student.id as student_id');
        $this->db->from('map_student_class');
        $this->db->join('student', 'map_student_class.student_id=student.id', 'Left');
        $this->db->join('classes', 'map_student_class.class_id=classes.id', 'Left');
        $this->db->where('class_id',$classes_id);
        return $query = $this->db->get()->result();
    }
    function fetch_records($username)
    {
        $this->db->select('*');
        $this->db->like('username');
        $this->db->from('authentication');
        // $this->db->join('student', 'map_student_class.student_id=student.id', 'Left');
        // $this->db->join('classes', 'map_student_class.class_id=classes.id', 'Left');
        $this->db->where('id',1);
        return $query = $this->db->get()->result();
    }
    function add_invoice($invoiceprocess)
    {
        $this->db->insert('invoices',$invoiceprocess);
        return $this->db->insert_id();
    }
    function  add_transaction($accountTransaction)
    {
       $this->db->insert('account_transection',$accountTransaction);
       return $this->db->insert_id();
   }
   function get_all_invoice()
   {
       $this->db->select('invoices.*,account_transection.*,student.student_name');
       $this->db->from('invoices');
       $this->db->join('account_transection', 'account_transection.reference_id=invoices.id', 'Left');
       $this->db->join('student', 'student.id=invoices.student_id', 'Left');
       
        // $this->db->where('class_id',$classes_id);
       return $query = $this->db->get()->result_array();
   }
   function get_invoice($invoice_id)
   {
       $this->db->select('student.*,invoices.invoice_id as inv,invoices.school_name,master_invoice.name,master_invoice.price');
       $this->db->from('invoices');
       $this->db->join('account_transection', 'account_transection.reference_id=invoices.id', 'Left');
       $this->db->join('master_invoice','master_invoice.invoice_id_mul=invoices.invoice_id', 'Left');
       $this->db->join('student', 'invoices.student_id=student.id', 'Left');
       $this->db->where('invoice_id',$invoice_id);
       return $query = $this->db->get()->row();
   }
   function get_invoiceRow($invoice_id)
   {
       $this->db->select('master_invoice.name,master_invoice.price');
       $this->db->from('master_invoice');
       $this->db->where('invoice_id_mul',$invoice_id);
       return $query = $this->db->get()->result_array();


   }
   function get_max_invoiceno()
   {
    $this->db->select_max('invoice_id');
    $this->db->from('invoices');

    $query = $this->db->get()->row();
    return $query->invoice_id+1;

}
function insertMultiple($entries)
{
  $this->db->insert_batch('master_invoice',$entries);
}



function get_school_information($school_id)
{
   $this->db->select('school.*');
   $this->db->from('invoices');
   $this->db->join('school', 'school.id=invoices.school_id', 'Left');

   $this->db->where('school_id',$school_id);
   return $query = $this->db->get()->row();
}

function add_transaction_reciept($accountTransaction)
{
   $this->db->insert('account_transection',$accountTransaction);
   return $this->db->insert_id();
}
function add_reciept($reciept)
{ 

    $this->db->insert('reciept',$reciept);
    return $this->db->insert_id();
}
function get_all_reciept()
{
   $this->db->select('reciepts.*,account_transection.*');
   $this->db->from('reciepts');
   $this->db->join('account_transection', 'account_transection.reference_id=reciepts.id', 'Left');

        // $this->db->where('class_id',$classes_id);
   return $query = $this->db->get()->result_array();
}
function get_reciept($reciept_id)
{
   $this->db->select('reciepts.reciept_id');
   $this->db->from('reciepts');
   $this->db->join('account_transection', 'account_transection.reference_id=reciepts.id', 'Left');
            // $this->db->join('student', 'invoice.student_id=student.id', 'Left');
   $this->db->where('reciept_id',$reciept_id);
   return $query = $this->db->get()->row();
}

function fetchRecordStudents($keyword)
{

   $this->db->select('student.*');
   $this->db->from('authentication');
   $this->db->where('username',$keyword);  
        // $this->db->join('map_school_student', 'map_school_student.student_id=student.id');
        // $this->db->join('student', 'invoice.student_id=student.id', 'Left');
   $this->db->join('student', 'authentication.user_id=student.id', 'Left');
        // $this->db->where('school_id',$school_id);
   return  $query = $this->db->get()->row();

}



















}
?>