<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class test_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    
    /*
     * Get subject by id
     */
     function get_student_count()
     {

        ##will improve
        $this->db->select('debit,id as ids');
       // $this->db->where('class_id',);
     $query=$this->db->get('account_transaction')->result();
      return $query;

}
}
?>