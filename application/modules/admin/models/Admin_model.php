<?php

 
 
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get student by id
     */
    function get_student($id)
    {
        return $this->db->get_where('student',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all student
     */
    function get_all_student()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('student')->result_array();
    }
        
    /*
     * function to add new student
     */
    function add_student($params)
    {
        $this->db->insert('student',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update student
     */
    function update_student($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('student',$params);
    }
    
    /*
     * function to delete student
     */
    function delete_student($id)
    {
        return $this->db->delete('student',array('id'=>$id));
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









}
?>  