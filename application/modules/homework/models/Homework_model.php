<?php


class Homework_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function fetch_homework($table_name,$condition,$content_display)
  {

    $this->db->select($content_display);
    $this->db->from($this->$table_name);  
    $this->db->where($condition);
    $this->db->join('subjects', 'subjects.id='.$this->$table_name.'.subject_id');
    $this->db->join('batch', 'batch.id='.$this->$table_name.'.batch_id');
    $this->db->join('course', 'course.id='.$this->$table_name.'.course_id');
    $this->db->join('employees', 'employees.id='.$this->$table_name.'.staff_id');
    
    $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
    return $data;
    
  }























}
?>