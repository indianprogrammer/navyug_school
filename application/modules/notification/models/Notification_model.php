<?php

 
 
class Notification_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
function fetch_student_class_wise($class_id)
{
$this->db->select('student.name,student.email,student.mobile,student.id');
$this->db->from('map_student_class');
$this->db->join('student','student.id=map_student_class.student_id');
$this->db->where('class_id',$class_id);
return $this->db->get()->result_array();



}
function fetch_employee_class_wise($class_id)
{
$this->db->select('employees.name,employees.email,employees.mobile,employees.id');
$this->db->from('map_class_employee');
$this->db->join('employees','employees.id=map_class_employee.employee_id');
$this->db->where('class_id',$class_id);
return $this->db->get()->result_array();



}


















    }

    ?>