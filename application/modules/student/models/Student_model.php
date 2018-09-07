<?php


class Student_model extends CI_Model
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
  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id ,parents.name as parent_name');
  $this->db->from('student');
  $this->db->where('student.id',$id);
  $this->db->join('parents','student.parent_id=parents.id','left');
  return $this->db->get()->row_array();
}




function get_all_student($schoolId)
{


  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id');
  $this->db->order_by('id', 'desc');

  $this->db->from('map_school_student');
  $this->db->where('school_id',$schoolId);
  $this->db->join('school', 'map_school_student.school_id=school.id', 'Left');
  $this->db->join('student', 'map_school_student.student_id=student.id', 'Left');
// $this->db->join('authentication', 'authentication.student_id=student.id', 'Left');
  return $this->db->get()->result_array();
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

function add_mapping($ids)
{
  $this->db->insert('map_school_student',$ids);
  return $this->db->insert_id();
}

function get_authentication_id()

{
  $this->db->from('master_authorization');
  return $this->db->get()->result();
}

function add_user($authentication)
{
  $this->db->insert('authentication',$authentication);
  return $this->db->insert_id();
}

function add_mappingToClass($studentClassMapping)
{
  $this->db->insert('map_student_class',$studentClassMapping);
  return $this->db->insert_id();
}

function delete_studentSchoolMap($id,$school_id)
{
  $this->db->delete('map_school_student',array('student_id'=>$id,'school_id'=>$school_id));
}

function filter_student($id)
{
  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id');
  $this->db->from('student');
  $this->db->where('id',$id);
  return $this->db->get()->row();
}
function student_complete_info_invoice($id)
{


  $this->db->select('invoices.invoice_id,invoices.total_amount as invoice_total,invoices.date as invoice_date,');
  $this->db->from('invoices');
  $this->db->where('invoices.student_id',$id);
// $this->db->join('reciepts', 'reciepts.student_id =invoices.student_id ');

  return $this->db->get()->result_array();

}
function student_complete_info_reciepts($id)
{


  $this->db->select('reciepts.total_amount as reciept_amount,reciepts.reciept_id,reciepts.date as reciept_date');
  $this->db->from('reciepts');
  $this->db->where('reciepts.student_id',$id);
// $this->db->join('reciepts', 'reciepts.student_id =invoices.student_id ');

  return $this->db->get()->result_array();

}
function select_uname_password($id)
{
  $this->db->select('username,clear_text,email');
  $this->db->from('authentication');
  $this->db->where('auth_id',$id);
  return $this->db->get()->row_array();

}

function insert_info($data)
{
  $this->db->insert('sms',$data);
  return $this->db->insert_id();
}

function update_sms_info($id,$school_id)
{
  $this->db->select('msg');
  $this->db->from('log_outgoing_sms');
  $this->db->where(array('student_id'=>$id ,'school_id'=>$school_id));
  return $this->db->get()->row();


}
function delete_studentClassMap($id)
{
  $this->db->delete('map_student_class',array('student_id'=>$id));
}
##calling by admin module show in dashboard
function get_all_students_count($school_id)
{
  $this->db->where('school_id',$school_id);
  $query =$this->db->get('map_school_student')->num_rows();
  return $query;
}
##calling by attendance module 
function fetch_student_name($schoolId)
{
  $this->db->select('student.name,student.id as ids');
  $this->db->from('student');
  $this->db->where('school_id',$schoolId);
  $this->db->join('map_school_student', 'student.id=map_school_student.student_id', 'Left');
  return $this->db->get()->result_array();
}
## fetch student name by class basis ,calling by attendance module
function fetch_students($classes_id)
{

  $this->db->select('student.name,student.id as student_id');
  $this->db->from('map_student_class');
  $this->db->join('student', 'map_student_class.student_id=student.id', 'Left');
  $this->db->join('classes', 'map_student_class.class_id=classes.id', 'Left');
  $this->db->where('class_id',$classes_id);
  return $query = $this->db->get()->result_array();
}
function add_balance_info_default($params)
{
  $this->db->insert('account_balance_information',$params);
  return $this->db->insert_id();
}
##called by account module
function fetchRecordStudents($username)
{

  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address');
  $this->db->from('authentication');
  $this->db->where('username',$username);  
  $this->db->where('autorization_id',4);  


  $this->db->join('student', 'authentication.user_id=student.id', 'Left');

  return  $query = $this->db->get()->row_array();

}
function get_all_student_by_classid($class_id)
{
  $this->db->select('student_id');
  $this->db->from('map_student_class');
  $this->db->where('class_id',$class_id);
  return $this->db->get()->result_array();
}
function get_student_by_student_id($id)
{
  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id');
  $this->db->from('student');
  $this->db->where_in('id',$id);
  return $this->db->get()->result_array();
}
function get_student_full_details($id)
{
  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,date(student.created_at) as date,student.classes,student.parent_id ,parents.name as parent_name,authentication.username,authentication.clear_text');
  $this->db->from('student');
  $this->db->where('student.id',$id);
  $this->db->join('parents','student.parent_id=parents.id','left');
  $this->db->where('autorization_id',4);
  $this->db->join('authentication','student.id=authentication.user_id','left');
  return $this->db->get()->row_array();
}
}
?>