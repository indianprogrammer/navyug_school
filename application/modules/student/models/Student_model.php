<?php


class Student_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }

/*
* Get student by id
*/

##before take for if some error occured
// function get_student($id)
// {
//   $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id ,parents.name as parent_name,student.aadhar');
//   $this->db->from('map_student_school');
//   $this->db->where('student.id',$id);
//   $this->db->join('parents','student.parent_id=parents.id','left');
//   return $this->db->get()->row_array();
// }
function get_student($id,$school_id)
{
  $this->db->select('t2.id,t2.name,t2.email,t2.mobile,t2.permanent_address,t2.temporary_address,t2.profile_image,t2.created_at,t2.classes,t2.parent_id ,parents.name as parent_name,t2.aadhar,t2.blood_group,t2.dob,t2.gender,t2.p_city,t2.p_pincode,t2.t_city,t2.t_pincode');
  $this->db->from('map_school_student as t1');
  $this->db->where(array('t2.id'=>$id,'school_id'=>$school_id));
  $this->db->join('student as t2','t1.student_id=t2.id','left');
  $this->db->join('parents','t2.parent_id=parents.id','left');
  return $this->db->get()->row_array();
}




function get_all_student($schoolId)
{


  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id,student.aadhar');
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
 $this->db->delete('student',array('id'=>$id));
 $this->db->where(array('user_id'=>$id,'autorization_id'=>4));
 return $this->db->delete('authentication');
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
  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at,student.classes,student.parent_id,student.aadhar');
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

  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.aadhar');
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
  $this->db->select('student.id,student.name,student.email,student.mobile,student.permanent_address,student.temporary_address,student.profile_image,student.created_at  ,student.parent_id,student.aadhar');
  $this->db->from('student');
  $this->db->where_in('id',$id);
  return $this->db->get()->result_array();
}
function get_student_full_details($id,$school_id)
{
  $this->db->select('t1.id,t1.name,t1.email,t1.mobile,t1.permanent_address,t1.temporary_address,t1.profile_image,date(t1.created_at) as date,t1.classes,t1.parent_id ,parents.name as parent_name,authentication.username,authentication.clear_text,t1.aadhar,t1.blood_group,t1.dob,t1.gender,t1.p_city,t1.p_pincode,t1.t_city,t1.t_pincode');
  $this->db->from('student as t1');
  $this->db->where(array('t1.id'=>$id));
  $this->db->join('parents','t1.parent_id=parents.id','left');
  $this->db->where('autorization_id',4);
  $this->db->join('authentication','t1.id=authentication.user_id','left');
  return $this->db->get()->row_array();
}
function insert_by_excel($data)
{
  $this->db->insert_batch('student', $data);
}

function studentSearch($table_name,$condition=null,$content_display,$search)
{
  $this->db->select($content_display);



  $this->db->from($this->$table_name);  

  $this->db->where($condition);
  $this->db->join('student','student.id=map_school_student.student_id','left');
  $this->db->group_start();
  $this->db->where("name like '%$search%' ");
  $this->db->or_where("mobile like '$search%' ");
           

  $this->db->group_end();

  $data=$this->db->get()->result_array();
 
  return $data;

}
function student_batch($table_name,$condition=null,$content_display)
{
    $this->db->select($content_display);
  $this->db->from($this->$table_name);  
  $this->db->where($condition);
  $this->db->join('batch','batch.id=map_student_batch.batch_id');
  $this->db->join('course','course.id=batch.course_id');
  $data=$this->db->get()->result_array();
 
  return $data;
}
function library_issue_book_student($table_name,$condition=null,$content_display)
{
   $this->db->select($content_display);
  $this->db->from($this->$table_name);  
  $this->db->where($condition);
  $this->db->join('books','books.id=book_issue.book_id');
  // $this->db->join('course','course.id=batch.course_id');
  $data=$this->db->get()->result_array();
 
  return $data;

}

function fetch_assigned_student_batch($table_name,$condition=null,$content_display)
{

$this->db->select($content_display);
  $this->db->from(''.$this->$table_name.' as t1');  
  $this->db->where($condition);
  $this->db->join('student as t2 ','t1.student_id=t2.id');
  $this->db->join('batch as t3','t1.batch_id=t3.id');
  $this->db->join('course as t4','t4.id=t3.course_id');
  $data=$this->db->get()->result_array();
 
  return $data;


}

}
?>