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
    $this->db->from(''.$this->$table_name.' as t1');  
    $this->db->where($condition);
    $this->db->join('subjects as t2', 't2.id=t1.subject_id');
    $this->db->join('batch as t3', 't3.id=t1.batch_id');
    $this->db->join('course as t4', 't4.id=t1.course_id');
    $this->db->join('employees as t5', 't5.id=t1.staff_id');
    
    $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
    return $data;
    
  }























}
?>