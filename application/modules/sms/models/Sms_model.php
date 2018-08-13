<?php

 
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
function insertLogInfo($data)
{
 $this->db->insert('log_outgoing_sms',$data);
        return $this->db->insert_id();
  }
function get_info_sms($school_id)
{
	$this->db->select('*');
	$this->db->from('configuration_sms');
	$this->db->where('school_id',$school_id);

	return $this->db->get()->row();
}
function fetch_template_data($school_id,$module)
{

$this->db->select('context');
    $this->db->from('template_sms');
    $this->db->where(array('school_id'=>$school_id,'module'=>$module));

    return $this->db->get()->row();


}
function get_all_students($ids)
    {


     $this->db->select('student.email,student.mobile,student.id');
     // $this->db->order_by('id', 'desc');

     $this->db->from('student');
     $this->db->where('student.id',$ids);
     // $this->db->join('school', 'map_school_student.school_id=school.id', 'Left');
     // $this->db->join('student', 'map_school_student.student_id=student.id', 'Left');
        // $this->db->join('authentication', 'authentication.student_id=student.id', 'Left');
     return $this->db->get()->result_array();
   }
function data_sms($data)
{
   $this->db->insert('log_outgoing_sms',$data);
      return $this->db->insert_id();
}

function get_all_employees($ids)
    {


     $this->db->select('*');
     // $this->db->order_by('id', 'desc');

     $this->db->from('employees');
     $this->db->where('employees.id',$ids);
     // $this->db->join('school', 'map_school_student.school_id=school.id', 'Left');
     // $this->db->join('student', 'map_school_student.student_id=student.id', 'Left');
        // $this->db->join('authentication', 'authentication.student_id=student.id', 'Left');
     return $this->db->get()->result_array();
   }










 }
 ?>