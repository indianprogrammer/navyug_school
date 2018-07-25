<?php

 
class Account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get student by id
     */
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
        $this->db->insert('invoice',$invoiceprocess);
        return $this->db->insert_id();
     }
    function  add_transaction($accountTransaction)
    {
         $this->db->insert('account_transection',$accountTransaction);
        return $this->db->insert_id();
    }
    function get_all_invoice()
    {
         $this->db->select('invoice.*,account_transection.*');
        $this->db->from('invoice');
        $this->db->join('account_transection', 'account_transection.reference_id=invoice.id', 'Left');
       
        // $this->db->where('class_id',$classes_id);
        return $query = $this->db->get()->result_array();
    }
    function get_invoice($invoice_id)
    {
         $this->db->select('student.*,invoice.invoice_id');
        $this->db->from('invoice');
        $this->db->join('account_transection', 'account_transection.reference_id=invoice.id', 'Left');
        $this->db->join('student', 'invoice.student_id=student.id', 'Left');
        $this->db->where('invoice_id',$invoice_id);
         return $query = $this->db->get()->row();
    }

    function add_transaction_reciept($accountTransaction)
    {
         $this->db->insert('account_transection',$accountTransaction);
        return $this->db->insert_id();
    }
     function add_reciept($reciept)
     { 
        echo "32232323";
        $this->db->insert('reciept',$reciept);
        return $this->db->insert_id();
     }
}
?>