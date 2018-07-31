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
        return $query = $this->db->get()->result_array();
    }
    function get_all_attendance()
    {
         $this->db->select('*');
         $this->db->from('attendance_record');
            
         
        return $query = $this->db->get()->result_array();
    }
    function insert_attendance($data)
    {
        $this->db->insert('attendance_record',$data);
        return $this->db->insert_id();
    }
    function fetch_report($school_id,$class_id)
    {
        $this->db->select('attendance_record.*');
        $this->db->from('attendance_record');
        $this->db->where(array('school_id'=>$school_id,'class_id'=>$class_id));
        // $this->dv->join('student','student.id=attendance_record.student_id','Left');
        return $query = $this->db->get()->result_array();
        

    }
}
?>