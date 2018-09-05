<?php


class Attendance_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
    /*
     * Get student by id
     */
    
    
    function get_all_attendance()
    {
     $this->db->select('id,student_id,class_id,school_id,attendance_status,date');
     $this->db->from('attendance_record');
     
     
     return $query = $this->db->get()->result_array();
   }
   function insert_attendance($data)
   {
    $this->db->insert('attendance_record',$data);
    return $this->db->insert_id();
  }
  function fetch_report($school_id,$class_id,$date)
  {
    $this->db->select('id,student_id,class_id,school_id,attendance_status,date');
    $this->db->from('attendance_record');
    $this->db->where(array('school_id'=>$school_id,'class_id'=>$class_id,'date'=>$date));
        // $this->dv->join('student','student.id=attendance_record.student_id','Left');
    return $query = $this->db->get()->result_array();
    

  }



}

?>